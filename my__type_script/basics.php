<?php include '../include/header.php'; ?>


    <div class="linear" id="use_strict">
       
        <p>Создаём новое приложение на TypeScript</p>
        <p><code>npx create-react-app test_weather --template typescript</code></p>

		<p>Явное присвавание типа</p>
        <pre class="brush: js;">
           let a: string = "a";
		   a = "b";
		   
		   // можно указть тип по первому присваиванию
		   let blabla;
		   blabla = 10;
		   
		   let a: number | null = "a";
		   let a: boolean | null = "a";
		   
		   let a: Array<string> = ["a","b","c"];
		   let a: string[] = ["a","b","c"];				// второй вариант объявления массива
		   
		   // варианты значений
		   let a: "male" | "female";
		   a = "male";
		   

		   // при объявлении функции, параметрам указываем тип
		   let summ = (a: number, b: number) => {
			   return a + b;
		   }
		   summ(1, 2);
		   summ(1, Number('2'));	// или так
		   
		   
		   // если я не знаю какой будет тип, можно указать any
		    let summ = (a: any, b: any) => {
			   return a + b;
		   }
		    summ(1, 'abcd');
			
			
			
			// объекты
		    type UserType = {
			   sayHello: Function
			   name: string
			   age: number
			   boba: boolean
			   doda: null
			   adress: AdressType | null
		   }
		   type AdressType {
			   city: string
			   country?: string				// ? означает необязательный параметр
		   }
		   let user: UserType = {
			   sayHello(message: string) {alert('yo')}
			   sayHello2: (message: string) => void			// void ни чего не возвращает
			   name: "vit"
			   age: 32
			   boba: true
			   doda: null
			   adress: AdressType {
				   city: "nsk"
			   }
		   }
		   // написав user, можем посмотреть что есть в массиве зажав - ctrl+пробел 
		   
		   // можно указть автоматическую генерацию типа
		   export type usertype = tepeof user;
		   
		   //например state можно указать так:
		   let user = {
			   sayHello: Function
			   name: null as string | null		// по умолчанию null но воспринимай как string
			   age: null as number | null
			   boba: null as boolean | null
			   doda: null as string | null
			   adress: {
				   city: null
			   } as AdressType
			   counter: 0
			   addResses: [] as Array<AdressType>
		   }
		   
		   
		   
		   // создание экшена
		   let GET_TASKS = "APP/GET_TASKS";
		   type GetTasksActiontype = {
			   id: number,
			   type: typeof GET_TASKS
		   } 
		   let action = {
			   type: GET_TASKS,
			   id: 12
		   }
        </pre>



    <div class="linear" id="use_strict">
       
        <h2></h2>

        <pre class="brush: js;">
            // подключение TypeScript к текущему проекту
			npm install --save typescript @types/node @types/react @types/react-dom @types/jest
			npm install --save-dev typescript-eslint-parser
        </pre>


      

    </div>
	
	
	
	
	<p></p>
        <pre class="brush: js;">
           // 
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