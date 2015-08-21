var SITE_URL = 'http://123.30.174.145/cpvmplatform/chat';
var socket = io.connect();
var friendsName = {};
//var myName;
var myID;
var numOfChatBox = 0;
var tabs = [];
var roomsName = {};
var error = {};
var QBUsers = {};
var mediaParams, caller, callee,QBApp;
//var user = new user();
//var isOver = 0;
var current_callee;
var userObject = user;
var overflowObject = overflow_handle;
var messageObject = message;
var QBApp = {
    appId: 26522,
    authKey: 'XOOK3PkmX34qm9f',
    authSecret: 'Zkf7W3xG9Gz9uyL'
}
QB.init(QBApp.appId, QBApp.authKey, QBApp.authSecret);
//var chatbox = chatbox;
//test show message
//login, get online friend list
//$(document).ready(function(){
//    login(2);
//})
function login(){
    userObject.login();
}

function resizeHeight(){
    var viewport_height = $(window).height();
    var list_height = viewport_height - 218;
    $('.list').css({"height":list_height});
};

//change height properties of class "list"
$(document).ready(function(){
    resizeHeight();
});

$(window).resize(function(){
    resizeHeight();
});

// socket in out
socket.on('getList',function(data){
    friendsName[data.cID] = data.nameList[data.cID];
    myID = data.cID;
    for(var key in data.idList){
        if (data.idList[key] != data.cID) {
            userObject.addUser(data.idList[key],data.nameList[key]);
            friendsName[key]=data.nameList[key];
        };
    }
})

socket.on('getOnlineList',function(online){
    for(var i in  online){
        userObject.showOnline(i);
    }
})

socket.on('getRoom', function(data){
    roomsName[data.roomID] = data.roomName;
})


//add friend to chat list when server call addUser
socket.on('addUser',function(uid){
    userObject.addUser(uid,friendsName[uid]);
    userObject.showOnline(uid);
    //friendsName[data.uid] = data.username;
})

//show online status when friend login
socket.on('updateUser',function(uid){
    userObject.showOnline(uid);
})

//add message to box chat when receive message from server
socket.on('message', function(data) {
    var numberTabs = tabs.length;
    if ($("[id = "+'_msg_box_'+data.uid+"]").length != 0) {
        if (numberTabs > 3) {
            chatbox.swapBox(data.uid);
        }else{

            chatbox.maximizeBoxChat(data.uid);
        };
        messageObject.pushMessageFriend(data.uid, data.msg);
    }else{
        chatbox.openChatBox(friendsName[data.uid],data.uid);
        messageObject.getMessage(data.uid);
        tabs.push(data.uid);
        if (numberTabs >= 3) {
            chatbox.swapBox(data.uid);
        }else{
            chatbox.maximizeBoxChat(data.uid);
        };
    };
    //pushMessageFriend(data.uid, data.msg);
    var tag = '#_msg_body_'+data.uid;
    $(tag).scrollTop($(tag).height());
});


socket.on('messageChatRoom',function(data){
    var numberTabs = tabs.length;
    var gid = data.uid;
    if ($("[id = "+'_msg_box_'+gid+"]").length != 0) {
        if (numberTabs > 3) {
            chatbox.swapBox(gid);
        }else{
            chatbox.maximizeBoxChat(gid);
        };
        messageObject.pushMessageFriend(gid, data.msg);
    }else{
        chatbox.openChatBox(roomsName[gid],gid);
        messageObject.getMessageRoom(data.uid);
        tabs.push(gid);
        if (numberTabs >= 3) {
            chatbox.swapBox(gid);
        }else{
            chatbox.maximizeBoxChat(gid);
        };
    };
    $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
});

socket.on('loginQB',function(data){
    videoCall.login(data);
})

//clear chat list when user out chat
socket.on('outChat',function(uid){
    userObject.showOffline(uid);
})

socket.on('incomingCall',function(data){
    current_callee = data;

    //if($("[id = "+'_msg_box_'+data+"]").length != 0){
    //    chatbox.openVideo(data);
    //    //$("[id="+'_msg_box_'+data+"]").css({"display":"block"});
    //    chatbox.maximizeBoxChat(data);
    //}else{
    //    chatbox.openChatBox(friendsName[data],data);
    //    messageObject.getMessage(data);
    //    chatbox.openVideo(data);
    //    chatbox.maximizeBoxChat(data);
    //}
    //if(confirm('Cuộc gọi đến từ '+friendsName[data])== true){
    //    videoCall.acceptCall(data);
    //}else{
    //    videoCall.reject();
    //}
})

socket.on('errorCall',function(){
    chatbox.closeVideo(current_callee);
})


