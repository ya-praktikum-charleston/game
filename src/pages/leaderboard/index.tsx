import React, { useEffect, useState } from 'react';
import { connect } from 'react-redux';
import './leaderboard.css';
import Main from '../../components/main';
import LeaderboardItem from './leaderboardItem';
import Angel1 from '../../assets/img/Angels1.png';
import Angel2 from '../../assets/img/Angels2.png';
import Angel3 from '../../assets/img/Angels3.png';
import { getLeaderboard } from '../../selectors/widgets/app';
import type { Store } from '../../reducers/types';
import { getLeaderboardList, setLeaderboard } from '../../actions/app';

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

type Props = {
    leaderboardList: {},
    fetchLeaderboard: typeof getLeaderboardList,
    setLeaderboardList: typeof setLeaderboard,
};
const LeaderboardPage = ({ leaderboardList, fetchLeaderboard, setLeaderboardList }: Props) => {
    const [data, setData] = useState(leaderboardList);
    useEffect(() => {
        fetchLeaderboard();
    }, []);
    const addUserLeaderboard = () => {
        const asd = {
            id: 123,
            login: 'userTest',
            avatar: '/path/to/avatar.jpg',
            point: 22222222219,
        };
        setLeaderboardList(asd);
    };
    console.log('leaderboardList2', leaderboardList);
    return (
        <Main title="Таблица лидеров">
            <div className="table-loaderboard">
                {
                    leaderboardList.map((item, index) => {
                        const {
                            id, avatar, login, point,
                        } = item.data;
                        return (
                            <LeaderboardItem
                                key={id}
                                avatar={avatar}
                                index={index + 1}
                                login={login}
                                point={point}
                            />
                        );
                    })
                }
                <div onClick={addUserLeaderboard}>Test</div>
            </div>
        </Main>
    );
};

const mapStateToProps = (store: Store) => ({
    leaderboardList: getLeaderboard(store),
});
const mapDispatchToProps = {
    fetchLeaderboard: getLeaderboardList,
    setLeaderboardList: setLeaderboard,
};

export default connect(mapStateToProps, mapDispatchToProps)(LeaderboardPage);
