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
	Angels_Stand,
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
import drawRunner from './drawRunner';

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
	allCount: 14,
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
	// цвет счёта в игре
	scoreColor: '#000000',
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
	random: (range) => {
		const min = range[0],
			  max = range[1];
		const rand = min + Math.random() * (max + 1 - min);
		return Math.floor(rand)
	},
	// используется для остановки requestAnimationFrame
	requestId: null
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
		run: loadSpriteImage(Angels, 128.58333, 150, 12, 1),
		jump: loadSpriteImage(Angels_Jump, 128.5, 150, 6, 1),
		hurt: loadSpriteImage(Angels_Hurt, 129, 150, 1, 1),
		stand: loadSpriteImage(Angels_Stand, 128.5555555555556, 150, 18, 5),
	},
	position: {
		x: 65,
		y: GAME.y_positionLine,
	},
	event: {
		run: false,
		jump: false
	}
};

// пиздюки
const pussyDistance = [[640, 1400], [1400, 2160], [2160, 2920]];

export const PUSSY = {
	run: loadSpriteImage(Pussy, 128.58333, 150, 12, 6),
	attack: loadSpriteImage(PussyAttack, 182, 150, 1, 1),
	stop: loadSpriteImage(PussyStop, 129, 150, 1, 1),
	enemy: [
		{
			x: 1280 + GAME.random(pussyDistance[0]),
			y: GAME.y_positionLine,
			distance: GAME.random([14, 15]) / 10,
			attack: false
		},
		{
			x: 1280 + GAME.random(pussyDistance[1]),
			y: GAME.y_positionLine,
			distance: GAME.random([14, 15]) / 10,
			attack: false
		},
		{
			x: 1280 + GAME.random(pussyDistance[2]),
			y: GAME.y_positionLine,
			distance: GAME.random([14, 15]) / 10,
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

// проверка localStorage на наличия рекорда в игре
if (localStorage.getItem("localStorageRecord")) {
	GAME.localStorageRecord = localStorage.getItem("localStorageRecord");
}

// определяем requestAnimationFrame для конкретного браузера. Если ничего нет - возвращаем обычный таймер
window.requestAnimFrame = (function(){
	return  window.requestAnimationFrame       ||
		window.webkitRequestAnimationFrame ||
		window.mozRequestAnimationFrame    ||
		window.oRequestAnimationFrame      ||
		window.msRequestAnimationFrame     ||
		function(/* function */ callback, /* DOMElement */ element){
			window.setTimeout(callback, 1000 / 60);
		};
})();

export function restart(){
	window.cancelAnimationFrame(GAME.requestId);

	GAME.y_positionLine = winHeight - 220 - 120,
	GAME.loadCount = 0;
	GAME.yPosBg = winHeight <= 1080 ? winHeight - 1080 : 1080 - winHeight,
	GAME.speed = 8;
	GAME.scoreCounter = 0;
	GAME.score = 0;
	GAME.isGameStopped = false;
	GAME.localStorageRecord = localStorage.getItem("localStorageRecord");
	GAME.localRecord = 0;
	GAME.audioPlayed = true;
		
	// сброс BG
	for(let i = 0; i < BG.length; i++){
		if(BG[i].frame){
			BG[i].x = 0;
			BG[i].x2 = GAME.winWidth;
		}
	}
	// сброс PUSSY
	for(let i = 0; i < PUSSY.enemy.length;i++){
		PUSSY.enemy[i].x = 1280 + GAME.random(pussyDistance[i]);
		PUSSY.enemy[i].y = GAME.y_positionLine;
		PUSSY.enemy[i].distance = GAME.random([14, 15]) / 10;
		PUSSY.enemy[i].attack = false;
	}

	HERO.position.x = 65; 
	HERO.position.y =  GAME.y_positionLine; 
	HERO.event.run = true;
	HERO.event.jump = false;

	GAME.dom.gameBanner.current.classList.add("hidden");
}