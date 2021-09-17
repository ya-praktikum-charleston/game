import path from 'path';
import nodeExternals from 'webpack-node-externals';
import { CleanWebpackPlugin } from 'clean-webpack-plugin';
import LoadablePlugin from '@loadable/webpack-plugin';

module.exports = {
    name: 'server',
    target: 'node',
    node: { __dirname: false },
    entry: {
        server: path.resolve(__dirname, 'server/server.ts'),
    },
    mode: 'development',
    output: {
        path: path.resolve(__dirname, 'dist/server'),
        filename: '[name].js',
        libraryTarget: 'commonjs2',
    },
    resolve: {
        extensions: ['.ts', '.tsx'],
    },
    externals: ['@loadable/component', nodeExternals()],
    module: {
        rules: [
            {
                test: /\.tsx?$/,
                use: 'babel-loader',
                exclude: /node_modules/,
            },
            {
                test: /\.css$/,
                loader: 'null-loader',
            },
            {
                test: /\.(gif|png|jpg|jpeg|svg|mp3|wav)?$/,
                loader: 'null-loader',
            },
        ],
    },
    plugins: [
        new CleanWebpackPlugin(),
        new LoadablePlugin(),
    ],
};
