import {
    put,
    call,
    CallEffect,
    PutEffect,
} from 'redux-saga/effects';
import { setUnexpectedError } from '../../actions/app';
import { profile, avatar, password } from '../../../app/api/users';
import { user } from '../../../app/api/auth';
import { fetchUserFulfilled } from '../../actions/auth/user';
import type { Action, ActionPayload } from '../../actions/types';
import type { UserResponse } from '../../../app/api/auth/types';
import type {
    ProfileProps,
    PasswordProps,
    AvatarProps,
    AvatarResponse,
} from '../../../app/api/users/types';

export function* workerProfile(
    action: ActionPayload<ProfileProps>,
): Generator<CallEffect<UserResponse>
    | PutEffect<ActionPayload<UserResponse>>
    | PutEffect<ActionPayload<boolean>>, void, UserResponse> {
    try {
        yield call(profile, action.payload);

        const response: UserResponse = yield call(user);

        yield put(fetchUserFulfilled(response));
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerAvatar(
    action: ActionPayload<AvatarProps>,
): Generator<CallEffect<UserResponse>
    | CallEffect<AvatarResponse>
    | PutEffect<ActionPayload<UserResponse>>
    | PutEffect<Action>> {
    try {
        yield call(avatar, action.payload);

        const response = yield call(user);

        yield put(fetchUserFulfilled(response as UserResponse));
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}

export function* workerPassword(
    action: ActionPayload<PasswordProps>,
): Generator<PutEffect<ActionPayload<boolean>> | CallEffect<string>, void, unknown> {
    try {
        yield call(password, action.payload);
    } catch (error) {
        yield put(setUnexpectedError(true));
    }
}
