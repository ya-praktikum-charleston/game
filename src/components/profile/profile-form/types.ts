import type { UserResponse } from '../../../../app/api/auth/types';
import type { ProfileAction } from '../../../actions/users/profile/types';

export type Props = {
    user: UserResponse;
    profile: ProfileAction;
};
