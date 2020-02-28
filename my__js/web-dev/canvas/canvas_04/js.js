var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');
var pi = Math.PI;			// число Пи		это половина круга

ctx.beginPath();
ctx.lineWidth = 5;
ctx.strokeStyle = "red";
ctx.fillStyle="yellow";
ctx.arc(150, 100, 75, 0, 2*pi, false );
ctx.stroke();
ctx.fill();

ctx.beginPath();
ctx.lineWidth = 5;
ctx.strokeStyle = "green";
ctx.fillStyle="pink";
ctx.arc(270, 100, 75, 0, 2*pi, false );
ctx.stroke();
ctx.fill();
//ctx.art(x,y,radius, angle_start, angle_end, anticlockwise); angle - radian
ctx.clearRect(0,0,400,200);



canvas.onmousemove = function(event){
	var x = event.offsetX;
	var y = event.offsetY;
	ctx.clearRect(0,0,400,200);

	ctx.beginPath();
	var radius = Math.pow(Math.pow(x-200, 2)+Math.pow(y-100,2), 0.5);		// вычитаем радиус по координатам Х и Y (теорема пифагора)
	ctx.arc(200,100, radius, 0, 2*pi, false);
	ctx.stroke();
	ctx.fill();
}


// arc()	                    // Создает дугу/кривую (используется для создания окружностей или их части)
/*
arc(x,y, radius, startAngle, endAngle, anticlockwise);
x, y — координаты центра, вокруг которого будет рисоваться окружность.
radius — радиус окружности, безразмерная величина.
startAngle — начальный угол, начало отсчета. Задается в радианах. Счет идет по часовой стрелке с правой части окружности. На рисунке начало отсчета показано «0».
endAngle — конечный угол. В радианах. Так, полной окружности соответствует угол 2pi.
anticlockwise — направление рисования. По-умолчанию рисуем против часовой стрелки, значение true. Если мы хотим рисовать по часовой стрелке — false.
*/