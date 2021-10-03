import { GAME, BG, HERO } from './parameters';
import drawImage from './drawImage';

export default function drawStatic(): void {
    GAME.ctx?.clearRect(0, 0, GAME.winWidth, GAME.winHeight);
    // отрисовка фоновых картинок
    const { level } = GAME;
    const _bg = BG[level];
    for (let i = 0; i < _bg.length; i += 1) {
        // если изображение движется
        if (_bg[i].frame) {
            GAME.ctx?.drawImage(_bg[i].path, _bg[i].x, GAME.yPosBg);
            GAME.ctx?.drawImage(_bg[i].path, _bg[i].x2, GAME.yPosBg);
        } else {
            GAME.ctx?.drawImage(_bg[i].path, 0, GAME.yPosBg);
        }
    }

    // Варианты отрисовки главного героя
    drawImage(HERO.img.stand, HERO.position.x, HERO.position.y);

    GAME.requestId = requestAnimationFrame(drawStatic);
}
