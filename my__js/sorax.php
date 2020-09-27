<?php include '../include/header.php'; ?>

<ul class="ul_num">
    <li>var это глобальная переменная, а let какая?</li>
    <li>11111111</li>
</ul>


<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#Инструкции">Урок 1: Введение</a></li>
        <li><a class="list-sub__link" href="#Инструкции">Урок 2: Инструкции</a></li>
        <li><a class="list-sub__link" href="#Выражения_и_операторы">Урок 3: Выражения и операторы</a></li>
        <li><a class="list-sub__link" href="#Типы_данных_и_переменные">Урок 4: Типы данных и переменные</a></li>
        <li><a class="list-sub__link" href="#Прототипы_и_наследование">Урок 20: Прототипы и наследование</a></li>
        <li><a class="list-sub__link" href="#Регулярные_выражения">Урок 28: Регулярные выражения</a></li>
    </ul>
</div>

<div class="linear" id="Введение">

    <h2>Урок 1: Введение</h2>

    <p><a href="https://esprima.org/demo/parse.html#">https://esprima.org/demo/parse.html#</a></p>

    <p><b>Выражение (англ. Expression)</b> — инструкция, присваивающая правую часть выражения левой части (выражает левую через правую), т.е выражения всегда возвращают какое-то значение.</p>

    <p><b>Инструкция ( англ. Statement )</b> - команда, которой задается определенный шаг процесса обработки информации на ЭВМ.</p>

    <p><b>Label</b> Любой идентификатор JavaScript, который не является ключевым словом.</p>


    <br>

    <pre class="brush: js;">
        {name:"vova"}   

        // интерпретируется парсером как:
        type: Program
            body
                #1
                type: BlockStatement        // фигурные скобки читаются как блок Инструкций
                body
                    #1
                    type: LabeledStatement      // Идентификатор инструкция
                    label
                        type: Identifier
                        name: name
                    body
                        type: ExpressionStatement       // Инструкция выражение
                    expression
                        type: Literal
                        value: vova
                        raw: "vova"
        sourceType: script
    </pre>

</div>
   
<div class="linear" id="Инструкции">

    <h2>Урок 2: Инструкции</h2>

    <p>Все программы на JS состоят из инструкций (Statement). Инструкции выполняются по очереди, кроме составных инструкций и все инструкции разделяются точкой с запятой <code>;</code> (Semicolons)</p>

    <p>Для объединения нескольких инструкций в составную инструкцию используется <i>блок инструкций (Block Statement)</i>.</p>

    <pre class="brush: js;">
        {
            инструкция;
            инструкция;
            инструкция;
        }           
    </pre>

</div>

<div class="linear" id="Выражения_и_операторы">

    <h2>Урок 3: Выражения и операторы</h2>

    <p>Когда интерпретатор видит какое-то выражение, он его вычисляет его значение и заменяет этим значением выражение.</p>

    <pre class="brush: js;">
        1 + 1   // интерпретатор видит выражение
        2       // заменяет выражение вычисленным значением
    </pre>

    <p>Выражения бывают <b>простыми (первичными)</b> и <b>сложными (составными)</b>.</p>

    <ul class="ul_num">
        <li><b>Простые (Primary expression)</b> - это те которые не включают в себя другие выражения. К ним относятся: идентификаторы (это про переменные), литералы, ключевые слова типа this. Это всё <code>Инструкции выражения (ExpressionStatement)</code>.</li>
        <li><b>Сложные</b>. Для образования сложных выражений используются операторы: унарные, бинарные, тернарные.

            <pre class="brush: js;">
                1 + 1       // у этого оператора есть два операнта
            </pre>
        </li>
    </ul>

</div>

<div class="linear" id="Типы_данных_и_переменные">

    <h2>Урок 4: Типы данных и переменные</h2>

    <p>Идентификатор в JavaScript — это уникальное имя: — переменной, — функции, — объекта, — массива, — меток, и других элементов синтаксиса JavaScript, где пользователь самостоятельно назначает имена.</p>

    <p>Инструкция с ключевым словом <code>var</code> называется инструкцией объявления <code>Declaration Statement</code></p>

    <pre class="brush: js;">
        var variable;     // name идентификатор имени переменной 
    </pre>

     <pre class="brush: js;">
        var myNumber = 777,         // числовой литерал 
            myString = "text",      // текстовый литерал
            myBool = true,          // логический литерал
            myNull = null,          // литерал null
            nyUnder = undefined;    // идентификатор
    </pre>

    <p>Для определения типа в JS есть унарный оператор <code>typeof</code>. Сам <code>typeof</code> возвращает строку.</p>

    <pre class="brush: js;">
        console.log(myNumber)       // number
        console.log(myString)       // string
        console.log(myBool)         // boolean
        console.log(myNull)         // object     это ошибка JS
        console.log(nyUnder)        // undefined
    </pre>

    <p><b>Объектные типы</b></p>

    <pre class="brush: js;">
        var obj = {name: "text"},       // объекты
            array = [1,2,3],            // массивы
            regexp = /w+/g,             // регулярные выражения
            func = function(){};        // функции


        console.log(typeof obj)         // object   
        console.log(typeof array)       // object
        console.log(typeof regexp)      // object
        console.log(typeof func)        // function     ещё одна особенность оператора typeof
    </pre>

    <p>JS это язык <b><i>динамической типизации</i></b> - это значит, что тип переменной определяется автоматически интерпретатором, в зависимости от присвоенного ей значения. Именно по этому переменные в JS не имеют типа (untyped).</p>

    <p>Кроме это в JS есть автоматическая конвертация типов или преобразование типов. Это значит что если парсер ожидает значение логического типа, то значение автоматически будет преобразованно к логическому типу.</p>

    <p>Типы в JS можно разделить на <b>изменяемые (mutable)</b> и на <b>не изменяемые (immutable)</b>.</p>

    <p>Все простые типы в JS не изменяемы. Сложные типы можно менять.</p>

    <pre class="brush: js;">
         myString.toUpperCase();    // вернется новая строка, а старая останется не изменной   

         obj.name = "text"          // можно изменить на любой тип
    </pre>

    <p><b>Оператор присваивания</b></p>

    <p><b>Выражение (англ. Expression)</b> — инструкция, присваивающая правую часть выражения левой части (выражает левую через правую), т.е выражения всегда возвращают какое-то значение.</p>


    <pre class="brush: js;">
        var a, b, c, d;
        a = b = c = d = 5;      // присваивание будет идти справа на лево, числовой литерал 5 будет присвоен d = c = b = a 
    </pre>
