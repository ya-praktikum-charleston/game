<?php include '../include/header.php'; ?>



<div class="linear" id="use_strict">

	<h1>Новый синтаксис Java Script</h1>
	<h2>Деструктивное присваивание</h2>

    <p>Область видимости для локального применения</p>
	<pre class="brush: js;">
		var sandwich =  {
            bread: "1111111",
            meat: "222222" qwqw
        }
        var {bread, meat} = sandwich
        console.log(bread, meat)        // 1111111 222222
	</pre>


    <p>Деструктуризация значений для извлечения из элемента</p>

    <pre class="brush: js;">
        var lordify = ({firstname}) =>
            console.log(`${firstname} of canterbury`)

        var regularPerson = {
            firstname: "Dale",
            lastname: "Smith"
        }
        lordify(regularPerson)          // Dale of canterbury
    </pre>

    <p>Деструктуризация из массива</p>

    <pre class="brush: js;">
        var arr = ["Kirkwood", "Squaw", "Alpine"];
        var [one] = arr
        var [,two] = arr
        var [,,tree] = arr

        console.log(one)     // Kirkwood
        console.log(two)     // Squaw
        console.log(tree)     // Alpine
    </pre>


    <p>Расширение объектных литералов</p>
    <p><code>Литерал объекта</code> - это <code>{}</code></p>

    <pre class="brush: js;">
    var name = "Tallac"
    var elevation = 9738
    var print = function() {
      console.log(`Mt. ${this.name} is ${this.elevation} feet tall`)
    }

    var funHike = { name,elevation,print }

    funHike.print()
    </pre>

</div>


<div class="linear" id="use_strict">
    <h2>Оператор распространения <code>...</code></h2>

    <pre class="brush: js;">
        var peaks = ["Tallac", "Ralston", "Rose"]
        var canyons = ["Ward", "Blackwood"]
        var tahoe = [...peaks, ...canyons]

        console.log(tahoe.join(', '))       // Tallac, Ralston, Rose, Ward, Blackwood
    </pre>

    <p>Оператор распространения может использоваться и для получения некоторых выбранных или остальных элементов массива</p>

    <pre class="brush: js;">
        var lakes = ["11111", "22222", "33333", "44444"]

        var [first_elem,, ...rest] = lakes
        var [last_elem] = [...lakes].reverse()
        var  new_arr= [...lakes].reverse()

        console.log(first_elem)                 // 11111
        console.log(last_elem)                  // 44444
        console.log(new_arr)                    // ["11111", "22222", "33333", "44444"]
        console.log(rest.join(", "))            // 33333, 44444
    </pre>


    <p>Оператор распространения точно так же копирует объекты</p>

    <pre class="brush: js;">
        var morning = {
            breakfast: "11111",
            lunch: "22222"
        }

        var dinner = "33333"

        var backpackingMeals = {
            ...morning,
            dinner
        }

        console.log(backpackingMeals)       //    {
                                            //      breakfast: "11111"
                                            //      dinner: "33333"
                                            //      lunch: "22222"
                                            //    }
        </pre>

</div>

<div class="linear" id="use_strict">

    <h2>Промисы</h2>

    <p>Представляют способ разобраться в асинхронном поведении</p>

    <pre class="brush: js;">
        const getFakeMembers = count => new Promise((resolves, rejects) => {
            const api = `https://api.randomuser.me/?nat=US&results=${count}`
            const request = new XMLHttpRequest()
            request.open('GET', api)
            request.onload = () =>
                (request.status === 200) ?
                    resolves(JSON.parse(request.response).results) :
                    rejects(Error(request.statusText))
            request.onerror = (err) => rejects(err)
            request.send()
        })

        getFakeMembers(5).then( members => console.log(members) )
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>This</h2>

    <p>С помощью <code>this</code> JavaScript определяется точку вызова функции, на который ссылается <code>this</code>. То есть, когда <code>this</code> используется внутри функции, <code>this</code> будет ссылкой на контекст выполнения, из которого выполняется функция.</p>

    <p><b>4 разных способа привязки <code>this</code> в JavaScript</b></p>

    <p>- 1. Ключевое слово <code>new</code></p>

    <p>При применении ключевого слова <code>new</code> будет создан экземпляр определенного пользователем объекта <code>this</code>, который будет привязан к этому объекту. Ключевое слово new делает следующие 4 вещи:</p>

    <ul class="ul_num">
        <li> Создает пустой, простой объект JavaScript.</li>
        <li>Связывает этот объект с другим объектом.</li>
        <li>Передает вновь созданный объект из шага 1 в качестве контекста this.</li>
        <li>Возвращает this, если функция не возвращает собственный объект.</li>

    </ul>

    <p>- 2. Явная привязка</p>

    <p><code>Call()</code> вызвать функцию с явным указанием контекста, <code>function.call(context, [arg1, arg2...])</code> <i>context</i> это то, чем будет this</p>

    <pre class="brush: js;">
        const b1 = document.querySelector('.b_1');

        function test() {
            this.style.background = 'orange';
        }

        test.call(b1);      // вызвал функцию = this = b1


        function test2(color) {
            this.style.background = color;
        }

        b2.onclick = function () {
            test2.call(b1,'green');     // привязали this к кнопке
        }
    </pre>

    <br>

    <p><code>Apply()</code> - тот же Call, только аргументы передаем в виде массива, это на случай если мы не знаем колличество нужных для передачи свойств</p>

    <pre class="brush: js;">
        const b3 = document.querySelector('.b_3');

        function test3(color, text) {
            this.style.background = color;
            this.innerHTML = text;
        }

        b3.onclick = function () {
            test3.apply(b3,['blue',555]);
        }
    </pre>

    <br>

    <p><code>Bind</code> - позволяет привязывать контекст функции и получать новый экземпляр функции</p>

    <pre class="brush: js;">
        const b4 = document.querySelector('.b_4');

        let a = test3.bind(b4, 'red', 777);

        b4.onclick = a;
    </pre>
</div>

<div class="linear" id="use_strict">

    <h2>Модули ES6</h2>

    <p>Если из модуля нужно экспортировать несколько объектов</p>

    <pre class="brush: js;">
        import { print, log } from './file.js';     // экспортируем две функции
    </pre>

    <p>Если из модуля нужно экспортировать только один объект, можно воспользоваться инструкцией <code>export default</code></p>

    <pre class="brush: js;">
        import funk from './file2.js';     // экспортируем один объект

        funk.print();
    </pre>

    <p>Для переменных модуля можно задать локальную область видимости под другими именами</p>

    <pre class="brush: js;">
        import { print as p, log as y } from './file.js';

        p('text');
        y('text2');
    </pre>

    <p>Можно всё импортировать всё в одну переменную с помощью знака <code>*</code></p>

    <pre class="brush: js;">
        import * as fns from './file.js';
    </pre>
</div>

<div class="linear" id="use_strict">

    <h2>CommonJS</h2>

    <p>благодаря CommonJS объекты экспортируются с применением <code>module.exports</code></p>

    <pre class="brush: js;">
        const print(message) => log( message, new Date() )

        const log(message, timestamp) =>
            console.log(`${message}: ${timestamp}`)

        module.exports = {print, log}
    </pre>

    <p>CommonJS не поддерживает инструкцию <code>import</code>. Вместо неё используется инструкция <code>require</code></p>

    <pre class="brush: js;">
        const {log, print} = require('./file.js')
    </pre>
</div>


<!--

<div class="linear" id="use_strict">

    <h2>2222222222222222</h2>


    <p>3333333333333333333</p>

    <pre class="brush: js;">

    </pre>

</div>




    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
