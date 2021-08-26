export const SET_LOGOUT = 'profile/SET';
export const SET_LOGOUT_FULFILLED = 'profile/SET_FULFILLED';
export const SET_LOGOUT_FAILED = 'profile/SET_FAILED';
export const RESET_LOGOUT = 'profile/RESET';

export const profileAction = (props) => {
    return {
        type: SET_LOGOUT,
        payload: props,
    };
};

export const profileFilfilldAction = (response) => {
    return {
        type: SET_LOGOUT_FULFILLED,
        payload: response,
    };
};

export const profileFailedAction = (error) => {
    return {
        type: SET_LOGOUT_FAILED,
        payload: error,
    };
};

export const profileResetAction = () => {
    return {
        type: RESET_LOGOUT,
    };
};
