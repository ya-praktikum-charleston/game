<?php include '../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#Part1">#1 Базовые типы (Basic Types. Part I)</a></li>
        <li><a class="list-sub__link" href="#Part2">#2 Базовые типы (Basic Types. Part II)</a></li>
        <li><a class="list-sub__link" href="#Part3">#3 Перечисления (Enums)</a></li>
        <li><a class="list-sub__link" href="#Part4">#4 Функции (Functions)</a></li>
        <li><a class="list-sub__link" href="#Part5">#5 Объекты (Objects)</a></li>
        <li><a class="list-sub__link" href="#Part6">#6 Классы (Classes)</a></li>
        <li><a class="list-sub__link" href="#Part7">#7 Наследование (Inheritance)</a></li>
        <li><a class="list-sub__link" href="#Part8">#8 Пространства имён и модули (Namespaces & Modules)</a></li>
        <li><a class="list-sub__link" href="#Part9">#9 Интерфейсы (Type Interface)</a></li>
        <li><a class="list-sub__link" href="#Part10">#10 Общие типы (Generic)</a></li>
        <li><a class="list-sub__link" href="#Part11">#11 Декораторы (Decorators)</a></li>
        <li><a class="list-sub__link" href="#Part12">#12 Утилиты (Utility Types)</a></li>
    </ul>
</div>


<div class="linear">
    <p><b>Полезные ссылки:</b></p>

    <p>✔ TypeScript (документация): <a target="_blank" href="https://www.typescriptlang.org/">https://www.typescriptlang.org/</a></p>
    <p>✔ Sandbox (песочница): <a target="_blank" href="https://www.typescriptlang.org/play?#code/PTAEHUFMBsGMHsC2lQBd5oBYoCoE8AHSAZVgCcBLA1UABWgEM8BzM+AVwDsATAGiwoBnUENANQAd0gAjQRVSQAUCEmYKsTKGYUAbpGF4OY0BoadYKdJMoL+gzAzIoz3UNEiPOofEVKVqAHSKymAAmkYI7NCuqGqcANag8ABmIjQUXrFOKBJMggBcISGgoAC0oACCoASMFmgY7p7ehCTkVOle4jUMdRLYTqCc8LEZzCZmoNJODPHFZZXVtZYYkAAeRJTInDQS8po+rf40gnjbDKv8LqD2jpbYoACqAEoAMsK7sUmxkGSCc+VVQQuaTwVb1UBrDYULY7PagbgUZLJH6QbYmJAECjuMigZEMVDsJzCFLNXxtajBBCcQQ0MwAUVWDEQNUgADVHBQGNJ3KAALygABEAAkYNAMOB4GRogLFFTBPB3AExcwABT0xnM9zsyhc9wASmCKhwDQ8ZC8iElzhB7Bo3zcZmY7AYzEg-Fg0HUiS58D0Ii8AoZTJZggFSRxAvADlQAHJhAA5SASAVBFQAeW+ZF2gldWkgx1QjgUrmkeFATgtOlGWH0KAQiBhwiudokkuiIgMHBx3RYbC43CCJSAA">https://www.typescriptlang.org/play/i...​</a></p>
    <p>✔ Typescript Utils (утилиты): <a target="_blank" href="https://www.typescriptlang.org/docs/handbook/utility-types.html">https://www.typescriptlang.org/docs/h...</a></p>
</div>


<div class="linear" id="Part1">

    <h2>TypeScript #1 Базовые типы (Basic Types. Part I)</h2>

    <pre class="brush: js;">
        // Типы данных в JavaScript
        - number
        - string
        - boolean
        - null
        - undefined
        - object
        - Symbol    // ES6

        // Изменение типа переменной
        var num = 42;		// number
        num = 'hello';		// string
        num = false;		// boolean

        // Определение типов с помощью оператора typeof
        typeof 42;          // "number"
        typeof 'str';       // "string"
        typeof true;        // "boolean"
        typeof [];          // "object"
        typeof {};          // "object"
        typeof null;        // "object"
        typeof undefined;   // "undefined"
        typeof Symbol();    // "symbol"

        // const
        const num = 42;
        num = 'hello';	// Uncaught TypeError: Присвоение постоянной переменной

        // let
        let num = 42;
        num = 'hello';	// No errors

        // Задание типа
        // Boolean Type
        let isCompleted: boolean = false;

        // Если попробуем изменить тип то получим ошибку
        isCompleted = 42;     // Type '42' is not assignable to type 'boolean'
        isCompleted = '42';   // Type ’"42"' is not assignable to type 'boolean'

        isCompleted = true;

        // Number Type
        const decimal: number = 6;
        const integer: number = 7.10;
        const hex: number = 0xf00d;
        const binary: number = 0b1010;
        const octal: number = 0o744;

        // String Type for simple string
        const name: string = 'Yauhen';

        // String Type for template string
        const sentence: string = `Hello, my name is ${ name }!`;

        // Null & Undefined Types
        // JavaScript:
        typeof null;		// "object"
        typeof undefined;	// "undefined"

        // TypeScript types:
        const u: undefined = undefined;
        const n: null = null;                   // в TS null это null, а в JS это object

        // Void Type предназначен для определения отсутствующих типов
        // For function result:
        const greetUser = (): void => {             // функция ни чего не возвращает, по этому указывается void, указывается после () скобок
            alert("Hello, nice to see you!");
        };

        // For 'greetUser'
        // Error: Type '() => void' is not assignable to type 'void'        // void' не может быть присвоен типу 'void' не там поставили void
        const greetUser: void = () => {
            alert("Hello, nice to see you!");
        };
    </pre>

