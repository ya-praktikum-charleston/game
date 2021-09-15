//const express = require('express');
//const path = require('path');
//const app = express();
//const PORT = process.env.PORT || 3000;

//app.use(express.static(__dirname + '/dist'));
//app.use('*', function (req, res) {
//    res.sendFile(path.join(__dirname + '/dist/index.html'));
//});
//app.listen(PORT, function () {
//    console.log(`App listening on port ${PORT}!`);
//});


//require('@babel/register')({
//    presets: ['@babel/preset-env', '@babel/preset-react']
//})

//const express = require('express')
//const path = require('path')
//const ssr = require('./ssr')
import express from 'express';
import path from 'path';
import ssr from '../ssr';


const app = express()

const port = 4000

app.use(express.static(path.join(__dirname, 'dist')))

app.get('/', (req, res) => {
    res.send(ssr())
})

app.listen(port, () => console.log(`server is listening at http://localhost:${port}`))
