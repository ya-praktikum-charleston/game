import React from 'react';
import HeaderMenuItem from '../header-menu-item';
import { Props, HeaderMenuProps } from './types';

import './header-menu.css';

const HeaderMenu: Props = ({ headerMenu }: HeaderMenuProps) => (
    <div className="header-menu">
        {
            headerMenu.map(({ imgLink, imgAlt, link }) => (
                <HeaderMenuItem
                    key={imgAlt}
                    imgLink={imgLink}
                    imgAlt={imgAlt}
                    link={link}
                />
            ))
        }
    </div>
);

export default HeaderMenu;
