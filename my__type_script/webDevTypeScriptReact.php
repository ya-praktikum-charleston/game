<?php include '../include/header.php'; ?>

<div class="nav_bar">
    <br>
    <p><i>Содержание:</i></p>
    <ul>
        <li><a class="list-sub__link" href="#Part1">#1 Установка окружения (Setup Environment)</a></li>
        <li><a class="list-sub__link" href="#Part2">#2 Типизация функциональных компонентов (Typing of Functional Components)</a></li>
        <li><a class="list-sub__link" href="#Part3">#3 Типизация классовых компоненты (Typing of Class Components)</a></li>
        <li><a class="list-sub__link" href="#Part4">#4 Типизация событий (Typing of Events)</a></li>
        <li><a class="list-sub__link" href="#Part5">#5 Типизация элементов (Typing of Elements)</a></li>
        <li><a class="list-sub__link" href="#Part6">#6 Типизация контекста и портала (Typing of Context & Portal)</a></li>
        <li><a class="list-sub__link" href="#Part7">#7 Типизация Хуков (Typing of Hooks)</a></li>
        <li><a class="list-sub__link" href="#Part8">#8 Типизация ХОК-ов (Typing of HOCs)</a></li>
        <li><a class="list-sub__link" href="#Part9">#9 Типизация Роутера (Typing of React Router)</a></li>
        <li><a class="list-sub__link" href="#Part10">#10 Типизация асинхронных функций (Typing of Fetch with Async & Await)</a></li>
        <li><a class="list-sub__link" href="#Part11">#11 Типизация Редакса (Typing of Redux. Part I)</a></li>
        <li><a class="list-sub__link" href="#Part12">#12 Типизация Редакса (Typing of Redux. Part II)</a></li>
    </ul>
</div>


