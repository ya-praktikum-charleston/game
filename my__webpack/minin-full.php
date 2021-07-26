<?php include '../include/header.php'; ?>

<div class="linear" id="use_strict">

    <h2>Команды</h2>

    <pre class="brush: js;">
        npm install --save-dev html-webpack-plugin
        npm install --save-dev clean-webpack-plugin
        npm install --save-dev style-loader
        npm install sass-loader sass webpack --save-dev
        npm install --save-dev css-loader
        npm install --save-dev mini-css-extract-plugin
        npm install -D file-loader
        npm install assets-webpack-plugin --save-dev
        npm install normalize.css
        npm install -D webpack-dev-server
        npm i -D copy-webpack-plugin
        npm i -D cross-env
        npm install terser-webpack-plugin --save-dev
        npm install --save-dev optimize-css-assets-webpack-plugin
        npm install --save-dev webpack-bundle-analyzer

        // препроцессоры
        npm install --save-dev less less-loader
        npm install --save-dev node-sass sass-loader

        // babel-loader
        npm install -D babel-loader @babel/core @babel/preset-env webpack
        // @babel/polyfill
        npm install --save @babel/polyfill
        // @babel/plugin-proposal-class-properties
        npm install --save-dev @babel/plugin-proposal-class-properties
        // @babel/preset-typescript
        npm install --save-dev @babel/preset-typescript

        // eslint-loader
        npm install eslint eslint-loader babel-eslint --save-dev
        // eslint-config-google
        npm install --save-dev eslint eslint-config-google
    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>Установка WebPack</h2>

    <pre class="brush: js;">
        // Инициализация paskage.json
        npm init    //далее идут ответы на вопросы

        // Установка WebPack
        npm i -g webpack-cli        // на случай если следующая команда не будет запускаться

        npm install -D webpack webpack-cli

        // если не работает нужно установить webpack глобально
        npm install -g webpack
    </pre>

    <p>В <code>paskage.json</code> появятся поля:</p>

    <pre class="brush: js;">
        "devDependencies": {
            "webpack": "^5.46.0",
            "webpack-cli": "^4.7.2"
        }
    </pre>

    <p><code>webpack</code> это корневой функционал</p>
    <p><code>webpack-cli</code> этот пакет отвечает за доступные команды в консоли</p>
</div>

<div class="linear" id="use_strict">

    <h2>webpack.config</h2>

    <pre class="brush: js;">
        // подключаем пути
        const path = require('path');

        module.exports = {
            // как webpack будет собирать проект, в каком режиме (разработка или продакшен)
            mode: "development",
            // Входной файл webPack
            entry: './src/index.js',
            // куда сдкладывать результат работы webPack
            output: {
                // файл запуска
                filename: "bundle.js",
                // папка с копиляцией
                path: path.resolve(__dirname, 'dist')
            }
        }
    </pre>

    <p>Проверка запуска сборки командой <code>webpack</code></p>

    <p>Если не работает нужно установить webpack глобально <code>npm install -g webpack</code></p>

</div>

<div class="linear" id="use_strict">

    <h2>Подключение сторонних файлов типа библиотек работающих в фоне</h2>

    <pre class="brush: js;">
        module.exports = {
            entry: {
                main: './src/index.js',
                analytics: './src/analytics.js'
            },
            output: {
                // [name] это паттерн, в который передаются ключи из entry
                filename: "[name].bundle.js",
            }
        }
    </pre>
    <p>для примера закинем в dist <code>index.html</code> и выполним сборку командой <code>webpack</code></p>

    <pre class="brush: html;">
        &lt;head&gt;
            &lt;script src=&quot;analytics.bundle.js&quot;&gt;&lt;/script&gt;
        &lt;/head&gt;
        &lt;body&gt;
            &lt;script src=&quot;main.bundle.js&quot;&gt;&lt;/script&gt;
        &lt;/body&gt;
    </pre>

    <p>В папке dist увидим сборку типа</p>
    <pre class="brush: js;">
        analytics.bundle.js
        index.html
        main.bundle.js
    </pre>
</div>


