import { FC } from 'react';
import { HeaderMenuItemProps } from '../header-menu-item/types';

export type HeaderMenuProps = {
    headerMenu: HeaderMenuItemProps[],
};

export type Props = FC<HeaderMenuProps>;
