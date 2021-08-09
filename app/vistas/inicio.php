<style>

    a{
        float:right;
    }
    .tam{
        font-size: 12px;
        margin-top: 15px;
    }
</style>

 <div class="container-fluid d-none" style="margin-top:11%;" id="content">
    <div class="row justify-content-center d-flex ">
        <div class="col-11 col-sm-4">
        <div>
            <div class="text-center">
            <img class="w-75 img-fluid mb-4" src="<?php echo RUTA_URL?>public/img/LogoDesertSOFT.png" style>
            </div>
                <form action="<?=RUTA_URL?>index/iniciarSesion" method="post" autocomplete="off">
                        <div class="form-group">
                            <!-- Cajas de texto -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-address-card" ></i></span>
                                </div>
                                <input  type="text" name="dni" id="dni" class="form-control" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt" ></i></span>
                                </div>
                                <input type="password" name="contrasenia" id="contrasenia" class="form-control"  placeholder="Contraseña" >
                            </div>
                            
                        </div>  
                        <button type="submit" value="Iniciar sesión" class="btn btn-sm btn-lg btn-block" style="background-color: #2ECC71; color:#FFF;">Ingresar</button>
                        <hr>
                    </form>
                    <a  href="<?=RUTA_URL?>index/cambiarContrasenia" class="text-center">¿Olvido su contraseña?</a>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-center" style="border-left: 2px solid orange;">
        <div class="d-none d-lg-block ">
            <div class="text-center">
                <img src="<?=RUTA_URL;?>img/sena.jpg" class="justify-align-center img-fluid" alt="">
            </div>
            <p class="tam text-justify">
                Aplicación web para el manejo de las deserciones del Centro de Electricidad, Electrónica y Telecomunicaciones.<br>
                "Se considera deserción en el proceso de formación:
                a. Cuando el aprendiz injustificadamente no se presente por tres (3) días consecutivos al
                Centro de Formación o empresa en su proceso formativo."(«reglamento-aprendiz-2012-sena.pdf», s. f.)           
            </p>
            </div>
        </div>
    </div>
</div>  

<div id="upload" class=" d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div>
       <div class="spinner-grow text-success" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

           
	<script>
        const content = document.getElementById('content');
        const upload = document.getElementById('upload');

        setTimeout(() => {
            content.className = "d-block";
            upload.className = "d-none";
        }, 2000);
    </script>