<div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Lista de instructores</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>T. Documento</th>
                                <th>N. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C. Institucional</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php foreach ($Datos as $fila):?>
                            <tr>
                                <td><?=$fila->Tip_doc?></td>
                                <td><?=$fila->num_documento?></td>
                                <td><?=$fila->nombres?></td>
                                <td><?=$fila->apellidos?></td>
                                <td><?=$fila->correo_instu?></td>
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
