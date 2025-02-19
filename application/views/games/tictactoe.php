<!DOCTYPE html>
<html>
<head>
    <title>Play TicTacToe on Porter Buddy App</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1" />
   	<style>
  	    body {
        	margin: 0;
        	padding: 0;
        	font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;
        	background-color :#ccc;
        }
        
        html {
          box-sizing: border-box;
        }
        *, *:before, *:after {
          box-sizing: inherit;
        }
        
        h1 {
        	margin-top: 0;
        	margin-bottom: 0;
        	text-align: center;
        }
        
        h2 {
        	text-align: center;
        	margin-top: 10px;	
        }
        
        .wrapper {
        	background-color: white;
        	width: 666px;
        	padding: 30px;
        	margin: 30px auto;
        	box-shadow: 1px 4px 8px #000000;
        	position: relative;
        }
        
        .row {
        	height: 200px;
        	width: 100%;
        }
        
        .row-02 {
        	height: 206px;
        	border-top: 3px solid black;
        	border-bottom: 3px solid black;
        }
        
        .square {
        	width: 200px;
        	height: 200px;
        	float: left;
        	line-height: 200px;
        	text-align: center;
        	font-size: 100px;
        	font-weight: bold;
        }
        
        .square-01,
        .square-04,
        .square-07 {
        	width: 206px;
        	border-left: 3px solid black;
        	border-right: 3px solid black;
        }
  	</style>
</head>
<body>
	<div class="wrapper">
	<header>
		<h1>Tic Tac Toe</h1><br>
	</header>
	<main class="gameboard">
		
		<div class="row row-01">
			<div class="square square-00" data-index="0"></div>
			<div class="square square-01" data-index="1"></div>
			<div class="square square-02" data-index="2"></div>
		</div><!-- end row-01 -->

		<div class="row row-02">
			<div class="square square-03" data-index="3"></div>
			<div class="square square-04" data-index="4"></div>
			<div class="square square-05" data-index="5"></div>
		</div><!-- end row-02 -->

		<div class="row row-03">
			<div class="square square-06" data-index="6"></div>
			<div class="square square-07" data-index="7"></div>
			<div class="square square-08" data-index="8"></div>
		</div><!-- end row-03 -->

	</main>

</div><!-- end wrapper -->
</body>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script>
    
    // Tic Tac Toe with Medium AI
// ver 1.0
// Author: Michael Whyte
//
// AI.getBestMove() and GAME.checkwin() code modified 
// from code found at:
//
// http://aharrisbooks.net/h5g/h5g_13/tictactoe/tttAI.html
//
// AI.getBestMove() and GAME.checkwin() code based on 
// lessons learned from the book: 
// HTML5 Game Development for Dummies
// by: Andy Harris
//
// Game Object
//
// 1. initialize the game
// --a: clear the game board
// --b: clear the board array
// --c: clear the data-played attributes
//
// 2. store the game board array
//
// 3. store the winning combinations
//
// 4. update the game board
//
// 5. Check for winner
//
// 6. Store game state variables

var GAME = {

	// Game State variables
	isComputerPlaying: false,
	isGameOver: false,
	numberOfPlayedSquares: 0,

	// original Game Board;
	gameBoard: [null, null, null, null, null, null, null, null, null],

	// the HTML game square elements
	squares: $('.square'),

	winningCombos: [[0,1,2],[3,4,5],[6,7,8],[0,3,6],[1,4,7],[2,5,8],[0,4,8],[2,4,6]],

	// update the Game board array
	updateGameBoard: function(index, value, el){
		
		this.gameBoard[index] = value;
		el.html(value);
		
	}, // end updateGameBoard

	// initialize the game
	init: function(){

		// clear the squares
		this.squares.each(function(){

			$(this).html('');

		});

		this.gameBoard = [null, null, null, null, null, null, null, null, null]; 
		this.isComputerPlaying = false;
		this.isGameOver = false;
		this.numberOfPlayedSquares = 0;

	}, // end GAME.init()

	checkWin: function(value){

		var winner = false;
        
        for (var combo = 0; combo < this.winningCombos.length; combo++){
            var a = this.winningCombos[combo][0];
            var b = this.winningCombos[combo][1];
            var c = this.winningCombos[combo][2];
            
            if (GAME.gameBoard[a] === GAME.gameBoard[b]){
                if (GAME.gameBoard[b] === GAME.gameBoard[c]){
                    if (GAME.gameBoard[a] !== null){
                        this.endGame(value);
                        winner = true;
                    } // end if
                } // end if
            } // end if
        } // end for
        
        return winner;

	},

	endGame: function(value){

		if(value === 'X'){
			alert('Congratulations you won!!!');
		}else if(value === 'O'){
			alert('The Computer won');
		}else{
			alert('It\'s a draw...');
		}

		this.isGameOver = true;

		var playAgain = confirm('Click Ok to play again...');

		if(playAgain === true){
			this.init();
		}

	}

}; // end GAME

