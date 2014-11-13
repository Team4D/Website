<?php
date_default_timezone_set("UTC");
// Get Directory
define("PHP_DIR",$_SERVER["DOCUMENT_ROOT"]);
// Get Facebook scripts
include_once(PHP_DIR."/Scripts/facebook/autoload.php");
// FACEBOOK FEED OPTIONS
$FB_FEED_LENGTH = 5;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\GraphObjectList;

// Get Session
FacebookSession::setDefaultApplication('385383954948164','1WAWGHWVDocgEZ-K725qCxMmLpc');
$session = new FacebookSession('385383954948164|1WAWGHWVDocgEZ-K725qCxMmLpc');
// Make Call
$limit = $FB_FEED_LENGTH + 5;
$request = new FacebookRequest($session, 'GET', '/726813914055905?fields=feed.limit('.$limit.'){id,from,message,created_time,picture,description,link,name}');
$response = $request->execute();
$graphObject = $response->getGraphObject();
// Parse Request
$parsedObject = $graphObject->asArray();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>4th Dimension Software Solutions</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="Scripts/ie10-viewport-bug-workaround.js"></script>
        <script type="text/javascript" src="Scripts/Index.js"></script>
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="CSS/Index.css">
	</head>                                    
	
	<body>
	<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '385383954948164',
			xfbml      : true,
			version    : 'v2.1'
		});
	};
	
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<!-- SVG SOURCE -->
	<svg height="0" width="0" style="position:absolute;margin-left:-100%;">
	<path id="twitter-icon" d="M28.348,5.157c-13.6,0-24.625,11.027-24.625,24.625c0,13.6,11.025,24.623,24.625,24.623c13.6,0,24.623-11.023,24.623-24.623
	C52.971,16.184,41.947,5.157,28.348,5.157z M40.752,24.817c0.013,0.266,0.018,0.533,0.018,0.803c0,8.201-6.242,17.656-17.656,17.656
	c-3.504,0-6.767-1.027-9.513-2.787c0.486,0.057,0.979,0.086,1.48,0.086c2.908,0,5.584-0.992,7.707-2.656
	c-2.715-0.051-5.006-1.846-5.796-4.311c0.378,0.074,0.767,0.111,1.167,0.111c0.566,0,1.114-0.074,1.635-0.217
	c-2.84-0.57-4.979-3.08-4.979-6.084c0-0.027,0-0.053,0.001-0.08c0.836,0.465,1.793,0.744,2.811,0.777
	c-1.666-1.115-2.761-3.012-2.761-5.166c0-1.137,0.306-2.204,0.84-3.12c3.061,3.754,7.634,6.225,12.792,6.483
	c-0.106-0.453-0.161-0.928-0.161-1.414c0-3.426,2.778-6.205,6.206-6.205c1.785,0,3.397,0.754,4.529,1.959
	c1.414-0.277,2.742-0.795,3.941-1.506c-0.465,1.45-1.448,2.666-2.73,3.433c1.257-0.15,2.453-0.484,3.565-0.977
	C43.018,22.849,41.965,23.942,40.752,24.817z" />
	<path id="facebook-icon" d="M28.347,5.157c-13.6,0-24.625,11.027-24.625,24.625c0,13.6,11.025,24.623,24.625,24.623c13.6,0,24.625-11.023,24.625-24.623
	C52.972,16.184,41.946,5.157,28.347,5.157z M34.864,29.679h-4.264c0,6.814,0,15.207,0,15.207h-6.32c0,0,0-8.307,0-15.207h-3.006
	V24.31h3.006v-3.479c0-2.49,1.182-6.377,6.379-6.377l4.68,0.018v5.215c0,0-2.846,0-3.398,0c-0.555,0-1.34,0.277-1.34,1.461v3.163
	h4.818L34.864,29.679z" />
	<g id="paypal-icon">
		<path d="M39.017,24.388c-1.105,5.01-5.221,8.25-10.486,8.25h-2.719l-1.137,5.164l-0.346,1.574h-1.611h-2.023l-0.573,2.543h6.059
		l1.482-6.738h4.328c4.141,0,7.604-2.471,8.529-6.674c0.539-2.443-0.127-4.199-1.311-5.332
		C39.173,23.562,39.11,23.966,39.017,24.388z" />
		<path d="M22.718,37.37l1.484-6.736h4.328c0.051,0,0.102-0.004,0.152-0.006c2.461-0.037,4.67-0.951,6.236-2.586
		c1.027-1.068,1.777-2.443,2.141-4.086c0.158-0.721,0.211-1.381,0.178-1.984c-0.047-0.866-0.273-1.612-0.631-2.243
		c-1.029-1.832-3.137-2.693-5.047-2.693H21.235L16.66,37.37h2.431h2.055H22.718z M26.271,21.583l0.096-0.407h2.967
		c0.512,0,0.963,0.148,1.318,0.407c0.676,0.486,1.006,1.363,0.721,2.373c-0.162,0.676-0.547,1.289-1.055,1.768
		c-0.184,0.172-0.385,0.324-0.598,0.459c-0.551,0.348-1.18,0.559-1.811,0.559h-2.842L26.271,21.583z" />
		<path d="M29.425,23.489l0.008-0.035l0.01-0.039c0.033-0.117,0.031-0.188,0.027-0.217c-0.021-0.008-0.064-0.018-0.137-0.018h-1.377
		l-0.363,1.557h0.316C28.534,24.737,29.271,24.13,29.425,23.489z" />
		<path d="M28.347,5.157c-13.6,0-24.625,11.023-24.625,24.624c0,13.6,11.024,24.625,24.625,24.625
		c13.6,0,24.625-11.025,24.625-24.625C52.972,16.18,41.946,5.157,28.347,5.157z M42.478,28.938
		c-1.104,5.01-5.221,8.246-10.486,8.246h-2.717l-1.137,5.164l-0.348,1.574h-1.609h-6.059h-2.505l0.55-2.443l0.474-2.104h-1.98
		h-2.504l0.55-2.443l4.575-20.338l0.352-1.564h1.603H31.56c2.459,0,4.77,1.049,6.182,2.805c0.521,0.65,1.055,1.566,1.326,2.773
		c0.828,0.457,1.557,1.057,2.133,1.774C42.177,23.597,43.188,25.718,42.478,28.938z" />
	</g>
	<g id="linkedin-icon">
		<path d="M28.347,5.155c-13.6,0-24.625,11.025-24.625,24.625c0,13.602,11.025,24.625,24.625,24.625
		c13.598,0,24.623-11.023,24.623-24.625C52.97,16.181,41.944,5.155,28.347,5.155z M42.062,41.741c0,1.096-0.91,1.982-2.031,1.982
		H16.613c-1.123,0-2.031-0.887-2.031-1.982V18.052c0-1.094,0.908-1.982,2.031-1.982H40.03c1.121,0,2.031,0.889,2.031,1.982V41.741z" />
		<path d="M33.099,26.441c-2.201,0-3.188,1.209-3.74,2.061v0.041h-0.027c0.01-0.012,0.02-0.027,0.027-0.041v-1.768h-4.15
		c0.055,1.17,0,12.484,0,12.484h4.15v-6.973c0-0.375,0.027-0.744,0.137-1.012c0.301-0.744,0.984-1.52,2.129-1.52
		c1.504,0,2.104,1.146,2.104,2.824v6.68h4.15V32.06C37.878,28.224,35.829,26.441,33.099,26.441z" />
		<path d="M20.864,20.712c-1.419,0-2.349,0.934-2.349,2.159c0,1.197,0.9,2.158,2.294,2.158h0.027c1.447,0,2.348-0.961,2.348-2.158
		C23.157,21.646,22.284,20.712,20.864,20.712z" />
		<rect x="18.762" y="26.734" width="4.151" height="12.484" />
	</g>
