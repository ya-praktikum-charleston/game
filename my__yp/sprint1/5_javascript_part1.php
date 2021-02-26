<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Типы данных</h2>

    <p>Примитивные типы данных:</p>

    <ul class="marker">
        <li>логический (<code>Boolean</code>),</li>
        <li>числа (<code>Number</code>),</li>
        <li>большие числа (<code>BigInt</code>),</li>
        <li>строки (<code>String</code>),</li>
        <li>символы (<code>Symbol</code>),</li>
        <li><code>undefined</code>,</li>
        <li><code>null</code>.</li>
    </ul>

    <p>Не примитивный тип:</p>
    <ul class="marker">
        <li>объект (<code>Object</code>).</li>
    </ul>

    <br>
    <p>Получить тип аргумента можно с помощью оператора <code>typeof</code>. Его можно запускать как функцию, так и как оператор:</p>

    <ul class="marker">
        <li><code>typeof arg</code>,</li>
        <li><code>typeof(arg)</code>.</li>
    </ul>

    <pre class="brush: js;">
        typeof undefined    // "undefined"
        typeof 0            // "number"
        typeof 10n          // "bigint"
        typeof true         // "boolean"
        typeof "foo"        // "string"
        typeof Symbol("id") // "symbol"
        typeof Math         // "object"
        typeof null         // "object"
        typeof alert        // "function"
        typeof NaN;         // 'number'
    </pre>

    <p>Обратите внимане на последние четыре строки:</p>

    <ul class="marker">
        <li><code>Math</code> — это встроенный объект, который предоставляет интерфейс для работы с математическими операциями или константами.</li>
        <li><code>typeof null</code> — результат данной операции является ошибкой языка. Исправить ошибку уже нельзя, поскольку так можно «сломать» интернет. Весь мир и все веб-, мобильные-, TV- и другие платформы опираются на неё и делают много дополнительных проверок. Так что хоть и не исправят, но возможно немного поправят в дальнейших стандартах языка. Для проверки используйте <code>!value && value === null && typeof value === "object"</code>.</li>
        <li><code>typeof alert</code> — возвращает функцию, потому что на практике удобно разделять функции и объекты. Но в языке нет отдельного типа «функция». Формально можем сказать, что подобное неверно, но очень удобно в процессе разработки.</li>
        <li><code>typeof NaN</code> — возвращает число, поскольку это специальное значение типа <code>Number</code> для выражения «не чисел». Так как <code>NaN</code> не равен ничему, даже самому себе, для проверки используйте <code>Number.isNaN()</code> из <code>ES6</code>. Будьте осторожны с <code>window.isNaN</code>. Он проверяет «не число» в буквальном смысле, то есть <code>window.isNaN("foo")</code> вернёт <code>true</code>.</li>
    </ul>

    <p>Рассмотрим явное и неявное преобразование в JavaScript. Для приведения любого типа данных к <code>Boolean</code>, необязательно делать именно <code>Boolean(someVar)</code>, достаточно <code>!!someVar</code>. Это будет неявным приведением к <code>Boolean</code>.</p>

    <pre class="brush: js;">
        const str = '';
        console.log(!!str);         // false
        console.log(Boolean(str));  // false
    </pre>

    <br>
    <p><b>Числа</b></p>
    <p>Если разделить число на <code>0</code>, то вы не получите исключение или ошибку как в других языках программирования. Результатом будет специальное значение типа Number — <code>Infinity</code> или <code>-Infinity</code>.</p>

    <pre class="brush: js;">
        1 / 0 === Infinity;     // true
        1 / Infinity === 0;     // тоже true
    </pre>

    <p>Рассмотрим некоторые необычные примеры сравнений, вычислений и что будет их результатом:</p>

    <pre class="brush: js;">
        Math.sqrt(-1);              // NaN
        "не число" / 2;             // NaN
        0 / 0;                      // NaN
        NaN === NaN;                // false
        isNaN(Math.sqrt(-1));       // true

        Number.isNaN(Math.sqrt(-1)); // true, не поддерживается в IE
    </pre>

    <p>В JavaScript вы можете получить максимальный и минимальный 64-битный <code>Number</code>. Данные числа соответствуют стандарту <code>IEEE 754</code>:</p>

    <pre class="brush: js;">
        Number.MAX_VALUE; // 1.79e+308
        Number.MIN_VALUE; // 5e-324, самое близкое к нулю

        Number.MAX_SAFE_INTEGER;  // 2^53 - 1 или 9007199254740991
        Number.MAX_SAFE_INTEGER + 1 === Number.MAX_SAFE_INTEGER + 2; // true

        Number.MIN_SAFE_INTEGER;  // -(2^53 - 1) или -9007199254740991
        Number.MIN_SAFE_INTEGER - 1 === Number.MIN_SAFE_INTEGER - 2; // true

        Number.isSafeInteger(Math.pow(2, 54)); // false
        Number.isSafeInteger(-Math.pow(2, 54)); // false
        // всё это не поддерживается в IE
    </pre>

    <p>Поскольку не все методы поддерживаются браузерами, лучше перед использованием проверять их на <a target="_blank" href="https://caniuse.com/">Can I Use</a>.</p>
    <p>Есть некоторые особенности при вычислении чисел типа <code>double</code>. В <a target="_blank" href="https://medium.com/angular-in-depth/javascripts-number-type-8d59199db1b6">статье на Medium</a> описана математика и почему именно по стандарту IEEE 754 сложение ниже работает именно так.</p>

    <br>
    <p>В стандарте ES2019 появился <code>BigInt</code>:</p>

    <p><code>BigInt</code> — это встроенный объект, предоставляющий способ представлять целые числа больше 2^53 − 1 (наибольшего числа, которое JavaScript может надёжно представить с <code>Number</code>) примитивом. Это максимальное значение можно получить, обратившись к <code>Number.MAX_SAFE_INTEGER</code>.</p>

    <p>Проверка типов у <code>BigInt</code> тоже специфическая:</p>

    <pre class="brush: js;">
        typeof 1n === 'bigint';             // true
        typeof BigInt('1') === 'bigint';    // true

        // Но:
        typeof Object(1n) === 'object';     // true
    </pre>

    <p>Легко определять <code>BigInt</code> через конструктор:</p>

    <pre class="brush: js;">
        const theBiggestInt = 9007199254740991n;

        const alsoHuge = BigInt(9007199254740991);
        // ↪ 9007199254740991n

        const hugeString = BigInt("9007199254740991");
        // ↪ 9007199254740991n

        const hugeHex = BigInt("0x1fffffffffffff");
        // ↪ 9007199254740991n

        const hugeBin = BigInt("0b11111111111111111111111111111111111111111111111111111");
        // ↪ 9007199254740991n
    </pre>

    <p><code>BigInt</code>, как и полагается интерфейсу для работы с большими числами, — содержит алгоритмы сложения, вычитания, умножения, возведения в степень или определения остатка от деления.</p>
    <p>В реальной работе <code>BigInt</code> вам понадобится, только если ваши проекты «крутятся» вокруг таких значений. В противном случае вы будете крайне редко сталкиваться с ним.</p>
    <p><a target="_blank" href="https://habr.com/ru/post/207754/">На Хабре есть отличная статья</a> про работу с длинной арифметикой и как на самом деле работают плюс, минус или умножение.</p>

    <br>
    <p><b>Строки</b></p>

    <pre class="brush: js;">
        const escapeCodesString = 'a\'b';   // a'b
        escapeCodesString.length;           // 3

        const escapeCodesString = "a\"b";   // a"b
        escapeCodesString.length;           // 3

        const escapeCodesString = 'a\\b';   // a\b
        escapeCodesString.length;           // 3

        const escapeCodesString = 'a\n\tb'; // a
                                            // b
        escapeCodesString.length;           // 4
    </pre>

    <p>JavaScript поддерживает различные языки, <code>Unicode</code>, а также <code>Emoji</code>:</p>

    <pre class="brush: js;">
        // Поддерживаются все символы из Unicode
        const utf8String = '中文 español English বাংলা 日本語 ਪੰਜਾਬੀ';
        utf8String.length; // 35
    </pre>

    <pre class="brush: js;">
        // Обрезаем строку в 135 символов до 30 символов
        const longString = 'Мы с бэкенда получили очень длинный текст,
        который неудобно вставлять в интерфейс,
        и хотим обрезать часть строки, заменив конец на "..."'

        let shortString = longString;

        if (longString.length > 30) {
            shortString = longString.slice(0, 29) + '…';
        }

        shortString; // 'Мы с бэкенда получили очень д…'
        shortString.length; // 30

        /////////////////////////////////////////////////

        const tweet = 'Мой твит #hash';

        // Находим индекс первого вхождения подстроки в строке
        tweet.indexOf('#hash'); // 9
        // Искомая подстрока отсутствует
        tweet.indexOf('#hack'); // -1
    </pre>

    <br>
    <p>На строках определены также операции сравнения:</p>

    <pre class="brush: js;">
        'a' === 'a';    // true

        'a' < 'b';      // true
        'a' < 'ab';     // true
        'bar' < 'foo';  // true

        '1' > '12';     // false
        '2' > '12';     // true
        '12' < '5';     // true
    </pre>

    <p>Преобразовать число в строку можно, просто передав число в шаблонную строку или вызвав метод <code>toString</code> у числа:</p>

    <pre class="brush: js;">
        const numb = 42;
        numb.toString(); // '42'
        `${numb}`; // '42'
    </pre>

    <p>Примеры преобразований строки в число:</p>

    <pre class="brush: js;">
        Number('123');     // 123
        Number('12.8');    // 12.8
        Number('12.8  ');  // 12.8
        Number('  12.8');  // 12.8
        Number('   ');     // 0
        Number('');        // 0
        Number('12.8s')    // NaN
        Number('s12.8')    // NaN

        // parseFloat() принимает строку в качестве аргумента и возвращает десятичное число (число с плавающей точкой)
        parseFloat('123');     // 123
        parseFloat('12.8');    // 12.8
        parseFloat('12.8  ');  // 12.8
        parseFloat('  12.8');  // 12.8
        parseFloat('   ');     // NaN
        parseFloat('');        // NaN
        parseFloat('12.8s');   // 12.8
        parseFloat('s12.8');   // NaN
    </pre>

    <p>Есть ещё много полезных методов, например:</p>

    <ul class="marker">
        <li><code>toLowerCase</code> — приводит строку к нижнему регистру,</li>
        <li><code>toUpperCase</code> — приводит строку к верхнему регистру,</li>
        <li><code>trim</code> — удаляет пробельные символы с обеих сторон,</li>
        <li><code>startsWith</code> — начинается ли строка с подстроки,</li>
        <li><code>endsWith</code> — заканчивается ли строка подстрокой.</li>
    </ul>

    <br>
    <h2>Функции</h2>

    <p>Если функция принимает в виде аргументов другие функции или возвращает их, то её называют функцией высшего порядка.</p>

    <p><b>Объявление функций (Function Declaration)</b></p>

    <pre class="brush: js;">
        function greet(name) {
            return `Hello ${name}`;
        }

        greet('Sergey'); // Hello Sergey

        //////////////

        greet('Sergey'); // Hello Sergey

        function greet(name) {
            return `Hello ${name}`;
        }
    </pre>

    <p>Обычное объявление. Такую функцию можно вызвать до объявления — благодаря эффекту всплытия (Hoisting).</p>

    <p><a target="_blank" href="https://habr.com/ru/post/78991/">Простой пример</a>, почему стоит повторить всплытие и порядок инициализации::</p>

    <pre class="brush: js;">
        function foo() {
            a = 2;
            b = 3;
            return a+b;
        }

        alert(a); // undefined
        a = 'очень важное значение';
        alert(a); // очень важное значение
        foo();
        alert(a); // 2
    </pre>

    <br>

    <p><b>Функциональные выражения (Function Expression)</b></p>

    <pre class="brush: js;">
        const greet = function (name) {
            return `Hello ${name}`;
        };

        greet('Sergey'); // Hello Sergey
    </pre>

    <p>Функция будет присвоена переменной и описана без имени. Такую функцию нельзя вызвать до объявления.</p>

    <p><b>Именованные функциональные выражения (Named Function Expression)</b></p>

    <pre class="brush: js;">
        const count = function step(number) {
            if (number > 0) {
                step(number - 1);
            }
        };

        count(5);
    </pre>

    <p>Имя функции доступно только изнутри, имя переменной доступно везде.</p>

    <p><b>Стрелочные функции (Arrow function)</b></p>

    <pre class="brush: js;">
        const greet = (name) => {
            return `Hello ${name}`;
        };

        const greet = (name) => `Hello ${name}`;

        const greet = name => `Hello ${name}`;
    </pre>

    <p>Функции умеют принимать как заданное число аргументов, так и неопределённое.</p>

    <pre class="brush: js;">
        function sumNumbers() {
            let sum = 0;

            for (let i = 0; i < arguments.length; i++) {
                sum += arguments[i];
            }

            return sum;
        }

        sumNumbers(1, 2, 3); // 6

        //////////////////////////////////

        function sumNumbers() {
            const args = Array.from(arguments); // Это старый способ получения аргументов

            let sum = 0;

            args.forEach(function (num) {
                sum += num;
            });

            return sum;
        }

        sumNumbers(1, 2, 3); // 6

        //////////////////////////////////

        function sumNumbers(...args) { // Это способ из ES6+
            return args.reduce((sum, num) => {
                return sum + num;
            }, 0);
        }

        sumNumbers(1, 2, 3); // 6
    </pre>

    <p>Преобразования можно выделять в целые цепочки вызовов. Например, мы хотим сделать список из сообщений:</p>

    <pre class="brush: js;">
         let result = messages
        .filter(filterMessagesByTag)
        .map(getHTML)
        .join('\n');

        // Выбираем только пользователей с тегами "javascript"
        function filterMessagesByTag(message) {
            const {tags} = message;

            return Array.isArray(tags) && tags.includes('javascript');
        }

        // Превращаем массив объектов твитов в HTML-строки
        function getHTML(message) {
            return `<li>
                        <div>${message.user.name}</div>
                        <div>${message.text}</div>
                        <div>${message.tags.join(',')}</div>
                    </li>`;
        }

        // Теперь в result лежит HTML c деревом сообщений
        result = `<ul>${result}</ul>`;
    </pre>

    <p><b>Каррирование</b></p>

    <pre class="brush: js;">
        function getRaiser(pow) {
            return function (num) {
                return num ** pow;
            }
        }

        const squared = getRaiser(2);
        squared(2); // 4
        squared(3); // 9

        const cube = getRaiser(3);
        cube(2); // 8
        cube(3); // 27

        // Или вот так

        getRaiser(2)(3); // 9
        getRaiser(3)(2); // 8
    </pre>

    <br>
    <h2>Массивы</h2>

    <p>В JavaScript можно объявить массив несколькими способами:</p>

    <pre class="brush: js;">
        const arr = new Array();
        const arr = []; // чаще всего используется такой вариант — он проще и красивее.
    </pre>

    <p><b>Изменение массивов</b></p>

    <p>В JS есть специальные методы, которые изменяют массив:</p>

    <ul class="marker">
        <li><code>push</code> — добавляет элемент в конец массива и возвращает новую длину массива,</li>
        <li><code>pop</code> — удаляет последний элемент массива и возвращает его значение,</li>
        <li><code>shift</code> — удаляет элемент из начала и сдвигает в начало остальную часть массива (второй элемент станет первым, третий — вторым и так далее),</li>
        <li><code>unshift</code> — добавляет элемент в начало массива и возвращает новую длину массива.</li>
    </ul>

    <br>
    <p><b>Метод</b> <code>forEach</code></p>

    <pre class="brush: js;">
        const arr = [1, 2, 3];

        arr.forEach((item, i, arr) => {
            console.log(i, item, arr);
        });
    </pre>

    <br>
    <p><b>Метод</b> <code>filter</code></p>
    <p>Возвращает новый массив из элементов, которые прошли проверку. При этом исходный массив остаётся прежним:</p>

    <pre class="brush: js;">
        const arr = [1, 2, 3];

        const comparator = number => number < 2;

        const result = arr.filter(comparator); // [1]
    </pre>

    <br>
    <p><b>Методы</b> <code>every</code> и <code>some</code></p>

    <p>Эти методы полезны, если нужно проверить, что все элементы массива удовлетворяют определённым критериям:</p>

    <ul class="marker">
        <li>метод <code>every</code> вернёт <code>true</code>, если вызов колбека вернёт <code>true</code> для каждого элемента массива;</li>
        <li>метод <code>some</code> вернёт <code>true</code>, если вызов колбека вернёт <code>true</code> хотя бы для одного элемента массива.</li>
    </ul>

    <pre class="brush: js;">
        const arr = [1, 2, 3];

        const checker = number => number < 2;

        arr.some(checker); // true
        arr.every(checker); // false
    </pre>

    <br>
    <p><b>Метод</b> <code>map</code></p>

    <pre class="brush: js;">
        const statuses = ['approved', 'rejected', 'waiting'];

        statuses.map((status, index) => ({value: index, title: status})); // [{value: 0, title: 'approved'}, ...]
    </pre>

    <p>Как и метод <code>forEach</code>, метод <code>map</code> принимает в качестве аргумента функцию. Она возвращает значение, которое станет элементом нового массива.</p>

    <br>
    <p><b>Методы</b> <code>reduce</code> и <code>reduceRight</code></p>

    <p>Они сводят массив к какому-то одному значению: числу, массиву, объекту. Работают одинаково, только <code>reduce</code> перебирает элементы массива слева направо, а <code>reduceRight</code> — справа налево.</p>
    <p>Эти методы упрощают работу с массивом. Вот что получится, если добавить обработанные элементы в новый массив методом <code>forEach</code>:</p>

    <pre class="brush: js;">
        const arr = [1, 2, 3, 4, 5];
        let result = 0;

        arr.forEach(item => {
            result += (item * item + 100); // Занимаемся какой-то логикой, нужно посчитать формулу и сумму всех элементов массива
        });
        console.log(result) // здесь какой-то результат
    </pre>

    <p>Код громоздкий, хотя сам по себе простой. В сложных случаях такое решение будет невозможно понять.</p>
    <p>На помощь приходит reduce или <code>reduceRight</code>. Пример с <code>reduce</code>:</p>

    <pre class="brush: js;">
        const arr = [1, 2, 3, 4, 5];
        arr.reduce((result, item) => result + (item * item + 100), 0);
    </pre>

    <br>
    <h2>Объекты</h2>

    <ul class="marker">
        <li><code>Object.keys</code> возвращает массив с ключами,</li>
        <li><code>values</code> возвращает значения свойств массива,</li>
        <li><code>entries</code> возвращает и ключи, и значения.</li>
    </ul>

    <p>Можно проверить наличие свойства у объекта:</p>

    <pre class="brush: js;">
        const message = { text:"text" };

        message.hasOwnProperty('text'); // true
        message.hasOwnProperty('nonExistentProperty'); // false

        'text' in message; // true
        'nonExistentProperty' in message; // false

        message.nonExistentProperty; // undefined
    </pre>

    <p>Важное отличие метода <code>hasOwnProperty</code> от оператора <code>in</code> заключается в том, что первый не проверяет существование в цепочке прототипов объекта.</p>

    <pre class="brush: js;">
        const chat = { title: '', users: 42 };

        'title' in chat; // true
        'messages' in chat; // false, так как этого свойства нет

        'constructor' in chat; // правильно, будет: true
    </pre>

    <p>Оператор <code>in</code> не умеет различать свойства самого объекта и унаследованные от прототипа.</p>
    <p>Вот ещё отличие и сравнение с <code>hasOwnProperty</code>:</p>

    <pre class="brush: js;">
        function Message() {}

        Message.prototype.send = function(user, text) {
            this.isSent = true;
            this[user] = text;
        };

        const message = new Message();

        message.send('Olga', 'You are the best!');

        // В консоли увидим следующее:

        'Olga' in message; // true
        'Not found' in message; // false
        'send' in message; // true
    </pre>

    <p>Можно увидеть, что <code>send</code> также отображается оператором <code>in</code>. А <code>hasOwnProperty</code>, в свою очередь, проверит, является ли свойство унаследованным от прототипа или нет:</p>

    <pre class="brush: js;">
        function Message() {}

        Message.prototype.send = function(user, text) {
            this.isSent = true;
            this[user] = text;
        };

        const message = new Message();

        message.send('Olga', 'You are the best!');

        // В консоли увидим следующее:
        message.hasOwnProperty('Olga'); // true
        message.hasOwnProperty('Not found'); // false
        message.hasOwnProperty('send'); // false
    </pre>

    <p>Теперь увидим ожидаемое поведение — send не включается. Потому нужно быть осторожными, делая перебор через <code>for..in</code>. Нужно знать основные отличия <code>for..in</code> от <code>for..of</code>. И внутри <code>for..in</code> проверять — является ли свойство унаследованным от прототипа или нет, иначе можно получить багу из-за незнания, как работает инструмент:</p>

    <pre class="brush: js;">
        for (let key in obj) {
            if (obj.hasOwnProperty(key)) { /* logic */ }
        }
    </pre>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Инверсия в объекте</b></p>

    <p>Напишите функцию, которая принимает объект и возвращает такой объект, что:</p>
    <ul class="marker">
        <li>его ключи — значения исходного объекта,</li>
        <li>его значения — ключи исходного объекта.</li>
    </ul>
    <p>Поля исходного объекта — строки или числа.</p>

    <p>Моё решение</p>
    <pre class="brush: js;">
        const obj = {
            a: 1,
            b: 2,
        };

        function invert(obj) {
            const inverse = {};
            Object.keys(obj).map((key,i)=>{
                inverse[obj[key]] = key;
            })
            return inverse
        }

        invert(obj);    //{1: "a", 2: "b"}
    </pre>

    <br>
    <p>Самым коротким может быть такое решение:</p>

    <pre class="brush: js;">
        function invert1(obj) {
            return  Object
                .entries(obj)
                .reduce((acc, [key, item]) => ({ ...acc, [item]: key }), {});
        }

        invert1(obj);    //{1: "a", 2: "b"}
    </pre>

    <p>Но оно не будет оптимальным, потому что на каждом шаге мы пересоздаём результирующий объект. Правильным решением будет:</p>

    <pre class="brush: js;">
        function invert2(obj) {
            return Object
                .entries(obj)
                .reduce((acc, [key, item]) => {
                    acc[item] = key;
                    return acc;
                }, {}) ;
        }
        invert2(obj);    //{1: "a", 2: "b"}
    </pre>

    <br>
    <p><b>Задача 2 - Счётчик вызовов</b></p>

    <p>Напишите функцию canGetCount. Она принимает число N и возвращает функцию, которая:</p>
    <p>первые N вызовов возвращает строку “yes”,</p>
    <p>каждый следующий вызов возвращает строку “no”.</p>

    <pre class="brush: js;">
        function canGetCount(pow) {
            let col = 0;
            return function () {
                col++;
                if(col <= pow){
                    return "yes";
                }else{
                    return "no";
                }
            }
        }

        const getOne = canGetCount(2);

        getOne()  // yes
        getOne()  // yes
        getOne()  // no
    </pre>

    <br>
    <p><b>Задача 3 - Замыкание</b></p>

    <p>Функция выводит '42 is undefined' вместо '42 is string'. Исправьте её</p>

    <pre class="brush: js;">
        const object = {
            value: '42',
            print () {
                type = () => {
                    return typeof this.value;
                }

                console.log(`${this.value} is ${type()}`);
            }
        }

        object.print();
    </pre>

    <br>
    <p><b>Задача 4 - Zip</b></p>

    <p>Напишите функцию zip. Она принимает любое число объектов, а возвращает единственный объект, который содержит все поля исходных объектов. Если один и тот же ключ встречается в нескольких объектах, следует оставить то значение, что встретилось первым.</p>

    <pre class="brush: js;">
        const objects = [
            { foo: 5, bar: 6 },
            { foo: 13, baz: -1 } // foo - повторяющийся ключ
        ];

        function zip(...args) {

            const mass = {};

            args.map(arr=>{
                Object.keys(arr).map(key => {
                    if(!(key in mass)){
                        mass[key] = arr[key];
                    }
                });
            })

            return mass;
        }

        zip(...objects); // { foo: 5, bar: 6, baz: -1 }
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
