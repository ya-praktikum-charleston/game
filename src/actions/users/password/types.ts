import type { PasswordProps } from '../../../../app/api/users/types';
import type { ActionPayload } from '../../types';

export type PasswordAction = (payload: PasswordProps) => ActionPayload<PasswordProps>;
