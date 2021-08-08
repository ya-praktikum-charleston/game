import React from 'react';
import HeaderMenu from '../../components/header-menu';
import InstructionItem from '../../components/instruction-item/instruction-item';
import GameMenu from '../../components/game-menu';
import ArrowUpIcon from '../../assets/svg/arrow-up.svg';
import ArrowDownIcon from '../../assets/svg/arrow-down.svg';
import SettingsIcon from '../../assets/svg/settings.svg';

import './start.css';

const instructions = [
    {
        imgLink: ArrowUpIcon,
        imgAlt: 'Arrow up',
        text: 'Прыжок',
    },
    {
        imgLink: ArrowDownIcon,
        imgAlt: 'Arrow down',
        text: 'Наклон',
    },
];

const headerMenu = [
    {
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
];

const Start = () => (
    <div className="start">
        <HeaderMenu headerMenu={headerMenu} />
        <div className="instructions">
            {
                instructions.map((item) => (
                    <InstructionItem
                        imgLink={item.imgLink}
                        imgAlt={item.imgAlt}
                        text={item.text}
                    />
                ))
            }
        </div>
        <GameMenu />
    </div>
);

export default Start;
