var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');

ctx.beginPath();
ctx.strokeStyle = "red";
ctx.lineWidth = "5";
ctx.moveTo(100, 50);
ctx.lineTo(150, 150);
ctx.stroke();

ctx.beginPath();
ctx.strokeStyle = "blue";
ctx.lineWidth = "20";
ctx.moveTo(200, 50);
ctx.lineTo(300, 50);
ctx.lineTo(300, 100);
ctx.lineCap = "square";
//ctx.lineCap = "butt";
ctx.stroke();
ctx.clearRect(0,0, 400, 200);   // всё стёрли

ctx.beginPath();                // делаем треугольник
ctx.moveTo(50, 150);
ctx.lineTo(150,50);
ctx.lineTo(200, 150);
ctx.lineWidth = "5";
ctx.lineCap = "butt";
ctx.fillStyle='yellow';
ctx.closePath();
ctx.stroke();
ctx.fill();



// beginPath()	                // Начинает контур или сбрасывает текущий контур
// moveTo()	                    // Передвигает точку контура в заданные координаты не рисуя линию
// lineTo()	                    // Добавляет новую точку контура и создает линию к этой точке от последней заданной точки
// stroke()	                    // В действительности рисует определенный вами контур
// clearRect()	                // Очищает заданную область пикселей внутри данного прямоугольника
// lineWidth	                // Устанавливает/возвращает ширину текущей линии
// lineCap	                    // Устанавливает/возвращает стиль концов нарисованной линии
// fillStyle	                // Устанавливает/возвращает цвет, градиент или шаблон, используемый для заливки графического объекта
// closePath()	                // Замыкает контур соединяя последнюю точку с первой
// stroke()	                    // В действительности рисует определенный вами контур
// fill()	                    // Делает заливку текущей фигуры (контура)
