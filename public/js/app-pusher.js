$(function(){

	if($('#idUserLogedIn')){

		var pusher = new Pusher('fde4c913418bef9c7a8b');

		var id = $('#idUserLogedIn').html();

		var channel = pusher.subscribe(id);

		channel.bind('App\\Events\\NotificationEvent', function(data){

			var q = 1;

			var notification = "<a href='/notifications/1'><div class='alert alert-warning notification' role='alert'><b>" + data.msg.text + "</b></div></a>";

			$('#divNotifications').prepend(notification);

			$('#barNotifications').text(q);

			snd.play();

			window.setTimeout(function () {
			    $(".notification").fadeOut();
			}, 5000);

		});
	}

});