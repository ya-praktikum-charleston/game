import { fork, ForkEffect } from 'redux-saga/effects';
import { watchAuth } from './auth/watchers';
import { watchUsers } from './users/watchers';

export default function* rootSaga(): Generator<ForkEffect<void>, void, unknown> {
    yield fork(watchAuth);
    yield fork(watchUsers);
}
