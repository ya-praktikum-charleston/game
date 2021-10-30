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
    Pussy_level1,
    Pussy_level2,
    Pussy_level3,
    Pussy_level4,
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
import { displayText, gameStop } from './utils';
import { loadStaticImage, loadSpriteImage } from './loadImages';
import loadAudio from './loadAudio';
import { Hero as Heero } from './hero';
import { Enemy } from './enemy';
import { Level } from './level';
// import drawRunner from './drawRunner';

const { clientWidth, clientHeight } = document.body;
const spriteHeight = 200;
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
    allCount: 34,
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
    setLeaderboard: () => null,
};

const randomRange = (min, max) => {
    const rand = min + Math.random() * (max + 1 - min);
    return Math.floor(rand);
};

export const g = {
    speed: 3,
};
export class GAME2 {
    score: number;

    highscore: number;

    hero: Heero;

    gravity: number;

    obstacles: never[];

    gameSpeed: number;

    keys: {};

    canvas: HTMLCanvasElement;

    ctx: CanvasRenderingContext2D | null;

    constructor(canvas: HTMLCanvasElement, pause) {
        this.canvas = canvas;
        this.ctx = null;
        this.dom = undefined;
        this.audioPlayed = true;
        this.score = 0;
        this.localRecord = 0;
        this.localStorageRecord = 0;
        this.gravity = 0.3;
        this.pause = pause;
        this.speed = 3;
        this.isGameStopped = false;
        this.hero = undefined;
        this.enemiesList = [];
        this.skinEnemies = [];
        this.gameSpeed = 0;
        this.level = undefined;
        this.initialSpawnTimer = 200;
        this.spawnTimer = this.initialSpawnTimer;
        this.keys = {};
        this.loadingSprite = {
            countSprites: 4,
            loadCount: 0,
        };
        this.countSprites = 4;
        this.countLoadedSprites = 0;
        this.setLeaderboard = () => null;
        debugger
    }

    Start(): void {
        this.ctx = this.canvas.getContext('2d');
        this.level = new Level(0, 0, this.speed, this.canvas, this.ctx, this.loadingSprite);
        this.hero = new Heero(this.canvas, this.ctx, this.gravity, this.speed);
        this.Preloader();
        this.level.init();
        this.EventListener();
        this.Update();
        if (localStorage.getItem('localStorageRecord')) {
            this.localStorageRecord = Number(localStorage.getItem('localStorageRecord')) || 0;
        }
        //if (this.loadingSprite.loadCount === this.loadingSprite.countSprites) {
        console.log('ctx', this.ctx)
        //}
    }

    Update() {
        this.ctx?.clearRect(0, 0, this.canvas.width, this.canvas.height);
        if (this.pause) {
            this.speed = 0;
            this.level.pause = true;
            this.hero.speed = 0;
        } else {
            this.level.pause = false;
        }
        this.level.update();
        this.score += this.speed / 100;
        if (this.score > this.localRecord) {
            this.localRecord = Math.floor(this.score);
        }

        this.spawnTimer--;
        if (this.spawnTimer <= 0) {
            this.createEnemies(this.skinEnemies[1]);
            this.spawnTimer = this.initialSpawnTimer - this.speed * 8;

            if (this.spawnTimer < 60) {
                this.spawnTimer = 60;
            }
        }

        for (let i = 0; i < this.enemiesList.length; i++) {
            let enemy = this.enemiesList[i];
            if (enemy.x + enemy.w < 0) {
                this.enemiesList.splice(i, 1);
            }
            if (
                this.hero.x < enemy.x + enemy.w - 80 &&
                this.hero.x + this.hero.w - 80 > enemy.x &&
                this.hero.y < enemy.y + enemy.h &&
                this.hero.y + this.hero.h > enemy.y + 35
            ) {
                this.enemiesList = [];
                //this.score = 0;
                this.spawnTimer = this.initialSpawnTimer;
                this.speed = 3;
                this.isGameStopped = true;
                //gameStop();
                //window.localStorage.setItem('highscore', highscore);
            }
            enemy.Move();
        }

        if (this.hero) {
            this.hero.Move();
        }
        this.speed += 0.0005;

        displayText(this.ctx, this.score, this.localStorageRecord);


        if (!this.isGameStopped) {
            requestAnimationFrame(() => this.Update());
        }
    }

