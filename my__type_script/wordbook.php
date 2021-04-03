<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
       

	<pre class="brush: js;">
		interface Rect {				// создём интерфейс Rect
            readonly id: string			// readonly значит только для чтения
            color?: string				// ? не обязательный параметр
            size: {
                width: number
                height: number
            }
        }

        const rect1: Rect = {			// указываем тип Rect
            id: ' 1234',
            size: {
                width: 20,
                height: 30
            }
        }

        rect1.color = 'black';


        const rect2 = { } as Rect;				// можем указать тип за фигурной скобкой Rect
        const rect3 = <Rect>{ };				// можем указать тип Rect перед фигурной скобкой



        /*=========================Наследование интерфейсов============================*/

        interface RectWithArea extends Rect { 			// создаём новый интерфейс и наследуемся от Rect
            getArea: () => number						// после : указываем тип стрелочная функция и какой тип возвращаем
        }

        const Rect4: RectWithArea = {
            id: ' 123',
            size: {
                width: 20,
                height: 30
            },
            getArea(): number {
                return  this.size.width * this.size.height;
            }
        }

        /*=========================Взаимодействие интерфейсов с классами============================*/

        interface IClock {
            time: Date,
            setTime(date: Date): void
        }

        class Clock implements IClock {				// class Clock имплементируется от IClock
            time: Date = new Date();
            setTime(date: Date): void {
                this.time = date;
            }
        }


        /*=========================Создание интерфейса с большим колличеством динамических ключей============================*/

        interface Styles {
            [key: string]: string				// тип записи string, а значение string
        }

        const css = {
            border: '1px solid #000',			// записей может быть сколько угодно
            marginTop: '2px'
        }


        /*=========================emum============================*/

        enum Member {
            Simple,
            Standart,
            Premium
        }

        const membership = Member.Standart;
        console.log(membership)			// 1

        const membershipreverse = Member[2];
        console.log(membershipreverse)			// Premium


        enum SocialMedia {
            VK = 'VKONTAKTE',
            FB = 'FACEBOOK',
            INST = 'INSTAGRAM',
        }

        const sicial = SocialMedia.INST;
        console.log(sicial)			// INSTAGRAM


        /*=========================Функции============================*/

        function add(a: number, b: number): number {			// функция возвращает число, поэтомму тип number
            return a + b;
        }

        function toUpperCase(str: string): string {
            return str.trim().toUpperCase();
        }

        /*перегруженные функции*/

        interface MyPosition {
            x: number | undefined,
            y: number | undefined,
        }

        interface MyPositionWidth extends MyPosition{
            default: string
        }

        function position():MyPosition
        function position(a: number):MyPositionWidth
        function position(a: number, b: number):MyPosition

        function position(a?: number, b?: number){
            if(!a && !b){
                return {x: undefined, y: undefined}
            }
            if(a && !b){
                return {x: a, y: undefined, default: a.toString()}
            }
            return {x: a, y: b}
        }

        console.log('Entry', position());							// {x: undefined, y: undefined}
        console.log('One param', position(42));						// {x: 42, y: undefined, default: '42'}
        console.log('Two param', position(10, 15));					// {x: 10, y: 15}



        /*=========================Классы============================*/

        class typeScript {
            val: string

            constructor(val: string){
                this.val = val;
            }

            info(name:string){
                return `[${name}]: TypeScript val is ${this.val}`;
            }

        }

        class Car {
            readonly model: string;
            readonly nomer: number = 4;			// 4 значение по умолчанию

            constructor(theModel: string){
                this.model = theModel;
            }
        }

        class Car2 {			// короткая запись
            readonly nomer: number = 4;
            constructor(readonly model: string){}
        }

        /*=========================Модификаторы============================*/

        class Animal {
            protected voice: string = '';
            public color: string = 'black';			// если не указываем модификатор по умолчанию, то он будет public
            private go(){
                console.log('Go');
            }
        }

        class Cat extends Animal{
            public setVoice(voice: string):void {
                this.voice = voice;
            }
        }

        const cat = new Cat();

	</pre>



</div>






	<!--<div class="linear" id="use_strict">
       
        <p></p>

        <pre class="brush: js;">
            "use strict";

            // этот код работает в современном режиме
            ...
        </pre>


      

    </div>