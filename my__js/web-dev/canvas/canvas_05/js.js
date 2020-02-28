
var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');

var x = 200;
var y=100;
var stepCount = 0; 	// кол-во шагов в одном напралении
var direction; 		// направление движения
var timer;
var myX;
var myY;

function drawDot(){
	ctx.clearRect(0,0, 400, 200);
	if (stepCount==0){
		stepCount = Math.floor(15*Math.random());
		direction = Math.floor(8*Math.random()); // 0-7
	}
	else {
		stepCount--;
	}
	switch (direction) {
		case 0:
			// вверх
			y = y-1;
			break;
		case 1:
			// вправо
			x=x+1;
			break;
		case 2:
			// вниз
			y = y+1;
			break;
		case 3:
			// влево
			x = x-1;
			break;
		case 4:
			// вправо вверх
			x=x+1;
			y=y-1;
			break;
		case 5:
			// вправо вниз
			x=x+1;
			y=y+1;
			break;
		case 6:
			// влево вниз
			x=x-1;
			y=y+1;
			break;
		case 7:
			// влево вверх
			x=x-1;
			y=y-1;
			break;
	}
	if (x<0 || x>400 || y<0 || y>200) stepCount = 0;
	ctx.fillRect(x-3, y-3, 6, 6);

	ctx.beginPath();
	ctx.moveTo(x,y);
	ctx.lineTo(myX, myY);
	ctx.stroke();
	timer = setTimeout(drawDot, 100);
}
drawDot();

canvas.onmousemove = function (event){
	myX = event.offsetX;
	myY = event.offsetY;
}



// fillRect()	                // Рисует "залитый" прямоугольник
// lineTo()	                	// Добавляет новую точку контура и создает линию к этой точке от последней заданной точки
// moveTo()	                	// Передвигает точку контура в заданные координаты не рисуя линию




/*
МНОЖЕСТВО ТОЧЕК, НО РАБОТАЮТ ЧЕРЕЗ ЖОПУ


let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');

const direct = (function() {
    return {
        UP : (x, y) => { return{x : x, y : y - 1}},
        DOWN : (x, y) => { return{x : x, y : y + 1}},
        LEFT : (x, y) => { return{x : x - 1, y : y}},
        RIGHT : (x, y) => { return{x : x + 1, y : y}},
        UP_LEFT : (x, y) => { return{x : x - 1, y : y - 1}},
        UP_RIGHT : (x, y) => { return{x : x + 1, y : y - 1}},
        DOWN_LEFT : (x, y) => { return{x : x - 1, y : y + 1}},
        DOWN_RIGHT : (x, y) => { return{x : x + 1, y : y + 1}},
    }
})();

let stepCount = 0;
let myX = 0;
let myY = 0;
let timer = null;

class Dot {
    constructor () {
        this.x = Math.floor(300 * Math.random() + 50);
        this.y = Math.floor(200 * Math.random() + 50);
        this.direction = 0;
    }

    drawDot () {

        let directs = null;

        if(stepCount == 0) {
            stepCount = Math.floor(15 * Math.random() + 1);
            this.direction = Math.floor(8 * Math.random());
        } else {
            stepCount--;
        }

        switch (this.direction) {
            case 0:
                directs = direct.UP(this.x, this.y);
                break;
            case 1:
                directs = direct.DOWN(this.x, this.y);
                break;
            case 2:
                directs = direct.LEFT(this.x, this.y);
                break;
            case 3:
                directs = direct.RIGHT(this.x, this.y);
                break;
            case 4:
                directs = direct.UP_LEFT(this.x, this.y);
                break;
            case 5:
                directs = direct.UP_RIGHT(this.x, this.y);
                break;
            case 6:
                directs = direct.DOWN_LEFT(this.x, this.y);
                break;
            case 7:
                directs = direct.DOWN_RIGHT(this.x, this.y);
                break;
            default:
                break;
        }

        this.x = directs.x;
        this.y = directs.y;

        if (this.x < 0 || this.x > 400 || this.y < 0 || this.y > 300) {
            if (this.x < 0) this.x = 0;
            if (this.x > 400) this.x = 400;
            if (this.y < 0) this.y = 0;
            if (this.y > 300) this.y = 300;
            stepCount = 0;
        }

        ctx.fillRect(this.x - 3, this.y - 3, 6, 6);
        ctx.beginPath();
        ctx.moveTo(this.x, this.y);
        ctx.lineTo(myX, myY);
        ctx.stroke();
    }

    info () {
        setInterval(() => {console.log(this.x)}, 1000);
    }
}

let dots = [];
dots.push(new Dot());
dots.push(new Dot());
dots.push(new Dot());
draw(dots);

function draw(dots) {
    timer = setInterval(
        () => {
            ctx.clearRect(0, 0, 400, 300);
            dots.map((dot) => {
                dot.drawDot();
            });
        }, 100);
}

canvas.onmousemove = (event) => {
    myX = event.offsetX;
    myY = event.offsetY;
}

canvas.onclick = (event) => {
    dots.push(new Dot());
}

*/
