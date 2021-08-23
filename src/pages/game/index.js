import React from 'react';
import './game.css';

import {GAME, AUDIO} from './media/js/parameters';
import jump from './media/js/jump';
import draw from './media/js/draw';


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
			GAME.dom = {
				canvas: canvasRef,
				gameBanner: gameBannerRef
			}
			GAME.allCount = 13;

			// проверка localStorage на наличия рекорда в игре
			if (localStorage.getItem("localStorageRecord")) {
				GAME.localStorageRecord = localStorage.getItem("localStorageRecord")
			}

			// добавление события клика мыши
			document.addEventListener("mousedown", () => {
				jump();
				AUDIO.Theme1.play();
			});
			
			// дожидаемся загрузки всех изображений
			let int = setInterval(function () {
				if(GAME.allCount === GAME.loadCount){
					// console.log('Все картинки загружены', allCount , loadStaticImage);
					clearInterval(int);
					draw();
				}
			},1000/60);

			// удаление событий мыши
			return () => {
				window.removeEventListener("mousedown", () => {
					jump();
					AUDIO.Theme1.play();
				});
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
