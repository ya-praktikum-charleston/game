<?php include '../include/header.php'; ?>




<div class="linear" id="number">
    <h1>Числа</h1>

    <h2>Способы записи числа</h2>

    <pre class="brush: js;">
        let billion = 1000000000;
    </pre>

    <p>В JavaScript можно использовать букву <code>"e"</code>, чтобы укоротить запись числа. Она добавляется к числу и заменяет указанное количество нулей:</p>

    <pre class="brush: js;">
        let billion = 1e9;  // 1 миллиард, буквально: 1 и 9 нулей

        alert( 7.3e9 );  // 7.3 миллиардов (7,300,000,000)
    </pre>

    <p>Записать микросекунды</p>

    <pre class="brush: js;">
        let ms = 1e-6; // шесть нулей, слева от 1 (0.000001)
    </pre>

    <h2>Округление</h2>

    <p><code>Math.floor</code></p>
    <p>Округление в меньшую сторону: <code>3.1</code> становится <code>3</code>, а <code>-1.1</code> — <code>-2</code>.</p>

    <p><code>Math.ceil</code></p>
    <p>Округление в большую сторону: <code>3.1</code> становится <code>4</code>, а <code>-1.1</code> — <code>-1</code>.</p>

    <p><code>Math.round</code></p>
    <p>Округление до ближайшего целого: <code>3.1</code> становится <code>3</code>, <code>3.6</code> — <code>4</code>, <code>3.5</code> — <code>4</code>, а <code>-1.1</code> — <code>-1</code>.</p>

    <p><code>Math.trunc</code> (не поддерживается в Internet Explorer)</p>
    <p>Производит удаление дробной части без округления: <code>3.1</code> становится <code>3</code>, а <code>-1.1</code> — <code>-1</code>.</p>


    <table class="my_table">
        <thead>
            <tr>
                <th></th>
                <th>Math.floor</th>
                <th>Math.ceil</th>
                <th>Math.round</th>
                <th>Math.trunc</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>3.1</td>
                <td>3</td>
                <td>4</td>
                <td>3</td>
                <td>3</td>
            </tr>
            <tr>
                <td>3.6</td>
                <td>3</td>
                <td>4</td>
                <td>4</td>
                <td>3</td>
            </tr>
            <tr>
                <td>-1.1</td>
                <td>-2</td>
                <td>-1</td>
                <td>-1</td>
                <td>-1</td>
            </tr>
            <tr>
                <td>-1.6</td>
                <td>-2</td>
                <td>-1</td>
                <td>-2</td>
                <td>-1</td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <p>Метод <code>toFixed(n)</code> округляет число до <code>n</code> знаков после запятой и возвращает строковое представление результата.</p>

    <pre class="brush: js;">
        let num = 12.34;
        alert( num.toFixed(1) ); // "12.3"


        let num = 12.36;
        alert( num.toFixed(1) ); // "12.4"


        let num = 12.34;
        alert( num.toFixed(5) ); // "12.34000", добавлены нули, чтобы получить 5 знаков после запятой
    </pre>


    <h2>Проверка: isFinite и isNaN</h2>

    <p><code>isNaN(value)</code> преобразует значение в число и проверяет является ли оно <code>NaN</code>:</p>

    <pre class="brush: js;">
        alert( isNaN(NaN) );            // true
        alert( isNaN("str") );          // true
    </pre>

    <p><code>isFinite(value)</code> преобразует аргумент в число и возвращает <code>true</code>, если оно является обычным числом, т.е. не <code>NaN/Infinity/-Infinity</code>:</p>

    <pre class="brush: js;">
        alert( isFinite("15") );        // true
        alert( isFinite("str") );       // false, потому что специальное значение: NaN
        alert( isFinite(Infinity) );    // false, потому что специальное значение: Infinity
    </pre>

    <p>Помните, что пустая строка интерпретируется как <code>0</code> во всех числовых функциях, включая <code>isFinite</code>.</p>

    <h2>parseInt и parseFloat</h2>

    <p>Они «читают» число из строки. Если в процессе чтения возникает ошибка, они возвращают полученное до ошибки число. Функция <code>parseInt</code> возвращает целое число, а <code>parseFloat</code> возвращает число с плавающей точкой:</p>

    <pre class="brush: js;">
        alert( parseInt('100px') );         // 100
        alert( parseFloat('12.5em') );      // 12.5

        alert( parseInt('12.3') );          // 12, вернётся только целая часть
        alert( parseFloat('12.3.4') );      // 12.3, произойдёт остановка чтения на второй точке

        alert( parseInt('a123') );          // NaN, на первом символе происходит остановка чтения
    </pre>

    <h2>Другие математические функции</h2>

    <p><code>Math.random()</code></p>

    <p>Возвращает псевдослучайное число в диапазоне от 0 (включительно) до 1 (но не включая 1)</p>

    <pre class="brush: js;">
        alert( Math.random() );         // 0.1234567894322
        alert( Math.random(1,5) );      // 3.7894332423      от min до max (но не включая max)
    </pre>

    <p><code>Math.max(a, b, c...)</code> / <code>Math.min(a, b, c...)</code></p>

    <p>Возвращает наибольшее/наименьшее число из перечисленных аргументов.</p>

    <pre class="brush: js;">
        alert( Math.max(3, 5, -10, 0, 1) );     // 5
        alert( Math.min(1, 2) );                // 1
    </pre>

    <p><code>Math.pow(n, power)</code></p>

    <p>Возвращает число <code>n</code>, возведённое в степень <code>power</code></p>

    <pre class="brush: js;">
        alert( Math.pow(2, 10) );           // 2 в степени 10 = 1024
    </pre>

