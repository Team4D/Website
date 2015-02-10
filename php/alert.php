<?php
if (isset($SUCCESS)) { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<?php foreach ($SUCCESS as $value) echo $value."<br>"; ?>
	  </div>
	<?php
}
if (isset($ERROR)) { ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<?php foreach ($ERROR as $value) echo $value."<br>"; ?>
	  </div>
	<?php
}
?>