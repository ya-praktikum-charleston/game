import type { Immutable } from 'immer';
import type { Collections } from './collections/types';

export type Store = Immutable<{
    widgets: any;
    collections: Collections;
}>;