</div>

<div class="linear" id="string">
    <h1>Строки</h1>

    <h2>Кавычки</h2>


    <p>Одинарные и двойные кавычки работают, по сути, одинаково, а если использовать обратные кавычки, то в такую строку мы сможем вставлять произвольные выражения, обернув их в <code>${…}</code>:</p>

    <pre class="brush: js;">
        function sum(a, b) {
            return a + b;
        }

        alert(`1 + 2 = ${sum(1, 2)}.`); // 1 + 2 = 3.
    </pre>

    <p>Ещё одно преимущество обратных кавычек — они могут занимать более одной строки, вот так:</p>

    <pre class="brush: js;">
        let guestList = `Guests:
            * John
            * Pete
            * Mary
        `;

        alert(guestList);       // список гостей, состоящий из нескольких строк
    </pre>

    <h2>Спецсимволы</h2>

    <p>Многострочные строки также можно создавать с помощью одинарных и двойных кавычек, используя так называемый «символ перевода строки», который записывается как <code>\n</code>:</p>

    <p>В частности, эти две строки эквивалентны, просто записаны по-разному:</p>

    <pre class="brush: js;">
        // перевод строки добавлен с помощью символа перевода строки
        let str1 = "Hello\nWorld";

        // многострочная строка, созданная с использованием обратных кавычек
        let str2 = `Hello
        World`;

        alert(str1 == str2); // true
    </pre>

    <table class="my_table table__left">
        <thead>
            <tr>
                <th>Символ</th>
                <th>Описание</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code>\n</code></td>
                <td>Перевод строки</td>
            </tr>
            <tr>
                <td><code>\r</code></td>
                <td>Возврат каретки: самостоятельно не используется. В текстовых файлах Windows <br>для перевода строки используется комбинация символов <code>\r\n</code>.</td>
            </tr>
            <tr>
                <td><code>\'</code>,<code>\"</code></td>
                <td>Кавычки</td>
            </tr>
            <tr>
                <td><code>\\</code></td>
                <td>Обратный слеш</td>
            </tr>
            <tr>
                <td><code>\t</code></td>
                <td>Знак табуляции</td>
            </tr>
        </tbody>
    </table>

    <h2>Длина строки</h2>

    <pre class="brush: js;">
        alert( `My\n`.length ); // 3
    </pre>

    <p><code>str.length</code> — это числовое свойство, а не функция, добавлять скобки не нужно.</p>

    <h2>Доступ к символам</h2>

    <pre class="brush: js;">
        let str = `Hello`;

        // получаем первый символ
        alert( str[0] );            // H    этот вариант считается современным
        alert( str.charAt(0) );     // H

        // получаем последний символ
        alert( str[str.length - 1] );   // o
    </pre>

    <p>Также можно перебрать строку посимвольно, используя <code>for..of</code>:</p>


    <pre class="brush: js;">
        for (let char of "Hello") {
            alert(char);        // H,e,l,l,o (char — сначала "H", потом "e", потом "l" и т. д.)
        }
    </pre>

    <h2>Изменение регистра</h2>

    <pre class="brush: js;">
        alert( 'Interface'.toUpperCase() );     // INTERFACE
        alert( 'Interface'.toLowerCase() );     // interface
    </pre>

    <p>Если мы захотим перевести в нижний регистр какой-то конкретный символ:</p>

    <pre class="brush: js;">
        alert( 'Interface'[0].toLowerCase() );  // 'i'
    </pre>

    <h2>Поиск подстроки</h2>

    <p><code>str.indexOf</code></p>

    <pre class="brush: js;">
        let str = 'Widget with id';

        alert( str.indexOf('Widget') );     // 0, потому что подстрока 'Widget' найдена в начале
        alert( str.indexOf('widget') );     // -1, совпадений нет, поиск чувствителен к регистру

        alert( str.indexOf("id") );         // 1, подстрока "id" найдена на позиции 1 (..idget with id)
    </pre>

    <p><code>includes, startsWith, endsWith</code></p>

    <pre class="brush: js;">
        alert( "Widget with id".includes("Widget") );       // true
        alert( "Hello".includes("Bye") );                   // false


        alert( "Midget".includes("id") );                   // true
        alert( "Midget".includes("id", 3) );                // false, поиск начат с позиции 3


        alert( "Widget".startsWith("Wid") );                // true, "Wid" — начало "Widget"
        alert( "Widget".endsWith("get") );                  // true, "get" — окончание "Widget"
    </pre>


    <h2>Получение подстроки</h2>

    <p><code>str.slice(start [, end])</code> возвращает часть строки от <code>start</code> до (не включая) <code>end</code>.</p>

    <pre class="brush: js;">
        let str = "stringify";

        alert( str.slice(0, 5) );       // 'strin', символы от 0 до 5 (не включая 5)

        alert( str.slice(0, 1) );       // 's', от 0 до 1, не включая 1, т. е. только один символ на позиции 0

        alert( str.slice(2) );          // 'ringify', с позиции 2 и до конца

        alert( str.slice(-4, -1) );     // 'gif' начинаем с позиции 4 справа, а заканчиваем на позиции 1 справа
    </pre>


    <p><code>str.substr(start [, length])</code></p>

    <pre class="brush: js;">
        let str = "stringify";

        alert( str.substr(2, 4) );      // ring, получаем 4 символа, начиная с позиции 2
    </pre>
    <br>
    <p>Строки также имеют ещё кое-какие полезные методы:</p>

    <p><code>str.trim()</code> — убирает пробелы в начале и конце строки.</p>

    <p><code>str.repeat(n)</code> — повторяет строку n раз.</p>


    <h2>Пример:</h2>
    <h3>Усечение строки, с подставкой многоточия ...</h3>

    <pre class="brush: js;">
        function truncate(str, maxlength) {
            return (str.length > maxlength) ?
                str.slice(0, maxlength - 1) + '…' : str;
        }


        var txt = truncate('Очень длинный текст',10);

        alert(txt);         //Очень дли...
    </pre>
