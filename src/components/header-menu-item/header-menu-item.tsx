import React from 'react';
import { Link } from 'react-router-dom';
import { Props, HeaderMenuItemProps } from './types';
import './header-menu-item.css';

const HeaderMenuItem: Props = ({ imgLink, imgAlt, link }: HeaderMenuItemProps) => {
    if (link) {
        console.log(link);
        return (
            <Link to={link}><img className="header-menu__img" src={imgLink} alt={imgAlt} /></Link>
        );
    }
    return (
        <img className="header-menu__img" src={imgLink} alt={imgAlt} />
    );
};

export default HeaderMenuItem;
