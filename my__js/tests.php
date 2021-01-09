<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">

    <pre class="brush: js;">
        // 1
        let arr = [1,2,3];
        arr.length = 5;
        console.log(arr);


        //(5)[1, 2, 3, empty × 2]
        //0: 1
        //1: 2
        //2: 3
        //length: 5

        // либо (5)[1, 2, 3, undefined, undefined]
        //arr.length = 5;  расширяет массив до 5
    </pre>
    <br>
    <pre class="brush: js;">
        // 2
        const obg = {
            get name(){
                return "Mila";
            }
        };
        obg.name = "Ivan";
        console.log(obg.name);


        // Mila
        // нет сеттера, присваивать значение может только сеттер
        // в режиме "use strict"; будет ошибка при попытке изменить get

    </pre>
    <br>
    <pre class="brush: js;">
        // 3
        const a = {
            get num(){
                return 1;
            }
        }
        a.num = 2;
        console.log(a.num);


        // 1
        // нет сеттера, он меняет значения
    </pre>
    <br>
    <pre class="brush: js;">
        // 4
        console.log(
            2['toString'](2)
        );


        // 10
        // Object.prototype.toString(), Метод toString() возвращает строку, представляющую объект.
        // Объект Number является объектом-обёрткой, позволяющей вам работать с числовыми значениями. Объект Number создаётся через конструктор Number().
        // 2['toString'](2) по сути это Number.prototype.toString() co значением 2
    </pre>
    <br>
    <pre class="brush: js;">
        // 5
        let n = Number();
        console.log(n);


        // 0
        // В неконструкторном контексте (то есть, без оператора new), объект Number может использоваться для проведения преобразования типов.
        var a = new Number('123');
        var b = Number('123');

        console.log(a instanceof Number );      // true
        console.log(b instanceof Number );      // false
    </pre>
    <br>
    <pre class="brush: js;">
        // 6
        const a = [...[...'...']];
        console.log(a);

        ﻿
        //(3) [".", ".", "."]
        //0: "."
        //1: "."
        //2: "."
        //length: 3
        // спред оператор применённый для строк, преобразует строку в массив
        // повторое использование спред оператора ни чего не изменит
    </pre>
    <br>
    <pre class="brush: js;">
        // 7
        const toString = Object.prototype.toString;
        const r = toString(null);
        console.log(r);


        // [object Undefined]
    </pre>
    <br>
    <pre class="brush: js;">
        // 8
        const a1 = '77'-7;
        const a2 = '70'+7;
        console.log(a1,a2);


        // 70 "707"
    </pre>
    <br>
    <pre class="brush: js;">
        // 9
        const max1 = Number.MAX_VALUE;
        const max2 = Number.MAX_SAFE_INTEGER;
        const zero = max1 - max2;
        console.log(zero === 0);


        // false
        // Number.MAX_VALUE - Наибольшее представимое положительное число.
        // Number.MAX_SAFE_INTEGER - Максимальное целое число, которое можно безопасно использовать в JavaScript.
    </pre>
    <br>
    <pre class="brush: js;">
        // 10
        function foo(){
            return Array.prototype.slice.call(arguments)
        }
        const arr = foo(1,2,3);
        console.log(arr);


        // [1, 2, 3]
        // Это фишка, преобразовать arguments в массив можно таким образом

        // Метод slice() возвращает новый массив, содержащий копию части исходного массива.
        // var fruits = ['Банан', 'Апельсин', 'Лимон', 'Яблоко', 'Манго'];
        // var citrus = fruits.slice(1, 3);
    </pre>
    <br>
    <pre class="brush: js;">
        // 11
        function foo(){
            return this
        }

        console.log(foo());     // "use strict"; будет undefined
        console.log(this);      // "use strict"; будет Window
                                // без "use strict"; оба будут Window
    </pre>
    <br>
    <pre class="brush: js;">
        // 12
        let man = new String('Alex');
        console.log('length' in man);


        // true
        // Оператор in возвращает true, если свойство содержится в указанном объекте или в его цепочке прототипов.
    </pre>
    <br>
    <pre class="brush: js;">
        //13
        let p = new Promise((resolve) => {
            resolve('OK');
        })
        console.log(
            p.then() instanceof Promise
        );


        // true
        // Promise.prototype.then() всегда возвращает промис, что позволяет строить цепочки then (операции соединения)
    </pre>
    <br>
    <pre class="brush: js;">
        // 14
        let a = '2' - - '1';
        console.log(a);


        // 3
        // 2 - -1 = 3
    </pre>
    <br>
    <pre class="brush: js;">
        // 15
        const arr = [34,12,3,0,7];
        console.log(arr.sort());


        // [0, 12, 3, 34, 7]
        // Метод sort() на месте сортирует элементы массива и возвращает отсортированный массив.
        // Порядок cортировки по умолчанию соответствует порядку кодовых точек Unicode.

        // var things = ['слово', 'Слово', '1 Слово', '2 Слова'];
        // things.sort(); // ['1 Слово', '2 Слова', 'Слово', 'слово']

        // var numbers = [4, 2, 5, 1, 3];
        // numbers.sort(function(a, b) {
        //     return a - b;
        // });
        // console.log(numbers); // [1, 2, 3, 4, 5]
    </pre>
    <br>
    <pre class="brush: js;">
        function foo(){
            return arguments;
        }
        let [a,b] = foo(11,22);
        console.log(a,b);


        // 11 22
    </pre>
