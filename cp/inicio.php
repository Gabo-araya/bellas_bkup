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
  $title = "Inicio";
  disp_header_admin($pre,$title);
  include('inc/menu_admin.inc.php');
  $vinculo = "info";
  $tabla = $pre.$vinculo;
  disp_inicio_info($title,'inicio');
?>

      <div class="box_info">
        <p>Usted ha ingresado como [<?php echo $_SESSION['user']; ?>]
        y tiene privilegios de [<?php if($_SESSION['type'] =='admin') {echo 'administrador';} else {echo $_SESSION['type'];} ?>].</p>
      </div>

    <fieldset>
      <legend><span class="administracion">Administrar Textos</span></legend>
      <div class="box_secc">
        <h1 class="secciones">Secciones de Información</h1>
        <p>En esta sección usted puede modificar la información de las secciones principales del sitio.</p>
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

<?php if ($_SESSION['type']=="admin" OR $_SESSION['type']=="editor"){ ?>

    <fieldset>
      <legend><span class="herramientas">Herramientas</span></legend>
      <div class="box_secc">
        <h1 class="archivos">Archivos</h1>
        <p>En esta sección usted puede subir archivos para descarga.</p>
        <form action="archivos.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
<?php if ($_SESSION['type']=="admin"){ ?>
      <div class="box_secc">
        <h1 class="backup">Backup de Base de Datos</h1>
        <p>En esta sección usted puede crear copias de seguridad de la base de datos, descargarlas o eliminarlas.</p>
        <form action="backup.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>

<?php } ?>
<?php } ?>
    </fieldset>

<?php if ($_SESSION['type']=="admin"){ ?>
    <fieldset>
      <legend><span class="configuracion">Configuración</span></legend>
      <div class="box_secc">
        <h1 class="usuarios">Usuarios</h1>
        <p>En esta sección usted puede crear, modificar y eliminar usuarios del sistema.</p>
        <form action="usuarios.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="categorias">Categorías</h1>
        <p>En esta sección usted puede crear, modificar y eliminar categorías de algunos elementos del sitio web.</p>
        <p>Usar con precaución.</p>
        <form action="categorias.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="opciones">Opciones</h1>
        <p>En esta sección usted puede modificar algunos elementos del sistema.</p>
        <form action="opciones.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="password">Contraseña</h1>
        <p>En esta sección usted puede modificar su contraseña de usuario.</p>
        <form action="password.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
    </fieldset>
<?php } ?>


    </div>
  </div>
<?php disp_footer_admin($pre); ?>