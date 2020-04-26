/*!
	* Start Bootstrap - SB Admin v6.0.0 (https://startbootstrap.com/templates/sb-admin)
	* Copyright 2013-2020 Start Bootstrap
	* Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
	*/
	(function($) {
	"use strict";

	// Add active state to sidbar nav links
	var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
		$("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
			if (this.href === path) {
				$(this).addClass("active");
			}
		});

	// Toggle the side navigation
	$("#sidebarToggle").on("click", function(e) {
		e.preventDefault();
		$("body").toggleClass("sb-sidenav-toggled");
	});
})(jQuery);


function display_c()
{
	var refresh = 1000; // Refresh rate in milli seconds
	mytime=setTimeout('display_ct()', refresh)
}

function display_ct() 
{
	var d = new Date();
	var minutes;
	var seconds;
	MyDateString = ('0' + d.getDate()).slice(-2) + '/'
			 + ('0' + (d.getMonth()+1)).slice(-2) + '/'
			 + d.getFullYear();
	if (parseInt(d.getMinutes()) < 10) {minutes = "0" + d.getMinutes();} else minutes = d.getMinutes();
	if (parseInt(d.getSeconds()) < 10) {seconds = "0" + d.getSeconds();} else seconds = d.getSeconds();
	
	var MyTimeString = d.getHours() + ":" + minutes + ":" + seconds;
	document.getElementById('ct').innerHTML = MyTimeString + " - " + MyDateString;
	display_c();
}

// Load datatables
$(document).ready(function() {
  $('#dataTable').DataTable();
});
