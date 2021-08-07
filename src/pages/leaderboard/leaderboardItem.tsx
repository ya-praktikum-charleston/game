import React from 'react';

type MainProps = {
    avatar: string;
    name: string;
    position: number;
    count: number;
};

const LeaderboardItem = ({
    avatar,
    name,
    position,
    count,
}: MainProps) => (
    <div className="table-leaderboard-item">
        <div className="item-number">{position}</div>
        <img src={avatar} alt="avatar" className="item-img" />
        <div className="item-name">{name}</div>
        <div className="item-count">{count}</div>
    </div>
);

export default LeaderboardItem;
