import React, { useRef, useEffect, ReactElement } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { setGameStart, setLeaderboard } from '../../actions/app';
import './game.css';
import {
    GAME,
    HERO,
    AUDIO,
    restart,
} from './media/js/parameters';
import drawRunner from './media/js/drawRunner';
import jump from './media/js/jump';
import {
    GameOver,
    Smile,
} from './media/js/assetsLinks';

const handlerKeypress = (event) => {
    if (event.keyCode === 32) {
        jump();
    }
};

function GameRunner(): ReactElement {
    const canvasRef = useRef<HTMLCanvasElement>(null);
    const gameBannerRef = useRef<HTMLDivElement>(null);
    const dispatch = useDispatch();
    const profile = useSelector(({ collections }) => collections.user);

    useEffect(() => {
        if (canvasRef.current && gameBannerRef.current) {
            canvasRef.current.width = GAME.winWidth;
            canvasRef.current.height = GAME.winHeight;

            GAME.ctx = canvasRef.current.getContext('2d');
            GAME.dom = {
                canvas: canvasRef,
                gameBanner: gameBannerRef,
            };
            GAME.setLeaderboard = (arg: number) => dispatch(setLeaderboard({
                score_charleston: arg,
                id: profile.id,
                login: profile.login,
                avatar: profile.avatar,
            }));
            HERO.event.run = true;
            document.addEventListener('mousedown', jump);
            document.addEventListener('keydown', handlerKeypress);
            // дожидаемся загрузки всех изображений
            const int = setInterval(() => {
                if (GAME.allCount === GAME.loadCount) {
                    clearInterval(int);
                    restart();
                    drawRunner();
                }
            }, 1000 / 60);
        }
        return () => {
            // удаление событий мыши и пробела
            document.removeEventListener('mousedown', jump);
            document.removeEventListener('keydown', handlerKeypress);
        };
    }, []);

    const handleRestart = () => {
        restart();
        drawRunner();
        AUDIO.Theme1.play();
    };
    const handleGameExite = () => {
        restart();
        dispatch(setGameStart(false));
    };
    return (
        <div className="game">
            <canvas id="canvas" ref={canvasRef}>Эх... Ваш браузер не поддерживает Canvas, Вы не сможете сыграть в игру...</canvas>
            <div className="game_over hidden" ref={gameBannerRef}>
                <div className="game_over_main">
                    <img src={Smile} className="img_smile" alt="Smile" />
                    <img src={GameOver} className="img_game_over" alt="GameOver" />
                    <button type="button" className="game_restar" onClick={() => handleRestart()}>Повторить</button>
                    <button type="button" className="game_restar game_exit" onClick={() => handleGameExite()}>Выход</button>
                </div>
            </div>
        </div>
    );
}

export default GameRunner;
