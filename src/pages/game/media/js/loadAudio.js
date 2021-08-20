/** Функция добавления любого количества аудио файлов
 * @arr {string} массив с путям аудио файла в различных форматах
 * @vol {number} уровень громкости
 */
 export default function loadAudio(arr, vol = 1) {
    const audio = document.createElement('audio');
    for (let i = 0, len = arr.length; i < len; i += 1) {
        let source = document.createElement('source');
        source.src = arr[i];
        audio.appendChild(source);
    }
    audio.volume = vol;
    const track = {
        dom: false,
        state: 'stop',
        play: function () {
            this.dom.play();
            this.state = 'play';
        },
        restart: function () {
            audio.currentTime = 0;
            this.dom.play();
            this.state = 'play';
        },
        pause: function () {
            audio.pause();
            this.state = 'pause';
        },
        stop: function () {
            audio.pause();
            audio.currentTime = 0;
            this.state = 'stop';
        },
        setVolume: function (vol) {
            this.dom.volume = vol;
        }
    }
    track.dom = audio;
    return track;
}
