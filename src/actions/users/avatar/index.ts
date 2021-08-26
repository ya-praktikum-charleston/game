export const SET_AVATAR = 'avatar/SET';
export const SET_AVATAR_FULFILLED = 'avatar/SET_FULFILLED';
export const SET_AVATAR_FAILED = 'avatar/SET_FAILED';

export const avatarAction = (avatar) => {
    return {
        type: SET_AVATAR,
        payload: avatar,
    };
};

export const avatarFilfilldAction = (response) => {
    return {
        type: SET_AVATAR_FULFILLED,
        payload: response,
    };
};

export const avatarFailedAction = (error) => {
    return {
        type: SET_AVATAR_FAILED,
        payload: error,
    };
};
