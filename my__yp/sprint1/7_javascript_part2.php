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

    <br>
    <h2>Замыкания</h2>

    <p><b>Если кратко, то замыкание — это лексическое окружение функции и принципы работы языка с этим лексическим окружением. Немного неточно называть замыкание «функцией» с внешними переменными.</b></p>

    <p><b>LexicalEnvironment</b></p>

    <p>У каждой функции или блока кода есть скрытый объект, который содержит локальные переменные, ссылку на лексическое окружение внешней функции или блока кода и другую информацию. Объект лексического окружения состоит из двух частей:</p>

    <ul class="marker">
        <li><code>Environment record</code> — это объект, в котором содержатся локальные переменные и значение <code>this</code> как свойства,</li>
        <li>ссылки на внешнее лексическое окружение.</li>
    </ul>

    <pre class="brush: js;">
        function findChats(title) {
            // LexicalEnvironment = {title: 'Мой супер чат', result: undefined}
            const result = chats.filter(...);
            // LexicalEnvironment = {title: 'Мой супер чат', result: [...]}
            return result;
        }

        findChats('Мой супер чат');
        // LexicalEnvironment = {title: 'Мой супер чат', result: [...]}
    </pre>

    <p>После создания функции, создаётся скрытое свойство <code>[[Scope]]</code>, которое ссылается на её лексическое окружение.</p>

    <p>Если рассматривать задачу про счётчик, то в самом начале у функции <code>canGetCount</code> окружением будет объект <code>window</code>.</p>

    <br>

    <p>Ещё пример действия замыкания:</p>

    <pre class="brush: js;">
        function sum(a) {
            return function(b) {
                return a + b;
            }
        }

        // const sum = a => b => a + b

        const plus = sum(3);
        plus(6); // 9
    </pre>

    <p>В замыкание попадает первый операнд a, далее к нему прибавляем второй операнд <code>b</code>, который передаётся через функцию <code>plus</code>.</p>

    <p>Рассмотрим лексическое окружение функции <code>sum</code>:</p>

    <pre class="brush: js;">
        function sum(a) { // 3
            return function(b) { // 6
                return a + b;
                // LE = {b: 6}
                // .[[Scope]] = {a: 3}
            }
        } // LE = {a: 3}
        // sum.[[Scope]] = window
    </pre>

    <br>
    <h2>ООП</h2>

    <p><b>Например, вот так выглядит инкапсуляция свойств — приватность, о которой говорили ранее.</b></p>

    <pre class="brush: js;">
        /**
         * Приватность через замыкания
         */

        const Counter = function () {
          let privateValue = 0;

          return {
            inc: () => ++privateValue,
            dec: () => --privateValue,
            getValue: () => privateValue,
          }
        }();

        Counter.inc();
        Counter.inc();
        Counter.dec();

        console.log(Counter.getValue()); // 1
        console.log(Counter.privateValue); // undefined
    </pre>

    <p><b>Создание экземпляра функции:</b></p>

    <pre class="brush: js;">
        function User(name) {
            this.sayHi = function() {
                console.log(`Hello, ${name}`);
            };
        }

        const petrov = new User('Петров');
        petrov.sayHi(); // Hello, Петров
    </pre>

    <br>

    <p><b>Напишем класс с применением ключевого слова <code>class</code>:</b></p>

    <pre class="brush: js;">
        class Person {
            constructor(firstName, lastName) {
                this.firstName = firstName;
                this.lastName = lastName;
            }

            getFullName() {
                return `${this.firstName} ${this.lastName}`;
            }
        }

        let person = new Person('Dan', 'Abramov');
        person.getFullName(); // "Dan Abramov"
        person.firstName; // "Dan"
        person.lastName; // "Abramov"
    </pre>

    <pre class="brush: js;">
        class User extends Person {
            constructor(firstName, lastName, email, password) {
                super(firstName, lastName);
                this.email = email;
                this.password = password;
            }

            getEmail() {
                return this.email;
            }

            getPassword() {
                return this.password;
            }
        }

        console.log(typeof User); // function
        console.log(User === User.prototype.constructor); // true

        let user = new User('Dan',
            'Abramov',
            'dan@abramov.com',
            'iLuvES6');
        user.getFullName(); // "Dan Abramov"
        user.getEmail(); // "dan@abramov.com"
        user.getPassword(); //> "iLuvES6"
        user.firstName; // "Dan"
        user.lastName; // "Abramov"
        user.email; // "dan@abramov.com"
        user.password; // "iLuvES6"
    </pre>

    <br>

    <p>Класс можно использовать как Class Expression. Их можно создавать паттерном <a target="_blank" href="https://refactoring.guru/ru/design-patterns/factory-method">«Фабрика»</a>.</p>

    <p>Как и у объектов, у классов есть <b>«геттеры»</b> и <b>«сеттеры»</b>:</p>

    <pre class="brush: js;">
        class User {
            somePrefix = 'Username';

            constructor(name) {
                // вызывает сеттер
                this.name = name;
            }

            get name() {
                return `${this.somePrefix}: ${this._name}`;
            }

            set name(value) {
                if (value.length < 4) {
                    console.log('Имя слишком короткое.');
                    return;
                }
                this._name = value;
            }

        }

        let user = new User('Иван');
        console.log(user.name); // Username: Иван

        user = new User(''); // Имя слишком короткое.
    </pre>

    <br>

    <p>Чтобы закрепить основные идеи ООП, прочитайте статью на <a target="_blank" href="https://habr.com/ru/post/463125/">Хабре: ООП в картинках</a>.</p>

    <br>
    <h2>Прототипы</h2>

    <p>Допустим, есть объект, который описывает сообщение, и он содержит определённые поля. Но есть ещё объект, описывающий сообщение как файл, у которого половина свойств и методов идентичны обычному сообщению. Нет смысла поддерживать сразу несколько одинаковых реализаций. Потому хотелось бы сделать объект с базовым функционалом и добавлять туда только те части сущностей, которые отличаются и необходимы.</p>

    <pre class="brush: js;">
        const message = {
            text: '',
            send(text) { /* ... */ },
        };

        const textMessage = {
            formatter: () => {},
        };

        const fileMessage = {
            loader: () => {},
        };
    </pre>

    <p>Главная задача — научиться связывать эти объекты и пользоваться общим кодом.</p>
    <p>Для создания такой связи есть специальное внутреннее поле <code>[[Prototype]]</code>. Объект, на который указывает ссылка в <code>[[Prototype]]</code>, называется прототипом.</p>
    <p>Если у объекта отсутствует собственный метод — интерпретатор ищет его в прототипе. Поиск будет идти до тех пор, пока интерпретатор не встретит <code>null</code> в поле <code>[[Prototype]]</code>.</p>

    <pre class="brush: js;">
        const message = {
            send(text) { }
        };
        const textMessage = {
            formatter() {},
        };

        Object.setPrototypeOf(textMessage, message);
        textMessage.send('text'); // работает
    </pre>

    <br>
    <p><b>Object.prototype</b></p>

    <p><code>Object.prototype</code> — это прототип для всех объектов по умолчанию. Данный прототип содержит общие методы для всех объектов.</p>

    <pre class="brush: js;">
        /*
        Object.prototype = {
            hasOwnProperty() {}
        };
        */

        const message = {
            send(text) { }
        };

        message.hasOwnProperty('send'); // true
        message.hasOwnProperty('unknown'); // false
    </pre>

    <p>У массивов и функций есть свои прототипы:</p>

    <pre class="brush: js;">
        Array.prototype = {
            concat() {},
            slice() {},
            splice() {},
            forEach() {},
            filter() {},
            map() {},
            [[Prototype]]: &lt;Object.prototype&gt;
        };

        Function.prototype = {
            call() {},
            apply() {},
            bind() {},
            [[Prototype]]: &lt;Object.prototype&gt;
        };
    </pre>

    <br>

    <p><b>Object.create</b></p>

    <pre class="brush: js;">
        const message = {
            send(text) { }
        };

        const msg = Object.create(message);
        msg.text = 'Hello';

        //////////////////////

        const message = {
            send(text) { }
        };

        const msg = Object.create(message, {
            text: 'Hello',
        });
    </pre>

    <p><code>Object.create</code> работает намного быстрее, чем <code>setPrototypeOf</code>. Это можно проверить самому, проведя бенчмарки и замерив время. Или можно довериться стороннему программисту, который сделал это до вас и указал результаты с тестами в <code>gist</code> на GitHub:</p>

    <br>
    <p><b>HomeObject</b></p>

    <p>Во время создания метода, внутреннее поле <code>[[HomeObject]]</code> данного метода заполняется ссылкой на объект, в котором он определён.</p>

    <p><code>super</code> ссылается всегда на прототип объекта из поля <code>[[HomeObject]]</code>.</p>

    <br>

    <p><b>Переопределение метода</b></p>

    <pre class="brush: js;">
        const message = {
            send(text) {
             return `parent: ${text}`;
            }
        };
        const textMessage = {
            formatter() {},
            __proto__: message,
        };

        textMessage.send = () => 'child';

        textMessage.send(); // 'child'
    </pre>

    <br>

    <h2>Регулярные выражения</h2>

    <p><b>Сигнатура</b></p>

    <p>Регулярные выражения реализованы в JavaScript отдельным объектом <code>RegExp</code> и встроены в методы строк.</p>

    <pre class="brush: js;">
        const regexp = new RegExp(pattern, flags);

        const regexp = /pattern/;   // без флагов
        const regexp = /pattern/gi; // с флагами
    </pre>

    <p>Флаги настраивают поведение регулярных выражений:</p>

    <ul class="marker">
        <li><code>i</code> — игнорирование регистра при сравнении (регистронезависимость),</li>
        <li><code>g</code> — глобальный поиск. Когда в тексте есть несколько подходящих вариантов, но без флага g регулярное выражение вернёт только первое вхождение,</li>
        <li><code>m</code> — многострочный режим.</li>
    </ul>

    <br>

    <p><b>Методы строк</b></p>

    <p>В некоторые методы строк встроена работа с регулярными выражениями:</p>

    <pre class="brush: js;">
        message.text; // 'Node.js, и модули, Джеймс о проблемах Node.js\n#nodejs #modules'

        // Проверяем, содержится ли регулярное выражение в строке
        message.text.search(/js/); // 5
        message.text.search(/abc/); // -1

        // Находит первое совпадение в строке
        const result = message.text.match(/js/);
        result[0]; // js
        result.index; // 5
        result.input; // 'Node.js, и модули...' (вся поисковая строка)

        message.text.match(/abc/); // null
    </pre>

    <br>
    <p>Замена строк работает не только по аргументам <code>replace(string, string)</code>, но и по сигнатуре <code>replace(regexp, string)</code> или <code>replace(string | regexp, string | replacer)</code>.</p>

    <pre class="brush: js;">
        message.text.replace(/node/gi, 'NODE');
        // 'NODE.js, и модули, Джеймс о проблемах NODE.js\n#NODEjs #modules'

        function replacer(match, offset, str) {
         return match + offset;
        };
        message.text.replace(/node/gi, replacer);
        // 'Node0.js, и модули, Джеймс о проблемах Node38.js #node47js #modules'
    </pre>

    <br>
    <p><b>Наборы символов</b></p>

    <p>В регулярных выражениях можно использовать наборы символов:</p>

    <p><code>message.text.match(/#[a-z]+/g); // [ '#nodejs', '#modules' ] </code></p>

    <ul class="marker">
        <li><code>\d</code> — [0-9],</li>
        <li><code>\s</code> — [\t\n\v\f\r ],</li>
        <li><code>\w</code> — [a-zA-Z0-9_],</li>
        <li><code>^</code> — все, кроме перечисленных,</li>
        <li><code>|</code> — логическое «или»: X|Y соответствует и X, и Y.</li>
    </ul>

    <pre class="brush: js;">
        message.text.match(/[#\w]+/g);
        // [ 'Node', 'js', 'Node', 'js', '#nodejs', '#modules' ]

        message.text.match(/[^\s]+/g);
        // [ 'Node.js,', 'и', 'модули,',
        // 'Джеймс', 'о', 'проблемах',
        // 'Node.js', '#nodejs', '#modules' ]

        ///////////////////////////

        message.text;
        // 'N0de.js, и модули, Джеймс о проблемах Node.js #nodejs #modules'
        message.text.match(/N0de|Node/);
        // [ 'N0de',
        // index: 0,
        // input: 'N0de.js, и модули, Джеймс о проблемах Node.js #nodejs #modules' ]
        // Или чуть короче
        message.text.match(/N(0|o)de/);
    </pre>

    <br>
    <p>Символ <code>^</code> проверяет вхождение в начало строки. Символ <code>$</code> — вхождение в конец строки:</p>

    <pre class="brush: js;">
        message.text;
        // 'Node.js, и модули, Джеймс о проблемах Node.js #nodejs #modules'

        /^Node/.test(message.text); // true
        /^Hello/.test(message.text); // false

        /modules$/.test(message.text); // true
        /nodejs$/.test(message.text); // false
    </pre>

    <br>
    <p><b>Квантификаторы</b></p>

    <p>Начнём с простого примера. Необходимо получить четыре подряд идущие цифры из строки. Для указания количества повторений используется специальный синтаксис, называемый «квантификатором».</p>

    <pre class="brush: js;">
        // Синтаксис {4} выдаст все числа длиной строго 4 символа
        console.log('Сегодня 2020 год'.match(/\d{4}/)); // 2020

        // Синтаксис {3,4} выдаст все числа длиной 3 или 4
        console.log('Сегодня, в 2020 году, мне исполняется 23'.match(/\d{3,4}/)); // 2020

        // Синтаксис {3,} выдаст все числа длиной 3 или более
        console.log('Сегодня, в 2020 году, мне исполняется 23'.match(/\d{3,}/)); // 2020
    </pre>

    <br>

    <p>Возьмём номер телефона «+7 (999) 123-45-67» и вычленим все числа. В данном случае нас не интересуют числа по отдельности, а именно последовательность чисел 7, 999, 123, 45, 67.</p>

    <pre class="brush: js;">
        const numbers = '+7 (999)-123-45-67'.match(/\d{1,}/g);

        console.log(numbers); // 7,999,123,45,67
    </pre>

    <p>Можно использовать сокращения:</p>

    <ul class="marker">
        <li><code>+</code> — один или более символов (аналог записи <code>{1,}</code>),</li>
        <li><code>?</code> — ноль или один символ (аналог записи <code>{0,1}</code>, делает символ необязательным),</li>
        <li><code>*</code> — ноль или более символов (аналог записи <code>{0,}</code>, символ может повторяться много раз или не существовать).</li>
    </ul>

    <p>Подходит вариант с <code>+</code>:</p>

    <pre class="brush: js;">
        const numbers = '+7 (999)-123-45-67'.match(/\d+/g);

        console.log(numbers); // 7,999,123,45,67
    </pre>

    <br>

    <p>Пример на необязательный символ:</p>

    <pre class="brush: js;">
        const str = 'Следует писать color или colour?';

        console.log(str.match(/colou?r/g)); // color, colour
    </pre>

    <p><b>Скобочные группы</b></p>

    <p>В регулярных выражениях паттерны можно оборачивать в скобки вида <code>()</code> и на выходе получать конкретные значения. Свойства скобочных групп:</p>
    <ul class="marker">
        <li>позволяет выделить совпадения в отдельный массив,</li>
        <li>квантификатор после скобочной группы применяется ко всему содержимому скобки, а не отдельному символу.</li>
    </ul>

    <pre class="brush: js;">
        message.text;
        // 'Node.js, и модули, Джеймс о проблемах Node.js #nodejs #modules'

        message.text.match(/\s[#\w]+/g);
        // [' Node', ' #nodejs', ' #modules']
        message.text.match(/(\s[#\w]+)(\s[#\w]+)/g);
        // [' #nodejs #modules']
        // Квантификатор применится ко всей скобке
        message.text.match(/(\s[#\w]+)+/g);
        // [' Node', ' #nodejs #modules']

        message.text.match(/\s[#\w]+/);
        // [ ' Node',
        // index: 37,
        // input: 'Node.js, и модули, Джеймс о проблемах Node.js #nodejs #modules' ]
        // Выделяем часть совпадения в отдельный элемент массива
        message.text.match(/\s([#\w]+)/);
        // [ ' Node',
        // 'Node',
        // index: 37,
        // input: 'Node.js, и модули, Джеймс о проблемах Node.js #nodejs #modules' ]
    </pre>

    <br>

    <p>Больше о регулярных выражениях вы прочитаете в <a target="_blank" href="https://developer.mozilla.org/ru/docs/Web/JavaScript/Guide/Regular_Expressions">документации на MDN</a>. Ещё несколько ссылок в конце темы помогут попрактиковаться.</p>

    <p>Существуют специальные сервисы для проверки регулярных выражений:</p>

    <ul class="marker">
        <li><a target="_blank" href="https://regex101.com/">Regex101</a> — поможет быстро написать регулярное выражение и сразу же проверить его. Преимущества: можно писать регулярные выражения под разные языки программирования (например, JS или Python). Сервис также умеет «парсить» ваше регулярное выражение и показывать, что именно оно делает по блокам.</li>
        <li><a target="_blank" href="https://phpstorm.tips/tips/38-testing-regular-expressions/">Testing Regular Expressions</a> — в редакторах кода и в IDE (например, WebStorm или PHPStorm) можно проверять регулярки, как говорится, «не отходя от кассы».</li>
    </ul>

    <br>
    <h2>Полезные ссылки</h2>

    <p><b>ES6</b></p>
    <ul class="marker">
        <li><a target="_blank" href="https://habr.com/ru/post/305900/">ES6 по-человечески</a> — перевод ES6-for-humans,</li>
        <li><a target="_blank" href="https://medium.com/webbdev/bad-es6-a0612c9fecf0">JavaScript ES6</a>: слабые стороны — слабые стороны ES6.</li>
    </ul>

    <p><b>ООП и Прототипы</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://blog.almamat.com/oop">Что такое ООП?</a> — красиво про ООП,</li>
        <li><a target="_blank" href="https://tproger.ru/translations/design-patterns-simple-words-1/">Порождающие шаблоны</a> — про паттерн «Фабрика»,</li>
        <li><a target="_blank" href="https://exploringjs.com/es6/ch_oop-besides-classes.html">New OOP features besides classes</a> — OOP features,</li>
        <li><a target="_blank" href="http://speakingjs.com/es5/ch17.html">Objects and Inheritance</a> — о ключевых понятиях ООП,</li>
        <li><a target="_blank" href="https://github.com/urfu-2015/javascript-lectures/blob/master/5-this.md">This</a> — лекция 2015 года от Яндексового URFU про this,</li>
        <li><a target="_blank" href="https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Global_Objects/Object/defineProperty">Object.defineProperty</a> — документация на defineProperty.</li>
    </ul>

    <p><b>Регулярные выражения</b></p>

    <p>Не пренебрегайте данной темой, потому что придётся сталкиваться с проблемами, где регулярные выражения будут наилучшим способом решения вместо написания семидневных велосипедов впустую, когда уже существует нативный и быстрый механизм.</p>

    <ul class="marker">
        <li><a target="_blank" href="https://developer.mozilla.org/ru/docs/Web/JavaScript/Guide/Regular_Expressions">Регулярные выражения</a> — MDN документация,</li>
        <li><a target="_blank" href="https://regexone.com/">RegexOne</a> — задачи для набивания руки на составление регулярных выражений,</li>
        <li><a target="_blank" href="https://learn.javascript.ru/regular-expressions">Регулярные выражения</a> — «Современный учебник JavaScript» об основах Regex,</li>
        <li><a target="_blank" href="https://tproger.ru/articles/regexp-for-beginners/">Регулярные выражения для новичков</a> — о парсинге HTML-тегов,</li>
        <li><a target="_blank" href="https://github.com/ziishaned/learn-regex/blob/master/translations/README-ru.md">Изучение регулярных выражений</a> — словарь для понимания регулярных выражений,</li>
        <li><a target="_blank" href="https://medium.com/factory-mind/regex-tutorial-a-simple-cheatsheet-by-examples-649dc1c3f285">Regex tutorial</a> — A quick cheatsheet by examples — хорошая статья для начала вхождения в регулярки,</li>
        <li><a target="_blank" href="https://regex101.com/">Regex101</a> — сервис для проверки своих регулярных выражений.</li>
    </ul>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Приватное свойство</b></p>
    <p>Используя замыкания, реализуйте задачу любым способом, чтобы она работала, как описано в прекоде.</p>

    <pre class="brush: js;">
        const object = function () {
            let _value = null;

            return {
                getValue: () => _value,
                setValue: (value) => _value = value,
            }
        }();


        object.setValue(42);
        object._value = 73; // изменили напрямую приватное свойство, а не должны уметь обращаться к нему
        object.getValue(); // 42
    </pre>

    <br>
    <p><b>Задача 2 - Привязка контекста</b></p>

    <p>Исправьте функцию <code>second</code>, которая вызовет функцию <code>first</code> — она вернёт число 15.</p>

    <pre class="brush: js;">
        const obj = { x: 15 };

        function first() {
            return this.x; // 15
        }

        function second() {
            return first.call(obj); // Вернёт undefined, а нужно 15
        }

        second();   // 15
    </pre>

    <br>
    <p><b>Задача 3 - Арифметика</b></p>

    <p>Добавьте в <code>Number</code> методы:</p>

    <ul class="marker">
        <li><code>plus</code> — для сложения,</li>
        <li><code>minus</code> — для вычитания.</li>
    </ul>

    <p>В результате выражение <code>(2).plus(3).minus(1)</code> должно вернуть 4.</p>

    <pre class="brush: js;">
        Number.prototype.plus = function(num) {
            return this.valueOf() + num;
        };
        Number.prototype.minus = function(num) {
            return this.valueOf() - num;
        };

        (2).plus(3).minus(1);
    </pre>

    <br>
    <p><b>Задача 4 - Добавляем методы через прототип</b></p>

    <p>Используя свойство функций <code>prototype</code>, добавьте в неё метод <code>getUpperName</code> после создания экземпляра. Метод должен вернуть значение поля <code>name</code> в верхнем регистре.</p>

    <pre class="brush: js;">
        function Book() {
            this.name = 'foo';
        }

        Book.prototype = {
            getName: function() {
                return this.name;
            }
        }

        var book = new Book();

        Book.prototype.getUpperName = function() {
            return this.getName().toUpperCase();
        };


        book.getName();          // 'foo'
        book.getUpperName();     // 'FOO'
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
