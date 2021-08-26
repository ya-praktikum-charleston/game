import { Track } from './types';

/** Функция добавления любого количества аудио файлов
 * @arr {string} массив с путями аудио файла в различных форматах
 * @vol {number} уровень громкости
 */
export default function loadAudio(arr: string[], vol: number = 1): Track {
    const audio = document.createElement('audio');
    for (let i = 0, len = arr.length; i < len; i += 1) {
        const source = document.createElement('source');
        source.src = arr[i];
        audio.appendChild(source);
    }
    audio.volume = vol;
    const track = {
        dom: audio,
        state: 'stop',
        play() {
            audio.play();
            this.state = 'play';
        },
        restart() {
            audio.currentTime = 0;
            audio.play();
            this.state = 'play';
        },
        pause() {
            audio.pause();
            this.state = 'pause';
        },
        stop() {
            audio.pause();
            audio.currentTime = 0;
            this.state = 'stop';
        },
        setVolume(_vol: number) {
            audio.volume = _vol;
        },
    };
    track.dom = audio;
    return track;
}
