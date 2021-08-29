/* eslint-disable camelcase */
import { GAME, HERO, AUDIO } from './parameters';

export default function jump(): void {
    if (GAME.jumpingStart && !GAME.isGameStopped) {
        AUDIO.Jump.restart();
        HERO.event.run = false;
        HERO.event.jump = true;
        GAME.jumpingStart = false;
    }
    if (GAME.jumping && !GAME.isGameStopped) {
        HERO.position.y = (0.5 * GAME.gravity * GAME.jumpTimer
            * GAME.jumpTimer - GAME.jumpPower * GAME.jumpTimer)
            + GAME.y_positionLine;
        GAME.jumpTimer += 1;

        if (HERO.position.y > GAME.y_positionLine) {
            HERO.position.y = GAME.y_positionLine;
            GAME.jumping = false;
            HERO.event.jump = false;
            HERO.event.run = true;
        }
    }
    // если гамовер, при клике перезагрузить страницу
    // if (GAME.isGameStopped){
    //     document.location.reload();
    // }
}
