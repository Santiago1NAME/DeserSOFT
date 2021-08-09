   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Fichas</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover">
                        <thead class="thead">
                            <th>Ficha</th>
                            <th>Programa</th>
                            <th>Trimestres</th>
                            <th>Fecha de inicio</th>
                            <th>Fecha de fin</th>
                            <th>Jornada</th>
                            <th></th>
                        </thead>
                        <tbody class="tablebody">
                            <?php foreach ($Datos as $fila):?>
                            <tr> 
                                <td class="pl-3"><?=$fila->num_ficha?></td>
                                <td class="pl-3"><?=$fila->nom_programa?></td>
                                <td class="pl-3"><?=$fila->num_trimestre?></td>
                                <td class="pl-3"><?=$fila->fecha_inicio?></td>
                                <td class="pl-3"><?=$fila->fecha_fin?></td>
                                <td class="pl-3"><?=$fila->nom_jornada?></td>
                                <td class="pl-3"><a href="<?= RUTA_URL ?>instructor/vistaRegistrarAprendices/<?=$fila->num_ficha;?>"><button class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</button></a></td>
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