</div>

<div class="linear" id="Прототипы_и_наследование">

    <h2>Урок 20: Прототипы и наследование</h2>

    <p><code>Class</code> это множество всех объектов, которые наследуют свои свойства от одного прототипа.</p>

    <pre class="brush: js;">
        var Person = {
            constructor: function(name, age, gender){
                this.name = name;
                this.age = age;
                this.gender = gender;
                return this;
            },
            greet: function () {
                console.log("Hi, my name is " + this.name);
            }
        };

        var person, anotherPerson, thirdPerson;

        person = Object.create(Person).constructor("John", 35, "male");
        anotherPerson = Object.create(Person).constructor("Jessica", 28, "female");
        thirdPerson = Object.create(Person).constructor("Bruse", 38, "male");

        console.log(person.name);               //John
        console.log(anotherPerson.name);        //Jessica
        console.log(thirdPerson.name);          //Bruse

        person.greet();                         //Hi, my name is John
        anotherPerson.greet();                  //Hi, my name is Jessica
        thirdPerson.greet();                    //Hi, my name is Bruse
    </pre>


</div>

<div class="linear" id="Регулярные_выражения">

    <h2>Урок 28: Регулярные выражения</h2>

    <p><a href="//https://regexr.com/">//https://regexr.com/</a></p>

    <p><code>[a-zA-Z]</code> найдет все строчные и заглавные буквы</p>
    <p><code>[0-9]</code> диапазон цифр</p>
    <p><code>[^0-9]</code> символ степени найдет все символы которые не входят в указанный диапазон, так же указывает начало строки</p>
    <p><code>\d</code>  означает тоже самое что и [0-9]</p>
    <p><code>\D</code> любой символ кроме цифр</p>
    <p><code>\w</code> все символы которые являются буквами или цифрами</p>
    <p><code>\W</code> все символы которые не являются буквами или цифрами</p>
    <p><code>\s</code> нйдет все пустые (пробел, табуляция, перенос строк)</p>
    <p><code>\S</code> найдет все символы которые не являются пустыми символами</p>
    <p><code>\b</code> граница слова (\bi - начало слова, \bie\b - артикли ie, ie\b - окончание слова)</p>
    <p><code>\B</code>не является границей слова   (\Bq|q\B - не начинается с q или не заканчивается q)</p>
    <p><code>gr(e|a)y</code> логическое или, grey или gray</p>
    <p><code>gr[ea]y</code> тот же самый вариант логического или, только короче</p>
    <p><code>colou?r</code> ? означает что символ не обязательный</p>
    <p><code>.</code> . выделяет любой символ кроме переноса строк</p>
    <p><code>\.</code> если нужно найти точку то её нужно экранировать, как и любой символ который есть в регулярных выражениях</p>
    <p><code>a.{4}e</code> символ повторения, т.е. найти то ч тоначнается с а и заканчивается е, а между ними 4 любых символа</p>
    <p><code>a.{2,6}e</code> символ повторения, от 2 до 6 раз</p>
    <p><code>a.{2,6}?e</code> не жадное повторение</p>
    <p><code>a.+?e</code> краткая форма a.{1,}?e, т.е. повторение 1 и более раз</p>
    <p><code>a.*?e</code> повторение от 0 и более раз</p>
    <p><code>$</code> означает конец строки</p>
    <p><code></code></p>


</div>


<!--

<div class="linear" id="use_strict">

    <h2>Урок 1: 11111111</h2>

    


</div>


<pre class="brush: js;">

</pre>


<ul class="ul_num">
    <li>11111111</li>
</ul>



<div class="linear" id="use_strict">
    <h1>11111111111111111</h1>

    <h2>2222222222222222/h2>


    <p>3333333333333333333</p>

    <pre class="brush: js;">

    </pre>

    <ul class="ul_num">
        <li>44444444444444444444</li>

    </ul>

</div>

-->



<?php include '../include/footer.php'; ?>
