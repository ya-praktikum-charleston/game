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