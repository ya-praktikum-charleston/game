<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Алгоритмы</h2>

    <h2>Пузырьковая сортировка</h2>

    <p>В пузырьковой сортировке (bubble sort) мы попарно сравниваем и переставляем в порядке возрастания или убывания все элементы массива. Повторяем до тех пор, пока требуются перестановки.</p>

    <p>За один проход по массиву поднимаем наверх самое большое число. Оно всплывает как пузырик. Отсюда и название — пузырьковая сортировка.</p>

    <p><b><i>Работа пузырьковой сортировки</i></b></p>

    <p>Запишем алгоритм пузырьковой сортировки, где <code>arr</code> — входной массив, <code>n</code> — его длина:</p>

    <ul class="marker">
        <li>1. Идём по массиву от <code>0</code> до <code>n - 1</code> . Текущий индекс будет <code>i</code>.</li>
        <li>2. Если <code>arr[i] > arr[i + 1]</code>:
            <ul class="marker">
                <li>2.1 Меняем местами эти элементы массива.</li>
                <li>2.2 Отмечаем флагом <code>swapped = true</code>, что была совершена перестановка.</li>
            </ul>
        </li>
        <li>3. После окончания цикла проверяем, были ли перестановки в этом проходе:
            <ul class="marker">
                <li>3.1 Если да — сбрасываем флаг <code>swapped = false</code> и начинаем заново с пункта 1.</li>
                <li>3.2 Если нет — массив отсортирован.</li>
            </ul>
        </li>
    </ul>

    <pre class="brush: js;">
        function bubbleSort(arr) {
            let swapped = true;
            while (swapped) {
                swapped = false;
                for (let i = 0; i < arr.length - 1; i++) {
                    if(arr[i] > arr[i + 1]){
                        swap(arr, i, i + 1 );
                        swapped = true;
                    }
                }
            }

            return arr;
        }

        function swap(arr, i, j) {
            const tmp = arr[i];

            arr[i] = arr[j];
            arr[j] = tmp;
        }
    </pre>

    <br>
    <h2>Анализ сложности алгоритма</h2>

    <p>Чтобы оценить сложность, найдём худший случай для алгоритма. Возьмём массив длиной <code>n</code>, отсортированный наоборот.
        За один проход сделаем <code>n – 1</code> сравнений элементов между собой и максимум <code>n - 1</code> перестановок.
        Сложность операции сравнения и операции перестановки — <code>О(1)</code>.
        Будем считать, что сравнение всегда включает и потенциальную перестановку элементов.
        На суммарную сложность это не будет влиять, ведь обе операции <code>О(1)</code>.
        Всего нужно сделать n проходов, пока перестановок больше не потребуется.
        Сложность алгоритма: <code>n * (n - 1) = O(n^2)</code>.</p>

    <img src="img/S1_03_02_slozniypuzirek_1598639763.png" alt="">

    <p>Можно оценить сложность алгоритма в лучшем и базовом случаях. В лучшем случае, если массив уже отсортирован, сделаем один проход и <code>(n-1)</code> сравнений. Сложность такого сценария будет <code>Ω(n)</code>.</p>

    <p>В базовом случае массив упорядочен случайным образом. Это может повлиять на фактическое количество необходимых перестановок, но не отразится на сложности алгоритма. Сложность алгоритма будет <code>Θ(n^2)</code>.</p>

    <p>Пространственная сложность алгоритма <code>О(1)</code>, ведь размер входных данных не влияет на объём потребляемой алгоритмом памяти.</p>

    <br>

    <h2>Сортировка вставками</h2>

    <p>В алгоритме сортировки вставками (insertion sort) мы разбиваем массив на две части –– отсортированную и неотсортированную. На каждом шаге берём из второй части элемент и вставляем его на своё место в отсортированную часть массива. Повторяем до тех пор, пока не отсортируем все элементы.</p>

    <p>Запишем алгоритм сортировки вставками, где <code>arr</code> — входной массив, <code>n</code> — его длина:</p>

    <ul class="marker">
        <li>1. Идём по массиву от <code>1</code> до <code>n</code>. Текущий индекс будет <code>i</code>.</li>
        <li>2. Ищем индекс вставки элемента <code>insertionIndex</code>:
            <ul class="marker">
                <li>2.1 Выставляем <code>insertionIndex = 0</code> по умолчанию.</li>
                <li>2.2 Идём по массиву от <code>i - 1</code> до <code>0</code>. Текущий индекс будет <code>j</code>.</li>
                <li>2.3 Если <code>arr[j] < arr[i]</code>, то <code>insertionIndex = j + 1</code>. Выходим из цикла.</li>
            </ul>
        </li>
        <li>3. Сдвигаем все элементы с <code>insertionIndex</code> до <code>i - 1</code> включительно на одну позицию вперёд, а элемент с индексом <code>i</code> помещаем в <code>insertionIndex</code>.</li>
    </ul>

    <p>Анализ сложности</p>

    <p>посчитаем суммарную сложность алгоритма в худшем случае.
        На первом шаге, при <code>i=1</code>, сложность вставки элемента на своё место в отсортированную часть массива <code>О(1)</code>.
        На втором — <code>О(2)</code>, а на n-ом шаге сложность равна <code>О(n)</code>. Общая сложность <code>О(1 + 2 + ... + n)</code>.
        Сумма от <code>1</code> до <code>n</code> равна <code>(n + 1) * n / 2</code>.
        Получается, что сложность этого алгоритма <code>О((n + 1) * n / 2) = О(n^2)</code>.</p>

    <p>В позитивном сценарии на вход подаётся отсортированный массив. На каждом шаге мы сравниваем всего раз — текущий элемент с предыдущим, чтобы убедиться, что они стоят на своём месте. Сложность такого сценария <code>Ω(n)</code>.</p>

    <p>В базовом случае, когда массив частично упорядочен, сделаем n-1 шагов. На каждом шаге совершим от <code>1</code> до <code>2i+1</code> операций. Это даст линейную зависимость от <code>i</code>. Сложность базового сценария <code>Θ(n^2)</code>.</p>

    <p>Пространственная сложность алгоритма <code>О(1)</code>, ведь размер входных данных не влияет на объём потребляемой алгоритмом памяти.</p>

    <br>
    <p><b>Задание 1 - Сортировка вставками</b></p>

    <pre class="brush: js;">
        function insertionSort(arr) {
            for (let i = 0; i < arr.length; i++){
                let value = arr[ i ];
                let insertionIndex = i - 1;

                for(insertionIndex; arr[insertionIndex] > value; insertionIndex--){
                    arr[insertionIndex+1] = arr[insertionIndex];
                }

                arr[insertionIndex+1] = value;
            }
            return arr;
        }
    </pre>

    <br>
    <h2>Связный список</h2>

    <p>Это структура данных с последовательным доступом к элементам, которая поддерживает операции добавления и удаления элементов.</p>

    <p>Каждый элемент связного списка состоит из значения и ссылки на следующий элемент в списке.</p>

    <img src="img/S1_04.2_01_massiv_1591461060.png" alt="">

    <br>
    <p><b>Типы списков</b></p>

    <img src="img/S1_04.2_02_massiv_1591461135.png" alt="">

    <p><b>Односвязный список</b> — тот, в котором каждый элемент ссылается только на следующий элемент.</p>

    <br>
    <p><b>Двусвязный список</b> — тот, в котором каждый элемент ссылается на предыдущий и следующий элемент.</p>

    <img src="img/S1_04.2_03_massiv_1593095651.png" alt="">

    <br>
    <p><b>Кольцевой список</b> — тот, в котором каждый элемент ссылается на следующий, а последний элемент ссылается на первый.</p>

    <img src="img/S1_04.2_04_massiv_1591461247.png" alt="">

    <br>
    <p><b>Кольцевой двусвязный список</b> — двусвязный список, в котором последний элемент ссылается на первый, а первый — на последний.</p>

    <img src="img/S1_04.2_05_massiv_1591461286.png" alt="">

    <br>
    <h2>Операции со связным списком</h2>

    <p>Мы храним ссылку на голову, поэтому доступ к ней всегда <code>О(1)</code>. Но, чтобы добраться до произвольного n-го элемента, придётся <code>n</code> раз перейти по ссылке на следующий элемент. Такая операция имеет линейную сложность — <code>О(n)</code>.</p>

    <p>Поиск элемента в списке также требует перебора элементов, поэтому его сложность <code>О(n)</code>.</p>

    <p>Добавить новый элемент в начало списка просто. Выставляем у нового элемента ссылку на текущий head, затем в head записываем ссылку на новый элемент:</p>

    <img src="img/S1_04.2_06_massiv_1591461324.png" alt="">
    
    <p>Многие реализации списка хранят ссылку на последний элемент. В этом случае можно добавлять элементы в конец списка. Сначала у текущего <code>tail</code> выставляем ссылку на новый элемент, затем в <code>tail</code> записываем ссылку на новый элемент:</p>

    <img src="img/S1_04.2_07_massiv_1591461374.png" alt="">

    <p>Чтобы удалить элемент из списка, нужно обновить связи, как при добавлении. Элемент перед удаляемым ссылаем на элемент после него, а удаляемому элементу ставим ссылку в <code>null</code>. Сложность такой операции <code>О(1)</code>.</p>

    <img src="img/S1_04.2_08_massiv_1591461408.png" alt="">

    <br>
    <h2>Задача 3 - Двусвязный список</h2>

    <pre class="brush: js;">
        class DoublyLinkedList {
            constructor() {
                this.size = 0;
                this.head = null;
                this.tail = null;
            }

            // Добавляет элемент в список.
            // Если указан индекс - добавляет по индексу,
            // в противном случае добавляет в конец.
            // Если индекс за пределами — кидает ошибку.
            add(value, index) {
                const node = createNode(value);
                if (index < 0 || index > this.size) {
                    throw new Error('Вне диапазона');
                }
                if (this.size) {
                    if(index >= 0){
                        let findElem = this.searchByIndex(index);
                        node.next = findElem;
                        node.prev = findElem.prev;
                        findElem.prev = node;
                        if(findElem === this.head){
                            this.head = node;
                        }
                    }else{
                        this.tail.next = node;
                        node.prev = this.tail;
                        this.tail = node;
                    }
                } else {
                    this.head = node;
                    this.tail = node;
                }

                this.size++;

                return node;

            }

            _removeNode(node){
                if(node){
                    if(!node.prev){
                        if(!node.next){
                            this.head = null;
                            this.tail = null;
                        }else{
                            node.next.prev = null;
                            this.head = node.next;
                        }
                    }else if(node === this.tail){
                        this.tail = node.prev;
                        node.prev.next = null;
                    }else{
                        node.next.prev = node.prev;
                        node.prev.next = node.next;
                    }
                    node.next = null;
                    node.prev = null;
                    this.size--;
                }
            }

            // Удаляет элемент из списка по значению.
            // Удаляет только первый найденный элемент.
            // Если элемент не найден, ничего делать не нужно.
            removeByValue(value) {
                let node = this.searchByValue(value);
                if(node){
                    this._removeNode(node)
                }

            }

            // Удаляет элемент из списка по индексу.
            // Если индекс за пределами — кидает ошибку.
            removeByIndex(index) {
                let node = this.searchByIndex(index);
                if(node){
                    this._removeNode(node)
                }

            }

            // Ищет элемент в списке по индексу.
            // Если индекс за пределами — кидает ошибку.
            searchByIndex(index) {
                if (index < 0 || index > this.size) {
                    throw new Error('Вне диапазона');
                }

                let searchNode = this.head;
                let count = 0;
                while (count < index) {
                    searchNode = searchNode.next;
                    count++;
                }
                return searchNode;
            }

            // Ищет элемент в списке по значению.
            // Возвращает первый найденный элемент.
            // Опционально можно указать индекс начала поиска.
            // Если индекс за пределами — кидает ошибку.
            // Если элемент не найден, нужно вернуть null.
            searchByValue(value, startIndex = 0) {
                if (startIndex < 0 || startIndex > this.size) {
                    throw new Error('Вне диапазона');
                }
                let searchNode = this.head;

                while (startIndex <= this.size) {
                    if(searchNode.value === value){
                        break;
                    }else{
                        searchNode = searchNode.next;
                    }
                    startIndex++;
                }
                return searchNode;
            }
        }

        // Создаёт новую ноду, где
        // value — её значение,
        // next — ссылка на следующую ноду,
        // prev — ссылка на предыдущую ноду
        function createNode(value) {
            return {
                value,
                next: null,
                prev: null,
            };
        }


        const list = new DoublyLinkedList();
        list.add(0);
        list.removeByValue(0)
        list.head;
    </pre>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Пересечение двух отсортированных массивов</b></p>

    <pre class="brush: js;">
        function findEqualElements(arr1, arr2) {
            let result = [];
            while( arr1.length > 0 && arr2.length > 0 ) {
                if(arr1[0] < arr2[0] ){
                    arr1.shift();
                }else if(arr1[0] > arr2[0]){
                    arr2.shift();
                }else{
                    result.push(arr1.shift());
                    arr2.shift();
                }
            }

            return result;
        }


        console.log(findEqualElements([2], [1, 2, 3]));


        // Примеры
        //findEqualElements([1, 2, 3], [2]) // => [2]
        //findEqualElements([2], [1, 2, 3]) // => [2]
        //findEqualElements([1, 2, 2, 3], [2, 2, 2, 2]) // => [2, 2]
        //findEqualElements([2, 2, 2, 2], [1, 2, 2, 3]) // => [2, 2]
        //findEqualElements([ 1, 2, 4, 7, 11, 19 ], [ 2, 7, 19, 28, 31 ]) // => [2, 7, 19]
    </pre>

    <br>
    <p><b>Задача 2 - Пересечение интервалов</b></p>

    <pre class="brush: js;">
        const a = [[8, 12], [17, 22]];
        const b = [[5, 11], [14, 18], [20, 23]];
        // [[8, 11], [17, 18], [20, 22]]

        function intersection(a , b){
            let result = [];
            let arrayMass = [];

            a.map(elemA => {
                let arr = [];
                for(let i = elemA[0]; i <= elemA[1]; i++){
                    b.map(elemB => {
                        for(let j = elemB[0]; j <= elemB[1]; j++){
                            if(i == j ){
                                arr.push(i);
                            }
                        }
                    })
                }
                let mass = [];
                arr && arr.map((elem,i) => {
                    if(arr[i+1] && i != arr.length-1){
                        if((arr[i+1]-elem)===1){
                            mass.push(elem);
                        }else{
                            mass.push(elem);
                            arrayMass.push(mass);
                            mass = [];
                        }
                    }else{
                        mass.push(elem);
                        arrayMass.push(mass);
                        mass = [];
                    }
                })

                arrayMass.map(elem => {
                    result.push([elem[0],elem[elem.length-1]])
                })
                arrayMass=[]

            })

            return result;
        }

        intersection(a,b);
    </pre>

    <br>
    <p><b>Развернуть односвязный список</b></p>

    <p>Дан односвязный список. Напишите функцию, которая его разворачивает. Должен получиться новый список, элементы которого расположены в обратном порядке.</p>

    <p>Важно: реализуйте алгоритм за константную память О(1) и за линейное время О(n).</p>

    <pre class="brush: js;">
        /*
        Input: 1->2->3->4->5->NULL
        Output: 5->4->3->2->1->NULL
        */

        /**
         * function ListNode(val, next) {
         *     this.value = (value===undefined ? 0 : value)
         *     this.next = (next===undefined ? null : next)
         * }
         */
        /**
         * @param {ListNode} head
         * @return {ListNode}
         */
        
        function reverse(head) {
            let node = head;
            let previous = null;

            while(node) {
                // save next or you lose it!!!
                let save = node.next;
                // reverse pointer
                node.next = previous;
                // increment previous to current node
                previous = node;
                // increment node to next node or null at end of list
                node = save;
            }
            return previous;
        }
    </pre>

</div>



<!--
<pre class="brush: js;">

</pre>

<ul class="marker">
    <li></li>
</ul>

v&ndash;                тире

&quot;                  двойная кавычка

-->


<!--

<div class="linear" id="use_strict">
    <h1>Строгий режим — "use strict"</h1>

    <h2>«use strict»</h2>


    <p>Например:</p>

    <pre class="brush: js;">
            "use strict";

            // этот код работает в современном режиме
            ...
        </pre>


    <p>На данный момент достаточно иметь общее понимание об этом режиме:</p>
    <ul class="ul_num">
        <li><code>111111</code> 2222222222222222</li>

    </ul>

</div>

-->



<?php include '../../include/footer.php'; ?>
