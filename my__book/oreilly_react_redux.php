<?php include $_SERVER['DOCUMENT_ROOT'].'/include/header.php'; ?>



<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#2_new_syntax_javaScript">2. Новый синтаксис JavaScript</a></li>
        <li><a class="list-sub__link" href="#3_funk_progr">3. Функциональное программирование с примеенением JavaScript</a></li>
        <li><a class="list-sub__link" href="#4_clean_react">4. Чистый React</a></li>
        <li><a class="list-sub__link" href="#5_react_JSX">5. React с JSX</a></li>
        <li><a class="list-sub__link" href="#7_properties">7. Усовершенствование компонентов</a></li>
        <li><a class="list-sub__link" href="#8_redux">8. Redux</a></li>
        <li><a class="list-sub__link" href="#9_react_redux">9. React Redux</a></li>
        <li><a class="list-sub__link" href="#10_test">10. Тестирование</a></li>
        <li><a class="list-sub__link" href="#11_router">11. Маршрутизатор React Router</a></li>
        <li><a class="list-sub__link" href="#12_server">12. React и сервер</a></li>
    </ul>
</div>


<div class="linear" id="2_new_syntax_javaScript">

	<h2>2. Новый синтаксис </h2>

	<p><b>Деструктивное присваивание</b></p>

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

    <br>

    <p><b>Оператор распространения <code>...</code></b></p>

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

    <br>

    <p><b>Промисы</b></p>

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

    <br>

    <p><b>This</b></p>

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

    <br>

    <p><b>Модули ES6</b></p>

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

    <br>

    <p><b>CommonJS</b></p>

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

