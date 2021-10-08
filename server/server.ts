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
import express from 'express';

require('dotenv').config();
const sequelize = require('./db');
const models = require('./models/models');
const cors = require('cors');
const router = require('./routes/index');

const app = express();
const PORT = process.env.PORT || 5000;

// const store = create(initialState);

app.use(express.static(path.join(__dirname, '../static')));

app.use(cors());
app.use(express.json());
app.use('/api', router);

//singin(app, store);
//logout(app, store);
//user(app, store);

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

const start = async () => {
    try {
        await sequelize.authenticate(); // устанавливаем подключение к БД
        await sequelize.sync(); // сверяет данные БД со схемой
        app.listen(PORT, () => console.log(`Сервер запущен на порту ${PORT}`));
    } catch (e) {
        console.log(e);
    }
};

start();
