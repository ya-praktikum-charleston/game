import 'regenerator-runtime/runtime';
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import { Provider } from 'react-redux';
import { loadableReady } from '@loadable/component';
import 'babel-polyfill';
import { create } from '../src/store';
import App from '../src/App';

const initialState = (window as any).__INITIAL_STATE__ || {};

const store = create(initialState);

loadableReady(() => {
    ReactDOM.hydrate(
        <Provider store={store}>
            <BrowserRouter>
                <App />
            </BrowserRouter>
        </Provider>,
        document.getElementById('root'),
    );
});
