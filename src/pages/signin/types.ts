import type { SigninAction } from '../../actions/auth/signin/types';
import type { SigninStore } from '../../reducers/collections/auth/types';

export type Props = {
    signin: SigninAction;
    signinResult: SigninStore;
};
