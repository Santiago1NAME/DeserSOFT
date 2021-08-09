   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Mi proceso</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead class="thead">
                            <tr>
                                <th>Número del proceso</th>
                                <th>Fecha del reporte</th>
                                <th>Primera Falla</th>
                                <th>Segunda Falla</th>
                                <th>Tercera Falla</th>
                                <th>Observaciones</th>
                                <th>Causa</th>
                                <th>Instructor</th>
                                <th>Estado</th>
                                
                            </tr>
                        </thead>
                           
                        <tbody class="tablebody ">                        
                            <?php if ($Datos!=null):
                              $id_usuario = $Datos->id_usuario;  
                            ?>
                            <tr> 
                                <td class="pl-3"><?= $Datos->id_desercion ?></td>
                                <td class="pl-3"><?= $Datos->fecha_reporte ?></td>
                                <td class="pl-3"><?= $Datos->fecha_desercion1 ?></td>
                                <td class="pl-3"><?= $Datos->fecha_desercion2 ?></td>
                                <td class="pl-3"><?= $Datos->fecha_desercion3 ?></td>
                                <td class="pl-3"><?= $Datos->observaciones ?></td>
                                <td class="pl-3"><?= $Datos->nombre ?></td>
                                <td class="pl-3"><?= $Datos->nombres ?></td>
                               <td><h5 class="py-2"><span class="badge badge-danger">Desertado</span></h5></td>

                            </tr>
                            <?php endif;?>
                          
                        </tbody>
                    </table>
                   <iframe src="<?=RUTA_URL?>public/pdf/<?=$id_usuario?>.pdf" frameborder="0" style="width: 100%; height: 50vh;"></iframe>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