<div class="linear" id="use_strict">

    <h2>html-webpack-plugin</h2>

    <p>Переменные значения для html файла. Позволяет взимодействовать с html</p>
    <pre class="brush: js;">
        //HtmlWebpackPlugin
        npm install --save-dev html-webpack-plugin

        // для удаления старых файлов в папке dist при изменении в файлах
        npm install --save-dev clean-webpack-plugin
    </pre>

    <pre class="brush: js;">
        const HTMLWebpackPlugin = require('html-webpack-plugin')

        module.exports = {
            plugins: [
                // Позволяет взимодействовать с html
                new HTMLWebpackPlugin({
                    // это шаблон html, как publick в react
                    template: './src/index.html'
                }),
            ]
        }
    </pre>

    <p>webpack сам подключит скрипты из раздела <code>entry</code></p>

</div>

<div class="linear" id="use_strict">

    <h2>настройка <code>scripts</code> в файле <code>package.json</code></h2>

    <pre class="brush: js;">
        "scripts": {
            "dev": "cross-env NODE_ENV=development webpack --mode development",
            "build": "cross-env NODE_ENV=production webpack --mode production",
            "watch": "cross-env NODE_ENV=development webpack --mode development --watch",
            "start": "cross-env NODE_ENV=development webpack-dev-server --mode development --open",
            "stats": "webpack --json > stats.json && webpack-bundle-analyzer stats.json"
          },
    </pre>

    <p>Запускаются командами</p>
    <p><code>npm run dev</code> сборка для разработки</p>
    <p><code>npm run build</code> билд</p>
    <p><code>npm run watch</code> автообновление</p>
    <p><code>webpack --json</code> запускается analyzer, будет таже инфографика, что и при npm run build</p>

</div>

<div class="linear" id="use_strict">
    <h2>Подключение стилей</h2>

    <p><b>Loaders</b> позволяют webpack работать с другими типами файлов</p>

    <pre class="brush: js;">
        // style-loader
        npm install --save-dev style-loader

        // sass-loader
        npm install sass-loader sass webpack --save-dev

        // css-loader
        npm install --save-dev css-loader

        // распознование изображений
        npm install -D file-loader

        // babel-loader
        npm install -D babel-loader @babel/core @babel/preset-env webpack
    </pre>

    <p>В <code>index.js</code> подключаем <code>import './styles/styles.css';</code></p>

    <p>настраиваем модуль сборки</p>

    <pre class="brush: js;">
        // подключение loaders
        module: {
            // rules - правила
            rules: [
                {
                    // если webpack попадаюется css используй loaders
                    test: /\.css$/,
                    use: ['style-loader', 'css-loader']
                }
            ]
        }
    </pre>

</div>

<div class="linear" id="use_strict">
    <h2>Подключение других, не <code>js</code> файлов</h2>

    <p><b>Подключение картинок</b></p>

    <p>В <code>index.js</code> подключаем <code>import Logo from 'webpack-logo.png';</code></p>

    <pre class="brush: js;">
        npm install -D file-loader
        npm install assets-webpack-plugin --save-dev

        // для распознования xml файлов
        npm install -D xml-loader

        // для распознования csv файлов
        npm install -D csv-loader

        // для распознования less файлов
        npm install --save-dev less-loader
    </pre>

    <pre class="brush: js;">
        module: {
            rules: [
                {
                    // распознавание картинок
                    test: /\.(png|jpg|jpeg|svg|gif)$/,
                    dependency: { not: ['url'] },
                    use: [
                        {
                            loader: 'file-loader',
                            options: {
                                esModule: false
                            },
                        },
                    ],
                },
                {
                    // распознавание шрифтов
                    test: /\.(ttf|woff|woff2|eot)$/,
                    use: ['file-loader']
                },
                {
                    // распознавание xml файлов
                    test: /\.xml$/,
                    use: ['xml-loader']
                },
                {
                    // распознавание csv файлов
                    test: /\.csv$/,
                    use: ['csv-loader']
                },
            ]
        }
    </pre>
</div>

