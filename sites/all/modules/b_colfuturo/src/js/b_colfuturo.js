(function($) {
    Drupal.behaviors.colfuturo = {
        attach: function(context, settings){
        	$('.button-submit').html('');
	        $('.button-submit').html('<input type="button" id="edit-submit"  value="BUSCAR" class="form-submit">');
	        var data = $.get('http://www.colfuturo.org/sites/all/modules/b_colfuturo/content.json',	function(result){
							    data = jQuery.parseJSON(result);
							    console.log(data['nodes']);
							    tableContruct(data['nodes']);
							    var indexData = {'autores':'#autores','fecha_publicacion':'#fecha_publicacion','tipo_de_estudio':'#tipo_de_estudio','beneficiario_estudio':'#beneficiario_estudio'}
								for (var index in indexData){
								  contructOptionsInput(data['nodes'],index,indexData[index]);
								}
								return data;
							});

			var itemsBusqueda = {}

			/*$('.advance-search').toggle();

			/*$('#basic-search').click(function(){
					$('#gsearch').slideToggle()
					$('.advance-search').slideToggle()
			});

			$('.select-advance').click(function(){
					$('#gsearch').slideToggle()
					$('.advance-search').slideToggle()
			});*/
			
			jQuery('#createformsearch select').each(function(index){
	        	var count = 0
				$(this).change(function (){
					$('#gsearch').val('');
					var item = $(this).val()
					if( $('.items-busqueda').find( '#'+$(this).attr('id') ).length <= 0 ) {
						$('.items-busqueda').append('<div style="color:#fff; background:'+getRandomColor()+'" id="'+ $(this).attr('id') +'" value="'+item+'" class="itemSearch">'+item+'<span class="remove-item" id="'+index+'-'+ count+'" onclick="jQuery(this).parent().remove() ")">x</span></div>')
					}
					else{
						$('.items-busqueda div#'+$(this).attr('id') ).remove()
						$('.items-busqueda').append('<div style=" color:#fff; background:'+getRandomColor()+'" id="'+ $(this).attr('id') +'" value="'+item+'" class="itemSearch">'+item+'<span class="remove-item" id="'+index+'-'+ count+'" onclick="jQuery(this).parent().remove() ")">x</span></div>')
					}
					count += 1
				});
			});

			$('.button-submit').click(function(){
					jQuery('#load').animate( { opacity: 0 }, 100,function(){ 
	        			$('#load').html('BUSCANDO...');
						jQuery('#load').animate( { opacity: 0.9 }, 500);
					});
					var gsearch = $('#gsearch').val();
					if($('#gsearch').val().length > 0 ){
						jQuery('#respuesta').animate( { opacity: 0 }, 1000,function(){
							$('.mostar').css('display','block');
							$('.respuesta').html(mostrarResultadosSearch(gSearchResults_temp(data['nodes'],gsearch),gsearch,null));
							jQuery('#respuesta').animate( { opacity: 0.9 }, 500);
						});
					}else{
						itemsBusqueda = {}
						if($('#gsearch').val() == 0 ){
							jQuery('#respuesta').animate( { opacity: 0 }, 1000,function(){
								$('.items-busqueda .itemSearch').each(function(index){
									itemsBusqueda[$(this).attr('id')] = $(this).attr('value')
								});
								$('.mostar').css('display','block');
								$('.respuesta').html(mostrarResultadosSearch(_customResults( data['nodes'],itemsBusqueda )));
								$('#respuesta').animate( { opacity: 0.9 }, 500);
							});
						}
					}
	        });
	        $('.modalView').click(function (){
	   			$('.modalView').hide();
			});
			$("#descargar-info").click(function(){
			  $("#table2excel").table2excel({
			    exclude: ".noExl",
				name: "Contenido",
				filename: "tesis-articulos-colfuturo" //do not include extension
				});
			});
		}
	}; 

	$(document).ready(function() {
		  $(window).keydown(function(event){
		    if(event.keyCode == 13) {
		      event.preventDefault();
		      return false;
		    }
  		});
	});
	
	function contructOptionsInput(data,index,element){
		var node =[];
		$(element).append($('<option>', {
	    					value:'Todos',
	    					text: 'Todos',
						}));
		for( var i = 0; i <= data.length-1; i++){
	   		node.push(data[i]['node'][index]);
		    }
		node.sort();
		var autor = [];
		for(var i = 0; i <= node.length-1; i++){
				sum = i + 1;
	        	if(sum < node.length){
			    	if( node[i] != node[sum] ){
			    		$(element).append($('<option>', {
	    					value:node[i],
	    					text: node[i]
						}));
			    	}
			    }
			}
		return 'yes';
	}
	function mostrarResultadosSearch(data,gsearch,identification){
		$('.respuesta').html('');
		var formRequest=[];
		jQuery('#createformsearch #gsearch').each(function(index){
				var id = jQuery(this).attr('id');
                var value  = jQuery(this).val();
                formRequest[id] = value;
		});
		jQuery('#createformsearch select').each(function(index){
				var id = jQuery(this).attr('id');
                var value  = jQuery(this).val();
				formRequest[id] = value;
		});
		var result = [];
		var cont = 1;
		if(formRequest['Autor'] != 'Todos' || formRequest['beneficiario_estudio'] != 'Todos' || 
			formRequest['fecha_publicacion'] != 'Todos' || formRequest['tema'] != 'Todos' || formRequest['tipo_documento'] != 'Todos' || 
			formRequest['tipo_estudio'] != 'Todos' ){
			var process = 1;
		}
		if(  identification == null ){
			var process = 1;
		}
		if( typeof process  != 'undefined' && process != 1 ){
			for (index in data){
				for(input in formRequest){
					for(node in data[index]['node']){
						if( formRequest[input] == data[index]['node'][node]){
							if(input == 'fecha_publicacion' || input == 'beneficiario_estudio' ){
								if(formRequest[input] == data[index]['node'][input]){
									$('.respuesta').append(function(e){
										return returnHtml(data[index]['node'],cont,gsearch);
									});	
								}
							}
							else{
								$('.respuesta').append(function(e){
									return returnHtml(data[index]['node'],cont,gsearch);
								});
							}	
							cont = cont + 1;
						}
					}
				}
			}
		}else{
			if(data.length != 0){ 
				for (index in data){
					$('.respuesta').append(function(e){
							return returnHtml(data[index]['node'],cont);
						});
					cont = cont + 1; 
				}
			}else{
				$('#load').html('<span>No hay conincidencias</span>');
				return
			}
		}		
	}

	function returnHtml(data,cont){
		if( typeof data == "undefined"){
			$('#load').html('<span>No hay conincidencias</span>');
			return '';
		}
		var html;
		var busqueda = data[gsearch];
		html = '<div class="box-content pos-'+ cont +'">'; 
		html +='<div>'+cont + ' En : ' + data['parte_de'] +'</div>';
		for(items in data){
			if(typeof items !== 'undefined'){
				switch(items){
					case 'autores':
						html += '<div class="field-'+ items+'"><strong>Autor: </strong>'+data[items]+'</div>';
					break;
					case 'beneficiario_estudio':
						html +='<div><strong>Beneficiario Colfuturo Promocion: </strong>'+ data[items] +'</div>';
					break;
					case 'fecha_publicacion':
						html +='<div><strong>Fecha de Publicacion : </strong>'+ data[items] +'</div>';
					break;
					case 'edit-area-tematica':
						html +='<div>'+ data[items] +'</div>'
					break;
					case 'tema':
						html +='<div><strong>Tema: </strong>'+ data[items] +'</div>'
					break;
					case 'tipo_de_estudio':
						html +='<div><strong>Tipo de Estudio: </strong>'+ data[items] +'</div>'
					break;
					case 'título':
						if(gsearch && gsearch== "gsearch"){
							$('#load').html('<span>Resultados para: </span>' + data[items]);
						}else{
							switch(gsearch) {
							    case 'tipo_documento':
							     	gsearch = 'tipo de documento';
							     	busqueda = '';
						        break;
							    case 'Autor':
							     	gsearch = 'autor';
							     	busqueda = data['autores'];
							    break;
						     	case 'fecha_publicacion':
							     	gsearch = 'año de publicación';
						     	break;
						     	case 'beneficiario_estudio':
							     	gsearch = 'Beneficiario colfuturo promoción';
						     	break;
						     	case 'tema':
							     	gsearch = 'area tematica';
						     	break;
							    default:
							    	gsearch ='Tipo de estudio';
							     	busqueda = '';
							    
						        break;
							}
							if( $('#gsearch').val().length > 0  ){
								$('#load').html('<span>Resultados encontrados por : </span> '+$('#gsearch').val());
							}else{
								$('#load').html('<span>Resultados encontrados');
							}
						}
						html +='<div class="ico-pdf"><img src="http://www.colfuturo.org/sites/all/themes/colfuturo_atsubtheme/images/pdf.png" class="img-pdf-ico"><a onclick="modalView('+index+')" href="#">'+ data[items] +'</a></div>'
					break;
				}
			}
		}
		html += '</div>';
		//$('#gsearch').val('')
		$('select').val('Todos')
		return html;
	}
})(jQuery);