</div>

<div class="linear" id="Part2">

    <h2>TypeScript #2 Базовые типы (Basic Types. Part II)</h2>

    <pre class="brush: js;">
        // Array Type, существуют два способа определения массива
        let list: number[] = [1, 2, 3];     // мы говорим что тип данных это числа и эти числа будут находится в массиве

        let list: Array&lt;number&gt; = [1, 2, 3];	// Generic type

        // Tuple Type если в массиве разный тип данных
        // Multiple lines
        let x: [string, number];
        x = ["hello", 10];

        // One line
        let y: [string, number] = ["goodbuy", 42];

        // Error case:
        x = [10, "hello"]; // Type 'string' is not assignable to type 'number'


        // Any Type
        // Any type for array
        let y: [any, any] = ["goodbuy", 42];
        let z: Array&lt;any&gt; = [10, "hello"];

        // Any type for string
        let notSure: any = false;

        // Issue case (no error)
        notSure = true;		// boolean
        notSure = 42;		// number
        notSure = "hello";	// string


        // Enum Type  это способ задания понятных имён, набуру численных значений
        enum Directions {
            Up,
            Down,
            Left,
            Right
        }

        Directions.Up;      // 0    это индекс по умаолчанию
        Directions.Down;    // 1
        Directions.Left;    // 2
        Directions.Right;   // 3

        // Custom index for enum elements
        enum Directions {
            Up = 2,         // индекс можно переопределить
            Down = 4,
            Left = 6,
            Right
        }

        Directions.Up;      // 2
        Directions.Down;    // 4
        Directions.Left;    // 6
        Directions.Right;   // 7


        // Never Type
        // используется когда функция возвращает ошибку и не заканчивает своё выполнение
        // или когда фунция постоянно выполняется
        // этот тип говорит что от этих функций результата мы не получим
        // Function return Error
        const msg = "hello";
        const error = (msg: string): never => {     // функция возвращает ошибку
            throw new Error(msg);
        };

        // Function infinite loop
        const infiniteLoop = (): never => {         // функция находится в бесконечном цикле
            while (true) {
            }
        };


        // Object Type указывет что это объект или не примитив
        const create = (o: object | null): void => { };

        // если попробуем вызвать эту функцию не с object || null получим ошибку
        create(1);		// Argument of type '1' is not assignable to parameter of type 'object | null'
        create('42');	// Argument of type '"42"' is not assignable to parameter of type 'object | null'
        create({ obj: 1 });


        // Multiple types for one value
        let id: number | string;    // указываем возможные варианты типа переменной

        id = 10;	// number is valid
        id = '42';	// string is valid
        id = true;	// Type 'true' is not assignable to type 'string | number'


        // Type можем создавать пользовательские типы
        type Name = string;	// Custom type creation

        let id: Name;	// Apply custom type

        id = "42";	// No error, because type of "42" is a string
        id = 10;	// Type '10' is not assignable to type 'string'
    </pre>

</div>

