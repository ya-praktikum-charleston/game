let canvas = document.getElementById('c1');
let ctx = canvas.getContext('2d');
let x = 0;
let timer;

drawSin();

function drawSin(){

	y = Math.sin(x);

	if ( x >= 79 ){
		x = 0;
        ctx.clearRect(0,0, 400, 200);
        clearTimeout(timer);
	}
	else {
		x = x + 0.3;
	}

	ctx.fillRect( 5*x, 100+20*y, 2,2 );

	timer = setTimeout(drawSin, 50);
}
