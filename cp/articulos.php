<?php
session_start();
ob_start();
include('inc/inc.inc.php');
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Pearl Jam') {
  $_SESSION = array();
  header('Location: index.php');
  exit;
}
if (!isset($_SESSION['type'])) {
  $_SESSION = array();
  header('Location: index.php');
  exit;
}
$title = "Articulos";
disp_header_admin($pre,$title);
include('inc/menu_admin.inc.php');
$tabla = $pre."artic";

// obtener el valor de $st para paginacion
if(isset($_GET['st'])){$st = str_input($_GET['st']);} else{$st = 0;}

// Categor�as de articulos
      $cat_articulos = mysql_query("SELECT cat_id,cat_articulos FROM ".$pre."cat WHERE cat_articulos IS NOT NULL ORDER BY cat_id") or die(mysql_error());
        for($j=0; $j<mysql_num_rows($cat_articulos); ++$j) {
          $cat_id = mysql_result($cat_articulos,$j,"cat_id");
          $cat_artic[$cat_id] = str_output(mysql_result($cat_articulos,$j,"cat_articulos"));
        }
      asort($cat_artic);
      //echo disp_array_asoc($cat_artic);

  $bin_array = array('si' => 'S�','no' => 'No');

  $date = time();

  $meses = array('1' => 'Enero',
                 '2' => 'Febrero',
                 '3' => 'Marzo',
                 '4' => 'Abril',
                 '5' => 'Mayo',
                 '6' => 'Junio',
                 '7' => 'Julio',
                 '8' => 'Agosto',
                 '9' => 'Septiembre',
                 '10' => 'Octubre',
                 '11' => 'Noviembre',
                 '12' => 'Diciembre');

  $dias = array('1' => 'Lunes',
                '2' => 'Martes',
                '3' => 'Mi�rcoles',
                '4' => 'Jueves',
                '5' => 'Viernes',
                '6' => 'S�bado',
                '7' => 'Domingo');

  $hoy = date('d', $date);
  $dia_hoy = date('N', $date);
  $mes = date('m', $date);
  $anio = date('Y', $date);
  $hora = date('H', $date);
  $minut = date('i', $date);

disp_inicio_info($title,'articulos');

  if (isset($_GET['act'])
      AND ($_GET['act'] == 'n'
      OR $_GET['act'] == 'vn'
      OR $_GET['act'] == 'm'
      OR $_GET['act'] == 'vm'
      OR $_GET['act'] == 'ce'
      OR $_GET['act'] == 'e'
      OR $_GET['act'] == 'p'
      OR $_GET['act'] == 'dp'
      OR $_GET['act'] == 'vp'
      OR $_GET['act'] == 'vnp'
      OR $_GET['act'] == 'd'
      OR $_GET['act'] == 'nd'
      OR $_GET['act'] == 'vd'
      OR $_GET['act'] == 'vnd'
      OR $_GET['act'] == 'v')){}
   else {draw_additem("Art�culo");}