<div class="linear" id="Part3">

    <h2>TypeScript #3 Перечисления (Enums)</h2>

    <pre class="brush: js;">
        // Simple example of enum type
        enum Directions {
            Up,
            Down,
            Left,
            Right
        }

        Directions.Up;      // 0
        Directions.Down;    // 1
        Directions.Left;    // 2
        Directions.Right;   // 3

        // Reverse enum
        enum Directions {
            Up,
            Down,
            Left,
            Right
        }

        // получить данные можем и по ключю
        Directions[0]	// "Up"
        Directions[1]	// "Down"
        Directions[2]	// "Left"
        Directions[3]	// "Right"

        // Compiled code
        "use strict";
        var Directions;
        (function (Directions) {
            Directions[Directions["Up"] = 0] = "Up";
            Directions[Directions["Down"] = 1] = "Down";
            Directions[Directions["Left"] = 2] = "Left";
            Directions[Directions["Right"] = 3] = "Right";
        })(Directions || (Directions = {}));

        // Custom index for enum elements
        enum Directions {
            Up = 2,
            Down = 4,
            Left = 6,
            Right = 8
        }

        Directions.Up;	// 2
        Directions.Down;	// 4
        Directions[6];	// Left
        Directions[8];	// Right

        // Custom name for keys
        enum links {
            youtube = 'https://youtube.com/',
            vk = 'https://vk.com/',
            facebook = 'https://facebook.com/'
        }

        // Using
        links.vk        // "https://vk.com/"
        links.youtube 	// "https://youtube.com/"

        // Compiled code
        "use strict";
        var links;
        (function (links) {
            links["youtube"] = "https://youtube.com/";
            links["vk"] = "https://vk.com/";
            links["facebook"] = "https://facebook.com/";
        })(links || (links = {}));

        // const enum (without using)
        const enum links {
            youtube = 'https://youtube.com/',
            vk = 'https://vk.com/',
            facebook = 'https://facebook.com/'
        }

        // Compiled code is empty
        "use strict";


        // const enum (with using)
        const enum links {
            youtube = 'https://youtube.com/',
            vk = 'https://vk.com/',
            facebook = 'https://facebook.com/'
        }

        // Using of enum properties
        const arr = [links.vk, links.facebook];

        // Compiled code
        "use strict";
        const arr = ["https://vk.com/" /* vk */, "https://facebook.com/" /* facebook */];
    </pre>

</div>

<div class="linear" id="Part4">

    <h2>TypeScript #4 Функции (Functions)</h2>

    <pre class="brush: js;">
        // Function example
        const createPassword = (name, age) => `${name}${age}`;

        createPassword('Jack', 31);	// "Jack31"

        // Arguments type
        const createPassword = (name: string, age: number) => `${name}${age}`;

        // Multiple argument types
        const createPassword = (name: string, age: number | string) => `${name}${age}`;

        createPassword('Jack', 31);		// 'Jack31'
        createPassword('Jack', '31');	// 'Jack31'

        // Default Arguments
        const createPassword = (name: string = 'Max', age: number | string = 20) => `${name}${age}`;

        createPassword();		// "Max20"
        createPassword(null);	// Argument of type 'null' is not assignable to parameter of type 'string | undefined'

        // Function with two required arguments
        const createPassword = (name: string, age: number): string => `${name}${age}`;

        // Call function with one argument
        createPassword('Jack');	// 'An argument for 'age' was not provided.'

        // Function with optional argument 'age'    знак ? это опциональный аргумент, может быть, может нет
        const createPassword = (name: string, age?: number) => `${name}${age}`;

        // REST
        const createSkills = (name, ...skills) => `${name}, my skils are ${skills.join()}`;

        // REST type
        const createSkills = (name: string, ...skills: Array<string>) => `${name}, my skils are ${skills.join()}`;

        // Call function with REST arguments
        createSkills('Jack', 'JS', 'ES6', 'React');	// "Jack, my skils are JS,ES6,React"


        // Returned type is string в нашем случае это строка
        const createPassword = (name: string, age: number | string): string => `${name}${age}`;

        // Returned type is number
        const sum = (first: number, second: number): number => first + second;

        // Returned type is object
        const createEmptyObject = (): object => ({});


        // Void
        const greetUser: void = () => {
            alert("Hello, nice to see you!");
        };

        // Never Type
        // Function return Error
        const msg = "hello";
        const error = (msg: string): never => {
            throw new Error(msg);
        };

        // Function infinite loop
        const infiniteLoop = (): never => {
            while (true) {
            }
        };

        // Function variable type тип функций
        let myFunc;

        function oldFunc(name: string):void {
            alert(`Hello ${name}, nice to see you!`);
        };

        myFunc = oldFunc;

        // Function type description для присвоения переменной функции используется синтаксис функции стрелки
        let myFunc: (firstArg: string) => void;


        // если заменим void на number получим ошибку
        // Describe function type with wrong return type
        let myFunc: (firstArg: string) => number;

        function oldFunc(name: string):void {
            alert(`Hello ${name}, nice to see you!`);
        };

        /*
          Error:
          Type '(name: string) => void' is not assignable to type '(firstArg: string) => number'.
          Type 'void' is not assignable to type 'number'
        */
        myFunc = oldFunc;
    </pre>

</div>

