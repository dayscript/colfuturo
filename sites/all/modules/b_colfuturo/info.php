f<?php

$Tabs=array(' Administrativo', 'Colciencias','Comunicaciones',' Convocatoria PCB','Dirección Ejecutiva','Idiomas','PCB','PDBC','Programa Retorno','Semillero','Informática-Proyectos');

 $TableHead = array( 
                  array('#','Descripción regla','Regla','Tipo Documental de Busqueda On Base '),//Administrativo
                  array('#','Descripción regla','Regla Programa','Regla Correo','Ejemplo: Reglas','Tipo Documental de Búsqueda On Base'),//Colciencias
                  array('#','Descripción regla','Regla','Tipo Documental de Busqueda On Base'),//Comunicaciones
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//Convocatoria PCB
                  array('#','Descripción regla','Regla','Tipo Documental de Busqueda On Base'),//Direccion Ejecutiva
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//idiomas
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//PCB
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//PDBC
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//Programa retorno
                  array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Busqueda On Base'),//Semillero
                  array('#','Descripción regla','Regla','Tipo Documental de Busqueda On Base'),//Informatica Proyectos
              );
$TableTitle=array(
                  array('Reglas de correo administrativas Dirección Administrativa y Financiera','archivaremail@colfuturo.org','[regla onbase], ˽[textolibre asunto del correo]'),//Administrativo
                  array('Reglas de correo para estudiantes -  PDBC','colcienciasarchivaremail@colfuturo.com.co','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),//colciencias
                  array('Reglas de correo administrativas Dirección Administrativa y Financiera','archivaremail@colfuturo.org ','[regla onbase], ˽[textolibre asunto del correo]'),//cominucaciones
                  array('Reglas de correo para candidatos convocatoria  PCB','archivaremail@colfuturo.org','[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),//Convocatoria PCB
                  array('Reglas de correo administrativas Dirección Ejecutiva','archivaremail@colfuturo.org','[regla onbase], ˽[textolibre asunto del correo]'),//Direccion Ejecutiva
                  array('Reglas de correo para participantes Programa de Inglés','archivaremail@colfuturo.org','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),//Idiomas
                  array('Reglas de correo para beneficiarios  PCB','archivaremail@colfuturo.org','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),
                  array('Reglas de correo para beneficiarios  PDCB','archivaremail@colfuturo.org','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),//PDCB
                  array('Reglas de correo para beneficiarios Programa Retorno','archivaremail@colfuturo.org','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),
                  array('Reglas de correo para beneficiarios Programa Semillero de Talentos - PST','archivaremail@colfuturo.org','[# de cedula], ˽[nombre programa], ˽[regla onbase] ˽[textolibre asunto del correo]'),
                  array('Reglas de correo administrativas  Informática y Proyectos de Tecnología','archivaremail@colfuturo.org','[# de cedula], ˽[regla onbase] ˽[textolibre asunto del correo]'),

  );
 $TableBody= array(
                  array(
                        array('1','Correspondencia física de entrada contestada por correo electrónico ','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                        array('2','Correspondencia y Correo electrónico - Proyectos Niif ','Subject P Asunto: <span id="black">RNIIF</span>','Proyecto NIIF - Correspondencia - 02'),
                        array('1','Indicadores económicos ','Subject o Asunto: <span id="black">FGuide<span>','Indicadores Economicos - 01'),
                        
                        ),//Administrativo
                  array(
                        array('1','Correspondencia beneficiarios de Colciencias Doctorados Nacionales','PDBCNal','Coldoc ','Asunto:   Cédula, PDBCNal, Coldoc ','Correspondencia - Benef - Colciencias - MSG'),
                        array(' ','Correspondencia beneficiarios de Colciencias Doctorados Exterior','PDBCEx','Coldoc','Asunto: Cédula, PDBCEx,  Coldoc ','Correspondencia - Benef - Colciencias - MSG'),
                        array(' ','Correspondencia beneficiarios Programa Internacionalización','PDBCInt','Coldoc','Asunto: Cédula, PDBCInt, Coldoc','Correspondencia - Benef - Colciencias - MSG'),
                        array(' ','Correspondencia beneficiarios Fulbright','FulbEst','Coldoc','Asunto: Cédula, FulbEst, Coldoc','Correspondencia - Benef - Colciencias - MSG'),
                        array('2','Correo electrónico Acciones de Tutela Colciencias Doctorados Nacionales','PDBCNal','JurAT','Asunto: Cédula, PDBCNal, JurAT','Accion de Tutela - Beneficiarios'),
                        array(' ','Correo electrónico Acciones de Tutela Colciencias Doctorados','PDBCEx','JurAT','Asunto: Cédula, PDBCEx,  JurAT ','Accion de Tutela - Beneficiarios'),
                        array(' ','Correo electrónico Acciones de Tutela Programa Internacionalización','PDBCInt','JurAT','Asunto: Cédula, PDBCInt, JurAT','Accion de Tutela - Beneficiarios'),
                        array(' ','Correo electrónico Acciones de Tutela Programa Fulbright','FulbEst','JurAT','Asunto: Cédula, FulbEst, JurAT','Accion de Tutela - Beneficiarios'),
                        array('3','Correo electrónico Derechos de Petición Colciencias Doctorados Nacionales','PDBCNal','JurDP','Asunto: Cédula, PDBCNal, JurDP','Derecho de Peticion - Beneficiarios'),
                        array(' ','Correo electrónico Derechos de Petición Colciencias Doctorados Exterior','PDBCEx','JurDP','Asunto: Cédula, PDBCEx, JurDP ','Derecho de Peticion - Beneficiarios'),
                        array(' ','Correo electrónico Derechos de Petición Programa Internacionalización ','PDBCInt','JurDP','Asunto: Cédula, PDBCInt, JurDP ','Derecho de Peticion - Beneficiarios'),
                        array(' ','Correo electrónico Derechos de Petición Programa Fulbright ','FulbEst','JurDP','Asunto: Cédula, FulbEst, JurDP','Derecho de Peticion - Beneficiarios'),
                               
                        ),//colciencias
                  array(
                        array('1','Correspondencia física de entrada contestada por correo electrónico ','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                        array('2','Boletines Informativos','<span id="black">BI Comunicaciones</span> ','Boletines informativos - Comunicaciones - 04'),
                        ),//Comunicaciones
                  
                  array(
                        array('1','Correo dirigido a candidatos','<span id="red">PCB</span>','Candidato','Asunto: Cédula, <span id="red">PCB</span>, <span id="black">Candidato</span>','Solicitud - correspondencia general MSG'),
                        array('2','Regla de uso para correo masivo a candidatos','<span id="red">PCB</span>','TACK<br><br>Cédula: #,#,#,/','Asunto: <span id="black">TACK</span>,<span id="red">PCB</span><br><hr style="border: 1px solid rgb(204, 204, 204);height: 0px;     margin: 0;">Escribir en cuerpo del correo <br>
                              Cédula: 80241428, 79981757, 87063485, 52862642,/','Solicitud - correspondencia general MSG'),
                       
                        ),//Convocatoria PCB

                  array(
                        array('1','Correo electrónico -  Donantes','Subject o Asunto: /Nit/Donantecorres 
                               Ej:<span id="black">/860025447/Donantecorres</span>','Correspondencia Expediente de Donantes'),
                        array('2','Correo electrónico -  miembros CF','Subject o Asunto: /Nit/Cfundador
                               EJ:<span id="black">/860025447/Cfundador<span>','Correspondencia - Expedientes CF'),
                        array('3','Correo electronico miembros Junta Directiva ','Subject o Asunto: /Cédula/JDcorres 
                               EJ: <span id="black">/19320030/JDcorres</span>','Correspondencia - Expedientes JD'),
                        array('4','Correo electronico miembros','Subject o Asunto:  <span id="black">Cacademico</span>','Comite academico - correspondencia citaciones y otros - 02'),
                        array('5','Correo electronico miembros','Subject o Asunto: <span id="black">Cfinanciero</span>','Citaciones Correspondencia Comite financiero - 02'),
                        array('6','Correspondencia física de entrada contestada por correo electrónico ','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716,Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                        ),//Dirreccion Ejecutiva
                  array(
                        array('1' ,'Regla para participantes Programa de Semillero de Talentos ','<span id="red">PCB</span>','inglescorres' ,'Subject o Asunto: <span id="black">Cédula</span>,<span id="red">PCB</span>,<span id="black">inglescorres</span>','PST Correspondencia - MSG'),
                        
                        ),//Idiomas
                  array(
                        array('1','Correos beneficiarios','<span id="red">PCB</span>','ManualPCB','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>,<span id="black"> ManualPCB</span>','PCB Correspondencia otros-MSG'),
                        array('2','Cita de retorno','<span id="red">PCB</span>','Fretorno ','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>, <span id="black">Fretorno </span>','Formato de cita de retorno - MSG'),
                        array('3','Solicitudes de condonación 10 % ','<span id="red">PCB</span>','B10','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>,<span id="black"> B10 </span>','Solicitud de condonaciones - MSG '),
                        array('4','Notificación cambio de estatus','<span id="red">PCB</span>','Cestatus','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>,<span id="black"> Cestatus</span>','Notificacion cambio de estatus - MSG'),
                        array('5','Rechazo cambio de estatus','<span id="red">PCB</span>','Restatus ','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>, <span id="black">Restatus</span>','Notificacion rechazo de la solicitud cambio de estatus - MSG'),
                        array('6','Correspondencia cartera:solo para temas muy específicos de cartera.','<span id="red">PCB</span>','carteracorres','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>,<span id="black"> carteracorres</span>','Cartera otros - MSG'),
                        array('7','Adjuntar liquidaciones al correo electrónico con destino a los beneficiarios','<span id="red">PCB</span>','Liquidaben','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>, <span id="black">LiquidaBen</span>','Liquidación definitiva (PAO-PAA) - MSG (pestaña cartera)'),
                        array('8','Respuesta a amonestación académica ','<span id="red">PCB</span>','AmonestPCB ','Subject o Asunto:<span id="black"> Cédula</span>, <span id="red">PCB</span>, <span id="black">AmonestPCB</span> ','Amonestacion academica - MSG '),
                        
                        array('2','Regla correo masivo <br> Correspondencia dirigida a universidades sobre estudiantes - Regla en el asunto y cuerpo del correo','PCB','Tags,PCB<br><br>Cédula: #,#,#,/','Subject o Asunto:  TAGS
                        <br><br>Cuerpo del correo: Cédula: 80241428, 79981757, 87063485,52862642,/','Comunicaciones Generales Universidades -PCB - MSG
                        <br><br>PCB Correspondencia otros-MSG (cada estudiante)'),
                        array('3','Regla correo masivo dirigido a beneficiarios<br><hr style="border: 1px solid rgb(204, 204, 204);
                              height: 0px;
                              ">Regla en el asunto y cuerpo del correo
                              ','PCB ','TRACKBEN<br><br>Cédula: #,#,#,/','Subject o Asunto: TRACKBEN,PCB<br><hr style="border: 1px solid rgb(204, 204, 204);
                              height: 0px;
                              ">Cuerpo del correo: Cédula: 80241428, 79981757, 87063485,52862642,/','PCB Correspondencia otros-MSG'),
                        

                        ),
                  array(

                        array('1','Correspondencia beneficiarios de Colciencias Doctorados Nacionales','<span id="red">PDBCNal</span>','Coldoc','Asunto: Cédula, <span id="red">PDBCNal</span>, <span id="black">Coldoc</span>','Correspondencia - Benef - Colciencias - MSG'),
                             
                        array(' ','Correspondencia beneficiarios de Colciencias Doctorados Exterior','<span id="red">PDBCEx</span>','Coldoc ','Asunto: Cédula, <span id="red">PDBCEx</span>, <span id="black">Coldoc</span>','Correspondencia - Benef - Colciencias - MSG'),
                        array(' ','Correspondencia beneficiarios Programa Internacionalización ','<span id="red">PDBCInt</span>','Coldoc ','Asunto: Cédula, <span id="red">PDBCInt</span>, <span id ="black">Coldoc</span>','Correspondencia - Benef - Colciencias - MSG'),
                        array(' ','Correspondencia Beneficiarios Fulbright','<span id="red">FulbEst </span>','Coldoc ','Asunto: Cédula,> FulbEst</span>,<span id ="black">Coldoc</span>','Correspondencia - Benef - Colciencias - MSG'),
                        array('2','Correo electrónico Acciones de Tutela Colciencias Doctorados Nacionales','<span id="red">PDBCNal</span>','JurAT','Asunto: Cédula,<span id="red">PDBCNal</span>,<span id="black"> JurAT</span>','Accion de Tutela - Beneficiarios'),
                        array(' ','Correo electrónico Acciones de Tutela Colciencias Doctorados','<span id="red">PDBCEx</span>','JurAT','Asunto: Cédula, <span id="red">PDBCEx</span>,<span ="black"> JurAT</span> ','Accion de Tutela - Beneficiarios'),
                        array(' ','Correo electrónico Acciones de Tutela Programa Internacionalización','<span id="red">PDBCInt</span>','JurAT','Asunto: Cédula,<span id="red">PDBCInt</span>, <span id="black">JurAT</span> ','Accion de Tutela - Beneficiarios
'),
                        array(' ','Correo electrónico Acciones de Tutela Programa Fulbright ','<span id="red">FulbEst</span>','JurAT','Asunto: Cédula, <span id="red">FulbEst</span>,<span id="black"> JurAT</span>','Accion de Tutela - Beneficiarios
'),
                        array('3','Correo electrónico Derechos de Petición Colciencias Doctorados Nacionales','<span id="red">PDBCNal</span>','JurDP','Asunto: Cédula, <span id="red">PDBCNal</span>,<span id="black"> JurDP</span>','Derecho de Peticion - Beneficiarios'),
                        array(' ','Correo electrónico Derechos de Petición Colciencias Doctorados Exterior','<span id="red">PDBCEx</span>','JurDP','Asunto: Cédula, <span id="red">PDBCEx</span>,<span id="black"> JurDP</span> ','Derecho de Peticion - Beneficiarios
'),
                        array(' ','Correo electrónico Derechos de Petición Programa Internacionalización ','<span id="red">PDBCInt</span>','JurDP','Asunto: Cédula, <span id="red">PDBCInt</span>,<span id="black"> JurDP </span>','Derecho de Peticion - Beneficiarios
'),
                        array(' ','Correo electrónico Derechos de Petición Programa Fulbright ','<span id="red">FulbEst</span>','JurDP','Asunto: Cédula, <span id="red">FulbEst</span>,<span id="black"> JurDP</span>','Derecho de Peticion - Beneficiarios
'),  
                        ),   //PDBC
                  array(
                        array('1' ,'Correo dirigido a candidatos ','<span id="red">PCB</span>','ManualPCB' ,'Subject o Asunto: Cédula, <span id="red">PCB</psn>, <span id="black">ManualPCB</span >','Solicitud - correspondencia general MSG'),
                        
                        ),
                  array(
                        array('1' ,'Regla para participantes Programa de Semillero de Talentos ','<span id="red">PCB</span>','semillerocorres' ,'Subject o Asunto: <span id="black">Cédula</span>,<span id="red">PST</span>, <span id="black">semillerocorres</span>','PST Correspondencia - MSG'),
                        
                        ),
                  array(
                        array('1','Correspondencia física de entrada contestada por correo electrónico ','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                        array('2','Proyectos - Reporte de errores por corre@','"Subject o Asunto: /Cod Proyecto/PRYerror EJ: <span id="black">/CF001/PRYerror</span>"','Proyectos - reportes de error'),
                        array('3','Correspondencia de proyectos ','Subject o Asunto: /Cod Proyecto/PRYcorres Ej:<span id="black">/CF002/PRYcorres</span>"
','Proyectos - correspondencia'),
                        array('4','Soporte - correspondencia ','Subject o Asunto: /Cod Proyecto/Soportecorres EJ: <span id="black">/CF001/Soportecorres</span> ','Soporte - mantenimiento Software - Correspondencia'),
                        array('5','Correo Electrónico para reporte de incidentes','Subject o Asunto:/Cod Cliente/PRYincidentes Ej: <span id="black">/CL001/PRYincidentes</span>','Soporte - incidentes consultas'),
                        array('6','Correo electrónico nivel Cómite Seguimiento de Proyectos','Subject o Asunto: <span id="black">PRYSeg</span>','Seguimiento Proyectos - correspondencia'),



                    ),
                  
                  

                  );
$TableTitlePie= array(
                      array('** Cualquier regla que se quiera usar de PCB debe usarse con la estructura de regla de programa de PGP acuerdo al caso. '),
  );

$TableHeadDos = array( 
                      array(), //administrativo
                      array('#','Descripción regla','Regla Programa','Regla Correo','Reglas','Tipo Documental de Búsqueda On Base'),//colciencias
                      array(),//comunicaciones
                      array('#','Descripción regla',' ',' ','Regla','Tipo Documental de Búsqueda On Base'),//Convocatoria PCB
                      array(),//Direccion Ejecutiva
                      array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Búsqueda On Base'),//Idiomas
                      array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Búsqueda On Base'),
                      array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Búsqueda On Base'),//PDBC
                      array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Búsqueda On Base'),
                      array('#','Descripción regla','Regla Programa','Regla Correo','Regla','Tipo Documental de Búsqueda On Base'),
                     );

$TableTitleDos=array(
                      array(),//Aministrativas 
                      array('Reglas de correo administrativas PDBC ','archivaremail@colfuturo.org','[regla onbase],˽[textolibre asunto del correo]'),//colciencias
                      array(),//Comunicaciones
                      array('Reglas de correo administrativas Convocatoria  PCB ','archivaremail@colfuturo.org','[regla onbase], ˽[textolibre asunto del correo]'),//Convocatoria PCB
                      array(),//Direccion Ejecutiva
                      array('Reglas de correo administrativas Programa de Inglés','archivaremail@colfuturo.org','[regla onbase] ˽[textolibre asunto del correo]'),//Idiomas
                      array('Reglas de correo administrativas PCB ','archivaremail@colfuturo.org','[regla onbase], ˽[textolibre asunto del correo]'),
                      array('Reglas de correo administrativas PDCB ','archivaremail@colfuturo.org','[regla onbase],˽[textolibre asunto del correo]'),//PDCB

                      array('Reglas de correo administrativas Programa Retorno','archivaremail@colfuturo.org','[regla onbase] ˽[textolibre asunto del correo]'),
                      array('Reglas de correo administrativas Programa Semillero de Talentos - PST','archivaremail@colfuturo.org','[regla onbase] ˽[textolibre asunto del correo]'),
                      
                      array(),
                      array(),
                      array(),
                     


  );
                          


 $TableBodyDos = array( array( 
                              array(),//administrativas
                             ), 
                        array(
                              array('4','Correspondencia COLFUTURO y Colciencias ','N/A','N/A','Asunto : PDBCCorres','PDBC - Correspondencia  / informes - 07'),
                              array('5','Correspondencia PDBC - Universidades Nacionales y  Internacionales','N/A','N/A','Asunto : PDBCUniv','PDBC - Universidades - Correspondencia'),
                              array('6','Correspodencia Colciencias - Fulbright -Colfuturo','N/A','N/A','Asunto : PDBCFulb','PDBC - FULBRIGHT - Correspondencia  07'),
                              array('7','Correspodencia PDBC - Fincomercio','N/A','N/A','Asunto: PDBCFinc','PDBC - Fincomercio  correspondencia - 07'),
                              array('8','Correspodencia PDBC -  Fiduciaria Bogotá','N/A','N/A','Asunto: FIDBTA','PDBC - Fondo de Recursos Fiduciaria - Correspondencia - 07'),
                              array('9','Correo electrónico - Interno decisiones de cartera - conceptos cartera','N/A','N/A','Asunto: COLCartera ','PDBC Cartera conceptos y decisiones - MSG - 07'),
                              array('9','Correspondencia física de entrada contestada por correo electrónico ','N/A','N/A','Subject o Asunto: Numero de radicación de entrada así ejemplo: E5716, Rtacorres','Respuesta E-Mail - Correspondencia Entrante'),
                              array('10','Boletines Informativos','N/A','N/A','Asunto: Cédula BI PDBC','Boletines Informativos - PDBC'),
                              
                            ),//colciencias
                        array(
                              array(),//Comunicaciones
                              ),

                        array(
                              array('3','Ministerio de Relaciones Exteriores','N/A','N/A','Subject o Asunto: <span id="black">Minexteriores</span>','Ministerio de Relaciones Exteriores correspondencia. MSG - 03'),
                              array('4','Regla hojas vida miembros comité área','N/A','N/A','Subject o Asunto: <span id="black">carea</span>','Evaluadores -Hoja de vida - 03'),
                              array('5','Hojas vida Comité de Ensayos','N/A','N/A','Subject o Asunto: <span id="black">HVensayos</span>','EVA - Hoja de vida CEE'),
                              array('6','Cartas beneficiarios seleccionados','N/A','N/A','Subject o Asunto:  <span id="black">Cédula, RBS</span>','Carta de otorgamiento PCB
                              '),
                              array('7','Cartas beneficiarios no seleccionados','N/A','N/A','Subject o Asunto: <span id="black"> Cédula, RCC</span>','carta de respuesta no seleccionados PCB'),
                              array('8','Boletines informativos','N/A','N/A','Subject o Asunto: <span id="black">BI Convocatoria </span>','Boletines informativos - Convocatoria - 04'),
                              array('9','Correspondencia física de entrada contestada por correo electrónico','N/A','N/A','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                            ),//convocatoria PCB
                        array(
                            array(),
                          ),//Direccion Ejecutiva
                        array(
                              array('2','Boletines Informativos','N/A','BI ENG','Subject o Asunto: <span id="black">BI ENG</span> ','Boletines informativos - Ingles - 03'),
                              array('3','Correspondencia física de entrada contestada por correo electrónico ','N/A','RtaCorres','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                         ),//Idomas

                        array(    
                             array('9','Correo electrónico - Interno decisiones de cartera - conceptos cartera','N/A','N/A','Subject o Asunto: <span id="black">Infocartera</span>','Cartera conceptos y decisiones - MSG - 03'), 
                             array('10','Regla Boletines informativos','N/A','N/A','Subject o Asunto: <span id="black">BI PCB</span>','Boletines informativos - PCB 04'),
                             array('11','Correspondencia física de entrada contestada por correo electrónico','N/A','N/A','Subject o Asunto: Numero de radicación de entrada así ejemplo:<span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                             ),// administrativas
                         array( 
                             array('4','Correspondencia COLFUTURO y Colciencias','N/A','N/A','Asunto : <span id="black">PDBCCorres</span>','PDBC - Correspondencia  / informes - 07'),
                             array('5','Correspondencia PDBC - Universidades Nacionales y  Internacionales','N/A','N/A','Asunto :<span id="black"> PDBCUniv </span>','PDBC - Universidades - Correspondencia'),
                             array('6','Correspodencia Colciencias - Fulbright -Colfuturo','N/A','N/A','Asunto : <span id="black">PDBCFulb</span>','PDBC - FULBRIGHT - Correspondencia  07'),
                             array('7','Correspodencia PDBC - Fincomercio','N/A','N/A','Asunto: <span id="black">PDBCFinc</span>','PDBC - Fincomercio  correspondencia - 07'),
                             array('8','Correspodencia PDBC -  Fiduciaria Bogotá','N/A','N/A','Asunto: <span id="black">FIDBTA</span>','PDBC - Fondo de Recursos Fiduciaria - Correspondencia - 07'),
                             array('9','Correo electrónico - Interno decisiones de cartera - conceptos cartera','N/A','N/A','Asunto: <span id="black">COLCartera</span> ','PDBC Cartera conceptos y decisiones - MSG - 07'),
                             array('10','Correspondencia física de entrada contestada por correo electrónico ','N/A','N/A','Subject o Asunto: Numero de radicación de entrada así ejemplo:<span id="black"> E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                             array('11','Boletines Informativos ','N/A','N/A','Asunto: Cédula <span id="black">BI PDBC</span> ','Boletines Informativos - PDBC '),
                             ),
                        array(
                              array('1','Programa Retorno (corresp empresas)','N/A','PR Empresas','Subject o Asunto: <span id="black">PR Empresas</span>','Programa Retorno Comunicaciones - MSG'),
                              array('2','Boletines Informativos','N/A','BI PR','Subject o Asunto:  <span id="black">BI PR</span>','Boletines informativos - Programa Retorno - 04'),
                              array('3','Correspondencia física de entrada contestada por correo electrónico','N/A','E5716, Rtacorres','Subject o Asunto: Número de radicación de entrada así ejemplo: <span id ="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),

                          ),
                        array(
                              array('2','Regla Convenio Fuerzas Militares ','N/A','PST FFMM','Subject o Asunto: <span id="black">PST FFMM</span>','Convenio PST  FFMM - MSG'),
                              array('3','Regla Convenio PST Universidades ','N/A','PST Universidades','Subject o Asunto: <span id="black">PST Universidades</span>','Correspondencia Universidades - PST'),
                              array('4','Regla Boletines Informativos','N/A','BI PST','Subject o Asunto: <span id="black">BI PST</span>','Boletines informativos - Semillero de talentos - 04'),
                              array('5','Correspondencia física de entrada contestada por correo electrónico ','N/A','RtaCorres','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),

                          ),
                     

                        
                        
                      );



$TableHeadProyectos =     
                         array( 
                              array('','Reglas Órganos Directivos',' ',''),
                              array('','Reglas Proyectos de Tecnología',' ',''),
                              array('','Reglas  del área Administrativa y Financiera ','',''),
                              array('','Otras Reglas','',''),
                          );

$TableBodyProyectos= array(
                            array(
                                  array('1','Correo electrónico de Reunión Anual AD','Subject o Asunto: ADcorres ','AD - Correspondencia'),
                                  array('2','AD aprobaciones comisión aprobatoria ','AD - Aprobaciones Comision Aprobatoria y anexos','AD - Aprobaciones Comision Aprobatoria y anexos'),
                                  array('1','Correo electrónico -  Donantes','Subject o Asunto: /Nit/Donantecorres Ej: /860025447/Donantecorres ','Correspondencia Expediente de Donantes'),
                                  array('4','Correo electrónico de Reunión Anual Consejo Fundadores ','Subject o Asunto: CFCorres ','CF - Correspondencia - Reunion Anual'),
                                  array('5','CF aprobaciones comisión aprobatoria ','Subject o Asunto: CFaprobacion ','CF - Aprobaciones Comision Aprobatoria y anexos'),
                                  array('2','Correo electrónico -  miembros CF ','Subject o Asunto: /Nit/Cfundador EJ:/860025447/Cfundador ','Correspondencia - Expedientes CF'),
                                  array('3','Correo electronico miembros Junta Directiva ','Subject o Asunto: /Cédula/JDcorres EJ: /19320030/JDcorres','Correspondencia - Expedientes JD'),
                                  array('4','Correo electronico miembros','Subject o Asunto:  Cacademico','Comite academico - correspondencia citaciones y otros - 02'),
                                  array('5','Correo electronico miembros','Subject o Asunto:  Cfinanciero','Citaciones Correspondencia Comite financiero - 02'),
                                  ),
                            array(
                                  array('1','Proyectos - Reporte de errores por corre@','Subject o Asunto: /Cod Proyecto/PRYerror EJ: /CF001/PRYerror','Proyectos - reportes de error'),
                                  array('2','Correspondencia de proyectos ','Subject o Asunto: /Cod Proyecto/PRYcorres Ej: /CF002/PRYcorres','Proyectos - correspondencia'),
                                  array('3','Soporte - correspondencia ','Subject o Asunto: /Cod Proyecto/Soportecorres EJ: /CF001/Soportecorres','Soporte - mantenimiento Software - Correspondencia'),
                                  array('4','Correo Electrónico para reporte de incidentes','Subject o Asunto:/Cod Cliente/PRYincidentes Ej: /CL001/PRYincidentes','Soporte - incidentes consultas'),
                                  array('5','Correo electrónico nivel Cómite Seguimiento de Proyectos','Subject o Asunto: PRYSeg','Seguimiento Proyectos - correspondencia'),
                                  ),
                            array(
                                  array('','Correspondencia y Correo electrónico - Proyectos Niif ','Subject P Asunto: RNIIF ','Proyecto NIIF - Correspondencia - 02'),
                                  
                                  ),
                            array(
                                  array('1','Indicadores económicos ','Subject o Asunto: FGuide','Indicadores Economicos - 01'),
                                  array('2','Correspondencia física de entrada contestada por correo electrónico ','Subject o Asunto: Numero de radicación de entrada así ejemplo: <span id="black">E5716, Rtacorres</span>','Respuesta E-Mail - Correspondencia Entrante'),
                                  
                                  array('3','Boletines Informativos : Destinatario: archivaremail@colfuturo.org','
                                        BI Comunicaciones <br>
                                        BI ENG <br>
                                        BI Convocatoria <br>
                                        BI PCB <br>
                                        BI PIL <br>
                                        BI Potenciales <br>
                                        BI PST<br>
                                        BI PDBC <br>',
                                        '<div style="font-size: 10px;">Boletines informativos-Comunicaciones-04 <br>
                                        Boletines informativos-Ingles-03<br>
                                        Boletines informativos-Convocatoria-04<br>
                                        Boletines informativos-PCB 04<br>
                                        Boletines informativos-PIL-04<br>
                                        Boletines informativos-Consejeria-04<br>
                                        Boletines informativos-Semillero de talentos-04<br>
                                        Boletines Informativos-PDBC<div>'),
                                  ),
                            
                          );


$TableHeadMasivosPDCB=array(
                              array('#','Descripción regla',' Regla Programa','Regla Correo','Ejemplo: Reglas,','Tipo Documental de Busqueda On Base'),

                           );

$TableBodyMasivoPDCB=array(
                          array(
                          
                                array('4','Regla correo masivo - correspondencia beneficiarios Doctorados Nacionales<br>Cuerpo del correo  ','<span id="red">PDBCNal</span>','<span id="black">Trackben</span>','Asunto: <span id="black">Trackben</span>, <span id="red">PDBCNal</span> <br>cédula: 43254534, 79491233, 52860251,/
','PCB Correspondencia otros-MSG'),
                                array(' ','Regla correo masivo - correspondencia beneficiarios Doctorados Exterior <br>Cuerpo del correo ','<span id="red">PDBCEx</span>','<span id="black">Trackben</span>','Asunto: <span id="black">Trackben</span>, <span id="red">PDBCEx</span><br>cédula: 43254534, 79491233, 52860251,/
','PCB Correspondencia otros-MSG
'),
                                array(' ','Regla correo masivo - correspondencia beneficiarios Programa Internacionalización <br>Cuerpo del correo ','<span id="red">PDBCInt</span>','<span id="black">Trackben</span>','Asunto: <span id="black">Trackben</span>, <span id="red">PDBCInt</span><br>cédula: 43254534, 79491233, 52860251,/
','PCB Correspondencia otros-MSG
'),
                                array(' ','Regla correo masivo - correspondencia beneficiarios Fulbright<br>Cuerpo del correo','<span id="red">FulbEst</span>','<span id="black">Trackben</span>','Asunto: <span id="black">Trackben</span>, <span id="red">FulbEst</span> <br>cédula: 43254534, 79491233, 52860251,/
','PCB Correspondencia otros-MSG
'),
                          
                                ),
                          );