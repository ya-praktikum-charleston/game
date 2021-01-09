function draw1(){
	var canvas = document.getElementById('canvas1');
	if (canvas.getContext){
		var ctx = canvas.getContext('2d');
	}
}
draw1();

/*===============*/

function draw2() {
	var canvas = document.getElementById("canvas2");
	if (canvas.getContext) {
		var ctx = canvas.getContext("2d");

		ctx.fillStyle = "rgb(200,0,0)";
		ctx.fillRect (10, 10, 55, 50);

		ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
		ctx.fillRect (30, 30, 55, 50);
	}
}
draw2();

/*===============Пример прямоугольной формы*/

// fillRect(x, y, width, height) Рисует заполненный прямоугольник.
// strokeRect(x, y, width, height) Рисует прямоугольный контур.
// clearRect(x, y, width, height) Очищает указанную прямоугольную область, делая ее полностью прозрачной.

function draw3() {
	var canvas = document.getElementById('canvas3');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		ctx.fillRect(25, 25, 100, 100);
		ctx.clearRect(45, 45, 60, 60);
		ctx.strokeRect(50, 50, 50, 50);
	}
}
draw3();

/*===============Рисование контуров*/
/*
- Во-первых, вы создаете путь.
- Затем вы используете команды рисования, чтобы нарисовать путь.
- После того, как путь был создан, вы можете обводить или заполнять путь, чтобы визуализировать его.

	Вот функции, используемые для выполнения этих шагов:

beginPath() Создает новый путь. После создания будущие команды рисования направляются в путь и используются для построения пути вверх.

	Методы пути
		Методы задания различных путей для объектов.
closePath() Добавляет прямую линию к пути, идущему к началу текущего подпространства.
stroke() Рисует фигуру, поглаживая ее контур.
fill() Рисует сплошную фигуру, заполняя область содержимого пути.*/

function draw4() {
	var canvas = document.getElementById('canvas4');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		ctx.beginPath();
		ctx.moveTo(75, 75);
		ctx.lineTo(100, 50);
		ctx.lineTo(100, 100);
		ctx.fill();
	}
}
draw4();

/*===============Перемещение ручки*/
// moveTo(x, y) Перемещает перо в координаты, заданные xсимволом и y.

function draw5() {
	var canvas = document.getElementById('canvas5');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		ctx.beginPath();
		//ctx.lineWidth = 2;
		//ctx.strokeStyle = "green";

		ctx.arc(75, 75, 50, 0, Math.PI * 2, true); // Outer circle
		ctx.moveTo(110, 75);
		ctx.arc(75, 75, 35, 0, Math.PI, false);  // Mouth (clockwise)
		ctx.moveTo(65, 65);
		ctx.arc(60, 65, 5, 0, Math.PI * 2, true);  // Left eye
		ctx.moveTo(95, 65);
		ctx.arc(90, 65, 5, 0, Math.PI * 2, true);  // Right eye
		ctx.stroke();
	}
}
draw5();

/*===============Линии*/
//lineTo(x, y) Рисует линию от текущей позиции чертежа до позиции, указанной с помощью xи y.

function draw6() {
	var canvas = document.getElementById('canvas6');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		// Filled triangle
		ctx.beginPath();
		ctx.moveTo(25, 25);
		ctx.lineTo(105, 25);
		ctx.lineTo(25, 105);
		ctx.fill();

		// Stroked triangle
		ctx.beginPath();
		ctx.moveTo(125, 125);
		ctx.lineTo(125, 45);
		ctx.lineTo(45, 125);
		ctx.closePath();
		ctx.stroke();
	}
}
draw6();

/*===============Дуги*/
/*
arc(x, y, radius, startAngle, endAngle, anticlockwise)
Рисует дугу, которая центрируется в положении (x, y) с радиусом r, начинающимся в начале и заканчивающимся в конце, идущем в заданном направлении, указанном против часовой стрелки (по умолчанию по часовой стрелке).
arcTo(x1, y1, x2, y2, radius)
Рисует дугу с заданными контрольными точками и радиусом, соединенную с предыдущей точкой прямой линией.

Углы в arcфункции измеряются в радианах, а не в градусах. Для преобразования градусов в радианы можно использовать следующее выражение JavaScript: radians = (Math.PI/180)*degrees.
*/


function draw7() {
	var canvas = document.getElementById('canvas7');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		for (var i = 0; i < 4; i++) {
			for (var j = 0; j < 3; j++) {
				ctx.beginPath();
				var x = 25 + j * 50; // x coordinate
				var y = 25 + i * 50; // y coordinate
				var radius = 20; // Arc radius
				var startAngle = 0; // Starting point on circle
				var endAngle = Math.PI + (Math.PI * j) / 2; // End point on circle
				var anticlockwise = i % 2 !== 0; // clockwise or anticlockwise

				ctx.arc(x, y, radius, startAngle, endAngle, anticlockwise);

				if (i > 1) {
					ctx.fill();
				} else {
					ctx.stroke();
				}
			}
		}
	}
}
draw7();

