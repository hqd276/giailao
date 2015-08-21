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
        <!-- <li><a href="#" onclick="addToPage();">Thêm vào Fan page</a></li> -->
      </ul>
      <ul class="pull-right nav navbar-nav">
        <?php if ($is_login) {?>
        <li><a href="#"> Chào <strong><?php echo $o_user['name'] ?></strong></a> </li>
        <li><a href="/user/ologout">Thoát</a></li>
        <?php } else {?>
        <li><a href="#" onclick="checkLoginState();">Đăng nhập bằng tài khoản Facebook</a></li>
        <?php }?>
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
    console.log(response);


    $.ajax({
      method: "POST",
      url: "user/facebook",
      data: {id:response.id, 
            first_name:response.first_name,
            last_name:response.last_name,
            gender:response.gender,
            link:response.link,
            name:response.name,}
    })
    .done(function( msg ) {
      console.log(msg);
      if (msg.status)
        window.location.href = '/';
    });

    // console.log('Successful login for: ' + response.name);
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

<?php if ($is_login) {?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('chat.sv/public/css/hint.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('chat.sv/public/css/style.css');?>">
<!--Chat list-->
<div class="chatList">
    <!-- <div class="cl_header"></div> -->
    <div class="cl_wrap">
      <!-- <div class="notification"></div>  -->
      <div class="list">
        <div class="list_inner">
        <!--Friend list showed here-->
          <div class="list_push"></div>
        </div>
      </div>
      <!-- <div class="cl_tool">
        <div class="cl_tool_inner">
          <img src="<?php echo base_url('chat.sv/public/img/tool_search.png')?>">
          <input class="search_input" placeholder="Tìm kiếm"/>
          <div class="tool_icon">
            <div class="tool_icon_inner">
              <a class="tool_new_message" title="Tin nhắn mới"></a>
              <a class="tool_setting" title="Tùy chỉnh"></a>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  
  </div>

<!--End Chat list-->

<!--Chat box-->
<div class="box_wrap">
  <div class="box_inner">
  <!--Message showed here-->

    <div class="box_end"></div>
    <div class="overflow_tab" style="display:none">
      <div class="overflow_tab_inner">
        <div class="overflow_icon"></div>
        <div class="number_of_tabs"></div>
      </div>
    </div>
    <div class="overflow_list" style="display:none;">
      <div class="overflow_list_inner">
        <div class="_list_push"></div>
      </div>
    </div>
    <div class="strike_cover" style="display:none;"></div>
  </div>
</div>
<?php }?>