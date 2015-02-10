<?php
include_once($_SERVER['DOCUMENT_ROOT']."/php/startup.php");

// APPLICATION OPTIONS
include_once(PHP_DIR."/php/application.php");

$TYPE = $_POST['type'];

// APPLICATION
if ($TYPE == "application") {
	// Collect Variables
	$FIRST_NAME = $_POST['FIRST_NAME'];
	$LAST_NAME = $_POST['LAST_NAME'];
	$COMPANY = $_POST['COMPANY'];
	$ADDRESS1 = $_POST['ADDRESS1'];
	$ADDRESS2 = $_POST['ADDRESS2'];
	$CITY = $_POST['CITY'];
	$STATE = $_POST['STATE'];
	$ZIP = $_POST['ZIP'];
	$PHONE = $_POST['PHONE'];
	$EMAIL = $_POST['EMAIL'];
	$COMPANY_DESC = $_POST['COMPANY_DESC'];
	$WEB_CHECK = $_POST['web-check'];
	$MOBILE_CHECK = $_POST['mobile-check'];
	$SOCIAL_CHECK = $_POST['social-check'];
	$OTHER_CHECK = $_POST['other-check'];
	if ($WEB_CHECK == 1) {
		foreach ($web_services as $category) {
			foreach ($category as $field) {
				$$field["name"] = $_POST[$field["name"]];
				if ($field["desc"] === NULL) {
					$varname = $field["name"]."_DESC";
					$$varname = $_POST[$varname];
				}
			}
		}
	}
	if ($MOBILE_CHECK == 1) {
		foreach ($mobile_services as $category) {
			foreach ($category as $field) {
				$$field["name"] = $_POST[$field["name"]];
				if ($field["desc"] === NULL) {
					$varname = $field["name"]."_DESC";
					$$varname = $_POST[$varname];
				}
			}
		}
	}
	if ($SOCIAL_CHECK == 1) {
		foreach ($social_services as $category) {
			foreach ($category as $field) {
				$$field["name"] = $_POST[$field["name"]];
				if ($field["desc"] === NULL) {
					$varname = $field["name"]."_DESC";
					$$varname = $_POST[$varname];
				}
			}
		}
	}
	if ($OTHER_CHECK == 1) {
		$OTHER_SERVICES = $_POST['OTHER_SERVICES'];
	}
	$SPECS = $_POST['SPECS'];
	$DEADLINE = $_POST['DEADLINE'];
	$INFO = $_POST['INFO'];
	$SIGNATURE = $_POST['SIGNATURE'];
	$DATE = $_POST['DATE'];
	// Validate
	if ($FIRST_NAME == "") $ERROR[] = "Please enter your first name.";
	elseif (!preg_match("#^[A-Za-z-\.]{2,}$#",$FIRST_NAME)) $ERROR[] = "First Name is invalid.";
	if ($LAST_NAME == "") $ERROR[] = "Please enter your last name.";
	elseif (!preg_match("#^[A-Za-z-\.]{2,}$#",$LAST_NAME)) $ERROR[] = "Last Name is invalid.";
	if ($COMPANY == "") $ERROR[] = "Please enter your company&#39;s name.";
	if ($ADDRESS1 == "") $ERROR[] = "Please enter your address.";
	if ($CITY == "") $ERROR[] = "Please enter your city.";
	if ($STATE == "") $ERROR[] = "Please select your state.";
	elseif (!in_array($STATE,$states)) $ERROR[] = "Invalid state.";
	if ($ZIP == "") $ERROR[] = "Please enter your ZIP code.";
	elseif (!preg_match("#^[0-9]{5}$#",$ZIP)) $ERROR[] = "Invalid ZIP code.";
	elseif ($ZIP < 601 || $ZIP > 99950) $ERROR[] = "Invalid ZIP code.";
	if ($PHONE == "") $ERROR[] = "Please enter your phone number.";
	elseif (!validatePhone($PHONE,$phone_formats)) $ERROR[] = "Invalid phone number.";
	if ($EMAIL == "") $ERROR[] = "Please enter your email address.";
	elseif (!validateEmail($EMAIL)) $ERROR[] = "Invalid email address.";
	if ($COMPANY_DESC == "") $ERROR[] = "Please enter a description of your company.";
	if ($WEB_OTHER == 1 && $WEB_OTHER_DESC == "") $ERROR[] = "Please enter a description for the other web service you would like.";
	if ($MOBILE_OTHER == 1 && $MOBILE_OTHER_DESC == "") $ERROR[] = "Please enter a description for the other mobile app service you would like.";
	if ($SOCIAL_OTHER == 1 && $SOCIAL_OTHER_DESC == "") $ERROR[] = "Please enter a description for the other social service you would like.";
	if ($POST['other-check'] == 1 && $OTHER_SERVICES == "") $ERROR[] = "Please enter a description for the other services you would like.";
	if ($DEADLINE == "") $ERROR[] = "Please enter a deadline.";
	elseif (!validateDate($DEADLINE,$date_formats)) $ERROR[] = "Deadline invalid. Please enter as MM/DD/YYYY.";
	else {
		$DEADLINE = formatDate($DEADLINE);
		$datePieces = explode("/",$DEADLINE);
		list($month,$day,$year) = $datePieces;
		if (!checkdate($month,$day,$year)) $ERROR[] = "Deadline invalid.";
		else {
			$currDate = date("Ymd");
			$deadlineDate = $year.$month.$day;
			if ($deadlineDate <= $currDate) $ERROR[] = "Deadline must be be after today.";
		}
	}
	if ($SIGNATURE == "") $ERROR[] = "Please enter your digital signature.";
	if ($DATE == "") $ERROR[] = "Please enter the date.";
	elseif (!preg_match("#^[0-9]{2}/[0-9]{2}/[2]{1}[0-9]{3}$#",$DATE)) $ERROR[] = "Date invalid. Please enter as MM/DD/YYYY.";
	else {
		$datePieces = explode("/",$DATE);
		list($month,$day,$year) = $datePieces;
		if ($month != date('m') || $day != date('d') || $year != date('Y')) $ERROR[] = "Date does not match today&#39;s date.";
	}
	// Submit
	if (!isset($ERROR)) {
		// Prepare Email Message
		$MSG = '<html>
			<body>
			<h1>Application for Services</h1>
			<h3>Contact Information</h3>
			<p><strong>Name:</strong> '.$FIRST_NAME." ".$LAST_NAME.'<br>
			<strong>Company:</strong> '.$COMPANY.'<br>
			<strong>Address:</strong><br>
			'.$ADDRESS1.'<br>';
		if ($ADDRESS2 != "") $MSG .= $ADDRESS2."<br>";
		$MSG .= $CITY.", ".$STATE." ".$ZIP.'<br>
			<strong>Phone:</strong> '.$PHONE.'<br>
			<strong>Email:</strong> '.$EMAIL.'</p>
			
			<h3>Brief Company Description</h3>
			<p>'.$COMPANY_DESC.'</p>
			
			<h3>Web Design Services</h3>
			<p>';
		foreach ($web_services as $category) {
			foreach ($category as $field) {
				if ($$field["name"] == 1) {
					if ($field["desc"] === NULL) {
						$varname = $field["name"]."_DESC";
						$desc = "[USER INPUT] ".$$varname;
					}
					else $desc = $field["desc"];
					$MSG .= $desc."<br>\n";
				}
			}
		}
		$MSG .= '</p>
			
			<h3>Mobile Application Services</h3>
			<p>';
		foreach ($mobile_services as $category) {
			foreach ($category as $field) {
				if ($$field["name"] == 1) {
					if ($field["desc"] === NULL) {
						$varname = $field["name"]."_DESC";
						$desc = "[USER INPUT] ".$$varname;
					}
					else $desc = $field["desc"];
					$MSG .= $desc."<br>\n";
				}
			}
		}
		$MSG .= '</p>
			
			<h3>Social Media Services</h3>
			<p>';
		foreach ($social_services as $category) {
			foreach ($category as $field) {
				if ($$field["name"] == 1) {
					if ($field["desc"] === NULL) {
						$varname = $field["name"]."_DESC";
						$desc = "[USER INPUT] ".$$varname;
					}
					else $desc = $field["desc"];
					$MSG .= $desc."<br>\n";
				}
			}
		}
		$MSG .= '</p>
			
			<h3>Other Services</h3>
			<p>'.$OTHER_SERVICES.'</p>
			
			<h3>Detailed Specifications</h3>
			<p>'.$SPECS.'</p>
			
			<h3>Time Frame</h3>
			<p><strong>Deadline:</strong> '.$DEADLINE.'<br>
			<strong>Other Info:</strong><br>
			'.$INFO.'</p>
			
			<h3>Signature</h3>
			<p><strong>Signed:</strong> '.$SIGNATURE.'<br>
			<strong>Date:</strong> '.$DATE.'</p>
			</body>
			</html>';
		// Prepare To
		foreach ($APP_TO as $contact) {
			$TO .= $contact["name"]." <".$contact["email"].">, ";
		}
		$TO = substr($TO,0,-2);
		// Prepare From
		$headers = "From: ".$APP_FROM['name']." <".$APP_FROM['email'].">"."\r\n";
		// Prepare CC
		if ($APP_CC !== NULL) {
			foreach ($APP_CC as $contact) {
				$CC .= $contact["name"]." <".$contact["email"].">, ";
			}
			$CC = substr($CC,0,-2);
			$headers .= "CC: $CC\r\n";
		}
		// Prepare Remaining Email
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		// Send Email
		if (mail($TO,$APP_SUBJECT,$MSG,$headers,"-f".$APP_FROM["email"])) {
			setcookie("success","Your application has been received!",time()+30,"/",PHP_DOMAIN);
			header("Location: /Index.php#Products-Page");
		}
		else $ERROR[] = "There was a problem processing your application.";
	}
}
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
		<div id="Request-Page" class="content-bit Request-Page">
			<div class="row" style="margin:15px;">
				<form name="application-form" method="post" action="">
					<input name="type" type="hidden" value="application">
					<h1>Request Services</h1>
					<p>Alternatively, you may <a href="/request-services.pdf" target="_blank">fill out the PDF</a> and email it to us.</p>
					
					<h3>Contact Information</h3>
					<div class="row">
						<div class="col-sm-6"><input class="form-control" name="FIRST_NAME" type="text" value="<?php echo $FIRST_NAME; ?>" placeholder="First Name"></div>
						<div class="col-sm-6"><input class="form-control" name="LAST_NAME" type="text" value="<?php echo $LAST_NAME; ?>" placeholder="Last Name"></div>
					</div>
					<div class="row">
						<div class="col-xs-12"><input class="form-control" name="COMPANY" type="text" value="<?php echo $COMPANY; ?>" placeholder="Company Name"></div>
						<div class="col-xs-12"><input class="form-control" name="ADDRESS1" type="text" value="<?php echo $ADDRESS1; ?>" placeholder="Address Line 1 (Street address, P.O. box)"></div>
						<div class="col-xs-12"><input class="form-control" name="ADDRESS2" type="text" value="<?php echo $ADDRESS2; ?>" placeholder="Address Line 2 (Apartment, building, etc.)"></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><input class="form-control" name="CITY" type="text" value="<?php echo $CITY; ?>" placeholder="City"></div>
						<div class="col-sm-3">
							<input id="state-input" name="STATE" type="hidden" value="<?php echo $STATE; ?>">
							<div id="state-dropdown" class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<?php if ($STATE!="") echo $STATE; else echo "State"; ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<?php
									foreach ($states as $state) {
										echo '<li><a href="javascript:;">'.$state.'</a></li>';
									}
									?>
								</ul>
							</div>
						</div>
						<div class="col-sm-3"><input class="form-control" name="ZIP" type="number" value="<?php echo $ZIP; ?>" min="601" max="99950" placeholder="ZIP Code"></div>
					</div>
					<div class="row">
						<div class="col-sm-6"><input class="form-control" name="PHONE" type="tel" value="<?php echo $PHONE; ?>" placeholder="Phone Number"></div>
						<div class="col-sm-6"><input class="form-control" name="EMAIL" type="email" value="<?php echo $EMAIL; ?>" placeholder="Email Address"></div>
					</div>
					
					<h3>Brief Company Description</h3>
					<div class="row">
						<div class="col-xs-12"><textarea class="form-control" name="COMPANY_DESC" type="text" placeholder="Brief Company Description"><?php echo $COMPANY_DESC; ?></textarea></div>
					</div>
					
					<h3>Desired Services</h3>
					<div class="row">
						
						<div class="col-md-4 col-sm-6">
							<div class="input-group input-group-lg input-group-header">
								<span class="input-group-addon"><input id="web-check" class="show-service" name="web-check" type="checkbox" data-target="#web-services" value="1"<?php if ($WEB_CHECK==1) echo ' checked'; ?>></span>
								<input class="form-control" type="text" value="Web Design Services" readonly>
							</div>
							<div id="web-services"<?php if ($WEB_CHECK==1) echo ' style="display:block;"'; ?>>
								<?php
								foreach ($web_services as $category_name => $category) { ?>
									<strong><?php echo $category_name; ?></strong>
									<?php
									foreach ($category as $field) {
										if ($field["desc"] === NULL) {
											$varname = $field["name"]."_DESC"; ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" name="<?php echo $field["name"]; ?>_DESC" type="text" value="<?php echo $$varname; ?>" placeholder="<?php echo $field["placeholder"]; ?>">
											</div>
											<?php
										}
										else { ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" type="text" value="<?php echo $field["desc"]; ?>" readonly>
											</div>
											<?php
										}
									}
								}
								?>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6">
							<div class="input-group input-group-lg input-group-header">
								<span class="input-group-addon"><input id="mobile-check" class="show-service" name="mobile-check" type="checkbox" data-target="#mobile-services" value="1"<?php if ($MOBILE_CHECK==1) echo ' checked'; ?>></span>
								<input class="form-control" type="text" value="Mobile Application Services" readonly>
							</div>
							<div id="mobile-services"<?php if ($MOBILE_CHECK==1) echo ' style="display:block;"'; ?>>
								<?php
								foreach ($mobile_services as $category_name => $category) { ?>
									<strong><?php echo $category_name; ?></strong>
									<?php
									foreach ($category as $field) {
										if ($field["desc"] === NULL) {
											$varname = $field["name"]."_DESC"; ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" name="<?php echo $field["name"]; ?>_DESC" type="text" value="<?php echo $$varname; ?>" placeholder="<?php echo $field["placeholder"]; ?>">
											</div>
											<?php
										}
										else { ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" type="text" value="<?php echo $field["desc"]; ?>" readonly>
											</div>
											<?php
										}
									}
								}
								?>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6">
							<div class="input-group input-group-lg input-group-header">
								<span class="input-group-addon"><input id="social-check" class="show-service" name="social-check" type="checkbox" data-target="#social-services" value="1"<?php if ($SOCIAL_CHECK==1) echo ' checked'; ?>></span>
								<input class="form-control" type="text" value="Social Media Services" readonly>
							</div>
							<div id="social-services"<?php if ($SOCIAL_CHECK==1) echo ' style="display:block;"'; ?>>
								<?php
								foreach ($social_services as $category_name => $category) { ?>
									<strong><?php echo $category_name; ?></strong>
									<?php
									foreach ($category as $field) {
										if ($field["desc"] === NULL) {
											$varname = $field["name"]."_DESC"; ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" name="<?php echo $field["name"]; ?>_DESC" type="text" value="<?php echo $$varname; ?>" placeholder="<?php echo $field["placeholder"]; ?>">
											</div>
											<?php
										}
										else { ?>
											<div class="input-group input-group-sm">
												<span class="input-group-addon"><input name="<?php echo $field["name"]; ?>" type="checkbox" value="1"<?php if ($$field["name"]!="") echo ' checked'; ?>></span>
												<input class="form-control" type="text" value="<?php echo $field["desc"]; ?>" readonly>
											</div>
											<?php
										}
									}
								}
								?>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-6">
							<div class="input-group input-group-lg input-group-header">
								<span class="input-group-addon"><input id="other-check" class="show-service" name="other-check" type="checkbox" data-target="#other-services" value="1"<?php if ($OTHER_CHECK==1) echo ' checked'; ?>></span>
								<input class="form-control" type="text" value="Other Services" readonly>
							</div>
							<div id="other-services"<?php if ($OTHER_CHECK==1) echo ' style="display:block;"'; ?>>
								<textarea class="form-control" name="OTHER_SERVICES" placeholder="Describe other services needed"><?php echo $OTHER_SERVICES; ?></textarea>
							</div>
						</div>
					</div>
					
					<h3>Detailed Specifications</h3>
					<div class="row">
						<div class="col-xs-12"><textarea class="form-control" name="SPECS" value="<?php echo $SPECS; ?>" placeholder="Detailed Specifications"></textarea></div>
					</div>
					
					<h3>Time Frame</h3>
					<div class="row">
						<div class="col-xs-12"><input class="form-control" name="DEADLINE" type="date" value="<?php echo $DEADLINE; ?>" placeholder="Deadline (MM/DD/YYYY)"></div>
						<div class="col-xs-12"><textarea class="form-control" name="INFO" type="text" value="<?php echo $INFO; ?>" placeholder="Other Info"></textarea></div>
					</div>
					
					<h3>Digital Signature</h3>
					<div class="row">
						<div class="col-sm-8"><input class="form-control" name="SIGNATURE" type="text" placeholder="Digital Signature"></div>
						<div class="col-sm-4"><input class="form-control" name="DATE" placeholder="Date (MM/DD/YYYY)" value="<?php echo date('m/d/Y'); ?>" readonly></div>
					</div>
					
					<div style="padding-top:10px;"><input class="btn btn-primary" name="submit-application" type="submit" value="Submit"></div>
				</form>
			</div>
		</div>
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>
