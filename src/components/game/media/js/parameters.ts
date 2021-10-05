/* eslint-disable camelcase */
import {
    // фоновые картинки
    l1_sky,
    l2_clouds,
    l3_pyramid,
    l4_bg_ground01,
    l5_bg_ground02,
    l6_bg_ground03,
    l7_ground,
    // главный герой
    Angels,
    Angels_Jump,
    Angels_Hurt,
    Angels_Stand,
    // враги
    Pussy,
    PussyAttack,
    PussyStop,
    // аудио файлы
    Jump,
    Death,
    theme1,
} from './assetsLinks';
import {
    Game,
    Background,
    Hero,
    TypePussy,
} from './types';
import { loadStaticImage, loadSpriteImage } from './loadImages';
import loadAudio from './loadAudio';
// import drawRunner from './drawRunner';

const { clientWidth, clientHeight } = document.body;
const spriteHeight = 120;
// соотношение разрешения дисплея текущего устройства
export const pixelDevice: number = (window.devicePixelRatio > 1) ? 2: 1;
// стартовая скорость игры
const startSpeed: number = 8 / pixelDevice;

// настройки игры и canvas
export const GAME: Game = {
    ctx: null,
    winWidth: clientWidth,
    winHeight: clientHeight,
    // координа на которой расположены персонажы
    y_positionLine: clientHeight - 220 - spriteHeight,
    // сколько всего картинок
    allCount: 14,
    // сколько загрузилось
    loadCount: 0,
    // выравнивание картинок исходя из пропорций экрана
    yPosBg: clientHeight <= 1080 ? clientHeight - 1080 : 1080 - clientHeight,
    // скорость игры
    speed: startSpeed,
    // балансная переменная для увеличения скорости игры
    scoreCounter: 0,
    // счёт в игре
    score: 0,
    // цвет счёта в игре
    scoreColor: '#000000',
    // игра остановлена
    isGameStopped: false,
    // рекорд игры из localStorage
    localStorageRecord: 0,
    // рекодр набирающий значения в процессе игры
    localRecord: 0,
    // разрешает воспроизведение аудио файлов
    audioPlayed: true,
    // html элементы dom
    dom: {},
    // расстояние между врагами выставляется рандомно
    random: (range) => {
        const min = range[0];
        const max = range[1];
        const rand = min + Math.random() * (max + 1 - min);
        return Math.floor(rand);
    },
    // используется для остановки requestAnimationFrame
    requestId: 0,
};

// фоновые картинки
export const BG: Background[] = [
    {
        path: loadStaticImage(l1_sky, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l2_clouds, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l3_pyramid, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l4_bg_ground01, GAME),
        x: 0,
        x2: clientWidth,
        speed: 40,
    },
    {
        path: loadStaticImage(l5_bg_ground02, GAME),
        x: 0,
        x2: clientWidth,
        speed: 20,
    },
    {
        path: loadStaticImage(l6_bg_ground03, GAME),
        x: 0,
        x2: clientWidth,
        speed: 10,
    },
    {
        path: loadStaticImage(l7_ground, GAME),
        x: 0,
        x2: clientWidth,
        speed: 1,
    },
];

// главный герой
export const HERO: Hero = {
    img: {
        run: loadSpriteImage(Angels, 128.58333, 150, 12, 1, GAME),
        jump: loadSpriteImage(Angels_Jump, 128.5, 150, 6, 1, GAME),
        hurt: loadSpriteImage(Angels_Hurt, 129, 150, 1, 1, GAME),
        stand: loadSpriteImage(Angels_Stand, 128.5555555555556, 150, 18, 5, GAME),
    },
    position: {
        x: 65,
        y: GAME.y_positionLine,
    },
    event: {
        run: false,
        jump: false,
    },
};

// пиздюки
const pussyDistance = [[640, 1300], [1400, 2060], [2160, 2920]];

export const PUSSY: TypePussy = {
    run: loadSpriteImage(Pussy, 128.58333, 150, 12, 6, GAME),
    attack: loadSpriteImage(PussyAttack, 182, 150, 1, 1, GAME),
    stop: loadSpriteImage(PussyStop, 129, 150, 1, 1, GAME),
    enemy: [
        {
            x: 1280 + GAME.random(pussyDistance[0]),
            y: GAME.y_positionLine,
            distance: GAME.random([14, 15]) / 10,
            attack: false,
        },
        {
            x: 1280 + GAME.random(pussyDistance[1]),
            y: GAME.y_positionLine,
            distance: GAME.random([14, 15]) / 10,
            attack: false,
        },
        {
            x: 1280 + GAME.random(pussyDistance[2]),
            y: GAME.y_positionLine,
            distance: GAME.random([14, 15]) / 10,
            attack: false,
        },
    ],
};

// аудио файлы
export const AUDIO = {
    Jump: loadAudio([Jump], 0.4),
    Dead: loadAudio([Death], 0.1),
    Theme1: loadAudio([theme1], 0.4),
};

// проверка localStorage на наличия рекорда в игре
if (localStorage.getItem('localStorageRecord')) {
    GAME.localStorageRecord = Number(localStorage.getItem('localStorageRecord')) || 0;
}

export function restart(): void {
    window.cancelAnimationFrame(GAME.requestId);

    GAME.y_positionLine = clientHeight - 220 - 120;
    GAME.yPosBg = clientHeight <= 1080 ? clientHeight - 1080 : 1080 - clientHeight;
    GAME.speed = startSpeed;
    GAME.scoreCounter = 0;
    GAME.score = 0;
    GAME.isGameStopped = false;
    GAME.localStorageRecord = Number(localStorage.getItem('localStorageRecord')) || 0;
    GAME.localRecord = 0;
    GAME.audioPlayed = true;

    // сброс BG
    for (let i = 0; i < BG.length; i += 1) {
        BG[i].x = 0;
        BG[i].x2 = GAME.winWidth;
    }
    // сброс PUSSY
    for (let i = 0; i < PUSSY.enemy.length; i += 1) {
        PUSSY.enemy[i].x = 1280 + GAME.random(pussyDistance[i]);
        PUSSY.enemy[i].y = GAME.y_positionLine;
        PUSSY.enemy[i].distance = GAME.random([14, 15]) / 10;
        PUSSY.enemy[i].attack = false;
    }

    // сброс HERO
    HERO.position.x = 65;
    HERO.position.y = GAME.y_positionLine;
    HERO.event.run = true;
    HERO.event.jump = false;

    GAME.dom.gameBanner.current?.classList.add('hidden');
}