if (isset($_GET['act'])){
  switch ($_GET['act']){
//Elemento Nuevo
    case 'n': ?>
    <form action="<?php echo $phpself; ?>?&amp;act=vn" method="post">
    <fieldset>
      <legend>Agregar <?php echo $title; ?> </legend>
      <table width="100%"  border="0"  align="center">
      <?php echo draw_input("Nombre: ",'artic_nombre','text','','','table_horiz',50,'req'); ?>
      <?php echo draw_select("Categor�a: ",'artic_cat',$cat_artic,'','table_horiz','','req'); ?>
      <?php echo draw_select("Publicar: ",'artic_pub',$bin_array,'','table_horiz','','req'); ?>
      <?php echo draw_select("Destacado: ",'artic_dest',$bin_array,'','table_horiz','','req'); ?>
      <tr>
        <td align="right"><label>Fecha: </label></td>
        <td><?php echo draw_input('','artic_dia','text',$hoy,'','',2)."de".draw_select('','artic_mes',$meses,$mes,'','')."de".draw_input('','artic_anio','text',$anio,'','',2).draw_req(); ?>
        </td>
      </tr>
      <tr>
        <td align="right"><label for="artic_resena">Rese�a: </label></td>
        <td>&nbsp;<?php echo draw_req(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_resena','',60,20); ?></td>
      </tr>
      <tr>
        <td align="right"><label for="artic_text">Texto: </label></td>
        <td>&nbsp;<?php echo draw_opc(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_text','',60,20); ?></td>
      </tr>
      </table>
      <div align="center"><br /><?php echo draw_input('','submit','submit','Agregar'); ?></div>
    </fieldset>
    </form>
<?php break;

//Validaci�n de Elemento Nuevo
    case 'vn':
      $artic_nombre = str_input($_POST['artic_nombre']);
      $artic_resena = str_input($_POST['artic_resena']);
      $artic_text = str_input($_POST['artic_text']);
      $artic_cat = str_input($_POST['artic_cat']);
      $artic_pub = str_input($_POST['artic_pub']);
      $artic_dest = str_input($_POST['artic_dest']);
      if (empty($_POST['artic_dia'])){$artic_dia = $hoy;} else {$artic_dia = str_input($_POST['artic_dia']);}
      if (empty($_POST['artic_mes'])){$artic_mes = $mes;} else {$artic_mes = str_input($_POST['artic_mes']);}
      if (empty($_POST['artic_anio'])){$artic_anio = $anio;} else {$artic_anio = str_input($_POST['artic_anio']);}

      $artic_fecha = mktime(1,0,0,$artic_mes,$artic_dia,$artic_anio);

      if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){
        if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){$validation .= "<div class=\"box_validation\">";}
        if (empty($artic_nombre)) $validation .= "Debe escribir un nombre para el art�culo.<br />";
        if (empty($artic_cat)) $validation .= "Debe seleccionar una categor�a para el art�culo.<br />";
        if (empty($artic_pub)) $validation .= "Debe seleccionar si el art�culo ser� publicado o no.<br />";
        if (empty($artic_dest)) $validation .= "Debe seleccionar si el art�culo ser� destacado o no.<br />";
        if (empty($artic_resena)) $validation .= "Debe incorporar una rese�a para el art�culo. <br />";
        if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){$validation .= "</div>";}
        echo $validation;

    $diasmes = date('t',mktime(0,0,0,$artic_mes,1,$artic_anio));
    if ($diasmes<$artic_dia){
      echo "<div class=\"box_validation\">El mes ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {echo $value;} }
      echo " tiene $diasmes d�as. <br />
      Revise su calendario e int�ntelo nuevamente.</div>";
      echo "<form action=\"".$phpself."\" method=\"POST\">
      <div align=\"center\"><br /><input type=\"submit\" value=\"Continuar &raquo;\" /></div></form>";
      exit;
      }

?>
    <form action="<?php echo $phpself; ?>?&amp;act=vn" method="post">
    <fieldset>
      <legend>Agregar <?php echo $title; ?> </legend>
      <table width="100%"  border="0"  align="center">
      <?php echo draw_input("Nombre: ",'artic_nombre','text',$artic_nombre,'','table_horiz',50,'req'); ?>
      <?php echo draw_select("Categor�a: ",'artic_cat',$cat_artic,$artic_cat,'table_horiz','','req'); ?>
      <?php echo draw_select("Publicar: ",'artic_pub',$bin_array,$artic_pub,'table_horiz','','req'); ?>
      <?php echo draw_select("Destacado: ",'artic_dest',$bin_array,$artic_dest,'table_horiz','','req'); ?>
      <tr>
        <td align="right"><label>Fecha: </label></td>
        <td><?php echo draw_input('','artic_dia','text',$artic_dia,'','',2)."de".draw_select('','artic_mes',$meses,$artic_mes,'','')."de".draw_input('','artic_anio','text',$artic_anio,'','',2).draw_req(); ?>
        </td>
      </tr>
      <tr>
        <td align="right"><label for="artic_resena">Rese�a: </label></td>
        <td>&nbsp;<?php echo draw_req(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_resena',$artic_resena,60,20); ?></td>
      </tr>
      <tr>
        <td align="right"><label for="artic_text">Texto: </label></td>
        <td>&nbsp;<?php echo draw_opc(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_text',$artic_text,60,20); ?></td>
      </tr>
      </table>
      <div align="center"><br /><?php echo draw_input('','submit','submit','Agregar'); ?></div>
    </fieldset>
    </form>
<?php
      }
      else {
// Insertar
        if ($_SERVER['REQUEST_METHOD']=='POST'){
              $sql_data = array('artic_nombre' => $artic_nombre,
                                'artic_text' => $artic_text,
                                'artic_resena' => $artic_resena,
                                'artic_fecha' => $artic_fecha,
                                'artic_cat' => $artic_cat,
                                'artic_pub' => $artic_pub,
                                'artic_dest' => $artic_dest);
              //disp_array_asoc($sql_data);
              sql_input($tabla,$sql_data,'insert','');

        echo "<form action=\"".$phpself."\" method=\"POST\">
        <div align=\"center\"><br /><input type=\"submit\" value=\"Continuar &raquo;\" /></div></form>";
      }
    }
      break;

//Modificaci�n
    case 'm':
    $id = str_input($_GET['id']);
    $datos = mysql_query("SELECT * FROM ".$tabla." WHERE artic_id=".$id."") or die(mysql_error());
      $artic_nombre = str_output(mysql_result($datos,0,'artic_nombre'));
      $artic_resena = str_output(mysql_result($datos,0,'artic_resena'));
      $artic_text = str_output(mysql_result($datos,0,'artic_text'));
      $artic_pub = str_output(mysql_result($datos,0,'artic_pub'));
      $artic_cat = str_output(mysql_result($datos,0,'artic_cat'));
      $artic_dest = str_output(mysql_result($datos,0,'artic_dest'));
      $artic_fecha = str_output(mysql_result($datos,0,'artic_fecha'));
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

// draw_select($label,$name,$data_select,$selected,$param,'',req)
?>
    <form action="<?php echo $phpself; ?>?&amp;act=vm" method="post">
    <fieldset>
      <legend>Modificar <?php echo $title; ?> </legend>
      <table width="100%"  border="0"  align="center">
      <?php echo draw_input("Nombre: ",'artic_nombre','text',$artic_nombre,'','table_horiz',50,'req'); ?>
      <?php echo draw_select("Categor�a: ",'artic_cat',$cat_artic,$artic_cat,'table_horiz','','req'); ?>
      <?php echo draw_select("Publicar: ",'artic_pub',$bin_array,$artic_pub,'table_horiz','','req'); ?>
      <?php echo draw_select("Destacado: ",'artic_dest',$bin_array,$artic_dest,'table_horiz','','req'); ?>
      <tr>
        <td align="right"><label>Fecha: </label></td>
        <td><?php echo draw_input('','artic_dia','text',$artic_dia,'','',2)."de".draw_select('','artic_mes',$meses,$artic_mes,'','')."de".draw_input('','artic_anio','text',$artic_anio,'','',2).draw_req(); ?>
        </td>
      </tr>
      <tr>
        <td align="right"><label for="artic_resena">Rese�a: </label></td>
        <td>&nbsp;<?php echo draw_req(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_resena',$artic_resena,60,20); ?></td>
      </tr>
      <tr>
        <td align="right"><label for="artic_text">Texto: </label></td>
        <td>&nbsp;<?php echo draw_opc(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_text',$artic_text,60,20); ?></td>
      </tr>
      </table>
      <?php echo draw_input('','id','hidden',$id,'','','',''); ?>
      <div align="center"><br /><?php echo draw_input('','submit','submit','Modificar'); ?></div>
    </fieldset>
    </form>
<?php break;

    case 'vm':
//Validaci�n de Modificaci�n
    //c�digo de validaci�n de modificaci�n de elemento
      $id = str_input($_POST['id']);
      $artic_nombre = str_input($_POST['artic_nombre']);
      $artic_resena = str_input($_POST['artic_resena']);
      $artic_text = str_input($_POST['artic_text']);
      $artic_cat = str_input($_POST['artic_cat']);
      $artic_pub = str_input($_POST['artic_pub']);
      $artic_dest = str_input($_POST['artic_dest']);
      if (empty($_POST['artic_dia'])){$artic_dia = $hoy;} else {$artic_dia = str_input($_POST['artic_dia']);}
      if (empty($_POST['artic_mes'])){$artic_mes = $mes;} else {$artic_mes = str_input($_POST['artic_mes']);}
      if (empty($_POST['artic_anio'])){$artic_anio = $anio;} else {$artic_anio = str_input($_POST['artic_anio']);}

      $artic_fecha = mktime(1,0,0,$artic_mes,$artic_dia,$artic_anio);

      if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){
        if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){$validation .= "<div class=\"box_validation\">";}
        if (empty($artic_nombre)) $validation .= "Debe escribir un nombre para el producto.<br />";
        if (empty($artic_cat)) $validation .= "Debe seleccionar una categor�a para el producto.<br />";
        if (empty($artic_pub)) $validation .= "Debe seleccionar si el producto ser� publicado o no.<br />";
        if (empty($artic_dest)) $validation .= "Debe seleccionar si el producto ser� destacado o no.<br />";
        if (empty($artic_resena)) $validation .= "Debe incorporar una rese�a para el art�culo. <br />";
        if (empty($artic_nombre) OR empty($artic_resena) OR empty($artic_cat) OR empty($artic_pub) OR empty($artic_dest)){$validation .= "</div>";}
        echo $validation;

    $diasmes = date('t',mktime(0,0,0,$artic_mes,1,$artic_anio));
    if ($diasmes<$artic_dia){
      echo "<div class=\"box_validation\">El mes ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {echo $value;} }
      echo " tiene $diasmes d�as. <br />
      Revise su calendario e int�ntelo nuevamente.</div>";
      echo "<form action=\"".$phpself."\" method=\"POST\">
      <div align=\"center\"><br /><input type=\"submit\" value=\"Continuar &raquo;\" /></div></form>";
      exit;
      }
?>
    <form action="<?php echo $phpself; ?>?&amp;act=vm" method="post">
    <fieldset>
      <legend>Modificar <?php echo $title; ?> </legend>
      <table width="100%"  border="0"  align="center">
      <?php echo draw_input("Nombre: ",'artic_nombre','text',$artic_nombre,'','table_horiz',50,'req'); ?>
      <?php echo draw_select("Categor�a: ",'artic_cat',$cat_artic,$artic_cat,'table_horiz','','req'); ?>
      <?php echo draw_select("Publicar: ",'artic_pub',$bin_array,$artic_pub,'table_horiz','','req'); ?>
      <?php echo draw_select("Destacado: ",'artic_dest',$bin_array,$artic_dest,'table_horiz','','req'); ?>
      <tr>
        <td align="right"><label>Fecha: </label></td>
        <td><?php echo draw_input('','artic_dia','text',$artic_dia,'','',2)."de".draw_select('','artic_mes',$meses,$artic_mes,'','')."de".draw_input('','artic_anio','text',$artic_anio,'','',2).draw_req(); ?>
        </td>
      </tr>
      <tr>
        <td align="right"><label for="artic_resena">Rese�a: </label></td>
        <td>&nbsp;<?php echo draw_req(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_resena',$artic_resena,60,20); ?></td>
      </tr>
      <tr>
        <td align="right"><label for="artic_text">Texto: </label></td>
        <td>&nbsp;<?php echo draw_opc(); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><?php echo draw_textarea('artic_text',$artic_text,60,20); ?></td>
      </tr>
      </table>
      <?php echo draw_input('','id','hidden','$id','','','',''); ?>
      <div align="center"><br /><?php echo draw_input('','submit','submit','Agregar'); ?></div>
    </fieldset>
    </form>
<?php
      }
      else {

              $sql_data = array('artic_nombre' => $artic_nombre,
                                'artic_text' => $artic_text,
                                'artic_resena' => $artic_resena,
                                'artic_fecha' => $artic_fecha,
                                'artic_cat' => $artic_cat,
                                'artic_pub' => $artic_pub,
                                'artic_dest' => $artic_dest);
              //disp_array_asoc($sql_data);
              sql_input($tabla,$sql_data,'update',"artic_idx".$id);
        echo "<form action=\"".$phpself."\" method=\"POST\">
        <div align=\"center\"><br /><input type=\"submit\" value=\"Continuar &raquo;\" /></div></form>";
      }
      break;

    case 'ce':
//Confirmar eliminaci�n
    //c�digo de confirmaci�n de eliminaci�n de elemento
        $id = str_input($_GET['id']);
        $datos = mysql_query("SELECT artic_nombre FROM ".$tabla." WHERE artic_id=".$id."") or die(mysql_error());
          $artic_nombre = str_output(mysql_result($datos,0,"artic_nombre"));

?>
      <fieldset>
        <legend>Eliminar <?php echo $title; ?></legend>
        <div class="box_info">
          <p>�Est� seguro/a que desea eliminar este art�culo?</p>
        </div>
          <div align="center">
          <strong>Nombre del Art�culo:</strong> <?php echo $artic_nombre; ?></p>
          <br /><br />
          <table width="100" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
              <td align="left">
                <form action="<?php echo $phpself; ?>" method="POST"><input type="submit" value="&laquo; No" /></form>
              </td>
              <td>&nbsp;</td>
              <td align="right">
                <form action="<?php echo $phpself; ?>?&amp;act=e" method="POST">
                <?php echo draw_input('','id','hidden',$id,'','','',''); ?>
                <input type="submit" value="S� &raquo;" /></form>
              </td>
            </tr>
          </table>
          </div>
      </fieldset>
<?php
      break;

    case 'e':
//Eliminar imagen y registro
    //c�digo de eliminaci�n de elemento
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $id = str_input($_POST['id']);
          if(mysql_query("DELETE FROM ".$tabla." WHERE artic_id='".$id."'") or die(mysql_error())){
?>
          <div class="box_success">El registro se elimin� exitosamente.</div>
          <form action="<?php echo $phpself; ?>" method="post">
          <div align="center"><br /><input type="submit" value="Continuar &raquo;" /></div></form>
<?php     }
          else { ?>
          <div class="box_error">Ocurri� un error. El registro no se pudo eliminar.</div>
          <form action="<?php echo $phpself; ?>" method="post">
          <div align="center"><br /><input type="submit" value="Continuar &raquo;" /></div></form>
<?php     }
      }
      break;

    case 'p':
//Publicar
    //c�digo de publicaci�n de elemento
      $id = str_input($_GET['id']);
      $sql_data = array('artic_id' => $id,
                        'artic_pub' => 'si');
      sql_input($tabla,$sql_data,'update',"artic_idx".$id,'');
      header("Location: ".$phpself);
      break;

    case 'dp':
//Despublicar
    //c�digo de despublicaci�n de elemento
      $id = str_input($_GET['id']);
      $sql_data = array('artic_id' => $id,
                        'artic_pub' => 'no');
      sql_input($tabla,$sql_data,'update',"artic_idx".$id,'');
      header("Location: ".$phpself);
      break;

    case 'vp':
//Ver publicados
    //c�digo de visualizaci�n de elementos publicados
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla." WHERE artic_pub = 'si'") or die(mysql_error());
  $total = mysql_result($datos,0);

  $datos = mysql_query("SELECT artic_id FROM ".$tabla." WHERE artic_pub = 'si'") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
      $datos = mysql_query("SELECT * FROM ".$tabla."  WHERE artic_pub = 'si' ORDER BY artic_fecha DESC LIMIT ".$st.",".$pp."") or die(mysql_error());
?>
      <fieldset>
        <legend><?php echo $title; ?> Publicados</legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th width="20">N&ordm;</th>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
          <tr>
            <td class="<?php echo $celda; ?>"><?php echo $p; ?></td>
            <td class="<?php echo $celda; ?>">
              <p><strong>T�tulo del Art�culo:</strong>
              <a href="<?php echo $php_self; ?>?&amp;act=v&amp;id=<?php echo $id; ?>" title="Visualizar">
              <?php echo $artic_nombre; ?></a></p>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Publicado:</strong> <?php echo ucfirst($artic_pub_name); ?></p>
              <p><strong>Destacado:</strong> <?php echo ucfirst($artic_dest_name); ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            </td>
<?php disp_icons_artic($celda,$phpself,$id,$artic_pub,$artic_dest); ?>
          </tr>
<?php     } ?>
        </table>
      </fieldset>
      <?php echo paginar($total,$pp,$st,$thisurl."?&amp;act=vp&amp;st="); ?>
<?php  }
      break;

    case 'vnp':