</div>


<div class="linear" id="array">
    <h1>Массивы</h1>

    <pre class="brush: js;">
            // разные типы значений
        let arr = [ 'Яблоко', { name: 'Джон' }, true, function() { alert('привет'); } ];

            // получить элемент с индексом 1 (объект) и затем показать его свойство
        alert( arr[1].name );   // Джон

            // получить элемент с индексом 3 (функция) и выполнить её
        arr[3]();               // привет
    </pre>

    <h2>Методы pop/push, shift/unshift</h2>

    <ul class="ul_num">
        <li><code>push</code> Добавляет элемент в конец массива.</li>
        <li><code>pop</code> Удаляет последний элемент из массива и возвращает его.</li>
        <li><code>unshift</code> Добавляет элемент в начало массива.</li>
        <li><code>shift</code> удаляет элемент в начале, сдвигая очередь, так что второй элемент становится первым.</li>
    </ul>

    <pre class="brush: js;">
        let fruits = ["Яблоко"];

        fruits.push("Апельсин", "Груша");
        fruits.unshift("Ананас", "Лимон");

            // ["Ананас", "Лимон", "Яблоко", "Апельсин", "Груша"]
        alert( fruits );
    </pre>

    <p>Массив копируется по ссылке:</p>

    <pre class="brush: js;">
        let fruits = ["Банан"]

        let arr = fruits;           // копируется по ссылке (две переменные ссылаются на один и тот же массив)

        alert( arr === fruits );    // true

        arr.push("Груша");          // массив меняется по ссылке

        alert( fruits );            // Банан, Груша - теперь два элемента
    </pre>

    <h2>Перебор элементов</h2>

    <p>Вариант цикл <code>for</code></p>

    <pre class="brush: js;">
        let arr = ["Яблоко", "Апельсин", "Груша"];

        for (let i = 0; i < arr.length; i++) {
            alert( arr[i] );
        }
    </pre>

    <p>Вариант цикл <code>for..of</code></p>

    <pre class="brush: js;">
        let fruits = ["Яблоко", "Апельсин", "Слива"];

                // проходит по значениям, но не предоставляет доступа к номеру текущего элемента
        for (let fruit of fruits) {
            alert( fruit );
        }
    </pre>

    <p>Очистить массив – это <code>arr.length = 0</code>.</p>
</div>


