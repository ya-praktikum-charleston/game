<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>BOM и DOM</h2>

    <p>В JavaScript есть специальный объект, который содержит все глобальные переменные и функции. Его называют «глобальным объектом»:</p>

    <ul class="marker">
        <li>в <code>NodeJS</code> это <code>global</code>,</li>
        <li>в браузере — <code>window</code> и <code>this</code>, который ссылается на window в глобальной области видимости.</li>
    </ul>

    <p><b>BOM</b></p>

    <img src="img/S2_05_2_BomDom_1598026102.png" alt="">

    <br>

    <p>BOM (Browser Object Model) — объекты, методы и свойства для работы с браузером.</p>

    <ul class="marker">
        <li><code>navigator</code> — информация о браузере,</li>
        <li><code>location</code> — информация про адресную строку и различные свойства,</li>
        <li><code>history</code> — возможность работать с переходами и историей переходов,</li>
        <li><code>screen</code> — информация об экране пользователя,</li>
        <li>стандартные функции <code>alert</code>, <code>prompt</code> или <code>XMLHttpRequest</code>.</li>
    </ul>

    <br>

    <p><b>DOM</b></p>

    <p>DOM (Document Object Model) — интерфейс (API) для HTML или XML документов.</p>
    <p>DOM представляет документ в виде дерева. Это проводник от веб-страницы до JavaScript, который позволяет изменять контент, стили и структуру документа.</p>

    <pre class="brush: js;">
        document; // Хост-объект
        document.documentElement; // узел HTML
        document.header // узел HEAD
    </pre>

    <br>
    <h2>Работа с узлами</h2>

    <p><b>Перебор узлов</b></p>

    <pre class="brush: js;">
        element.parentNode // родитель

        element.childNodes // дочерние ноды
        element.firstChild // первый ребёнок
        element.lastChild // последний ребёнок

        document.previousSibling // предыдущий «сосед»
        document.nextSibling // следующий «сосед»
    </pre>

    <p>Выборка элементов:</p>

    <p><code>document.getElementById('id')</code></p>

    <pre class="brush: html;">
        &lt;div id=&quot;hello&quot;&gt;Hello everybody!&lt;/div&gt;
    </pre>
    <pre class="brush: js;">
        document.getElementById('hello');
    </pre>

    <br>

    <p><code>document.getElementsByClassName('name')</code></p>

    <pre class="brush: html;">
        &lt;div class=&quot;hello&quot;&gt;
            &lt;div class=&quot;greeting&quot;&gt;Hello everybody!&lt;/div&gt;
            &lt;div class=&quot;greeting&quot;&gt;Aloha&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;greeting&quot;&gt;Привет&lt;/div&gt;
    </pre>
    <pre class="brush: js;">
        document.getElementsByClassName('greeting'); // 3 элемента
        const parent = document.getElementsByClassName('hello')[0];
        parent.getElementsByClassName('greeting'); // 2 элемента
    </pre>

    <br>

    <p><code>document.getElementsByTagName('tag')</code></p>

    <pre class="brush: html;">
        &lt;div&gt;
            &lt;span&gt;Hello everybody!&lt;/span&gt;
            &lt;span&gt;Aloha&lt;/span&gt;
        &lt;/div&gt;
        &lt;span&gt;Goodbye&lt;/span&gt;
    </pre>
    <pre class="brush: js;">
        document.getElementsByTagName('span'); // 3 элемента
        const parent = document.getElementsByTagName('div')[0];
        const elems = parent.getElementsByTagName('span'); // 2 элемента
    </pre>

    <br>

    <p><code>document.querySelectorAll('selector')</code></p>

    <pre class="brush: html;">
        &lt;div class=&quot;container&quot;&gt;
            &lt;div&gt;Hello everybody!&lt;/div&gt;
            &lt;div&gt;Aloha&lt;/div&gt;
        &lt;/div&gt;
        &lt;div class=&quot;container&quot;&gt;
            &lt;div&gt;Goodbye&lt;/div&gt;
            &lt;div&gt;Aloha&lt;/div&gt;
        &lt;/div&gt;
    </pre>
    <pre class="brush: js;">
        document.querySelectorAll('.container div:first-child');
        // NodeList [ <div>Hello everybody!</div>, <div>Goodbye</div> ]
    </pre>

    <br>

    <p><code>document.querySelector('selector')</code> возвращает первый найденный элемент по заданному селектору</p>

    <pre class="brush: html;">
        &lt;div class=&quot;greeting&quot;&gt;Goodbye&lt;/div&gt;
        &lt;div class=&quot;container&quot;&gt;
            &lt;div class=&quot;greeting&quot;&gt;Hello everybody!&lt;/div&gt;
            &lt;div class=&quot;greeting&quot;&gt;Aloha&lt;/div&gt;
        &lt;/div&gt;
    </pre>
    <pre class="brush: js;">
        document.querySelector('.greeting');
        // <div class="greeting">Goodbye</div>
        document.querySelector('.container .greeting');
        // <div class="greeting">Hello everybody!</div>
    </pre>

    <br>

    <p><code>closest('selector')</code></p>

    <pre class="brush: html;">
        &lt;div id=&quot;block&quot; title=&quot;Я - блок&quot;&gt;
            &lt;a href=&quot;#&quot;&gt;Я ссылка в никуда&lt;/a&gt;
            &lt;a href=&quot;http://site.ru&quot;&gt;Я ссылка на сайт&lt;/a&gt;
            &lt;div&gt;
                &lt;div id=&quot;too&quot;&gt;&lt;/div&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    </pre>
    <pre class="brush: js;">
        const div = document.querySelector("#too");
        div.closest("#block"); //&lt;div id=&quot;block&quot; title=&quot;Я - блок&quot;&gt;
        div.closest("div"); //Сам &lt;div id=&quot;too&quot;&gt;
        div.closest("a"); //null
    </pre>

    <br>

    <p><b>Создание элементов</b></p>

    <pre class="brush: js;">
        document.createElement(tag) // создаёт элемент с тегом tag
        document.createTextNode(value) // создаёт текстовый узел
        element.cloneNode(deep) // клонирует элемент

        parent.appendChild(el) // вставляет узел в конец
        parent.removeChild(el) // удаляет узел
        parent.replaceChild(newEl, oldEl) // заменяет узел
        parent.insertBefore(elem, nextSibling) // вставляет узел
    </pre>

    <br>

    <h2>Свойства элементов</h2>

    <pre class="brush: js;">
        &lt;h1&gt;Ссылка: &lt;a href=&quot;/&quot;&gt;тут&lt;/a&gt;&lt;/h1&gt;
        element.tagName // имя тега
        h1.tagName // "H1"
    </pre>

    <pre class="brush: js;">
        let div = document.querySelector('div');
        console.log(div); // &lt;div&gt;Привет&lt;/div&gt;

        div.innerHTML = 'Hi!'
        console.log(div); // &lt;div&gt;Hi!&lt;/div&gt;

        div.outerHTML = '&lt;h1&gt;Aloha&lt;/h1&gt;'
        console.log(div) // &lt;div&gt;Hi!&lt;/div&gt;
    </pre>

    <br>

    <p><b>Атрибуты</b></p>

    <pre class="brush: js;">
        element.hasAttribute(name) // проверяет наличие атрибута
        element.getAttribute(name) // получает значение атрибута
        element.setAttribute(name, value) // устанавливает атрибут
        element.removeAttribute(name) // удаляет атрибут

        elem.attributes // получить все атрибуты
    </pre>

    <p><code>hidden</code> может принимать следующие значения:</p>
    <ul class="marker">
        <li><code>true</code> — элемент не виден на экране,</li>
        <li><code>false</code> — элемент виден на экране.</li>
    </ul>

    <p>Для работы с классами используются следующие методы:</p>
    <ul class="marker">
        <li><code>className</code> — возвращает класс в виде строки,</li>
        <li><code>classList</code> — возвращает объект для работы с классами,</li>
        <li><code>classList.[add/remove]</code> — добавить/удалить класс,</li>
        <li><code>classList.toggle</code> — переключает класс,</li>
        <li><code>classList.contains</code> — проверяет есть ли класс.</li>
    </ul>

    <p>все <code>data-*</code> атрибуты доступны в объекте <code>dataset</code>,</p>

    <p><code>data</code> атрибут доступен в <code>element.dataset.userLocation</code></p>

    <br>
    <h2>Эффективность методов DOM</h2>

    <p><b>Оптимизации</b></p>

    <p>Уменьшить число вызовов записи к DOM</p>

    <p>Можно делать обновления небольшими порциями. Например, при вставке использовать фрагменты, которые добавляются в структуру данных JavaScript, и только после завершения цикла — вставить их в DOM:</p>

    <p><code>document.createDocumentFragment()</code></p>

    <pre class="brush: js;">
        const fragment = document.createDocumentFragment();
        for(let i = 0; i < 1000; i++){
            const element = document.createElement('div');
            fragment.appendChild(element);
        }
        document.body.appendChild(fragment);
    </pre>

    <br>

    <p><b>Не перестраивать постоянно DOM</b></p>

    <p>Удаление узлов из DOM-дерева — тяжеловесная операция. Если постоянно комбинировать её со вставкой, этого уже будет достаточно, чтобы браузер тормозил.</p>
    <p>Подобные вещи решаются через CSS. Компонентам понадобится класс hidden, который будет их скрывать:</p>

    <p><code>
            .button__visible-hidden {
            display: none;
            }
        </code></p>

    <br>

    <p><b>Мемоизация</b></p>

    <pre class="brush: js;">
        const result = someHardFunction(1, 2); // Вычисления супердолгие
        const result1 = someHardFunction(3, 4); // Вычисления супердолгие
        const result3 = someHardFunction(1, 2); // Вычислений вообще не будет
                                                // Ответ вернется быстро из кеша (из хеш-мапы, или объекта в js)
    </pre>

    <p>Про механизм мемоизации в JavaScript можно почитать в <a target="_blank" href="https://habr.com/ru/company/ruvds/blog/332384/">данной статье на хабре</a>.</p>


    <pre class="brush: js;">
        // простая чистая функция, которая возвращает сумму аргумента и 10
        const add = (n) => (n + 10);
        console.log('Simple call', add(3));

        // простая функция, принимающая другую функцию и
        // возвращающая её же, но с мемоизацией
        const memoize = (fn) => {

            let cache = {};

            return (...args) => {

                let n = args[0];  // тут работаем с единственным аргументом

                if (n in cache) {
                    console.log('Fetching from cache');
                    return cache[n];
                }
                else {
                    console.log('Calculating result');
                    let result = fn(n);
                    cache[n] = result;
                    return result;
                }
            }

        }
        // создание функции с мемоизацией из чистой функции 'add'

        const memoizedAdd = memoize(add);
        console.log(memoizedAdd(3));  // вычислено
        console.log(memoizedAdd(3));  // взято из кэша
        console.log(memoizedAdd(4));  // вычислено
        console.log(memoizedAdd(4));  // взято из кэша
    </pre>

    <br>

    <p><b>Полезные ссылки</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://learn.javascript.ru/searching-elements-dom">внутри поисковых методов</a></li>
        <li><a target="_blank" href="https://habr.com/ru/company/ruvds/blog/416539/">вы не знаете DOM</a></li>
        <li><a target="_blank" href="https://www.oreilly.com/library/view/high-performance-javascript/9781449382308/">high performance JavaScript</a></li>
        <li><a target="_blank" href="https://areknawo.com/dom-performance-case-study/">эффективная работа с DOM</a></li>
    </ul>

    <br>

    <h2>Практика</h2>

    <p><b>Задача 1 - Массив HTML-элементов</b></p>

    <p>Напишите функцию makeChatsList, которая принимает массив чатов и возвращает &lt;ul&gt; список, где каждый &lt;li&gt; элемент — это один чат.</p>

    <pre class="brush: js;">
        const chats = [
            {
                title: 'kinopoisk',
                lastMessage: 'Лучшие фильмы с Невским...',
            },
            {
                title: 'abramov_fan',
                lastMessage: 'New react features...',
            },
        ];

        function makeChatsList(chats) {

            const ul = document.createElement('ul');

            chats.map(elem => {
                console.log(elem)

                let li = document.createElement('li');
                li.textContent = `title: ${elem.title} - lastMessage: ${elem.lastMessage}`
                ul.appendChild(li);

            })

            return ul;

        }

        document.body.appendChild(makeChatsList(chats));
    </pre>

    <br>
    <p><b>Задача 2 - Разметка</b></p>

    <p>Напишите функцию highlight, которая для каждой строки tr таблицы пользователей чатов:</p>

    <ul class="marker">
        <li>Проставит класс regular или admin, в зависимости от значения атрибута data-role у ячейки Role. Если такого атрибута нет, функция должна добавить атрибут hidden;</li>
        <li>Проставит класс male или female в зависимости от содержимого ячейки Gender;</li>
        <li>Установит inline-стиль style="text-decoration: line-through", если значение ячейки Age меньше 18;</li>
    </ul>

    <pre class="brush: html;">
        &lt;table class=&quot;chatUsers&quot;&gt;
            &lt;thead&gt;
                &lt;tr&gt;
                    &lt;td&gt;Display name&lt;/td&gt;
                    &lt;td&gt;Age&lt;/td&gt;
                    &lt;td&gt;Gender&lt;/td&gt;
                    &lt;td&gt;Role&lt;/td&gt;
                &lt;/tr&gt;
            &lt;/thead&gt;
            &lt;tbody&gt;
                &lt;tr&gt;
                    &lt;td&gt;User 1&lt;/td&gt;
                    &lt;td&gt;30&lt;/td&gt;
                    &lt;td&gt;m&lt;/td&gt;
                    &lt;td data-role=&quot;regular&quot;&gt;Free&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                    &lt;td&gt;User 2&lt;/td&gt;
                    &lt;td&gt;17&lt;/td&gt;
                    &lt;td&gt;f&lt;/td&gt;
                    &lt;td data-role=&quot;admin&quot;&gt;Admin&lt;/td&gt;
                &lt;/tr&gt;
                &lt;tr&gt;
                    &lt;td&gt;User 3&lt;/td&gt;
                    &lt;td&gt;12&lt;/td&gt;
                    &lt;td&gt;f&lt;/td&gt;
                    &lt;td&gt;Admin&lt;/td&gt;
                &lt;/tr&gt;
            &lt;/tbody&gt;
        &lt;/table&gt;
    </pre>
    <pre class="brush: js;">
        function highlight(table) {
            const tbody = table.querySelector('tbody')
            const tr = tbody.querySelectorAll('tr')

            tr.forEach(elem => {
                const el = elem.querySelector('td:last-child');
                const gender = elem.querySelectorAll('td')[2].textContent;
                const age = elem.querySelectorAll('td')[1].textContent;

                // role
                if(el.dataset.role === "regular"){
                    elem.classList.add("regular");
                }else if(el.dataset.role === "admin"){
                    elem.classList.add("admin");
                }else{
                    elem.setAttribute("hidden", "true");
                }
                // gender
                if(gender === "m"){
                    elem.classList.add("male");
                }else if(gender === "f"){
                    elem.classList.add("female");
                }
                // age
                if(age < 18){
                    elem.style.textDecoration = 'line-through';
                }
            });
        }

        highlight(document.querySelector('.chatUsers'));
    </pre>



</div>




<!--
<pre class="brush: js;">

</pre>

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



<?php include '../include/footer.php'; ?>
