import React from 'react';
import { Form, Field } from 'react-final-form';
import { setIn } from 'final-form';
import classNames from 'classnames';
import * as Yup from 'yup';
import AddIcon from '../../assets/svg/add.svg';

type TypeSchema = {
    message: string,
};

const SigninSchema: Yup.SchemaOf<TypeSchema> = Yup.object().shape({
    message: Yup.string().required('Поле не должно быть пустым'),
});

type ErrorProps = Record<string, string>;

const validateFormValues = (schema: Yup.SchemaOf<TypeSchema>) => {
    return async (values: TypeSchema): Promise<any> => {
        try {
            await schema.validate(values, { abortEarly: false });
            return true;
        } catch (error) {
            return error.inner.reduce((errors: ErrorProps, innerError: ErrorProps) => {
                return setIn(errors, innerError.path, innerError.message);
            }, {});
        }
    };
};

const validate = validateFormValues(SigninSchema);

type PropsForumForm = {
    placeholder: string,
    onSubmit: () => void,
};

const ForumForm = ({ placeholder, onSubmit }: PropsForumForm) => {
    return (
        <Form
            onSubmit={onSubmit}
            validate={validate}
            render={({ handleSubmit, submitting }) => (
                <form onSubmit={handleSubmit}>
                    <Field name="message">
                        {({ input, meta }) => {
                            const inputStyle = classNames('input', { 'error-input': meta.touched && meta.error });
                            return (
                                <>
                                    <div style={{ position: 'relative' }}>
                                        <input {...input} className={inputStyle} type="text" placeholder={placeholder} />
                                        <button disabled={submitting} className="btn-add-topic" type="submit"><img className="item-topics-icon" src={AddIcon} alt="add" /></button>
                                    </div>
                                    {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                                </>
                            );
                        }}
                    </Field>
                </form>
            )}
        />
    );
};

export default ForumForm;
