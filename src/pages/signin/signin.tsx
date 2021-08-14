import React from 'react';
import { Link } from 'react-router-dom';
import { Form, Formik } from 'formik';
import * as Yup from 'yup';
import Main from '../../components/main';
import TextInput from '../../components/text-input';
import './signin.css';

type MyFormValues = {
    login: string,
    password: string,
};

const initialValues: MyFormValues = {
    login: '',
    password: '',
};

const Signin = () => {
    const validate = Yup.object({
        login: Yup.string()
            .max(15, 'Должно быть 15 символов')
            .required('Обязательное поле'),
        password: Yup.string()
            .min(6, 'Пароль должен состоять из 6 символов')
            .required('Обязательное поле'),
    });
    const onSubmit = (values) => {
        console.log('values', values);
    };
    return (
        <>
            <Main title="Вход" offBtnIcon>
                <div className="signin">
                    <Formik
                        initialValues={initialValues}
                        validationSchema={validate}
                        onSubmit={(values) => onSubmit(values)}
                    >
                        {
                            ({ dirty, isSubmitting }) => (
                                <Form className="form">
                                    <TextInput name="login" type="text" placeholder="Логин" />
                                    <TextInput name="password" type="password" placeholder="Пароль" />
                                    <div className="form__redirect">
                                        <Link to="/signup">У вас нет аккаунта? Регистрация</Link>
                                    </div>
                                    <button type="submit" className="btn fullwidth" disabled={!dirty || isSubmitting}>Авторизоваться</button>
                                </Form>
                            )
                        }

                    </Formik>
                </div>
            </Main>
        </>
    );
};

export default Signin;
