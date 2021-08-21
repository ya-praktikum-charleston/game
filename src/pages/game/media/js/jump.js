export default function jump(GAME) {
    const {
        isGameStopped, 
        HERO,
        audio
    } = GAME;

    if ( HERO.position.y === y_positionLine) {
        HERO.event.run = false;
        HERO.event.jump = true;
        audio.Jump.restart();

        // сюда главное не дышать
        for (let i = 0; i < 2; i++) {
            setTimeout(() => {HERO.position.y -= 3*8*1.5;}, i * (1000 / 60)); // 3*8*1.5*2 = + 72
        }
        for (let i = 2; i < 4; i++) {
            setTimeout(() => {HERO.position.y -= 2*8*1.5;}, i * (1000 / 60)); // 2*8*1.5*2 = + 48
        }
        for (let i = 4; i < 11; i++) {
            setTimeout(() => {HERO.position.y -= 1*8*1.5;}, i * (1000 / 60)); // 1*8*1.5*7 = + 84
        }
        for (let i = 16; i < 25; i++) {
            setTimeout(() => {HERO.position.y += 1*8*1.5;}, i * (1000 / 60)); // 1*8*1.5*9 = - 108
        }
        for (let i = 25; i < 26; i++) {
            setTimeout(() => {HERO.position.y += 2*8*1.5;}, i * (1000 / 60)); // 2*8*1.5*1 = - 24
        }
        for (let i = 26; i < 28; i++) {
            setTimeout(() => {HERO.position.y += 3*8*1.5;}, i * (1000 / 60)); // 3*8*1.5*2 = 72
        }
        setTimeout(() => {
            HERO.event.run = true;
            HERO.event.jump = false;
        }, 27 * 1000 / 60);
    }
    // если гамовер, при клике перезагрузить страницу
    if (isGameStopped){
        document.location.reload();
    }
}
