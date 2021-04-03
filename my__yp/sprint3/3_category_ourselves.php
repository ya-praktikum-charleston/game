<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">

    <h2>Описание утилит</h2>

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

    <br>
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

    <br>
    <p><b>Задача 3: set</b></p>

    <p>Напишите функцию set, которая получает путь к вложенному свойству объекта и устанавливает значение в это свойство. Если поля не существует, его нужно создать по указанному пути.</p>
    <p>Проверьте, что path — строка, иначе нужно выбросить ошибку 'path must be string'.</p>
    <p>Если object не объект, то метод set должен вернуть значение object.</p>
    <p>В решении можно переиспользовать функцию слияния объектов — merge.</p>
    <p>Обратите внимание, что в решении вам нужно мутировать исходный объект, который передали в качестве аргумента, а потом вернуть его из функции при помощи return.</p>

    <pre class="brush: js;">
        type Indexed<T = any> = {
            [key in string]: T;
        };

        function merge(lhs: Indexed, rhs: Indexed): Indexed {
            for (let p in rhs) {
                if (!rhs.hasOwnProperty(p)) {
                    continue;
                }

                try {
                    if (rhs[p].constructor === Object) {
                        rhs[p] = merge(lhs[p] as Indexed, rhs[p] as Indexed);
                    } else {
                        lhs[p] = rhs[p];
                    }
                } catch(e) {
                    lhs[p] = rhs[p];
                }
            }

            return lhs;
        }

        function set(object: Indexed | unknown, path: string, value: unknown): Indexed | unknown {
            if (typeof object !== 'object') {
                return object;
            }

            if (typeof path !== 'string') {
                throw new Error('path must be string');
            }

            const result = path.split('.').reduceRight<Indexed>((acc, key) => ({
                [key]: acc,
            }), value as any);
            return merge(object as Indexed, result);
        }
    </pre>

    <br>
    <p><b>Задача 4: isEqual</b></p>

    <p>Напишите функцию, которая выполняет глубокое сравнение между двумя значениями и определяет — являются ли они эквивалентными. Аргументами могут быть только объекты.</p>

    <pre class="brush: js;">
        function isEqual(a: object, b: object): boolean {
            const pull = new Map()

        const result = isEqualMaster(a, b)

        pull.clear()

        return result

        function isEqualMaster (a, b) {
            if (pull.has(a)) {
                return pull.get(a) === b
            }

            const typeA = getTypeOf(a)
            const typeB = getTypeOf(b)

            if (typeA !== typeB) {
                return false
            }

            if (isPrimitiveType(typeA)) {
                if (typeA === "Number") {
                    if (isNaN(a) || isNaN(b)) {
                        return isNaN(b) && isNaN(b)
                    }
                }

                return a === b
            }

            if (a === b) {
                return true
            }

            pull.set(a, b)
            pull.set(b, a)

            if (typeA === 'Array') {
                if (a.length !== b.length) {
                    return false
                }

                for (let i = 0; i < a.length; i++) {
                    if (!isEqualMaster(a[i], b[i])) {
                        return false
                    }
                }

                return true
            }

            else {
                const kyesA = Object.keys(a)
                const kyesB = Object.keys(b)

                if (kyesA.length !== kyesB.length) {
                    return false
                }

                for (const key of kyesA) {
                    if (!kyesB.includes(key)) {
                        return false
                    }
                }

                for (const key of kyesA) {
                    if (!isEqualMaster(a[key], b[key])) {
                        return false
                    }
                }

                return true
            }
        }

        function getTypeOf (x) {
            return Object.prototype.toString.call(x).slice(8, -1)
        }

        function isPrimitiveType (x) {
            return ["Null", "Undefined", "Number", "String", "Boolean", "BigInt", "Symbol"].includes(x)
        }
    }

    export default isEqual

    const a = {a: 1};
    const b = {a: 1};
    isEqual(a, b); // true
    </pre>


    <br>
    <p><b>Задача 5: cloneDeep</b></p>
    <p>Напишите функцию, которая выполняет глубокое копирование значений.</p>

    <pre class="brush: js;">
        function cloneDeep<T extends object = object>(arr: T) {
                if(arr.length){
                var arr1 = [];
            }else if(typeof arr == "object"){
                var arr1 = {};
            }else{
                return arr;
            }
            for(let key in arr){
                if(typeof arr[key] == "function" || !arr[key].length || typeof arr[key] != "object")
                    arr1[key] = arr[key];
                else
                    arr1[key] = copy(arr[key]);
            }
            return arr1;
        }

        export default cloneDeep

        const objects = [{ 'a': 1 }, { 'b': 2 }];
        const deep = cloneDeep(objects);

        console.log(deep[0] === objects[0]); // => false
    </pre>

    <br>
    <p><b>Задача 6: queryString</b></p>

    <p>Реализуйте функцию, которая преобразует объект в строку в <code>формате GET-запроса</code>. Функция должна:</p>

    <ul class="marker">
        <li>проверять, что на вход подали объект;</li>
        <li>обрабатывать вложенные объекты;</li>
        <li>если среди значений объекта есть массив, каждый элемент массива необходимо превращать в параметр;</li>
        <li>проверять корректность входа — всегда ожидаем объект, иначе выбрасываем ошибку с текстом: 'input must be an object'.</li>
    </ul>


    <pre class="brush: js;">
        type StringIndexed = Record<string, any>;

        const obj: StringIndexed = {
            key: 1,
            key2: 'test',
            key3: false,
            key4: true,
            key5: [1, 2, 3],
            key6: {a: 1},
            key7: {b: {d: 2}},
        };

        const getQueryArray = (obj:any, path:any = [], result:any = []):any =>
            Object.entries(obj).reduce((acc, [ k, v ]) => {
                path.push(k);

                if (v instanceof Object) {
                    getQueryArray(v, path, acc);
                } else {
                    acc.push(`${path.map((n, i) => i ? `[${n}]` : n).join('')}=${v}`);
                }

                path.pop();

                return acc;
            }, result);

        function queryStringify(data: StringIndexed): string | never {
          const getQueryString = obj => getQueryArray(obj).join('&');
            const queryString = getQueryString(data);
            return queryString;
        }

        export default queryStringify

        queryStringify(obj); // 'key=1&key2=test&key3=false&key4=true&key5[0]=1&key5[1]=2&key5[2]=3&key6[a]=1&key7[b][d]=2'
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