//Ver no publicados
    //c�digo de visualizaci�n de elementos no publicados
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla." WHERE artic_pub = 'no'") or die(mysql_error());
  $total = mysql_result($datos,0);

  $datos = mysql_query("SELECT artic_id FROM ".$tabla." WHERE artic_pub = 'no'") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
      $datos = mysql_query("SELECT * FROM ".$tabla."  WHERE artic_pub = 'no' ORDER BY artic_fecha DESC LIMIT ".$st.",".$pp."") or die(mysql_error());
?>
      <fieldset>
        <legend><?php echo $title; ?> No Publicados</legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th width="20">N&ordm;</th>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
          <tr>
            <td class="<?php echo $celda; ?>"><?php echo $p; ?></td>
            <td class="<?php echo $celda; ?>">
              <p><strong>T�tulo del Art�culo:</strong>
              <a href="<?php echo $php_self; ?>?&amp;act=v&amp;id=<?php echo $id; ?>" title="Visualizar">
              <?php echo $artic_nombre; ?></a></p>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Publicado:</strong> <?php echo ucfirst($artic_pub_name); ?></p>
              <p><strong>Destacado:</strong> <?php echo ucfirst($artic_dest_name); ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            </td>
<?php disp_icons_artic($celda,$phpself,$id,$artic_pub,$artic_dest); ?>
          </tr>
