import React from 'react';
import './game.css';

import GAME from './media/js/parameters';
import {loadStaticImage, loadSpriteImage} from './media/js/loadImages';
import loadAudio from './media/js/loadAudio';
import jump from './media/js/jump';
import draw from './media/js/draw';

import {
	l1_sky,
	l2_clouds,
	l3_pyramid,
	l4_bg_ground01,
	l5_bg_ground02,
	l6_bg_ground03,
	l7_ground,
	Angels,
	Angels_Jump,
	Angels_Hurt,
	Pussy,
	PussyAttack,
	PussyStop,
	Jump,
	Death,
	theme1
} from './assetsLink.js';

function Game() {

	const canvasRef = React.useRef(false);
	const gameBannerRef = React.useRef(false);
	

	React.useEffect(() => {
		if(canvasRef.current && gameBannerRef.current){
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

			canvasRef.current.width = GAME.winWidth;
			canvasRef.current.height = GAME.winHeight;

			GAME.ctx = canvasRef.current.getContext("2d");

			GAME.y_positionLine = GAME.winHeight - 220 - 120;
			GAME.yPosBg = GAME.winHeight <= 1080 ? GAME.winHeight - 1080 : 1080 - GAME.winHeight;

			GAME.dom = {
				canvas: canvasRef,
				gameBanner: gameBannerRef
			}

			GAME.BG = [
				{
					path: loadStaticImage(l1_sky, GAME),
				},
				{
					path: loadStaticImage(l2_clouds, GAME),
				},
				{
					path: loadStaticImage(l3_pyramid, GAME),
				},
				{
					path: loadStaticImage(l4_bg_ground01, GAME),
					x: 0,
					x2: GAME.winWidth,
					frame: true,
					speed: 40,
				},
				{
					path: loadStaticImage(l5_bg_ground02, GAME),
					x: 0,
					x2: GAME.winWidth,
					frame: true,
					speed: 20,
				},
				{
					path: loadStaticImage(l6_bg_ground03, GAME),
					x: 0,
					x2: GAME.winWidth,
					frame: true,
					speed: 10,
				},
				{
					path: loadStaticImage(l7_ground, GAME),
					x: 0,
					x2: GAME.winWidth,
					frame: true,
					speed: 1,
				}
			];

			GAME.HERO = {
				img: {
					run: loadSpriteImage(Angels, 129, 150, 12, 1, GAME),
					jump: loadSpriteImage(Angels_Jump, 129, 150, 6, 1, GAME),
					hurt: loadSpriteImage(Angels_Hurt, 129, 150, 1, 1, GAME),
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

			GAME.PUSSY = {
				run: loadSpriteImage(Pussy, 129, 150, 12, 6, GAME),
				attack: loadSpriteImage(PussyAttack, 182, 150, 1, 1, GAME),
				stop: loadSpriteImage(PussyStop, 129, 150, 1, 1, GAME),
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

			GAME.audio = {
				Jump: loadAudio([Jump], 0.4),
				Dead: loadAudio([Death], 0.1),
				Theme1: loadAudio([theme1], 0.4),
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
				if(GAME.allCount === GAME.loadCount){
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
		}
	}, []);

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
