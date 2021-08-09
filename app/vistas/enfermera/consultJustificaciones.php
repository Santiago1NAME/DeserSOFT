   <div class="container-fluid mt-4 p-0 m-0"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Solicitudes</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>N. Proceso</th>
                                <th>N. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C. Institucional</th>
                                <th>Fecha de proceso</th>
                                <th>Consultar proceso</th>
                                <th>Confirmación</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                              <?php foreach ($Datos as $fila):?>
                            <tr>
                                <td><?=$fila->id_desercion?></td>
                                <td><?=$fila->num_documento?></td>
                                <td><?=$fila->nombres?></td>
                                <td><?=$fila->apellidos?></td>
                                <td><?=$fila->correo_instu?></td>
                                <td><?=$fila->fecha_reporte?></td>
                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#data<?=$fila->id_usuario;?>"><i class="fa fa-search-plus" aria-hidden="true"></i></button></td>
                                <!-- Modal -->
                                <div class="modal fade " id="data<?=$fila->id_usuario;?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Fechas de inasistencia</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                <div class="form-group">
                                                    <input type="date"
                                                        class="form-control " name="" id="" aria-describedby="fecha" placeholder="" value="<?=$fila->fecha_desercion1?>" disabled>
                                                    <small id="fecha" class="form-text text-muted">Primera fecha</small>
                                                    <input type="date"
                                                        class="form-control " name="" id="" aria-describedby="fecha" placeholder="" value="<?=$fila->fecha_desercion2?>" disabled>
                                                    <small id="fecha" class="form-text text-muted">Segunda fecha</small>
                                                    <input type="date"
                                                        class="form-control " name="" id="" aria-describedby="fecha" placeholder="" value="<?=$fila->fecha_desercion3?>" disabled>
                                                    <small id="fecha" class="form-text text-muted">Tercera fecha</small>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <td><button class="btn btn-sm btn-success" onclick="valida(2);"><i class="fa fa-plus"></i></button><button class="btn btn-sm btn-danger" onclick="valida(2);"><i class="fa fa-times"></i></button></td>
                            </tr>
                        <?php endforeach; ?>        
                          
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
    function valida(id){
        let v = confirm(`Desea validar la solicitud con número de proceso ${id}`);
        if (v) {
            alert('Validada');
        }
    }
    function negada(id){
               let v = confirm(`Desea negar la solicitud con número de proceso ${id}`);
           if (v) {
            alert('Negada');
        }
    }
</script>