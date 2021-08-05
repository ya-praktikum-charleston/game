<?php include '../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#node_1">#1 Базовые концепции и установка (Basic Concepts & Setup Environment)</a></li>
        <li><a class="list-sub__link" href="#node_2">#2 Глобальные объекты (Global Objects)</a></li>
        <li><a class="list-sub__link" href="#node_3">#3 Модули (импорт и экспорт) (Modules & Require)</a></li>
        <li><a class="list-sub__link" href="#node_4">#4 Node.js и файловая система (Node.js & File System)</a></li>
        <li><a class="list-sub__link" href="#node_5">#5 Модуль событий (Event Module)</a></li>
        <li><a class="list-sub__link" href="#node_6">#6 Буфер и потоки (Buffer & Streams)</a></li>
        <li><a class="list-sub__link" href="#node_7">#7 Клиент и сервер (Client & Server)</a></li>
        <li><a class="list-sub__link" href="#node_8">#8 Создание сервера (Create Server)</a></li>
    </ul>
</div>


<div class="linear" id="node_1">

    <h2>#1 Базовые концепции и установка (Basic Concepts & Setup Environment)</h2>

    <pre class="brush: js;">
        // посмотреть версию node
        node -v
    </pre>

    <pre class="brush: js;">
       // простейшая функция на node.js
        const userName = "Node.js";
        const sayHi = (text) => `Hello file ${text}`;
        console.log(sayHi(userName));
    </pre>

</div>

<div class="linear" id="node_2">

    <h2>#2 Глобальные объекты (Global Objects)</h2>

    <p>Глобальный тип в браузере это <code>window</code>. В Node.js это <code>global</code></p>

    <p><a href="https://nodejs.org/api/globals.html" target="_blank">Node.js documentation</a></p>

    <pre class="brush: js;">
        //console.log(global);

        // setTimeout встроен в global, поэтому не надо писать global.setTimeout
        setTimeout(()=>{
            console.log('Привет!');
        },2000);
    </pre>

    <p>Методы <code>__dirname</code> и <code>__filename</code></p>
    <pre class="brush: js;">
        // получить полный путь до файла
        console.log(`{=== ${__dirname} ===}`);
        console.log(`{=== ${__filename} ===}`);

        //{=== C:\OpenServer\domains\node\webdev ===}
        //{=== C:\OpenServer\domains\node\webdev\global.js ===}
    </pre>

    <pre class="brush: js;">
        // ещё один глобальный объект. new URL это конструктор, поэтому передаём данные
        const url = new URL('http://vita.lol/path/name#test');
        console.log(url);

        // href: 'http://vita.lol/path/name#test',
        // origin: 'http://vita.lol',
        // protocol: 'http:',
        // username: '',
        // password: '',
        // host: 'vita.lol',
        // hostname: 'vita.lol',
        // port: '',
        // pathname: '/path/name',
        // search: '',
        // searchParams: URLSearchParams {},
        // hash: '#test'
    </pre>

</div>

<div class="linear" id="node_3">

    <h2>#3 Модули (импорт и экспорт) (Modules & Require)</h2>

    <p>Подготовим модуль для использования в другом месте. Создадим файл test.js</p>

    <pre class="brush: js;">
        const userMane = "Node.js";
        const sayHi = (text) => `Hello file ${text}`;

        // модуль для использования в другом месте
        module.exports = {
            userMane,
            sayHi,
        };

        // ну или так
        // module.exports = userMane;
    </pre>

    <p>Создадим файл, например modules.js</p>

    <pre class="brush: js;">
        //const user = require('./test');

        const {userMane: user, sayHi} = require('./test');

        const title = "Жора";
        const name = `${sayHi(user)}`;
        const name2 = `${sayHi(title)}`;

        console.log(name);
        console.log(name2);

    </pre>

</div>

<div class="linear" id="node_4">

    <h2>#4 Node.js и файловая система (Node.js & File System)</h2>

    <pre class="brush: js;">
        //модуль чтения файлов
        const fs = require('fs');

        // для чтения файла, можно добавить кодировку или добавить метод к data.toString()
        //fs.readFile('./text.txt', 'utf-8', (error, data) => {
        fs.readFile('./text.txt', (error, data) => {
            console.log(data.toString());
        })
        // это был асинхронный вариант
        // чтобы был синхронный вывод, нужно значение записать в переменную
        let text = fs.readFileSync('text.txt','utf-8');
        console.log('синхронный вариант ' + text);


        // запись в файл
        fs.readFile('./text.txt', (error, data) => {
            // mkdir это работа с папками и дирректориями, при его выполнении получим новую папку
            // приставка Sync к названию метода, означает, что он синхронный
            fs.mkdirSync('./file', () => {})
            fs.writeFileSync('./file/text2.txt',`${data} + добавим запись`, (err) => {
                if(err) console.log(err);
            });
            console.log(data.toString());
        })

        // удаление файла
        setTimeout( ()=> {
            // existsSync используется для синхронной проверки того, существует ли файл уже в заданном пути или нет
            if(fs.existsSync('./file/text2.txt')){
                fs.unlink('./file/text2.txt', () => {});
            }
        },3000);
        // удаление директории
        setTimeout( ()=> {
            if(fs.existsSync('./file')){
                fs.rmdir('./file', () => {});
            }
        },5000);
    </pre>

