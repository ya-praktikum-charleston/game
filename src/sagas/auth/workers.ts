import { put, call } from 'redux-saga/effects';
import type { ErrorType } from '../../../app/utils/axios-instance/types';
import type { ActionPayload } from '../../actions/types';
import type {
    LogoutResponse,
    SigninProps,
    SigninResponse,
    SignupProps,
    SignupResponse,
    UserResponse,
} from '../../../app/api/auth/types';
import {
    signup,
    signin,
    user,
    logout,
} from '../../../app/api/auth';
import { signupFilfilldAction, signupFailedAction, signupResetAction } from '../../actions/auth/signup';
import { signinFilfilldAction, signinFailedAction, signinResetAction } from '../../actions/auth/signin';
import { logoutFilfilldAction, logoutResetAction } from '../../actions/auth/logout';
import { fetchUserFulfilled } from '../../actions/auth/user';
import {
    setLoading,
    setAuthorized,
    setUnauthorized,
    setUnexpectedError,
} from '../../actions/app';

export function* workerSignup(action: ActionPayload<SignupProps>) {
    try {
		const response: SignupResponse = yield call(signup, action.payload);

		yield put(signupFilfilldAction(response));

        yield put(signupResetAction());
	} catch (error) {
		const { response } = error as ErrorType;

        if (response) {
            switch (response.status) {
                case 400:
                    yield put(signupFailedAction(response.data.reason));
                    break;

                case 401:
                    yield put(signupFailedAction(response.data.reason));
                    break;

                default:
                    yield put(setUnexpectedError(true));
                    break;
            }
        }
	}
}

export function* workerSignin(action: ActionPayload<SigninProps>) {
    try {
		const response: SigninResponse = yield call(signin, action.payload);

		yield put(signinFilfilldAction(response));

        yield put(signinResetAction());
	} catch (error) {
		const { response } = error as ErrorType;

		switch (response?.status) {
			case 400:
				yield put(signinFailedAction(response.data.reason));
				break;

            case 401:
                yield put(signinFailedAction(response.data.reason));
                break;

			default:
				yield put(setUnexpectedError(true));
				break;
		}
	}
}

export function* workerUser() {
	yield put(setLoading(true));

	try {
		const response: UserResponse = yield call(user);

		yield put(fetchUserFulfilled(response));

		yield put(setAuthorized(true));
	} catch (error) {
		const { response } = error as ErrorType;

        switch (response?.status) {
			case 401:
				yield put(setUnauthorized(true));
				break;

			default:
				yield put(setUnexpectedError(true));
				break;
		}
	}

	yield put(setLoading(false));
}

export function* workerLogout() {
    try {
		const response: LogoutResponse = yield call(logout);

		yield put(logoutFilfilldAction(response));

        yield put(logoutResetAction());
	} catch (error) {
        yield put(setUnexpectedError(true));
	}
}
