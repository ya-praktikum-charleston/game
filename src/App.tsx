import React from "react";
import { Route, Switch } from "react-router-dom";
import { Start } from "./pages";
import ErrorPage from "./pages/error";
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
}
