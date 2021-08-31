import type { ErrorType } from '../../../../app/utils/axios-instance/types';
import type {
    SignupResponse,
    SigninResponse,
    UserResponse,
    LogoutResponse,
} from '../../../../app/api/auth/types';
import type { Action, ActionPayload } from '../../../actions/types';
import type {
    Signup,
    Signin,
    User,
    Logout,
} from './types';
import { FETCH_SIGNUP_FULFILLED, FETCH_SIGNUP_FAILED, RESET_SIGNUP } from '../../../actions/auth/signup';
import { FETCH_SIGNIN_FULFILLED, FETCH_SIGNIN_FAILED, RESET_SIGNIN } from '../../../actions/auth/signin';
import { FETCH_USER_FULFULLED } from '../../../actions/auth/user';
import { FETCH_LOGOUT_FULFILLED, FETCH_LOGOUT_FAILED, RESET_LOGOUT } from '../../../actions/auth/logout';

const initialSignup: Signup = {
    data: null,
    error: null,
};

export const signup = (
    store = initialSignup,
    action: Action | ActionPayload<SignupResponse | string>,
) => {
	switch (action.type) {
		case FETCH_SIGNUP_FULFILLED: {
			store.data = (action as ActionPayload<SignupResponse>).payload;

			return store;
		}

        case FETCH_SIGNUP_FAILED: {
			store.error = (action as ActionPayload<string>).payload;

			return store;
		}

        case RESET_SIGNUP: {
			store.data = null;
            store.error = null;

			return store;
		}

		default:
			return store;
	}
};

const initialSignin: Signin = {
    data: null,
    error: null,
};

export const signin = (
    store = initialSignin,
    action: Action | ActionPayload<SigninResponse | ErrorType>,
) => {
	switch (action.type) {
		case FETCH_SIGNIN_FULFILLED: {
			store.data = (action as ActionPayload<SigninResponse>).payload;

			return store;
		}

        case FETCH_SIGNIN_FAILED: {
			store.error = (action as ActionPayload<string>).payload;

			return store;
		}

        case RESET_SIGNIN: {
			store.data = null;
			store.error = null;

			return store;
		}

		default:
			return store;
	}
};

const initialUser: User = {};

export const user = (
    store = initialUser,
    action: ActionPayload<UserResponse>,
): UserResponse => {
	switch (action.type) {
		case FETCH_USER_FULFULLED: {
            store = action.payload;

			return store;
		}

		default:
			return store;
	}
};

const initialLogout: Logout = {
    data: null,
    error: null,
};

export const logout = (
    store = initialLogout,
    action: Action | ActionPayload<LogoutResponse | ErrorType>,
) => {
	switch (action.type) {
		case FETCH_LOGOUT_FULFILLED: {
            store.data = (action as ActionPayload<LogoutResponse>).payload;

			return store;
		}

        case FETCH_LOGOUT_FAILED: {
			store.error = (action as ActionPayload<string>).payload;

			return store;
		}

        case RESET_LOGOUT: {
			store.data = null;
			store.error = null;

			return store;
		}

		default:
			return store;
	}
};