<div class="linear" id="Part5">

    <h2>TypeScript #5 Объекты (Objects)</h2>

    <pre class="brush: js;">
        // Simple object example
        let user = {
            name: 'Yauhen',
            age: 30,
        };

        // Object type using any
        let user: any = {
            name: 'Yauhen',
            age: 30,
        };

        user = 'test';	// Now type of user is string

        // Array Type
        let list: Array<number> = [1, 2, 3];

        // Define object type
        let user: { name: string, age: number } = {
            name: 'Yauhen',
            age: 30,
        };

        // Try to change property если попробуем переопределить какой нибудь тип то получис ошибку
        let user: { name: string, age: number } = {
            name: 'Yauhen',
            /*
              Error:
            The expected type comes from property 'age'
            which is declared here on type '{ name: string; age: number; }'
            */
            age: 'test',		// <--- Must be a number
        };

        // Try to change variable type
        user = 'test';  // Type '"test"' is not assignable to type '{ name: string; age: number; }'


        // Additional property если добавим значение без указания типа то тоже получим ошибку
        let user: { name: string, age: number } = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev', // Object literal may only specify known properties, and 'nickName' does not exist in type '{ name: string; age: number; }'
        };

        // Updating object type
        let user: { name: string, age: number, nickName: string } = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev',
        };


        // Base object structure
        let user: { name: string, age: number } = {
            name: 'Yauhen',
            age: 30,
        };

        // Dynamically try to add 'nickName' property
        user.nickName = 'webDev';  // Property 'nickName' does not exist on type '{name: string; age: number;}'


        // Updating object type
        let user: { name: string, age: number, nickName: string } = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev',	   // Now everything is correct
        };

        // New admin object
        let admin: { name: string, age: number, nickName: string } = {
            name: 'Max',
            age: 20,
            nickName: 'Mad',
        };

        // если есть два одинаковых массива
        // 2 object with the same types
        let user: { name: string, age: number, nickName: string } = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev',
        };

        let admin: { name: string, age: number, nickName: string } = {
            name: 'Max',
            age: 20,
            nickName: 'Mad',
        };

        // просто создадим алиас
        // Using Type for objects structure
        type Person = { name: string, age: number, nickName: string };

        // Apply Person type for objects with the same structure
        let user: Person = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev',
        };

        let admin: Person = {
            name: 'Max',
            age: 20,
            nickName: 'Mad',
        };

        // а что если два объекта похожи но немного отличаюся?
        // 2 object with almost the same structure
        let user: Person = {
            name: 'Yauhen',
            age: 30,
            nickName: 'webDev',			// <--- property
        };

        let admin: Person = {
            name: 'Max',
            age: 20,
            getPass(): string {			// <--- new method
                return `${this.name}${this.age}`;
            },
        };

        // Updating type with optional properties
        type Person = {
            name: string,
            age: number,
            nickName?: string,          // да вот так
            getPass?: () => string,
        };
    </pre>

</div>

<div class="linear" id="Part6">

    <h2>TypeScript #6 Классы (Classes)</h2>

    <pre class="brush: js;">
        // Simple class example
        class User {

        }

        // Class types
        class User {

            name: string;
            age: number;
            nickName: string;

        }

        // Class types, including constructor
        class User {

            name: string;
            age: number;
            nickName: string;

            constructor(name: string, age: number, nickName: string) {
                this.name = name;
                this.age = age;
                this.nickName = nickName;
            }

        }

        const yauhen = new User('Yauhen', 31, 'webDev');

        yauhen;	// { name: "Yauhen", age: 31, nickName: "webDev" }

        // четыре модификатора доступа
        // Class types modificators
        class User {

            public name: string;            // значение по умолчанию плюс свободный доступ
            private nickName: string;       // не может быть доступен за пределами класса
            protected age: number;          // доступ к элементу могут получить только наследники
            readonly pass: number;          // доступен только для чтения

            constructor(name: string, age: number, nickName: string, pass: number) {
                this.name = name;
                this.age = age;
                this.nickName = nickName;
                this.pass = pass;
            }

        }

        const yauhen = new User('Yauhen', 31, 'webDev', 123);

        yauhen.name;	    // "Yauhen"
        yauhen.nickName;    // Prop 'nickName' is private and only accessible within class 'User'
        yauhen.age;		    // Prop 'age' is protected and only accessible within class 'User' and its subclasses
        yauhen.pass = 42;   // Cannot assign to 'pass' because it is a read-only property


        // дефолтные значения для элементов
        // Class default properties
        class User {

            name: string;
            age: number = 20;
            nickName: string = 'webDev';

            constructor(name: string) {
                this.name = name;
            }

        }

        const user = new User('Yauhen');

        user;   // { name: "Yauhen", age: 20, nickName: "webDev" }


        // проверка дефолтного присваивания
        // Class default properties (example)
        class User {

            name: string;
            age: number = 20;
            nickName: string = 'webDev';

            constructor(name: string) {
                this.name = name;
            }

            getPass(): string {
                return `${this.nickName}${this.age}`;
            }

        }

        const user = new User('Yauhen');

        user.getPass(); // "webDev20"


        // сокращение кода в классе
        // Minimization of Class properties
        class User {
            /*
            // сокращенная форма записи,  что бы не писать сначала описание а потом в конструкторе тоже самое
            public name: string;
            constructor(name: string, age: number, nickName: string, pass: number) {
                this.name = name;
            }
            */
            constructor(
                public name: string,
                public age: number,
                public nickName: string,
                public pass: number
            ) {}

        }


        // Try to change private property
        class User {

            private age: number = 20;

            constructor(public name: string) {}
        }

        const yauhen = new User('Yauhen');

        yauhen.age = 30;	// Property 'age' is private and only accessible within class 'User'

        // Get access to private property
        class User {

            private age: number = 20;

            constructor(public name: string) {}

            setAge(age: number) {
                this.age = age;
            }

            set myAge(age: number) {
                this.age = age;
            }
        }

        const yauhen = new User('Yauhen');

        yauhen.setAge(30);	// 30
        yauhen.myAge = 31;	// 31
    </pre>

