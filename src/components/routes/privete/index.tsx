import React from 'react';
import { Route, Redirect } from 'react-router-dom';

const PrivateRoute = ({ children, ...rest }) => {
    return (
        <Route
            {...rest}
            render={() => {
                if (localStorage.getItem('isAuth') === 'OK') {
                    return children;
                }

                return <Redirect to="/signin" />;
            }}
        />
    );
};

export default PrivateRoute;
