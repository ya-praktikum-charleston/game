const GAME = {
	ctx: null,
	winWidth: document.body.clientWidth,
	winHeight: document.body.clientHeight,

	// координа на которой расположены персонажы
	y_positionLine: 0,
	// сколько всего картинок
	allCount: 11,
	// сколько загрузилось
	loadCount: 0,
	// выравнивание картинок исходя из пропорций экрана
	yPosBg: 0,
	// скорость игры
	speed: 8,
	// балансная переменная для увеличения скорости игры
	scoreCounter: 0,
	// счёт в игре
	score: 0,
	// игра остановлена
	isGameStopped: false,
	// рекорд игры из localStorage
	localStorageRecord: 0,
	// рекодр набирающий значения в процессе игры
	localRecord: 0,
	// разрешает воспроизведение аудио файлов
	audioPlayed: true,
	// html элементы dom
	dom: {},
	// расстояние между врагами выставляется рандомно
	random: (min, max) => {
		const rand = min + Math.random() * (max + 1 - min);
		return Math.floor(rand)
	},
	// фоновые картинки
	BG: [],
	// главный герой
	HERO: {},
	// пиздюки
	PUSSY: {},
	// аудио файлы
	audio: {},
}

export default GAME;