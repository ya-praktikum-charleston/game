import express from 'express';
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
const PORT = process.env.PORT || 3000;
const store = create(initialState);

app.use(express.static(path.join(__dirname, '../static')));

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

app.listen(PORT, () => {
    console.log(`App listening on port ${PORT}!`);
});
