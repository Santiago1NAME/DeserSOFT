<?php
function seguridad($rol){
    require_once( '../app/vistas/estructura/header.php');
    echo '
        <script>
            $.ajax({
                    url:"'.RUTA_URL.'index/validarToken",
                    type: "POST",
                    dataType: "json",
                    data:{cliente:localStorage.getItem("token")},
                    success:function(data){
                        console.log(data);
                        if(data.msj == false || !(data.msj == '.$rol.')){
                            location.href = "'.RUTA_URL.'";
                        }
                    },error: function(){
                        alert("Acción fallida!");
                    }
                });
      </script>';
  
    require_once( '../app/vistas/estructura/footer.php');
}
