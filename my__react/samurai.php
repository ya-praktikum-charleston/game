<?php include '../include/header.php'; ?>


<div class="linear" id="use_strict">
       
	<h2>словарь</h2>
	
	<p>Компонента - <i>это функция которая принимает объект props и возвращает jsx разметку</i></p>
	<p>props - <i>это объект</i></p>
	<p>Функция map - <i>это метод массива, для того чтобы преобразовать один массив в другой массив</i></p>
	<p>UI (User Interface) - BLL (Business logic Layer) <i>UI это React, BLL это Redux (где лежат данные и функции которые эти данные будут обрабатывать)</i></p>
	<p>Collback функция - <i>когда отдаём выполнение функции другой функции </i></p>
	<p>reducer - <i>это функция, которя принимает state, action. Если нужно этот action применяет к state и возвращает новый state.</i></p>
	
	
	<h2>Горячии клавиши в phpStorm</h2>
	<p>Импорт alt+enter</p>
	<p>Перейти в файл ctrl+shift+n</p>
	<p>Выделить переменную по всему файлу ctrl+shift+alt+j</p>
	<p>Удалить строку shift+del</p>
	<p>Когда пишем import ... from '../' можем подсмотреть что лежит в папке ctrl+пробел</p>
	<p>В консоли разработчика найти файл: source - ctrl+p</p>
	<p></p>

</div>


<div class="linear" id="use_strict">
       
	<h2>04. Уроки React JS (create-react-app)</h2>
	
	<pre class="brush: js;">
		// устанавливаем ноду с сайта
		
		// устанавливаем реакт
		// создаем папку для проекта, открываем консоль, заходим в нее и...
		npx create-react-app my-app
		cd my-app
		npm start
	</pre>


</div>

<div class="linear" id="use_strict">
       
	<h2>08. Уроки React JS (import_export - теория)</h2>
	
	<pre class="brush: js;">
		// подключение модулей
		import dataFile from './file';
		import dataFile from './../file';
		import dataFile from './../folder/file';
	</pre>


</div>

<div class="linear" id="use_strict">
       
	<h2>14. Уроки React JS (css-модули, css-modules)</h2>
	
	<pre class="brush: js;">
		// подключение стилей
		// Для инкапсуляции стилей добавляем к названию css файла .module и подключаем его
		import classes from './Header.module.css';					// название classes можем задать любое
	</pre>

	<pre class="brush: html;">
		// стили теперь в классе, достаем стили из класса
		<header className={classes.header}></header>
		
		
		// добавление сразу двух классов
		<div className={`${classes.elem} ${classes.active}`}><a href="">Profile</a></div>
	</pre>
</div>



<div class="linear" id="use_strict">
       
	<h2>19. Уроки React JS (route, browser-router, маршрутизация) - react курсы бесплатн</h2>
	
	<pre class="brush: js;">
		// установка модуля router
		npm install react-router-dom -save				// -save сделай запись в package.json
		
		
		// в файле app.js подключаем роутер
		import {BrowserRouter, Route} from 'react-router-dom';
		
		
		// оборачиваем содержимое render в app.js в BrowserRouter и прописываем страницы в Route
		<BrowserRouter>
			<Route path="/dialogs" component={Dialogs}/>			// path это ссылка на страницу
			<Route path="/profile" component={Profile}/>
		</ BrowserRouter>
		
		
		
		// в файле Nav
		import {NavLink} from "react-router-dom";
		
		
		<NavLink to="/profile" activeClassName={s.active}>Profile</NavLink>
	</pre>
	
</div>

<div class="linear" id="use_strict">
       
	<h2>31. Уроки React JS - onClick, ref, VirtualDOM</h2>

	<pre class="brush: js;">
		// Создайм ссылку на элемент
		let newReactElement = React.createRef();

		let addPost = () => {
			let txt = newReactElement.current.value;		// current ссылается на нативный html элемент
			alert( txt );
		}

		return (
			<div>
				<textarea ref={newReactElement}></textarea>
				<button onClick={ addPost }>Add post</button>
			</div>
		)

	</pre>

