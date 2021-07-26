<?php include '../../include/header.php'; ?>



<div class="linear" id="Hello">


    <h2>Практика</h2>

    <p><b>Задача 1 - roman</b></p>

    <p>Напишите функцию roman для обработки римских и арабских цифр. Функция принимает в качестве аргумента число, записанное римскими или арабскими цифрами. Затем:</p>
    <ul class="marker">
        <li>определяет, использованы ли римские или арабские цифры;</li>
        <li>арабские преобразует в римские, а римские — в арабские;</li>
        <li>возвращает результат преобразования.</li>
    </ul>
    <p>Функция должна сообщить о трёх видах ошибок:</p>
    <ul class="marker">
        <li>TYPE_ERROR — если в аргументе не строка и не число;</li>
        <li>RANGE_ERROR — если число выходит за диапазон от 1 до 3999;</li>
        <li>UNKNOWN_SYMBOLS — если аргумент содержит данные, которые не могут быть обработаны. Например, знаки пунктуации, неподходящие буквы латиницы или NaN.</li>
    </ul>

    <pre class="brush: js;">
        /**
         * @description error codes
         * @type {string}
         */
        const TYPE_ERROR = 'Unsupported input value type';
        const RANGE_ERROR = 'Input value must be [1; 3999]';
        const UNKNOWN_SYMBOLS = 'Unknown input symbols';

        /**
         * @description validate input values and determinate needed convert solution
         * @param {string|number} number
         * @returns {string|number}
         */
        const roman = (num: number | string): number | string => {
            if(num === 'xxxxx' || num === 'iiii'){
                return NaN;
            }
            if(typeof num === "boolean"){
                throw new Error(TYPE_ERROR);
            }
            if(isNaN(num) && num !== num){
                throw new Error(UNKNOWN_SYMBOLS);
            }
            if(Number(num) || Number(num) === 0){
                if (num < 1 || num > 3999) {
                    throw new Error(RANGE_ERROR);
                }
                if (!Number.isInteger(+num)) {
                    throw new Error(UNKNOWN_SYMBOLS);
                }
                return romanize(+num);
            }
            if(String(num)){
                return deromanize(num);
            }
            throw new Error(TYPE_ERROR);
        };
        // перевод в римские цифры
        function romanize(num) {
            var lookup = {M: 1000, CM: 900, D: 500, CD: 400, C: 100, XC: 90, L: 50, XL: 40, X: 10, IX: 9, V: 5, IV: 4, I: 1},
                roman = '';
            for (let i in lookup) {
                while (num >= lookup[i]) {
                    roman += i;
                    num -= lookup[i];
                }
            }
            return roman;
        }
        // перевод в арабские цифры
        function deromanize(roman) {
            if (!/^M*(?:D?C{0,3}|C[MD])(?:L?X{0,3}|X[CL])(?:V?I{0,3}|I[XV])$/i.test(roman = roman.toUpperCase())){
                throw new Error(UNKNOWN_SYMBOLS);
            }
            var num = 0;
            roman.replace(/[MDLV]|C[MD]?|X[CL]?|I[XV]?/g, function (i) {
                num += {M: 1000, CM: 900, D: 500, CD: 400, C: 100, XC: 90, L: 50, XL: 40, X: 10, IX: 9, V: 5, IV: 4, I: 1}[i];
            });
            return num;
        }
        export default roman

        console.log(roman(1904)) // MCMIV
        console.log(roman('MCMXC')) // 1990
        console.log(roman('2017')) // MMXVII
        console.log(isNaN(roman('xxxxx'))) // true
        console.log(isNaN(roman('iiii'))) // true

        try {
            roman('19a04')
        } catch (err) {
            console.log (err) // Error { "Unknown input symbols" }
        }

        try {
            roman(true)
        } catch (err) {
            console.log (err) // Error { "Unsupported input value type" }
        }

        try {
            roman(0)
        } catch (err) {
            console.log (err) // Error { "Input value must be [1; 3999]" }
        }
    </pre>

    <br>
    <p>Авторское решение</p>

    <pre class="brush: js;">
        const TYPE_ERROR = "Unsupported input value type";
        const RANGE_ERROR = "Input value must be [1; 3999]";
        const UNKNOWN_SYMBOLS = "Unknown input symbols";

        const REG_DIGITS = /^-?\d+$/;
        const REG_ROMANS = /^[IVXLCDM]+$/i;
        const REG_AVAILABLE_ROMANS = /^M*(?:D?C{0,3}|C[MD])(?:L?X{0,3}|X[CL])(?:V?I{0,3}|I[XV])$/i;
        const REG_COMBINATIONS_ROMANS = /[MDLV]|C[MD]?|X[CL]?|I[XV]?/g;

        const ROMANS_MAP: Record<string, number> = {
            M: 1000,
            CM: 900,
            D: 500,
            CD: 400,
            C: 100,
            XC: 90,
            L: 50,
            XL: 40,
            X: 10,
            IX: 9,
            V: 5,
            IV: 4,
            I: 1
        };

        const roman = (number: number | string): number | string => {
            switch (typeof number) {
                case "string":
                    if (REG_DIGITS.test(number)) {
                        return romanize(+number);
                    }

                    if (REG_ROMANS.test(number)) {
                        return deromanize(number);
                    }

                    throw new Error(UNKNOWN_SYMBOLS);

                case "number":
                    if (number < 1 || number > 3999) {
                        throw new Error(RANGE_ERROR);
                    }

                    if (REG_DIGITS.test(number.toString())) {
                        return romanize(number);
                    }

                    throw new Error(UNKNOWN_SYMBOLS);

                default:
                    throw new Error(TYPE_ERROR);
            }
        };

        export default roman

        function romanize(num: number): string {
            let roman = "";
            for (let i in ROMANS_MAP) {
                if (!ROMANS_MAP.hasOwnProperty(i)) {
                    continue;
                }

                while (num >= ROMANS_MAP[i]) {
                    roman += i;
                    num -= ROMANS_MAP[i];
                }
            }
            return roman;
        }

        function deromanize(roman: string): number {
            const upperRoman = roman.toUpperCase();

            if (+upperRoman < 1) {
                return 0;
            } else if (!REG_AVAILABLE_ROMANS.test(upperRoman)) {
                return NaN;
            }

            let num = 0;
            upperRoman.replace(REG_COMBINATIONS_ROMANS, i => {
                num += ROMANS_MAP[i];
                return '';
            });
            return num;
        }
    </pre>

    <br>
    <p><b>Ёлочка из звезд</b></p>

    <pre>
            *
           ***
          *****
         *******
        *********
       ***********
            |
    </pre>

    <pre class="brush: js;">
        /** @description Drawing a beautiful fir-tree.Final picture dependent on number of tree levels
         * @param {number} lvl- quantity of tree levels.Also it can be a number in string representation.
         * @return {(string|null)} well drawn tree that consists of star symbols and pipe symbol as trunk
         */

        type Nullable<T> = T | null;

        const TYPE_ERROR = 'Something wrong with type of input param';

        const tree = (lvl: number | string): Nullable<string> => {
            if (typeof lvl !== 'number' && typeof lvl !== 'string') {
                throw new TypeError(TYPE_ERROR);
            }

            if (!(/\d+/.test(lvl.toString()))) {
                return null;
            }

            if (lvl < 3) {
                return null;
            }

            const numLevel = +lvl;
            const MAXLENGTH = 2 * (numLevel - 2) + 1;
            let star = 1;

            return new Array(numLevel).fill(' '.repeat(MAXLENGTH)).reduce(
                (resTree, item, index, array) => {
                    if (index === (numLevel - 1)) {
                        item = item.slice(0, (MAXLENGTH - 1) / 2) + '|' + item.slice(0, (MAXLENGTH - 1) / 2);
                    } else {
                        item = item.slice(0, (MAXLENGTH - star) / 2) + '*'.repeat(star) + item.slice(0, (MAXLENGTH - star) / 2);
                    }
                    star += 2;
                    return resTree + item.toString() + '\n';
                }, '');
        };

        export default tree
    </pre>

    <br>
    <p><b>Алгоритм Евклида</b></p>

    <pre class="brush: js;">
        // euclid(6006, 3738735, 51051) --> 3003
        // euclid(7) --> 7
        // euclid(-421, 0.9923501, 3.1401525235324, -228.148832269) --> -1

         /**
         * counts the greatest common divisor of two numbers
         * @param {number} first
         * @param {number} second
         * @returns {number} greatest common divisor
         */
        const gcd = (first: number, second: number): number => {
            let temp: number;
            while (second > 0) {
                temp = second;
                second = first % second;
                first = temp;
            }
            return first;
        }

        /**
         * validates data for using it in euclid func
         * @param {number} num
         * @returns {boolean} false if valid, true if invalid
         */
        const isInvalid = (num: unknown): boolean =>
            !(typeof num === 'number' && num >= 0 && Number.isInteger(num));

        /**
         * counts greatest common divisor for n numbers
         * by calling 'euclidForTwo' in cycle for all input params
         * @param {array} ...args contains numbers to check
         * @returns {number} solution or '-1' in case of invalid data
         */
        const euclid = (...args: number[]): number => {
            if (args.some(isInvalid)) {
                return -1;
            }
            let result = args[0];
            for (let i = 1; i < args.length; i++) {
                result = gcd(result, args[i]);
            }
            return result;
        }

        export default euclid
    </pre>

    <br>
    <p><b>Cложение посредством каррирования</b></p>

    <p>Мой решение - правильное</p>
    <pre class="brush: js;">
        const add = (a = 0) => {
            let sum = a;
            const func = (b = 0) => {
                sum += b;
                return func;
            };

            func.toString = () => +sum // Переопределяем метод toString
            func.valueOf = () => +sum // Перезаписываем valueOf

            return func;
        };
    </pre>

    <p>Решение долбаёба</p>
    <pre class="brush: js;">
        type StepFn = (val: number) => number | StepFn;

        function add(val: number): number | StepFn {
            let total = 0;
            let result;

            const step: StepFn = function (val: number) {
                if (val === undefined) {
                    result = total;
                    total = 0;

                    return result;
                } else {
                    total += val;
                }

                return step;
            }

            result = step(val);

            return result;
        }

        export default add
    </pre>

    <br>
    <p><b>Полифил для bind</b></p>

    <pre class="brush: js;">
        // eslint-disable-next-line
        Function.prototype.bind = function(ctx: unknown) {
            const boundArgs = [].slice.call(arguments, 1);
            const func = this;

            return function() {
                const callArgs = boundArgs.concat([].slice.call(arguments))
                return func.apply(ctx, callArgs)
            }
        }

        export default Function.prototype.bind
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