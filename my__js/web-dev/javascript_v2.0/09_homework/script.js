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


// TASK 20. Доработайте предыдущее задание.Допишите функцию func - 20 которая может принимать текст от пользователя и вставлять в список ul.u - 20.
// Также добавьте checkbox - важное, при этом созданный li получает класс.css - 5.

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