<div class="linear" id="3_funk_progr">

    <h1>3. Функциональное программирование с примеенением JavaScript</h1>
    <p>Функция считается <b><i>элементом первого класса</i></b>, когда может быть объявлена в качестве переменной и отправлена другим функциям в качестве аргумента. Такие функции могут быть даже возвращены из других функций.</p>

    <h2>Значение понятия функциональности</h2>

    <p>Функции допустимо объявлять с использованием ключевого слова var</p>
    <pre class="brush: js;">
        var log = function(message) {
          console.log(message)
        }
        const log2 = message => console.log(message)

        log("11111")
        log2("22222")
    </pre>

    <h2>Декларативный и императивный подход</h2>
    <p>Императивные программы требуют большого объема комментариев.</p>
    <p>В декларативных программах то, что должно произойти, описывается самим синтаксисом, а подробности (как это должно произойти) абстрагируются.</p>
    <pre class="brush: js;">
        string.replace(/ /g, "-")   // Декларотивно заменим пробелы на тире, а каким образом они заменятся похуй.
                                    // А императивно придется писать цикл, делать условие на пробел т.д.
    </pre>

    <br>

    <p><b>Функциональные концепции</b></p>

    <p>Основные концепции функционального программирования: неизменяемость, чистота, преобразование данных, функции высшего порядка и рекурсия.</p>

    <p><b>-1. Неизменяемость</b></p>
    <p>В функциональной программе данные являются неизменяемыми. Они никогда не изменяются. Вместо изменения исходных структур данных создаются измененные копии этих структур, используемые взамен оригинала.</p>

    <p><b>-2. Чистые функции</b></p>
    <p>Чистая функция возвращает значение, вычисляемое на основе ее аргументов. Они рассматривают свои аргументы в качестве неизменяемых данных</p>
    <p>Чистые функции являются одной из ключевых концепций функционального программирования.</p>

    <p><b>-3. Преобразование данных</b></p>
    <p>Функциональное программирование построено на преобразовании данных из одной формы в другую. Преобразованные копии будут создаваться с помощью функций. Эти функции снизят степень императивности кода, сделав его более простым.</p>

    <p><code>reduce/reduceRight</code></p>

    <p><code>arr.reduce</code> работает слева направо.<code>arr.reduceRight</code> работает справа-налево.</p>
    <p>Он применяет функцию callback по очереди к каждому элементу массива слева направо, сохраняя при этом промежуточный результат.</p>
    <pre class="brush: js;">
        // хотим получить сумму всех элементов массива
        var arr = [1, 2, 3, 4, 5]

        // для каждого элемента массива запустить функцию,
        // промежуточный результат передавать первым аргументом далее
        var result = arr.reduce(function(sum, current) {
          return sum + current;
        }, 0);

        console.log( result ); // 15



        // Нужно найти самое большое число
        const ages = [21,18,42,40,64,63,34];

        const maxAge = ages.reduce((max, age) => {
            if (age > max) {
                return age
            } else {
                return max
            }
        }, 0)

        // короткая запись
        const maxAge = ages.reduce(
            (max, value) => (value > max) ? value : max,
            0
        )

        console.log('maxAge', maxAge);
    </pre>

    <p><b>-4. Функции высшего порядка</b></p>
    <p>Они способны манипулировать другими функциями и могут получать функции в качестве аргументов, или возвращать функции, или делать и то и другое.</p>
    <p>К первой категории функций высшего порядка относятся функции, которые ожидают в качестве аргументов другие функции. Все следующие функции: <code>Array.map</code>, <code>Array.filter</code> и <code>Array.reduce</code> — получают функции в качестве аргументов. Поэтому они считаются функциями высшего порядка.</p>

    <pre class="brush: js;">
        const invokeIf = (znachenie, funk1, funk2) =>
            (znachenie) ? funk1() : funk2()

        invokeIf(true,funk1,funk2)
    </pre>

    <p><i>Каррирование</i> — функциональная технология, для которой привлекается использование функций высшего порядка. </p>
    <p>Функция userLogs зависит от некой информации (от имени пользователя) и возвращает функцию, которая может использоваться однократно и повторно, при доступности всей остальной информации (сообщения). </p>

    <pre class="brush: js;">
        const userLogs = userName => message =>
            console.log(`${userName} -> ${message}`)

        const log = userLogs("Виталя")
        log("Радость")              // Виталя -> Радость


        console.log(userLogs)       // userName => message =>
                                    //      console.log(`${userName} -> ${message}`)
        console.log(log)            // message =>
                                    //      console.log(`${userName} -> ${message}`)
    </pre>

    <p><b>-5. Рекурсия</b></p>
    <p><i>Пример счётчика на рекурсии</i></p>
    <p>В качестве аргументов функция <i>count</i> ожидает получения числа и функции. В данном примере она вызывается со значением 5 и функцией обратного вызова. При вызове <i>count</i> вызывается функция обратного вызова, которая выводит в консоль текущее значение. Затем <i>count</i> проверяет значение, чтобы определить, не больше ли оно нуля. Если больше, то <i>count</i> вызывает саму себя со значением, уменьшенным на единицу.</p>

    <pre class="brush: js;">
        const count = (col, funk) => {
            funk(col)
            return (col > 0) ? count(col - 1, funk) : col
        }

        count(5, col => console.log(col))

        // 5
        // 4
        // 3
        // 2
        // 1
        // 0
    </pre>

    <p><b>-5. Композиция</b></p>
    <p>Функция-композиция относится к функциям высшего порядка. Она получает функции в качестве аргументов, а возвращает одно значение.</p>
    <pre class="brush: js;">
        const both = compose(
            civilianHours,
            appendAMPM
        )
        both(new Date())
    </pre>

    <br>

    <p><b>Тикающие часы</b>, пример кода функционального подхода</p>

    <pre class="brush: js;">
        const oneSecond = () => 1000
        const getCurrentTime = () => new Date()
        const clear = () => console.clear()
        const log = message => console.log(message)

        const abstractClockTime = date =>
            ({
                hours: date.getHours(),
                minutes: date.getMinutes(),
                seconds: date.getSeconds()
            })


        const display = target => time => target(time)

        const formatClock = format =>
            time =>
                format.replace("hh", time.hours)
                    .replace("mm", time.minutes)
                    .replace("ss", time.seconds)

        const prependZero = key => clockTime =>
            ({
                ...clockTime,
                [key]: (clockTime[key] < 10) ?
                    "0" + clockTime[key] :
                    clockTime[key]
            })

        const compose = (...fns) =>
            (arg) =>
                fns.reduce(
                    (composed, f) => f(composed),
                    arg
                )

        const doubleDigits = civilianTime =>
            compose(
                prependZero("hours"),
                prependZero("minutes"),
                prependZero("seconds")
            )(civilianTime)


        const startTicking = () =>
            setInterval(
                compose(
                    clear,                          // очищаем консоль
                    getCurrentTime,                 // получаем текущую дату и время
                    abstractClockTime,              // возвращает {hours: 22, minutes: 35, seconds: 44}
                    doubleDigits,                   // добавляет 0 если одна цифра
                    formatClock("hh:mm:ss"),        // прописываем время по шаблону
                    display(log)                    // олучает функцию цели target и возвращает функцию, которая будет
                                                    // отправлять время в адрес цели. В данном примере целью будет console.log
                ),
                oneSecond()
            )

        startTicking()

        // 23:14:47
    </pre>

