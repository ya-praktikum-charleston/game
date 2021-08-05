<?php include '../../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#a__1">#1 Реализация массива</a></li>
        <li><a class="list-sub__link" href="#a__2">#2 Бинарный поиск</a></li>
        <li><a class="list-sub__link" href="#a__3">#3 Палиндром</a></li>
        <li><a class="list-sub__link" href="#a__4">#4 FizzBuzz</a></li>
        <li><a class="list-sub__link" href="#a__5">#5 Пузырьковая сортировка</a></li>
        <li><a class="list-sub__link" href="#a__6">#6 Сортировка вставками</a></li>
        <li><a class="list-sub__link" href="#a__7">#7 Двусвязный список</a></li>
        <li><a class="list-sub__link" href="#a__8">#8 Пересечение двух отсортированных массивов</a></li>
        <li><a class="list-sub__link" href="#a__9">#9 Пересечение интервалов</a></li>
        <li><a class="list-sub__link" href="#a__10">#10 Развернуть односвязный список</a></li>
        <li><a class="list-sub__link" href="#a__11">#11 Реализация стека</a></li>
        <li><a class="list-sub__link" href="#a__12">#12 Реализация очереди</a></li>
        <li><a class="list-sub__link" href="#a__13">#13 Разбиение массива</a></li>
        <li><a class="list-sub__link" href="#a__14">#14 Алгоритм быстрой сортировки</a></li>
        <li><a class="list-sub__link" href="#a__15">#15 Слияние частей массива</a></li>
        <li><a class="list-sub__link" href="#a__16">#16 Алгоритм сортировки слиянием</a></li>
    </ul>
</div>

<div class="linear" id="a__1">

    <h2>#1 Реализация массива</h2>

    <p>Реализуйте массив с методами доступа, изменения, добавления и удаления элементов.</p>
    <p>При попытке доступа за пределы текущей длины массива <code>this.length</code> методы должны кидать любую ошибку.</p>
    <p>Когда длина массива приближается к его максимальному размеру — выделите памяти в два раза больше, применяя функцию <code>allocate</code>.</p>

    <pre class="brush: js;">
        class MyArray {
            constructor(initialSize = 1) {
                if (Number(initialSize) !== initialSize || Math.round(initialSize) !== initialSize) {
                    throw new Error('Длина массива должна быть целым числом');
                }

                if (!(initialSize > 0)) {
                    throw new Error('Размер массива должен быть больше нуля');
                }

                this.size = initialSize;
                this.memory = allocate(initialSize);
                this.length = 0;

            }

            ifError(index) {
                if(index === undefined || index < 0 || index >= this.length){
                    throw new Error('Размер массива меньше индекса');
                }
            }

            // Возвращает значение по индексу.
            // Если индекс за пределами — кидает ошибку.
            get(index){
                this.ifError(index);
                return this.memory[index];
            }

            // Устанавливает значение по индексу.
            // Если индекс за пределами — кидает ошибку.
            set(index, value) {
                this.ifError(index);
                this.memory[index] = value;
            }

            // Добавляет новый элемент в массив.
            // Если index не определён — добавляет в конец массива.
            // В противном случае — добавляет по индексу со сдвигом
            // всех последующих элементов.
            // Если индекс за пределами - кидает ошибку.
            // Увеличивает выделенную память вдвое, если необходимо.
            // Возвращает новую длину массива.
            add(value, index) {

                index && this.ifError(index);

                if(index || index === 0){
                    for(let i = this.length; i > index; i--){
                        this.memory[i] = this.memory[i-1];
                    }
                    this.memory[index] = value;
                    this.length++;
                }else{
                    this.memory[this.length] = value;
                    this.length++;
                }

                let leng = this.length;

                if(this.size === this.length){
                    for(let i = leng; i < leng * 2; i++){
                        this.memory[i] = undefined;
                        this.size++;
                    }
                }
                console.log(this.length);
                console.log(this.size);
                console.log("memory",this.memory)
                return this.length;
            }

            // Удаляет элемент по индексу со сдвигом всех последующих элементов.
            // Если индекс за пределами - кидает ошибку.
            // Возвращает новую длину массива.
            delete(index) {
                this.ifError(index);

                for(let i = index; i <= this.length-1; i++){
                    if(i === this.length-1){
                        delete this.memory[i];
                        delete this.memory[i+1];
                    }else{
                        this.memory[i] = this.memory[i+1];
                    }
                }

                --this.length;
                console.log(this.length);
                console.log(this.size);
                console.log("memory",this.memory)
                return this.length;
            }


        }


        function allocate(size) {
            const memory = {};

            for (let i = 0; i < size; i++) {
                memory[i] = undefined;
            }

            return memory;
        }

        let arr = new MyArray;
        arr.add('a');
        arr.add('b');
        arr.add('c');
        arr.add('d');

        //arr.set(1,'oop');
        arr.delete(2);

    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        class MyArray {
            constructor(initialSize = 1) {
                if (Number(initialSize) !== initialSize || Math.round(initialSize) !== initialSize) {
                    throw new Error('Длина массива должна быть целым числом');
                }
                if (!(initialSize > 0)) {
                throw new Error('Размер массива должен быть больше нуля');
            }

                this.size = initialSize;
                this.memory = allocate(initialSize);
                this.length = 0;
            }

            get(index){
                this._checkIndex(index);
                return this.memory[index];
            }

            set(index, value) {
                this._checkIndex(index);
                this.memory[index] = value;
            }

            add(value, index) {
                if (index === undefined) {
                    this.memory[this.length] = value;
                } else {
                    this._checkIndex(index);

                    for (let i = this.length; i > index; i--) {
                        this.memory[i] = this.memory[i - 1];
                    }

                    this.memory[index] = value;
                }

                this.length++;

                if (this.length === this.size) {
                this._resize();
            }

                return this.length;
            }

            delete(index) {
                this._checkIndex(index);

                for (let i = index + 1; i < this.length; i++) {
                    this.memory[i - 1] = this.memory[i];
                }

                this.length--;
                this.memory[this.length] = undefined;

                return this.length;
            }

            _resize() {
            const newSize = this.size * 2;
                const newMemory = allocate(newSize);

                for (let i = 0; i < this.size; i++) {
                    newMemory[i] = this.memory[i];
                }

            this.size = newSize;
                this.memory = newMemory;
            }

            _checkIndex(index) {
                if (index < 0 || index >= this.length) {
                    throw new Error('Индекс за пределами массива');
                }
            }
        }

        function allocate(size) {
            const memory = {};

            for (let i = 0; i < size; i++) {
                memory[i] = undefined;
            }

            return memory;
        }
    </pre>

