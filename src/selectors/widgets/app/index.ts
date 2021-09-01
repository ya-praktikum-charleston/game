import type { Store } from '../../../reducers/types';

export const getLoading = (store: Store) => store.widgets.app.loading;
export const getAuthorized = (store: Store) => store.widgets.app.authorized;
export const getUnauthorized = (store: Store) => store.widgets.app.unauthorized;
export const getUnexpectedError = (store: Store) => store.widgets.app.unexpectedError;