</div>

<div class="linear" id="4_clean_react">

    <h2>4. Чистый React</h2>

    <p><b>Виртуальная DOM</b></p>

    <p>Чтобы работать с React в браузере, нужно включить две библиотеки: React и ReactDOM. Первая представляет собой библиотеку для создания представлений, а вторая — библиотеку для фактического отображения пользовательского интерфейса в браузере.</p>

    <p>API DOM представляет собой коллекцию объектов, которыми JavaScript может воспользоваться для взаимодействия в браузером с целью изменения DOM. (document.createElement или document.appendChild, значит, вы уже работали с API DOM)</p>

    <p>Виртуальной DOM или набор инструкций, применяемых React для построения пользовательского интерфейса и организации взаимодействия с браузером</p>

    <p><b>Элементы React</b></p>

    <p>Элементы React представляют собой инструкции того, как должна быть создана DOM браузера.</p>

    <p>Элемент <code>React</code> для представления <i>h1</i> можно создать, применив метод <code>React.createElement:</code></p>

    <pre class="brush: js;">
        React.createElement("h1",
            {id: "recipe-0", 'data-type': "title"},
            "Baked Salmon"
        )
    </pre>
    <pre class="brush: html;">
       <h1 data-reactroot id="recipe-0" data-type="title">Baked Salmon</h1>     <!-- data-reactroot показывает, что это корневой элемент React-компонента-->
    </pre>


    <p>Первый аргумент определяет тип элемента, который мы хотим создать. <br>
        Второй аргумент представляет свойства создаваемого элемента.<br>
        Третий аргумент представляет дочерние элементы создаваемого нами элемента, то есть любые узлы, вставляемые между открывающим и закрывающим тегами.
    </p>

    <p><b>ReactDOM</b></p>

    <p>Отобразить элемент <code>React</code>, включая его дочерние элементы, в <code>DOM</code> можно с помощью метода <code>ReactDOM.render</code>. Элемент, который нужно отобразить, передается как первый аргумент, а в качестве второго используется целевой узел. В нем должен отобразиться элемент: </p>

    <pre class="brush: js;">
        var dish = React.createElement("h1", null, "Baked Salmon")
        ReactDOM.render(dish, document.getElementById('react-container'))
    </pre>

    <p><b>Дочерние элементы</b></p>

    <p>React отображает дочерние элементы с помощью свойства <code>props.children</code>. </p>

    <p><b>Три различных способа создания компонентов:</b></p>

    <p><b><i>-1. React.createClass</i></b></p>
    <p><b><i>-2. React.Component</i></b></p>
    <p><b><i>-3. Функциональные компоненты, не имеющие состояния</i></b></p>
</div>

<div class="linear" id="5_react_JSX">

    <h2>5. React с JSX</h2>

    <p>В JSX тип элемента указывается с помощью тега. Его атрибуты представляют свойства. Дочерние элементы к создаваемому элементу могут добавляться между открывающим и закрывающим тегами.</p>

    <p>Метод <code>ReactDOM.render</code> вносит изменения, оставляя текущую <code>DOM</code> на месте и просто обновляя те элементы, которые в этом нуждаются</p>

    <p>Все импортируемые переменные носят локальный характер для кода файла <code>index.js</code>. Присваивание <code>window.React</code> значения React дает библиотеке <code>React</code> в браузере глобальную область видимости. Тем самым гарантируется работоспособность всех вызовов функции <code>React.createElement</code>.</p>

    <pre class="brush: js;">
        window.React = React
    </pre>

</div>

