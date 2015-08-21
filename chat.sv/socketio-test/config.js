var express = require('express');
    //QB = require('quickblox');

module.exports = function(app, io){
    app.set('views', __dirname + '/views');
    app.set("view options", { layout: false });
    app.use(express.static(__dirname + '/public'));

};