<div class="linear" id="array-methods">
    <h1>Методы массивов</h1>

    <h4><code>splice</code></h4>
    <p>Умеет всё: добавлять, удалять и заменять элементы.</p>

    <pre class="brush: js;">
        arr.splice(index[, deleteCount, elem1, ..., elemN])
    </pre>

    <p>Он начинает с позиции <code>index</code>, удаляет <code></code> элементов и вставляет <code>elem1, ..., elemN</code> на их место. Возвращает массив из удалённых элементов.</p>

    <pre class="brush: js;">
        let arr = ["Я", "изучаю", "JavaScript"];

        arr.splice(1, 1);       // начиная с позиции 1, удалить 1 элемент

        alert( arr );           // осталось ["Я", "JavaScript"]
    </pre>
    <br>
    <pre class="brush: js;">
        let arr = ["Я", "изучаю", "JavaScript", "прямо", "сейчас"];

        let removed = arr.splice(0, 3, "Давай", "танцевать");     // удалить 3 первых элемента и заменить их другими

        alert( arr )                                // теперь ["Давай", "танцевать", "прямо", "сейчас"]

        alert( removed );                           // "Я", "изучаю", "JavaScript" <-- массив из удалённых элементов
    </pre>


    <p>Метод <code>splice</code> также может вставлять элементы без удаления, для этого достаточно установить <code>deleteCount</code> в <code>0</code>:</p>

    <br>

    <h4><code>slice</code></h4>

    <pre class="brush: js;">
        arr.slice([start], [end])
    </pre>

    <p>Он возвращает новый массив, в который копирует элементы, начиная с индекса <code>start</code> и до <code>end</code> (не включая <code>end</code>). Оба индекса <code>start</code> и <code>end</code> могут быть отрицательными. В таком случае отсчёт будет осуществляться с конца массива.</p>

    <pre class="brush: js;">
        let arr = ["t", "e", "s", "t"];

        alert( arr.slice(1, 3) );       // e,s (копирует с 1 по 3)

        alert( arr.slice(-2) );         // s,t (копирует с -2 до конца)
    </pre>


    <h4><code>concat</code></h4>

    <p>Метод <code>arr.concat</code> создаёт новый массив, в который копирует данные из других массивов и дополнительные значения.</p>

    <pre class="brush: js;">
        let arr = [1, 2];

        alert( arr.concat([3, 4])); // 1,2,3,4                  // создать массив из: arr и [3,4]

        alert( arr.concat([3, 4], [5, 6])); // 1,2,3,4,5,6      // создать массив из: arr и [3,4] и [5,6]

        alert( arr.concat([3, 4], 5, 6)); // 1,2,3,4,5,6        // создать массив из: arr и [3,4], потом добавить значения 5 и 6
    </pre>

    <h2>Перебор: forEach</h2>

    <p>Позволяет запускать функцию для каждого элемента массива.</p>

    <pre class="brush: js;">
        arr.forEach(function(item, index, array) {
            // ... делать что-то с item
        });
    </pre>

    <h2>Поиск в массиве</h2>

    <ul class="ul_num">
        <li><code>arr.indexOf(item, from)</code> ищет <code>item</code>, начиная с индекса <code>from</code>, и возвращает индекс, на котором был найден искомый элемент, в противном случае <code>-1</code>.</li>
        <li><code>arr.lastIndexOf(item, from)</code> – то же самое, но ищет справа налево.</li>
        <li><code>arr.includes(item, from)</code> – ищет <code>item</code>, начиная с индекса <code>from</code>, и возвращает <code>true</code>, если поиск успешен.</li>
    </ul>

    <pre class="brush: js;">
        let arr = [1, 0, false];

        alert( arr.indexOf(0) );            // 1
        alert( arr.indexOf(false) );        // 2
        alert( arr.indexOf(null) );         // -1

        alert( arr.includes(1) );           // true
    </pre>

    <p>Если мы хотим проверить наличие элемента, и нет необходимости знать его точный индекс, тогда предпочтительным является <code>arr.includes</code>.</p>

    <p><code>find и findIndex</code></p>

    <p>Перебор массива объектов</p>

    <pre class="brush: js;">
        let result = arr.find(function(item, index, array) {
            // если true - возвращается текущий элемент и перебор прерывается
            // если все итерации оказались ложными, возвращается undefined
        });
    </pre>
    <br>
    <pre class="brush: js;">
        let users = [
            {id: 1, name: "Вася"},
            {id: 2, name: "Петя"},
            {id: 3, name: "Маша"}
        ];

        let user = users.find(item => item.id == 1);

        alert(user.name); // Вася
    </pre>

    <p>Метод <code>arr.findIndex</code> – по сути, то же самое, но возвращает индекс, на котором был найден элемент, а не сам элемент, и <code>-1</code>, если ничего не найдено.</p>

    <p><code>filter</code></p>

    <p>Метод <code>find</code> ищет один (первый попавшийся) элемент, на котором функция-колбэк вернёт <code>true</code>.</p>

    <p>На тот случай, если найденных элементов может быть много, предусмотрен метод <code>arr.filter(fn)</code>.</p>

    <pre class="brush: js;">
        let results = arr.filter(function(item, index, array) {
            // если true - элемент добавляется к результату, и перебор продолжается
            // возвращается пустой массив в случае, если ничего не найдено
        });
    </pre>

    <pre class="brush: js;">
        let users = [
            {id: 1, name: "Вася"},
            {id: 2, name: "Петя"},
            {id: 3, name: "Маша"}
        ];

        let someUsers = users.filter(item => item.id < 3);          // возвращает массив, состоящий из двух первых пользователей

        alert(someUsers.length);                // 2
    </pre>

    <h2>Преобразование массива</h2>

    <p><code>map</code></p>

    <p>Он вызывает функцию для каждого элемента массива и возвращает массив результатов выполнения этой функции.</p>

    <pre class="brush: js;">
        let result = arr.map(function(item, index, array) {
            // возвращается новое значение вместо элемента
        });


        let lengths = ["Bilbo", "Gandalf", "Nazgul"].map(item => item.length);
        alert(lengths); // 5,7,6
    </pre>

    <p><code>sort(fn)</code></p>

    <p>сортирует массив на месте, меняя в нём порядок элементов.</p>

    <pre class="brush: js;">
        let arr = [ 1, 2, 15 ];

        arr.sort();             // метод сортирует содержимое arr

        alert( arr );           // 1, 15, 2
    </pre>

    <p>Cортировка чисел:</p>

    <pre class="brush: js;">
        let arr = [ 15, 2, 1 ];

        arr.sort( (a, b) => a - b );

        alert(arr);  // 1, 2, 15
    </pre>

    <p><code>reverse</code></p>

    <p>Меняет порядок элементов в arr на обратный.</p>

    <pre class="brush: js;">
        let arr = [1, 2, 3, 4, 5];
        arr.reverse();

        alert( arr ); // 5,4,3,2,1
    </pre>

    <p><code>split и join</code></p>

    <pre class="brush: js;">
        let names = 'Вася, Петя, Маша';

        let arr = names.split(', ');

        console.log(arr);           //["Вася", "Петя", "Маша"]

        for (let name of arr) {
            alert( `Сообщение получат: ${name}.` );         // Сообщение получат: Вася (и другие имена)
        }
    </pre>

    <p>Разбивка по буквам</p>

    <pre class="brush: js;">
        let str = "тест";

        alert( str.split('') ); // т,е,с,т
    </pre>

    <p><code>arr.join(glue)</code></p>
    <p>Делает в точности противоположное <code>split</code>. Он создаёт строку из элементов <code>arr</code>, вставляя <code>glue</code> между ними.</p>

    <pre class="brush: js;">
        let arr = ['Вася', 'Петя', 'Маша'];

        let str = arr.join(';');        // объединить массив в строку через ;

        alert( str );                    // Вася;Петя;Маша
    </pre>

    <p><code>reduce/reduceRight</code></p>

    <p> Они используются для вычисления какого-нибудь единого значения на основе всего массива.</p>

    <pre class="brush: js;">
        let arr = [1, 2, 3, 4, 5];

        let result = arr.reduce((sum, current) => sum + current);       // убрано начальное значение (нет 0 в конце)

        alert( result ); // 15
    </pre>

    <p>Метод <code>arr.reduceRight</code> работает аналогично, но проходит по массиву справа налево.</p>

    <h2>Array.isArray</h2>

    <p>Проверка на массив</p>

    <pre class="brush: js;">
        alert(typeof {});           // object
        alert(typeof []);           // тоже object



        alert(Array.isArray({}));   // false
        alert(Array.isArray([]));   // true
    </pre>
