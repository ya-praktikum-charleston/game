<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Асинхронность. Начало</h2>

    <p><b>Полезные ссылки</b></p>

    <p><b>Крайне рекомендуем:</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://learn.javascript.ru/event-loop">Подробно про Event Loop;</a></li>
        <li><a target="_blank" href="https://developer.mozilla.org/ru/docs/Web/JavaScript/EventLoop">Описание с примерами на MDN;</a></li>
        <li><a target="_blank" href="https://learn.javascript.ru/settimeout-setinterval">setInterval и setTimeout;</a></li>
        <li><a target="_blank" href="https://www.youtube.com/watch?v=8cV4ZvHXQL4&feature=share">Про цикл событий в JavaScript;</a></li>
        <li><a target="_blank" href="https://learn.javascript.ru/microtask-queue">Микрозадачи.</a></li>
    </ul>

    <p><b>Не менее важно:</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://habr.com/ru/company/wrike/blog/302896/">Асинхронность в JavaScript: Пособие для тех, кто хочет разобраться;</a></li>
        <li><a target="_blank" href="https://habr.com/ru/post/336498/">Про Event Loop;</a></li>
        <li><a target="_blank" href="https://nodejs.org/en/docs/guides/event-loop-timers-and-nexttick/">Про Event Loop в NodeJS;</a></li>
        <li><a target="_blank" href="https://html.spec.whatwg.org/multipage/webappapis.html#event-loop-processing-model">Спецификация Event Loop.</a></li>
    </ul>


    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Замыкания</b></p>
    <p>Код десять раз выведет на экран число 10. Подумайте, почему так происходит? Как исправить код, чтобы он выводил по порядку числа от 0 до 9? Предложите три разные решения, которые выведут в консоль цифры от 0 до 9.</p>

    <pre class="brush: js;">
        'use strict';

        const badResult = () => {
            for (var i = 0; i < 10; i++) {
                setTimeout(function() {
                    console.log(i);
                }, 10);
            }
        };

        const iifeSolution = () => {
            for (var i = 0; i < 10; i++) {
                (function() {
                    setTimeout(function() {
                        console.log(i);
                    }, 10);
                })(i);
            }
        };

        function es6Solution() {
            for (let i = 0; i < 10; i++) {
                setTimeout(function() {
                    console.log(i);
                }, 10);
            }
        }

        const bindSolution = function () {
            for(var i = 0; i < 10; i++) {
                setTimeout(console.log.bind(null,i), 10);
            }
        };

        badResult()
        iifeSolution()
        es6Solution()
        bindSolution()
    </pre>

    <br>
    <p><b>Задача 2 - Вызов со случайным таймаутом</b></p>
    <p>Даны 3 асинхронные функции со случайным setTimeout. Напишите код, который выведет в консоль: A B C</p>

    <pre class="brush: js;">
        function foo(callback) {
            setTimeout(function() {
                callback('A');
            }, Math.random()*100);
        }

        function bar(callback) {
            setTimeout(function() {
                callback('B');
            }, Math.random()*100);
        }

        function baz(callback) {
            setTimeout(function() {
                callback('C');
            }, Math.random()*100);
        }

        // Решение 1
        foo((callback)=> {
            console.log(callback);
            bar((callback)=> {
                console.log(callback);
                baz((callback)=> {
                    console.log(callback);
                });
            });
        });

        // Решение 2
       Promise.resolve().then(()=> {
            return new Promise((resolve, reject) => {
                foo((callback) => {
                    console.log(callback);
                    resolve();
                });
            })
        }).then(() => {
            return new Promise((resolve, reject) => {
                bar((callback)=> {
                    console.log(callback);
                    resolve();
                });
            })
        }).then(() => {
            return new Promise((resolve, reject) => {
                baz((callback)=> {
                    console.log(callback);
                    resolve();
                });
            })
        })
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



<?php include '../../include/footer.php'; ?>
