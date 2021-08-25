import React, { useEffect } from 'react';
import { Route, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import Loading from '../../loading';
import { fetchUser } from '../../../actions/auth/user';

const AuthRoute = ({
    fetchUser,
    setLoading,
    isLoading,
    isUnauthorized,
    isAuthorized,
    isUnexpectedError,
    children,
    user,
    ...rest
    }) => {
	useEffect(() => {
        if (!isAuthorized) {
            fetchUser();
        }
	});

    return (
        <Route
            {...rest}
			render={() => {
				if (isAuthorized) {
					return <Redirect to="/" />;
				}

				if (isUnauthorized) {
					return children;
				}

				if (isUnexpectedError) {
					return <Redirect to="/500" />;
				}

				if (isLoading) {
					return <Loading />;
				}
            }}
        />
    );
};

const mapStateToProps = (store) => ({store});

export default connect(mapStateToProps, { fetchUser })(AuthRoute);
