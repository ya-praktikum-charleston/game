import { FC } from 'react';

export type HeaderMenuItemProps = {
    imgLink: string;
    imgAlt: string;
    link?: string;
};

export type Props = FC<HeaderMenuItemProps>;
