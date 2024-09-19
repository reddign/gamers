class Resources {
    constructor() {
        // Everything we plan to download
        this.toLoad = {
            map: "./sprites/betamap.jpg",
            student: "./sprites/student.png",
            student_cupcake: "./sprites/student_cupcake.png",
            squirrel: "./sprites/enemysquirrel.png"
        };

        this.images = {};

        // Load each image
        Object.keys(this.toLoad).forEach(key => {
            const img = new Image();
            img.src = this.toLoad[key];
            this.images[key] = {
                image: img,
                isLoaded: false
            }
            img.onload = () => {
                this.images[key].isLoaded = true;
            }
        })
    }
}

export const resources = new Resources();