</div>
	
	
<div class="linear" id="use_strict">
       
	<h2>35. Уроки, Курс React JS - callback, subscribe, observer</h2>

	<p>Как замкнуть самописный Redux.</p>
	
	<pre class="brush: js;">
		// index.js
		import state, {addPost, subscribe} from "./redux/state";

		let rerenderEntireTree = (state) => {
			ReactDOM.render(
				<BrowserRouter>
					<App state={state} addPost={addPost} />
				</BrowserRouter>, document.getElementById('root')
			);
		}

		rerenderEntireTree(state);
		subscribe(rerenderEntireTree);					// по сути эта функция наблюдатель			
		
		
		// state.js
		let rerenderEntireTree = () => {}				// создаём функцию
		
		export const subscribe = (observer) => {
			rerenderEntireTree = observer;				// перезаписываем эту функцию на ReactDOM.render и возвращаем
		}												
		
		// в дальнейшем, если что то в изменится в state, просто вызываем rerenderEntireTree(state);
	</pre>

</div>


<div class="linear" id="use_strict">
       
	<h2>45 - React JS практика - connect, mapStateToProps, mapDispatchToProps</h2>

	<pre class="brush: js;">
		// устанавливаем redux-redux
		npm install --save react-redux
	</pre>

</div>
	
<div class="linear" id="use_strict">
       
	<h2>51 - React JS практика - Users API</h2>

	<pre class="brush: js;">
		// устанавливаем библиотеку axios
		npm install axios
		
		
		// импортируем
		import * as axios from "axios";
	</pre>

</div>

<div class="linear" id="use_strict">
       
	<h2>60 - React JS - withRouter, props.match.params</h2>

	<p>Передача URL данных<p/>
	
	<pre class="brush: js;">
		// подключаем withRouter, передача данных в строке
		import {withRouter} from "react-router-dom";
		
		// connect оборачиваем в withRouter
		let WithUrlDataContainerComponent = withRouter(ProfileContainer);

		export default connect(mapStateToProps, {setUserProfile})(WithUrlDataContainerComponent);
		
		
		
		// в роуте через двоеточие передаём параметр, ? означает что параметр может быть, может не быть
		&lt;Route path='/profile/:userId?' /&gt;
	</pre>

</div>

<div class="linear" id="use_strict">
       
	<h2>66 - React JS - урок redux-thunk в деталях (практика)</h2>

	<pre class="brush: js;">
		// инсталируем thunk
		npm i redux-thunk
		
		// в redux-store
		import thunkMiddleWare from "redux-thunk";
		
		// и
		let store = createStore(reducers, applyMiddleware(thunkMiddleWare));
		
		
		// в файле user-reduser пишем функцию щамыкание
		export const getUsers = (currentPage, pageSize) => {
			return (dispatch) => {
				dispatch(toggleIsFetching(true));
				usersAPI.getUsers(currentPage, pageSize).then(data => {
					dispatch(toggleIsFetching(false));
					dispatch(setUsers(data.items));
					dispatch(setTotalUsersCount(data.totalCount));
				});
			}
		}
	</pre>

</div>
	
<div class="linear" id="use_strict">
   
	<h2>68 - React JS - Redirect</h2>

	<pre class="brush: js;">
		// делаем страницу логина
		//прокидываем из redux пропс, где записано состояние авторизации и пишем условие для редиректа
		import {Redirect} from "react-router-dom";
		if (!props.isAuth) return <Redirect to={"/login"} /> ;
	</pre>

</div>


<div class="linear" id="use_strict">
   
	<h2>70 - React JS - функция compose</h2>

	<pre class="brush: js;">
		// масштабное замыкание по очереди
		
		import {compose} from "redux";
		
		export default compose(
			connect(mapStateToProps, mapDispatchToProps),
			withAuthRedirect
		)(Dialogs);
	</pre>
	
	<p><code>Dialogs</code> вшладывается в <code>withAuthRedirect</code> &#8594; приходит результат и вкладывается в <code>connect(mapStateToProps, mapDispatchToProps)</code></p>

	<pre class="brush: js;">
		// или так
		export default compose(
			withAuthRedirect,
			connect(mapStateToProps,
				{ follow, unfollow, setCurrentPage, toggleFollowingProgress, getUsers })
		)(UsersContainer);
	</pre>
	
</div>

<div class="linear" id="use_strict">
       
	<h2>72 - React JS - обновляем create-react-app</h2>
	<a href="https://create-react-app.dev/docs/updating-to-new-releases/">https://create-react-app.dev/docs/updating-to-new-releases/</a>
	
	<p>Посмотреть текущую версию проекта, можно в package.json строка "react-scripts": "3.4.1"</p>
	
	<pre class="brush: js;">
		// create-react-app
	</pre>

</div>
	
