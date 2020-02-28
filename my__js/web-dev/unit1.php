<?php include '../../include/header.php'; ?>



<div class="linear" id="unit1">
    <h1>Урок 1. Стартуем и пишем первую программу</h1>

    <pre class="brush: js;">
        let a = document.querySelector('.unit1_0000')           //получить элемент
        a.innerHTML = '3333';                                   //вставить содержимое в элемент
    </pre>


    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <p><code>Task 1.</code> Выведите в консоль ваше имя.</p>
            <pre class="brush: js;">
                console.log('Виталий');             //Виталий
            </pre>

            <br>

            <p><code>Task 2.</code> Выведите в консоль номер месяца в котором вы родились. Изучите чем отличается вывод числа и строки.</p>
            <pre class="brush: js;">
                console.log(06);        //6     //console.log обрезает нули перед цифрой
            </pre>

            <br>

            <p><code>Task 3.</code> Выведите в консоль строку: 'Добро '+'пожаловать '+' на курс'</p>
            <pre class="brush: js;">
                console.log('Добро '+'пожаловать '+' на курс');        //Добро пожаловать  на курс
            </pre>

            <br>

            <p><code>Task 4.</code> С помощью alert выведите число 2019. После срабатывания кода - закомментируйте его, чтобы не мешал для дальнейшей разработки</p>
            <pre class="brush: js;">
                //alert(2019);              //2019
            </pre>

            <br>

            <p><code>Task 5.</code> С помощью alert выведите результат операции:</p>
            <pre class="brush: js;">
                //alert(2019 - 200);              //1819
            </pre>

            <br>

            <p><code>Task 6.</code> Создайте на странице div с id=one. С помощью document.getElementById запишите в данный элемент текст 'Hello World'.</p>
            <pre class="brush: xml;">
                <p id="unit1_0000">1111</p>
            </pre>

            <pre class="brush: js;">
                document.getElementById('unit1_0000').innerHTML = 'Hello World';
            </pre>

            <br>

            <p><code>Task 7.</code> Создайте на странице div с id=two. С помощью document.getElementById запишите в данный элемент результат умножения 12 на 12. Умножение можно сделать с помощью знака звездочки ( цифра 8).</p>
            <pre class="brush: xml;">
                <p id="unit1_0000">1111</p>
            </pre>

            <pre class="brush: js;">
                document.getElementById('unit1_0000').innerHTML = 12*12;
            </pre>

            <br>

            <p><code>Task 8.</code> Создайте div с классом one. С помощью document.querySelector запишите в данный элемент текст 'Hello World'.</p>
            <pre class="brush: xml;">
                <p class="unit1_0000">1111</p>
            </pre>

            <pre class="brush: js;">
                document.querySelector('.unit1_0000').innerHTML = 'Hello World';
            </pre>

            <br>

            <p><code>Task 9.</code> Создайте следующую верстку на странице:</p>

            <pre class="brush: xml;">
                <h2>Hello <span>everyone</span></h2>
            </pre>

            <p>Замените с помощью querySelector текст everyone на world.</p>

            <pre class="brush: js;">
                document.querySelector('h2 span').innerHTML = 'world';
            </pre>

            <br>

            <p><code>Task 10.</code> Создайте пустой div c классом three. С помощью querySelector запишите внутрь div заголовок h3 с произвольным текстом.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                document.querySelector('.unit1_0000').innerHTML = '<h3>Hello World</h3>';
            </pre>

            <br>

            <p><code>Task 11.</code> Создайте пустой div c классом four. С помощью querySelector запишите внутрь div заголовок h4 с произвольным текстом и
                 параграф p с произвольным текстом. Подсказка, чтобы дописывать внутрь элемента используейте не innerHTML = ,
                 а innerHTML += (плюс равно без пробела).</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                //document.querySelector('.four').innerHTML = '<h4>Hello World</h4><p>Произвольный текст</p>';

                let $four = document.querySelector('.unit1_0000');
                $four.innerHTML = '<h4>Hello World</h4>';
                $four.innerHTML += '<p>Произвольный текст</p>';
            </pre>

            <br>

            <p><code>Task 12.</code> Создайте параграф с классом five. Получите его в переменную a. С помощью innerHTML запишите внутрь переменной a
                 число 3.1415. Изучите как в JS пишутся дроби - через точку или через запятую!</p>
            <pre class="brush: xml;">
                <p class="five"></p>
            </pre>

            <pre class="brush: js;">
                let a = document.querySelector('.unit1_0000');
                a.innerHTML = 3.1415;
            </pre>

            <br>

            <p><code>Task 13.</code> Создайте div с классом seven. Получите его в переменную div7. С помощью innerHTML запишите в него строку:</p>
            <pre class="brush: xml;">
                <img src="https://cdn4.iconfinder.com/data/icons/food-and-drink-flat-gradient/32/cone_ice_cream_food_drink_sweet-512.png" alt="">
            </pre>

            <p>Обратите внимание. Вам придется вставить строку, которая уже содержит кавычки. Главное чтобы кавычки чередовались. Поэтому при вставке оберните данную строку одинарными кавычками.</p>

            <pre class="brush: js;">
                let div7 = document.querySelector('.unit1_0000');
                div7.innerHTML = '<img src="https://cdn4.iconfinder.com/data/icons/food-and-drink-flat-gradient/32/cone_ice_cream_food_drink_sweet-512.png" alt="">';
            </pre>

            <br>

            <p><code>Task 14.</code> Создайте две переменных z1 = 6, z2 = 3. Создайте div, класс присвойте самостоятельно и выведите в него умножение z1 на z2.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let z1 = 6;
                let z2 = 3;

                let $eight = document.querySelector('.unit1_0000');
                $eight.innerHTML = z1 * z2;
            </pre>

            <br>

            <p><code>Task 15.</code> Создайте две переменных y1 = 6, y2 = 3. Создайте div, класс присвойте самостоятельно, выведите в него деление y1 на y2.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let y1 = 6;
                let y2 = 3;

                let $nine = document.querySelector('.nine');
                $nine.innerHTML = z1 / z2;
            </pre>

            <br>

            <p><code>Task 16.</code> Создайте две переменные x1='Hello', x2 = 5. Создайте div, класс присвойте самостоятельно, выведите в него сумму x1 + x2. Изучите результат операции.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let x1 = 'Hello';
                let x2 = 5;

                document.querySelector('.nine').innerHTML = x1 + ' ' + x2;
            </pre>

            <br>

            <p><code>Task 17.</code> Создайте div с классом test-1. Получите его в переменную d1. Выведите эту переменную в консоль. Изучите вывод.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let $d1 = document.querySelector('.test-1');
                console.log($d1);
            </pre>

            <br>

            <p><code>Task 18.</code> Создайте div.test-2. Получите его в переменную d2. Выведите эту переменную в консоль. Присвойте d2 значение 5 (d2 = 5). Выведите переменную в консоль. Изучите вывод.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let $d2 = document.querySelector('.test-2');
                console.log($d2);
                $d2 = 5
                console.log($d2);
            </pre>

            <br>

            <p><code>Task 19.</code> Создайте div c классом s3 и div с классом s4. Получите div.s3 в переменную divS3. Выведите в консоль divS3. Теперь получите в эту же переменную divS3 блок div c классом s4. Выведите переменную divS3 в консоль. Изучите что изменилось.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let divS3 = document.querySelector('.s3');
                console.log(divS3);
                divS3 = document.querySelector('.s4');
                console.log(divS3);
            </pre>

            <br>

            <p><code>Task 20.</code> Получите c помощью querySelector тег body. С помощью innerHTML присвойте ему пустую строку (...innerHTML = ''). Изучите что произошло. Закомментируйте этот код.</p>
            <pre class="brush: xml;">
                <div class="unit1_0000"></div>
            </pre>

            <pre class="brush: js;">
                let $body = document.querySelector('body');
                //$body.innerHTML = '';
            </pre>
        </div>
    </div>

</div>




