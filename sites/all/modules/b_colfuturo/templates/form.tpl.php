<div id="Main-page">
	<div class="publicaciones-tesis-articulos">
    <div class="content">
      <div class="busqueda-por-palabra">
      <h2 class="titulo-general-rojo">Buscador de publicaciones</h2>
        <form id="form-busqueda" >
          <p>
          <strong>Búsqueda por palabra clave:</strong>
          </p>
          <input type="text" id="busqueda" name="busqueda"/>
          <div class="form-submit"><input id="buscar" type="submit" value="BUSCAR" name="buscar"/>
          </div>
        </form>
        <script type="text/javascript">
          jQuery(document).ready(function(e){
            jQuery('#form-busqueda').submit(function(e){
              var url = 'http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/@url!Colfuturo/field/all!subcol/mode/all!all/conn/and!and/order/nosort';
              var txt = jQuery('#busqueda').val();
              var fin =  url.replace('@url',txt);
              window.open(fin,'_blank');
              e.preventDefault();
            });
          });
        </script>
      </div>    
      <div class="block-right">
      <h2 class="titulo-general-rojo">Opciones de navegación</h2>
        <div class="tematicas">
            <p>
            <strong>Área Temática
            </strong>
            </p>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!administracion/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Administración</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!arte!arquitectura/field/subcol!all!all/mode/all!all!all/conn/and!or!and/order/nosort" target="_blank">Arquitectura, arte</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!biologia/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Biología</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!derecho/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Derecho</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!educacion/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Educación</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!humanidades/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Humanidades</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!ingenieria/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Ingeniería</a></dt>
            <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!matematicas/field/subcol!tema/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Matemáticas</a></dt>
        </div>
        <div class="documento">
          <p>
          <strong>Tipo de documento
          </strong>
          </p>
          <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!Tesis/field/subcol!type/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Tesis
          </a></dt>
          <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!Art%C3%ADculo/field/subcol!type/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Articulos</a></dt>
        </div>
        <div class="estudio">
          <p>
          <strong>Tipo de estudio
          </strong>
          </p>
          <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!doctorado/field/subcol!tipo/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Doctorado</a></dt>
          <dt><a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo!maestria/field/subcol!tipo/mode/all!all/conn/and!and/order/nosort/ad/asc" target="_blank">Maestria</a></dt>
        </div>
        <div class="ver-todo">
        <a href="http://babel.banrepcultural.org/cdm/search/collection/p17054coll23/searchterm/Colfuturo/field/subcol/mode/all/conn/and/" target="_blank"><strong>Ver todo >></strong></a></div>
      </div>
    </div>  
  </div>
</div>