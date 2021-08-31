import { SigninProps, SigninResponse } from '../../../../app/api/auth/types';
import type { Action, ActionPayload } from '../../types';

export const FETCH_SIGNIN = 'signin/FETCH';
export const FETCH_SIGNIN_FULFILLED = 'signin/FETCH_FULFILLED';
export const FETCH_SIGNIN_FAILED = 'signin/FETCH_FAILED';
export const RESET_SIGNIN = 'signin/RESET';

export const signinAction = (authProps: SigninProps): ActionPayload<SigninProps> => {
    return {
        type: FETCH_SIGNIN,
        payload: authProps,
    };
};

export const signinFilfilldAction = (response: SigninResponse): ActionPayload<SigninResponse> => {
    return {
        type: FETCH_SIGNIN_FULFILLED,
        payload: response,
    };
};

export const signinFailedAction = (error: string): ActionPayload<string> => {
    return {
        type: FETCH_SIGNIN_FAILED,
        payload: error,
    };
};

export const signinResetAction = (): Action => {
    return {
        type: RESET_SIGNIN,
    };
};
