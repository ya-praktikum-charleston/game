import React, { ReactElement, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import { setGameStart } from '../../actions/app';
import Main from '../../components/main';
import HeaderMenu from '../../components/header-menu';
import GameMenu from '../../components/game-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import GameRunner from '../../components/game/gameRunner';
import { AUDIO, restart, Game } from '../../components/game/media/js/parameters';
import Angel1 from '../../assets/img/Angels1.png';
import Angel2 from '../../assets/img/Angels2.png';
import Angel3 from '../../assets/img/Angels3.png';
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
	const [hero, setHero] = useState('angel1');

	const handleStartGame = () => {
		// TODO установить значение в redux gameRun true
		// setGame(true);
		dispatch(setGameStart(true));
		AUDIO.Theme1.play();
	};

	const handleExittGame = () => {
		// TODO установить значение в redux gameRun false
		// setGame(false);
		dispatch(setGameStart(false));
		restart();
		AUDIO.Theme1.stop();
	};
	const chooseHero = (e) => {
		setHero(e.target.getAttribute('data-name'));
		Game.heroName = e.target.getAttribute('data-name');
		console.log(e.target.getAttribute('data-name'));
	};

	if (gameRunner) {
		return <GameRunner handleExittGame={handleExittGame} />;
	}
	return (
		<>
			<HeaderMenu headerMenu={headerMenu} />
			<Main title="Инструкция" offBtnIcon>
				<div className="start">
					<div className="instructions">
						<div>Выберите персонажа:</div>
						<div onClick={chooseHero} className="list__hero">
							<img src={Angel1} data-name="angel1" alt="angel1" className={`hero ${hero === 'angel1' && 'active__hero'} `} />
							<img src={Angel2} data-name="angel2" alt="angel2" className={`hero ${hero === 'angel2' && 'active__hero'} `} />
							<img src={Angel3} data-name="angel3" alt="angel3" className={`hero ${hero === 'angel3' && 'active__hero'} `} />
						</div>
					</div>
					<GameMenu handleStartGame={handleStartGame} />
				</div>
			</Main>
		</>
	);
}

export default Start;
