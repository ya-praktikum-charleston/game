import UserAPI from '../../api/user/UserAPI';
import { ProfileProps, PasswordProps } from '../../api/user/types';

export default class UserController {
    private user;

    constructor() {
        this.user = new UserAPI();
    }

    changeProfile(values: ProfileProps) {
        this.user.changeProfile(values);
    }

    changePassword(values: PasswordProps) {
        this.user.changeProfile(values);
    }
}
