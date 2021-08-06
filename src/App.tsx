import React, { useState } from 'react';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import './assets/style.css';

export default function App() {
    const [activePage, setActivePage] = useState('ForumPage');
    const handlePageForum = () => {
        console.log('asd');
        setActivePage('ForumPage');
    }
    const handlePageLeader = () => {
        console.log('asdww');
        setActivePage('LeaderboardPage');
    }
    return (
        <div className="app">
            <div style={{ position: 'absolute' }}>
                <div onClick={handlePageForum} style={{ cursor: 'pointer' }}>Форум</div>
                <div onClick={handlePageLeader} style={{ cursor: 'pointer' }}>Таблица лицеров</div>
            </div>

            {
                activePage === 'ForumPage' ? <ForumPage /> : <LeaderboardPage />
            }
        </div>
    );
}