</div>


<div class="linear" id="map-set">
    <h1>Map и Set</h1>

    <h2>Map</h2>


    <p><code>Map</code> – это коллекция ключ/значение, как и <code>Object</code>. Но основное отличие в том, что Map позволяет использовать ключи любого типа (текст, обьект и тд).</p>
    <p>Метод <code>map()</code> создаёт новый массив с результатом вызова указанной функции для каждого элемента массива.</p>

    <pre class="brush: js;">
        let a = [4, 5, 12, 200, 1, 0, -2];

        let b = a.map(function (item, index) {
            // console.log(index);
            return item * 5;
        });
    </pre>


    <ul class="ul_num">
        <li><code>new Map()</code> – создаёт коллекцию.</li>
        <li><code>map.set(key, value)</code> – записывает по ключу <code>key</code> значение <code>value</code>.</li>
        <li><code>map.get(key)</code> – возвращает значение по ключу или <code>undefined</code>, если ключ <code>key</code> отсутствует.</li>
        <li><code>map.has(key)</code> – возвращает <code>true</code>, если ключ <code>key</code> присутствует в коллекции, иначе <code>false</code>.</li>
        <li><code>map.delete(key)</code> – удаляет элемент по ключу <code>key</code>.</li>
        <li><code>map.clear()</code> – очищает коллекцию от всех элементов.</li>
        <li><code>map.size</code> – возвращает текущее количество элементов.</li>
    </ul>

    <br>
    <p><code>Set</code> записвает только уникальные значения</p>
    <pre class="brush: js;">
        let a = new Set();
        a.add(1);
        a.add(2);
        a.add(2);
        a.add(2);
        a.add('Hello');
        console.log(a);         // 1, 2, "Hello"

        a.delete(2);            // Удалить значение из массива Set

        // Проверка на наличие значения в массиве Set
        if(a.has(val)){
            console.log(true);
        }

        // Количество элементов в массиве
        a.size

        // Перебор значений
        for (let item of a) {

        }

        .add   // добавление в конец массива

        let a9_arr = Array.from(a);     // преобразует Set в Array
    </pre>
    <br>
    <pre class="brush: js;">
        let map = new Map();

        map.set("1", "str1");       // строка в качестве ключа
        map.set(1, "num1");         // цифра как ключ
        map.set(true, "bool1");     // булево значение как ключ

                                    // помните, обычный объект Object приводит ключи к строкам?
                                    // Map сохраняет тип ключей, так что в этом случае сохранится 2 разных значения:
        alert(map.get(1));          // "num1"
        alert(map.get("1"));        // "str1"

        alert(map.size);            // 3
    </pre>
    <br>
    <p><code>Map</code> может использовать объекты в качестве ключей.</p>

    <pre class="brush: js;">
        let john = { name: "John" };

                        // давайте сохраним количество посещений для каждого пользователя
        let visitsCountMap = new Map();

                        // объект john - это ключ для значения в объекте Map
        visitsCountMap.set(john, 123);

        alert(visitsCountMap.get(john));    // 123
    </pre>

    <h2>Перебор Map</h2>

    <ul class="ul_num">
        <li><code>map.keys()</code> – возвращает итерируемый объект по ключам</li>
        <li><code>map.values()</code> – возвращает итерируемый объект по значениям</li>
        <li><code>map.entries()</code> – возвращает итерируемый объект по парам вида <code>[ключ, значение]</code>, этот вариант используется по умолчанию в <code>for..of</code></li>
    </ul>

    <pre class="brush: js;">
        let recipeMap = new Map([
            ["огурец", 500],
            ["помидор", 350],
            ["лук",    50]
        ]);

                                            // перебор по ключам (овощи)
        for (let vegetable of recipeMap.keys()) {
            alert(vegetable);               // огурец, помидор, лук
        }

                                            // перебор по значениям (числа)
        for (let amount of recipeMap.values()) {
            alert(amount);                  // 500, 350, 50
        }

                                            // перебор по элементам в формате [ключ, значение]
        for (let entry of recipeMap) {      // то же самое, что и recipeMap.entries()
            alert(entry);                   // огурец,500 (и так далее)
        }
    </pre>

    <br>

    <p>Кроме этого, <code>Map</code> имеет встроенный метод <code>forEach</code>, схожий со встроенным методом массивов <code>Array</code>:</p>

    <pre class="brush: js;">
                        // выполняем функцию для каждой пары (ключ, значение)
        recipeMap.forEach((value, key, map) => {
            alert(`${key}: ${value}`); // огурец: 500 и так далее
        });
    </pre>

    <h2>Object.entries: Map из Object</h2>

    <p>Если у нас уже есть обычный объект, и мы хотели бы создать <code>Map</code> из него, то поможет встроенный метод <code>Object.entries(obj)</code>, который получает объект и возвращает массив пар ключ-значение для него, как раз в этом формате.</p>
    <p>Так что мы можем создать <code>Map</code> из обычного объекта следующим образом:</p>

    <pre class="brush: js;">
        let obj = {
            name: "John",
            age: 30
        };

        let map = new Map(Object.entries(obj));             //{"name" => "John", "age" => 30}
    </pre>

    <h2></h2>

    <p>Метод <code>Object.fromEntries</code>, делает противоположное: получив массив пар вида <code>[ключ, значение]</code>, он создаёт из них объект:</p>

    <p>К примеру, у нас данные в <code>Map</code>, но их нужно передать в сторонний код, который ожидает обычный объект.</p>

    <pre class="brush: js;">
        let map = new Map();
        map.set('banana', 1);
        map.set('orange', 2);
        map.set('meat', 4);

        let obj = Object.fromEntries(map.entries());    // можно убрать .entries()

                // готово!
                // obj = { banana: 1, orange: 2, meat: 4 }

        alert(obj.orange);      // 2
    </pre>

    <h2>Set</h2>

    <p>Объект <code>Set</code> – это особый вид коллекции: «множество» значений (без ключей), где каждое значение может появляться только один раз.</p>

    <ul class="ul_num">
        <li><code>new Set(iterable)</code> – создаёт <code>Set</code>, и если в качестве аргумента был предоставлен итерируемый объект (обычно это массив), то копирует его значения в новый <code>Set</code>.</li>
        <li><code>set.add(value)</code> – добавляет значение (если оно уже есть, то ничего не делает), возвращает тот же объект <code>set</code>.</li>
        <li><code>set.delete(value)</code> – удаляет значение, возвращает <code>true</code> если <code>value</code> было в множестве на момент вызова, иначе <code>false</code>.</li>
        <li><code>set.has(value)</code> – возвращает <code>true</code>, если значение присутствует в множестве, иначе <code>false</code>.</li>
        <li><code>set.clear()</code> – удаляет все имеющиеся значения.</li>
        <li><code>set.size</code> – возвращает количество элементов в множестве.</li>
    </ul>

    <p>Основная «изюминка» – это то, что при повторных вызовах <code>set.add()</code> с одним и тем же значением ничего не происходит, за счёт этого как раз и получается, что каждое значение появляется один раз.</p>

    <pre class="brush: js;">
        let arr = [1,1,2,2,3,3,4];

        let set = new Set();

        for (let user of arr) {
            set.add(user);
        }

        console.log(set);           //{1, 2, 3, 4}

        //ИЛИ ТАК
        function unique(arr) {
            return Array.from(new Set(arr));        //Array.from преобразует перебираемый объект в массив:
        }
        console.log(unique(arr));   //[1, 2, 3, 4]
    </pre>
    <br>
    <p>Ещё вариант:</p>
    <pre class="brush: js;">
        let set = new Set();

        let john = { name: "John" };
        let pete = { name: "Pete" };
        let mary = { name: "Mary" };

                    // считаем гостей, некоторые приходят несколько раз
        set.add(john);
        set.add(pete);
        set.add(mary);
        set.add(john);
        set.add(mary);

                    // set хранит только 3 уникальных значения
        alert(set.size); // 3

        for (let user of set) {
            alert(user.name); // John (потом Pete и Mary)
        }
    </pre>

    <h2>Object.keys, values, entries</h2>

    <ul class="ul_num">
        <li><code>Object.keys(obj)</code> – возвращает массив ключей.</li>
        <li><code>Object.values(obj)</code> – возвращает массив значений.</li>
        <li><code>Object.entries(obj)</code> – возвращает массив пар <code>[ключ, значение]</code>.</li>
    </ul>

    <pre class="brush: js;">
        let user = {
            name: "John",
            age: 30
        };

        // перебор значений
        for (let value of Object.keys(user)) {
            console.log(value);             //["name", "age"]
        }
        for (let value of Object.values(user)) {
            console.log(value);             //["John", 30]
        }
        for (let value of Object.entries(user)) {
            console.log(value);             //[ ["name","John"], ["age",30] ]
        }
    </pre>

    <h2>Трансформации объекта</h2>

    <p>У объектов нет множества методов, которые есть в массивах, например <code>map</code>, <code>filter</code> и других.</p>

    <p>Если мы хотели бы их применить, то можно использовать <code>Object.entries</code> с последующим вызовом <code>Object.fromEntries</code>:</p>

    <ul class="ul_num">
        <li>Вызов <code>Object.entries(obj)</code> возвращает массив пар ключ/значение для <code>obj</code>.</li>
        <li>На нём вызываем методы массива, например, <code>map</code>.</li>
        <li>Используем <code>Object.fromEntries(array)</code> на результате, чтобы преобразовать его обратно в объект.</li>
    </ul>



