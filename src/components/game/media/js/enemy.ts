import { SlowBuffer } from 'buffer';
import { SpriteImage } from './types';

type SkinsHeroType = {
    angel1: number;
    angel2: number;
    angel3: number;
    angel4: number;
}

const skinsHero: SkinsHeroType = {
    angel1: 0,
    angel2: 200,
    angel3: 400,
    angel4: 600,
};

const offsetStep = [0, 200, 400, 600, 800];

export class Enemy {
    x: number;

    y: number;

    vy: number;

    jumpTimer: number;

    grounded: boolean;

    jumpForce: number;

    ctx: CanvasRenderingContext2D | null;

    actionRun: boolean;

    actionJump: boolean;

    gravity: number;

    canvas: HTMLCanvasElement;

    skins: {
        run: SpriteImage | undefined,
        jump: SpriteImage | undefined,
        hurt: SpriteImage | undefined,
        stand: SpriteImage | undefined,
    };

    skinHero: string;

    constructor(x, y, speed, canvas: HTMLCanvasElement, ctx: CanvasRenderingContext2D | null, skin, typeSkin) {
        this.w = 136;
        this.h = 136;
        this.x = x;
        this.speed = speed;
        this.dx = -speed;
        this.canvas = canvas;
        this.y = this.canvas.height - this.h * 2.7;
        this.ctx = ctx;
        this.jumpTimer = 0;
        this.skinHero = 'angel1';
        this.typeSkin = typeSkin;
        this.skins = {
            run: skin,
            jump: undefined,
            hurt: undefined,
            stand: undefined,
        };
        this.actions = {
            run: true,
            jump: false,
            hurt: false,
            stand: false,
        };
    }

    Move(): void {
        //const offset: number = skinsHero[this.skinHero];
        this.x += this.dx;
        this.Show();
        this.dx = -this.speed;
    }

    Jump(): void {
        if (this.grounded && this.jumpTimer === 0) {
            this.jumpTimer = 1;
            this.vy = -this.jumpForce;
        } else if (this.jumpTimer > 0 && this.jumpTimer < this.jumpForce + 10) {
            this.jumpTimer += 1;
            this.vy = -this.jumpForce - (this.jumpTimer / 100);
        } else if (this.grounded) {
            console.log('stoooop')
            //this.actions.jump = false;
            //this.actions.run = true;
        }
    }

    Show(): void {
        this.Draw(this.skins.run, this.x, this.y, 200);
    }

    Draw(sprite: SpriteImage | undefined, x: number, y: number, offset: number) {
        sprite.tickCount += this.speed / 20;
        if (sprite.tickCount > sprite.ticksFrame) {
            sprite.tickCount = 0;
            if (sprite.frameIndex < sprite.colFrames - 1) {
                sprite.frameIndex += 1;
            } else {
                sprite.frameIndex = 0;
            }
        }
        // отрисовка изображения на canvas
        this.ctx?.drawImage(
            sprite.dom,
            sprite.frameIndex * sprite.width,
            0 + offset,
            sprite.width,
            sprite.height,
            x,
            y,
            sprite.width,
            sprite.height,
        );
    }
}
