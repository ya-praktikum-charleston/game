<?php include '../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Рубрика: мастерим сами</h2>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Last</b></p>

    <p>Напишите функцию, которая принимает массив и возвращает его последний элемент. Кроме того, функция должна:</p>

    <ul class="marker">
        <li>Обработать невалидные значения: если аргументом окажется не массив, функция должна вернуть undefined;</li>
        <li>Если функция вышла за границы массива — верните undefined.</li>
    </ul>


    <pre class="brush: js;">
        // [1, 2, 3, 4] => 4

        function last(list) {
            if(Array.isArray(list)){
                return list[list.length - 1]
            }else{
                return undefined;
            }
        }
    </pre>

    <br>
    <p><b>Задача 2 - First</b></p>

    <p>Напишите функцию, которая принимает массив и возвращает его первый элемент. Также функция должна:</p>

    <ul class="marker">
        <li>Обработать невалидные значения: если аргументом окажется не массив, функция должна вернуть undefined;</li>
        <li>Если функция вышла за границы массива — верните undefined.</li>
    </ul>

    <pre class="brush: js;">
        // [1, 2, 3, 4] => 4

        function last(list) {
            if(Array.isArray(list)){
                return list[0]
            }else{
                return undefined;
            }
        }
    </pre>

    <br>
    <p><b>Задача 2 - Range</b></p>

    <p>Реализовать функцию, которая генерирует числовые последовательности с заданным шагом.</p>
    <p>Функция должна принимать три аргумента:</p>

    <ul class="marker">
        <li><code>start</code> — число, с которого начнётся последовательность. Это необязательный аргумент: по умолчанию функция должна начинать с 0.</li>
        <li><code>end</code> — число, конец последовательности. Функция должна остановиться, не доходя до этого значения.</li>
        <li><code>step</code> — число, шаг между элементами в последовательности. Это необязательный аргумент: значение по умолчанию — 1.</li>
    </ul>

    <p> В результате функция должна вернуть массив чисел заданной последовательности.</p>

    <pre class="brush: js;">
        /*
            * range(4); // => [0, 1, 2, 3]
            * range(-4); // => [0, -1, -2, -3]
            * range(1, 5); // => [1, 2, 3, 4]
            * range(0, 20, 5); // => [0, 5, 10, 15]
            * range(0, -4, -1); // => [0, -1, -2, -3]
            * range(1, 4, 0); // => [1, 1, 1]
            * range(0); // => []
        */

        function range(start, end, step) {

            let arr = [];
            step = step === undefined ? 1 : Math.abs(step);
            step = step === 0 ? 0 : Math.abs(step);

            if(end === undefined){
                end = start;
                start = 0;
            }

            start = start === undefined ? 0 : start;

            let col = Math.abs(end - start);

            if(step){
                col = col / Math.abs(step);
            }

            if(end > 0){
                while (col > 0) {
                    arr.push(start);
                    start += step;
                    --col;
                }
            }else if(end < 0){
                while (col > 0) {
                    arr.push(start);
                    start -= step;
                    --col;
                }
            }

            return arr;

        }
    </pre>

    <br>
    <p><b>Задача 3 - RangeRight</b></p>

    <p>Создайте функцию, которая генерирует числовую последовательность с заданным шагом в прямом и в обратном порядке. Для этого переиспользуйте код функции <code>range</code>.</p>
    <p>Функция должна принимать четыре аргумента:</p>

    <ul class="marker">
        <li><code>start</code> — число, с которого начнётся последовательность. Это необязательный аргумент: по умолчанию функция должна начинать с 0.</li>
        <li><code>end</code> — число, конец последовательности. Функция должна остановиться, не доходя до этого значения.</li>
        <li><code>step</code> — число, шаг между элементами в последовательности. Это необязательный аргумент: значение по умолчанию — 1.</li>
        <li><code>isRight</code> — булево значение. Если <code>false</code>, функция генерирует прямой порядок последовательности. Иначе — обратный. Это необязательный аргумент: значение по умолчанию — <code>false</code>.</li>
    </ul>

    <pre class="brush: js;">
        /*
        rangeRight(4); // => [3, 2, 1, 0]
        rangeRight(-4); // => [-3, -2, -1, 0]
        rangeRight(1, 5); // => [4, 3, 2, 1]
        rangeRight(0, 20, 5); // => [15, 10, 5, 0]
        rangeRight(0, -4, -1); // => [-3, -2, -1, 0]
        rangeRight(1, 4, 0); // => [1, 1, 1]
        rangeRight(0); // => []
        */

        function range(start, end, step, isRight) {

            let arr = [];
            step = step === undefined ? 1 : Math.abs(step);
            step = step === 0 ? 0 : Math.abs(step);

            if(end === undefined){
                end = start;
                start = 0;
            }

            start = start === undefined ? 0 : start;

            let col = Math.abs(end - start);

            if(step){
                col = col / Math.abs(step);
            }

            if(end > 0){
                while (col > 0) {
                    arr.push(start);
                    start += step;
                    --col;
                }
            }else if(end < 0){
                while (col > 0) {
                    arr.push(start);
                    start -= step;
                    --col;
                }
            }

            if(isRight){
                let arrRight = [];
                return arrRight = arr.reverse();
            }else{
                return arr;
            }



        }
    </pre>

    <br>
    <p><b>Задача 4 - isEmpty</b></p>

    <p>Создайте функцию, которая проверяет, является ли переданный аргумент пустым.</p>

    <p>Аргументами могут быть:</p>

    <ul class="marker">
        <li><code>Object</code>,</li>
        <li><code>Array</code>,</li>
        <li><code>Map</code>,</li>
        <li><code>Set</code>,</li>
        <li>примитивы</li>
    </ul>

    <p>Значения <code>0</code> и другие <code>Number</code>, <code>null</code>, <code>true</code>, <code>false</code>, <code>""</code>, <code>undefined</code>, <code>[]</code>, <code>{}</code> должны возвращать <code>true</code>.</p>

    <pre class="brush: js;">
        /*
        isEmpty(null); // => true
        isEmpty(true); // => true
        isEmpty(1); // => true
        isEmpty([1, 2, 3]); // => false
        isEmpty({ 'a': 1 }); // => false
        isEmpty('123'); // => false
        isEmpty(123); // => true
        isEmpty(''); // => true
        isEmpty(0); // => true
        */

        function isEmpty(value) {

            if(
                typeof value == 'undefined' ||
                value == null ||
                typeof value == "boolean" ||
                value.length == 0 ||
                value == "" ||
                value === parseInt(value, 10)
            ){
                return true;
            }
            return false;

        }
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
