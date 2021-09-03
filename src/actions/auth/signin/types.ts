import type { SigninProps, SignupProps } from '../../../../app/api/auth/types';
import type { ActionPayload } from '../../types';

export type SigninAction = (payload: SigninProps) => ActionPayload<SigninProps>;
export type SignupAction = (payload: SignupProps) => ActionPayload<SignupProps>;
