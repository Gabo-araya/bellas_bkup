<?php
include('inc.inc.php');
$self = str_replace(".","",strrev(strrchr(strrev(basename($_SERVER['PHP_SELF'])),".")));
$title = ucfirst($self);
$section = "serv";
$tabla = $pre.$section;

  $date =time ();

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
                '3' => 'Miércoles',
                '4' => 'Jueves',
                '5' => 'Viernes',
                '6' => 'Sábado',
                '7' => 'Domingo');

  $hoy = date('d', $date);
  $dia_hoy = date('N', $date);
  $mes = date('m', $date);
  $anio = date('Y', $date);
  $hora = date('H', $date);
  $minut = date('i', $date);

disp_header($pre,$title);

   if (isset($_GET['cat'])){$categ_id = str_input($_GET['cat']);}
   else {$categ_id='1';}
// obtener el valor de $st para paginacion
if(isset($_GET['st'])){$st = str_input($_GET['st']);} else{$st = 0;}

//$secc_princ = mysql_query("SELECT ".$secc." FROM ".$pre."info") or die(mysql_error());
//  $txt = str_output(mysql_result($secc_princ,0,$secc));


// Categorías de productos
     $cat_servicios = mysql_query("SELECT cat_id,cat_servicios FROM ".$pre."cat WHERE cat_servicios IS NOT NULL ORDER BY cat_id") or die(mysql_error());
        for($j=0; $j<mysql_num_rows($cat_servicios); ++$j) {
          $cat_id = mysql_result($cat_servicios,$j,"cat_id");
          $cat_serv[$cat_id] = str_output(mysql_result($cat_servicios,$j,"cat_servicios"));
        }
      asort($cat_serv);
      //echo disp_array_asoc($cat_serv);
/*  $bin_array = array('si' => 'Sí','no' => 'No');      */

  $url_images_folder = "./".str_replace(".","",strrev(strrchr(strrev(basename($_SERVER['PHP_SELF'])),".")))."/";
  $url_thumbs_folder = $url_images_folder."thumbs/";

?>
<div id="content">
      <?php if (!empty($_SESSION)) {echo "<div class=\"box_warning\">".disp_array_asoc($_SESSION)."</div>";} ?>

<?php
    if (isset($_GET['serv_id'])){$secc_name = "Destacados";}
    else {foreach ($cat_serv as $key => $value) {if ($key == $categ_id) {$secc_name = $value;}}}
?>
  <h1><?php echo $secc_name; ?></h1>
    <div class="article">
    <p>Centro de Estética Bella's, ha preparado los siguientes servicios pensando en la satisfacción de sus clientes y clientas.</p>
<?php

  $datos = mysql_query("SELECT serv_id FROM ".$tabla." WHERE serv_cat='".$categ_id."' AND serv_pub='si'") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {
    draw_noitems();
  }
  else {
    if (isset($_GET['serv_id'])){
      $serv_id = str_input($_GET['serv_id']);
      $datos = mysql_query("SELECT * FROM ".$tabla." WHERE serv_id='".$serv_id."' AND serv_pub='si'") or die(mysql_error());
      $total = 1;
    }
    else {
  $datos = mysql_query("SELECT COUNT(*) FROM ".$tabla." WHERE serv_cat='".$categ_id."' AND serv_pub='si'") or die(mysql_error());
  $total = mysql_result($datos,0);
  $datos = mysql_query("SELECT * FROM ".$tabla." WHERE serv_cat='".$categ_id."' AND serv_pub='si' ORDER BY serv_id DESC LIMIT ".$st.",".$pp_pub."") or die(mysql_error());
    }

      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"serv_id");
          $serv_nombre = str_output(mysql_result($datos,$j,"serv_nombre"));
          $serv_imagen = str_output(mysql_result($datos,$j,"serv_imagen"));
          $serv_resena = str_output(mysql_result($datos,$j,"serv_resena"));
          $serv_cat = str_output(mysql_result($datos,$j,"serv_cat"));
          $serv_pub = str_output(mysql_result($datos,$j,"serv_pub"));
          $serv_dest = str_output(mysql_result($datos,$j,"serv_dest"));
          $serv_fecha = str_output(mysql_result($datos,$j,"serv_fecha"));

      $nombre_serv_dia = date('N',$serv_fecha);
      $serv_mes = date("m",$serv_fecha);
      $serv_dia = date("d",$serv_fecha);
      $serv_anio = date("Y",$serv_fecha);

      foreach ($dias as $key => $value) { if ($key == $nombre_serv_dia) {$fecha = $value.", ";} }
      $fecha .= $serv_dia;
      $fecha .= " de ";
      foreach ($meses as $key => $value) { if ($key == $serv_mes) {$fecha .= $value;} }
      $fecha .= " de ".$serv_anio;
?>


<div align="left">
<table width="90%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"> <h2><?php echo $serv_nombre; ?></h2></td>
  </tr>
  <tr>
    <td valign="top" width="140" align="center">
              <a href="<?php echo $url_images_folder."index.php?&amp;act=v&amp;f=".$serv_imagen; ?>" title="<?php echo $serv_nombre; ?>">
              <img src="<?php echo $url_thumbs_folder.$serv_imagen; ?>" border="0" align="center" alt="<?php echo $serv_nombre; ?>" /></a>
    </td>
    <td valign="top">

              <div class="descripcion"><?php echo $serv_resena; ?></div>
    </td>
  </tr>
</table>
</div>

<?php     }
    echo paginar($total,$pp_pub,$st,$thisurl."?&amp;cat=".$categ_id."&amp;st=");
  }
?>
     </div>
</div>
<?php include('menu.inc.php'); ?>
<?php include('side.inc.php'); ?>

<?php disp_footer($pre); ?>