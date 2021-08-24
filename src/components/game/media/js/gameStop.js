import {GAME, HERO, AUDIO} from './parameters';

export default function gameStop() {
    GAME.speed = 0;
    GAME.isGameStopped = true;
    HERO.event.run = false;

    GAME.dom.gameBanner.current.classList.remove("hidden");

    // остановить аудио
    if(GAME.audioPlayed){
        GAME.audioPlayed = false;
        AUDIO.Dead.play();
    }

    AUDIO.Theme1.stop();

    // запись нового рекорда
    if( GAME.localRecord > GAME.localStorageRecord ){
        let record = Math.floor(GAME.score);
        localStorage.setItem("localStorageRecord", record);
        GAME.localStorageRecord = record;
    }
}