</div>

<div class="linear" id="a__2">

    <h2>#2 Бинарный поиск</h2>

    <p>Напишите функцию, которая найдёт заданный элемент в отсортированном массиве и вернёт позицию его первого вхождения. Если элемент не найден — верните -1.</p>

    <p>Функция получает в качестве аргументов отсортированный по возрастанию массив и заданный элемент. В решении используйте бинарный поиск.</p>

    <pre class="brush: js;">
        const list = [1, 3, 4, 5, 7, 10];

        function binarySearch(list, n) {
            // Определяем точки начала и конца поиска
            let start = 0;
            let end = list.length;

            while (start < end) {
                // Находим элемент в середине массива
                const middle = Math.floor((start + end) / 2);
                const value = list[middle];

                // Сравниваем аргумент со значением в середине массива
                if (n == value) {
                    console.log(middle)
                    return middle;
                }

                // Если аргумент меньше, чем серединное значение, разделяем массив пополам
                // Теперь конец массива — это его бывшая середина
                if (n < value) {
                    end = middle;
                    // Иначе началом массива становится элемент, идущий сразу за «серединой»
                } else {
                    start = middle + 1;
                }
            }

            // если искомое число не найдено, возвращаем -1
            console.log('-1')
            return -1;
        }

        binarySearch(list ,2);
        binarySearch(list, 3);
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        // const list = [1, 3, 4, 5, 7, 10];

        function binarySearch(list, element) {
          let first = 0;
          let last = list.length;
          let position = -1;
          while (first < last) {
            const mid = Math.floor((first + last) / 2);
            if (list[mid] === element) {
              position = mid;
            }
            if (list[mid] < element)
              first = mid + 1;
            else {
              last = mid;
            }
          }
          return position;
        }
    </pre>

</div>

