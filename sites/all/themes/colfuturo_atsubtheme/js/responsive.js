(function($){


$(document).ready(function(){

  resize();
  $('.view-destacados-home-gris').each(function(){
    $(this).find('.views-row').height('35px');
    $(this).find('.views-row-2').addClass('contrac');
    $(this).find('.views-row-3').addClass('contrac');
    $(this).find('.views-row.views-row-first').height('166px');
    $(this).find('.views-row').bind('click', function(){
      $('.view-destacados-home-gris').find('.views-row').each(function(){
        $(this).height('35px');
        $(this).addClass('contrac');
      });
      console.log(this);
      $(this).height('166px');
      $(this).removeClass('contrac');

    });
  });

  jQuery('#cnt_equipo_trabajo_pcb .cnt_titulo').click(function(){
    jQuery('.persona').toggle();
  });

  jQuery('#cnt_telefonos_pcb .cnt_titulo').click(function(){
    jQuery('.cnt_pais').toggle();
  });
});






$(window).resize(function(){
  resize();
});

  function resize(){
    var check = $('body').innerWidth();
      if(check <= 800){
        jQuery('.persona').toggle();
        jQuery('.cnt_pais').toggle();
      }
  }

})(jQuery);
