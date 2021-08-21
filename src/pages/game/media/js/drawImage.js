/** Эта функция отрисовывает любые изображения
 * @img {string} загруженное изображение
 * @x {number} координа картинки по x
 * @y {number} координа картинки по y
 */
 export default function drawImage(img, x, y, GAME){
    // частота обновления кадров для данной картинки
    img.tickCount++;
    if (img.tickCount > img.ticksFrame) {
        img.tickCount = 0;
        if (img.frameIndex < img.colFrames - 1) {
            img.frameIndex++;
        } else {
            img.frameIndex = 0;
        }
    }
    // отрисовка изображения на canvas
    GAME.ctx.drawImage(
        img.dom,
        img.frameIndex * img.width,
        0,
        img.width,
        img.height,
        x,
        y,
        img.width,
        img.height
    )
}
