import { createStore, compose, applyMiddleware } from 'redux';
import createSagaMiddleware, { END } from 'redux-saga';
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

	store.runSaga = sagaMiddleware.run;
	store.close = () => store.dispatch(END);

	if (!isServer) {
		sagaMiddleware.run(rootSaga);
	}

	return store;
};