</div>

<div class="linear" id="node_5">

    <h2>#5 Модуль событий (Event Module)</h2>

    <pre class="brush: js;">
        //модуль событий
        const EventEmitter = require('events');
        const emitter = new EventEmitter();

        // .on базовый метод создание слежения за событием
        // аргументы:
        // 'some_event' имя события за которым будем следить
        // второй аргумент callback
        emitter.on('some_event', (text) => {
            console.log(text);
        });

        // вызов события
        // аргументы:
        // 'some_event' имя события
        // данные
        emitter.emit('some_event', 'Произвольные данные');

        // Пример 2
        emitter.on('some_event2', (data) => {
            const { id, text } = data;
            console.log(id, text);
        });
        emitter.emit('some_event2', { id:1, text:'Произвольные данные' });
    </pre>

    <p><b>Реальный пример</b></p>

    <p>Файл вызова событий, например <code>eventBus</code></p>
    <pre class="brush: js;">
        const Logger = require('./log');
        const logger = new Logger();

        logger.on('some_event3', (data) => {
            const { id, text } = data;
            console.log(id, text);
        });

        logger.log('Пример 3, функция log');
    </pre>

    <p>Файл <code>log</code> с описанным событием</p>
    <pre class="brush: js;">
        const EventEmitter = require('events');

        class Logger extends EventEmitter {
            log = (msg) => {
                console.log(msg);
                this.emit('some_event3', { id:1, text: msg });
            }
        }

        module.exports = Logger;
    </pre>

    <p>В файле <code>log</code> вместо классического наследования <code>class Logger extends EventEmitter</code> можно использовать модуль <code>util</code></p>
    <pre class="brush: js;">
        const EventEmitter = require('events');
        const util = require('util');

        class Logger {
            log = (msg) => {
                console.log(msg);
                this.emit('some_event3', { id:1, text: 'Вызов .on из файла events' });
            }
        }

        // расширяем данный класс
        util.inherits(Logger, EventEmitter);

        module.exports = Logger;
    </pre>

</div>

<div class="linear" id="node_6">

    <h2>#6 Буфер и потоки (Buffer & Streams)</h2>

    <p>В Node.js есть 4 вида потока</p>

    <pre class="brush: js;">
        <ul class="ul_num">
            <li><b>Readable</b> - Читающий</li>
            <li><b>Writable</b> - Пишущий</li>
            <li><b>Duplex</b> - Дуплексный, это когда происходит и чтение и запись</li>
            <li><b>Transform</b> - Преобразующий, аналогичен дуплексному, но дополнительно позволяет изменять читаемые или записываемые данные (сжатие)</li>
        </ul>
    </pre>

    <br>
    <p><b>Readable</b> - Читающий поток</p>

    <pre class="brush: js;">
        const fs = require('fs');

        // создаём читающий поток
        const readStream = fs.createReadStream('./docs/node6_text.txt');

        //.on базовый метод создание слежения за событием
        readStream.on('data', (chunk) => {
            console.log('===============Получаем порции текста, которые находятся в файле=================');
            console.log(chunk.toString());
        })

        // вызываем команду node file.js
    </pre>

    <br>
    <p><b>Writable</b> - Пишущий поток</p>

    <pre class="brush: js;">
        const fs = require('fs');

        // создаём читающий поток
        const readStream = fs.createReadStream('./docs/node6_text.txt');
        // создаём пишущий поток
        // аргументом передаём путь и имя файла который создаём
        const writeStream = fs.createWriteStream('./docs/node6_new-text.txt');

        //.on базовый метод создание слежения за событием
        readStream.on('data', (chunk) => {
            // читающий поток читает, а далее пишущий поток пишет в файл
            writeStream.write(chunk);
        })
    </pre>

    <br>
    <p><b>Duplex</b> - Дуплексный поток</p>

    <p>По сути, приведенный выше пример это и есть Дуплексный поток</p>

    <pre class="brush: js;">
        readStream.on('data', (chunk) => {
            // читающий поток читает, а далее пишущий поток пишет в файл
            writeStream.write('\n---CHUNK START---\n');
            writeStream.write(chunk);
            writeStream.write('\n---CHUNK END---\n');
        });
    </pre>

    <p>Но вообще для него есть отдельный метод</p>

    <pre class="brush: js;">
        // pipe осуществляет чтение получаемых данных из readStream и передаёт их в writeStream
        readStream.pipe(writeStream);
    </pre>

    <p><b>Пример отлова ошибок при чтении и записи</b></p>

    <pre class="brush: js;">
        // создадим функцию отлова ошибок при чтении или записи
        // если произойдет ошибка
        const handleError = () => {
            console.log('Error');
            // destroy уничтожает поток, т.к. повреждённые данные нам не нужны
            readStream.destroy();
            // в записывающий поток добавим информащию, что при чтении произошла ошибка
            // end добавляет строку в конце потока
            writeStream.end('Finished with error...')
        }

        readStream
            // добавляем ошибку для метода чтения
            .on('error', handleError)
            .pipe(writeStream)
            // и метода записи, если при записи произойдет ошибка мы будем о ней знать
            .on('error', handleError);
    </pre>

    <br>
    <p><b>Трансформирующий или преобразующий поток</b></p>

    <p>Пример СЖАТИЕ</p>

    <pre class="brush: js;">
        const fs = require('fs');
        // подключаем модуль сжатия
        const zlib = require('zlib');

        const readStream = fs.createReadStream('./docs/node6_text.txt');
        const writeStream = fs.createWriteStream('./docs/node6_new-text.txt');

        // нужно создать преобразующий (сжимающий) поток
        const compressStream = zlib.createGzip();

        const handleError = () => {
            console.log('Error');
            readStream.destroy();
            writeStream.end('Finished with error...')
        }

        readStream
            .on('error', handleError)
            // данные которые мы получаем будут сжиматься и записываться в файл
            .pipe(compressStream)
            .pipe(writeStream)
            .on('error', handleError);
    </pre>
