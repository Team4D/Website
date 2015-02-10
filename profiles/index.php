<?php
include_once($_SERVER['DOCUMENT_ROOT']."/php/startup.php");
// LOAD PROFILE INFO
include_once(PHP_DIR."/php/profiles.php");
$MAX_ID = count($PROFILES);
// Get Profile
$ID = $_GET['id'];
// Validate ID
if (!preg_match("#^[1-9]{1}[0-9]*$#",$ID)) $ID = 1;
elseif ($ID < 1 || $ID > $MAX_ID) $ID = 1;

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
		<div class="content-bit Team-Page">
			<div class="row row-odd">
				<h3 class="headname visible-xs"><?php echo $PROFILES[$ID]["name"]; ?>, <em><?php echo $PROFILES[$ID]["position"]; ?></em></h3>
				<div class="col-sm-4 col-md-push-1" style="text-align:center;">
					<img src="/images/profiles/<?php echo $ID; ?>.jpg" alt="<?php echo $PROFILES[$ID]["name"]; ?>" class="row-img">
				</div>
				<div class="col-sm-8 col-md-6 col-md-push-1 left-text">
					<h3 class="headname hidden-xs"><?php echo $PROFILES[$ID]["name"]; ?>, <em><?php echo $PROFILES[$ID]["position"]; ?></em></h3>
					<?php echo $PROFILES[$ID]["bio"]; ?>
				</div>
			</div>
		</div>
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>
