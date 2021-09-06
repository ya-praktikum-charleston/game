import React from 'react';
import { Link, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import { Form, Field } from 'react-final-form';
import * as Yup from 'yup';
import { SchemaOf } from 'yup';
import { validateFormValues } from '../../utilities/validator';
import Main from '../../components/main';
import { signupAction } from '../../actions/auth/signup';
import { getSignup } from '../../selectors/collections/auth';
<<<<<<< HEAD
import PasswordField from '../../components/fields/password';
import type { Store } from '../../reducers/types';
import type { Props, SignupFormProps } from './types';
=======
import PasswordField from '../../components/field';
>>>>>>> fb8031b50348d2b85f916a50a776b0d6620c5952
import './signup.css';

const SignupSchema: SchemaOf<SignupFormProps> = Yup.object().shape({
    email: Yup.string()
        .email('Пожалуйста, укажите почту')
        .required('Пожалуйста, укажите почту'),
    login: Yup.string().required('Пожалуйста, укажите логин'),
    first_name: Yup.string().required('Пожалуйста, укажите имя'),
    second_name: Yup.string().required('Пожалуйста, укажите фамилию'),
    phone: Yup.string()
        .matches(/^(\s)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/, 'Пожалуйста, укажите телефон')
        .required('Пожалуйста, укажите телефон'),
    password: Yup.string()
        .min(8, 'Пожалуйста, укажите пароль длинее 8 символов')
        .required('Пожалуйста, укажите пароль длинее 8 символов'),
    confirm: Yup.string()
        .oneOf([Yup.ref('password'), null], 'Пароли не совпадают')
        .required('Пароли не совпадают'),
});

const validate = validateFormValues(SignupSchema);

const Signup = ({ signupResult, signup }: Props) => {
    const onSubmitHandler = ({
        first_name,
        second_name,
        login,
        email,
        password,
        phone,
    }: SignupFormProps) => {
        signup({
            first_name,
            second_name,
            login,
            email,
            password,
            phone,
        });
    };

    if (signupResult && signupResult.data && signupResult.data.id) {
        return <Redirect to="/" />;
    }

    return (
        <>
            <Main title="GAME">
                <div className="registration">
                    <Form
                        onSubmit={onSubmitHandler}
                        validate={validate}
                        render={({ handleSubmit, submitting }) => (
                            <form className="form" onSubmit={handleSubmit}>
                                <Field name="email">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" type="email" placeholder="Почта" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="login">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" name="login" type="text" placeholder="Логин" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="first_name">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" name="first_name" type="text" placeholder="Имя" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="second_name">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" name="second_name" type="text" placeholder="Фамилия" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="phone">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" name="phone" type="tel" placeholder="Телефон" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <PasswordField
                                    name="password"
                                    placeholder="Пароль"
                                />
                                <PasswordField
                                    name="confirm"
                                    placeholder="Пароль (ещё раз)"
                                />
                                <div className="form__redirect">
                                    <Link to="/signin">Войти</Link>
                                </div>
                                <button
                                    type="submit"
                                    className="btn fullwidth"
                                    disabled={submitting}
                                >
                                    Регистрация
                                </button>
                                {
                                    (signupResult.error === 'Login already exists')
                                        ? <div>Такой пользователь уже зарегистрирован</div>
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
    signupResult: getSignup(store),
});

const mapDispatchToProps = {
    signup: signupAction,
};

export default connect(mapStateToProps, mapDispatchToProps)(Signup);
