import { combineReducers } from 'redux';
import { collections } from './collections';
import { widgets } from './widgets';

export const rootReducer = combineReducers({
	collections,
	widgets,
});
