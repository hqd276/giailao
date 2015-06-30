<div class="">
  <!-- <h1 class="text-center">
      Xếp số
  </h1> -->
  <div class="col-sm-6">
    <div id="picbox">
      <div class="text-center">
          <div class="fb-share-button" data-href="http://giailao.com/game/xepso" data-layout="button_count">
          </div>
      </div>
      <p>Số bước đi: <span id="moves">0</span> - Sử dụng phím mũi tên để di chuyển</p>

      <div class="canvas"></div>

      <div class="win">
          <p>Pro vãi :-o !</p>
          <a class="btn" href="#">Chơi lại</a>
      </div>

      <p>
          <a class="btn" href="#">Chơi lại</a>
      </p>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="fb-comments" data-href="http://giailao.com/game/xepso" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
  </div>
</div>

<style type="text/css">
a:hover {
    color: #333;
}

.canvas {
    -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
    -moz-box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
    width: 400px;
    height: 400px;
    margin: auto;
    background-color: #eee;
    position: relative;
    border: 2px solid #DDD;
    box-sizing: border-box;
}

.canvas > div {
    width: 100px;
    height: 100px;
    position: absolute;
    line-height: 100px;
    font-size: 2.4em;
    background-color: #F1F1F1;
    color: #4B5F6D;
    font-weight: bold;
    font-family: "Segoe UI Light", sans-serif;
    box-sizing: border-box;
    border: 1px solid #DDD;
}

.canvas > div:not(.null) {
    transition: .1s ease left, .1s ease top;
    z-index: 50;
}

.win {
    position: fixed;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
    z-index: 600;
    border-radius: 15px;
    background-color: #fff;
    box-shadow: 0 0 10px 900px rgba(0, 0, 0, .3), 0 0 15px rgba(0, 0, 0, 0.5);
    text-transform: uppercase;
    padding: 30px;
    display: none;
}

.win p {
    font-size: 4em;
}

.btn {
    display: inline-block;
    border-radius: 3px;
    background-color: #fff;
    border: 1px solid #000;
    padding: 5px 15px;
    font-weight: bold;
}

.btn:hover {
    background-color: #fafafa;
}
</style>

<script type="text/javascript">
/**
 * Puzzle Class
 *
 * @constructor
 */
var Puzzle = function Puzzle(el) {
  this.matrix = [];
  this.el = document.querySelector(el);
  this.movesEl = document.getElementById('moves');
  this._moves = 0;
  this._lock = false;
};

Puzzle.getNeighbors = function (index) {
  var result = {
    top: null,
    bottom: null,
    left: null,
    right: null
  };

  if ([3, 7, 11, 15].indexOf(index) === -1) {
    result.right = index + 1;
  }

  if ([0, 4, 8, 12].indexOf(index) === -1) {
    result.left = index - 1;
  }

  if (index > 3) {
    result.top = index - 4;
  }

  if (index < 12) {
    result.bottom = index + 4;
  }

  return result;
};

Puzzle.getPositionByIndex = function (index) {
  return [Math.floor(index % 4) * 100, Math.floor(index / 4) * 100];
};

Puzzle.prototype.getNeighbors = function (index) {
  var neighbors = Puzzle.getNeighbors(index);

  for (var position in neighbors) {
    var value = neighbors[position];
    if (value !== null) {
      neighbors[position] = this.matrix[value];
    }
  }

  return neighbors;
};

Puzzle.prototype.shuffle = function () {
  var matrix = this.matrix;
  var tempArray = [];
  var n = matrix.length;
  for (var i = 0; i < n; i++) {
    tempArray.push(matrix.splice(Math.floor(Math.random() * matrix.length), 1)[0]);
  }

  this.matrix = tempArray;

  return this;
};

