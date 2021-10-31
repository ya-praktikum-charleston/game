export const pixelDevice: number = (window.devicePixelRatio > 1) ? 2 : 1;
// стартовая скорость игры
let startSpeed = 0;
let gravity = 0;
let step = 0;
if (pixelDevice <= 1) {
    startSpeed = 6;
    gravity = 0.6;
    step = 0.01;
} else {
    startSpeed = 3;
    gravity = 0.4;
    step = 0.005;
}
export default {
    defaultSpeed: startSpeed,
    speedGame: startSpeed,
    gravity: gravity,
    step: step,
    isPause: true,
    isGameStopped: false,
    isGameStatic: true,
    level: 'level1',
    hero: 'angel1',
};
