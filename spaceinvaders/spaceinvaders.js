
var myPanel = new jsgl.Panel(document.getElementById("screen")); // Where the game will be played

// Some important game variables
var lives = 3;
var score = 0;
var height = 1;
var stage = 1;
var difficulty = "";

// Ask the player what difficulty they want to play
function difficultyPrompt()
{
	difficulty = prompt("Choose a difficulty: EASY, MEDIUM, or HARD", "EASY");
	difficulty = difficulty.toUpperCase();
	if (difficulty == "EASY") // This is just too easy
	{
		lives = 3;
		stage = 1;
	}
	else if (difficulty == "MEDIUM") // This is a good starting point
	{
		lives = 2;
		stage = 3;
	}
	else if (difficulty == "HARD") // It could be harder
	{
		lives = 1;
		stage = 5;
	}
	else if (difficulty == "IMPOSSIBLE") // What are you doing man!?? - Secret impossible difficulty
	{
		lives = 1;
		stage = 10;
	}
	else difficultyPrompt();
}

difficultyPrompt();

// Used to display information to the player
var score_text1='<table align="right"<tr><td><span style="font-size:25px; "><font color="#00FF00"><strong>Score :  ';
var element = document.getElementById("score");
var lives_icon='</strong></span></td></tr><strong><span><img src="./Turret.png"<tbody><tr><td>';
var lives_indicator = "";
for (var m = 1; m < lives; m++) // Generate lives icons
{
	lives_indicator += lives_icon;
}

element.innerHTML = lives_indicator + score_text1+score;

// Player
var player = myPanel.createImage();
player.setUrl("./Turret.png");
player.setX(400);
player.setY(560);

// Player shots
var shot = myPanel.createLine();
shot.setStartX(400);
shot.setStartY(560);
shot.setEndX(400);
shot.setEndY(530);
with (shot.getStroke())
{
setColor("#00FF00");
}

// Alien shots
var alienShot = myPanel.createLine();
alienShot.setStartX(400);
alienShot.setStartY(260);
alienShot.setEndX(400);
alienShot.setEndY(230);
with (alienShot.getStroke())
{
setColor("#00FF00");
}

// Used to generate aliens
function alienGenerator(x, y) 
{
	var alien = myPanel.createImage();
	alien.setUrl("./Invader.png");
	alien.setX(x);
	alien.setY(y);
	return alien;
}

// Used to generate shields
function shieldGenerator(x, y) 
{
	var shieldPiece = myPanel.createImage();
	shieldPiece.setUrl("ShieldPiece.png");
	shieldPiece.setX(x);
	shieldPiece.setY(y);
	return shieldPiece;
}

// Render player & begin shield creation
myPanel.addElement(player);
var shieldArray= new Array();
var total = 105;

// Generating shields
for (var k = 1; k <= 5; k++)
{
	for (var j = 1; j <= 3; j++)
	{
		for (var i = 1; i <=7; i++) 
		{
			shieldArray[(k-1)*21+(j-1)*7+i] = shieldGenerator((j*250)+(i*13)-170, 440+(k-1)*12);
		}
	}
}

// Begin alien creation
var alienArray = new Array();
var alienExists = new Array();
var totalAliens = 46;
var aliveAliens = 45;

// Add shields to screen
for(i=1; i<shieldArray.length; i++)
{
	myPanel.addElement(shieldArray[i]);
}

// Track mouse to move player
myPanel.addMouseMoveListener(function(eventArgs){
		player.setX(eventArgs.getX()-17);

});

// Generating alien function
var x = 1;
var genAliens = (function()
{
	x = 1;
	totalAliens = 46;
	aliveAliens = 45;
	height = 1;
	for (var y = 1; y <= 5; y++)
	{
		for (var z = 1; z <= 9; z++)
		{
			alienArray[x] = alienGenerator(z*70-30, 25+(y-1)*40);
			alienExists[x] = true;
			x++;
		}
	}
});

// Generate aliens initially
genAliens();

// Reset remaining alien positions function
var moveUp = (function() 
{
	x=1
	for (var y = 1; y <= 5; y++)
	{
		for (var z = 1; z <= 9; z++)
		{
			alienArray[x].setX(z*70-30);
			alienArray[x].setY(25+(y-1)*40);
			x++;
			height = 1;
			alienAnimator.setReversed(false);
		}
	}
	alienAnimator.play();
	gameData();
});

// Send initial aliens to screen
for (z = 1; z<totalAliens; z++)
{
	myPanel.addElement(alienArray[z]);
}	

