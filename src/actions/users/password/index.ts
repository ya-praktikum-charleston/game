export const SET_PASWORD = 'password/SET';
export const SET_PASWORD_FULFILLED = 'password/SET_FULFILLED';
export const SET_PASWORD_FAILED = 'password/SET_FAILED';

export const passwordAction = (props) => {
    return {
        type: SET_PASWORD,
        payload: props,
    };
};

export const passwordFilfilldAction = (response) => {
    return {
        type: SET_PASWORD_FULFILLED,
        payload: response,
    };
};

export const passwordFailedAction = (error) => {
    return {
        type: SET_PASWORD_FAILED,
        payload: error,
    };
};
