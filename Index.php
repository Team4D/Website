<?php
include_once($_SERVER['DOCUMENT_ROOT']."/php/startup.php");

// FACEBOOK FEED OPTIONS
$FB_FEED_LENGTH = 5;

// Get Facebook scripts
include_once(PHP_DIR."/scripts/facebook/autoload.php");
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
								<img style="width:100%;" src="images/carousel1lg.jpg" alt="Design Meeting">
							</div>
							<div class="item">
								<img style="width:100%;" src="images/carousel2lg.jpg" alt="Business Meeting">
							</div>
							<div class="item">
								<img style="width:100%;" src="images/carousel3lg.jpg" alt="Concept">
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
							// Use for debug to see Facebook object return
							// echo print_r($parsedObject);
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
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>