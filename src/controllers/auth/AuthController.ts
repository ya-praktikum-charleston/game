import { SigninProps } from '../../api/auth/types';
import AuthAPI from '../../api/auth/AuthAPI';

class AuthController {
    private auth;

    constructor() {
        this.auth = new AuthAPI();
    }

    signin(props: SigninProps, history) {
        this.auth.signin(props)
            .then((response) => {
                const { status, data } = response;

                switch (status) {
                case 200:
                    localStorage.setItem('isAuth', data);
                    history.push('/');

                    break;

                default:
                    break;
                }
            });
    }

    user() {
        return this.auth.user();
    }

    logout(history) {
        this.auth.logout()
            .then((response) => {
                const { status } = response;

                switch (status) {
                case 200:
                    localStorage.setItem('isAuth', '');
                    history.push('/signin');
                    break;

                default:
                    break;
                }
            });
    }
}

export default AuthController;
