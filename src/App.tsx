import React from 'react';
import { Route, Switch } from 'react-router-dom';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import Background from './assets/img/Background2.png';
import './assets/style.css';

export default function App() {
    return (
        <div className="app">
            <div className="canvas" style={{ backgroundImage: `url(${Background})` }}> </div>
            <Switch>
                <Route path="/" exact><div>Home</div></Route>
                <Route path="/signin"><div>Войти</div></Route>
                <Route path="/signup"><div>Зарегистрироваться</div></Route>
                <Route path="/profile"><div>Профиль</div></Route>
                <Route path="/forum" component={ForumPage} />
                <Route path="/leaderboard" component={LeaderboardPage} />
                <Route path="/404"><div>404</div></Route>
                <Route path="/500"><div>500</div></Route>
            </Switch>
        </div>
    );
}
