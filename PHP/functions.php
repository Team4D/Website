<?php
// Validate Phone Number
function validatePhone($number,$formats=NULL) {
	if ($formats === NULL) {
		$formats = array("(###) ###-####","(###)###-####","###-###-####","##########");
	}
	$format = trim(ereg_replace("[0-9]", "#", $number));
	return (in_array($format, $formats)) ? true : false;
}
// Validate Date
function validateDate($date,$formats=NULL) {
	if ($formats === NULL) {
		$formats = array("##/##/####","##-##-####","####/##/##","####-##-##");
	}
	$format = trim(ereg_replace("[0-9]","#",$date));
	return (in_array($format,$formats)) ? true : false;
}
// Format Date
function formatDate($date) {
	$date = str_replace("-","/",$date);
	$format = trim(ereg_replace("[0-9]","#",$date));
	$date_pieces = explode("/",$date);
	if ($format == "##/##/####") {
		list($month,$day,$year) = $date_pieces;
	}
	elseif ($format == "####/##/##") {
		list($year,$month,$day) = $date_pieces;
	}
	$return = date("m/d/Y",mktime(0,0,0,$month,$day,$year));
	return $return;
}
// Validate Email Address
function validateEmail($email) {
	// First, we check that there's one @ symbol, 
	// and that the lengths are right.
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
		// Email invalid because wrong number of characters 
		// in one section or wrong number of @ symbols.
		return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",$local_array[$i])) {
			return false;
		}
	}
	// Check if domain is IP. If not, 
	// it should be valid domain name
	if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$",$domain_array[$i])) {
				return false;
			}
		}
	}
	return true;
}
// Converts ASCII and HTML values
function symConvert($input,$from,$to) {
	/* About Types:
	 *
	 * ASCII to HTML   : Converts chr(x) format to &#x; format */
	  
	$type = $from . 'to' . $to;
	$input = stripslashes($input);
	
	if ($type == 'asciitohtml') {
		$output = htmlentities($input,ENT_QUOTES,"UTF-8");
		$search = array('&ldquo;','&rdquo;','&lsquo;','&rsquo;','\\','`');
		$replace = array('&quot;','&quot;','&#39;','&#39;','&#92;','&#96;');
		$output = str_replace($search,$replace,$output);
		return $output;
	}
	else return false;
}
?>