<div class="linear" id="use_strict">
    <h2>normalize.css</h2>

    <pre class="brush: js;">
        npm install normalize.css
    </pre>

    <pre class="brush: js;">
        // в css файле
        @import "~normalize.css";
    </pre>
</div>

<div class="linear" id="use_strict">
    <h2>Элиасы (относительные пути)</h2>

    <pre class="brush: js;">
        resolve: {
            // говорим webpack какие расширения нужно понимать по умолчанию и не указывать их при import файлов
            extensions: ['.js', '.json', '.png'],
            // переменные для указания путей
            alias: {
                '@assets': path.resolve(__dirname, 'src/assets'),
                '@': path.resolve(__dirname, 'src'),
            }
        },
    </pre>

    <pre class="brush: js;">
        import json from '@assets/json';
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>jQuery</h2>

    <pre class="brush: js;">
        npm i -S jquery
    </pre>

    <pre class="brush: js;">
        // в js файле
        import * as $ from 'jquery';

        // демонстрация работы jQuery
        $('pre').html(post.toString());
    </pre>

    <pre class="brush: js;">
        // в webpack добавить, нужно что бы webpack создал отдельный файл с библиотекой и подключал её
        // отдельно в каждый файл, а не пихал в каждый файл
        optimization: {
            splitChunks: {
                chunks: 'all'
            }
        },
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>devServer</h2>

    <p>Это автообновление при изменении в файлах</p>

    <pre class="brush: js;">
        npm install -D webpack-dev-server
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>CopyWebpackPlugin</h2>

    <p>Копировать файлы на примере favicon</p>

    <pre class="brush: js;">
        npm i -D copy-webpack-plugin
    </pre>

    <pre class="brush: js;">
        const CopyWebpackPlugin = require('copy-webpack-plugin');


        const plugins = () => {
            const base = [
                new CopyWebpackPlugin({
                    patterns: [
                        {
                            from: path.resolve(__dirname, 'src/favicon.ico'),
                            to: path.resolve(__dirname, 'dist')
                        }
                    ]
                }),
            ]
        }
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>MiniCssExtractPlugin</h2>

    <p>Нужно что бы хранить css в отдельном файле, а не в js</p>

    <pre class="brush: js;">
        npm install --save-dev mini-css-extract-plugin
    </pre>

    <pre class="brush: js;">
        const MiniCssExtractPlugin = require('mini-css-extract-plugin');


        plugins: [
            new MiniCssExtractPlugin({
                filename: "[name].[contenthash].css"
            })
        ],
        module: {
            rules: [
                {
                    // если webpack попадаюется css используй loaders
                    // для MiniCssExtractPlugin нужно подключить плагин new MiniCssExtractPlugin
                    test: /\.css$/,
                    use: [
                        {
                            loader: MiniCssExtractPlugin.loader,
                            options: {
                                // перезагрузка css файлов во время изменения
                                hmr: true,
                                reloadAll: true
                            },
                        },
                        "css-loader",
                    ],
                }
            ]
        }
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>ENV</h2>

    <p>Определение режима сборки</p>

    <pre class="brush: js;">
        npm i -D cross-env
    </pre>

    <pre class="brush: js;">
        // package.json
        "scripts": {
            "dev": "cross-env NODE_ENV=development webpack --mode development",
            "build": "cross-env NODE_ENV=production webpack --mode production",
            "watch": "cross-env NODE_ENV=development webpack --mode development --watch",
            "start": "cross-env NODE_ENV=development webpack serve --mode development --open"
        },
    </pre>

    <pre class="brush: js;">
        // webpack.config.js
        const isDev = process.env.NODE_ENV === 'development';
        const isProd = !isDev;
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>Минификация css</h2>

    <pre class="brush: js;">
        // минифицирует js
        npm install terser-webpack-plugin --save-dev

        // минифицирует css
        npm install --save-dev optimize-css-assets-webpack-plugin
    </pre>

</div>


<!--

    <div class="linear" id="use_strict">

        <h2>2222222222222222</h2>

        <pre class="brush: js;">

        </pre>

    </div>

-->



<?php include '../include/footer.php'; ?>
