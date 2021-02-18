<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>События в браузере</h2>

    <p><b>События мыши</b></p>

    <ul class="marker">
        <li><code>click</code> — клик левой кнопкой мыши;</li>
        <li><code>contextmenu</code> — клик правой кнопкой мыши;</li>
        <li><code>mouseover/mouseout</code> — курсор попадает на элемент или уходит с него;</li>
        <li><code>mousedown/mouseup</code> — кнопку мыши нажали или отпустили;</li>
        <li><code>mousemove</code> — движение курсора над элементом.</li>
    </ul>

    <br>
    <p><b>События клавиатуры</b></p>

    <ul class="marker">
        <li><code>keydown</code> — клавишу нажали;</li>
        <li><code>keyup</code> — клавишу отпустили.</li>
    </ul>

    <br>
    <p><b>События при нажатии пальцем</b></p>

    <ul class="marker">
        <li><code>touchstart</code> — элемента коснулись;</li>
        <li><code>touchmove</code> — по элементу провели пальцем;</li>
        <li><code>touchend</code> — касание закончилось и палец убрали;</li>
        <li><code>touchcancel</code> — палец переместился на интерфейс браузера или тач-событие нужно отменить.</li>
    </ul>

    <br>
    <p><b>События на элементах управления</b></p>

    <ul class="marker">
        <li><code>submit</code> — нажали кнопку «Отправить» формы <code>&lt;form&gt;</code>;</li>
        <li><code>reset</code> — сбросили форму <code> &lt;form&gt;</code>;</li>
        <li><code>focus</code> — пользователь фокусируется на элементе, например, нажимает на <code>&lt;input&gt;</code>;</li>
        <li><code>blur</code> — пользователь выходит из фокуса элемента, например, кликает вне <code>&lt;input&gt;</code>.</li>
    </ul>

    <br>

    <p><b>addEventListener и removeEventListener</b></p>

    <p>Самый верный способ навесить и удалить обработчик. Настоятельно рекомендуем использовать по умолчанию именно эти два метода:</p>

    <pre class="brush: js;">
        // Добавление обработчика
        element.addEventListener(event, handler);

        // Удаление обработчика
        // Нужно передать те же аргументы, что были у addEventListener
        element.removeEventListener(event, handler);

        ////////////////////////////////////////////////

        // Вот такой способ не сработает
        // (в аргументах хоть внешне и одинаковые, но по сути разные функции)
        element.addEventListener(event, () => '');
        element.removeEventListener(event, () => '');

        // Вот такой способ сработает (в аргументах одна и та же функция)
        const handler = () => '';
        element.addEventListener(event, handler);
        element.removeEventListener(event, handler);
    </pre>

    <br>

    <p><b>Работа с событием</b></p>

    <ul class="marker">
        <li><code>event.preventDefault</code> — отменяет обработчик по умолчанию,</li>
        <li><code>event.stopPropagation</code> — прекращает всплытие (например, при нажатии на кнопку не вызовет стандартное поведения &lt;form&gt;).</li>
        <li><code>event.stopImmediatePropagation</code> — прекращает всплытие и не выполняет оставшиеся обработчики события.</li>
    </ul>

    <br>

    <p><b>Перехват события</b></p>

    <ul class="marker">
        <li><code>on*</code> — обработчики не обрабатывают перехват;</li>
        <li><code>element.addEventListener('event', callback, false)</code> — обработка на стадии всплытия (поведение по умолчанию);</li>
        <li><code>element.addEventListener('event', callback, true)</code> — обработка на стадии перехвата</li>
    </ul>

    <br>
    <p><b>Делегирование событий</b></p>

    <pre class="brush: js;">
        &lt;ul&gt;
            &lt;li&gt;0&lt;/li&gt;
            &lt;li&gt;1&lt;/li&gt;
            &lt;li&gt;2&lt;/li&gt;
        &lt;/ul&gt;
    </pre>

    <p>Как можно навесить обработчик на все элементы?</p>

    <pre class="brush: js;">
        const logger = function(event) {
            console.log(event.target.innerHTML);
        }

        const liElements = document.getElementsByTagName('li');

        for (let i = 0; i < liElements.length; i++) {
            const li = liElements[i];
            li.addEventListener('click', logger);
        }
    </pre>

    <p>Можно сделать намного проще, используя знания о делегировании, всплытии и перехвате:</p>

    <pre class="brush: js;">
        const logger = function(event) {
            if(event.target.tagName === 'LI') {
                console.log(event.target.innerHTML);
            }
        }

        const ul = document.getElementsByTagName('ul')[0];
        ul.addEventListener('click', logger);
    </pre>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1 - onClick и addEventListener</b></p>

    <p>Исправьте подписки на клик так, чтобы в массив <code>result</code> попали обе строки, а не последняя.</p>

    <pre class="brush: html;">
        <button class="button">Жми на меня</button>
    </pre>
    <br>
    <pre class="brush: js;">
        const btn = document.querySelector('.button');

        const result = [];

        function first() {
            result.push('first event');
        }
        function second() {
            result.push('second event');
        }

        btn.addEventListener('click', first);
        btn.addEventListener('click', second);

        console.log(result)
        // Было: result -> ["second event"]
        // Стало: result -> ["first event", "second event"]
    </pre>

    <br>

    <p><b>Задача 2 - Tooltip</b></p>

    <p>Ебаная задача не заслуживающая описания, куска решения будет достаточно</p>

    <pre class="brush: html;">
        &lt;style&gt;
            .tooltip {display: none;padding: 5px;border: 1px solid black;}
            .tooltip.tooltip_active {display: block;position: absolute;}
            .left_bottom {position: fixed;bottom: 5px;left: 0;}
        &lt;/style&gt;

        &lt;div class=&quot;wrapper&quot;&gt;
            &lt;span class=&quot;left_top&quot; data-tooltip=&quot;Взяли текст из data-tooltip&quot;&gt;Верхний тултип&lt;/span&gt;
            &lt;span class=&quot;left_bottom&quot; data-tooltip=&quot;И еще один&quot;&gt;Нижний тултип&lt;/span&gt;
        &lt;/div&gt;
    </pre>

    <br>

    <pre class="brush: js;">
        (function () {

            class Tooltip {
                constructor() {
                    this.el = document.createElement('div');
                    this.el.style.position = 'absolute';

                    this.el.classList.add(this.name);
                    document.body.appendChild(this.el);

                    this.onHide = this.onHide.bind(this);
                }

                get name() {
                    return 'tooltip';
                }

                get indent() {
                    return 5;
                }

                delegate(eventName, element, cssSelector, callback) {
                    const fn = event => {
                        if (!event.target.matches(cssSelector)) {
                            return;
                        }

                        callback(event);
                    };

                    element.addEventListener(eventName, fn);
                    //this.listeners.push({ fn, element, eventName });

                    return this;
                }

                onShow = (event) => {
                    // Элемент, на который пользователь навёл мышкой
                    const sourceEl = event.target;

                    // HTML тултипа задаём из data-аттрибута
                    this.el.innerHTML = sourceEl.getAttribute('data-tooltip');

                    // Добавляем класс _active, чтобы отобразить тултип
                    this.el.classList.add(`${this.name}_active`);

                    const sourceElRect = sourceEl.getBoundingClientRect();
                    const elRect = this.el.getBoundingClientRect();

                    let top = sourceElRect.bottom + this.indent;
                    const left = sourceElRect.left;

                    // Если тултип не влезает по высоте, то поднимаем его над элементом
                    if (top + elRect.height > document.documentElement.clientHeight) {
                        top = sourceElRect.top - elRect.height - this.indent;
                    }

                    this.el.style.top = `${top + window.scrollY}px`;
                    this.el.style.left = `${left + window.scrollX}px`;
                }

                onHide() {
                    this.el.classList.remove(`${this.name}_active`);
                }

                attach(root) {
                    this
                        .delegate('mouseover', root, '[data-tooltip]', this.onShow)
                        .delegate('mouseout', root, '[data-tooltip]', this.onHide);
                }

                //В методе detach достаточно удалить всех слушателей из массива this.listeners и отписать DOM-элементы от событий:
                detach() {
                    for (const {fn, element, eventName} of this.listeners) {
                        element.removeEventListener(eventName, fn);
                    }

                    this.listeners = [];
                }
            }

            window.Tooltip = Tooltip;
        })();

        const tooltip = new Tooltip();
        tooltip.attach(document.body);
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
