import React from 'react';
import { Route, Switch } from 'react-router-dom';
import Start from './pages/start';
import ErrorPage from './pages/error/error';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import Profile from './pages/profile';
import Signin from './pages/signin';
import Signup from './pages/signup';
import GameStatic from './pages/game/GameStatic';
import GameRunner from './pages/game/gameRunner';
import ErrorBoundary from './utilities/ErrorBoundary';
import './assets/style.css';

export default function App() {
    return (
        <div className="app">
            <ErrorBoundary>
                
                <Switch>
                    <Route path="/" exact><Start /></Route>
                    <Route path="/signin"><Signin /></Route>
                    <Route path="/signup"><Signup /></Route>
                    <Route path="/profile"><Profile /></Route>
                    <Route path="/forum"><ForumPage /></Route>
                    <Route path="/leaderboard"><LeaderboardPage /></Route>
                    <Route path="/game" component={GameRunner} />
                    <Route path="/404"><ErrorPage number={404} /></Route>
                    <Route path="/500"><ErrorPage number={500} /></Route>
                </Switch>
            </ErrorBoundary>
            <GameStatic />
        </div>
    );
}
