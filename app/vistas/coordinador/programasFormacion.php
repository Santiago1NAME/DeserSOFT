<div class="container-fluid mt-4"> 
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid my-0">
                    <div class="row">
                        <div class="col my-auto">
                            <h4>Programas</h4>
                        </div>
                        <div class="col mt-0 text-right">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-address-book-o mr-2" aria-hidden="true"></i>Añadir programa</button>                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table id="table_id" class="table table-hover text-center">
                    <thead class="thead">
                        <tr>
                            <th>Nombre</th>
                            <th>Nivel</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    <?php foreach ($Datos as $fila):?>
                            <tr>
                                <td><?=$fila->nom_programa?></td>
                                <td><?=$fila->nvl_programa?></td>
                                <td><span class="badge badge-success">Activo</span></td>
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

<!-- Inicio del formulario modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header text-white" style="background: #33b35a;!important;">
        <h5 class="modal-title" id="exampleModalLabel">Añadir programa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo -->
<div class="modal-body" >
    <form action="<?= RUTA_URL ?>coordinador/registrarProgramas" method="post">
        <input type="hidden" id="ficha"  name="ficha" value="<?=$ficha;?>">
            <div class="form-group row mt-3">
                <div class="form-group col-md-6">
                    <small id="" class="form-text text-muted">Nombre</small>
                    <input  name="nom_programa" type="text" class="form-control" placeholder="Nombre programa" required>
                </div>
                <div class="form-group col-md-6">
                    <small id="" class="form-text text-muted">Nivel</small>
                    <select name="nvl_programa" class="form-control">
                        <option>-- Seleccione --</option>
                        <option value="Técnico">Técnico</option>
                        <option value="Tecnólogo">Tecnólogo</option>    
                    </select>
                </div>
            </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success btn-block">Agregar</button>  
    </div>                 
  </form>
</div>


<script>
    function estado(nom){
        let v = confirm(`Desea cambiar el estado del programa ${nom}`);
        if (v) {
            alert('cambiado');
        }
    }
</script>