<div class="linear" id="Part1">

    <h2>TypeScript & React #1 Установка окружения (Setup Environment)</h2>

    <p><a target="_blank" href="http://websketches.ru/blog/todo-na-react-i-typescript">Интересная ссылка</a></p>

    <pre class="brush: js;">
        // npm install -g typescript
    </pre>

    <pre class="brush: js;">
        // tsconfig.json

        {
            "compilerOptions": {
                "target": "es5",
                "lib": [
                "dom",
                "dom.iterable",
                "esnext"
                ],
                "allowJs": true,
                "skipLibCheck": true,
                "esModuleInterop": true,
                "allowSyntheticDefaultImports": true,
                "strict": true,
                "forceConsistentCasingInFileNames": true,
                "module": "esnext",
                "moduleResolution": "node",
                "resolveJsonModule": true,
                "isolatedModules": true,
                "noEmit": true,
                "jsx": "react"
            },
            "include": [
                "src"
            ]
        }
    </pre>

    <pre class="brush: js;">
        // Файл "tsconfig.json":
        // - устанавливает корневой каталог проекта TypeScript;
        // - выполняет настройку параметров компиляции;
        // - устанавливает файлы проекта.
        // Присутствие файла "tsconfig.json" в папке указывает TypeScript, что это корневая папка проекта.
        // Внутри "tsconfig.json" указываются настройки компилятора TypeScript и корневые файлы проекта.
        // Программа компилятора "tsc" ищет файл "tsconfig.json" сначала в папке, где она расположена, затем поднимается выше и ищет в родительских папках согласно их вложенности друг в друга.
        // Команда "tsc --project C:\path\to\my\project\folder" берет файл "tsconfig.json" из папки, расположенной по данному пути.
        // Файл "tsconfig.json" может быть полностью пустым, тогда компилятор скомпилирует все файлы с настройками заданными по умолчанию.
        // Опции компилятора, перечисленные в командной строке перезаписывают собой опции, заданные в файле "tsconfig.json".

        {
        // Загрузить другой конфигурационный файл "tsconfig.json", взятый за основу, и перезаписать его значениями из секций ниже.	
        "extends": "./configs/base", 		
        
        // При значении true указывает используемой редактору кода производить компиляцию при каждом сохранении файлов TypeScript. Поддерживается не всеми редакторами кода.
        "compileOnSave": true,			
        
        // Настраивает параметры компиляции. Параметры называются также, как и в командной строке.
        "compilerOptions": {

            // Основные настройки и настройки путей для создания выходных файлов:
                
            // Определяет тип импорта кода в итоговом файле, прописанном в "outFile". Необходимо задавать при использовании опции "outFile".
            "module": "amd",
                
            // Имя единого итогового выходного файла, в который будут помещен код из всех найденных TypeScript-файлов.
            "outFile": "./build/bundle.js",
                
            // Поместить все скомпилированные файлы в данную папку, согласно их вложенности в исходниках. Если задана опция "outFile", то опция "outDir" будет проигнорирована.
            // Если "outFile" и "outDir" не заданы, то выходные файлы будут созданы рядом со своими исходниками.
            "outDir": "./build",
                
            // Настройки для поиска @types
            // По умолчанию все видимые в проекте пакеты "@types", расположенные в папках "node_modules" на всех уровнях вложенности, используются при компиляции.
            // Но, если указан массив "typeRoots", тогда при компиляции будут использованы только описания типов, найденные в папках, расположенных по перечисленным в нем путях.
            // При этом описания типов, находящихся в других папках использованы не будут.
            // Папки с пакетами описаний типов обычно содержат внутри себя файл "index.d.ts" или "package.json" со свойством "types".
            // При компиляции будут использованы только файлы описания типов ".d.ts" находящиеся в этой папке.
            "typeRoots" : [ 					
                "./typings" 						
            ],
                
            // Если указан параметр "types", то из всех найденных будут использованы только те описания типов, что указаны в его массиве, а именно: "./typings/node", "./typings/lodash", "./typings/express".
            // Другие найденные типы использоваться не будут.
            // Задание "types": [] приведет к отключению автоматического использования описаний типов из папок "@types".
            "types" : ["node", "lodash", "express"],
                
            // Путь до папки с которой надо начинать поиск входных файлов. Обычно корневая директория вычисляется по списку входных файлов. Данная опция необходима для проверки, что все найденные TypeScript-файлы находятся внутри корневой папки.
            "rootDir": "../src",
                
            // Список корневых папок, совокупный контент которых представляет структуру проекта для компиляции.
            "rootDirs": [
            "src/views",
            "generated/templates/views"
            ],
                
            // Путь до базовой папки для поиска не относительных путей до файлов.
            "baseUrl": ".",
                
            // Укажите сопоставление маршрутов для вычисления по сравнению с параметром baseUrl.
            "paths": {
            "jquery": ["node_modules/jquery/dist/jquery"] // Путь относительно "baseUrl".
            },
                
            // Набор библиотечных файлов полифилов, которые будут включены в итоговый выходной файл.
            "lib": ["es5", "es6", "es2015.promise", "es2016.array.include"],
                
            // Тип кода создаваемого итогового файла.
            "target": "es3",
                
            // Включать ли поддержку ".tsx" файлов?
            "jsx": "react",
                
            // Укажите фабричную функцию JSX, чтобы использовать, когда таргетинг реагирует на обработку JSX, например: 'React.createElement' или 'h'. Требуется TypeScript версии 2.1 или новее.
            "jsxFactory": "React.createElement",
                
            // Разрешать компилировать файлы с JavaScript-кодом?
            "allowJs": false,
                
            // Сообщить об ошибках в .js-файлах? Используйте совместно с "allowJs".
            "checkJs": false,
                
            // Обеспечьте полную поддержку итераций для for - in, ..., деструктуризации при настройке на ES5 или ES3?
            "downlevelIteration": false,
                
            // Не создавать итоговый файл, если во время компиляции произошла ошибка.
            "noEmitOnError": true,
                
            // Не помещать в код итогового файла функции хелперы.
            "noEmitHelpers": false,
                
            // Имортировать созданные хелперы (__extends, __rest и так далее) из "tslib".
            "importHelpers": false,
                
            // Показывать ошибку, если где-то найдены неиспользуемые локальные значения.
            "noUnusedLocals": true,
                
            // Показывать ошибку, если где-то найдены неиспользуемые параметры.
            "noUnusedParameters": true,
                
            // Значения "null" и "undefined" могут быть присвоены только значениям данного типа и значениям только с типом "any"?
            "strictNullChecks": false,
                
            // Не записывать 'use strict' в итоговый выходной файл?
            "noImplicitUseStrict": false,
                
            // Компилировать ли каждый файл в строгом режиме и создавать ли 'use strict' для каждого выходного файла? Требуется TypeScript версии 2.1 или новее.
            "alwaysStrict": true,
                
            // Включить ли все строги проверки типов сразу: noImplicitAny, noImplicitThis, alwaysStrict, strictNullChecks, strictFunctionTypes, strictPropertyInitialization?
            "strict": false,
                
            // Удалить все комментарии из итогового файла.
            "removeComments": true,
                
            // Создавать ли соответствующие source map файлы ".map"?
            "sourceMap": true,
                
            // Окрашивать в терминале сообщения об ошибках.
            "pretty": true,
                
            // Запустить компилятор в режиме отслеживания изменений во входных файлах и их повторной компиляции?
            "watch": true,

            // Дополнительные настройки:
                
            // Кодировка входных файлов.
            "charset": "utf8",
                
            // Создавать ли соответствующие файлы ".d.ts"?
            "declaration": false,
                
            // Путь до папки, в которую будут записаны созданные соответствующие файлы ".d.ts".
            "declarationDir": ".",
                
            // Показывать ли диагностическую информацию?
            "diagnostics": false,
                
            // Записывать ли UTF-8 Byte Order Mark (BOM) в начало итогового файла?
            "emitBOM": false,
                
            // Помещать ли source map в итоговый файл, вместо того чтобы иметь отдельный файл с source map?
            "inlineSourceMap": false,
                
            // Помещать ли source в итоговый файл рядом с source map?
            "inlineSources": false,
                
            // Печатать ли имена файлов при компиляции?
            "listFiles": false,
                
            // Путь до папки, в которой дебаггер браузера должен будет искать файлы с source map.
            "mapRoot": ".",
                
            // Определяет тип завершения строк в итоговом файле.
            "newLine": "CRLF",
                
            // Не создавать итоговый файл.
            "noEmit": false,
                
            // Показывать ошибку, если где-то задан тип "any".
            "noImplicitAny": false,
                
            // Показывать ошибку на "this", если где-то задан тип "any".
            "noImplicitThis": false,
                
            // Не использовать стандартный библиотечный файл по умолчанию (lib.d.ts).
            "noLib": false,
                
            // Не добавлять "/// <reference path="..." />" в список скомпилированных файлов.
            "noResolve": false,
                
            // Отключить строгую проверку типов джинериков в типах функций?
            "noStrictGenericChecks": false,
                
            // Пропустить проверку типов из стандартной библиотеки по умолчанию?
            "skipDefaultLibCheck": false,
                
            // Не проверять типы, заданные во всех файлах описания типов (*.d.ts)?
            "skipLibCheck": false,
                
            // Не удалять объявления const enum из итогового файла.
            "preserveConstEnums": false,
                
            // Не заменять символические ссылки на их реальный путь, обрабатывать символический файл как реальный.
            "preserveSymlinks": false,
                
            // Обрабатывать каждый файл, как отдельный изолированный модуль.
            "isolatedModules": false,
                
            // Путь до папки, в которой дебаггер должен искать исходные source файлы.
            "sourceRoot": ".",
                
            // Подавлять избыточные проверки свойств для объектных литералов?
            "suppressExcessPropertyErrors": false,
                
            // Подавлять "noImplicitAny" ошибки для индексирования объектов, не имеющих индексных подписей.
            "suppressImplicitAnyIndexErrors": false,
                
            // Не создавать объявления для кода, который имеет аннотацию JSDoc /** @internal */.
            "stripInternal": false,
                
            // Включить экспериментальную поддержку декораторов EcmaScript?
            "experimentalDecorators": false,
                
            // Создавать метаданные для объявлений декораторов в исходном коде?
            "emitDecoratorMetadata": false,
                
            // Определить способ поиска модулей в папках: как в Node.js или классический, как в TypeScript 1.5 и ниже.
            "moduleResolution": "classic",
                
            // Не создавать сообщений об ошибках, если в коде найдены неиспользуемые метки label?
            "allowUnusedLabels": false,
                
            // Сообщить об ошибке, когда не все пути кода в функции возвращают значение?
            "noImplicitReturns": false,
                
            // Сообщить об ошибке в случае обнаружения проваливания в конструкции switch-case?
            "noFallthroughCasesInSwitch": false,
                
            // Сообщить об ошибке в случае обнаружения кода, который никогда не будет выполнен?
            "allowUnreachableCode": false,
                
            // Запретить несогласованные ссылки на один и тот же файл?
            "forceConsistentCasingInFileNames": false,
                
            // Список плагинов для сервера языка TypeScript для загрузки. Требуется TypeScript версии 2.3 или новее.
            "plugins": [],
                
            // Выводить в логи сообщения о нахождении путей до модулей.
            "traceResolution": false,
                
            // Разрешить импортировать модули не имеющие внутри себя "import default"?
            "allowSyntheticDefaultImports": false,
                
            // Печатать список всех выходных файлов при компиляции. Требуется TypeScript версии 2.0 или новее.
            "listEmittedFiles": false,
                
            // Отключить ограничение размера в проекте JavaScript.
            "disableSizeLimit": false,
                
            // Максимальная глубина поиска зависимостей внутри node_modules и загрузки файлов JavaScript. Применяется только вместе с заданной опцией "allowJs".
            "maxNodeModuleJsDepth": 0,
            
            // Отключить проверку бивариантных параметров для типов функций.
            "strictFunctionTypes": false,
            
            // Убедитесь, что свойства класса, имеющие значения undefined, получают новые значения внутри конструктора.
            "strictPropertyInitialization": false,
            
            // Создать хелперы __importStar и __importDefault для обеспечения совместимости с экосистемой Babel и включить allowSyntheticDefaultImports для совместимости с системой типов.
            "esModuleInterop": false,
        }
        
        // Список относительных или абсолютных путей до конкретных исходных файлов, которые обязательно надо скомпилировать.
        // Если секция "files" не указана, то компилятор по умолчанию включает все файлы с расширением *.ts и *.tsx, которые находятся в корневой папке и внутренних подпапках проекта.
        // Если секция "files" указана, то скомпилируются файлы, которые в ней перечислены.
        // Все файлы, на которые есть ссылки в файлах из секции "files", также скомпилируются.
        "files": [ 
            "core.ts",
            "app.ts"
        ],
        
        // Вместе с компиляцией только конкретных исходных файлов можно компилировать только файлы в заданных папках, которые будут найдены через регулярные выражения, которые принимают только следующие значения:
        // - букву или цифру;
        // - * - ноль или более любых символов, не включая разделители директорий "/" и "\";
        // - ? - один любой символ, не включая разделители директорий "/" и "\";
        // - **/ - рекурсивно включить любую подпапку.
        // Если путь до папки заканчивается так "*" или так ".*", тогда в ней будут скомплированы все файлы с расширениями .ts, .tsx, .d.ts, а также .js и .jsx, если опция "allowJs" будет равна true.
        
        // Секция "include" позволяет скомпилировать все файлы, находящиеся в заданных папках.
        // Если секция "files" и секция "include" заданы вместе, то будут скомпилированы только файлы, перечисленные в обеих секциях.
        // Все файлы, на которые есть ссылки во включенных файлах из секции "files" и секции "include", также скомпилируются.
        "include": [ 
            "src/**/*",
        ],
        
        // Секция "exclude" позволяет исключить при компиляции определенные файлы, которые находятся в заданных папках секции "include" или в папках всего проекта, если секция "include" не задана.
        // Компилятор не будет учитывать перечисленные в секции "exclude" файлы TypeScript, которые находятся в папках из секции "include".
        // Однако файлы, заданные в секции "files" будут обязательно скомпилированы.
        // Если секция "exclude" не указана, то по умолчанию будут исключаться из компиляции все файлы из папок:
        // - node_modules,
        // - bower_components,
        // - jspm_packages,
        // - файлы из папки, указанной в опции компилятора "outDir".
        "exclude": [
            "src/**/*.spec.ts",
            "node_modules"
        ]
        }
    </pre>

