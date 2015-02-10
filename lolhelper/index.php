<?php
include_once($_SERVER['DOCUMENT_ROOT']."/php/startup.php");
?>
<!doctype html>
<html lang="en"><!-- InstanceBegin template="/Templates/Team4D.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>4th Dimension Software Solutions</title>
	<!-- InstanceEndEditable -->
	<?php include_once(PHP_DIR."/php/meta.php"); ?>
	<?php include_once(PHP_DIR."/php/js.php"); ?>
	<?php include_once(PHP_DIR."/php/link.php"); ?>
	<!-- InstanceBeginEditable name="head" -->
	
	<!-- InstanceEndEditable -->
</head>

<body>
	<?php include_once(PHP_DIR."/php/page_first.php"); ?>
	<!-- Content -->
	<div id="bodywrapper">
		<!-- Navbar -->
		<?php include_once(PHP_DIR."/php/page_nav.php"); ?>
		<?php include_once(PHP_DIR."/php/alert.php"); ?>
		<!-- InstanceBeginEditable name="main_content" -->
		<div id="LoLHelper-Page" class="content-bit LoLHelper-Page">
			<div class="row" style="margin:15px 0px;">
				<div class="col-sm-6 col-sm-push-6">
					<h1>LoL Helper</h1>
					<p>LolHelper began as an idea between two friends who were planning for a class project at the University of Kansas. Thomas Ford and Alexa Varady presented the idea and it was an immediate hit, gaining them the support of sixteen other programmers. In the following months, the group came together and made a basic application for the class. Afterwards they wanted to take it further; as avid League of Legends fans they could not stop, because the project was just too fun. The team decided to publish the application for the benefit of League of Legends fans everywhere. As League enthusiasts, we take everything we want to see in a League mobile application and try to make it into a reality. Our team has a lot of experience playing League and we also employ Austin Hofmann, the leader of the University of Kansas E-sports club. That being said, we are not the only League players out there! We want your feedback, we want your ideas, and most of all we want to make LolHelper great!</p>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
					<div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="//www.youtube.com/embed/P4sEMUyJUrI?rel=0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
			<div class="row" style="border-top:10px solid #505050;">
				<div class="tab-7 active" data-target="#team-builder"><img src="/images/ssteambuilder.jpg" class="tab-img"><div>Team Builder</div></div>
				<div class="tab-7" data-target="#player-statistics"><img src="/images/sslookup.jpg" class="tab-img"><div>Player Statistics</div></div>
				<div class="tab-7" data-target="#counters"><img src="/images/sscounters.jpg" class="tab-img"><div>Counters</div></div>
				<div class="tab-7" data-target="#ultimate-bravery"><img src="/images/ssultimatebravery.jpg" class="tab-img"><div>Ultimate Bravery</div></div>
				<div class="tab-7" data-target="#build-guides"><img src="/images/ssbuildguides.jpg" class="tab-img"><div>Build Guides</div></div>
				<div class="tab-7" data-target="#jungle-timers"><img src="/images/sstimers.jpg" class="tab-img"><div>Jungle Timers</div></div>
				<div class="tab-7" data-target="#general-info"><img src="/images/sschampioninfo.jpg" class="tab-img"><div>General Info</div></div>
			</div>
			<div class="row tab-content">
				<div id="team-builder" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1" style="display:block;">
					<h2>Team Builder</h2>
					<p>A LoL Helper exclusive, our version of Team Builder helps you choose champions that work well as a team. Select a few champions that your team has chosen and our system will recommend other champs that will synergize with your existing team. If you're more advanced, then you can also select a play style to receive a set of champions custom-tailored to make it so.</p>
				</div>
				<div id="player-statistics" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Player Statistics</h2>
					<p>Every player wants to know how they measure up against their prey. Player Statistics lets you look up a player by summoner name and check out their statistics, even stats for temporary game modes like One For All or U.R.F.</p>
				</div>
				<div id="counters" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Counters</h2>
					<p>Maybe you see the champions on the other team and cower in fear. Fight that fear with the knowledge of who counters any champion. Or you can look up your own champion and see who you should avoid!</p>
				</div>
				<div id="ultimate-bravery" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Build Roulette</h2>
					<p>Feeling brave? Click the Build Roulette button and you'll be given a randomized champion and build. Maybe you find a new favorite, maybe you get destroyed! The randomizer will pick any item for any champion -that's more than 6 quadrillion possible choices. Are you feeling lucky?</p>
				</div>
				<div id="build-guides" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Build Guides</h2>
					<p>If you're playing a new champion, picking the wrong item could ruin your day. Take the guess work out of the equation by looking up a build guide. We've got them all.</p>
				</div>
				<div id="jungle-timers" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Jungle Timers</h2>
					<p>Did you kill those golems 4 minutes ago or have they respawned already? Better set an alarm! Using our jungle timers will give you a reliable alarm for jungle spawns, freeing you to decimate your opponents in the lane and be back in time for your golem friends. Surely they'll be glad to see you.</p>
				</div>
				<div id="general-info" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>General Info</h2>
					<p>General Info does what it says on the app. We put detailed information on all the champions, items, and summoner spells in one place. Research anything your heart desires between matches. You want information? Have all the information.</p>
				</div>
			</div>
		</div>
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>