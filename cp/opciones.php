<?php
session_start();
ob_start();
include('inc/inc.inc.php');
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Pearl Jam') {
  $_SESSION = array();
  header('Location: index.php');
  exit;
}
if (!isset($_SESSION['type']) || $_SESSION['type'] !== 'admin') {
  $_SESSION = array();
  header('Location: index.php');
  exit;
}
$title = "Opciones";
disp_header_admin($pre,$title);
include('inc/menu_admin.inc.php');
$tabla = $pre."conf";

disp_inicio_info($title,'opciones');

if (isset($_GET['act'])){
  switch ($_GET['act']){

//Modificaci�n
    case 'm':
    $secc = str_input($_GET['secc']);
      $datos = mysql_query("SELECT ".$secc." FROM ".$tabla."") or die(mysql_error());
      $txt = str_output(mysql_result($datos,0,$secc));
?>
    <form action="<?php echo $phpself; ?>?&amp;act=vm" method="post">
    <fieldset>
      <legend>Modificar <?php echo ucfirst(trim(str_replace('_', ' ',(strstr(mysql_field_name($datos,0),'_'))))); ?> </legend>
      <table width="100%"  border="0"  align="center">
      <?php echo draw_input(ucfirst(trim(str_replace('_', ' ',(strstr(mysql_field_name($datos,0),'_')))))." ",'txt_new','text',$txt,'','table_horiz',50,'req'); ?>
      </table>
      <?php echo draw_input('','secc','hidden',$secc); ?>
      <div align="center"><br /><?php echo draw_input('','submit','submit','Modificar'); ?></div>
    </fieldset>
    </form>
<?php
      break;

//Validaci�n de Modificaci�n
    case 'vm':
    //c�digo de validaci�n de modificaci�n de elemento

    $secc = str_output($_POST['secc']);
    $txt_new = str_output($_POST['txt_new']);

        $sql_data = array($secc => $txt_new);
        //echo disp_array_asoc($sql_data);
        sql_input($tabla,$sql_data,'update',"conf_idx1");
        echo "<form action=\"".$phpself."\" method=\"POST\">
        <div align=\"center\"><br /><input type=\"submit\" value=\"Continuar &raquo;\" /></div></form>";
      break;

    default:
      $_SESSION = array();
      header('Location: index.php');
      exit;
    }
  }
else {
      $datos = mysql_query("SELECT * FROM ".$tabla."") or die(mysql_error());

?>
      <fieldset>
        <legend><?php echo $title; ?></legend>
        <table cellpadding="4" cellspacing="2" class="table">
          <thead>
            <th><?php echo $title; ?></th>
            <th>Acci&oacute;n</th>
          </thead>
<?php
      for($j=1; $j<mysql_num_fields($datos); ++$j) {
          $celda = (($j % 2) == 0) ? "celda1" : "celda2";
          $secc = mysql_field_name($datos,$j);
?>
          <tr>
            <td class="<?php echo $celda; ?>">
              <p><?php echo ucfirst(trim(str_replace('_', ' ',(strstr(mysql_field_name($datos,$j),'_'))))); ?>
              </p>
            </td>

<?php disp_icons_seccprinc($celda,$php_self,$secc,"m"); ?>
<?php     } ?>

        </table>
      </fieldset>
<?php
}

  disp_fin_info();
  disp_footer_admin($pre);
?>