</div>

<div class="linear" id="Part7">

    <h2>TypeScript #7 Наследование (Inheritance)</h2>

    <pre class="brush: js;">
        // Simple Class example
        class User {

            constructor(public name: string, public age: number) {}

        }

        const yauhen = new User('Yauhen', 31);

        yauhen;  // { name: 'Yauhen', age: 31 }


        // Class with static property
        class User {

            static secret = 12345;  // static property

            constructor(public name: string, public age: number) {}

        }

        // Example of call static property
        User.secret

        // Call static property in class method
        class User {

            static secret = 12345;

            constructor(public name: string, public age: number) {}

            getPass(): string {
                return `${this.name}${User.secret}`;
            }

        }

        const yauhen = new User('Yauhen', 30);

        yauhen.getPass();	// "Yauhen12345"

        // Compiled code
        "use strict";
        class User {
            constructor(name, age) {
                this.name = name;
                this.age = age;
            }
            getPass() {
                return this.name + User.secret;
            }
        }
        User.secret = 12345;

        // Class example
        class User {

            private nickName: string = 'webDev';
            static secret = 12345;

            constructor(public name: string, public age: number) {}

            getPass(): string {
                return `${this.name}${User.secret}`;
            }

        }

        // Inheritance example
        class Yauhen extends User {

            name: string = 'Yauhen';

        }

        // Create instances based on 'User' and 'Yauhen' classes
        const max = new User('Max', 20);
        const yauhen = new Yauhen(31);	// Expected 2 arguments, but got 1

        // Realization of constructor in the inherited class
        class Yauhen extends User {

            name: string = 'Yauhen';

            constructor(age: number) {
                super(name, age);
            }

        }

        // No error
        // Create instances based on 'User' and 'Yauhen' classes
        const max = new User('Max', 20);
        const yauhen = new Yauhen(31);

        // Personal method in inherited class
        class Yauhen extends User {

            name: string = 'Yauhen';

            constructor(age: number) {
                super(name, age);
            }

            getPass(): string {
                return `${this.age}${this.name}${User.secret}`;
            }

        }

        const yauhen = new Yauhen(31);

        yauhen.getPass(); // "31Yauhen12345"

        // Abstract class example
        abstract class User {

            constructor(public name: string, public age: number) {}

            greet(): void {
                console.log(this.name);
            }

            abstract getPass(): string;   // Abstract method

        }

        const max = new User('Max', 20);  // Cannot create an instance of an abstract class

        // Create class using Abstraction
        class Yauhen extends User { // Non-abstract class 'Yauhen' does not implement inherited abstract member 'getPass' from class 'User'

            name: string = 'Yauhen';

            constructor(age: number) {
                super(name, age);
            }

        }

        // Realization of 'getPass' method
        class Yauhen extends User {

            name: string = 'Yauhen';

            constructor(age: number) {
                super(name, age);
            }

            getPass(): string {
                return `${this.age}${this.name}`;
            }

        }

        // Call prototype method
        yauhen.greet();		// "Yauhen"
        // Call personal method
        yauhen.getPass();	// "31Yauhen"
    </pre>

</div>

