import React from 'react';
import { Form, Field } from 'react-final-form';
import { setIn } from 'final-form';
import * as Yup from 'yup';
import { PasswordProps } from '../../../api/user/types';
import Button from '../../../components/button';
import UserController from '../../../controllers/user/UserController';

const user = new UserController();

const onSubmitHandler = (values: PasswordProps) => {
    user.changePassword(values);
};

const PasswordFormSchema = Yup.object().shape({
    oldPassword: Yup.string()
        .required('Пожалуйста, укажите старый пароль'),
    newPassword: Yup.string()
        .notOneOf([Yup.ref('oldPassword'), null], 'Пароли не должны сопадать')
        .min(8, 'Пожалуйста, укажите пароль длинее 8 символов')
        .required('Пожалуйста, укажите пароль длинее 8 символов'),
});

const validateFormValues = (schema) => {
    return async (values: PasswordProps) => {
        try {
            await schema.validate(values, { abortEarly: false });
        } catch (error) {
            return error.inner.reduce((errors, innerError) => {
                return setIn(errors, innerError.path, innerError.message);
            }, {});
        }
    };
};

const validate = validateFormValues(PasswordFormSchema);

const PasswordForm = () => {
    return (
        <Form
            onSubmit={onSubmitHandler}
            validate={validate}
            render={({ handleSubmit, submitting }) => (
                <form onSubmit={handleSubmit}>
                    <Field name="oldPassword">
                        {({ input, meta }) => (
                            <div>
                                <input {...input} className="input" type="password" placeholder="Старый пароль" />
                                {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                            </div>
                        )}
                    </Field>
                    <Field name="newPassword">
                        {({ input, meta }) => (
                            <div>
                                <input {...input} className="input" type="password" placeholder="Новый пароль" />
                                {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                            </div>
                        )}
                    </Field>
                    <Button
                        type="submit"
                        className="btn fullwidth"
                        disabled={submitting}
                    >
                        Изменить пароль
                    </Button>
                </form>
            )}
        />
    );
};

export default PasswordForm;