<?php     } ?>
        </table>
      </fieldset>
      <?php echo paginar($total,$pp,$st,$thisurl."?&amp;act=vnp&amp;st="); ?>
<?php  }
      break;

    case 'd':
//Descatados
    //c�digo para destacar un elemento
      $id = str_input($_GET['id']);
      $sql_data = array('artic_id' => $id,
                        'artic_dest' => 'si');
      sql_input($tabla,$sql_data,'update',"artic_idx".$id,'');
      header("Location: ".$phpself);
      break;

    case 'nd':
//No destacados
    //c�digo para quitar destacaci�n de un elemento
      $id = str_input($_GET['id']);
      $sql_data = array('artic_id' => $id,
                        'artic_dest' => 'no');
      sql_input($tabla,$sql_data,'update',"artic_idx".$id,'');
      header("Location: ".$phpself);
      break;

    case 'vd':
//Ver destacados
    //c�digo de visualizaci�n de elementos destacados
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla." WHERE artic_dest = 'si'") or die(mysql_error());
  $total = mysql_result($datos,0);

  $datos = mysql_query("SELECT artic_id FROM ".$tabla." WHERE artic_dest = 'si'") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
      $datos = mysql_query("SELECT * FROM ".$tabla."  WHERE artic_dest = 'si' ORDER BY artic_fecha DESC LIMIT ".$st.",".$pp."") or die(mysql_error());
