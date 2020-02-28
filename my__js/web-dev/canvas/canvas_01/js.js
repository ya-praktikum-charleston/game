var canvas = document.getElementById('c1');
var ctx = canvas.getContext('2d');                  //  контекст рисования на холсте
                                                    // "2d", ведущий к созданию объекта CanvasRenderingContext2D, представляющий двумерный контекст.

// fillRect создаёт прямоугольник и сразу его выводит
ctx.fillStyle = 'red';
ctx.fillRect(100, 50, 150, 75);                     // создаём прямоугольник по двум координатам
ctx.fillStyle = 'blue';
ctx.fillRect(150, 100, 100, 50);
// ctx.fillRect(x, y, width, height);
ctx.clearRect(0,0, 400, 200); //стирает canvas      // очистить холст в пределах указанных координат


// создаём просто прямоугольники
ctx.strokeStyle = "green";
ctx.lineWidth = "10";
ctx.rect(50,10, 100, 100);      // указываем координаты но не выводим
ctx.stroke();                   // отрисовать на холсте
ctx.fillStyle = "orange";
ctx.fill();                     // закрасить