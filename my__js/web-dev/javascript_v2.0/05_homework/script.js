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