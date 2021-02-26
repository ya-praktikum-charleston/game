<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <p><b>Раздача вёрстки</b></p>
    <p><code>cmd</code> переходим через <code>cd</code> в папку и устанавливаетм <code>npm install express</code></p>
    <p>Если сделать <code>npm install express</code>, то <code>npm</code> по умолчанию сохранит его в <code>package.json</code> и запишет в <code>dependencies</code>. Если вам нужен <code>Express</code> только при разработке, но не в продакшн версии продукта, его необходимо сохранить в <code>devDependencies</code>:</p>
    <p><code>npm install express --save-dev # Можно для сокращения npm i express --save-dev</code></p>

    <br>
    <p>Создаю <code>index.html</code> и <code>my.js</code></p>

    <pre class="brush: html;">
        &lt;!DOCTYPE html&gt;
        &lt;html lang=&quot;en&quot;&gt;
            &lt;head&gt;
                &lt;title&gt;Hello&lt;/title&gt;
                &lt;meta charset=&quot;utf-8&quot;&gt;
            &lt;/head&gt;
            &lt;body&gt;
                &lt;div&gt;Начинаю раздавать!&lt;/div&gt;
            &lt;/body&gt;
        &lt;/html&gt;
    </pre>
    <br>
    <pre class="brush: js;">
        // server.js
        const express = require('express');

        const app = express();
        const PORT = 4000;

        app.use(express.static('./'));

        app.listen(PORT, function () {
            console.log(`Example app listening on port ${PORT}!`);
        });
    </pre>

    <br><br>
    <p><b>Задача 1, первый сервер</b></p>
    <pre class="brush: js;">
        const express = require('express');
        const app = express();
        const PORT = 3000;

        app.use(express.static(__dirname ));

        app.listen(PORT, () => {
          console.log(`Мой текст в логе после запуска ${PORT}!`);
        });
    </pre>

    <br>
    <p><b>Задача 2, запросы к серверу</b></p>
    <pre class="brush: js;">
        const express = require('express');

        const app = express();
        const PORT = 3000;

        const API_PREFIX = '/api/v1';

        // Если мы сделаем POST-запрос сюда, то получим верный ответ
        // Если отправим GET-запрос, то получим либо 405 HTTP ошибку, либо 404
        app.get(`${API_PREFIX}/text`, (req, res) => {
          res.status(200).send('Hello, World!');
        });

        app.put(`${API_PREFIX}/json`, (req, res) => {
            res.setHeader('Content-Type', 'application/json');
          res.status(201).send({"data": {"items": [1, 2, 3]}});
        });

        app.listen(PORT, () => {
          console.log(`Мой текст и порт: ${PORT}!`);
        });
    </pre>



</div>









<!--


v&ndash;                тире

&quot;                  двойная кавычка

-->


<!--

<div class="linear" id="use_strict">
    <h1>Строгий режим — "use strict"</h1>

    <h2>«use strict»</h2>


    <p>Например:</p>

    <pre class="brush: js;">
            "use strict";

            // этот код работает в современном режиме
            ...
        </pre>


    <p>На данный момент достаточно иметь общее понимание об этом режиме:</p>
    <ul class="ul_num">
        <li><code>111111</code> 2222222222222222</li>

    </ul>

</div>

-->



<?php include '../../include/footer.php'; ?>
