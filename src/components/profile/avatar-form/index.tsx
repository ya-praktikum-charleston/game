import React from 'react';
import { Form, Field } from 'react-final-form';
import { connect } from 'react-redux';
import { avatarAction } from '../../../actions/users/avatar';
import { getChangeAvatar } from '../../../selectors/collections/users';
import Button from '../../button';
import Angel1 from '../../../assets/img/Angels1.png';

const AvatarForm = () => {
    const onSubmitHandler = (avatar) => {
            console.log(avatar);
            const formData = new FormData();
            
            console.log(formData);

            formData.append('avatar', avatar);

            console.log(formData);

    };

    return (
        <div className="avatar">
            <Form
                onSubmit={onSubmitHandler}
                render={({ handleSubmit, submitting }) => (
                    <form className="avatar_edit" onSubmit={handleSubmit}>
                        <div className="avatar_img">
                            <img className="avatar_img__size" src={Angel1} alt="avatar" />
                        </div>
                        <Field name="avatar">
                            {({ input, meta }) => (
                                <label htmlFor="file-input" className="btn-file-input">
                                    <input {...input} name="avatar" id="file-input" className="file-input__hidden" type="file" name="file" accept=".jpg, .jpeg, .png" />
                                    Загрузить
                                </label>
                            )}
                        </Field>
                        <Button
                            type="submit"
                            className="btn-file-input"
                            disabled={submitting}
                        >
                            Сохранить
                        </Button>
                    </form>
                )}
            />
        </div>
    );
};

const mapStateToProps = (store) => ({
    changeAvatarResult: getChangeAvatar(store),
});

export default connect(mapStateToProps, { avatarAction })(AvatarForm);
