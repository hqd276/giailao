var GameLayer = cc.Layer.extend({
  _monsters:[], // enemy
  _projectiles:[], // bullet

  ctor:function(){
    this._super();
    this.init();
  },
  init:function(){
    this._super();
    // Lay size man hinh (canvas)
    var size = cc.director.getWinSize();

    //Init background
    var sprite = cc.Sprite.create(res.BG_IMAGE);
    sprite.setPosition(size.width / 2, size.height / 2);
    this.addChild(sprite, kZindexBG);

    //Mat dat
    this._floor = cc.Sprite.create(res.FLOOR_IMAGE);
    this._floor.setPosition(0, 0); // vị trí 0,0 của screen
    this._floor.setAnchorPoint(0,0); //Điểm neo 0.0 của object
    this.addChild(this._floor, kZindexFloor);
    //Init Label
    // var label = cc.LabelTTF.create("Hello World", "Arial", 40);
    // label.setPosition(size.width / 2, size.height / 2);
    // this.addChild(label, 1);

    this._robin = new RobinSprite(res.ROBIN_IMAGE);
    this._robin.setScale(0.5);
    this._robin.x = kRobinStartX;
    this._robin.y = size.height / 2;
    this._robin.topOfScreen = size.height;
    this._robin.Reset();
    this.addChild(this._robin, kZindexRobin);
  },
  onEnter:function(){
    this._super();
    cc.eventManager.addListener({
      event:cc.EventListener.TOUCH_ONE_BY_ONE,
      // event:cc.EventListener.MOUSE,
      swallowTouches:true,
      // onMouseUp:this.onMouseUp,
      onTouchBegan:this.onTouchBegan,
      // onTouchMoved:this.onTouchMoved,
      onTouchEnded:this.onTouchEnded,

    },this);

    this.schedule (this.addCloud,1);
    this.schedule (this.addMount,3);
    this.schedule (this.addTree,0.7);

    this.schedule (this.onTick);
  },

  onTick:function(dt){
    // console.log('dt:'+dt);
    if(this._robin.y < this._floor.y/2){
      this._robin.Reset();
      this._robin.y = cc.director.getWinSize().height/2;
    }
    this._robin.UpdateRobin(dt);
  },

  onTouchBegan:function(touch,event) {
    var tp = touch.getLocation();
    var tar = event.getCurrentTarget();
    console.log('onTouchBegan' + tp.x.toFixed(2) + ',' + tp.y.toFixed(2));

    if(tar._robin.state == kRobinStateStopped){
      tar._robin.state = kRobinStateMoving;
    }
    tar._robin.SetStartSpeed();

    //Chay sound khi click
    var audioEngine = cc.audioEngine;
    audioEngine.playEffect(res.ROBIN_SOUND);
    /* test with target, onTouch
    tar._floor.setPosition(tp.x,tp.y);
    console.log('floorPosition' + tar._floor.x.toFixed(2) + ',' + tar._floor.y.toFixed(2));
    console.log('floorHeight' + tar._floor.height);
    */
    // return true;
    return false; // set false for lock moved, ended
  },

  // onTouchMoved:function(touch,event) {
  //   var tp = touch.getLocation();
  //   console.log('onTouchMoved' + tp.x.toFixed(2) + ',' + tp.y.toFixed(2));
  // },
  onTouchEnded:function(touch,event) {
    var tp = touch.getLocation();
    console.log('onTouchEnded' + tp.x.toFixed(2) + ',' + tp.y.toFixed(2));
  },

  addAsset:function(asset) {
    var winSize = cc.director.getWinSize();
    var image, zIndex, scale, scaleX, minY, maxY ;
    scaleX = 1;
    scale = Math.random() * 0.5 + 1; // resize asset random
    switch(asset) {
      case 'cloud': 
        image = res.CLOUD_IMAGE;
        zIndex = kZindexFloor;
        minY = winSize.height/2;
        maxY = winSize.height;
        break;
      case 'mount': 
        image = res.MOUNTAIN_IMAGE;
        zIndex = kZindexRobin;
        minY = 0;
        maxY = this._floor.height;
        break;
      case 'tree': 
        image = res.TREE_IMAGE;
        zIndex = kZindexFloor;
        minY = this._floor.height/2;
        maxY = this._floor.height;
        break;
      default : 
        image = res.ENEMY_IMAGE;
        zIndex = kZindexRobin;
        scaleX = -1;
        minY = this._floor.height;
        maxY = winSize.height;
        break;
    }

    var monster = cc.Sprite.create(image);
    // monster.scaleX = scaleX; // Xoay Object
    monster.scale = scale;

    // random trong khoang max - min
    var rangeY = maxY - minY;
    var actualY = (Math.random() * rangeY) + minY; // 1
 
    // Create the monster slightly off-screen along the right edge,
    // and along a random position along the Y axis as calculated above
    monster.setPosition(winSize.width + monster.getContentSize().width/2, actualY);
    this.addChild(monster,zIndex); // 2
 
    // Determine speed of the monster
    var minDuration = 2.0;
    var maxDuration = 4.0;
    var rangeDuration = maxDuration - minDuration;
    var actualDuration = (Math.random() % rangeDuration) + minDuration;
 
    // Create the actions
    var actionMove = cc.MoveTo.create(actualDuration, cc.p(-monster.getContentSize().width/2, actualY)); // 3
    var actionMoveDone = cc.CallFunc.create(function(node) { // 4
        cc.arrayRemoveObject(this._monsters, node); // 5
        node.removeFromParent();
    }, this); 
    monster.runAction(cc.Sequence.create(actionMove, actionMoveDone));
 
    // Add to array
    monster.setTag(1);
    this._monsters.push(monster); // 6
    console.log(this._monsters.length);
  },
  addCloud:function(dt) {
    this.addAsset('cloud');
  },
  addMount:function(dt) {
    this.addAsset('mount');
  },
  addTree:function(dt) {
    this.addAsset('tree');
  },

});

GameLayer.scene = function(){
  var scene = new cc.Scene();
  var layer = new GameLayer();
  scene.addChild(layer);
  return scene;
}

window.onload = function(){
    var targetWidth = 960;
    var targetHeight = 640;

    cc.game.onStart = function(){
        cc.view.adjustViewPort(false);
        cc.view.setDesignResolutionSize(targetWidth,targetHeight,cc.ResolutionPolicy.SHOW_ALL);
        cc.view.resizeWithBrowserSize=true;

        //load resources
        cc.LoaderScene.preload(["images/HelloWorld.png"], function () {
            
            cc.director.runScene(GameLayer.scene());
        }, this);
    };
    cc.game.run("gameCanvas");
};
