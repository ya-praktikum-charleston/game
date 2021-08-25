import React from 'react';
import { Link, Redirect } from 'react-router-dom';
import { connect } from 'react-redux';
import { Form, Field } from 'react-final-form';
import { setIn } from 'final-form';
import * as Yup from 'yup';
import Main from '../../components/main';
import { signupAction } from '../../actions/auth/signup';
import { getSignup } from '../../selectors/collections/auth';
import './signup.css';

const SignupSchema = Yup.object().shape({
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

const validateFormValues = (schema) => {
    return async (values) => {
        try {
            await schema.validate(values, { abortEarly: false });
        } catch (error) {
            return error.inner.reduce((errors, innerError) => {
                return setIn(errors, innerError.path, innerError.message);
            }, {});
        }
    };
};

const validate = validateFormValues(SignupSchema);

const Signup = ({ signupResult, signupAction }) => {
    const onSubmitHandler = (values: SingupProps) => {
        signupAction(values);
    };

    if (signupResult.id) {
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
                                <Field name="password">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" name="password" type="password" placeholder="Пароль" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
                                <Field name="confirm">
                                    {({ input, meta }) => (
                                        <div>
                                            <input {...input} className="input" type="password" placeholder="Пароль (ещё раз)" />
                                            {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                        </div>
                                    )}
                                </Field>
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

const mapStateToProps = (store) => ({
    signupResult: getSignup(store),
});

export default connect(mapStateToProps, { signupAction })(Signup);
