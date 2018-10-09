
var settings = {
	// Probability that a ball is created on a given tick.
	probabilityBallIsGenerated: 0.2,
	// Determines max possible falling speed that balls may be assigned.
	ballSpeedLimit: 5,
	// Probability that a given ball, once created, is yellow.
	probabilityBallID: 0.5,
	// Number of seconds to appear on the timer when the game begins.
	initialTimerValue: 60,
	// Number of seconds to add to timer when a question is answered correctly.
	timerTopupAmount: 10,
	// No of balls to collect before a question is asked.
	targetToCollect: 20,
	// Image source for player 1. Multiple images used when player1.draw argument is set to "flash".
	player1Src: ["/games/quiz_collector/img/blue.png", "/games/quiz_collector/img/white.png"],
	// Image source for balls.
	ballSrc: ["/games/quiz_collector/img/yellow.png","/games/quiz_collector/img/red.png"]
};

var answer = {
	// Determines the order in which answers are assigned to the buttons
	buttonOrderSequence: [],
	// Stops user entering more than one answer. Value set to 1 after answer has been submitted
	submitted: 0,

	//Executed if user answers question correctly.
	correct: function() {
		if (answer.submitted == 0) {
			scoring.score++;
			timer.topup();
			elementID.answerCorrect.style.display="block";
			answer.submitted = 1;
			setTimeout(game.prepareForNextRound,2000);
		}
	},

	// Executed if user answers question incorrectly
	incorrect: function() {
		if (answer.submitted == 0) {
			elementID.answerIncorrect.style.display="block";
			answer.submitted = 1;
			setTimeout(game.prepareForNextRound,2000);
		}
	},

	// Assign the four possible answers to the four buttons in a random order.
	setOrder: function() {
		answer.buttonOrderSequence = random.sequence(3);
	}
};

var ball = {
	// Determines type of ball: "yellow" or "red"
	ID: [],
	// Assuming all types of ball have the same dimensions. Used in scoring.collisionBottomHasOccurred
	height: '',
	numberOf: 0,
	speed: [],
	yellowBallImage: new Image(),
	redBallImage: new Image(),
	// Assuming all types of ball have the same dimensions. Used in scoring.collisionTopHasOccurred
	width: '',
	XPositions: [],
	YPositions: [],
	numberOfBalls: 0,

	// Generates new ball data
	generateBall: function(probability,speedLimit) {
		if (Math.random() < probability) {
			ball.generateStartingCoordinates();
			ball.generateStartingSpeed(speedLimit);
			ball.generateType();
		}
		ball.numberOf = ball.XPositions.length;
	},

	// Generates a random starting position for a new ball
	generateStartingCoordinates: function() {
		ball.XPositions.push(Math.random()*player1.rightBoundary);
		ball.YPositions.push(-30);
	},

	// Assigns a speed to a new ball at random
	generateStartingSpeed: function(upperLimit) {
		ball.speed.push(Math.random()*upperLimit);
	},

	// Assigns a type to a new ball, red or yellow
	generateType: function() {
		if (Math.random() < settings.probabilityBallID) {
			ball.ID.push("yellow");
		}
		else ball.ID.push("red");
	},

	//Set the value of ball.numberOfBalls to the number of balls in play
	obtainCurrentNumberOfBallsInPlay: function() {
		ball.numberOfBalls = ball.XPositions.length;
	},

	//Increments the y-coordinate of each ball in play
	incrementYCoords: function() {
		var currentBall = 0;

		while (currentBall < ball.numberOfBalls) {
			ball.YPositions[currentBall] = ball.YPositions[currentBall] + ball.speed[currentBall];
			currentBall++;
		}
	},

	// Draws each of the balls on the canvas
	draw: function() {
		var currentBall = 0;

		while (currentBall < ball.numberOfBalls) {
			if (ball.ID[currentBall] == "yellow") {
				elementID.gameCanvas.getContext("2d").drawImage(ball.yellowBallImage, ball.XPositions[currentBall], ball.YPositions[currentBall]);
			}
			else if (ball.ID[currentBall] == "red") {
				elementID.gameCanvas.getContext("2d").drawImage(ball.redBallImage, ball.XPositions[currentBall], ball.YPositions[currentBall]);
			}
			currentBall++;
		}
	},

	// Delete all array entries for ball with index a
	remove: function(n) {
		ball.XPositions.splice(n,1);
		ball.YPositions.splice(n,1);
		ball.speed.splice(n,1);
		ball.ID.splice(n,1);
	},

	// Clears the screen of balls by clearing all the relevant arrays
	removeAll: function() {
		ball.XPositions = [];
		ball.YPositions = [];
		ball.speed = [];
		ball.ID = [];
	},
	// Assign ball images
	setImage: function() {
		ball.yellowBallImage.src = settings.ballSrc[0];
		ball.redBallImage.src = settings.ballSrc[1];
	}
};

