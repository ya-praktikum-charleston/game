export const FETCH_USER = 'user/FETCH';
export const FETCH_USER_FULFULLED = 'user/FETCH_FULFULLED';
export const FETCH_USER_FAILED = 'user/FETCH_FAILED';

export const fetchUser = () => {
	return {
		type: FETCH_USER,
	};
};

export const fetchUserFulfilled = (response) => {
	return {
		type: FETCH_USER_FULFULLED,
		payload: response,
	};
};

export const fetchUserFailed = (error) => {
	return {
		type: FETCH_USER_FAILED,
		payload: error,
	};
};
