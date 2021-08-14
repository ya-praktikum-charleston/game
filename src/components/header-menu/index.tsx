import React from 'react';
import HeaderMenuItem from '../header-menu-item';
import { HeaderMenuProps } from './types';

import './header-menu.css';

const HeaderMenu = ({ headerMenu }: HeaderMenuProps) => (
    <div className="header-menu">
        {
            headerMenu.map((item) => (
                <HeaderMenuItem
                    imgLink={item.imgLink}
                    imgAlt={item.imgAlt}
                    link={item.link}
                />
            ))
        }
    </div>
);

export default HeaderMenu;
