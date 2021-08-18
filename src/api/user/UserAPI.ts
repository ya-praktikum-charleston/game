import axios from '../../utilities/axios-instance';
import { PasswordProps, ProfileProps } from './types';

export default class UserAPI {
    changeProfile(props: ProfileProps) {
        return axios.put('/user/profile', props)
            .then((response) => {
                return response;
            });
    }

    changePassword(props: PasswordProps) {
        return axios.put('/user/password', props)
            .then((response) => {
                return response;
            });
    }
}
