import React, { useRef, useEffect, ReactElement } from 'react';
import './game.css';
import { GAME } from './media/js/parameters';
import drawStatic from './media/js/drawStatic';

export default function GameStatic(): ReactElement {
    const canvasRef = useRef<HTMLCanvasElement>(null);
    console.log('statis')
    useEffect(() => {
        if (canvasRef.current) {
            canvasRef.current.width = GAME.winWidth;
            canvasRef.current.height = GAME.winHeight;

            GAME.ctx = canvasRef.current.getContext('2d');
            GAME.dom = {
                canvas: canvasRef,
            };
            // дожидаемся загрузки всех изображений
            const int = setInterval(() => {
                console.log(GAME.allCount, GAME.loadCount)
                if (GAME.allCount === GAME.loadCount) {
                    // console.log('Все картинки загружены', allCount , loadStaticImage);
                    clearInterval(int);
                    drawStatic();
                }
            }, 1000 / 60);
        }
    }, []);

    return (
        <canvas id="canvas_static" ref={canvasRef}>Эх... Ваш браузер не поддерживает Canvas, Вы не сможете сыграть в игру...</canvas>
    );
}
