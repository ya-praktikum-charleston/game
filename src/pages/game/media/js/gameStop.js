export default function gameStop() {
    speed = 0;
    isGameStopped = true;
    HERO.event.run = false;

    gameBannerRef.classList.remove("hidden");

    // остановить аудио
    if(audioPlayed){
        audioDead.play();
        audioPlayed = false;
    }

    audioTheme1.stop();

    // запись нового рекорда
    if( localRecord > localStorageRecord ){
        let record = Math.floor(score);
        localStorage.setItem("localStorageRecord", record);
        localStorageRecord = record;
    }
}
