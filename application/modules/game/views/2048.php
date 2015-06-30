<script src="/assets/js/hammer.min.js"></script>

<div class="">
  <!-- <h1 class="text-center">
      2048
  </h1> -->
  <div class="col-md-6">
    <div class="text-center">
        <div class="fb-share-button" data-href="http://giailao.com/game/2048" data-layout="button_count">
        </div>
    </div>

    <div class="heading">
      <div class="score-container">0</div>
    </div>
    <div class="clearfix"></div>
    <div class="game-container">
      <div class="game-message">
        <p></p>
        <div class="lower">
          <a class="retry-button">Try again</a>
        </div>
      </div>

      <div class="grid-container">
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
        <div class="grid-row">
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
          <div class="grid-cell"></div>
        </div>
      </div>
      <div class="tile-container">

      </div>      
    </div>

    <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>
    <p class="game-explanation">
      <strong class="important">How to play:</strong> Use your <strong>arrow keys</strong> to move the tiles. When two tiles with the same number touch, they <strong>merge into one!</strong>
    </p>
  </div>
  <div class="col-md-6">
    <div class="fb-comments" data-href="http://giailao.com/game/2048" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
  </div>
</div>

<style type="text/css">
@-webkit-keyframes $animation-name {
  0% {
    top: 25px;
    opacity: 1;
  }
  100% {
    top: -50px;
    opacity: 0;
  }
}
@-moz-keyframes $animation-name {
  0% {
    top: 25px;
    opacity: 1;
  }
  100% {
    top: -50px;
    opacity: 0;
  }
}
@keyframes $animation-name {
  0% {
    top: 25px;
    opacity: 1;
  }
  100% {
    top: -50px;
    opacity: 0;
  }
}
.score-container {
  position: relative;
  /*float: right;*/
  background: #bbada0;
  /*padding: 15px 25px;*/
  padding-top: 15px;
  font-size: 25px;
  height: 60px;
  line-height: 47px;
  font-weight: bold;
  border-radius: 3px;
  color: white;
  margin-top: 8px;
  width: 60px;
  margin: 10px auto;
}
/*.score-container:after {
  position: absolute;
  width: 100%;
  top: 10px;
  left: 0;
  content: "Score";
  text-transform: uppercase;
  font-size: 13px;
  line-height: 13px;
  text-align: center;
  color: #eee4da;
}*/
.score-container .score-addition {
  position: absolute;
  top: 0;
  /*right: 30px;*/
  color: red;
  font-size: 25px;
  line-height: 25px;
  font-weight: bold;
  color: rgba(119, 110, 101, 0.9);
  z-index: 100;
  -webkit-animation: move-up 600ms ease-in;
  -moz-animation: move-up 600ms ease-in;
  -webkit-animation-fill-mode: both;
  -moz-animation-fill-mode: both;
}

