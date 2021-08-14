import React from 'react';
import HeaderMenu from '../../components/header-menu';
import Distance from '../../components/distance';
import SettingsIcon from '../../assets/svg/settings.svg';
import PauseIcon from '../../assets/svg/pause.svg';

import './game.css';

const headerMenu = [
    {
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
    {
        imgLink: PauseIcon,
        imgAlt: 'Pause',
    },
];

const Game = () => (
    <div className="game">
        <HeaderMenu headerMenu={headerMenu} />
        <Distance distance={1286} />
    </div>
);

export default Game;
