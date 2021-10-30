import { SpriteImage, Game } from './types';
/** Загрузка изображений не требующих наличия параметров
 * @path {string} путь до картинки
 */
export function loadStaticImage(path: string, GAME: Game): HTMLImageElement {
    const image = document.createElement('img');
    image.onload = () => {
        GAME.loadCount += 1;
    };
    image.src = path;
    return image;
}

/** Загрузка спрайтовых изображений или изображений одного кадра
 * @path {string} путь до картинки
 * @width {number} ширина картинки
 * @height {number} высота картинки
 * @colFrames {number} количество кадров в спрайте
 * @ticksFrame {number} частота обновления (каждый кадр или например 1 раз в 4 кадра)
 */
export function loadSpriteImage(
    path: string,
    width: number,
    height: number,
    colFrames: number,
    ticksFrame: number,
    GAME,
): SpriteImage {
    const image = document.createElement('img');
    const result = {
        dom: image,
        width,
        height,
        colFrames,
        ticksFrame,
        tickCount: 0, // счётчик для ticksFrame
        frameIndex: 0, // какой кадр показывать
    };
    image.onload = () => {
        GAME.loadCount += 1;
    };
    image.src = path;
    return result;
}
