<div class="card-header">
    <h4>Procesos de deserción</h4>
</div>
<div class="accordion " id="accordionExample">
  <div class="card mb-0">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Notificación al aprendiz
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <div class="container-fluid m-0 p-0"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>N. Proceso</th>
                                <th>Inicio de proceso</th>
                                <th>N. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C. Institucional</th>
                                <th>Fecha de proceso</th>
                                <th>Enviar notificación al aprendiz</th>
                                <th>Cancelar</th>
                            </tr>
                        </thead>
                        <tbody >
                         <?php foreach ($Datos as $fila):?>
                            <tr>
                                <td><?=$fila->id_desercion?></td>
                                <td><?=$fila->fecha_reporte?></td>
                                <td><?=$fila->num_documento?></td>
                                <td><?=$fila->nombres?></td>
                                <td><?=$fila->apellidos?></td>
                                <td><?=$fila->correo_instu?></td>
                                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#data<?=$fila->id_usuario;?>"><i class="fa fa-calendar" aria-hidden="true"></i></button></td>
                                <!-- Modal -->
                                <td> 
                                    <form action="<?=RUTA_URL?>coordinador/registrarDesercion" method="post">
                                        <input type="hidden" name="id_desercion" value="<?=$fila->id_desercion?>">
                                        <input type="hidden" name="id_aprendiz" value="<?=$fila->num_documento?>">
                                        <button type="submit" name="" id="" class="btn btn-danger btn-sm px-3">
                                            <i class="fa fa-envelope"></i>
                                        </button> 
                                    </form>
                                </td>
                                <div class="modal fade" id="data<?=$fila->id_usuario;?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
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
                                <td><span class="badge badge-danger" onclick="negada(1);"><i class="fa fa-times" aria-hidden="true"></i></span></td>
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

      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Enviar formato
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <div class="card-body">
      <div class="container-fluid m-0 p-0"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
           
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>N. Proceso</th>
                                <th>N. Documento</th>
                                <th>Envio de notificación</th>
                                <th>Enviar</th>
                            </tr>
                        </thead>
                        <tbody >
                         <?php foreach ($Datos2 as $fila):?>
                            <tr>
                                <td><?=$fila->id_desercion?></td>
                                <td><?=$fila->num_documento?></td>
                                <td><?php
                                    $datetime1 = date_create($fila->envio_notificacion);
                                    $datetime2 = date_create(date('Y-m-d'));
                                    $interval = date_diff($datetime1, $datetime2);
                                    $days = $interval->format('%a');
                                    echo ($days > 5)? '
                                    <div class="alert alert-danger btn-sm" role="alert">
                                       Los cinco días hábiles se han completado sin justificación válida.
                                    </div>':'
                                     <div class="alert alert-info btn-sm" role="alert">
                                        Desde que se envió la notificación los días que han pasado son: '.($days-1).'
                                     </div>
                                    ';
                                    ?></td>
                                <td> 
                                    <form action="<?=RUTA_URL?>coordinador/enviar_formato" method="post">
                                        <input type="hidden" name="id_desercion" value="<?=$fila->id_desercion?>">
                                        <input type="hidden" name="id_aprendiz" value="<?=$fila->id_usuario?>">
                                        <button type="submit" name="" id="" class="btn btn-danger btn-sm px-3">
                                            <i class="fa fa-file-export"></i>
                                        </button> 
                                    </form>
                                </td>                           
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
    function negada(id){
        let v = confirm(`Desea cancelar el proceso con número ${id}`);
           if (v) {
            alert('Cancelado');
        }
    }
    // function notificacion(id, num) {
    //     ajax("<?= RUTA_URL ?>coordinador/registrarDesercion", {'id_desercion': id, id_aprendiz: num});
    // }
    // function formato(id, num) {
    //     ajax("<?= RUTA_URL ?>coordinador/registrarDesercion", {'id_desercion': id, id_aprendiz: num});
    // }
</script>