</div>

<div class="linear" id="use_strict">
    <pre class="brush: js;">
        var x = 0;
        function foo(){
            this.x = x;
            return foo;
        }
        var bar = new foo;
        console.log(bar.x);


        // undefined
        // this.x = x; задан не был
    </pre>
    <br>
    <pre class="brush: js;">
        let obj = {};
        obj[Symbol.iterator] =
            function*(){
                yield 1;
                yield 2;
                yield 3;
            };
        console.log([...obj]);


        // [1, 2, 3]
    </pre>
    <br>
    <pre class="brush: js;">
        "use strict";
        {
            function foo(){
                console.log('foo');
            }
        }
        foo();


        // ReferenceError: foo is not defined
        // в режиме "use strict"; foo() не будет поднята в глобальную область видимости
    </pre>
    <br>
    <pre class="brush: js;">
        console.log(
            new String('str') == 'str'
        )
        console.log(
            typeof new String('str')
        )


        // true
        // object
    </pre>
    <br>
    <pre class="brush: js;">
        let a = 12;
        console.log(+-a);


        // -12
    </pre>
    <br>
    <pre class="brush: js;">
        "use strict";
        const obj = {
            foo(){
                console.log(this);
            }
        };
        (obj.bar = obj.foo)();


        // undefined
    </pre>
    <br>
    <pre class="brush: js;">
        const str = "foo";
        str.name = "ivan";
        console.log(str.name);


        // undefined
    </pre>
    <br>
    <pre class="brush: js;">
        let a = {
            1 : 111,
        }
        console.log(a[1]);
        console.log(a['1']);


        // 111
        // 111


        let a = {
            1 : 111,
            '1' : 222
        }
        console.log(a[1]);
        console.log(a['1']);


        // 222
        // 222
    </pre>
    <br>
    <pre class="brush: js;">
        function Foo(){};
        console.log(typeof Foo.prototype);


        // object
    </pre>
    <br>
    <pre class="brush: js;">
        "use strict";
        false.true = "Hmmm";
        console.log(false.true);


        // TypeError: Cannot create property 'true' on boolean 'false'
        // undefined в режиме без "use strict"; присвоение false.true = "Hmmm"; будет проигнорированно
    </pre>
    <br>
    <pre class="brush: js;">
        const a1 = parseInt('f*ck');
        const a2 = parseInt('f*ck', 16);
        console.log(a1,a2);


        // NaN 15
    </pre>
    <br>
    <pre class="brush: js;">
        for(a=0;a<10;a++){
            //
        }
        console.log(a);


        // 10
    </pre>
</div>

