// Task 1
// Создайте массив a. Выведите его на страницу. Элементы внутри вложенных массивов разделяйте пробелом, между вложенными массивами - перенос строки!

const a = [
    [1,2,3],
    ['a','b','c'],
    [ 4,5,6],
    ['d','e','f'],
    [ 7,8,9],
];
let t1_txt = '';
for( let i = 0; i < a.length; i++){
    for(let k = 0; k < a[i].length; k++){
        t1_txt += a[i][k] + ' ';
    }
    t1_txt += '<br>';
}
document.querySelector('.out_1').innerHTML = t1_txt;



// Task 2
// Выведите на страницу символ 3 из массива a.

document.querySelector('.out_2').innerHTML = a[0][2];



// Task 3
// Выведите на страницу символ e из массива a.

document.querySelector('.out_3').innerHTML = a[3][1];



// Task 4
// Выведите на страницу содержимое третьего вложенного массива в массиве a.

document.querySelector('.out_4').innerHTML = a[2];



// Task 5
// Выведите на страницу только первые элементы вложенных массивов массива a.

let t5_txt = '';

for( let i = 0; i < a.length; i++){
    for(let k = 0; k < 1; k++){
        t5_txt += a[i][k] + ' ';
    }
    t5_txt += '<br>';
}

document.querySelector('.out_5').innerHTML = t5_txt;


// Task 6
// Выведите на страницу только четные вложенные массивы массива a.

let t6_txt = '';

for( let i = 0; i < a.length; i++){

    if( i % 2 ){
        for(let k = 0; k < a[i].length; k++){
            t6_txt += a[i][k] + ' ';
        }
        t6_txt += '<br>';
    }

}

document.querySelector('.out_6').innerHTML = t6_txt;


// Task 7
// Выведите на страницу только числа из массива a.

let t7_txt = '';

for( let i = 0; i < a.length; i++){

    for(let k = 0; k < a[i].length; k++){
        if( Number(a[i][k]) ){

            t7_txt += a[i][k] + ' ';

            if( k + 1 == a[i].length ){
                t7_txt += '<br>';
            }
        }
    }

}

document.querySelector('.out_7').innerHTML = t7_txt;



// Task 8
// Выведите на страницу длины вложенных массивов в массив a.

let t8_txt = '';

for( let i = 0; i < a.length; i++){

    t8_txt += a[i].length + '<br>';

}

document.querySelector('.out_8').innerHTML = t8_txt;



// Task 9
// Выведите на страницу элементы массива a в обратном порядке, т.е.

let t9_txt = '';
for( let i = a.length-1; i >= 0; i--){

    for(let k = a[i].length-1; k >= 0; k--){
        t9_txt += a[i][k] + ' ';
    }

}
document.querySelector('.out_9').innerHTML = t9_txt;


// Task 10
// Выведите на страницу элементы массива a, причем вложенные массивы должны выводиться в обратном порядке:

let t10_txt = '';
for( let i = 0; i < a.length; i++){

    for(let k = a[i].length-1; k >= 0; k--){
        t10_txt += a[i][k] + ' ';
    }
    t10_txt += '<br>';
}
document.querySelector('.out_10').innerHTML = t10_txt;


// Task 11
// Создайте массив шахматную доску. Белые - 0, черные - 1. Выведите на страницу.

let t11_txt = '';
let t11_A = '';
let t11_B = '';

for( let i = 0; i < 8; i++){

    for(let k = 0; k < 8; k++){

        if (i % 2) {
            t11_A = '0 ';
            t11_B = '1 ';
        } else {
            t11_B = '0 ';
            t11_A = '1 ';
        }


        if( k % 2){
            t11_txt += t11_A;
        }else{
            t11_txt += t11_B;
        }

    }
    t11_txt += '<br>';

}

document.querySelector('.out_11').innerHTML = t11_txt;



// Task 12
// Создайте массив шахматную доску. Белые - 0, черные - 1. Напишите функцию, которая выводит данный массив в виде шахматной доски - блоки div в нужном порядке, закранные цветом.

let t12_txt = '';
let t12_colorA = '';
let t12_colorB = '';

for( let i = 0; i < 8; i++){

    for(let k = 0; k < 8; k++){

        if (i % 2) {
            t12_colorA = 'w';
            t12_colorB = 'b';
        } else {
            t12_colorB = 'w';
            t12_colorA = 'b';
        }


        if( k % 2){
            t12_txt += `<span class="${t12_colorA}"></span>`;
        }else{
            t12_txt += `<span class="${t12_colorB}"></span>`;
        }

    }

}

document.querySelector('.out_12').innerHTML = t12_txt;



// Task 13
// Создайте массив, который подходит под следующие условия:
// - b[0][1] == 4;
// - b[3][2] == 5

const b = [
    [4,4],
    [],
    [],
    [5,5,5],
];



// Task 14
// Создайте массив, который подходит под следующие условия:
// - c[0][1] == 4;
// - c[2] == 5

const c = [
    [4,4],
    [],
    5,
];



// Task 15
// Создайте массив, который подходит под следующие условия:
// - d[0][1] == 4;
// - d[2][3] == 5
// - d[6] = [4,5]

const d = [
    [0,4],
    [1],
    [2,0,0,5],
    [3],
    [4],
    [5],
    [
        [4,5]
    ],
];



// Task 16
// Создайте массив, который подходит под следующие условия:
// - e[0][1] == 4;
// - e[2][3] == 5
// - e[6][0][1] = 6;

const e = [
    [0,4],
    [1],
    [2,0,0,3],
    [3],
    [4],
    [5],
    [
        [0,6]
    ],
];



// Task 17
// Создайте массив, который подходит под следующие условия:
// - f[0][1][3] == 4;
// - f[2][1][1] == 5
// - f[6][0][1] = 6;

const f = [
    [
        0,
        [0,0,0,4]
    ],
    [1],
    [
        0,
        [0,5]
    ],
    [3],
    [4],
    [5],
    [
        [
            0,
            6
        ]
    ],
];



// Task 18
// Создайте массив, который подходит под следующие условия:
// - g[0][1][3] == 4;
// - g[2][1][3] == 5
// - g[6][0][1] = 6;
// - g[3] == g[5];

const g = [
    [
        0,
        [0,0,0,4]
    ],
    [1],
    [
        0,
        [0,0,0,5]
    ],
    [3],
    [4],
    [3],
    [
        [
            0,
            6
        ]
    ],
];



// Task 19
// Выведите на страницу сумму элементов массива a (только чисел).

let t19_txt = 0;

for( let i = 0; i < a.length; i++){

    for(let k = 0; k < a[i].length; k++){
        if( Number(a[i][k]) ){
            t19_txt += a[i][k];
        }
    }

}

document.querySelector('.out_19').innerHTML = t19_txt;



// Task 20
// Создайте массив, который эмулирует доску для крестиков - ноликов, напишите все возможные выиграшные комбинации, т.е. a[0][0], a[0][1], a[0][2] - занята первая линия, и т.д.

let cross_zero = [
    [
        [0,0,0],
        [1,0,1],
        [1,0]
    ],
    [
        [1,1,1],
        [0,0,1],
        [0,0]
    ],
    [
        [0,,0],
        [0,1,0],
        [1,1,1]
    ],
    //......
]