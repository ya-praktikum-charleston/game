import { GAME, PUSSY } from './parameters';
import { SpriteImage } from './types';

/** Эта функция отрисовывает любые изображения
 * @img {string} загруженное изображение
 * @x {number} координа картинки по x
 * @y {number} координа картинки по y
 */

const offsetStep = [0, 200, 400, 600, 800];

export default function drawImage(
    img: SpriteImage,
    x: number,
    y: number,
    animationObject: string,
): void {
    let offset = 0;
    if (animationObject === 'hero') {
        if (GAME.heroName === 'angel1') {
            offset = 0;
        }
        if (GAME.heroName === 'angel2') {
            offset = 200;
        }
        if (GAME.heroName === 'angel3') {
            offset = 400;
        }
    }

    //if (animationObject.object === 'pussy') {
    //    const layer = PUSSY.enemy[animationObject.number].skin;
    //    offset = offsetStep[layer];
    //}

    // частота обновления кадров для данной картинки
    img.tickCount += 0.15;
    if (img.tickCount > img.ticksFrame) {
        img.tickCount = 0;
        if (img.frameIndex < img.colFrames - 1) {
            img.frameIndex += 1;
        } else {
            img.frameIndex = 0;
        }
    }
    // отрисовка изображения на canvas
    GAME.ctx?.drawImage(
        img.dom,
        img.frameIndex * img.width,
        0 + offset,
        img.width,
        img.height,
        x,
        y,
        img.width,
        img.height,
    );
}
