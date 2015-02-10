<?php
// FACEBOOK FEED OPTIONS
$FB_FEED_LENGTH = 5;
$file = $_SERVER['DOCUMENT_ROOT']."/public_html/php/fb_feed.php";

// Get Facebook scripts
include_once($_SERVER['DOCUMENT_ROOT']."/public_html/scripts/facebook/autoload.php");
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

$newData = '<div id="fb-feed">';

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
		
		$newData .= '<div class="fb-container media">
			<a class="fb-pic media-left media-top" href="//facebook.com/'.$actorID.'"><img src="'.$actorImg.'" alt="'.$actorName.'"></a>
			<div class="fb-content media-body">
				<h4 class="fb-title media-heading"><a href="//facebook.com/'.$actorID.'" target="_blank">'.$actorName.'</a><span><a href="//facebook.com/'.$postID.'" title="Time posted: '.$realTime.'" target="_blank">'.$postTime.'</a></span></h4>
				'.$message;
		if ($picture !== NULL) {
			$newData .= "<br>";
			if ($link !== NULL) $newData .= '<a href="'.$link.'" target="_blank"';
			if ($picName !== NULL) $newData .= ' title="'.$picName.'"';
			if ($link !== NULL) $newData .= '>';
			$newData .= '<img src="'.$picture.'" style="padding-top:5px;"';
			if ($picName !== NULL) $newData .= ' alt="'.$picName.'"';
			$newData .= '>';
			if ($link !== NULL) $newData .= '</a>';
		}
		$newData .= '</div></div>';
	}
}
$newData .= '</div>
	<div id="fb-footer">
		<button class="btn btn-default" onClick="window.open(\'//facebook.com/TeamFourthDimension\');">Post on Team 4th Dimension&#39;s Timeline</button>
	</div>
	</div>';

// Open & Write Data
if (file_put_contents($file,$newData)===false) die("Error writing file");
?>