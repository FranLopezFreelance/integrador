
$(document).ready(function(){

	 $('.show-image-change').on('click',function(e){
      e.preventDefault();

     console.log('hola');

 	});

  $.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/data",
        success: function(response){
          $('#view').html(response);
        }
      });

  $('#data').on('click', function(e){
  	e.preventDefault();
  	$.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/data",
        success: function(response){
          $('#view').html(response);
        }
      });
  });

  $('#products').on('click', function(e){
  	e.preventDefault();
  	$.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/products",
        success: function(response){
          $('#view').html(response);
        }
      });
  });

  $('#sales').on('click', function(e){
  	e.preventDefault();
  	$.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/sales",
        success: function(response){
          $('#view').html(response);
        }
      });
  });

  $('#purchases').on('click', function(e){
  	e.preventDefault();
  	$.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/purchases",
        success: function(response){
          $('#view').html(response);
        }
      });
  });

  $('#notifications').on('click', function(e){
  	e.preventDefault();
  	$.ajax({
        type: "GET",
        dataType: "html", 
        url: "/users/profile/notifications",
        success: function(response){
          $('#view').html(response);
        }
      });
  });

});
