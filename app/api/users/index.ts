import axios from '../../utils/axios-instance';
import type { ProfileProps, PasswordProps } from './types';

export const profile = (props: ProfileProps) => axios.put('/user/profile', props)
    .then(({ data }) => data);

export const avatar = (props) => axios.put('/user/profile/avatar', props)
    .then(({ data }) => data);

export const password = (props: PasswordProps) => axios.put('/user/password', props)
    .then(({ data }) => data);
