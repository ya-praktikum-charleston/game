import React from 'react';
import { Form } from 'react-final-form';
import { connect } from 'react-redux';
import { setIn } from 'final-form';
import * as Yup from 'yup';
import Button from '../../button';
import PasswordField from '../../fields/password';
import { passwordAction } from '../../../actions/users/password';
import { getChangePassword } from '../../../selectors/collections/users';

const PasswordFormSchema = Yup.object().shape({
    oldPassword: Yup.string()
        .required('Пожалуйста, укажите старый пароль'),
    newPassword: Yup.string()
        .notOneOf([Yup.ref('oldPassword'), null], 'Пароли не должны сопадать')
        .min(8, 'Пожалуйста, укажите пароль длинее 8 символов')
        .required('Пожалуйста, укажите пароль длинее 8 символов'),
    confirmNewPassword: Yup.string()
        .oneOf([Yup.ref('newPassword'), null], 'Новые пароли не совпадают')
        .required('Новые пароли не совпадают'),
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

const PasswordForm = ({ passwordAction }) => {
    const onSubmitHandler = ({ oldPassword, newPassword }) => {
        passwordAction({ oldPassword, newPassword });
    };

    return (
        <Form
            onSubmit={onSubmitHandler}
            validate={validate}
            render={({ handleSubmit, submitting }) => (
                <form onSubmit={handleSubmit}>
                    <PasswordField
                        name="oldPassword"
                        placeholder="Старый пароль"
                    />
                    <PasswordField
                        name="newPassword"
                        placeholder="Новый пароль"
                    />
                    <PasswordField
                        name="confirmNewPassword"
                        placeholder="Новый пароль (ещё раз)"
                    />
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

const mapStateToProps = (store) => ({
    changePasswordResult: getChangePassword(store),
});

export default connect(mapStateToProps, { passwordAction })(PasswordForm);