<div class="linear" id="unit2">
    <h1>Урок 2. Основы ввода данных</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // Создайте две переменные a = 7 и b = 9. Выведите в консоль результа умножения a на b.
                let a = 7;
                let b = 9;
                console.log(a * b);


                // Task 2
                // Создайте две переменные c = 7 и d = 9. Выведите на страницу результат деления c на d.
                let c = 7;
                let d = 9;
                let task2 = document.querySelector('.task2');
                task2.innerHTML = c / d;


                // Task 3
                // Создайте две переменные e = 3 и f = 5. Выведите на страницу результат сложения e + f.
                let e = 3;
                let f = 5;
                let task3 = document.querySelector('.task3');
                task3.innerHTML = e + f;


                // Task 4
                // Создайте две переменные e1 = '3' и f1 = 5. Выведите на страницу результат сложения e1 + f1. Объясните разницу.
                let e1 = '3';
                let f1 = 5;
                let task4 = document.querySelector('.task4');
                task4.innerHTML = e1 + f1;          //input все принимаемые значения преобразует к строке, поэтому происходит конкатенация


                // Task 5
                // Создайте две переменные e2 = 3 и f2 = 0. Выведите на страницу результат деления e2 на f2.
                let e2 = 3;
                let f2 = 0;
                let task5 = document.querySelector('.task5');
                task5.innerHTML = e2 / f2;


                // Task 6
                // Создайте две переменные e3 = 3 и f3 = 'Hello'. Выведите на страницу результат сложения двух переменных.
                let e3 = 3;
                let f3 = 'Hello';
                let task6 = document.querySelector('.task6');
                task6.innerHTML = e3 + f3;


                // Task 7
                // Создайте две переменные e4 = 3 и f4 = 'Hello'. Выведите на страницу результат умножения двух переменных.
                let e4 = 3;
                let f4 = 'Hello';
                let task7 = document.querySelector('.task7');
                task7.innerHTML = e3 * f3;


                // Task 8
                // Создайте input и кнопку. По нажатию на кнопку выполняется функция, которая выводит в консоль то, что пользователь ввел в input.
                let inputIn8 = document.querySelector('.task8_in');
                let button8 = document.querySelector('.task8_bt');

                button8.onclick = function () {
                    console.log(inputIn8.value);
                }


                // Task 9
                // Создайте input и кнопку. По нажатию на кнопку выполняется функция, которая выводит на страницу, что пользователь ввел в input. Добавьте очистку input после нажатия кнопки.
                let inputIn9 = document.querySelector('.task9_in');
                let button9 = document.querySelector('.task9_bt');
                let div9 = document.querySelector('.task9_div');

                button9.onclick = function () {
                    div9.innerHTML = inputIn9.value;
                    inputIn9.value = '';
                }


                // Task 10
                // Создайте input и кнопку. По нажатию на кнопку выполняется функция, которая выводит на страницу число, которое ввел пользователь умноженное на 10.
                let inputIn10 = document.querySelector('.task10_in');
                let button10 = document.querySelector('.task10_bt');
                let div10 = document.querySelector('.task10_div');

                button10.onclick = function () {
                    let a = +inputIn10.value;
                    div10.innerHTML = a * 10;
                }


                // Task 11
                // Создайте input и кнопку. По нажатию на кнопку выполняется функция, которая выводит на страницу число, которое ввел пользователь и к нему добавленное число 10.
                let inputIn11 = document.querySelector('.task11_in');
                let button11 = document.querySelector('.task11_bt');
                let div11 = document.querySelector('.task11_div');

                button11.onclick = function () {
                    let a = +inputIn11.value;
                    div11.innerHTML = a + 10;
                }


                // Task 12
                // Создайте два input и кнопку. В первый input пользователь вводит имя, во второе фамилию. При нажатии кнопки выполняется функция, которая выводит в консоль строку 'Hello имя фамилия', где имя - имя пользователя и фамилия - введенная фамилия.
                let inputIn12_1 = document.querySelector('.task12_in1');
                let inputIn12_2 = document.querySelector('.task12_in2');
                let button12 = document.querySelector('.task12_bt');
                let div12 = document.querySelector('.task12_div');

                button12.onclick = function () {
                    let a = inputIn12_1.value;
                    let b = inputIn12_2.value;
                    //div12.innerHTML = 'Hello ' + a + ' ' + b;
                    div12.innerHTML = `Hello ${a} ${b}`;
                }


                // Task 13
                // Создайте два input и кнопку. В input пользователь вводит числа. При нажатии кнопки выполняется функция, которая выводит сумму данных двух чисел на страницу.
                let inputIn13_1 = document.querySelector('.task13_in1');
                let inputIn13_2 = document.querySelector('.task13_in2');
                let button13 = document.querySelector('.task13_bt');
                let div13 = document.querySelector('.task13_div');

                button13.onclick = function () {
                    let a = +inputIn13_1.value;
                    let b = +inputIn13_2.value;
                    div13.innerHTML = a + b;
                }


                // Task 14
                // Создайте input и пропишите ему в html value = 77. С помощью JS измените value на 'Hello'.
                let inputIn14 = document.querySelector('.task14_in');
                let button14 = document.querySelector('.task14_bt');

                button14.onclick = function () {
                    let a = inputIn14;
                    a.value = 'Hello'
                }


                // Task 15
                // Создайте input и получите его в переменную y. В js выполните следующее присвоение: y.style.border = '2px solid red' . Изучите результат операции.
                let y = document.querySelector('.task15_in');
                y.style.border = '2px solid red'


                // Task 16
                // Создайте два input type=number, куда пользователь может ввести числа. Выведите на страницу сумму данных чисел.
                let inputIn16_1 = document.querySelector('.task16_in_1');
                let inputIn16_2 = document.querySelector('.task16_in_2');
                let button16 = document.querySelector('.task16_bt');
                let div16 = document.querySelector('.task16_div');

                button16.onclick = function () {
                    let a = +inputIn16_1.value;
                    let b = +inputIn16_2.value;
                    div16.innerHTML = a + b;
                }


                // Task 17
                // Создайте input type="text" куда пользователь может ввести строку и число. Создайте функцию, которая запускается по
                // нажатию на кнопку. Получите значение из input в переменную t. А затем сделайте операцию t = parseInt(t), и результат
                // операции выведите в консоль. Прочитайте за эту операцию. Попробуйте по очереди вводить 44, 44aaa, 44.3, a45 . Изучите вывод.
                let inputIn17 = document.querySelector('.task17_in');
                let button17 = document.querySelector('.task17_bt');

                button17.onclick = function () {
                    let t = inputIn17.value;
                    t = parseInt(t);
                    console.log(t);
                }


                // Task 18
                // Создайте input type="text" куда пользователь может ввести строку и число. Создайте функцию, которая запускается по нажатию на кнопку.
                // Получите значение из input в переменную t. А затем сделайте операцию t = parseFloat(t), и результат операции выведите в консоль.
                // Прочитайте за эту операцию. Попробуйте по очереди вводить 44, 44aaa, 44.3, a45 . Изучите вывод.
                let inputIn18 = document.querySelector('.task18_in');
                let button18 = document.querySelector('.task18_bt');

                button18.onclick = function () {
                    let t = inputIn18.value;
                    t = parseFloat(t);
                    console.log(t);
                }


                // Task 19
                // Создайте два input type=number, куда пользователь может ввести отрицательные числа. Выведите на страницу сумму данных чисел.
                // Мы это делали! Зачем? Затем, что нужно понимать как влияет перевод в число с помощью + и parseInt на отрицательные числа!!!
                let inputIn19_1 = document.querySelector('.task19_in_1');
                let inputIn19_2 = document.querySelector('.task19_in_2');
                let button19 = document.querySelector('.task19_bt');
                let div19 = document.querySelector('.task19_div');

                button19.onclick = function () {
                    let a = +inputIn19_1.value;
                    let b = parseInt(inputIn19_2.value);
                    div19.innerHTML = a + b;
                }


                // Task 20
                // Создайте опросник, куда пользователь может ввести имя, фамилию, возраст, род занятий. И кнопку. По нажатию кнопки выведите на
                // страницу предложение 'Уважаемый Иван, Иванов, ваш возраст 33 года, по професси вы ...' куда поставьте соответствующие данные из inputов.
                let inputIn20_1 = document.querySelector('.task20_in_1');
                let inputIn20_2 = document.querySelector('.task20_in_2');
                let inputIn20_3 = document.querySelector('.task20_in_3');
                let inputIn20_4 = document.querySelector('.task20_in_4');
                let button20 = document.querySelector('.task20_bt');
                let div20 = document.querySelector('.task20_div');

                button20.onclick = function () {
                    let a = inputIn20_1.value;
                    let b = inputIn20_2.value;
                    let c = inputIn20_3.value;
                    let d = inputIn20_4.value;
                    div20.innerHTML = `Уважаемый ${a}, ${b}, ваш возраст ${c} года, по професси вы ${d}`;
                }

            </pre>
        </div>
    </div>

</div>



