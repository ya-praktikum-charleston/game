<?php include '../include/header.php'; ?>

<div class="linear" id="rest-parameters-spread-operator">
    <h1>Остаточные параметры и оператор расширения</h1>

    <h2>Остаточные параметры (<code>...</code>)</h2>


    <p>Остаточные параметры могут быть обозначены через три точки <code>...</code>. Буквально это значит: «собери оставшиеся параметры и положи их в массив».</p>

    <p>Например, соберём все аргументы в массив <code>args</code>:</p>


    <pre class="brush: js;">
        function sumAll(...args) { // args — имя массива
            let sum = 0;

            for (let arg of args) sum += arg;

            return sum;
        }

        alert( sumAll(1) ); // 1
        alert( sumAll(1, 2) ); // 3
        alert( sumAll(1, 2, 3) ); // 6
    </pre>
    <br>
    <pre class="brush: js;">
        function showName(firstName, lastName, ...titles) {
            alert( firstName + ' ' + lastName ); // Юлий Цезарь

                // Оставшиеся параметры пойдут в массив titles = ["Консул", "Император"]
            alert( titles[0] );         // Консул
            alert( titles[1] );         // Император
            alert( titles.length );     // 2
        }

        showName("Юлий", "Цезарь", "Консул", "Император");
    </pre>

    <h2>Оператор расширения</h2>

    <p>Когда <code>...arr</code> используется при вызове функции, он «расширяет» перебираемый объект <code>arr</code> в список аргументов.</p>

    <pre class="brush: js;">
        let arr = [3, 5, 1];

        alert( Math.max(...arr) ); // 5 (оператор "раскрывает" массив в список аргументов)


        let arr1 = [1, -2, 3, 4];
        let arr2 = [8, 3, -8, 1];

        alert( Math.max(...arr1, ...arr2) ); // 8


                //Мы даже можем комбинировать оператор расширения с обычными значениями:
        alert( Math.max(1, ...arr1, 2, ...arr2, 25) ); // 25
    </pre>

    <p>Оператор расширения можно использовать и для слияния массивов:</p>

    <pre class="brush: js;">
        let arr = [3, 5, 1];
        let arr2 = [8, 9, 15];

        let merged = [0, ...arr, 2, ...arr2];

        alert(merged); // 0,3,5,1,2,8,9,15 (0, затем arr, затем 2, в конце arr2)
    </pre>

    <p>Например, оператор расширения подойдёт для того, чтобы превратить строку в массив символов:</p>

    <pre class="brush: js;">
        let str = "Привет";

        alert( [...str] ); // П,р,и,в,е,т
    </pre>

</div>


<div class="linear" id="global-object">
    <h1>Глобальный объект</h1>

    <p>Если свойство настолько важное, что вы хотите сделать его доступным для всей программы, запишите его в глобальный объект напрямую:</p>

    <pre class="brush: js;">
            // сделать информацию о текущем пользователе глобальной, для предоставления доступа всем скриптам
        window.currentUser = {
            name: "John"
        };

            // где угодно в коде
        alert(currentUser.name); // John

            // или, если у нас есть локальная переменная с именем "currentUser",
            // получим её из window явно (безопасно!)
        alert(window.currentUser.name); // John
    </pre>

    <p><b>Глобальный объект можно использовать, чтобы проверить на старый браузер. Например, проверить на наличие встроенного объекта Promise (такая поддержка отсутствует в очень старых браузерах):</b></p>

    <pre class="brush: js;">
        if (!window.Promise) {
            alert("Ваш браузер очень старый!");
        }
    </pre>

</div>

<div class="linear" id="settimeout-setinterval">
    <h1>Планирование: setTimeout and setInterval</h1>

    <h2>setTimeout</h2>

    <pre class="brush: js;">
        function sayHi(phrase, who) {
            alert( phrase + ', ' + who );
        }

        setTimeout(sayHi, 1000, "Привет", "Джон"); // Привет, Джон
    </pre>
    <br>
    <pre class="brush: js;">
        setTimeout("alert('Привет')", 1000);
            //а лучше так
        setTimeout(() => alert('Привет'), 1000);
    </pre>

    <h2>setInterval</h2>

    <p><b>Отмена через clearTimeout</b></p>

    <pre class="brush: js;">
        // повторить с интервалом 2 секунды
        let timerId = setInterval(() => alert('tick'), 2000);

        // остановить вывод через 5 секунд
        setTimeout(() => { clearInterval(timerId); alert('stop'); }, 5000);
    </pre>


</div>


<div class="linear" id="bind">
    <h1>Привязка контекста к функции</h1>

    <h2>Привязать контекст с помощью bind</h2>

    <p>Здесь <code>func.bind(user)</code> – это «связанный вариант» <code>func</code>, с фиксированным <code>this=user</code>.</p>
    <pre class="brush: js;">
        let user = {
            firstName: "Вася"
        };

        function func(txt) {
            alert(txt + ' ' + this.firstName);
        }

        let funcUser = func.bind(user);
        funcUser('Привет');         // Привет Вася
    </pre>

    <p>Еще пример:</p>

    <pre class="brush: js;">
        let user = {
            firstName: "Вася",
            sayHi() {
                alert(`Привет, ${this.firstName}!`);
            }
        };

        let sayHi = user.sayHi.bind(user); // (*)

        sayHi(); // Привет, Вася!

        setTimeout(sayHi, 1000); // Привет, Вася!
    </pre>

    <p>В строке (*) мы берём метод <code>user.sayHi</code> и привязываем его к <code>user</code>. Теперь <code>sayHi</code> – это «связанная» функция, которая может быть вызвана отдельно или передана в <code>setTimeout</code> (контекст всегда будет правильным).</p>

</div>


<div class="linear" id="property-accessors">
    <h1>Свойства - геттеры и сеттеры</h1>

    <pre class="brush: js;">
        let obj = {
            get propName() {
            // геттер, срабатывает при чтении obj.propName
        },

        set propName(value) {
            // сеттер, срабатывает при записи obj.propName = value
            }
        };
    </pre>

    <br>

    <p>Пример: Мы не вызываем <code>user.fullName</code> как функцию, а читаем как обычное свойство: геттер выполнит всю работу за кулисами.</p>

    <pre class="brush: js;">
        let user = {
            name: "John",
            surname: "Smith",

            get fullName() {
                return `${this.name} ${this.surname}`;
            },

            set fullName(value) {
                [this.name, this.surname] = value.split(" ");
            }
        };

        // set fullName запустится с данным значением
        user.fullName = "Alice Cooper";

        alert(user.name);       // Alice
        alert(user.surname);    // Cooper
    </pre>

    <p>Сначала отрабатывает <code>set</code>, полученное значение подхватывает <code>get</code> и возвращает результат.</p>

    <p>В итоге мы получили «виртуальное» свойство <code>fullName</code>. Его можно прочитать и изменить, но по факту его не существует.</p>

    <h2>Умные геттеры/сеттеры</h2>

    <p>Например, если мы хотим запретить устанавливать короткое имя для <code>user</code>, мы можем использовать сеттер <code>name</code> для проверки, а само значение хранить в отдельном свойстве <code>_name</code>:</p>

    <pre class="brush: js;">
        let user = {
            get name() {
                return this._name;
            },

            set name(value) {
                if (value.length < 4) {
                    alert("Имя слишком короткое, должно быть более 4 символов");
                    return;
                }
                this._name = value;
            }
        };

        user.name = "Pete";
        alert(user.name);       // Pete

        user.name = "";         // Имя слишком короткое...
    </pre>

</div>


<!--

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
