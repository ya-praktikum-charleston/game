import type {
    SignupStore,
    SigninStore,
    UserStore,
    LogoutStore,
} from './auth/types';

export type Collections = {
    signup: SignupStore,
    signin: SigninStore,
    user: UserStore,
    logout: LogoutStore,
};
