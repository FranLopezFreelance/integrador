//CONTROLAR BARRA DE FILTROS
$(document).ready(function(){
   $('.shop-filter .open').on('click',function(){
     if($(this).next().is(':visible')){
       $(this).next().slideUp();
     }
     if($(this).next().is(':hidden')){
       $('.shop-filter .open').next().slideUp();
       $(this).next().slideDown();
    }
  });

   //Cambiar boton de Seguir/Dejar de Seguir
  $(".unFollowButton").click(function() { 
    $(this).next().show();
    $(this).hide();
  });

  $(".followButton").click(function() {  
    $(this).prev().show();
    $(this).hide();
  });
});

if($("div.alert")){
	window.setTimeout(function () {
	    $("div.alert").fadeOut();
	}, 2500);
}

  //Funciones de Seguir/Dejar de seguir

  function follow( id) {
      $.ajax({
        type: "GET",
        dataType: "json", 
        url: "/users/follow/" + id,
        success: function(data){
          $('.followers_' + id).text(data.followers);
        }
      });
  }
    
  function unfollow( id) {
      $.ajax({
        type: "GET",
        dataType: "json", 
        url: "/users/unfollow/" + id,
        success: function(data){
          $('.followers_' + id).text(data.followers);
        }
      });
      
  }