<div class="linear" id="use_strict">
   
	<h2>75 - React JS - redux-form введение (login)</h2>

	<a href="https://redux-form.com/8.3.0/">https://redux-form.com/8.3.0/</a>
	
	<pre class="brush: js;">
		//npm install --save redux-form
		
		// в файле redux-store.js
		import {reducer as formReducer} from 'redux-form';
		
		let reducers = combineReducers({
			form: formReducer
		});
		
		// в файле 
		import {Field, reduxForm} from "redux-form";
		
		// пример в файле 
		const LoginForm = (props) => {
			return (
				<form onSubmit={props.handleSubmit}>
					<div>
						<Field placeholder={"Login"} name={"login"} component={"input"}/>		// Field это компонета которая рисует другую компоненту (component={"input"})
					</div>
					<div>
						<Field placeholder={"Password"} name={"password"} component={"input"}/>
					</div>
					<div>
						<Field component={"input"} name={"rememberMe"} type={"checkbox"}/> remember me
					</div>
					<div>
						<button>Login</button>
					</div>
				</form>
			)
		}

		const LoginReduxForm =  reduxForm({form: 'login'})(LoginForm)		// form: 'login' это имя формы в стейте
		
		// получаем компоненту и вставляем куда хотим
		const Login = (props) => {
			const onSubmit = (formData) => {
				console.log(formData);
			}

			return <div>
				<LoginReduxForm onSubmit={onSubmit} />
			</div>
		}
	</pre>

</div>

<div class="linear" id="use_strict">
       
	<h2>77 - React JS - redux-form field validation (валидация, ошибки). Осторожно Замык</h2>

	<a href="https://redux-form.com/8.3.0/examples/fieldlevelvalidation/">https://redux-form.com/8.3.0/examples/fieldlevelvalidation/</a>
	
	<pre class="brush: js;">

	</pre>

</div>


<div class="linear" id="use_strict">
       
	<h2>83 - React JS - подключаем reselect (reselect часть 3)</h2>

	<pre class="brush: js;">
		// npm install reselect
		
		
		// в файле с селекторами
		import {createSelector} from "reselect";

		const getUsersSelector = (state) => {
			return state.usersPage.users;
		}

		export const getUsers = createSelector(getUsersSelector,
			(users) => {
				return users.filter(u => true);
			})
	</pre>

</div>

<div class="linear" id="use_strict">
       
	<h2>85 - React JS - hook, useEffect, хуки</h2>

	<pre class="brush: js;">
		import React, {useState, useEffect} from 'react';
		
		
		const ProfileStatusWithHooks = (props) => {

			let [editMode, setEditMode] = useState(false);
			let [status, setStatus] = useState(props.status);

			useEffect( () => {					// аналог componentDidUpdate 
				setStatus(props.status);
			}, [props.status] );				// когда изменится глобальный state запусти setStatus

			const activateEditMode = () => {
				setEditMode(true);
			}

			const deactivateEditMode = () => {
				setEditMode(false);
				props.updateStatus(status);
			}

			const onStatusChange = (e) => {
				setStatus(e.currentTarget.value);
			}

			return (
				<div>
					{ !editMode &&
					<div>
						<span onDoubleClick={ activateEditMode }>{props.status || "-------"}</span>
					</div>
					}
					{editMode &&
					<div>
						<input onChange={onStatusChange} autoFocus={true} onBlur={ deactivateEditMode }
							   value={status} />
					</div>
					}
				</div>
			)
		}


		export default ProfileStatusWithHooks;
	</pre>

</div>

