import React from 'react';
import { Route, Redirect } from 'react-router-dom';

const AuthRoute = ({ children, ...rest }) => {
    return (
        <Route
            {...rest}
            render={() => {
                if (localStorage.getItem('isAuth') !== 'OK') {
                    return children;
                }

                return <Redirect to="/" />;
            }}
        />
    );
};

export default AuthRoute;
