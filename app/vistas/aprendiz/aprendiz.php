<nav class="side-navbar fixed-top p-0 m-0">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center text-white"><img src="<?=RUTA_URL?>img/<?=$_SESSION[$_COOKIE["PHPSESSID"]]['imagen'];?>" alt="person" class="img-fluid rounded-circle img">
            <h2 class="h5"><?=$_SESSION[$_COOKIE["PHPSESSID"]]['nombre']?></h2><span class="text-white font-weight-bold">Aprendiz</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a  class=" text-white brand-small text-center"> <strong>DS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading text-white">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?=RUTA_URL?>aprendiz/vistaConsultar"> <i class="fa fa-home"></i>Inicio</a></li>
            <li><a href="<?=RUTA_URL?>aprendiz/justificaciones"><i class="fa fa-upload"></i> Subir justificación</a></li>
            <li><a href="<?=RUTA_URL?>index/configurar"><i class="fa fa-address-card"></i>Configurar</a></li>
            <!--<li><a href="tables.html"> <i class="icon-grid"></i>Desertar</a></li> -->
          </ul>
        </div>
       
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
     <header class="header text-white">
        <nav class="navbar" >
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between" style="background: rgba(138, 132, 132, 0.19)!important;">
              <div class="navbar-header p-1"  style="background:rgba(255,175,75,1)!important;">
                    <a id="toggle-btn" class="menu-btn ocul w-100" onclick="ms('Aprendiz')">
                    <i class="icon-bars px-3"></i>
                    <b class="px-2">DeserSOFT</b>
                    </a>

                </div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
               
                <!-- Log out-->
                <li class="nav-item"><a href="<?= RUTA_URL ?>index/cerrarSesion" class="nav-link logout text-dark"> <span class="d-none d-sm-inline-block">Salir</span><i class="fa fa-sign-in-alt"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
