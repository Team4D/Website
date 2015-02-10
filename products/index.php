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
		<div id="Products-Page" class="content-bit Products-and-Services">
			<div class="row" style="margin:15px 0px;">
				<div class="col-sm-6 col-sm-push-6">
					<h1>Contact</h1>
					<p>Email: <a href="mailto:contact@team4d.org">contact@team4d.org</a><br>
					Phone: (785) 218-0190</p>
					<p>To request our services, please fill out a requisition form:<br>
					<a href="/request">Online Form</a><br>
					<a href="/request-services.pdf" target="_blank">PDF</a></p>
				</div>
				<div class="col-sm-6 col-sm-pull-6">
					<h1>Our Mission</h1>
					<p>Team 4th Dimension is a company founded by those who want a better product. When we set out to create a product, we look to make something that we would want to use in our daily lives. We do not settle for any less. </p>
				</div>
			</div>
			<div class="row" style="border-top:10px solid #505050;">
				<div class="tab-7 active" data-target="#holder1"><img src="/images/webdesign.jpg" class="tab-img"><div>Web Development</div></div>
				<div class="tab-7" data-target="#holder2"><img src="/images/mobiledesign.jpg" class="tab-img"><div>Mobile Applications</div></div>
				<div class="tab-7" data-target="#holder3"><img src="/images/ITSolutions.jpg" class="tab-img"><div>IT Solutions</div></div>
				<div class="tab-7" data-target="#holder4"><img src="/images/leaders.jpg" class="tab-img"><div>Consulting</div></div>
			</div>
			<div class="row tab-content">
				<div id="holder1" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1" style="display:block;">
					<h2>Web Development</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Web Design</li>
						<li>Logo Design</li>
						<li>Social Media creation and upkeep</li>
						<li>Web hosting and upkeep</li>
					</ul>
				</div>
				<div id="holder2" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Mobile Applications</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Mobile Design</li>
						<li>Logo Design</li>
						<li>Social Media creation and upkeep</li>
						<li>Database creation and maintenance</li>
					</ul>
				</div>
				<div id="holder3" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>IT Solutions</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Application Solutions</li>
						<li>Small business network design and implementation</li>
						<li>Technology repair</li>
					</ul>
				</div>
				<div id="holder4" class="col-lg-8 col-lg-push-2 col-md-10 col-md-push-1">
					<h2>Consulting</h2>
					<h5 style="text-align:left;color:#000;">Services:</h5>
					<ul>
						<li>Face to Face meetings in person or on Skype</li>
						<li>Discussions to find out exactly what you are looking for</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- InstanceEndEditable -->
		<?php include_once(PHP_DIR."/php/page_footer.php"); ?>
	</div>
</body>
<!-- InstanceEnd --></html>