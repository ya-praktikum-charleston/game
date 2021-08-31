import { put, call } from 'redux-saga/effects';
import { setUnexpectedError } from '../../actions/app';
import { profile, avatar, password } from '../../../app/api/users';
import { user } from '../../../app/api/auth';
import { fetchUserFulfilled } from '../../actions/auth/user';
import type { ActionPayload } from '../../actions/types';
import type { UserResponse } from '../../../app/api/auth/types';
import type { ProfileProps, PasswordProps } from '../../../app/api/users/types';

export function* workerProfile(action: ActionPayload<ProfileProps>) {
    try {
        yield call(profile, action.payload);

		const response: UserResponse = yield call(user);

		yield put(fetchUserFulfilled(response));
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerAvatar(action) {
    try {
        yield call(avatar, action.payload);
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerPassword(action: ActionPayload<PasswordProps>) {
    try {
        yield call(password, action.payload);
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}
