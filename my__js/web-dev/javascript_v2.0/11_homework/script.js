// Task 1
// Создайте пустой массив arr1, input.u-1, кнопку button.u-2__push. При нажатии кнопки, функция читает содержимое input и добавляет
// содержимое в массив, после чего выводит содержимое массива в div.out-1.

let arr1 = [];
let t1_inp = document.querySelector('input.u-1');
let t1_bt = document.querySelector('button.u-1__push');
let t1_div = document.querySelector('.out-1');

t1_bt.onclick = function () {
    arr1.push(t1_inp.value);
    t1_div.innerHTML = arr1;
}


// Task 2
// Добавьте к предыдущему заданию кнопку button.u-2__pop, при нажатии которой, к массиву arr1 применяется метод pop, после чего массив выводится в div.out-1

let t2_bt_pop = document.querySelector('button.u-2__pop');

t2_bt_pop.onclick = function () {
    arr1.pop();
    t1_div.innerHTML = arr1;
}


// Task 3
// Добавьте к заданию 1 кнопку button.u-3__shift, которая применяет к массиву arr1 метод shift ( читать за метод shift).
// После применения shift, массив arr1 выподится в div.out-1.

let t3_bt_shift = document.querySelector('button.t3_bt_shift');

t3_bt_shift.onclick = function () {
    arr1.shift();
    t1_div.innerHTML = arr1;
}


// Task 4
// Добавьте к заданию 1 кнопку button.u-4__unshift, которая применяет к массиву arr1 метод unshift ( читать за метод unshift). После применения unshift, массив arr1 выподится в div.out-1.
// Надеюсь, вы догадаетесь проверять input на пустоту перед применением unshift. Надеюсь, вы это сделали и в первой задаче?

let t4_bt_shift = document.querySelector('button.t4_bt_unshift');

t4_bt_shift.onclick = function () {
    arr1.unshift(t1_inp.value);
    t1_div.innerHTML = arr1;
}


// Task 5
// Обьявите массив arr5, добате два элемента input, в первый пользователь может ввести индекс элемента, во второй - количество.
// Добавьте кнопку, по нажатию на которую к массиву arr5 применяется метод splice. Результат применения выводите в div.out-5.

let arr5 = [3,14, 15, 92, 6, 54, 123, 87, 66, 43, 12, 90, 'hello'];
let t5_inp_1 = document.querySelector('input.u-5_1');
let t5_inp_2 = document.querySelector('input.u-5_2');
let t5_bt = document.querySelector('button.u-5_bt');
let t5_div = document.querySelector('.out-5');

t5_bt.onclick = function () {
    arr5.splice(t5_inp_1.value, 0, t5_inp_2.value);
    t5_div.innerHTML = arr5;
}


// Task 6
// Напишите функцию funcPush, которая эмулирует работу метода push, функция, по нажатию кнопки:
//  - читает содержимое input в переменную
//  - вычисляет длину массива
//  - присваивает массиву новый элемент, а в качестве индекса указывает длину массива
// Выводит массив на страницу

let arr6 = [];
let t6_inp = document.querySelector('input.u-6');
let t6_div = document.querySelector('.out-6');

function funcPush() {

    let inpVal = t6_inp.value;
    let arrLength = arr6.length;

    arr6[arrLength] = inpVal;

    t6_div.innerHTML = arr6;
}

document.querySelector('button.u-6_bt').onclick = funcPush;


// Task 7
// Напишите функцию funcPop, которая эмулирует работу метода pop, функция, по нажатию кнопки:
// - удаляет последний элемент массива
// Выводит массив на страницу

function funcPop() {

    let newArr = [];
    let arrLength = arr6.length-1;

    for( let i = 0; i < arrLength; i++){
        newArr[i] = arr6[i];
    }
    arr6 = newArr;
    t6_div.innerHTML = arr6;
}

document.querySelector('button.u-7_bt').onclick = funcPop;


