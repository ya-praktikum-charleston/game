import React from 'react';
import HeaderMenu from '../../components/header-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import Main from '../../components/main';
import Angel1 from '../../assets/img/Angels1.png';
import Button from '../../components/button';
import './profile.css';

const headerMenu = [
    {
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
];

const Profile = () => (
    <>
        <HeaderMenu headerMenu={headerMenu} />
        <Main title="Профиль">
            <div className="profile">
                <form>
                    <div className="profile_main">
                        <div className="avatar">
                            <div className="avatar_edit">
                                <div className="avatar_img">
                                    <img className="avatar_img__size" src={Angel1} alt="avatar" />
                                </div>

                                <label htmlFor="file-input" className="btn-file-input">
                                    <input id="file-input" className="file-input__hidden" type="file" name="file" accept=".jpg, .jpeg, .png" />
                                    Поменять
                                </label>
                            </div>
                        </div>
                        <div className="form">
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
                            <Button type="submit" className="btn fullwidth" fullWidth>Сохранить</Button>
                        </div>
                    </div>
                </form>
            </div>
        </Main>
    </>
);

export default Profile;
