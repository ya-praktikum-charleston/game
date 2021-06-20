<?php include '../include/header.php'; ?>

    <div class="nav_bar">
        <br>
        <p><i>Содержание:</i></p>
        <ul>
            <li><a class="list-sub__link" href="#Part1">#1 Линейный поиск</a></li>
            <li><a class="list-sub__link" href="#Part1">#2 Бинарный поиск. Итеративный подход (цикл)</a></li>
            <li><a class="list-sub__link" href="#Part1">#3 Сортировка выбором. SelectionSort</a></li>
            <li><a class="list-sub__link" href="#Part1">#4 Сортировка пузырьком. BubbleSort</a></li>
            <li><a class="list-sub__link" href="#Part1">#5 Рекурсия. Рекурсивные функции. Факториал. Числа Фибоначчи</a></li>
            <li><a class="list-sub__link" href="#Part1">#6 Быстрая сортировка. Сортировка Хоара</a></li>
            <li><a class="list-sub__link" href="#Part1">#7 Графы. Поиск в ширину</a></li>
            <li><a class="list-sub__link" href="#Part1">#8 Структура данных Очередь</a></li>
            <li><a class="list-sub__link" href="#Part1">#9 Матрица смежности</a></li>
            <li><a class="list-sub__link" href="#Part1">#10 Алгоритм Дейкстры для поиска кратчайшего пути</a></li>
            <li><a class="list-sub__link" href="#Part1">#11 Рекурсивный обход дерева n-размерности</a></li>
            <li><a class="list-sub__link" href="#Part1">#12 Итеративный обход дерева n-размерности</a></li>
            <li><a class="list-sub__link" href="#Part1">#13 Структура данных Стек</a></li>
            <li><a class="list-sub__link" href="#Part1">#14 Кеширование вычислений</a></li>
            <li><a class="list-sub__link" href="#Part1">#15 Массивы. Сложность основных операций</a></li>
            <li><a class="list-sub__link" href="#Part1">#16 Связный список. Простая реализация и теория</a></li>
            <li><a class="list-sub__link" href="#Part1">#17 Бинарное дерево поиска. Простая реализация и теория</a></li>
            <li><a class="list-sub__link" href="#Part1">#18 Set и Map</a></li>
        </ul>
    </div>


    <div class="linear" id="Part1">
        <h1>#1 Линейный поиск</h1>

        <pre class="brush: js;">
            const array = [1,4,5,8,5,1,2,7,5,2,11]
            let count = 0
            function linearSearch(array, item) {
                for (let i = 0; i < array.length; i++) {
                    count += 1
                    if (array[i] === item) {
                        return i;
                    }
                }
                return null
            }

            console.log(linearSearch(array, 1))
            console.log('count = ', count)
        </pre>


    </div>


<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222/h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
