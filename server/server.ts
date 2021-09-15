import express from 'express';
import ssr from './ssr';
const server = express()

server.get('/', (req, res) => {
    res.send(ssr())
})

server.listen(3000, () => {
    console.log(`Server running on http://localhost:3000`)
})