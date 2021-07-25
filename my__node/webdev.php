<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">

    <h2>Node.js #4 Node.js и файловая система (Node.js & File System)</h2>

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

<div class="linear" id="use_strict">

    <h2>Node.js #5 Модуль событий (Event Module)</h2>

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