?>
      <fieldset>
        <legend><?php echo $title; ?> Destacados</legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th width="20">N&ordm;</th>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
          <tr>
            <td class="<?php echo $celda; ?>"><?php echo $p; ?></td>
            <td class="<?php echo $celda; ?>">
              <p><strong>T�tulo del Art�culo:</strong>
              <a href="<?php echo $php_self; ?>?&amp;act=v&amp;id=<?php echo $id; ?>" title="Visualizar">
              <?php echo $artic_nombre; ?></a></p>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Publicado:</strong> <?php echo ucfirst($artic_pub_name); ?></p>
              <p><strong>Destacado:</strong> <?php echo ucfirst($artic_dest_name); ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            </td>
<?php disp_icons_artic($celda,$phpself,$id,$artic_pub,$artic_dest); ?>
          </tr>
<?php     } ?>
        </table>
      </fieldset>
      <?php echo paginar($total,$pp,$st,$thisurl."?&amp;act=vd&amp;st="); ?>
<?php  }
      break;

    case 'vnd':
//Ver no destacados
    //c�digo de visualizaci�n de elementos no destacados
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla." WHERE artic_dest = 'no'") or die(mysql_error());
  $total = mysql_result($datos,0);

  $datos = mysql_query("SELECT artic_id FROM ".$tabla." WHERE artic_dest = 'no'") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
      $datos = mysql_query("SELECT * FROM ".$tabla."  WHERE artic_dest = 'no' ORDER BY artic_fecha DESC LIMIT ".$st.",".$pp."") or die(mysql_error());
