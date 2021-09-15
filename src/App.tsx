import React from 'react';
import { Switch, Route } from 'react-router-dom';
import routes from './routes';

export default function App() {
    return (
        <>
            <div>asdasd</div>
            <Switch>
                {routes.map(({ ...routeProps }) => (
                    <Route key={routeProps.path} {...routeProps} />
                ))}
            </Switch>
        </>
    );
}
