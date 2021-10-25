import { fetchUser } from '../src/actions/auth/user';

export default [
    {
        path: '/',
        exact: true,
        strict: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
    {
        path: '/forum',
        exact: true,
        strict: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
    {
        path: '/leaderboard',
        strict: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
    {
        path: '/profile',
        strict: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
    {
        path: '/forum/:id',
        strict: true,
        fetchData({ dispatch, params }) {
            dispatch(fetchUser(params));
        },
    },
];