</div>


<div class="linear" id="destructuring-assignment">
    <h1>Деструктурирующее присваивание</h1>

    <h2>Деструктуризация массива</h2>

    <pre class="brush: js;">
            // у нас есть массив с именем и фамилией
        let arr = ["Ilya", "Kantor"]

            // деструктурирующее присваивание
        let [firstName, surname] = arr;                 // Это просто короткий вариант записи firstName=arr[0], surname=arr[1]

            //или можно через split
        let [firstName, surname] = "Ilya Kantor".split(' ');

        alert(firstName); // Ilya
        alert(surname);  // Kantor
    </pre>

    <h2>Пропускайте элементы, используя запятые</h2>
    <pre class="brush: js;">
        let arr = ["Ilya", 'eee',"Kantor"]

        let user = {};
        [user.firstName, ,user.surname] = arr;

        console.log(user);          //{firstName: "Ilya", surname: "Kantor"}
    </pre>

    <h2>Работает с любым перебираемым объектом с правой стороны</h2>

    <pre class="brush: js;">
        let [a, b, c] = "abc"; // ["a", "b", "c"]
        let [one, two, three] = new Set([1, 2, 3]);
    </pre>

    <h2>Остаточные параметры «…»</h2>

    <p>Если мы хотим не просто получить первые значения, но и собрать все остальные, то мы можем добавить ещё один параметр, который получает остальные значения, используя оператор «остаточные параметры» – троеточие <code>("...")</code>:</p>

    <pre class="brush: js;">
        let [name1, name2, ...rest] = ["Julius", "Caesar", "Consul", "of the Roman Republic"];

        alert(name1);           // Julius
        alert(name2);           // Caesar

        // Обратите внимание, что `rest` является массивом. Назвать эту переменную можно как угодно, например rest
        alert(rest[0]);         // Consul
        alert(rest[1]);         // of the Roman Republic
        alert(rest.length);     // 2
    </pre>

    <p><b>Значения по умолчанию</b></p>

    <pre class="brush: js;">
        // значения по умолчанию
        let [name = "Guest", surname = "Anonymous"] = ["Julius"];

        alert(name);    // Julius (из массива)
        alert(surname); // Anonymous (значение по умолчанию)


        //еще вариант, узазать в стандартном значении функцию
        // prompt запустится только для surname
        let [name = prompt('name?'), surname = prompt('surname?')] = ["Julius"];
    </pre>

    <p><b>Деструктуризация объекта</b></p>
    <pre class="brush: js;">
        let options = {
            title: "Menu",
            width: 100,
            height: 200
        };

        let {title, width, height} = options;

        //или так, если хотим присвоить свойство объекта переменной с другим названием,
        let {width: w, height: h, title} = options;

        //тоже можно
        let {width = prompt("width?"), title = prompt("title?")} = options;


        alert(title);  // Menu
        alert(width);  // 100
        alert(height); // 200
    </pre>
