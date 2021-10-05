import React, { ReactElement } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { setGameStart } from '../../actions/app';
import Main from '../../components/main';
import HeaderMenu from '../../components/header-menu';
import GameMenu from '../../components/game-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import GameRunner from '../../components/game/gameRunner';
import { AUDIO, restart } from '../../components/game/media/js/parameters';
import { isServer } from '../../utilities/isServer';
import './start.css';

const headerMenu = [
	{
		id: 1,
		imgLink: SettingsIcon,
		imgAlt: 'Settings',
		link: '/profile',
	},
];

function Start(): ReactElement {
	// const [game, setGame] = React.useState<boolean>(false);
	const dispatch = useDispatch();
	const gameRunner = useSelector(({ widgets }) => widgets.app.gamaRunner);
	const handleStartGame = () => {
		// TODO установить значение в redux gameRun true
		// setGame(true);
		if (!isServer) {
			dispatch(setGameStart(true));
			AUDIO.Theme1.play();
		}
	};
	const handleExittGame = () => {
		// TODO установить значение в redux gameRun false
		// setGame(false);
		if (!isServer) {
			dispatch(setGameStart(false));
			restart();
			AUDIO.Theme1.stop();
		}
	};

	if (gameRunner && !isServer) {
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
