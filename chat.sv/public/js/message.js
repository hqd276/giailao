var message = {
    pushMessageMe: function (uid, msg){
    $("[class = "+uid+"]").append('<div class="msg_me">'
        +'<div class="msg_me_inner">'
        +'<div class="msg_me_text">'+msg+'</div>'
        +'</div>'
        +'</div>');
    },

    pushMessageFriend: function (uid, msg){
    $("[class = "+uid+"]").append('<div class="msg_friend">'
        +'<div class="msg_friend_inner">'
        +'<div class="msg_friend_avatar"><img src="../img/avatar.png"></div>'
        +'<div class="msg_friend_text">'+msg+'</div>'
        +'</div>'
        +'</div>');
    },

    storeMessage: function (uid,msg){
        var data = {
            "_id":myID,
            "fID":uid,
            "detail":{
                "id":myID,
                "msg":msg
            },
            //"cType":chatType,
            "process":"store_message"
        };
        $.ajax({
            type:"POST",
            url:SITE_URL + "/module.php",
            dataType: "json",
            data: data
        });
    },

    //store group chat message
    storeMessageRoom: function (uid,msg){
        var data = {
            "gid":uid,
            //"fID":uid,
            "detail":{
                "id":myID,
                "msg":msg
            },
            //"cType":chatType,
            "process":"store_message_room"
        };
        $.ajax({
            type:"POST",
            url:SITE_URL + "/module.php",
            dataType: "json",
            data: data
        });
    },

    getMessage: function (uid){
        var data = {
            "_id":myID,
            "fID":uid,
            //"cType":chatType,
            "process":"get_message"
        };
        $.ajax({
            type:"POST",
            url:SITE_URL + "/module.php",
            dataType: "json",
            data: data,
            success: function(result){
                var data = JSON.parse(JSON.stringify(result));
                var message = data.message;
                // alert(message);
                for(var i in message){
                    if (message[i].id == null) {
                        break;
                    }else if (message[i].id == myID) {
                        messageObject.pushMessageMe(uid,message[i].msg);
                    }else{
                        messageObject.pushMessageFriend(uid,message[i].msg);
                    };
                };
            },
            error: function(){
                console.log('ERROR!!!');
            }
        });
    },

    //get message of group chat
    getMessageRoom: function (uid){
        var data = {
            "gid":uid,
            "process":"get_message_room"
        };
        $.ajax({
            type:"POST",
            url:SITE_URL + "/module.php",
            dataType: "json",
            data: data,
            success: function(result){
                //alert(result);
                var data = JSON.parse(JSON.stringify(result));
                for(var i in data.message){
                    if (data.message[i].id == null) {
                        break;
                    }else if (data.message[i].id == myID) {
                        messageObject.pushMessageMe(uid,data.message[i].msg);
                    }else{
                        messageObject.pushMessageFriend(uid,data.message[i].msg);
                    };
                };
            },
            error: function(){
                console.log('ERROR!!!');
            }
        });
    }
}