import React, { ReactElement, useState } from 'react';
import { useDispatch, useSelector } from 'react-redux';
import classNames from 'classnames';
import { setGameStart } from '../../actions/app';
import Main from '../../components/main';
import HeaderMenu from '../../components/header-menu';
import GameMenu from '../../components/game-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import GameRunner from '../../components/game/gameRunner';
import { AUDIO, restart } from '../../components/game/media/js/parameters';
import StartOptions from './options';
import ForwardIcon from '../../assets/svg/forward.svg';
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
	const dispatch = useDispatch();
	const gameRunner = useSelector(({ widgets }) => widgets.app.gamaRunner);
	const [isOptions, setIsOptions] = useState(false);

	const handleStartGame = () => {
		if (!isServer) {
			dispatch(setGameStart(true));
			AUDIO.Theme1.play();
			document.body.requestPointerLock();
		}
	};

	const handleExitGame = () => {
		if (!isServer) {
			dispatch(setGameStart(false));
			restart();
			AUDIO.Theme1.stop();
		}
	};

	const visibility = classNames('start__main', { 'visibility-options': isOptions });

	const goOptions = () => {
		setIsOptions((prev) => !prev);
	};

	if (gameRunner && !isServer) {
		return <GameRunner handleExitGame={handleExitGame} />;
	}

	const Title = () => {
		return (
			<div>
				<img onClick={goOptions} className="btn-back-icon position-icon" src={ForwardIcon} alt="forward" />
				Новая игра
			</div>
		);
	};
	
	return (
		<>
			<HeaderMenu headerMenu={headerMenu} />
			<Main title={isOptions ? <Title /> : 'GAME'} offBtnIcon>
				<div className="start">
					<div className={visibility}>
						<div className="start__menu">
							<div>
								<div className="start__menu__topic">Как играть?</div>
								<div className="start__menu__description">Ваша задача перепрыгивать всё, что попадется у вас на пути и любой ценой избежать столкновений.</div>
								<div className="start__menu__topic">Управление</div>
								<div className="start__menu__description">Управлять персонажем Вы можете с помощью ЛЕВОЙ КЛАВИШИ МЫШИ или кнопки ПРОБЕЛ на клавиатуре</div>
							</div>
							<GameMenu goOptions={goOptions} />
						</div>
						<div className="start__options">
							<StartOptions handleStartGame={handleStartGame} />
						</div>
					</div>
				</div>
			</Main>
		</>
	);
}

export default Start;
