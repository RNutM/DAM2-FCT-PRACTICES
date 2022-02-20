<?php
/*funciones*/

function validar_clave($clave,&$error_clave){
    if(strlen($clave) < 6){
       $error_clave = "La clave debe tener al menos 6 caracteres";
       return false;
    }
    if(strlen($clave) > 16){
       $error_clave = "La clave no puede tener más de 16 caracteres";
       return false;
    }
    if (!preg_match('`[a-z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra minúscula";
       return false;
    }
    if (!preg_match('`[A-Z]`',$clave)){
       $error_clave = "La clave debe tener al menos una letra mayúscula";
       return false;
    }
    if (!preg_match('`[0-9]`',$clave)){
       $error_clave = "La clave debe tener al menos un caracter numérico";
       return false;
    }
    $error_clave = "";
    return true;
 }

function comprobar_existencia($tabla,$columna,$dato,$DBname){
   $db = new Database('','','',$DBname);
   $conexion =$db->conectar();
   $result = mysqli_query( $conexion, "SELECT * FROM $tabla WHERE $columna='$dato' ");

  if( $result && (mysqli_num_rows($result)>0))
  return true;
}



?>