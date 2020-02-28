// Task 1
// Выведите массив a1 на страницу.

let a1 = {
    3 : 'hello',
    'one' : 'hi'
};

let txt1 = '';
for(let key in a1){
    txt1 += key + ' : ' + a1[key] + '<br> ';
}
document.querySelector('.out_1').innerHTML = txt1;



// Task 2
// Выведите на страницу элементы из масиива a2 у которых символов больше 4.

let a2 = {
    3 : 'hello',
    'one' : 'hi',
    'testt' : 'vodoley',
    'ivan' : 'ivanov'
};

let txt2 = '';
for(let key in a2){

    if ( a2[key].length > 4 ){
        txt2 += key + ' : ' + a2[key] + '<br> ';
    }

}
document.querySelector('.out_2').innerHTML = txt2;



// Task 3
// Выведите на страницу элементы из масиива a3 у которых ключ содержит больше 4 символов.

let a3 = {
    3 : 'hello',
    'one' : 'hi',
    'testt' : 'vodoley',
    'ivan' : 'ivanov'
};

let txt3 = '';
for(let key in a3){

    if ( key.length > 4 ){
        txt3 += key + ' : ' + a3[key] + '<br> ';
    }

}
document.querySelector('.out_3').innerHTML = txt3;



// Task 4
// Выведите на страницу элементы из масиива a4 у которых значение - число.

let a4 = {
    3 : 'hello',
    'one' : 4,
    'testt' : 'vodoley',
    'ivan' : 6
};

let txt4 = '';
for(let key in a4){

    if ( +key ){
        txt4 += key + ' : ' + a4[key] + '<br> ';
    }

}
document.querySelector('.out_4').innerHTML = txt4;



// Task 5
// Дан ассоциативный массив a5. Найдите сумму элементов находящихся в нем.

let a5 = {
    a : 7,
    z : 4,
    45 : 12,
    f : 6
};

let txt5 = 0;
for(let key in a5){

    txt5 += a5[key];

}
document.querySelector('.out_5').innerHTML = txt5;



// Task 6
// Создайте ассоциативный массив a6, который содержит ключи name, age, sex, height и значения любого персонажа. Выведите массив на страницу.

let a6 = {
    'name' : 'abc',
    'age' : 4,
    'sex' : 12,
    'height' : 123
};

let txt6 = '';
for(let key in a6){

    txt6 += key + ' : ' + a6[key] + '<br> ';

}
document.querySelector('.out_6').innerHTML = txt6;



// Task 7
// Создайте ассоциативный массив a7, два input (u7-key__input, u7-value__input) и кнопку. При нажатии кнопки добавляйте в массив новое значение с соответствующим ключем. Выводите массив на страницу.

let a7 = {};

let u7_key__input = document.querySelector('.u7_key__input');
let u7_value__input = document.querySelector('.u7_value__input');

document.querySelector('.u7_bt').onclick = function () {

    let key = u7_key__input.value;
    let val = u7_value__input.value;

    a7[key] = val;

    let txt7 = '';
    for(let k in a7){
        txt7 += k + ' : ' + a7[k] + '<br> ';
    }

    document.querySelector('.out_7').innerHTML = txt7;
}



// Task 8
// Добавьте к предыдущей задачи input.u8-key__input и кнопку. При нажатии кнопки - удаляйте значение с соответствующим ключем. Выводите массив на страницу.

document.querySelector('.u8_bt').onclick = function () {

    let key = document.querySelector('.u8_value__input').value;

    delete a7[key];

    let txt8 = '';
    for(let k in a7){
        txt8 += k + ' : ' + a7[k] + '<br> ';
    }

    document.querySelector('.out_7').innerHTML = txt8;
}



// Task 9
// Добавьте к предыдущей задачи input.u9-delete-value__input и кнопку. При нажатии кнопки - удаляйте записи с соответствующим значением. Выводите массив на страницу.

document.querySelector('.u9_bt').onclick = function () {

    let val = document.querySelector('.u9_delete_value__input').value;

    let txt9 = '';
    for(let key in a7){

        if( a7[key] == val ){
            delete a7[key];
            //break;
        }else{
            txt9 += key + ' : ' + a7[key] + '<br> ';
        }

    }

    document.querySelector('.out_7').innerHTML = txt9;
}


// Task 10
// Добавьте к предыдущей задачи input.u10-has-key__input и кнопку. При нажатии кнопки - возвращайте true если такой ключ есть в массиве, и false если нет.

