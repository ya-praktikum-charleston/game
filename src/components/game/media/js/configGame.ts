export const pixelDevice: number = (window.devicePixelRatio > 1) ? 2 : 1;
// стартовая скорость игры
const startSpeed: number = 8 / pixelDevice;

export default {
    defaultSpeed: 3 * pixelDevice * 0.67,
    speedGame: 3 * pixelDevice * 0.67,
    gravity: 0.4,
    isPause: true,
    isGameStopped: false,
    isGameStatic: true,
    level: 'level1',
    hero: 'angel1',
};
