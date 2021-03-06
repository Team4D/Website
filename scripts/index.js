$(document).ready(function(){
	$('.carousel').carousel();
	
	$(window).scroll(function (event) {
		var scroll = $(window).scrollTop();
		if ((scroll > 120)&&($('#navigator').hasClass('navbar-static-top'))) { // If we scrolled down far enough
			$('#navigator').removeClass('navbar-static-top');
			$('#navigator').addClass('navbar-fixed-top');
			$('#navigator').css('margin-top', '-120px'); // For some reason margin-top doesn't seem to work with just css
			$('#bodywrapper').css('padding-top', '150px');
		}
		else  if ((scroll < 120)&&($('#navigator').hasClass('navbar-fixed-top'))) { // If we scrolled back up
			$('#navigator').addClass('navbar-static-top');
			$('#navigator').css('margin-top', '0px'); // For some reason margin-top doesn't seem to work with just css
			$('#navigator').removeClass('navbar-fixed-top');
			$('#navigator').css('height', '160px');
			$('#bodywrapper').css('padding-top', '0px');
		}
	});
	
	$('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	})
	
	$("li").click(function() {
		if ($(this).hasClass("dropdown")) {
			return;
		}
		$(this).parent().children("li.active").removeClass("active");
		$(this).addClass("active");
	});
	
	/*
	$("#Home").click(function() {
		$("li").removeClass("active");
		$(".home").addClass("active");
		window.location = $("#Home").attr("href");
		$("#carousel-button-1").click();
	});
	
	$(".home").click(function() {
		$("#carousel-button-1").click();
	});
	
	$(".dropdown-item, .navbar-item").click(function() { // Closes navbar on small screens when navigating to new page
		if ($("#headnavbar").hasClass("in")) {
			$("#xsbutton").click();
		}
	});
	*/
	
	$(".tbox").click(function(){
		var slideID = $(this).attr("id");
		slideID = slideID.slice(-1);
		$("#carousel-button-"+slideID).click();
	});
	
	var xsexpanded = false;
	
	$('#xsbutton').click(function() {
		if ($('#headnavbar').hasClass('in')) {
			$('#xsbutton').css("background-color", "#064660");
			xsexpanded = false;
		}
		else {
			$('#xsbutton').css("background-color", "#7FBEE1;");
			xsexpanded = true;
		}
	});
	
	$('#xsbutton').hover(function() { 
		$('#xsbutton').css("background-color", "#7FBEE1");
	}, function() {
		if (xsexpanded === false) {
			$('#xsbutton').css("background-color", "#064660");
		}
	});
	
	
	$('#carousel-main').on('slid.bs.carousel',function(){
		var slideNum = Number($("#carousel-main .active:first").attr("data-slide-to"))+1;
		$(".tbox").removeClass("active");
		$("#main-text-"+slideNum).addClass("active");
	})
	
	/*
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
	*/
	
	// LoL Helper / Products
	$(".tab-7").click(function(){
		if ($(this).hasClass("active") === false) {
			$(this).parent().children(".tab-7.active").children("img").animate({top:'0px'},100);
			if ($(window).width() > 767) {$(this).parent().children(".tab-7.active").children("div").slideDown(100);}
			$(this).parent().children(".active").removeClass("active");
			$(this).addClass("active");
			$(this).parent().parent().children(".tab-content").children("div").hide();
			$($(this).attr("data-target")).show();
		}
	});
	$(".tab-7").mouseenter(function(){
		if ($(this).hasClass("active") === false) {
			$(this).children("img").animate({top:'10px'},100);
			$(this).children("div").slideUp(100);
		}
	});
	$(".tab-7").mouseleave(function(){
		if ($(this).hasClass("active") === false) {
			$(this).children("img").animate({top:'0px'},100);
			if ($(window).width() > 767) {$(this).children("div").slideDown(100);}
		}
	});
	
	// Request Page
	$(".show-service").click(function(){
		if ($(this).prop("checked") === true) {
			$($(this).attr("data-target")).show();
		}
		else {
			$($(this).attr("data-target")).hide();
		}
	});
	$("#state-dropdown li a").click(function(){
		$("#state-dropdown > button").html( $(this).text() + ' <span class="caret"></span>');
		$("#state-input").val($(this).text());
	});
});