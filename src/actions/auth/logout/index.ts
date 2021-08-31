import type { Action, ActionPayload } from '../../types';
import type { LogoutResponse } from '../../../../app/api/auth/types';
import type { ErrorType } from '../../../../app/utils/axios-instance/types';

export const FETCH_LOGOUT = 'logout/FETCH';
export const FETCH_LOGOUT_FULFILLED = 'logout/FETCH_FULFILLED';
export const FETCH_LOGOUT_FAILED = 'logout/FETCH_FAILED';
export const RESET_LOGOUT = 'logout/RESET';

export const logoutAction = (): Action => {
    return {
        type: FETCH_LOGOUT,
    };
};

export const logoutFilfilldAction = (response: LogoutResponse): ActionPayload<LogoutResponse> => {
    return {
        type: FETCH_LOGOUT_FULFILLED,
        payload: response,
    };
};

export const logoutFailedAction = (error: ErrorType): ActionPayload<ErrorType> => {
    return {
        type: FETCH_LOGOUT_FAILED,
        payload: error,
    };
};

export const logoutResetAction = (): Action => {
    return {
        type: RESET_LOGOUT,
    };
};
