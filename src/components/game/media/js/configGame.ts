export const pixelDevice: number = window.devicePixelRatio;
// стартовая скорость игры
let startSpeed = 0;
let gravity = 0;
let step = 0;
if (pixelDevice <= 1) {
    console.log(pixelDevice, '123')
    startSpeed = 5;
    gravity = 0.5;
    step = 0.01;
} else {
    console.log(pixelDevice, 'hjhf')
    startSpeed = 4;
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
