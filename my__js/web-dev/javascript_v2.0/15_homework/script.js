// Task 1
// Создайте новый Set. Добавьте в него через add элементы. Выведите в консоль.

let a = new Set();
a.add(1);
a.add(2);
a.add('Hello');
console.log(a);



// Task 2
// Создайте input куда пользователь может вводить элементы и кнопку. По нажатию на кнопку значение из input добавляется в set. Set выводится в консоль.

document.querySelector('.t2_bt').onclick = function () {
    let val = document.querySelector('.t2_in').value;

    if(Number(val)){
        val = +val;
    }

    a.add(val);
    console.log(a);
}

// Task 3
// Добавьте к предыдущему заданию кнопку удалить. При нажатии кнопки читаете содержимое input и удаляете его из Set. Если input пустой - выводите ошибку (alert).

document.querySelector('.t3_bt').onclick = function () {
    let val = document.querySelector('.t3_in').value;

    if(Number(val)){
        val = +val;
    }

    a.delete(val);

   console.log(a);
}



// Task 4
// Добавьте к предыдущему заданию кнопку проверить. При нажатии кнопки читаете содержимое input и проверяет его наличие в Set.
// Функция должна возвращать true или false.Действия запускаются при вызове функции t4.

function t4_funk() {
    let val = document.querySelector('.t4_in').value;

    if(Number(val)){
        val = +val;
    }

    if(a.has(val)){
        console.log(true);
    }else{
        console.log(false);
    }
}

document.querySelector('.t4_bt').onclick = t4_funk;



// Task 5
// Выведите размер полученного в результате предыдущих операций Set. Выводить на страницу и возвращать в функции. Действия должны запускаться при вызове функции t5.

document.querySelector('.t5_bt').onclick = function () {

    let aSize = a.size;

    document.querySelector('.t5_div').innerHTML = aSize;
    return aSize;
}



// Task 6
// Есть массив a6 = [3,4,3,2,4,56,1,23]. Напишите функцию, которая возвращает и выводит на страницу количество уникальных элементов в массиве a6.
// Решение должно использовать set. Действия должны запускаться при вызове функции t6.

let a6 = [3,4,3,2,4,56,1,23];
let a6_set = new Set(a6);

function t6_funk() {
    document.querySelector('.t6_div').innerHTML = a6_set.size;
}
document.querySelector('.t6_bt').onclick = t6_funk;



// Task 7
// Создайте input куда пользователь может ввести пароль и кнопку - проверить. Проверяйте с помощью Set, чтобы пользователь использовал в
// пароле только не повторяющиеся символы. Логика решения - получаем строку из input - и преобразуем ее в массив (arr.split(')).
// Считаем длину массива. На основе массива создаем  Set. Сравниваем размеры массива и Set.

document.querySelector('.t7_bt').onclick = function () {

    let t7_div =  document.querySelector('.t7_div');
    let valInp = document.querySelector('.t7_in').value.split('');

    let valSet = new Set(valInp);

    if( valInp.length ==  valSet.size ){
        t7_div.innerHTML = 'Пароль не содержит повторяющихся символов';
    }else{
        t7_div.innerHTML = 'Пароль содержит повторяющиеся символы!';
    }
}



// Task 8
// Создайте набор set a8. Напишите функцию, которая принимает set в качестве параметра и четные элементы из набора добавляет в массив a8_res.
// После завершения операции - выводит a8_res на страницу. Запуск - по нажатию кнопки b-8.

let a8 = new Set([1,2,3,4,5,6,7,8,9,10]);

document.querySelector('.t8_bt').onclick = function () {

    let a8_res = [];

    for (let item of a8) {
        if( item != 0 && !(item % 2) ){
            a8_res.push(item);
        }
    }

    document.querySelector('.t8_div').innerHTML = a8_res;

}



// Task 9
// Создайте набор set a9. Напишите функцию, которая принимает set в качестве параметра присваивает a9_res так, что порядок
// элементов в a9_res обратный a9. Выведите a9_res на страницу. Действия должны запускаться при вызове функции t9.

let a9 = new Set([1,2,3,4,5,6,7,8,9,10]);

document.querySelector('.t9_bt').onclick = function () {

    let a9_res = [];
    let a9_arr = Array.from(a9);

    for( let i = a9_arr.length -1; i >= 0; i--){
        a9_res += a9_arr[i] + ' ';
    }

    document.querySelector('.t9_div').innerHTML = a9_res;

}



// Task 10
// Сложная задача!!! Самая сложная задача за урок. Если ее решите - то массивов вы больше не испугаетесь. Задачу Можно пропустить.
// Создайте массив элементов a10. Посчитайте, сколько раз встречается каждый из элементов в массиве. Результат присвойте массиву a10_res.
// Логика решения: создайте на основе массива - набор. Потом запустите перебор набора и внутри цикла перебора запустите еще один цикл - перебираете
// массив и смотрите совпадения если элемент массива совпадает с элементом набора - то плюсуете счетчик. После прохода внутреннего цикла
// добавляете в a20_res запись в виде элемент набора - счетчик. a10_res = { "3" : 5, "1" : 1, }

let a10 = ['a','b','b','b',1,1,1,2,2,3,4,4,5];
let a10Set = new Set(a10);
let a10_res = Array.from(a10Set);

function countElem() {

    let k = 0;
    for (let elem of a10Set) {

        let col = 0;

        for( i = 0; i < a10.length; i++){

            if( elem === a10[i] ){
                col++;
            }

        }

        a10_res[k] = elem + ' : ' + col;
        a10Set.add(col);
        k++;
    }

    console.log(a10);
    console.log(a10_res);
}
countElem();



