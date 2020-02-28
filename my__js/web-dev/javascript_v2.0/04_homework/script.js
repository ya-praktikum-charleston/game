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
