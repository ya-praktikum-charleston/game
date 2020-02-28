// Task 1
// Переберите массив a1 = [5, 7, 9, 11, 13, 15], c помощью цикла for. Выведите на страницу в формате значение+пробел.
// Результат присвойте переменной a1_res. Действия запускаются при вызове функции t1.

let a1 = [5, 7, 9, 11, 13, 15];

t1_funk(a1);

function t1_funk(arr) {

    let a1_res = '';

    for( let i = 0; i < arr.length; i++){
        a1_res += a1[i] + ' ';
    }

    document.querySelector('.t1_div').innerHTML = a1_res;
}



// Task 2
// Переберите массив a2 = [5, 7, 9, 11, 13, 15], c помощью цикла for. Выведите на страницу в виде ключ - значение.
// Разделитель между ключом и значением - дефис, между строками - br. Результат присвойте переменной a2_res.
// Действия запускаются при вызове функции t2.

let a2 = [5, 7, 9, 11, 13, 15];

t2_funk(a2);

function t2_funk(arr) {

    let a2_res = '';

    for( let i = 0; i < a1.length; i++){
        a2_res += `${i} - ${a1[i]} <br>` ;
    }

    document.querySelector('.t2_div').innerHTML = a2_res;
}



// Task 3
// При нажатии кнопки, получите div.u-3 с помощью getElementsByClassName, переберите циклом for, допишите в каждый из div цифру 3 (без пробелов).
// Действия запускаются при вызове функции t3.

document.querySelector('.t3_bt').onclick = function () {

    let t3_divs = document.getElementsByClassName('u_3');

    for( let i = 0; i < t3_divs.length; i++){
        t3_divs[i].innerHTML = i;
    }

}



// Task 4
// Получите div.u-3 с помощью querySelectorAll, переберите циклом for, допишите в каждый из div цифру 4 (без пробелов).
// Действия запускаются при вызове функции t4.

let t4_divs = document.querySelectorAll('.u_4');

t4_funk(t4_divs);

function t4_funk(arr) {

    for( let i = 0; i < arr.length; i++){
        arr[i].innerHTML = 4;
    }

}



// Task 5
// Создайте div с помощью createElement. Получите все div.u-3 с помощью getElementsByClassName в "массив".
// Попробуйте добавить в "массив" созданный div с помощью метода push. В комментарии к задаче опишите результат.
// Действия должны запускаться при вызове функции t5.

let t5_newDiv = document.createElement('div');

let t5_divs = document.getElementsByClassName('u_5');

//t5_funk(t5_divs,t5_newDiv);

function t5_funk() {

    t5_divs.push(t5_newDiv);         //ошибки, а с чем это связано ?

}



// Task 6
// Создайте div с помощью createElement. Получите все div.u-3 с помощью querySelectorAll в "массив".
// Попробуйте добавить в "массив" созданный div с помощью метода push. В комментарии к задаче опишите результат.
// Действия должны запускаться при вызове функции t6.

let t6_newDiv = document.createElement('div');

let t6_divs = document.querySelectorAll('.u_5');

//t6_funk();
// получается создаваемые элементы нельзя добавиться в в массив выбранных элементов ?
function t6_funk() {

    t6_divs.push(t6_newDiv);

}



// Task 7
// Дан массив a7 = [ [1,2], [3,4], [5,6]], напишите функцию которая делает из него массив [1,2,3,4,5,6].
// Используем for. Действия должны запускаться при вызове функции t7. Результат - выведите на страницу и сохраните в массив a7_res.

let a7 = [ [1,2], [3,4], [5,6]];

function t7_funk(arr) {
    let newSet = [];

    for( let elem of arr){
        for( let el of elem){
            newSet.push(el);
        }
    }

    return newSet;
}

document.querySelector('.t7_div').innerHTML = t7_funk(a7);



// Task 8
// Дан массив a8 = [ [1,2,3], [3,4,9], [5,6]], напишите функцию которая выводит самый большой индекс вложенных массивов.
// Результат сохраняется в переменную a8_res. Используем for. Действия должны запускаться при вызове функции t8.

let a8 = [ [1,2,3], [3,4,9], [5,6] ];

function t8_funk(arr) {

    let max = 0;

    for( let elem of arr){

        for( let el of elem){
            if( el > max){
                max = el;
            }
        }
    }

    return max;
}

document.querySelector('.t8_div').innerHTML = t8_funk(a8);



// Task 9
// Дан массив a9 = [4, 6, 9, "hello"]. Напишите функцию, которая преобразовывает его в ассоциативный массив вида a9_1={4: 4, 6: 6, 9: 9, hello : "hello"}.
// Используйте цикл for. Результат сохраняется в переменную a9_res. Используем for. Действия должны запускаться при вызове функции t9.

let a9 = [4, 6, 9, "hello"];

function t9_funk(arr) {

    let ass = {};

    for( let elem of arr){

        ass[elem] = elem;

    }

    return ass;
}

document.querySelector('.t9_div').innerHTML = t9_funk(a9);



// Task 10
// Переберите массив a10 = [5, 7, 9, 11, 13, 15], c помощью цикла for in. Выведите на страницу.
// Результат сохраняется в переменную a10_res. Действия должны запускаться при вызове функции t10.

let a10 = [5, 7, 9, 11, 13, 15];

function t10_funk(arr) {

    let a10_res = '';

    for( let key in arr){

        a10_res += key;

    }

    return a10_res;
}

document.querySelector('.t10_div').innerHTML = t10_funk(a10);



