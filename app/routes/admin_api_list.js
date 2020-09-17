var express = require('express');
var router = express.Router();
var product = require('../controllers/product');
var purches = require('../controllers/purches');
var user = require('../controllers/user');
var validate_client_token = require('../middleware/validate_client');
var role_validation = require('../middleware/role_validation');


router.post('/add_user',
    [validate_client_token, role_validation],
    user.add_user
);

router.post('/add_product',
    [validate_client_token, role_validation],
    product.add_product
);
router.post('/buy_product',
    [validate_client_token, role_validation],
    purches.buy_product
);

router.post('/search_user',
    [validate_client_token, role_validation],
    user.search_user
);

router.post('/product_list',
    [validate_client_token, role_validation],
    product.list_product
);


module.exports = router;