</div>

<div class="linear" id="Part2">

    <h2>#2 Типизация функциональных компонентов (Typing of Functional Components)</h2>

    <pre class="brush: js;">
        // App.tsx
        
        import React from &apos;react&apos;;

        // const Title:React.FC&lt;{title: string}&gt; = ({title, children}) =&gt; &lt;h1&gt;{title}{children}&lt;/h1&gt;;

        type TitleProps = {
            title: string,
            test?: string,
        }

        const Title = ({title, test = &apos;test&apos;}: TitleProps) =&gt; &lt;h1&gt;{title}{test}&lt;/h1&gt;;

        const App = () =&gt; &lt;Title title=&quot;test&quot; /&gt;

        export default App;
    </pre>

</div>

<div class="linear" id="Part3">

    <h2>#3 Типизация классовых компоненты (Typing of Class Components)</h2>

    <pre class="brush: js;">
        import React, { Component } from &apos;react&apos;;

        type CounterState = {
            count: number,
        }

        type CounterProps = {
            title?: string,
        }

        class Counter extends Component&lt;CounterProps, CounterState&gt; {
            constructor(props: CounterProps) {
                super(props)

                this.state = {
                    count: 0,
                }
            }

            static defaultProps: CounterProps = {
                title: &quot;Default counter: &quot;,
            }

            static getDerivedStateFromProps(props: CounterProps, state: CounterState): CounterState | null {
                return false ? { count: 2 } : null;
            }

            componentDidMount():void {

            }

            shouldComponentUpdate(nextProps: CounterProps, nextState: CounterState): boolean {
                return true;
            }

            handleClick = () =&gt; {
                this.setState(({ count }) =&gt; ({
                count: ++count,
                }));

                // this.state.count = ++count; &lt;-- Never do this
            }

            render() {
                // this.props.title = &apos;&apos;; &lt;-- And this...

                return (
                &lt;div&gt;
                    &lt;h1&gt;{this.props.title}{this.state.count}&lt;/h1&gt;
                    &lt;button onClick={this.handleClick}&gt;+1&lt;/button&gt;
                &lt;/div&gt;
                );
            }
        }

        const App = () =&gt; &lt;Counter title=&quot;Counter: &quot; /&gt;

        export default App;
    </pre>

