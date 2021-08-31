import type { UserResponse } from '../../../../app/api/auth/types';

export const getSignup = (store) => store.collections.signup;
export const getSignin = (store) => store.collections.signin;
export const getUser = (store): UserResponse => store.collections.user;
export const getLogout = (store) => store.collections.logout;
