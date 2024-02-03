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
  $title = "Configuraci�n";
  disp_header_admin($pre,$title);
  include('inc/menu_admin.inc.php');
  $vinculo = "info";
  $tabla = $pre.$vinculo;
  disp_inicio_info($title,'configuracion');
?>
    <fieldset>
      <legend><span class="configuracion">Configuraci�n</span></legend>
      <div class="box_secc">
        <h1 class="usuarios">Usuarios</h1>
        <p>En esta secci�n usted puede crear, modificar y eliminar usuarios del sistema.</p>
        <form action="usuarios.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="categorias">Categor�as</h1>
        <p>En esta secci�n usted puede crear, modificar y eliminar categor�as de algunos elementos del sitio web.</p>
        <p>Usar con precauci�n.</p>
        <form action="categorias.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="opciones">Opciones</h1>
        <p>En esta secci�n usted puede modificar algunos elementos del sistema.</p>
        <form action="opciones.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div>
      <div class="box_secc">
        <h1 class="password">Contrase�a</h1>
        <p>En esta secci�n usted puede modificar su contrase�a de usuario.</p>
        <form action="password.php" method="post"><div align="center"><br />
          <input type="submit" value="Continuar &raquo;" />
        </div></form>
      </div> 
    </fieldset>
    </div>
  </div>
<?php disp_footer_admin($pre); ?>