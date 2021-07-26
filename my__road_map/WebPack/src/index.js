import * as $ from 'jquery';
import './styles/styles.css';
import './styles/less.less';
import './styles/scss.scss';
import json from '@assets/json';
import xml from '@assets/data.xml';
import csv from '@assets/data.csv';
import Logo from '@assets/webpack-logo.png';
import Post from "./Post";
const post = new Post('WebPack post title', Logo);

// демонстрация работы jQuery
$('pre').html(post.toString());

console.log('Post toString', post.toString());
console.log('JSON', json);
console.log('XML', xml);
console.log('CSV', csv);
