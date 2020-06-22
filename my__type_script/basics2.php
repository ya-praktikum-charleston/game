<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
       
	<p></p>

	<pre class="brush: js;">
		// установка TypeScript глобально на комп
		npm install -g typescript
	</pre>

	<h2>Интерфейсы</h2>

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
	</pre>

</div>
	
	
<div class="linear" id="use_strict">
       
	<h2>Наследование интерфейсов</h2>

	<pre class="brush: js;">
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
	</pre>

	
	<h2>Взаимодействие интерфейсов с классами</h2>

	<pre class="brush: js;">
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
	</pre>
	
	
	<h2>Создание интерфейса с большим колличеством динамических ключей</h2>

	<pre class="brush: js;">
       interface Styles {
			[key: string]: string				// тип записи string, а значение string
		}

		const css = {
			border: '1px solid #000',			// записей может быть сколько угодно
			marginTop: '2px'
		}
	</pre>
	
	
	
</div>



<div class="linear" id="use_strict">
       
	<h2>emum</h2>
	<p>Позволяет лучше структурировать код если присутсьруют какие то однотипные элементы</p>

	<pre class="brush: js;">
		enum Member {
			Simple,
			Standart,
			Premium
		}

		const membership = Member.Standart;
		console.log(membership)			// 1

		const membershipreverse = Member[2];
		console.log(membershipreverse)			// Premium
	</pre>


	<p>Пример</p>
	<pre class="brush: js;">
		enum SocialMedia {
			VK = 'VKONTAKTE',
			FB = 'FACEBOOK',
			INST = 'INSTAGRAM',
		}

		const sicial = SocialMedia.INST;
		console.log(sicial)			// INSTAGRAM
	</pre>

</div>



<div class="linear" id="use_strict">
       
	<h2>Функции</h2>

	<pre class="brush: js;">
		function add(a: number, b: number): number {			// функция возвращает число, поэтомму тип number
			return a + b;
		}

		function toUpperCase(str: string): string {			
			return str.trim().toUpperCase();
		}
	</pre>

	<p>перегруженные функции</p>
	
	<pre class="brush: js;">
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
	</pre>

</div>


<div class="linear" id="use_strict">
       
	<h2>Классы</h2>

	<pre class="brush: js;">
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
	</pre>

</div>


<div class="linear" id="use_strict">
       
	<h2>Модификаторы</h2>
	<p>Бывают три вида модификаторов: protected, public,prived</p>
	<pre class="brush: js;">
		
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