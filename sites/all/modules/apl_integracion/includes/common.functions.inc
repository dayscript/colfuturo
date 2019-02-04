<?php


function apl_encriptaPLI ( $strString ) {

  $llave = '12345';
  $var1 = date ("sHdi");
  $var2 = sqrt ($var1 . strrev($strString));

  $var3 = 0;
  $link = odbc_connect ("ColfuturoPLI", "pli", "qvwXkY8D");

  $sql = "SELECT count(*) as cuenta
          FROM PLI.SESION
          WHERE login = '$strString'";

  $result = odbc_exec ($link, $sql);
  $row = odbc_fetch_array ($result);
  odbc_close ($link);
  if ( $row['cuenta'] != false ){

      $strSQL = "UPDATE PLI.SESION SET sesion = '$var2'   WHERE login = '$strString'";
      odbc_exec($link, $strSQL);
  }else{

      $fecha1 = date('Y-m-d');
      $strSQL = "INSERT INTO PLI.SESION (login, sesion,SES_FECHA_CREACION,SES_FECHA_MODIFICACION) values ( '" . $strString . "', '" . $var2 . "','" . $fecha1 . "','" . $fecha1 . "')";
      odbc_exec ($link, $strSQL);
  }
  odbc_close ($link);

return rand(0,9999);//$var2;
}
