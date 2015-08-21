/**
 * Created by moouse on 8/6/2015.
 */
//$('.container')
var videoCall = {
    login: function(data){
        //var error = 0;
        if(data){
            //QBApp = {
            //    appId: data.aID,
            //    authKey: data.aK,
            //    authSecret: data.aS
            //};
            //QB.init(QBApp.appId, QBApp.authKey, QBApp.authSecret);
            QB.createSession(function(err,result){
                if(err){
                    error['videocall_login'] = 1;
                }else{
                    var params = {login: 'user'+myID};
                    QB.users.get(params, function(er, user){
                        var password = '12345678';
                        if(er){
                            console.log('GET ERROR\n');
                            console.log(er);
                            var params2 = { 'login': 'user'+myID, 'password': password};

                            QB.users.create(params2, function(err, user){
                                if (err) {
                                    error['videocall_login'] = 1;
                                } else  {
                                    caller = {
                                        id: user.id,
                                        full_name: friendsName[myID],
                                        login: 'user'+myID,
                                        password: password
                                    };
                                    $.post(SITE_URL + "/module.php",{"process":"login_qb","id":myID,"qbId":caller.id});
                                    videoCall.createSession();
                                }
                            });
                        }else{
                            console.log('GET SUCCESS\n');
                            console.log(user.id);
                            caller = {
                                id: user.id,
                                full_name: friendsName[myID],
                                login: 'user'+myID,
                                password: password
                            };
                            $.post(SITE_URL + "/module.php",{"process":"login_qb","id":myID,"qbId":caller.id});
                            videoCall.createSession();
                        }
                    });
                }
            });
        }else{
            error['videocall_login'] = 1;
        }
        if(error['videocall_login']) {
            alert('Bạn không thể sử dụng dịch vụ video call! Đề nghị kiểm tra lại kết nối!');
            if($('.videoCall').length != 0){
                videoCall.hangUp();
                chatbox.closeVideo(current_callee);
            }
        }
        //if(caller){
        //    alert('GET INFO SUCCESS!!!');
        //}else{
        //    console.log('GET INFO ERROR!');
        //}
    },
    chooseFriend: function(fid){
        callee = QBUsers[fid];
    },
    callVideo: function(fid){
        mediaParams = {
            audio: true,
            video: true,
            elemId: 'localVideo',
            options: {
                muted: true,
                mirror: true
            }
        };
        QB.webrtc.getUserMedia(mediaParams, function(err, stream) {
            if (err) {
                console.log(err);
                alert('Khong the thuc hien cuoc goi voi '+friendsName[fid]);
                chatbox.closeVideo(current_callee);
            } else {
                //$('#callingSignal')[0].play();
                //chatbox.openVideo(fid);
                QB.webrtc.call(callee.id, 'video', {});
            }
        });
    },
    callAudio: function(){

    },
    acceptCall: function(id){
        //alert(0);

            QB.webrtc.getUserMedia(mediaParams, function(err, stream) {
                //alert(1);
                if (err) {
                    console.log(err);
                    alert('Lỗi kết nối!!!');
                    chatbox.closeVideo(current_callee);
                    QB.webrtc.reject(callee.id);
                } else {
                    QB.webrtc.accept(callee.id);
                }
            });
            QB.webrtc.onRemoteStreamListener = function(stream) {
                QB.webrtc.attachMediaStream('remoteVideo', stream);
            };

    },
    hangUp: function(){
        if (typeof callee != 'undefined'){
            QB.webrtc.stop(callee.id, 'manually');
        }
    },
    reject: function(){
        if (typeof callee != 'undefined'){
            QB.webrtc.reject(callee.id);
        }
    },
    controlCamera: function(){
        if($('.fa-video-camera').data('action') === 'off'){
            $('.fa-video-camera').addClass('off').data('action','on');
            QB.webrtc.mute('video');
        }else{
            $('.fa-video-camera').removeClass('off').data('action','off');
            QB.webrtc.unmute('video');
        }
    },
    controlAudio: function(){
        if($('.fa-microphone').data('action') === 'off'){
            $('.fa-microphone').addClass('off').data('action','on');
            QB.webrtc.mute('audio');
        }else{
            $('.fa-microphone').removeClass('off').data('action','off');
            QB.webrtc.unmute('audio');
        }
    },
    createSession: function () {
        QB.createSession(caller, function(err, res) {
            if(err){
                alert('CREATE SS ERROR');
                console.log(err);
                error['videocall_login'] = 1;
            }else{
                //alert('CREATE SS SUCCESS!!!');
                videoCall.connectChat();
            }
        });
    },
    connectChat: function(){
        QB.chat.connect({
            jid: QB.chat.helpers.getUserJid(caller.id, QBApp.appId),
            password: caller.password
        }, function(err, res) {
           if(err){
               error['videocall_login'] = 1;
           }
        })
    }
}