const messages = require('../messages.json');
exports.menu= async function(req, res) {
    if(req.role && req.name && req.user_id){
        if(req.role=='admin'){
            data = {
                "User list":"user_list.php",
                "User add":"add_user.php",
                "Purchase log":"all_purchase_log.php"
            }
        }
        else{
            data = {
                "User list":"user_list.php"
            }
        }
        
        res.status(messages.status.OK).json(data);
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
    }
    
    
}