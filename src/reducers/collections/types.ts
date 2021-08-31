import type {
    Signup,
    Signin,
    User,
    Logout,
} from './auth/types';

export type Collections = {
    signup: Signup,
    signin: Signin,
    user: User,
    logout: Logout,
};