/*===============Безье и квадратичные кривые*/
/*
quadraticCurveTo(cp1x, cp1y, x, y)
Рисует квадратичную кривую Безье от текущего положения пера до конечной точки, заданной xиy, используя контрольную точкуcp1x, заданную cp1yИ.
bezierCurveTo(cp1x, cp1y, cp2x, cp2y, x, y)
Рисует кубическую кривую Безье от текущего положения пера до конечной точки , заданной xиy, используя контрольные точки, заданные (cp1x,cp1y) и (cp2x, cp2y).
*/

function draw8() {
	var canvas = document.getElementById('canvas8');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		// Quadratric curves example
		ctx.beginPath();
		ctx.moveTo(75, 25);
		ctx.quadraticCurveTo(25, 25, 25, 62.5);
		ctx.quadraticCurveTo(25, 100, 50, 100);
		ctx.quadraticCurveTo(50, 120, 30, 125);
		ctx.quadraticCurveTo(60, 120, 65, 100);
		ctx.quadraticCurveTo(125, 100, 125, 62.5);
		ctx.quadraticCurveTo(125, 25, 75, 25);
		ctx.stroke();
		//ctx.fill();
	}
}
draw8();

/*===============Прямоугольники*/
// rect(x, y, width, height) Рисует прямоугольник, верхний левый угол которого задан символом (x, y) с указанным widthи height.

function draw9() {
	var canvas = document.getElementById('canvas9');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		roundedRect(ctx, 12, 12, 150, 150, 15);
		roundedRect(ctx, 19, 19, 150, 150, 9);
		roundedRect(ctx, 53, 53, 49, 33, 10);
		roundedRect(ctx, 53, 119, 49, 16, 6);
		roundedRect(ctx, 135, 53, 49, 33, 10);
		roundedRect(ctx, 135, 119, 25, 49, 10);

		ctx.beginPath();
		ctx.arc(37, 37, 13, Math.PI / 7, -Math.PI / 7, false);
		ctx.lineTo(31, 37);
		ctx.fill();

		for (var i = 0; i < 8; i++) {
			ctx.fillRect(51 + i * 16, 35, 4, 4);
		}

		for (i = 0; i < 6; i++) {
			ctx.fillRect(115, 51 + i * 16, 4, 4);
		}

		for (i = 0; i < 8; i++) {
			ctx.fillRect(51 + i * 16, 99, 4, 4);
		}

		ctx.beginPath();
		ctx.moveTo(83, 116);
		ctx.lineTo(83, 102);
		ctx.bezierCurveTo(83, 94, 89, 88, 97, 88);
		ctx.bezierCurveTo(105, 88, 111, 94, 111, 102);
		ctx.lineTo(111, 116);
		ctx.lineTo(106.333, 111.333);
		ctx.lineTo(101.666, 116);
		ctx.lineTo(97, 111.333);
		ctx.lineTo(92.333, 116);
		ctx.lineTo(87.666, 111.333);
		ctx.lineTo(83, 116);
		ctx.fill();

		ctx.fillStyle = 'white';
		ctx.beginPath();
		ctx.moveTo(91, 96);
		ctx.bezierCurveTo(88, 96, 87, 99, 87, 101);
		ctx.bezierCurveTo(87, 103, 88, 106, 91, 106);
		ctx.bezierCurveTo(94, 106, 95, 103, 95, 101);
		ctx.bezierCurveTo(95, 99, 94, 96, 91, 96);
		ctx.moveTo(103, 96);
		ctx.bezierCurveTo(100, 96, 99, 99, 99, 101);
		ctx.bezierCurveTo(99, 103, 100, 106, 103, 106);
		ctx.bezierCurveTo(106, 106, 107, 103, 107, 101);
		ctx.bezierCurveTo(107, 99, 106, 96, 103, 96);
		ctx.fill();

		ctx.fillStyle = 'black';
		ctx.beginPath();
		ctx.arc(101, 102, 2, 0, Math.PI * 2, true);
		ctx.fill();

		ctx.beginPath();
		ctx.arc(89, 102, 2, 0, Math.PI * 2, true);
		ctx.fill();
	}
}
draw9();
// A utility function to draw a rectangle with rounded corners.

function roundedRect(ctx, x, y, width, height, radius) {
	ctx.beginPath();
	ctx.moveTo(x, y + radius);
	ctx.lineTo(x, y + height - radius);
	ctx.arcTo(x, y + height, x + radius, y + height, radius);
	ctx.lineTo(x + width - radius, y + height);
	ctx.arcTo(x + width, y + height, x + width, y + height-radius, radius);
	ctx.lineTo(x + width, y + radius);
	ctx.arcTo(x + width, y, x + width - radius, y, radius);
	ctx.lineTo(x + radius, y);
	ctx.arcTo(x, y, x, y + radius, radius);
	ctx.stroke();
}

/*===============Объекты Path2D*/
// Path2D()Конструктор возвращает только что созданный Path2Dобъект, необязательно с другим путем в качестве аргумента (создает копию),
// или необязательно со строкой, состоящей из данных SVG path.
// Path2D.addPath(path [, transform]) Добавляет путь к текущему пути с помощью необязательной матрицы преобразования.

