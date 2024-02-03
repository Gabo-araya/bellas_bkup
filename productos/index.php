<?php
//header('Location: ../');
include('../inc.inc.php');
$self = str_replace(".","",strrev(strrchr(strrev(basename($_SERVER['PHP_SELF'])),".")));
$title = "Imágenes";
disp_header_img($pre,$title);

$thisdir = strrev(strstr(strrev($_SERVER['SCRIPT_FILENAME']),'/'));
$thisdir = scandir($thisdir);
arsort($thisdir);

  $filetipe = array("jpg" => 'Joint Photographic Experts Group ',
                    "jpeg" => 'Joint Photographic Experts Group ',
                    "jpe" => 'Joint Photographic Experts Group ',
                    "png" => 'Portable Network Graphic',
                    "tiff" => 'Tagged Image File Format',
                    "bmp" => 'Mapa de Bits de Windows',
                    "gif" => 'Graphics Interchange Format');

?>
<div id="content">
      <?php if (!empty($_SESSION)) {echo "<div class=\"box_warning\">".disp_array_asoc($_SESSION)."</div>";} ?>
      <h1><?php echo $title; ?></h1>
    <div class="article">

<?php
if (isset($_GET['act'])){
  switch ($_GET['act']){
//Visualizar
    case 'v':
      $f = str_input($_GET['f']);
      if(empty($f)){
        break;
      }
      else{

?>
      <div align="center">
        <img src="<?php echo $f; ?>" alt="Imagen" />
       <?php
         /*<p><a href="descargar.php?f=<?php echo $f; ?>" title="Descargar imagen">[Descargar]</a></p>*/
       ?>
      </div>
<?php
//      url: productos/index.php?&act=v&f=$archivo

      }
      break;

    default:
      echo "<div class=\"box_warning\">No hay nada que mostrar.</div>";
      break;
    }
  }
else {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <th><h2>Nombre</h2></th>
    <th><h2>Tamaño</h2></th>
    <th><h2>Extensión</h2></th>
    <th><h2>Tipo</h2></th>
  </thead>
<?php
  foreach ($thisdir as $value) {
    if((is_dir($value)) OR ($value == 'error.log') OR ($value == 'index.php') OR ($value == 'imagenes.php') OR ($value == 'descargar.php')){}
    else{
      $ext = str_replace(".", "", strrchr($value, "."));
      foreach ($filetipe as $extension => $nombre) {if ($extension == $ext) {$name_ext = $nombre;}}
      $tamano = filesize($value);
?>
  <tr>
<?php /*<td><img src="../css/icons/<?php echo $ext; ?>.png" alt="<?php echo $name_ext; ?>" /></td>*/
?>
    <td>
      <a href="descargar.php?f=<?php echo $value; ?>" title="Descargar imagen">
      <?php echo $value; ?>
      </a></td>
    <td>[<?php echo number_format($tamano/1024, 1).' Kb'; ?>]</td>
    <td><?php echo strtoupper($ext); ?></td>
    <td><?php echo $name_ext; ?></td>
  </tr>
<?php
    }
  }
?>

</table>
<?php
}
?>
     </div>
</div>
<?php
  disp_footer_img($pre);

?>