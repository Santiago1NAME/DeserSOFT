<style>
    a{
       text-decoration: none!important;  
    }
</style>
<div class="container-fluid mt-4"> 
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <h4>Uusarios</h4>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-col-block col-md-4 text-center">
                                <button  onclick="location.href='<?=RUTA_URL?>coordinador/consultarUsuarios/4'" class="btn btn-info w-50">
                                        <a class="text-white"> Enfermeras <h3><span class="badge badge-danger"><i class="fa fa-medkit"></i></span></h3></a>
                                </button>
                            </div>    
                            <div onclick="location.href='<?=RUTA_URL?>coordinador/consultarUsuarios/2'" class="col-md-4 text-center">
                                    <button class="btn btn-info w-50">
                                        <a class="text-white"> Intructores <h3><span class="badge badge-danger"><i class="fa fa-id-badge"></i></span></h3></a>
                                </button>
                            </div>    
                            <div onclick="location.href='<?=RUTA_URL?>coordinador/consultarUsuarios/3'" class="col-md-4 text-center">
                                <button class="btn btn-info w-50">
                                        <a class="text-white"> Aprendices <h3><span class="badge badge-danger"><i class="fa fa-user-circle"></i></span></h3></a>
                                </button>
                            </div>    
                            
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        </div>
    </div>