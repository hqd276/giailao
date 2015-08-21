var chatbox = {
    openChatBox: function(username,uid){
        $('<div class="msg_box" style="display:none" id="_msg_box_'+uid+'">'
            +'<div class="msg_header" id="'+uid+'">'
            +'<div class="username" id="'+uid+'">'
            +'<div class="username_inner">'
            +'<div class="user_status" style="display: none" id="_user_status_'+uid+'"></div>'
            +'<div class="user_name">'+username+'</div>'
            +'</div>'
            +'</div>'
            +'<div class="box_chat_icon">'
            +'<div class="box_chat_icon_inner">'
            +'<a class="close" title="Đóng tab" id="'+uid+'"></a>'
            +'<a class="setting" title="Tùy chọn" id="'+uid+'"></a>'
            +'<a class="video_call" title="Gọi video" id="'+uid+'"></a>'
            +'<a class="add_friend"  title="Thêm bạn bè khác vào cuộc trò chuyện" id="'+uid+'"></a>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'<div class="add_friend_box" style="display:none" id="_add_friend_box_'+uid+'">'
            +'<div class="add_friend_box_inner">'
            +'<input type="text" class="add_input" id="_input_'+uid+'" aria-label="Thêm bạn bè vào chat này" placeholder="Thêm bạn bè vào chat này"></input>'
            +'<div class="add_button" id="'+uid+'">Thêm</div>'
            +'</div>'
            +'</div>'
            +'<div class="msg_wrap" id="_msg_wrap_'+uid+'">'
            +'<div class="msg_body" id="_msg_body_'+uid+'">'
            +'<div class="'+uid+'"></div>'
            +'</div>'
            +'<div class="msg_footer">'
            +'<div class="msg_footer_inner">'
            +'<textarea class="msg_input" id="'+uid+'"></textarea>'
            +'<div class="msg_footer_icon">'
            +'<div class="footer_icon_inner">'
            +'<a class="emoticons" title="Chọn một nhãn dán hoặc cảm xúc"></a>'
            +'<a class="img_add" title="Chọn ảnh"></a>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>'
            +'</div>').insertBefore('.box_end');
        this.insertBoxDown(uid);
        //alert($('.box_inner').css('display'));
        if($("[id = "+'_status_inner_'+uid+"]").css('display') != 'none'){
            $("[id = "+'_user_status_'+uid+"]").css({"display":"block"});
        };
    },


    openRoomChat: function (gid,hostName,friendName){
        // var gid = hostID+'_'+friendID;
        friendsName[gid] = hostName + ' và ' + friendName;
        this.openChatBox(friendsName[gid],gid);
    },

    swapBox: function (uid){
        var lastID = tabs[2];
        var tabPosition = tabs.indexOf(uid);
        tabs.splice(tabPosition,1);
        tabs.splice(2,0,uid);
        $("[id = "+'_user_overflow_'+uid+"]").remove();
        this.hideBoxChat(lastID);
        overflowObject.pushOverflowUser(lastID);
        this.maximizeBoxChat(uid);
        overflowObject.showOverflowTags();
    },


    insertBoxDown: function (uid){
        $('<div class="msg_box_down" style="display:none" id="_msg_box_down_'+uid+'">'
            +'<div class="msg_box_down_inner" id="_msg_box_down_inner_'+uid+'">'
            +'<div class="box_down_name" id="_box_down_name_'+uid+'">'+friendsName[uid]+'</div>'
            +'<div class="box_down_close" style="display:none" id="_box_down_close_'+uid+'"></div>'
            +'</div>'
            +'</div>').insertAfter($("[id = "+'_msg_box_'+uid+"]"));
    },


    hideBoxChat: function(uid){
        $("[id = "+'_msg_box_'+uid+"]").css({"display":"none"});
        $("[id = "+'_msg_box_down_'+uid+"]").css({"display":"none"});
    },

    minimizeBoxChat: function (uid){
        $("[id = "+'_msg_box_'+uid+"]").css({"display":"none"});
        $("[id = "+'_msg_box_down_'+uid+"]").css({"display":"block"});
    },

    maximizeBoxChat: function (uid){
        $("[id ="+'_msg_box_down_'+uid+"]").css({"display":"none"});
        $("[id = "+'_msg_box_'+uid+"]").css({"display":"block"});
    },

    removeBoxChat: function (uid){
        $("[id = "+'_msg_box_'+uid+"]").remove();
        $("[id = "+'_msg_box_down_'+uid+"]").remove();
     // numOfChatBox--;
    },

    openVideo: function(uid){
        //$('.video_call').each(function(){
        //    $(this).attr('disabled', 'disabled');
        //});
        var videoTag = $('<div class="videoCall" style="display: none" id="'+uid+'">'
            +'<video class="localVideo" id="localVideo"></video>'
            +'<video class="remoteVideo" id="remoteVideo"></video>'
            +'<div class="buttons" style="display: none"><i class="fa fa-expand" title="Mở màn hình lớn"></i><i class="fa fa-microphone" title="Tắt âm thanh" data-action="off"></i><i class="fa fa-video-camera" title="Tắt camera" data-action="off"></i><i class="fa fa-stop" title="Kết thúc" id="'+uid+'"></i></div>'
            +'</div>');
        //$("[class = "+uid+"]").fadeOut();
        $("[id = "+'_msg_body_'+uid+"]").append(videoTag);
        $('.videoCall').fadeIn();
    },

    closeVideo: function(uid){
        $('video').attr('src', '');
        $('.videoCall').remove();
        //$("[class = "+uid+"]").fadeIn();
        //$('.video_call').each(function(){
        //    $(this).removeAttr('disabled');
        //})
    },
    //expandVideo: function(){
    //    //var expandTag = $('<div class="expand"><video id="expandVideo"></video></div>');
    //}
}