<div class="linear" id="unit2">
    <h1>Урок 3. Оператор If, else, switch case - выбор в JavaScript</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

            // Task 1
            // Создайте переменную a = 4. Используя конструкцию if проверьте что a == 4. Выведите сообщение в консоль.

            let a = 4;
            if( a == 4 ) {
                console.log('true')
            }


            // Task 2
            // Создайте b = 8 и с = 10. С помощью if, else выведите в консоль сообщение о том, какая из переменных больше.

            let b = 8;
            let c = 10;
            if ( b > c ){
                console.log(`${b} больше ${c}`)
            } else {
                console.log(`${c} больше ${b}`)
            }


            // Task 3
            // Используя else if добавьте в предыдущую задачу проверку на равенство.

            let d = 5;
            let e = 20;
            if( d == e ) {
                console.log('Переменные равны')
            } else if ( d > e ){
                console.log(`${d} больше ${e}`)
            } else {
                console.log(`${e} больше ${d}`)
            }


            // Task 4
            // Создайте на странице 2 input, куда пользователь может вводить числа. Добавьте кнопку. При нажатии кнопки выполняйте функцию,
            // которая сравнит два числа и выведет большее на страницу. Если числа равны - выводится строка "равны".

            let u3_t4_in1 = document.querySelector('.u3_t4_in1');
            let u3_t4_in2 = document.querySelector('.u3_t4_in2');
            let u3_t4_bt = document.querySelector('.u3_t4_bt');
            let u3_t4_div = document.querySelector('.u3_t4_div');

            u3_t4_bt.onclick = function () {
                let a = +u3_t4_in1.value;
                let b = +u3_t4_in2.value;
                if( a == b ) {
                    u3_t4_div.innerHTML = a;
                } else if ( b > a ){
                    u3_t4_div.innerHTML = b;
                } else {
                    u3_t4_div.innerHTML = a;
                }
            }


            // Task 5
            //Создайте на странице input, куда пользователь может вводить год рождения. Добавьте кнопку. При нажатии кнопки выполняйте функцию,
            //которая если год рождения меньше 2000 выводит на страницу возраст пользователя (2019 - введенный год рождения), если год рождения
            //больше или равен 2000 - выводит в консоль возраст пользователя.

            let u3_t5_in1 = document.querySelector('.u3_t5_in');
            let u3_t5_bt = document.querySelector('.u3_t5_bt');
            let u3_t5_div = document.querySelector('.u3_t5_div');

            u3_t5_bt.onclick = function () {
                let val = +u3_t5_in1.value;
                let year = 2019 - val;

                if( val < 2000  ) {
                    u3_t5_div.innerHTML = year;
                } else if ( val >= 2000 ){
                    console.log( year );
                    u3_t5_div.innerHTML = '';
                }
            }


            // Task 6
            // Создайте input куда пользователь может ввести номер квартиры. Если квартира от 1 до 32 - то выводите сообщение, о том,
            // что такая квартира есть,если другое число - сообщение о том, что квартира не существует.

            let u3_t6_in1 = document.querySelector('.u3_t6_in');
            let u3_t6_bt = document.querySelector('.u3_t6_bt');
            let u3_t6_div = document.querySelector('.u3_t6_div');

            u3_t6_bt.onclick = function () {
                let val = +u3_t6_in1.value;

                if( val <= 32 && val > 0 ) {
                    u3_t6_div.innerHTML = 'Есть такая квартира';
                } else {
                    u3_t6_div.innerHTML = 'Такая квартира не существует';
                }
            }


            // Task 7
            // Создайте input куда пользователь может ввести число. После нажатия кнопки - на страницу должно выводиться сообщение - большие или меньше нуля это число.

            let u3_t7_in1 = document.querySelector('.u3_t7_in');
            let u3_t7_bt = document.querySelector('.u3_t7_bt');
            let u3_t7_div = document.querySelector('.u3_t7_div');

            u3_t7_bt.onclick = function () {
                let val = +u3_t7_in1.value;

                if( val == 0 ) {
                    u3_t7_div.innerHTML = 'Число равно нулю';
                } else if ( val > 0 ){
                    u3_t7_div.innerHTML = 'Число больше нуля';
                } else {
                    u3_t7_div.innerHTML = 'Число меньше нуля';
                }
            }

            // Task 8
            // Создайте input куда пользователь может ввести число. После нажатия кнопки - на страницу должно выводиться сообщение - четное или нет это число.
            // Определить четное или нет число в JS очень просто. Нужно получить целый остаток от деления (читать за оператор), для этого используется оператор % .
            // И проверить. Если остаток от деления 0 - то число четное, если нет - не четное.

            let u3_t8_in1 = document.querySelector('.u3_t8_in');
            let u3_t8_bt = document.querySelector('.u3_t8_bt');
            let u3_t8_div = document.querySelector('.u3_t8_div');

            u3_t8_bt.onclick = function () {
                let val = +u3_t8_in1.value;

                if( val % 2) {
                    u3_t8_div.innerHTML = 'Не чётное число';
                } else {
                    u3_t8_div.innerHTML = 'Чётное число';
                }
            }


            // Task 9
            // Создайте 2 инпута. Если оба инпута заполнены (не равны пустой строке), то по нажатию кнопки число из первого инпута возведите
            // в степень из второго input. Результат выведите на страницу. Как возвести в степень? Читаем!

            let u3_t9_in1 = document.querySelector('.u3_t9_in1');
            let u3_t9_in2 = document.querySelector('.u3_t9_in2');
            let u3_t9_bt = document.querySelector('.u3_t9_bt');
            let u3_t9_div = document.querySelector('.u3_t9_div');

            u3_t9_bt.onclick = function () {
                let a = +u3_t9_in1.value;
                let b = +u3_t9_in2.value;

                if( a != '' && b != '' ) {
                    u3_t9_div.innerHTML = a ** b;
                }else{
                    u3_t9_div.innerHTML = 'Введите корректное значение';
                }
            }


            // Task 10
            // Есть поле input куда пользователь может ввести свое имя. Нужно при нажатии кнопки - сказать с помощью alert('Hello имя_пользователя'),
            // но хитрые пользователи часто нажимают несколько раз пробел. Вроде ничего и не ввел, но программа считывает пробелы и пытается работать.
            // Напишите проверку, которая выводит предупреждение если пользователь ничего не ввел, или ввел один пробел. В остальных случаях - Hello...+

            let u3_t10_in = document.querySelector('.u3_t10_in');
            let u3_t10_bt = document.querySelector('.u3_t10_bt');
            let u3_t10_div = document.querySelector('.u3_t10_div');

            u3_t10_bt.onclick = function () {
                let a = u3_t10_in.value;

                if( a != '' && a != ' ' ) {
                    alert(`Hello ${a}`);
                }else{
                    alert('Укажите ваше имя');
                }
            }


            // Task 11
            // Хитрый пользователь научился обходить нашу предыдущую задачу, и начал вводить где 3, а где и 5 пробелов. Напишите программу,
            // которая проверяет пробелы или нет введены в строку. Как защититься от пробелов? Обрезать их. Допустим вы получили значение
            // из input в переменную a. Теперь напишите a = a.trim(); - это обрежет пробелы и результат запишет в переменную a. Теперь просто
            // сравните переменную a c пустой строкой. Если она равна - выведите ошибку, если нет - сообщение с содержимым input.

            let u3_t11_in = document.querySelector('.u3_t11_in');
            let u3_t11_bt = document.querySelector('.u3_t11_bt');
            let u3_t11_div = document.querySelector('.u3_t11_div');

            u3_t11_bt.onclick = function () {
                let a = u3_t11_in.value.trim();

                if( a != '' ) {
                    alert(`Hello ${a}`);
                }else{
                    alert('Укажите ваше имя');
                }
            }


            // Task 12
            // Пользователь может ввести число от 1 до 3. Если пользователь ввел 1 - то в консоль выведите слово "один" и т.д.
            // Для решения используйте switch.

            let u3_t12_in = document.querySelector('.u3_t12_in');
            let u3_t12_bt = document.querySelector('.u3_t12_bt');

            u3_t12_bt.onclick = function () {
                let a = +u3_t12_in.value;

                switch (a) {
                    case 1:
                        console.log(1);
                        break;
                    case 2:
                        console.log(2);
                        break;
                    case 3:
                        console.log(3);
                        break;
                    default:
                        console.log('Другое число');
                }

            }


            // Task 13
            // Пользователь может ввести номер дома. Если дом от 1 до 5 - то улица 1, если от 6 до 11 - улица 2, если от 11 до 20 - улица 3.
            // Используя if, elseif - реализуйте программу, которая будет указывать улицу в зависимости от введенного дома.

            let u3_t13_in = document.querySelector('.u3_t13_in');
            let u3_t13_bt = document.querySelector('.u3_t13_bt');
            let u3_t13_div = document.querySelector('.u3_t13_div');

            u3_t13_bt.onclick = function () {
                let val = +u3_t13_in.value;

                if( val >= 1 && val <=5  ) {
                    u3_t13_div.innerHTML = 'Улица 1';
                } else if ( val >= 6 && val < 11 ){
                    u3_t13_div.innerHTML = 'Улица 2';
                } else if ( val >= 11 && val <= 20 ){
                    u3_t13_div.innerHTML = 'Улица 3';
                }else {
                    u3_t13_div.innerHTML = 'Улица неизвестна';
                }
            }


            // Task 14
            // Создайте input куда пользователь может ввести количество рентген. Это число от 0 и до 1000. С помощью if, else if реализуйте
            // вывод по таблице: от 0 до 25 - не обнаруживается до 50 - снижение числа лимфоцитов до 100 - вялость, рвота, до 150 - смертность 5%,
            // до 350 - смертность 50% за 30 суток, до 600 - 90% смертность за 2 недели. Больше 600 - смертность 100%. Вывод результатов сделайте
            // на страницу.

            let u3_t14_in = document.querySelector('.u3_t14_in');
            let u3_t14_bt = document.querySelector('.u3_t14_bt');
            let u3_t14_div = document.querySelector('.u3_t14_div');

            u3_t14_bt.onclick = function () {
                let val = +u3_t14_in.value;

                if( val >= 0 && val < 25 ) {
                    u3_t14_div.innerHTML = 'Не обнаруживается';
                } else if ( val >= 25 && val < 50 ){
                    u3_t14_div.innerHTML = 'Снижение числа лимфоцитов';
                } else if ( val >= 50 && val < 100 ){
                    u3_t14_div.innerHTML = 'Вялость, рвота';
                }else if ( val >= 100 && val < 150 ){
                    u3_t14_div.innerHTML = 'Смертность 5%';
                }else if ( val >= 150 && val < 350 ){
                    u3_t14_div.innerHTML = 'Смертность 50% за 30 суток';
                }else if ( val >= 350 && val < 600 ){
                    u3_t14_div.innerHTML = '90% смертность за 2 недели';
                }else if ( val >= 600 ){
                    u3_t14_div.innerHTML = 'Cмертность 100%';
                }else {
                    u3_t14_div.innerHTML = 'Прибор сломан';
                }
            }


            // Task 15
            // Создайте переменные x = 1, y = 0. Выведите в консоль результат операции x && y, а затем x || y. Изучите результат.

            let x = 1;
            let y = 0;
            console.log(x && y);
            console.log(x || y);


            // Task 16
            // В Казахстане, налог на объем двигателя составляет:
                //от 0 до 499 кубов - 2525 тенге
                //от 500 до 1199 кубов - 5050 тенге
                //от 1200 до 1599 кубов - 8275 тенге
                //от 1600 до 1899 кубов - 9675 тенге
                //от 1900 до 1999 кубов - 11075тенге
                //от 2000 и выше кубов - 15000 тенге
            //Напишите программу, где пользователь может ввести в input объем двигателя и получить налог на данный двигатель.

            let u3_t16_in = document.querySelector('.u3_t16_in');
            let u3_t16_bt = document.querySelector('.u3_t16_bt');
            let u3_t16_div = document.querySelector('.u3_t16_div');

            u3_t16_bt.onclick = function () {
                let val = +u3_t16_in.value;

                if( val > 0 && val <= 499 ) {
                    u3_t16_div.innerHTML = '2525 тенге';
                } else if ( val >= 500 && val < 1199 ){
                    u3_t16_div.innerHTML = '5050 тенге';
                } else if ( val >= 1200 && val < 1599 ){
                    u3_t16_div.innerHTML = '8275 тенге';
                }else if ( val >= 1600 && val < 1899 ){
                    u3_t16_div.innerHTML = '9675 тенге';
                }else if ( val >= 1900 && val < 1999 ){
                    u3_t16_div.innerHTML = '11075тенге';
                }else if ( val >= 2000 ){
                    u3_t16_div.innerHTML = '15000 тенге';
                }else {
                    u3_t16_div.innerHTML = 'Объем двигателя указан не верно';
                }
            }



            // Task 17
            // Создайте 2 инпута. В первый пользователь может ввести число денег в долларах. Во второй - строку euro, rub, uah.
            // Используя if, elseif сделайте по нажатию кнопки пересчет в ту валюту, которую ввел пользователь.
            // Коэффициенты - найдите в сети интернет.
            let u3_t17_in1 = document.querySelector('.u3_t17_in1');
            let u3_t17_in2 = document.querySelector('.u3_t17_in2');
            let u3_t17_bt = document.querySelector('.u3_t17_bt');
            let u3_t17_div = document.querySelector('.u3_t17_div');

            u3_t17_bt.onclick = function () {
                let val = +u3_t17_in1.value;
                let currency = u3_t17_in2.value;

                if( val && val > 0) {

                    if ( currency == 'euro' ){
                        u3_t17_div.innerHTML = (val * 0.91).toFixed(2);
                    }else if ( currency == 'rub' ){
                        u3_t17_div.innerHTML = (val * 64.22).toFixed(2);
                    }else if ( currency == 'uah' ){
                        u3_t17_div.innerHTML = (val * 24.53).toFixed(2);
                    }

                }else {
                    u3_t17_div.innerHTML = 'Укажите сумму';
                }
            }



            // Task 18
            // Проделайте предыдущую задачу с помощью switch case.

            let u3_t18_in1 = document.querySelector('.u3_t18_in1');
            let u3_t18_in2 = document.querySelector('.u3_t18_in2');
            let u3_t18_bt = document.querySelector('.u3_t18_bt');
            let u3_t18_div = document.querySelector('.u3_t18_div');

            u3_t18_bt.onclick = function () {
                let val = +u3_t18_in1.value;
                let currency = u3_t18_in2.value;

                if( val && val > 0) {
                    switch (currency) {
                        case 'euro':
                            u3_t18_div.innerHTML = (val * 0.91).toFixed(2);
                            break;
                        case 'rub':
                            u3_t18_div.innerHTML = (val * 64.22).toFixed(2);
                            break;
                        case 'uah':
                            u3_t18_div.innerHTML = (val * 24.53).toFixed(2);
                            break;
                    }
                }else {
                    u3_t18_div.innerHTML = 'Укажите сумму';
                }
            }


            // Task 19
            // Создайте 2 input куда пользователь может ввести числа. В третий input - может ввести знак - минус, плюс, умножить, поделить.
            // С помощью if, else if по нажатию кнопки выводите результат выбранной операции на страницу.

            let u3_t19_in1 = document.querySelector('.u3_t19_in1');
            let u3_t19_in2 = document.querySelector('.u3_t19_in2');
            let u3_t19_in3 = document.querySelector('.u3_t19_in3');
            let u3_t19_bt = document.querySelector('.u3_t19_bt');
            let u3_t19_div = document.querySelector('.u3_t19_div');

            u3_t19_bt.onclick = function () {
                let a = +u3_t19_in1.value;
                let b = +u3_t19_in3.value;
                let sign = u3_t19_in2.value;

                if( (a == a && a != '') && (b == b && b != '') ) {

                    if (sign == '-'){
                        u3_t19_div.innerHTML = a - b;
                    }else if (sign == '+'){
                        u3_t19_div.innerHTML = a + b;
                    }else if (sign == '*'){
                        u3_t19_div.innerHTML = a * b;
                    }else if (sign == '/'){
                        u3_t19_div.innerHTML = a / b;
                    }

                }else {
                    u3_t19_div.innerHTML = 'Введите корректные значения';
                }
            }


            // Task 20
            // Проделайте предыдущую задачу с помощью switch case.

            let u3_t20_in1 = document.querySelector('.u3_t20_in1');
            let u3_t20_in2 = document.querySelector('.u3_t20_in2');
            let u3_t20_in3 = document.querySelector('.u3_t20_in3');
            let u3_t20_bt = document.querySelector('.u3_t20_bt');
            let u3_t20_div = document.querySelector('.u3_t20_div');

            u3_t20_bt.onclick = function () {
                let a = +u3_t20_in1.value;
                let b = +u3_t20_in3.value;
                let sign = u3_t20_in2.value;

                if( (a == a && a != '') && (b == b && b != '') ) {
                    switch (sign) {
                        case '-':
                            u3_t20_div.innerHTML = a - b;
                            break;
                        case '+':
                            u3_t20_div.innerHTML = a + b;
                            break;
                        case '*':
                            u3_t20_div.innerHTML = a * b;
                            break;
                        case '/':
                            u3_t20_div.innerHTML = a / b;
                            break;
                    }
                }else {
                    u3_t20_div.innerHTML = 'Введите корректные значения';
                }
            }

            </pre>
        </div>
    </div>

