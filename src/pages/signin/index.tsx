import React from 'react';
import { Link, useHistory } from 'react-router-dom';

import { Form, Field } from 'react-final-form';
import { setIn } from 'final-form';
import * as Yup from 'yup';
import AuthController from '../../controllers/auth/AuthController';
import Main from '../../components/main';
import { SigninProps } from '../../api/auth/types';
import './signin.css';

const auth = new AuthController();

const SigninSchema = Yup.object().shape({
    login: Yup.string().required('Пожалуйста, укажите логин'),
    password: Yup.string().required('Пожалуйста, укажите пароль'),
});

const validateFormValues = (schema) => {
    return async (values: SigninProps) => {
        try {
            await schema.validate(values, { abortEarly: false });
        } catch (error) {
            return error.inner.reduce((errors, innerError) => {
                return setIn(errors, innerError.path, innerError.message);
            }, {});
        }
    };
};

const validate = validateFormValues(SigninSchema);

const Signin = () => {
    const history = useHistory();

    const onSubmitHandler = (values: SigninProps) => {
        auth.signin(values, history);
    };

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
                            </form>
                        )}
                    />
                </div>
            </Main>
        </>
    );
};

export default Signin;
