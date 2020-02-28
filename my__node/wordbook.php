<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
        
        <h2>[1] УСТАНОВКА NODE.JS. НАСТРОЙКА И ПЕРВАЯ ПРОГРАММА. НАЗНАЧЕНИЕ NODE. NODEMON</h2>

        <pre class="brush: js;">
			
			// Скачиваем Node.js с оф-сайта
			
			// посмотреть версию ноды в консоли
			node
			
			// Запустить файл в консоле
			node app.js
		
			// NODEMON это типа лайвсторедж 
			// https://www.npmjs.com/package/nodemon 
			// там находим команду:
			// заходим в папку с проектом и пишем npm install nodemon
			// или ставим глобально npm install -g nodemon
			// В папке проекта создастся папка node_modules
			
			// запустить файл через NODEMON 
			nodemon app.js
			
			// остановить сервер ctrl + c
        </pre>

    </div>


<div class="linear" id="use_strict">

	<h2>[2] РАБОТА С КОНСОЛЬЮ WINDOWS</h2>
	
	<pre class="brush: js;">
		
		// в пуске найти консоль можно набрав cmd
	
        // Смена диска
        c: (enter); d: (enter)

        // Посмотреть содержимое папки
        dir

        // Выгрузить содержимое папки в созданный файл
        dir > test.txt

        // Зайти в паку или выйти
        cd OpenServer & cd ..

        cd OpenServer (таб) \ d (таб) \ и т.д
        cd c:\OpenServer (таб) \ d (таб) \ и т.д
        cd ../../..

        // Очистить консоль
        cls

        // Запустить файл в редакторе, просто указать его название
        app.js
		
        // Создать папку
        md test

        // Удалить папку
        rd test

        // Создать файл
        copy con file.js
        вводишь содержимое файла если нало
        в конце нажимаешь Ctrl+Z


    </pre>
	


</div>

<div class="linear" id="use_strict">
        
        <h2>[4] СОЗДАЕМ СЕРВЕР НА NODE.JS</h2>

        <pre class="brush: js;">
			const http = require('http');			
			const fs = require('fs');

			//http.createServer().listen(3000);						// здесь сервер ни чего не ответит
			http.createServer(function (request, response) {		// учим сервер отвечать
				// request      запрос, то что мы пишем в адресной строке
				// response     ответ сервера
				// end          закончить ответ
				console.log(request.url);
				console.log(request.eser);
				console.log(request.headers['user-agent']);

				response.setHeader('Content-Type', 'text/html; charset=utf-8;');

				if(request.url == '/'){
					response.end('<p>Main</p> <h1>ВИТАЛЯ</h1>');
				}else if(request.url == '/cat'){
					response.end('<p>Category</p> <h1>Cat</h1>')
				}else if(request.url == '/dat'){
					let fileContents  = fs.readFileSync('index.dat');	// функция вычитывания файла
					console.log(fileContents);
					response.end(fileContents)
				}
			}).listen(3000);



			// require('http') подключение модуля http
			// listen(3000) порт который будем слушать
			// заходим в папку с файлом и запускаем его node script.js
			// остановить сервер ctrl + c
			// setHeader установить настройки HTML страницы

        </pre>

    </div>
	
	<div class="linear" id="use_strict">
	
        <h2>[5] ФРЕЙМВОРК EXPRESSJS. УСТАНОВКА, НАСТРОЙКА, РАБОТА СО СТАТИКОЙ. ОРГАНИЗАЦИЯ СТРУКТУРЫ КАТАЛОГОВ ИНТЕРНЕТ МАГАЗИНА</h2>

        <pre class="brush: js;">
		
			// если есть файл package.json, то не ебем мозги и набираем
			npm install
			// если нет то :
		
			npm init
			
			//просит указть имя проекта, пишем имя (node_shop)
			package name: node_shop
			
			//указываем файл входа
			entry point: script.js
			//далее всё похуй ентер
			
			npm install express --save
			
			
			// Настраиваем Express.js, в файле .js пишем:
			
			// подключаем экспесс
			let express = require('express');

			// создаем новый экземпляр express
			let app = express();

			/**
			 * public - имя папки где хранится статика
			 * **/
			// подключаем статику
			app.use(express.static('public'));


			// указываем сервак
			app.listen(3000,function () {
				console.log('ZALUPA');
			});

			// get метод обращения
			app.get('/', function (request, response) {
				//response.end('Hello 123');
				response.render('index.html');
			});

			app.get('/cat', function (request, response) {
				//console.log('_-_-_cat_-_-_');
				response.render('cat.html');
				response.end('Hello 123');
			});
			
			// render это метод загрузки файлов
			// end закончить ответ если нет рендера
        </pre>

    </div>
	
	
	<div class="linear" id="use_strict">

		<h2>[6] ВЫВОД DEBUG ИНФОРМАЦИИ. ЗАПУСК В РЕЖИМЕ ДЕБАГА</h2>
		
		<pre class="brush: js;">
			
			// запускаем дебаггер
			
			// напривер отдебажим express
			set DEBUG=express:* & node script.js
			
			// отдебажим router
			set DEBUG=express:router & node script.js
			
			// отдебажим application
			set DEBUG=express:application & node script.js
			
			// теперь при запуске nodemon script.js дебаггер будет присутствовать при каждом выводе
			
		</pre>
		
	</div>
	
	
	<div class="linear" id="use_strict">

		<h2>[7] ПРЕПРОЦЕССОР PUG. УСТАНОВКА, СИНТАКСИС, ВЕРСТКА СТРАНИЦ ИНТЕРНЕТ МАГАЗИНА</h2>
		
		<pre class="brush: js;">
			
			//подключваем pug как движок вывода, в файле script.js пишем
			app.set('view engine','pug');
			
		</pre>
		
	</div>
	
	
	<div class="linear" id="use_strict">

		<h2>[8] УСТАНОВКА И НАСТРОЙКА БАЗЫ ДАННЫХ MYSQL. ОСНОВЫ РАБОТЫ С MYSQL WORKBENCH. СОЗДАЕМ И ЗАПОЛНЯЕМ ТАБЛИЦУ ТОВАРОВ И КАТЕГОРИЙ</h2>
		
		<pre class="brush: js;">
			
			
			
		</pre>
		
	</div>
	
	
	<div class="linear" id="use_strict">

		<h2>[9] NODE.JS И MYSQL. ПОДКЛЮЧАЕМСЯ И ВЫВОДИМ СПИСОК ТОВАРОВ</h2>
		
		<pre class="brush: js;">
			
			/**
			* Подключаем mySQL модуль
			* **/
			let mysql = require('mysql');

			/**
			* Настраиваем модуль mysql
			* **/
			let con = mysql.createConnection({
				host: 'localhost',
				user: 'root',
				password: 'root',
				database: 'market'
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