<div class="linear" id="use_strict">

    <h2>87 - shouldComponentUpdate, PureComponent, memo - React JS</h2>

    <p>Что-бы не было лишних вызовов жизненного цикла добавляем</p>

    <pre class="brush: js;">
        // для классовых компонентов
        import React from 'react';                             // было
        import React, {PureComponent} from 'react';             // стало

        class HeaderContainer extends React.Component {         // было
        class HeaderContainer extends React.PureComponent {     // стало
    </pre>
    <br>
    <pre class="brush: js;">
        // для функциональных компонентов
        const Header = (props) => {                             // было
        const Header = React.memo(props => {                    // стало и в конце функции добавить скобку
    </pre>
</div>

<div class="linear" id="use_strict">

    <h2>89 - Тесты, jest, tdd, тестируем reducer - React JS</h2>

    <p>Рядом с тестируемым файлом добавляем файл с расширением test, например: <code>app-reducer.test.js</code></p>

    <pre class="brush: js;">
        import appReducer, {addCity, deleteCity, newCity, statusFavoritesBt} from "./app-reducer";
        import React from "react";


        let state = {
            favoritesBt: false,
            cities : [
                {
                    name : 'Новосибирск',
                    id : 1496747
                }
            ],
            newCity: []
        };


        it('number of cities added', () => {
            let action = addCity({name: "Владивосток", id: 2013348});
            let newState = appReducer(state, action);
            expect(newState.cities.length).toBe(2);
        });

        it('number of newCity added', () => {
            let action = newCity({name: "Мурманск", id: 524305});
            let newState = appReducer(state, action);
            expect(newState.cities.length).toBe(1);
        });

        it('number of cities after deletion', () => {
            let action = deleteCity(1496747);
            let newState = appReducer(state, action);
            expect(newState.cities.length).toBe(0);
        });

        it('status favoritesBt', () => {
            let action = statusFavoritesBt(true);
            let newState = appReducer(state, action);
            expect(newState.favoritesBt).toBe(true);
        })
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>91 - chrome extensions для react и redux - React JS</h2>

    <p>Ставим расширения для Chrome <a target="_blank" href="https://chrome.google.com/webstore/detail/react-developer-tools/fmkadmapgofadopljbjfkapdkoienihi?hl=ru">React Developer Tools</a></p>
    <p>Ставим расширения для Chrome <a target="_blank" href="https://chrome.google.com/webstore/detail/redux-devtools/lmhkpmbekcpmknklioeibfkpmmfibljd?hl=ru">Redux DevTools</a></p>

    <p>В консоли появляются вкладки <b><i>Components</i></b> и <b><i>Profiler</i></b>:</p>

    <p>- <b><i>Components</i></b> показывает всё дерево компонентов</p>
    <p>- <b><i>Profiler</i></b> позволяет записывать рендеринги, отслеживать какая компонента сколько рендерилась и по какой причине</p>

    <br>

    <p>Для приложения <b><i>Redux DevTools</i></b> в файле <code>redux-store.js</code> добавляем:</p>

    <pre class="brush: js;">
        import {combineReducers, compose, createStore} from "redux";
        import appReducer from "./app-reducer";

        let reducers = combineReducers({
            appReducer: appReducer,
        });

        // добавляем
        const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
        const store = createStore(reducers,  composeEnhancers());


        window.store = store;
        export default store;
    </pre>
    <br>

    <pre class="brush: js;">
        // если нужен applyMiddleware
        import {applyMiddleware, combineReducers, compose, createStore} from "redux";

        const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
        const store = createStore(reducers,  composeEnhancers(applyMiddleware(thunkMiddleware)));
    </pre>
</div>

<div class="linear" id="use_strict">

    <h2>92 - тестриуем компоненты, react-test-renderer - React JS</h2>

    <p>Читай статью: <a target="_blank" href="https://www.valentinog.com/blog/testing-react/">Testing React Components with react-test-renderer, and the Act API</a></p>

    <p>В файле <code>App.test.js</code> происходит следующее:</p>

    <pre class="brush: js;">
        const div = document.createElement('div');
        ReactDOM.render(&lt;App /&gt;, div); - монтирование компоненты в дивку, просто в память, нигде не отрендерится
        ReactDOM.unmountComponentAtNode(div) - демонтирование компоненты из дивки
    </pre>

    <br>

    <p>Устанавливаем <b><i>npm i react-test-renderer@16.13.0 --save-dev</i></b>.</p>

    <pre class="brush: js;">
        npm i react-test-render --save-dev
        npm i --save-dev enzyme
        npm i --save-dev react-addons-test-utils
        npm i --save-dev react-dom
    </pre>

    <p>Создаём файл для тестирования компоненты, например: <code>CitiesContainer.test.js</code></p>

    <pre class="brush: js;">
        // в нём
        import React from "react";
        import { create } from "react-test-renderer";

        describe("Button component", () => {
            test("Matches the snapshot", () => {
                const button = create(&lt;Button /&gt;);
                expect(button.toJSON()).toMatchSnapshot();
            });
        });
    </pre>

    <p><b><i>describe</i></b> - позволяет обьеденить тесты в одну группу, внутри describe может быть набор тестов</p>
    <p><b><i>create</i></b> - виртуально, фейково создает компоненту, (VirtualDOM, разметка ...)</p>
    <p><b><i>getInstance</i></b> - дай мне экземпляр объекта для взаимодействия</p>
    <p><b><i>component.root.findByType("span")</i></b> - пример поиска span в компоненте созданной через create</p>
    <p><b><i>proto</i></b> - это ссылка на прототип класса с помощью которого создан обьект</p>


</div>



<!--

    <div class="linear" id="use_strict">
       
        <h2>2222222222222222</h2>

        <pre class="brush: js;">

        </pre>

    </div>

	<p></p>
-->



<?php include '../include/footer.php'; ?>