var button = {

	// Assign the answers to the buttons
	assignAnswers: function() {
		elementID.buttonA.innerHTML = question.questionList[question.ID*5 + answer.buttonOrderSequence[0]];
		elementID.buttonB.innerHTML = question.questionList[question.ID*5 + answer.buttonOrderSequence[1]];
		elementID.buttonC.innerHTML = question.questionList[question.ID*5 + answer.buttonOrderSequence[2]];
		elementID.buttonD.innerHTML = question.questionList[question.ID*5 + answer.buttonOrderSequence[3]];
	},

	// Executed when button A is clicked. Check whether the answer is correct
	clickA: function() {
		if (answer.buttonOrderSequence[0]==1) {
			answer.correct();
		}
		else answer.incorrect();
	},

	// Executed when button B is clicked. Check whether the answer is correct.
	clickB: function() {
		if (answer.buttonOrderSequence[1]==1) {
			answer.correct();
		}
		else answer.incorrect();
	},

	// Executed when button C is clicked. Check whether the answer is correct.
	clickC: function() {
		if (answer.buttonOrderSequence[2]==1) {
			answer.correct();
		}
		else answer.incorrect();
	},

	//Executed when button D is clicked. Check whether the answer is correct.
	clickD: function() {
		if (answer.buttonOrderSequence[3]==1) {
			answer.correct();
		}
		else answer.incorrect();
	}
};

var canvas = {

	height: 0,
	width: 0,

	// Clears the canvas
	clear: function() {
		elementID.gameCanvas.width = canvas.width;
	},

	// Set dimensions of the canvas. Need to subtract 2, taking 1px border into account.
	setDimensions: function() {
		canvas.height = elementID.gameCanvas.offsetHeight - 2;
		canvas.width = elementID.gameCanvas.offsetWidth - 2;
	},

	// Set boundaries to prevent player1 (image size 30px x 33px) going off canvas
	setPlayer1Boundaries: function() {
		player1.rightBoundary = canvas.width - 30;
		player1.bottomBoundary = canvas.height - 33;
	},
};

var elementID = {

	answerButtons: '',
	answerCorrect: '',
	answerIncorrect: '',
	buttonA: '',
	buttonB: '',
	buttonC: '',
	buttonD: '',
	container: '',
	gameCanvas: '',
	instructions: '',
	name: '',
	questionContainer: '',
	questionText: '',

	//Initialize shortcuts to be used instead of document.getElementById.
	//Note this can be better acheived with jquery using $().
	setShorthands: function() {
		elementID.answerButtons = document.getElementById("answerButtons");
		elementID.answerCorrect = document.getElementById("answerCorrect");
		elementID.answerIncorrect = document.getElementById("answerIncorrect");
		elementID.buttonA = document.getElementById("buttonA");
		elementID.buttonB = document.getElementById("buttonB");
		elementID.buttonC = document.getElementById("buttonC");
		elementID.buttonD = document.getElementById("buttonD");
		elementID.container = document.getElementById("container");
		elementID.gameCanvas = document.getElementById("gameCanvas");
		elementID.instructions = document.getElementById("instructions");
		elementID.name = document.getElementById("name");
		elementID.questionContainer = document.getElementById("questionContainer");
		elementID.questionText = document.getElementById("questionText");
	},
};

