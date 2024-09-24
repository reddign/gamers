// Todo: finish

export class Sprite {
    constructor({
        resource,
        framesize,
        hFrames,
        vFrames,
        frame,
        scale,
        position,
    }) {
        this.resource = resource;
        this.framesize = framesize;
        this.hFrames = hFrames ?? 1;
        this.vFrames = vFrames ?? 1;
        this.frame = frame ?? 0;
        this.frameMap = new Map();
        this.scale = scale ?? 1;
        this.position = position;
    }

    buildFrameMap() {
        let frameCount = 0;
        for (let v=0; v<this.vFrames; v++) {
            for (let h=0; h<this.hFrames; h++) {
                console.log("frame", h, v)
            }
        }
    }
}