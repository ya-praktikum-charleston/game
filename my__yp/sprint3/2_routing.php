<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Роутинг</h2>



    <p><b>Задача 1: Route</b></p>

    <p>Блок <code>Route</code> получает в качестве аргументов путь, соответствующий ему блок и его свойства. Чтобы <code>Route</code> управлял отображением блока по URL, допишите три метода:</p>

    <ul class="marker">
        <li><code>navigate</code> — метод для отображения вьюшки, если переданный URL совпадает с URL текущего <code>Route</code>;</li>
        <li><code>leave</code> — вызывает <code>hide</code> у элемента;</li>
        <li><code>render</code> — создаёт блок, если тот ещё не был создан (нужно создавать блок только после первого перехода на страницу), иначе вызывает у блока метод <code>show</code>.</li>
    </ul>

    <pre class="brush: js;">
        class Block {
            getContent() { }

            show() {
                console.log('show');
            }

            hide() {
                console.log('hide');
            }
        }

        class Button extends Block {
            getContent() {
                return 'Button';
            }
        }

        function isEqual(lhs, rhs) {
            return lhs === rhs;
        }

        function render(query, block) {
            const root = document.querySelector(query);
            root.textContent = block.getContent();
            return root;
        }

        class Route {
            constructor(pathname, view, props) {
                this._pathname = pathname;
                this._blockClass = view;
                this._block = null;
                this._props = props;
            }

            navigate(pathname) {
                if (this.match(pathname)) {
                    this._pathname = pathname;
                    this.render();
                }
            }

            leave() {
                if (this._block) {
                    this._block.hide();
                }
            }

            match(pathname) {
                return isEqual(pathname, this._pathname);
            }

            render() {
                if (!this._block) {
                    this._block = new this._blockClass();
                    render(this._props.rootQuery, this._block);
                    return;
                }

                this._block.show();
            }

        }

        const route = new Route('/buttons', Button, {
            rootQuery: '.app',
        });

        route.render();

        console.log(route._pathname, route._props); // /buttons, {rootQuery: '.app'}

        route.navigate('/buttons'); // show
        route.navigate('/trash'); // не будет никакого лога
        route.leave(); // hide
    </pre>


    <p><b>Задача 2: Router</b></p>

    <p>Реализуйте класс для работы с роутером — Router. Класс должен работать с блоками и классом Route из прошлой задачи.</p>

    <p>Router должен обладать следующими методами:</p>

    <ul class="marker">
        <li><code>go</code> — переходит на нужный роут и отображает нужный блок;</li>
        <li><code>back</code> — возвращает в прошлое состояние и показывает блок, соответствующий тому состоянию;</li>
        <li><code>forward</code> — переходит в следующие состояние и показывает соответствующий блок;</li>
        <li><code>use</code> — регистрирует блок по пути в роут и возвращает себя — чтобы можно было выстроить в цепочку;</li>
        <li><code>start</code> — по событию onpopstate запускает приложение.</li>
    </ul>

    <pre class="brush: js;">
        class Block {
          getContent() { }

          show() {
            console.log('show');
          }

          hide() {
            console.log('hide');
          }
        }

        class Chats extends Block {
          getContent() {
            return 'chats';
          }

          show() {
            console.log('show chats');
          }

          hide() {
            console.log('hide chats');
          }
        }

        class Users extends Block {
          getContent() {
            return 'users';
          }

          show() {
            console.log('show users');
          }

          hide() {
            console.log('hide users');
          }
        }

        function isEqual(lhs, rhs) {
          return lhs === rhs;
        }

        function render(query, block) {
          const root = document.querySelector(query);
          root.textContent = block.getContent();
          return root;
        }

        class Route {
            constructor(pathname, view, props) {
                this._pathname = pathname;
                this._blockClass = view;
                this._block = null;
                this._props = props;
            }

            navigate(pathname) {
                if (this.match(pathname)) {
                    this._pathname = pathname;
                    this.render();
                }
            }

            leave() {
                if (this._block) {
                    this._block.hide();
                }
            }

            match(pathname) {
                return isEqual(pathname, this._pathname);
            }

            render() {
                if (!this._block) {
                    this._block = new this._blockClass();
                    render(this._props.rootQuery, this._block);
                    return;
                }

                this._block.show();
            }
        }
        class Router {
            constructor(rootQuery) {
                if (Router.__instance) {
                    return Router.__instance;
                }

                this.routes = [];
                this.history = window.history;
                this._currentRoute = null;
                this._rootQuery = rootQuery;

                Router.__instance = this;
            }

            use(pathname, block) {
                const route = new Route(pathname, block, {rootQuery: this._rootQuery});
                this.routes.push(route);
                return this;
            }

            start() {
              // Реагируем на изменения в адресной строке и вызываем перерисовку
              window.onpopstate = event => {
                this._onRoute(event.currentTarget.location.pathname);
              };

              this._onRoute(window.location.pathname);
            }

            _onRoute(pathname) {
              const route = this.getRoute(pathname);
              if (!route) {
                return;
              }

              if (this._currentRoute) {
                this._currentRoute.leave();
              }
        this._currentRoute = route;
              route.render(route, pathname);
            }

            go(pathname) {
              this.history.pushState({}, "", pathname);
              this._onRoute(pathname);
            }

            back() {
              window.history.back();
            }

            forward() {
              window.history.forward();
            }

            getRoute(pathname) {
                return this.routes.find(route => route.match(pathname));
            }
        }

        // Необходимо оставить в силу особенностей тренажёра
        history.pushState({}, '', '/');

        const router = new Router(".app");

        // Можно обновиться на /user и получить сразу пользователя
        router
          .use("/", Chats)
          .use("/users", Users)
          .start();

        // Через секунду контент изменится сам, достаточно дёрнуть переход
        setTimeout(() => {
          router.go("/users");
        }, 1000);

        // А можно и назад
        setTimeout(() => {
          router.back();
        }, 3000);

        // И снова вперёд
        setTimeout(() => {
          router.forward();
        }, 5000);
    </pre>


</div>



<!--
<pre class="brush: js;">

</pre>

<ul class="marker">
    <li></li>
</ul>

v&ndash;                тире

&quot;                  двойная кавычка

-->


<!--

<div class="linear" id="use_strict">
    <h1>Строгий режим — "use strict"</h1>

    <h2>«use strict»</h2>


    <p>Например:</p>

    <pre class="brush: js;">
            "use strict";

            // этот код работает в современном режиме
            ...
        </pre>


    <p>На данный момент достаточно иметь общее понимание об этом режиме:</p>
    <ul class="ul_num">
        <li><code>111111</code> 2222222222222222</li>

    </ul>

</div>

-->



<?php include '../../include/footer.php'; ?>