<div class="linear" id="7_properties">

    <h2>7. Усовершенствование компонентов</h2>

    <p>Жизненный цикл компонента состоит из методов, последовательно вызываемых при установке или обновлении компонента. Они вызываются либо перед тем, либо после того, как компонент отобразит пользовательский интерфейс. </p>

    <p><b>Жизненный цикл установки</b></p>

    <p><i>Жизненный цикл установки</i> состоит из методов, вызываемых при установке компонента или при его удалении с экрана.</p>

    <table cellspacing="0">
        <tr>
            <th>Класс ES6</th>
            <th>React.createClass()</th>
        </tr>
        <tr>
            <td></td>
            <td>getDefaultProps()</td>
        </tr>
        <tr>
            <td>constructor(props)</td>
            <td>getInitialState()</td>
        </tr>
        <tr>
            <td>componentWillMount()</td>
            <td>componentWillMount()</td>
        </tr>
        <tr>
            <td>render()</td>
            <td>render()</td>
        </tr>
        <tr>
            <td>componentDidMount()</td>
            <td>componentDidMount()</td>
        </tr>
        <tr>
            <td>componentWillUnmount()</td>
            <td>componentWillUnmount()</td>
        </tr>
    </table>
    <br>
    <p><b>Класс ES6</b></p>
    <p><b><i>constructor</i></b> используется для инициализации компонента (при которой инициализируется состояние c получением свойств )</p>
    <p><b><i>componentWillMount()</i></b> он вызывается до отображения DOM и может быть использован для инициализации библиотек, запуска анимаций, запроса данных или выполнения любых дополнительных настроек, например вызвать <code>setState</code>.</p>
    <p><b><i>componentDidMount()</i></b> вызывается сразу же после отображения компонента на экране</p>
    <p><b><i>componentWillUnmount()</i></b> вызывается непосредственно перед удалением компонента</p>

    <br>
    <p>Компоненты убираются с экрана, когда удаляются своими родительскими компонентами или с помощью метода <code>unmountComponentAtNode</code> из пакета <code>react-dom</code></p>

    <pre class="brush: js;">
        import { render, unmountComponentAtNode } from 'react-dom'
        const target = document.getElementById('react-container')

        componentDidMount() {
            console.log("Starting Clock")
            this.ticking = setInterval(() =>
                this.setState(getClockTime())
            , 1000)
        }

        componentWillUnmount() {
            clearInterval(this.ticking)
            console.log("Stopping Clock")
        }


        render(
            &lt;Clock onClose={() =&gt; unmountComponentAtNode(target) }/&gt;
        )

     </pre>

    <p><b>Жизненный цикл обновления</b></p>

    <p><i>Жизненный цикл обновления</i> представляет собой последовательность методов, вызываемых при изменении состояния компонента или при получении от родительского компонента новых свойств. </p>

    <p>Жизненный цикл обновления запускается при каждом вызове <code>setState</code>. Вызов <code>setState</code> внутри жизненного цикла обновления станет причиной бесконечного рекурсивного цикла, который приведет к ошибке переполнения стека. Поэтому метод <code>setState</code> может вызываться только в методе <code>componentWillReceiveProps</code>, позволяющем компоненту обновлять состояние при обновлении его свойств.</p>

    <p>В число методов жизненного цикла обновления входят:</p>

    <p><b><i>componentWillReceiveProps(nextProps)</i></b> — вызывается только в случае передачи компоненту новых свойств; единственный метод, в котором может быть вызван метод <code>setState</code>;</p>
    <p><b><i>shouldComponentUpdate(nextProps, nextState)</i></b>  — привратник жизненного цикла обновления: предикат, способный отменить обновление; может использоваться для повышения производительности, разрешая только необходимые обновления;</p>
    <p><b><i>componentWillUpdate(nextProps, nextState)</i></b> — вызывается непосредственно перед обновлением компонента; похож на метод <code>componentWillMount</code>, но вызывается только перед выполнением каждого обновления;</p>
    <p><b><i>componentDidUpdate(prevProps, prevState)</i></b> — вызывается сразу же после выполнения обновления, после вызова метода отображения <code>render</code>; похож на метод <code>componentDidMount</code>, но вызывается только после каждого обновления.</p>

    <p>Методы жизненного цикла компонента позволяют расширить контроль над тем, как компонент должен быть отображен на экране или обновлен.</p>

    <p><b>React.Children</b></p>

    <p><code>API React.Children</code> предоставляет способ работы с дочерними компонентами
        отдельно взятого компонента. Он позволяет вести их подсчет, выполнять их отображение, циклический обход или превращать <code>props.children</code> в массив. Он также
        позволяет с помощью <code>React.Children.only</code> убеждаться, что на экран выводится
        единственный дочерний компонент:</p>

    <p><b>Компоненты высшего порядка</b></p>

    <p>Компонент высшего порядка <code>(higher-order component, HOC)</code> представляет собой
        простую функцию, получающую в виде аргумента один компонент <code>React</code> и возвращающую другой. </p>

    <pre class="brush: js;">
        import { render } from 'react-dom'

        const PeopleList = ({data}) =>
            <ol className="people-list">
                {data.results.map((person, i) => {
                    const {first, last} = person.name
                    return <li key={i}>{first} {last}</li>
                })}
            </ol>

        const RandomMeUsers = DataComponent(
            PeopleList,
            "https://randomuser.me/api/"
        )

        render(
            &lt;RandomMeUsers /&gt;,
            document.getElementById('react-container')
        )
    </pre>

    <p><b>Flux</b></p>

    <p><code>Flux</code> — модель конструирования, разработанная в Facebook с целью организовать
        однонаправленный поток данных. <code>Flux</code> дает способ предоставления данных, которые <code>React</code>
        будет использовать для создания пользовательского интерфейса.</p>

    <table cellspacing="0">
        <tr>
            <td>Действие (Action)</td>
            <td>&rarr;</td>
            <td>Диспетчер (Dispatcher)</td>
            <td>&rarr;</td>
            <td>Хранилище (Store)</td>
            <td>&rarr;</td>
            <td>Представление (Viev)</td>
        </tr>
    </table>
    <br>

    <p><code>Flux</code>, имеет три основные части: <code>диспетчер (dispatcher)</code> , <code>хранилище данных (store)</code> и <code>представления (view)</code> - стандартные компоненты <code>React</code>.</p>

    <p><b><i>Действие</i></b> предоставляет инструкции и данные, которые хранилище будет использовать для изменения состояния. В самом действии вызывается метод <code>dispatch</code>. В качестве параметра этот метод принимает объект, в котором передаем тип действия и собственно данные.</p>
    <p><b><i>Диспетчер</i></b> представляет во всей этой схеме центральное звено, которое управляет потоком данных в приложении <code>Flux</code>. Диспетчер регистрирует хранилища и их коллбеки - обратные вызовы. Когда диспетчер получает извне некоторое действие, то через зарегистрированные обратные вызовы хранилищ диспетчер уведомляет эти хранилища о поступившем действии.</p>
    <p><b><i>Хранилища</i></b> содержат состояние приложения и его логику. По своему действию они могут напоминать модель из паттерна <code>MVC</code>, в то же время они не представляют один объект, а управляют группой объектов. Каждое отдельное хранилище управляет определенной областью или доменом приложения.
        <br>
        Как было описано выше, каждое хранилище регистрируется в диспетчере вместе со своими обратными вызовами. Когда диспетчер получает действие, то он выполняет обратный вызов, передавая ему поступившее действие в качестве параметра. В зависимости от типа действия вызывается тот или иной метод внутри хранилища, в котором происходит обновление состояния хранилища. После обновления хранилища генерируется событие, которое указывает, что хранилище было обновлено. И через это событие представления (то есть компоненты <code>React</code>) узнают, что хранилище было обновлено, и сами обновляют свое состояние.
    </p>
    <p><b><i>Представления</i></b> оформляют визуальную часть приложения. Особый вид представлений - <code>controller-view</code> представляет компонент самого верхнего уровня, который содержит все остальные компоненты. <code>Controller-view</code> прослушивает события, которые исходят от хранилища. Получив событие, <code>controller-view</code> передает данные, полученные от хранилища, другим компонентам.
        <br>
        Когда <code>controller-view</code> получает событие от хранилища, то вначале <code>controller-view</code> запрашивает у хранилища все необходимые данные. Затем он вызывает свой метод <code>setState()</code> или <code>forceUpdate()</code>, который приводит к выполнению у компонента метода <code>render()</code>. А это в свою очередь приводит к вызову метода <code>render()</code> и обновлению дочерних компонентов.</p>

    <br>

    <p><b>uuid</b></p>

    <p>Для создания абсолютно уникальных идентификаторов можно воспользоваться библиотекой <code>uuid</code></p>

    <pre class="brush: js;">
        npm install uuid --save

        import { v4 } from 'uuid'

        id: v4()        // вызов в коде
    </pre>

