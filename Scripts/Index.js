$(document).ready(function(){
	$('.carousel').carousel();
	
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})
	
	$("li").click(function() {
		if ($(this).hasClass("dropdown")) {
			return;
		}
		$("li").removeClass("active");
		$(this).addClass("active");
	});
	
	$("#Home").click(function() {
		$("li").removeClass("active");
		$(".home").addClass("active");
		window.location = $("#Home").attr("href");
		$("#carousel-button-1").click();
	});
	
	$(".home").click(function() {
		$("#carousel-button-1").click();
	});
	
	$(".dropdown-item").click(function() { // Closes navbar on small screens when navigating to new page
		if ($("#headnavbar").hasClass("in")) {
			$("#xsbutton").click();
		}
	});
	
	$(".tbox").click(function(){
		var slideID = $(this).attr("id");
		slideID = slideID.slice(-1);
		$("#carousel-button-"+slideID).click();
	});
	
	
	$('#carousel-main').on('slid.bs.carousel',function(){
		var slideNum = Number($("#carousel-main .active:first").attr("data-slide-to"))+1;
		$(".tbox").removeClass("active");
		$("#main-text-"+slideNum).addClass("active");
		$("#carousel-button-"+x).click();
	})
	
	var openPage = false;
	var urlstring = document.URL;
	var urllength = urlstring.length;
	if (urlstring.substring(urllength-5, urllength) == "-Page") {
		openPage = true;
		$("#carousel-button-1").click();
	}
	if (urlstring.substring(urllength-9, urllength) == "Home-Page") {
		$(".home").addClass("active");
	}
	// Open up the home page
	if (openPage === false) {
		window.location = $("#Home").attr("href");
		$("#carousel-button-1").click();
		$(".home").addClass("active"); 
	}
	
	$(".home").click(function() {
		$(".home").addClass("active"); 
	});
	
	$("#Home").click(function() {
		$(".home").addClass("active"); 
	});
});