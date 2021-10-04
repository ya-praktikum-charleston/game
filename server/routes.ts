import { fetchUser } from '../src/actions/auth/user';

export default [
    {
        path: '/',
        exact: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
];
