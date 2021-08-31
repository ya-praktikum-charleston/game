import React from 'react';
import Main from '../../components/main';
import HeaderMenu from '../../components/header-menu';
import GameMenu from '../../components/game-menu';
import SettingsIcon from '../../assets/svg/settings.svg';

import GameRunner from '../../components/game/gameRunner';
import { AUDIO, restart } from '../../components/game/media/js/parameters';

import './start.css';

const headerMenu = [
	{
        id: 1,
		imgLink: SettingsIcon,
		imgAlt: 'Settings',
		link: '/profile',
	},
];

function Start() {
	const [game, setGame] = React.useState<boolean>(false);

	const handleStartGame = () => {
		// TODO установить значение в redux gameRun true
		setGame(true);
		AUDIO.Theme1.play();
	};

	const handleExittGame = () => {
		// TODO установить значение в redux gameRun false
		setGame(false);
		restart();
		AUDIO.Theme1.stop();
	};

	if (game) {
		return <GameRunner handleExittGame={handleExittGame} />;
	}

	return (
		<>
			<HeaderMenu headerMenu={headerMenu} />
			<Main title="Инструкция" offBtnIcon>
				<div className="start">
					<div className="instructions">
						{/* {
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
                    }  */}
					</div>
					<GameMenu handleStartGame={handleStartGame} />
				</div>
			</Main>
		</>
	);
}

export default Start;
