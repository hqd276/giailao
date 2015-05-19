var res = {};

res.BG_IMAGE = 'images/BG-HD.png';
res.FLOOR_IMAGE = 'images/Floor-HD.png';
res.ROBIN_IMAGE = 'images/Robin-HD.png';
res.CLOUD_IMAGE = 'images/Cloud-HD.png';
res.ENEMY_IMAGE = 'images/Enemy-HD.png';
res.BULLET_IMAGE = 'images/Berry-HD.png';
res.MOUNTAIN_IMAGE = 'images/Mount-HD.png';
res.TREE_IMAGE = 'images/Tree-HD.png';

res.ROBIN_SOUND = 'sounds/RobinTap1.wav';

var kZindexBG = 0;
var kZindexFloor = 40;
var kZindexRobin = 100;

var kRobinStateStopped = 0;
var kRobinStateMoving = 1;
var kRobinStartSpeedY = 300;
var kRobinStartX = 240;

var GRAVITY = -620;