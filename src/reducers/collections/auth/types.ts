// export type Store<T, E = string> = {
//     data: T | null;
//     error: E | null;
// };
import type {
    SignupResponse,
    SigninResponse,
    UserResponse,
    LogoutResponse,
} from '../../../../app/api/auth/types';

export type Signup = {
    data: null | SignupResponse;
    error: null | string;
};

export type Signin = {
    data: null | SigninResponse;
    error: null | string;
};

export type User = UserResponse;

export type Logout = {
    data: null | LogoutResponse;
    error: null | string;
};