</div>

<div class="linear" id="8_redux">

    <h2>8. Redux</h2>

    <p><code>Redux</code> представляет собой контейнер для управления состоянием приложения и во многом напоминает <code>Flux</code>.</p>

    <table cellspacing="0">
        <tr>
            <td>Действие (Action)</td>
            <td>&rarr;</td>
            <td>Преобразователь (Reducer)</td>
            <td>&rarr;</td>
            <td>Хранилище (Store)</td>
            <td>&rarr;</td>
            <td>Компоненты React (Viev)</td>
        </tr>
    </table>
    <br>

    <p><b><i>Действия (actions)</i></b> некоторый набор информации, который исходит от приложения к хранилищу и который указывает, что именно нужно сделать. Для передачи этой информации у хранилища вызывается метод <code>dispatch()</code>.</p>
    <p><b><i>Reducer</i></b> функция (или несколько функций), которая получает действие и в соответствии с этим действием изменяет состояние хранилища</p>
    <p><b><i>Хранилище (store)</i></b> хранит состояние приложения</p>
    <p><b><i>Создатели действий (action creators)</i></b> функции, которые создают действия</p>

    <p>Из <code>View</code> (то есть из компонентов <code>React</code>) мы посылаем действие (<code>action</code>), это действие получает функция <code>reducer</code>, которая в соответствии с действием обновляет состояние хранилища. Затем компоненты <code>React</code> применяют обновленное состояние из хранилища.</p>

    <br>

    <p>При создании Redux-приложения надо сместить мышление в сторону концентрации на действиях. Действия — литералы JavaScript, предоставляющие
        инструкции, необходимые для внесения изменений в состояние. </p>

    <pre class="brush: js;">
        const constants = {
            SORT_COLORS: "SORT_COLORS",
            ADD_COLOR: "ADD_COLOR",
            RATE_COLOR: "RATE_COLOR",
            REMOVE_COLOR: "REMOVE_COLOR"
        }
        export default constants
    </pre>

    <p><b>Хранилище</b></p>

    <p>В Redux хранилищем считается то место, где хранятся данные состояния приложения и обрабатываются все обновления состояния.
        Хранилище занимается обновлениями состояния, пропуская текущее состояние и действие через единый преобразователь. Мы создадим его путем сочетания и составления в него всех наших преобразователей.</p>

    <p>Чтобы создать единое дерево преобразователей, нужно составить комбинацию из преобразователей цветов
        и сортировки. В <code>Redux</code> для этого имеется специально предназначенная функция
        <code>combineReducers</code>, которая сводит все преобразователи в единый. Эти преобразователи используются для создания вашего дерева состояния. Имена полей соответствуют именам переданных преобразователей.</p>

    <pre class="brush: js;">
        import { createStore, combineReducers } from 'redux'
        import { appReducer, colors, sort } from './reducers'

        let reducers = combineReducers({
            appReducer,
            colors,
            sort,
        });

        const store = createStore( reducers )

        console.log( store.getState() )

        // Вывод на консоль
        //{
        //   colors: [],
        //   sort: "SORTED_BY_DATE"
        //}
    </pre>

    <p>Единственным способом изменения состояния вашего приложения является диспетчеризация действий через хранилище. В нем имеется метод <code>dispatch</code>, готовый
        получить действия в виде аргумента. При диспетчеризации с помощью хранилища
        действие проводится через преобразователи и состояние обновляется.</p>

    <pre class="brush: js;">
        export const addCity = (addCity) => ({type: ADD_CITY, addCity })

        // или так
        store.dispatch({
            type: "RATE_COLOR",
            id: "2222e1p5-3abl-0p523-30e4-8001l8yf2222",
            rating: 5
        })
    </pre>

    <p><b>Подписка на хранилища</b></p>

    <p>Хранилища позволяют осуществлять подписку функций-обработчиков, вызываемых после каждого завершения хранилищем диспетчеризации действия. В следующем примере в консоль будет выводиться количество цветов:</p>

    <pre class="brush: js;">
        store.subscribe(() =>
            console.log('color count:', store.getState().colors.length)
        )
    </pre>

    <p>Принадлежащий хранилищу метод <code>subscribe</code> возвращает функцию, которую позже можно использовать для прекращения подписки слушателя:</p>

    <pre class="brush: js;">
        const logState = () => console.log('next state', store.getState())
        const unsubscribeLogger = store.subscribe(logState)

        // Вызвать по готовности к прекращению подписки слушателя
        unsubscribeLogger()
    </pre>

    <p><b>Сохранение в localStorage</b></p>

    <p>Используя принадлежащую хранилищу функцию подписки <code>subscribe</code>, мы будем
        отслеживать изменения состояния и сохранять эти изменения в локальном хранилище <code>localStorage</code> под ключом <code>'redux-store'</code>. При создании хранилища можно
        проверить, не сохранены ли какие-либо данные под этим ключом, и если да, то загрузить их в качестве исходного состояния. Применяя всего лишь несколько строк
        кода, мы можем иметь в браузере постоянные данные состояния:</p>

    <pre class="brush: js;">
        const store = createStore(
            combineReducers({ colors, sort }),
            (localStorage['redux-store']) ? JSON.parse(localStorage['redux-store']) : {}
        )

        store.subscribe(() => {
            localStorage['redux-store'] = JSON.stringify(store.getState())
        })

        console.log('current color count', store.getState().colors.length)
        console.log('current state', store.getState())

        store.dispatch({
            type: "ADD_COLOR",
            id: uuid.v4(),
            title: "Party Pink",
            color: "#F142FF",
            timestamp: new Date().toString()
        })
    </pre>

    <p>При каждом обновлении этого кода список цветов прибавляет один. Сначала, в вызове функции <code>createStore</code>, проверяется наличие ключа <code>redux-store</code>. Если он присутствует, то выполняется парсинг <code>JSON</code>. В противном случае возвращается пустой
        объект. Затем проводится подписка слушателя на хранилище, которая сохраняет
        состояние, имеющееся в хранилище при каждой диспетчеризации действия. Обновление страницы продолжит добавление того же цвета.</p>

    <p><b>compose</b></p>

    <p><code>Redux</code> также поставляется с функцией <code>compose</code>, которой можно воспользоваться для составления нескольких функций в одну. Функции составляются не слева направо, а наоборот.</p>

    <pre class="brush: js;">
        import { compose } from 'redux'

        const print = compose(
            list => console.log(list),
            titles => titles.join(", "),
            map => map(c=>c.title),
            colors => colors.map.bind(colors),
            state => state.colors
        )
    </pre>

