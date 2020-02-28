
// Task 1 ============================================
/* 
 <p>Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 1. </p>
<p>Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 2. </p>
<p>Два запроса объедините с помощью promiseAll. Результат выведите в out-1 результат. Запускаться функция
    должна по нажатию b-1.</p>
*/

let a1 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=1')
        .then(data => {
            resolve(data.text());
        })

});

let b1 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=2&name=vit')
        .then(data => {
            resolve(data.text());
        })

});

function t1() {
    Promise.all([a1, b1]).then(value => {
        document.querySelector('.out-1').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-1').onclick = t1;



// Task 2 ============================================
/* 
 <p> Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 3. Добавьте
параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет сумму чисел.</p>
<p>Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 4.
Добавьте параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет случайное число в
заданном
диапазоне.</p>
<p>Два запроса объедините с помощью promiseAll.
Выведите в out-2 результат. Запускаться функция должна по нажатию b-2. </p>

*/

let a2 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=3&num1=1&num2=2')
        .then(data => {
            resolve(data.text());
        })

});

let b2 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=4&num1=1&num2=10')
        .then(data => {
            resolve(data.text());
        })

});

function t2() {
    Promise.all([a2, b2]).then(value => {
        document.querySelector('.out-2').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-2').onclick = t2;



// Task 3 ============================================
/*  
<p> Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 5.
Если все сделано верно, сервер вернет текущее время и дату. Не забывайте указывать параметр auth (ключ в
чате). </p>
<p> Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 6.
Добавьте
параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет большее число.</p>
<p>Два
запроса объедините с помощью promiseAll.
Выведите в out-3 результат. Запускаться функция должна по нажатию b-3. </p>
                 */

let a3 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=5')
        .then(data => {
            resolve(data.text());
        })

});

let b3 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=6&num1=1&num2=10')
        .then(data => {
            resolve(data.text());
        })

});

function t3() {
    Promise.all([a3, b3]).then(value => {
        document.querySelector('.out-3').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-3').onclick = t3;



// Task 4 ============================================
/*  
 <p> Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 7.
Если все
сделано верно, сервер случайную ссылку на изображение. Не забывайте указывать параметр auth (ключ в
чате). </p>
<p>Отправьте GET запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 8. В
качестве параметра по очереди укажите year равный году вашего рождения. Если все правильно сервер вернет
ваш возраст.</p>
<p>Выведите в out-4 результат. Запускаться функция должна по нажатию b-4.</p>

*/

let a4 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=7')
        .then(data => {
            resolve(data.text());
        })

});

let b4 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php?auth=zhrgB3DxC8LoG7Gcisjc&action=8&year=1987')
        .then(data => {
            resolve(data.text());
        })

});

function t4() {
    Promise.all([a4, b4]).then(value => {
        document.querySelector('.out-4').innerHTML = `1: <img src="${value[0]}" alt=""> <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-4').onclick = t4;



// Task 5 ============================================
/*  
 <p>Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 1.</p>
<p>Отправьте
POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 2. </p>
<p>Два
запроса объедините с помощью promiseAll. Результат выведите в out-5 результат. Запускаться функция
должна по нажатию b-5.</p>
*/

let a5 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=1'
    }).then(data => {
        resolve(data.text());
    })
});

let b5 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=2&name=vit'
    }).then(data => {
        resolve(data.text());
    })
});

function t5() {
    Promise.all([a5, b5]).then(value => {
        document.querySelector('.out-5').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-5').onclick = t5;



// Task 6 ============================================
/* 
 <p> Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 3.
    Добавьте
    параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет сумму чисел. </p>
<p>Отправьте POST
    запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 4.
    Добавьте параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет случайное число в
    заданном
    диапазоне.</p>
<p> Два запроса объедините с помощью promiseAll.
    Выведите в
    out-6 результат. Запускаться функция должна по нажатию b-6. </p>
*/

let a6 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=3&num1=1&num2=2'
    }).then(data => {
        resolve(data.text());
    })
});

let b6 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=4&num1=1&num2=10'
    }).then(data => {
        resolve(data.text());
    })
});

function t6() {
    Promise.all([a6, b6]).then(value => {
        document.querySelector('.out-6').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-6').onclick = t6;



// Task 7 ============================================
/*  
 <p> Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 5.
Если все сделано верно, сервер вернет текущее время и дату. Не забывайте указывать параметр auth (ключ в
чате).</p>
<p>Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 6.
Добавьте параметр num1 и num2 содержащие числа. Если все сделано верно, сервер вернет большее число.</p>
<p>Два запроса объедините с помощью promiseAll.
Выведите в out-7 результат. Запускаться функция должна по нажатию b-7. </p>

*/

let a7 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=5'
    }).then(data => {
        resolve(data.text());
    })
});

let b7 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=6&num1=1&num2=10'
    }).then(data => {
        resolve(data.text());
    })
});

function t7() {
    Promise.all([a7, b7]).then(value => {
        document.querySelector('.out-7').innerHTML = `1: ${value[0]} <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-7').onclick = t7;



// Task 8 ============================================
/* 
<p> Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 7.
Если все сделано верно, сервер случайную ссылку на изображение. Не забывайте указывать параметр auth
(ключ в
чате).</p>
<p>Отправьте POST запрос на сайт http://getpost.itgid.info/index2.php. В качестве action укажите 8. В
качестве параметра по очереди укажите year равный году вашего рождения. Если все правильно сервер вернет
ваш возраст.</p>
<p>Два запроса объедините с помощью promiseAll. Выведите в out-8 результат. Запускаться функция должна по
нажатию b-8.</p>
*/

let a8 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=7'
    }).then(data => {
        resolve(data.text());
    })
});

let b8 = new Promise((resolve, reject) => {
    fetch('http://getpost.itgid.info/index2.php',{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'auth=zhrgB3DxC8LoG7Gcisjc&action=8&year=1987'
    }).then(data => {
        resolve(data.text());
    })
});

function t8() {
    Promise.all([a8, b8]).then(value => {
        document.querySelector('.out-8').innerHTML = `1: <img src="${value[0]}" alt=""> <br>2: ${value[1]}`;
    });
}

document.querySelector('.b-8').onclick = t8;