var game = {

	//Variables used to store return values of setInterval in game.startTick().
	handleTickHold: '',
	countdownHold: '',
	tickCounter: 0,
	initialClick: 0,

	// Tasks to be performed when user first clicks the canvas to begin the game.
	begin: function() {
		if (game.hasNotBegun) {
			game.ignoreFurtherMouseClicks();
			game.setPlayer1Dimensions();
			game.setBallDimensions();
			game.addEventListenerForMouseMovement();
			game.startTick();
		}
	},

	// Returns true if player has not yet clicked the screen to begin the game, false otherwise.
	hasNotBegun: function() {
		if (game.initialClick == 0) {
			return true;
		}
		else if (game.initialClick == 1) {
			return false;
		}
	},

	// Prevent further calls of game.begin() via clicking of the canvas.
	ignoreFurtherMouseClicks: function() {
		game.initialClick = 1;
	},

	// Obtain the dimensions of the player1 image to be used for collision detection.
	setPlayer1Dimensions: function() {
		player1.height = player1.image.height;
		player1.width = player1.image.width;
	},

	// Obtain the dimensions of the player1 image to be used in collision detection.
	setBallDimensions: function() {
		ball.height = ball.yellowBallImage.height;
		ball.width = ball.yellowBallImage.width;
	},

	// Add event listener to deal with movement of player1 by mouse.
	addEventListenerForMouseMovement: function() {
		elementID.gameCanvas.addEventListener('mousemove',player1.setCoordinates, false);
	},

	// Tasks to be performed when the page is loaded in the browser.
	prepare: function() {
		elementID.setShorthands();
		game.setTextForInstructionsElement();
		canvas.setDimensions();
		canvas.setPlayer1Boundaries();
		player1.setImage();
		ball.setImage();
		game.displayStartScreenText();
		question.setAllAllowed();
	},

	// Set the text to be displayed in the 'instructions' div element.
	setTextForInstructionsElement: function() {
		elementID.instructions.innerHTML =
		"<p>Compatible with  Chrome v28, Internet Explorer v10, Firefox v27 and Opera v15</p>" +
		"<p><strong>Instructions:</strong> Collect " +
		settings.targetToCollect +
		" yellow to unlock a question. " + "Avoid the red!</p>";
	},

	// Display start screen text on the canvas.
	displayStartScreenText: function() {
		elementID.gameCanvas.getContext("2d").font = "16px Arial";
		elementID.gameCanvas.getContext("2d").textBaseline = "center";
		elementID.gameCanvas.getContext("2d").textAlign = "center";
		elementID.gameCanvas.getContext("2d").fillText("Click screen to start new game",canvas.width / 2,canvas.height / 2);
	},

	//Pauses the game.
	pause: function() {
		clearInterval(game.handleTickHold);
		clearInterval(game.countdownHold);
	},

	// Tasks to perform after player enters an answer to a question.
	prepareForNextRound: function() {
		ball.removeAll();
		scoring.resetNoCollected();
		elementID.answerIncorrect.style.display="none";
		elementID.answerCorrect.style.display="none";
		elementID.questionContainer.style.display="none";
		canvas.clear();
		game.displayGetReadyScreen();
		scoring.displayScore();
		scoring.displayNoCollected();
		timer.display();
		setTimeout(game.startTick,2000);
	},

	// Display text 'Get Ready'.
	displayGetReadyScreen: function() {
		elementID.gameCanvas.getContext("2d").font = "16px Arial";
		elementID.gameCanvas.getContext("2d").textBaseline = "center";
		elementID.gameCanvas.getContext("2d").textAlign = "center";
		elementID.gameCanvas.getContext("2d").fillText("Get Ready!",canvas.width/2,canvas.height/2);
	},

	// Start executing the function handleTick at the specified period of miliseconds. Start decreaseBy1Second timer.
	startTick: function() {
		elementID.gameCanvas.style.cursor='none';
		game.handleTickHold = setInterval(handleTick,50);
		game.countdownHold = setInterval(timer.decreaseBy1Second,1000);
	}
};

var player1 = {

	bottomBoundary: 0,
	height: '',
	image: new Image(),
	imageFlash: 0,
	rightBoundary: 0,
	width: '',
	X: 0,
	Y: 0,

	// Draw player1 at co-ordinates (player1.X, player1.Y) which are defined by the mouse coordinates in the function setCoordinates().
	// PARA - "state" - Same image source used each tick.
	// PARA - "flash" - Image source is alternated to create flasing effect.
	draw: function(state,speed) {

		// Set argument defaults in case undefined.
		if (state===undefined) {
			state="solid";
		}
		if (speed===undefined) {
			speed=5;
		}

		// Options for argument "state".
		if (state=="solid") {
			elementID.gameCanvas.getContext("2d").drawImage(player1.image, player1.X, player1.Y);
		}

		if (state=="flash") {
			if(game.tickCounter % 2*speed < speed) {
				player1.image.src = settings.player1Src[0];
			}
			else {
				player1.image.src = settings.player1Src[1];
			}
			elementID.gameCanvas.getContext("2d").drawImage(player1.image, player1.X, player1.Y);
		}
	},


	// Pairs player1 co-ordinates with the mouse co-ordinates.
	setCoordinates: function(mouseEvent) {
		// OffsetX doesn't work in Firefox 22.0 so layerX mst be used instead.
		var mouseX = mouseEvent.offsetX==undefined?mouseEvent.layerX:mouseEvent.offsetX;
		var mouseY = mouseEvent.offsetY==undefined?mouseEvent.layerY:mouseEvent.offsetY;

		if (mouseX < player1.rightBoundary) {
			player1.X = mouseX;
		}
		else player1.X = player1.rightBoundary;

		if (mouseY < player1.bottomBoundary) {
			player1.Y = mouseY;
		}
		else player1.Y = player1.bottomBoundary;
	},

	// Assign player1 image.
	setImage: function() {
		player1.image.src = settings.player1Src[0];
	}
};

