﻿var http = require('http'),
express = require('express'),
app = express(),
io = require('socket.io'),
//QB = require('quickblox'),
server = http.createServer(app);
 
io = io.listen(server.listen(8080));

console.log('server started!');

require('./config')(app, io);
require('./routes')(app, io);