// Animate aliens
var alienAnimator = new jsgl.util.Animator();
	alienAnimator.setFps(1);
	alienAnimator.setEndValue(500);
	alienAnimator.setDuration(16000-(stage*1000)-(height*100)); // Speed depends on stage and current closeness to player
	alienAnimator.addStepListener(function(t)
	{
	x = 1;
		for	(y = 1; y<=5; y++) // Generate aliens in desired pattern
		{
			for (z = 1; z<=9; z++)
			{
				if (alienExists[x])
				{
					alienArray[x].setX(75*z+t/5-30);
					alienArray[x].setY(45+(y-2+height)*40);
					myPanel.addElement(alienArray[x]);
				}
				x++;
			}
		}
	});
	
var moveCheck = false; // Variable to check if height needs to be reset
alienAnimator.addEndListener(function() // Function to repeat alien movement
{
	moveCheck = false;
	x=1;
	for ( i = 1; i<=5 ; i++)
	{
		for (j = 1; j<=9; j++)
		{
			if (alienExists[x])
			{
				if (alienArray[x].getY() >=400) // The aliens made it to earth!
				{
					moveCheck = true;
					lives--; // Lose a life
					alert("They made it to Earth!"); // The player needs to know!
					moveUp(); // Send aliens back top
					break;
				}
			}
			x++;
		}
	}
	if (moveCheck == false) // Otherwise drop down, reverse direction
	{
		alienAnimator.setReversed(!alienAnimator.isReversed());
		alienAnimator.play();
		height++;
	}
});

// Alien shot animation
var alienShotExists = true;
var alieny_pos;
var alienx_pos;
var alienShotGen;
var alienShotAnimator = new jsgl.util.Animator();
	alienShotAnimator.setStartValue(10);
	alienShotAnimator.setEndValue(100);
	alienShotAnimator.setDuration(1600-(stage*100));
	alienShotAnimator.setFps(40);
	alienShotAnimator.setRepeating(false);
	alienShotAnimator.addStepListener(function(t)
	{
		if (alienShotExists) // Animate the shot
		{		
			alieny_pos	=	alieny_pos+(20+stage-1)*t/100
			alienShot.setStartY(alieny_pos);	
			alienShot.setEndY(alieny_pos+30);
			alienShot.setStartX(alienx_pos);
			alienShot.setEndX(alienx_pos);
			myPanel.addElement(alienShot);
			for(i=1; i<= total; i++) // Aliens can take down shields
			{
				if(alienShot.getEndY() < shieldArray[i].getY()+12 && alienShot.getEndY() > shieldArray[i].getY())
				{
					if(alienShot.getEndX()< shieldArray[i].getX()+14 && alienShot.getEndX() > shieldArray[i].getX())
					{	
						myPanel.removeElement(shieldArray[i]); // Remove proper shield piece
						alienShotExists = false;
						myPanel.removeElement(alienShot);
						for(k=i; k<total; k++) // Update shields
						{
							shieldArray[k]= shieldArray[k+1];
						}
						total--;
					}
				
				}

			}
		}
		if (alienShotExists) // Aliens can hit the player too
		{		
			for(i=1; i<= total; i++)
			{
				if(alienShot.getEndY() < player.getY()+12 && alienShot.getEndY() > player.getY())
				{
					if(alienShot.getEndX()< player.getX()+37 && alienShot.getEndX() > player.getX()) // The player was hit!
					{	
						if (alienShotExists)
						{
							alienShotExists = false;
							lives--; // They lose a life
							lives_indicator = "";
							for (var m = 1; m < lives; m++) // Update lives icon
							{
								lives_indicator += lives_icon;
							}
							element.innerHTML = lives_indicator + score_text1+score; // Send icon and score to the screen
							gameData(); // Check if the player lost
						}
					}
				
				}

			}
		}
	});
	
// Player shot animation
var shotExists = true;
var shotAnimator = new jsgl.util.Animator();
	shotAnimator.setStartValue(-10);
	shotAnimator.setEndValue(100);
	shotAnimator.setDuration(2000-(stage*100));
	shotAnimator.setRepeating(false);
	shotAnimator.setFps(40);
	shotAnimator.addStepListener(function(t)
	{
		if (shotExists) // Animate the shot
		{	
			y_pos	=	500-(560+(stage-1)*20)*t/100
			shot.setStartY(y_pos);	
			shot.setEndY(y_pos-30);	
			myPanel.addElement(shot);	
			for(i=1; i<= total; i++) // The player can hit the shields too
			{
				if(shot.getEndY() < shieldArray[i].getY()+12 && shot.getEndY() > shieldArray[i].getY())
				{
					if(shot.getEndX()< shieldArray[i].getX()+14 && shot.getEndX() > shieldArray[i].getX())
					{	
						myPanel.removeElement(shieldArray[i]); // Remove proper bit of the shield
						shotExists = false;
						myPanel.removeElement(shot);
						for(k=i; k<total; k++) // Update shields
						{
							shieldArray[k]= shieldArray[k+1];
						}
						total--;
					}
				
				}

			}
		}
		if (shotExists) // The player can also hit the aliens
		{
			for(z=1; z< totalAliens; z++)
			{
				if (alienExists[z])
				{
					if(shot.getEndY() < alienArray[z].getY()+20 && shot.getEndY() > alienArray[z].getY()-20)
					{
						if(shot.getEndX()< alienArray[z].getX()+37 && shot.getEndX() > alienArray[z].getX()) // The player hit an alien!
						{	
							alienExists[z] = false; // Kill the proper alien
							myPanel.removeElement(alienArray[z]); // Remove him from the screen
							shotExists = false; // The shot disappears too
							myPanel.removeElement(shot);
							aliveAliens--;
							score = score+100;
							element.innerHTML = lives_indicator + score_text1+score; // Update the players info
							if (score % 10000 == 0) // The player gains a life if they get 10,000 points!
							{
								lives++;
								lives_indicator = "";
								for (var m = 1; m < lives; m++) // Update the lives icon
								{
									lives_indicator += lives_icon;
								}
								element.innerHTML = lives_indicator + score_text1+score; // Send updated info to the screen
							}
							gameData();
						}		
					}	
				}
			}
		}
	});
	
	
