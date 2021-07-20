const express = require('express');
const cors = require('cors');
//управление событиями в node.js
const events = require('events');

const PORT = 4000;
// EventEmitter может регистрировать события, подписываться на события и вызывать события
const emitter = new events.EventEmitter();

const app = express();

app.use(cors());
app.use(express.json());

//endpoint на получение сообщений
app.get('/get-messages', (require, responce) => {
    // оповещение всех пользователей об отправленном сообщении, .once регистрирует событие с названием newMessage
    emitter.once('newMessage', (message) => {
        responce.json(message);
    });
});

//endpoint на отправку сообщений
app.post('/new-messages', ((require, responce) => {
    const message = require.body;
    // .emit вызывает событие newMessage
    emitter.emit('newMessage', message);
    responce.status(200);
}));


app.listen(PORT, () => console.log(`Server started on port ${PORT}`));
