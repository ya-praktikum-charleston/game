import React from 'react';
import HeaderMenu from '../../components/header-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import Main from '../../components/main';
import PasswordForm from './password-form';
import ProfileForm from './profile-form';
import AvatarForm from './avatar-form';

import './profile.css';

const headerMenu = [
    {
        id: 1,
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
];

const Profile = () => (
    <>
        <HeaderMenu headerMenu={headerMenu} />
        <Main title="Профиль">
            <div className="profile">
                <div className="profile_main">
                    <AvatarForm />
                    <div className="form">
                        <ProfileForm />
                        <PasswordForm />
                    </div>
                </div>
            </div>
        </Main>
    </>
);

export default Profile;
