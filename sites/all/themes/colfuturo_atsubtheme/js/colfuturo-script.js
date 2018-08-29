var cantLlamadas = 0;
var rutaServidorIframe = 'https://jboss2.colfuturo.org';

(function ($) {
    var is_om_menu_active = false;
    var sensor_play_video_ban = false;
    var sensor_play_video_id = false;


    $(document).ready(function(){
      /**Permite mostar el popup*/
        if(window.location.pathname == '/nueva-herramienta'){
          //jQuery('.colorbox-load').click();

          jQuery('#cboxClose').click(function(){
            window.location.href = "/user_iframe";
          });
          //setTimeout(function(){ window.location.href = "/user_iframe"; }, 3000);
        }
        /* actualiza el bloque de nofiticaciones*/
          var data =  jQuery.getJSON( "/get_notifications", function( data ) {
                      var items = JSON.parse(data.q);
                      console.log(items);
                      if (items.length >= 1 ){
                        jQuery('.msj').click(function(e){
                          var html = "";
                          console.log('ok');
                          jQuery('.list-notification').html('');
                          //jQuery('.list-notification').addClass('box-notification');
                          jQuery('.box-notification').toggle('slow');
                          for(var i = 0 ; i < items.length ; i ++){
                            //console.log(i);
                            jQuery('.list-notification').append('<div class="old-event"><div class="event-name">'+convertir(items[i]['nombreEvento'])+'</div><div class="event-url"><a href="'+items[i]['urlEvento']+'">Ir a evento</div></div>');
                            //if(items[i]['visto'] == false){
                              //jQuery('.list-notification').append('<div class="new-event"><div class="event-name">'+convertir(items[i]['nombreEvento'])+'</div><div class="event-url"><a href="'+items[i]['urlEvento']+'">Ir a evento</div></div>');
                          }
                          var mark = jQuery.getJSON( "/marcar_notifications", function( data ){
                            jQuery('.notificacion').html('0');
                          });
                        });
                        var cantidadNotificacionesVistas = 0;
                        for(var i = 0 ; i < items.length ; i ++){
                          if(!items[i]['visto']){
                            cantidadNotificacionesVistas++;
                          }
                        }
                        console.log(cantidadNotificacionesVistas);
                        if (cantidadNotificacionesVistas > 0) {
                          jQuery('.notificacion').html(cantidadNotificacionesVistas);
                          jQuery('.notificacion').css("display","inline-block");
                        } else {
                          jQuery('.notificacion').css("display","none");
                        }
                      }
                    });
      /* actualiza el bloque de nofiticaciones*/

      // Es necesario para que el IFrame pueda comunicarse con el portal
        window.addEventListener("message", function(event) {
          if (event.origin !== "http://jboss2.colfuturo.org") {
        // Este mensaje es temporal, por pruebas
            //alert("origen bloqueado [" + event.origin + "]");
            return;
          }
          actualizarPorcentaje();
        });
          ///actualizarPorcentaje();
          validacionRegistroExitoso();

          jQuery('#block-potentials-user-register iframe').mouseover(function(){
             jQuery('.status').css('display','none');
          });

          //jQuery('.link_login_edit').attr('href','/user_iframe');



          $('#edit-submitted-igual-que-direccion-de-residencia-1').click(function() {
            if (this.checked) {
              $("#webform-component-grupo-residencia").hide();
            } else {
              $("#webform-component-grupo-residencia").show();
            }
          });
           $(".form-item-field-idiomas-de-inter-s-und").hide();
          $('#edit-field-interes-und-programa-de-idiomas').click(function() {
            if (this.checked) {
              $(".form-item-field-idiomas-de-inter-s-und").show();
            } else {
              $(".form-item-field-idiomas-de-inter-s-und").hide();
            }
          });
          /*ajustar titulo*/
          if (jQuery('h1#page-title').html() == 'Registrarme'){
              jQuery('h1#page-title').html('Registro');
              jQuery('#user-register-form .form-submit').val("Registro");
              jQuery('.username').attr('maxlength','12');
          }



          // /* VAlidacion Formulario*/
          // var ids=[];
          // var idsi=[];
          // var idsval = [];
          // var idsval2 = [];
          // var validacion = true;
          // var alertasFormVal = {

          //   '#edit-field-nombres-und-0-value' : function(){
          //       alert('Debe escribir un nombre valido');
          //       jQuery('#edit-field-nombres-und-0-value').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //     },
          //   '#edit-field-apellidos-und-0-value' : function(){
          //       alert('Debe escribir un apellido valido');
          //       jQuery('#edit-field-apellidos-und-0-value').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },
          //   '.username' : function(){
          //       alert('Debe escribir una cedula valida ');
          //       jQuery('.username').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },
          //   '#edit-field-genero-und-masculino' : function(){
          //       alert('Debe escribir un ');
          //       jQuery('#edit-field-genero-und-masculino').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },
          //   '.form-item-mail input' : function(){
          //       alert('Debe seleccionar un email valido ');
          //       jQuery('.form-item-mail input').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },

          //   '#edit-field-genero-und-masculino' : function (){
          //     alert('Debe seleccionar un genero');
          //       jQuery('#edit-field-genero-und-masculino').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },
          //   '#edit-field-autorizacion-und' : function (){
          //     alert('Para continuar debe autorizar el tratamiendo de datos personales');
          //       jQuery('#edit-field-autorizacion-und').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   },
          //   '#default' : function(){
          //       alert('ha ocurrido algun error');
          //       jQuery('#default').css('background','rgba(255, 0, 0, 0.15)');
          //       validacion = false;
          //   }
          // }

          // if(jQuery('#user-register-form').length != 0){
          //   $('.form-submit').click(function(){
          //     if($('#edit-field-interes-und-estudios-de-posgrado-en-el-exterior').is(':checked') || $('#edit-field-interes-und-programa-de-idiomas').is(':checked')){
          //         $('#edit-field-rea-de-inter-und input').each(function(index){
          //         ids[index] = $(this).attr('id')
          //         });
          //         $('#edit-field-idiomas-de-inter-s-und input').each(function(index){
          //         idsi[index] = $(this).attr('id')
          //         });
          //         for( var i = 0; i < ids.length; i++ ){
          //           if($('#'+ids[i]).is(':checked')){
          //             var retorna = true;
          //           }
          //         }
          //         for( var i = 0; i < ids.length; i++ ){
          //           if($('#'+idsi[i]).is(':checked')){
          //             var retorna2 = true;
          //           }
          //         }
          //         if(!retorna && retorna != true && $('#edit-field-interes-und-estudios-de-posgrado-en-el-exterior').is(':checked') ){
          //             alert('Se debe seleccionar almenos un area de estudio');
          //             return false;
          //           }
          //         if(!retorna2 && retorna2 != true && $('#edit-field-interes-und-programa-de-idiomas').is(':checked')){
          //             alert('Se debe seleccionar almenos un idioma de interes');
          //             return false;
          //           }
          //     }
          //   jQuery('#edit-field-nombres-und-0-value').val() == "" ||  jQuery('#edit-field-nombres-und-0-value').val() ==" " ? alertasFormVal['#edit-field-nombres-und-0-value']() : true;
          //   jQuery('#edit-field-apellidos-und-0-value').val() == "" ||  jQuery('#edit-field-apellidos-und-0-value').val() ==" " ?  alertasFormVal['#edit-field-apellidos-und-0-value']() : true;
          //   //jQuery('.username').val() == "" ||  jQuery('.username').val() ==" " || !/^([0-9])*$/.test(jQuery('.username').val()) ? alertasFormVal['.username']() : true;
          //   jQuery('#edit-field-genero-und-masculino').is(':checked') ||  jQuery('#edit-field-genero-und-femenino').is(':checked') ? true : alertasFormVal['#edit-field-genero-und-masculino']();
          //   jQuery('.form-item-mail input').val() == "" ||  jQuery('.form-item-mail input').val() ==" " || !/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(jQuery('.form-item-mail input').val()) ? alertasFormVal['.form-item-mail input']() : true;
          //   jQuery('#edit-field-autorizacion-und').is(':checked') ||  jQuery('#edit-field-autorizacion-und').is(':checked') ? true : alertasFormVal['#edit-field-autorizacion-und']();
          //   if(validacion == true){
          //     return true;
          //   }
          // return false;
          // });

          //   /*Restaurar elementos areas de estudio y idomas de interes*/

          //   $( "#edit-field-interes-und-estudios-de-posgrado-en-el-exterior" ).change(function() {
          //     if( !$('#edit-field-interes-und-estudios-de-posgrado-en-el-exterior').is(':checked') ){
          //         $('#edit-field-rea-de-inter-und input').each(function(index){
          //         idsval[index] = $(this).attr('id')
          //         });
          //         for( var i = 0; i < idsval.length; i++ ){
          //           $('#'+idsval[i]).removeAttr( "checked");
          //         }
          //     }
          //   });
          //    $( "#edit-field-interes-und-programa-de-idiomas" ).change(function() {
          //     if( !$('#edit-field-interes-und-programa-de-idiomas').is(':checked') ){
          //         $('#edit-field-idiomas-de-inter-s-und input').each(function(index){
          //         idsval2[index] = $(this).attr('id')
          //         });
          //         for( var i = 0; i < idsval2.length; i++ ){
          //           $('#'+idsval2[i]).removeAttr( "checked");
          //         }
          //     }
          //   });
          //   /*Restaurar elementos areas de estudio y idomas de interes fin*/
          // }
          // /*Validacion Formulario fin*/


          $(".form-item-field--rea-de-inter-und").hide();
          $('#edit-field-interes-und-estudios-de-posgrado-en-el-exterior').click(function() {
            if (this.checked) {
              $(".form-item-field--rea-de-inter-und").show();
            } else {
              $(".form-item-field--rea-de-inter-und").hide();
            }
          });

          if( $("#user-register-form").length > 0 ){
            $('#edit-name', $("#user-register-form") ).attr('pattern','[0-9]+');
            $('#edit-name', $("#user-register-form") ).attr('title','Ingrese solo números');
          }

          if( $("#block-menu-block-12").length > 0 ){
              $(".block-title", "#block-menu-block-12").removeClass("element-invisible");
          }

           if( $(".admin-vertical").length < 1 ){
               $("#colciencias").mouseover(function(){ $("#colciencias_wrapper").addClass("colciencias_wrapper_active"); });
               $("#colciencias_wrapper").mouseout(function(){ $("#colciencias_wrapper").removeClass("colciencias_wrapper_active"); });
           }


           $(".btn-articulo-detalle-agregue-a-sus-favoritos").click( function(e){
                e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
                var bookmarkUrl = window.location.href;
                var bookmarkTitle = $("h1#page-title").text();
                if (navigator.userAgent.toLowerCase().indexOf('chrome') > -1) {
                        alert("Esta funci\xf3n no est\xe1 disponible en Google Chrome. Haga clic en el s\xedmbolo de la estrella al final de la barra de direcci\xf3n o pulse Ctrl-D (Command + D en Mac) para crear un marcador.");
                }else if (window.sidebar) { // For Mozilla Firefox Bookmark
                    window.sidebar.addPanel(bookmarkTitle, bookmarkUrl,"");
                } else if( window.external || document.all) { // For IE Favorite
                    window.external.AddFavorite( bookmarkUrl, bookmarkTitle);
                } else { // for other browsers which does not support
                     alert('Your browser does not support this bookmark action');
                     return false;
                }

           } );

           //acordeon
           if( $(".day-accordion").length ){
               show_accordion();
           }

           //menu om
           om_menu_hide_submenu();
           $(".om-maximenu", "#menu-bar").mouseover(function(){
                is_om_menu_active = true;
                //om_menu_show_submenu( );
           });
           $(".om-maximenu", "#menu-bar").mouseout(function(){
                is_om_menu_active = false;
                setTimeout( om_menu_hide_submenu, 700 );
           });
           $('.om-maximenu-tabbed-content').mouseover(function(){
              is_om_menu_active = true;
           });
           $('.om-maximenu-tabbed-content').mouseout(function(){
              is_om_menu_active = false;
              setTimeout( om_menu_hide_submenu, 700 );
           });

           if( $("#om-leaf-main-menu-imported-1402").length ){
               $("#om-leaf-main-menu-imported-485").hide();
           }
           if( $("#om-leaf-main-menu-imported-1403").length ){
               $("#om-leaf-main-menu-imported-485").hide();
               $("#om-leaf-main-menu-imported-1402").hide();
           }

           //Path Fecha BLoque Calendario Home
           if( $('.field-name-field-fecha2', '.view-destacados-eventos-home').length ){
               $.each($('.field-name-field-fecha2', '.view-destacados-eventos-home'), function(){
                    $('.date-display-single',$(this)).html(
                        $('.date-display-single',$(this)).html().replace("hasta", "-").replace('De', '')
                    );
               });
           }


        /***********************************Simulador de credito*****************************************/
            $( "#enviar" ).trigger( "click" );
            $('#cargar_cedula').click(function(){
            var cedula = $('#cedula_simulador').val();
            $.ajax({
                    url: 'https://www.colfuturo.org/simulador_credito/'+cedula,
                    type: 'GET',
                    success: function (e) {
                      //console.log(e);
                      console.log('Bienn!!!!');
                     $('.response').html(e);
                     $('#cargar_cedula').css('display','none');
                     $('#cedula_simulador').css('display','none');
                     $( "#enviar" ).trigger( "click" );
                    },
                    error: function(xhr){
                      console.log(xhr);
                    }
                });

            });
        /***********************************Simulador de credito*****************************************/

        /*--------------POP UP REDIMENSIONABLE------------*/

        jQuery("a.colorbox-load.init-colorbox-load-processed.cboxElement").click(function(){
          cantLlamadas = 0;
          setTimeout("comunicarIframe()", 100);
        });

        window.addEventListener('message', function(event) {
          if (~event.origin.indexOf(rutaServidorIframe)) {
            console.log("Padre: event.data:" + event.data);
            cambiarTamanioDialogo(event.data);
          } else {
            console.log("Padre: origen" + event.origin);
            console.log("Padre: data" + event.data);
            return;
          }
        });
        /*--------------POP UP REDIMENSIONABLE------------*/
        });

    //Funciones del menu
    function om_menu_hide_submenu(){
        if( !is_om_menu_active ){
             $('li','#om-menu-main-menu').removeClass('active');
             $('.om-tabbed-content').addClass('om-tabbed-content-hide');
        }
    }

    //Funciones de acordeones
    function show_accordion(){
        var contador = 0;
        $.each( $(".day-accordion") , function(){
             $(this).attr('id', 'day-accordion-'+ contador);
             $.each( $("span.title",$(this)), function(){
                 $(this).replaceWith("<h3 class='title' value=''>"+ $(this).html() +"</h3>");
             });
             $.each( $("span.content",$(this)), function(){
                 $(this).replaceWith("<div class='content'>"+ $(this).html() +"</div>");
             });
             $("#day-accordion-"+contador).accordion({ collapsible: true, active: false, autoHeight: false });
             contador++;
        });
    }





})(jQuery);