// Quickblox - video call
QB.webrtc.onCallListener = function(id, extension) {
    console.log(extension);
    mediaParams = {
        audio: true,
        video: extension.callType === 'video' ? true : false,
        elemId: 'localVideo',
        options: {
            muted: true,
            mirror: true
        }
    };

    if (typeof callee == 'undefined'){
        callee = {
            id: extension.callerID,
            full_name: "User with id " + extension.callerID,
            login: "",
            password: "" };
    }
    var tag = $('<div style="width: 200px; height: 100px; top: 50%; left: 50%; position: fixed; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border-radius: 5px; text-align: center;" class="call-noti"> <h4 style="padding: 10px;">Cuộc gọi đến từ '+friendsName[current_callee]+'</h4> <button id="accept">Chấp nhận</button> <button id="decline">Từ chối</button> </div>');
    $('.container').append(tag);
    //if($("[id = "+'_msg_box_'+current_callee+"]").length != 0){
    //    chatbox.openVideo(current_callee);
    //    chatbox.maximizeBoxChat(current_callee);
    //}else{
    //    chatbox.openChatBox(friendsName[current_callee],current_callee);
    //    messageObject.getMessage(current_callee);
    //    chatbox.openVideo(current_callee);
    //    chatbox.maximizeBoxChat(current_callee);
    //}
};

QB.webrtc.onAcceptCallListener = function(id, extension) {

};

QB.webrtc.onRejectCallListener = function(id, extension) {
    //$('video').attr('src', '');
    chatbox.closeVideo(current_callee);
};

QB.webrtc.onStopCallListener = function(id, extension) {
    //$('video').attr('src', '');
    chatbox.closeVideo(current_callee);
};

QB.webrtc.onRemoteStreamListener = function(stream) {
    QB.webrtc.attachMediaStream('remoteVideo', stream);
};


