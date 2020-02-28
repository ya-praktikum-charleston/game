
// Task 1 ============================================
/* Создайте блок div-1. Добавьте на него событие onclick. При срабатывании события  выводите в out-1 количество срабатываний события. В комментариях опишите результат. */

let a1 = 0;
function t1() {
    a1++;
    document.querySelector('.out-1').innerHTML = 'click ' + a1;
}

document.querySelector('.div-1').onclick = t1;      // клик по элементу, срабатывает при одновременной регистрации событий mousedown и mouseup на элементе



// Task 2 ============================================
/* Создайте блок div-2. Добавьте на него событие ondblclick. При срабатывании события  выводите в out-2 количество срабатываний события. В комментариях опишите результат. */

let a2 = 0;
function t2() {
    a2++;
    document.querySelector('.out-2').innerHTML = 'click ' + a2;
}

document.querySelector('.div-2').ondblclick = t2;       // двойной клик по элементу


// Task 3 ============================================
/*  Создайте блок div-3. Добавьте на него событие onmousemove. При срабатывании события выводите в out-3 количество срабатываний события. В комментариях опишите результат. */

let a3 = 0;
function t3() {
    a3++;
    document.querySelector('.out-3').innerHTML = 'click ' + a3;
}

document.querySelector('.div-3').onmousemove = t3;      // Движение мыши внутри элемента, срабатывает когда пользователь передвигает курсор мыши на один пиксель


// Task 4 ============================================
/*  Создайте блок div-4. Добавьте на него событие oncontextmenu. При срабатывании события выводите в out-4 количество срабатываний события. В комментариях опишите результат. */

let a4 = 0;
function t4() {
    a4++;
    document.querySelector('.out-4').innerHTML = 'click ' + a4;
}

document.querySelector('.div-4').oncontextmenu = t4;        // клик правой кнопкой мыши



// Task 5 ============================================
/*   Создайте блок div-5. Добавьте на него событие onmousedown. При срабатывании события выводите в out-5 количество срабатываний события. В комментариях опишите результат. */

let a5 = 0;
function t5() {
    a5++;
    document.querySelector('.out-5').innerHTML = 'click ' + a5;
}

document.querySelector('.div-5').onmousedown = t5;      // нажатие кнопки мыши на элементе



// Task 6 ============================================
/*  Создайте блок div-6. Добавьте на него событие onmouseenter. При срабатывании события выводите в out-6 количество срабатываний события. В комментариях опишите результат. */

let a6 = 0;
function t6() {
    a6++;
    document.querySelector('.out-6').innerHTML = 'click ' + a6;
}

document.querySelector('.div-6').onmouseenter = t6;     // Наведение мыши на элемент. Похоже на onmouseover, с тем отличием, что у onmouseenter нет всплытия



// Task 7 ============================================
/*   Создайте блок div-7. Добавьте на него событие onmouseleave. При срабатывании события выводите в out-7 количество срабатываний события. В комментариях опишите результат.*/

let a7 = 0;
function t7() {
    a7++;
    document.querySelector('.out-7').innerHTML = 'click ' + a7;
}

document.querySelector('.div-7').onmouseleave = t7;     // Курсор покидает элемент. Похоже на onmouseout, с тем отличием, что у onmouseleave нет всплытия



// Task 8 ============================================
/*   Создайте блок div-8. Добавьте на него событие onmouseout. При срабатывании события выводите в out-8 количество срабатываний события. В комментариях опишите результат.*/

let a8 = 0;
function t8() {
    a8++;
    document.querySelector('.out-8').innerHTML = 'click ' + a8;
}

document.querySelector('.div-8').onmouseout = t8;       // Курсор покидает элемент



// Task 9 ============================================
/* Создайте блок div-9. Добавьте на него событие onmouseover. При срабатывании события выводите в out-9 количество срабатываний события. В комментариях опишите результат. */

let a9 = 0;
function t9() {
    a9++;
    document.querySelector('.out-9').innerHTML = 'click ' + a9;
}

document.querySelector('.div-9').onmouseover = t9;      // Наведение мыши на элемент.



// Task 10 ============================================
/*  Создайте блок div-10. Добавьте на него событие onmouseup. При срабатывании события выводите в out-10 количество срабатываний события. В комментариях опишите результат.*/

let a10 = 0;
function t10() {
    a10++;
    document.querySelector('.out-10').innerHTML = 'click ' + a10;
}

document.querySelector('.div-10').onmouseup = t10;      // // Отжатие мыши