<div class="linear" id="Part8">

    <h2>TypeScript #8 Пространства имён и модули (Namespaces & Modules)</h2>

    <pre class="brush: js;">
        // Just example of functionality
        const SECRET: string = '123321';
        const PI: number = 3.14;

        const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

        const isEmpty = &lt;T&gt;(data: T): boolean =&gt; !data;

        // ES5 Module
        (function () {

            const SECRET: string = '123321';
            const PI: number = 3.14;

            const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

            const isEmpty = &lt;T&gt;(data: T): boolean =&gt; !data;

        }());

        // Define namespace
        namespace Utils {

            const SECRET: string = '123321';
            const PI: number = 3.14;

            const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

            const isEmpty = &lt;T&gt;(data: T): boolean =&gt; !data;

        };

        // Call namespace method
        namespace Utils {

            const SECRET: string = '123321';
            const PI: number = 3.14;

            const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

            const isEmpty = &lt;T&gt;(data: T): boolean =&gt; !data;

        };

        // Try to call method outside namespace
        const myPass = Utils.getPass('Yauhen', 31);	// Property 'getPass' does not exist on type 'typeof Utils'

        // Export data from Namespace
        namespace Utils {

            export const SECRET: string = '123321';
            const PI: number = 3.14;

            export const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

            export const isEmpty = &lt;T&gt;(data: T): boolean =&gt; !data;

        };

        // Calling exported from namespace methods
        const myPass = Utils.getPass('Yauhen', 31);		// &quot;Yauhen31&quot;
        const isSecret = Utils.isEmpty(Utils.SECRET);	// &quot;false&quot;

        // Constant with the same name outside namespace
        const PI = 3;									// No Errors

        // File &quot;Utils.ts&quot;
        // Export
        namespace Utils {

            export const SECRET: string = '123321';

            export const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

        };

        // File &quot;Customers.ts&quot;
        // Import
        /// &lt;reference path=&quot;Utils.ts&quot; /&gt;			// &lt;--- Import

        // Calling &quot;Utils&quot; namespace method
        const myPass = Utils.getPass('Yauhen', 31);	// &quot;Yauhen31&quot;

        // Import/Export (ES6 Modules)

        // File &quot;Utils.ts&quot;
        export const SECRET: string = '123321';

        export const getPass = (name: string, age: number): string =&gt; &#x60;${name}${age}&#x60;;

        // File &quot;Customers.ts&quot;
        import { getPass, SECRET } from &quot;./Utils&quot;;

        const myPass = getPass(SECRET, 31);	// &quot;Yauhen31&quot;
    </pre>

</div>

<div class="linear" id="Part9">

    <h2>TypeScript #9 Интерфейсы (Type Interface)</h2>

    <pre class="brush: js;">
        // Simple interface example
        interface User {
            name: string,
            age: number,
        }

        // Interface & Type
        interface User {
            name: string,
            age: number,
        }

        type User {
            name: string,
            age: number,
        }

        // Create object based on Interface
        interface User {
            name: string,
            age: number,
        }

        const yauhen: User = {
            name: 'Yauhen',
            age: 31,
        }

        // Interface optional property
        interface User {
            name: string,
            age?: number,	// <--- Optional
        }

        // Creation with a required property
        const yauhen: User = {
            name: 'Yauhen',
        }

        // Creation with missing a required property
        /*
          Error:
          Property 'name' is missing in type '{ age: number; }' but required in type 'User'
        */
        const max: User = {
            age: 20,
        }

        // Interface 'readonly' modifier
        interface User {
            readonly name: string,
            age: number,
        }

        const yauhen: User = {
            name: 'Yauhen',
            age: 31,
        }

        yauhen.age = 30;
        yauhen.name = 'Max'; // Cannot assign to 'name' because it is a read-only property

        // Compare interface type and object
        interface User {
            name: string,
            age: number,
        }

        const yauhen: User = {
            name: 'Yauhen',
            age: 31,
            /*
              Error:
              Object literal may only specify known properties, and 'nickName' does not exist in type 'User'
            */
            nickName: 'webDev',		// <--- Didn't described in interface "User"
        }

        // Interface extension
        interface User {
            name: string,
            age: number,
            [propName: string]: any;
        }

        const yauhen: User = {
            name: 'Yauhen',
            age: 31,
            nickName: 'webDev',
            justTest: 'test',
        }

        // Class Interface
        interface User {
            name: string,
            age: number,
            getPass(): string,
        }

        class Yauhen implements User {
            name: string = 'Yauhen';
            age: number = 31;
            nickName: string = 'webDev';

            getPass() {
                return `${this.name}${this.age}`;
            }
        }

        // Create Class based on multiple interfaces
        interface User {
            name: string,
            age: number,
        }

        // Separate interface with one method
        interface Pass {
            getPass(): string,
        }

        class Yauhen implements User, Pass {
            name: string = 'Yauhen';
            age: number = 31;

            getPass() {
                return `${this.name}${this.age}`;
            }
        }

        // Interface extends
        interface User {
            name: string,
            age: number,
        }

        // Interface extends
        interface Admin extends User {
            getPass(): string,
        }

        class Yauhen implements Admin {
            name: string = 'Yauhen';
            age: number = 31;

            getPass() {
                return `${this.name}${this.age}`;
            }
        }
    </pre>

</div>