</div>



<div class="linear" id="use_strict">
    <h1>Урок 4. Работаем с формами: input, range, textarea, checkbox...</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // Создайте button - при нажатии на него выводите alert с номером задачи.

                document.querySelector('.u4_t1_bt').onclick = () => {alert('Task 1');}



                // Task 2
                // Создайте input type=button - при нажатии на него выводите alert с номером задачи.

                let u4_t2_in = document.querySelector('.u4_t2_in');
                u4_t2_in.onclick = () => {alert(u4_t2_in.value);}



                // Task 3
                // Создайте p - при нажатии на него выводите alert с номером задачи.

                let u4_t3_p = document.querySelector('.u4_t3_p');
                u4_t3_p.onclick = () => {alert(u4_t3_p.innerText);}



                // Task 4
                // Создайте input(checkbox) и button - при нажатии на него выводите true если checkbox выбран и false если нет.

                let u4_t4_in = document.querySelector('#u4_t4_in');
                document.querySelector('.u4_t4_bt').onclick = function () {
                    if (u4_t4_in.checked){
                        alert('true');
                    } else {
                        alert('false');
                    }
                }



                // Task 5
                // Создайте input(checkbox) и button. Добавьте value для checkbox. При нажатии на него выводите value если checkbox выбран и false если нет.

                let u4_t5_in = document.querySelector('#u4_t5_in');
                let u4_t5_bt = document.querySelector('.u4_t5_bt');

                u4_t5_in.oninput = u4_t5_fn;
                u4_t5_bt.onclick = u4_t5_fn;

                function u4_t5_fn() {
                    if (u4_t5_in.checked){
                        alert(u4_t5_in.value);
                    } else {
                        alert('false');
                    }
                }

                //Условие написано странно. Не понятно, что на что нажимать. Если нажимать на input, то зачем в html создавать button?
                //В Task 4 такая же проблема.



                // Task 6
                // Создайте input(hidden) и button - при нажатии на него выводите alert с value прописанным в input.

                let u4_t6_in = document.querySelector('#u4_t6_in');
                document.querySelector('#u4_t6_bt').onclick = () => {alert(u4_t6_in.value);}



                // Task 7
                // Создайте input(password) и button - при нажатии на него выводите alert с value прописанным в input. Выводите в консоль предупреждение, если длина пароля меньше 6 символов.

                let u4_t7_in = document.querySelector('#u4_t7_in');
                document.querySelector('#u4_t7_bt').onclick = function () {
                    alert(u4_t7_in.value);
                    if(u4_t7_in.value.length < 6) {
                        console.log('Ваш пароль меньше 6 символов');
                    }
                }



                // Task 8
                // Создайте div и кнопку. При нажатии кнопки создавайте внутри div элемент input и кнопку (innerHTML). Добавьте на созданную кнопку событие - при клике выводить alert c содержимым созданного input.

                let u4_t8_div = document.querySelector('#u4_t8_div');
                document.querySelector('#u4_t8_bt').onclick = function () {

                    u4_t8_div.innerHTML = '<input type="text" id="u4_t8_in">';
                    u4_t8_div.innerHTML += '<button id="u4_t8_bt2">Показать значение</button>';
                    document.querySelector('#u4_t8_bt2').onclick = () => {alert(u4_t8_in.value);}
                }



                // Task 9
                // Создайте один input(radio) . и button - при нажатии на button выводите alert с value прописанным в активном (если он активен, если нет - то alert - false) radiobutton.

                let u4_t9_in = document.querySelector('#u4_t9_in');
                document.querySelector('#u4_t9_bt').onclick = function () {
                    if (u4_t9_in.checked){
                        alert('true');
                    } else {
                        alert('false');
                    }
                }



                // Task 10
                // Создайте input(color) и button - при нажатии на него окрашивайте div выбранным цветом.

                let u4_t10_in = document.querySelector('#u4_t10_in');
                document.querySelector('#u4_t10_bt').onclick = function () {
                    this.style.backgroundColor = u4_t10_in.value;
                }


                // Task 11
                // Создайте input(color) - два элемента и button - при нажатии на кнопку присвойте цвет из первого input в value второго.

                let u4_t11_in1 = document.querySelector('#u4_t11_in1');
                let u4_t11_in2 = document.querySelector('#u4_t11_in2');

                document.querySelector('#u4_t11_bt').onclick = function () {
                    u4_t11_in2.value = u4_t11_in1.value;
                }



                // Task 12
                // Создайте input(date) и button - при нажатии на кнопку выводите на страницу выбранную дату.

                let u4_t12_in = document.querySelector('#u4_t12_in');

                document.querySelector('#u4_t12_bt').onclick = function () {
                    document.querySelector('.u4_t12_div').innerHTML = u4_t12_in.value;
                }



                // Task 13
                // Создайте input(range) и button - при нажатии на кнопку выводите на страницу значение из input. Добавьте событие oninput на range и тоже выводите значение на страницу.

                let u4_t13_in = document.querySelector('#u4_t13_in');
                let u4_t13_bt = document.querySelector('#u4_t13_bt');
                let u4_t13_div1 = document.querySelector('#u4_t13_div1');
                let u4_t13_div2 = document.querySelector('#u4_t13_div2');

                u4_t13_in.oninput = () => {u4_t13_div1.innerHTML = u4_t13_in.value;}
                u4_t13_bt.onclick = () => {u4_t13_div2.innerHTML = u4_t13_in.value;}



                // Task 14
                // Создайте text-area и button - при нажатии на кнопку выводите на страницу значение из textarea.

                let u4_t14_textarea = document.querySelector('#u4_t14_textarea');
                let u4_t14_bt = document.querySelector('#u4_t14_bt');
                let u4_t14_div1 = document.querySelector('#u4_t14_div1');
                let u4_t14_div2 = document.querySelector('#u4_t14_div2');

                u4_t14_textarea.oninput = () => {u4_t14_div1.innerHTML = u4_t14_textarea.value;}
                u4_t14_bt.onclick = () => {u4_t14_div2.innerHTML = u4_t14_textarea.value;}


                // Task 15
                // Создайте text-area, input и button - при нажатии на кнопку выводите текс из input в textarea и на страницу.

                let u4_t15_textarea = document.querySelector('#u4_t15_textarea');
                let u4_t15_bt = document.querySelector('#u4_t15_bt');
                let u4_t15_in = document.querySelector('#u4_t15_in');
                let u4_t15_div = document.querySelector('#u4_t15_div');

                u4_t15_bt.onclick = function () {
                    u4_t15_textarea.value = u4_t15_in.value;
                    u4_t15_div.value = u4_t15_in.value;
                }



                // Task 16
                // Создайте select и button - при нажатии на кнопку выводите на страницу value выбраннов в select option.

                let u4_t16_in = document.querySelector('#u4_t16_in');
                let u4_t16_bt = document.querySelector('#u4_t16_bt');
                let u4_t16_div = document.querySelector('#u4_t16_div');

                u4_t16_bt.onclick = function () {
                    u4_t16_div.innerHTML = u4_t16_in.value;
                }



                // Task 17
                // Эту задачу пока не делаем!!!!!



                // Task 18
                // Создайте select добавьте на него событие onchange. По данному событию выводите value выбранного option на страницу.

                let u4_t18_div = document.querySelector('#u4_t18_div');
                document.querySelector('#u4_t18_in').onchange = function () {
                    u4_t18_div.innerHTML = this.value;
                }



                // Task 19
                // Создайте форму. В ней input(text) и input(password) - и кнопку. По нажатию кнопки выводите значение text и password в консоль!.

                document.querySelector('#u4_t19_bt').onclick = function (e) {
                    e.preventDefault();

                    let u4_t19_in1 = document.querySelector('#u4_t19_in1');
                    let u4_t19_in2 = document.querySelector('#u4_t19_in2');

                    console.log(`text: ${u4_t19_in1.value}, password ${u4_t19_in2.value}`)
                }



                // Task 20
                // Создайте форму. В ней input(text) и input(password) - и кнопку. По нажатию кнопки выводите значение text и password в консоль! Используйте form.elements (читать)

                document.querySelector('#u4_t20_bt').onclick = function (e) {
                    e.preventDefault();

                    let form = document.forms.u4_t20_form;
                    let a = form.elements.u4_t20_in1.value;
                    let b = form.elements.u4_t20_in2.value;

                    console.log(`text: ${a}, password ${b}`)
                }


            </pre>
        </div>
    </div>

</div>



