import type { ProfileProps } from '../../../../app/api/users/types';
import { ActionPayload } from '../../types';

export const SET_PROFILE = 'profile/SET';
export const SET_PROFILE_FULFILLED = 'profile/SET_FULFILLED';
export const SET_PROFILE_FAILED = 'profile/SET_FAILED';

export const profileAction = (props: ProfileProps) => {
    return {
        type: SET_PROFILE,
        payload: props,
    } as ActionPayload<ProfileProps>;
};

export const profileFilfilldAction = (response) => {
    return {
        type: SET_PROFILE_FULFILLED,
        payload: response,
    };
};

export const profileFailedAction = (error) => {
    return {
        type: SET_PROFILE_FAILED,
        payload: error,
    };
};
