   <div id="menu">
      <ul>
        <li><a href="inicio.php" class="inicio">Inicio</a></li> |
        <li><a href="administracion.php" class="administracion">Administrar Textos</a></li> |
<?php  if ($_SESSION['type']==="admin" || $_SESSION['type']==="editor"){?>
        <li><a href="herramientas.php" class="herramientas">Herramientas</a></li> |
<?php  } ?>
<?php  if ($_SESSION['type']==="admin"){?>
        <li><a href="configuracion.php" class="configuracion">Configuración</a></li> |
<?php  } ?>
        <li><a href="logout.php" class="salir">Salir</a></li>
      </ul>
    </div>

<?php
  //Submenú Administración
  if ($phpself==="administracion.php" OR $phpself==="secciones.php" OR $phpself==="noticias.php" OR $phpself==="articulos.php" OR $phpself==="productos.php" OR $phpself==="servicios.php" OR $phpself==="galeria.php" OR $phpself==="imagenes.php" OR $phpself==="blog.php"){ ?>
   <div id="submenu">
      <ul>
        <li><span class="administracion">Textos: </span></li>
        <li><a href="secciones.php" class="secciones">Secciones</a></li> |
        <li><a href="productos.php" class="productos">Productos</a></li> |
        <li><a href="servicios.php" class="servicios">Servicios</a></li> |
        <li><a href="imagenes.php" class="imagenes">Imágenes</a></li>
      </ul>
    </div>
<?php
  }
  //Submenú Herramientas
  if ($phpself==="herramientas.php" OR $phpself==="archivos.php" OR $phpself==="rss.php" OR $phpself==="backup.php" OR $phpself==="logs_login.php" OR $phpself==="estadisticas.php"){ ?>
   <div id="submenu">
      <ul>
        <li><span class="herramientas">Herramientas: </span></li>
        <li><a href="archivos.php" class="archivos">Archivos</a></li>
<?php if ($_SESSION['type']=="admin"){ ?>
        | <li><a href="backup.php" class="backup">Backup</a></li>
<?php } ?>
      </ul>
    </div>
<?php
  }
  //Submenú Configuración
  if ($phpself==="configuracion.php" OR $phpself==="usuarios.php" OR $phpself==="categorias.php" OR $phpself==="opciones.php" OR $phpself==="password.php"){ ?>
   <div id="submenu">
      <ul>
        <li><span class="configuracion">Configuración: </span></li>
        <li><a href="usuarios.php" class="usuarios">Usuarios</a></li> |
        <li><a href="categorias.php" class="categorias">Categorías</a></li> |
        <li><a href="opciones.php" class="opciones">Opciones</a></li> |
        <li><a href="password.php" class="password">Contraseña</a></li>
      </ul>
    </div>
<?php
  }


  if ($phpself==="productos.php"){ ?>
   <div id="submenu">
      <ul>
        <li><span class="productos">Productos: </span></li>
        <li><a href="<?php echo $phpself; ?>?&act=vp" class="vp">Ver Publicados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vnp" class="vnp">Ver No Publicados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vd" class="vd">Ver Destacados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vnd" class="vnd">Ver No Destacados</a></li>
      </ul>
    </div>
<?php
  }
  if ($phpself==="servicios.php"){ ?>
   <div id="submenu">
      <ul>
        <li><span class="servicios">Servicios: </span></li>
        <li><a href="<?php echo $phpself; ?>?&act=vp" class="vp">Ver Publicados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vnp" class="vnp">Ver No Publicados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vd" class="vd">Ver Destacados</a></li> |
        <li><a href="<?php echo $phpself; ?>?&act=vnd" class="vnd">Ver No Destacados</a></li>
      </ul>
    </div>
<?php
  }
?>