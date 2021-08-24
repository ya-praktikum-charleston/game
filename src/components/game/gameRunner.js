import React from "react";
import "./game.css";

import { GAME, HERO, AUDIO, restart } from "./media/js/parameters";
import jump from "./media/js/jump";
import drawRunner from "./media/js/drawRunner";
import {
	GameOver,
	Smile
} from './media/js/assetsLinks';

function GameRunner({handleExittGame}) {
	const canvasRef = React.useRef(false);
	const gameBannerRef = React.useRef(false);

	React.useEffect(() => {
		if (canvasRef.current && gameBannerRef.current) {
			canvasRef.current.width = GAME.winWidth;
			canvasRef.current.height = GAME.winHeight;

			GAME.ctx = canvasRef.current.getContext("2d");
			GAME.dom = {
				canvas: canvasRef,
				gameBanner: gameBannerRef,
			};
			HERO.event.run = true;

			// добавление события клика мыши
			document.addEventListener("mousedown", () => {
				jump();
			});

			// дожидаемся загрузки всех изображений
			let int = setInterval(function () {
				if (GAME.allCount === GAME.loadCount) {
					// console.log('Все картинки загружены', allCount , loadCount);
					restart();
					clearInterval(int);
					drawRunner();
				}
			}, 1000 / 60);

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
	};

	return (
		<div className="game">
			<canvas id="canvas" ref={canvasRef}></canvas>

			<div className="game_over hidden" ref={gameBannerRef}>
				<div className="game_over_main">
					<img src={Smile} class="img_smile" alt="Smile" />
					<img src={GameOver} class="img_game_over" alt="GameOver" />
					<button className="game_restar" onClick={() => handleRestart()}>Повторить</button>
					{/* // TODO добавить кнопку выйти из игры */}
				</div>
			</div>
		</div>
	);
}

export default GameRunner;