function draw10() {
	var canvas = document.getElementById('canvas10');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		var rectangle = new Path2D();
		rectangle.rect(10, 10, 50, 50);

		var circle = new Path2D();
		circle.arc(100, 35, 25, 0, 2 * Math.PI);

		ctx.stroke(rectangle);
		ctx.fill(circle);
	}
}
draw10();

/*===============Получение изображений для рисования*/
/*HTMLImageElement Это образы, созданные с помощью Image()конструктора, а также любой <img>элемент.
SVGImageElement Это изображения, встроенные с помощью <image>элемента.
HTMLVideoElement Использование HTML<video>-элемента в качестве источника изображения захватывает текущий кадр из видео и использует его в качестве изображения.
HTMLCanvasElement Вы можете использовать другой <canvas>элемент в качестве источника изображения.*/

/*===============Пример: простой линейный график*/
// drawImage(image, x, y) Рисует CanvasImageSource указанный image параметр по координатам (x,y).

function draw11() {
	var ctx = document.getElementById('canvas11').getContext('2d');
	var img = new Image();
	img.onload = function() {
		ctx.drawImage(img, 0, 0);
		ctx.beginPath();
		ctx.moveTo(30, 96);
		ctx.lineTo(70, 66);
		ctx.lineTo(103, 76);
		ctx.lineTo(170, 15);
		ctx.stroke();
	};
	img.src = 'https://mdn.mozillademos.org/files/5395/backdrop.png';
}
draw11();

/*===============Пример: укладка изображения в плитку*/
/*drawImage(image, x, y, width, height)
Это добавляет параметры widthandheight, которые указывают размер, до которого следует масштабировать изображение при его рисовании на холсте.*/

function draw12() {
	var ctx = document.getElementById('canvas12').getContext('2d');
	var img = new Image();
	img.onload = function() {
		for (var i = 0; i < 4; i++) {
			for (var j = 0; j < 3; j++) {
				ctx.drawImage(img, j * 50, i * 38, 50, 38);
			}
		}
	};
	img.src = 'https://mdn.mozillademos.org/files/5397/rhino.jpg';
}
draw12();

/*===============Пример сохранения и восстановления состояния холста*/
/*save() Сохраняет все состояние холста.
restore() Восстанавливает последнее сохраненное состояние холста.*/

function draw13() {
	var ctx = document.getElementById('canvas13').getContext('2d');

	ctx.fillRect(0, 0, 150, 150);   // Draw a rectangle with default settings
	ctx.save();                  // Save the default state

	ctx.fillStyle = '#09F';      // Make changes to the settings		// голубой
	ctx.fillRect(15, 15, 120, 120); // Draw a rectangle with new settings
	ctx.save();                  // Save the current state

	ctx.fillStyle = '#FFF';      // Make changes to the settings
	ctx.globalAlpha = 0.5;		// прозрачность
	ctx.fillRect(30, 30, 90, 90);   // Нарисуйте прямоугольник с новыми настройками

	ctx.restore();               // Restore previous state
	ctx.fillRect(45, 45, 60, 60);   // Draw a rectangle with restored settings

	ctx.restore();               // Restore original state
	ctx.fillRect(60, 60, 30, 30);   // Draw a rectangle with restored settings
}
draw13();

/*===============Переводить*/
/*translate(x, y)
Перемещает холст и его начало на сетке. x указывает горизонтальное расстояние для перемещения и yуказывает, как далеко нужно переместить сетку по вертикали.*/

function draw14() {
	var ctx = document.getElementById('canvas14').getContext('2d');
	for (var i = 0; i < 3; i++) {
		for (var j = 0; j < 3; j++) {
			ctx.save();
			ctx.fillStyle = 'rgb(' + (51 * i) + ', ' + (255 - 51 * i) + ', 255)';
			ctx.translate(10 + j * 50, 10 + i * 50);
			ctx.fillRect(0, 0, 25, 25);
			ctx.restore();
		}
	}
}
draw14();

/*===============Пример поворота*/
/*
rotate(angle)
Поворачивает полотно по часовой стрелке вокруг текущего начала координат на angleчисло радианов.*/
// translate изменяет позицию точки начала координа

function draw15() {
	var ctx = document.getElementById('canvas15').getContext('2d');

	// left rectangles, rotate from canvas origin
	ctx.save();
	// blue rect
	ctx.fillStyle = '#0095DD';
	ctx.fillRect(30, 30, 100, 100);
	ctx.rotate((Math.PI / 180) * 25);
	// grey rect
	ctx.fillStyle = '#4D4E53';
	ctx.fillRect(30, 30, 100, 100);
	ctx.restore();

	// right rectangles, rotate from rectangle center
	// draw blue rect
	ctx.fillStyle = '#0095DD';
	ctx.fillRect(150, 30, 100, 100);

	ctx.translate(200, 80); // translate to rectangle center
							// x = x + 0.5 * width
							// y = y + 0.5 * height
	ctx.rotate((Math.PI / 180) * 25); // rotate
	ctx.translate(-200, -80); // translate back

	// draw grey rect
	ctx.fillStyle = '#4D4E53';
	ctx.fillRect(150, 30, 100, 100);
}
draw15();