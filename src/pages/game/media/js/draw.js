import GAME from './parameters';
import drawImage from './drawImage';
import gameStop from './gameStop';


export default function draw() {

    GAME.ctx.clearRect(0, 0, GAME.winWidth, GAME.winHeight);

    // отрисовка фоновых картинок
    for(let i = 0; i < GAME.BG.length; i++){
        // если изображение движется
        if(GAME.BG[i].frame){
            GAME.ctx.drawImage(GAME.BG[i].path, GAME.BG[i].x, GAME.yPosBg);
            GAME.ctx.drawImage(GAME.BG[i].path, GAME.BG[i].x2, GAME.yPosBg);

            // parallax
            if( GAME.BG[i].speed ){
                GAME.BG[i].x -= GAME.speed / GAME.BG[i].speed;
                GAME.BG[i].x2 -= GAME.speed / GAME.BG[i].speed;
            }

            // спрайт фоновых картинок
            if( GAME.BG[i].x < -GAME.winWidth ){
                GAME.BG[i].x = GAME.BG[i].x2 + GAME.winWidth;
            }
            if( GAME.BG[i].x2 < -GAME.winWidth ){
                GAME.BG[i].x2 = GAME.BG[i].x + GAME.winWidth;
            }
        }else{
            GAME.ctx.drawImage(GAME.BG[i].path, 0, GAME.yPosBg);
        }
    }

    // отрисовка врагов
    if(!GAME.isGameStopped){
        for(let i = 0; i < GAME.PUSSY.enemy.length;i++){
            // отрисовка врага
            drawImage(GAME.PUSSY.run, GAME.PUSSY.enemy[i].x, GAME.PUSSY.enemy[i].y, GAME);

            // новые координаты для следующей отрисовки
            GAME.PUSSY.enemy[i].x -= GAME.speed * GAME.PUSSY.enemy[i].distance;

            // ушедший за левый экран враг, респаунится за правым экраном
            if( GAME.PUSSY.enemy[i].x + GAME.PUSSY.run.width < -40 ) {
                let key;
                // нужно взять кординату х ушедшего i за левый экран и установть рандомно от последнего не ушедшего за левый экран
                (i === 0) ? key = GAME.PUSSY.enemy.length - 1 : key = i - 1;
                GAME.PUSSY.enemy[i].x = GAME.PUSSY.enemy[key].x + GAME.random(600, 1400);
                GAME.PUSSY.enemy[i].distance = (GAME.random(14, 16) / 10 + 1) / 2;

                // враги не должны держаться вместе
                if ( GAME.PUSSY.enemy[i].x - GAME.PUSSY.enemy[key].x < (GAME.speed + 2) * 28 + 80 ){
                    GAME.PUSSY.enemy[i].distance = GAME.PUSSY.enemy[key].distance;
                }
            }
        }
    }else {
        for(let i = 0; i < GAME.PUSSY.enemy.length;i++){
           if(GAME.PUSSY.enemy[i].attack){
               drawImage(GAME.PUSSY.attack, GAME.PUSSY.enemy[i].x, GAME.PUSSY.enemy[i].y, GAME);
           }else{
               drawImage(GAME.PUSSY.stop, GAME.PUSSY.enemy[i].x, GAME.PUSSY.enemy[i].y, GAME);
           }
        }
    }

    // Варианты отрисовки главного героя
    if(GAME.HERO.event.run){
        drawImage(GAME.HERO.img.run, GAME.HERO.position.x, GAME.HERO.position.y, GAME);
    }
    if(GAME.HERO.event.jump){
        drawImage(GAME.HERO.img.jump, GAME.HERO.position.x, GAME.HERO.position.y, GAME);
    }
    if(GAME.isGameStopped){
        drawImage(GAME.HERO.img.hurt, GAME.HERO.position.x, GAME.HERO.position.y, GAME);
    }

    //Увеличение скорости при увеличении счёта
    if(GAME.score - GAME.scoreCounter > 50){
        GAME.speed += 2;
        GAME.scoreCounter = GAME.score;
    }

    // увеличение скорости игры
    GAME.score += GAME.speed / 100;

    // рекорд в игре
    if (GAME.score > GAME.localRecord) {
        GAME.localRecord = Math.floor(GAME.score);
    }

    // калибровка
    const calibration = 40;

    // столкновение героя и врага
    for(let i = 0; i < GAME.PUSSY.enemy.length;i++){
        // фронтальное столкновение
        if ( GAME.HERO.position.x + GAME.HERO.img.run.width - calibration > GAME.PUSSY.enemy[i].x + calibration ) {
            // столкновение сверху после прыжка
            if ( GAME.HERO.position.y + GAME.HERO.img.run.height > GAME.PUSSY.enemy[i].y + calibration ) {
                // столкновение при приземлении, чтобы жопа не отхватила
                if ( GAME.HERO.position.x + calibration*2 < GAME.PUSSY.enemy[i].x + GAME.PUSSY.run.width - calibration ) {
                    GAME.PUSSY.enemy[i].attack = true;
                    gameStop();
                }
            }
        }
    }

    // статистика
    GAME.ctx.fillText(`Счёт: ${Math.floor(GAME.score)}`, 10, 50);
    GAME.ctx.fillText(`Рекорд: ${GAME.localStorageRecord}`, 10, 100);
	GAME.ctx.font = "50px Arial";

    requestAnimationFrame(draw)

}
