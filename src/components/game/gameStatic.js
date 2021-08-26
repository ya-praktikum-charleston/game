import React from 'react';
import './game.css';
import { GAME, HERO } from './media/js/parameters';
import drawStatic from './media/js/drawStatic';

function GameStatic() {

	const canvasRef = React.useRef(false);

	React.useEffect(() => {
		if (canvasRef.current) {
			canvasRef.current.width = GAME.winWidth;
			canvasRef.current.height = GAME.winHeight;

			GAME.ctx = canvasRef.current.getContext('2d');
			GAME.dom = {
				canvas: canvasRef
			}

			// дожидаемся загрузки всех изображений
			let int = setInterval(function () {
				if (GAME.allCount === GAME.loadCount) {
					// console.log('Все картинки загружены', allCount , loadStaticImage);
					clearInterval(int);
					drawStatic();
				}
			}, 1000 / 60);

		}
	}, []);

	// ? как получить url в react
	// if (window.location.pathname === '/game') {
	// 	return null;
	// }

	return (
		<canvas id="canvas_static" ref={canvasRef}></canvas>
	);
};

export default GameStatic;
