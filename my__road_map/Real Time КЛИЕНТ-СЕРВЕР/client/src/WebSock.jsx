import React, {useRef, useState} from 'react';

const WebSock = () => {
    const [messages, setMessages] = useState([]);
    const [value, setValue] = useState('');
    const socket = useRef();
    const [connected, setConnected] = useState(false);  // connected состояние, подключены мы к серверу или нет
    const [username, setUsername] = useState('');

    function connect() {
        socket.current = new WebSocket('ws://localhost:4000');
        // навешиваем слушатели на WebSocket
        // .onopen отработает в момент подключения
        socket.current.onopen = () => {
            setConnected(true);
            const message = {
                username,
                event: 'connection',
                id: Date.now()
            }
            socket.current.send(JSON.stringify(message));
        }
        // .onmessage отработает когда получаем сообщение
        socket.current.onmessage = (event) => {
            const message = JSON.parse(event.data);
            setMessages(prev => [message, ...prev]);
        }
        // .onclose отработает когда подключение закрылось
        socket.current.onclose= () => {
            console.log('Socket закрыт');
        }
        // .onerror отработает когда произошла какая то ошибка
        socket.current.onerror = () => {
            console.log('Socket произошла ошибка');
        }
    }

    const sendMessage = async () => {
        const message = {
            username,
            event: 'message',
            id: Date.now(),
            message: value
        }
        socket.current.send(JSON.stringify(message));
        setValue('');
    }


    if (!connected) {
        return (
            <div className="center">
                <div className="form">
                    <input
                        value={username}
                        onChange={e => setUsername(e.target.value)}
                        type="text"
                        placeholder="Введите ваше имя"/>
                    <button onClick={connect}>Войти</button>
                </div>
            </div>
        )
    }


    return (
        <div className="center">
            <div>
                <div className="form">
                    <input value={value} onChange={e => setValue(e.target.value)} type="text"/>
                    <button onClick={sendMessage}>Отправить</button>
                </div>
                <div className="messages">
                    {messages.map(mess =>
                        <div key={mess.id}>
                            {mess.event === 'connection'
                                ? <div className="connection_message">
                                    Пользователь {mess.username} подключился
                                </div>
                                : <div className="message">
                                    <b>{mess.username}</b>. {mess.message}
                                </div>
                            }
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
};

export default WebSock;
