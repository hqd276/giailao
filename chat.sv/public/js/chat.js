	
// var socket = io.connect('http://127.0.0.1:8080');
$(function(){
var socket = io.connect('http://127.0.0.1:8080');


socket.on('connect',function(){
	// prompt("What's your name?");
	socket.emit('addUser',prompt("What's your name?"))
});
// socket.on('updateUser',function(username){
	// addToList(username);
	// alert(username + 'added!');
	// prompt("success!")
// });
// function addMessage(msg) {
    // $("#chatEntries").append('<div class="message"><p>: ' + msg + '</p></div>');
// }

// function sentMessage() {
    // if ($('#messageInput').val() != "")
    // {
        // socket.emit('message', $('#messageInput').val());
        // addMessage($('#messageInput').val(), "Me", new Date().toISOString(), true);
        // $('#messageInput').val('');
    // }
// }

// function test(){
	// $('<div>TEST</div>')insertBefor('.end');
// }

// function addToList(username){
	// $(
		// '<li>'
			// +'<div class="inner">'
				// +'<div class="userAvatar">'
					// +'<img src="/img/avatar.png" alt=""></img>'
				// +'</div>'
				// +'<div class="userName">'
					// +username
				// +'</div>'
				// +'<div class="userStatus">'
					// +'<div class="text">web</div>'
					// +'<div class="icon">'
						// +'<img src="/img/online.png" alt=""></img>'
					// +'</div>'
				// +'</div>'
			// +'</div>'
		// +'</li>'
	// ).insertBefor('.endList');
// }
// socket.on('message', function(data) {
    // addMessage(data);
// });

// $(function() {
    // $("#submit").click(function() {sentMessage();});
// });
});