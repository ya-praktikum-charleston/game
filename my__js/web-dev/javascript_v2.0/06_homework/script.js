// Task 1
// С помощью вложенных циклов и символа * нарисуйте:  *** *** ***

let txt_u1 = '';
for(let i = 0; i < 3; i++){
    for(let k = 0; k < 3; k++){
        txt_u1 += '*';
    }
    txt_u1 += ' ';
}

document.querySelector('.u6_t1_div').innerHTML = txt_u1;



// Task 2
// С помощью вложенных циклов и символа * нарисуйте:
// *****
// *****
// *****

let txt_u2 = '';
for(let i = 0; i < 3; i++){
    for(let k = 0; k < 5; k++){
        txt_u2 += '*';
    }
    txt_u2 += '<br>';
}

document.querySelector('.u6_t2_div').innerHTML = txt_u2;



// Task 3
// С помощью вложенных циклов и символа 1,0 нарисуйте прямоугольник. 1 или 0 выводите в зависимости от того четная или нет переменная внутреннего цикла.
//  101010
//  101010
//  101010

let txt_u3 = '';
for(let i = 0; i < 3; i++){

    for(let k = 0; k < 6; k++){
        if ( !(k % 2) ){
            txt_u3 += '1';
        }else{
            txt_u3 += '0';
        }
    }

    txt_u3 += '<br>';
}

document.querySelector('.u6_t3_div').innerHTML = txt_u3;




// Task 4
// С помощью вложенных циклов и символа 1,0 нарисуйте прямоугольник. 1 или 0 выводите в зависимости от того четная или нет переменная внутреннего цикла. Каждый третий элемент заменяйте на x:
// 10x01x
// 10x01x
// 10x01x

let txt_u4 = '';
for(let i = 0; i < 3; i++){

    for(let k = 1; k < 7; k++){
        if ( k % 3 == 0 ) {
            txt_u4 += 'x';
        } else if ( k % 2 ){
            txt_u4 += '1';
        } else {
            txt_u4 += '0';
        }
    }

    txt_u4 += '<br>';
}

document.querySelector('.u6_t4_div').innerHTML = txt_u4;



// Task 5
// С помощью вложенных циклов и символа * нарисуйте:
// *
// **
// ***

let txt_u5 = '';

for(let i = 0; i <= 3; i++){
    for(let k = 0; k < i; k++){
        txt_u5 += '*';
    }
    txt_u5 += '<br>';
}

document.querySelector('.u6_t5_div').innerHTML = txt_u5;



// Task 6
// С помощью вложенных циклов и символа * нарисуйте:
// *****
// ****
// ***
// **
// *

let txt_u6 = '';

for(let i = 5; i > 0; i--){
    for(let k = i; k > 0; k--){
        txt_u6 += '*';
    }
    txt_u6 += '<br>';
}

document.querySelector('.u6_t6_div').innerHTML = txt_u6;



// Task 7
// С помощью вложенных циклов и символа * нарисуйте:
//  *****
// *****
//*****

let txt_u7 = '';

for(let i = 3; i > 0; i--){
    for(let k = i; k > 0; k--){
        txt_u7 += '&nbsp;&nbsp;';
    }
    txt_u7 += '****** <br>';
}

document.querySelector('.u6_t7_div').innerHTML = txt_u7;





// Task 8
// С помощью вложенных циклов и символа * нарисуйте:
// *
// **
// ***
// **
// *

let txt_u8 = '';
let max_t8 = 3;

for(let i = 0; i <= max_t8; i++){
    for(let k = 0; k < i; k++){
        txt_u8 += '*';
    }
    txt_u8 += '<br>';
}

for(let i = max_t8-1; i > 0; i--){
    for(let k = i; k > 0; k--){
        txt_u8 += '*';
    }
    txt_u8 += '<br>';
}

document.querySelector('.u6_t8_div').innerHTML = txt_u8;



// Task 9
// С помощью вложенных циклов и символа * нарисуйте:
// ******
// *    *
// *    *
// *    *
// ******

