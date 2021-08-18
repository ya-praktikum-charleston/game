import React from 'react';
import { Link } from 'react-router-dom';
import Main from '../../components/main';
import './signup.css';

const Signup = () => (
    <>
        <Main title="Регистрация">
            <div className="registration">
                <form className="form">
                    <div className="form_line">
                        <input className="input" name="email" type="email" placeholder="Почта" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="login" type="text" placeholder="Логин" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="first_name" type="text" placeholder="Имя" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="second_name" type="text" placeholder="Фамилия" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="phone" type="tel" placeholder="Телефон" />
                    </div>
                    <div className="form_line">
                        <input className="input" name="password" type="password" placeholder="Пароль" />
                    </div>
                    <div className="form_line">
                        <input
                            className="input"
                            name="password"
                            type="password"
                            placeholder="Пароль (ещё раз)"
                        />
                    </div>
                    <div className="form__redirect">
                        <Link to="/signin">Я вспомнил пароль</Link>
                    </div>
                    <button type="submit" className="btn fullwidth">Создать аккаунт</button>
                </form>
            </div>
        </Main>
    </>
);

export default Signup;
