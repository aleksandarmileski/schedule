$('.message a').click(function(){
	$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$('.adminclose').click(function(){
	var id=$(this).attr('id');

	console.log('deleting post with id: '+id);

	$.post('admincalendar.php',{postid: id}, function(){
		console.log('post deleted');
		window.location.href = window.location.href;
	});
});

$('.userclose').click(function(){
	var id=$(this).attr('id');

	console.log('deleting post with id: '+id);

	$.post('calendar.php',{postid: id}, function(){
		console.log('post deleted');
		window.location.href = window.location.href;
	});
});