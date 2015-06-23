<div class="container text-center">
	<div id="tagcloud">
		<ul>
			<li><a href="#">Hoàng Dũng</a></li>
			<li><a href="#">Vân Vẹo</a></li>
			<li><a href="#">Ỉn</a></li>
			<!-- <li><a href="caro.html">Cờ caro</a></li> -->
			<li><a href="html/memory">Memory</a></li>
			<li><a href="html/xephinh">Xếp hình</a></li>
			<!-- <li><a href="snake.html">Rắn săn mồi</a></li> -->
			<li><a href="html/cc">Flappy Boy</a></li>
			<!-- <li><a href="chess.html">Cờ vua</a></li> -->
			<!-- <li><a href="2048.html">2048</a></li> -->
			<li><a href="https://www.facebook.com/">Facebook</a></li>
			<li><a href="https://www.google.com/">Google</a></li>
			<li><a href="https://www.twitter.com/">Twitter</a></li>
			<li><a href="https://www.getbootstrap.com/">Bootstrap</a></li>
			<li><a href="https://www.jquery.com/">Jquery</a></li>
			<li><a href="https://www.codeigniter.com/">Codeigniter</a></li>
			<li><a href="https://www.php.net/">Php</a></li>
			<li><a href="https://www.mysql.com/">Mysql</a></li>
			<li><a href="https://www.cocos2d-x.org/">Cocos2d-x</a></li>
			<li><a href="https://www.libgdx.badlogicgames.com/">Libgdx</a></li>
			<li><a href="https://www.unity3d.com/">Unity3d</a></li>
			<li><a href="https://www.java.com/">Java</a></li>
			<li><a href="https://www.sublimetext.com/">Sublimetext</a></li>
			<li><a href="https://www.notepad-plus-plus.org/">Notepad-plus-plus</a></li>
			<li><a href="https://www.adobe.com/">Adobe</a></li>
		</ul>
	</div>
</div>

<style type="text/css">
	.container {
		padding: 30px auto;
	}
	#tagcloud {
		margin: 30px auto;
	}
</style>

<script type="text/javascript">
	var settings = {
	//height of sphere container
	height: 500,
	//width of sphere container
	width: 500,
	//radius of sphere
	radius: 100,
	//rotation speed
	speed: 1,
	//sphere rotations slower
	slower: 0.9,
	//delay between up<a href="http://www.jqueryscript.net/time-clock/">date</a> position
	timer: 5,
	//dependence of a font size on axis Z
	fontMultiplier: 30,
	//tag css stylies on mouse over
	hoverStyle: {
	border: 'none',
	color: '#0b2e6f'
	},
	//tag css stylies on mouse out
	mouseOutStyle: {
	border: '',
	color: ''
	}
	};

	$(document).ready(function(){
		$('#tagcloud').tagoSphere(settings);
	});
</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/tagcloud.jquery.js"></script>