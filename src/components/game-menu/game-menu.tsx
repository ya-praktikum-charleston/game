import React from 'react';

import './game-menu.css';

const GameMenu = () => (
    <div className="game-menu">
        <button type="button" className="btn">Старт</button>
        <div className="game-menu__block">
            <button type="button" className="btn mr">Форум</button>
            <button type="button" className="btn">Лидеры</button>
        </div>
    </div>
);

export default GameMenu;
