<?php
session_start();
ob_start();
include('inc/inc.inc.php');
if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== 'Pearl Jam') {
  $_SESSION = array();
  header('Location: index.php');
  exit;
  }

  $title = "Administrar Textos";
  disp_header_admin($pre,$title);
  include('inc/menu_admin.inc.php');
  $vinculo = "info";
  $tabla = $pre.$vinculo;
  disp_inicio_info($title,'administracion');
?>
    <fieldset>
      <legend><span class="administracion">Administrar Textos</span></legend>
      <div class="box_secc">
        <h1 class="secciones">Secciones de Información</h1>
        <p>Aquí se puede modificar la información de las secciones principales del sitio.</p>
        <form action="secciones.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="productos">Productos</h1>
        <p>En esta sección usted puede crear, modificar y eliminar productos.</p>
        <form action="productos.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="servicios">Servicios</h1>
        <p>En esta sección usted puede crear, modificar y eliminar servicios.</p>
        <form action="servicios.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="imagenes">Imágenes</h1>
        <p>En esta sección usted puede agregar y eliminar imágenes para ser usadas en los artículos.</p>
        <form action="imagenes.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
    </fieldset>

    </div>
  </div>
<?php disp_footer_admin($pre); ?>