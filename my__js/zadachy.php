<?php include '../include/header.php'; ?>



<div class="linear" id="use_strict">

    <h2>Переведите массив вида ["background-color"] в ["backgroundColor"]</h2>

    <pre class="brush: js;">
        function camelize(str) {
            return str
                .split('-')         // разбивает 'my-long-word' на массив ['my', 'long', 'word']
                .map(
                                    // Переводит в верхний регистр первые буквы всех элементом массива за исключением первого
                                    // превращает ['my', 'long', 'word'] в ['my', 'Long', 'Word']
                    (word, index) => index == 0 ? word : word[0].toUpperCase() + word.slice(1)
                                    //если это первое слово, то возвращаем как есть иначе делаем первую букву большой и плюсуем с остальным текстом
                )
                .join('');          // соединяет ['my', 'Long', 'Word'] в 'myLongWord'
        }


        let fruits = ["background-color", "border-radius", "margin-bottom"];
        let str=[];

                                    // проходит по значениям, но не предоставляет доступа к номеру текущего элемента
        for (let fruit of fruits) {
            str.push(camelize( fruit ));
        }

        console.log(str)            //["backgroundColor", "borderRadius", "marginBottom"]
    </pre>

</div>


<div class="linear" id="use_strict">
    <h1>Скопировать массив</h1>

    <pre class="brush: js;">
            function copySorted(arr) {
                return arr.slice();
            }

            let arr = ["HTML", "JavaScript", "CSS"];

            let sorted = copySorted(arr);

            console.log( sorted );
        </pre>

</div>


<div class="linear" id="use_strict">
    <h1>Сумма свойств объекта</h1>

    <pre class="brush: js;">
        function sumSalaries(salaries) {
            let sum = 0;
            for (let salary of Object.values(salaries)) {           //Object.values(obj) – возвращает массив значений.
                sum += salary;
            }

            return sum; // 650
        }

        let salaries = {
            "John": 100,
            "Pete": 300,
            "Mary": 250
        };

        alert( sumSalaries(salaries) );         // 650
    </pre>

</div>


<div class="linear" id="use_strict">
    <h1>Покажите день недели</h1>

    <pre class="brush: js;">
        function getWeekDay(date) {
            let days = ['ВС', 'ПН', 'ВТ', 'СР', 'ЧТ', 'ПТ', 'СБ'];

            return days[date.getDay()];
        }

        let date = new Date(2014, 0, 3); // 3 января 2014 года
        alert( getWeekDay(date) ); // ПТ
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