// Task 11
// Переберите массив a11 = [5, 7, 9, 11, 13, 15], c помощью цикла for in. Выведите на страницу в виде ключ - значение.
// Разделение между ключем и значением - дефис (без пробелов) между строками - br. Результат (строка) сохраняется в переменную a11_res.
// Действия должны запускаться при вызове функции t11.

let a11 = [5, 7, 9, 11, 13, 15];

function t11_funk(arr) {

    let a11_res = '';

    for( let key in arr){

        a11_res += key + '-' + arr[key] + '<br>';

    }

    return a11_res;
}

document.querySelector('.t11_div').innerHTML = t11_funk(a11);



// Task 12
// Напишите функцию, которая выполняет: при нажатии кнопки div.u-12 с помощью getElementsByClassName, переберите циклом for in, допишите
// в каждый из div число 12 (без пробелов). Если это невозможно - напишите в комментарии. Действия должны запускаться при вызове функции t12.

function t12_funk() {

    let t12_div = document.getElementsByClassName('t12_div');

    for( let key in t12_div){
        t12_div[key].innerHTML = 12;
    }

}
t12_funk();



// Task 13
// Напишите функцию, которая выполняет: при нажатии кнопки, получите div.u-13 с помощью querySelectorAll, переберите циклом for in,
// допишите в каждый из div число 13 (без пробелов). Если это невозможно - напишите в комментарии.
// Действия должны запускаться при вызове функции t13.

function t13_funk() {

    let t13_div = document.querySelectorAll('.t13_div');

    for( let key in t13_div){
        t13_div[key].innerHTML = 13;
    }

}
t13_funk();



// Task 14
// Дан массив a14 = [[1,2], [3,4], [5,6]], напишите функцию которая делает из него массив [1,2,3,4,5,6]. Используем for in.
// Действия должны запускаться при вызове функции t14. Результат операции запишите в a14_res.

let a14 = [[1,2], [3,4], [5,6]];

function t14_funk() {

    let a14_res = [];

    for( let key in a14){

        for( let i in a14[key]){
            a14_res.push(a14[key][i]);
        }

        document.querySelector('.t14_div').innerHTML = a14_res;
    }

}
t14_funk();



// Task 15
// Дан массив a15 = [ [1,2,3], [3,4,9], [5,6]], напишите функцию которая выводит самый большой индекс вложенных массивов.
// Используем for in. Действия должны запускаться при вызове функции t15. Результат операции запишите в a15_res.

let a15 = [ [1,2,3], [3,4,9], [5,6] ];

function t15_funk() {

    let a15_res = 0;

    for( let key in a15){

        for( let i in a15[key]){
            if( a15_res < a15[key][i]){
                a15_res = a15[key][i];
            }
        }

        document.querySelector('.t15_div').innerHTML = a15_res;
    }

}
t15_funk();



// Task 16
// Дан массив a16 = [4, 6, 9, "hello"]. Напишите функцию, которая преобразовывает его в ассоциативный массив вида a16_res={4: 4, 6: 6, 9: 9, hello : "hello"}.
// Используйте цикл for in. Действия должны запускаться при вызове функции t16. Результат операции запишите в a16_res.

let a16 = [4, 6, 9, "hello"];

function t16_funk() {

    let a16_res = {};

    for( let key in a16){

        a16_res[a16[key]] = a16[key];

        //console.log(a16_res)

    }

}
t16_funk();



// Task 17
// Переберите массив a17 = [5, 7, 9, 11, 13, 15], c помощью цикла for of. Выведите на страницу в формате елемент+пробел. Действия должны запускаться при вызове функции t17.

let a17 = [5, 7, 9, 11, 13, 15];

function t17_funk(arr) {

    let a17_res = '';

    for( let elem of arr){

        a17_res += elem + ' ';

    }

    document.querySelector('.t17_div').innerHTML = a17_res;

}
t17_funk(a17);



// Task 18
// Переберите массив a18 = [5, 7, 9, 11, 13, 15], c помощью цикла for of. Выведите на страницу в виде ключ - значение (разделены дефисом без пробелов).
// В конце строки - br. Результирующую строку присвойте a18_res. Действия должны запускаться при вызове функции t18.

let a18 = [5, 7, 9, 11, 13, 15];

function t18_funk(arr) {

    let a18_res = '';

    let col = 0;
    for( let elem of arr){

        a18_res += `${col}-${elem}<br>`;
        col++;
    }

    document.querySelector('.t18_div').innerHTML = a18_res;

}
t18_funk(a18);



// Task 19
// Напишите функцию, которая выполняет: при нажатии кнопки div.u-19 с помощью getElementsByClassName, переберите циклом for of,
// допишите в каждый из div цифры 19 (без пробелов). Если это невозможно - напишите в комментарии. Действия должны запускаться при вызове функции t19.

document.querySelector('.t19_bt').onclick = function () {

    let t3_divs = document.getElementsByClassName('t19_div');

    for( let elem of t3_divs){
        //elem.innerHTML('19');             // ПОЧЕМУ ВАРИАНТ С for of НЕ РАБОТАЕТ ???

        console.log(elem)
    }

}



// Task 20
// Дан массив a20 = [4, 6, 9, "hello"]. Напишите функцию, которая преобразовывает его в ассоциативный массив вида a20_res ={4: 4, 6: 6, 9: 9, hello : "hello"}.
// Используйте цикл for of. Действия должны запускаться при вызове функции t20.

let a20 = [4, 6, 9, "hello"];

function t20_funk(arr) {

    let a20_res = {};

    for( let elem of arr){

        a20_res[elem] = elem;

        //console.log(a20_res)

    }

}
t20_funk(a20);