var question = {

	// When the game is loaded, the array 'allowed' is populated with an 'x' for each question in 'questionList'.
	// Once a question has been asked, the corresponding 'x' is replaced with an 'o' to prevent it from being asked again.
	allowed: [],
	// Used for selecting a question from 'questions' to ask the player.
	ID: '',
	// Format is [Question, Correct answer, Three Incorrect answers].
	// Add new questions and answers to the array. No further code modification required.
	// Trailing comma on last line of array may cause a fit to be thrown in IE < 9 but is correct code.
	questionList: [
	/*0*/ "What is 2+2?", "4","0","1","2",
	/*1*/ "What is the capital of England?", "London","Leeds","Manchester","E",
	/*2*/ "What is the biggest planet in the solar system?", "Jupiter","Pluto","Earth","Goofy",
	/*3*/ "What is the highest mountain in the world?", "Mt Everest", "Kilimanjaro", "Ben Nevis", "Mont Blanc",
	/*4*/ "How many seconds are there in one day?", "86400", "72600", "64800", "48200",
	/*5*/ "What is the German for goodbye?", "Auf wiedersehen", "Bonjour", "Danke", "Fromage",
	/*6*/ "Who is the president of the U.S.A?", "Barrack Obama", "B.A. Baracus", "Bacchus", "Buck Rogers",
	/*7*/ "Who was the first man on the moon?", "Neil Armstrong", "Lance Armstrong", "Louis Armstrong", "Stretch Armstrong",
	/*8*/ "Spell 'Morse' in Morse code.", "-- / --- / .-. / ... / .", ".-.. / . / .-- / .. / ...", "..-. / .-. / --- / ... / -", "--. / .- / -.. / --. / . / -",
	/*9*/ "What is the name of the robot in the film Short Circuit?", "Johnny 5", "Alpha 5", "Babylon 5", "Abz from 5ive",

	/*10*/ "Who wrote 'The Odyssey'?", "Homer", "Bart", "Lisa", "Maggie",
	],

	// Displays a question, if there is an unasked one still available.
	selectAndDisplayQuestion: function() {
		if (question.unaskedQuestionsExist()) {
			question.select();
			answer.setOrder();
			button.assignAnswers();
			question.displayQuestion();
			question.displayCursor();
			answer.submitted = 0;
		}
		else {
			alert('No Questions Remaining.');
			location.reload();
		}
	},

	// Display the selected question.
	displayQuestion: function() {
		elementID.questionText.innerHTML = "Question: " + question.questionList[question.ID*5];
		elementID.questionContainer.style.display="block";
	},

	// Make cursor visible.
	displayCursor: function() {
		elementID.gameCanvas.style.cursor='auto';
	},

	// Returns true if there are unasked questions remaining. Otherwise returns false.
	unaskedQuestionsExist: function() {
		var noOfQuestions = question.questionList.length / 5;
		var i=0;
		var count=0;

		while (i<noOfQuestions) {
			if (question.allowed[i]=="o") {
				count++;
			}
			i++;
		}

		if (count==noOfQuestions) {
			return false;
		}
		else return true;
	},

	// Select a question at random, (which hasn't been asked already).
	select: function() {
		var questionHasBeenSelected = false;
		var noOfQuestions = question.questionList.length / 5;

		// If question number 'n ' is available (marked 'x'), set question.ID and make unavailable for future use (marked 'o').
		while (questionHasBeenSelected == false) {
			var n = random.integer(noOfQuestions-1);

			if (question.allowed[n] == "x") {
				question.ID = n;
				question.allowed[n] = "o";
				questionHasBeenSelected = true;
			}
		}
	},

	// Make all questions available to be asked.
	setAllAllowed: function() {
		var noOfQuestions = question.questionList.length / 5;
		var i=0;

		while(i < noOfQuestions) {
			question.allowed.push("x");
			i++;
		}
	}
};

