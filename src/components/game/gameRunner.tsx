import React, { useRef, useEffect, ReactElement } from 'react';
import './game.css';
import {
    GAME,
    HERO,
    AUDIO,
    restart,
} from './media/js/parameters';
import drawRunner from './media/js/drawRunner';
import {
    GameOver,
    Smile,
} from './media/js/assetsLinks';

// добавление события клика мыши
const jump = () => {
    if (!GAME.jumping) {
        GAME.jumping = true;
        GAME.jumpingStart = true;
        GAME.jumpTimer = 0;
    }
};

function GameRunner(): ReactElement {
    const canvasRef = useRef<HTMLCanvasElement>(null);
    const gameBannerRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        if (canvasRef.current && gameBannerRef.current) {
            canvasRef.current.width = GAME.winWidth;
            canvasRef.current.height = GAME.winHeight;

            GAME.ctx = canvasRef.current.getContext('2d');
            GAME.dom = {
                canvas: canvasRef,
                gameBanner: gameBannerRef,
            };
            HERO.event.run = true;
            document.addEventListener('mousedown', jump);

            // дожидаемся загрузки всех изображений

            if (GAME.allCount === GAME.loadCount) {
                // console.log('Все картинки загружены', allCount , loadCount);
                restart();
                drawRunner();
            }
        }
        return () => {
            // удаление событий мыши
            window.removeEventListener('mousedown', jump);
        };
    }, []);

    const handleRestart = () => {
        restart();
        drawRunner();
        //AUDIO.Theme1.play();
    };

    return (
        <div className="game">
            <canvas id="canvas" ref={canvasRef}>Эх... Ваш браузер не поддерживает Canvas, Вы не сможете сыграть в игру...</canvas>
            <div className="game_over hidden" ref={gameBannerRef}>
                <div className="game_over_main">
                    <img src={Smile} className="img_smile" alt="Smile" />
                    <img src={GameOver} className="img_game_over" alt="GameOver" />
                    <button type="button" className="game_restar" onClick={() => handleRestart()}>Повторить</button>
                    {/* // TODO добавить кнопку выйти из игры */}
                </div>
            </div>
        </div>
    );
}

export default GameRunner;
