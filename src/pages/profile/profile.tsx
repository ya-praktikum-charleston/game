import React from 'react';
import { Form, Formik } from 'formik';
import * as Yup from 'yup';
import HeaderMenu from '../../components/header-menu';
import SettingsIcon from '../../assets/svg/settings.svg';
import Main from '../../components/main';
import TextInput from '../../components/text-input';
import Angel1 from '../../assets/img/Angels1.png';
import Button from '../../components/button';
import './profile.css';

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
const headerMenu = [
    {
        imgLink: SettingsIcon,
        imgAlt: 'Settings',
    },
];

const phoneRegExp = /^((\\+[1-9]{1,4}[ \\-]*)|(\\([0-9]{2,3}\\)[ \\-]*)|([0-9]{2,4})[ \\-]*)*?[0-9]{3,4}?[ \\-]*[0-9]{3,4}?$/;

const Profile = () => {
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
            <HeaderMenu headerMenu={headerMenu} />
            <Main title="Профиль">
                <div className="profile">
                    <Formik
                        initialValues={initialValues}
                        validationSchema={validate}
                        onSubmit={(values) => onSubmit(values)}
                    >

                        {
                            ({ dirty, isSubmitting }) => (
                                <Form>
                                    <div className="profile_main">
                                        <div className="avatar">
                                            <div className="avatar_edit">
                                                <div className="avatar_img">
                                                    <img className="avatar_img__size" src={Angel1} alt="avatar" />
                                                </div>

                                                <label htmlFor="file-input" className="btn-file-input">
                                                    <input id="file-input" className="file-input__hidden" type="file" name="file" accept=".jpg, .jpeg, .png" />
                                                    Изменить
                                                </label>
                                            </div>
                                        </div>
                                        <div className="form">
                                            <TextInput name="login" type="text" placeholder="Логин" />
                                            <TextInput name="firstname" type="text" placeholder="Имя" />
                                            <TextInput name="lastname" type="text" placeholder="Фамилия" />
                                            <TextInput name="phone" type="tel" placeholder="Телефон" />
                                            <TextInput name="email" type="email" placeholder="Email" />
                                            <TextInput name="password" type="password" placeholder="Пароль" />
                                            <TextInput name="confirmPassword" type="password" placeholder="Повторить пароль" />
                                            <button type="submit" className="btn fullwidth" disabled={!dirty || isSubmitting}>Сохранить</button>
                                        </div>
                                    </div>
                                </Form>
                            )
                        }
                    </Formik>
                </div>
            </Main>
        </>
    );
};

export default Profile;
