import React from 'react';
import './game.css';

import GAME from './media/js/parameters';
import {loadStaticImage, loadSpriteImage} from './media/js/loadImages';
import loadAudio from './media/js/loadAudio';
import jump from './media/js/jump';
import draw from './media/js/draw';

function Game() {

	const canvasRef = React.useRef(false);
	const gameBannerRef = React.useRef(false);
	

	React.useEffect(() => {

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

		canvasRef.width = GAME.winWidth;
		canvasRef.height = GAME.winHeight;

		GAME.ctx = canvasRef.getContext("2d");

		GAME.y_positionLine = GAME.winWidth - 220 - 120;
		GAME.yPosBg = GAME.winWidth <= 1080 ? GAME.winWidth - 1080 : 1080 - GAME.winWidth;

		GAME.dom = {
			canvas: canvasRef,
			gameBanner: gameBannerRef
		}

		GAME.BG = [
			{
				path: loadStaticImage('img/l1_sky.png', GAME),
			},
			{
				path: loadStaticImage('img/l2_clouds.png', GAME),
			},
			{
				path: loadStaticImage('img/l3_pyramid.png', GAME),
			},
			{
				path: loadStaticImage('img/l4_bg-ground01.png', GAME),
				x: 0,
				x2: GAME.winWidth,
				frame: true,
				speed: 40,
			},
			{
				path: loadStaticImage('img/l5_bg-ground02.png', GAME),
				x: 0,
				x2: GAME.winWidth,
				frame: true,
				speed: 20,
			},
			{
				path: loadStaticImage('img/l6_bg-ground03.png', GAME),
				x: 0,
				x2: GAME.winWidth,
				frame: true,
				speed: 10,
			},
			{
				path: loadStaticImage('img/l7_ground.png', GAME),
				x: 0,
				x2: GAME.winWidth,
				frame: true,
				speed: 1,
			}
		];
		
		GAME.HERO = {
			img: {
				run: loadSpriteImage('img/Angels.png', 129, 150, 12, 1, GAME),
				jump: loadSpriteImage('img/Angels_Jump.png', 129, 150, 6, 1, GAME),
				hurt: loadSpriteImage('img/Angels_Hurt.png', 129, 150, 1, 1, GAME),
			},
			position: {
				x: 65,
				y: y_positionLine,
			},
			event: {
				run: true,
				jump: false
			}
		};
		
		GAME.PUSSY = {
			run: loadSpriteImage('img/Pussy.png', 129, 150, 12, 6, GAME),
			attack: loadSpriteImage('img/PussyAttack.png', 182, 150, 1, 1, GAME),
			stop: loadSpriteImage('img/PussyStop.png', 129, 150, 1, 1, GAME),
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
		};
		
		GAME.audio = {
			Jump: loadAudio(['audio/Jump.wav'], 0.4),
			Dead: loadAudio(['audio/Death.wav'], 0.1),
			Theme1: loadAudio(['audio/theme1.mp3'], 0.4),
		};


		// проверка localStorage на наличия рекорда в игре
		if (localStorage.getItem("localStorageRecord")) {
			GAME.localStorageRecord = localStorage.getItem("localStorageRecord")
		}

		// добавление события клика мыши
		document.addEventListener("mousedown", () => {
			jump(GAME);
			GAME.audio.Theme1.play();
		});
		// добавление события нажатия пробела
		// document.addEventListener("keydown", (event) => {
		// 	if (event.keyCode === 32) {
		// 		jump();
		// 		audioTheme1.play();
		// 	}
		// });

		// дожидаемся загрузки всех изображений
		let int = setInterval(function () {
		    if(allCount === loadCount){
		        // console.log('Все картинки загружены', allCount , loadStaticImage);
		        clearInterval(int);
				draw(GAME);
		    }
		},1000/60);

		// удаление событий клавиатуры и мыши
		return () => {
			window.removeEventListener("mousedown", () => {
				jump(GAME);
				GAME.audio.Theme1.play();
			});
			// window.removeEventListener("keydown", (event) => {
			// 	if (event.keyCode === 32) {
			// 		jump();
			// 		audioTheme1.play();
			// 	}
			// });
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
