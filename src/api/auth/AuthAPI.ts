import axios from '../../utilities/axios-instance';
import { SigninProps, SingupProps } from './types';

export default class AuthAPI {
    signup(props: SingupProps) {
        return axios.post('/auth/signup', props);
    }

    signin(props: SigninProps) {
        return axios.post('/auth/signin', props);
    }

    user() {
        return axios.get('/auth/user');
    }

    logout() {
        return axios.post('/auth/logout');
    }
}
