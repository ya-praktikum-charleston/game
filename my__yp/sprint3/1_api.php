<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Реализация fetch</h2>

    <p>Реализация на TypeScript</p>

    <pre class="brush: js;">
        enum METHOD {
            GET = 'GET',
            POST = 'POST',
            PUT = 'PUT',
            PATCH = 'PATCH',
            DELETE = 'DELETE'
        };

        type Options = {
            method: METHOD;
            data?: any;
        };

        // Тип Omit принимает два аргумента: первый — тип, второй — строка
        // и удаляет из первого типа ключ, переданный вторым аргументом
        type OptionsWithoutMethod = Omit<Options, 'method'>;
        // Этот тип эквивалентен следующему:
        // type OptionsWithoutMethod = { data?: any };

        class HTTPTransport {
            get(url: string, options: OptionsWithoutMethod = {}): Promise<XMLHttpRequest> {
                return this.request(url, {...options, method: METHOD.GET});
            };

            request(url: string, options: Options = { method: METHOD.GET }): Promise<XMLHttpRequest> {
                const {method, data} = options;
        // @ts-ignore
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open(method, url);

                    xhr.onload = function() {
                        resolve(xhr);
                    };

                    xhr.onabort = reject;
                    xhr.onerror = reject;
                    xhr.ontimeout = reject;

                    if (method === METHOD.GET || !data) {
                        xhr.send();
                    } else {
                        xhr.send(data);
                    }
                });
            };
        }

        let www = new HTTPTransport().get('books.json');
        console.log(www)
    </pre>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1: Fetch</b></p>

    <p>Реализуйте класс для работы с запросами, который:</p>

    <ul class="marker">
        <li>Содержит методы GET, PUT, POST, DELETE;</li>
        <li>В методе GET data трансформируется в формат GET-запроса ?key1=value1&key2=value2;</li>
        <li>По таймауту выбрасывает ошибку;</li>
        <li>Умеет работать с пользовательскими заголовками;</li>
        <li>После успешного ответа — необходимо возвращать в промисе сам XHR, то есть разрезолвить XHR;</li>
        <li>Объект options должен содержать: <br><br>
            <ul>
                <li>Объект options должен содержать:</li>
                <li>timeout — время на запрос. Если запрос выполняется дольше указанного времени, должен быть reject;</li>
                <li>data — возможность работы с информацией: GET-параметры и JSON;</li>
                <li>headers — объект, для описания заголовков, у которого ключ и значение всегда string.</li>
            </ul>
        </li>
    </ul>

    <pre class="brush: js;">
        const METHODS = {
            GET : 'GET',
            POST : 'POST',
            PUT : 'PUT',
            DELETE : 'DELETE'
        };

        const Options = {
            method: METHODS,
            timeout: 5000,
            data: {a: 1, b: 2, c: {d: 123}, k: [1, 2, 3]},
            headers : 'Content-Type',
        };

        function queryStringify(data) {
            return Object.keys(data).map(key => key + '=' + data[key]).join('&');
        }

        class HTTPTransport {
            get = (url, options = Options) => {
                return this.request(url, {...options, method: METHODS.GET} );
            };

            request = (url, options, timeout = 5000) => {

                const {method, data, headers} = options;
                const getParam = data ? `${url}?${queryStringify(options.data)}` : 'url';
                timeout = data.timeout && data.timeout;

                return new Promise((resolve, reject = timeout) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open(method, getParam);
                    xhr.responseType = 'text';
                    xhr.getResponseHeader(headers);
                    xhr.send();
                    xhr.timeout = reject;
                    xhr.ontimeout = function () { console.log("Timed out!!!"); }
                    xhr.onload = function() {
                        if (this.status === 200) {
                            resolve(xhr);
                        } else {
                            reject(this.status + ' : ' + this.statusText);
                        }
                    };
                });
            };
        }


        let www = new HTTPTransport().get('books.json');
        console.log('www',www)


        //
        // Fetch
        // Реализуйте класс для работы с запросами, который:
        // Содержит методы GET, PUT, POST, DELETE;
        // В методе GET data трансформируется в формат GET-запроса ?key1=value1&key2=value2;
        // По таймауту выбрасывает ошибку;
        // Умеет работать с пользовательскими заголовками;
        // После успешного ответа — необходимо возвращать в промисе сам XHR, то есть разрезолвить XHR;
        // Объект options должен содержать:
        //     timeout — время на запрос. Если запрос выполняется дольше указанного времени, должен быть reject;
        // data — возможность работы с информацией: GET-параметры и JSON;
        // headers — объект, для описания заголовков, у которого ключ и значение всегда string.



        /*
        Вы можете сделать метод request универсальным и использовать его во всех запросах. Для этого нужно в нём учитывать, что если, например, данных нет или это GET-запрос, то у xhr.send() не будет аргументов;
        Не забудьте обработать ошибки.*/

    </pre>

    <br>
    <p><b>Задача 2: Fetch с подсчётом попыток</b></p>

    <p>Бывает так, что сервер отвечает на запрос ошибкой. Иногда это сделано намеренно, а значит нужно несколько раз попытаться получить ответ.</p>

    <pre class="brush: js;">
        function fetchWithRetry(url, options = {}) {
            const {tries = 1} = options;

            function onError(err){
                const triesLeft = tries - 1;
                if (!triesLeft){
                    throw err;
                }

                return fetchWithRetry(url, {...options, tries: triesLeft});
            }

            return fetch(url, options).catch(onError);
        }
    </pre>

    <br>
    <h2>Рубрика: мастерим сами</h2>

    <br>
    <h2>Практика</h2>

    <p><b>Задача 1: trim</b></p>
    <p>Напишите функцию, которая умеет удалять из начала и конца строки пробельные или отдельно заданные пользовательские символы. Удаление пробелов из начала и конца строк — поведение по умолчанию. Пробел необязательно должен быть передан в качестве аргумента.</p>

    <pre class="brush: js;">
        function trim(str:string,arg?:string): string{
            let argum = '';
            if(arg) {
                argum = arg.split('').join('|');
            }

            let rtrim = `[\\s${argum}]`;

            let regexp = new RegExp(rtrim, 'g');
            let result = str.replace(regexp,'');

            return result;
        }

        trim('  abc  '); // => 'abc'
        trim('-_-abc-_-', '_-'); // => 'abc'
        trim('\xA0foo'); // "foo"
        trim('\xA0foo', ' '); // " foo"
        trim('-_-ab c -_-', '_-'); // ab c

        ['  foo  ', '  bar  '].map(value => trim(value)); // => ['foo', 'bar']
    </pre>

    <p><b>Задача 2: merge</b></p>
    <p>Напишите функцию, которая объединит два объекта с сохранением их уникальных ключей.</p>

    <pre class="brush: js;">
        type Indexed<T = unknown> = {
            [key in string]: T;
        };

        function merge(obj1: any, obj2: any): any {
                function rec(newObj,obj2) {
                for (let key in obj2) {
                    if (typeof (obj2[key]) == "object") {
                        rec(newObj[key],obj2[key]);
                    } else {
                        newObj[key] = obj2[key];
                    }
                }
            }
            let newObj = Object.assign({},obj1);
            rec(newObj,obj2);
            return newObj;
        }

        export default merge

        merge({a: {b: {a: 2}}, d: 5}, {a: {b: {c: 1}}});
        /*
        {
            a: {
                b: {
                    a: 2,
                    c: 1,
                }
            },
            d: 5,
        }
        */
    </pre>

    <p><b>Задача 3: set</b></p>
    <p>Напишите функцию <code>set</code>, которая получает путь к вложенному свойству объекта и устанавливает значение в это свойство. Если поля не существует, его нужно создать по указанному пути.</p>
    <p>Проверьте, что <code>path</code> — строка, иначе нужно выбросить ошибку '<code>path must be string</code>'.</p>
    <p>Если <code>object</code> не объект, то метод set должен вернуть значение <code>object</code>.</p>
    <p>В решении можно переиспользовать функцию слияния объектов — <code>merge</code>.</p>
    <p>Обратите внимание, что в решении вам нужно мутировать исходный объект, который передали в качестве аргумента, а потом вернуть его из функции при помощи <code>return</code>.</p>





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
