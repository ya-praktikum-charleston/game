import React from 'react';
import { Route, Switch } from 'react-router-dom';
import PrivateRoute from './components/routes/privete';
import { Start } from './pages';
import ErrorPage from './pages/error';
import LeaderboardPage from './pages/leaderboard';
import ForumPage from './pages/forum';
import Profile from './pages/profile';
import Signin from './pages/signin';
import Signup from './pages/signup';
import GameStatic from './components/game/gameStatic';
import ErrorBoundary from './utilities/ErrorBoundary';
import './assets/style.css';

export default function App() {
	return (
		<div className="app">
			<ErrorBoundary>
				<Switch>
					<PrivateRoute path="/" exact><Start /></PrivateRoute>
					<Route path="/signin" component={Signin} />
					<Route path="/signup" component={Signup} />
					<PrivateRoute path="/profile"><Profile /></PrivateRoute>
					<PrivateRoute path="/forum"><ForumPage /></PrivateRoute>
					<PrivateRoute path="/leaderboard"><LeaderboardPage /></PrivateRoute>
                    <Route component={() => (<ErrorPage number={404} />)} />

                    {/* ! надо покласть в ErrorBoundary */}
					<Route path="/500">
						<ErrorPage number={500} />
					</Route>
				</Switch>
				{/* TODO добавить условие из redux, если не gameRun показывать GameStatic */}
				<GameStatic />
			</ErrorBoundary>
		</div>
	);
}
