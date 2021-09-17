import express from 'express';
import path from 'path';
import 'babel-polyfill';
import render from './ssr';

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.static(path.join(__dirname, '../static')));

app.get('/*', (req, res) => {
    const appHTML = render(req);
    res.contentType('text/html');
    res.status(200);
    res.send(appHTML);
});

app.listen(PORT, () => {
    console.log(`App listening on port ${PORT}!`);
});
