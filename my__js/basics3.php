<?php include '../include/header.php'; ?>


    <div class="linear" id="object">
        <h1>Объекты</h1>

       <p>Пустой объект («пустой ящик») можно создать, используя один из двух вариантов синтаксиса:</p>

        <pre class="brush: js;">
            let user = new Object();    // синтаксис "конструктор объекта"
            let user = {};              // синтаксис "литерал объекта"
        </pre>

        <p>Дабавим свойство в объект</p>

        <pre class="brush: js;">
            user.isAdmin = true;
        </pre>

        <p>Для удаления свойства мы можем использовать оператор <code>delete</code>:</p>

        <pre class="brush: js;">
            delete user.age;
        </pre>

        <p>Имя свойства может состоять из нескольких слов, но тогда оно должно быть заключено в кавычки:</p>

        <pre class="brush: js;">
            let user = {
                name: "John",
                age: 30,
                "likes birds": true     // имя свойства из нескольких слов должно быть в кавычках
            };
        </pre>

        <h2>Квадратные скобки</h2>

        <p>Для свойств, имена которых состоят из нескольких слов, доступ к значению «через точку» не работает:</p>

        <pre class="brush: js;">
            // это вызовет синтаксическую ошибку
            user.likes birds = true


            // Сейчас всё в порядке
            user["likes birds"] = true;         // присваивание значения свойству


            delete user["likes birds"];         // удаление свойства
        </pre>

        <p>Квадратные скобки также позволяют обратиться к свойству, имя которого может быть результатом выражения.</p>

        <pre class="brush: js;">
            let user = {
                name: "John",
                age: 30
            };

            let key = prompt("Что вы хотите узнать о пользователе?", "name");

            // доступ к свойству через переменную
            alert( user[key] ); // John (если ввели "name")


            //Запись «через точку» такого не позволяет:
            alert( user.key ); // undefined
        </pre>

        <h2>Вычисляемые свойства</h2>

        <pre class="brush: js;">
            let fruit = prompt("Какой фрукт купить?", "apple");

            let bag = {
                [fruit]: 5, // имя свойства будет взято из переменной fruit
            };

            alert( bag.apple ); // 5, если fruit="apple"
        </pre>

        <p>По сути, пример выше работает так же, как и следующий пример:</p>

        <pre class="brush: js;">
            let fruit = prompt("Какой фрукт купить?", "apple");
            let bag = {};

            // имя свойства будет взято из переменной fruit
            bag[fruit] = 5;
        </pre>

        <h2>Проверка существования свойства</h2>

        <p>При обращении к свойству, которого нет, возвращается <code>undefined</code>. Это позволяет просто проверить существование свойства – сравнением его с <code>undefined</code>:</p>

        <pre class="brush: js;">
            let user = {};

            alert( user.noSuchProperty === undefined ); // true означает "свойства нет"
        </pre>

        <p>Также существует специальный оператор <code>"in"</code> для проверки существования свойства в объекте.</p>

        <pre class="brush: js;">
            let user = { name: "John", age: 30 };

            alert( "age" in user );         // true, user.age существует
            alert( "blabla" in user );      // false, user.blabla не существует


            //или так
            let key = "age";
            alert( key in user ); // true, имя свойства было взято из переменной key
        </pre>

        <p>Обычно строгого сравнения <code>"=== undefined"</code> достаточно для проверки наличия свойства. Но есть особый случай, когда оно не подходит, и нужно использовать <code>"in"</code>.</p>

        <p>Это когда свойство существует, но содержит значение <code>undefined</code>:</p>

        <h2>Цикл «for…in»</h2>

        <p>Для перебора всех свойств объекта используется цикл <code>for..in</code>. Этот цикл отличается от изученного ранее цикла <code>for(;;)</code>.</p>

        <p>Синтаксис:</p>

        <pre class="brush: js;">
            for (key in object) {
                // тело цикла выполняется для каждого свойства объекта
            }
        </pre>

        <p>Пример:</p>

        <pre class="brush: js;">
            let user = {
                name: "John",
                age: 30,
                isAdmin: true
            };

            for (let key in user) {
                // ключи
                alert( key );  // name, age, isAdmin

                // значения ключей
                alert( user[key] ); // John, 30, true
            }
        </pre>

        <h2>Сравнение объектов</h2>

        <p>Операторы равенства <code>==</code> и строгого равенства <code>===</code> для объектов работают одинаково.</p>

        <p><b>Два объекта равны только в том случае, если это один и тот же объект.</b></p>

        <h2>Клонирование и объединение объектов, Object.assign</h2>

        <p>Если нам всё же нужно дублировать объект? Создать независимую копию, клон?</p>

        <p>Например так:</p>

        <pre class="brush: js;">
            let user = {
                name: "John",
                age: 30
            };

            let clone = {}; // новый пустой объект

            // скопируем все свойства user в него
            for (let key in user) {
                clone[key] = user[key];
            }

            // теперь в переменной clone находится абсолютно независимый клон объекта.
            clone.name = "Pete"; // изменим в нём данные

            alert( user.name ); // в оригинальном объекте значение свойства `name` осталось прежним – John.
        </pre>

        <p>Мы также можем использовать <code>Object.assign</code> для простого клонирования:</p>

        <pre class="brush: js;">
            let user = {
                name: "John",
                age: 30
            };

            let clone = Object.assign({}, user);
        </pre>

        <p>Все свойства объекта <code>user</code> будут скопированы в пустой объект, и ссылка на этот объект будет в переменной <code>clone</code>. На самом деле, такое клонирование работает так же, как и через цикл, но короче.</p>

    </div>


