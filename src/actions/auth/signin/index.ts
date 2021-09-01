import { SigninProps, SigninResponse } from '../../../../app/api/auth/types';

export const FETCH_SIGNIN = 'signin/FETCH';
export const FETCH_SIGNIN_FULFILLED = 'signin/FETCH_FULFILLED';
export const FETCH_SIGNIN_FAILED = 'signin/FETCH_FAILED';
export const RESET_SIGNIN = 'signin/RESET';

export const signinAction = (payload: SigninProps) => {
    return {
        type: FETCH_SIGNIN,
        payload,
    };
};

export const signinFilfilldAction = (response: SigninResponse) => {
    return {
        type: FETCH_SIGNIN_FULFILLED,
        payload: response,
    };
};

export const signinFailedAction = (error: string) => {
    return {
        type: FETCH_SIGNIN_FAILED,
        payload: error,
    };
};

export const signinResetAction = () => {
    return {
        type: RESET_SIGNIN,
    };
};
