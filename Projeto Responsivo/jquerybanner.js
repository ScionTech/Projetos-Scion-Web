// JavaScript Document
$("#slideshow > div:gt(0)").hide();

setInterval(function(){
	$('#slideshow > div:first')
	.fadeOut(1000)
	.next()
	.fadeIn(1000)
	.end()
	.apendTo('#slideshow');
}, 3000);