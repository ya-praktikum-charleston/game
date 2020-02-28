<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">

	<h2>Консоль</h2>
	
	<pre class="brush: js;">
	
		npm install -g create-react-app     // устанавливаем реакт глобально
	
		//1		
		npm install create-react-app	    // устанавливаем реакт в папку с нашим проектом
		
		//2
		npx create-react-app app            // выполнить create-react-app и создать проект (папку) app
		
		//3
		npm install react-router
		npm install react-router-dom
		
		//Заходим в папку проекта (app)
		npm start                           // Запускаем проект
		
		
		//Настройка Firebase Hosting (заливка на хостинг)
		//https://firebase.google.com/
		
		
		npm install -g firebase-tools
		
		//Заходим в папку проекта
		firebase login
		npm run build
		firebase init
			1 Y
			2 пробел Hosting... ентер		(Use an ....)
			3 наша папка build
			4 configurate as... хз, можно N
			5 file build (перезаписать?), N
			6 firebase deploy
		
    </pre>
	
	<br>

	<h3>В процессе работы компонент проходит через ряд этапов жизненного цикла.</h3>
	
	<p><code>constructor(props)</code> конструктор, в котором происходит начальная инициализация компонента</p>

	<p><code>render()</code> рендеринг компонента</p>

	<p><code>componentDidMount()</code> вызывается после рендеринга компонента. Здесь можно выполнять запросы к удаленным ресурсам</p>

	<p><code>componentWillUnmount()</code> вызывается перед удалением компонента из DOM</p>	
	
	<br>
	
	<h3>Кроме этих основных этапов или событий жизненного цикла, также имеется еще ряд функций, которые вызываются при обновлении состояния после рендеринга компонента:</h3>
	
	<p><code>shouldComponentUpdate(nextProps, nextState)</code> вызывается каждый раз при обновлении объекта props или state. В качестве параметра передаются новый объект props и state. Эта функция должна возвращать true (надо делать обновление) или false (игнорировать обновление). По умолчанию возвращается true. Но если функция будет возвращать false, то тем самым мы отключим обновление компонента, а последующие функции не будут срабатывать.</p>
	
	<p><code>componentWillUpdate(nextProps, nextState)</code> вызывается перед обновлением компонента (если shouldComponentUpdate возвращает true)</p>
	
	<p><code>render()</code> рендеринг компонента (если shouldComponentUpdate возвращает true)</p>
	
	<p><code>componentDidUpdate(prevProps, prevState)</code> вызывается сразу после обновления компонента (если shouldComponentUpdate возвращает true). В качестве параметров передаются старые значения объектов props и state.</p>


	<pre class="brush: js;">
			
		// Применим событий жизненного цикла:
		
		componentDidMount(){
			setTimeout( () => {
				this.setState({text: 'Component'})
			},3000)
		}
		
    </pre>
	
	<br>
	
	<p><b>Заменить значение <code>state</code> через <code>props</code></b></p>
    <pre class="brush: js;">
	
		// ReactDOM.render(<App text55="Bu ga ga" />, document.getElementById('root'));
		
		static getDerivedStateFromProps(props, state){
			return { text: props.text55 }
		}
				
    </pre>


	<p><b>Перебор и вывод массива в <code>render()</code></b></p>
    <pre class="brush: js;">
			
		{Object.keys(arr2).map( key => {
                    return <div key={key} className={(arr2[key] === 1) ? 'white' : 'black'}>{arr2[key]}</div>
                })}
				
    </pre>

</div>


<!--

    <div class="linear" id="use_strict">
        <h1>11111111111111111</h1>

        <h2>2222222222222222</h2>


        <p>3333333333333333333</p>

        <pre class="brush: js;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../include/footer.php'; ?>
