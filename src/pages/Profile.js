import React from 'react';

function Profile() {

  return (
    <main className="main">
      <div className="content">
        <div className="btn-back">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
               fill="#000000">
            <path d="M0 0h24v24H0V0z" fill="none"/>
            <path
              d="M12 8V6.41c0-.89 1.08-1.34 1.71-.71l5.59 5.59c.39.39.39 1.02 0 1.41l-5.59 5.59c-.63.63-1.71.19-1.71-.7V16H5c-.55 0-1-.45-1-1V9c0-.55.45-1 1-1h7z"/>
          </svg>
        </div>
        <div className="titlePage">Профиль</div>
        <div className="profile">
          <form>
            <div className="profile_main">
              <div className="avatar">
                <div className="avatar_edit">
                  <div className="avatar_img">
                    <img src="img/avatar.png" alt="avatar"/>
                  </div>
                  <input id="file-input" type="file" name="file" accept=".jpg, .jpeg, .png"/>
                  <label htmlFor="file-input" className="btn">Поменять</label>
                </div>
              </div>
              <div className="form">
                <div className="form_line">
                  <input className="input" name="email" type="email" placeholder="Почта"/>
                </div>
                <div className="form_line">
                  <input className="input" name="login" type="text" placeholder="Логин"/>
                </div>
                <div className="form_line">
                  <input className="input" name="first_name" type="text" placeholder="Имя"/>
                </div>
                <div className="form_line">
                  <input className="input" name="second_name" type="text" placeholder="Фамилия"/>
                </div>
                <div className="form_line">
                  <input className="input" name="phone" type="tel" placeholder="Телефон"/>
                </div>
                <div className="form_line">
                  <input className="input" name="password" type="password" placeholder="Пароль"/>
                </div>
                <div className="form_line">
                  <input className="input" name="password" type="password"
                         placeholder="Пароль (ещё раз)"/>
                </div>
                <button type="submit" className="btn">Сохранить</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
  );
}

export default React.memo(Profile);
