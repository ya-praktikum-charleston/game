export const FETCH_LOGOUT = 'logout/FETCH';
export const FETCH_LOGOUT_FULFILLED = 'logout/FETCH_FULFILLED';
export const FETCH_LOGOUT_FAILED = 'logout/FETCH_FAILED';
export const RESET_LOGOUT = 'logout/RESET';

export const logoutAction = () => {
    return {
        type: FETCH_LOGOUT,
    };
};

export const logoutFilfilldAction = (response) => {
    return {
        type: FETCH_LOGOUT_FULFILLED,
        payload: response,
    };
};

export const logoutFailedAction = (error) => {
    return {
        type: FETCH_LOGOUT_FAILED,
        payload: error,
    };
};

export const logoutResetAction = () => {
    return {
        type: RESET_LOGOUT,
    };
};
