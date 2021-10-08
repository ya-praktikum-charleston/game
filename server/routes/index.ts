const Router = require('express');
const router = new Router();

const postRouter = require('./postRouter');
const messageRouter = require('./messageRouter');

router.use(postRouter);
router.use(messageRouter);

module.exports = router;
