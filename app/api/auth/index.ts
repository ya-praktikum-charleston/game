import axios from '../../utils/axios-instance';
import type {
    SignupProps,
    SigninProps,
    SignupResponse,
    SigninResponse,
    UserResponse,
    LogoutResponse,
} from './types';

export const signup = (props: SignupProps) => axios.post<SignupResponse>('/auth/signup', props)
    .then(({ data }) => data);

export const signin = (props: SigninProps) => axios.post<SigninResponse>('/auth/signin', props)
    .then(({ data }) => data);

export const user = () => axios.get<UserResponse>('/auth/user')
    .then(({ data }) => data);

export const logout = () => axios.post<LogoutResponse>('/auth/logout')
    .then(({ data }) => data);
