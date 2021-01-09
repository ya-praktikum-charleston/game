<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
    <h1>Вопросы:</h1>

    <pre class="brush: js;">
        // 1
        var foo = {n:1};
        var bar = foo;

        foo.x = foo = {n:2};    // присваивание идет слева направо ???

        console.log(foo);
        console.log(bar);
    </pre>

</div>


<div class="linear" id="use_strict">
    <h1>Копирование маcсивов и объектов</h1>

    <pre class="brush: js;">

        let data = new Date(3600 * 24 * 1000);
        let test = {
            x : data,
            y : 'ww',
            f : function () {
                console.log('Работает')
            },
            z : {
                c : 'tt',
                v : 'yy',
            }
        }

        // копируем массив 'а' в 'b'
        let a = [1,2,3,[4,5],test];
        let b = deepClone(a);
        let c = JSON.parse(JSON.stringify(a));


        function deepClone(obj) {
            const newArr = [];
            for(let i in obj) {
                if (obj[i] instanceof Object) {
                    newArr[i] = deepClone(obj[i]);
                    continue;
                }
                newArr[i] = obj[i];
            }
            return newArr;
        }

        // проверяем точность копии, путем добавления в массив 'a' новых элементов
        test.y = 'wow1';
        test.z.v = 'wow2';
        a[3].push(6);
        a.push(7);
        test.f();

        console.log(a);
        console.log(b);
        console.log(c);

        //b[4].f(); // один фиг не работает
        // new Date тоже не скопировался

    </pre>

</div>

<div class="linear" id="use_strict">
    <h1>Генерация массива c одной единицей, остальное нули. Для тестов</h1>

    <pre class="brush: js;">
        var arr2 = [0,0,0,0];

        let max = 3;
        let min = 0;

        let randNum = Math.floor(Math.random() * (max - min + 1)) + min;    //Случайное целое число в диапазоне, включая минимальное и максимальное.

        arr2[randNum] = 1;

        console.log( arr2 );        //[0, 0, 1, 0]
    </pre>

</div>


<div class="linear" id="use_strict">
    <h1>Перетасовка массива</h1>

    <pre class="brush: js;">
        function shuffle(array) {
            var currentIndex = array.length, temporaryValue, randomIndex;

            // Пока остаются элементы для перетасовки...
            while (0 !== currentIndex) {

                // Выбор остальных элементов...
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex -= 1;

                // И поменять его с текущим элементом.
                temporaryValue = array[currentIndex];
                array[currentIndex] = array[randomIndex];
                array[randomIndex] = temporaryValue;
            }

            return array;
        }

        // Используется вот так
        var arr = [2, 11, 37, 42];
        arr = shuffle(arr);
        console.log(arr);       //[2, 42, 37, 11]
    </pre>

</div>


<div class="linear" id="use_strict">
    <h1>ТЕСТ</h1>

    <pre class="brush: xml;">
        <div id="app_my__test">
            <div v-for="item, index in questionsList">
                {{ item.questionText }}
                <ul>
                    <li v-for="ans in item.answersList">
                        <span v-on:click="answerClick(index, ans)">
                            {{ ans }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </pre>

    <pre class="brush: js;">

        var app = new Vue({
            el     : '#app_my__test',
            data   : {
                questionsList: [
                    {
                        'questionText': 'question 1 text',
                        'answersList' : ['answer1', 'answer2', 'answer3', 'answer4'],
                        'rightAnswer' : 'answer1',
                    },
                    {
                        'questionText': 'question 2 text',
                        'answersList' : ['answer1', 'answer2', 'answer3', 'answer4'],
                        'rightAnswer' : 'answer2',
                    },
                    {
                        'questionText': 'question 3 text',
                        'answersList' : ['answer1', 'answer2', 'answer3', 'answer4'],
                        'rightAnswer' : 'answer3',
                    },
                ]
            },
            created: function () {
                var th = this;
                this.questionsList.map(function (value, key) {
                    value.answersList = th.shuffleArray(value.answersList);
                });
            },
            methods: {
                answerClick : function (index, answ) {
                    if (this.questionsList[index].rightAnswer === answ) {
                        console.log('right!!');
                        return true;
                    }
                },
                shuffleArray: function (a) {
                    var j, x, i;
                    for (i = a.length - 1; i > 0; i--) {
                        j    = Math.floor(Math.random() * (i + 1));
                        x    = a[i];
                        a[i] = a[j];
                        a[j] = x;
                    }
                    return a;
                }
            }
        });
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
