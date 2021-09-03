import type { PasswordAction } from '../../../actions/users/password/types';
import type { PasswordProps } from '../../../../app/api/users/types';

export type Props = {
    password: PasswordAction,
};

export type PasswordFormProps = PasswordProps & {
    confirmNewPassword: string;
};
