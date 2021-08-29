import React, { ReactElement } from 'react';
import HeaderMenu from '../../components/header-menu';
import Distance from '../../components/distance';
import SettingsIcon from '../../assets/svg/settings.svg';
import PauseIcon from '../../assets/svg/pause.svg';

const headerMenu = [
    {
        id: 1,
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
    {
        id: 2,
        imgLink: PauseIcon,
        imgAlt: 'Pause',
    },
];

const Game = (): ReactElement => (
    <div className="game">
        <HeaderMenu headerMenu={headerMenu} />
        <Distance distance={1286} />
    </div>
);

export default Game;
