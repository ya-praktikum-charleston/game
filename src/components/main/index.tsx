import React from 'react';
import './main.css';
import ForwardIcon from '../../assets/svg/forward.svg';
import { Link } from 'react-router-dom'

type MainProps = {
    title: string;
    children: React.ReactNode;
};

const Main = ({ children, title }: MainProps) => (
    <div className="box-content main-font-family">
        <div className="content">
            <div className="header">
                <div className="btn-back">
                    <Link to="/"><img className="btn-back-icon" src={ForwardIcon} alt="forward" /></Link>
                </div>
                <div className="header-title title-page">{title}</div>
            </div>
            {children}
        </div>
    </div>
);

export default Main;