</div>

<div class="linear" id="Part4">

    <h2>#4 Типизация событий (Typing of Events)</h2>

    <pre class="brush: js;">
        // Полный список событий
        /*
            - AnimationEvent            - ChangeEvent
            - ClipboardEvent            - CompositionEvent
            - DragEvent                 - FocusEvent
            - FormEvent                 - KeyboardEvent
            - MouseEvent                - PointerEvent
            - TouchEvent                - TransitionEvent
            - WheelEvent
        */
    </pre>

    <pre class="brush: js;">
        // Пример Клика

        import React, { Component } from &apos;react&apos;;
      
        type CounterState = {
            count: number,
        }
        type CounterProps = {
            title?: string, 
        }
        class Counter extends Component&lt;CounterProps, CounterState&gt; {
            state = {
                count: 0,
            }
            handleClick = (e: React.MouseEvent&lt;HTMLButtonElement | HTMLAnchorElement&gt;) =&gt; {
                console.log(`${e.clientX}, ${e.clientY}`);
                this.setState(({ count }) =&gt; ({
                count: ++count,
                }));
            }
            render() {
                return (
                &lt;div&gt;
                    &lt;h1&gt;{this.props.title}{this.state.count}&lt;/h1&gt;
                    &lt;button onClick={this.handleClick}&gt;+1&lt;/button&gt;
                    &lt;a href=&quot;#&quot; onClick={this.handleClick}&gt;Link&lt;/a&gt;
                &lt;/div&gt;
                );
            }
        }
        
    </pre>

    <pre class="brush: js;">
        // Пример Submit 

        import React, { Component } from &apos;react&apos;;
        
        class Form extends Component&lt;{}, {}&gt; {

        handleFocus = (e: React.FocusEvent&lt;HTMLInputElement&gt;) =&gt; {
            console.log(e.currentTarget);
        }

        handleSubmit = (e: React.FormEvent&lt;HTMLFormElement&gt;) =&gt; {
            e.preventDefault();
            console.log(&apos;Submitted!&apos;);
        }

        handleCopy = (e: React.ClipboardEvent&lt;HTMLInputElement&gt;) =&gt; {
            console.log(&apos;Coppied!&apos;);
        }

        render() {
            return (
            &lt;form
                onSubmit={this.handleSubmit}
            &gt;
                &lt;label&gt;
                Simple text:
                &lt;input
                    onFocus={this.handleFocus}
                    onCopy={this.handleCopy}
                    type=&quot;text&quot;
                    name=&quot;text&quot;
                /&gt;
                &lt;button
                    type=&quot;submit&quot;
                &gt;Submit&lt;/button&gt;
                &lt;/label&gt;
            &lt;/form&gt;
            );
        }
        }

        const App:React.FC = () =&gt; &lt;Form /&gt;;

        export default App;
    </pre>

</div>

