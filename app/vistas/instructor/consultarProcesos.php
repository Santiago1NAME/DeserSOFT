   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Procesos</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>Número de deserción</th>
                                <th>N. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C. Institucional</th>
                                <th>Fecha de proceso</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody class="">
                         <?php foreach ($Datos as $fila):?>
                            <tr>
                                <td><?=$fila->id_desercion?></td>
                                <td><?=$fila->num_documento?></td>
                                <td><?=$fila->nombres?></td>
                                <td><?=$fila->apellidos?></td>
                                <td><?=$fila->correo_instu?></td>
                                <td><?=$fila->fecha_reporte?></td>
                                <td>
                                  <?= ($fila->estado_usuario_id_estado==3)?
                                    '<h5 class="py-2"><span class="badge badge-info">En proceso</span></h5>':
                                    '<h5 class="py-2"><span class="badge badge-danger">Desertado</span></h5>'
                                  ?>
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