<div class="linear" id="Part10">

    <h2>TypeScript #10 Общие типы (Generic)</h2>

    <pre class="brush: js;">
        // Example of using 'any'
        const getter = (data: any): any =&gt; data;

        getter(10);         // 10
        getter('test');     // &quot;test&quot;

        // Issue we have
        const getter = (data: any): any =&gt; data;

        getter(10).length;        // undefined
        getter('test').length;    // 4

        // Using of generic type
        const getter = &lt;T&gt;(data: T): T =&gt; data;

        function getter&lt;T&gt;(data: T): T {
            return data;
        }

        // Defining issue immediately
        const getter = &lt;T&gt;(data: T): T =&gt; data;

        getter(10).length;        // Property 'length' does not exist on type '10'
        getter('test').length;    // 4

        // Generic behavior explanation
        // For a number
        const getter = (data: number): number =&gt; data;
        getter(10).length;        // Property 'length' does not exist on type '10'

        // For a string
        const getter = (data: string): string =&gt; data;
        getter('test').length;    // 4

        // Function arguments type
        const getter = &lt;T&gt;(data: T): T =&gt; data;

        // Define type in function calling
        getter&lt;number&gt;(10).length;		  // Property 'length' does not exist on type '10'
        getter&lt;string&gt;('test').length;	// 4

        // Array generic type
        let list: Array&lt;number&gt; = [1, 2, 3];

        // Simple class example
        class User {

            constructor(public name: string, public age: number) {}

            public getPass(): string {
                return &#x60;${this.name}${this.age}&#x60;;
            }

        }

        // Generic class
        class User&lt;T&gt; {

            constructor(public name: T, public age: T) {}

            public getPass(): string {
                return &#x60;${this.name}${this.age}&#x60;;
            }

        }

        const yauhen = new User('Yauhen', '31');
        const max = new User(123, 321);

        yauhen.getPass();     // &quot;Yauhen31&quot;
        max.getPass();        // &quot;123321&quot;

        // Multiple generic types
        class User&lt;T, K&gt; {

            constructor(public name: T, public age: K) {}

            public getPass(): string {
                return &#x60;${this.name}${this.age}&#x60;;
            }

        }

        const yauhen = new User('Yauhen', '31');	// string, string
        const max = new User(123, 321);				// number, number
        const leo = new User('Leo', 22);			// string, number

        yauhen.getPass();     // &quot;Yauhen31&quot;
        max.getPass();        // &quot;123321&quot;
        leo.getPass();        // &quot;Leo22&quot;

        // New Class method 'getSecret'
        class User&lt;T, K&gt; {

            constructor(public name: T, public age: K) {}

            public getPass(): string {
                return &#x60;${this.name}${this.age}&#x60;;
            }

            public getSecret(): number {
                return this.age**2;
            }
        }

        // Specify generic type 'K' with key-word 'extends'
        class User&lt;T, K extends number&gt; {

            constructor(public name: T, public age: K) {}

            public getPass(): string {
                return &#x60;${this.name}${this.age}&#x60;;
            }

            public getSecret(): number {
                return this.age**2;
            }
        }

        const yauhen = new User('Yauhen', 31);
        const leo = new User(123, 321);

        /*
          Error:
          Argument of type '&quot;20&quot;' is not assignable to parameter of type 'number'
        */
        const max = new User('Max', '20');
    </pre>

</div>

