import React from 'react';
import { Form, Field } from 'react-final-form';
import { setIn } from 'final-form';
import * as Yup from 'yup';
import Button from '../../../components/button';

const onSubmitHandler = (values) => {};

const ProfileFormSchema = Yup.object().shape({
    email: Yup.string()
        .email('Пожалуйста, укажите почту')
        .required('Пожалуйста, укажите почту'),
    login: Yup.string().required('Пожалуйста, укажите логин'),
    first_name: Yup.string().required('Пожалуйста, укажите имя'),
    second_name: Yup.string().required('Пожалуйста, укажите фамилию'),
    phone: Yup.string()
        .matches(/^(\s)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/, 'Пожалуйста, укажите телефон')
        .required('Пожалуйста, укажите телефон'),
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

const validate = validateFormValues(ProfileFormSchema);

const ProfileForm = () => {
    return (
        <Form
            onSubmit={onSubmitHandler}
            validate={validate}
            render={({ handleSubmit, submitting }) => (
                <form onSubmit={handleSubmit}>
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
                    <Button
						type="submit"
						className="btn fullwidth" 
						disabled={submitting}
					>
						Сохранить
					</Button>
                </form>
            )}
        />
    );
};

export default ProfileForm;
