import React, { ReactElement } from 'react';
import AccountIcon from '../../assets/svg/pause.svg';

type MainProps = {
    avatar: string;
    login: string;
    index: number;
    point: number;
};

const LeaderboardItem = ({
    avatar,
    login,
    index,
    point,
}: MainProps): ReactElement => (
    <div className="table-leaderboard-item">
        <div className="item-number">{index}</div>
        {
            avatar === null
                ? <AccountIcon />
                : <img src={avatar} alt="avatar" className="item-img" />
        }

        <div className="item-name">{login}</div>
        <div className="item-count">{point}</div>
    </div>
);

export default LeaderboardItem;
