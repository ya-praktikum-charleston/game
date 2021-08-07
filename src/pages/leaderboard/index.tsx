import React from 'react';
import './leaderboard.css';
import Main from '../../components/main';
import LeaderboardItem from './leaderboardItem';
import Angel1 from '../../assets/img/Angels1.png';
import Angel2 from '../../assets/img/Angels2.png';
import Angel3 from '../../assets/img/Angels3.png';

const DATA = [
    {
        id: 1, position: 1, avatar: Angel1, name: 'MAX', count: 60000,
    },
    {
        id: 2, position: 2, avatar: Angel2, name: 'Sanka', count: 54300,
    },
    {
        id: 3, position: 3, avatar: Angel3, name: 'Kira', count: 43005,
    },
    {
        id: 4, position: 4, avatar: Angel2, name: 'MAX', count: 32001,
    },
    {
        id: 5, position: 5, avatar: Angel3, name: 'Ira', count: 30015,
    },
    {
        id: 6, position: 6, avatar: Angel2, name: 'Igor', count: 29015,
    },
];

export default function LeaderboardPage() {
    return (
        <Main title="Таблица лидеров">
            <div className="table-loaderboard">
                {
                    DATA.map((item) => {
                        const {
                            id, avatar, name, position, count,
                        } = item;
                        return (
                            <LeaderboardItem key={id} position={position} avatar={avatar} name={name} count={count} />
                        );
                    })
                }
            </div>
        </Main>
    );
}