function onYouTubePlayerReady( idplayer ) {
    ytplayer = document.getElementById( "my"+idplayer );
    ytplayer.addEventListener("onStateChange", "onytplayerStateChange");
}
function onytplayerStateChange( newState ){
    if( newState == 1 ){
        jQuery(".views-slideshow-cycle-main-frame-row", "#views_slideshow_cycle_main_slide_principal-block").click();
    }
}

function bookmark()
{
    e.preventDefault(); // this will prevent the anchor tag from going the user off to the link
    var bookmarkUrl = this.href;
    var bookmarkTitle = this.title;
}

function validacionRegistroExitoso() {
  if (window.location == "http://www.colfuturo.org/registro-exitoso") {
      actualizarPorcentaje();
  }
}

function actualizarPorcentaje() {
  var url = "http://www.colfuturo.org/consultar_porcentaje"
  jQuery.ajax({
    //dataType: "json",
    url: url,
    success: function(data, status){
    var porcentaje = jQuery(data).find("#content-wrapper div:last").html()
    porcentaje = jQuery.trim(porcentaje);
    //console.log(porcentaje);
    // TEMPORAL, SOLO PARA VALIDAR EL CAMNIO
    //porcentaje = parseInt(porcentaje) + 10;
    //console.log(porcentaje);
    jQuery(".prog .progress .progress-bar").css("width",porcentaje + "%")
    jQuery(".prog .porcentajeProgress").html(porcentaje + "%")

    },
    error: function(request, status, error) {
      //console.log("request:" + request);
      //console.log("status:" + status);
      //console.log("error:" + error);
    }
  });
}

