<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Шаблонизаторы</h2>

    <p><b>Готовимся писать шаблонизатор</b></p>

    <p>Создадим файл <code>block.tmpl.js</code>.</p>

    <pre class="brush: js;">
        // block.tmpl.js

        window.blockTemplate = (function() {
            return `
                <!-- Можно {{}} с пробелами, можно без-->
        &lt;div class=&quot;{{ className }}&quot;&gt;
            &lt;span onClick=&quot;{{ handleClick }}&quot;&gt;{{text}}&lt;/span&gt;
            &lt;span&gt;{{ user.info.firstName }}&lt;/span&gt;
        &lt;/div&gt;
        `;
        })();



        function get(obj, path, defaultValue) {
            const keys = path.split('.');

            let result = obj;
            for (let key of keys) {
                result = result[key];

                if (result === undefined) {
                    return defaultValue;
                }
            }

            return result ?? defaultValue;  // "??" — [оператор нулевого слияния]
                                            // (https://developer.mozilla.org/ru/docs/Web/JavaScript/Reference/Operators/Nullish_coalescing_operator)
                                            // (не поддерживается старыми браузерами, для них нужен полифилл)
        }

        const obj = {
            user: {
                isPoet: true,
                info: {
                    firstName: 'Alexander',
                    lastName: 'Pushkin'
                },
            },
        };

        get(obj, 'user.isPoet'); // true
        get(obj, 'user.info.firstName'); // Alexander
        get(obj, 'user.info.contacts'); // undefined
        get(obj, 'user.info.contacts.email'); // undefined
        get(obj, 'user.info.contacts.email', 'a.pushkin@ya.ru'); // 'a.pushkin@ya.ru'
        get(obj, 'user.isAdmin', true); // true
    </pre>

    <br>
    <h2>Пишем шаблонизатор</h2>

    <pre class="brush: js;">
        window.get = function(obj, path, defaultValue) {
            const keys = path.split('.');

            let result = obj;
            for (let key of keys) {
                result = result[key];

                if (result === undefined) {
                    return defaultValue;
                }
            }

            return result ?? defaultValue;
        }

        class Templator {
            TEMPLATE_REGEXP = /\{\{(.*?)\}\}/gi;

            constructor(template) {
                this._template = template;
            }

            compile(ctx) {
                return this._compileTemplate(ctx);
            }

            _compileTemplate = (ctx) => {
                let tmpl = this._template;
                let key = null;
                const regExp = this.TEMPLATE_REGEXP;

                // Важно делать exec именно через константу, иначе уйдёте в бесконечный цикл
                while ((key = regExp.exec(testTempl))) {
                    if (key[1]) {
                        const tmplValue = key[1].trim();
                        // get — функция, написанная ранее в уроке
                        const data = window.get(ctx, tmplValue);
                        tmpl = tmpl.replace(new RegExp(key[0], "gi"), data);
                    }
                }

                return tmpl;
            }
        }



        const testTempl = `
            &lt;div&gt;
                {{ field1 }}
                &lt;span&gt;{{field2}}&lt;/span&gt;
                &lt;span&gt;{{ field3.info.name }}&lt;/span&gt;
            &lt;/div&gt;
        `;

        const tmpl = new Templator(testTempl);

        const context = {
            field1: 'Text 1',
            field2: 42,
            field3: {
                info: {
                    name: 'Simon',
                },
            },
        };

        const renderedTemplate = tmpl.compile(context); // Строка с html-вёрсткой



        const root = document.querySelector('.root');
        root.innerHTML = `
            &lt;p&gt;Результат после нажатия виден в консоли&lt;/p&gt;
            ${renderedTemplate}
        `;
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
