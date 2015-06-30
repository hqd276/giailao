<div class="text-center">
	<div id="tagcloud">
		<ul>
			<li><a href="/about">Hoàng Dũng</a></li>
			<li><a href="#">Vân Vẹo</a></li>
			<li><a href="#">Ỉn</a></li>
			<li><a href="/game/caro">Cờ caro</a></li>
			<li><a href="/game/memory">Memory</a></li>
			<li><a href="/game/xepso">Xếp số</a></li>
			<li><a href="/game/2048">2048</a></li>
			<!-- <li><a href="snake.html">Rắn săn mồi</a></li> -->
			<li><a href="html/cc">Siêu nhơn</a></li>
			<!-- <li><a href="chess.html">Cờ vua</a></li> -->
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
		margin: 0 auto;
		border: 1px solid #ccc;
		box-shadow: 5px 5px 3px #888888;
	}
</style>

<script type="text/javascript">
	var w;
	if ($( window ).width()>768) {
		w = 500;
	}else{
		w =  $( window ).width() - 30;
	}

	var settings = {
	//height of sphere container
	height: w,
	//width of sphere container
	width: w,
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