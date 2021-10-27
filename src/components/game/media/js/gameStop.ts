import { GAME, HERO, AUDIO } from './parameters';

export default function gameStop(): void {
    GAME.speed = 0;
    GAME.isGameStopped = true;
    HERO.event.run = false;
    GAME.dom.gameBanner.current?.classList.remove('hidden');
    document.exitPointerLock();
    // остановить аудио
    if (GAME.audioPlayed) {
        GAME.audioPlayed = false;
        AUDIO.Dead.play();
    }
    AUDIO.Theme1.stop();
    GAME.setLeaderboard(Math.floor(GAME.score));
    // запись нового рекорда
    if (GAME.localRecord > GAME.localStorageRecord) {
        const record = Math.floor(GAME.score);
        localStorage.setItem('localStorageRecord', String(record));
        GAME.localStorageRecord = record;
    }
}
