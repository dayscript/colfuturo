
(function ($) {
$(document).ready(function(){
    var obj_map;
    var obj_execute = false;
    if( $("#content_simple_gmap").length > 0  ){
       obj_map = add_gmap();
    }
    $(".popup-element-title", "#block-simple-gmap-simple-gmap").click(function(){
        if( !obj_execute ){
            obj_execute = true;
            var center = obj_map.getCenter()
            google.maps.event.trigger(obj_map, 'resize');
            obj_map.setCenter( center );
        }
    });
});

function add_gmap(){
      var myLatlng = new google.maps.LatLng(  $('#content_simple_gmap').attr('lat') , $('#content_simple_gmap').attr('lon') );
      var myOptions = {
          zoom:  parseInt( $('#content_simple_gmap').attr('zoom'), 10),
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map($("#content_simple_gmap").get(0), myOptions);
      var marker = new google.maps.Marker({position: myLatlng,map: map});
      return map;
}


})(jQuery);
