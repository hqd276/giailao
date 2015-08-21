// This file is required by app.js. It sets up event listeners
// for the two main URL endpoints of the application - /create and /chat/:id
// and listens for socket.io messages.

// Use the gravatar module, to turn email addresses into avatar images:

var QB = require('quickblox'),
    QBApp = {
        appId: 26522,
        authKey: 'XOOK3PkmX34qm9f',
        authSecret: 'Zkf7W3xG9Gz9uyL'
    };

// Export a function, so that we can pass 
// the app and io instances from the app.js file:

module.exports = function(app,io){

    app.get('/', function(req, res){
        res.sendFile(__dirname + '/views/index.html');
    });

    app.get('/chat',function(req,res){
        res.sendFile(__dirname + '/views/index.html');
    });
    var flags = {};
    var sockets = {};
    var roomsID = {};
    var roomsName = {};
    io.sockets.on('connection', function (socket) {
        var id;
        console.log(id);
        socket.on('joinChat', function (uid, friendList) {
            //var QBApp={appId:, authKey:,authSecret:};
            id = uid;
            sockets[uid] = socket;
            flags[uid] = 1;
            var fid;
            var online = {};
            console.log(friendList);
            for (var key in friendList) {
                fid = friendList[key].id;
                console.log(fid);
                if (flags[fid] == 1) {
                    online[fid] = fid;
                    sockets[fid].emit('updateUser', uid);
                }
                ;
            }
            ;
            socket.emit('getOnlineList', online);
            socket.emit('loginQB',{"aID":QBApp.appId,"aK":QBApp.authKey,"aS":QBApp.authSecret});
            console.log('has connected with id' + socket.uid + ' uid:' + uid);
            console.log('socket:' + sockets[uid]);
        });
        socket.on('message', function (data) {
            // var id = socket.id;
            if (sockets[data.uid] != null) {
                sockets[data.uid].emit('message', {
                    msg: data.msg,
                    uid: id
                });
            }
            ;
        });
        socket.on('creatRoom', function (data) {
            var roomID = data.roomID;
            var roomName = data.roomName;
            roomsID[roomID] = roomID;
            roomsName[roomID] = roomName;
            console.log(roomID);
            for (var key in data.roomList) {
                if (sockets[key]) {
                    sockets[key].emit('getRoom', {roomID: roomID, roomName: roomName});
                    sockets[key].join(roomsID[roomID]);
                    console.log(key + ' come to room ' + roomsID[roomID]);
                }
                ;
            }
            ;
        });

        socket.on('joinRoom', function (roomID, uid) {
            sockets[uid].join(roomsID[roomID]);
        });

        socket.on('updateRoom', function (data) {
            var roomID = data.roomID;
            for (var key in data.roomList) {
                if (sockets[key] != null) {
                    sockets[key].emit('getRoom', {roomID: roomID, roomName: roomsName[roomID]});
                    sockets[key].join(roomsID[roomID]);
                    console.log(key + ' join to room ' + roomsID[roomID]);
                }
                ;
            }
        });
        socket.on('messageRoom', function (data) {
            socket.broadcast.to(roomsID[data.uid]).emit('messageChatRoom', {
                msg: data.msg,
                uid: data.uid
            });
        });
        //socket.on('video_call',function(data){
        //    //QB.webrtc.
        //    console.log('pid:'+data.pId+'\nhid:'+data.hId);
        //})
        socket.on('disconnect', function () {
            socket.broadcast.emit('outChat', id);
            delete sockets[id];
            delete flags[id];
            console.log(socket.id);
        });
        socket.on('callVideo',function(data){
            if(sockets[data.pId])
                sockets[data.pId].emit('incomingCall',data.hId);
            else
                socket.emit('errorCall');
        })
    });
};