let txt_u9 = '';
let height_t9 = 5;
let width_t9 = 6;

for(let i = 1; i <= height_t9; i++){

    if( i == 1) {
        for(let k = 1; k <= width_t9; k++){
            txt_u9 += '*';
        }
    }else if (i == height_t9) {
        for(let k = 1; k <= width_t9; k++){
            txt_u9 += '*';
        }
    }else {
        for(let j = 1; j <= width_t9; j++){
            if(j == 1 || j == width_t9){
                txt_u9 += '*';
            }else{
                txt_u9 += '&nbsp;&nbsp;';
            }

        }
    }

    txt_u9 += '<br>';
}

document.querySelector('.u6_t9_div').innerHTML = txt_u9;



// Task 10
// С помощью вложенных циклов и символа который вводит пользователь нарисуйте:
// ******
// *    *
// *    *
// *    *
// ******

document.querySelector('#u6_t10_in').oninput = function () {

    let u6_t10_val = u6_t10_in.value;
    if (u6_t10_val == u6_t10_val) {

        let txt_u10 = '';
        let height_t10 = 5;
        let width_t10 = 6;

        for(let i = 1; i <= height_t10; i++){

            if( i == 1) {
                for(let k = 1; k <= width_t10; k++){
                    txt_u10 += `<span>${u6_t10_val}</span>`;
                }
            }else if (i == height_t10) {
                for(let k = 1; k <= width_t10; k++){
                    txt_u10 += `<span>${u6_t10_val}</span>`;
                }
            }else {
                for(let j = 1; j <= width_t10; j++){
                    if(j == 1 || j == width_t10){
                        txt_u10 += `<span>${u6_t10_val}</span>`;
                    }else{
                        txt_u10 += `<span></span>`;
                    }

                }
            }

            txt_u10 += '<br>';
        }

        document.querySelector('.u6_t10_div').innerHTML = txt_u10;

    }

}


// Task 11
// С помощью вложенных циклов вывените таблицу умножения на 6 и 7.

let u6_t11_div = document.querySelector('.u6_t11_div');
let u6_t11_txt = '';

for(let i = 6; i <=7; i++){

    for(let k = 1; k <= 10; k++){
        u6_t11_txt += `${i} * ${k} = ${i * k}<br>`
    }

    u6_t11_txt += '<br>'
}



u6_t11_div.innerHTML = u6_t11_txt;



// Task 12
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// 1
// 1 2
// 1 2 3
// 1 2 3 4
// 1 2 3 4 5


let u6_t12_txt = '';

for(let i = 1; i <= 5; i++){

    for(let k = 1; k <= i; k++){
        u6_t12_txt += `${k}&nbsp;`;
    }

    u6_t12_txt += '<br>';
}

document.querySelector('.u6_t12_div').innerHTML = u6_t12_txt;



// Task 13
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// 01 02 03 04 05 06 07 08 09 10
// 11 12 13 14 15 16 17 18 19 20
// 21 22 23 24 25 26 27 28 29 30
// 31 32 33 34 35 36 37 38 39 40
// 41 42 43 44 45 46 47 48 49 50

let u6_t13_txt = '';

for(let i = 1, k = 1; i <= 50; i++){

    if(i < 10){
        u6_t13_txt += `0${i}&nbsp;`;
    }else if(i / 10 / k == 1){
        u6_t13_txt += `${i}<br>`;
        k++;
    }else{
        u6_t13_txt += `${i}&nbsp;`;
    }

}

document.querySelector('.u6_t13_div').innerHTML = u6_t13_txt;


// Task 14
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// 5 4 3 2 1
// 4 3 2 1
// 3 2 1
// 2 1
// 1

let u6_t14_txt = '';

for(let i = 5; i >= 1; i--){

    for(let k = i; k >= 1; k--){
        u6_t14_txt += `${k}&nbsp;`;
    }

    u6_t14_txt += '<br>';
}

document.querySelector('.u6_t14_div').innerHTML = u6_t14_txt;