</div>

<div class="linear" id="node_7">

    <h2>#7 Клиент и сервер (Client & Server)</h2>

    <p><code>ip</code> - это идентификатор компьютера в сети</p>

    <p><code>Server</code> - это тоже компьютер. Сервер который содержит сайт называется <code>Host</code> и у него свой <code>ip</code>.</p>

    <p>Для запроса на сервер, нужен его <code>ip</code>, или его доменное имя. Что одно и тоже.</p>

    <ul class="ul_num">
        <li><b>GET</b> - обычный запрос данных (чтение)</li>
        <li><b>POST</b> - используется для отправки данных (создание)</li>
        <li><b>PUT</b> - изменение данных на сервере (обновление)</li>
        <li><b>DELETE</b> - удаление данных</li>
    </ul>

    <p>Это всё называется <code>HTTP/HTTPS</code>.</p>

</div>

<div class="linear" id="node_8">

    <h2>#8 Создание сервера (Create Server)</h2>

    <p>Создание простого сервера</p>

    <pre class="brush: js;">
       // создание сервера с помошью http модуля
        const http = require('http');

        const PORT = 3000;

        // создаём сервер, воспользуемся встроенным методом server
        // в качестве аргумента идёт callback функция, которая вызывается каждый раз когда к серверу идет обращение
        const server = http.createServer((request, responce) => {
            // request - запрос
            // responce - ответ
            console.log('server пошел!!!');

            // header ответа, это вспомогательная информация с которой мы можем взаимодействовать в браузере
            // в данном случае говорим что ответ это просто строка
            responce.setHeader('Content-type', 'text/plain');

            // ответ сервера
            responce.write('Hello бля');
            // responce.write('&lt;h4&gt;Hello бля&lt;/h4&gt;');       // text/html
            // res.write('&lt;head&gt;&lt;link rel=&quot;stylesheet&quot; href=&quot;#&quot;&gt;&lt;/head&gt;');      // text/html добавим стили в head

            // end сообщает что все нужные данные были добавлены в ответ которые отправляются и контроль можно возвращать браузеру
            responce.end();
        });

        // создаём порт для прослушивания, имя хоста, callback
        server.listen(PORT, 'localhost', (error) => {
            error ? console.log(error) : console.log(`Listent port ${PORT}`);
        });
    </pre>

    <p>Возврат json формата</p>

    <pre class="brush: js;">
        const http = require('http');
        const PORT = 3000;

        const server = http.createServer((request, responce) => {
            responce.setHeader('Content-Type', 'application/json');

            // ответ сервера
            // возврат json формата
            const data = JSON.stringify([
                { name: 'Tommy', age: 35 },
                { name: 'Arthur', age: 40 },
            ]);

            responce.end(data);

        });

        server.listen(PORT, 'localhost', (error) => {
            error ? console.log(error) : console.log(`Listent port ${PORT}`);
        });
    </pre>

    <p>В итоге, в браузере увидим данный json.</p>
</div>

<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
