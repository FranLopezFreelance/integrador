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
});