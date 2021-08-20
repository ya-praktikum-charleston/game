/** Загрузка изображений не требующих наличия параметров
 * @path {string} путь до картинки
 */
 export default function loadStaticImage(path) {
    const image = document.createElement('img');
    image.onload = function () {
        loadCount++;
    }
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
 export default function loadSpriteImage(path, width, height, colFrames, ticksFrame,) {
    const image = document.createElement('img');
    const result = {
        dom: image,
        width: width,
        height: height,
        colFrames: colFrames,
        ticksFrame: ticksFrame,
        tickCount: 0,                   // счётчик для ticksFrame
        frameIndex: 0                   // какой кадр показывать
    }
    image.onload = function () {
        loadCount++;
        result.loaded = true;
    }
    image.src = path;
    return result;
}
