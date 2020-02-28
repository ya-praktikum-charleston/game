var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');
var myColor = 'red';

document.getElementById('color').oninput = function(){
	myColor = this.value;
}


	
canvas.onmousedown = function(event){
	canvas.onmousemove = function(event){
		var x = event.offsetX;
		var y = event.offsetY;
		ctx.fillRect(x, y, 5, 5); 	// рисуем квадрат
		ctx.fillStyle = myColor;
		ctx.fill();
	}
	canvas.onmouseup = function(){
		canvas.onmousemove = null;
	}
}



// fillRect()	                // Рисует "залитый" прямоугольник

// .onmousedown            		// момент нажатия мыши
// .onmousemove            		// Движение мыши внутри элемента
// .onmouseup              		// Отжатие мыши

