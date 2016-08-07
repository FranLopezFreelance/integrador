$(function(){

	if($('#userId-pusher')){

		$userId = $('#userId-pusher').val();

		console.log($userId );
	
		var pusher = new Pusher('fde4c913418bef9c7a8b');

		var channel = pusher.subscribe('notifications');


		/*window.App = {};

		App.Notifier = function(data){
			this.notify = function(message){
				var template = Handlebars.compile($('#flash-template').html());

				$(template({ message: 'Hello World!' })).appendTo('body').fadeIn(300);
			}	
		};

		App.Listeners = {};*/

		channel.bind('new', function(data){
			
			console.log('Título: ' + data.title + ' / Id de Usuario: ' + data.user_id)

		});

	}


});