function modalView(index){
	var html = "";
	var data = jQuery.get('http://www.colfuturo.org/sites/all/modules/b_colfuturo/content.json',	function(result){
			    data = jQuery.parseJSON(result);
			    
				jQuery('#contenttotal').html(function(){
					for(items in data['nodes'][index]['node']){
						if(typeof items !== 'undefined'){
							switch(items){
								case 'autores':
									//console.log(items);
									html += '<div class="field-'+ items+'"><strong>'+data['nodes'][index]['node'][items]+'</strong></div><br>';
								break;
								case 'fecha_publicacion':
									html +='<div><strong>Beneficiario Colfuturo Promocion: </strong>'+ data['nodes'][index]['node'][items] +'</div>';
								break;
								case 'edit-area-tematica':
									html +='<div class="field-'+items+'">'+ data['nodes'][index]['node'][items] +'</div>'
								break;
								case 'tema':
									html +='<div class="field-'+items+'" ><strong>Tema: </strong>'+ data['nodes'][index]['node'][items] +'</div>'
								break;
								case 'tipo_de_estudio':
									html +='<div class="field-'+items+'" ><strong>Tipo de estudio: </strong>'+ data['nodes'][index]['node'][items] +'</div><br>'
								break;
								case 'título':
									html +='<div class="field-'+items+'">'+ data['nodes'][index]['node'][items] +'</div>'
								break;
								case 'cuerpo':
									html +='<div class="field-'+items+'">'+ data['nodes'][index]['node'][items] +'</div><br>'
								break;
								case 'url_adjuntos':
									html +='<div class="field-'+items+'"><img src="http://www.colfuturo.org/sites/all/themes/colfuturo_atsubtheme/images/pdf.png" class="img-pdf-ico"><a target="_blank"href="http://www.banrepcultural.org/sites/default/files/'+data['nodes'][index]['node'][items]+'">Ver Documento</a></div>'
								break;
								case 'url_nodo':
									html +='<div class="field-'+items+'"><strong>Fuente :</strong><a href="http://www.banrepcultural.org/'+data['nodes'][index]['node'][items]+'">http://www.banrepcultural.org'+ data['nodes'][index]['node'][items] +'</a></div>'
								break;
							}
						}
					}
				return html;
				});
			 	jQuery('.modalView').css({'width':'100%','height':'auto'});
			 	jQuery('.modalView').fadeIn(1000);      
        		jQuery('.modalView').fadeTo("slow");    
				});	
}

