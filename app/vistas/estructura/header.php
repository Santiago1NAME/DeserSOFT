<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>DeserSOFT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/custom.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL?>public/css/estylenav.css">  
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo RUTA_URL?>public/img/Logo.png">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
        } );  
    </script>
    <style>
        #upload{
            height: 100vh;
        }
    </style>
</head>
<body>
    <style>
    .img{
        height: 10vh!important;
        width: 40%!important;
    }
    </style>
    <script>
    function ajax(direccion, datos){
        var confir = confirm('¿Está seguro que desea continuar?');
        if (confir) {
            $.ajax({
                method: "POST",
                url: direccion,
                data: datos,
                contentType: false,
                processData:false,
                jsonType: 'json',
                    success: function(data){
                        alert('Acción exitosa!');
                    },error: function(){
                        alert('Acción fallida!');
                    }
            });
        }
    }
    </script>
    <script>
    var cont = 0;
    function ms(tipo) {
      var ocul = document.querySelector('.ocul');
        if (cont == 0) {
          ocul.innerHTML = '<i class="fas fa-arrow-circle-right px-3"></i> <b class="px-2">'+tipo+'</b>';
          cont = 1;
        }else{
          ocul.innerHTML = '<i class="icon-bars px-3" ></i> <b class="px-2">DeserSOFT</b>';
          cont = 0;
      }
    }

  </script>

