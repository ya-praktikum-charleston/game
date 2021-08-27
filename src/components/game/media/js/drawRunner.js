import { GAME, BG, HERO, PUSSY } from "./parameters";
import drawImage from "./drawImage";
import gameStop from "./gameStop";

export default function drawRunner() {
	GAME.ctx.clearRect(0, 0, GAME.winWidth, GAME.winHeight);

	// отрисовка фоновых картинок
	for (let i = 0; i < BG.length; i++) {
		// если изображение движется
		if (BG[i].frame) {
			GAME.ctx.drawImage(BG[i].path, BG[i].x, GAME.yPosBg);
			GAME.ctx.drawImage(BG[i].path, BG[i].x2, GAME.yPosBg);

			// parallax
			if (BG[i].speed) {
				BG[i].x -= GAME.speed / BG[i].speed;
				BG[i].x2 -= GAME.speed / BG[i].speed;
			}

			// спрайт фоновых картинок
			if (BG[i].x < -GAME.winWidth) {
				BG[i].x = BG[i].x2 + GAME.winWidth;
			}
			if (BG[i].x2 < -GAME.winWidth) {
				BG[i].x2 = BG[i].x + GAME.winWidth;
			}
		} else {
			GAME.ctx.drawImage(BG[i].path, 0, GAME.yPosBg);
		}
	}

	// отрисовка врагов
	if (!GAME.isGameStopped) {
		for (let i = 0; i < PUSSY.enemy.length; i++) {
			// отрисовка врага
			drawImage(PUSSY.run, PUSSY.enemy[i].x, PUSSY.enemy[i].y);

			// новые координаты для следующей отрисовки
			PUSSY.enemy[i].x -= GAME.speed * PUSSY.enemy[i].distance;

			// ушедший за левый экран враг, респаунится за правым экраном
			if (PUSSY.enemy[i].x + PUSSY.run.width < -40) {
				let key;
				// нужно взять кординату х ушедшего i за левый экран и установть рандомно от последнего не ушедшего за левый экран
				i === 0 ? (key = PUSSY.enemy.length - 1) : (key = i - 1);
				PUSSY.enemy[i].x =
					PUSSY.enemy[key].x + GAME.random([600, 1400]);
				PUSSY.enemy[i].distance = (GAME.random([14, 16]) / 10 + 1) / 2;

				// враги не должны держаться вместе
				if (
					PUSSY.enemy[i].x - PUSSY.enemy[key].x <
					(GAME.speed + 2) * 28 + 80
				) {
					PUSSY.enemy[i].distance = PUSSY.enemy[key].distance;
				}
			}
		}
	} else {
		for (let i = 0; i < PUSSY.enemy.length; i++) {
			if (PUSSY.enemy[i].attack) {
				drawImage(PUSSY.attack, PUSSY.enemy[i].x, PUSSY.enemy[i].y);
			} else {
				drawImage(PUSSY.stop, PUSSY.enemy[i].x, PUSSY.enemy[i].y);
			}
		}
	}

	// Варианты отрисовки главного героя
	if (HERO.event.run) {
		drawImage(HERO.img.run, HERO.position.x, HERO.position.y);
	}
	if (HERO.event.jump) {
		drawImage(HERO.img.jump, HERO.position.x, HERO.position.y);
	}
	if (GAME.isGameStopped) {
		drawImage(HERO.img.hurt, HERO.position.x, HERO.position.y);
	}

	//Увеличение скорости при увеличении счёта
	if (GAME.score - GAME.scoreCounter > 50) {
		GAME.speed += 2;
		GAME.scoreCounter = GAME.score;
	}

	// увеличение скорости игры
	GAME.score += GAME.speed / 100;

	// рекорд в игре
	if (GAME.score > GAME.localRecord) {
		GAME.localRecord = Math.floor(GAME.score);
	}

	// калибровка
	const calibration = 40;

	// столкновение героя и врага
	for (let i = 0; i < PUSSY.enemy.length; i++) {
		// фронтальное столкновение
		if (
			HERO.position.x + HERO.img.run.width - calibration >
			PUSSY.enemy[i].x + calibration
		) {
			// столкновение сверху после прыжка
			if (
				HERO.position.y + HERO.img.run.height >
				PUSSY.enemy[i].y + calibration
			) {
				// столкновение при приземлении, чтобы жопа не отхватила
				if (
					HERO.position.x + calibration * 2 <
					PUSSY.enemy[i].x + PUSSY.run.width - calibration
				) {
					PUSSY.enemy[i].attack = true;
					gameStop();
				}
			}
		}
	}

	// статистика
	GAME.ctx.font = "120px Play";
	GAME.ctx.fillStyle = GAME.scoreColor;
	GAME.ctx.textAlign = "center";
	GAME.ctx.fillText(Math.floor(GAME.score), GAME.winWidth / 2, 100);

	GAME.ctx.font = "25px Play";
	GAME.ctx.textAlign = "left";
	GAME.ctx.fillText(`Рекорд: ${GAME.localStorageRecord}`, 10, 30);

	GAME.requestId = requestAnimationFrame(drawRunner);
}