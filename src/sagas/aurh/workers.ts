import { put, call } from 'redux-saga/effects';
import { signup, signin, user, logout } from '../../../app/api/auth';
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

export function* workerSignup(action) {
    try {
		const response = yield call(signup, action.payload);

		yield put(signupFilfilldAction(response));

        yield put(signupResetAction());
	} catch (error) {
		const { response } = error;

		switch (response.status) {
			case 400:
				yield put(signupFailedAction(response.data.reason));
				break;

            case 401:
                yield put(signupFailedAction(response.data.reason));
                break;

			case 500:
				yield put(setUnexpectedError(true));
				break;

			default:
				break;
		}
	}
}

export function* workerSignin(action) {
    try {
		const response = yield call(signin, action.payload);

		yield put(signinFilfilldAction(response));

        yield put(signinResetAction());
	} catch (error) {
		const { response } = error;

		switch (response.status) {
			case 400:
				yield put(signinFailedAction(response.data.reason));
				break;

            case 401:
                yield put(signinFailedAction(response.data.reason));
                break;

			case 500:
				yield put(setUnexpectedError(true));
				break;

			default:
				break;
		}
	}
}

export function* workerUser() {
	yield put(setLoading(true));

	try {
		const response = yield call(user);

		yield put(fetchUserFulfilled(response));

		yield put(setAuthorized(true));
	} catch (error) {
		const { response } = error;

        switch (response.status) {
			case 401:
				yield put(setUnauthorized(true));
				break;

			case 500:
				yield put(setUnexpectedError(true));
				break;

			default:
				break;
		}
	}

	yield put(setLoading(false));
}

export function* workerLogout() {
    try {
		const response = yield call(logout);

		yield put(logoutFilfilldAction(response));

        yield put(logoutResetAction());
	} catch (error) {
		const { response } = error;

		switch (response.status) {
			case 500:
				yield put(setUnexpectedError(true));
				break;

			default:
				break;
		}
	}
}
