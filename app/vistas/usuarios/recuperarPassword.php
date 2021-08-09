
<div class="container-fluid" style="margin-top:7%;">
    <div class="row justify-content-center">
            <div class="col-10 col-md-4">
                <div class="text-center">
                <img class="w-75 img-fluid mb-4" src="<?php echo RUTA_URL?>public/img/LogoDesertSOFT.png" style>
                </div>
                 <form id="servicioC">
                        <div class="alert alert-info d-none d-md-block table-responsive" role="alert">
                            Ingrese el correo registrado en el sistema.
                        </div>
                        <div class="form-group">
                            <!-- Cajas de texto -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-card" ></i></span>
                                </div>
                                  <input type="number" class="form-control form-control-sm" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1" name="dni">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-at"></i></span>
                                </div>
                               <input type="email" class="form-control form-control-sm" placeholder="Email" aria-label="Documento" aria-describedby="basic-addon1" name="email">
                            </div>
                        </div>  
                         <button type="button" class="btn btn-sm btn-lg btn-block" onClick="serC();" style="background-color: #2ECC71; color:#FFF;">Enviar</button>
                        <hr>
                    </form>
            </div>
        </div>
    </div>  
    <script>
    // servicio de contraseña
        function serC(){
        var formData = new FormData($('#servicioC')[0]);
            ajax("<?=RUTA_URL?>index/emails", formData);
        }
    </script>
