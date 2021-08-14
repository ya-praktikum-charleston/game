import React from 'react';
import Main from '../../components/main';
import HeaderMenu from '../../components/header-menu';
import InstructionItem from '../../components/instruction-item';
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
        link: '/profile',
    },
];

const Start = () => (
    <>
        <HeaderMenu headerMenu={headerMenu} />
        <Main title="Инструкция" offBtnIcon>
            <div className="start">

                <div className="instructions">
                    {
                        instructions.map((item) => {
                            const { imgLink, imgAlt, text } = item;
                            return (
                                <InstructionItem
                                    key={imgLink}
                                    imgLink={imgLink}
                                    imgAlt={imgAlt}
                                    text={text}
                                />
                            );
                        })
                    }
                </div>
                <GameMenu />
            </div>
        </Main>
    </>
);

export default Start;
