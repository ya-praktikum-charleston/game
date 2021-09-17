import { createStore, compose, applyMiddleware } from 'redux';
import createSagaMiddleware from 'redux-saga';
import { rootReducer } from '../reducers';
import rootSaga from '../sagas';
import { isServer } from '../utilities/isServer';

function getComposeEnhancers() {
	if (process.env.NODE_ENV !== 'production' && !isServer) {
		return window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
	}
	return compose;
}

const composeEnhancers = getComposeEnhancers();
const sagaMiddleware = createSagaMiddleware();

export const create = <T>(initialState: T) => {
	const store = createStore(
		rootReducer,
		initialState,
		composeEnhancers(applyMiddleware(sagaMiddleware)),
	);
	if (!isServer) {
		sagaMiddleware.run(rootSaga);
	}

	return store;
};
