<?php
  $url_images_folder_prod = "./productos/";
  $url_thumbs_folder_prod = $url_images_folder_prod."thumbs/";
  $url_images_folder_serv = "./servicios/";
  $url_thumbs_folder_serv = $url_images_folder_serv."thumbs/";
?>

        <div class="side">
<?php




/* Mostrar categorías de servicios */
  if ($self == 'servicios'){
     $cat_servicios = mysql_query("SELECT ".$pre."serv.serv_cat,".$pre."cat.cat_id,".$pre."cat.cat_servicios FROM ".$pre."cat,".$pre."serv WHERE ".$pre."serv.serv_cat = ".$pre."cat.cat_id AND cat_servicios IS NOT NULL AND ".$pre."serv.serv_pub = 'si' ORDER BY cat_id") or die(mysql_error());
        for($j=0; $j<mysql_num_rows($cat_servicios); ++$j) {
          $cat_id = mysql_result($cat_servicios,$j,"cat_id");
          $cat_serv[$cat_id] = str_output(mysql_result($cat_servicios,$j,"cat_servicios"));
        }
  $num_rows = mysql_num_rows($cat_servicios);
    if ($num_rows == 0) {
          $content_cat .= "\n<div class=\"box_warning\">";
          $content_cat .= "\nError. No hay servicios!<br />";
          $content_cat .= "\n</div>";
          echo $content_cat;
    }
    else{
      for($j=0; $j<$num_rows; ++$j) {
        $categoria_id .= mysql_result($cat_servicios,$j,"cat_id")."_";
        $cat_serv[$j] = mysql_result($cat_servicios,$j,"cat_servicios");
      }
      $cat_id = explode(" ",trim(str_replace('_', ' ', $categoria_id)));
      $cat_id = array_unique($cat_id);
      if (count($cat_id)===1){}
      else{
?>

          <h3>Categorías</h3>

            <ul>
<?php
        foreach ($cat_id as $key => $value) {
            $value;
          foreach ($cat_serv as $llave => $valor){
            if($key == $llave){
              echo "<li><a href=\"servicios.php?&amp;cat=$value\">$valor</a></li>\n";
            }
          }
        }

?>
            </ul>

<?php }
    }
  }
?>
        </div>
        <div class="side">
<?php
/* Mostrar categorías de productos */
  if ($self == 'productos'){
     $cat_productos = mysql_query("SELECT ".$pre."prod.prod_cat,".$pre."cat.cat_id,".$pre."cat.cat_productos FROM ".$pre."cat,".$pre."prod WHERE ".$pre."prod.prod_cat = ".$pre."cat.cat_id AND cat_productos IS NOT NULL AND ".$pre."prod.prod_pub = 'si' ORDER BY cat_id") or die(mysql_error());
        for($j=0; $j<mysql_num_rows($cat_productos); ++$j) {
          $cat_id = mysql_result($cat_productos,$j,"cat_id");
          $cat_prod[$cat_id] = str_output(mysql_result($cat_productos,$j,"cat_productos"));
        }
  $num_rows = mysql_num_rows($cat_productos);
    if ($num_rows == 0) {
          $content_cat .= "\n<div class=\"box_warning\">";
          $content_cat .= "\nError. No hay productos!<br />";
          $content_cat .= "\n</div>";
          echo $content_cat;
    }
    else{
      for($j=0; $j<$num_rows; ++$j) {
        $categoria_id .= mysql_result($cat_productos,$j,"cat_id")."_";
        $cat_prod[$j] = mysql_result($cat_productos,$j,"cat_productos");
      }
      $cat_id = explode(" ",trim(str_replace('_', ' ', $categoria_id)));
      $cat_id = array_unique($cat_id);
      if (count($cat_id)===1){}
      else{
?>

          <h3>Categorías</h3>

            <ul>
<?php
        foreach ($cat_id as $key => $value) {
            $value;
          foreach ($cat_prod as $llave => $valor){
            if($key == $llave){
              echo "<li><a href=\"productos.php?&amp;cat=$value\">$valor</a></li>\n";
            }
          }
        }

?>
            </ul>

<?php }
    }
  }
?>
        </div>
        <div class="side">
<?php
/* Mostrar productos destacados */
  $datos = mysql_query("SELECT prod_id FROM ".$pre."prod ") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {}
  else {
      $datos = mysql_query("SELECT * FROM ".$pre."prod WHERE prod_pub='si' AND prod_dest='si' ORDER BY RAND() LIMIT 1") or die(mysql_error());

      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"prod_id");
          $prod_nombre = str_output(mysql_result($datos,$j,"prod_nombre"));
          $prod_imagen = str_output(mysql_result($datos,$j,"prod_imagen"));
          $prod_cat = str_output(mysql_result($datos,$j,"prod_cat"));

?>
        <h3>Productos Destacados</h3>
          <div align="center" class="sidebox"><br />
            <a href="productos.php" title="<?php echo $prod_nombre; ?>">
            <img src="<?php echo $url_thumbs_folder_prod.$prod_imagen; ?>" border="0" alt="<?php echo $prod_nombre; ?>" /></a>
            <p><a href="productos.php" title="<?php echo $prod_nombre; ?>"><?php echo $prod_nombre; ?></a></p>
          </div>

<?php
          }
  }
?>
        </div>
        <div class="side">
<?php
/* Mostrar servicios destacados */
  $datos = mysql_query("SELECT serv_id FROM ".$pre."serv ") or die(mysql_error());
  if (mysql_num_rows($datos) == 0) {}
  else {
      $datos = mysql_query("SELECT * FROM ".$pre."serv WHERE serv_pub='si' AND serv_dest='si' ORDER BY RAND() LIMIT 1") or die(mysql_error());

      $num_rows = mysql_num_rows($datos);
      for($j=0; $j<$num_rows; ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $id = mysql_result($datos,$j,"serv_id");
          $serv_nombre = str_output(mysql_result($datos,$j,"serv_nombre"));
          $serv_imagen = str_output(mysql_result($datos,$j,"serv_imagen"));
          $serv_cat = str_output(mysql_result($datos,$j,"serv_cat"));

?>
        <h3>Servicios Destacados</h3>
          <div align="center" class="sidebox"><br />
            <a href="servicios.php" title="<?php echo $serv_nombre; ?>">
            <img src="<?php echo $url_thumbs_folder_serv.$serv_imagen; ?>" border="0" alt="<?php echo $serv_nombre; ?>" /></a>
            <p><a href="servicios.php" title="<?php echo $serv_nombre; ?>"><?php echo $serv_nombre; ?></a></p>
          </div>

<?php
          }
  }

?>

        </div>
        <div class="side">
<?php
/* Mostrar Sindicación RSS */
$rss_self = $self.".xml";
    if(file_exists($rss_self)){
      $rss_host = 'http://'.$_SERVER['HTTP_HOST'];
      $cadena = implode('/',explode('/',strrev(strstr(strrev($_SERVER['SCRIPT_NAME']),'/')),-1));
      $url = $rss_host.$cadena.'/'.$rss_self;
      //echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"".$url."\" />\n";
?>
        <h3>Sindicación RSS</h3>
        <div align="center"><br />
            <a href="<?php echo $url; ?>" title="Sindicación RSS">
            <img src="img/rss.png" border="0" alt="Sindicación RSS" />
            <strong>Sindicación RSS</strong></a></div>

<?php

    }
?>
       </div>