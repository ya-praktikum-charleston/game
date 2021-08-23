import React from 'react';
import './game.css';

import {GAME, HERO, AUDIO, restart} from './media/js/parameters';
import jump from './media/js/jump';
import drawRunner from './media/js/drawRunner';


function GameRunner() {
	
	const canvasRef = React.useRef(false);
	const gameBannerRef = React.useRef(false);
	

	React.useEffect(() => {
		if(canvasRef.current && gameBannerRef.current){
			
			canvasRef.current.width = GAME.winWidth;
			canvasRef.current.height = GAME.winHeight;

			GAME.ctx = canvasRef.current.getContext("2d");
			GAME.dom = {
				canvas: canvasRef,
				gameBanner: gameBannerRef
			}
			HERO.event.run = true;

			// добавление события клика мыши
			document.addEventListener("mousedown", () => {
				jump();
			});
		
			// дожидаемся загрузки всех изображений
			let int = setInterval(function () {
				if(GAME.allCount === GAME.loadCount){
					// console.log('Все картинки загружены', allCount , loadStaticImage);
					restart();
					clearInterval(int);
					drawRunner();
				}
			},1000/60);

			// удаление событий мыши
			return () => {
				window.removeEventListener("mousedown", () => {
					jump();
				});
			};
		}
	}, []);

	const handleRestart = () => {	
		restart();
		drawRunner();
		AUDIO.Theme1.play();
	}

	return (
		<div className="game">

			<canvas id="canvas" ref={canvasRef}></canvas>

			<div className="game_banner hidden" ref={gameBannerRef}>
				<div className="game_banner_main">
					<h2>GameOver</h2>
					<p>Чтобы повторить <br/>жми 32 или mousedown</p>
					<button onClick={()=> handleRestart()}>Повторить</button>
				</div>
			</div>

		</div>
	);
};

export default GameRunner;
