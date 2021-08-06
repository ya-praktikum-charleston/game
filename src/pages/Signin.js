import React from "react";

function Signin() {

  return (
    <main className="main">
      <div className="content">
        <div className="titlePage">Вход</div>
        <form className="form">
          <div className="form_line">
            <input className="input" name="login" type="text" placeholder="Логин"/>
          </div>
          <div className="form_line">
            <input className="input" name="password" type="password" placeholder="Пароль"/>
          </div>
          <div className="form__redirect">
            <a href="signup.html">У вас нет аккаунта? Регистрация</a>
          </div>
          <button type="submit" className="btn">Авторизоваться</button>
        </form>
      </div>
    </main>
  );
}

export default React.memo(Signin);
