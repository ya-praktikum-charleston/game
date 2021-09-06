import { fetchUser } from '../../../actions/auth/user/index';

export type Props = {
    children: JSX.Element;
    isAuthorized: boolean;
    isLoading: boolean;
    isUnauthorized: boolean;
    isUnexpectedError: boolean;
    user: typeof fetchUser;
};
