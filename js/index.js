$( document ).ready(function() {
	
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
			var taskpriority=$(this).attr('tpr');
			return '<div ><h3 class="bg-'+taskpriority+' text-center">'+taskname+'</h3></div>';
		},
		content:function(){
			var taskday=$(this).attr('tday');
			var taskhour=$(this).attr('thour');
			var taskpriority=$(this).attr('tpr');
			var taskowner=$(this).attr('tuid');

			return " Task Owner: "+taskowner+"<br>"+
				"Task Day: " +taskday+"<br>"+
				" Task Hour: "+taskhour+"<br>"+
				" Task Priority: "+taskpriority;

			// return "<form action='calendar.php' method='post' >" +
			// 	"<select class='updatef' name='popover-days' >" +
			// 		"<option value='1' selected>Monday</option>"+
			// 		"<option value='2' <?php echo ("+taskday+"=='2') ? 'selected' : ''; ?>>Tuesday</option>"+
			// 		"<option value='3' <?php echo ("+taskday+"=='3') ? 'selected' : ''; ?>>Wednesday</option>"+
			// 		"<option value='4' <?php echo ("+taskday+"=='4') ? 'selected' : ''; ?>>Thursday</option>"+
			// 		"<option value='5' <?php echo ("+taskday+"=='5') ? 'selected' : ''; ?>>Friday</option>"+
			// 	"</select>"+
			// 	"<button class='bg-info' name='popoversetbutton'>Update</button>" +
			// 	"<button class='bg-danger' name='popoversetbutton'>Delete</button>" +
			// 	"</form>";
			
		}
	});

	$('a[title]').tooltip();
	
	
});