?>
      <fieldset>
        <legend><?php echo $title; ?> No Destacados</legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th width="20">N&ordm;</th>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
          <tr>
            <td class="<?php echo $celda; ?>"><?php echo $p; ?></td>
            <td class="<?php echo $celda; ?>">
              <p><strong>T�tulo del Art�culo:</strong>
              <a href="<?php echo $php_self; ?>?&amp;act=v&amp;id=<?php echo $id; ?>" title="Visualizar">
              <?php echo $artic_nombre; ?></a></p>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Publicado:</strong> <?php echo ucfirst($artic_pub_name); ?></p>
              <p><strong>Destacado:</strong> <?php echo ucfirst($artic_dest_name); ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            </td>
<?php disp_icons_artic($celda,$phpself,$id,$artic_pub,$artic_dest); ?>
          </tr>
<?php     } ?>
        </table>
      </fieldset>
      <?php echo paginar($total,$pp,$st,$thisurl."?&amp;act=vnd&amp;st="); ?>
<?php  }
      break;

    case 'v':
//Visualizar
    //c�digo de visualizaci�n de elementos
      $id = str_input($_GET['id']);
      $datos = mysql_query("SELECT * FROM ".$tabla." WHERE artic_id=".$id."") or die(mysql_error());
?>
      <fieldset>
        <legend>Visualizar <?php echo $title; ?></legend>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
              <h1><?php echo $artic_nombre; ?></h1>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
              <hr />
              <?php echo $artic_resena; ?>
              <hr />
