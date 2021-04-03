<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Безопасность веб-приложений</h2>
    
    <p><b>Задача 1: Реализация стека</b></p>

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

    <br>
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

    <br>
    <p><b>Реализация очереди</b></p>

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
    </pre

    <br>
    <p><b>Разбиение массива</b></p>
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

    <br>
    <p><b>Алгоритм быстрой сортировки</b></p>

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

    <br>
    <p><b>Слияние частей массива</b></p>

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


    <br>
    <p><b>Алгоритм сортировки слиянием</b></p>

    <p>Реализуйте алгоритм сортировки слиянием, применяя функцию <code>merge</code>. Её вы написали в прошлой задаче.</p>

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
