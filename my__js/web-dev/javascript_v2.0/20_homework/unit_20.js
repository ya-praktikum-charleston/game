
// Task 1 ============================================
/* Дан input .i-1. Напишите функцию t1, которая выводит в .out-1 символ и возвращает его. Во всех последующих задачах - работаем с латиницей и цифрами.*/

function t1() {
    let val = this.value;
    document.querySelector('.out-1').innerHTML = val;
    return val;
}

document.querySelector('.i-1').oninput = t1;



// Task 2 ============================================
/*  Дан input .i-2. Напишите функцию t2, которая выводит в .out-2 код символа и возвращает его. */

function t2(e) {
    let code = e.keyCode;
    document.querySelector('.out-2').innerHTML = code;
    return code;
}

document.querySelector('.i-2').onkeydown = t2;



// Task 3 ============================================
/*  Дан input .i-3. Напишите функцию t3, которая выводит на страницу true если введен символ и false если цифра. Для определения - используйте код клавиши. */

let w3 = 75;

function t3(e) {
    let code = e.keyCode;

    if( code >= 48 && code <= 57 || code >= 96 && code <= 105 ){
        document.querySelector('.out-3').innerHTML = 'false';
    }else{
        document.querySelector('.out-3').innerHTML = 'true';
    }
}

document.querySelector('.i-3').onkeydown = t3;


// Task 4 ============================================
/*  Дан input .i-4. Напишите функцию t4, которая выводит в .out-4 только символы в нижнем регистре. Т.е. ввели ab4Bci в out получаем ab4bci. */

function t4() {
    let val = this.value.toLowerCase();
    document.querySelector('.out-4').innerHTML = val;
}

document.querySelector('.i-4').oninput = t4;



// Task 5 ============================================
/*  Дан input .i-5. Напишите функцию t5, которая выводит в .out-5 все вводимые символы в верхнем регистре. Т.е. пользователь ввел AbCd и функция выведет ABCD. */

function t5() {
    let val = this.value.toUpperCase();
    document.querySelector('.out-5').innerHTML = val;
}

document.querySelector('.i-5').oninput = t5;



// Task 6 ============================================
/*  Дан input .i-6. Напишите функцию t6, которая выводит в .i-6 только символы в нижнем регистре.  */

function t6() {
    let val = this.value.toLowerCase();
    this.value = val;
    document.querySelector('.out-6').innerHTML = val;
}

document.querySelector('.i-6').oninput = t6;



// Task 7 ============================================
/*  Дан input .i-7. Напишите функцию t7, которая выводит в .out-7 случаный символ из массива a7 при каждом вводе символа. */

function t7() {
    let val = this.value;
    this.value = val.substring(0, val.length - 1);

    const a7 = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    var rand = Math.floor(Math.random() * a7.length);
    this.value += a7[rand];

}

document.querySelector('.i-7').oninput = t7;



// Task 8 ============================================
/*  Дан input .i-8. Напишите функцию t8, которая выводит в .out-8 вводимый в input текст, но заменяет i на 1, o на 0, l на 7. */

function t8() {

    let val = this.value;
    var replaceChars = { "i":"1" , "o":"0", "l":"7" };

    for (var key in replaceChars) {
        val = val.replace(new RegExp(key, 'g'), replaceChars[key]);
    }

    document.querySelector('.out-8').innerHTML = val;

}

document.querySelector('.i-8').oninput = t8;


// Task 9 ============================================
/* Дан input .i-9. Напишите функцию t8, выводит в .out-9 количество нажатых клавиш стрелка вниз. */

let colDown = 0;

function t9(e) {
    let code = e.keyCode;

    if( code == 40 ){
        colDown++;
    }
    document.querySelector('.out-9').innerHTML = colDown;

}

document.querySelector('.i-9').onkeydown = t9;


// Task 10 ============================================
/*  Дан input .i-10 и изображение 1.png. Добавьте событие на input, при нажатии клавиш стрелка вправо и стрелка влево увеличивать ширину изображения. Клавиши стрелка вверх и вниз - увеличивать высоту изображения. Одно нажатие клавиши - 1px. */

function t10(e) {
    let code = e.keyCode;
    let div = document.querySelector('.div-10');

    switch (code) {
        case 38:
            div.style.height = ++div.offsetHeight + 'px';
            break;
        case 40:
            div.style.height = --div.offsetHeight + 'px';
            break;
        case 37:
            div.style.width = --div.offsetWidth + 'px';
            break;
        case 39:
            div.style.width = ++div.offsetWidth + 'px';
            break;
    }

}

document.querySelector('.i-10').onkeydown = t10;




// Task 11 ============================================
/*  Проект. Дан input .i-11. Используя знания html и css нарисуйте клавиатуру (можно схематически). Изображение должно содержать числа, символьные клавиши, пробел, enter, caps lock, shift, tab, alt. При вводе текста в input в момент нажатия клавиши - затемняйте ее, в момент отпускания - возвращайте к первоначальному состоянию. Аналогично при нажатии enter, space, alt, shift, ctrl. Затемнение реализуйте через добавление класса CSS. Для удобства рекомендую каждой клавише добавить атрибут data с символом. Если нажата клавиша caps lock - то присвоить ей затемнение, которое работает до последующего отжатия клавиши. */


let $keyboardLi = document.querySelectorAll(`#keyboard li`);

function t11(e) {

    $keyboardLi.forEach(elem => {
        if( !elem.classList.contains('capslock') ){
            elem.classList.remove('active');
        }
    })

    let code = e.code;

    for( let key in $keyboardLi ) {

        if( $keyboardLi[key].getAttribute('data-code') == code ){

            if ( code == 'Tab' ) {
                $keyboardLi[key].classList.add('active');
                setTimeout(function () {
                    $keyboardLi[key].classList.remove('active');
                }, 100);
            }else if( code == 'CapsLock' ){
                $keyboardLi[key].classList.toggle('active');
            }else{
                $keyboardLi[key].classList.add('active');
                this.onkeyup = () => {$keyboardLi[key].classList.remove('active');};
            }

            break;
        }

    }

}

document.querySelector('.i-11').onkeydown = t11;



