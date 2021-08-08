import React from 'react';
import HeaderMenuItem from '../header-menu-item';
import { Props, HeaderMenuProps } from './types';

import './header-menu.css';

const HeaderMenu: Props = ({ headerMenu }: HeaderMenuProps) => (
    <div className="header-menu">
        {
            headerMenu.map((item) => (
                <HeaderMenuItem
                    imgLink={item.imgLink}
                    imgAlt={item.imgAlt}
                />
            ))
        }
    </div>
);

export default HeaderMenu;
