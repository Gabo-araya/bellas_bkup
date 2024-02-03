<?php
include('inc.inc.php');
$self = str_replace(".","",strrev(strrchr(strrev(basename($_SERVER['PHP_SELF'])),".")));
$title = "Formulario de Pedidos en Línea";
$secc = "info_".$self;

disp_header($pre,$title);

$secc_princ = mysql_query("SELECT ".$secc." FROM ".$pre."info") or die(mysql_error());
  $txt = str_output(mysql_result($secc_princ,0,$secc));
?>
       <div id="content">
       <h1><?php echo $title; ?></h1>
         <div class="article">
      <?php if (!empty($_SESSION)) {echo "<div class=\"box_warning\">".disp_array_asoc($_SESSION)."</div>";} ?>

<?php
if (isset($_GET['act'])){
  switch ($_GET['act']){

//Validación de email
    case 've':
    //código de validación de email
      $nombre = str_input($_POST['nombre']);
      $rut = str_input($_POST['rut']);
      $rut_digit = str_input($_POST['rut_digit']);
      $direccion = str_input($_POST['direccion']);
      $giro = str_input($_POST['giro']);
      $rep_legal = str_input($_POST['rep_legal']);
      $rut_rep_legal = str_input($_POST['rut_rep_legal']);
      $rut_digit_rep_legal = str_input($_POST['rut_digit_rep_legal']);
      $telefono = str_input($_POST['telefono']);
      $fax = str_input($_POST['fax']);
      $email = str_input($_POST['email']);

      $soda500cant = str_input($_POST['soda500cant']);
      $pura500cant = str_input($_POST['pura500cant']);
      $soda1500cant = str_input($_POST['soda1500cant']);
      $pura1500cant = str_input($_POST['pura1500cant']);
      $sifon1500cant = str_input($_POST['sifon1500cant']);
      $pura5000cant = str_input($_POST['pura5000cant']);
      $pura12000cant = str_input($_POST['pura12000cant']);
      $pura20000cant = str_input($_POST['pura20000cant']);

      $mensaje = str_input($_POST['mensaje']);

      if(!empty($soda500cant) AND ereg("^([0-9])+$",$soda500cant))  {$productos[] = $soda500cant;}
      if(!empty($pura500cant) AND ereg("^([0-9])+$",$pura500cant))  {$productos[] = $pura500cant;}
      if(!empty($soda1500cant) AND ereg("^([0-9])+$",$soda1500cant)) {$productos[] = $soda1500cant;}
      if(!empty($pura1500cant) AND ereg("^([0-9])+$",$pura1500cant)) {$productos[] = $pura1500cant;}
      if(!empty($sifon1500cant) AND ereg("^([0-9])+$",$sifon1500cant)){$productos[] = $sifon1500cant;}
      if(!empty($pura5000cant) AND ereg("^([0-9])+$",$pura5000cant)) {$productos[] = $pura5000cant;}
      if(!empty($pura12000cant) AND ereg("^([0-9])+$",$pura12000cant)){$productos[] = $pura12000cant;}
      if(!empty($pura20000cant) AND ereg("^([0-9])+$",$pura20000cant)){$productos[] = $pura20000cant;}

      $n_prod = count($productos);

     if (empty($nombre) OR empty($telefono) OR empty($email) OR empty($direccion) OR empty($rut_digit) OR empty($rut)){
       $val_empty = "NO";
     }
     if ($n_prod === 0){
       $prod_empty = "NO";
     }
     if (!empty($telefono)){
       if (!ereg("^([0-9]{1,3})-([0-9]{6,7})+$",$telefono)){
         $fono_valido = "NO";
       }
     }
     if (!empty($rut)){
       if (strlen($rut) === 7 OR strlen($rut) === 8){
         if (!ereg("([0-9])+$",$rut)){
         $rut_valido = "NO";
         }
       }else {$rut_valido = "NO";}
     }

     if (!empty($rut_digit)){
       if (strlen($rut_digit) === 1){
         if ($rut_digit === 'k' OR $rut_digit === 'K' OR ereg("^[0-9]+$",$rut_digit)){
           $rut_digit_valido = "SI";
         }else {$rut_digit_valido = "NO";}
       }else {$rut_digit_valido = "NO";}
     }

     if (!empty($rut_rep_legal)){
       if (strlen($rut_rep_legal) === 7 OR strlen($rut_rep_legal) === 8){
         if (!ereg("([0-9])+$",$rut_rep_legal)){
           $rut_rep_legal_valido = "NO";
         }else {$rut_rep_legal_valido = "SI";}
       }else {$rut_rep_legal_valido = "NO";}
     }

     if (!empty($rut_digit_rep_legal)){
       if (strlen($rut_digit_rep_legal) === 1){
         if ($rut_digit_rep_legal === 'k' OR $rut_digit_rep_legal === 'K' OR ereg("^[0-9]+$",$rut_digit_rep_legal)){
           $rut_digit_rep_legal_valido = "SI";
         }else {$rut_digit_rep_legal_valido = "NO";}
       }else {$rut_digit_rep_legal_valido = "NO";}
     }

     if (!empty($email)){
       if (!ereg("([A-Za-z0-9_.-]+@[A-Za-z0-9_.-]+\.[A-Za-z0-9_-]+)",$email)){
         $email_valido = "NO";
       }
     }
     if (!empty($fax)){
       if (!ereg("^([0-9]{1,3})-([0-9]{6,7})+$",$fax)){
         $fax_valido = "NO";
       }
     }

       if ($val_empty === "NO" OR $prod_empty === "NO" OR $fono_valido === "NO" OR $email_valido === "NO" OR $rut_valido === "NO" OR $rut_digit_valido === "NO" OR $rut_rep_legal_valido === "NO" OR $rut_digit_rep_legal_valido === "NO"){
         echo $txt;
         
         echo "<div class=\"box_validation\">";
         if (empty($nombre)) echo "Debe escribir su nombre.<br />";
         if (empty($rut)) echo "Debe escribir su rut.<br />";
         if (empty($rut_digit)) echo "Debe escribir el dígito verificador de su rut.<br />";
         if (empty($direccion)) echo "Debe escribir su dirección.<br />";
         if (empty($telefono)) echo "Debe escribir su teléfono.<br />";
         if (empty($email)) echo "Debe escribir su correo electrónico.<br />";
         if ($rut_valido === "NO" OR $rut_digit_valido === "NO" ) echo "Escriba un rut válido. <br />Ejemplo: 12345678-k<br />";
         if ($rut_rep_legal_valido === "NO" OR $rut_digit_rep_legal_valido === "NO") echo "Escriba un rut válido para el Representante Legal.<br /> Ejemplo: 12345678-k<br />";
         if ($rut_digit_rep_legal_valido === "NO") echo "Escriba un digito verificador válido para el rut del Representante Legal.<br />";
         if (!empty($rut_rep_legal) AND empty($rut_digit_rep_legal)) echo "Escriba un digito verificador válido para el rut del Representante Legal.<br />";
         if (empty($rut_rep_legal) AND !empty($rut_digit_rep_legal)) echo "Escriba el rut del Representante Legal.<br />";
         if ($fono_valido === "NO") echo "Escriba un teléfono válido. Sin espacios ni paréntesis, anteponiendo el código de ciudad.<br /> Ejemplo: 012-1234567<br />";
         if ($fax_valido === "NO") echo "Escriba un fax válido. Sin espacios ni paréntesis, anteponiendo el código de ciudad.<br /> Ejemplo: 012-1234567<br />";
         if ($email_valido === "NO") echo "Escriba una dirección de correo electrónico válida.<br />";

         if ($prod_empty === "NO"){
           echo "Debe escribir una cantidad (en números) para al menos un tipo de producto.<br />";
         }

         echo "</div>";
         echo "Se han seleccionado $n_prod productos.";

?>

    <form action="<?php echo $phpself; ?>?act=ve" method="post">
    <fieldset>
      <legend>Pedidos en línea</legend>
        <h2>Identificación </h2>
        <table width="400" align="center" id="contact">
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Nombre Completo <br />o Raz&oacute;n Social: </label></td>
            <td width="233" align="left"><input name="nombre" type="text" size="22" value="<?php echo $nombre; ?>" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Rut:</label></td>
            <td align="left"><input name="rut" type="text" size="9" value="<?php echo $rut; ?>" /> &#8212; <input name="rut_digit" type="text" size="1" value="<?php echo $rut_digit; ?>" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Direcci&oacute;n: </label></td>
            <td align="left"><input name="direccion" type="text" size="22" value="<?php echo $direccion; ?>" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Giro:</label></td>
            <td align="left"><input name="giro" type="text" size="22" value="<?php echo $giro; ?>" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Representante Legal: </label></td>
            <td align="left"><input name="rep_legal" type="text" size="22" value="<?php echo $rep_legal; ?>" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Rut Representante Legal: </label></td>
            <td align="left"><input name="rut_rep_legal" type="text" size="9" value="<?php echo $rut_rep_legal; ?>" />  &#8212; <input name="rut_digit_rep_legal" type="text" size="1" value="<?php echo $rut_digit_rep_legal; ?>" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Tel&eacute;fono: </label></td>
            <td align="left"><input name="telefono" type="text" size="22" value="<?php echo $telefono; ?>" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Fax: </label></td>
            <td align="left"><input name="fax" type="text" size="22" value="<?php echo $fax; ?>" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Correo Electr&oacute;nico: </label></td>
            <td align="left"><input name="email" type="text" size="22" value="<?php echo $email; ?>" /> <?php echo draw_req(); ?></td>
          </tr>
        </table>

        <h2>Productos <span class="requerido">[Obligatorio: Al menos uno]</span></h2>
        <table width="400" align="center">
          <tr valign="top">
            <td width="5%" align="center">&nbsp;</td>
            <td width="50%" align="left">
              <label>Agua Soda 500 c.c. </label>
            </td>
            <td width="45%" align="left">
              Cantidad: <input name="soda500cant" type="text" size="3" value="<?php echo $soda500cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Pura 500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura500cant" type="text" size="3" value="<?php echo $pura500cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Soda 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="soda1500cant" type="text" size="3" value="<?php echo $soda1500cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Pura 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura1500cant" type="text" size="3" value="<?php echo $pura1500cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Soda Sif&oacute;n 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="sifon1500cant" type="text" size="3" value="<?php echo $sifon1500cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Pura 5 litros. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura5000cant" type="text" size="3" value="<?php echo $pura5000cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Pura 12 litros.</label>
            </td>
            <td align="left">
              Cantidad: <input name="pura12000cant" type="text" size="3" value="<?php echo $pura12000cant; ?>" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left">
              <label>Agua Pura 20 litros.</label>
            </td>
            <td align="left">
              Cantidad: <input name="pura20000cant" type="text" size="3" value="<?php echo $pura20000cant; ?>" />
            </td>
          </tr>
        </table>


       <h2>Observaciones</h2>
       <table width="400" align="center">
          <tr valign="top">
            <td width="132" align="right" valign="top"> <label>Observaciones:</label> <?php echo draw_opc(); ?></td>
            <td width="316" align="left"><textarea name="mensaje" cols="35" rows="12"><?php echo $mensaje; ?></textarea></td>
          </tr>
          <tr valign="top">
            <td colspan="2">
              <div align="center">
                <input type="submit" value="Enviar" name="submit" />
            </div></td>
          </tr>
        </table>
      </fieldset>
        </form>

<?php

       }
       else {

         if(isset($_POST['submit'])){
           $tabla = $pre."conf";
           $datos = mysql_query("SELECT conf_mail FROM ".$tabla."") or die(mysql_error());
             for($j=0; $j<mysql_num_rows($datos); $j++) {
             $conf_mail = str_output(mysql_result($datos,$j,"conf_mail"));
           }

           $para = $conf_mail;
           $asunto = "Pedido desde el sitio Web";





$all = '<table>
  <tr>
    <td colspan="2"><h2>Pedido en l&iacute;nea </h2></td>
  </tr>
  <tr>
    <td align="right"><strong>Nombre: </strong></div></td>
    <td>'.$nombre.'</td>

  </tr>
  <tr>
    <td align="right"><strong>Rut:</strong></div></td>
    <td>'.$rut.' - '.$rut_digit.' </td>

  </tr>
  <tr>
    <td align="right"><strong>Direcci&oacute;n: </strong></td>
    <td>'.$direccion.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Giro: </strong></td>
    <td>'.$giro.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Representante Legal: </strong></td>
    <td>'.$rep_legal.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Rut Representante Legal: </strong></td>
    <td>'.$rut_rep_legal.' - '.$rut_digit_rep_legal.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Tel&eacute;fono: </strong></td>
    <td>'.$telefono.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Fax: </strong></td>
    <td>'.$fax.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Correo Electr&oacute;nico </strong></td>
    <td>'.$email.'</td>
  </tr>

  <tr>
    <td colspan="2"><h2>Productos</h2></td>
  </tr>


  <tr>
    <td align="right"><strong>Agua Soda 500 c.c. </strong></td>
    <td>'.$soda500cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Pura 500 c.c. </strong></td>
    <td>'.$pura500cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Soda 1500 c.c. </strong></td>
    <td>'.$soda1500cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Pura 1500 c.c. </strong></td>
    <td>'.$pura1500cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Soda Sif&oacute;n 1500 c.c. </strong></td>
    <td>'.$sifon1500cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Pura 5 litros. </strong></td>
    <td>'.$pura5000cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Pura 12 litros.</strong></td>
    <td>'.$pura12000cant.'</td>
  </tr>
  <tr>
    <td align="right"><strong>Agua Pura 20 litros</strong></td>
    <td>'.$pura20000cant.'</td>
  </tr>
  <tr>
    <td colspan="2"><h2>Observaciones</h2></td>
  </tr>
  <tr>
    <td colspan="2">'.$mensaje.'</td>
  </tr>
</table>';

           $cuerpo = "From: $email\n Reply-To: $email\n\n\n $all\n\n";

// Para enviar correo HTML, la cabecera Content-type debe definirse
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: '.$para.' ' . "\r\n";
$cabeceras .= 'From: '.$email.' ' . "\r\n";

          if(@mail($para, $asunto, $cuerpo, $cabeceras)){
?>
            <h2>¡Muchas gracias!</h2>
            <p>Su información ha llegado a nuestro correo.</p>
            <p>El pedido le llegará la próxima vez que el distribuidor pase por su hogar.</p>
            <p>También puede contactarnos en a <a href="mailto:contacto@aqua3.cl">contacto@aqua3.cl</a> o por teléfono,
             a los números (032) 222 33 48 - (032) 284 33 16.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
<?php
           }
           else{
?>
            <h2>Error Mail</h2>
            <p><strong>¡Oh, no!</strong></p>
            <p>Ha ocurrido un error. Por favor avise del error a <a href="mailto:contacto@aqua3.cl">contacto@aqua3.cl</a>
            e inténtelo nuevamente más tarde.</p>
            <p>También puede contactarnos por teléfono, a los números (032) 222 33 48 - (032) 284 33 16.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>			
<?php
           }
         }
       }
      break;

    default:
      header('Location: contacto.php');
    }
  }
