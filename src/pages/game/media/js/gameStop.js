import GAME from './parameters';

export default function gameStop() {
    GAME.speed = 0;
    GAME.isGameStopped = true;
    GAME.HERO.event.run = false;

    GAME.dom.gameBanner.current.classList.remove("hidden");

    // остановить аудио
    if(GAME.audioPlayed){
        GAME.audio.Dead.play();
        GAME.audio.Played = false;
    }

    GAME.audio.Theme1.stop();

    // запись нового рекорда
    if( GAME.localRecord > GAME.localStorageRecord ){
        let record = Math.floor(GAME.score);
        localStorage.setItem("localStorageRecord", record);
        GAME.localStorageRecord = record;
    }
}
