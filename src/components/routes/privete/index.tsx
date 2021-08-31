import React, { useEffect } from 'react';
import { Route, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import Loading from '../../loading';
import { fetchUser } from '../../../actions/auth/user';
import {
    getLoading,
    getAuthorized,
    getUnauthorized,
    getUnexpectedError,
} from '../../../selectors/widgets/app';

const PrivateRoute = ({
    children,
    isAuthorized,
    isLoading,
    fetchUser,
    isUnauthorized,
    isUnexpectedError,
    ...props
}) => {
	useEffect(() => {
        if (!isAuthorized) {
            fetchUser();
        }
	}, [isAuthorized, fetchUser]);

    return (
        <Route
            {...props}
            render={() => {
				if (isAuthorized) {
					return children;
				}

                if (isLoading) {
					return <Loading />;
				}

                if (isUnauthorized) {
                    return <Redirect to="/signin" />;
                }

                if (isUnexpectedError) {
                    return <Redirect to="/500" />;
                }

                return <Loading />;
            }}
        />
    );
};

const mapStateToProps = (store) => ({
    isLoading: getLoading(store),
    isAuthorized: getAuthorized(store),
    isUnauthorized: getUnauthorized(store),
    isUnexpectedError: getUnexpectedError(store),
});

export default connect(mapStateToProps, { fetchUser })(PrivateRoute);
