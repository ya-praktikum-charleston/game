import type { SigninAction } from '../../actions/auth/signin/types';
import type { SigninStore } from '../../reducers/collections/auth/types';

export type Props = {
    signinStore: SigninStore;
    signin: SigninAction;
};
