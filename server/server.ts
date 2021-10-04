import express from 'express';
import path from 'path';
import 'babel-polyfill';
import singin from './modules/auth/signin';
import singup from './modules/auth/signup';
import logout from './modules/auth/logout';
import user from './modules/auth/user';
import oauthYandex from './modules/oauth/yandex';
import serviceId from './modules/oauth/service-id';
import profile from './modules/users/profile';
import avatar from './modules/users/avatar';
import password from './modules/users/password';
import serverRenderMiddleware from './middleware/server-render';

const app = express();
const PORT = process.env.PORT || 5000;

app.use(express.static(path.join(__dirname, '../static')));

singin(app);
singup(app);
logout(app);
user(app);

profile(app);
avatar(app);
password(app);

oauthYandex(app);
serviceId(app);

app.get('/*', serverRenderMiddleware);

app.listen(PORT, () => {
    console.log(`App listening on port ${PORT}!`);
});
