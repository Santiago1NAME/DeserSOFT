<?php
    require_once 'configuracion/configuracion.php';
    require_once 'modelos/UsuarioModelo.php';
    //require_once '../app/controladores/Security.php';
    spl_autoload_register(function($nombre){
        require_once '../app/Corazon/'.$nombre.'.php';
    });
?>