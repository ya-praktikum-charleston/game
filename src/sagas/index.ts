import { fork } from 'redux-saga/effects';
import { watchAuth } from './auth/watchers';
import { watchUsers } from './users/watchers';

export default function* rootSaga() {
    yield fork(watchAuth);
    yield fork(watchUsers);
}
