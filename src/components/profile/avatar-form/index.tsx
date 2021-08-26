import React from 'react';
import Angel1 from '../../../assets/img/Angels1.png';

const AvatarForm = () => {
    return (
        <div className="avatar">
            <div className="avatar_edit">
                <div className="avatar_img">
                    <img className="avatar_img__size" src={Angel1} alt="avatar" />
                </div>
                <label htmlFor="file-input" className="btn-file-input">
                    <input id="file-input" className="file-input__hidden" type="file" name="file" accept=".jpg, .jpeg, .png" />
                    Поменять
                </label>
            </div>
        </div>
    );
};

export default AvatarForm;
