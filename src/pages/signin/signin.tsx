import React from 'react';
import { Link } from 'react-router-dom';
import Main from '../../components/main';
import './signin.css';

const Signin = () => (
    <>
        <Main title="Вход" offBtnIcon>
            <div className="signin">
                <form className="form">
                    <div className="form_line">
                        <input className="input" name="login" type="text" placeholder="Логин" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="password" type="password" placeholder="Пароль" />
                    </div>
                    <div className="form__redirect">
                        <Link to="/signup">У вас нет аккаунта? Регистрация</Link>
                    </div>
                    <button type="submit" className="btn fullwidth">Авторизоваться</button>
                </form>
            </div>
        </Main>
    </>
);

export default Signin;