function _customResults( data,itemsBusqueda ){
	var nodes;
	var results = {};
	var indicator;
	Object.size = function(obj) {
			    var size = 0, key;
			    for (key in obj) {
			        if (obj.hasOwnProperty(key)) size++;
			    }
			    return size;
	};
	console.log(itemsBusqueda)
	for( index in itemsBusqueda){
			for( node in data ){
				if ( data[node].node[index] == itemsBusqueda[index] ){
					results[node] = data[node]
				}
			}
			data = results
			
			results = {};
		}
	if(Object.size(data) <= 0){
		data = 'No se encontraron coincidencias'
	}
	console.log(data);
	return data
}


function gSearchResults( data,gsearch ){
	var nodes;
	var index = ['título','autores','cuerpo','parte_de','tema','tipo_de_estudio']
	var results = ['']
	for( nodes in data ){
		for( item in index ){
			if(data[nodes]['node'][index[item]]){	
				if(data[nodes]['node'][index[item]].toLowerCase().indexOf(gsearch.toLowerCase()) != -1){
				   results[nodes] = data[nodes]
				}

			}
		}
	}

	return results
}

function gSearchResults_temp( data,gSearch,bucle ){
	if( bucle != 1 ){
		var gSearch = gSearch.split(' ');
	}
	var nodes;
	var index = ['título','autores','cuerpo','parte_de','tema','tipo_de_estudio']
	var results = []
	for( nodes in data ){
		for( item in index ){
			if(data[nodes]['node'][index[item]]){	
				if(data[nodes]['node'][index[item]].toLowerCase().indexOf(gSearch[0].toLowerCase()) != -1){
			   		results[nodes] = data[nodes]
	   				}
				}
			}
		}
	data = {};
	data = results 
	if(gSearch.length > 1){
		gSearch = gSearch.slice(1);
		data = gSearchResults_temp(data,gSearch,1)
		}
	
	return data		

	
}

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}


function tableContruct( data ){
	var html = '<thead><tr class="background:#DDD">'+
					'<th>#</th>'+
	 				'<th>Parte de</th>'+
					'<th>Tipo de estudio </th>'+
				  	'<th>Autores </th>'+
				   	'<th>Titulo</th>'+
				   	'<th>Fecha de publicacion</th>'+
				   	'<th>Promocion</th>'+
				   	'<th>Tema</th>'+
				   	'<th>Cuerpo</th>'+
				   	'<th>url</th>'+ 
			   '</thead>';
  
     for ( key in data ){
     	for( index in  data[key]) {
     		html += '<tr><td>'+ data[key][index]['Nid'] +
     				'</td><td>'+ data[key][index]['parte_de'] +
     				'</td><td>'+ data[key][index]['tipo_de_estudio'] +
     				'</td><td>'+ data[key][index]['autores'] +
     				'</td><td>'+ data[key][index]['título'] +
     				'</td><td>'+ data[key][index]['fecha_publicacion'] +
     				'</td><td>'+ data[key][index]['beneficiario_estudio'] +
     				'</td><td>'+ data[key][index]['tema'] +
     				'</td><td>'+ data[key][index]['cuerpo'] +
     				'</td><td>http://www.banrepcultural.org'+ data[key][index]['url_nodo'] +'</td></tr>';
     	}
     }
	jQuery('.table2excel').append('<table id="table2excel">'+html);
	jQuery("button").click(function(){
	  jQuery("#table2excel").table2excel({
    		exclude: ".noExl",
    		name: "Contenido Colfuturo",
    		filename: "tesis-articulos-colfuturo",
    		fileext: ".xlsx",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
	  });
	});
}

function tildes(text){
	console.log(text)

	return text;
}