<div class="linear" id="Part5">

    <h2>#5 Типизация элементов (Typing of Elements)</h2>

    <pre class="brush: js;">
        import React, { Component } from &apos;react&apos;;

        type Position = {
            id: string,
            value: string,
            title: string,
        }

        type FormState = {
            inputText: string,
            textareaText: string,
            selectText: string,
            showData: {
                name: string,
                text: string,
                position: string,
            }
        }

        const POSITIONS: Array&lt;Position&gt; = [
            {
                id: &apos;fd&apos;,
                value: &apos;Front-end Developer&apos;,
                title: &apos;Front-end Developer&apos;,
            },
            {
                id: &apos;bd&apos;,
                value: &apos;Back-end Developer&apos;,
                title: &apos;Back-end Developer&apos;,
            }
        ];

        const DEFAULT_SELECT_VALUE:string = POSITIONS[0].value;
        const styles: React.CSSProperties = { display: &apos;block&apos;, marginBottom: &apos;10px&apos; };

        class Form extends Component&lt;{}, FormState&gt; {
        
        state = {
            inputText: &apos;&apos;,
            textareaText: &apos;&apos;,
            selectText: DEFAULT_SELECT_VALUE,
            showData: {
            name: &apos;&apos;,
            text: &apos;&apos;,
            position: &apos;&apos;,
            }
        }

        private rootRef = React.createRef&lt;HTMLSelectElement&gt;();

        handleInputChange = (e: React.ChangeEvent&lt;HTMLInputElement&gt;):void =&gt; {
            const { target: { value: inputText } } = e;
            this.setState({ inputText });
        };

        handleTextareaChange = (e: React.ChangeEvent&lt;HTMLTextAreaElement&gt;):void =&gt; {
            const { target: { value: textareaText } } = e;
            this.setState({ textareaText });
        };

        handleSelectChange = (e: React.ChangeEvent&lt;HTMLSelectElement&gt;):void =&gt; {
            const { target: { value: selectText } } = e;
            this.setState({ selectText });
        };

        handleShow = (e: React.MouseEvent&lt;HTMLButtonElement&gt;):void =&gt; {
            e.preventDefault();
            const { inputText, textareaText, selectText } = this.state;

            this.setState({
                inputText: &apos;&apos;,
                textareaText: &apos;&apos;,
                selectText: DEFAULT_SELECT_VALUE,
                showData: {
                    name: inputText,
                    text: textareaText,
                    position: selectText,
                }
            })
        };

        render() {
            const { inputText, textareaText, selectText, showData } = this.state;
            const { name, text, position } = showData;

            return (
            &lt;&gt;
                &lt;form&gt;
                &lt;label style={styles}&gt;
                    Name:
                    &lt;input
                    type=&quot;text&quot;
                    value={inputText}
                    onChange={this.handleInputChange}
                    /&gt;
                &lt;/label&gt;

                &lt;label style={styles}&gt;
                    Text:
                    &lt;textarea
                    value={textareaText}
                    onChange={this.handleTextareaChange}
                    /&gt;
                &lt;/label&gt;

                &lt;select
                    style={styles}
                    value={selectText}
                    onChange={this.handleSelectChange}
                    ref={this.rootRef}
                &gt;
                    {POSITIONS.map(({ id, value, title }) =&gt; (
                    &lt;option
                        key={id}
                        value={value}
                    &gt;{title}&lt;/option&gt;
                    ))}
                &lt;/select&gt;

                &lt;button onClick={this.handleShow}&gt;Show Data&lt;/button&gt;
                &lt;/form&gt;

                &lt;h2&gt;{name}&lt;/h2&gt;
                &lt;h3&gt;{text}&lt;/h3&gt;
                &lt;h3&gt;{position}&lt;/h3&gt;
            &lt;/&gt;
            );
        }
        }

        const App:React.FC = () =&gt; &lt;Form /&gt;;

        export default App;
    </pre>

</div>

<div class="linear" id="Part6">

    <h2>#6 Типизация контекста и портала (Typing of Context & Portal)</h2>

    <p><b>Типизация контекста</b></p>

    <pre class="brush: js;">
        import React, { Component } from &apos;react&apos;;
        import ReactDOM from &apos;react-dom&apos;;

        interface IContext {
            isAuth: Boolean,
            toggleAuth: () =&gt; void,
        }

        // Context creation
        const AuthContext = React.createContext&lt;IContext&gt;({
            isAuth: false,
            toggleAuth: () =&gt; {},
        });

        // Inner component (new syntax of static property)
        class Login extends Component {

        static contextType = AuthContext;
        context!: React.ContextType&lt;typeof AuthContext&gt;

        render() {
            const { toggleAuth, isAuth } = this.context;

            return (
            &lt;button onClick={toggleAuth}&gt;
                {!isAuth ? &apos;Login&apos; : &apos;Logout&apos;}
            &lt;/button&gt;
            );
        }
        }

        // Inner component (old variant with Consumer)
        const Profile: React.FC = (): React.ReactElement =&gt; (
            &lt;AuthContext.Consumer&gt;
                {({ isAuth }: IContext) =&gt; (
                &lt;h1&gt;{!isAuth ? &apos;Please log in&apos; : &apos;You are logged in&apos;}&lt;/h1&gt;
                )}
            &lt;/AuthContext.Consumer&gt;
        );

        // Root component
        class Context extends Component&lt;{}, { isAuth: Boolean }&gt; {
        readonly state = {
            isAuth: false,
        };

        toggleAuth = () =&gt; {
            this.setState(({ isAuth }) =&gt; ({
            isAuth: !isAuth
            }));
        };

        render() {
            const { isAuth } = this.state;
            const context: IContext = { isAuth, toggleAuth: this.toggleAuth };

            return (
            &lt;AuthContext.Provider value={context}&gt;
                &lt;Login /&gt;
                &lt;Profile /&gt;
            &lt;/AuthContext.Provider&gt;
            );
        }
        }


        const App:React.FC = () =&gt; &lt;Context /&gt;;

        export default App;
    </pre>

    <p><b>Типизация портала</b></p>

    <pre class="brush: js;">
        import React, { Component } from &apos;react&apos;;
        import ReactDOM from &apos;react-dom&apos;;


        type PortalProps = {
            children: React.ReactNode,
        }
        class Portal extends Component&lt;PortalProps&gt; {
            private el: HTMLDivElement = document.createElement(&apos;div&apos;);
            public componentDidMount():void {
                document.body.appendChild(this.el);
            }
            public componentWillUnmount():void {
                document.body.removeChild(this.el);
            }
            public render(): React.ReactElement&lt;PortalProps&gt; {
                return ReactDOM.createPortal(this.props.children, this.el);
            }
        }
        class MyComponent extends Component&lt;{}, { count: number }&gt; {
        state = {
            count: 0,
        }
        handleClick = () =&gt; {
            this.setState(({ count }) =&gt; ({
            count: ++count,
            }));
        }
        render() {
            return (
            &lt;div onClick={this.handleClick}&gt;
                &lt;h1&gt;Clicks: {this.state.count}&lt;/h1&gt;
                &lt;Portal&gt;
                &lt;h2&gt;TEST PORTAL&lt;/h2&gt;
                &lt;button&gt;Click&lt;/button&gt;
                &lt;/Portal&gt;
            &lt;/div&gt;
            );
        }
        }

        const App:React.FC = () =&gt; &lt;Context /&gt;;

        export default App;
    </pre>

