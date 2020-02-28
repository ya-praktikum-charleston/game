
// Task 1 ============================================
/* Создайте блок div-1. Добавьте на него событие touchstart. Выведите в out-1 слово  touch если событие сработает. */

function t1() {
    document.querySelector('.out-1').innerHTML += 'move ';
}

document.querySelector('.div-1').addEventListener("touchstart", t1);



// Task 2 ============================================
/* Создайте блок div-2. Добавьте на него событие touchstart. Выведите в out-2 число срабатываний события. */

let colT2 = 0;
function t2() {
    document.querySelector('.out-2').innerHTML = ++colT2;
}

document.querySelector('.div-2').addEventListener("touchstart", t2);



// Task 3 ============================================
/*  Создайте блок div-3_1 и div-3_2. Добавьте на них событие touchstart. Выведите в out-3 номер блока 1 или 2 на котором сработало событие. */

function t3(e) {
    document.querySelector('.out-3').innerHTML = this.textContent;
}

let bt = document.querySelectorAll('.div-3_1, .div-3_2');
bt.forEach(function (bt) {
    bt.addEventListener("touchstart", t3);
})



// Task 4 ============================================
/*  Создайте блок div-4. И кнопку b-4. При нажатии кнопки - добавляйте событие ontouchstart на блок div-4. При событии происходит вывод текста touch в out-4.  */

function t4() {
    document.querySelector('.out-4').innerHTML += 'touch ';
}

document.querySelector('.b-4').addEventListener("touchstart", function () {
    document.querySelector('.div-4').addEventListener("touchstart", t4);
});



// Task 5 ============================================
/*  Дана кнопка b-5. При ее нажатии очищайте событие ontouchstart на блоке div-4. */

function t5() {
    document.querySelector('.div-4').removeEventListener('touchstart', t4, false);
}

document.querySelector('.b-5').addEventListener("touchstart", t5);



// Task 6 ============================================
/*  Добавьте событие ontouchend на div-4. При его срабатывании выведите в out-6 слово touchend. */

function t6() {
    document.querySelector('.out-6').innerHTML = 'touchend';
}

document.querySelector('.div-4').addEventListener("touchend", t6);



// Task 7 ============================================
/*  Дан блок div-7. Добавьте событие touch, при срабатывании которого окрашивайте блок в красный цвет. */

function t7() {
    this.style.backgroundColor = 'red';
}

document.querySelector('.div-7').addEventListener("touchstart", t7);



// Task 8 ============================================
/*  Дан блок div-8. Добавьте на него событие touch, которое при срабатывании окрашивает блок случаным цветом из массива a8=[red, green, blue, orange, pink, yellow] */

function t8() {
    let a8 = ['red', 'green', 'blue', 'orange', 'pink', 'yellow'];
    let randA8 = Math.floor(Math.random() * a8.length);

    this.style.backgroundColor = a8[randA8];
}

document.querySelector('.div-8').addEventListener("touchstart", t8);



// Task 9 ============================================
/* Дан блок div-9. Добавьте событие ontouch. Выводите количество одновременных касаний в out-9. */

function t9() {
    document.querySelector('.out-9').innerHTML = event.touches.length;
}

document.querySelector('.div-9').addEventListener("touchstart", t9);



// Task 10 ============================================
/*  Дан блок div-10. Добавьте на него событие touchmove. При срабатывании события - увеличивайте его ширину на 1. */

function t10(e) {
    let w = this.offsetWidth + 1;
    this.style.width = w + 'px';
}

document.querySelector('.div-10').addEventListener("touchmove", t10);



// Task 11 ============================================
/*  Дан блок div-11. Добавьте на него событие touch. При срабатывании выводите радиус события radiusX, radiusY. */

function t11(e) {

    let rX = e.targetTouches[0].radiusX;
    let rY = e.targetTouches[0].radiusY;

    document.querySelector('.out-11').innerHTML = `radiusX: ${rX} - radiusY: ${rY}`;
}

document.querySelector('.div-11').addEventListener("touchstart", t11);



// Task 12 ============================================
/*  Мини проект. Ознакомьтесь с версткой в задании 12. Добавьте touch события так, чтобы при клике на img-12-min картинка появлялась в блоке div-12-max. Если нажимается кнопка prev - то появляется изображение идущее перед текущим. Если нажимается кнопка next - то после текущего. Выбор изображений зациклен.  Изображение, которое сейчас дублируется в большом блоке должно выделяться классом .active-img. Добавьте кнопку reset для сброса состояния, когда выводится первое изображение. Все изображения и начальное состояние - выводится из массива 
    a = [1.png, 2.png, 3.png, 4.png, 5.png, 6.png] - изображения находятся в папке img.
    Усложните задачу - подумайте как в массиве сохранить информацию текст, которая будет выводиться если картинка активна. Сам текст можно сохранять в data-text при отрисовке изображения.
    Источник иконок https://www.iconfinder.com/iconsets/unigrid-phantom-halloween
*/

let btSlider = document.querySelectorAll('button.button-primary');
let sliderMinImg = document.querySelectorAll('.img-12-min');
let sliderMaxImg = document.querySelector('.div-12-max img');
let sliderTxt = document.querySelector('.img-12-text');

let arrSlider = [
    {img: '1.png',txt:'Успокойник'},
    {img: '2.png',txt:'Элементаль'},
    {img: '3.png',txt:'Инсектоид'},
    {img: '4.png',txt:'Очищение'},
    {img: '5.png',txt:'Неясыть'},
    {img: '6.png',txt:'Полнолуние'}
];

function sliderLoad(index) {
    for( let i = 0; i < sliderMinImg.length; i++ ){
        sliderMinImg[i].classList.remove('active-img');
    }
    sliderMinImg[index].classList.add('active-img');

    sliderMaxImg.setAttribute('src','img/' + arrSlider[index].img);
    sliderTxt.innerHTML = arrSlider[index].txt;

    btSlider.forEach(function (elem) {
        elem.setAttribute('data-id',index);
    })
}
function sliderImg() {
    let $id = this.getAttribute('data-id');
    sliderLoad($id);
}
function sliderPrev() {
    let $id = this.getAttribute('data-id');

    if( $id == 0){
        sliderLoad(sliderMinImg.length - 1);
    }else{
        sliderLoad(--$id);
    }
}
function sliderNext() {
    let $id = this.getAttribute('data-id');

    if( $id ==  sliderMinImg.length - 1){
        sliderLoad(0);
    }else{
        sliderLoad(++$id);
    }
}

sliderLoad(0);

sliderMinImg.forEach(function (elem,index) {
    elem.setAttribute('data-id',index);
    elem.addEventListener("touchstart", sliderImg);
})

document.querySelector('button.prev').addEventListener("touchstart", sliderPrev);
document.querySelector('button.next').addEventListener("touchstart", sliderNext);