<div class="linear" id="use_strict">
    <h1>Урок 5. Циклы в JavaScript (часть 1)</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // Выведите в консоль с помощью цикла числа от 1 до 10.

                for(let i = 1; i <= 10; i++) {
                    console.log(i);
                }



                // Task 2
                // Выведите на страницу с помощью цикла числа от 1 до 10.

                let task2 = '';
                for(let i = 1; i < 10; i++) {
                    task2 += i + ' '
                }
                document.querySelector('#u5_t2_div').innerHTML = task2;



                // Task 3
                // Выведите на страницу с помощью цикла числа в диапазоне от 10 до 0.

                let task3 = '';
                for(let i = 9; i > 0; i--) {
                    task3 += i + ' '
                }
                document.querySelector('#u5_t3_div').innerHTML = task3;



                // Task 4
                // Выведите на страницу с помощью цикла числа в диапазоне от 0 до 10 с шагом 2.

                let task4 = '';
                for(let i = 0; i < 10; i = i + 2) {
                    task4 += i + ' '
                }
                document.querySelector('#u5_t4_div').innerHTML = task4;



                // Task 5
                // Выведите на страницу с помощью цикла числа в диапазоне от 21 до 0 с шагом 3.

                let task5 = '';
                for(let i = 21; i > 0; i = i - 3) {
                    task5 += i + ' '
                }
                document.querySelector('#u5_t5_div').innerHTML = task5;



                // Task 6
                // Используя строку ****** - нарисуйте квадрат 6х6 и выведите его на страницу.

                let task6 = '******';
                let str6 = '';

                for(let i = 0; i < 6; i++) {
                    str6 += task6 + "<br>";
                }

                document.querySelector('#u5_t6_div').innerHTML = str6;



                // Task 7
                // Создайте input, button. По клику на кнопку выведите на страницу все числа, начиная от введенного пользователем в input до нуля.

                let u5_t7_in = document.querySelector('#u5_t7_in');
                let u5_t7_div = document.querySelector('#u5_t7_div');

                document.querySelector('#u5_t7_bt').onclick = function () {

                    let num = u5_t7_in.value;
                    let str7 = '';

                    for(let i = num,k = 2; i > 0; i--) {

                        if (i == num) {
                            for(let j = num; j > 0; j--){
                                if (j == 1){
                                    str7 += `<span>${j}</span>`;
                                }else{
                                    str7 += `<span>${j}</span><span></span>`;
                                }
                            }
                            str7 += "<br>";
                        }else if (i == 1) {
                            for(let j = 1; j <= num; j++){
                                if (j == num){
                                    str7 += `<span>${j}</span>`;
                                }else{
                                    str7 += `<span>${j}</span><span></span>`;
                                }
                            }
                        }else {
                            let num2 = num*2-2;
                            for(let j = 1; j <= num2; j++){
                                if(j == 1){
                                    str7 += `<span>${i}</span><span></span>`;
                                }else if(j == num2){
                                    str7 += `<span>${k++}</span>`;
                                }else{
                                    str7 += `<span></span>`;
                                }

                            }
                            str7 += "<br>";
                        }

                    }

                    u5_t7_div.innerHTML = str7;
                }//Уфффф, не знаю зачем ко мне пришла такя мысль, но придумать решение было действительно интесно



                // Task 8
                // Создайте input,input, button. По клику на кнопку выведите на страницу все числа, в диапазоне введенных пользователем чисел. Считаем что второе число всегда больше первого.

                let u5_t8_in1 = document.querySelector('#u5_t8_in1');
                let u5_t8_in2 = document.querySelector('#u5_t8_in2');
                let u5_t8_div = document.querySelector('#u5_t8_div');

                document.querySelector('#u5_t8_bt').onclick = function () {

                    let a = u5_t8_in1.value;
                    let b = u5_t8_in2.value;
                    let txt = '';

                    for (let i = a; i <= b; i++){
                        txt += i + " ";
                    }

                    u5_t8_div.innerHTML = txt;
                }



                // Task 9
                // Доработайте предыдущую задачу. Добавьте проверку введенных чисел, если второе число больше первого - то делаем вывод, если нет - выводим alert о ошибке.

                let u5_t9_in1 = document.querySelector('#u5_t9_in1');
                let u5_t9_in2 = document.querySelector('#u5_t9_in2');
                let u5_t9_div = document.querySelector('#u5_t9_div');

                document.querySelector('#u5_t9_bt').onclick = function () {

                    let a = u5_t9_in1.value;
                    let b = u5_t9_in2.value;

                    if( a < b ){
                        let txt = '';

                        for (let i = a; i <= b; i++){
                            txt += i + " ";
                        }

                        u5_t9_div.innerHTML = txt;
                    } else {
                        alert('Значение не корректно!');
                        u5_t9_div.innerHTML = '';
                    }

                }



                // Task 10
                // Выведите на страницу все четные годы в промежутке от 1901 до 1950.

                let u5_t10_div = document.querySelector('#u5_t10_div');
                let num = '';

                for (let i = 1901; i <= 1950; i++) {
                    if ( i % 2 == 0 ){
                        num += i++ + ' ';
                    }
                }

                u5_t10_div.innerHTML = num;



                // Task 11
                // Создайте несколько div.one. С помощью length выведите количество div.one на странице.

                let u5_t11_div = document.querySelector('.u5_t11_div');
                let u5_t11_div_one = document.querySelectorAll('.u5_t11_div_one');

                u5_t11_div.innerHTML = u5_t11_div_one.length;



                // Task 12
                // Создайте кнопку, при нажатии на которую запускается функция. Функция окрашивает все div.one в оранжевый цвет.

                let u5_t12_div_one = document.querySelectorAll('.u5_t12_div_one');

                document.querySelector('#u5_t12_bt').onclick = function () {

                    for (let i = 0; i < u5_t12_div_one.length; i++) {
                        u5_t12_div_one[i].style.backgroundColor = "orange";
                    }

                }



                // Task 13
                // Создайте кнопку, при нажатии на которую запускается функция. Функция выводит в консоль содержимое всех div.one.

                let u5_t13_div_one = document.querySelectorAll('.u5_t13_div_one');

                document.querySelector('#u5_t13_bt').onclick = function () {

                    for (let i = 0; i < u5_t13_div_one.length; i++) {
                        console.log(u5_t13_div_one[i].textContent);
                    }

                }



                // Task 14
                // Создайте кнопку, при нажатии на которую запускается функция. Функция для всех input[type="text"] устанавливает свойство placeholder = 'Введите данные'

                let u5_t14_Input = document.querySelectorAll('input[type="text"]');

                document.querySelector('#u5_t14_bt').onclick = function () {

                    for (let i = 0; i < u5_t14_Input.length; i++) {
                        u5_t14_Input[i].setAttribute('placeholder','Введите данные');
                    }

                }



                // Task 15
                // Создайте кнопку, при нажатии на которую запускается функция. Функция выводит в консоль количество input[type="text"]

                document.querySelector('#u5_t15_bt').onclick = function () {

                    let inpTxt = document.querySelectorAll('input[type="text"]');
                    console.log(inpTxt.length);

                }



                // Task 16
                // Создайте три связанных radiobutton[name="p1"]. Задайте им value. При нажатии на кнопку выводите на страницу value выбранного.

                let u5_t16_in = document.querySelectorAll('.u5_t16_in');
                let u5_t16_div = document.querySelector('.u5_t16_div');

                document.querySelector('#u5_t16_bt').onclick = function () {

                    for (let i = 0; i < u5_t16_in.length; i++) {
                        if (u5_t16_in[i].checked) {
                            u5_t16_div.innerHTML = u5_t16_in[i].value;
                            break;
                        }
                    }

                }



                // Task 17
                // Добавьте кнопку. При нажатии кнопки делайте первый из созданных radiobutton в примере выше - checked.

                let u5_t17_in = document.querySelectorAll('.u5_t17_in');

                document.querySelector('#u5_t17_bt').onclick = function () {

                    u5_t17_in[0].checked = true

                }



                // Task 18
                // Получите все radiobutton[name="p1"]. C помощью цикла замените в них value. Первому элементу присвойте value = 0, второму value = 1 и т.д.

                let u5_t18_in = document.querySelectorAll('.u5_t18_in');

                document.querySelector('#u5_t18_bt').onclick = function () {

                    for (let i = 0; i < u5_t18_in.length; i++) {
                        u5_t18_in[i].value = i;
                    }

                }



                // Task 19
                // Создайте 3 input[radiobutton][name="p2"]. Задайте им value равное 5, 3, 6. Добавьте кнопку при нажатии на котору
                // проверяйте value выбранного элемента. Если оно не равно 6 - выводите false, если равно - true.

                let u5_t19_in = document.querySelectorAll('.u5_t19_in');
                let u5_t19_div = document.querySelector('#u5_t19_div');

                document.querySelector('#u5_t19_bt').onclick = function () {

                    for (let i = 0; i < u5_t19_in.length; i++) {

                        if (u5_t19_in[i].checked && u5_t19_in[i].value == '6') {
                            u5_t19_div.innerHTML = 'true';
                            break;
                        } else {
                            u5_t19_div.innerHTML = 'false';
                        }
                    }

                }



                // Task 20
                // Создайте 3 input[radiobutton][name="p3"]. С помощью цикла добавьте на них событие oninput. При изменении состояния input - выводите в консоль текст "был изменен input"

                let u5_t20_in = document.querySelectorAll('.u5_t20_in');

                for (let i = 0; i < u5_t20_in.length; i++) {

                    u5_t20_in[i].oninput = u5_t20_funk;

                }

                function u5_t20_funk() {
                    console.log('был изменен input');
                }

            </pre>
        </div>
    </div>

</div>



