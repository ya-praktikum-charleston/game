import React from 'react';
import { Link } from 'react-router-dom';
import { Form, Formik } from 'formik';
import * as Yup from 'yup';
import Main from '../../components/main';
import TextInput from '../../components/text-input';
import './signup.css';

type MyFormValues = {
    firstname: string,
    lastname: string,
    login: string,
    phone: string,
    email: string,
    password: string,
    confirmPassword: string,
};

const initialValues: MyFormValues = {
    firstname: '',
    lastname: '',
    login: '',
    phone: '',
    email: '',
    password: '',
    confirmPassword: '',
};

const phoneRegExp = /^((\\+[1-9]{1,4}[ \\-]*)|(\\([0-9]{2,3}\\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/;

const Signup = () => {
    const validate = Yup.object({
        firstname: Yup.string()
            .max(15, 'Должно быть 15 символов')
            .required('Обязательное поле'),
        lastname: Yup.string()
            .max(15, 'Должно быть 15 символов')
            .required('Обязательное поле'),
        login: Yup.string()
            .max(15, 'Должно быть 15 символов')
            .required('Обязательное поле'),
        email: Yup.string()
            .email('Email не правильный')
            .required('Обязательное поле'),
        phone: Yup.string()
            .matches(phoneRegExp, 'Номер не правильный')
            .required('Обязательное поле'),
        password: Yup.string()
            .min(6, 'Пароль должен состоять из 6 символов')
            .required('Обязательное поле'),
        confirmPassword: Yup.string()
            .oneOf([Yup.ref('password'), null], 'Пароль не совпадает')
            .required('Обязательное поле'),
    });

    const onSubmit = (values) => {
        console.log('values', values);
    };
    return (
        <>
            <Main title="Регистрация" offBtnIcon>
                <div className="registration">
                    <Formik
                        initialValues={initialValues}
                        validationSchema={validate}
                        onSubmit={(values) => onSubmit(values)}
                    >
                        {
                            ({ dirty, isSubmitting }) => (
                                <Form className="form">
                                    <TextInput name="login" type="text" placeholder="Логин" />
                                    <TextInput name="firstname" type="text" placeholder="Имя" />
                                    <TextInput name="lastname" type="text" placeholder="Фамилия" />
                                    <TextInput name="phone" type="tel" placeholder="Телефон" />
                                    <TextInput name="email" type="email" placeholder="Email" />
                                    <TextInput name="password" type="password" placeholder="Пароль" />
                                    <TextInput name="confirmPassword" type="password" placeholder="Повторить пароль" />
                                    <div className="form__redirect">
                                        <Link to="/signin">Я вспомнил пароль</Link>
                                    </div>
                                    <button type="submit" className="btn fullwidth" disabled={!dirty || isSubmitting}>Создать аккаунт</button>
                                </Form>
                            )
                        }
                    </Formik>
                </div>
            </Main>
        </>
    );
};

export default Signup;
