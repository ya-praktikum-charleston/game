/* eslint-disable camelcase */
import {
    // фоновые картинки
    /* level1 */
    l1_sky,
    l2_clouds,
    l3_pyramid,
    l4_bg_ground01,
    l5_bg_ground02,
    l6_bg_ground03,
    l7_ground,
    /* level2 */
    l2_l1_sky,
    l2_l3_clouds,
    l2_l2_mountains,
    l2_l4_bg_ground01,
    l2_l5_bg_ground02,
    l2_l6_ground,
    /* levels3 */
    l3_l1_wall,
    l3_l2_prop01,
    l3_l3_prop02,
    l3_l4_stones,
    l3_l5_crystals,
    l3_l6_ground,
    /* levels4 */
    l4_l1_sky,
    l4_l2_stars,
    l4_l4_clouds02,
    l4_l5_mountains,
    l4_l6_ground01,
    l4_l7_ground02,
    l4_l8_ground,
    // главный герой

    HeroRun,
    HeroJump,
    HeroStand,
    HeroDeath,

    // враги
    Pussy_all,
    Pussy_attack_all,

    // аудио файлы
    Jump,
    Death,
    theme1,
    theme4,
    themeNight,
    themeEpick,
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
const spriteHeight = 150;
// соотношение разрешения дисплея текущего устройства
export const pixelDevice: number = (window.devicePixelRatio > 1) ? 2 : 1;
// стартовая скорость игры
const startSpeed: number = 8 / pixelDevice;

// настройки игры и canvas
export const GAME: Game = {
    ctx: null,
    winWidth: clientWidth,
    winHeight: clientHeight,
    // координа на которой расположены персонажы
    y_positionLine: clientHeight - 220 - spriteHeight,
    // наименование Героя
    heroName: 'angel1',
    // наименование уровня
    level: 'level1',
    // сколько всего картинок
    allCount: 33,
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
const level1: Background[] = [
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

const level2: Background[] = [
    {
        path: loadStaticImage(l2_l1_sky, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l2_l3_clouds, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l2_l2_mountains, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l2_l4_bg_ground01, GAME),
        x: 0,
        x2: clientWidth,
        speed: 40,
    },
    {
        path: loadStaticImage(l2_l5_bg_ground02, GAME),
        x: 0,
        x2: clientWidth,
        speed: 20,
    },
    {
        path: loadStaticImage(l2_l6_ground, GAME),
        x: 0,
        x2: clientWidth,
        speed: 1,
    },
];

const level3: Background[] = [
    {
        path: loadStaticImage(l3_l1_wall, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l3_l2_prop01, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l3_l3_prop02, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l3_l4_stones, GAME),
        x: 0,
        x2: clientWidth,
        speed: 20,
    },
    {
        path: loadStaticImage(l3_l5_crystals, GAME),
        x: 0,
        x2: clientWidth,
        speed: 10,
    },
    {
        path: loadStaticImage(l3_l6_ground, GAME),
        x: 0,
        x2: clientWidth,
        speed: 1,
    },
];

const level4: Background[] = [
    {
        path: loadStaticImage(l4_l1_sky, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l4_l2_stars, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l4_l4_clouds02, GAME),
        x: 0,
        x2: 0,
        speed: 0,
    },
    {
        path: loadStaticImage(l4_l5_mountains, GAME),
        x: 0,
        x2: clientWidth,
        speed: 40,
    },
    {
        path: loadStaticImage(l4_l6_ground01, GAME),
        x: 0,
        x2: clientWidth,
        speed: 20,
    },
    {
        path: loadStaticImage(l4_l7_ground02, GAME),
        x: 0,
        x2: clientWidth,
        speed: 10,
    },
    {
        path: loadStaticImage(l4_l8_ground, GAME),
        x: 0,
        x2: clientWidth,
        speed: 1,
    },
];

export const BG = { level1, level2, level3, level4 };

export const HERO: Hero = {
    img: {
        run: loadSpriteImage(HeroRun, 200, 200, 12, 1, GAME),
        jump: loadSpriteImage(HeroJump, 200, 200, 12, 1, GAME),
        hurt: loadSpriteImage(HeroDeath, 200, 200, 1, 1, GAME),
        stand: loadSpriteImage(HeroStand, 200, 200, 18, 1, GAME),
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
    run: loadSpriteImage(Pussy_all, 200, 200, 12, 4, GAME),
    attack: loadSpriteImage(Pussy_attack_all, 200, 200, 1, 1, GAME),
    stop: loadSpriteImage(Pussy_attack_all, 200, 200, 1, 1, GAME),
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
const selectAudioLevel = () => {
    switch (GAME.level) {
        case 'level1':
            return theme1;
        case 'level2':
            return themeNight;
        case 'level3':
            return themeEpick;
        case 'level4':
            return theme4;
        default:
            return theme1;
    }
};
export const AUDIO = {
    Jump: loadAudio([Jump], 0.4),
    Dead: loadAudio([Death], 0.1),
    Theme1: loadAudio(() => selectAudioLevel(), 0.1),
};

// проверка localStorage на наличия рекорда в игре
if (localStorage.getItem('localStorageRecord')) {
    GAME.localStorageRecord = Number(localStorage.getItem('localStorageRecord')) || 0;
}

export function restart(): void {
    window.cancelAnimationFrame(GAME.requestId);

    GAME.y_positionLine = clientHeight - 220 - spriteHeight;
    GAME.yPosBg = clientHeight <= 1080 ? clientHeight - 1080 : 1080 - clientHeight;
    GAME.speed = startSpeed;
    GAME.scoreCounter = 0;
    GAME.score = 0;
    GAME.isGameStopped = false;
    GAME.localStorageRecord = Number(localStorage.getItem('localStorageRecord')) || 0;
    GAME.localRecord = 0;
    GAME.audioPlayed = true;

    // сброс BG
    const { level } = GAME;
    const _bg = BG[level];
    for (let i = 0; i < _bg.length; i += 1) {
        _bg[i].x = 0;
        _bg[i].x2 = GAME.winWidth;
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
