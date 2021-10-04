import { GAME, HERO, AUDIO } from './parameters';

export default function gameStop(): void {
    GAME.speed = 0;
    GAME.isGameStopped = true;
    HERO.event.run = false;
    GAME.dom.gameBanner.current?.classList.remove('hidden');

    // остановить аудио
    if (GAME.audioPlayed) {
        GAME.audioPlayed = false;
        AUDIO.Dead.play();
    }
    const asd = {
        id: 123,
        login: 'userTest',
        avatar: '/path/to/avatar.jpg',
        point: GAME.localRecord,
    };
    cancelAnimationFrame(GAME.requestId);
    GAME.dom.action(asd);
    AUDIO.Theme1.stop();

    // запись нового рекорда
    if (GAME.localRecord > GAME.localStorageRecord) {
        const record = Math.floor(GAME.score);
        localStorage.setItem('localStorageRecord', String(record));
        GAME.localStorageRecord = record;
    }
}
