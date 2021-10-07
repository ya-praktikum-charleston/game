import React, { ReactElement } from 'react';
import AccountIcon from '../../assets/svg/account_circle.svg';

type MainProps = {
    avatar: string;
    login: string;
    index: number;
    score: number;
};

const LeaderboardItem = ({
    avatar,
    login,
    index,
    score,
}: MainProps): ReactElement => (
    <div className="table-leaderboard-item">
        <div className="item-number">{index}</div>
        {/* {
            avatar === null
                ? <img src={AccountIcon} alt="avatar" className="item-img" />
                : <img src={`https://ya-praktikum.tech/api/v2/resources${avatar}`} alt="avatar" className="item-img" />
        } */}
        <img src={AccountIcon} alt="avatar" className="item-img" />

        <div className="item-name">{login}</div>
        <div className="item-count">{score}</div>
    </div>
);

export default LeaderboardItem;