else{
  echo $txt;
?>
    <form action="<?php echo $phpself; ?>?act=ve" method="post" onsubmit="return ValidaCampos(this)" name="form">

    <fieldset>
      <legend>Pedidos en línea</legend>
        <h2>Identificación </h2>
        <table width="400" align="center" id="contact">
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Nombre Completo <br />o Raz&oacute;n Social: </label></td>
            <td width="233" align="left"><input name="nombre" type="text" size="22" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Rut:</label></td>
            <td align="left"><input name="rut" type="text" size="9" /> &#8212; <input name="rut_digit" type="text" size="1" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td width="155" align="right" valign="middle"><label>Direcci&oacute;n: </label></td>
            <td align="left"><input name="direccion" type="text" size="22" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Giro:</label></td>
            <td align="left"><input name="giro" type="text" size="22" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Representante Legal: </label></td>
            <td align="left"><input name="rep_legal" type="text" size="22" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Rut Representante Legal: </label></td>
            <td align="left"><input name="rut_rep_legal" type="text" size="9" /> &#8212; <input name="rut_digit_rep_legal" type="text" size="1" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Tel&eacute;fono: </label></td>
            <td align="left"><input name="telefono" type="text" size="22" /> <?php echo draw_req(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Fax: </label></td>
            <td align="left"><input name="fax" type="text" size="22" /> <?php echo draw_opc(); ?></td>
          </tr>
          <tr valign="top">
            <td align="right" valign="middle"><label>Correo Electr&oacute;nico: </label></td>
            <td align="left"><input name="email" type="text" size="22" /> <?php echo draw_req(); ?></td>
          </tr>
        </table>

        <h2>Productos <span class="requerido">[Obligatorio: Al menos uno]</span></h2>
        <table width="400" align="center">
          <tr valign="top">
            <td width="5%" align="center">&nbsp;</td>
            <td width="50%" align="left" valign="middle">
              <label>Agua Soda 500 c.c. </label>
            </td>
            <td width="45%" align="left">
              Cantidad: <input name="soda500cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Pura 500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura500cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Soda 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="soda1500cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Pura 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura1500cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Soda Sif&oacute;n 1500 c.c. </label>
            </td>
            <td align="left">
              Cantidad: <input name="sifon1500cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Pura 5 litros. </label>
            </td>
            <td align="left">
              Cantidad: <input name="pura5000cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Pura 12 litros.</label>
            </td>
            <td align="left">
              Cantidad: <input name="pura12000cant" type="text" size="3" />
            </td>
          </tr>
          <tr valign="top">
            <td align="center">&nbsp;</td>
            <td align="left" valign="middle">
              <label>Agua Pura 20 litros.</label>
            </td>
            <td align="left">
              Cantidad: <input name="pura20000cant" type="text" size="3" />
            </td>
          </tr>
        </table>


       <h2>Observaciones</h2>
       <table width="400" align="center">
          <tr valign="top">
            <td width="132" align="right" valign="top"> <label>Observaciones:</label> <?php echo draw_opc(); ?></td>
            <td width="316" align="left"><textarea name="mensaje" cols="35" rows="12"></textarea></td>
          </tr>
          <tr valign="top">
            <td colspan="2">
              <div align="center">
                <input type="submit" value="Enviar" name="submit" />
            </div></td>
          </tr>
        </table>
      </fieldset>
        </form>
<?php
  }
?>

    </div>
</div>
<?php include('menu.inc.php'); ?>
<?php include('side.inc.php'); ?>
<?php disp_footer($pre); ?>