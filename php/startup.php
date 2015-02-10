<?php
// Change Defaults
date_default_timezone_set("UTC");
// Get Directory
define("PHP_DIR",$_SERVER["DOCUMENT_ROOT"]);
define("PHP_DOMAIN","team4d.org");
// Include Scripts
include_once(PHP_DIR."/php/functions.php");
// Check for message
if (isset($_COOKIE["success"])) {
	$SUCCESS[] = $_COOKIE["success"];
	setcookie("success",NULL,time()-3600,"/",PHP_DOMAIN);
}
?>