</svg>
	<!-- SVG SOURCE ends -->
	
	<!-- Content -->
	<div id="bodywrapper">        
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-static-top" id='navigator' role="navigation">
			<div id="social-media">
				<a id="Home" href="#Home-Page"><img src="Images/full_logo.png" style="height:95px;border:0;"></a>
				<a href="http://www.facebook.com/TeamFourthDimension" target="_blank" title="Facebook" class="icon-link"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#facebook-icon"></use></svg></a><a href="http://twitter.com/OfficialTeam4D" target="_blank" title="Twitter" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#twitter-icon"></use></svg></a><a href="https://www.linkedin.com/company/team-4th-dimension" target="_blank" title="LinkedIn" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#linkedin-icon"></use></svg></a><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SDVF2B5Q4ALFG" target="_blank" title="Support Us" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#paypal-icon"></use></svg></a>
			</div>
			<div class="navbarcontainer" style="background-color:transparent;">
				<div id="navbar-logo"><a href="#Home-Page" class="home"><img src="Images/team4d_font_logo.png"></a></div>
				<div class="navbar-header">
					<button id="xsbutton" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="headnavbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="home navbar-item"><a class="page-link" href="#Home-Page">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects &amp; Fun <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class="dropdown-item"><a class="page-link" href="#LoLHelper-Page">LoL Helper</a></li>
								<li class="dropdown-item"><a href="SpaceInvaders/index.html">Space Invaders</a></li>
							</ul>
						</li>
						<li class="navbar-item"><a class="page-link"  href="#Products-Page">Products</a></li>
            <li class="navbar-item"><a class="page-link" href="#About-Page">About</a></li>
            <li class="navbar-item"><a class="page-link" href="#Thanks-Page">Thanks</a></li>          
					</ul>
				</div>
			</div>
		</div>
		
		<div id="Home-Page" class="content-bit Home-Page">
        	
            <div style="padding-bottom:50px;">
            
			<div class="jumbotron">				
				<div id="carousel-main" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators" style="visibility:hidden;">
						<li id="carousel-button-1" class="carslide active" data-target="#carousel-main" data-slide-to="0"></li>
						<li id="carousel-button-2" class="carslide" data-target="#carousel-main" data-slide-to="1"></li>
						<li id="carousel-button-3" class="carslide" data-target="#carousel-main" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item active">
							<img style="width: 100%;" src="Images/carousel1lg.jpg" alt="Design Meeting">
							<!--<div class="carousel-caption">Design</div>-->
						</div>
						<div class="item">
							<img style="width: 100%;" src="Images/carousel2lg.jpg" alt="Business Meeting">
							<!--<div class="carousel-caption">Business</div>-->
						</div>
						<div class="item">
							<img style="width: 100%;" src="Images/carousel3lg.jpg" alt="Concept">
							<!--<div class="carousel-caption">Vision</div>-->
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-main" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
			</div>
			<!--
			<div class="row" style="padding:0px 10px;">
				<h4>Mission Statement:</h4>
				<p>Our goal in every aspect of business can be boiled down into one word:&mdash;Time. Time is money. Time to get to work. Time is on our side. Creation of your new web and mobile presence begins the moment you share your vision with us, but it doesn't end when we hand you the completed product. &mdash; Here at 4th Dimension Design, we don't focus solely on your needs today. We're here to help you plan for the future.</p>
				<p>Our mission is to provide web and app design that will be your intermediary with the wider world.</p>
				<p>To provide web design and mobile optimization to businesses of any size</p>
			</div>
			-->
			<div class="row" style="display:table-row;background-color:#FFF;">
				<div class="col-md-4 tbox active" id="main-text-1">
					<h4 class="page-header">Web Design</h4>
					Stylish, Efficient, and Functional. These are the first words needed to create a web page that will be your public image for today and the years to come.
				</div>
				<div class="col-md-4 tbox" id="main-text-2">
					<h4 class="page-header">App Development</h4>
					The future is here. There is a powerful computer in the hands of users across the world. Will your product be there to meet them, or will you be relegated to the past?
				</div>
				<div class="col-md-4 tbox" id="main-text-3">
					<h4 class="page-header">Consulting</h4>
					Maybe you just need a push in the right direction. Time waits for no one so rather than learn the hard way and waste it, we'll find a way to help you bridge the gap.
				</div>
			</div>
            
            </div>
            
			<!-- Social Media -->
			<div class="row" id="social-feeds">
				<div class="col-sm-6" style="text-align:center;">
					<div id="fb-social-box">
						<div class="title">Posts
							<div style="position:absolute;top:10px;right:15px;">
								<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
							</div>
						</div>
						<div id="fb-feed">
							<?php
							for ($a=0,$b=0; isset($parsedObject["feed"]->data[$a])&&$b<$FB_FEED_LENGTH; $a++) {
								// Check for message
								if (isset($parsedObject["feed"]->data[$a]->message)) {
									$b++;
									// Get Data
									$postID = $parsedObject["feed"]->data[$a]->id;
									$actorName = $parsedObject["feed"]->data[$a]->from->name;
									$actorID = $parsedObject["feed"]->data[$a]->from->id;
									$message = $parsedObject["feed"]->data[$a]->message;
									$time = $parsedObject["feed"]->data[$a]->created_time;
									if (isset($parsedObject["feed"]->data[$a]->picture)) {
										$picture = $parsedObject["feed"]->data[$a]->picture;
										if (isset($parsedObject["feed"]->data[$a]->link)) $link = $parsedObject["feed"]->data[$a]->link;
										else $link = NULL;
										if (isset($parsedObject["feed"]->data[$a]->name)) $picName = $parsedObject["feed"]->data[$a]->name;
										else $picName = NULL;
									}
									else $picture = NULL;
									// Get Actor Image
									$request = new FacebookRequest($session, 'GET', '/'.$actorID.'?fields=picture');
									$response = $request->execute();
									$graphObject = $response->getGraphObject();
									$parsedObject2 = $graphObject->asArray();
									$actorImg = $parsedObject2["picture"]->data->url;
									// Parse Date
									$dateTimePieces = explode("T",$time);
									list($date,$time) = $dateTimePieces;
									$datePieces = explode("-",$date);
									list($year,$month,$day) = $datePieces;
									$timePieces = explode("+",$time);
									$time = $timePieces[0];
									$timePieces = explode(":",$time);
									list($hour,$minute,$second) = $timePieces;
									$postTime = date("j M",mktime($hour,$minute,$second,$month,$day,$year));
									$realTime = date("d F Y, H:i:s (e)",mktime($hour,$minute,$second,$month,$day,$year));
									?>
									<div class="fb-container media">
										<a class="fb-pic media-left media-top" href="//facebook.com/<?php echo $actorID; ?>"><img src="<?php echo $actorImg; ?>" alt="<?php echo $actorName; ?>"></a>
										<div class="fb-content media-body">
											<h4 class="fb-title media-heading"><a href="//facebook.com/<?php echo $actorID; ?>" target="_blank"><?php echo $actorName; ?></a><span><a href="//facebook.com/<?php echo $postID; ?>" title="Time posted: <?php echo $realTime; ?>" target="_blank"><?php echo $postTime; ?></a></span></h4>
											<?php echo $message; ?>
											<?php
											if ($picture !== NULL) {
												echo "<br>";
												if ($link !== NULL) echo '<a href="'.$link.'" target="_blank"';
												if ($picName !== NULL) echo ' title="'.$picName.'"';
												if ($link !== NULL) echo '>';
												echo '<img src="'.$picture.'" style="padding-top:5px;"';
												if ($picName !== NULL) echo ' alt="'.$picName.'"';
												echo '>';
												if ($link !== NULL) echo '</a>';
											}
											?>
										</div>
									</div>
									<?php
								}
							}
							/* Use for debug to see Facebook object return
							echo print_r($parsedObject);*/
							?>
						</div>
						<div id="fb-footer">
							<button class="btn btn-default" onClick="window.open('//facebook.com/TeamFourthDimension');">Post on Team 4th Dimension's Timeline</button>
						</div>
					</div>
				</div>
				<div id="social-box" class="col-sm-6" style="text-align:center;">
					<a class="twitter-timeline"  href="https://twitter.com/OfficialTeam4D" data-widget-id="517177959354884098">Tweets by @OfficialTeam4D</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
			
			
		</div>
		
		<div id="LoLHelper-Page" class="content-bit LoLHelper-Page">
			<div class="row" style="margin:15px 0px;">
				<div class="col-sm-6 col-sm-push-6">
					<h1>LoL Helper</h1>
					<p>LolHelper began as an idea between two friends who were planning for a class project at the University of Kansas. Thomas Ford and Alexa Varady presented the idea and it was an immediate hit, gaining them the support of sixteen other programmers. In the following months, the group came together and made a basic application for the class. Afterwards they wanted to take it further; as avid League of Legends fans they could not stop, because the project was just too fun. The team decided to publish the application for the benefit of League of Legends fans everywhere. As League enthusiasts, we take everything we want to see in a League mobile application and try to make it into a reality. Our team has a lot of experience playing League and we also employ Austin Hofmann, the leader of the University of Kansas E-sports club. That being said, we are not the only League players out there! We want your feedback, we want your ideas, and most of all we want to make LolHelper great!</p>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
						<a href="UserGuide.pdf" target="_blank"><img src="Images/featuregraphic.png" alt="Featured" class="row-img"/></a>
						<h5>LolHelper User Guide</h5>
				</div>
			</div>
			<div class="row" style="border-top:10px solid #505050;">
				<div class="tab-7 active" data-target="#team-builder"><img src="Images/ssteambuilder.png" class="tab-img"><div>Team Builder</div></div>
				<div class="tab-7" data-target="#player-statistics"><img src="Images/sslookup.png" class="tab-img"><div>Player Statistics</div></div>
				<div class="tab-7" data-target="#counters"><img src="Images/sscounters.png" class="tab-img"><div>Counters</div></div>
				<div class="tab-7" data-target="#ultimate-bravery"><img src="Images/ssultimatebravery.png" class="tab-img"><div>Ultimate Bravery</div></div>
				<div class="tab-7" data-target="#build-guides"><img src="Images/ssbuildguides.png" class="tab-img"><div>Build Guides</div></div>
				<div class="tab-7" data-target="#jungle-timers"><img src="Images/sstimers.png" class="tab-img"><div>Jungle Timers</div></div>
				<div class="tab-7" data-target="#general-info"><img src="Images/sschampioninfo.png" class="tab-img"><div>General Info</div></div>
			</div>
			<div class="row">
				<div id="team-builder" class="tab-content" style="display:block;">
					<h2>Team Builder</h2>
					<p>A LoL Helper exclusive, our version of Team Builder helps you choose champions that work well as a team. Select a few champions that your team has chosen and our system will recommend other champs that will synergize with your existing team. If you're more advanced, then you can also select a play style to receive a set of champions custom-tailored to make it so.</p>
				</div>
				<div id="player-statistics" class="tab-content">
					<h2>Player Statistics</h2>
					<p>Every player wants to know how they measure up against their prey. Player Statistics lets you look up a player by summoner name and check out their statistics, even stats for temporary game modes like One For All or U.R.F.</p>
				</div>
				<div id="counters" class="tab-content">
					<h2>Counters</h2>
					<p>Maybe you see the champions on the other team and cower in fear. Fight that fear with the knowledge of who counters any champion. Or you can look up your own champion and see who you should avoid!</p>
				</div>
				<div id="ultimate-bravery" class="tab-content">
					<h2>Build Roulette</h2>
					<p>Feeling brave? Click the Build Roulette button and you'll be given a randomized champion and build. Maybe you find a new favorite, maybe you get destroyed! The randomizer will pick any item for any champion -that's more than 6 quadrillion possible choices. Are you feeling lucky?</p>
				</div>
				<div id="build-guides" class="tab-content">
					<h2>Build Guides</h2>
					<p>If you're playing a new champion, picking the wrong item could ruin your day. Take the guess work out of the equation by looking up a build guide. We've got them all.</p>
				</div>
				<div id="jungle-timers" class="tab-content">
					<h2>Jungle Timers</h2>
					<p>Did you kill those golems 4 minutes ago or have they respawned already? Better set an alarm! Using our jungle timers will give you a reliable alarm for jungle spawns, freeing you to decimate your opponents in the lane and be back in time for your golem friends. Surely they'll be glad to see you.</p>
				</div>
				<div id="general-info" class="tab-content">
					<h2>General Info</h2>
					<p>General Info does what it says on the app. We put detailed information on all the champions, items, and summoner spells in one place. Research anything your heart desires between matches. You want information? Have all the information.</p>
				</div>
			</div>
		</div>
		          
		<div id="About-Page" class="content-bit About-Page">		 	
			<div class="row" style="margin:15px 0;">
				<h1 class="headname visible-xs">About</h1>
				<div class="col-sm-6" style="text-align:center;">
					<img src="Images/alexa&thomas1.jpg" alt="Group Picture" class="row-img">
				</div>
				<div class="col-sm-6 left-text">
					<h2 class="headname hidden-xs">About</h2>
					<p>
          Team Fourth Dimension began at the University of Kansas in spring of 2014 when a group of sixteen Computer Science majors joined their keyboards to make LolHelper. That summer Alexa Varady and Thomas Ford decided to take Team Forth Dimension to the next level. In the following months they contacted the members of the original team and Murl Westheffer, Sean Stout, Su Yan, Austin Hofmann and Patrick Walter joined to expand upon the original product. Alongside Alexa and Thomas, they became the founders of Team 4th Dimension Software Solutions, and proceeded to make the team what they are today. 
          <br><br>
          Team 4th Dimension Software Solutions is capable of creating and designing all things software, but we specialize in web development and mobile applications. That being said, we have come together through a mutual passion and we carry that passion with us today: that passion is video games. We will continue updating and making LolHelper more useful to the League of Legends community while pursuing other gaming products in our free time.
          </p>
				</div>
			</div>
			<div class="row row-odd" style="border-top:5px solid #505050;border-bottom:5px solid #505050;">
				<div class="col-xs-12">
					<h2 style="text-align: center; margin: 0px;">Meet The Team</h2>
				</div>
			</div>
			<div class="row about-row">
				<a href="./Profiles.html#Alexa" class="about-link">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Alexa.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Alexa Varady</h4>
						<h5 class="subhead blacktext">President</h5>
					</div>
				</a>
				<a href="./Profiles.html#Thomas" class="about-link middle">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Thomas.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Thomas Ford</h4>
						<h5 class="subhead blacktext">CEO</h5>
					</div>
				</a>
				<a href="./Profiles.html#Nitin" class="about-link">
					<div class="about-div right">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/nitin2.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Nitin Kanukolanu</h4>
						<h5 class="subhead blacktext">Vice President</h5>
					</div>
				</a>
			</div>
			<div class="row about-row">
				<a href="./Profiles.html#Murl" class="about-link">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Murl.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Murl Westheffer</h4>
						<h5 class="subhead blacktext">Project Development Manager</h5>
					</div>
				</a>
				<a href="./Profiles.html#Greg" class="about-link middle">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/greg.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Greg Ervin</h4>
						<h5 class="subhead blacktext">Application Development Lead</h5>
					</div>
				</a>
				<a href="./Profiles.html#Su" class="about-link">
					<div class="about-div right">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Su.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Su Yan</h4>
						<h5 class="subhead blacktext">Mobile App Developer</h5>
					</div>
				</a>				
			</div>
			<div class="row about-row">
			   <a href="./Profiles.html#Austin" class="about-link">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Austin.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Austin Hofmann</h4>
						<h5 class="subhead blacktext">Mobile App Developer</h5>
					</div>
				</a>
				<a href="./Profiles.html#Sean" class="about-link middle">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Sean.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Sean Stout</h4>
						<h5 class="subhead blacktext">Lead Web Developer</h5>
					</div>
				</a>
				<a href="./Profiles.html#Jeff" class="about-link">
					<div class="about-div right">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/jeff.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Jeff Hinshaw</h4>
						<h5 class="subhead blacktext">Senior Web Developer</h5>
					</div>
				</a>
			</div>
			<div class="row about-row">
				<a href="./Profiles.html#Jordan" class="about-link">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/jordan.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Jordan Hayhurst</h4>
						<h5 class="subhead blacktext">Web Developer</h5>
					</div>
				</a>
				<a href="./Profiles.html#Cory" class="about-link middle">
					<div class="about-div">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/cory.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Cory Rooney</h4>
						<h5 class="subhead blacktext">Graphic Design</h5>
					</div>
				</a>
				<a href="./Profiles.html#Jordyn" class="about-link">
					<div class="about-div right">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Jordyn.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Jordyn Cox</h4>
						<h5 class="subhead blacktext">Director of Social Media</h5>
					</div>
				</a>
			</div>
        	<div class="row about-row">
        		<a href="./Profiles.html#AustinS" class="about-link bottom">
					<div class="about-div bottom">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/Austin1.jpg" class="row-img"></div>
						<h4 class="headname blacktext">Austin Steadman</h4>
						<h5 class="subhead blacktext">Network &amp; E-sports Specialist</h5>
					</div>
				</a>
				<a href="./Profiles.html#Walterbros" class="about-link middle bottom">
					<div class="about-div bottom">
						<div style="text-align:center; padding-top: 10px;"><img src="Images/david.jpg" class="row-img"></div>
						<h4 class="headname blacktext">David &amp; Patrick Walter</h4>
						<h5 class="subhead blacktext">Video Production &amp; Photography</h5>
					</div>
				</a>
			</div>
		</div>
		
    <!------------------------------------------------------------------------------------------------------->
    <!--   Jordan's work starts here ------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------------------------->
    <div id="Products-Page" class="content-bit Products-and-Services">
			<div class="row" style="margin:15px 0px;">
				<div class="col-sm-6 col-sm-push-6">
					<h1>Contact</h1>
					<p>Email: <a href="mailto:contact@team4d.org">contact@team4d.org</a></p>
					<p>Phone: (785) 218-0190</p>
					<p>Application: <a href="Application.pdf" target="_blank"><img src="Images/pdficon.jpg" alt="Application" style="width:50px;" /></a></p>
					<p>To request our services, please fill out the application above and email it to us.</p>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
          <h1>Our Mission</h1>
					<p>Team 4th Dimension is a company founded by those who want a better product. When we set out to create a product, we look to make something that we would want to use in our daily lives. We do not settle for any less. </p>
				</div>
			</div>
			<div class="row" style="border-top:10px solid #505050;">
				<div class="tab-7 active" data-target="#holder1"><img src="Images/webdesign.png" class="tab-img"><div>Web Development </div></div>
				<div class="tab-7" data-target="#holder2"><img src="Images/mobiledesign.png" class="tab-img"><div>Mobile Applications</div></div>
				<div class="tab-7" data-target="#holder3"><img src="Images/ITSolutions.jpg" class="tab-img"><div>IT Solutions</div></div>
				<div class="tab-7" data-target="#holder4"><img src="Images/leaders.jpg" class="tab-img"><div>Consulting</div></div>
			</div>
			<div class="row">
				<div id="holder1" class="tab-content" style="display:block;">
					<h2>Web Development</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Web Design</li>
						<li>Logo Design</li>
						<li>Social Media creation and upkeep</li>
						<li>Web hosting and upkeep</li>
					</ul>
				</div>
				<div id="holder2" class="tab-content">
					<h2>Mobile Applications</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Mobile Design</li>
						<li>Logo Design</li>
						<li>Social Media creation and upkeep</li>
						<li>Database creation and maintenance</li>
					</ul>
				</div>
				<div id="holder3" class="tab-content">
					<h2>IT Solutions</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Application Solutions</li>
						<li>Small business network design and implementation</li>
            	<li>Technology repair</li>
					</ul>
				</div>
				<div id="holder4" class="tab-content">
					<h2>Consulting</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Face to Face meetings in person or on Skype</li>
						<li>Discussions to find out exactly what you are looking for</li>
					</ul>
				</div>
			</div>
		</div>
		<!------------------------------------------------------------------------------------------------------------------------------------>
    <!-- and ends here ------------------------------------------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------------------------------------------------------>
    
		<div id="Thanks-Page" class="content-bit Thanks-Page">
			<div class="row" style="margin:15px 0px;">
    			<div class="col-sm-6">
					<h5>Here at Team 4th dimension we greatly appreciate those who go above and beyond to help us achieve our goal.</h5>
					<p style="margin-top:30px; text-align:center;">First, to our investors in recognition of their contribution and dedication to Team 4th Dimension. Without your generous contribution and faith in us, our dream may have remained an idea. Thank you from all of us. Second, we give great thanks to those who contribute to our future Kickstarter page so we can upgrade our hardware. This will enable us to improve our applications or to make your great idea into a reality with Team 4th Dimension.</p>
				</div>
				<div class="col-sm-6">
					<h5>To show our thanks, those who contribute will receive:</h5>
					<ul>
						<li><strong>Level One - </strong>Special mention on this page for a contribution of $100 or higher.</li>
						<li><strong>Level Two - </strong>A Team 4D Polo shirt for investments of $500 or higher.</li>
            <li><strong>Level Three - </strong>The title of Executive Producer in the credits of the Application they supported for contributions of $1000 or higher.</li>
						<li><strong>Level Four - </strong>For an investment of $2000 or more, a custom plaque commemorating your support of our company and a signed picture of the team. Alternatively, if you live near our hometown of Lawrence, KS, we'd love to set up a meet and greet!</li>
					</ul>
				</div>
			</div>
    		<div class="row row-odd">
				<div class="visible-xs">
					<h2 class="headname">Name</h2>
					<h3 class="subhead">Contribution</h3>
				</div>
				<div class="col-sm-4 col-md-push-1 col-lg-push-2" style="text-align:center;"><img src="Images/Paul.jpg" class="row-img"></div>
				<div class="col-sm-8 col-md-6 col-lg-4 col-md-push-1 col-lg-push-2">
					<div class="left-text">
						<h2 class="headname hidden-xs">Paul Steffens</h2>
						<h3 class="subhead hidden-xs">Level Four</h3>
						<p><strong>Thank you Paul</strong> for your faith and interest in what we do here at Team 4th Dimension. Your generous investment means a lot to every single one of our team members. 
            The investment will make it possible for us to put LolHelper and all future applications on iOS. As our initial investor without you our dream 
            may have remained an idea.<br> Again, thank you from Team 4th Dimension.</p>
						<p><strong>Paul's personal statement:</strong>I could not be more excited for what you all at Team 4th Dimension are doing. I truly believe that the skills this team possesses will allow them to meet and go beyond any goals they set. I am confident in the LoLHelper application specifically because it has the capability to reach the market in ways that have not yet been done. I am looking forward to seeing what the future has for Team 4th Dimension.</p>
					</div>
				</div>
			</div>
			<div class="row row-even">
				<div class="visible-xs">
					<h2 class="headname">Name</h2>
					<h3 class="subhead">Contribution</h3>
				</div>
				<div class="col-sm-4 col-sm-push-8 col-md-push-7 col-lg-push-6" style="text-align:center;"><img src="Images/unknown.jpg" class="row-img"></div>
				<div class="col-sm-8 col-md-6 col-lg-4 col-sm-pull-4 col-md-pull-3 col-lg-pull-2">
					<div class="left-text">
						<h2 class="headname hidden-xs">Name</h2>
						<h3 class="subhead hidden-xs">Contribution</h3>
						<p><strong>This could be you!</strong> </p>
						<p>Personal Statement (optional)</p>
					</div>
				</div>
			</div>
			
		</div>
		
		<div id="footer">
			<a href="mailto:contact@team4d.org">contact@team4d.org</a> | (785) 218-0190<br>
			Web design by Team 4th Dimension<br>
			&copy; Team 4th Dimension 2014<br>
			<a href="http://www.facebook.com/TeamFourthDimension" target="_blank" title="Facebook"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#facebook-icon"></use></svg></a><a href="http://twitter.com/OfficialTeam4D" target="_blank" title="Twitter"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#twitter-icon"></use></svg></a><a href="https://www.linkedin.com/company/team-4th-dimension" target="_blank" title="LinkedIn"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#linkedin-icon"></use></svg></a><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SDVF2B5Q4ALFG" target="_blank" title="Support Us"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#paypal-icon"></use></svg></a>
		</div>
	</div>
	</body>
</html>