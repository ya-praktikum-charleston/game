import React from 'react';
import { Link, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import { Form, Field } from 'react-final-form';
import * as Yup from 'yup';
import { SchemaOf } from 'yup';
import { validateFormValues } from '../../utilities/validator';
import { signinAction } from '../../actions/auth/signin';
import Main from '../../components/main';
import { getSignin } from '../../selectors/collections/auth';
import type { Store } from '../../reducers/types';
import type { Props } from './types';
import type { SigninProps } from '../../../app/api/auth/types';
import './signin.css';

const SigninSchema: SchemaOf<SigninProps> = Yup.object().shape({
    login: Yup.string().required('Пожалуйста, укажите логин'),
    password: Yup.string().required('Пожалуйста, укажите пароль'),
});

const validate = validateFormValues(SigninSchema);

const Signin = ({ signin, signinResult }: Props) => {
    const onSubmitHandler = (values: SigninProps) => {
        signin(values);
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
                                <Field name="login">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" type="text" placeholder="Логин" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="password">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" type="password" placeholder="Пароль" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
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
                                {
                                    (signinResult.error === 'Login or password is incorrect')
                                        ? <div>Не правильный логин или пароль</div>
                                        : ''
                                }
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