    EventListener(): void {
        const handlerKeypressDown = (event: { keyCode: number; }) => {
            if (event.keyCode === 32) {
                this.hero.actions.jump = !this.pause && true;
            }
        };
        const handlerKeypressUp = (event: { keyCode: number; }) => {
            if (event.keyCode === 32) {
                this.hero.actions.jump = false;
            }
        };
        const handlerMouseDown = () => {
            this.hero.actions.jump = !this.pause && true;
        };
        const handlerMouseUp = () => {
            this.hero.actions.jump = false;
        };
        document.addEventListener('mousedown', handlerMouseDown);
        document.addEventListener('mouseup', handlerMouseUp);
        document.addEventListener('keydown', handlerKeypressDown);
        document.addEventListener('keyup', handlerKeypressUp);
    }

    Preloader() {
        this.hero.skins.stand = loadSpriteImage(HeroStand, 200, 200, 18, 1, this.loadingSprite);
        this.hero.skins.run = loadSpriteImage(HeroRun, 200, 200, 12, 1, this.loadingSprite);
        this.hero.skins.jump = loadSpriteImage(HeroJump, 200, 200, 12, 1, this.loadingSprite);
        this.hero.skins.hurt = loadSpriteImage(HeroDeath, 200, 200, 1, 1, this.loadingSprite);
        this.skinEnemies[0] = loadSpriteImage(Pussy_level1, 200, 200, 18, 1, this.loadingSprite);
        this.skinEnemies[1] = loadSpriteImage(Pussy_level2, 200, 200, 12, 1, this.loadingSprite);
        this.skinEnemies[2] = loadSpriteImage(Pussy_level3, 200, 200, 12, 1, this.loadingSprite);
        this.skinEnemies[3] = loadSpriteImage(Pussy_level4, 200, 200, 12, 1, this.loadingSprite);

        this.level.preloader();
    }

    loadedSprite() {
        this.countLoadedSprites += 1;
    }

    restart() {
        this.enemiesList = [];
        this.score = 0;
        this.spawnTimer = this.initialSpawnTimer;
        this.speed = 3;
        this.isGameStopped = false;
    }
    gameStopp() {
        //this.enemiesList = [];
        //this.score = 0;
        //this.spawnTimer = this.initialSpawnTimer;
        //this.speed = 3;
        this.isGameStopped = true;
    }
    createEnemies(skin) {
        let size = randomRange(250, 450);
        let typeSkin = randomRange(0, 2);
        const skinEnemy = Object.assign({}, skin);

        let obstacle = new Enemy(
            this.canvas.width + size,
            this.canvas.height - 200 * 1.5,
            this.speed, this.canvas, this.ctx, skinEnemy, typeSkin);
        this.enemiesList.push(obstacle);
    }
}

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
    //for (let i = 0; i < PUSSY.enemy.length; i += 1) {
    //    PUSSY.enemy[i].x = 1280 + GAME.random(pussyDistance[i]);
    //    PUSSY.enemy[i].y = GAME.y_positionLine;
    //    PUSSY.enemy[i].distance = GAME.random([14, 15]) / 10;
    //    PUSSY.enemy[i].attack = false;
    //}

    // сброс HERO
    //HERO.position.x = 65;
    //HERO.position.y = GAME.y_positionLine;
    //HERO.event.run = true;
    //HERO.event.jump = false;

    GAME.dom.gameBanner.current?.classList.add('hidden');
}
