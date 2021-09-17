import path from 'path';
import { CleanWebpackPlugin } from 'clean-webpack-plugin';
import MiniCssExtractPlugin from 'mini-css-extract-plugin';
import LoadablePlugin from '@loadable/webpack-plugin';

module.exports = {
    name: 'client/index.tsx',
    target: 'node',
    entry: {
        client: path.resolve(__dirname, 'client'),
    },
    mode: 'development',
    output: {
        path: path.resolve(__dirname, 'dist/static'),
        filename: '[name].js',
        publicPath: '',
    },
    resolve: {
        extensions: ['.ts', '.tsx', '.js'],
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/,
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
                ],
            },
        ],
    },
    plugins: [
        new MiniCssExtractPlugin({ filename: '[name].css' }),
        new CleanWebpackPlugin(),
        new LoadablePlugin(),
    ],
};