<div class="linear" id="use_strict">
    <pre class="brush: js;">
        function foo() {}
        console.log(typeof foo())


        // undefined
    </pre>
    <br>
    <pre class="brush: js;">
        class Human {}
        class Human {}
        console.log(new Human());


        // SyntaxError: Identifier 'Human' has already been declared
        // переопределять класс нельзя
        // а так вернулся бы Human {}
    </pre>
    <br>
    <pre class="brush: js;">
        for(let a=0;a<10;a++){}
        console.log(a)


        // ReferenceError: a is not defined
    </pre>
    <br>
    <pre class="brush: js;">
        let pr = Promise.resolve('OK').reject('bad');
        pr.then(r => {
            console.log(r);
        }).catch(e => {
            console.log(r)
        })


        // TypeError: Promise.resolve(...).reject is not a function
        // Promise.resolve(value) возвращает промис, у которого есть методы then и catch. Других методов нет т.е. reject
        // Promise.resolve("Success").then(function(value) {
        //     console.log(value); // "Success"
        // }, function(value) {
        //     // не будет вызвана
        // });
    </pre>
    <br>
    <pre class="brush: js;">
        console.log(typeof NaN);


        // number
        // NaN это свойство объекта Number т.е. Number.NaN
    </pre>
    <br>
    <pre class="brush: js;">
        let a = 11 .toString();
        console.log(a)


        // 11
    </pre>
    <br>
    <pre class="brush: js;">
        const s1 = 'Foo';
        const s2 = 77;
        console.log(s2 = s1);


        // SyntaxError: Unexpected token '='
        // распарсится на + и == т.е. прибавть ==
    </pre>
    <br>
    <pre class="brush: js;">
        let a = [1,2,3,'3',3];
        a = new Set(a);
        console.log(a[3]);


        // undefined
        // Set(4) {1, 2, 3, "3"}
        // Объекты Set позволяют сохранять уникальные значения любого типа
        // У Set нет ключей, это не совсем массив
        a.add(1);       // добавление значений
        a.has(1);       // проверка наличия в коллекции элемента
        a.size;         // длина
        a.delete(5);    // удаление элемента
        for (let item of a) console.log(item);  // выведет элементы по порядку
        let b = [...a];    // преобразования Set в Array
    </pre>
    <br>
    <pre class="brush: js;">
        let arr = [1,2,3];
        arr.num = 1;
        console.log(arr);


        // [1, 2, 3, num: 1]
        // console.log(arr.num);    // 1
    </pre>
    <br>
    <pre class="brush: js;">
        console.log(null || 0 && 1 || 2);


        // 2
        // приоритет оператора AND выше ||
    </pre>
    <br>
    <pre class="brush: js;">
        var foo = {n:1};
        var bar = foo;
        foo.x = foo = {n:2};
        console.log(foo);
        console.log(bar);


        // undefined
        // {n: 2,x:{n:2}}
    </pre>
    <br>
    <pre class="brush: js;">
        void function foo() {
            return 'It is foo';
        }
        console.log(foo());


        // ReferenceError: foo is not defined
        // Оператор void вычисляет переданное выражение и возвращает undefined.
        // На момент вызова console.log(foo()); функция foo уже не будет существовать
    </pre>
    <br>
    <pre class="brush: js;">
        let b1 = !(7<NaN);
        let b2 = 7 >= NaN;
        console.log(b1 === b2);


        // false
        // NaN ни когда ни чему не равен
        console.log(7<NaN);    // false
        console.log(7>NaN);    // false
        console.log(7==NaN);    // false
        console.log(7===NaN);    // false
        console.log(b1);    // true
        console.log(b2);    // false
    </pre>
    <br>
    <pre class="brush: js;">
        let a = Array.from('null');
        console.log(a.length);


        // 4
        // ["n", "u", "l", "l"]
        // Метод Array.from() создаёт новый экземпляр Array из массивоподобного или итерируемого объекта.
    </pre>
    <br>
    <pre class="brush: js;">
        let obj = {
            a:1, b: {n:2}
        };
        let obj1 = Object.assign({}, obj)
        obj1.b.n = 222;
        console.log(obj);
        console.log(obj1);


        // {a: 1, b: {n: 222}}
        // {a: 1, b: {n: 222}}
        // Метод Object.assign() используется для копирования значений всех собственных перечисляемых свойств из одного или более исходных объектов в целевой объект. После копирования он возвращает целевой объект.
        // неглубокое копирование обыкновенное
    </pre>
    <br>
    <pre class="brush: js;">
        const a = 111;
        const obj = {
            a: 222,
            foo(self){
                console.log(self.a);
            }
        };
        obj.foo(obj);


        // 222
    </pre>
    <br>
    <pre class="brush: js;">
        let a = null;
        console.log(a*32);


        // 0
        // null ведет себя как 0 в числовом контексте и как false в логическом контексте
    </pre>
    <br>

</div>
<!--

    <div class="linear" id="use_strict">
        <pre class="brush: js;"></pre>
        <br>

    </div>

-->



<?php include '../include/footer.php'; ?>
