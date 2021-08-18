import React from 'react';
import { Route, Switch } from 'react-router-dom';
import Start from './pages/start';
import ErrorPage from './pages/error';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import Profile from './pages/profile';
import Signin from './pages/signin';
import Signup from './pages/signup';
import Background from './assets/img/Background2.png';
import ErrorBoundary from './utilities/ErrorBoundary';
import PrivateRoute from './components/routes/privete';
import AuthRoute from './components/routes/auth';

import './assets/style.css';

export default function App() {
    return (
        <div className="app">
            <div className="canvas" style={{ backgroundImage: `url(${Background})` }}> </div>
            <ErrorBoundary>
                <Switch>
                    <PrivateRoute path="/" exact><Start /></PrivateRoute>
                    <AuthRoute path="/signin"><Signin /></AuthRoute>
                    <AuthRoute path="/signup"><Signup /></AuthRoute>
                    <PrivateRoute path="/profile"><Profile /></PrivateRoute>
                    <PrivateRoute path="/forum"><ForumPage /></PrivateRoute>
                    <PrivateRoute path="/leaderboard"><LeaderboardPage /></PrivateRoute>
                    <Route path="/500"><ErrorPage number={500} /></Route>
                    <Route path="*"><ErrorPage number={404} /></Route>
                </Switch>
            </ErrorBoundary>
        </div>
    );
}
