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
        <li><a href="" onclick="checkLoginState();">Đăng nhập bằng tài khoản Facebook</a></li>
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

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  // console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
      //Đã đn fb
    checkOpenUser();
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    // document.getElementById('status').innerHTML = 'Please log ' +
    //   'into this app.';
    FB.login(function(response) {
      if (response.authResponse) {
        //Đã đn fb
        checkOpenUser();
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    // document.getElementById('status').innerHTML = 'Please log ' +
    //   'into Facebook.';
    FB.login(function(response) {
      if (response.authResponse) {
        //Đã đn fb
        checkOpenUser();
      } else {
        console.log('User cancelled login or did not fully authorize.');
      }
    });
  }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function checkOpenUser() {
  // console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
    console.log(JSON.stringify(response));

    console.log('Successful login for: ' + response.name);
    // document.getElementById('status').innerHTML =
    //   'Thanks for logging in, ' + response.name + '!';
  });
}

  $('.navbar-brand').hover(function(){
    $(this).children('img').addClass('zoom',1000,"easeOutBounce" );
  },function(){
    $(this).children('img').removeClass('zoom');
  });
</script>