var random = {

	// Pick a random integer between 0 and and the parameter n.
	integer: function(n) {
		var m = n+1;

		return Math.floor((Math.random()*m));
	},

	// Randomly orders the integers from 0 to the parameter n.
	sequence: function(n) {
		var i=n;
		var oneToFour = [1,2,3,4];
		var result=[];

		while (i > -1) {
			var r = random.integer(i);
			result.push(oneToFour[r]);
			oneToFour.splice(r,1);
			i --;
		}

		return result;
	}
};

var scoring = {

	score: 0,
	noCollected: 0,

	// Check for collisions between player1 and left side of nth ball.
	collisionLeftHasOccurred: function(n) {
		if (player1.X < ball.XPositions[n] && ball.XPositions[n] < player1.X + player1.width) {
			return true;
		}
		else return false;
	},

	// Check for collisions between player1 and right side of nth ball.
	collisionRightHasOccurred: function(n) {
		if (ball.XPositions[n] < player1.X && player1.X < ball.XPositions[n] + ball.width) {
			return true;
		}
		else return false;
	},

	// Check for collisions between player1 and top side of nth ball.
	collisionTopHasOccurred: function(n) {
		if (player1.Y < ball.YPositions[n] && ball.YPositions[n] < player1.Y + player1.height) {
			return true;
		}
		else return false;
	},

	// Check for collisions between player1 and bottom side of nth ball.
	collisionBottomHasOccurred: function(n) {
		if (ball.YPositions[n] < player1.Y && player1.Y < ball.YPositions[n] + ball.height) {
			return true;
		}
		else return false;
	},

	// Increase or decrease the value of scoring.noCollected.
	updateNoCollected: function(n) {
		if (ball.ID[n] == "yellow") {
			scoring.noCollected++;
		}
		else if (ball.ID[n] == "red") {
			scoring.noCollected--;
		}
	},

	// Detect collisions, update noCollected and remove any balls collected.
	detectCollisions: function() {
		var i = 0;
		var numberOfBalls = ball.XPositions.length;

		while (i < numberOfBalls) {
			if (
				(scoring.collisionLeftHasOccurred(i) || scoring.collisionRightHasOccurred(i)) &&
				(scoring.collisionBottomHasOccurred(i) || scoring.collisionTopHasOccurred(i))
			)

			// Move this to a new function. Have the detectCollisions function return true or false
			// if a collision is detected.
			{
				scoring.updateNoCollected(i);
				ball.remove(i);
			}
			i++;
		}
	},

	// Display no: of yellow balls collected in current round, (minus any red balls collected).
	displayNoCollected: function() {
		elementID.gameCanvas.getContext("2d").font = "16px Arial";
		elementID.gameCanvas.getContext("2d").textBaseline = "top";
		elementID.gameCanvas.getContext("2d").textAlign = "left";
		elementID.gameCanvas.getContext("2d").fillText("Collected: " + Math.max(0,scoring.noCollected),5,25);
	},

	// Display score (no: of questions correctly answered).
	displayScore: function() {
		elementID.gameCanvas.getContext("2d").font = "16px Arial";
		elementID.gameCanvas.getContext("2d").textBaseline = "top";
		elementID.gameCanvas.getContext("2d").textAlign = "left";
		elementID.gameCanvas.getContext("2d").fillText("Score: " + scoring.score,5,5);
	},

	// Reset noCollected to zero ready for a new round.
	resetNoCollected: function() {
		scoring.noCollected = 0;
	}
};

var timer = {

	timeRemaining: settings.initialTimerValue,

	// Decrease timer by 1 second.
	decreaseBy1Second: function() {
		timer.timeRemaining--;
	},

	// Display current time remaining.
	display: function() {
		elementID.gameCanvas.getContext("2d").font = "16px Arial";
		elementID.gameCanvas.getContext("2d").textBaseline = "top";
		elementID.gameCanvas.getContext("2d").textAlign = "left";
		elementID.gameCanvas.getContext("2d").fillText("Time: " + Math.max(0,timer.timeRemaining),5,45);
	},

	// Add time to the timer but never allow it to be topped up above it's initial value.
	topup: function () {
		timer.timeRemaining = Math.min(timer.timeRemaining + settings.timerTopupAmount, settings.initialTimerValue);
	}
};
