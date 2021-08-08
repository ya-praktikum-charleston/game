import React from 'react';
import { Props, HeaderMenuItemProps } from './types';

import './header-menu-item.css';

const HeaderMenuItem: Props = ({ imgLink, imgAlt }: HeaderMenuItemProps) => (
    <img className="header-menu__img" src={imgLink} alt={imgAlt} />
);

export default HeaderMenuItem;
