<html>
	<head>
		<title>Match 3!!</title>
		<script src="p5.min.js" ></script>
	</head>
	<body>
		A Match 3 Game!
		<p>
		<script>
var gems = [];
var selected_gems = [];
var colors = ['red', 'green', 'blue'];

var gem_offset = 08;
var gem_width = 17;

var columns = 5;
var rows = 5;

function setup() {/*{{{*/
  createCanvas(720, 400);

  for (var i=0;i<columns;i++) {
	  gems[i] = [];
	  for (var j=0;j<rows;j++) {
		  gems[i][j] = new Gem(gem_offset + gem_width * i, gem_offset + gem_width * j, random(colors));
	  }
  }
}/*}}}*/

function draw() {/*{{{*/
	background(127);
	for(var i=0;i<columns;i++) {
	  for (var j=0;j<rows;j++) {
		gems[i][j].display();
	  }
	}
}/*}}}*/

//  gems that sit on the board
function Gem(X, Y, Color) {
	this.x = X;
	this.y = Y;

	this.diameter = 16;

	this.color_name = Color;

	this.color = color(Color);
	this.original_color = color(Color);

	this.selected = false;

	this.clear = false;

	// how to show this gem on the screen
	this.display = function() {/*{{{*/
		fill(this.color);
		if (this.selected) {
			stroke(color('white'));
		}
		else {
			noStroke();
		}
		ellipse(this.x, this.y, this.diameter, this.diameter);
	}/*}}}*/

	// highlight gem
	this.click = function() {/*{{{*/
		this.selected = !this.selected;
	}/*}}}*/
}

// handle mouse clicks
function mousePressed() {
	// where are we on the grid?
	var x = Math.floor(((mouseX) / gem_width));
	var y = Math.floor(((mouseY) / gem_width));

	var reset = false;

//	is something selected
//	is it ordinally adjacent to what was just clicked?
	if (selected_gems.length > 0) {
		if (	
			(x == selected_gems[0].x && (y + 1) == selected_gems[0].y) ||
			(x == selected_gems[0].x && (y - 1) == selected_gems[0].y) ||
			((x + 1) == selected_gems[0].x && y == selected_gems[0].y) ||
			((x - 1) == selected_gems[0].x && y == selected_gems[0].y)
		) {
			//	SWAP!

			//  check for collapse
			if (true) {

			}
			//  no collapse, put them back
			else {

			}	
		}
		else {
			reset = true;
		}
	}
//	if nothing is selected then select it
	else {
		reset = true;
	}

	if (reset) {
		gems[x][y].click();
		selected_gems = [];
		selected_gems[0] = gems[x][y];
	}
}

function markForDelete (streak, deleteme, i, j) {/*{{{*/
	if (streak.length == 0) {
		streak[0] = gems[i][j];
	} 
	else if (streak[0].color_name == gems[i][j].color_name) {
		streak[streak.length] = gems[i][j];
	}
	else {
		streak = [];
		streak[0] = gems[i][j];
	}
	
	if (streak.length >= 3) {
		for( var d=0;d<streak.length;d++) {
			deleteme.add(streak[d]);
		}
	}

	return [streak, deleteme];
}/*}}}*/

//	clear the board and repopulate it!
function clearBoard() {/*{{{*/
	var v_streak = [];
	var h_streak = [];
	var deleteme = new Set();
//	mark all the items that should be cleared
//	first check all the colums
	//	you go down the column until you see a streak of 3
	//	once you get that you keep following until you've 
	//	found the end of the streak
	//	then you mark them all for delete
	for(var i=0;i<columns;i++) {
		for(var j=0;j<rows;j++) {
		//	this is the columns
			r = markForDelete(v_streak, deleteme, i, j);
			v_streak = r[0];
			deleteme = r[1];
		//	this is the rows
			r = markForDelete(h_streak, deleteme, j, i);
			h_streak = r[0];
			deleteme = r[1];
		}
	}
//	remove all the marked gems at once
	console.log(deleteme);

//	shift everything that's left down

//	add new gems

// 	clear the board again!
}/*}}}*/
		</script>
		</p>
	</body>
</html>
