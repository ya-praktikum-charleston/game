import React from 'react';
import './game.css';

import loadStaticImage from './loadStaticImage';
import loadSpriteImage from './loadSpriteImage';
import loadAudio from './loadAudio';
import jump from './jump';
import draw from './draw';

function Game() {

	const gameBannerRef = React.useRef(false);
	const canvasRef = React.useRef(false);
	
	React.useEffect(() => {
		const ctx = canvasRef.getContext("2d");

		const winWidth = document.body.clientWidth;
		const winHeight = document.body.clientHeight;

		canvasRef.width = winWidth;
		canvasRef.height = winHeight;

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

		// координа на которой расположены персонажы
		const y_positionLine = winHeight - 220 - 120;
		// сколько всего картинок
		let allCount = 11;
		// сколько загрузилось
		let loadCount = 0;
		// выравнивание картинок исходя из пропорций экрана
		let yPosBg = winHeight <= 1080 ? winHeight - 1080 : 1080 - winHeight;
		// скорость игры
		let speed = 8;
		// балансная переменная для увеличения скорости игры
		let scoreCounter = 0;
		// счёт в игре
		let score = 0;
		// игра остановлена
		let isGameStopped = false;
		// разрешает воспроизведение аудио файлов
		let audioPlayed = true;

		// фоновые картинки
		const BG = [
			{
				path: loadStaticImage('img/l1_sky.png'),
			},
			{
				path: loadStaticImage('img/l2_clouds.png'),
			},
			{
				path: loadStaticImage('img/l3_pyramid.png'),
			},
			{
				path: loadStaticImage('img/l4_bg-ground01.png'),
				x: 0,
				x2: winWidth,
				frame: true,
				speed: 40,
			},
			{
				path: loadStaticImage('img/l5_bg-ground02.png'),
				x: 0,
				x2: winWidth,
				frame: true,
				speed: 20,
			},
			{
				path: loadStaticImage('img/l6_bg-ground03.png'),
				x: 0,
				x2: winWidth,
				frame: true,
				speed: 10,
			},
			{
				path: loadStaticImage('img/l7_ground.png'),
				x: 0,
				x2: winWidth,
				frame: true,
				speed: 1,
			}
		]

		// главный герой
		const HERO = {
			img: {
				run: loadSpriteImage('img/Angels.png', 129, 150, 12, 1),
				jump: loadSpriteImage('img/Angels_Jump.png', 129, 150, 6, 1),
				hurt: loadSpriteImage('img/Angels_Hurt.png', 129, 150, 1, 1),
			},
			position: {
				x: 65,
				y: y_positionLine,
			},
			event: {
				run: true,
				jump: false
			}
		}

		// пиздюки
		const PUSSY = {
			run: loadSpriteImage('img/Pussy.png', 129, 150, 12, 6),
			attack: loadSpriteImage('img/PussyAttack.png', 182, 150, 1, 1),
			stop: loadSpriteImage('img/PussyStop.png', 129, 150, 1, 1),
			enemy: [
				{
					x: 1280 + random(640, 1400),
					y: y_positionLine,
					distance: random(14, 15) / 10,
					attack: false
				},
				{
					x: 1280 + random(1400, 2160),
					y: y_positionLine,
					distance: random(14, 15) / 10,
					attack: false
				},
				{
					x: 1280 + random(2160, 2920),
					y: y_positionLine,
					distance: random(14, 15) / 10,
					attack: false
				}
			]
		}

		// расстояние между врагами выставляется рандомно
		function random(min, max) {
			const rand = min + Math.random() * (max + 1 - min);
			return Math.floor(rand)
		}

		// запись рекорда в игре
		let localStorageRecord = 0; // взять рекорд из localStorage
		let localRecord = 0;
		if (localStorage.getItem("localStorageRecord")) {
			localStorageRecord = localStorage.getItem("localStorageRecord")
		}

		// аудио файлы
		const audioJump = loadAudio(['audio/Jump.wav'], 0.4);
		const audioDead = loadAudio(['audio/Death.wav'], 0.1);
		const audioTheme1 = loadAudio(['audio/theme1.mp3'], 0.4);

		// добавление события клика мыши
		document.addEventListener("mousedown", () => {
			jump();
			audioTheme1.play();
		});
		// добавление события нажатия пробела
		document.addEventListener("keydown", (event) => {
			if (event.keyCode === 32) {
				jump();
				audioTheme1.play();
			}
		});
		
		// дожидаемся загрузки всех изображений	
		let int = setInterval(function () {
		    if(allCount === loadCount){
		        // console.log('Все картинки загружены', allCount , loadStaticImage);
		        clearInterval(int);
				draw();
		    }
		},1000/60);

		// удаление событий клавиатуры и мыши
		return () => {
			window.removeEventListener("mousedown", () => {
				jump();
				audioTheme1.play();
			});
			window.removeEventListener("keydown", (event) => {
				if (event.keyCode === 32) {
					jump();
					audioTheme1.play();
				}
			});
		};
	});

	return (
		<div className="game">

			<canvas id="canvas" ref={canvasRef}></canvas>

			<div className="game_banner hidden" ref={gameBannerRef}>
				<div className="game_banner_main">
					<h2>GameOver</h2>
					<p>Чтобы повторить <br/>жми 32 или mousedown</p>
				</div>
			</div>
		</div>
	);
};

export default Game;
