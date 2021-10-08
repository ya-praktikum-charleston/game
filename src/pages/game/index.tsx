import React, { ReactElement } from 'react';
import HeaderMenu from 'Components/header-menu';
import Distance from 'Components/distance';
import SettingsIcon from 'Assets/svg/settings.svg';
import PauseIcon from 'Assets/svg/pause.svg';

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