// Task 15
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// X X X X 1
// X X X 2 1
// X X 3 2 1
// X 4 3 2 1
// 5 4 3 2 1

let u6_t15_txt = '';

for(let i = 1; i <= 5; i++){

    for(let k = 5; k > i; k--){
        u6_t15_txt += `X&nbsp;`;
    }

    for(let k = i; k >= 1; k--){
        u6_t15_txt += `${k} &nbsp;`;
    }

    u6_t15_txt += '<br>';
}

document.querySelector('.u6_t15_div').innerHTML = u6_t15_txt;


// Task 16
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// 1
// 2  2
// 3  3  3
// 4  4  4  4
// 5  5  5  5  5

let u6_t16_txt = '';

for(let i = 1; i <= 5; i++){

    for(let k = 1; k <= i; k++){
        u6_t16_txt += `${i}&nbsp;`;
    }

    u6_t16_txt += '<br>';
}

document.querySelector('.u6_t16_div').innerHTML = u6_t16_txt;



// Task 17
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла:
// 5
// 4  4
// 3  3  3
// 2  2  2  2
// 1  1  1  1  1

let u6_t17_txt = '';

for(let i = 1, j = 5; i <= 5; i++){

    for(let k = 1; k <= i; k++){
        u6_t17_txt += `${j}&nbsp;`;
    }
    j--;
    u6_t17_txt += '<br>';
}

document.querySelector('.u6_t17_div').innerHTML = u6_t17_txt;



// Task 18
// С помощью вложенных циклов нарисуйте, цифры - из счетчиков цикла (четные заменены на X):
// 5
// X  X
// 3  3  3
// X  X  X  X
// 1  1  1  1  1

let u6_t18_txt = '';

for(let i = 1, j = 5; i <= 5; i++){

    if(j % 2 == 0){

        for(let k = 1; k <= i; k++){
            u6_t18_txt += `X&nbsp;`;
        }

    }else{

        for(let k = 1; k <= i; k++){
            u6_t18_txt += `${j}&nbsp;`;
        }

    }

    j--;
    u6_t18_txt += '<br>';
}

document.querySelector('.u6_t18_div').innerHTML = u6_t18_txt;



// Task 19
// С помощью вложенных циклов и символа * нарисуйте:
//   *****
//  *******
// *********

let u6_t19_txt = '';

for(let i = 1, k = 2, max = 9; i <= 3; i++){

    for(let j = 1; j <= max; j++){
        if( j < k || j == k ){
            u6_t19_txt += `&nbsp;&nbsp;`;
        }else if ( max - j < k  ){
            u6_t19_txt += `&nbsp;&nbsp;`;
        }else{
            u6_t19_txt += `*`;
        }

    }
    k--;
    u6_t19_txt += '<br>';

}



document.querySelector('.u6_t19_div').innerHTML = u6_t19_txt;



// Task 20
// С помощью вложенных циклов и символа * нарисуйте:
//   **
//  ****
// ******
//  ****
//   **

let u6_t20_txt = '';

for(let i = 1, k = 2, max = 6,h = 5; i <= h; i++){

    if( i < Math.ceil(h / 2) || i == Math.ceil(h / 2) ){

        for(let j = 1; j <= max; j++){

            if( j < k || j == k ){
                u6_t20_txt += `&nbsp;&nbsp;`;
            }else if ( max - j < k  ){
                u6_t20_txt += `&nbsp;&nbsp;`;
            }else{
                u6_t20_txt += `*`;
            }

        }
        k--;
        u6_t20_txt += '<br>';

    }else{

        for(let j = 1; j <= max; j++){

            if( j < k || j == k ){
                u6_t20_txt += `&nbsp;&nbsp;`;
            }else if ( max - j < k  ){
                u6_t20_txt += `&nbsp;&nbsp;`;
            }else{
                u6_t20_txt += `*`;
            }

        }
        k++;
        u6_t20_txt += '<br>';

    }

    if( k < 0) { k = 1; }
}




document.querySelector('.u6_t20_div').innerHTML = u6_t20_txt;