@-webkit-keyframes $animation-name {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@-moz-keyframes $animation-name {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@keyframes $animation-name {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
.game-container {
  margin: 10px auto;
  position: relative;
  padding: 15px;
  cursor: default;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  background: #bbada0;
  border-radius: 6px;
  width: 500px;
  height: 500px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.game-container .game-message {
  display: none;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(238, 228, 218, 0.5);
  z-index: 100;
  text-align: center;
  -webkit-animation: fade-in 800ms ease 1200ms;
  -moz-animation: fade-in 800ms ease 1200ms;
  -webkit-animation-fill-mode: both;
  -moz-animation-fill-mode: both;
}
.game-container .game-message p {
  font-size: 60px;
  font-weight: bold;
  height: 60px;
  line-height: 60px;
  margin-top: 222px;
}
.game-container .game-message .lower {
  display: block;
  margin-top: 59px;
}
.game-container .game-message a {
  display: inline-block;
  background: #8f7a66;
  border-radius: 3px;
  padding: 0 20px;
  text-decoration: none;
  color: #f9f6f2;
  height: 40px;
  line-height: 42px;
  margin-left: 9px;
}
.game-container .game-message.game-won {
  background: rgba(237, 194, 46, 0.5);
  color: #f9f6f2;
}
.game-container .game-message.game-won, .game-container .game-message.game-over {
  display: block;
}

.grid-container {
  position: absolute;
  z-index: 1;
}

.grid-row {
  margin-bottom: 15px;
}
.grid-row:last-child {
  margin-bottom: 0;
}
.grid-row:after {
  content: "";
  display: block;
  clear: both;
}

.grid-cell {
  width: 106.25px;
  height: 106.25px;
  margin-right: 15px;
  float: left;
  border-radius: 3px;
  background: rgba(238, 228, 218, 0.35);
}
.grid-cell:last-child {
  margin-right: 0;
}

.tile-container {
  position: absolute;
  z-index: 2;
}

.tile {
  width: 106.25px;
  height: 106.25px;
  line-height: 116.25px;
}
.tile.tile-position-1-1 {
  position: absolute;
  left: 0px;
  top: 0px;
}
.tile.tile-position-1-2 {
  position: absolute;
  left: 0px;
  top: 121px;
}
.tile.tile-position-1-3 {
  position: absolute;
  left: 0px;
  top: 243px;
}
.tile.tile-position-1-4 {
  position: absolute;
  left: 0px;
  top: 364px;
}
.tile.tile-position-2-1 {
  position: absolute;
  left: 121px;
  top: 0px;
}
.tile.tile-position-2-2 {
  position: absolute;
  left: 121px;
  top: 121px;
}
.tile.tile-position-2-3 {
  position: absolute;
  left: 121px;
  top: 243px;
}
.tile.tile-position-2-4 {
  position: absolute;
  left: 121px;
  top: 364px;
}
.tile.tile-position-3-1 {
  position: absolute;
  left: 243px;
  top: 0px;
}
.tile.tile-position-3-2 {
  position: absolute;
  left: 243px;
  top: 121px;
}
.tile.tile-position-3-3 {
  position: absolute;
  left: 243px;
  top: 243px;
}
.tile.tile-position-3-4 {
  position: absolute;
  left: 243px;
  top: 364px;
}
.tile.tile-position-4-1 {
  position: absolute;
  left: 364px;
  top: 0px;
}
.tile.tile-position-4-2 {
  position: absolute;
  left: 364px;
  top: 121px;
}
.tile.tile-position-4-3 {
  position: absolute;
  left: 364px;
  top: 243px;
}
.tile.tile-position-4-4 {
  position: absolute;
  left: 364px;
  top: 364px;
}

.tile {
  border-radius: 3px;
  background: #eee4da;
  text-align: center;
  font-weight: bold;
  z-index: 10;
  font-size: 55px;
  -webkit-transition: 100ms ease-in-out;
  -moz-transition: 100ms ease-in-out;
  -webkit-transition-property: top, left;
  -moz-transition-property: top, left;
}
.tile.tile-2 {
  background: #eee4da;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0), inset 0 0 0 1px rgba(255, 255, 255, 0);
}
.tile.tile-4 {
  background: #ede0c8;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0), inset 0 0 0 1px rgba(255, 255, 255, 0);
}
.tile.tile-8 {
  color: #f9f6f2;
  background: #f2b179;
}
.tile.tile-16 {
  color: #f9f6f2;
  background: #f59563;
}
.tile.tile-32 {
  color: #f9f6f2;
  background: #f67c5f;
}
.tile.tile-64 {
  color: #f9f6f2;
  background: #f65e3b;
}
.tile.tile-128 {
  color: #f9f6f2;
  background: #edcf72;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0.2381), inset 0 0 0 1px rgba(255, 255, 255, 0.14286);
  font-size: 45px;
}
@media screen and (max-width: 480px) {
  .tile.tile-128 {
    font-size: 25px;
  }
}
.tile.tile-256 {
  color: #f9f6f2;
  background: #edcc61;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0.31746), inset 0 0 0 1px rgba(255, 255, 255, 0.19048);
  font-size: 45px;
}
@media screen and (max-width: 480px) {
  .tile.tile-256 {
    font-size: 25px;
  }
}
.tile.tile-512 {
  color: #f9f6f2;
  background: #edc850;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0.39683), inset 0 0 0 1px rgba(255, 255, 255, 0.2381);
  font-size: 45px;
}
@media screen and (max-width: 480px) {
  .tile.tile-512 {
    font-size: 25px;
  }
}
.tile.tile-1024 {
  color: #f9f6f2;
  background: #edc53f;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0.47619), inset 0 0 0 1px rgba(255, 255, 255, 0.28571);
  font-size: 35px;
}
@media screen and (max-width: 480px) {
  .tile.tile-1024 {
    font-size: 15px;
  }
}
.tile.tile-2048 {
  color: #f9f6f2;
  background: #edc22e;
  box-shadow: 0 0 30px 10px rgba(243, 215, 116, 0.55556), inset 0 0 0 1px rgba(255, 255, 255, 0.33333);
  font-size: 35px;
}
@media screen and (max-width: 480px) {
  .tile.tile-2048 {
    font-size: 15px;
  }
}

@-webkit-keyframes $animation-name {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
@-moz-keyframes $animation-name {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
@keyframes $animation-name {
  0% {
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
.tile-new {
  -webkit-animation: appear 200ms ease 100ms;
  -moz-animation: appear 200ms ease 100ms;
  -webkit-animation-fill-mode: both;
  -moz-animation-fill-mode: both;
}

@-webkit-keyframes $animation-name {
  0% {
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
@-moz-keyframes $animation-name {
  0% {
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
@keyframes $animation-name {
  0% {
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
  }
  50% {
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
  }
}
.tile-merged {
  z-index: 20;
  -webkit-animation: pop 200ms ease 100ms;
  -moz-animation: pop 200ms ease 100ms;
  -webkit-animation-fill-mode: both;
  -moz-animation-fill-mode: both;
}

.game-intro {
  margin-bottom: 0;
}

@media screen and (max-width: 480px) {
  html, body {
    font-size: 15px;
  }

  body {
    margin: 20px 0;
    padding: 0 20px;
  }

  h1.title {
    font-size: 50px;
  }

  .container {
    width: 280px;
    margin: 0 auto;
  }

  .score-container {
    margin-top: 0;
  }

  .heading {
    margin-bottom: 10px;
  }

  .game-container {
    margin-top: 40px;
    position: relative;
    padding: 15px;
    cursor: default;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    background: #bbada0;
    border-radius: 6px;
    width: 500px;
    height: 500px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }
  .game-container .game-message {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(238, 228, 218, 0.5);
    z-index: 100;
    text-align: center;
    -webkit-animation: fade-in 800ms ease 1200ms;
    -moz-animation: fade-in 800ms ease 1200ms;
    -webkit-animation-fill-mode: both;
    -moz-animation-fill-mode: both;
  }
  .game-container .game-message p {
    font-size: 60px;
    font-weight: bold;
    height: 60px;
    line-height: 60px;
    margin-top: 222px;
  }
  .game-container .game-message .lower {
    display: block;
    margin-top: 59px;
  }
  .game-container .game-message a {
    display: inline-block;
    background: #8f7a66;
    border-radius: 3px;
    padding: 0 20px;
    text-decoration: none;
    color: #f9f6f2;
    height: 40px;
    line-height: 42px;
    margin-left: 9px;
  }
  .game-container .game-message.game-won {
    background: rgba(237, 194, 46, 0.5);
    color: #f9f6f2;
  }
  .game-container .game-message.game-won, .game-container .game-message.game-over {
    display: block;
  }

  .grid-container {
    position: absolute;
    z-index: 1;
  }

  .grid-row {
    margin-bottom: 15px;
  }
  .grid-row:last-child {
    margin-bottom: 0;
  }
  .grid-row:after {
    content: "";
    display: block;
    clear: both;
  }

  .grid-cell {
    width: 106.25px;
    height: 106.25px;
    margin-right: 15px;
    float: left;
    border-radius: 3px;
    background: rgba(238, 228, 218, 0.35);
  }
  .grid-cell:last-child {
    margin-right: 0;
  }

  .tile-container {
    position: absolute;
    z-index: 2;
  }

  .tile {
    width: 106.25px;
    height: 106.25px;
    line-height: 116.25px;
  }
  .tile.tile-position-1-1 {
    position: absolute;
    left: 0px;
    top: 0px;
  }
  .tile.tile-position-1-2 {
    position: absolute;
    left: 0px;
    top: 121px;
  }
  .tile.tile-position-1-3 {
    position: absolute;
    left: 0px;
    top: 243px;
  }
  .tile.tile-position-1-4 {
    position: absolute;
    left: 0px;
    top: 364px;
  }
  .tile.tile-position-2-1 {
    position: absolute;
    left: 121px;
    top: 0px;
  }
  .tile.tile-position-2-2 {
    position: absolute;
    left: 121px;
    top: 121px;
  }
  .tile.tile-position-2-3 {
    position: absolute;
    left: 121px;
    top: 243px;
  }
  .tile.tile-position-2-4 {
    position: absolute;
    left: 121px;
    top: 364px;
  }
  .tile.tile-position-3-1 {
    position: absolute;
    left: 243px;
    top: 0px;
  }
  .tile.tile-position-3-2 {
    position: absolute;
    left: 243px;
    top: 121px;
  }
  .tile.tile-position-3-3 {
    position: absolute;
    left: 243px;
    top: 243px;
  }
  .tile.tile-position-3-4 {
    position: absolute;
    left: 243px;
    top: 364px;
  }
  .tile.tile-position-4-1 {
    position: absolute;
    left: 364px;
    top: 0px;
  }
  .tile.tile-position-4-2 {
    position: absolute;
    left: 364px;
    top: 121px;
  }
  .tile.tile-position-4-3 {
    position: absolute;
    left: 364px;
    top: 243px;
  }
  .tile.tile-position-4-4 {
    position: absolute;
    left: 364px;
    top: 364px;
  }

  .game-container {
    margin-top: 20px;
  }

  .tile {
    font-size: 35px;
  }

  .game-message p {
    font-size: 30px !important;
    height: 30px !important;
    line-height: 30px !important;
    margin-top: 90px !important;
  }
  .game-message .lower {
    margin-top: 30px !important;
  }
}

</style>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function () {
  // Wait till the browser is ready to render the game (avoids glitches)
  window.requestAnimationFrame(function () {
    var manager = new GameManager(4, KeyboardInputManager, HTMLActuator);
  });
});


function GameManager(size, InputManager, Actuator) {
  this.size         = size; // Size of the grid
  this.inputManager = new InputManager;
  this.actuator     = new Actuator;

  this.startTiles   = 2;

  this.inputManager.on("move", this.move.bind(this));
  this.inputManager.on("restart", this.restart.bind(this));

  this.setup();
}

// Restart the game
GameManager.prototype.restart = function () {
  this.actuator.restart();
  this.setup();
};

// Set up the game
GameManager.prototype.setup = function () {
  this.grid         = new Grid(this.size);

  this.score        = 0;
  this.over         = false;
  this.won          = false;

  // Add the initial tiles
  this.addStartTiles();

  // Update the actuator
  this.actuate();
};

// Set up the initial tiles to start the game with
GameManager.prototype.addStartTiles = function () {
  for (var i = 0; i < this.startTiles; i++) {
    this.addRandomTile();
  }
};

// Adds a tile in a random position
GameManager.prototype.addRandomTile = function () {
  if (this.grid.cellsAvailable()) {
    var value = Math.random() < 0.9 ? 2 : 4;
    var tile = new Tile(this.grid.randomAvailableCell(), value);

    this.grid.insertTile(tile);
  }
};

// Sends the updated grid to the actuator
GameManager.prototype.actuate = function () {
  this.actuator.actuate(this.grid, {
    score: this.score,
    over:  this.over,
    won:   this.won
  });
};

// Save all tile positions and remove merger info
GameManager.prototype.prepareTiles = function () {
  this.grid.eachCell(function (x, y, tile) {
    if (tile) {
      tile.mergedFrom = null;
      tile.savePosition();
    }
  });
};

// Move a tile and its representation
GameManager.prototype.moveTile = function (tile, cell) {
  this.grid.cells[tile.x][tile.y] = null;
  this.grid.cells[cell.x][cell.y] = tile;
  tile.updatePosition(cell);
};

// Move tiles on the grid in the specified direction
GameManager.prototype.move = function (direction) {
  // 0: up, 1: right, 2:down, 3: left
  var self = this;

  if (this.over || this.won) return; // Don't do anything if the game's over

  var cell, tile;

  var vector     = this.getVector(direction);
  var traversals = this.buildTraversals(vector);
  var moved      = false;

  // Save the current tile positions and remove merger information
  this.prepareTiles();

  // Traverse the grid in the right direction and move tiles
  traversals.x.forEach(function (x) {
    traversals.y.forEach(function (y) {
      cell = { x: x, y: y };
      tile = self.grid.cellContent(cell);

      if (tile) {
        var positions = self.findFarthestPosition(cell, vector);
        var next      = self.grid.cellContent(positions.next);

        // Only one merger per row traversal?
        if (next && next.value === tile.value && !next.mergedFrom) {
          var merged = new Tile(positions.next, tile.value * 2);
          merged.mergedFrom = [tile, next];

          self.grid.insertTile(merged);
          self.grid.removeTile(tile);

          // Converge the two tiles' positions
          tile.updatePosition(positions.next);

          // Update the score
          self.score += merged.value;

          // The mighty 2048 tile
          if (merged.value === 2048) self.won = true;
        } else {
          self.moveTile(tile, positions.farthest);
        }

        if (!self.positionsEqual(cell, tile)) {
          moved = true; // The tile moved from its original cell!
        }
      }
    });
  });

  if (moved) {
    this.addRandomTile();

    if (!this.movesAvailable()) {
      this.over = true; // Game over!
    }

    this.actuate();
  }
};

// Get the vector representing the chosen direction
GameManager.prototype.getVector = function (direction) {
  // Vectors representing tile movement
  var map = {
    0: { x: 0,  y: -1 }, // up
    1: { x: 1,  y: 0 },  // right
    2: { x: 0,  y: 1 },  // down
    3: { x: -1, y: 0 }   // left
  };

  return map[direction];
};

// Build a list of positions to traverse in the right order
GameManager.prototype.buildTraversals = function (vector) {
  var traversals = { x: [], y: [] };

  for (var pos = 0; pos < this.size; pos++) {
    traversals.x.push(pos);
    traversals.y.push(pos);
  }

  // Always traverse from the farthest cell in the chosen direction
  if (vector.x === 1) traversals.x = traversals.x.reverse();
  if (vector.y === 1) traversals.y = traversals.y.reverse();

  return traversals;
};

GameManager.prototype.findFarthestPosition = function (cell, vector) {
  var previous;

  // Progress towards the vector direction until an obstacle is found
  do {
    previous = cell;
    cell     = { x: previous.x + vector.x, y: previous.y + vector.y };
  } while (this.grid.withinBounds(cell) &&
           this.grid.cellAvailable(cell));

  return {
    farthest: previous,
    next: cell // Used to check if a merge is required
  };
};

GameManager.prototype.movesAvailable = function () {
  return this.grid.cellsAvailable() || this.tileMatchesAvailable();
};

// Check for available matches between tiles (more expensive check)
GameManager.prototype.tileMatchesAvailable = function () {
  var self = this;

  var tile;

  for (var x = 0; x < this.size; x++) {
    for (var y = 0; y < this.size; y++) {
      tile = this.grid.cellContent({ x: x, y: y });

      if (tile) {
        for (var direction = 0; direction < 4; direction++) {
          var vector = self.getVector(direction);
          var cell   = { x: x + vector.x, y: y + vector.y };

          var other  = self.grid.cellContent(cell);
          if (other) {
          }

          if (other && other.value === tile.value) {
            return true; // These two tiles can be merged
          }
        }
      }
    }
  }

  return false;
};

GameManager.prototype.positionsEqual = function (first, second) {
  return first.x === second.x && first.y === second.y;
};



function Grid(size) {
  this.size = size;

  this.cells = [];

  this.build();
}

// Build a grid of the specified size
Grid.prototype.build = function () {
  for (var x = 0; x < this.size; x++) {
    var row = this.cells[x] = [];

    for (var y = 0; y < this.size; y++) {
      row.push(null);
    }
  }
};

// Find the first available random position
Grid.prototype.randomAvailableCell = function () {
  var cells = this.availableCells();

  if (cells.length) {
    return cells[Math.floor(Math.random() * cells.length)];
  }
};

Grid.prototype.availableCells = function () {
  var cells = [];

  this.eachCell(function (x, y, tile) {
    if (!tile) {
      cells.push({ x: x, y: y });
    }
  });

  return cells;
};

// Call callback for every cell
Grid.prototype.eachCell = function (callback) {
  for (var x = 0; x < this.size; x++) {
    for (var y = 0; y < this.size; y++) {
      callback(x, y, this.cells[x][y]);
    }
  }
};

// Check if there are any cells available
Grid.prototype.cellsAvailable = function () {
  return !!this.availableCells().length;
};

// Check if the specified cell is taken
Grid.prototype.cellAvailable = function (cell) {
  return !this.cellOccupied(cell);
};

Grid.prototype.cellOccupied = function (cell) {
  return !!this.cellContent(cell);
};

Grid.prototype.cellContent = function (cell) {
  if (this.withinBounds(cell)) {
    return this.cells[cell.x][cell.y];
  } else {
    return null;
  }
};

// Inserts a tile at its position
Grid.prototype.insertTile = function (tile) {
  this.cells[tile.x][tile.y] = tile;
};

Grid.prototype.removeTile = function (tile) {
  this.cells[tile.x][tile.y] = null;
};

Grid.prototype.withinBounds = function (position) {
  return position.x >= 0 && position.x < this.size &&
         position.y >= 0 && position.y < this.size;
};


function HTMLActuator() {
  this.tileContainer    = document.getElementsByClassName("tile-container")[0];
  this.scoreContainer   = document.getElementsByClassName("score-container")[0];
  this.messageContainer = document.getElementsByClassName("game-message")[0];

  this.score = 0;
}

HTMLActuator.prototype.actuate = function (grid, metadata) {
  var self = this;

  window.requestAnimationFrame(function () {
    self.clearContainer(self.tileContainer);

    grid.cells.forEach(function (column) {
      column.forEach(function (cell) {
        if (cell) {
          self.addTile(cell);
        }
      });
    });

    self.updateScore(metadata.score);

    if (metadata.over) self.message(false); // You lose
    if (metadata.won) self.message(true); // You win!
  });
};

HTMLActuator.prototype.restart = function () {
  this.clearMessage();
};

HTMLActuator.prototype.clearContainer = function (container) {
  while (container.firstChild) {
    container.removeChild(container.firstChild);
  }
};

HTMLActuator.prototype.addTile = function (tile) {
  var self = this;

  var element   = document.createElement("div");
  var position  = tile.previousPosition || { x: tile.x, y: tile.y };
  positionClass = this.positionClass(position);

  // We can't use classlist because it somehow glitches when replacing classes
  var classes = ["tile", "tile-" + tile.value, positionClass];
  this.applyClasses(element, classes);

  element.textContent = tile.value;

  if (tile.previousPosition) {
    // Make sure that the tile gets rendered in the previous position first
    window.requestAnimationFrame(function () {
      classes[2] = self.positionClass({ x: tile.x, y: tile.y });
      self.applyClasses(element, classes); // Update the position
    });
  } else if (tile.mergedFrom) {
    classes.push("tile-merged");
    this.applyClasses(element, classes);

    // Render the tiles that merged
    tile.mergedFrom.forEach(function (merged) {
      self.addTile(merged);
    });
  } else {
    classes.push("tile-new");
    this.applyClasses(element, classes);
  }

  // Put the tile on the board
  this.tileContainer.appendChild(element);
};

HTMLActuator.prototype.applyClasses = function (element, classes) {
  element.setAttribute("class", classes.join(" "));
};

HTMLActuator.prototype.normalizePosition = function (position) {
  return { x: position.x + 1, y: position.y + 1 };
};

HTMLActuator.prototype.positionClass = function (position) {
  position = this.normalizePosition(position);
  return "tile-position-" + position.x + "-" + position.y;
};

HTMLActuator.prototype.updateScore = function (score) {
  this.clearContainer(this.scoreContainer);

  var difference = score - this.score;
  this.score = score;

  this.scoreContainer.textContent = this.score;

  if (difference > 0) {
    var addition = document.createElement("div");
    addition.classList.add("score-addition");
    addition.textContent = "+" + difference;

    this.scoreContainer.appendChild(addition);
  }
};

HTMLActuator.prototype.message = function (won) {
  var type    = won ? "game-won" : "game-over";
  var message = won ? "You win!" : "Game over!"

  // if (ga) ga("send", "event", "game", "end", type, this.score);

  this.messageContainer.classList.add(type);
  this.messageContainer.getElementsByTagName("p")[0].textContent = message;
};

HTMLActuator.prototype.clearMessage = function () {
  this.messageContainer.classList.remove("game-won", "game-over");
};



function KeyboardInputManager() {
  this.events = {};

  this.listen();
}

KeyboardInputManager.prototype.on = function (event, callback) {
  if (!this.events[event]) {
    this.events[event] = [];
  }
  this.events[event].push(callback);
};

KeyboardInputManager.prototype.emit = function (event, data) {
  var callbacks = this.events[event];
  if (callbacks) {
    callbacks.forEach(function (callback) {
      callback(data);
    });
  }
};

KeyboardInputManager.prototype.listen = function () {
  var self = this;

  var map = {
    38: 0, // Up
    39: 1, // Right
    40: 2, // Down
    37: 3, // Left
    75: 0, // vim keybindings
    76: 1,
    74: 2,
    72: 3
  };

  document.addEventListener("keydown", function (event) {
    var modifiers = event.altKey || event.ctrlKey || event.metaKey ||
                    event.shiftKey;
    var mapped    = map[event.which];

    if (!modifiers) {
      if (mapped !== undefined) {
        event.preventDefault();
        self.emit("move", mapped);
      }

      if (event.which === 32) self.restart.bind(self)(event);
    }
  });

  var retry = document.getElementsByClassName("retry-button")[0];
  retry.addEventListener("click", this.restart.bind(this));

  // Listen to swipe events
  var gestures = [Hammer.DIRECTION_UP, Hammer.DIRECTION_RIGHT,
                  Hammer.DIRECTION_DOWN, Hammer.DIRECTION_LEFT];

  var gameContainer = document.getElementsByClassName("game-container")[0];
  var handler       = Hammer(gameContainer, {
    drag_block_horizontal: true,
    drag_block_vertical: true
  });
  
  handler.on("swipe", function (event) {
    event.gesture.preventDefault();
    mapped = gestures.indexOf(event.gesture.direction);

    if (mapped !== -1) self.emit("move", mapped);
  });
};

KeyboardInputManager.prototype.restart = function (event) {
  event.preventDefault();
  this.emit("restart");
};

function Tile(position, value) {
  this.x                = position.x;
  this.y                = position.y;
  this.value            = value || 2;

  this.previousPosition = null;
  this.mergedFrom       = null; // Tracks tiles that merged together
}

Tile.prototype.savePosition = function () {
  this.previousPosition = { x: this.x, y: this.y };
};

Tile.prototype.updatePosition = function (position) {
  this.x = position.x;
  this.y = position.y;
};
</script>