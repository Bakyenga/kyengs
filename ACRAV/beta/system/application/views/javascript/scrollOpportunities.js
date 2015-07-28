// JavaScript Document
$(document).ready(function(){
	
	var first = 0;
	var speed = 700;
	var pause = 3500;
	
		function removeFirst(){
			first = $('ul#opportunities li:first').html();
			$('ul#opportunities li:first')
			.animate({opacity: 0}, speed)
			.fadeOut('slow', function() {$(this).remove();});
			addLast(first);
		}
		
		function addLast(first){
			last = '<li style="display:none">'+first+'</li>';
			$('ul#opportunities').append(last)
			$('ul#opportunities li:last')
			.animate({opacity: 1}, speed)
			.fadeIn('slow')
		}
	
	interval = setInterval(removeFirst, pause);
});