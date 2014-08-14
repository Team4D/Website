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
	
	$("#Home").click();
});