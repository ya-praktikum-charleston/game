import React, { useCallback } from 'react';
import { useHistory } from 'react-router-dom';
import './game-menu.css';
//import { Link } from "react-router-dom";
//import {AUDIO} from '../../pages/game/media/js/parameters';

const GameMenu = () => {
    const history = useHistory();
    const handleOnClick = useCallback((link) => history.push(`/${link}`), [history]);

    const handleNewGame = () => {
        handleOnClick('game');
        //AUDIO.Theme1.play();
    }

    return (
        <div className="game-menu">
            <button type="button" className="btn fullwidth" onClick={() => handleNewGame()}>Старт</button>
            {/* <Link to="/game" className="btn fullwidth" onClick={() => handleNewGame()}>Старт</Link> */}
            <div className="game-menu__block">
                <button type="button" className="btn mr" onClick={() => handleOnClick('forum')}>Форум</button>
                <button type="button" className="btn" onClick={() => handleOnClick('leaderboard')}>Лидеры</button>
            </div>
        </div>
    );
};

export default GameMenu;
