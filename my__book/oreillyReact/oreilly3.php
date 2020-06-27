<?php include '../../include/header.php'; ?>



<div class="linear" id="use_strict">

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

</div>

<div class="linear" id="use_strict">

    <h2>Функциональные концепции</h2>
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
</div>

<div class="linear" id="use_strict">

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



<?php include '../../include/footer.php'; ?>
