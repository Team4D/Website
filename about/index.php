<?php
include_once($_SERVER['DOCUMENT_ROOT']."/php/startup.php");

// LOAD PROFILE INFO
include_once(PHP_DIR."/php/profiles.php");
$MAX_ID = $MAX_ROW = count($PROFILES);
for ($MAX_ROW; $MAX_ROW % 3 != 0; $MAX_ROW++);
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
		<div id="About-Page" class="content-bit About-Page">		 	
			<div class="row" style="margin:15px 0;">
				<h1 class="headname visible-xs">About</h1>
				<div class="col-sm-6" style="text-align:center;">
					<img src="/images/alexa&thomas1.jpg" alt="Group Picture" class="row-img">
				</div>
				<div class="col-sm-6 left-text">
					<h2 class="headname hidden-xs">About</h2>
					<p>Team Fourth Dimension began at the University of Kansas in spring of 2014 when a group of sixteen Computer Science majors joined their keyboards to make LolHelper. That summer Alexa Varady and Thomas Ford decided to take Team Forth Dimension to the next level. In the following months they contacted the members of the original team and Murl Westheffer, Sean Stout, Su Yan, Austin Hofmann and Patrick Walter joined to expand upon the original product. Alongside Alexa and Thomas, they became the founders of Team 4th Dimension Software Solutions, and proceeded to make the team what they are today.</p>
					<p>Team 4th Dimension Software Solutions is capable of creating and designing all things software, but we specialize in web development and mobile applications. That being said, we have come together through a mutual passion and we carry that passion with us today: that passion is simple, software that works, all the time. We will continue updating and making LolHelper more useful to the League of Legends community while pursuing other products in our free time.</p>
				</div>
			</div>
			<div class="row row-odd" style="border-top:5px solid #505050;border-bottom:5px solid #505050;">
				<div class="col-xs-12">
					<h2 style="text-align:center;margin:0px;">Meet The Team</h2>
				</div>
			</div>
			<?php
			foreach ($PROFILES as $id => $profile) {
				if ($id % 3 == 1 && $id != 1) echo "</div>";
				if ($id % 3 == 1 && $id != $MAX_ID) echo '<div class="row about-row">';
				?>
				<a href="/profiles/?id=<?php echo $id; ?>" class="about-link<?php
					if ($id % 3 == 2) echo " middle";
					if ($id > $MAX_ROW - 3) echo " bottom";
				?>">
					<div class="about-div">
						<div style="text-align:center;padding-top:10px;"><img src="/images/profiles/<?php echo $id; ?>.jpg" class="row-img"></div>
						<h4 class="headname blacktext"><?php echo $profile["name"]; ?></h4>
						<h5 class="subhead blacktext"><?php echo $profile["position"]; ?></h5>
					</div>
				</a>
				<?php
				if ($id == $MAX_ID) echo "</div>";
			}
			?>
		</div>
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>