<?php       if (!empty($prod_text)){
               echo $text;
            }
          } ?>
      </fieldset>
<?php
      break;

    default:
      $_SESSION = array();
      header('Location: index.php');
      exit;
    }
  }
else {
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla."") or die(mysql_error());
  $total = mysql_result($datos,0);

  $datos = mysql_query("SELECT artic_id FROM ".$tabla."") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
      $datos = mysql_query("SELECT * FROM ".$tabla." ORDER BY artic_fecha DESC LIMIT ".$st.",".$pp."") or die(mysql_error());
?>
      <fieldset>
        <legend><?php echo $title; ?></legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th width="20">N&ordm;</th>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"artic_id");
          $artic_nombre = str_output(mysql_result($datos,$j,"artic_nombre"));
          $artic_resena = str_output(mysql_result($datos,$j,"artic_resena"));
          $artic_text = str_output(mysql_result($datos,$j,"artic_text"));
          $artic_cat = str_output(mysql_result($datos,$j,"artic_cat"));
          $artic_pub = str_output(mysql_result($datos,$j,"artic_pub"));
          $artic_dest = str_output(mysql_result($datos,$j,"artic_dest"));
          $artic_fecha = str_output(mysql_result($datos,$j,"artic_fecha"));
          $p = $j;
          $p++;

          foreach ($cat_artic as $key => $value) {if ($key == $artic_cat) {$artic_cat_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_pub) {$artic_pub_name = "$value";}}
          foreach ($bin_array as $key => $value) {if ($key == $artic_dest) {$artic_dest_name = "$value";}}

      $nombre_artic_dia = date('N',$artic_fecha);
      $artic_mes = date("m",$artic_fecha);
      $artic_dia = date("d",$artic_fecha);
      $artic_anio = date("Y",$artic_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_artic_dia) {$fecha = $value.", ";} }
      $fecha .= $artic_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $artic_mes) {$fecha .= $value;} }
      $fecha .= " de ".$artic_anio;
?>
          <tr>
            <td class="<?php echo $celda; ?>"><?php echo $p; ?></td>
            <td class="<?php echo $celda; ?>">
              <p><strong>T�tulo del Art�culo:</strong>
              <a href="<?php echo $phpself; ?>?&amp;act=v&amp;id=<?php echo $id; ?>" title="Visualizar">
              <?php echo $artic_nombre; ?></a></p>
              <p><strong>Categor�a:</strong> <?php echo $artic_cat_name; ?></p>
              <p><strong>Publicado:</strong> <?php echo ucfirst($artic_pub_name); ?></p>
              <p><strong>Destacado:</strong> <?php echo ucfirst($artic_dest_name); ?></p>
              <p><strong>Fecha:</strong> <?php echo $fecha; ?></p>
            </td>
<?php disp_icons_artic($celda,$phpself,$id,$artic_pub,$artic_dest); ?>
          </tr>
<?php } ?>
        </table>
      </fieldset>
      <?php echo paginar($total,$pp,$st,$thisurl."?&amp;st="); ?>
<?php
  }
}

  if (isset($_GET['act'])
      AND ($_GET['act'] == 'n'
      OR $_GET['act'] == 'vn'
      OR $_GET['act'] == 'm'
      OR $_GET['act'] == 'vm'
      OR $_GET['act'] == 'ce'
      OR $_GET['act'] == 'e'
      OR $_GET['act'] == 'p'
      OR $_GET['act'] == 'dp'
      OR $_GET['act'] == 'vp'
      OR $_GET['act'] == 'vnp'
      OR $_GET['act'] == 'd'
      OR $_GET['act'] == 'nd'
      OR $_GET['act'] == 'vd'
      OR $_GET['act'] == 'vnd'
      OR $_GET['act'] == 'v')){}
   else {draw_additem("Art�culo");}


  disp_fin_info();
  disp_footer_admin($pre);
?>