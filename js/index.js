$( document ).ready(function() {
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

	$('.delUser').click(function(){
		var id=$(this).attr('id');

		console.log('deleting user with id: '+id);

		$.post('admincalendar.php',{deletedUser: id}, function(){
			console.log('user deleted');
			window.location.href = window.location.href;
		});
	});

	$("[data-toggle=popover]").popover({
		html: true,
		title:function(){
			var taskname=$(this).attr('tnm');
			var taskpriority=$(this).attr('tpr'); var priority;
			return '<div ><h3 class="bg-'+taskpriority+'">'+taskname+'</h3></div>';
		},
		content:function(){
			return "<form action='calendar.php' method='post' ><button class='bg-info' name='popoversetbutton'>Update</button><button class='bg-danger' name='popoversetbutton'>Delete</button></form>";
		}
	});
	
});