function convertir(str) {
  try {
    var r = /\\u([\d\w]{4})/gi;
    var nuevoStr = str.replace(r, function (match, grp) {
      return String.fromCharCode(parseInt(grp, 16)); } );
    return unescape(nuevoStr);
  } catch(ex) {
    console.log(ex)
  }
  return str;
}

function comunicarIframe() {
  if (cantLlamadas < 0) {
    return;
  }
  if (jQuery('#IframeCIta').length == 0) {
    if (cantLlamadas >= 100) {
    // Si ya pasaron 100 llamados, 10 segundos, no se logro cargar el iframe
    return;
    }
  cantLlamadas++;
  setTimeout("comunicarIframe()", 100);
  }
  jQuery('#IframeCIta').load(function(){
    console.log("cargo");
    document.getElementById('IframeCIta').contentWindow.postMessage("www.colfuturo.org", '*');
  });
}

function cambiarTamanioDialogo(tipoFormulario) {
  var alto = 377;
  switch(parseFloat(tipoFormulario)) {
    case 3: // INFO_ACADEMICA
    alto = 300;
    break;
    case 4: // INFO_IDIOMA
    alto = 180;
    break;
    case 41: // INFO_IDIOMA
    alto = 360;
    break;
    case 42: // INFO_IDIOMA
    alto = 410;
    break;
    case 5: // INFO_PROYECTO_ESTUDIO
    alto = 390;
    break;
    case 6: // INFO_PROYECTO_IDIOMA
    alto = 260;
    break;
  }
  jQuery("#cboxContent").height("");
  jQuery("#cboxContent").attr('style', jQuery("#cboxContent").attr('style') + 'height: ' + alto + 'px !important');
  jQuery("#IframeCIta").css("height", (alto - 40));
}
