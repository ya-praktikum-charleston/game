import { signinAction } from '../../actions/auth/signin';
import type { SigninStore } from '../../reducers/collections/auth/types';

export type Props = {
    signin: typeof signinAction;
    signinResult: SigninStore;
};
