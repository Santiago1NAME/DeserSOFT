
   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Procesos de deserción</h4>
                </div>
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
                                <th>FORMATO</th>
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
                                <td><a href="<?=RUTA_URL?>public/pdf/<?=$fila->id_usuario;?>.pdf" target="_blank" style="font-size: 20px" rel="noopener noreferrer"><i class="fa fa-external-link-alt"></i></a></td>
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
