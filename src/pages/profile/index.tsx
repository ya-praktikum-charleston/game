import React from 'react';
import HeaderMenu from '../../components/header-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import Main from '../../components/main';
import PasswordForm from '../../components/profile/profile-form';
import ProfileForm from '../../components/profile/password-form';
import AvatarForm from '../../components/profile/avatar-form';

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