</div>

<div class="linear" id="Part7">

    <h2>#7 Типизация Хуков (Typing of Hooks)</h2>

    <pre class="brush: js;">
        import React, { Component } from &apos;react&apos;;


        // --------- useState ---------
        // Inferred as number
        const [value, setValue] = useState(0);
        // Explicitly setting the types
        const [value, setValue] = useState&lt;number | undefined&gt;(undefined);
        const [value, setValue] = useState&lt;Array&lt;number&gt;&gt;([]);
        interface IUser {
            name: string;
            age?: number;
        }
        const [value, setValue] = useState&lt;IUser&gt;({ name: &apos;Yauhen&apos; });


        // --------- useRef ---------
        const ref1 = useRef&lt;HTMLElement&gt;(null!);
        const ref2 = useRef&lt;HTMLElement | null&gt;(null);


        // --------- useContext ---------
        interface ITheme {
            backgroundColor: string;
            color: string;
        }
        // Context creation
        const ThemeContext = createContext&lt;ITheme&gt;({
            backgroundColor: &apos;black&apos;,
            color: &apos;white&apos;,
        })
        // Accessing context in a child component
        const themeContext = useContext&lt;ITheme&gt;(ThemeContext);


        // --------- useReducer ---------
        interface State { count: number; }
        type Action = { type: &apos;increment&apos; | &apos;decrement&apos; }
        const counterReducer = ({ count }: State, { type }: Action) =&gt; {
            switch (type) {
                case &apos;increment&apos;: return { count: count + 1 };
                case &apos;decrement&apos;: return { count: count - 1 };
                default: return {};
            }
        };
        const [state, dispatch] = useReducer(counterReducer, { count: 0 });
        dispatch({ type: &apos;increment&apos; });
        dispatch({ type: &apos;decrement&apos; });


        // --------- useCallback &amp; useMemo ---------
        // Callback
        // Inferred as number
        const memoizedCallback = useCallback(() =&gt; { sum(a, b); }, [a, b]);
        // Memo
        // Inferred as (value1: number, value2: number) =&gt; number
        const memoizedValue = useMemo((a: number, b: number) =&gt; sum(a, b), [a, b]);


        // --------- useEffect &amp; useLayoutEffect ---------
        useEffect(() =&gt; {
            const subscriber = subscribe(options);
            return () =&gt; {
                unsubscribe(subscriber)
            };
        }, [options]);


        const App:React.FC = () =&gt; null;

        export default App;
    </pre>

</div>

<div class="linear" id="Part8">

    <h2>#8 Типизация ХОК-ов (Typing of HOCs)</h2>

    <pre class="brush: js;">
        import React, { useState } from &apos;react&apos;;

        type BaseProps = {
            primTitle: string,
            secTitle?: string,
        }

        type InjectedProps = {
            toggleStatus: Boolean,
            toggle: () =&gt; void,
        }

        const Button = ({ primTitle, secTitle, toggle, toggleStatus }: any) =&gt; (
        &lt;button onClick={toggle}&gt;
            {toggleStatus ? primTitle: secTitle}
        &lt;/button&gt;
        );

        const withToggle = &lt;BaseProps extends InjectedProps&gt;(PassedComponent: React.ComponentType&lt;BaseProps&gt;) =&gt; {
            return (props: BaseProps) =&gt; {
                const [toggleStatus, toggle] = useState(false);

                return (
                &lt;PassedComponent
                    {...props as BaseProps}
                    toggle={() =&gt; toggle(!toggleStatus)}
                    toggleStatus={toggleStatus}
                /&gt;
                );
            }
        }

        const ToogleButton = withToggle(Button);

        const App:React.FC = () =&gt; &lt;ToogleButton primTitle=&quot;Maint Title&quot; secTitle=&quot;Additional Title&quot; /&gt;;

        export default App;
    </pre>

</div>

