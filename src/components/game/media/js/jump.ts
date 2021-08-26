import { GAME, HERO, AUDIO } from './parameters';

export default function jump() {
    if (GAME.jumping) {
        const {
            gravity,
            jumpTimer,
            jumpPower,
            y_positionLine,
        } = GAME;
        HERO.position.y = (0.5 * gravity * jumpTimer
            * jumpTimer - jumpPower * jumpTimer)
            + y_positionLine;
        GAME.jumpTimer += 1;

        if (HERO.position.y > y_positionLine) {
            HERO.position.y = y_positionLine;
            GAME.jumping = false;
        }
    }
    // если гамовер, при клике перезагрузить страницу
    // if (GAME.isGameStopped){
    //     document.location.reload();
    // }
}
