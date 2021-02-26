<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>TypeScript</h2>

    <p>Установим TypeScript:</p>

    <pre class="brush: js;">
        // Установка компилятора
        npm install --save-dev typescript

        // Компиляция файла
        tsc helloworld.ts

        // Утилита позволяет компилировать и сразу запускать .ts файлы
        npm install --save-dev ts-node
        ts-node script.ts
    </pre>

    <p>Для комфортной работы с компилятором можно описать все необходимые настройки с помощью файла конфигурации <code>tsconfig.json</code>:</p>

    <pre class="brush: js;">
        {
            "compilerOptions": {
                "outDir": "dist",
                "target": "es2016",
                "declaration": false,
                "module": "commonjs",
                "strictNullChecks": true,
                "sourceMap": true,
                ...
             }
        }
    </pre>

    <br>
    <h2>Типы данных, вывод и приведение</h2>

    <p>С примитивными типами можно работать так:</p>

    <pre class="brush: js;">
        const isDone: boolean = false;
        const decimal: number = 6 + 0xf00d + 0b1010;
        const sentence: string = 'Hello, my name is Alice.';
        const u: undefined = undefined;
        const n: null = null;
        const valid: boolean = true;
        const count: number = 42;
        const man: string = 'Jon Snow';

        console.log(man * 2);
        // Error: The left-hand side of an arithmetic
        // operation must be of type 'any', 'number' or an enum type
    </pre>

    <br>
    <p>Компилятор умеет делать <b>вывод типов</b> — самостоятельно вычислять тип значения у выражения:</p>

    <pre class="brush: js;">
        const valid = true; // Автоматически выведется тип boolean
        const count = 42; // Автоматически выведется тип number
        const man = 'Jon Snow';

        console.log(man * 2);
        // Error: The left-hand side of an arithmetic
        // operation must be of type 'any', 'number' or an enum type
    </pre>

    <p><b>Типы данных в TypeScript</b></p>

    <pre class="brush: js;">
        const list1: number[] = [1, 2, 3];
        const list2: Array<number> = [1, 2, 3];
    </pre>

    <p>Обе записи допустимы, но number[] встречается чаще. Документация не советует использовать последнюю запись, но и не запрещает.</p>

    <p>TypeScript предоставляет работу с tuple:</p>

    <pre class="brush: js;">
        // Объявление кортежа
        let point: [number, number];

        // Некорректная инициализация
        // Type 'string' is not assignable to type 'number'.
        point = [10, 'hello'];

        // Инициализация
        point = [20, 10]; // OK
    </pre>

    <br>

    <p>TypeScript предоставляет возможность работать с перечислениями (<code>Enum</code>):</p>

    <pre class="brush: js;">
        enum Color {
            Red = 1,
            Green,
            Blue,
        }

        let colorName: string = Color[2];
        console.log(colorName); // 'Green'

        const enum Modes {
            Show = 'show',
            Edit = 'edit',
        }

        let modeName: string = Modes.Show;
        console.log(modeName) // 'show'

        Object.keys(Color); // Ok
        Object.keys(Modes); // Error
    </pre>

    <br>
    <p>Вместо <code>any</code> по умолчанию старайтесь использовать тип <code>unknown</code>, потому что язык будет ругаться на него, если «почувствует» что-то некорректное. Например, непонятно — есть ли у переменной свойство <code>length</code> или нет:</p>

    <pre class="brush: js;">
        let value: any;

        value.foo.bar; // OK
        value.trim(); // OK
        value(); // OK
        new value(); // OK
        value[0][1]; // OK


        let value: unknown;

        value.foo.bar; // Error
        value.trim(); // Error
        value(); // Error
        new value(); // Error
        value[0][1]; // Error
    </pre>

    <br>
    <p>Применять тип <code>unknown</code> можно следующим образом:</p>

    <pre class="brush: js;">
        function isNumberArray(value: unknown): value is number[] {
                return (
                        Array.isArray(value) &&
                        value.every(element => typeof element === "number")
                );
        }
    </pre>

    <br>
    <p>Типы <code>void</code> и <code>never</code> отличаются следующим:</p>

    <ul class="marker">
        <li><code>void</code> говорит, что функция не возвращает никакого значения,</li>
        <li><code>never</code> говорит, что функция в каком-то случае может никогда не закончиться и никогда не вернуть результат. Например, <code>while (true)</code>:</li>
    </ul>

    <pre class="brush: js;">
        function warnUser(): void {
            console.log("This is my warning message");
        }

        function error(message: string): never {
            throw new Error(message);
        }

        function infiniteLoop(): never {
            while (true) {}
        }
    </pre>

    <br>
    <p><b>Приведение типов</b></p>

    <p>Типы можно «кастить», или приводить к другим типам:</p>

    <pre class="brush: js;">
        const someValue: any = 'this is a string';

        const strLength1: number = (<string>someValue).length;
        const strLength2: number = (someValue as string).length;
    </pre>

    <p>Язык позволяет использовать ключевое слово const, введённое в ES6.</p>

    <pre class="brush: js;">
        const arr = [1, 2];
        arr.push(3); // Ok
        const constArr = [1, 2] as const;
        constArr.push(3); // Error
    </pre>

    <br>
    <p>Описание функций становится более читабельным. Опишем снова функцию <code>sum</code>, на которую теперь не надо писать проверки типов аргументов:</p>

    <pre class="brush: js;">
        function sum(x: number, y?: number): number {
            if (y) {
                return x + y;
            } else {
                return x;
            }
        }

        console.log(sum(10, 8));  // 18
        console.log(sum(42));     // OK! - 42

        /////////////////////

        function sum(x: number, y: number = 42): number {
            return x + y;
        }

        console.log(sum(10, 8));  // 18
        console.log(sum(42));     // OK! - 84
    </pre>

    <br>
    <p>У функции можно описать неопределённое число аргументов:</p>

    <pre class="brush: js;">
        function sum(...numbers: number[]): number {
            return numbers.reduce((sum: number, current: number): number => {
                sum += current; return sum;
            }, 0);
        }

        console.log(sum(1, 2, 3, 4, 5));     // 15
        console.log(sum(42, 0, -10, 5, 5));  // 42
    </pre>

    <br>
    <p>TypeScript позволяет корректно реализовать перегрузку функций и методов:</p>

    <pre class="brush: js;">
        function square(num: number): number;
        function square(num: string): number;
        function square(num: any): number {
            if (typeof num === 'string') {
                return parseInt(num, 10) * parseInt(num, 10);
            } else {
                return num * num;
            }
        }
    </pre>

    <p>Но можно написать и проще, используя алиасы (или — синонимы) для типов:</p>

    <pre class="brush: js;">
        function square(num: string | number): number {
            if (typeof num === 'string') {
                return parseInt(num, 10) * parseInt(num, 10);
            } else {
                return num * num;
            }
        }
    </pre>

    <p>Полезные утилиты типов:</p>

    <ul class="marker">
        <li><a target="_blank" href="https://www.typescriptlang.org/docs/handbook/advanced-types.html">advanced types</a>,</li>
        <li><a target="_blank" href="https://www.typescriptlang.org/docs/handbook/utility-types.html">utility types</a>.</li>
    </ul>

    <br>
    <h2>ООП</h2>

    <p><b>Интерфейсы</b></p>

    <pre class="brush: js;">
        interface User {
            login: string;
        }

        function printLogin(user: User): void {
            console.log(user.login);
        }

        const user = {
            login: 'Ellie',
        };

        printLogin(user);
    </pre>

    <br>
    <p><b>Классы</b></p>

    <pre class="brush: js;">
        interface MakesSound {
            makeSound(): void;
        }

        class Python implements MakesSound {
            private readonly _length: number;

            constructor(length: number) {
                this._length = length;
            }

            public get length(): number {
                return this._length / 100;
            }

            protected makeSound() {
                console.log('Ssssss!');
            }
        }
    </pre>

    <p>У методов и свойств классов появились модификаторы доступов:</p>

    <ul class="marker">
        <li><code>public</code> — доступны без ограничений, это значение по умолчанию;</li>
        <li><code>private</code> — доступны только внутри класса;</li>
        <li><code>protected</code> — доступны внутри класса и в классах-наследниках.</li>
    </ul>

    <br>
    <p><b>Абстрактные классы</b></p>

    <p>В TypeScript появились абстрактные классы. Нельзя создать экземпляр такого класса, однако его свойства и методы можно наследовать. Абстрактный класс нужен для описания или реализации обязательных методов.</p>

    <pre class="brush: js;">
        abstract class Snake {
            private readonly _length: number;

            public get length(): number {
                return this._length / 100;
            }

            constructor(length: number) {
                this._length = length;
            }

            protected abstract makeSound(): void;
        }

        class Python extends Snake {
            private static population = 10000;

            public static incrementPopulation(): void {
                Python.population++;
            }

            constructor(length: number) {
                super(length);
                Python.incrementPopulation();
            }

                // если не написать реализацию метода абстрактного класса,
                // компилятор выдаст ошибку.
            protected makeSound(): void {
                console.log('Ssssss!');
            }
        }
    </pre>

    <br>
    <p><b>Декораторы</b></p>

    <pre class="brush: js;">
        function memoize (target, key, descriptor) {
            const originalMethod = descriptor.value;
            const cache = {};
            descriptor.value = function (n: number): number {
                return cache[n] ? cache[n] : cache[n] = originalMethod(n);
            }
        }

        class Utils {
            @memoize
            static fibonacci (n: number): number {
                return n < 2 ? 1 : Utils.fibonacci(n - 1) + Utils.fibonacci(n - 2)
            }
        }

        console.time('count');
        console.log(Utils.fibonacci(50));
        console.timeEnd('count');     // оооочень долго

        console.log(Utils.fibonacci(1000));   // 7.0330367711422765e+208
        console.timeEnd('count');             // count: 5.668ms
    </pre>

    <p><b>Дополнительные материалы</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://www.typescriptlang.org/docs/handbook/classes.html">Документация по классам;</a> — главный источник</li>
        <li><a target="_blank" href="https://medium.com/@sergey.bakaev/классы-в-typescript-b6e2e0e86864">Классы в TypeScript</a> — введение в тему;</li>
        <li><a target="_blank" href="https://metanit.com/web/typescript/3.2.php">Подробнее про абстрактные классы.</a></li>
    </ul>

    <br>
    <h2>Типизация JS-кода</h2>

    <p>TypeScript Declaration Files (<code>*.d.ts</code>) — это файлы для описания интерфейсов.</p>

    <p>С помощью <code>.d.ts</code> можно описывать глобальные переменные окружения или инструменты, которые написали сами и хочется вынести в отдельную библиотеку или пакет.</p>

    <pre class="brush: js;">
        // Пример типизирования функции с помощью JSDoc + TypeScript
        /**
         * @param p0 {string} - Строковый аргумент, объявленный на манер TS
         * @param {string}  p1 - Строковый аргумент
         * @param {string=} p2 - Опциональный аргумент
         * @param {string} [p3] - Другой опциональный аргумент
         * @param {string} [p4="test"] - Аргумент со значением по умолчанию
         * @return {string} Возвращает строку
         */
        function fn3(p0, p1, p2, p3, p4){
          // TODO
        }
    </pre>

    <br>
    <h2>Полезные ссылки</h2>

    <ul class="marker">
        <li><a target="_blank" href="https://www.typescriptlang.org/play/">TS playground</a>;</li>
        <li><a target="_blank" href="https://www.typescriptlang.org/docs/handbook/basic-types.html">Документация</a>;</li>
        <li><a target="_blank" href="https://basarat.gitbook.io/typescript/">Ещё одна документация</a>;</li>
        <li><a target="_blank" href="https://www.youtube.com/watch?v=tybjhHPj3io">Про типизацию</a>;</li>
        <li><a target="_blank" href="https://www.youtube.com/watch?v=srqqwuqzYMM">Эволюция TypeScript</a>.</li>
    </ul>

    <p><b>Отличная серия докладов Ильи Климова про типизацию:</b></p>

    <ul class="marker">
        <li><a target="_blank" href="https://www.youtube.com/watch?time_continue=168&v=o9zh5EHrpQA&feature=emb_logo">Надёжный JavaScript</a>;</li>
        <li><a target="_blank" href="https://www.youtube.com/watch?v=etKOc80-cw0">Строгий JavaScript</a>;</li>
    </ul>




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
