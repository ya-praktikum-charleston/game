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