<div class="linear" id="Part11">

    <h2>TypeScript #11 Декораторы (Decorators)</h2>

    <pre class="brush: js;">
        // Simple class example
        class User {

            constructor(public name: string, public age: number) {}

            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // Base structure of Decorator :)
        const logClass = () => ();

        // Class Decorator
        const logClass = (constructor: Function) => {
            console.log(constructor);	// Result of call: class User {}
        };

        @logClass		// <--- Apply decorator for class
        class User {

            constructor(public name: string, public age: number) {}

            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // Property Decorator
        const logProperty = (target: Object, propertyKey: string | symbol) => {
            console.log(propertyKey);	// Result of call: "secret"
        };

        class User {

            @logProperty		// <--- Apply decorator for property
            secret: number;

            constructor(public name: string, public age: number, secret: number) {
                this.secret = secret;
            }

            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // Method Decorator
        const logMethod = (
          target: Object,
          propertyKey: string | symbol,
          descriptor: PropertyDescriptor
        ) => {
            console.log(propertyKey);   // Result of call: "getPass"
        };

        class User {

            constructor(public name: string, public age: number) {}

            @logMethod			// <--- Apply decorator for method
            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // get/set Decorator
        const logSet = (
          target: Object,
          propertyKey: string | symbol,
          descriptor: PropertyDescriptor
        ) => {
            console.log(propertyKey);	// Result of call: "myAge"
        };

        class User {

            constructor(public name: string, public age: number) {}

            @logSet		// <--- Apply decorator for set
            set myAge(age: number) {
                this.age = age;
            }

        }

        // Factory Decorator
        function factory(value: any) {        // Factory
            return function (target: any) {   // Decorator
                console.log(target);          // Decorator logic
            }
        }

        // Applying Factory Decorator
        const enumerable = (value: boolean) => {
            return (
              target: any,
              propertyKey: string | symbol,
              descriptor: PropertyDescriptor
            ) => {
                descriptor.enumerable = value;
            };
        }

        class User {

            constructor(public name: string, public age: number) {}

            @enumerable(false)			// <--- Call decorator factory with argument
            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // Decorator composition syntax
        // Apply decorators (one line)
        @f @g x

        // Apply decorators (multiple lines)
        @f
        @g
        x

        // Example of two factory decorators
        const first = () => {
            console.log('first() completing');
            return (target: any, propertyKey: string | symbol, descriptor: PropertyDescriptor) => {
                console.log('first() called');
            };
        }

        const second = () => {
            console.log('second() completing');
            return (target: any, propertyKey: string | symbol, descriptor: PropertyDescriptor) => {
                console.log('second() called');
            };
        }

        // Apply and call two factory decorators
        class User {

            constructor(public name: string, public age: number) {}

            @first()
            @second()
            public getPass(): string {
                return `${this.name}${this.age}`;
            }

        }

        // Call results:
        "first() completing"      // Factory 1
        "second() completing"     // Factory 2
        "second() called"         // Decorator 2
        "first() called"          // Decorator 1
    </pre>

</div>

<div class="linear" id="Part12">

    <h2>#12 Утилиты (Utility Types)</h2>

    <pre class="brush: js;">
        // Readonly&lt;T&gt;
        interface User {
            name: string;
        }

        const user: Readonly&lt;User&gt; = {
            name: 'Yauhen',
        };

        user.name = 'Max';      // Error: cannot reassign a readonly property

        // Required&lt;T&gt;
        interface Props {
            a?: number;
            b?: string;
        };

        const obj: Props = { a: 5 };              // OK

        const obj2: Required&lt;Props&gt; = { a: 5 };   // Error: property 'b' missing

        // Record&lt;K, T&gt;
        interface PageInfo {
            title: string;
        }

        type Page = 'home' | 'about' | 'contact';

        const x: Record&lt;Page, PageInfo&gt; = {
            about: { title: 'about' },
            contact: { title: 'contact' },
            home: { title: 'home' },
        };

        // Compiled code
        &quot;use strict&quot;;
        const x = {
            about: { title: 'about' },
            contact: { title: 'contact' },
            home: { title: 'home' },
        };

        // Pick&lt;T, K&gt;
        interface Todo {
            title: string;
            description: string;
            completed: boolean;
        }

        type TodoPreview = Pick&lt;Todo, 'title' | 'completed'&gt;;

        const todo: TodoPreview = {
            title: 'Clean room',
            completed: false,
        };

        // Omit&lt;T, K&gt;
        interface Todo {
            title: string;
            description: string;
            completed: boolean;
        }

        type TodoPreview = Omit&lt;Todo, 'description'&gt;;

        const todo: TodoPreview = {
            title: 'Clean room',
            completed: false,
        };

        // Exclude&lt;T, U&gt;
        type T0 = Exclude&lt;&quot;a&quot; | &quot;b&quot; | &quot;c&quot;, &quot;a&quot;&gt;;                      // &quot;b&quot; | &quot;c&quot;
        type T1 = Exclude&lt;&quot;a&quot; | &quot;b&quot; | &quot;c&quot;, &quot;a&quot; | &quot;b&quot;&gt;;                // &quot;c&quot;
        type T2 = Exclude&lt;string | number | (() =&gt; void), Function&gt;;  // string | number

        // Extract&lt;T, U&gt;
        type T0 = Extract&lt;&quot;a&quot; | &quot;b&quot; | &quot;c&quot;, &quot;a&quot; | &quot;f&quot;&gt;;                // &quot;a&quot;
        type T1 = Extract&lt;string | number | (() =&gt; void), Function&gt;;  // () =&gt; void

        // NonNullable&lt;T&gt;
        type T0 = NonNullable&lt;string | number | undefined&gt;;   // string | number
        type T1 = NonNullable&lt;string[] | null | undefined&gt;;   // string[]

        // ReturnType&lt;T&gt;
        declare function f1(): { a: number, b: string };

        type T0 = ReturnType&lt;() =&gt; string&gt;;                                  // string
        type T1 = ReturnType&lt;(s: string) =&gt; void&gt;;                           // void
        type T2 = ReturnType&lt;(&lt;T&gt;() =&gt; T)&gt;;                                  // {}
        type T3 = ReturnType&lt;(&lt;T extends X, X extends number[]&gt;() =&gt; T)&gt;;    // number[]
        type T4 = ReturnType&lt;typeof f1&gt;;                                     // { a: number, b: string }
        type T5 = ReturnType&lt;any&gt;;                                           // any
        type T6 = ReturnType&lt;never&gt;;                                         // any
        type T7 = ReturnType&lt;string&gt;;                                        // Error
        type T8 = ReturnType&lt;Function&gt;;                                      // Error

        // InstanceType&lt;T&gt;
        class C {
            x = 0;
            y = 0;
        }

        type T0 = InstanceType&lt;typeof C&gt;;     // C
        type T1 = InstanceType&lt;any&gt;;          // any
        type T2 = InstanceType&lt;never&gt;;        // any
        type T3 = InstanceType&lt;string&gt;;       // Error
        type T4 = InstanceType&lt;Function&gt;;     // Error
    </pre>

</div>

