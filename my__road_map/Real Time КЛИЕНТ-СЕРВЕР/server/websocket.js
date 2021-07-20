const ws = require('ws');

const wss = new ws.Server({
    port: 4000,
}, () => console.log(`Server started on 4000`));


// wss это webSocket сервер
wss.on('connection', function connection(ws) {
    // ws это одно подключение с пользователем который отправил сообщение
    ws.on('message', function (message) {
        message = JSON.parse(message);
        switch (message.event) {
            case 'message':
                broadcastMessage(message);
                break;
            case 'connection':
                broadcastMessage(message);
                break;
        }
    })
})

// широковещательная рассылка, отправляет сообщения всем подключенным клиентам
function broadcastMessage(message, id) {
    // clients это все клиенты с которыми установленно подключение
    wss.clients.forEach(client => {
        // каждый client является webSocketом
        client.send(JSON.stringify(message));
    })
}
