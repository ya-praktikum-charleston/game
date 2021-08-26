const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    entry: './src/index.tsx',
    output: {
        path: path.join(__dirname, '/dist'),
        filename: 'bundle-[hash].js',
    },
    resolve: {
        extensions: ['.tsx', '.ts', '.js'],
        alias: {
            process: 'process/browser',
        },
    },
    devServer: {
        contentBase: path.join(__dirname, 'dist'),
        historyApiFallback: true,
    },
    module: {
        rules: [
            {
                test: /\.tsx|ts|js?$/,
                use: 'babel-loader',
                exclude: /node_modules/,
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader'],
            },
            {
                test: /\.svg$/i,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'assets/svg/[hash].[ext]',
                        },
                    },
                ],
            },
            {
                test: /\.(gif|png|jpg|jpeg)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: 'assets/img/[hash].[ext]',
                        },
                    },
                ],
            },
            {
                test: /\.mp3|wav$/,
                use: [
                    {
                        loader: 'file-loader',
                    },
                ]
            }
        ],
    },
    plugins: [
        new HtmlWebpackPlugin({
            template: './public/index.html',
            filename: 'index.html',
            minify: {
                collapseWhitespace: true,
                removeComments: true,
                removeRedundantAttributes: true,
                useShortDoctype: true,
            },
        }),
    ],
};
