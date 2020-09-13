var express = require('express');
var router = express.Router();
var menu = require('../controllers/menu');
var user = require('../controllers/user');
// var client_abstract = require('../controllers/client_abstract');
var validate_client_token = require('../middleware/validate_client');

router.post('/menu',
    [validate_client_token],
    menu.menu
);



module.exports = router;