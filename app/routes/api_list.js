var express = require('express');
var router = express.Router();
var menu = require('../controllers/menu');
var user_list = require('../controllers/user_list');
var purches =  require('../controllers/purches');
var user = require('../controllers/user');
// var client_abstract = require('../controllers/client_abstract');
var validate_client_token = require('../middleware/validate_client');

router.post('/menu',
    [validate_client_token],
    menu.menu
);

router.post('/user_list',
    [validate_client_token],
    user_list.user_list
);

router.post('/user_purches_history',
    [validate_client_token],
    purches.user_purches_history
);

router.post('/user_commission_history',
    [validate_client_token],
    purches.user_commission_history
);


router.post('/purche_commission_log',
    [validate_client_token],
    purches.purche_commission_log
);
router.post('/purche_bill',
    [validate_client_token],
    purches.purche_bill
);

router.post('/user_network',
    [validate_client_token],
    user.get_usernetwork
);


router.post('/panding_amount_paid_payment_list',
    [validate_client_token],
    purches.panding_amount_paid_payment_list
);


module.exports = router;
