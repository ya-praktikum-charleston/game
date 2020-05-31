<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
        
	<h2>Unit 6. Работа с файлами и папками. Создание файлов, чтение файлов, папок</h2>

	<pre class="brush: js;">
		
		// Подключаем модуль чтения файлов
		const fs = require('fs');
		// Подключаем модуль чтения формата (расширение)
		const path = require('path');

		
		
		// Читать файл
		
		// вариант 1 асинхронный
		fs.readFile('t1.txt', 'utf-8', (err,data) => {
			console.log('вариант 1_  ' + data);
		});
		
		// вариант 2 синхронный
		let text = fs.readFileSync('t1.txt','utf-8');

		console.log('вариант 2_  ' + text);
		console.log('*********асинхрон*********');


		
		// Читаем папку
		fs.readdir('one', (err,data) => {
			console.log(data);
			data.forEach( file => {
				console.log(file);
				console.log(path.extname(file) == '.txt');      // получаем формат фала
				console.log(fs.statSync('one/' + file));      // получаем массив информации о файле
				console.log(fs.statSync('one/' + file).size + '   _размер фала');      // получаем размер фала
			})
		});
		// fs.statSync      получить информацию о файле
		
		
		
		// Создаём новый файл и записываем в него информацию
		fs.writeFile('newfile.txt','goooooooooo', (err) => {
		   if(err) console.log(err);
		});
		// если нужно создать файл в папке, прописивыем ему путь 'one/newfile.txt'


	</pre>

</div>


<div class="linear" id="use_strict">
        
	<h2>Unit 7. Чтение и запись CSV, JSON файлов в Node.js</h2>

	<pre class="brush: js;">
		
		// Case 1. Записываем json file
		
		const fs = require('fs');
		
		const man = {
			name: 'Alex',
			age : 22,
			department : 'History',
			car : 'vaz'
		};
		
		fs.writeFile('one.json', JSON.stringify(man), (err) => {		// делается JSON строку
			if (err) console.log('Error');
		});

		
		
		// Case 2. Читаем json file
		
		const student = require('./one.json');
		console.log(student);
		
		
		
		// Case 3. Читаем CSV file
		
		// потребуется установить csv парсер, команда cmd: npm i csv-parser
		
		const csv = require('csv-parser');		// подключаем модуль
		
		const results = [];						// обьявляем переменную куда будем писать резудьтат
		
		fs.createReadStream('table.csv')
			.pipe(csv())
			.on('data', (data) => results.push(data))
			.on('end', () => {
				console.log(results);
			});
		
		
		
		// Case 4. Пишем CSV file
		
		// потребуется установить csv модуль записи, команда cmd: npm i csv-writer
		
		const createCsvWriter = require('csv-writer').createObjectCsvWriter;		// подключаем модуль
		
		const csvWriter = createCsvWriter({					// настройка модуля
			path: 'test.csv',
			header: [
				{id: 'name', title: 'NAME'},
				{id: 'surname', title: 'LastName'},
				{id: 'age', title: 'AGE'},
				{id: 'gender', title: 'G'}
			]
		});

		const data = [
			{
				name: 'John',
				surname: 'Snow',
				age: 26,
				gender: 'M'
			}, {
				name: 'Clair',
				surname: 'White',
				age: 33,
				gender: 'F',
			}, {
				name: 'Fancy',
				surname: 'Brown',
				age: 78,
				gender: 'F'
			}
		];

		csvWriter.writeRecords(data)       // запись в файл
			.then(() => {
				console.log('...Done');
			});

	</pre>

</div>



<div class="linear" id="use_strict">
        
	<h2>Unit 8. Получение GET и POST запросов на Node.js</h2>

	<pre class="brush: js;">
		
		//GET
		
		//для этого подключаем модуль http
		const http = require('http');
		
		// для того чтобы разобрать данные с адресной строки
		const url = require('url');	
		
		//и используем метод	
		http.createServer((request, response) => {
			console.log('server work');					// просто выведет в консоль
		response.end('work');							// завершение работы сервера и его ответ, это выведет браузер: localhost:3000/

		}).listen(3000);								// какой порт слушать	
			
			
		// в методе http.createServer, для парсинга с адресной строки, используем следующую штуку
		let urlRequest = url.parse(request.url, true);	
		console.log(urlRequest.query.test);						// 	test это наш Get
			
			
			
			
		// POST
		
		// подключаем модуль для разбора (парсинга) строки из POST ответа
		const { parse } = require('querystring');
		
		
		// получаем и обрабатываем POST
		let body = '';
        request.on('data', chunk => {       // склодируем кусочки запросов в переменную
            body += chunk.toString();
        });
        request.on('end', () => {           // после завершения склодирования начинаем обработку
            console.log(body);
            let params = parse(body);       // парсим (обрабатываем) ответ
            console.log(params);
            console.log(params.hi);
            response.end('ok');
        });
		
		
	</pre>