// Task 8
// Напишите функцию funcShift, которая эмулирует работу метода shift, функция, по нажатию кнопки:
// - Создает новый массив где нулевым элементом выступает первый элемент исходного массива
// Выводит массив на страницу

function funcShift() {

    let newArr = [];
    let arrLength = arr6.length;

    for( let i = 1; i < arrLength; i++){
        newArr[i-1] = arr6[i];
    }

    arr6 = newArr;
    t6_div.innerHTML = arr6;
}

document.querySelector('button.u-8_bt').onclick = funcShift;


// Task 9
// Напишите функцию funcUnShift, которая эмулирует работу метода unshift, функция, по нажатию кнопки:
// - читает содержимое input в переменную
// - создает новый массив где нулевым элементов задает считанную из input строку
// - дописывает остальные значения старого массива в новый
// Выводит массив на страницу

function funcUnShift() {

    let newArr = [];
    let inpVal = t6_inp.value;
    let arrLength = arr6.length;

    newArr[0] = inpVal;

    for( let i = 1; i <= arrLength; i++){
        newArr[i] = arr6[i-1];
    }

    arr6 = newArr;
    t6_div.innerHTML = arr6;
}

document.querySelector('button.u-9_bt').onclick = funcUnShift;


// Task 10
// Создайте массив arr10, примените к массиву метод reverse ( читать за метод reverse). После применения reverse, массив arr10 выподится в div.out-10.

let arr10 = [2,4, 6, 8, 10, 'hello'];

arr10.reverse();

document.querySelector('.out-10').innerHTML = arr10;



// Task 11
// Создайте input.u-11__input и кнопку button.u-11__button. Объявите массив arr11. По нажатию на кнопку, читайте содержимое input.u-11__input в переменную u11.
// Потом примените к массиву arr11 метод indexOf ( читать за метод indexOf). Результат применения indexOf выводите на страницу в div.out-11.
// Последовательно проверьте программу вводя в input числа 1, 3, 5, 12.

let arr11 = [0, 2, 3, 7, 8, 5, 11];
let t11_inp = document.querySelector('input.u-11');

document.querySelector('.u-11_bt').onclick = function () {
    let u11 = +t11_inp.value;
    let u11_Index = arr11.indexOf(u11);

    document.querySelector('.out-11').innerHTML = u11_Index;
};

// Task 12
// Напишите функцию funcIndexOf, которая эмулирует работу метода indexOf. Программа должна:
// - читает содержимое input в переменную
// - Запускать цикл по массиву и сравнивать каждый элемент массива с введенным.
// - Если совпадение есть - останавливать цикл и выводить номер индекса на котором произошло совпадение.
// - Если совпадения нет выводить -1.

let arr12 = [1,2,3,4,5];
let t12_inp = document.querySelector('input.u-12');
let t12_div = document.querySelector('.out-12');

function funcIndexOf() {

    let inpVal = t12_inp.value;

    for( let i = 0; i < arr12.length; i++){
        if( arr12[i] == inpVal ){
            t12_div.innerHTML = i;
            break;
        }else if (  arr12[ arr12.length-1 ] != inpVal ){
            t12_div.innerHTML = -1;
        }
    }

}

document.querySelector('.u-12_bt').onclick = funcIndexOf;


// Task 13
// Напишите функцию funcReverse, которая эмулирует работу метода reverse. Программа должна:
// - Создать новый пустой массив
// - Перебирать старый массив с конца (массив создайте сами)
// - По очереди по элементу присвоить значения в новый массив.
// - Вывести новый массив.

let arr13 = [1,2,3,4,5,6,7,8,9,10];

function funcReverse() {

    let newArr = [];

    for( let i = arr13.length-1, k = 0; i >= 0; i--,k++){
        newArr[k] = arr13[i];
    }

    document.querySelector('.out-13').innerHTML = newArr;

}
funcReverse();


// Task 14
// Создайте инпут, куда пользователь может ввести число элементов в массиве. Создайте функцию, которая прочитает
// введенное число и создаст массив такой длины, причем каждый элемент - это случайное число от 0 до 100. Массивы выведите на страницу.