document.querySelector('.u10_bt').onclick = function () {

    let val = document.querySelector('.u10_has_key__input').value;

    let txt10 = false;
    for(let key in a7){

        if( key == val ){
            txt10 = true;
            break;
        }

    }

    document.querySelector('.u10_div').innerHTML = txt10;
}




// Task 11
// Создайте массив, который описывает метро киевского метрополитена, выведите его на страницу.

let a11 = {
    "red" : ['Академгородок','Житомирская','Святошин','Святошин','Нивки','Берестейская','Шулявская','Политехнический институт','Вокзальная','Университет','Театральная','Крещатик','Арсенальная','Днепр','Гидропарк','Левобережная','Дарница','Черниговская','Лесная'],
    "green" : ['Виноградарь','Мостицкая','Сырец','Дорогожичи','Лукьяновская','Львовская брама','Золотые ворота','Дворец спорта','Кловская','Печерская','Дружбы народов','Выдубичи','Теличка','Славутич','Осокорки','Позняки','Харьковская','Вырлица','Бориспольская','Красный хутор'],
    "blue" : ['Героев Днепра','Минская','Оболонь','Петровка','Тараса Шевченко','Контрактовая площадь','Почтовая площадь','Майдан Незалежности','Площадь Льва Толстого','Олимпийская','Дворец «Украина»','Лыбедская','Демиевская','Голосеевская','Васильковская','Выставочный центр','Ипподром','Теремки','Одесская'],
};


let txt11 = [];
for(let key in a11){

    txt11 += key + ' : ';

    for(let i = 0; i < a11[key].length; i++){

        let separator = ( i == a11[key].length-1 ) ? '' : ' / ';

        txt11 += a11[key][i] + separator;
    }

    txt11 += '<br> ';
}

document.querySelector('.u11_div').innerHTML = txt11;



// Task 12
// Добавьте к предыдущей задаче select.u12-branch и кнопку. Пользователь может выбрать цвет ветки и нажать кнопку, после чего на страницу будут выведены только станции данной ветки.

document.querySelector('.u12_bt').onclick = function () {

    let val = document.querySelector('#t12_select').value;
    let txt12 = '';

    for(let i = 0; i < a11[val].length; i++){

        let separator = ( i == a11[val].length-1 ) ? '' : ' / ';

        txt12 += a11[val][i] + separator;
    }

    document.querySelector('.u12_div').innerHTML = txt12;

}



// Task 13
// Добавьте к предыдущей задаче кнопку button.u13-reverse которая при нажатии выводит станции ветки в обратном порядке. Внимание! Все подобные задачи не меняют массив, а меняют только вывод!!!

document.querySelector('.u13_bt').onclick = function () {

    let val = document.querySelector('#t13_select').value;
    let txt13 = '';

    for(let i = a11[val].length-1; i >= 0; i--){

        let separator = ( i == 0 ) ? '' : ' / ';

        txt13 += a11[val][i] + separator;
    }

    document.querySelector('.u13_div').innerHTML = txt13;

}



// Task 14
// Добавьте к предыдущей задаче select.u14-find-station и кнопку. В select - пользователь может выбрать станцию, а вы перебирая массив - вывести ветку на которой эта станция находится.

document.querySelector('.u14_bt').onclick = function () {

    let val = document.querySelector('#t14_select').value;


    for( var key in a11 ) {

        if(  a11[key].indexOf( val ) !== -1 ){
            document.querySelector('.u14_div').innerHTML = key;
            break;
        }

    }

}



// Task 15
// Добавьте к предыдущему заданию 2 select где пользователь может выбрать 2 станции, и если они на одной ветке - то по
// нажатию на кнопку будет показано сколько станций между ними (сами станции не включаем. Если это соседние станции - то 0).

document.querySelector('.u15_bt').onclick = function () {

    let val_1 = document.querySelector('#t15_select_1').value;
    let val_2 = document.querySelector('#t15_select_2').value;

    let line_1 = '';
    let line_2 = '';

    for( var key in a11 ) {

        if(  a11[key].indexOf( val_1 ) !== -1 ){
            line_1 = key;
        }
        if(  a11[key].indexOf( val_2 ) !== -1 ){
            line_2 = key;
        }

    }

    if(line_1 == line_2){

        let a = a11[line_1].indexOf( val_1 );
        let b = a11[line_1].indexOf( val_2 );

        document.querySelector('.u15_div').innerHTML = (a < b) ? b - a: a - b;
    }else{
        document.querySelector('.u15_div').innerHTML = 'Это разные ветки';
    }

}



