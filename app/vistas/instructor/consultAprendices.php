   <div class="container-fluid mt-4"> 
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="container-fluid my-0">
                    <div class="row">
                      <div class="col my-auto">
                        <h4><?=$_SESSION['PARAM']?></h4>
                      </div>
                      <div class="col mt-0 text-right">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>Añadir aprendiz</button>                        
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-hover">
                        <thead class="thead">
                            <tr class="thead">
                                <th>T. Documento</th>
                                <th>N. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>C. Personal</th>
                                <th>C. Institucional</th>
                                <th></th>
                              </tr>
                          </thead>
                          <tbody class="tablebody">
                          <?php $p=0;?>
                              <?php foreach ($Datos as $fila):?> 
                              <?php $ficha = $fila->num_ficha;
                              $p+= 1;
                              if ($p == 1) {?>
                                <div class="container-fluid text-white mb-2 w-100" style="background: #33b35a;">
                                      <div class="row">
                    
                                          <div class="col-xs-12 col-md-3" id="fI">
                                              Fecha de inicio:<span><?=htmlspecialchars($fila->fecha_inicio);?></span>
                                          </div>
                                          <div class="col-xs-12 col-md-3" id="pgm">
                                              PROGRAMA: <?=htmlspecialchars($fila->nom_programa);?> 
                                          </div>
                                          <div class="col-xs-12 col-md-3" id="tri">
                                              TRIMESTRE: <?=htmlspecialchars($fila->num_trimestre); ?>
                                          </div>
                                          <div class="col-xs-12 col-md-3" id="fNL">
                                              Fecha de finalización: <?=htmlspecialchars($fila->fecha_fin);?>
                                          </div>
                                        
                                      </div>
                                  </div>
                              <?php };?>
                              <tr >
                                      <td class="text-capitalize"><?=htmlspecialchars($fila->Tip_doc);?></h2></td>
                                      <td><?=htmlspecialchars($fila->num_documento);?></h2></td>
                                      <td><?=htmlspecialchars($fila->nombres);?></h2></td>
                                      <td><?=htmlspecialchars($fila->apellidos);?></h2></td>
                                      <td><?=htmlspecialchars($fila->correo_perso);?></h2></td>
                                      <td><?=htmlspecialchars($fila->correo_instu);?></h2></td>
                                      <td style="padding:2px;">
                                        <button type="button" onclick="idA(<?=$fila->id_usuario;?>)" class="btn btn-danger btn-sm my-2" data-toggle="modal" data-target="#modelId">
                                          <i class="fa fa-envelope"></i> Notificar
                                        </button>
                                      </td>
                            <?php endforeach;?>
                            
                            </tr>
                          </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>




<!-- Inicio del formulario modal-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="despliege modal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #33b35a;!important;">
        <h5 class="modal-title text-white" id="exampleModalLabel">Añadir deserción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo -->
<div class="modal-body">
  <form id="desercion">
        <input type="hidden" id="ficha"  name="ficha" value="<?=$ficha;?>">
        <input type="hidden" id="id_aprendiz"  name="id_aprendiz">
        <div class="form-group">
          <label for="fecha1">Primera inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha1" id="fecha1" aria-describedby="Fecha 1" required>
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>        
        <div class="form-group">
          <label for="fecha2">Segunda inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha2" id="fecha2" aria-describedby="helpId" required>
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>        
        <div class="form-group">
          <label for="fecha3">Tercera inasistencia</label>
          <input type="date"
              class="form-control form-control-sm|lg" name="fecha3" id="fecha3" aria-describedby="helpId" required>
          <small id="helpId" class="form-text text-muted">Por favor, seleccione o escriba la fecha.</small>
        </div>
        <div class="form-group">
          <label for="causa">Causa</label>
          <select class="form-control  my-0 py-0" name="causa" id="causa">
          <option value="">-- Seleccionar causa --</option>
           <?php foreach ($Datos2 as $causa):?>
             <option value="<?= $causa->idDCausa;?>"><?=$causa->nombre;?></option>
           <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label for="obser">Observaciones</label>
          <textarea class="form-control" name="obser" id="obser" rows="3"></textarea>
        </div>
        <div class="text-center">
          <button type="button" name="" id="" class="btn btn-success btn-lg btn-block" onclick="deser()">Iniciar</button>   
        </div>
  </form>
</div>

</div>
</div>
</div>
<!-- Inicio del formulario modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header text-white" style="background: #33b35a;!important;">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Aprendiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo -->
<div class="modal-body" >
<form action="<?= RUTA_URL ?>instructor/registrarAprendices" method="post">
    <input type="hidden" id="ficha"  name="ficha" value="<?=$_SESSION['PARAM'];?>">
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="nombres" type="text" class="form-control" placeholder="Nombres" required>
      </div>
      <div class="form-group col-md-6">
            <input  name="apellidos" type="text" class="form-control" placeholder="Apellidos" required>
      </div>
    </div>

      <div class="form-group">
        <select id="id_doc" name="id_doc" class="form-control">
            <option value="0">-- --</option>
            <option value="1">Tarjeta Identidad</option>
            <option value="2">Cedula Ciudadania</option>
            <option value="3">Cedula de Extranjeria</option>
            <option value="4">Documento nacional de Identificacion</option>
        </select><br>
        <input name="num_documento"  type="number" class="form-control mt-0" placeholder="Numero Documento" required>
      </div>
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="cel_usuario" type="number" class="form-control" placeholder="Celular" required>      
      </div>
      <div class="form-group col-md-6">
            <input  name="tel_usuario" type="number" class="form-control" placeholder="Telefono" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="form-group col-md-6">
            <input  name="correo_instu" type="email" class="form-control" placeholder="Correo electronico personal" required>
      </div>
      <div class="form-group col-md-6">
           <input name="correo_perso" type="email" class="form-control" placeholder="Correo electronico institucional" required>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success btn-block">Agregar</button>  
    </div>                 
  </form>
</div>


<script>
function deser() {
   var formData = new FormData($('#desercion')[0]);
    ajax("<?= RUTA_URL ?>instructor/registrarDesercion", formData);
}
function idA(id){
  $('#id_aprendiz').val(id);
}
</script>
