// подключаем пути
const path = require('path');
const HTMLWebpackPlugin = require('html-webpack-plugin');
const {CleanWebpackPlugin} = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const TerserWebpackPlugin = require('terser-webpack-plugin');
const {BundleAnalyzerPlugin} = require('webpack-bundle-analyzer');

const isDev = process.env.NODE_ENV === 'development';
const isProd = !isDev;

const filename = ext => isDev ? `[name].${ext}` : `[name].[hash].${ext}`;

const optimization = () => {
    const config = {
        splitChunks: {
            chunks: 'all'
        }
    }

    if (isProd) {
        config.minimizer = [
            new OptimizeCssAssetsPlugin(),
            new TerserWebpackPlugin()
        ]
    }

    return config
}

const cssLoaders = extra => {
    const loaders = [
        {
            loader: MiniCssExtractPlugin.loader,
            options: {
                // hmr: isDev,         // перезагрузка css файлов во время изменения
                // reloadAll: true
            },
        },
        'css-loader'
    ]
    // если есть less, sass или что то такое, то добавить в массив
    if (extra) {
        loaders.push(extra)
    }

    return loaders
}
const babelOptions = preset => {
    const options = {
        presets: [
            '@babel/preset-env'
        ],
        plugins: [
            '@babel/plugin-proposal-class-properties'
        ]
    }

    if (preset) {
        options.presets.push(preset);
    }

    return options;
}
const jsLoaders = () => {
    const loaders = [{
        loader: 'babel-loader',
        options: babelOptions()
    }]

    if (isDev) {
        loaders.push('eslint-loader');
    }

    return loaders
}
const plugins = () => {
    const base = [
        // Позволяет взимодействовать с html
        new HTMLWebpackPlugin({
            // пути прописываются исходя из context
            template: './index.html',
            minify: {
                collapseWhitespace: isProd  // минифицировать файл html в продакшене
            }
        }),
        // очищает папку dist
        new CleanWebpackPlugin(),
        // копировать файлы на примере favicon
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: path.resolve(__dirname, 'src/favicon.ico'),
                    to: path.resolve(__dirname, 'dist')
                }
            ]
        }),
        new MiniCssExtractPlugin({
            filename: filename('css'),
        })
    ]

    if (isProd) {
        base.push(new BundleAnalyzerPlugin())
    }

    return base
}

module.exports = {
    // говорит где лежат все исходники приложения
    context: path.resolve(__dirname, 'src'),
    // как webpack будет собирать проект, в каком режиме (разработка или продакшен)
    mode: "development",
    // Входной файл webPack, файлы подключаются в filename
    entry: {
        // пути прописываются исходя из context
        main: ['@babel/polyfill', './index.js'],
        analytics: './analytics.ts'
    },
    // куда сдкладывать результат работы webPack
    output: {
        // файл запуска
        // [name] это паттерно, в который передаются ключи из entry
        // [hash] это отсутствия кэша
        // filename() это оптимизация, т.к. filename есть в нескольких местах
        filename: filename('js'),
        // папка с копиляцией
        path: path.resolve(__dirname, 'dist')
    },
    resolve: {
        // говорим webpack какие расширения нужно понимать по умолчанию и не указывать их при import файлов
        extensions: ['.js', '.json', '.png'],
        // переменные для указания путей
        alias: {
            '@assets': path.resolve(__dirname, 'src/assets'),
            '@': path.resolve(__dirname, 'src'),
        }
    },
    optimization: optimization(),
    // автообновление
    devServer: {
        port: 4200,
        hot: isDev      // обновляет только то что изменилось, мгновенное реагирование
    },
    devtool: isDev ? 'source-map' : '',
    plugins: plugins(),
    // подключение loaders
    module: {
        // rules - правила
        rules: [
            {
                // если webpack попадаюется css используй loaders
                // для MiniCssExtractPlugin нужно подключить плагин new MiniCssExtractPlugin
                test: /\.css$/,
                use: cssLoaders()
            },
            // распознавание less
            {
                test: /\.less$/,
                use: cssLoaders('less-loader')
            },
            {
                test: /\.s[ac]ss$/,
                use: cssLoaders('sass-loader')
            },
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
                // распознавание xml файлов
                test: /\.xml$/,
                use: ['xml-loader']
            },
            {
                // распознавание csv файлов
                test: /\.csv$/,
                use: ['csv-loader']
            },
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,        // не учитывать исходники библиотек
                use: jsLoaders()
            },
            {
                test: /\.ts$/,
                exclude: /node_modules/,
                loader: 'babel-loader',
                options: babelOptions('@babel/preset-typescript')
            },
        ]
    }
}
