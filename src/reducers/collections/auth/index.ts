import { FETCH_SIGNUP_FULFILLED, FETCH_SIGNUP_FAILED, RESET_SIGNUP } from '../../../actions/auth/signup';
import { FETCH_SIGNIN_FULFILLED, FETCH_SIGNIN_FAILED, RESET_SIGNIN } from '../../../actions/auth/signin';
import { FETCH_USER_FULFULLED, FETCH_USER_FAILED } from '../../../actions/auth/user';
import { FETCH_LOGOUT_FULFILLED, FETCH_LOGOUT_FAILED, RESET_LOGOUT } from '../../../actions/auth/logout';

export const signup = (state = {}, action) => {
	switch (action.type) {
		case FETCH_SIGNUP_FULFILLED: {
			state.id = action.payload.id;

			return state;
		}

        case FETCH_SIGNUP_FAILED: {
			state.error = action.payload;

			return state;
		}

        case RESET_SIGNUP: {
			state.id = null;
            state.error = null;

			return state;
		}

		default:
			return state;
	}
};

export const signin = (state = {}, action) => {
	switch (action.type) {
		case FETCH_SIGNIN_FULFILLED: {
			state.data = action.payload;

			return state;
		}

        case FETCH_SIGNIN_FAILED: {
			state.error = action.payload;

			return state;
		}

        case RESET_SIGNIN: {
			state.data = null;
			state.error = null;

			return state;
		}

		default:
			return state;
	}
};

export const user = (state = {}, action) => {
	switch (action.type) {
		case FETCH_USER_FULFULLED: {
			state.data = action.payload;

			return state;
		}

		case FETCH_USER_FAILED: {
			state.error = action.payload;

			return state;
		}

		default:
			return state;
	}
};

export const logout = (state = {}, action) => {
	switch (action.type) {
		case FETCH_LOGOUT_FULFILLED: {
			state.data = action.payload;

			return state;
		}

        case FETCH_LOGOUT_FAILED: {
			state.error = action.payload;

			return state;
		}

        case RESET_LOGOUT: {
			state.data = null;
			state.error = null;

			return state;
		}

		default:
			return state;
	}
};
