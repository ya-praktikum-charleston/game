export const SET_APP_LOADING = 'app/LOADING';
export const SET_APP_AUTHORIZED = 'app/AUTHORIZED';
export const SET_APP_UNAUTHORIZED = 'app/UNAUTHORIZED';
export const SET_APP_UNEXPECTED_ERROR = 'app/UNAUTHORIZED';

export const setLoading = (payload) => {
	return {
		type: SET_APP_LOADING,
		payload,
	};
};

export const setAuthorized = (payload) => {
	return {
		type: SET_APP_AUTHORIZED,
		payload,
	};
};

export const setUnauthorized = (payload) => {
	return {
		type: SET_APP_UNAUTHORIZED,
		payload,
	};
};

export const setUnexpectedError = (payload) => {
	return {
		type: SET_APP_UNEXPECTED_ERROR,
		payload,
	};
};
