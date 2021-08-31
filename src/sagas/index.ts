import { fork } from 'redux-saga/effects';
import { watchAuth } from './aurh/watchers';

export default function* rootSaga() {
    yield fork(watchAuth);
}
