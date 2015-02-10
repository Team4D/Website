<div class="navbar navbar-default navbar-static-top" id='navigator' role="navigation">
	<div id="social-media">
		<a id="Home" href="/"><img src="/images/full_logo.png" style="height:95px;border:0;"></a>
		<a href="http://www.facebook.com/TeamFourthDimension" target="_blank" title="Facebook" class="icon-link"><svg class="icon" viewBox="0 0 56.693 56.693"><use xlink:href="#facebook-icon"></use></svg></a><a href="http://twitter.com/OfficialTeam4D" target="_blank" title="Twitter" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#twitter-icon"></use></svg></a><a href="https://www.linkedin.com/company/team-4th-dimension" target="_blank" title="LinkedIn" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#linkedin-icon"></use></svg></a><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SDVF2B5Q4ALFG" target="_blank" title="Support Us" class="icon-link"><svg class="icon top" viewBox="0 0 56.693 56.693"><use xlink:href="#paypal-icon"></use></svg></a>
	</div>
	<div class="navbarcontainer" style="background-color:transparent;">
		<div id="navbar-logo"><a href="/" class="home"><img src="/images/team4d_font_logo.png"></a></div>
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
				<li class="home navbar-item<?php if ($_SERVER['PHP_SELF']=='/index.php') echo ' active'; ?>"><a class="page-link" href="/index.php">Home</a></li>
				<li class="dropdown<?php if ($_SERVER['PHP_SELF']=='/lolhelper/index.php'||$_SERVER['PHP_SELF']=='/spaceinvaders/index.php') echo ' active'; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects &amp; Fun <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-item<?php if ($_SERVER['PHP_SELF']=='/lolhelper/index.php') echo ' active'; ?>"><a class="page-link" href="/lolhelper">LoL Helper</a></li>
						<li class="dropdown-item<?php if ($_SERVER['PHP_SELF']=='/spaceinvaders/index.php') echo ' active'; ?>"><a class="page-link" href="/spaceinvaders">Space Invaders</a></li>
					</ul>
				</li>
				<li class="dropdown<?php if ($_SERVER['PHP_SELF']=='/products/index.php'||$_SERVER['PHP_SELF']=='/request/index.php') echo ' active'; ?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-item<?php if ($_SERVER['PHP_SELF']=='/products/index.php') echo ' active'; ?>"><a class="page-link" href="/products">What We Offer</a></li>
						<li class="dropdown-item<?php if ($_SERVER['PHP_SELF']=='/request/index.php') echo ' active'; ?>"><a class="page-link" href="/request">Request Services</a></li>
					</ul>
				</li>
				<li class="navbar-item<?php if ($_SERVER['PHP_SELF']=='/about/index.php') echo ' active'; ?>"><a class="page-link" href="/about">About</a></li>
				<li class="navbar-item<?php if ($_SERVER['PHP_SELF']=='/thanks/index.php') echo ' active'; ?>"><a class="page-link" href="/thanks">Thanks</a></li>
			</ul>
		</div>
	</div>
</div>