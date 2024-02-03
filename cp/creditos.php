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
  $title = "Créditos";
  disp_header_admin($pre,$title);
  include('inc/menu_admin.inc.php');
  $vinculo = "info";
  $tabla = $pre.$vinculo;
  disp_inicio_info($title,'creditos');
?>
    <fieldset>
      <legend><span class="creditos">Créditos</span></legend>
      <p>Créditos del Sistema de Administración de Contenido Pharos CMS.</p>
      <p>&nbsp;</p>

      <h2>Sistema</h2>
      <div class="descrip">
        <p>Lenguaje de Programaci&oacute;n: PHP5</p>
        <p>Base de Datos: MySQL4</p>
        <p>Servidor: Apache2</p>
      </div>
      <p>&nbsp;</p>

      <h2>Hojas de Estilo</h2>
      <div class="descrip">
        <p><strong>Reset all styles</strong></p>
        <p>Autor: Eric Meyer</p>
        <p>URI: <a href="http://meyerweb.com/eric/thoughts/2008/01/15/resetting-again/" target="_blank">http://meyerweb.com/eric/thoughts/2008/01/15/resetting-again/</a></p>
      </div>
      <p>&nbsp;</p>

      <h2>Iconos</h2>
      <div class="descrip">
        <p><strong>FamFamFam - Silk Icons</strong></p>
        <p>Licencia: <a href="http://creativecommons.org/licenses/by/2.5/" target="_blank" rel="license">Creative Commons Attribution 2.5 License</a></p>
        <p>URI: <a href="http://www.famfamfam.com/lab/icons/silk/" target="_blank">http://www.famfamfam.com/lab/icons/silk/</a></p>
      </div>
      <p>&nbsp;</p>

      <h2>Javascript</h2>
      <div class="descrip">
        <p><strong>jActivating</strong></p>
        <p>Autor: David Mu&ntilde;oz</p>
        <p>Licencia: This software is Public Domain (no rights reserved)</p>
        <p>URI: <a href="http://jactivating.sourceforge.net" target="_blank">http://jactivating.sourceforge.net</a></p>
      </div>
      <div class="descrip">
        <p><strong> TinyMCE</strong></p>
        <p>Licencia: GNU LESSER GENERAL PUBLIC LICENSE</p>
        <p>URI: </p>
      </div>
      <div class="descrip">
        <p><strong> Nifty Corners Cube</strong></p>
        <p>Autor: Alessandro Fulciniti</p>
        <p>Licencia: GNU General Public License</p>
        <p>URI: </p>
      </div>


    </fieldset>
    </div>
  </div>
<?php disp_footer_admin($pre); ?>