var lost = false; // Is the game lost?

// Either start new stage or end the game because the player lost	
var gameData = (function ()
{
	if (lives > 0)
	{
		if (aliveAliens == 0)
		{
			alert("Another wave is incoming!");
			stage++;
			genAliens();
		}
	}
	else
	{
		if (lost == false)
		{
			lost = true;
			document.writeln('<p></p><p></p><p></p><body bgcolor="#000000"><p style="text-align: center;"><span style="font-size:28px;"><font color="#00FF00"><strong>Earth is doomed! </strong></span></p><br><br><p style="text-align: center;"><span style="font-size:28px;"><strong>Score : '+score+'</strong></span></p><p style="text-align: center;">Refresh page to retry</body></p>');
			alienAnimator.stop();
			alienShotAnimator.stop();
		}
	}
});

// Initial alien shot
alienShotGen = Math.round(9*Math.random());	// Get a number from 1 to 9
for (i = 1; i<= 4; i++) // We will be starting at the lowest alien
{
	if (alienExists[(alienShotGen + (9*i))]) // Shoot from the lowest alien
	{
		alienx_pos = alienArray[(alienShotGen + (9*i))].getX()+17; // Shoot from the center of the alien
		alieny_pos = alienArray[(alienShotGen + (9*i))].getY()+35; // Shoot from the bottom of the alien
		alienShotExists = true;
	}
}

// Initial alien shooting animation
alienShotAnimator.init();
alienShotAnimator.play();

// Allows the aliens to shoot more than once. They only shoot one laser at a time
alienShotAnimator.addEndListener(function() 
{
	var alienChecker	=	alienShot.getEndY();
	if((alienChecker >= 600)||(alienChecker <= 600)) // If the laser makes it off the screen
	{	
		alienShotGen = Math.round(9*Math.random());	
		for (i = 1; i<= 4; i++)
		{
			if (alienExists[(alienShotGen + (9*i))])
			{
				alienx_pos = alienArray[(alienShotGen + (9*i))].getX()+17;
				alieny_pos = alienArray[(alienShotGen + (9*i))].getY()+35;
				alienShotExists = true;
			}
		}
	}
	if (alienShotExists == false) // If the laser hit the player or a shield
	{
		alienShotGen = Math.round(9*Math.random());	
		for (i = 1; i<= 4; i++)
		{
			if (alienExists[(alienShotGen + (9*i))])
			{
				alienx_pos = alienArray[(alienShotGen + (9*i))].getX()+17;
				alieny_pos = alienArray[(alienShotGen + (9*i))].getY()+35;
				alienShotExists = true;
			}
		}
	}
	alienShotAnimator.stop(); // Replay the animation!
	alienShotAnimator.init();
	alienShotAnimator.play();
});

// Animation for player shooting
myPanel.setCursor(jsgl.Cursor.POINTER); // Get the cursor
myPanel.addClickListener(function(eventArgs) {		// When the player clicks
	shotAnimator.init(); // Shoot!
	shotAnimator.play();
	var checker	=	shot.getEndY();
	if(checker >= 500) // If the laser makes it off the screen
	{
		shot.setStartX(player.getX()+18);	
		shot.setEndX(player.getX()+18);
		shotExists = true;
	}
	if (shotExists == false) // If the player hit a shield or an alien
	{
		shot.setStartX(player.getX()+18);	
		shot.setEndX(player.getX()+18);
		shot.setStartY(560);	
		shot.setEndY(530);	
		shotAnimator.stop();
		shotAnimator.init();
		shotAnimator.play();
		shotExists = true;
	}
});

// The aliens are on the move!
alienAnimator.init();
alienAnimator.play();