// AI Object
// 
// 1. play turn
// --a: choose best square to play 

var AI = {

	getBestMove: function(){

		// use a heuristic algorithm to determine the best play

		//initial rank based on number of winning combos
		//that go through the cell
		var cellRank = [3,2,3,2,4,2,3,2,3];

		//demote any cells already taken
		for(var i = 0; i < GAME.gameBoard.length; i++){
		    if(GAME.gameBoard[i] !== null){
		        cellRank[i] -= 99;
		    } // end if
		} // end for

		//look for partially completed combos
		for(var combo = 0; combo < GAME.winningCombos.length; combo++){
		    var a = GAME.winningCombos[combo][0];
		    var b = GAME.winningCombos[combo][1];
		    var c = GAME.winningCombos[combo][2];
		    
		    //if any two cells in a combo are
		    //non-blank and the same value,
		    //promote the remaining cell		    
		    if(GAME.gameBoard[a] === GAME.gameBoard[b]){
		        if(GAME.gameBoard[a] !== null){
		            if(GAME.gameBoard[c] === null){
		                cellRank[c] += 10;
		            } // end if
		        } // end if
		    } // end if
		    
		    if(GAME.gameBoard[a] === GAME.gameBoard[c]){
		        if(GAME.gameBoard[a] !== null){
		            if(GAME.gameBoard[b] === null){
		                cellRank[b] += 10;
		            } // end if
		        } // end if
		    } // end if
		    
		    if(GAME.gameBoard[b] === GAME.gameBoard[c]){
		        if(GAME.gameBoard[b] !== null){
		            if(GAME.gameBoard[a] === null){
		                cellRank[a] += 10;
		            } // end if
		        } // end if
		    } // end if            		    
		} // end for

		//determine the best move to make
		var bestCell = -1;
		var highest = -999;

		//step through cellRank to find the best available score
		for(var j = 0; j < GAME.gameBoard.length; j++){
		    if(cellRank[j] > highest){
		        highest = cellRank[j];
		        bestCell = j;
		    } // end if
		} // end for

		return bestCell;        

	},

	playTurn: function(){

		GAME.isComputerPlaying = true;

		var theSquareToPlay = this.getBestMove();

		var $theSelectedSquare = $('.square-0' + theSquareToPlay);

		GAME.numberOfPlayedSquares++;
		// slow the computer down a bit
		setTimeout(function(){
			
			GAME.updateGameBoard(theSquareToPlay, 'O', $theSelectedSquare);
			GAME.checkWin('O');
			GAME.isComputerPlaying = false;

		}, 500);

	}// end playTurn()	

}; // end AI

// Click event handlers
GAME.squares.click(function(){

	var squareIndexValue = parseInt($(this).data('index'));

	function checkIfTurnIsReady(){

		if(GAME.isGameOver){ return false; }
		if(GAME.isComputerPlaying){ return false; }
		if(GAME.gameBoard[squareIndexValue] === null){ return true; }

	}

	var isTurnReady = checkIfTurnIsReady();

	if( isTurnReady ){

		GAME.updateGameBoard( squareIndexValue, 'X', $(this) );
		GAME.numberOfPlayedSquares++;
		var winner = GAME.checkWin('X');
		if(winner === false && GAME.numberOfPlayedSquares < 9){
			AI.playTurn();
		}else if(GAME.numberOfPlayedSquares === 9){
			GAME.endGame('draw');
		} 

	} // endif isTurnReady

}); // end GAME.squares.click event handler






</script>
</html>