</div>



<div class="linear" id="use_strict">

	<h2>Unit 9. Работа с базами данных. Создание базы данных и подключение к базе.</h2>

	<pre class="brush: js;">

		// установим модуль, который отвечает за подключение к базе данных.
		npm install mysql
	
		// Теперь подключим модуль mysql в файл node.js:
		const mysql = require('mysql');
	
	
		// конфигурация подключения
		const conn = mysql.createConnection({
			host: "server.mysql.tools", 
			user: "nodetest",
			database: "test_database",
			password: "XXXYYY"
		});
	
		
		// Следующий этап — создание подключения. Пишем в коде:
		conn.connect(function (err) {
			if (err) {
				return console.error("Ошибка: " + err.message);
			}
			else {
				console.log("Подключение к серверу MySQL успешно установлено");
			}
		});
	
	
		// После подключения, напишем запрос и выполним его. Сам запрос, для удобства — вынесем в отдельную переменную query.
		let query="SELECT * FROM user";

		conn.query(query, (err, result, field) =>{
			console.log(err);
			console.log(result);
			 // console.log(field);
		});
	
	
		// После того, как мы завершили работу с таблицей – необходимо выполнить закрытие соединения с базой данных MySQL. Формат нам знакомый, используем метод end:
		conn.end( err => {
			if (err) {
				console.log(err);
				return err;
			}
			else {
				console.log('Database ----- Close');
			}
		});
	
	</pre>

</div>
	
	
<div class="linear" id="use_strict">
     
        <h2>Unit 10. Роутинг на Node.js</h2>

        <pre class="brush: js;">

			// создавать роутинг на чистой node.js без использования express. 
			// Давайте обрисуем задачу - создать сервер на node.js, который будет реагировать на GET и POST запросы и отвечать на них.
			
			const http = require('http');
			const url = require('url');
			
			
			// Для понимания адреса, который приходит в запросе, нам нужно сделать парсинг req.url.
			http.createServer(function (req, res) {
				let urlParts = url.parse(req.url);
				console.log(urlParts.pathname);
			}).listen(3000);
		
			
			// Теперь зная urlParts.pathname мы можем выполнять любые действия на сервере. Давайте добавил внутрь сервера switch, который и будет реализовывать роутинг:
			switch (urlParts.pathname) {
				case "/":
					homepage(req, res);
					break;
				case "/about":
					about(req, res);
					break;
				default:
					page404(req,res);
					break;
			}
		
		
			// Где homepage, about, page404 - это функции, которые будут реагировать на данные адреса.
			function homepage(req, res) {
				res.end("homepage");
			}
			function about(req, res) {
				res.end("about");
			}
			function page404(req, res) {
				res.end("404");
			}   
		
		
			// Добавим в роутен на нативной node.js возможность реагировать на тип запроса - GET, POST, а на другие запросы отвечать 404. Весь код приложения выглядит так:
			const http = require('http');
			const url = require('url');

			http.createServer(function (req, res) {
				let urlParts = url.parse(req.url);
				// console.log(urlParts);
				console.log('==========================');
				console.log(urlParts.pathname);
				console.log('==========================');
				if (req.method == 'GET') {
					switch (urlParts.pathname) {
						case "/":
							homepage(req, res);
							break;
						case "/about":
							about(req, res);
							break;
						default:
							page404(req,res);
							break;
					}
				}
				else if (req.method == 'POST') {
					switch (urlParts.pathname) {
						case "/about":
							about2(req, res);
							break;
						default:
							page404(req,res);
							break;
					}
				}
				else {
					page404(req,res);
				}

			}).listen(3000);
			console.log("Server running at http://localhost:3000/");
				
			function homepage(req, res) {
				res.end("homepage");
			}
			function about(req, res) {
				res.end("about");
			}
			function about2(req, res) {
				res.end("about post");
			}
			function page404(req, res) {
				res.end("404");
			}	
		
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
