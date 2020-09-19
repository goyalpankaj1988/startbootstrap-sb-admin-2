var jwt = require('jsonwebtoken');
var user = require('../models/user')

const messages = require('../messages.json');
exports.login= async function(req, res) {
    // console.log(req.body.username)
    // console.log(req.body.password)
    // console.log(req.connection)
    var ip = req.headers['x-forwarded-for'] || 
     req.connection.remoteAddress || 
     req.socket.remoteAddress ||
     (req.connection.socket ? req.connection.socket.remoteAddress : null);
     console.log(ip)

    if(req.body.username && req.body.password){
        let username = req.body.username
        let password = req.body.password
        validate_user(username,password)
        .then(function(values){
            console.log(values)
            if(values.user_found && values.user_paswword){
                console.log(values.user_data)
                let role = values.user_data.role
                let name = values.user_data.name
                let user_id = values.user_data._id
                let todakendata = role+'|'+name+'|'+user_id+'|'+ip
                
                let token = jwt.sign({
                    data: todakendata
                }, 'secret', { expiresIn: '365d' });
                // console.log(token)
                
                data = {
                    "name":name,
                    "role":role,
                    "jwt_toket":token
                }
                res.status(messages.status.OK).json(data);
                
            }
            else{
                res.status(messages.status.Unauthorized).json({"error":"user name and password is not correct"});
                return;
            }
        }).catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
        });
    }
    
}
function validate_user(username,password){
    return new Promise(function(resolve, reject) {
        user.findOne({
            "user_name":username
        })
        .exec(function(err,result){
            if(err){
                reject(err)
            }
            else{
                data = {}
                if(result==null){
                    data['user_found'] = false;
                    data['user_data']= result;
                    resolve(data);
                }
                else{
                    data['user_found'] = true;
                    if (result.validPassword(password)) {
                        //password did not match
                        data['user_paswword'] = true;
                    }
                    else{
                        data['user_paswword'] = false;
                    }
                    data['user_data']= result;
                    resolve(data);
                }
            }
        })
    })
}
