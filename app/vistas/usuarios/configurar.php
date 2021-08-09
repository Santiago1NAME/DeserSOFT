   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                    <div class="card-header">
                    <h4>Configurar</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="passNv" id="passNv" placeholder="Contraseña nueva">
                                    </div>
                                    
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="confirm_pass" id="confirm_passNv" placeholder="Confirmación de contraseña">
                                    </div>
                                    
                                </div>
                            
                                <div class="form-group row justify-content-center">
                                    <div class=" col-md-6">
                                        <button type="button" class="btn btn-success  btn-block" data-toggle="modal" data-target="#cont" >Guardar</button>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center px-2 m-0"  id="msj"></div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="cont" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true" onmouseover="confirmar()">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Confirmación de contraseña</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                  <div class="form-group">
                    <input type="password"
                        class="form-control " name="passAc" id="passAc" aria-describedby="contraseña" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingrese contraseña actual</small>
                  </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="text-white btn btn-block mx-5" style="background:rgba(255,175,75,1)!important;" id="confirm">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<script>

    $('#confirm').click(function(){ 
        var pa = $('#passAc').val(), pn = $('#passNv').val(), d;
        $.ajax({
            method: "POST",
            url: "<?=RUTA_URL?>index/cambiarConfiguracion",
            data: {passAc: pa, passNv:pn},
            dataType: "json",
                success: function(data){
                    mensaje(data);
                }    
        });
        // console.log(data);
    });
    function mensaje(data){
           if (data.valor=='Cambiada!') {
                alert('Cambiada!');
            }  
            else{
                alert('Inténtalo de nuevo!');
            }
            setT("<?=RUTA_URL?>index/configurar");
    }
    function setT(direccion){
        setTimeout(() => {
                    location.href = direccion;
        }, 1000);
    }
    function confirmar() {
        if (!($('#confirm_passNv').val() === $('#passNv').val())) {
            $('#msj').html('<div class="col-md-6 alert alert-danger p-0 m-0 text-center">No son iguales!</div>');
                $("#cont").modal("hide");
          
        }else{
            $('#msj').html('<div class="col-md-6 alert alert-success p-0 m-0 text-center">Coinciden las contraseñas!</div>');
        }
    }

</script>