// Task 11
// Эмулируем работу set. Пользователь может ввести значение в i-11. Напишите функцию, которая по нажатию b-11 запускает функцию t11.
// Функция получает введенное значение и добавляет его в массив a11_res. Добавление происхдит если такого значения в массиве нет.
// После каждой операции выводите a11_res на страницу.

let a11_res = [];

document.querySelector('.t11_bt').onclick = function () {

    let val = document.querySelector('.t11_in').value;
    let flag = true;

    for( let i = 0; i < a11_res.length; i++){

        if( val == a11_res[i]){
            flag = false;
        }

    }

    if( flag ){
        a11_res.push(val);
    }

    document.querySelector('.t11_div').innerHTML = a11_res;

}



// Task 12
// Напишите функцию, которая принимает в качестве параметра набор set и преобразует его в массив, результат выводит на страницу и
// присваивает a12_res. Действия должны запускаться при вызове функции t12.

let a12 = new Set([1,2,3,4,5,6,7,8,9,10]);

function arrayFrom(a12) {

    let a12_res = Array.from(a12);
    document.querySelector('.t12_div').innerHTML = a12_res;

}
arrayFrom(a12);



// Task 13
// Напишите функцию, которая принимает set и выводит его на страницу в указанный элемент. Элемент задавать как второй параметр.
// Действия должны запускаться при вызове функции t13.

let a13 = new Set([1,2,3,4,5]);
let t13_div = document.querySelector('.t13_div');

t13_funk(a13,t13_div);

function t13_funk(a13,t13_div) {
    t13_div.innerHTML = Array.from(a13);
}



// Task 14
// Напишите функцию, которая принимает set и выводит его на страницу в указанный элемент. Элемент задавать как второй параметр.
// Третий параметр - разделитель. Действия должны запускаться при вызове функции t14. Т.е. ввели в качестве разделителя дефис и вывод на страницу 1-2-3- (без пробелов).

let a14 = new Set([1,2,3,4,5]);
let t14_div = document.querySelector('.t14_div');

t14_funk(a14,t14_div,'-');

function t14_funk(a13,t13_div,sign) {

    let t14_txt = '';

    let i = 1;
    for( let elem of a14 ){
        if( i ==  a14.size){
            t14_txt += elem;
        }else{
            t14_txt += elem + sign;
        }
        i++;
    }

    t14_div.innerHTML = t14_txt;
}



// Task 15
// Дан массив arr15 = [ [1,0], [1,0], [2,0] ] . Добавьте вложенные в него массивы в набор. Изучите результат. Результирующий набор a15_res выведите на страницу.
// Добавление сделайте через цикл. Действия должны запускаться при вызове функции t15.
// Результат операции запишите в a15_res.

let arr15 = [ [1,0], [1,0], [2,0] ];

function t15(arr) {
    let newSet = new Set();

    for( let i = 0; i < arr.length; i++){
        newSet.add(arr[i]);
    }

    return newSet;
}

let a15_res = Array.from( t15(arr15) );
document.querySelector('.t15_div').innerHTML = a15_res;



// Task 16
// Дан массив a16 = [ { Ivan: 1 }, { Ivan: 1 }, { Ivan: 2 }, { Serg: 0 } ]. Добавьте вложенные в него массивы в набор. Изучите результат.
// Результирующий набор выведите в консоль. Добавление сделайте через цикл. Действия должны запускаться при вызове функции t15. Результат операции запишите в a16_res.

let a16 = [ { Ivan: 1 }, { Ivan: 1 }, { Ivan: 2 }, { Serg: 0 } ];

let a16_res = Array.from( t15(a16) );

console.log(a16_res);



// Task 17
// Создайте строку u17 = 'Primer'. Создайте новый набор с Set(u17). Выведите в консоль. Изучите результат. Действия должны запускаться при вызове функции t17.

let u17 = 'Primer';

function t17(arr) {
    return new Set(arr);
}
console.log( t17(u17) );



// Task 18
// Переберите массив a18 = [5, 7, 9, 11, 13, 15], c помощью цикла for of. Выведите на страницу в виде ключ - значение (разделены дефисом без пробелов).
// В конце строки - br. Результирующую строку присвойте a18_res. Действия должны запускаться при вызове функции t18.

let a18 = [5, 7, 9, 11, 13, 15];

let a18txt = '';
let a18col = 0;

for( let elem of a18){
    a18txt += a18col + '-' + elem + '<br>';
    a18col++;

}
document.querySelector('.t18_div').innerHTML = a18txt;


// Task 19
// Создайте набор a19 и добавьте в него значения. Выведите на страницу каждый второй по счету элемент набора. Действия должны запускаться при вызове функции t19.

let a19 = new Set([1,2,3,4,5,6,7,8,9,10]);

function t19(arr) {
    let a19_res = [];

    for (let item of arr) {
        if( item % 2 ){
            a19_res.push(item);
        }
    }

    return a19_res;

}

document.querySelector('.t19_div').innerHTML = t19(a19);



// Task 20
// Создайте функцию, которая принимает массив и четные по индексу элементы добавляет в набор s20_res в нечетные в набор s21_res. Выводите данные наборы в консоль.

let a20 = new Set([1,2,3,4,5,6,7,8,9,10]);

let s20_res = [];

for (let item of a20) {
    if( item != 0 && !(item % 2) ){
        s20_res.push(item);
    }
}

console.log(s20_res);