<div class="linear" id="a__3">

    <h2>#3 Палиндром</h2>

    <p>Палиндром — последовательность символов, которая одинаково пишется в обоих направлениях. К примеру, “Anna” — палиндром, а “table” — нет.</p>

    <p>Создайте функцию <code>palindrome</code>, которая принимает строку и возвращает <code>true</code>, если строка — палиндром. В противном случае функция должна вернуть <code>false</code>.</p>

    <pre class="brush: js;">
        // palindrome('racecar') === true;
        // palindrome('table') === false;

        const palindrome = (str) => {
            str = str.toLowerCase();
            if(str === str.split('').reverse().join('')) {
                return true;
            }else {
                return false;
            }
        };

        palindrome('Anna');
        palindrome('racecar');
        palindrome('table');
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        const palindrome = (str) => {
            str = str.toLowerCase();
            return str === str.split('').reverse().join('');
        }
    </pre>

</div>

<div class="linear" id="a__4">

    <h2>#4 FizzBuzz</h2>

    <p>Напишите функцию, которая принимает целое число N в качестве аргумента и возвращает числа от 0 до N. При этом функция заменяет некоторые числа:</p>

    <ul class="marker">
        <li>вместо чисел, кратных 3, вернёт 'fizz',</li>
        <li>кратных 5 — вернёт 'buzz',</li>
        <li>кратных и 3, и 5 — вернёт 'fizzbuzz'.</li>
    </ul>

    <pre class="brush: js;">
        // fizzBuzz(6) => [0, 1, 2, fizz, 4, buzz, fizz]

        const fizzBuzz = num => {
            const arr = [];
            for (let i = 0; i <= num; i++) {
                if(i === 0){
                    arr.push(0);
                }else if (i % 3 === 0 && i % 5 === 0) {
                    arr.push('fizzbuzz');
                } else if (i % 5 === 0) {
                    arr.push('buzz');
                } else if (i % 3 === 0) {
                    arr.push('fizz');
                } else {
                    arr.push(i);
                }
            }

            return arr;
        }

        fizzBuzz(6);
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        // fizzBuzz(15) => [0, 1, 2, fizz, 4, buzz, fizz, …, 14, fizzbuzz]

        const fizzBuzz = num =>
          [...Array(num + 1).keys()]
            .reduce((result, _, i) => {
              if (i === 0) return result.concat(0);
              if (i % 3 === 0 && i % 5 === 0) return result.concat('fizzbuzz');
              if (i % 3 === 0) return result.concat('fizz');
              if (i % 5 === 0) return result.concat('buzz');
              return result.concat(i);
            }, []);
    </pre>

</div>

