export class Layer {
    constructor(sprite, speed, speedLayer, canvas_height, ctx) {
        this.sprite = sprite;
        this.x = 0;
        this.y = 0;
        this.w = 1920;
        this.canvas_height = canvas_height;
        this.h = 1080;
        this.speedLayer = speedLayer;
        this.speed = speed;
        this.ctx = ctx;
        this.speed = this.speed * this.speedLayer;
        debugger
    }

    update() {
        this.speed = this.speed * this.speedLayer;
        if (this.x <= -this.w) this.x = 0;
        this.x -= this.speed;
        this.x = this.x - this.speed;
        this.draw();
    }

    draw() {
        this.ctx?.drawImage(this.sprite, this.x, this.canvas_height - this.h);
        this.ctx?.drawImage(this.sprite, this.x + this.w, this.canvas_height - this.h);
    }
}
