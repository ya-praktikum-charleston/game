<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Паттерны</h2>

    <ul class="marker">
        <li><a target="_blank" href="https://habr.com/ru/company/yandex/blog/192874/">Эволюция модульного
                JavaScript</a></li>
        <li><a target="_blank" href="https://habr.com/ru/post/70793/">Используем паттерн Наблюдатель(Observer) для
                создания индикатора выполнения процесса на Javascript</a></li>
        <li><a target="_blank" href="https://habr.com/ru/post/119304/">Применение Event-driven модели в
                веб-приложении</a></li>
        <li><a target="_blank" href="https://habr.com/ru/post/149912/">Auto dependency injection в Javascript</a>
        </li>
        <li><a target="_blank" href="https://habr.com/ru/post/232851/">Dependency Injection. JavaScript</a></li>
    </ul>

    <br>
    <h2>Компонент</h2>

    <p>При реализации нашим способом важно, чтобы во время отписки от события пользователь передавал ровно ту же
        функцию. Всё аналогично removeEventListener из DOM API.</p>

    <pre class="brush: js;">
            class EventBus {
                constructor() {
                    this.listeners = {};
                }

                on(event, callback) {
                    this.listeners[event].push(callback);
                }

                emit(event) {
                    this.listeners[event].forEach(function(listener) {
                        listener();
                    });
                }

                // Можно называть detach, как больше нравится
                off(event, callback) {
                ...
                }
            }
        </pre>

    <br>
    <h2>Триггеры</h2>

    <p>Например, есть кнопка с текстом и классом. В ходе исполнения программы решили поменять имя класса с visible на
        hide, который меняет видимость кнопки в интерфейсе. Для этого не нужно удалять кнопку из DOM и заново создавать
        её с новым классом. Достаточно поменять параметры кнопки, чтобы после этого она сама перерисовалась:</p>

    <pre class="brush: js;">
        const button = new Button({
            text: 'my text',
            className: 'visible',
        });

        renderToDom(button);

        // Хотелось бы после изменения пропсов стриггерить изменения в браузере
        button.setProps({
            className: 'hide',
        });
    </pre>

    <br>

    <p>О Proxy подробно и с примерами написано в <a target="_blank" href="https://learn.javascript.ru/proxy">«Современном учебнике JavaScript»</a>.</p>

    <p>Сделаем следующий функционал: при изменении свойств объекта — будем неявно писать в консоль новое значение.</p>

    <p>В <a target="_blank" href="https://github.com/tc39/proposal-class-fields#private-fields">TC39</a> описано, как сделать приватные свойства и методы на уровне языка без обходных путей. На эту тему есть много статей, например на
        <a target="_blank" href="https://medium.com/devschacht/javascripts-new-private-class-fields-c60daffe361b">Medium</a>.</p>

    <br>

    <p>Можно запретить удаление приватных полей.</p>

    <pre class="brush: js;">
        const data = {
            _test: 1,
        };

        const proxyData = new Proxy(data, {
            get(target, prop) {
                if (prop.indexOf('_') === 0) {
                    throw new Error('Отказано в доступе');
                }

                const value = target[prop];
                return typeof value === "function" ? value.bind(target) : value;
            },
            deleteProperty() {
                throw new Error('Отказано в доступе');
            },
        });

        proxyData._test; // Error: Отказано в доступе
        proxyData.newProp = 'string'; // Не дойдёт сюда
    </pre>

    <br>

    <h2>Блок</h2>

    <p>Теперь у нас есть всё, чтобы реализовать полноценный блок</p>

    <pre class="brush: js;">
        import { EventBus } from "../event-bus";

        // Нельзя создавать экземпляр данного класса
        class Block {
            static EVENTS = {
                INIT: "init",
                FLOW_CDM: "flow:component-did-mount",
                FLOW_RENDER: "flow:render"
            };

            _element = null;
            _meta = null;

            /** JSDoc
             * @param {string} tagName
             * @param {Object} props
             *
             * @returns {void}
             */
            constructor(tagName = "div", props = {}) {
                const eventBus = new EventBus();

                this._meta = {
                    tagName,
                    props
                };

                this.props = this._makePropsProxy(props);

                this.eventBus = () => eventBus;

                this._registerEvents(eventBus);
                eventBus.emit(Block.EVENTS.INIT);
            }

            _registerEvents(eventBus) {
                eventBus.on(Block.EVENTS.INIT, this.init.bind(this));
                eventBus.on(Block.EVENTS.FLOW_CDM, this._componentDidMount.bind(this));
                eventBus.on(Block.EVENTS.FLOW_RENDER, this._render.bind(this));
            }

            _createResources() {
                const { tagName } = this._meta;
                this._element = this._createDocumentElement(tagName);
            }

            init() {
                this._createResources();
                this.eventBus().emit(Block.EVENTS.FLOW_CDM);
            }

            _componentDidMount() {
                this.componentDidMount();
                this.eventBus().emit(Block.EVENTS.FLOW_RENDER);
            }

            componentDidMount(oldProps) {}

            _componentDidUpdate(oldProps, newProps) {
            ...
            }

            componentDidUpdate(oldProps, newProps) {
                return true;
            }

            setProps = nextProps => {
                if (!nextProps) {
                    return;
                }

                Object.assign(this.props, nextProps);
            };

            get element() {
                return this._element;
            }

            _render() {
                const block = this.render();
                // Это небезопасный метод для упрощения логики
                // Используйте шаблонизатор из npm или напишите свой безопасный
                // Нужно компилировать не в строку (или делать это правильно),
                // либо сразу в превращать DOM-элементы и возвращать из compile DOM-ноду
                // Удалить старые события через removeEventListener
                this._element.innerHTML = block;
                // Навесить новые события через addEventListener
            }

            // Переопределяется пользователем. Необходимо вернуть разметку
            render() {}

            getContent() {
                return this.element;
            }

            _makePropsProxy(props) {
                // Еще один способ передачи this, но он больше не применяется с приходом ES6+
                const self = this;

                // Здесь вам предстоит реализовать метод
                return props;
            }

            _createDocumentElement(tagName) {
                // Можно сделать метод, который через фрагменты в цикле создаёт сразу несколько блоков
                return document.createElement(tagName);
            }

            show() {
                this.getContent().style.display = "block";
            }

            hide() {
                this.getContent().style.display = "none";
            }
        }

        export default Block;
    </pre>

    <p>Рассмотрим конструктор. В нём создаём необходимые ресурсы для компонента:</p>

    <ul class="marker">
        <li>элемент-обёртку</li>
        <li>сохраняем метаинформацию от пользователя</li>
        <li>создаём Proxy-объекты</li>
        <li>создаём Event Bus и регистрируем события</li>
    </ul>

    <p>Чтобы сделать каждый компонент изолированным, делаем Event Bus приватным для каждого компонента.</p>

    <p>Попробуем применить полученный класс. Добавим кнопку, которую потом сможем переиспользовать. У неё простая разметка:</p>

    <pre class="brush: js;">
        // components/button/template.js

        export const template = `
       &lt;div class=&quot;{{ className }}&quot;&gt;
            {{ child }}
        &lt;/div&gt;
        `;



        // components/button/template.js

        import Block from "../../modules/block";
        // Ваш реализованный шаблонизатор
        import { compile } from "../../utils/templator";
        import { template } from "./template";

        export default class Button extends Block {
            constructor(props) {
                // Создаём враппер DOM-элемент button
                super("button", props);
            }

            render() {
                // В данном случае render возвращает строкой разметку из шаблонизатора
                return compile(template, this.props);
            }
        }
    </pre>

    <p>Чтобы создать кнопку и поместить её в DOM, напишем небольшую утилиту, которая поможет сделать рендер:</p>

    <pre class="brush: js;">
        // utils/renderDOM.js

        export function render(query, block) {
            const root = document.querySelector(query);

            // Можно завязаться на реализации вашего класса Block
            root.appendChild(block.getContent());
            return root;
        }
    </pre>

    <p>Осталось создать кнопку и добавить её в DOM:</p>

    <pre class="brush: js;">
        // У кнопки есть index.js, который экспортирует только нужное
        import Button from "./components/button";
        import { render } from "./utils/rednerDOM";

        const button = new Button({
            className: 'my-class',
            child: 'Click me',
        });

        // app — это class дива в корне DOM
        render(".app", button);

        // Через секунду контент изменится сам, достаточно обновить пропсы
        setTimeout(() => {
            button.setProps({
                className: 'otherClass',
                child: 'Click me, please',
            });
        }, 1000);
    </pre>

    <p>Теперь у нас есть реактивный компонент с собственным жизненным циклом и хорошей архитектурой.</p>

    <img src="img/01.3._SS_1596025367_1612949065.png" alt="">


    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - Event Bus</b></p>

    <p>Реализуйте Event Bus, который должен включать механизмы:</p>

    <ul class="marker">
        <li>подписки на события</li>
        <li>отписки от события</li>
        <li>триггера события и распространения сообщения всем подписавшимся. Необходимо уметь передавать любое число аргументов при операции emit</li>
        <li>в случае отсутствия зарегистрированного события и вызова emit или off — выбросить ошибку с текстом «Нет события: ${event}»</li>
    </ul>

    <pre class="brush: js;">
        class EventBus {
            constructor() {
                this.listeners = {};
            }

            on(event, callback) {
                if(this.listeners[event]){
                    this.listeners[event].push(callback);
                }else{
                    this.listeners[event]= [];
                    this.listeners[event].push(callback);
                }
            }

            off(event, callback) {
                this.listeners[event] = this.listeners[event].filter(elem => {
                    return elem !== callback;
                });
            }

            emit(event, ...args) {
                if(this.listeners[event]){
                    this.listeners[event].map((elem,i) => {
                        elem(...args);
                    })
                }else{
                    throw `Нет события: ${event}`;
                }
            }
        }

        const eventBus = new EventBus();

        const handlerEvent1 = (arg1, arg2) => {
            console.log('first', arg1, arg2);
        };

        const handlerEvent2 = (arg1, arg2) => {
            console.log('second', arg1, arg2);
        };

        try {
            eventBus.emit('common:event-1', 42, 10);
        } catch (error) {
            console.log(error); // Error: Нет события: common:event-1
        }

        eventBus.on('common:event-1', handlerEvent1);
        eventBus.on('common:event-1', handlerEvent2);

        eventBus.emit('common:event-1', 42, 10);
        eventBus.off('common:event-1', handlerEvent2);

        eventBus.emit('common:event-1', 84, 20);

        /*
            * Вывод в консоли должен быть следующий:
        Error: Нет события: common:event-1
        first 42 10
        second 42 10
        first 84 20
        */
    </pre>

    <br>

    <p><b>Задача 2 - Приватный Proxy</b></p>

    <p>Напишите конструктор <code>proxyProps</code> со следующими особенностями:</p>

    <ul class="marker">
        <li>В нём запрещён доступ к методам и свойствам, которые начинаются с <code>_</code>. В случае ошибки доступа выводится текст «Нет прав».</li>
        <li>Остальные свойства можно получать, изменять и удалять.</li>
    </ul>

    <pre class="brush: js;">
        const props = {
            name: 'Abby',
            chat: 'the last of us. Part II',
            getChat() {
                this._privateMethod();
            },
            _privateMethod() {
                console.log(this._privateProp);
            },
            __privateMethodToo() {},
            _privateProp: 'Нельзя получить просто так',
        };

        const proxyProps = new Proxy(props, {
            get(target, prop) {
                if (prop.startsWith('_')) {
                    throw new Error("Нет прав");
                } else {
                    let value = target[prop];
                    return (typeof value === 'function') ? value.bind(target) : value; // (*)
                }
            },
            set(target, prop, val) { // перехватываем запись свойства
                if (prop.startsWith('_')) {
                    throw new Error("Нет прав");
                } else {
                    target[prop] = val;
                    return true;
                }
            },
            deleteProperty(target, prop) { // перехватываем удаление свойства
                if (prop.startsWith('_')) {
                    throw new Error("Нет прав");
                } else {
                    delete target[prop];
                    return true;
                }
            },
        });

        proxyProps.getChat();
        delete proxyProps.chat;

        proxyProps.newProp = 2;
        console.log(proxyProps.newProp);

        try {
            proxyProps._newPrivateProp = 'Super game';
        } catch (error) {
            console.log(error);
        }

        try {
            delete proxyProps._privateProp;
        } catch (error) {
            console.log(error); // Error: Нет прав
        }

        /*
            * Вывод в консоль следующий:
        Нельзя получить просто так
        2
        Error: Нет прав
        Error: Нет прав
        */

    </pre>

    <br>
    <p><b>Задание 3 - Собственный блок</b></p>

    <p>Используя Event Bus, proxy-объекты и теорию данного курса, реализуйте базовый класс для работы с блоком.</p>

    <p>Блок должен:</p>

    <ul class="marker">
        <li>Содержать жизненный цикл на основе Event Bus с методами:
            <ul class="marker">
                <li><code>init</code> — создание обёртки DOM-элемента и вызов CDM. Название события: <code>init</code>,</li>
                <li><code>componentDidMount</code> — эмитится через Event Bus после <code>init</code>-метода блока. Название события: <code>flow:component-did-mount</code>,</li>
                <li><code>componentDidUpdate</code> — эмитится через Event Bus после изменения пропсов блока. Если пропсы не поменялись, перерендер не нужен, если явно не переопределён в классе блока такой метод. Метод должен вернуть значение boolean. Если <code>true</code> — компоненту нужно перерендерить, если <code>false</code> — не нужно. Название события: <code>flow:component-did-update</code>,</li>
                <li><code>render</code> — получение уже готовой разметки со всеми значениями. Всегда делается рендер строки. Название события: <code>flow:render</code>.</li>
            </ul>
        </li>
        <li>Предоставлять методы, показывающие и скрывающие блок:
            <ul class="marker">
                <li><code>show</code> — делает значение display равным block,</li>
                <li><code>hide</code> — делает значение display равным none.</li>
            </ul>
        </li>
    </ul>

    <p>Создавать «обёртку» с указанным тегом в конструкторе.</p>

    <p>Перерисовываться при изменении пропсов через <code>Proxy</code>.</p>

    <p>Выкидывать ошибку «нет доступа» при попытке удалить свойства в props блока.</p>

    <pre class="brush: js;">

        class EventBus {
            constructor() {
                this.listeners = {};
            }

            on(event, callback) {
                if (!this.listeners[event]) {
                    this.listeners[event] = [];
                }

                this.listeners[event].push(callback);
            }

            off(event, callback) {
                if (!this.listeners[event]) {
                    throw new Error(`Нет события: ${event}`);
                }

                this.listeners[event] = this.listeners[event].filter(
                    listener => listener !== callback
                );
            }

            emit(event, ...args) {
                if (!this.listeners[event]) {
                    throw new Error(`Нет события: ${event}`);
                }

                this.listeners[event].forEach(function(listener) {
                    listener(...args);
                });
            }
        }


        //====


        class Block {
            static EVENTS = {
                INIT: "init",
                FLOW_CDM: "flow:component-did-mount",
                FLOW_CDU: "flow:component-did-update",
                FLOW_RENDER: "flow:render"
            };

            _element = null;
            _meta = null;

            /** JSDoc
             * @param {string} tagName
             * @param {Object} props
             *
             * @returns {void}
             */
            constructor(tagName = "div", props = {}) {
                const eventBus = new EventBus();
                this._meta = {
                    tagName,
                    props
                };

                this.props = this._makePropsProxy(props);

                this.eventBus = () => eventBus;

                this._registerEvents(eventBus);
                eventBus.emit(Block.EVENTS.INIT);
            }

            _registerEvents(eventBus) {
                eventBus.on(Block.EVENTS.INIT, this.init.bind(this));
                eventBus.on(Block.EVENTS.FLOW_CDM, this._componentDidMount.bind(this));
                eventBus.on(Block.EVENTS.FLOW_CDU, this._componentDidUpdate.bind(this));
                eventBus.on(Block.EVENTS.FLOW_RENDER, this._render.bind(this));
            }

            _createResources() {
                const { tagName } = this._meta;
                this._element = this._createDocumentElement(tagName);

            }

            init() {
                this._createResources();
                this.eventBus().emit(Block.EVENTS.FLOW_CDM);
            }

            _componentDidMount() {
                this.componentDidMount();
                this.eventBus().emit(Block.EVENTS.FLOW_RENDER);
            }

            // Может переопределять пользователь, необязательно трогать
            componentDidMount(oldProps) {}

            _componentDidUpdate(oldProps, newProps) {
                const response = this.componentDidUpdate(oldProps, newProps);
                if(response){
                    this.eventBus().emit(Block.EVENTS.FLOW_RENDER);
                }
            }

            // Может переопределять пользователь, необязательно трогать
            componentDidUpdate(oldProps, newProps) {
                return true;
            }

            setProps = nextProps => {
                if (!nextProps) {
                    return;
                }

                Object.assign(this.props, nextProps);
                this._componentDidUpdate(this.props, nextProps)
            };

            get element() {
                return this._element;
            }

            _render() {
                const block = this.render();
                // Этот небезопасный метод для упрощения логики
                // Используйте шаблонизатор из npm или напишите свой безопасный
                // Нужно не в строку компилировать (или делать это правильно),
                // либо сразу в DOM-элементы возвращать из compile DOM-ноду
                this._element.innerHTML = block;
            }

            // Может переопределять пользователь, необязательно трогать
            render() {}

            getContent() {
                return this.element;
            }

            _makePropsProxy(props) {
                // Можно и так передать this
                // Такой способ больше не применяется с приходом ES6+
                const self = this;
                let proxy = new Proxy(props, {
                    deleteProperty(target, prop) {
                        throw new Error("Нет доступа");
                    }
                });
                return proxy;
            }

            _createDocumentElement(tagName) {
                // Можно сделать метод, который через фрагменты в цикле создаёт сразу несколько блоков
                return document.createElement(tagName);
            }

            show() {
                this.getContent().style.display = "block";
            }

            hide() {
                this.getContent().style.display = "none";
            }
        }


        //====


        class Button extends Block {
            constructor(props) {console.log(props)
                // Создаём враппер дом-элемент button
                super("button", props);
            }

            render() {
                // В проекте должен быть ваш собственный шаблонизатор
                return `<div>${this.props.text}</div>`;
            }
        }

        function render(query, block) {
            const root = document.querySelector(query);
            root.appendChild(block.getContent());
            return root;
        }

        const button = new Button({
            text: 'Click me',
        });

        // app — это id дива в корне DOM
        render(".app", button);

        // Через секунду контент изменится сам, достаточно обновить пропсы
        setTimeout(() => {
            button.setProps({
                text: 'Click me, please',
            });
        }, 1000);

        delete button.props;
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