<div class="linear" id="use_strict">
    <h1>Урок 6. Вложенные циклы в JavaScript (часть 2)</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // С помощью вложенных циклов и символа * нарисуйте:  *** *** ***

                let txt_u1 = '';
                for(let i = 0; i < 3; i++){
                    for(let k = 0; k < 3; k++){
                        txt_u1 += '*';
                    }
                    txt_u1 += ' ';
                }

                document.querySelector('.u6_t1_div').innerHTML = txt_u1;



                // Task 2
                // С помощью вложенных циклов и символа * нарисуйте:
                // *****
                // *****
                // *****

                let txt_u2 = '';
                for(let i = 0; i < 3; i++){
                    for(let k = 0; k < 5; k++){
                        txt_u2 += '*';
                    }
                    txt_u2 += '<br>';
                }

                document.querySelector('.u6_t2_div').innerHTML = txt_u2;



                // Task 3
                // С помощью вложенных циклов и символа 1,0 нарисуйте прямоугольник. 1 или 0 выводите в зависимости от того четная или нет переменная внутреннего цикла.
                //  101010
                //  101010
                //  101010

                let txt_u3 = '';
                for(let i = 0; i < 3; i++){

                    for(let k = 0; k < 6; k++){
                        if ( !(k % 2) ){
                            txt_u3 += '1';
                        }else{
                            txt_u3 += '0';
                        }
                    }

                    txt_u3 += '<br>';
                }

                document.querySelector('.u6_t3_div').innerHTML = txt_u3;




                // Task 4
                // С помощью вложенных циклов и символа 1,0 нарисуйте прямоугольник. 1 или 0 выводите в зависимости от того четная или нет переменная внутреннего цикла. Каждый третий элемент заменяйте на x:
                // 10x01x
                // 10x01x
                // 10x01x

                let txt_u4 = '';
                for(let i = 0; i < 3; i++){

                    for(let k = 1; k < 7; k++){
                        if ( k % 3 == 0 ) {
                            txt_u4 += 'x';
                        } else if ( k % 2 ){
                            txt_u4 += '1';
                        } else {
                            txt_u4 += '0';
                        }
                    }

                    txt_u4 += '<br>';
                }

                document.querySelector('.u6_t4_div').innerHTML = txt_u4;



                // Task 5
                // С помощью вложенных циклов и символа * нарисуйте:
                // *
                // **
                // ***

                let txt_u5 = '';

                for(let i = 0; i <= 3; i++){
                    for(let k = 0; k < i; k++){
                        txt_u5 += '*';
                    }
                    txt_u5 += '<br>';
                }

                document.querySelector('.u6_t5_div').innerHTML = txt_u5;



                // Task 6
                // С помощью вложенных циклов и символа * нарисуйте:
                // *****
                // ****
                // ***
                // **
                // *

                let txt_u6 = '';

                for(let i = 5; i > 0; i--){
                    for(let k = i; k > 0; k--){
                        txt_u6 += '*';
                    }
                    txt_u6 += '<br>';
                }

                document.querySelector('.u6_t6_div').innerHTML = txt_u6;



                // Task 7
                // С помощью вложенных циклов и символа * нарисуйте:
                //  *****
                // *****
                //*****

                let txt_u7 = '';

                for(let i = 3; i > 0; i--){
                    for(let k = i; k > 0; k--){
                        txt_u7 += '&nbsp;&nbsp;';
                    }
                    txt_u7 += '****** <br>';
                }

                document.querySelector('.u6_t7_div').innerHTML = txt_u7;





                // Task 8
                // С помощью вложенных циклов и символа * нарисуйте:
                // *
                // **
                // ***
                // **
                // *

                let txt_u8 = '';
                let max_t8 = 3;

                for(let i = 0; i <= max_t8; i++){
                    for(let k = 0; k < i; k++){
                        txt_u8 += '*';
                    }
                    txt_u8 += '<br>';
                }

                for(let i = max_t8-1; i > 0; i--){
                    for(let k = i; k > 0; k--){
                        txt_u8 += '*';
                    }
                    txt_u8 += '<br>';
                }

                document.querySelector('.u6_t8_div').innerHTML = txt_u8;



                // Task 9
                // С помощью вложенных циклов и символа * нарисуйте:
                // ******
                // *    *
                // *    *
                // *    *
                // ******

                let txt_u9 = '';
                let height_t9 = 5;
                let width_t9 = 6;

                for(let i = 1; i <= height_t9; i++){

                    if( i == 1) {
                        for(let k = 1; k <= width_t9; k++){
                            txt_u9 += '*';
                        }
                    }else if (i == height_t9) {
                        for(let k = 1; k <= width_t9; k++){
                            txt_u9 += '*';
                        }
                    }else {
                        for(let j = 1; j <= width_t9; j++){
                            if(j == 1 || j == width_t9){
                                txt_u9 += '*';
                            }else{
                                txt_u9 += '&nbsp;&nbsp;';
                            }

                        }
                    }

                    txt_u9 += '<br>';
                }

                document.querySelector('.u6_t9_div').innerHTML = txt_u9;



                // Task 10
                // С помощью вложенных циклов и символа который вводит пользователь нарисуйте:
                // ******
                // *    *
                // *    *
                // *    *
                // ******

                document.querySelector('#u6_t10_in').oninput = function () {

                    let u6_t10_val = u6_t10_in.value;
                    if (u6_t10_val == u6_t10_val) {

                        let txt_u10 = '';
                        let height_t10 = 5;
                        let width_t10 = 6;

                        for(let i = 1; i <= height_t10; i++){

                            if( i == 1) {
                                for(let k = 1; k <= width_t10; k++){
                                    txt_u10 += `<span>${u6_t10_val}</span>`;
                                }
                            }else if (i == height_t10) {
                                for(let k = 1; k <= width_t10; k++){
                                    txt_u10 += `<span>${u6_t10_val}</span>`;
                                }
                            }else {
                                for(let j = 1; j <= width_t10; j++){
                                    if(j == 1 || j == width_t10){
                                        txt_u10 += `<span>${u6_t10_val}</span>`;
                                    }else{
                                        txt_u10 += `<span></span>`;
                                    }

                                }
                            }

                            txt_u10 += '<br>';
                        }

                        document.querySelector('.u6_t10_div').innerHTML = txt_u10;

                    }

                }


                // Task 11
                // С помощью вложенных циклов вывените таблицу умножения на 6 и 7.

                let u6_t11_div = document.querySelector('.u6_t11_div');
                let u6_t11_txt = '';

                for(let i = 6; i <=7; i++){

                    for(let k = 1; k <= 10; k++){
                        u6_t11_txt += `${i} * ${k} = ${i * k}<br>`
                    }

                    u6_t11_txt += '<br>'
                }



                u6_t11_div.innerHTML = u6_t11_txt;



                // Task 12
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // 1
                // 1 2
                // 1 2 3
                // 1 2 3 4
                // 1 2 3 4 5


                let u6_t12_txt = '';

                for(let i = 1; i <= 5; i++){

                    for(let k = 1; k <= i; k++){
                        u6_t12_txt += `${k}&nbsp;`;
                    }

                    u6_t12_txt += '<br>';
                }

                document.querySelector('.u6_t12_div').innerHTML = u6_t12_txt;



                // Task 13
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // 01 02 03 04 05 06 07 08 09 10
                // 11 12 13 14 15 16 17 18 19 20
                // 21 22 23 24 25 26 27 28 29 30
                // 31 32 33 34 35 36 37 38 39 40
                // 41 42 43 44 45 46 47 48 49 50

                let u6_t13_txt = '';

                for(let i = 1, k = 1; i <= 50; i++){

                    if(i < 10){
                        u6_t13_txt += `0${i}&nbsp;`;
                    }else if(i / 10 / k == 1){
                        u6_t13_txt += `${i}<br>`;
                        k++;
                    }else{
                        u6_t13_txt += `${i}&nbsp;`;
                    }

                }

                document.querySelector('.u6_t13_div').innerHTML = u6_t13_txt;


                // Task 14
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // 5 4 3 2 1
                // 4 3 2 1
                // 3 2 1
                // 2 1
                // 1

                let u6_t14_txt = '';

                for(let i = 5; i >= 1; i--){

                    for(let k = i; k >= 1; k--){
                        u6_t14_txt += `${k}&nbsp;`;
                    }

                    u6_t14_txt += '<br>';
                }

                document.querySelector('.u6_t14_div').innerHTML = u6_t14_txt;


                // Task 15
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // X X X X 1
                // X X X 2 1
                // X X 3 2 1
                // X 4 3 2 1
                // 5 4 3 2 1

                let u6_t15_txt = '';

                for(let i = 1; i <= 5; i++){

                    for(let k = 5; k > i; k--){
                        u6_t15_txt += `X&nbsp;`;
                    }

                    for(let k = i; k >= 1; k--){
                        u6_t15_txt += `${k} &nbsp;`;
                    }

                    u6_t15_txt += '<br>';
                }

                document.querySelector('.u6_t15_div').innerHTML = u6_t15_txt;


                // Task 16
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // 1
                // 2  2
                // 3  3  3
                // 4  4  4  4
                // 5  5  5  5  5

                let u6_t16_txt = '';

                for(let i = 1; i <= 5; i++){

                    for(let k = 1; k <= i; k++){
                        u6_t16_txt += `${i}&nbsp;`;
                    }

                    u6_t16_txt += '<br>';
                }

                document.querySelector('.u6_t16_div').innerHTML = u6_t16_txt;



                // Task 17
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
                // 5
                // 4  4
                // 3  3  3
                // 2  2  2  2
                // 1  1  1  1  1

                let u6_t17_txt = '';

                for(let i = 1, j = 5; i <= 5; i++){

                    for(let k = 1; k <= i; k++){
                        u6_t17_txt += `${j}&nbsp;`;
                    }
                    j--;
                    u6_t17_txt += '<br>';
                }

                document.querySelector('.u6_t17_div').innerHTML = u6_t17_txt;



                // Task 18
                // С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла (четные заменены на X):
                // 5
                // X  X
                // 3  3  3
                // X  X  X  X
                // 1  1  1  1  1

                let u6_t18_txt = '';

                for(let i = 1, j = 5; i <= 5; i++){

                    if(j % 2 == 0){

                        for(let k = 1; k <= i; k++){
                            u6_t18_txt += `X&nbsp;`;
                        }

                    }else{

                        for(let k = 1; k <= i; k++){
                            u6_t18_txt += `${j}&nbsp;`;
                        }

                    }

                    j--;
                    u6_t18_txt += '<br>';
                }

                document.querySelector('.u6_t18_div').innerHTML = u6_t18_txt;



                // Task 19
                // С помощью вложенных циклов и символа * нарисуйте:
                //   *****
                //  *******
                // *********

                let u6_t19_txt = '';

                for(let i = 1, k = 2, max = 9; i <= 3; i++){

                    for(let j = 1; j <= max; j++){
                        if( j < k || j == k ){
                            u6_t19_txt += `&nbsp;&nbsp;`;
                        }else if ( max - j < k  ){
                            u6_t19_txt += `&nbsp;&nbsp;`;
                        }else{
                            u6_t19_txt += `*`;
                        }

                    }
                    k--;
                    u6_t19_txt += '<br>';

                }



                document.querySelector('.u6_t19_div').innerHTML = u6_t19_txt;



                // Task 20
                // С помощью вложенных циклов и символа * нарисуйте:
                //   **
                //  ****
                // ******
                //  ****
                //   **

                let u6_t20_txt = '';

                for(let i = 1, k = 2, max = 6,h = 5; i <= h; i++){

                    if( i < Math.ceil(h / 2) || i == Math.ceil(h / 2) ){

                        for(let j = 1; j <= max; j++){

                            if( j < k || j == k ){
                                u6_t20_txt += `&nbsp;&nbsp;`;
                            }else if ( max - j < k  ){
                                u6_t20_txt += `&nbsp;&nbsp;`;
                            }else{
                                u6_t20_txt += `*`;
                            }

                        }
                        k--;
                        u6_t20_txt += '<br>';

                    }else{

                        for(let j = 1; j <= max; j++){

                            if( j < k || j == k ){
                                u6_t20_txt += `&nbsp;&nbsp;`;
                            }else if ( max - j < k  ){
                                u6_t20_txt += `&nbsp;&nbsp;`;
                            }else{
                                u6_t20_txt += `*`;
                            }

                        }
                        k++;
                        u6_t20_txt += '<br>';

                    }

                    if( k < 0) { k = 1; }
                }




                document.querySelector('.u6_t20_div').innerHTML = u6_t20_txt;


            </pre>
        </div>
    </div>

</div>



