<?php
session_start();
ob_start();
if(isset($_POST['submit'])){
    include('inc.inc.php');
    $tabla = $pre."conf";
    $datos = mysql_query("SELECT conf_mail FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_mail = str_output(mysql_result($datos,$j,"conf_mail"));
      }

  $para = $conf_mail;
  $asunto = "Información desde el sitio Web";
  $nombre = $_POST['nombre_'];
  $correo = $_POST['correo_'];
  $telefono = $_POST['telefono_'];
  $mensaje = $_POST['mensaje_'];

  $cuerpo = "From: $correo\n Reply-To: $correo\n\n\n \tEnviado por: $nombre\n \tE-Mail: $correo\n \tTelefono: $telefono\n \tMensaje:\n\n\n \t$mensaje\n";

  if(@mail($para, $asunto, $cuerpo)){
    header("Location: contacto_exito.php");
  }
  else{
    header("Location: contacto_error.php");
  }
}
else{
  header("Location: contacto_error.php");
}
?>