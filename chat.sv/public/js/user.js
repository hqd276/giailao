/**
 * Created by moouse on 8/4/2015.
 */
var user = {
    addUser: function (uid,username){
    $('<div id="'+uid+'" class="friend">'
        +'<div class="avatar">'
        +'<img alt="" src="../img/avatar.png">'
        +'</div>'
        +'<div class="name">'
        +'<div class="name_inner">'+username+'</div>'
        +'</div>'
        +'<div class="status">'
        +'<div class="status_inner" style="display:none" id="_status_inner_'+uid+'">'
        +'<div class="text">web</div>'
        +'<img alt="" src="../img/online.png" />'
        +'</div>'
        +'</div>'
        +'</div>').insertBefore('.list_push');
    },

    showOnline: function (uid){
    $("[id = "+'_status_inner_'+uid+"]").css({"display":"block"});
    if($("[id = "+'_msg_box_'+uid+"]").length){
        $("[id = "+'_user_status_'+uid+"]").css({"display":"block"});
    }
    },

    showOffline: function (uid){
        $("[id = "+'_status_inner_'+uid+"]").css({"display":"none"});
        if($("[id = "+'_msg_box_'+uid+"]").length){
            $("[id = "+'_user_status_'+uid+"]").css({"display":"none"});
        }
    },

    login: function (){
        var username = $('#username').val();
        id = $.trim(username); //l?y username b? qua space ? ??u string
        $('#username').val('');
        if(id.length >= 1){//n?u ?? d�i string >= 1 th� success
            //var id = Math.round((Math.random() * 1000000));

            myID = id;
            var data = {"id":id,"process":"login"};

            $.ajax({
                type: "POST",
                dataType: "json",
                url: SITE_URL + "/module.php",
                data: data,
                success: function(result){
                    console.log(result);
                    var data = JSON.parse(JSON.stringify(result));
                    var friendList = data.friends;
                    //alert(friendList);
                    var uid;
                    var friendName;

                    socket.emit('joinChat',id,friendList);


                    friendsName[id] = data.username;
                    for(var key in friendList){
                        uid = friendList[key].id;
                        if(uid.toString().indexOf('g') == -1) {
                            friendName = friendList[key].username
                            friendsName[uid] = friendName;
                            userObject.addUser(uid, friendName);
                        };
                    };
                    for(var key in friendList){
                        uid = friendList[key].id;
                        if(uid.toString().indexOf('g') != -1){
                            friendName = friendList[key].username
                            friendsName[uid] = friendName;
                            userObject.addUser(uid,friendName);
                            socket.emit('joinRoom',uid,myID);
                        };
                    };
                    //socket.emit('joinChat',id,friendList);
                },
                error: function(){alert("ERROR");}
            });
            //$.post(
            //    SITE_URL + "/module.php",
            //    {"id":id,"process":"login_qb"},
            //    function (data) {
            //        //alert(data);
            //    }
            //);
            //socket.emit('joinChat',username);
            $('.login').css({"display":"none"});
        }else{
            alert('Your name is null! Please enter your name!');
        }
    }
}