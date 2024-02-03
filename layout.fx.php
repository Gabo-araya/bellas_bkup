<?php

/* Crea header */
  function disp_header($pre,$title=''){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
      }
    if(isset($title)){echo "<title>$title | $conf_nombre_sitio</title>\n";}
    else {echo "<title>$conf_nombre_sitio</title>\n";}
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php
$phpself = basename($_SERVER['PHP_SELF']);
$rss_self = str_replace(".","",strrev(strstr(strrev($phpself),"."))).".xml";
    if(file_exists($rss_self)){
      $rss_host = 'http://'.$_SERVER['HTTP_HOST'];
      $cadena = implode('/',explode('/',strrev(strstr(strrev($_SERVER['SCRIPT_NAME']),'/')),-1));
      $url = $rss_host.$cadena.'/'.$rss_self;
      echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"RSS\" href=\"".$url."\" />\n";
    }
?>
  <link rel="shortcut icon" type="images/x-icon" href="favicon.ico" />
  <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <link href="css/estilo.css" rel="stylesheet" type="text/css" />
  <link href="css/generic.css" rel="stylesheet" type="text/css" />
  <link href="css/niftyCorners.css" rel="stylesheet" type="text/css" />
  <script src="js/embeddedcontent.js" type="text/javascript" defer="defer"></script>
  <script src="js/niftycube.js" type="text/javascript"></script>
  <script type="text/javascript">
    window.onload=function(){
      Nifty("div.article","big");
      Nifty("h3.side","top");
      Nifty("li#navigation","big transparent");

    }
  </script>
</head>
<body>
  <a id="skip" href="#content" accesskey="c" title="Saltar menú: Ir a contenidos [C]">Saltar a contenidos</a>
  <div id="wrapper">
    <div id="header">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="760" height="150">
        <param name="movie" value="img/arriba.swf" />
        <param name="quality" value="high" />
        <embed src="img/arriba.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="760" height="150"></embed>
      </object>
    </div>
<?php
  }

/* Crea header IMG                       */
  function disp_header_img($pre,$title=''){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
      }
    if(isset($title)){echo "<title>$title | $conf_nombre_sitio</title>\n";}
    else {echo "<title>$conf_nombre_sitio</title>\n";}
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="shortcut icon" type="images/x-icon" href="../favicon.ico" />
  <link href="../css/reset.css" rel="stylesheet" type="text/css" />
  <link href="../css/estilo_img.css" rel="stylesheet" type="text/css" />
  <link href="../css/generic.css" rel="stylesheet" type="text/css" />
  <link href="../css/niftyCorners.css" rel="stylesheet" type="text/css" />
  <script src="../js/embeddedcontent.js" type="text/javascript" defer="defer"></script>
  <script src="../js/niftycube.js" type="text/javascript"></script>
  <script type="text/javascript">
    window.onload=function(){
      Nifty("div.article","big");
    }
  </script>
</head>
<body>
  <a id="skip" href="#content" accesskey="c" title="Saltar menú: Ir a contenidos [C]">Saltar a contenidos</a>
  <div id="wrapper">
    <div id="header">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="760" height="150">
        <param name="movie" value="../img/arriba.swf" />
        <param name="quality" value="high" />
        <embed src="../img/arriba.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="760" height="150"></embed>
      </object>
    </div>
<?php
  }

/* Crea header PRINT
  function disp_header_print($pre,$title = ''){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
      }
    if(isset($title)){echo "<title>$title | $conf_nombre_sitio</title>\n";}
    else {echo "<title>$conf_nombre_sitio</title>\n";}
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link rel="shortcut icon" type="images/x-icon" href="favicon.ico" />
  <link href="css/reset.css" rel="stylesheet" type="text/css" />
  <link href="css/print.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="container">
  <div id="header">
    <div id="logo">
    <h1><a href="<?php echo $host; ?>"><?php echo $conf_nombre_sitio; ?></a></h1>
    <p><?php echo $conf_slogan; ?></p>
    </div>
  </div>
<?php
  }                    */

/* Crea footer */
  function disp_footer($pre){
?>

    <div id="footer">
<?php

    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
        $conf_descripcion = str_output(mysql_result($datos,$j,"conf_descripcion"));
        $conf_mail = str_output(mysql_result($datos,$j,"conf_mail"));
        $conf_telefono = str_output(mysql_result($datos,$j,"conf_telefono"));
        $conf_direccion = str_output(mysql_result($datos,$j,"conf_direccion"));
      }
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>
          <a href="inicio.php">Inicio</a> |
          <a href="productos.php">Productos</a> |
          <a href="servicios.php">Servicios</a> |
          <a href="empresa.php">Empresa</a> |
          <a href="contacto.php">Contacto</a>
    </div>
    <div id="credits">
 <?php echo $conf_nombre_sitio; ?> - <?php echo $conf_descripcion; ?><br />
Dirección: <?php echo $conf_direccion; ?><br />
<strong>Fono:</strong>  <?php echo $conf_telefono; ?> <br />
<a href="http://www.bellasltda.cl/">http://www.bellasltda.cl/</a> | <a href="mailto:<?php echo $conf_mail; ?>"><?php echo $conf_mail; ?></a> | Desarrollo: <a href="http://portrait.cl/" title="Ir a Portrait">Portrait.cl</a>
    </div>
  </div>
</body>
</html>
<?php
  }

