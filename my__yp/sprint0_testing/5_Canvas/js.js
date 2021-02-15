let canvas = document.getElementById("canvas");
let ctx = canvas.getContext("2d");
canvas.width = 400;
canvas.height = 400;

const LogoCanvas = document.createElement('canvas');
const LogoContext = LogoCanvas.getContext('2d');

LogoCanvas.width = canvas.width;
LogoCanvas.height = canvas.height;

LogoContext.lineWidth = 16;
LogoContext.beginPath();
LogoContext.moveTo(150, 114);
LogoContext.lineTo(250, 114);
LogoContext.strokeStyle = "white";
LogoContext.stroke();

LogoContext.beginPath();
LogoContext.moveTo(120, 144);
LogoContext.lineTo(120, 294);
LogoContext.strokeStyle = "white";
LogoContext.stroke();

LogoContext.beginPath();
LogoContext.moveTo(280, 144);
LogoContext.lineTo(280, 294);
LogoContext.strokeStyle = "white";
LogoContext.stroke();

const pattern = ctx.createPattern(LogoCanvas, 'repeat');
const matrix = new DOMMatrix();

ctx.fillStyle = pattern;

ctx.fillRect(0, 0, canvas.width, canvas.height);

function Moving(x,y) {
	ctx.clearRect(0, 0, canvas.width, canvas.height);

	matrix.translateSelf(x, y);
	pattern.setTransform(matrix);

	ctx.fillStyle = pattern;
	ctx.fillRect(0, 0, canvas.width, canvas.height);
}

document.addEventListener("keydown", function (e) {
	if (e.key === "ArrowLeft") {
		Moving(-25,0);
	}
	if (e.key === "ArrowUp") {
		Moving(0,-25);
	}
	if (e.key === "ArrowRight") {
		Moving(25,0);
	}
	if (e.key === "ArrowDown") {
		Moving(0,25);
	}
});