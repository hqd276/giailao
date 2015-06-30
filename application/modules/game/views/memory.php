<div class="">
  <!-- <h1 class="text-center">
      Luyện trí nhớ
  </h1> -->
  <div class="col-md-6">
    <div id="picbox">
      <div class="text-center">
          <div class="fb-share-button" data-href="http://giailao.com/game/memory/" data-layout="button_count">
          </div>
      </div>
      <span id="boxbuttons">
        <span class="button">
          <span id="counter">0</span>
          Lượt
        </span>
        <span class="button">
          <a onclick="ResetGame();">Chơi lại</a>
        </span> 
      </span>
      <div id="boxcard"></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="fb-comments" data-href="http://giailao.com/game/memory/" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
  </div>
</div>

<style type="text/css">
#picbox {
  margin: 0px auto;
  width: 540px;
}
#boxcard {
  z-index: 1;
  margin: 10px 0 0;
}
#boxcard div{
  float: left;
  width: 80px;
  height: 111px;
  margin: 5px;
  padding: 0;
  border: 1px solid #282828;
  cursor: pointer;
  border-radius: 10px;
  box-shadow: 0 1px 5px rgba(0,0,0,.5);
  background: rgba(255,255,255,.2);
  z-index: 2;
}
#boxcard div img {
  width: 78px;
  display: none;
  border-radius: 10px;
  z-index: 3;
}
#boxbuttons {
  text-align: center;
  margin: 20px;
  display: block;
}
#boxbuttons .button {
  text-transform: uppercase;
  background: #ccc;
  padding: 5px 10px;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
}
#boxbuttons .button:hover {
  background: #999;
}
#boxbuttons .button a{
  color: #fff;
}
</style>

<script type="text/javascript">
  var BoxOpened = "";
var ImgOpened = "";
var Counter = 0;
var ImgFound = 0;

var Source = "#boxcard";

var ImgSource = [
  "/assets/images/memory/0-wenger.png",
  "/assets/images/memory/1-szczesny.png",
  "/assets/images/memory/2-Debuchy.png",
  "/assets/images/memory/3-Gibbs.png",
  "/assets/images/memory/4-Merter.png",
  "/assets/images/memory/5-Vermaleen.png",
  "/assets/images/memory/6-Koscielny.png",
  "/assets/images/memory/7-Rosicky.png",
  "/assets/images/memory/8-Arterta.png",
  "/assets/images/memory/9-Podolski.png",
  "/assets/images/memory/10-Wilshere.png",
  "/assets/images/memory/11-Ozil.png",
];

function RandomFunction(MaxValue, MinValue) {
    return Math.round(Math.random() * (MaxValue - MinValue) + MinValue);
  }
  
function ShuffleImages() {
  var ImgAll = $(Source).children();
  var ImgThis = $(Source + " div:first-child");
  var ImgArr = new Array();

  for (var i = 0; i < ImgAll.length; i++) {
    ImgArr[i] = $("#" + ImgThis.attr("id") + " img").attr("src");
    ImgThis = ImgThis.next();
  }
  
    ImgThis = $(Source + " div:first-child");
  
  for (var z = 0; z < ImgAll.length; z++) {
  var RandomNumber = RandomFunction(0, ImgArr.length - 1);

    $("#" + ImgThis.attr("id") + " img").attr("src", ImgArr[RandomNumber]);
    ImgArr.splice(RandomNumber, 1);
    ImgThis = ImgThis.next();
  }
}

function ResetGame() {
  ShuffleImages();
  $(Source + " div img").hide();
  $(Source + " div").css("visibility", "visible");
  Counter = 0;
  $("#success").remove();
  $("#counter").html("" + Counter);
  BoxOpened = "";
  ImgOpened = "";
  ImgFound = 0;
  return false;
}

function OpenCard() {
  var id = $(this).attr("id");

  if ($("#" + id + " img").is(":hidden")) {
    $(Source + " div").unbind("click", OpenCard);
  
    $("#" + id + " img").fadeIn('fast');

    if (ImgOpened == "") {
      BoxOpened = id;
      ImgOpened = $("#" + id + " img").attr("src");
      setTimeout(function() {
        $(Source + " div").bind("click", OpenCard)
      }, 300);
    } else {
      CurrentOpened = $("#" + id + " img").attr("src");
      if (ImgOpened != CurrentOpened) {
        setTimeout(function() {
          $("#" + id + " img").fadeOut('fast');
          $("#" + BoxOpened + " img").fadeOut('fast');
          BoxOpened = "";
          ImgOpened = "";
        }, 400);
      } else {
        $("#" + id + " img").parent().css("visibility", "hidden");
        $("#" + BoxOpened + " img").parent().css("visibility", "hidden");
        ImgFound++;
        BoxOpened = "";
        ImgOpened = "";
      }
      setTimeout(function() {
        $(Source + " div").bind("click", OpenCard)
      }, 400);
    }
    Counter++;
    $("#counter").html("" + Counter);

    if (ImgFound == ImgSource.length) {
      $("#counter").prepend('<span id="success">Bạn đã mở hết trong </span>');
    }
  }
}

$(function() {

for (var y = 1; y < 3 ; y++) {
  $.each(ImgSource, function(i, val) {
    $(Source).append("<div id=card" + y + i + "><img src=" + val + " />");
  });
}
  $(Source + " div").click(OpenCard);
  ShuffleImages();
});

</script>