import type { App } from './types';
import type { ActionPayload } from '../../../actions/types';

import {
	SET_APP_LOADING,
	SET_APP_AUTHORIZED,
	SET_APP_UNAUTHORIZED,
	SET_APP_UNEXPECTED_ERROR,
	SET_GAME_START,
} from '../../../actions/app';

const initialState = {
	loading: false,
	authorized: false,
	unauthorized: false,
	unexpectedError: false,
	gamaRunner: false,
};

export const app = (store: App = initialState, action: ActionPayload<boolean>) => {
	switch (action.type) {
		case SET_GAME_START: {
			store.gamaRunner = action.payload;

			return store;
		}
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