<div class="linear" id="Part9">

    <h2>#9 Типизация Роутера (Typing of React Router)</h2>

    <pre class="brush: js;">
        // npm install --save @types/react-router-dom
    </pre>

    <br>

    <pre class="brush: js;">
        // index.tsx
        import React from &apos;react&apos;;
        import ReactDOM from &apos;react-dom&apos;;
        import { BrowserRouter, Switch, Route } from &apos;react-router-dom&apos;;

        import App from &apos;./App&apos;;
        import Home from &apos;./components/home/home&apos;;
        import Contacts from &apos;./components/contacts/contacts&apos;;
        import Posts from &apos;./components/posts/posts&apos;;
        import Post from &apos;./components/post/post&apos;;

        import &apos;./style.css&apos;;

        ReactDOM.render((
        &lt;BrowserRouter&gt;
        &lt;App&gt;
            &lt;Switch&gt;
            &lt;Route exact path=&apos;/&apos; component={Home} /&gt;
            &lt;Route path=&apos;/contacts&apos; component={Contacts} /&gt;
            &lt;Route exact path=&apos;/posts&apos; component={Posts} /&gt;
            &lt;Route path=&apos;/posts/:id&apos; component={Post} /&gt;
            &lt;/Switch&gt;
        &lt;/App&gt;
        &lt;/BrowserRouter&gt;
        ), document.getElementById(&apos;root&apos;));
    </pre>
    <br>
    
    <pre class="brush: js;">
        // app.tsx
        import React from &apos;react&apos;;

        import Header from &apos;./components/header/header&apos;;
        import Footer from &apos;./components/footer/footer&apos;;

        const App:React.FC = ({ children }) =&gt; (
        &lt;&gt;
            &lt;Header /&gt;
            {children}
            &lt;Footer /&gt;
        &lt;/&gt;
        );

        export default App;
    </pre>

    <pre class="brush: js;">
        // post.tsx
        import React, { Component } from &apos;react&apos;;
        import { RouteComponentProps } from &apos;react-router&apos;;

        type RouteParams = {
            id: string,
        }

        interface IPost {
            title?: string,
            body?: string,
        }

        type PostState = {
            post: IPost,
        }

        class Post extends Component&lt;RouteComponentProps&lt;RouteParams&gt;, PostState&gt; {
            state = {
                post: {
                title: &apos;&apos;,
                body: &apos;&apos;,
                },
            }

            componentDidMount() {
                const id = this.props.match.params.id || &apos;&apos;;

                fetch(`https://jsonplaceholder.typicode.com/posts/${id}`)
                .then(res =&gt; res.json())
                .then(post =&gt; { this.setState({ post }) })
            }

            render() {
                const { post } = this.state;
                const { title, body } = post;

                return (
                &lt;section&gt;
                    &lt;h1&gt;Post&lt;/h1&gt;
                    &lt;article&gt;
                    &lt;h2&gt;{title}&lt;/h2&gt;
                    &lt;p&gt;{body}&lt;/p&gt;
                    &lt;/article&gt;
                &lt;/section&gt;
                );
            }
        };

        export default Post;
    </pre>

    <pre class="brush: js;">
        // posts.tsx
        import React, { Component } from &apos;react&apos;;
        import { Link } from &apos;react-router-dom&apos;;
        import { RouteComponentProps } from &apos;react-router&apos;;

        interface IPost {
            title?: string,
            id?: number,
        }

        type PostState = {
            data: IPost[],
        }

        interface IPosts extends RouteComponentProps {
            test?: number,
        }

        class Posts extends Component&lt;IPosts, PostState&gt; {
            state = {
                data: [],
            }

            componentDidMount() {
                fetch(&apos;https://jsonplaceholder.typicode.com/posts/&apos;)
                .then(res =&gt; res.json())
                .then(data =&gt; { this.setState({ data }) })
            }

            render() {
                const { data } = this.state;
                console.log(this.props.match.params);

                return (
                &lt;div&gt;
                    &lt;h1&gt;Posts:&lt;/h1&gt;
                    &lt;ul className=&quot;posts&quot;&gt;
                    {data.map(({ id, title }: IPost) =&gt;
                        &lt;li key={id}&gt;&lt;Link to={`/posts/${id}`}&gt;{title}&lt;/Link&gt;&lt;/li&gt;
                    )}
                    &lt;/ul&gt;
                &lt;/div&gt;
                );
            }
        };

        export default Posts;
    </pre>

</div>

<div class="linear" id="Part10">

    <h2>#10 Типизация асинхронных функций (Typing of Fetch with Async & Await)</h2>

    <pre class="brush: js;">
        // post.tsx

        import React, { Component } from &apos;react&apos;;
        import { RouteComponentProps } from &apos;react-router&apos;;

        /*
        // Example of full response:
        interface HttpResponse&lt;T&gt; extends Response {
            parsedBody?: T;
            status: number,
            redirect: boolean,
            ...
        }
        export async function http&lt;T&gt;(request: string): Promise&lt;HttpResponse&lt;T&gt;&gt; {
            const response: HttpResponse&lt;T&gt; = await fetch(request);
            response.parsedBody = await response.json();
            return response;
        }
        // Example of errors handling
        export async function http&lt;T&gt;(request: string): Promise&lt;HttpResponse&lt;T&gt;&gt; {
            const response: HttpResponse&lt;T&gt; = await fetch(request);
            try {
                // Error if there is no body
                response.parsedBody = await response.json();
            } catch (ex) {}
            if (!response.ok) {
                // Error if there is response status issue
                throw new Error(response.statusText);
            }
            return response;
        }
        // Using:
        try {
            const resp = await http&lt;IPost&gt;(`https://jsonplaceholder.typicode.com/posts/${id}`);
            console.log(&quot;response&quot;, resp);
        } catch (resp) {
            console.log(&quot;Error&quot;, resp);
        }
        */

        type RouteParams = {
            id: string,
        }

        interface IPost {
            title?: string,
            body?: string,
        }

        type PostState = {
            post: IPost,
        }

        export async function http&lt;T&gt;(reques: string): Promise&lt;T&gt; {
            const response = await fetch(reques);
            const body = await response.json();
            return body;
        }

        class Post extends Component&lt;RouteComponentProps&lt;RouteParams&gt;, PostState&gt; {
            state = {
                post: {
                title: &apos;&apos;,
                body: &apos;&apos;,
                },
            }

            async componentDidMount() {
                const id = this.props.match.params.id || &apos;&apos;;

                const post = await http&lt;IPost&gt;(`https://jsonplaceholder.typicode.com/posts/${id}`);
                this.setState({ post });
            }

            render() {
                const { post } = this.state;
                const { title, body } = post;

                return (
                &lt;section&gt;
                    &lt;h1&gt;Post&lt;/h1&gt;
                    &lt;article&gt;
                    &lt;h2&gt;{title}&lt;/h2&gt;
                    &lt;p&gt;{body}&lt;/p&gt;
                    &lt;/article&gt;
                &lt;/section&gt;
                );
            }
        };

        export default Post;
    </pre>

    <br>

    <pre class="brush: js;">
        // posts.tsx
        
        import React, { Component } from &apos;react&apos;;
        import { Link } from &apos;react-router-dom&apos;;
        import { RouteComponentProps } from &apos;react-router&apos;;

        interface IPost {
            title?: string,
            id?: number,
        }

        type PostState = {
            data: IPost[],
        }

        interface IPosts extends RouteComponentProps {
            test?: number,
        }

        class Posts extends Component&lt;IPosts, PostState&gt; {
            state = {
                data: [],
            }

            componentDidMount() {
                fetch(&apos;https://jsonplaceholder.typicode.com/posts/&apos;)
                .then(res =&gt; res.json() as Promise&lt;IPost[]&gt;)
                .then(data =&gt; { this.setState({ data }) })
            }

            render() {
                const { data } = this.state;
                console.log(this.props.match.params);

                return (
                &lt;div&gt;
                    &lt;h1&gt;Posts:&lt;/h1&gt;
                    &lt;ul className=&quot;posts&quot;&gt;
                    {data.map(({ id, title }: IPost) =&gt;
                        &lt;li key={id}&gt;&lt;Link to={`/posts/${id}`}&gt;{title}&lt;/Link&gt;&lt;/li&gt;
                    )}
                    &lt;/ul&gt;
                &lt;/div&gt;
                );
            }
        };

        export default Posts;
    </pre>

</div>

<div class="linear" id="Part11">

    <h2>#11 Типизация Редакса (Typing of Redux. Part I)</h2>

    <pre class="brush: js;">
        // npm install --save @types/react-redux
        // redux localstorage simple
    </pre>

    <br>

    <pre class="brush: js;">
        // types.ts
        
        import { ADD_TASK, REMOVE_TASK, COMPLETE_TASK, CHANGE_FILTER } from './constants';

        // Store
        export type Filter = string;

        export interface ITask {
            id: number,
            text: string,
            isCompleted: boolean,
        }

        // Actions
        interface IAddTaskAction {
            type: typeof ADD_TASK,
            payload: ITask,
        }

        interface IRemoveTaskAction {
            type: typeof REMOVE_TASK,
            payload: {
                id: number,
            }
        }

        interface ICompleteTaskAction {
            type: typeof COMPLETE_TASK,
            payload: {
                id: number,
            }
        }

        interface IChangeFilterAction {
            type: typeof CHANGE_FILTER,
            payload: {
                activeFilter: Filter,
            }
        }

        export type TaskActionTypes = IAddTaskAction | IRemoveTaskAction | ICompleteTaskAction;
        export type FilterActionType = IChangeFilterAction;
    </pre>

    <br>

    <pre class="brush: js;">
        // actionCreator.ts
        import { ADD_TASK, REMOVE_TASK, COMPLETE_TASK, CHANGE_FILTER } from '../constants';
        import { TaskActionTypes, FilterActionType, ITask, Filter } from '../types';

        export const addTast = (task: ITask): TaskActionTypes => ({
            type: ADD_TASK,
            payload: {
                ...task
            },
        });

        export const removeTask = (id: number): TaskActionTypes => ({
            type: REMOVE_TASK,
            payload: {
                id,
            },  
        });

        export const completeTask = (id: number): TaskActionTypes => ({
            type: COMPLETE_TASK,
            payload: {
                id,
            },
        });

        export const changeFilter = (activeFilter: Filter): FilterActionType => ({
            type: CHANGE_FILTER,
            payload: {
                activeFilter,
            },
        });
    </pre>

</div>

<div class="linear" id="Part12">

    <h2>#12 Типизация Редакса (Typing of Redux. Part II)</h2>

    <pre class="brush: js;">
        // filters.js
        import { CHANGE_FILTER } from '../constants';
        import { Filter, FilterActionType } from '../types';

        const BASE_FILTER: Filter = 'all';

        const filter = (state = BASE_FILTER, { type, payload }: FilterActionType):Filter => {
            switch (type) {
                case CHANGE_FILTER:
                return payload.activeFilter;
                default:
                return state;
            }
        }

        export default filter;
    </pre>

    <br>
    
    <pre class="brush: js;">
        // tasks.ts
        import { ADD_TASK, REMOVE_TASK, COMPLETE_TASK } from '../constants';
        import { load } from 'redux-localstorage-simple';
        import { ITask, TaskActionTypes } from '../types';

        type stateTasks = ITask[];

        const savedTasks: any = load({ namespace: 'todo-list' });

        const initialState: stateTasks = (savedTasks && savedTasks.tasks) ? savedTasks.tasks : [];

        const tasks = (state = initialState, action: TaskActionTypes): stateTasks => {
        switch (action.type) {
            case ADD_TASK :
            return [
                ...state, {
                id: action.payload.id,
                text: action.payload.text,
                isCompleted: action.payload.isCompleted,
                }
            ];
            case REMOVE_TASK:
                return [...state].filter(task => task.id !== action.payload.id);
            case COMPLETE_TASK:
                return [...state].map(task => {
                if(task.id === action.payload.id) {
                    task.isCompleted = !task.isCompleted;
                }
                return task;
                });
            default:
            return state;
        }
        }

        export default tasks;
    </pre>

    <br>
    
    <pre class="brush: js;">
        // index.ts
        import { combineReducers } from 'redux';
        import tasks from './tasks';
        import filters from './filters';

        const rootReducer = combineReducers({ tasks, filters });

        export default rootReducer;
        export type RootState = ReturnType<typeof rootReducer>;
    </pre>

    <br>
    
    <pre class="brush: js;">
        // store.ts
        import { createStore, compose, applyMiddleware } from 'redux';
        import rootReducer from './reducers';
        import { save } from 'redux-localstorage-simple'

        /* eslint-disable no-underscore-dangle */
        const composeEnhancers =
        process.env.NODE_ENV !== 'production' &&
        typeof window === 'object' &&
        (window as any).__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ ?
            (window as any).__REDUX_DEVTOOLS_EXTENSION_COMPOSE__({}) : compose;
        /* eslint-enable */

        const configureStore = (preloadedState: any) => (
            createStore(
                rootReducer,
                preloadedState,
                composeEnhancers(
                applyMiddleware(save({ namespace: 'todo-list' }))
                ),
            )
        );

        const store = configureStore({});

        export default store;
    </pre>

</div>


