<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
        
    <h2>NODE.JS</h2>

    <p>Узнать установленную версию Node.js</p>
    <p><code>node - v</code></p>

    <p>Узнать установленную версию пакетного менеджера <code>npm</code></p>
    <p><code>npm - v</code></p>

    <p>написав в консоли просто <code>node</code> без параметров, то запустится "репол (REPL)" небольшая интерактиваня среда для выполнения js кода</p>
    <p>Чтобы выйти нужно нажать <code>Ctrl+C</code> дважды</p>
    <p><code>node</code></p>

    <p>Создать папку</p>
    <p><code>md test</code></p>

    <p>Удалить папку</p>
    <p><code>rd test</code></p>

    <p>Создать файл</p>
    <p><code>copy con file.js</code></p>

    <p>Запустить файл</p>
    <p><code>node file.js</code></p>

    <p>Прервать выполнение работы <code>node</code> нажать <code>Ctrl+C</code></p>

    <p>NODEMON это типа лайвсторедж</p>
    <p><code>npm install -g nodemon</code></p>

    <p>запустить файл через NODEMON</p>
    <p><code>nodemon app.js</code></p>

    <p><i>Далее пишем в js файле</i></p>

    <p>Стандартная библиотека для подключения модулей <code>require</code>, модуль для работы с файловой системой называется <code>fs</code> </p>
    <p><code>let fs = require('fs');</code></p>

    <p>Простейший http сервер</p>

    <pre class="brush: js;">
        let http = require('http');

        let server = http.createServer(function(req, res){     // req - запрос, res - ответ
            res.writeHead(200, {    // writeHead - http заголовки; 200 - код ответа
                'Content-Type':'text/plain'     // заголовки
            });
            res.write('Hello http!');   //write тело ответа
            res.end();      // закрываем соединение
        });
        server.listen(3000);
        console.log('12345');
    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>Express.js</h2>

    <p>создаём файл <code>package.json</code> для этого пишем в консоли <code>npm init</code></p>

    <h2>middleware</h2>


    <pre class="brush: js;">

        </pre>

    <ul class="ul_num">
        <li>44444444444444444444</li>

    </ul>

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
