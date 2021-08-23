import {
	// фоновые картинки
	l1_sky,
	l2_clouds,
	l3_pyramid,
	l4_bg_ground01,
	l5_bg_ground02,
	l6_bg_ground03,
	l7_ground,
	// главный герой
	Angels,
	Angels_Jump,
	Angels_Hurt,
	// враги
	Pussy,
	PussyAttack,
	PussyStop,
	// аудио файлы
	Jump,
	Death,
	theme1
} from './assetsLinks.js';

import {loadStaticImage, loadSpriteImage} from './loadImages';
import loadAudio from './loadAudio';

const winWidth = document.body.clientWidth;
const winHeight = document.body.clientHeight;

// настройки игры и canvas
export const GAME = {
	ctx: null,
	winWidth: winWidth,
	winHeight: winWidth,

	// координа на которой расположены персонажы
	y_positionLine: winHeight - 220 - 120,
	// сколько всего картинок
	allCount: 0,
	// сколько загрузилось
	loadCount: 0,
	// выравнивание картинок исходя из пропорций экрана
	yPosBg: winHeight <= 1080 ? winHeight - 1080 : 1080 - winHeight,
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
	}
}

// фоновые картинки
export const BG = [
	{
		path: loadStaticImage(l1_sky),
	},
	{
		path: loadStaticImage(l2_clouds),
	},
	{
		path: loadStaticImage(l3_pyramid),
	},
	{
		path: loadStaticImage(l4_bg_ground01),
		x: 0,
		x2: winWidth,
		frame: true,
		speed: 40,
	},
	{
		path: loadStaticImage(l5_bg_ground02),
		x: 0,
		x2: winWidth,
		frame: true,
		speed: 20,
	},
	{
		path: loadStaticImage(l6_bg_ground03),
		x: 0,
		x2: winWidth,
		frame: true,
		speed: 10,
	},
	{
		path: loadStaticImage(l7_ground),
		x: 0,
		x2: winWidth,
		frame: true,
		speed: 1,
	}
];

// главный герой
export const HERO = {
	img: {
		run: loadSpriteImage(Angels, 129, 150, 12, 1),
		jump: loadSpriteImage(Angels_Jump, 129, 150, 6, 1),
		hurt: loadSpriteImage(Angels_Hurt, 129, 150, 1, 1),
	},
	position: {
		x: 65,
		y: GAME.y_positionLine,
	},
	event: {
		run: true,
		jump: false
	}
};

// пиздюки
export const PUSSY = {
	run: loadSpriteImage(Pussy, 129, 150, 12, 6),
	attack: loadSpriteImage(PussyAttack, 182, 150, 1, 1),
	stop: loadSpriteImage(PussyStop, 129, 150, 1, 1),
	enemy: [
		{
			x: 1280 + GAME.random(640, 1400),
			y: GAME.y_positionLine,
			distance: GAME.random(14, 15) / 10,
			attack: false
		},
		{
			x: 1280 + GAME.random(1400, 2160),
			y: GAME.y_positionLine,
			distance: GAME.random(14, 15) / 10,
			attack: false
		},
		{
			x: 1280 + GAME.random(2160, 2920),
			y: GAME.y_positionLine,
			distance: GAME.random(14, 15) / 10,
			attack: false
		}
	]
};

// аудио файлы
export const AUDIO = {
	Jump: loadAudio([Jump], 0.4),
	Dead: loadAudio([Death], 0.1),
	Theme1: loadAudio([theme1], 0.4),
};