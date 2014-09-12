$(document).ready(function(){
	$("li").click(function() {
		if ($(this).hasClass("dropdown-toggle")) {
			return;
		}
		$("li").removeClass("active");
		$(this).addClass("active");
	});
	
	$("#Home").click(function() {
		$("li").removeClass("active");
		$(".home").addClass("active");
		window.location = $("#Home").attr("href");
	});
	
	$(".dropdown-item").click(function() { // Closes navbar on small screens when navigating to new page
		$("#xsbutton").click();
	});
	
	// Open up the home page
	$(".home").addClass("active"); 
	window.location = $("#Home").attr("href");
});