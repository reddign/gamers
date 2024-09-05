document.addEventListener('DOMContentLoaded', function () {
    const bird = document.getElementById('bird');

    let gravity = 50;
    let playerpos = 0;
    let grounded = true;
    let vspeed = 0;

    function jump() {
        if (grounded == true) {
            vspeed = 500;
        }
    }

    function gameLoop() {
        if (grounded == false) {
            vspeed -= gravity;
        }

        playerpos += vspeed;

        if (grounded == true) {
            vspeed = 0;
        }
        bird.style.bottom = playerpos + 'px';
    }

    document.addEventListener('keydown', jump);
    gameLoop();
});