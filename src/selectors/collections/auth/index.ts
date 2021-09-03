import type { Store } from '../../../reducers/types';

export const getSignup = (store: Store) => store.collections.signup;
export const getSignin = (store: Store) => store.collections.signin;
export const getUser = (store: Store) => store.collections.user;
export const getUserAvatar = (store: Store) => {
    const avatarPath = store.collections.user.avatar;

    if (avatarPath) {
        return `https://ya-praktikum.tech/api/v2/resources/${avatarPath}`;
    }

    return null;
};
export const getLogout = (store: Store) => store.collections.logout;
