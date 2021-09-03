import type { SignupStore } from '../../reducers/collections/auth/types';
import type { SignupAction } from '../../actions/auth/signin/types';
import type { SignupProps } from '../../../app/api/auth/types';

export type Props = {
    signupResult: SignupStore;
    signup: SignupAction;
};

export type SignupFormProps = SignupProps & {
    'confirm': string;
};
