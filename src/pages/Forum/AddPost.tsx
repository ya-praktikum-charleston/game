import React from 'react';
import { useHistory } from 'react-router-dom';
import { useSelector } from 'react-redux';
import { useFormik, FormikProvider, Field, Form } from 'formik';
import * as Yup from 'yup';
import { API } from '../../api';
import Main from '../../components/main';

function AddPost() {
    const login = useSelector(({ collections }) => collections.user.login);
    const history = useHistory();

    const formik = useFormik({
        initialValues: {
            title: '',
            author: login,
            text: '',
        },
        validationSchema: Yup.object({
            title: Yup.string()
                .min(3, 'Не менее 3 символов')
                .max(150, 'Не более 150 символов')
                .required('Не указан заголовок'),
            text: Yup.string()
                .min(3, 'Не менее 3 символов')
                .max(500, 'Не более 500 символов')
                .required('Не заполнен текст поста'),
        }),
        onSubmit: (values) => {
            //console.log('values', JSON.stringify(values, null, 2));

            API.addPost(JSON.stringify(values))
                .then((response) => {
                    if (response.status === 200) {
                        history.push('/forum');
                    }
                })
                .catch((error) => {
                    // throw new Error('Что-то пошло не так: ', error.message);
                });
        },
    });

    return (
        <Main title="Форум">
            <div className="forum">
                <div className="forum-content">
                    <FormikProvider value={formik}>
                        <Form>
                            <div className="form-info">
                                <label>
                                    Заголовок
                                    <Field
                                        type="text"
                                        id="title"
                                        name="title"
                                    />
                                </label>
                            </div>
                            <div className="form-text">
                                <label>
                                    Описание темы
                                    <Field
                                        as="textarea"
                                        id="text"
                                        type="text"
                                        name="text"
                                    />
                                </label>
                            </div>
                            <div className="form-button">
                                <button
                                    type="submit"
                                    disabled={!(formik.isValid && formik.dirty)}
                                >
                                    Сохранить
                                </button>
                            </div>
                        </Form>
                    </FormikProvider>
                </div>
            </div>
        </Main>
    );
}

export default AddPost;