Puzzle.prototype.createNumbers = function () {
  for (var i = 0; i < 16; i++) {
    this.matrix[i] = new Piece(this);
    this.matrix[i].el = document.createElement('div');
    this.matrix[i].el.innerHTML = i + 1;
    this.matrix[i].realIndex = i;

    this.el.appendChild(this.matrix[i].el);
  }

  this.matrix[15].el.innerHTML = '';
  this.matrix[15].el.className = 'null';
  this.matrix[15].isNull = true;

  return this;
};

Puzzle.prototype.updatePositions = function () {
  for (var i = 0; i < this.matrix.length; i++) {
    var obj = this.matrix[i];
    var position = Puzzle.getPositionByIndex(i);
    obj.el.style.left = position[0] + 'px';
    obj.el.style.top = position[1] + 'px';
  }

  return this;
};

Puzzle.prototype.__defineGetter__('nullPiece', function () {
  for (var i = 0; i < this.matrix.length; i++) {
    var obj = this.matrix[i];
    if (obj.isNull) {
      return obj;
    }
  }
});

Puzzle.prototype.move = function (direction) {
  if (this._lock) {
    return;
  }

  var nullPiece = this.nullPiece,
    neighbors = nullPiece.getNeighbors(),
    toReplace;

  switch (direction) {
    case 'up':
      toReplace = neighbors.bottom;
      break;
    case 'down':
      toReplace = neighbors.top;
      break;
    case 'left':
      toReplace = neighbors.right;
      break;
    case 'right':
      toReplace = neighbors.left;
      break;
  }

  if(toReplace !== null) {
    nullPiece.replace(toReplace);
    this.moves++;
    this.updatePositions();
    this.checkWin();
  }
};

Puzzle.prototype.checkWin = function () {
  for (var i = 0; i < this.matrix.length; i++) {
    var obj = this.matrix[i];
    if (obj.realIndex !== obj.index) {
      return false;
    }
  }

  document.querySelector('.win').style.display = 'block';
  this.lock();

  return true;
};

Puzzle.prototype.__defineGetter__('moves', function () {
  return this._moves;
});

Puzzle.prototype.__defineSetter__('moves', function (moves) {
  this._moves = moves;
  this.movesEl.innerHTML = this._moves;
});

Puzzle.prototype.unlock = function () {
  this._lock = false;
};

Puzzle.prototype.lock = function () {
  this._lock = true;
};

/**
 * Pieces Class
 *
 * @param puzzle
 * @constructor
 */
var Piece = function Piece(puzzle) {
  this.el = null;
  this.parent = puzzle;
  this.isNull = false;
  this.realIndex = 0;
};

Piece.prototype.__defineGetter__('index', function () {
  return this.parent.matrix.indexOf(this);
});

Piece.prototype.getNeighbors = function () {
  return this.parent.getNeighbors(this.index);
};

Piece.prototype.replace = function (piece) {
  if (piece) {
    var myIndex = this.index,
      thatIndex = piece.index;

    this.parent.matrix[myIndex] = piece;
    this.parent.matrix[thatIndex] = this;

    return this;
  }
};

var puzzle = new Puzzle('.canvas').createNumbers().shuffle().updatePositions();

window.addEventListener('keydown', function (e) {
  var key = e.keyCode;

  switch (key) {
    case 37:
      puzzle.move('left');
      e.preventDefault();
      break;
    case 38:
      puzzle.move('up');
      e.preventDefault();
      break;
    case 39:
      puzzle.move('right');
      e.preventDefault();
      break;
    case 40:
      puzzle.move('down');
      e.preventDefault();
      break;
  }
});

function newGame() {
  puzzle.moves = 0;
  puzzle.shuffle().updatePositions().unlock();
}

var buttons = document.querySelectorAll('.btn');

for (var i = 0; i < buttons.length; i++) {
  buttons[i]
    .addEventListener('click', function (e) {
      e.preventDefault();

      newGame();
    });
}

document.querySelector('.win').addEventListener('click', function (e) {
  e.preventDefault();

  document.querySelector('.win').style.display = 'none';
});
</script>