</div>

<div class="linear" id="9_react_redux">

    <h2>9. React Redux</h2>

    <p><b>Провайдер React Redux</b></p>

    <p>Провайдер <code>provider</code> добавляет хранилище к контексту и обновляет компонент <code>App</code>
        после диспетчеризации действий. Провайдеру нужен один дочерний компонент:</p>

    <pre class="brush: js;">
        import { Provider } from 'react-redux'

        render(
            <Provider store={store}>
                <App />
            </Provider>,
            document.getElementById('react-container')
        )
    </pre>

    <p>Провайдер требует передачи хранилища в виде свойства. Он добавляет хранилище
        к контексту, чтобы оно могло извлекаться любым дочерним компонентом, принадлежащим компоненту <code>App</code>.</p>

    <p><b>Функция connect библиотеки React Redux</b></p>

    <p><code>connect</code> отобразит функции диспетчеризации хранилища на свойства функций обратного вызова.</p>

    <p>Функция <code>connect</code> является функцией высшего порядка, которая возвращает компонент</p>

    <pre class="brush: js;">
        import ColorList from './ColorList'

        const mapStateToProps = state =>
            ({
                colors: [...state.colors].sort(sortFunction(state.sort))
            })

        const mapDispatchToProps = dispatch =>
            ({
                onRemove(id) {
                dispatch(removeColor(id))
            },
                onRate(id, rating) {
                dispatch(rateColor(id, rating))
            }
        })

        export const Colors = connect(
            mapStateToProps,
            mapDispatchToProps
        )(ColorList)
    </pre>

