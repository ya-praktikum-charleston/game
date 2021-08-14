import React from 'react';
import HeaderMenu from '../../components/header-menu';
import Distance from '../../components/distance';
import GameMenu from '../../components/game-menu';
import SettingsIcon from '../../assets/svg/settings.svg';

import './end.css';

const headerMenu = [
    {
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
];

const End = () => (
    <div className="end">
        <HeaderMenu headerMenu={headerMenu} />
        <Distance distance={525} />
        <GameMenu />
    </div>
);

export default End;
