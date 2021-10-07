import type { ActionPayload } from '../types';

export const SET_APP_LOADING = 'app/LOADING';
export const SET_APP_AUTHORIZED = 'app/AUTHORIZED';
export const SET_APP_UNAUTHORIZED = 'app/UNAUTHORIZED';
export const SET_APP_UNEXPECTED_ERROR = 'app/UNAUTHORIZED';
export const SET_GAME_START = 'app/GAMESTART';
export const SET_HERO_NAME = 'app/HERONAME';

export const setHeroName = (payload: string): ActionPayload<string> => {
	return {
		type: SET_HERO_NAME,
		payload,
	};
};

export const setGameStart = (payload: boolean): ActionPayload<boolean> => {
	return {
		type: SET_GAME_START,
		payload,
	};
};

export const setLoading = (payload: boolean): ActionPayload<boolean> => {
	return {
		type: SET_APP_LOADING,
		payload,
	};
};

export const setAuthorized = (payload: boolean): ActionPayload<boolean> => {
	return {
		type: SET_APP_AUTHORIZED,
		payload,
	};
};

export const setUnauthorized = (payload: boolean): ActionPayload<boolean> => {
	return {
		type: SET_APP_UNAUTHORIZED,
		payload,
	};
};

export const setUnexpectedError = (payload: boolean): ActionPayload<boolean> => {
	return {
		type: SET_APP_UNEXPECTED_ERROR,
		payload,
	};
};
