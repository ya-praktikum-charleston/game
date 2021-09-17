import React, { ReactElement } from 'react';
import loadable from '@loadable/component';
import { Route, Switch } from 'react-router-dom';
import { useSelector } from 'react-redux';
import PrivateRoute from './components/routes/privete';
//import Start from './pages';
import ErrorPage from './pages/error';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import Profile from './pages/profile';
import Signin from './pages/signin';
import Signup from './pages/signup';
//import GameStatic from './components/game/gameStatic';
import ErrorBoundary from './utilities/ErrorBoundary';
import './assets/style.css';

const GameStatic = loadable(() => import('./components/game/gameStatic'), { ssr: false });
const Start = loadable(() => import('./pages'), { ssr: false });

export default function App(): ReactElement {
    const gameRunner = useSelector(({ widgets }) => widgets.app.gamaRunner);
    return (
        <ErrorBoundary>
            <div className="app">
                <Switch>
                    <PrivateRoute path="/" exact ><Start /></PrivateRoute>
                    <Route path="/signin" component={Signin} />
                    <Route path="/signup" component={Signup} />
                    <PrivateRoute path="/profile"><Profile /></PrivateRoute>
                    <PrivateRoute path="/forum"><ForumPage /></PrivateRoute>
                    <PrivateRoute path="/leaderboard"><LeaderboardPage /></PrivateRoute>
                    <Route component={() => (<ErrorPage number={404} />)} />
                </Switch>

                {!gameRunner && <GameStatic />}
            </div>
        </ErrorBoundary>
    );
}
