import React from 'react';
import { useHistory } from 'react-router-dom';
import './logout-btn.css';
import LogoutIcon from '../../assets/svg/logout.svg';
import AuthController from '../../controllers/auth/AuthController';

const auth = new AuthController();

const LogoutButton = () => {
    const history = useHistory();

    const handleOnClick = () => {
        auth.logout(history);
    };

    return (
        <img
            onClick={handleOnClick}
            className="header-menu__img"
            src={LogoutIcon}
            alt="logout"
        />
    );
};

export default LogoutButton;
