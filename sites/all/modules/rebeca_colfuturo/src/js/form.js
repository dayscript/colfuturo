
var QueryString = function () {
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = pair[1];
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]], pair[1] ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(pair[1]);
    }
  }
  //console.log(i);
  if(i == 1 ){
     return false;
    }
  else{
      return query_string
      }

} ();



var session = [];

jQuery( document ).ready(function() {
      console.log(QueryString);
      hide_inputs(QueryString);


      jQuery('.more-input').click(function(){
         show_input(jQuery( ".select_filter option:selected").val());
      });
});

function hide_inputs(QueryString){

      jQuery('div#edit-field-editorial-value-wrapper').css({display:'none'});
      jQuery('div#edit-field-autor-value-wrapper').css({display:'none'});
      jQuery('div#edit-field-lugar-de-publicacion-tid-wrapper').css({display:'none'});
      jQuery('div#edit-title-wrapper').css({display:'none'});
      jQuery('div#edit-field-tema-tid-wrapper').css({display:'none'});
      jQuery('div#edit-field-ano-de-publicacion-value-wrapper').css({display:'none'});
      jQuery('div#edit-field-tipo-de-material-tid-1-wrapper').css({display:'none'});
      jQuery('div#edit-field-subtema-tid-1-wrapper').css({display:'none'});

      if(QueryString != false) {
        console.log('entro');
          if(QueryString['field_ano_de_publicacion_value'] !=""  ){
            option = 'div#edit-field-ano-de-publicacion-value-wrapper'
            show_input(option);
          }
          if(QueryString['field_autor_value'] !=""  ){
            option ='div#edit-field-autor-value-wrapper';
            show_input(option);
          }
          if(QueryString['field_editorial_value'] !=""  ){
            option ='div#edit-field-editorial-value-wrapper';
            show_input(option);
          }
          if(QueryString['field_lugar_de_publicacion_tid'] !="All"){
            option ='div#edit-field-lugar-de-publicacion-tid-wrapper';
            show_input(option);
          }
          if(QueryString['field_subtema_tid_1'] !="All"  ){
            option ='div#edit-field-subtema-tid-1-wrapper';
            show_input(option);
          }
          if(QueryString['field_tema_tid'] !="All"){
            option ='div#edit-field-tema-tid-wrapper';
            show_input(option);
          }
          if(QueryString['field_tipo_de_material_tid_1'] !="All"){
            option ='div#edit-field-tipo-de-material-tid-1-wrapper';
            show_input(option);
          }
          if(QueryString['title'] !=""){
            option ='div#edit-title-wrapper';
            show_input(option);
          }

      }
     return true;
}

function show_input(option){
      if (jQuery('#views-exposed-form-biblioteca-rebeca-page .views-exposed-form '+option).length > 1){
         alert('Selecciona otro filtro');
      }else{
           jQuery(option).clone().appendTo('#views-exposed-form-biblioteca-rebeca-page .views-exposed-form').css({display:'block'}).append('<div class="less-input" ></div>');
           session.push(option);
           //alert(session);
           jQuery('.less-input').click(function(){ session.pop(option);
                                                   jQuery(this).parent().remove();
                                                   if(jQuery(option).find('select').length > 0){
                                                      var input = jQuery(option + ' select').val('All');
                                                      //console.log ('select');
                                                    }else{
                                                      var input = jQuery(option + ' input').val('');
                                                      //console.log ('input');
                                                    }
                                                });
           }
}
