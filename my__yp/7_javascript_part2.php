<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>JavaScript. Глава 2</h2>

    <p><b>Типы данных II</b></p>

    <p>Можно сделать методы, которые возвращают этот же объект, и мы сможем сразу обратиться к его следующему свойству. Такой способ называется «цепочка» (от англ. chaining).</p>

    <pre class="brush: js;">
        const chat = {
            messages: 1042,
            get: function () {
                return this.messages; // chat.get(); // 1042
            },
            set: function (value) {
                this.messages = parseInt(value) || 0;
            },
        };

        chat.get().set(42).get(); // 1042 42
    </pre>

    <br>

    <pre class="brush: js;">
        const result = 'a.b.c.d'
                            .split('.')
                            .map(item => `__${item}__`)
                            .join('.');
        console.log(result); // __a__.__b__.__c__.__d__
    </pre>

    <br>
    <p><b>Метод <code>defineProperty</code></b></p>

    <p>Этот метод управляет дескрипторами данных или доступа. Согласно документации на MDN:</p>

    <ul class="marker">
        <li>Дескриптор данных — это свойство, имеющее значение, которое может быть (а может и не быть) записываемым;</li>
        <li>Дескриптор доступа — это свойство, описываемое парой функций — геттером и сеттером.</li>
    </ul>

    <p><code>Object.defineProperty(obj, prop, descriptor) </code></p>

    <ul class="marker">
        <li><code>obj</code> — объект, для которого определяется свойство,</li>
        <li><code>prop</code> — имя свойства,</li>
        <li><code>descriptor</code> — дескриптор свойства.</li>
    </ul>

    <pre class="brush: js;">
        const chat = {};

        Object.defineProperty(chat, 'title', {
            value: 'Chat name 1',
            writable: true,
            enumerable: true,
            configurable: true
        });

        console.log(chat.title); // 'Chat name 1'

        // Пример добавления свойства к объекту через defineProperty()
        // с дескриптором доступа
        let messagesCount = 42;
        Object.defineProperty(chat, 'messages', {
            get: () => messagesCount,
            set: newMessagesCount ⇒ {
            messagesCount = newMessagesCount
        },
            enumerable: true,
            configurable: true
        });
        console.log(chat.messages); // 42

        // Нельзя скрестить оба подхода
        Object.defineProperty(chat, 'error', {
            value: [1, 2, 4],
            get: () => [1, 2, 3],
        });
        // Будет исключение TypeError: свойство value применимо только в
        // дескрипторах данных, свойство get применимо только в дескрипторах
        // доступа
    </pre>

    <br>
    <h2>ES6+</h2>

    <p><b>ООП</b></p>

    <pre class="brush: js;">
        class User {
            constructor(login, password) {
                this._login = login;
                this._password = password;
            }

            hello() {
                console.log(`Hello, ${this._login}`);
            }

            get login() {
                return this._login;
            }

            set password(value) {
                this._password = value;
            }
        }

        const user1 = new User('Dom', 'furious');
        const user2 = new User('Axe', 'billions');

        user1.password = 'pswd228'; // Изменили пароль

        user1.hello();       // Hello, Dom
        user2.hello();       // Hello, Axe
    </pre>

    <br>

    <p><b>Promise</b></p>

    <pre class="brush: js;">
        function request(url) {
            return new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', url, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        resolve(JSON.parse(xhr.responseText));
                    }
                }
            }
        }
    </pre>

    <br>

    <pre class="brush: js;">
        const user = new Promise((resolve, reject) => {
            resolve({name: 'Simon'});
        });

        user.then(({name}) => `Привет, ${name}`)
             .then(str => `${str}!`)
             .then((str) => console.log(str)) // Привет, Simon!
    </pre>

    <p><b>Итераторы и генераторы</b></p>

    <p>Итераторы позволяют использовать любой объект в цикле <code>for..of</code> или перебирать элемент через специальные методы. Например, <code>next</code>.</p>

    <pre class="brush: js;">
        const arr = [11, 12, 13];
        const itr = arr[Symbol.iterator]();

        itr.next(); // { value: 11, done: false }
        itr.next(); // { value: 12, done: false }
        itr.next(); // { value: 13, done: false }

        itr.next(); // { value: undefined, done: true }
    </pre>

    <br>

    <pre class="brush: js;">
        const range = {
            from: 1,
            to: 5,
        };

        // 1. вызов for..of сначала вызывает эту функцию
        range[Symbol.iterator] = function () {

            // ...она возвращает объект итератора:
            // 2. Далее, for..of работает только с этим итератором, запрашивая у него новые значения
            return {
                current: this.from,
                last: this.to,

                // 3. next() вызывается на каждой итерации цикла for..of
                next() {
                    // 4. он должен вернуть значение в виде объекта {done:.., value :...}
                    if (this.current <= this.last) {
                        return {done: false, value: this.current++};
                    } else {
                        return {done: true};
                    }
                }
            };
        };

        // теперь работает!
        for (let num of range) {
            console.log(num); // 1, 2, 3, 4, 5
        }
    </pre>

    <br>

    <p>ряд Фибоначчи</p>

    <pre class="brush: js;">
        function* fibonacci(n) {
            const infinite = !n && n !== 0;
            let current = 0;
            let next = 1;

            while (infinite || n--) {
                yield current;
                [current, next] = [next, current + next];
            }
        }

        const [...first10] = fibonacci(10);
        console.log(first10);
        // [0, 1, 1, 2, 3, 5, 8, 13, 21, 34]
    </pre>

    <br>

    <p>Рекурсия применима к генераторам:</p>

    <pre class="brush: js;">
        function* fibonacci(n = null, current = 0, next = 1) {
            if (n === 0) {
                return current;
            }

            let m = n !== null ? n - 1 : null;

            yield current;
            yield *fibonacci(m, next, current + next);
        }
    </pre>

    <br>

    <p><b>async и await</b></p>

    <pre class="brush: js;">
        async function request(url) {
            const response = await fetch(url, {method: 'GET'});
            if (response.statusCode !== 200) {
                throw new Error(`Can not load json ${url}`);
            }
            const json = await response.json(); // Не очень хорошо делать return await code();
                                                                                        // Об этом в следующих спринтах
            return json;
        }

        ///////////////

        for await (const source of data) {
            console.log(source)
        }
    </pre>

    <p>У слова <code>async</code> один простой смысл: эта функция всегда возвращает промис. Значения других типов оборачиваются в завершившийся успешно промис автоматически.</p>

    <pre class="brush: js;">
        async function f() {
            return 1;
        }

        f().then(alert); // 1
    </pre>

    <p>Ключевое слово <code>await</code> заставит интерпретатор JavaScript ждать до тех пор, пока промис справа от <code>await</code> не выполнится. После чего оно вернёт его результат, и выполнение кода продолжится.</p>

    <pre class="brush: js;">
        async function f() {

            let promise = new Promise((resolve, reject) => {
                setTimeout(() => resolve("готово!"), 1000)
            });

            let result = await promise; // будет ждать, пока промис не выполнится (*)

            alert(result); // "готово!"
        }

        f();
    </pre>

    <br>

    <p><b>Коллекции Map, Set</b></p>

    <pre class="brush: js;">
        const map = new Map();
        map.set(key, value);   // добавить значение
        map.get(key);          // получить значение
        map.has(key);          // проверить наличие ключа
        map.delete(key);
        map.clear();
        map.size;              // размер Map
        map.forEach(callback); // перебор ключей, свойств, значений
        map.values();
        map.keys();
        map.entries();
    </pre>
    <br>
    <p>Рассмотрим пример:</p>

    <pre class="brush: js;">
        const map = new Map();

        const keyString = "строка";
        const keyObj = {};
        const keyFunc = function() {};

        // устанавливаем значения
        map.set(keyString, "значение, связанное со 'строка'");
        map.set(keyObj, "значение, связанное с keyObj");
        map.set(keyFunc, "значение, связанное с keyFunc");

        map.size; // 3

        // получаем значения
        map.get(keyString);    // "значение, связанное со 'строка'"
        map.get(keyObj);       // "значение, связанное с keyObj"
        map.get(keyFunc);      // "значение, связанное с keyFunc"
    </pre>

    <br>

    <p><code>Set</code> работает только с уникальными значениями. Можно вставлять как строки и числа, так и ссылки на объекты. Перебор работает через <code>for..of</code> или <code>forEach</code> в том же порядке, что и добавляли.
        Один из примеров <code>Set</code>: позволяет найти число перерендеров в интерфейсе или в функции мемоизации.</p>

    <pre class="brush: js;">
        const set = new Set();
        set.add(value);          // добавить значение
        set.has(value);          // проверить наличие значения
        set.delete(value);
        set.clear();
        set.size;              // размер Set
        set.forEach(callback); // перебор ключей, свойств, значений
        set.values();
        set.keys();
        set.entries();
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
