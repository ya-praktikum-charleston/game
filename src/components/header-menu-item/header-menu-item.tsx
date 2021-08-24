import React from 'react';
import { Link } from 'react-router-dom';
import { Props, HeaderMenuItemProps } from './types';
import './header-menu-item.css';

// import ArrowUpIcon from '../../assets/svg/arrow-up.svg';
// import ArrowDownIcon from '../../assets/svg/arrow-down.svg';

// type instructionsTypes = {
//     imgLink: string;
//     imgAlt: string;
//     link?: string;
// };

// const instructions: instructionsTypes = [
//     {
//         imgLink: ArrowUpIcon,
//         imgAlt: 'Arrow up',
//         text: 'Прыжок',
//     },
//     {
//         imgLink: ArrowDownIcon,
//         imgAlt: 'Arrow down',
//         text: 'Наклон',
//     },
// ];

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
