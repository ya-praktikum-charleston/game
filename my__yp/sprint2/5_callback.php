<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Callback и чейнинг</h2>

    <p>Техника для примера про получение чатов и информации о пользователе:</p>

    <pre class="brush: js;">
        const callback = function (err, chats) {
            if (err) {
                throw err;
            }
            console.log('Chats: ', chats);
        };

        try {
            http.get('/user', callback);
        } catch (err) {
            console.log(err); // Не выполнится
        }
    </pre>

    <br>
    <h2>Promises</h2>

    <p><b>Промис — это специальный объект, который может находиться в одном из трёх состояний:</b></p>

    <ul class="marker">
        <li><code>pending</code> — ожидание,</li>
        <li><code>fulfilled</code> — исполнено успешно,</li>
        <li><code>rejected</code> — исполнено с ошибкой.</li>
    </ul>

    <img src="img/S3_01_01_1599310779.png" alt="">

    <p>Когда промис перешёл в статус <code>fulfilled</code>, часто говорят, что промис «разрезолвился» или «отрезолвился».</p>

    <pre class="brush: js;">
        const promise = new Promise(function(resolve, reject) {
            // Здесь можно выполнять любые действия

            // вызов resolve(result) переведёт промис в состояние fulfilled
            // вызов reject(error) переведёт промис в состояние rejected
        });

        // Можно создать сразу «готовый» промис
        const fulfilled = Promise.resolve(result);
        // const fulfilled = new Promise((resolve, _) => resolve(result));
        const rejected = Promise.reject(error);
        // const rejected = new Promise((_, reject) => reject(error));
    </pre>

    <p>Чейнинг промисов</p>

    <pre class="brush: js;">
        const promise = Promise.resolve(42);

        const p2 = promise
            .then(res => {
                console.log(res); // 42
                return 'value 2';
            })
            .then(res => {
                console.log(res); // 'value 2'
                return {};
            })
            .then(res => {
                console.log(res); // {}
            });

        p2 === promise // false
    </pre>

    <br>
    <p>Промис даже умеет возвращать другой промис:</p>

    <pre class="brush: js;">
        const promise1 = Promise.resolve('promise 1 request 1')
            .then(res => {
                console.log(res); // promise 1 request 2
                return 'promise 1 request 2';
            });

        const promise2 = Promise.resolve('promise 2 request 1')
            .then(res => {
                    console.log(res); // promise 2 request 1
                    return promise1;
            })
            .then(res => {
                console.log(res); // 'promise 1 request 2'
                return 'promise 2 request 2';
            })
            .then(res => {
                console.log(res); // promise 2 request 2
            });
    </pre>

    <br>
    <p>С помощью промисов устраним “callback hell”:</p>

    <pre class="brush: js;">
        // Как было:

        http.post('/api/v1/signin', user, function (err, resp1) {
            if (err) { return console.error(err); }
            http.get(`/api/v1/chats/${resp1.id}`, function (err, resp2) {
                if (err) { return console.error(err); }
                http.post(`/api/v1/chats/${resp1.id}/messages`, {info: resp2}, function (err, avatar) {
                    if (err) { return console.error(err); }
                    // callback hell
                });
            });
        });

        // Как стало:
        http.post('/api/v1/signin', user)
                .then(resp1 => http.get(`/api/v1/chats/${resp1.id}`))
                .then(resp2 => http.post(`/api/v1/chats/${resp1.id}/messages`, {info: resp2}))
                .then(...)
                .catch(err => console.log(err));
    </pre>

    <br>
    <p><b>Promise.all</b></p>

    <pre class="brush: js;">
        Promise.all([
              http.get('/api/v1/chats/1'),
              http.get('/api/v1/chats/2'),
        ]).then(function(chats) {
              // Результатом станет массив из значений всех промисов
              chats.forEach((chat, index) => {
                    console.log(`chat #${index}: ${chat.title}`);
              });
        });
    </pre>

    <p><code>Promise.all</code> работает по принципу «транзакции»: либо вернётся всё, либо ошибка. Если в ходе исполнения любого из промисов выбрасывает ошибку, которую мы не обрабатываем, — будет выброшено исключение:</p>

    <pre class="brush: js;">
        const p1 = new Promise((resolve, reject) => {
          setTimeout(resolve, 1000, "one");
        });
        const p2 = new Promise((resolve, reject) => {
          setTimeout(resolve, 2000, "two");
        });
        const p3 = new Promise((resolve, reject) => {
          setTimeout(resolve, 3000, "three");
        });
        const p4 = new Promise((resolve, reject) => {
          setTimeout(resolve, 4000, "four");
        });
        const p5 = new Promise((resolve, reject) => {
        // Это обещание прервет Promise.all
          reject("reject");
        });

        Promise.all([p1, p2, p3, p4, p5])
                .then(value => {
                    console.log(value);
                })
                .catch(reason => {
                    console.log(reason);
                });

        // В консоли будет 'reject'
    </pre>

    <br>
    <p><b>Promise.race</b></p>

    <p>Бывают случаи, когда нужно получить данные первого исполнившегося промиса. Например, реализовать таймаут для отправки запроса. Мы написали метод, который отправляет запрос на сервер, но если он долго отвечает, — хотелось бы прервать запрос и выкинуть исключение:</p>

    <pre class="brush: js;">
        // Логика: если запрос выполняется дольше пяти секунд,
        // выбрасываем ошибку, что очень долго
        Promise.race([
            http.get('/data'),
            new Promise((_, reject) => {
                setTimeout(() => {
                    reject(new Error('Timeout error'));
                }, 5000);
            }),
        ]);
    </pre>

    <br>
    <p><b>Promise.allSettled</b></p>

    <p>Метод всегда возвращает массив промисов, даже если произошёл выброс исключения.</p>

    <pre class="brush: js;">
        const p1 = new Promise((resolve, reject) => {
            setTimeout(resolve, 1000, "one");
        });
        const p2 = new Promise((resolve, reject) => {
            setTimeout(resolve, 2000, "two");
        });
        const p3 = new Promise((resolve, reject) => {
            setTimeout(resolve, 3000, "three");
        });
        const p4 = new Promise((resolve, reject) => {
            setTimeout(resolve, 4000, "four");
        });
        const p5 = new Promise((resolve, reject) => {
        // Это обещание прервёт Promise.all
            reject("reject");
        });

        Promise.allSettled([p1, p2, p3, p4, p5])
            .then(value => {
                console.log(value);
            })
            .catch(reason => {
                console.log(reason);
            });
    </pre>

    <br>
    <h2>async, await</h2>

    <p>Ключевое слово <code>await</code> указывает на то, что нужно дождаться выполнение промиса. Если он завершится успешно, в переменную будет записан результат <code>resolve</code>, иначе — возникнет исключение, которое хорошо бы поймать.
        Нельзя использовать <code>await</code> без обозначения функции <code>async</code>. Они всегда работают в паре:</p>

    <pre class="brush: js;">
        const userSigning = async () => {
            try {
                const resp1 = await http.post('/api/v1/signin', user);
                ...
            }
            catch (error) {
                console.error(error);
            }
        };

        // или

        async function userSigning() {
            try {
                const resp1 = await http.post('/api/v1/signin', user);
                ...
            }
            catch (error) {
                console.error(error);
            }
        }
    </pre>

    <p>Функция, помеченная как <code>async</code>, — всегда возвращает промис.</p>

    <p><code>await</code> — это ключевое слово, которое умеет резолвить не только промисы:</p>

    <p><a target="_blank" href="https://babeljs.io/repl#?browsers=&build=&builtIns=false&spec=false&loose=false&code_lz=IYZwngdgxgBAZgV2gFwJYHsI2QUxMgCgEoYBvAKAEhgB3YVZGAFgCYBucgXyA&debug=false&forceAllTransforms=false&shippedProposals=false&circleciRepo=&evaluate=false&fileSize=false&timeTravel=false&sourceType=module&lineWrap=true&presets=env&prettier=false&targets=&version=7.10.3&externalPlugins=">Онлайн компилятор Babel</a></p>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Ожидание асинхронных операций</b></p>

    <pre class="brush: js;">
        const delay = timeout => new Promise(resolve => setTimeout(resolve, timeout));

        const promises = [
            delay(65).then(() => 10),
            delay(100).then(() => { throw 'my error'; })
        ];

        function allSettled(promises) {

            return Promise.all(promises.map(elem => {

                return new Promise((resolve) => {
                    return resolve(elem)
                })
                .then(resolve=>{
                    return {"status": "resolved", "value": resolve}
                }).catch(reject=>{
                    return {"status": "rejected", "reason": reject}
                });
            }))
                .then((value) => {
                    console.log(value);
                    return value;
                }).catch(reason => {
                    console.log(reason)
            });



            // return Promise.resolve([{"status": "resolved", "value": 10}, {"status": "rejected", "reason": "my error"}]);
        }


        allSettled(promises)
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
