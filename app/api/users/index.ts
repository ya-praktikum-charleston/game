import axios from '../../utils/axios-instance';

export const profile = () => axios.put('/user/profile')
    .then(({ data }) => data);

export const avatar = () => axios.put('/user/profile/avatar')
    .then(({ data }) => data);

export const password = () => axios.put('/user/password')
    .then(({ data }) => data);
