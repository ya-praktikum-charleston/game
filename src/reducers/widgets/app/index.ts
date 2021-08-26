import {
    SET_APP_LOADING,
    SET_APP_AUTHORIZED,
    SET_APP_UNAUTHORIZED,
    SET_APP_UNEXPECTED_ERROR,
} from '../../../actions/app';

const initialState = {
    loading: false,
    authorized: false,
    unauthorized: false,
    unexpectedError: false,
};

export const app = (store = initialState, action) => {
	switch (action.type) {
        case SET_APP_LOADING: {
			store.loading = action.payload;

			return store;
		}

        case SET_APP_AUTHORIZED: {
			store.authorized = action.payload;

			return store;
		}

		case SET_APP_UNAUTHORIZED: {
			store.unauthorized = action.payload;

			return store;
		}

		case SET_APP_UNEXPECTED_ERROR: {
			store.unexpectedError = action.payload;

			return store;
		}

		default:
			return store;
	}
};