</div>



<div class="linear" id="date">
    <h1>Дата и время</h1>

    <p><b><code>new Date()</code></b></p>
    <p>Без аргументов – создать объект <code>Date</code> с текущими датой и временем:</p>

    <pre class="brush: js;">
        let now = new Date();
        console.log( now ); // показывает текущие дату и время

        console.log( now.getTime() );               //количество миллисекунд
        console.log( now.getFullYear() );           //текщий год
        console.log( now.getMonth() );              //текщий месяц
        console.log( now.getDate() );               //текщий день месяца
        console.log( now.getDay() );                //текщий день недели цифрой (0 воскресенье - 6 суббота)
        console.log( now.getHours() );              //текщий час
        console.log( now.getMinutes() );            //текщая минута
        console.log( now.getSeconds() );            //текщая секунда
        console.log( now.getMilliseconds() );       //текщая миллисекунда
    </pre>

    <p>Получить день недели</p>
    <pre class="brush: js;">
        let days = [
            'Воскресенье',
            'Понедельник',
            'Вторник',
            'Среда',
            'Четверг',
            'Пятница',
            'Суббота'
        ];

        let day = new Date();
        day.setDate(new Date().getDate() + i);      // i если нужно вывести несколько дней недели подряд
        return days[day.getDay()];
    </pre>

