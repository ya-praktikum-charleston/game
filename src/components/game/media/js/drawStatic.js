import {GAME, BG, HERO} from './parameters';
import drawImage from './drawImage';

export default function drawStatic() {

    GAME.ctx.clearRect(0, 0, GAME.winWidth, GAME.winHeight);

    // отрисовка фоновых картинок
    for(let i = 0; i < BG.length; i++){
        // если изображение движется
        if(BG[i].frame){
            GAME.ctx.drawImage(BG[i].path, BG[i].x, GAME.yPosBg);
            GAME.ctx.drawImage(BG[i].path, BG[i].x2, GAME.yPosBg);
        }else{
            GAME.ctx.drawImage(BG[i].path, 0, GAME.yPosBg);
        }
    }

    // Варианты отрисовки главного героя
    drawImage(HERO.img.stand, HERO.position.x, HERO.position.y);
    
    GAME.requestId = requestAnimationFrame(drawStatic)

}