let arr14 = [];
let t14_inp = document.querySelector('input.u-14');
let t14_div = document.querySelector('.out-14');

function func_t14() {

    let inpVal = +t14_inp.value;

    let max = 100;
    let min = 0;

    for( let i = 0; i < inpVal; i++){
        arr14[i] = Math.floor(Math.random() * (max - min + 1)) + min;
    }

    t14_div.innerHTML = arr14;

}

document.querySelector('.u-14_bt').onclick = func_t14;


// Task 15
// Создайте массив arr15. Напишите функцию, которая создаст новый массив, в который входят только четные элементы массива arr15
// (элементы с четным индексом). Выведите на экран.

let arr15 = [1,2,3,4,5,6,7,8,9,10];

function func_t15() {

    let newArr15 = [];

    for( let i = 0; i < arr15.length; i++){
        if( !(i % 2) && i != 0 ){
            newArr15.push( arr15[i] );
        }
    }

    document.querySelector('.out-15').innerHTML = newArr15;

}
func_t15();


// Task 16
// Создайте button.u-16__button. Объявите массив arr16_1 и arr16_2. По нажатию на кнопку примените к массивам метод concat ( читать за метод concat).
// Результат применения concat выводите на страницу в div.out-16.

let arr16_1 = [3, 5, 7];
let arr16_2 = [2, 4, 6];

function func_t16() {

    let newArrey = arr16_1.concat(arr16_2)

    document.querySelector('.out-16').innerHTML = newArrey;

}

document.querySelector('.u-16_bt').onclick = func_t16;


// Task 17
// Напишите функцию funcConcat, которая эмулирует работу метода concat. Программа должна:
// - Перебирает второй массив и его элементы добавляет в первый массив.
// - Выводит массив на страницу.

function funcConcat() {

    let newArrey = arr16_1;

    for(let i = 0; i < arr16_2.length; i++){
        newArrey.push(arr16_2[i]);
    }

    document.querySelector('.out-17').innerHTML = newArrey;

}
funcConcat();


// Task 18
// Создайте button.u-18__button и input.u-18__input. Объявите массив arr18 . По нажатию на кнопку примените к массивам метод includes,
// который проверяет есть ли в массиве значение введенное в input. ( читать за метод includes). Результат применения includes выводите на страницу в div.out-18.

let arr18 = [3, 5, 7, 11, 12, 13, 14];
let t18_inp = document.querySelector('.u-18_inp');
let t18_div = document.querySelector('.out-18');

function func_t18() {

    let inpVal = +t18_inp.value;

    t18_div.innerHTML = arr18.includes(inpVal);

}

document.querySelector('.u-18_bt').onclick = func_t18;



// Task 19
// Напишите функцию funcIncludes, которая эмулирует работу метода includes. Программа должна:
// - Перебирает второй массив и сравнивать если введенный элемент совпал с текущим - прекращать работу цикла и выводить true.
// - Если совпадений нет - false.

let arr19 = [3, 5, 7, 11, 12, 13, 14];
let t19_inp = document.querySelector('.u-19_inp');
let t19_div = document.querySelector('.out-19');

function funcIncludes() {

    let val = t19_inp.value;

    for(let i = 0; i < arr19.length; i++){

        if( val == arr19[i] ){
            t19_div.innerHTML = true;
            break;
        }else{
            t19_div.innerHTML = false;
        }

    }

}

document.querySelector('.u-19_bt').onclick = funcIncludes;


// Task 20
// Объявите массив arr20. Создайте кнопку, по нажатию которую к массиву применяется метод join ( читать за метод join). Результа выведите на страницу.

let arr20 = [3, 5, 7, 11, 12, 13, 14];

document.querySelector('.u-20_bt').onclick = function(){

    let txt = arr20.join(' - ');

    document.querySelector('.out-20').innerHTML = txt;

}
