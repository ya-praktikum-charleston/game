import axios from '../../utils/axios-instance';
import type {
    SignupProps,
    SigninProps,
    SignupResponse,
    SigninResponse,
    UserResponse,
    LogoutResponse,
} from './types';

export const signup = (props: SignupProps): Promise<SignupResponse> => axios.post<SignupResponse>('/auth/signup', props)
    .then(({ data }) => data);

export const signin = (props: SigninProps): Promise<SigninResponse> => axios.post<SigninResponse>('/auth/signin', props)
    .then(({ data }) => {
        return (data);
    });

export const user = (): Promise<UserResponse> => axios.get<UserResponse>('/auth/user')
    .then(({ data }) => data);

export const logout = (): Promise<LogoutResponse> => axios.post<LogoutResponse>('/auth/logout')
    .then(({ data }) => data);