<div class="linear" id="a__5">

    <h2>#5 Пузырьковая сортировка</h2>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function bubbleSort(arr) {
            let swapped = true;

            while (swapped) {
                swapped = false;

                for (let i = 0; i < arr.length - 1; i++) {
                    if(arr[i] > arr[i + 1]) {
                        swap(arr, i, i + 1);
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

</div>

<div class="linear" id="a__6">

    <h2>#6 Сортировка вставками</h2>

    <p>Реализуйте алгоритм сортировки вставками. Для этого прочитайте ещё раз текстовое описание алгоритма и реализуйте его в коде.</p>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function insertionSort(arr) {
            for (let i = 1; i < arr.length; i++) {
            const insertionIndex = findInsertionIndex(arr, i);
                shiftElements(arr, insertionIndex, i);
            }

            return arr;
        }

        function findInsertionIndex(arr, i) {
            for (let j = i - 1; j >= 0; j--) {
                if (arr[j] < arr[i]) {
                    return j + 1;
                }
            }

            return 0;
        }

        function shiftElements(arr, insertionIndex, i) {
            const value = arr[i];

            for (let j = i; j > insertionIndex; j--) {
                arr[j] = arr[j - 1];
            }

            arr[insertionIndex] = value;
        }
    </pre>

</div>

<div class="linear" id="a__7">

    <h2>#7 Двусвязный список</h2>

    <p>Реализуйте двусвязный список, который может:</p>

    <ul class="marker">
        <li>добавлять элементы в конец списка по индексу и значению,</li>
        <li>удалять элементы по индексу и значению,</li>
        <li>искать элемент по индексу и значению.</li>
    </ul>

    <p>Обратите внимание, что поиск по индексу и поиск по значению должны возвращать именно ноду.</p>

    <p>Пример двусвязного списка:</p>

    <pre>
        const list = new DoublyLinkedList();
        list.add(5);
        list.add(3);
        list.add(-13);
        console.log(list.head);

        {
            value: 5,
            prev: null,
            next: {
                value: 3,
                prev: {Ссылка на элемент со значением 5},
                next: {
                    value: -13,
                    prev: {Ссылка на элемент со значением 3},
                    next: null
                }
            }
        }
    </pre>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        class DoublyLinkedList {
            constructor() {
                        this.size = 0;
                this.head = null;
                this.tail = null;
            }

            add(value, index) {
                const node = createNode(value);

                if (index === undefined) {
                    if (this.tail) {
                        node.prev = this.tail;
                        this.tail.next = node;
                        this.tail = node;
                    } else {
                        this.head = node;
                        this.tail = node;
                    }
                } else {
                    const nodeAtIndex = this.searchByIndex(index);

                    node.next = nodeAtIndex;
                    node.prev = nodeAtIndex.prev;

                    if (nodeAtIndex.prev) {
                        nodeAtIndex.prev.next = node;
                    }

                    nodeAtIndex.prev = node;

                    if (nodeAtIndex === this.head) {
                        this.head = node;
                    }
                }

                this.size++;
            }

            removeByValue(value) {
                const node = this.searchByValue(value);

                if (!node) {
                    return;
                }

                this._removeNode(node);
            }

            removeByIndex(index) {
                this._removeNode(this.searchByIndex(index));
            }

            searchByIndex(index) {
                this._checkIndex(index);

                let node = this.head;

                for (let i = 0; i < index; i++) {
                    node = node.next;
                }

                return node;
            }

            searchByValue(value, startIndex = 0) {
                let node = startIndex ? this.searchByIndex(startIndex) : this.head;

                while (node && node.value !== value) {
                    node = node.next;
                }

                return node;
            }

            _checkIndex(index) {
                if (index >= this.size) {
                    throw new Error('Индекс за пределами списка');
                }
            }

            _removeNode(node) {
                const prevNode = node.prev;
                const nextNode = node.next;

                if (prevNode) {
                    prevNode.next = nextNode;
                }

                if (nextNode) {
                    nextNode.prev = prevNode;
                }

                node.prev = null;
                node.next = null;

                if (node === this.head) {
                    this.head = nextNode;
                }

                if (node === this.tail) {
                    this.tail = prevNode;
                }

                this.size--;
            }
        }

        function createNode(value) {
            return {
                value,
                next: null,
                prev: null,
            };
        }
    </pre>

</div>

<div class="linear" id="a__8">

    <h2>#8 Пересечение двух отсортированных массивов</h2>

    <p>Даны два отсортированных числовых массива. Напишите функцию, которая находит пересечение двух массивов и возвращает его. Пересечение — массив из элементов, которые встречаются в обоих массивах.</p>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function findEqualElements(arr1, arr2) {
          let i = 0;
          let j = 0;
          const result = [];

          while (i < arr1.length && j < arr2.length) {
            if (arr1[i] > arr2[j]) {
              j++;
            } else if (arr1[i] < arr2[j]) {
              i++;
            } else {
              result.push(arr1[i]);
              i++;
              j++;
            }
          }

          return result;
        }
    </pre>

</div>

<div class="linear" id="a__9">

    <h2>#9 Пересечение интервалов</h2>

    <p>Даны два отсортированных списка с временными интервалами, когда пользователи были в сети. Начало интервала строго меньше конца. Напишите функцию, которая находит интервалы, когда оба пользователя были онлайн.</p>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function intersection(user1, user2) {
            const list = [];
            let i1 = 0;
            let i2 = 0;

            while (i1 < user1.length && i2 < user2.length) {
                const leftOffset = Math.max(user1[i1][0], user2[i2][0]);
                const rightOffset = Math.min(user1[i1][1], user2[i2][1]);

                if (rightOffset > leftOffset) {
                    list.push([leftOffset, rightOffset]);
                }

                user1[i1][1] < user2[i2][1] ? ++i1 : ++i2;
            }

            return list;
        }
    </pre>

</div>

<div class="linear" id="a__10">

    <h2>#10 Развернуть односвязный список</h2>

    <p>Дан односвязный список. Напишите функцию, которая его разворачивает. Должен получиться новый список, элементы которого расположены в обратном порядке.</p>

    <p><b>Важно: реализуйте алгоритм за константную память О(1) и за линейное время О(n).</b></p>

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

    <p>Авторское решение</p>

    <pre class="brush: js;">
        /*
        Input: 1->2->3->4->5->NULL
        Output: 5->4->3->2->1->NULL
        */

        function reverse(head) {
                let current = head;
            if (!current) {
                return current;
            }
            let curPre = head.next;
            current.next = null;
            while (curPre) {
                let tmp = curPre.next;
                curPre.next = current;
                current = curPre;
                curPre = tmp;
            }
            return current;
        }
    </pre>

</div>

<div class="linear" id="a__11">

    <h2>#11 Реализация стека</h2>

    <p>Реализуйте стек, применяя связный список для хранения элементов.</p>

    <pre class="brush: js;">
        class Stack {
            constructor() {
                this.size = 0;
                this.head = null;
                this.tail = null;
            }

                // Кладёт элемент на стек.
                // Возвращает новый размер стека.
            push(value) {
                const node = { value, next: null, prev: null };
                if(this.size === 0){
                    this.head = node;
                    this.tail = node;
                }else{
                    this.tail.next = node;
                    node.prev = this.tail;
                    this.tail = node;
                }

                this.size++;
                //return this.size;
            }

                // Убирает элемент со стека.
                // Если стек пустой, кидает ошибку.
                // Возвращает удалённый элемент.
            pop() {
                if (this.size === 0) {
                    throw new Error('Стек пуст');
                }
                let tail_ = this.tail;
                this.tail = this.tail.prev;
                this.size--;
                return tail_;
            }

                // Возвращает верхний элемент стека без его удаления.
            peek() {
                return this.tail;
            }

                // Если стек пуст, возвращает true. В противном случае –– false.
            isEmpty() {
                if (this.size === 0) {
                    return true;
                }else{
                    return false;
                }
            }
        }

        const stack = new Stack();
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        class Stack {
            constructor() {
                this.size = 0;
                this.head = null;
                this.tail = null;
            }

            push(value) {
                const node = { value, next: null, prev: null };

                node.prev = this.tail;

                if (this.tail) {
                    this.tail.next = node;
                    this.tail = node;
                } else {
                    this.head = this.tail = node;
                }

                this.size++;
            }

            pop() {
                if (this.isEmpty()) {
                    throw new Error('Не могу удалить из пустого стека');
                }

                const node = this.tail;
                const prevNode = node.prev;

                if (prevNode) {
                    node.prev = null;
                    prevNode.next = null;
                }

                this.tail = prevNode;

                if (this.head === node) {
                    this.head = prevNode;
                }

                this.size--;

                return node;
            }

            peek() {
                return this.tail;
            }

            isEmpty() {
                return this.tail === null;
            }
        }
    </pre>

</div>

<div class="linear" id="a__12">

    <h2>#12 Реализация очереди</h2>

    <p>Реализуйте очередь, применяя связный список для хранения элементов.</p>

    <pre class="brush: js;">
        class Queue {
            constructor() {
                this.size = 0;
                this.head = null;
                this.tail = null;
            }

                // Ставит элемент в очередь.
                // Возвращает новый размер очереди.
            enqueue(value) {
                const node = { value, next: null, prev: null };
                node.prev = this.tail;

                if(this.tail){
                    this.tail.next = node;
                    this.tail = node;
                }else{
                    this.head = this.tail = node;
                }

                this.size++;
                return this.size;
            }

                // Убирает элемент из очереди.
                // Если очередь пустая, кидает ошибку.
                // Возвращает удалённый элемент.
            dequeue() {
                if (this.isEmpty()) {
                    throw new Error('Стек пуст');
                }
                let node = this.head;

                if(this.head === this.tail){
                    this.tail = this.head = null;
                }else{
                    this.head = node.next;
                    this.head.prev = null;
                }

                this.size--;
                return node;
            }

                // Возвращает элемент в начале очереди.
            peek() {
                return this.head;
            }

                // Если очередь пустая, возвращает true. В противном случае –– false.
            isEmpty() {
                 if (this.size === 0) {
                    return true;
                }else{
                    return false;
                }
            }
        }
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        class Queue {
            constructor() {
                this.size = 0;
                this.head = null;
                this.tail = null;
            }

            enqueue(value) {
                const node = { value, next: null, prev: null };

                node.prev = this.tail;

                if (this.tail) {
                    this.tail.next = node;
                    this.tail = node;
                } else {
                    this.head = this.tail = node;
                }

                this.size++;
            }

            dequeue() {
                if (this.isEmpty()) {
                    throw new Error('Не могу удалить из пустой очереди');
                }

                const node = this.head;
                const nextNode = node.next;

                if (nextNode) {
                    node.next = null;
                    nextNode.prev = null;
                }

                this.head = nextNode;

                if (this.tail === node) {
                    this.tail = nextNode;
                }

                this.size--;

                return node;
            }

            peek() {
                return this.head;
            }

            isEmpty() {
                return this.head === null;
            }
        }
    </pre>

</div>

<div class="linear" id="a__13">

    <h2>#13 Разбиение массива</h2>

    <p>Реализуйте разбиение массива относительно опорного элемента. Сделайте опорным последний элемент массива.</p>

    <pre class="brush: js;">
        function partition(arr, start = 0, end = arr.length - 1) {
          // Taking the last element as the pivot
            const pivotValue = arr[end];
            let pivotIndex = start;
            for (let i = start; i < end; i++) {
                if (arr[i] < pivotValue) {
                // Swapping elements
                [arr[i], arr[pivotIndex]] = [arr[pivotIndex], arr[i]];
                // Moving to next element
                pivotIndex++;
                }
            }

            // Putting the pivot value in the middle
            [arr[pivotIndex], arr[end]] = [arr[end], arr[pivotIndex]]
            return pivotIndex;
        }

        function swap(arr, i, j) {
          const tmp = arr[i];
          arr[i] = arr[j];
          arr[j] = tmp;
        }
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function partition(arr, start = 0, end = arr.length - 1) {
          const pivotValue = arr[end];

          let pivotIndex = start;

          for (let i = start; i < end; i++) {
            if (arr[i] <= pivotValue) {
              swap(arr, i, pivotIndex);
              pivotIndex++;
            }
          }

          swap(arr, pivotIndex, end);

          return pivotIndex;
        }

        function swap(arr, i, j) {
          const tmp = arr[i];
          arr[i] = arr[j];
          arr[j] = tmp;
        }
    </pre>

</div>

<div class="linear" id="a__14">

    <h2>#14 Алгоритм быстрой сортировки</h2>

    <p>Реализуйте алгоритм быстрой сортировки, применяя функцию partition. Её вы написали в прошлой задаче.</p>

    <pre class="brush: js;">
        function quickSort(arr, start = 0, end = arr.length - 1) {
             if (start >= end) {
                return arr;
            }

            let pivotIndex = partition(arr, start, end);

            quickSort(arr, start, pivotIndex - 1);
            quickSort(arr, pivotIndex + 1, end);

            return arr;


        }

        function partition(arr, start = 0, end = arr.length - 1) {
          const pivotValue = arr[end];

          let pivotIndex = start;

          for (let i = start; i < end; i++) {
            if (arr[i] <= pivotValue) {
              swap(arr, i, pivotIndex);
              pivotIndex++;
            }
          }

          swap(arr, pivotIndex, end);

          return pivotIndex;
        }

        function swap(arr, i, j) {
          const tmp = arr[i];
          arr[i] = arr[j];
          arr[j] = tmp;
        }
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function quickSort(arr, start = 0, end = arr.length - 1) {
            if (end <= start) {
                return arr;
            }

            const pivotIndex = partition(arr, start, end);

            quickSort(arr, start, pivotIndex - 1);
            quickSort(arr, pivotIndex + 1, end);

            return arr;
        }

        function partition(arr, start = 0, end = arr.length - 1) {
          const pivotValue = arr[end];

          let pivotIndex = start;

          for (let i = start; i < end; i++) {
            if (arr[i] <= pivotValue) {
              swap(arr, i, pivotIndex);
              pivotIndex++;
            }
          }

          swap(arr, pivotIndex, end);

          return pivotIndex;
        }

        function swap(arr, i, j) {
          const tmp = arr[i];
          arr[i] = arr[j];
          arr[j] = tmp;
        }
    </pre>

</div>

<div class="linear" id="a__15">

    <h2>#15 Слияние частей массива</h2>

    <p>Реализуйте слияние двух отсортированных частей массива. Для этого прочитайте ещё раз текстовое описание алгоритма и реализуйте в коде.</p>

    <pre class="brush: js;">
        function merge(arr, buffer, start, mid, end) {
            // см. 6.1

            for (let key in arr) {
                buffer[key] = arr[key];
            }

            // см. 6.2
            let l = start;
            let r = mid + 1;
            let i = start;

            // см. 6.3
            while (l < mid + 1 && r < end + 1) {
                if (buffer[l] <= buffer[r]) {
                    arr[i] = buffer[l];
                    l++;
                } else {
                    arr[i] = buffer[r];
                    r++;
                }
                i++;
            }

            // см. 6.4
            while (l < mid + 1) {
                arr[i] = buffer[l];
                l++;
                i++;
            }

            // см. 6.5
            while (r < end + 1) {
                arr[i] = buffer[r];
                r++;
                i++;
            }
            return arr;
        }
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function merge(arr, buffer, start, mid, end) {
          for (let i = start; i <= end; i++) {
            buffer[i] = arr[i];
          }

          let l = start;
          let r = mid + 1;
          let i = start;

          while (l < mid + 1 && r < end + 1) {
            if (buffer[l] <= buffer[r]) {
              arr[i] = buffer[l];
              l++
            } else {
              arr[i] = buffer[r];
              r++
            }
            i++;
          }

          while (l < mid + 1) {
            arr[i] = buffer[l];
            l++;
            i++;
          }

          while (r < end + 1) {
            arr[i] = buffer[r];
            r++;
            i++;
          }
        }
    </pre>

</div>

<div class="linear" id="a__16">

    <h2>#16 Алгоритм сортировки слиянием</h2>

    <p>Реализуйте алгоритм сортировки слиянием, применяя функцию merge. Её вы написали в прошлой задаче.</p>

    <pre class="brush: js;">
        function mergeSort(arr, start = 0, end = arr.length - 1, buffer=[]) {
            if (end <= start) {
                return arr;
            }
            if (!buffer) {
                for (let key in arr) {
                    buffer[key] = arr[key];
                }
            }

            const mid = Math.floor((start + end) / 2);

            mergeSort(arr, start, mid, buffer);
            mergeSort(arr, mid + 1, end, buffer);
            merge(arr, buffer, start, mid, end);

            return arr;
        }

        function merge(arr, buffer, start, mid, end) {
          for (let i = start; i <= end; i++) {
            buffer[i] = arr[i];
          }

          let l = start;
          let r = mid + 1;
          let i = start;

          while (l < mid + 1 && r < end + 1) {
               if (buffer[l] <= buffer[r]) {
                 arr[i] = buffer[l];
                 l++
               } else {
                 arr[i] = buffer[r];
                 r++
               }
               i++;
          }

          while (l < mid + 1) {
              arr[i] = buffer[l];
              l++;
              i++;
          }

          while (r < end + 1) {
              arr[i] = buffer[r];
              r++;
              i++;
          }
        }
    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">
        function mergeSort(arr, start = 0, end = arr.length - 1, buffer) {
          if (end <= start) {
            return arr;
          }

          buffer = buffer || [...arr];

          const mid = Math.floor((start + end) / 2);

          mergeSort(arr, start, mid, buffer);
          mergeSort(arr, mid + 1, end, buffer);

          merge(arr, buffer, start, mid, end);

          return arr;
        }

        function merge(arr, buffer, start, mid, end) {
          for (let i = start; i <= end; i++) {
            buffer[i] = arr[i];
          }

          let l = start;
          let r = mid + 1;
          let i = start;

          while (l < mid + 1 && r < end + 1) {
               if (buffer[l] <= buffer[r]) {
                 arr[i] = buffer[l];
                 l++
               } else {
                 arr[i] = buffer[r];
                 r++
               }
               i++;
          }

          while (l < mid + 1) {
              arr[i] = buffer[l];
              l++;
              i++;
          }

          while (r < end + 1) {
              arr[i] = buffer[r];
              r++;
              i++;
          }
        }
    </pre>

</div>

<!--
<pre class="brush: js;">

</pre>

-->
<!--

<div class="linear" id="use_strict">

    <h2>11111111</h2>

    <p>222222</p>

    <pre class="brush: js;">

    </pre>

    <p>Авторское решение</p>

    <pre class="brush: js;">

    </pre>

</div>

-->



<?php include '../../include/footer.php'; ?>
