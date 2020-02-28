<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">

    <h2>Конструкция "switch"</h2>

    <p>Конструкция <code>switch</code> заменяет собой сразу несколько <code>if</code>.</p>
    <p>Она представляет собой более наглядный способ сравнить выражение сразу с несколькими вариантами.</p>

    <pre class="brush: js;">

		switch (data_currency){
            case 'euro':
                div_10.innerHTML = 0.9;
                break;
            case 'usd':
                div_10.innerHTML = 1;
                break;
            case 'rub':
                div_10.innerHTML = 63;
                break;
        }

    </pre>

	<h2>Функции</h2>
    
    <pre class="brush: js;">
	
		element.onmousemove = null;		// удаление функций
		
    </pre>


	<h2>Строки</h2>
    
    <pre class="brush: js;">
	
		.replace("i", "1")				// возвращает новую строку с замененными символами
			//пример
			let val = 'iiiooolll';
			var replaceChars = { "i":"1" , "o":"0", "l":"7" };

			for (var key in replaceChars) {
				val = val.replace(new RegExp(key, 'g'), replaceChars[key]);		//111000777
			}
		
    </pre>

	<h2>DOM</h2>
    
    <pre class="brush: js;">
	
		document.getElementsByClassName('one');		выбрать всё по классу
		document.getElementsByTagName('div');		выбрать всё по тегу
	
		document.querySelector()
		document.createElement('div')        // создает элемент
	
        .getAttribute()           		// Возвращает значение указанного атрибута элемента
		.hasAttribute()					// Проверяет наличие атрибута
        .setAttribute()           		// Добавляет новый атрибут или изменяет значение существующего атрибута
		.removeAttribute()				// удаляет атрибут
		
		.classList				  			//возвращает псевдомассив DOMTokenList, содержащий все классы элемента.
		.classList.add()				 	 //Добавляет элементу указанные классы
		.classList.remove()				  	//Удаляет у элемента указанные классы
		.classList.toggle()				  	//Если класс у элемента отсутствует - добавляет, иначе - убирает.
		.classList.contains()			  	//Проверяет, есть ли данный класс у элемента (вернет true или false)

		.offsetWidth 					// Ширина объекта

        .append()       // добавляет узлы или строки в конец элемента,
        .prepend()       // вставляет узлы или строки в начало элемента,
        .before()       // вставляет узлы или строки до элемента,
        .after()       // вставляет узлы или строки после элемента,
        .replaceWith()       // заменяет элемента заданными узлами или строками.

        .innerHTML = '';      // очистить элемент, просто вставим пустоту

        // Клонирование
        let newElem = cloneElem.cloneNode(true)      // клонирование элемента, true если дети узла должны быть клонированы или false для того, чтобы был клонирован только указанный узел.
        newElem.querySelector('.weekday')           // элементы внутри клона выбираем как обычный div и так с ним работаем
		
    </pre>

    <h2>Массивы</h2>
    
    <pre class="brush: js;">
        .push           // Добавляет элемент в конец массива.

        .pop            // Удаляет последний элемент из массива и возвращает его.

        .unshift        // Добавляет элемент в начало массива.

        .shift          // Удаляет элемент в начале, сдвигая очередь, так что второй элемент становится первым.

        .split          // Преобразует строку в массив по указанному символу

        .parseFloat     // Преобразует строковый аргумент в число с плавающей точкой. Если во время преобразования он обнаруживает неподходящий символ, то заканчивает процесс и возвращает результат.

        .parseInt       // Преобразует первый аргумент в число по указанному основанию, а если это невозможно - возвращает NaN.

        .reverse        // Изменяет порядок элементов в массиве на обратный

        .join()         // объединяет все элементы массива (или массивоподобного объекта) в строку.
    </pre>

    <h2>Методы массивов</h2>

    <p>Метод <code>map()</code> создаёт новый массив с результатом вызова указанной функции для каждого элемента массива.</p>
    <p>Массив <code>Set</code> записвает только уникальные значения</p>
    <p>Метод <code>filter()</code> создаёт новый массив со всеми элементами, прошедшими проверку, задаваемую в передаваемой функции.</p>
    <p>Метод <code>forEach()</code> выполняет указанную функцию один раз для каждого элемента в массиве.</p>
    <pre class="brush: js;">

        let a = [4, 5, 12, 200, 1, 0, -2];

        let b = a.map(function (item, index) {
            // console.log(index);
            return item * 5;
        });
        // b = [20, 25, 60, 1000, 5, 0, -10]

        let c = a.filter(function (item, index) {
            if (item > 0) {
                return true;
            }
        });
        // c = [4, 5, 12, 200, 1]

        let v = [];
        let out = a.forEach(elem => {
            v.push(elem * 2);
        });
        // out = [8, 10, 24, 400, 2, 0, -4]

        // еще пример
        a.forEach(finction(elem, index) {
            console.log(index);
            console.log(elem);
            console.log("===========");
        });

    </pre>

    <h2>Input</h2>

    <pre class="brush: js;">

            // Заполнить select
        for(let i = 0; i < a11[inp].length;i++){
            select.append(new Option(key, key));
        }

    </pre>

    <h2>Условия</h2>

    <pre class="brush: js;">

        if( Number(a) ){}       // Проверка на число

        (i == 0 ) ? '' : ' / ';     // Условие в одну строку

        if(this != window){         // Перебор checked при первом запуске из функции.   (13_homework - Task 16)
            inp = this.getAttribute('id');
        }else{
            inp = document.querySelector(".t16[checked]").getAttribute('id');
        }

    </pre>

    <h2>Циклы</h2>

    <pre class="brush: js;">

        let a1 = {
            3 : 'hello',
            'one' : 'hi'
        };

        for(let key in a1){
            // for in выводит ключ значение

            if( a1[key] == val ){
                delete a1[key];     // Удалить ззначение
                break;
            }
        }

    </pre>
	
	<h2>addEventListener</h2>
    
    <pre class="brush: js;"> 
        // addEventListener это возможность повесить несколько обработчиков на одно событие.
		
		// Синтаксис добавления обработчика:
		element.addEventListener(event, handler[, options]);
		
		function handler1() {
			alert('Спасибо!');
		};

		function handler2() {
			alert('Спасибо ещё раз!');
		}

		elem.addEventListener("click", handler1); 		// Спасибо!
		elem.addEventListener("click", handler2); 		// Спасибо ещё раз!
		
		elem.removeEventListener("click", handler);		// Удалить обработчик
		
    </pre>
	
	
	<h2>События input</h2>
    
    <pre class="brush: js;"> 
        .onchange            // срабатывает при потере фокуса
        .oninput            // сработает при любом изменении
    </pre>
	
	
	<h2>События мыши</h2>
    
    <pre class="brush: js;">
		.onclick				// клик по элементу, срабатывает при одновременной регистрации событий mousedown и mouseup на элементе
		.onmousedown			// момент нажатия мыши
		.onmouseup				// Отжатие мыши
		
        .onmouseenter           // Наведение мыши на элемент. Похоже на onmouseover, с тем отличием, что у onmouseenter нет всплытия
		.onmouseover			// Наведение мыши на элемент
        .onmouseleave           // Курсор покидает элемент. Похоже на onmouseout, с тем отличием, что у onmouseleave нет всплытия
		.onmouseout				// Курсор покидает элемент
		
		.onmousemove           	// Движение мыши внутри элемента
		
		.oncontextmenu 			// клик правой кнопкой мыши
		.ondblclick				// двойной клик по элементу
    </pre>

	
	<h2>События клавиатуры</h2>
	
	<pre class="brush: js;"> 
        .onkeypress            	// Событие происходит когда нажимается символьная клавиша (не ловит клавиши F1-F12 и другие, ловит в основном только символьные клавиши.)
        .onkeydown            	// происходит когда клавиша нажата но не отпущена
        .onkeyup            	// происходит во время отпускания клавиши
    </pre>
	
	
	<h2>touch события</h2>
	
	<pre class="brush: js;"> 
        .touchstart            	// касание
        .touchend            	// отжатие
        .touchmove            	// смещение (перемещает палец )
		.touchleave				//Событие возникает, когда точка соприкосновения выходит за рамки элемента.
    </pre>
	
	
	<h2>LocalStorage</h2>
	
	<pre class="brush: js;"> 
        localStorage.setItem('5',11);			// записать значение. Пример: ключ 5, значение 11
        localStorage.getItem('5');				// прочитать значение.
        localStorage.length;					// количество элементов в хранилище.
		
		// записать массив
		let a2 = [7,6,5];
		localStorage.setItem('a2',JSON.stringify(a2));		// массивы записываются в json формате, иначе они приведутся к строке
		
		// прочитать массив
		let arr = localStorage.getItem('a2');
		arr = JSON.parse(arr);					// полученный json конвертируем обратно в массив и делаем с ним что хотим
		
		
		localStorage.clear();				// очищение localStorage
		localStorage.removeItem(key)();		// удалить данные с ключом key
		
		
		// вызывается каждый раз, когда произошло изменение в localStorage на других страницах
		window.addEventListener('storage', function(events) {
			console.dir(events);
		});
    </pre>
	
	
	<h2>AJAX</h2>
	
	<pre class="brush: js;"> 
        let xhttp = new XMLHttpRequest();									// 1. Создаём новый объект XMLHttpRequest

		xhttp.onreadystatechange = function () {							// 2. Callback - функция, которая вызывается всякий раз, когда поле readyState меняет свое значение.
			if (this.readyState == 4 && this.status == 200) {
				console.log(this.responseText);
				document.querySelector('.out-1').innerHTML = this.responseText;
			}
		}
		
		xhttp.open("GET", "index.php?auth=password&action=1", true);		// 3. Конфигурируем объект: GET-запрос на URL 'index.php'
		xhttp.send();														// 4. Отсылаем запрос

		
		
		
		
			// Синтаксис:
		xhr.open(method, URL, async, user, password)
		
		
			//В body находится тело запроса. Не у всякого запроса есть тело, например у GET-запросов тела нет, а у POST – основные данные как раз передаются через body.
		xhr.send([body])
			
		
			// прерывает выполнение запроса
		xhr.abort() 
		
		
		
			// Таймаут
		
			// Максимальную продолжительность асинхронного запроса можно задать свойством timeout:
		xhr.timeout = 30000; // 30 секунд (в миллисекундах)
		
			// При превышении этого времени запрос будет оборван и сгенерировано событие ontimeout:
		xhr.ontimeout = function() {
		  alert( 'Извините, запрос превысил максимальное время' );
		}
		
		
			// Полный список событий

		loadstart			// запрос начат.
		progress			// браузер получил очередной пакет данных, можно прочитать текущие полученные данные в responseText.
		abort				// запрос был отменён вызовом xhr.abort().
		error				// произошла ошибка.
		load				// запрос был успешно (без ошибок) завершён.
		timeout				// запрос был прекращён по таймауту.
		loadend				// запрос был завершён (успешно или неуспешно)
		
    </pre>


    <h2>Регулярные выражения</h2>

    <p><code>.</code> любой одиночный символ</p>
    <p><code>[]</code> любой из них, диапазон</p>
    <p><code>$</code> конец строки</p>
    <p><code>^</code> начало строки</p>
    <p><code>\</code> экранирование</p>
    <p><code>\d</code> любую цифру</p>
    <p><code>\D</code> всё что угодно, кроме цифр</p>
    <p><code>\s</code> пробелы</p>
    <p><code>\S</code> всё кроме пробелов</p>
    <p><code>\w</code> буква</p>
    <p><code>\W</code> всё кроме букв</p>
    <p><code>\b</code> граница слова</p>
    <p><code>\B</code> не граница</p>

    <p><b>Квантификация</b></p>
    <p><code>n{4}</code> искать n подряд 4 раза</p>
    <p><code>n{4,6}</code> искать n от 4 до 6</p>
    <p><code>*</code> от нуля и выще</p>
    <p><code>+</code> от 1 и выше</p>
    <p><code>?</code> нуль или 1 раз</p>

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