</div>



<div class="linear" id="json">
    <h1>Формат JSON, метод toJSON</h1>

    <ul class="ul_num">
        <li><code>JSON.parse</code> для преобразования JSON обратно в объект.</li>
        <li><code>JSON.stringify</code> для преобразования объектов в JSON.</li>
    </ul>

    <h2>JSON.stringify</h2>

    <ul class="ul_num">
        <li><code>JSON.parse</code> для преобразования JSON обратно в объект.</li>
        <li><code>JSON.stringify</code> для преобразования объектов в JSON.</li>
    </ul>

    <pre class="brush: js;">
        let student = {
            name: 'John',
            age: 30,
            isAdmin: false,
            courses: ['html', 'css', 'js'],
            wife: null,
            sayHi() {               // будет пропущено
                alert("Hello");
            },
            [Symbol("id")]: 123,    // также будет пропущено
            something: undefined    // как и это - пропущено
            room: {
                number: 23,
                participants: ["john", "ann"]
            }
        };

        let json = JSON.stringify(student);

        alert(typeof json); // мы получили строку!

        alert(json);
                /* выведет объект в формате JSON:
        {
            "name": "John",
            "age": 30,
            "isAdmin": false,
            "courses": ["html", "css", "js"],
            "wife": null,
            "room":{"number":23,"participants":["john","ann"]},
        }
        */
    </pre>

    <h2>JSON.parse</h2>

    <pre class="brush: js;">
        let user = '{ "name": "John", "age": 35, "isAdmin": false, "friends": [0,1,2,3] }';

        user = JSON.parse(user);
    </pre>

    <p><b>Ошибки</b></p>

    <pre class="brush: js;">
        let json = `{
            name: "John",                           // Ошибка: имя свойства без кавычек
            "surname": 'Smith',                     // Ошибка: одинарные кавычки в значении (должны быть двойными)
            'isAdmin': false                        // Ошибка: одинарные кавычки в ключе (должны быть двойными)
            "birthday": new Date(2000, 2, 3),       // Ошибка: не допускается конструктор "new", только значения.
            "friends": [0,1,2,3]                    // Здесь всё в порядке
        }`;
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
