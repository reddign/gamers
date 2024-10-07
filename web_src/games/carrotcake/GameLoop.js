/*
    File Title: GameLoop.js
    Description: Renders the game objects
                 Used in rpg.js to continually redraw the board and sprites
    
    Status: Complete and tested
*/

export class GameLoop {
    constructor(update, render) {
        this.lastFrameTime = 0;
        this.accumulatedTime = 0;
        this.timeStep = 1000/60; //60 frames a second

        this.update = update;
        this.render = render;

        this.rafId = null;
        this.isRunning = false;

        this.mainLoop = this.mainLoop.bind(this);
    }

    mainLoop = (timestamp) => {
        if (!this.isRunning) return;

        let deltaTime = timestamp - this.lastFrameTime;
        this.lastFrameTime = timestamp;

        // Accumulate all the time since the last frame
        this.accumulatedTime += deltaTime;

        // Fixed time step updates.
        // If there's enough accumulated time to run one or more fixed updates, run them
        while (this.accumulatedTime >= this.timeStep) {
            this.update(this.timeStep);
            this.accumulatedTime -= this.timeStep;
        }

        // Render
        this.render();

        this.rafId = requestAnimationFrame(this.mainLoop);
    }

    start() {
        if (!this.isRunning) {
            this.isRunning = true;
            this.rafId = requestAnimationFrame(this.mainLoop);
        }
    }

    stop() {
        if (this.rafId) {
            this.rafId = requestAnimationFrame(this.mainLoop);
        }
        this.isRunning = false;
    }
}