/*  кнопка наверх
var goTopBtn = document.querySelector('.back_to_top');

window.addEventListener('scroll', trackScroll);
goTopBtn.addEventListener('click', backToTop);



function trackScroll() {

    var scrolled = window.pageYOffset;                          // Сколько просколено
    var coords = document.documentElement.clientHeight;         // Свойства clientWidth/Height для элемента document.documentElement – это как раз ширина/высота видимой области окна.

    if (scrolled > coords) {
        goTopBtn.classList.add('back_to_top-show');
    }
    if (scrolled < coords) {
        goTopBtn.classList.remove('back_to_top-show');
    }
}


function backToTop() {
    if (window.pageYOffset > 0) {
        window.scrollBy(0, -80);
        setTimeout(backToTop, 0);
    }
}
*/



/*кнопка наверх и вниз*/

/* begin Up-Down button  */
(function() {
    'use strict';

    var upDownBtn = document.querySelector('.up_down_btn');
    var check;

    function trackScroll() {
        var scrolled = window.pageYOffset;                          // Сколько просколено
        var coords = document.documentElement.clientHeight;         // Свойства clientWidth/Height для элемента document.documentElement – это как раз ширина/высота видимой области окна.


        if (scrolled > coords) {
            upDownBtn.classList.add('up_down_btn-show');
            upDownBtn.innerHTML = '&uarr;';
            upDownBtn.setAttribute('title', 'Наверх');
            check = false;
        }
        if (scrolled === 0) {
            upDownBtn.innerHTML = '&darr;';
            upDownBtn.setAttribute('title', 'Вниз');
            check = true;
        }
    }

    function backToTop() {
        upDownBtn.classList.add('up_down_btn-disabled');
        if (!check) {
            (function goTop() {

                if (window.pageYOffset !== 0) {
                    window.scrollBy(0, -80);            // scrollBy(x,y) прокручивает страницу относительно текущих координат.
                    setTimeout(goTop, 0);
                } else {
                    upDownBtn.classList.remove('up_down_btn-disabled');
                }

            })();
            return;

        } else if (check) {
            (function goBottom() {
                var match = Math.ceil(window.pageYOffset + document.documentElement.clientHeight);

                if (match != document.documentElement.scrollHeight) {
                    window.scrollBy(0, 80);
                    setTimeout(goBottom, 0);
                } else {
                    upDownBtn.classList.remove('up_down_btn-disabled');
                }

            })();
            return;
        }

    }

    window.addEventListener('scroll', trackScroll);
    upDownBtn.addEventListener('click', backToTop);
})();
/* end Up-Down button  */