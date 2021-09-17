import React from 'react';
import { Switch, Route, Link } from 'react-router-dom';

export default function App() {
    return (
        <>

            <div>asdasd</div>
            <div>
                <ul>
                    <li>
                        <Link to="/">Home</Link>
                    </li>
                    <li>
                        <Link to="/about">About</Link>
                    </li>
                    <li>
                        <Link to="/topics">Topics</Link>
                    </li>
                </ul>

                <Switch>
                    <Route path="/about">
                        <div>About</div>
                    </Route>
                    <Route path="/topics">
                        <div>Topics</div>
                    </Route>
                    <Route path="/">
                        <div>Home</div>
                    </Route>
                </Switch>
            </div>

        </>
    );
}