</div>

<div class="linear" id="10_test">

    <h2>Тестирование</h2>

    <p><b>ESLint</b></p>

    <p><b><i>ESLint</i></b> (https://eslint.org/) — самый новый инструмент
        проверки кода, поддерживающий усовершенствованный синтаксис JavaScript.
        Кроме того, <code>ESLint</code> носит модульный характер. Это значит, что можно создавать
        и совместно использовать дополнительные модули, добавляемые к конфигурации
        <code>ESLint</code> для расширения его возможностей.</p>

    <pre class="brush: js;">
        npm install -g eslint
    </pre>

    <p><b>===================</b></p>
    <p><b>Владилен Минин</b></p>

    <pre class="brush: js;">
        // заходим в нашу папку
        npm init
        // устанавливаем jest, появляется папка node_modules
        npm install --save-dev jest
    </pre>

    <p>Тестируемы файл должен иметь text в названии. Например <code>name.test.js</code></p>

    <pre class="brush: js;">
        // запускаем тест
        npm test
    </pre>
</div>

<div class="linear" id="11_router">

    <h2>11. Маршрутизатор React Router</h2>

    <p><code>npm install react-router-dom --save</code></p>

    <p>Использование перенаправлений. Иногда возникает потребность перенаправить
        пользователей с одного маршрута на другой. Например, мы можем убедиться,
        что если посетители сайта пытаются получить доступ к содержимому на http://
        localhost:3000/services, то они перенаправляются по правильному маршруту: http://
        localhost:3000/about/services.
    </p>

    <pre class="brush: js;">
        import {
            Route,
            Redirect
        } from 'react-router-dom'

        render(
            &lt;HashRouter&gt;
                &lt;div className=&quot;main&quot;&gt;
                    &lt;Route exact path=&quot;/&quot; component={Home} /&gt;
                    &lt;Route path=&quot;/about&quot; component={About} /&gt;
                    &lt;Redirect from=&quot;/history&quot; to=&quot;/about/history&quot; /&gt;
                    &lt;Redirect from=&quot;/services&quot; to=&quot;/about/services&quot; /&gt;
                    &lt;Redirect from=&quot;/location&quot; to=&quot;/about/location&quot; /&gt;
                    &lt;Route path=&quot;/events&quot; component={Events} /&gt;
                    &lt;Route path=&quot;/products&quot; component={Products} /&gt;
                    &lt;Route path=&quot;/contact&quot; component={Contact} /&gt;
                    &lt;Route component={Whoops404} /&gt;
                &lt;/div&gt;
            &lt;/HashRouter&gt;,
        document.getElementById('react-container')
        )
    </pre>

    <p><b>Параметры маршрутизатора</b></p>

    <pre class="brush: js;">
        &lt;Route path=&quot;/members/:gender/:state/:city&quot; component=&quot;Member&quot; /&gt;


        // полуить значения в компоненте
        let params = this.props.match.params;
    </pre>

    <p>Переход на предыдущую страницу</p>

    <pre class="brush: js;">
        &lt;div className=&quot;color-details&quot; onClick={() =&gt; history.goBack()}&gt;&lt;/div&gt;
    </pre>

    <p><b>Switch</b></p>

    <p>Компонент <code>Switch</code> используется для отображения данных по одному из двух маршрутов: компонентов отдельного цвета или главного приложения. Первый компонент <code>Route</code> отображает компонент <code>Color</code>, когда в <code>URL</code> передается идентификатор.</p>

    <p>Любые другие указания местоположения будут соответствовать каталогу <code>/</code> и приведут к отображению главных компонентов приложения.</p>

    <pre class="brush: js;">
        import { Route, Switch } from 'react-router-dom'

        const App = () =>
            &lt;Switch&gt;
                &lt;Route exact path=&quot;/:id&quot; component={Color} /&gt;
                &lt;Route path=&quot;/&quot;
                       component={() =&gt; (
                            &lt;div className=&quot;app&quot;&gt;
                                &lt;Menu /&gt;
                                &lt;NewColor /&gt;
                                &lt;Colors /&gt;
                            &lt;/div&gt;
                        )} /&gt;
            &lt;/Switch&gt;
        export default App
    </pre>

    <p><b>withRouter</b></p>

    <p>С помощью функции <code>withRouter</code> можно получить принадлежащий маршрутизатору объект <code>history</code> в виде свойства. </p>

    <p>Функция <code>withRouter</code> является <code>HOC</code>, передающий свойства маршрутизатора: <code>match</code>, <code>history</code> и <code>location</code>.</p>

</div>

<div class="linear" id="12_server">

    <h2>12. React и сервер</h2>

    <p><b>Сравнение изоморфизма с универсализмом</b></p>

    <p><b><i>Универсальный код</i></b> означает, что абсолютно одинаковый код может запускаться в нескольких средах. Универсальный код JavaScript относится к такому
        коду JavaScript, который может запускаться на сервере или в браузере, не выдавая
        ошибок</p>

    <p><b><i>Изоморфными</i></b> считаются те приложения, которые могут отображаться на нескольких платформах.</p>

    <pre class="brush: js;">
        // пример Изоморфного кода
        if (typeof window !== 'undefined') {
            const request = new XMLHttpRequest()
            request.open('GET', 'http://api.randomuser.me/?nat=US&results=10')
            request.onload = () => printNames(request.response)
            request.send()
        } else {
            const https = require('https')
            https.get(
                'http://api.randomuser.me/?nat=US&results=10',
                res => {
                    let results = ''
                    res.setEncoding('utf8')
                    res.on('data', chunk => results += chunk)
                    res.on('end', () => printNames(results))
                }
            )
        }
    </pre>

</div>



<?php include $_SERVER['DOCUMENT_ROOT'].'/include/footer.php'; ?>
