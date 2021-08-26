<<<<<<< HEAD
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
=======
import React from "react";
import { Route, Switch } from "react-router-dom";
import { Start } from "./pages";
import ErrorPage from "./pages/error/error";
import LeaderboardPage from "./pages/leaderboard";
import ForumPage from "./pages/forum";
import Profile from "./pages/profile";
import Signin from "./pages/signin";
import Signup from "./pages/signup";
import GameStatic from "./components/game/gameStatic";
import ErrorBoundary from "./utilities/ErrorBoundary";
import "./assets/style.css";

export default function App() {
	return (
		<div className="app">
			<ErrorBoundary>
				<Switch>
					<Route path="/" exact component={Start} />
					<Route path="/signin" component={Signin} />
					<Route path="/signup" component={Signup} />
					<Route path="/profile" component={Profile} />
					<Route path="/forum" component={ForumPage} />
					<Route path="/leaderboard" component={LeaderboardPage} />
				    <Route component={() => (<ErrorPage number={404} />)}/>

                    //! надо покласть в ErrorBoundary
					<Route path="/500">
						<ErrorPage number={500} />
					</Route>
				</Switch>
				{/* // TODO добавить условие из redux, если не gameRun показывать GameStatic */}
				<GameStatic />
			</ErrorBoundary>
		</div>
	);
>>>>>>> 88894c65af3622dc9a33af78c271deb116542219
}