<div class="linear" id="symbol">
    <h1>Тип данных Symbol</h1>

    <p>«Символ» представляет собой уникальный идентификатор.</p>

    <p>При создании символу можно дать описание (также называемое имя), в основном использующееся для отладки кода:</p>

    <pre class="brush: js;">
        // Создаём символ id с описанием (именем) "id"
        let id = Symbol("id");
    </pre>



</div>



<div class="linear" id="object-methods">
    <h1>Методы объекта, "this"</h1>

    <p><b>Для доступа к информации внутри объекта метод может использовать ключевое слово <code>this</code>.</b></p>

    <p>Значение <code>this</code> – это объект «перед точкой», который использовался для вызова метода.</p>

    <pre class="brush: js;">
        let user = {
            name: "Джон",
            age: 30,

            sayHi() {
                // this - это "текущий объект"
                alert(this.name);
            }

        };

        user.sayHi(); // Джон
    </pre>



</div>


<div class="linear" id="object-toprimitive">
    <h1>Преобразование объектов в примитивы</h1>

    <h4>Логическое преобразование</h4>
    <p><b>Любой объект в логическом контексте – <code>true</code>, даже если это пустой массив <code>[]</code> или объект <code>{}</code>.</b></p>

    <pre class="brush: js;">
        if ({} && []) {
            alert( "Все объекты - true!" ); // alert сработает
        }
    </pre>

    <h4>Строковое преобразование</h4>
    <p>Если в объекте присутствует метод <code>toString</code>, который возвращает примитив, то он используется для преобразования.</p>

    <pre class="brush: js;">
        var user = {
            firstName: 'Василий',

            toString: function() {
                return 'Пользователь ' + this.firstName;
            }
        };

        alert( user );  // Пользователь Василий
    </pre>

    <p>Все объекты, включая встроенные, имеют свои реализации метода <code>toString</code>, например:</p>

    <pre class="brush: js;">
        alert( [1, 2] ); // toString для массивов выводит список элементов "1,2"
        alert( new Date ); // toString для дат выводит дату в виде строки
        alert( function() {} ); // toString для функции выводит её код
    </pre>

    <h4>Численное преобразование</h4>

    <p>Для численного преобразования объекта используется метод <code>valueOf</code>, а если его нет – то <code>toString</code>:</p>

    <pre class="brush: js;">
        var room = {
            number: 777,

            valueOf: function() { return this.number; },
            toString: function() { return this.number; }
        };

        alert( +room );  // 777, вызвался valueOf

        delete room.valueOf; // valueOf удалён

        alert( +room );  // 777, вызвался toString
    </pre>

    <p>Объект <code>Date</code>, поддерживает оба типа преобразований:</p>

    <pre class="brush: js;">
        alert( new Date() );    // toString: Дата в виде читаемой строки
        alert( +new Date() );   // valueOf: кол-во миллисекунд, прошедших с 01.01.1970 но это "строка даты" !
                                // Объект Date по историческим причинам является исключением. Он возвращает только строки
    </pre>

</div>


<div class="linear" id="constructor-new">
    <h1>Конструкторы, создание объектов через "new"</h1>

    <h4>Функция-конструктор</h4>

    <ul class="ul_num">
        <ol>Имя функции-конструктора должно начинаться с большой буквы.</ol>
        <ol>Функция-конструктор должна вызываться при помощи оператора "new".</ol>
    </ul>

    <pre class="brush: js;">
        function User(name) {
            this.name = name;
            this.isAdmin = false;
        }

        let user = new User("Вася");

        alert(user.name); // Вася
        alert(user.isAdmin); // false
    </pre>

    <h4>Калькулятор</h4>

    <pre class="brush: js;">
        function Calculator() {

            this.read = function() {
                this.a = +prompt('a?', 0);
                this.b = +prompt('b?', 0);
            };

            this.sum = function() {
                return this.a + this.b;
            };

            this.mul = function() {
                return this.a * this.b;
            };

        }

        let calculator = new Calculator();
        calculator.read();

        alert( "Sum=" + calculator.sum() );
        alert( "Mul=" + calculator.mul() );
    </pre>

    <h4>Аккумулятор</h4>

    <pre class="brush: js;">
        function Accumulator(startingValue) {
            this.value = startingValue;

            this.read = function() {
                this.value += +prompt('Сколько нужно добавить?', 0);
            };
        }

        let accumulator = new Accumulator(1);
        accumulator.read();
        accumulator.read();
        alert(accumulator.value);
    </pre>

</div>




<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
