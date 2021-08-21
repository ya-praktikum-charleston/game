export default function gameStop(GAME) {
    const {
        speed, 
        score, 
        isGameStopped, 
        localStorageRecord, 
        localRecord,
        HERO,
        audioPlayed,
        audio,
        dom
    } = GAME;

    speed = 0;
    isGameStopped = true;
    HERO.event.run = false;

    dom.gameBanner.classList.remove("hidden");

    // остановить аудио
    if(audioPlayed){
        audio.Dead.play();
        audio.Played = false;
    }

    audio.Theme1.stop();

    // запись нового рекорда
    if( localRecord > localStorageRecord ){
        let record = Math.floor(score);
        localStorage.setItem("localStorageRecord", record);
        localStorageRecord = record;
    }
}
