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


