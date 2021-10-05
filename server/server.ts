require('dotenv').config();
import express from 'express';

const sequelize = require('./db');
const models = require('./models/models');
const cors = require('cors');
const router = require('./routes/index');

import path from 'path';
import 'babel-polyfill';
import render from './ssr';
import rootSaga from '../src/sagas';
import { create } from '../src/store';
import singin from './modules/auth';
import logout from './modules/logout';
import user from './modules/user';

const initialState = {};

const app = express();
const PORT = process.env.PORT || 5000;
const store = create(initialState);

app.use(express.static(path.join(__dirname, '../static')));

app.use(cors());
app.use(express.json());
app.use('/api', router);

singin(app, store);
logout(app, store);
user(app, store);

app.get('/*', (req, res) => {
    store.runSaga(rootSaga).toPromise().then(() => {
        console.log('sagas complete');
        const appHTML = render(req, res, store);
        res.contentType('text/html');
        res.status(200);
        res.send(appHTML);
    }).catch((e) => {
        console.log(e.message);
        res.status(500).send(e.message);
    });
    store.close();
});

const start = async () => {
    try {
        await sequelize.authenticate(); // устанавливаем подключение к БД
        await sequelize.sync(); // сверяет данные БД со схемой
        app.listen(PORT, () =>
            console.log(`Сервер запущен на порту ${PORT}`)
        );
    } catch (e) {
        console.log(e);
    }
};

start();