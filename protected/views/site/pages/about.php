<div class="container">
    <h2>Modales</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Modal Error</button>
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">Modal Info</button>
    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal3">Modal Advertencia</button>
    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal4">Modal Satisfactorio</button>
    

    <!-- Modal Error -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myred">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mensaje de Error !</h4>
                </div>
                <div class="modal-body padding-10 ">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2  ">
                                <i class="fa fa-exclamation-circle fa-3x text-red"></i>
                            </label>
                            <div class="col-sm-9 pull-left no-padding-left">
                                <p class="text-justify">"Se produjo un error de formato al cargar los datos. Rectifique que el siguiente formato "Nombre y Apellidos, Usuario, Cédula, Correo" se cumpla en las siguientes filas: [1], [N]."</p>
                            </div>
                        </div>
                  
                    </form>

                </div>
                <div class="modal-footer no-padding-top">
                    <button type="button" class="btn btn-red" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal Info -->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header panel-myblue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Mensaje de Información !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form class="form-horizontal" role="form">
                    <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 ">
                                <i class="fa fa-question-circle fa-3x text-myblue"></i>
                            </label>
                            <input type="hidden" id="" name=""/>
                            <div class="col-sm-9 pull-left no-padding-left">
                                <p class="text-justify">"No se pudo guardar el usuario,intentelo de nuevo"</p>
                            </div>
                        </div>
                  
                    </form>

                </div>
                <div class="modal-footer no-padding-top">
                    <button type="button" class="btn btn-my-blue" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
               <!-- Modal Advertencia -->
    <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="" name=""/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar este objeto?"</p>
                        </div>
                    </div>

                </div>
                 <div class="modal-footer no-padding-top">
                    <button type="button" class="btn btn-yellow" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
                      <!-- Modal Satisfactorio -->
    <div class="modal fade" id="myModal4" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-mygreen">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-white">Mensaje Satisfactorio !</h4>
                </div>
                <div class="modal-body padding-10">
                     <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-check-circle fa-3x text-green"></i>
                        </label>
                        <input type="hidden" id="" name=""/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Su registro se efectuó satisfactoriamente."</p>
                        </div>
                    </div>

                </div>
               <div class="modal-footer ">                    
                    <button type="button" class="btn btn-my-green" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>