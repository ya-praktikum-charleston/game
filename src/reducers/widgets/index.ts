import { combineReducers } from 'redux-immer';
import produce from 'immer';
import { app } from './app';

export const widgets = combineReducers(produce, {
	app,
});
