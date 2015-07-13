<nav class="navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img src="/assets/images/logo.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/about">Giải lao</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Games <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/game/caro">Cờ caro</a></li>
            <li><a href="/html/cc">Siêu nhơn tới đây ^^</a></li>
            <li><a href="/game/memory">Luyện trí nhớ</a></li>
            <li><a href="/game/xepso">Xếp số</a></li>
            <li><a href="/game/2048">2048</a></li>
          </ul>
        </li>
        <li><a href="" onclick="addToPage();">Thêm vào Fan page</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<script type="text/javascript">
function addToPage(){
  FB.ui({
    method: 'pagetab',
    redirect_uri: 'https://giailao.com/'
  }, function(response){});
}

  $('.navbar-brand').hover(function(){
    $(this).children('img').addClass('zoom',1000,"easeOutBounce" );
  },function(){
    $(this).children('img').removeClass('zoom');
  });
</script>