<div class="linear" id="use_strict">
    <h1>Урок 7. Функции и все о них</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // Напишите функцию t1, которая при нажатии кнопки выводит в out-1 переменную a1.

                let u7_t1_a1 = 8;

                function u7_t1_funk() {
                    document.querySelector('.u7_t1_div').textContent = u7_t1_a1;
                }

                document.querySelector('.u7_t1_bt').onclick = u7_t1_funk;



                // Task 2
                // Изменим задачу 1. Сейчас она только выводит переменную в заранее заданный блок. Давайте сделаем так, чтобы функция,
                // была более гибкой. Пусть теперь функция t2 возвращает переменную a2. Поскольку функция возвращает переменную, то имя
                // функции со скобками (вызов функции) можно встраивать в выражения. Обратите внимание, как изменился вызов функции.

                let u7_t2_a2 = 8;

                function u7_t2_funk() {
                    return u7_t2_a2;
                }

                document.querySelector('.u7_t2_bt').onclick =function() {
                    document.querySelector('.u7_t2_div').textContent = u7_t2_funk();
                }



                // Task 3
                // Наша предыдущая функция, сильно все еще зависима от внешних переменных. Давайте сделаем ее более универсальной.
                // Пусть функция t3 принимает 2 параметра и выводит их произведение. Допишите код функции так, чтобы она возвращала произведение
                // двух чисел, переданных ей в качестве параметра a, b. Протестируем функцию на двух примерах, с помощью кнопок b3-1 и b3-2.

                function u7_t3_funk(a,b) {
                    return a * b;
                }
                document.querySelector('.u7_t3_bt_1').onclick =function() {
                    document.querySelector('.u7_t3_div').textContent = u7_t3_funk(3,4);
                }
                document.querySelector('.u7_t3_bt_2').onclick = function(){
                    document.querySelector('.u7_t3_div').textContent = u7_t3_funk(5,6);
                }



                // Task 4
                // Напишите функцию t4 которая принимает ваш год рождения и вычисляет ваш возраст.

                let u7_t4_in =  document.querySelector('#u7_t4_in');

                function u7_t4_funk() {

                    let year = +u7_t4_in.value;
                    let now = new Date().getFullYear();

                    return now - year;

                }

                document.querySelector('.u7_t4_bt').onclick = function(){
                    document.querySelector('.u7_t4_div').textContent = u7_t4_funk();
                }



                // Task 5
                // Напишите функцию t5, которая принимает ваше имя в качестве параметра и возвращает строку Hello name, где name - принятое в качестве параметра имя.

                let u7_t5_in =  document.querySelector('#u7_t5_in');

                function u7_t5_funk() {

                    let name = u7_t5_in.value;

                    return 'Hello ' + name;

                }

                document.querySelector('.u7_t5_bt').onclick = function(){
                    document.querySelector('.u7_t5_div').textContent = u7_t5_funk();
                }



                // Task 6
                // Напишите функцию t6, которая принимает 2 числа и возвращает случайное целое число от первого до второго принятого параметра.

                let u7_t6_in_1 =  document.querySelector('#u7_t6_in_1');
                let u7_t6_in_2 =  document.querySelector('#u7_t6_in_2');

                function u7_t6_funk() {

                    let min = +u7_t6_in_1.value;
                    let max = +u7_t6_in_2.value;

                    return Math.floor(Math.random() * (max - min + 1)) + min;

                }

                document.querySelector('.u7_t6_bt').onclick = function(){
                    document.querySelector('.u7_t6_div').textContent = u7_t6_funk();
                }



                // Task 7
                // Напишите функцию t7, которая возвращает случайный цвет в формате rgb(x,y,z) (строка). Где x,y,z - случайные числа в диапазоне [0, 255].

                let u7_t7_div =  document.querySelector('.u7_t7_div');

                function u7_t7_funk() {

                    let min = 0;
                    let max = 255;

                    let a = Math.floor(Math.random() * (max - min + 1)) + min;
                    let b = Math.floor(Math.random() * (max - min + 1)) + min;
                    let c = Math.floor(Math.random() * (max - min + 1)) + min;

                    return `rgb(${a},${b},${c})`;
                }

                document.querySelector('.u7_t7_bt').onclick = function(){
                    u7_t7_div.style.backgroundColor = u7_t7_funk();
                }


                // Task 8
                // Напишите функцию t8, которая принимает строку в качестве параметра и возвращает результат с очищенными пробелами в начале
                // и вконце строки. Т.е. принимает _hello_ (где знак _ символизирует пробел), а возвращает hello. Для удаления пробелов - используйте trim.

                let u7_t8_in =  document.querySelector('#u7_t8_in');
                let u7_t8_div =  document.querySelector('.u7_t8_div');

                function u7_t8_funk() {

                    let txt = u7_t8_in.value.trim();

                    return txt;
                }

                document.querySelector('.u7_t8_bt').onclick = function(){
                    u7_t8_div.innerHTML = u7_t8_funk();
                }



                // Task 9
                // Напишите функцию t9, которая принимает число и возвращает true, если число четное, и false если не четное.

                let u7_t9_in =  document.querySelector('#u7_t9_in');
                let u7_t9_div =  document.querySelector('.u7_t9_div');

                function u7_t9_funk() {

                    let num = +u7_t9_in.value;

                    if ( num % 2 ){
                        return 'false';
                    }else{
                        return 'true';
                    }

                }

                document.querySelector('.u7_t9_bt').onclick = function(){
                    u7_t9_div.innerHTML = u7_t9_funk();
                }



                // Task 10
                // Создайте функцию t10, которая принимает 2 числа и возвращает большее из них. В случае равенства - любое из чисел.

                let u7_t10_in_1 =  document.querySelector('#u7_t10_in_1');
                let u7_t10_in_2 =  document.querySelector('#u7_t10_in_2');
                let u7_t10_div =  document.querySelector('.u7_t10_div');

                function u7_t10_funk() {

                    let a = +u7_t10_in_1.value;
                    let b = +u7_t10_in_2.value;

                    if ( a == b ){
                        return a;
                    }else if (a > b){
                        return a;
                    }else{
                        return b;
                    }

                }

                document.querySelector('.u7_t10_bt').onclick = function(){
                    u7_t10_div.innerHTML = u7_t10_funk();
                }


            </pre>
        </div>
    </div>

</div>


<div class="linear" id="use_strict">
    <h1>Урок 8. Цикл While, Do While</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // Task 1
                // Создайте функцию func_1, которая возращает строку от нуля до 100 в формате
                // 0 1 2. .100(после 100 тоже есть пробел)
                // задание сделать с помощью while

                function func_1() {
                    let i = 0;
                    let txt = '';
                    while( i <= 100){
                        txt += i + ' ';
                        i++;
                    }
                    return txt;
                }


                // Task 2
                // Создайте функцию func_2, которая принимает от пользователя 2 параметра числа и возращает строку от первого числа до второго с шагом 1. Разделитель пробел.
                // Пример: пользователь ввел 5 и 7
                // 5 6 7
                // считаем что второе число всегда больше первого. Решаем с помощью while

                function func_2(a, b) {
                    let txt = '';
                    while( a <= b){
                        txt += a + ' ';
                        a++;
                    }
                    return txt;
                }


                // Task 3
                // Создайте функцию func_3, которая принимает от пользователя 2 параметра числа и возращает строку от большего числа меньшего с шагом 1. Разделитель пробел.
                // Пример: пользователь ввел 5 и 7
                // 7 6 5
                // Решаем с помощью while

                function func_3(a, b) {
                    let txt = '';

                    while( b >= a ){
                        txt += b + ' ';
                        b--;
                    }

                    return txt;
                }



                // Task 4
                // Создайте функцию func_4, которая принимает от пользователя 3 параметра(число, число и шаг) и возращает строку от большего числа меньшего с заданным. Разделитель пробел.
                // Пример: пользователь ввел 1 5 2
                // 5 3 1
                // Решаем с помощью while

                function func_4(a, b, c) {
                    let txt = '';

                    while( b >= a ){
                        txt += b + ' ';
                        b -= c;
                    }

                    return txt;
                }



                // Task5
                // С помощью цикла
                // while создайте функцию func_5, считает и возвращает сумму чисел от 0 до 20.

                function func_5(a, b) {
                    let txt = 0;

                    while( a <= b ){
                        txt += a;
                        a++;
                    }

                    return txt;
                }



                // Task 6
                // C помощью цикла
                // while создайте функцию func_6, которая принимает 2 параметра, и если второй параметр больше первого, то возвращает сумму чисел от первого до второго включительно. Если нет - то false.Считаем, что пользователь может ввести только числа.

                function func_6(a, b) {
                    let txt = 0;
                    if ( b > a ) {
                        while( a <= b ){
                            txt += a;
                            a++;
                        }
                    }else {
                        txt = false;
                    }

                    return txt;
                }



                // Task 7
                // C помощью цикла
                // while создайте функцию func_7, которая принимает 2 параметра, и если второй параметр больше первого, то возвращает произведение чисел от первого до второго включительно.Если нет - то false.Считаем, что пользователь может ввести только числа.

                function func_7(a, b) {
                    let txt = 1;
                    if ( b > a ) {
                        while( a <= b ){
                            txt *= a;
                            a++;
                        }
                    }else {
                        txt = false;
                    }

                    return txt;
                }



                // Task 8
                // У пользователя есть 333 монеты в кармане.Каждый день, начиная с первого количество монет увеличиваетя в 2 раза. Напишите функцию func_8, которая вернет день, в который количество монет станет больше или равно 1 000 000.

                function func_8() {

                    let coins = 333;
                    let day = 1;
                    while( coins < 1000000 ){
                        coins *= 2;
                        day++;
                    }

                    return day;
                }



                // Task 9
                // Создайте функцию func_9, которая принимает 2 параметра и возращает строку от первого до второго введенного параграфа, где все четные числа заменены на символ нуля(0).

                function func_9(a, b) {
                    let txt = '';
                    while( a <= b){
                        if( a % 2 ){
                            txt += a + ' ';
                        }else{
                            txt += 0 + ' ';
                        }
                        a++;
                    }
                    return txt;
                }



                // Task 10
                // Cоздайте функцию func_10, которая вернет строку(решаем через
                //         while):
                //     **
                //     *
                //     **
                //     *
                //     **
                //     *

                function func_10() {
                    let txt = '';
                    let i = 0;
                    while( i < 6 ){
                        if( i % 2 ){
                            txt += '*<br>';
                        }else{
                            txt += '**<br>';
                        }
                        i++;
                    }
                    return txt;
                }



                // Task 11
                // Создайте функцию func_11, которая вернет следующую строку: 10 1 9 2 8 3. . 1 10. Решаем через
                // while.

                function func_11() {
                    let txt = '';
                    let a = 1;
                    let b = 10;
                    let i = 0;
                    while( a <= b ){
                        if ( a == b ){
                            txt += a;
                        }else {
                            txt += b + ' ' + a + ' ';
                        }
                        a++;
                        b--;
                    }
                    return txt;
                }



                // Task 12
                // Прочитайте о цикле <a href = "https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Statements/do...while"
                // target = "_blank" >do while</a>. Напишите код:
                // let a = 0;
                // do
                //     console.log('do while work');
                // while (a < 0);

                // let b = 0;
                // while (b < 0) {
                //     console.log('while work');
                // }

                // изучите вывод.Как видите, цикл do while срабатывает минимум один раз в любом случае.Т.е.вначале идет срабатывание, а потом проверка.

                function func_12() {

                }

                // Task 13
                // Напишите функцию func_13 которая возвращает строку, от 100 до 0 включительно.Используем цикл do while.

                function func_13() {
                    let a = 100;
                    let txt = '';

                    do {
                        txt += a + ' ';
                        a--;
                    } while (a >= 0);

                    return txt;
                }



                // Task 14
                // Стаханов в первый день своей работы добыл 5 тонн угля.Во второй - на 30 % больше от предыдущего дня .Напишите функцию func_14 которая вернет день,
                // когда Стаханова побьют:) все, кто с ним работает, этот день наступит тогда, когда Стаханов в день добудет 132 тонны угля.Используйте для решения do while.
                // Считаем, что каждый день Стаханов дает угля на 30% больше предыдущего.

                function func_14() {
                    let ton = 5;
                    let day = 1;

                    do {
                        ton += ton / 100 * 30;
                        day++;
                    } while (ton <= 132);

                    return day;
                }



                // Task 15
                // Гермиона Грейнджер в первый день наварила 1.1 литра зелья.Во второй день на 0.3 литра зелья больше.Напишите функцию func_15, которая вернет день,
                // когда в Хоргвардсе не останется пустых котлов(суммарный объем котлов в замке 568 литров).Обратите внимание, что вам нужно найти суммарных объем
                // сваренного зелья, а не дневной объем.Используем do while.

                function func_15() {
                    let liters = 1.1;
                    let day = 1;

                    do {
                        liters += liters + 0.3;
                        day++;
                    } while (liters <= 568);

                    return day;
                }



                // Task 16
                // На странице есть четыре параграфа p.task-16. Используя цикл do ..while посчитайте количество параграфов p.task-16 и если число
                // четное - верните значение, если нет - верните false.Код напишите в функции func_16.

                function func_16() {
                    let task = document.querySelectorAll('.task-16');
                    let i = 0;
                    do {
                        i++;
                    }while (i < task.length);

                    if ( i % 2 ){
                        return false;
                    }else{
                        return i;
                    }
                }



                // Task 17
                // На странице есть четыре параграфа p.task-16. Используя цикл do ..while выведите в первый p.task-16 - число 1, во второй 2 и т.д.Решение оформите в виде функции func_17.

                function func_17() {

                    let task = document.querySelectorAll('.task-16');
                    let i = 0;

                    do {
                        task[i].innerHTML = i+1;
                        i++;
                    }while (i < task.length);

                }
                func_17();


                // Task 18
                // На странице есть три параграфа p.task-18. Используя цикл do ..while выведите в первый p.task-18 - число равное количеству параграфов p.task - 18,
                // во второй на единицу меньше и т.д.Решение оформите в виде функции func_18.

                function func_18() {
                    let task = document.querySelectorAll('.task-18');
                    let i = 0;
                    let k = task.length;
                    do {
                        task[i].innerHTML = k;
                        i++;
                        k--;
                    }while (k > 0);
                }
                func_18();



                // Task 19
                // Напишите функцию func_19, которая возвращает строку вида: 1*3*5*7*9*11*13*15*17*19. Решите с помощью do while.

                function func_19() {
                    let i = 1;
                    let txt = '';

                    do {
                        if ( i == 1){
                            txt += i;
                        }else{
                            txt += '*' + i;
                        }
                        i++;
                    }while ( i < 20);

                    return txt;
                }



                // Task 20
                // Напишите функцию func_20, которая возвращает строку вида:
                //     1 * * *
                //     * 1 * *
                //     * * 1 *
                //     * * * 1

                function func_20() {
                    let i = 0;
                    let txt = '';
                    while (i < 4) {
                        let k = 0;
                        while (k < 4) {
                            if (k == i) {
                                txt += '1';
                            }
                            else {
                                txt += '*';
                            }
                            k++;
                        }
                        txt += '<br>';
                        i++;
                    }
                    return txt;
                }


            </pre>
        </div>
    </div>

