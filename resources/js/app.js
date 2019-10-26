require('./bootstrap');

const $           = require('jquery');
const autosize    = require('./lib/autosize.min');
const initPlaceholders = require('./placeholder');

initPlaceholders();
autosize('textarea');
