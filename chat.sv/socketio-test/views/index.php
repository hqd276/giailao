<!DOCTYPE html>
<html>
	<head>
		<title>CHAT</title>
		<script type="text/javascript" src="/socket.io/socket.io.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="/js/chat.js"></script>
		<script type="text/javascript" src="/js/test01.js"></script>
	</head>
	<body>
		<div class="container">
			<div id="chatEntries"></div>
			<div id="chatControls">
			<a href="#" onClick="testFunction()">TEST</a>
				<input type="text" id="messageInput"></input>
				<button id="submit" >SEND</button>
			</div>
		</div>
	</body>
</html>