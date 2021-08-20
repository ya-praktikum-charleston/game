import jump from './jump';
import drawImage from './drawImage';
import gameStop from './gameStop';


export default function draw() {

    ctx.clearRect(0, 0, winWidth, winHeight);

    // отрисовка фоновых картинок
    for(let i = 0; i < BG.length; i++){
        // если изображение движется
        if(BG[i].frame){
            ctx.drawImage(BG[i].path, BG[i].x, yPosBg);
            ctx.drawImage(BG[i].path, BG[i].x2, yPosBg);

            // parallax
            if( BG[i].speed ){
                BG[i].x -= speed / BG[i].speed;
                BG[i].x2 -= speed / BG[i].speed;
            }

            // спрайт фоновых картинок
            if( BG[i].x < -winWidth ){
                BG[i].x = BG[i].x2 + winWidth;
            }
            if( BG[i].x2 < -winWidth ){
                BG[i].x2 = BG[i].x + winWidth;
            }
        }else{
            ctx.drawImage(BG[i].path, 0, yPosBg);
        }
    }

    // отрисовка врагов
    if(!isGameStopped){
        for(let i = 0; i < PUSSY.enemy.length;i++){
            // отрисовка врага
            drawImage(PUSSY.run, PUSSY.enemy[i].x, PUSSY.enemy[i].y);

            // новые координаты для следующей отрисовки
            PUSSY.enemy[i].x -= speed * PUSSY.enemy[i].distance;

            // ушедший за левый экран враг, респаунится за правым экраном
            if( PUSSY.enemy[i].x + PUSSY.run.width < -40 ) {
                let key;
                // нужно взять кординату х ушедшего i за левый экран и установть рандомно от последнего не ушедшего за левый экран
                (i === 0) ? key = PUSSY.enemy.length - 1 : key = i - 1;
                PUSSY.enemy[i].x = PUSSY.enemy[key].x + random(600, 1400);
                PUSSY.enemy[i].distance = (random(14, 16) / 10 + 1) / 2;

                // враги не должны держаться вместе
                if ( PUSSY.enemy[i].x - PUSSY.enemy[key].x < (speed + 2) * 28 + 80 ){
                    PUSSY.enemy[i].distance = PUSSY.enemy[key].distance;
                }
            }
        }
    }else {
        for(let i = 0; i < PUSSY.enemy.length;i++){
           if(PUSSY.enemy[i].attack){
               drawImage(PUSSY.attack, PUSSY.enemy[i].x, PUSSY.enemy[i].y);
           }else{
               drawImage(PUSSY.stop, PUSSY.enemy[i].x, PUSSY.enemy[i].y);
           }
        }
    }

    // Варианты отрисовки главного героя
    if(HERO.event.run){
        drawImage(HERO.img.run, HERO.position.x, HERO.position.y);
    }
    if(HERO.event.jump){
        drawImage(HERO.img.jump, HERO.position.x, HERO.position.y);
    }
    if(isGameStopped){
        drawImage(HERO.img.hurt, HERO.position.x, HERO.position.y);
    }

    //Увеличение скорости при увеличении счёта
    if(score - scoreCounter > 50){
        speed += 2;
        scoreCounter = score;
    }

    // увеличение скорости игры
    score += speed / 100;

    // рекорд в игре
    if (score > localRecord) {
        localRecord = Math.floor(score);
    }

    // калибровка
    const calibration = 40;

    // столкновение героя и врага
    for(let i = 0; i < PUSSY.enemy.length;i++){
        // фронтальное столкновение
        if ( HERO.position.x + HERO.img.run.width - calibration > PUSSY.enemy[i].x + calibration ) {
            // столкновение сверху после прыжка
            if ( HERO.position.y + HERO.img.run.height > PUSSY.enemy[i].y + calibration ) {
                // столкновение при приземлении, чтобы жопа не отхватила
                if ( HERO.position.x + calibration*2 < PUSSY.enemy[i].x + PUSSY.run.width - calibration ) {
                    PUSSY.enemy[i].attack = true;
                    gameStop();
                }
            }
        }
    }

    // статистика
    ctx.fillText(`Счёт: ${Math.floor(score)}`, 10, 50);
    ctx.fillText(`Рекорд: ${localStorageRecord}`, 10, 100);
	ctx.font = "50px Arial";

    requestAnimationFrame(draw)

}
