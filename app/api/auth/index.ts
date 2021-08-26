import axios from '../../utils/axios-instance';

export const signup = (props) => axios.post('/auth/signup', props)
    .then(({ data }) => data);

export const signin = (props) => axios.post('/auth/signin', props)
    .then(({ data }) => data);

export const user = () => axios.get('/auth/user')
    .then(({ data }) => data);

export const logout = () => axios.post('/auth/logout')
    .then(({ data }) => data);
