/*
    File Title: sprite.js
    Description: Class containing all the information on the sprites
    
    Status: Complete and tested
*/

import { Vector2 } from "./Vector2.js";

export class Sprite {
    constructor({
        resource,
        frameSize,
        hFrames,
        vFrames,
        frame,
        scale,
        position,
    }) {
        this.resource = resource;
        this.frameSize = frameSize ?? new Vector2(16, 16);
        this.hFrames = hFrames ?? 1;
        this.vFrames = vFrames ?? 1;
        this.frame = frame ?? 0;
        this.frameMap = new Map();
        this.scale = scale ?? 1;
        this.position = position ?? new Vector2(0, 0);
        this.buildFrameMap();
    }

    buildFrameMap() {
        let frameCount = 0;
        for (let v=0; v<this.vFrames; v++) {
            for (let h=0; h<this.hFrames; h++) {
                this.frameMap.set(
                    frameCount,
                    new Vector2(this.frameSize.x * h, this.frameSize.y * v),
                )
                frameCount++;
            }
        }
    }

    drawImage(ctx, x, y) {
        // Check if resource is loaded
        if (!this.resource.isLoaded) {
            return;
        }

        // Find the correct sprite sheet frame to use
        let frameCoordX = 0;
        let frameCoordY = 0;
        const frame = this.frameMap.get(this.frame);
        if (frame) {
            frameCoordX = frame.x;
            frameCoordY = frame.y;
        }

        const frameSizeX = this.frameSize.x;
        const frameSizeY = this.frameSize.y;

        ctx.drawImage(
            this.resource.image,
            frameCoordX,
            frameCoordY, // Top Y corner of the frame
            frameSizeX, // How much to crop from sprite sheet (X)
            frameSizeY, // How much to crop from sprite sheet (Y)
            x, // Where to place this on the canvas
            y, // Where to place this on the canvas
            frameSizeX * this.scale, // How large to scale it
            frameSizeY * this.scale, // How large to scale it
        );
    }
}