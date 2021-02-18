<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Модули</h2>

    <p>Что было до ES6. До появления стандарта ES6, разработчики создавали «псевдомодули». Они использовали стандартные конструкции языка, чтобы реализовать возможности настоящих модулей.</p>

    <p><b>Замыкание</b>.</p>
    <p>Под замыканием понимаем лексическое окружение функции и принципы работы языка с этим лексическим окружением. Для создания таких областей разработчики используют паттерн IIFE — самовызывающиеся функции. Любые переменные внутри IIFE невидимы для внешнего мира:</p>

    <pre class="brush: js;">
        let a = 1;
        var b = 2;

        const result = (function() {
            let a = 3;
            console.log(a, b); // 3 2
            return a;
        })();

        console.log(a, b, result); // 1 2 3
    </pre>

    <br>
    <h2>Импорты ES6</h2>

    <p>В стандарте ES6 появились специальные директивы:</p>

    <ul class="marker">
        <li><code>export</code> помечает, какие фрагменты кода должны быть доступны вне модуля;</li>
        <li><code>import</code> подключает части модуля, размеченные через export.</li>
    </ul>

    <br>
    <h2>Импорты в NodeJS</h2>

    <p><b>require</b></p>

    <p>Реализуем модуль и подключим его к index.js, чтобы можно было использовать функции и другую логику внутри него.</p>

    <p>Сделаем следующие файлы:</p>

    <ul class="marker">
        <li><code>service.js</code> — реализует логику определённой сущности;</li>
        <li><code>controller.js</code> — будет использовать логику из файла <code>service.js</code>, чтобы реализовать бизнес логику;</li>
        <li><code>index.js</code> — файл с запуском сервера, с использованием библиотеки Express.</li>
    </ul>

    <p>Сервис должен уметь обращаться, например, к GitHub API для получения списка публичных репозиториев.</p>

    <p>Контроллер должен обрабатывать запрос от пользователя к серверу, приводить пришедшие данные к формату для сервиса по работе с GitHub API и возвращать полученные репозитории.</p>

    <p>Импортируем модули друг в друга:</p>

    <p><code>service.js</code></p>

    <pre class="brush: js;">
        class GithubService {
            requestRepos(filters) { // Принимаем какие-то фильтры
                // Логика запроса. В данном случае она нас не интересует.
            }
        }

        module.exports = GithubService;
    </pre>

    <p><code>controller.js</code></p>

    <pre class="brush: js;">
        const GithubService = require('./service');

        class GithubController {
            getRepositories(req, res, next) {
                const {body} = req;
                const serviceFilters = something(body); // Приводим фильтры к нужному виду
                // Какая-то бизнес логика
                GithubService.requestRepos(serviceFilters)
                    .then(data => {
                        res.send(data);
                    })
                    .catch(error => {
                        next(error);
                    });
            }
        }

        module.exports = {
            controller: GithubController,
        };
    </pre>

    <p><code>index.js</code></p>

    <pre class="brush: js;">
        const express = require('express');

        const {controller} = require('./controller');

        const app = express();

        app.get('/', controller.getRepositories);

        app.listen(3000, function () {
            console.log('Мы запустили приложение и можем ходить в гитхаб');
        });
    </pre>

    <p>Как видно из примеров выше — можно импортировать хоть классы (сервис, контроллер), хоть функции (<code>express</code>).</p>

    <p>Для экспорта достаточно использовать ключ <code>exports</code> в глобальном объекте <code>module</code>.</p>

    <p>Для импорта — применить функцию <code>require</code> и передать путь к файлу (можно даже относительный).</p>

    <br>
    <h2>Полезные ссылки</h2>

    <ul class="marker">
        <li><a target="_blank" href="https://learn.javascript.ru/modules">Подробное описание, примеры и способы применения модулей;</a></li>
        <li><a target="_blank" href="https://medium.com/web-standards/es-modules-cartoon-dive-71f42c1e851a">Глубокое погружение в ES-модули в картинках;</a></li>
        <li><a target="_blank" href="https://tuhub.ru/posts/javascript-moduli-rukovodstvo-dlya-nachinayushhih">JavaScript модули. Руководство для начинающих;</a></li>
        <li><a target="_blank" href="https://habr.com/ru/post/243273/">Выразительный JavaScript: Модули;</a></li>
        <li><a target="_blank" href="https://tproger.ru/translations/js-modules-formats-loaders-builders/">О модулях JavaScript, форматах, загрузчиках и сборщиках модулей за 10 минут;</a></li>
        <li><a target="_blank" href="http://benalman.com/news/2010/11/immediately-invoked-function-expression/">Более подробно про IIFE.</a></li>
    </ul>

    <br>
    <h2>Практика</h2>

    <p><b>Импорты без модулей</b></p>

    <p>В проекте используются некоторые самописные псевдомодули. Однако при подключении всех <code>*.js</code> файлов, в консоли высыпается множество ошибок. Причина в неправильной работе с импортами. Поправьте псевдомодули и подключение к <code>index.html</code> так, чтобы приложение заработало, а в браузере появилась надпись <code>success</code>.</p>

    <p><code>index.html</code></p>
    <pre class="brush: html;">
        &lt;script src=&quot;dom.js&quot;&gt;&lt;/script&gt;
        &lt;script src=&quot;reverse.js&quot;&gt;&lt;/script&gt;
        &lt;script src=&quot;render.js&quot;&gt;&lt;/script&gt;



        &lt;script type=&quot;module&quot;&gt;
            window.render.renderDOM(&apos;.root&apos;, window.reverse.reverse(&apos;sseccus&apos;));
        &lt;/script&gt;
    </pre>

    <br>
    <p><code>dom.js</code></p>

    <pre class="brush: js;">
        (function () {
            const TAG = 'div';

            function createElement(tag = TAG, content) {
                const element = document.createElement(tag);
                element.textContent = content;
                return element;
            }
            window.crear = {createElement};
        })();
    </pre>

    <br>
    <p><code>render.js</code></p>

    <pre class="brush: js;">
        (function () {
            const TAG = 'p';

            function renderDOM(selector, content) {
                const root = document.querySelector(selector);

                if (!root) {
                    return;
                }

                const element = window.crear.createElement(TAG, content); // createElement из файла dom.js
                root.appendChild(element);

            }

            window.render = {renderDOM};
        })();
    </pre>

    <br>
    <p><code>reverse.js</code></p>

    <pre class="brush: js;">
        (function () {
            function reverse(str) {
                return str.split('').reverse().join('');
            }
            window.reverse = {reverse};
        })();
    </pre>

</div>



<!--
<pre class="brush: js;">

</pre>

<ul class="marker">
    <li></li>
</ul>

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
