import React, { useRef, useEffect, ReactElement } from 'react';
import './game.css';
import { GAME, GAME2, AUDIO } from './media/js/parameters';
import drawStatic from './media/js/drawStatic';

export default function GameStatic(): ReactElement {
    const canvasRef = useRef<HTMLCanvasElement>(null);
    useEffect(() => {
        if (canvasRef.current) {
            canvasRef.current.width = GAME.winWidth;
            canvasRef.current.height = GAME.winHeight;

            //GAME.ctx = canvasRef.current.getContext('2d');
            //GAME.dom = {
            //    canvas: canvasRef,
            //};
            const game = new GAME2(canvasRef.current, true);
            game.Start();
            //AUDIO.Theme1.play()
            // дожидаемся загрузки всех изображений
            //const int = setInterval(() => {
            //    if (GAME.allCount === GAME.loadCount) {
            //        clearInterval(int);
            //        //drawStatic();
            //    }
            //}, 1000 / 60);
        }
        return () => {
            game.gameStopp();
            game = null;
        };
    }, []);
    return (
        <canvas id="canvas_static" ref={canvasRef}>Эх... Ваш браузер не поддерживает Canvas, Вы не сможете сыграть в игру...</canvas>
    );
}
