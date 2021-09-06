import React from 'react';
import { Link, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import { Form } from 'react-final-form';
import * as Yup from 'yup';
import { SchemaOf } from 'yup';
import { validateFormValues } from '../../utilities/validator';
import { signinAction } from '../../actions/auth/signin';
import Main from '../../components/main';
import { getSignin } from '../../selectors/collections/auth';
import Field from '../../components/field';
import './signin.css';

const SigninSchema: SchemaOf<SigninProps> = Yup.object().shape({
    login: Yup.string().required('Пожалуйста, укажите логин'),
    password: Yup.string().required('Пожалуйста, укажите пароль'),
});

const validate = validateFormValues(SigninSchema);

type SigninProps = {
    signinAction: typeof signinAction;
    signinResult: {
        data?: 'OK';
        error?: string;
    }
};

const LoginPassError = ({signinResult}) => {
    if (signinResult.error !== 'Login or password is incorrect') {
        return null;
    }

   return (
       <div>Не правильный логин или пароль</div>
   );
};

const Signin = ({ signinResult, ...props }: SigninProps) => {
    const onSubmitHandler = (values) => {
        props.signinAction(values);
    };

    if (signinResult.data === 'OK' || signinResult.error === 'User already in system') {
        return <Redirect to="/" />;
    }

    return (
        <>
            <Main title="GAME" offBtnIcon>
                <div className="signin">
                    <Form
                        onSubmit={onSubmitHandler}
                        validate={validate}
                        render={({ handleSubmit, submitting }) => (
                            <form className="form" onSubmit={handleSubmit}>
                                <Field name="login" type="text" placeholder="Логин" />
                                <Field name="password" type="password" placeholder="Пароль" />
                                <div className="form__redirect">
                                    <Link to="/signup">Регистрация</Link>
                                </div>
                                <button
                                    type="submit"
                                    className="btn fullwidth"
                                    disabled={submitting}
                                >
                                    Вход
                                </button>
                                <LoginPassError signinResult={signinResult} />
                            </form>
                        )}
                    />
                </div>
            </Main>
        </>
    );
};

const mapStateToProps = (store: Store) => ({
    signinResult: getSignin(store),
});

const mapDispatchToProps = {
    signin: signinAction,
};

export default connect(mapStateToProps, mapDispatchToProps)(Signin);