/* Crea footer */
  function disp_footer_img($pre){
?>

    <div id="footer">
<?php

    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
        $conf_descripcion = str_output(mysql_result($datos,$j,"conf_descripcion"));
        $conf_mail = str_output(mysql_result($datos,$j,"conf_mail"));
        $conf_telefono = str_output(mysql_result($datos,$j,"conf_telefono"));
        $conf_direccion = str_output(mysql_result($datos,$j,"conf_direccion"));
      }
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>
          <a href="../inicio.php">Inicio</a> |
          <a href="../productos.php">Productos</a> |
          <a href="../servicios.php">Servicios</a> |
          <a href="../empresa.php">Empresa</a> |
          <a href="../contacto.php">Contacto</a>
    </div>
    <div id="credits">
 <?php echo $conf_nombre_sitio; ?> - <?php echo $conf_descripcion; ?><br />
Dirección: <?php echo $conf_direccion; ?><br />
<strong>Fono:</strong>  <?php echo $conf_telefono; ?> <br />
<a href="http://www.bellasltda.cl/">http://www.bellasltda.cl/</a> | <a href="mailto:<?php echo $conf_mail; ?>"><?php echo $conf_mail; ?></a> | Desarrollo: <a href="http://portrait.cl/" title="Ir a Portrait">Portrait.cl</a>
    </div>
  </div>
</body>
</html>
<?php
  }

/* Crea footer
  function disp_footer_print($pre){
?>
      <div id="footer">
      <br />
<?php
    $tabla = $pre."conf";
    $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());
      for($j=0; $j<mysql_num_rows($datos); $j++) {
        $conf_nombre_sitio = str_output(mysql_result($datos,$j,"conf_nombre_sitio"));
        $conf_slogan = str_output(mysql_result($datos,$j,"conf_slogan"));
        $conf_descripcion = str_output(mysql_result($datos,$j,"conf_descripcion"));
        $conf_mail = str_output(mysql_result($datos,$j,"conf_mail"));
        $conf_telefono = str_output(mysql_result($datos,$j,"conf_telefono"));
        $conf_direccion = str_output(mysql_result($datos,$j,"conf_direccion"));
      }
    $host = "http://".$_SERVER['HTTP_HOST']."/";
?>

      <?php echo $conf_nombre_sitio; ?><br />
      <?php if(!empty($conf_slogan)){echo $conf_slogan."<br />";} ?>
      <?php if(!empty($conf_descripcion)){echo $conf_descripcion."<br />";} ?>
      <a href="<?php echo $host; ?>"><?php echo $host; ?></a> -
      <a href="mailto:<?php echo $conf_mail; ?>" target="_blank"><?php echo $conf_mail; ?></a>
        <br /><br />
      </div>
    </div>
  </div>
</body>
</html>
<?php
  }           */



/* Muestra resultados paginados */
  function paginar($total,$pp,$st,$url){
    settype($page_first, "string");
    settype($page_previous, "string");
    settype($page_nav, "string");
    settype($page_next, "string");
    settype($page_last, "string");
    settype($paginar, "string");

    if($total>$pp){
      $resto=$total%$pp;
      if($resto==0) {
        $pages=$total/$pp;
      }
      else{
        $pages=(($total-$resto)/$pp)+1;
      }

      if($pages>10){
        $current_page=($st/$pp)+1;
        if($st==0){
          $first_page=0;
          $last_page=10;
        }
        else if($current_page>=5 && $current_page<=($pages-5)){
          $first_page=$current_page-5;
          $last_page=$current_page+5;
        }
        else if($current_page<5){
          $first_page=0;
          $last_page=$current_page+5+(5-$current_page);
        }
        else{
          $first_page=$current_page-5-(($current_page+5)-$pages);
          $last_page=$pages;
        }
      }
      else{
        $first_page=0;
        $last_page=$pages;
      }

      for($i=$first_page;$i<$last_page;$i++){
        $pge=$i+1;
        $nextst=$i*$pp;
        if($st==$nextst) {
          $page_nav .= "<em>".$pge."</em>";
        }
        else{
          $page_nav .= "<a href=\"".$url.$nextst."\" title=\"Ir a esta página\">".$pge."</a>";
//          $page_nav .= "<a href=\"".$url.$nextst."\" mce_href=\"".$url.$nextst."\">".$pge."</a>";
        }
      }
      if($st==0){ $current_page = 1; }
      else{ $current_page = ($st/$pp)+1; }

      if($current_page< $pages){
        $page_last = "<a href=\"".$url.($pages-1)*$pp."\" title=\"Último\">&raquo;</a>";
        $page_next = "<a href=\"".$url.$current_page*$pp."\" title=\"Siguientes\">Siguientes &#8250;</a>";
//        $page_last = "<a href=\"".$url.($pages-1)*$pp."\" mce_href=\"".$url.($pages-1)*$pp."\">[&raquo;]</a>";
//        $page_next = "<a href=\"".$url.$current_page*$pp."\" mce_href=\"".$url.$current_page*$pp."\">[&#8250;]</a>";
      }

      if($st>0) {
        $page_first = "<a href=\"".$url."0\" title=\"Primero\">&laquo;</a>";
        $page_previous = "<a href=\"".$url."".($current_page-2)*$pp."\" title=\"Anteriores\">&#8249; Anteriores</a>";
//        $page_first = "<a href=\"".$url."0\" mce_href=\"".$url."0\">[&laquo;]</a></a>";
//        $page_previous = "<a href=\"".$url."".($current_page-2)*$pp."\" mce_href=\"".$url."".($current_page-2)*$pp."\">[&#8249;]</a>";
      }
    }
    $paginar .= "<div class=\"paginar\">$page_first $page_previous $page_nav $page_next $page_last</div>";
    return $paginar;
  }

?>