</div>


<div class="linear" id="use_strict">
    <h1>Урок 9. Работаем с DOM</h1>

    <div class="mist">
        <div class="mist__top">
            <p><b>Домашнее задание</b></p>
        </div>
        <div class="mist__bot">
            <pre class="brush: js;">

                // TASK 1.  Напишите функцию func_1, которая присваивает p.u-1 ширину 200px.Проверьте ее работу.Допишите возможность присваивать высоту равную 100px;

                function func_1() {
                    let u1 = document.querySelector('p.u-1');
                    u1.style.width = '200px';
                    //u1.style.height = '100px';
                }
                func_1();


                // TASK 2. Напишите функцию func_2, которая будучи запущенной присваивает блоку p.u-2 класс css-1. Задайте данному классу через CSS зеленый цвет фона.

                function func_2() {
                    let u2 = document.querySelector('p.u-2');
                    u2.classList.add('css-1');

                    let css_1 = document.querySelector('p.css-1');
                    css_1.style.backgroundColor = 'green';
                }
                func_2();


                // TASK 3. Используя цикл, добавьте на все блоки p.u - 3 событие onclick.По клику запускайте функцию func_3, которая окрашивает элемент, на котором произошло событие в красный цвет фона.Для обращения внутри функции к такому элементу используйте this.

                function func_3() {
                   this.style.backgroundColor = 'red';
                }

                let u3 = document.querySelectorAll('p.u-3');
                for (let i = 0; i < u3.length; i++) {
                    u3[i].onclick = func_3;
                }


                // TASK 4. Используя цикл, добавьте на все блоки p.u - 4 событие onclick.По клику запускайте функцию func_4, которая присваивает элементу, на котором произошло событие, класс css - 2. Для обращения внутри функции к такому элементу используйте this.

                function func_4() {
                    this.classList.add('css-2');
                }

                let u4 = document.querySelectorAll('p.u-4');
                for (let i = 0; i < u4.length; i++) {
                    u4[i].onclick = func_4;
                }


                // TASK 5. C помощью цикла, повесьте на блоки p.u - 5 функцию func_5, которая при клике будет удалять класс css - 3 с элемента, на котором произошло событие.

                function func_5() {
                    this.classList.remove('css-3');
                }

                let u5 = document.querySelectorAll('p.u-5');
                for (let i = 0; i < u5.length; i++) {
                    u5[i].onclick = func_5;
                }


                // TASK 6. Есть кнопка.u - 6. Напишите функцию, которая при клике делает toggle классу.active для данной кнопки.

                function func_6() {
                    this.classList.toggle('active');
                }

                let u6 = document.querySelectorAll('.u-6');
                for (let i = 0; i < u6.length; i++) {
                    u6[i].onclick = func_6;
                }

                // TASK 7. Напишите функцию func - 7, которая будучи запущенной возвращает количество элементов с классом css-3.

                function func_7() {
                    let u7 = document.querySelectorAll('.css-3');
                    console.log(u7.length);
                }

                func_7();


                // TASK 8. Напишите функцию func - 8, которая будучи запущенной, присваивает всем элементам p.u - 1 атрибут title со значением test - data.

                function func_8() {
                    let u8 = document.querySelectorAll('p.u-1');
                    for (let i = 0; i < u8.length; i++) {
                        u8[i].setAttribute('title', 'test-data');
                    }
                }

                func_8();

                // TASK 9. С помощью цикла получите кнопки.u - 9. Добавьте на них событие onclick которое запускает функцию func - 9. Функция возращает data атрибут элемента, по которому кликнули.

                function func_9() {
                    let this_data = this.getAttribute('data');
                    console.log(this_data);
                    //return this_data;
                }

                let u9 = document.querySelectorAll('.u-9');
                for (let i = 0; i < u9.length; i++) {
                    u9[i].onclick = func_9;
                }

                // TASK 10. Напишите функцию func - 10, которая при клике на кнопке.u -10__button читает атрибут валюты data - currency и на основании этого выводит в p.u -10__out коэффициент данной валюты по отношению к доллару.Коэффициент возьмите приблизительно из интернета.Считается, что пользователь всегда вводит валюту в долларах.

                function func_10() {
                    let data_currency = this.getAttribute('data-currency');
                    let div_10 = document.querySelector('.u-10__out');

                    switch (data_currency){
                        case 'euro':
                            div_10.innerHTML = 0.9;
                            break;
                        case 'usd':
                            div_10.innerHTML = 1;
                            break;
                        case 'rub':
                            div_10.innerHTML = 63;
                            break;
                    }

                }

                let u10 = document.querySelectorAll('.u-10__button');
                for (let i = 0; i < u10.length; i++) {
                    u10[i].onclick = func_10;
                }

                // TASK 11.Напишите функцию func - 11, которая при клике на кнопке.u -11__button читает атрибут валюты data - currency и на основании этого выводит в p.u -11__out перевод валюты введенной пользователем в input.u -11__input в указанную валюту.Считается, что пользователь всегда вводит валюту в долларах.

                function func_11() {
                    let data_currency = this.getAttribute('data-currency');
                    let $inp_11 = document.querySelector('.u-11_out');
                    let val = $inp_11.value;

                    switch (data_currency){
                        case 'euro':
                            $inp_11.value = 0.9 * val;
                            break;
                        case 'usd':
                            $inp_11.value = 1 * val;
                            break;
                        case 'rub':
                            $inp_11.value = 63 * val;
                            break;
                    }

                }

                let u11 = document.querySelectorAll('.u-11__button');
                for (let i = 0; i < u11.length; i++) {
                    u11[i].onclick = func_11;
                }

                // TASK  12. Создайте функцию func - 12, которая создает через createElement элемент div, присваивает ему класс css - 4 и возвращает данный элемент

                function func_12() {
                    let t12 = document.createElement('div');
                    t12.classList.add('css-4');
                    console.log(t12);
                }
                func_12();


                // TASK  13.Создайте функцию func - 13, которая создает элемент span.span - 13 с текстом 13 через createElement и вставляет его в p.u - 13(append).

                function func_13() {
                    let u13 = document.querySelector('.u-13');
                    let t13_span = document.createElement('span');
                    t13_span.classList.add('span-13');
                    t13_span.innerHTML = '13';
                    u13.append(t13_span);
                }
                func_13();


                // TASK  14. Создайте функцию func - 14, которая создает элемент span.span - 14 с текстом 14 через createElement и вставляет его в p.u - 14(prepend).

                function func_14() {
                    let u14 = document.querySelector('.u-14');
                    let t14_span = document.createElement('span');
                    t14_span.classList.add('span-14');
                    t14_span.innerHTML = '14';
                    u14.prepend(t14_span);
                }
                func_14();


                // TASK 15. Создайте функцию func - 15, которая создает элемент span.span - 15 с текстом 15 через createElement и вставляет его в p.u - 15(before)

                function func_15() {
                    let u15 = document.querySelector('.u-15');
                    let t15_span = document.createElement('span');
                    t15_span.classList.add('span-15');
                    t15_span.innerHTML = '15';
                    u15.before(t15_span);
                }
                func_15();


                // TASK    16. Создайте функцию funct - 16, которая создает элемент button.u - 16 c текстом Push.Повесьте на данный элемент событие onclick со стрелочной функцией, которая в консоль выводит текст u - 16. И после добавления события добавьте данный элемент на страницу в div.u -16__out.Проверьте работоспособность события.

                function func_16() {
                    let u16 = document.querySelector('.u-16__out');
                    let t16_bt = document.createElement('button');
                    t16_bt.classList.add('u-16');
                    t16_bt.innerHTML = 'Push';
                    u16.append(t16_bt);

                    t16_bt.onclick = () => {
                        let txt = t16_bt.textContent;
                        console.log(txt);
                    }
                }
                func_16();


                // TASK 17. Создайте функцию, funct - 17, которая при запуске создаст элемент p c текстом 17 и заменит этим элементом div.u - 17

                function func_17() {
                    let tp = document.createElement('p');
                    tp.innerHTML = 17;
                    document.querySelector('.u-17').replaceWith(tp);
                }
                func_17();


                // TASK 18. C помощью цикла повесьте на div.out - 18 функцию func - 18. Данная функция дожна удалять элемент, на котором произошел клик из DOM.Функция должна возвращать удаленный элемент

                function func_18() {
                    this.remove();
                    console.log(this)
                }
                let t18 = document.querySelectorAll('.out-18');
                for(let i =0; i < t18.length; i++){
                    t18[i].onclick = func_18;
                }


                // TASK   19. Создайте функцию func - 19, которая принимает параметр текст.Создает элемент li, вставляет в него указанный текст, и добавляет на страницу в ul.u - 19 в конец списка.

                function func_19(txt) {
                    let li = document.createElement('li');
                    li.innerHTML = txt;
                    let t19 = document.querySelector('.u-19');
                    t19.append(li);
                }
                func_19('Текст');


                // TASK 20. Доработайте предыдущее задание.Допишите функцию func - 20 которая может принимать текст от пользователя и вставлять в список ul.u - 20. Также добавьте checkbox - важное, при этом созданный li получает класс.css - 5.

                function func_20(txt) {
                    let li = document.createElement('li');
                    li.innerHTML = txt;
                    li.classList.add('css-5');
                    let t20 = document.querySelector('.u-20');
                    t20.append(li);

                    let inp = document.createElement('input');
                    inp.setAttribute('type','checkbox');
                    li.prepend(inp);
                }
                func_20('Текст');

            </pre>
        </div>
    </div>

</div>


<!--

    <div class="linear" id="use_strict">
     <h1>111111111111111111111111111111</h1>

        <div class="mist">
            <div class="mist__top">
                <p><b>Домашнее задание</b></p>
            </div>
            <div class="mist__bot">
                    <pre class="brush: js;">



                    </pre>
            </div>
        </div>

    </div>

-->

<!--

<div class="mist">
    <div class="mist__top">
        <p><b>Домашнее задание</b></p>
    </div>
    <div class="mist__bot">
            <pre class="brush: js;">



            </pre>
    </div>
</div>

-->

<?php include '../../include/footer.php'; ?>
