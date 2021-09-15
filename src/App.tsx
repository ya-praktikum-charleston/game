import React from 'react';
import { Switch, Route } from 'react-router-dom';
import routes from './routes';

export default function App() {
    return (
        <Switch>
            {routes.map(({ ...routeProps }) => (
                <Route key={routeProps.path} {...routeProps} />
            ))}
        </Switch>
    );
}
