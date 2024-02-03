<?php
include('inc.inc.php');
$self = str_replace(".","",strrev(strrchr(strrev(basename($_SERVER['PHP_SELF'])),".")));
$title = "Proceso de Creación de Agua Soda";
$secc = "info_".$self;

disp_header($pre,$title);

$secc_princ = mysql_query("SELECT ".$secc." FROM ".$pre."info") or die(mysql_error());
  $txt = str_output(mysql_result($secc_princ,0,$secc));
?>
       <div id="content">
       <h1><?php echo $title; ?></h1>
         <div class="article">
      <?php if (!empty($_SESSION)) {echo "<div class=\"box_warning\">".disp_array_asoc($_SESSION)."</div>";} ?>
       <p>Esta es una animación del proceso de creación de Agua Soda. Las etapas del proceso se explican a continuación. </p>
         <p>&nbsp;</p>           <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" height="334" width="465">
           <param name="movie" value="img/proceso_aguasoda.swf">
             <param name="quality" value="high">
             <embed src="img/proceso_aguasoda.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" height="334" width="465">
           </object>
         <p>&nbsp;</p>
<?php
  echo $txt;
?>
    </div>
</div>
<?php include('menu.inc.php'); ?>
<?php include('side.inc.php'); ?>
<?php disp_footer($pre); ?>