// Task 16
// Добавьте 3 radiobutton.u16-radio которые содержат value = red, green, blue - в соотвтествии с цветом веток метро.
// Добавьте пустой select.u16-select. При выборе radio - программа должна в select добавлять option с названиями станций метро.
// Т.е. выбрали radio(value="green") то внутрь select должны быть записаны option со станциями зеленой ветки.
// Выбрали red - select должен быть очищен и добавлены option со станциями красной ветки.

let t16_inp = document.querySelectorAll('.t16');

for (let i = 0; i < t16_inp.length; i++) {
    t16_inp[i].oninput = t16_funk;
}

function t16_funk() {

    let inp = '';

    if(this != window){
        inp = this.getAttribute('id');
    }else{
        inp = document.querySelector(".t16[checked]").getAttribute('id');
    }

    let select = document.querySelector('#t16_select');
    select.innerHTML = '';


    for(let i = 0; i < a11[inp].length;i++){
        select.append(new Option(a11[inp][i], a11[inp][i]));
    }

}
t16_funk();



// Task 17
// Создайте массив, который описывает метро киевского метрополитена и обозначаются конечные и станции перехода, выведите его на страницу.
// Конечные - обозначать 0, перехода - 1.

let a17 = {
    "red" : [['Академгородок',0],['Театральная',1],['Крещатик',1],['Лесная',0]],
    "green" : [['Сырец',0],['Золотые ворота',1],['Дворец спорта',1],['Красный хутор',0]],
    "blue" : [['Героев Днепра',0],['Майдан Незалежности',1],['Площадь Льва Толстого',1],['Теремки',0]],
};

let txt17 = '';
for(let key in a17){
    for(let i = 0; i < a17[key].length; i++){

        let separator = ( i == a17[key].length-1 ) ? '' : ' - ';

        txt17 += a17[key][i] + separator;
    }
    txt17 += '<br>';
}

document.querySelector('.u17_div').innerHTML = txt17;



// Task 18
// Выведите на страницу только станции с переходами из массива a17.

let txt18 = '';
for(let key in a17){
    for(let i = 0; i < a17[key].length; i++){
        if( a17[key][i][1] == 1 ){

            let separator = ( i == a17[key][i].length ) ? '' : ' - ';

            txt18 += a17[key][i] + separator;
        }
    }
    txt18 += '<br>';
}

document.querySelector('.u18_div').innerHTML = txt18;



// Task 19
// Создайте ассоциативный массив где ключами являются страны азии, а вложенными массивами - ассоциативный массив содержащий название столицы, количество населения, площадь. Выведите его на страницу.

let a19 = {
    "Китай" : {
        'Столица' : 'Пекин',
        'Население' : '1,4 млрд человек',
        'Площадь' : '9 596 961 км²',
    },
    "Япония" : {
        'Столица' : 'Токио',
        'Население' : '124 776 364 чел',
        'Площадь' : '377 944 км²',
    },
};

let txt19 = '';

for(let key in a19){

    txt19 += key + '<br>';

    for(let k in a19[key]){

        txt19 += k + ': ' + a19[key][k] + '<br>';

    }
    txt19 += '<br>';

}
document.querySelector('.u19_div').innerHTML = txt19;



// Task 20
// Дополните массив из задачи 19 так, чтобы пользователь мог сам выбирать страну в select, а необходимая информация подтягивалась на страницу.


function t20_funk() {

    let inp = '';

    let select = document.querySelector('#t20_select');
    select.innerHTML = '';


    for(let key in a19){
        select.append(new Option(key, key));
    }

}
t20_funk();


document.querySelector('#t20_select').onchange = function () {

    let inp = this.value;

    let txt20 = inp + ':<br>';

    for(let key in a19[inp]){

        txt20 += key + ': ' + a19[inp][key] + '<br>';

    }

    document.querySelector('.u20_div').innerHTML = txt20;

}























// заполнение select станциями
function station() {

    let station = document.querySelectorAll('.station');

    for(let key in a11){
        for(let i = 0; i < a11[key].length;i++){
            for (let k = 0; k < station.length; k++) {
                station[k].append(new Option(a11[key][i], a11[key][i]));
            }
        }
    }

}
station();