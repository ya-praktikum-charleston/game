import React from 'react';
import { Field } from 'react-final-form';

const PasswordField = ({ name, placeholder }) => {
    return (
        <Field name={name}>
            {({ input, meta }) => (
                <div>
                    <input {...input} className="input" name="password" type="password" placeholder={placeholder} />
                    {meta.error && meta.touched && <span className="input-block__error">{meta.error}</span>}
                </div>
            )}
        </Field>
    );
};

export default PasswordField;