$(function() {

    //open anh close chat body
    $('.container').on('click','.username',function(){
        var id = this.id;
        chatbox.minimizeBoxChat(id);
    });

    //hide box chat
    $('.container').on('click','.close',function(){

        var id = this.id;
        if(id == current_callee && $('.videoCall').length != 0){
            videoCall.hangUp();
            chatbox.closeVideo(current_callee);
        }
        var tabPosition = tabs.indexOf(id);
        tabs.splice(tabPosition,1);
        chatbox.removeBoxChat(id);
        // alert(tabs);
        // alert(tabs.length);
        if (tabs.length <= 2) {
            overflowObject.hideOverflowTags();
            $("[id = "+'_user_overflow_'+id+"]").remove();
        }else{
            if (tabs.length == 3) {
                overflowObject.hideOverflowTags();
            }else{
                overflowObject.showOverflowTags();
            };
            var lastID = tabs[2];
            $("[id = "+'_user_overflow_'+lastID+"]").remove();
            chatbox.maximizeBoxChat(lastID);
        };

    });

    $('.container').on('click','.friend',function(){
        var id = this.id;
        var isGroup = id.indexOf('g');
        var tag = $("[id = "+'_msg_box_'+id+"]");
        var numberTabs = tabs.length;
        if (tag.length != 0) {
            if (numberTabs < 4) {
                chatbox.maximizeBoxChat(id);
            }else{
                var tabPosition = tabs.indexOf(id);
                if (tabPosition < 3) {
                    chatbox.maximizeBoxChat(id);
                }else{
                    $("[id = "+'_user_overflow_'+id+"]").remove();
                    chatbox.swapBox(id);
                };
            };
        }else{
            if (numberTabs < 3) {
                chatbox.openChatBox(friendsName[id],id);
                chatbox.maximizeBoxChat(id);
                tabs.push(id);
            }else{
                var lastID = tabs[2];
                tabs.splice(2,0,id);
                overflowObject.showOverflowTags();
                chatbox.hideBoxChat(lastID);
                overflowObject.pushOverflowUser(lastID);
                chatbox.openChatBox(friendsName[id],id);
                chatbox.maximizeBoxChat(id);
            };
            if(isGroup == -1){
                messageObject.getMessage(id);
            }else{
                messageObject.getMessageRoom(id);
            };

        };
        var body_box = $("[id = "+'_msg_box_'+id+"]").find(".msg_body");
        body_box.animate({
            scrollTop: 1000000
        });
    });

    $('.container').on('click','.add_friend',function(){
        var id = this.id
        $("[id = "+'_add_friend_box_'+id+"]").show(70);
        $("[id = "+'_msg_body_'+id+"]").css({"height":"199px"});
    });

    $('.container').on('click','.add_button',function(){
        var id = this.id,
            gid,
            tag = $("[id ="+'_input_'+id+"]"),
            name = tag.val().split(','),
            numberTabs = tabs.length,
            roomList = {},
            isEmpty = 1,
            isRoom = id.indexOf("g"); //id c?a room c� k� t? 'g'
        //check is room, if not, create room
        if (isRoom == -1) {
            gid = 'g' + Math.round((Math.random() * 1000000));
        }else{
            gid = id;
        };
        //alert(name.length);
        //check input is valid, if yes, get user list tagged
        //save to roomList
        if (name.length != 0) {
            for(var key in friendsName){
                for(var key2 in name){
                    if (friendsName[key] == name[key2]) {
                        roomList[key] = key;
                        //alert(key+'...'+roomList[key]);
                        isEmpty = 0;
                    };
                }
            }
        };
        if (!isEmpty) {
            if ($("[id = "+'_msg_box_'+gid+"]").length == 0) {
                roomList[id] = id;
                roomList[myID] = myID;
                if (numberTabs >= 3 ) {
                    var lastOpenId = tabs[2];
                    chatbox.hideBoxChat(lastOpenId);
                    overflowObject.pushOverflowUser(lastOpenId);
                    tabs.splice(2,0,gid);
                    overflowObject.showOverflowTags();
                }else{
                    tabs.push(gid);
                };
                var roomName = friendsName[myID]+' v� '+friendsName[id];
                var list = '';
                for(var key in roomList){
                    list = list +','+ roomList[key];
                };
                var data = {
                    //"_id": gid,
                    "roomList": list,
                    "roomID": gid,
                    "roomName": roomName,
                    "process": "create_room"
                };
                $.ajax({
                    type:"POST",
                    url: SITE_URL + "/module.php",
                    dataType: "json",
                    data: data
                });

                socket.emit('creatRoom',{roomList: roomList,
                    roomID: gid,
                    roomName: roomName
                });

                chatbox.openChatBox(roomName, gid);
                chatbox.maximizeBoxChat(gid);
            }else{
                var list = 'g';
                for(var key in roomList){
                    list = list +','+ roomList[key];
                };
                var data = {
                    //"_id": gid,
                    "roomList": list,
                    "roomID": gid,
                    "process": "join_room"
                };
                $.ajax({
                    type:"POST",
                    url: SITE_URL + "/module.php",
                    dataType: "json",
                    data: data
                });
                socket.emit('updateRoom',{roomList: roomList,
                    roomID: gid});
                if (tabs.indexOf(gid) <= 2) {
                    chatbox.maximizeBoxChat(gid);
                };
            };
        };
        tag.val('');
        $("[id="+'_add_friend_box_'+id+"]").hide(70);
        $("[id = "+'_msg_body_'+id+"]").css({"height":"228px"});
    });

    $('.container').on('click','.overflow_tab',function(){
        if ($('.strike_cover').css("display") != 'block') {
            $('.strike_cover').css({'display':'block'});
            $('.overflow_list').css({'display':'block'});
        }else{
            $('.strike_cover').css({'display':'none'});
            $('.overflow_list').css({'display':'none'});
        }
    });

    $('.container').on('mouseover','.msg_box_down_inner',function(){
        var id = this.id.split("_")[5];
        $("[id="+'_box_down_name_'+id+"]").css({"margin-right":"18px"});
        $("[id="+'_box_down_close_'+id+"]").css({"display":"block"});
    });

    $('.container').on('mouseout','.msg_box_down_inner',function(){
        var id = this.id.split("_")[5];
        $("[id="+'_box_down_close_'+id+"]").css({"display":"none"});
        $("[id="+'_box_down_name_'+id+"]").css({"margin-right":"8px"});
    });

    $('.container').on('click','.msg_box_down_inner',function(){
        var id = this.id.split("_")[5];
        chatbox.maximizeBoxChat(id);

    });

    $('.container').on('click','.box_down_close',function(){
        var id = this.id.split("_")[4];
        if(id == current_callee && $('.videoCall').length != 0){
            videoCall.hangUp();
            chatbox.closeVideo(current_callee);
        }
        var tabPosition = tabs.indexOf(id);
        tabs.splice(tabPosition,1);
        chatbox.removeBoxChat(id);
        if (tabs.length <= 2) {
            overflowObject.hideOverflowTags();
            $("[id = "+'_user_overflow_'+id+"]").remove();
        }else{
            if (tabs.length == 3) {
                overflowObject.hideOverflowTags();
            }else{
                overflowObject.showOverflowTags();
            };
            var lastID = tabs[2];
            $("[id = "+'_user_overflow_'+lastID+"]").remove();
            chatbox.maximizeBoxChat(lastID);
        };
    });

    $('.container').on('click','._close',function(){
        var id = this.id
        if(id == current_callee && $('.videoCall').length != 0){
            videoCall.hangUp();
            chatbox.closeVideo(current_callee);
        }
        overflowObject.removeOverFlowUser(id);
        var tabPosition = tabs.indexOf(id);
        tabs.splice(tabPosition,1);
        if (tabs.length < 4) {
            overflowObject.hideOverflowTags();
        }else{
            $('.number_of_tabs').text(tabs.length-3);
        }
    });

    $('.container').on('click','._name',function(){
        var id = this.id;
        $("[id = "+'_user_overflow_'+id+"]").remove();
        chatbox.swapBox(id);
    });
    //show message
    $('.container').on('keypress','textarea',function(e){
        if (e.keyCode == 13) {
            var msg = $(this).val();
            var id = this.id;
            // var isChatRoom = $.trim(id).length;
            var isChatRoom = id.indexOf("g");
            $(this).val('');
            if(msg!=''){
                messageObject.pushMessageMe(id,msg);
                // addMessage(msg,'admin');
                if (isChatRoom != -1) {
                    messageObject.storeMessageRoom(id,msg);
                    socket.emit('messageRoom',{msg:msg, uid:id});
                    //storeMessage(id,msg,"room");
                }else{
                    messageObject.storeMessage(id,msg);
                    socket.emit('message',{msg:msg, uid:id});
                    //storeMessage(id,msg,"pare");
                }
            }
            var tag = '#_msg_body_'+id;
            $(tag).animate({
                scrollTop: 1000000
            });
            e.preventDefault();
        }
    });
    $('.container').on('resize','.box_inner',function(){
        var _width = $('.box_inner').css('width');
        //alert(_width);
        $('.overflow_tab').css({"right":_width+20});
        $('overflow_list').css({"right":_width+20});
        $('strike_cover').css({"right":_width+21});
    });

    $('.container').on('click','.video_call',function(){
        //socket.emit('video_call',{pId:this.id, hId: myID});
        var id = this.id;
        current_callee = id;
        //alert(current_callee);
        if($.isNumeric(id)){
            $.post(SITE_URL + "/module.php",{"id":id,process:'get_qbId'},function(data){
                if(data){
                    socket.emit('callVideo',{hId:myID,pId:id});
                    chatbox.openVideo(id);
                    callee = {id: parseInt(data), login: 'user'+id, password: '12345678',};
                    videoCall.callVideo(id);
                }else{
                    alert('Khong the ket noi voi '+friendsName[id]);
                    chatbox.closeVideo(current_callee);
                }
            })
        }else{
            alert('Khong the thuc hien cuoc goi nay');
        }
    });
    $('.container').on('click','#accept',function(){
        if($("[id = "+'_msg_box_'+current_callee+"]").length != 0){
            chatbox.openVideo(current_callee);
            chatbox.maximizeBoxChat(current_callee);
        }else{
            chatbox.openChatBox(friendsName[current_callee],current_callee);
            messageObject.getMessage(current_callee);
            chatbox.openVideo(current_callee);
            chatbox.maximizeBoxChat(current_callee);
        }
        videoCall.acceptCall();
        $('.call-noti').remove();
    });
    $('.container').on('click','#decline',function(){
        videoCall.hangUp();
        //chatbox.closeVideo(current_callee);
        $('.call-noti').remove();
    });
    $('.container').on('mouseover','.videoCall',function(){
            $('.buttons').show();
    });
    $('.container').on('mouseout','.videoCall',function(){
            $('.buttons').hide();
    })
    $(document).on('click','.fa-stop',function(){
        videoCall.hangUp();
        chatbox.closeVideo(this.id);
    })
    $(document).on('click','.fa-microphone',function(){
        //chatbox.controlAudio();
        if($('.fa-microphone').data('action') === 'off'){
            $('.fa-microphone').addClass('off').data('action','on').attr('title', 'Mở âm thanh');
            QB.webrtc.mute('audio');
        }else{
            $('.fa-microphone').removeClass('off').data('action','off').attr('title', 'Tắt âm thanh');
            QB.webrtc.unmute('audio');
        }
    })
    $(document).on('click','.fa-video-camera',function(){
        //chatbox.controlCamera();
        if($('.fa-video-camera').data('action') === 'off'){
            $('.fa-video-camera').addClass('off').data('action','on').attr('title', 'Mở camera');
            QB.webrtc.mute('video');
        }else{
            $('.fa-video-camera').removeClass('off').data('action','off').attr('title', 'Tắt camera');
            QB.webrtc.unmute('video');
        }
    })
    $(document).on('click','.fa-expand',function(){
        $('.localVideo').addClass('hide');
        $('.remoteVideo').addClass('expand');
        $(this).removeClass('fa-expand').addClass('fa-compress');
        $('.buttons').addClass('expandButton');

    })
    $(document).on('click','.fa-compress',function(){
        $('.remoteVideo').removeClass('expand');
        $(this).removeClass('fa-compress').addClass('fa-expand');
        $('.buttons').removeClass('expandButton');
        $('.localVideo').removeClass('hide');
    })
});