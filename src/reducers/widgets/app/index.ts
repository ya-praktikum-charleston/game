import type { AppStore } from './types';
import type { ActionPayload } from '../../../actions/types';

import {
	SET_APP_LOADING,
	SET_APP_AUTHORIZED,
	SET_APP_UNAUTHORIZED,
	SET_APP_UNEXPECTED_ERROR,
	SET_GAME_START,
	SET_HERO_NAME,
	SET_LEADERBOARD,
	LEADERBOARD_LIST,
} from '../../../actions/app';

const initialState = {
	loading: false,
	authorized: false,
	unauthorized: false,
	unexpectedError: false,
	gamaRunner: false,
	heroName: 'angel1',
	leaderboard: [],
	addLeaderboard: false,
};

export const app = (store: AppStore = initialState, action: ActionPayload<boolean>): AppStore => {
	switch (action.type) {
		case LEADERBOARD_LIST: {
			store.leaderboard = action.payload;
			debugger
			return store;
		}
		case SET_LEADERBOARD: {
			store.addLeaderboard = action.payload;
			return store;
		}
		case SET_HERO_NAME: {
			store.heroName = action.payload;

			return store;
		}
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
