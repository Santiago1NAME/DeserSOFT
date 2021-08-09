   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                    <div class="card-header">
                    <h4>Justificaciones médicas</h4>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form method="POST"  enctype="multipart/form-data" id="justificacion">
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="file" class="form-control p-0" name="pdf" id="pdf">
                                         <small id="soporte" class="form-text text-muted">Seleccione soporte</small>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="id_proceso" id="id_proceso" placeholder="ingrese proceso">
                                        <small id="proceso" class="form-text text-muted">Número de proceso</small>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="fch" id="fch" placeholder="Digite el numero de su ficha">
                                        <small  class="form-text text-muted">Numero de ficha</small>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class=" col-md-6">
                                    <button type="button" class="btn btn-success  btn-block" data-toggle="modal" data-target="#cont" onclick="Just()">Enviar</button>
                                    </div>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>

<script>
function Just() {
   var formData = new FormData();
    formData.append('id_proceso', $('#id_proceso').val());
    formData.append('fch', $('#fch').val());
    // Attach file
    formData.append('pdf', $('input[type=file]')[0].files[0]); 
    ajax("<?= RUTA_URL ?>aprendiz/registrarJustificacion", formData);
}  
</script>