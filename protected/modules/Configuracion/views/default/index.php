
<?php
Yii::import('application.modules.Configuracion.models.Usuario');
Yii::import('application.modules.ProcesosEstrategias.models.*');
Yii::import('application.modules.GradoMadurez.models.*');

/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="toolbar ">
    <div class="col-sm-6">
        <div class="page-header">
            <h1>
                Configuración: Gestión de Parámetros <br>
                <?php
                $user = new Usuario();
                $usuario = $user->findByPk(Yii::app()->user->id);
                ?>
                <small class="visible-lg">Bienvenido a PROFIT : <a><i><?php echo $usuario->nombre; ?></i></a> </small>
            </h1>
        </div>

    </div>
    <div class="col-sm-6 ">        
        <div class="toolbar-tools pull-right">
            <!-- start: TOP NAVIGATION MENU -->
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=site/index"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Configuración</li>
            </ol>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>

</div>
<div class="row padding-5" style="margin-top: 20px;">

    <!--Tabla Empresa-->
    <!--begin-->
    <div class="col-lg-6 col-md-12 ">
        <div class="panel panel-green">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-building fa-2x"></i></span><span class="text-large text-white"> EMPRESAS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearEmpresaModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesEmpresaModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" >
                        <li class="active">
                            <a data-toggle="tab" >
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="" class="tab-pane active">
                            <div class="panel-scroll height-180 scrollbar" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaEmpresa" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Empresa</th>
                                            <th>RUC</th>
                                            <th>Descripción</th>
                                            <th>ID Empresa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $empresa = new Empresa();
                                        $empresas = $empresa->findAll();
                                        foreach ($empresas as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->ruc ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_empresa ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_empresa ?>" data-toggle="modal" data-target="#editarEmpresaModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>
                                                        <?php
                                                        $dimensionElim = new Dimension();
                                                        $countDimensiones = $dimensionElim->findAllByAttributes(array('id_empresa' => $value->id_empresa));
                                                        $countDimensiones = count($countDimensiones);
                                                        $unidadNegocioElim = new UnidadNegocio();
                                                        $countUnidadesNegocio = $unidadNegocioElim->findAllByAttributes(array('id_empresa' => $value->id_empresa));
                                                        $countUnidadesNegocio = count($countUnidadesNegocio);
                                                        if ($countDimensiones == 0 && $countUnidadesNegocio == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteEmpresa"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteEmpresa"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
                                                        <a data-toggle="popover" title="Descripción de la Empresa" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>

                                                    </div>                     

                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>                                   
                    </div>
                </div>
            </div>
        </div>
        <!--end Tabla Empresa-->

        <!-- modal Crear Empresa
        Begin-->
        <div class="modal fade" id="crearEmpresaModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Empresa</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="crearEmpresa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/empresa/create' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Empresa
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreEmpresa" name="nombreEmpresa" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            RUC
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="ruc" name="ruc"  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">                                 
                                        <textarea id="descripcionEmpresa" name="descripcionEmpresa" class="form-control" placeholder="Observaciones..."></textarea>
                                    </div>
                                </div>
                            </div>                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-green" >Registrar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div></form>
                </div>

            </div>
        </div>
        <!--end Crear Empresa-->


        <!-- modal Editar Empresa
                Begin-->
        <div class="modal fade" id="editarEmpresaModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Empresa</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="editarEmpresa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/empresa/update' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Empresa
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreEmpresaEditar" name="nombreEmpresaEditar" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden">
                                    <input type="hidden" id="idEmpresa" name="idEmpresa"/>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            RUC
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="rucEditar" name="rucEditar"  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">                                 
                                        <textarea id="descripcionEmpresaEditar" name="descripcionEmpresaEditar" class="form-control" data-toggle="tooltip" data-placement="top" title="Descripción  de la Empresa"></textarea>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-green" >Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>    </form>
                </div>

            </div>
        </div>
        <!--end Editar Empresa-->
        <!--begin detalles Empresa-->

        <div class="modal fade" id="detallesEmpresaModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Empresas</h3>
                    </div>
                    <div class="modal-body padding-20">
                        <form id="editarEmpresa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/empresa/update' ?>" method="post">
                            <table id="tablaDetallesEmpresa" class="table table-bordered table-striped" style="width:100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>Empresa</th>
                                        <th>RUC</th>
                                        <th>Descripción</th>


                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $empresa = new Empresa();
                                    $empresas = $empresa->findAll();
                                    foreach ($empresas as $value) {
                                        ?> 
                                        <tr>
                                            <td>
                                                <?php echo $value->nombre; ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->ruc ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->descripcion ?>                
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>    </form>
                </div>

            </div>
        </div>


        <!--MODAL DELETE EMPRESA -->
        <!--BEGIN-->
        <div class="modal fade" id="ModalDeleteEmpresa" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-header panel-myyellow">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>

                    </div>
                    <div class="modal-body padding-10">
                        <form id="FormEliminarEmpresa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/empresa/delete' ?>" method="post">
                            <div class="form-group">
                                <label style="width:auto;"class="col-sm-2 no-padding ">
                                    <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                                </label>
                                <input type="hidden" id="idEmpresaEliminar" name="idEmpresaEliminar"/>
                                <div class="col-sm-9">
                                    <p class="text-justify">"Desea eliminar esta Empresa?"</p>
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer" id="modalEliminarEmpresaBotones">
                        <button type="submit" class="btn btn-yellow" >Aceptar</button>
                        <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END-->

        <!--end detalles Empresa-->
        <!-- Tabla Unidad de Negocio
   Begin-->
        <div class="panel panel-red">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-briefcase fa-2x"></i></span><span class="text-large text-white"> UNIDADES DE NEGOCIO</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearUnidadNegocioModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesUnidadModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" >
                        <li class="active">
                            <a data-toggle="tab">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaUnidadNegocio" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Unidad de Negocio</th>
                                            <th>Empresa</th>
                                            <th>ID Empresa</th>
                                            <th>Descripción</th>
                                            <th>ID Unidad de Negocio</th>
                                            <th>Grado de Madurez</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $unidadNegocio = new UnidadNegocio();
                                        $unidadesNegocio = $unidadNegocio->findAll();
                                        foreach ($unidadesNegocio as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idEmpresa->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_empresa ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_unidad_negocio ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->evaluacion ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_unidad_negocio ?>" data-toggle="modal" data-target="#editarUnidadNegocioModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteUnidadNegocio"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>
                                                        <?php
                                                        $siLeHicieronElCuestionario = new ResultadoCuestionario();
                                                        $siLeHicieronElCuestionario = $siLeHicieronElCuestionario->findAllByAttributes(array('id_unidad_negocio' => $value->id_unidad_negocio));
                                                        $cantidadM = count($siLeHicieronElCuestionario);
                                                        if ($cantidadM == 0) {
                                                            ?>
                                                            <div title="Grado de Madurez" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  onclick="mover(<?php echo $value->id_unidad_negocio; ?>)"  class="btn btn-xs btn-yellow tooltips delete disabled"> <i class="fa fa-graduation-cap"></i></a>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Grado de Madurez" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  onclick="mover(<?php echo $value->id_unidad_negocio; ?>)"  class="btn btn-xs btn-yellow tooltips delete "> <i class="fa fa-graduation-cap"></i></a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <a data-toggle="popover" title="Descripción de la Unidad de Negocio" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>

                                                    </div>                     

                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>                                   
                    </div>
                </div>
            </div>
        </div>
        <!--end Tabla Unidad de Negocio-->
        <!-- modal Crear Unidad de Negocio
           Begin-->
        <div class="modal fade" id="crearUnidadNegocioModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-red">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Unidad de Negocio</h3>
                    </div>
                    <div class="modal-body">
                        <form id="crearUnidadNegocio" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/unidadNegocio/create' ?>" method="post">
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Unidad de Negocio
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreUnidadNegocio" name="nombreUnidadNegocio" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Empresa
                                            <span class="symbol required"></span>
                                        </label>
                                        <select  id="idEmpresa" name="idEmpresa" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                            <?php
                                            $empresa = new Empresa();
                                            $empresas = $empresa->findAll();
                                            foreach ($empresas as $value) {
                                                ?> 

                                                <option value="<?php echo $value->id_empresa; ?>">
                                                    <?php
                                                    echo $value->nombre;
                                                }
                                                ?> 
                                            </option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">                                 
                                        <textarea id="descripcionUnidadNegocio" title="Descripcion  de Macroproceso" name="descripcionUnidadNegocio" class="form-control" placeholder="Observaciones..."></textarea>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-red" >Registrar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div> </form>
                </div>

            </div>
        </div>
        <!--end Crear Unidad de Negocio-->

        <!-- modal Editar Unidad de Negocio
                Begin-->
        <div class="modal fade" id="editarUnidadNegocioModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-red">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Unidad de Negocio</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="editarUnidadNegocio" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/unidadNegocio/update' ?>" method="post">
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Unidad de Negocio
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreUnidadNegocioEditar" name="nombreUnidadNegocioEditar" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Empresa
                                            <span class="symbol required"></span>
                                        </label>
                                        <select  id="idEmpresaEditar" name="idEmpresaEditar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                            <?php
                                            $empresa = new Empresa();
                                            $empresas = $empresa->findAll();
                                            foreach ($empresas as $value) {
                                                ?> 

                                                <option value="<?php echo $value->id_empresa; ?>">
                                                    <?php
                                                    echo $value->nombre;
                                                }
                                                ?> 
                                            </option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden"> 
                                    <input type="hidden" id="idUnidadNegocio" name="idUnidadNegocio"/>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">                                 
                                        <textarea id="descripcionUnidadNegocioEditar" title="Descripcion  de Macroproceso" name="descripcionUnidadNegocioEditar" class="form-control" data-toggle="tooltip" data-placement="top" title="Descripción  de la Unidad de Negocio"></textarea>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-red" >Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>       </form>
                </div>

            </div>
        </div>
        <!--end Editar Unidad de Negocio-->
        <!--MODAL  DETAILS UNIDAD-->
        <!--BEGIN-->
        <div class="modal fade" id="detallesUnidadModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-red">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Unidades de Negocio</h3>
                    </div>
                    <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                        <form >
                            <table id="tablaDetallesUnidad" class="table table-bordered table-striped" style="width:100%;">
                                <thead class="text-center">
                                    <tr>
                                        <th>Unidad</th>
                                        <th>Empresa</th>    
                                        <th>Grado de Madurez</th>    
                                        <th>Descripción</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $unidadNegocio = new UnidadNegocio();
                                    $unidadesNegocio = $unidadNegocio->findAll();
                                    foreach ($unidadesNegocio as $value) {
                                        ?> 
                                        <tr>
                                            <td>
                                                <?php echo $value->nombre; ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->idEmpresa->nombre ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->evaluacion ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->descripcion ?>                
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>           


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div> </form>
                </div>


            </div>
        </div>
        <!--END-->
    </div>

    <!--MODAL DELETE Unidad de Negocio -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteUnidadNegocio" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>

                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarUnidadNegocio" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/unidadNegocio/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idUnidadNegocioEliminar" name="idUnidadNegocioEliminar"/>
                            <div class="col-sm-9">
                                <p class="text-justify">"Desea eliminar esta Unidad de Negocio?"</p>
                            </div>
                        </div>

                </div>
                <div class="modal-footer" id="modalEliminarUnidadNegocioBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--END-->



    <!-- Tabla Impacto Cualitativo
        Begin-->
    <div class="col-lg-6 col-md-12 ">
        <div class="panel panel-blue">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-th fa-2x"></i></span><span class="text-large text-white"> CUALITATIVO</span>
                <div class="pull-right">
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-sm btn-transparent-white dropdown-toggle" type="button">
                            <i class="fa fa-plus"></i> Nuevo <span class="caret" style="border-top-color:white;"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a data-toggle="modal" data-target="#crearImpactoCualitativoModal" href="">                               
                                    Impacto
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#crearProbabilidadCualitativaModal" href="">
                                    Probabilidad
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#crearRiesgoCualitativoModal" href="">
                                    Riesgo
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-sm btn-transparent-white dropdown-toggle" type="button"  >
                            <i class="fa fa-bars" style="font-size:16px;"></i> <span class="caret" style="border-top-color:white;"></span>
                        </button>  

                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a data-toggle="modal" data-target="#DetallesImpactoCualitativoModal" href="">
                                    Listado de Impactos
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#DetallesProbabilidadCualitativoModal" href="">                                
                                    Listado de Probabilidades
                                </a>
                            </li>
                            <li>
                                <a data-toggle="modal" data-target="#DetallesRiesgoCualitativoModal" href="">
                                    Listado de Riesgos
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" >
                        <li class="active">
                            <a data-toggle="tab" href="#todo_tab_example1">
                                Impacto
                            </a>
                        </li> 
                        <li class="">
                            <a data-toggle="tab" href="#todo_tab_example2">
                                Probabilidad
                            </a>
                        </li>
                        <li class="">
                            <a data-toggle="tab" href="#todo_tab_example3">
                                Riesgo
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180 scrollbar" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaImpactoCualitativo" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Impacto</th>
                                            <th>Valor</th>
                                            <th>Rango Inferior</th>
                                            <th>Rango Superior</th>
                                            <th>ID Impacto Cualitativo</th>

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $impactoCualitativo = new ImpactoCualitativo();
                                        $impactosCualitativos = $impactoCualitativo->findAll();
                                        foreach ($impactosCualitativos as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->valor ?>                
                                                </td>
                                                <td>
                                                    $ <?php echo $value->rango_inferior ?>                
                                                </td>
                                                <td>
                                                    $ <?php echo $value->rango_superior ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_impacto_cualitativo ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_impacto_cualitativo ?>" data-toggle="modal" data-target="#editarImpactoCualitativoModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteImpactoCualitativo"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>

                                                    </div>                     

                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>

                        </div>  
                        <!--end Tab1-->
                        <div id="todo_tab_example2" class="tab-pane">
                            <div class="panel-scroll height-180 scrollbar" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaProbabilidadCualitativa" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Probabilidad</th>
                                            <th>Valor</th>
                                            <th>Rango Inferior</th>
                                            <th>Rango Superior</th>
                                            <th>ID Probabilidad Cualitativo</th>

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $probabilidadCualitativa = new ProbabilidadCualitativa();
                                        $probabilidadesCualitativas = $probabilidadCualitativa->findAll();
                                        foreach ($probabilidadesCualitativas as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->valor ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->rango_inferior ?> %                
                                                </td>
                                                <td>
                                                    <?php echo $value->rango_superior ?> %               
                                                </td>
                                                <td>
                                                    <?php echo $value->id_probabilidad_cualitativa ?>                
                                                </td>
                                                <td class="center"> 
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_probabilidad_cualitativa ?>" data-toggle="modal" data-target="#editarProbabilidadCualitativaModal"  class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>     
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteProbabilidadCualitativa"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>

                                                    </div>

                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!--end Tab2-->
                        <div id="todo_tab_example3" class="tab-pane">
                            <div class="panel-scroll height-180 scrollbar" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaRiesgoCualitativo" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Riesgo</th>
                                            <th>Rango Inferior</th>
                                            <th>Rango Superior</th>
                                            <th>ID Impacto Cualitativo</th>

                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $riesgoCualitativo = new RiesgoCualitativo();
                                        $riesgosCualitativos = $riesgoCualitativo->findAll();
                                        foreach ($riesgosCualitativos as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->rango_inferior ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->rango_superior ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_riesgo_cualitativo ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_riesgo_cualitativo ?>" data-toggle="modal" data-target="#editarRiesgoCualitativoModal"  class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteRiesgoCualitativo"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>

                                                    </div>

                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!--end Tab3-->
                    </div>
                </div>
            </div>
        </div>

        <!--begin Grupo de riesgo-->
        <div class="panel panel-azure">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-sliders fa-2x"></i></span><span class="text-large text-white"> GRUPO DE RIESGOS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearGrupoRiesgoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesGrupoRiesgoModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" >
                        <li class="active">
                            <a data-toggle="tab" href="#todo_tab_example1">
                                Listado
                            </a>
                        </li> 

                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180 scrollbar" style="overflow-x: hidden; overflow-y: auto;" id="style-10">
                                <table id="tablaGrupoRiesgo" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Código</th>
                                            <th>Grupo de Riesgo</th>
                                            <th>ID Grupo Riesgo</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $grupoRiesgo = new GrupoRiesgo();
                                        $gruposRiesgo = $grupoRiesgo->findAll();
                                        foreach ($gruposRiesgo as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->codigo; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_grupo_riesgo ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="" data-toggle="modal" data-target="#editarGrupoRiesgoModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteGrupoRiesgo"> <i class="fa fa-times fa fa-white"></i></a>  
                                                        </div>

                                                        <a data-toggle="popover" title="Descripción del Grupo de Riesgo" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>
                                                    </div> 
                                                </td> 
                                            </tr>
                                            <?php
                                        }
                                        ?> 
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>  
                        <!--end Tab1-->

                    </div>
                </div>
            </div>
        </div>
        <!--end Grupo de riesgo-->
        <!-- modal Crear Impacto Cualitativo
            Begin-->
        <div class="modal fade" id="crearImpactoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Impacto Cualitativo</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="crearImpactoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/impactoCualitativo/create' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre del Impacto
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreImpactoCualitativo" name="nombreImpactoCualitativo" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Valor del Impacto
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="valorImpactoCualitativo" name="valorImpactoCualitativo" title="Nombre del  Responsable" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos <span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Inferior
                                                    </label>
                                                    <input type="text" id="rangoInferiorImpactoCualitativo" name="rangoInferiorImpactoCualitativo" class="form-control" placeholder="$ 000"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                               <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoInferiorImpactoCualitativo" name="rangoInferiorImpactoCualitativo" class="form-control" placeholder="$ 000"/>
                                                </div>
                                            </div>
                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-blue">Registrar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div></div>
        <!--end Crear Impacto Cualitativo-->

        <!-- modal Editar Impacto Cualitativo
                    Begin-->
        <div class="modal fade" id="editarImpactoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Impacto Cualitativo</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="editarImpactoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/impactoCualitativo/update' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre del Impacto
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreImpactoCualitativoEditar" name="nombreImpactoCualitativoEditar" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Valor del Impacto
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="valorImpactoCualitativoEditar" name="valorImpactoCualitativoEditar" title="Nombre del  Responsable" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos<span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoInferiorImpactoCualitativoEditar" name="rangoInferiorImpactoCualitativoEditar" class="form-control" placeholder="$ 000"/>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoSuperiorImpactoCualitativoEditar" name="rangoSuperiorImpactoCualitativoEditar" class="form-control" placeholder="$ 000"/>
                                                </div>
                                               
                                            </div>
                                            <div class="col-sm-6 hidden"> 
                                                <input type="hidden" id="idImpactoCualitativo" name="idImpactoCualitativo"/>
                                            </div>
                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue">Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div> </form>
                </div>

            </div>
        </div>
        <!--end Editar Impacto Cualitativo-->
        <!--begin detalles IMPACTO-->

        <div class="modal fade" id="DetallesImpactoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Impactos Cualitativos</h3>
                    </div>
                    <div class="modal-body padding-20">
                        <form>
                            <table id="tablaDetallesImpactoCualitativo" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Impacto</th>
                                        <th>Valor</th>
                                        <th>Rango Inferior</th>
                                        <th>Rango Superior</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $impactoCualitativo = new ImpactoCualitativo();
                                    $impactosCualitativos = $impactoCualitativo->findAll();
                                    foreach ($impactosCualitativos as $value) {
                                        ?> 
                                        <tr>
                                            <td>
                                                <?php echo $value->nombre; ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->valor ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->rango_inferior ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->rango_superior ?>                
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>    </form>
                </div>

            </div>
        </div>

        <!--end detalles IMPACTO-->

        <!--MODAL DELETE IMPACTO CUALITATIVO -->
        <!--BEGIN-->
        <div class="modal fade" id="ModalDeleteImpactoCualitativo" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-header panel-myyellow">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="FormEliminarImpactoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/impactoCualitativo/delete' ?>" method="post">
                            <div class="form-group">
                                <label style="width:auto;"class="col-sm-2 no-padding ">
                                    <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                                </label>
                                <input type="hidden" id="idImpactoCualitativoEliminar" name="idImpactoCualitativoEliminar"/>
                                <div class="col-sm-9">
                                    <p class="text-justify ">"Desea eliminar este Impacto Cualitativo?"</p>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer" id="modalEliminarImpactoCualitativoBotones">
                        <button type="submit" class="btn btn-yellow" >Aceptar</button>
                        <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!--END-->
        <!-- modal Crear Probabilidad Cualitativa
                   Begin-->
        <div class="modal fade" id="crearProbabilidadCualitativaModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header panel-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Probabilidad Cualitativa</h3>
                    </div>
                    <form id="crearProbabilidadCualitativa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/probabilidadCualitativa/create' ?>" method="post">
                        <div class="modal-body padding-10">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Probabilidad
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreProbabilidadCualitativa" name="nombreProbabilidadCualitativa" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Valor de la Probabilidad:
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="valorProbabilidadCualitativa" name="valorProbabilidadCualitativa" title="Nombre del  Responsable" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos<span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                 <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoInferiorProbabilidadCualitativa" name="rangoInferiorProbabilidadCualitativa" class="form-control" placeholder="00 %"/>
                                                </div>
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                 <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangosuperiorProbabilidadCualitativa" name="rangosuperiorProbabilidadCualitativa" class="form-control" placeholder="00 %"/>
                                                </div>
                                               
                                            </div>

                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-blue">Registrar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div></form>
                </div>

            </div>
        </div>
        <!--end Crear Probabilidad Cualitativa-->


        <!-- modal Editar Probabilidad Cualitativa  Begin-->

        <div class="modal fade" id="editarProbabilidadCualitativaModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Probabilidad Cualitativa</h3>
                    </div>
                    <div class="modal-body pad">
                        <form id="editarProbabilidadCualitativa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/probabilidadCualitativa/update' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre de la Probabilidad
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreProbabilidadCualitativaEditar" name="nombreProbabilidadCualitativaEditar" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Valor de la Probabilidad
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="valorProbabilidadCualitativaEditar" name="valorProbabilidadCualitativaEditar" title="Nombre del  Responsable" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos<span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                
                                                <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoInferiorProbabilidadCualitativaEditar" name="rangoInferiorProbabilidadCualitativaEditar" class="form-control" placeholder="00 %"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                 <div class="form-group"> 
                                                    <label for="form-field-22">
                                                        Superior
                                                    </label>
                                                    <input type="text" id="rangoSuperiorProbabilidadCualitativaEditar" name="rangoSuperiorProbabilidadCualitativaEditar" class="form-control" placeholder="00 %"/>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6 hidden"> 
                                                <input type="hidden" id="idProbabilidadCualitativa" name="idProbabilidadCualitativa"/>
                                            </div>
                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue">Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div> </form>
                </div>

            </div>
        </div>
        <!--end Editar Probabilidad Cualitativa-->
        <!--begin detalles PROBABILIDAD-->
        <div class="modal fade" id="DetallesProbabilidadCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Probabilidades Cualitativas</h3>
                    </div>
                    <div class="modal-body padding-20">
                        <form>
                            <table id="tablaDetallesProbabilidadCualitativo" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Probabilidad</th>
                                        <th>Valor</th>
                                        <th>Rango Inferior</th>
                                        <th>Rango Superior</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $probabilidadCualitativa = new ProbabilidadCualitativa();
                                    $probabilidadesCualitativas = $probabilidadCualitativa->findAll();
                                    foreach ($probabilidadesCualitativas as $value) {
                                        ?> 
                                        <tr>
                                            <td>
                                                <?php echo $value->nombre; ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->valor ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->rango_inferior ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->rango_superior ?>                
                                            </td>


                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>    </form>
                </div>

            </div>
        </div>

        <!--end detalles PROBABILIDAD-->

        <!--MODAL DELETE PROBABILIDAD CUALITATIVA -->
        <!--BEGIN-->
        <div class="modal fade" id="ModalDeleteProbabilidadCualitativa" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-header panel-myyellow">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="FormEliminarProbabilidadCualitativa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/probabilidadCualitativa/delete' ?>" method="post">
                            <div class="form-group">
                                <label style="width:auto;"class="col-sm-2 no-padding ">
                                    <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                                </label>
                                <input type="hidden" id="idProbabilidadCualitativaEliminar" name="idProbabilidadCualitativaEliminar"/>
                                <div class="col-sm-9">
                                    <p class="text-justify">"Desea eliminar esta Probabilidad Cualitativa?"</p>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer" id="modalEliminarProbabilidadCualitativaBotones">
                        <button type="submit" class="btn btn-yellow" >Aceptar</button>
                        <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        <!--END-->


        <!-- modal Crear Riesgo Cualitativo
                   Begin-->
        <div class="modal fade" id="crearRiesgoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Riesgo Cualitativo</h3>
                    </div>
                    <form id="crearRiesgoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/riesgoCualitativo/create' ?>" method="post">
                        <div class="modal-body padding-10">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre del Riesgo
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreRiesgoCualitativo" name="nombreRiesgoCualitativo" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos<span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                <div class="form-group">                                            
                                                    <input type="text" id="rangoInferiorRiesgoCualitativo" name="rangoInferiorRiesgoCualitativo" class="form-control" placeholder="Inferior"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">                                            
                                                    <input type="text" id="rangosuperiorRiesgoCualitativo" name="rangosuperiorRiesgoCualitativo"  class="form-control" placeholder="Superior"/>
                                                </div>
                                            </div>

                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-blue" >Registrar</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>   </form>
                </div>

            </div>
        </div>
        <!--end Crear Riesgo Cualitativo-->

        <!-- modal Editar Riesgo Cualitativo
                    Begin-->
        <div class="modal fade" id="editarRiesgoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-blue">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Riesgo Cualitativo</h3>
                    </div>
                    <div class="modal-body padding-10">
                        <form id="editarRiesgoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/riesgoCualitativo/update' ?>" method="post">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="form-field-22">
                                            Nombre del Riesgo
                                            <span class="symbol required"></span>
                                        </label>
                                        <input type="text" id="nombreRiesgoCualitativoEditar" name="nombreRiesgoCualitativoEditar" title="Nombre de Macroproceso" class="form-control" />
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">Rangos<span class="symbol required"></span></h3>
                                        </div><!-- /.box-header -->
                                        <!-- form start -->                                
                                        <div class="box-body padding-5">
                                            <div class="col-sm-6">
                                                <div class="form-group">                                            
                                                    <input type="text" id="rangoInferiorRiesgoCualitativoEditar" name="rangoInferiorRiesgoCualitativoEditar" class="form-control" placeholder="Inferior"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">                                            
                                                    <input type="text" id="rangoSuperiorRiesgoCualitativoEditar" name="rangoSuperiorRiesgoCualitativoEditar"  class="form-control" placeholder="Superior"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 hidden"> 
                                                <input type="hidden" id="idRiesgoCualitativo" name="idRiesgoCualitativo"/>
                                            </div>
                                        </div><!-- /.box-body -->                               
                                    </div>
                                </div>

                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-blue" >Actualizar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>     </form>
                </div>

            </div>
        </div>
        <!--end Editar Riesgo Cualitativo-->
        <!--begin detalles RIESGO-->
        <div class="modal fade" id="DetallesRiesgoCualitativoModal" role="dialog">
            <!--<div class="modal-dialog" style="width: 90%">-->
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header partition-green">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Riesgos Cualitativos</h3>
                    </div>
                    <div class="modal-body padding-20">
                        <form>
                            <table id="tablaDetallesRiesgoCualitativo" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Riesgo</th>
                                        <th>Rango Inferior</th>
                                        <th>Rango Superior</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <?php
                                    $riesgoCualitativo = new RiesgoCualitativo();
                                    $riesgosCualitativos = $riesgoCualitativo->findAll();
                                    foreach ($riesgosCualitativos as $value) {
                                        ?> 
                                        <tr>
                                            <td>
                                                <?php echo $value->nombre; ?>                
                                            </td>

                                            <td>
                                                <?php echo $value->rango_inferior ?>                
                                            </td>
                                            <td>
                                                <?php echo $value->rango_superior ?>                
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?> 
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>    </form>
                </div>

            </div>
        </div>

        <!--end detalles RIESGO-->
    </div>

    <!--MODAL DELETE RIESGO CUALITATIVO -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteRiesgoCualitativo" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarRiesgoCualitativo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/riesgoCualitativo/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idRiesgoCualitativoEliminar" name="idRiesgoCualitativoEliminar"/>
                            <div class="col-sm-9">
                                <p class="text-justify" >"Desea eliminar este Riesgo Cualitativo?"</p>
                            </div>
                        </div>


                </div>
                <div class="modal-footer" id="modalEliminarRiesgoCualitativoBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--END-->
    <!--end Tabla Impacto Cualitativo-->
    <!-- modal Crear Grupo de Riesgo
                       Begin-->
    <div class="modal fade" id="crearGrupoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Grupo de Riesgo</h3>
                </div>

                <form id="crearGrupoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/grupoRiesgo/create' ?>" method="post">
                    <div class="modal-body padding-10">

                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Grupo de Riesgo
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreGrupoRiesgo" name="nombreGrupoRiesgo" title="Nombre de Macroproceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Código
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="codigoGrupoRiesgo" name="codigoGrupoRiesgo" title="Nombre de Macroproceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="descripcionGrupoRiesgo" name="descripcionGrupoRiesgo" placeholder="Observaciones"></textarea>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-azure" >Registrar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>   
                </form>
            </div>

        </div>
    </div>
    <!--end Crear Grupo de Riesgo-->
    <!-- modal Editar Grupo de Riesgo
               Begin-->
    <div class="modal fade" id="editarGrupoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Grupo de Riesgo</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="editarGrupoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/grupoRiesgo/update' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Grupo de Riesgo
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreGrupoRiesgoEditar" name="nombreGrupoRiesgoEditar" title="Nombre de Macroproceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Código
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="codigoGrupoRiesgoEditar" name="codigoGrupoRiesgoEditar" title="Nombre de Macroproceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6 hidden"> 
                                <input type="hidden" id="idGrupoRiesgo" name="idGrupoRiesgo"/>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="descripcionGrupoRiesgoEditar" name="descripcionGrupoRiesgoEditar" placeholder="Observaciones"></textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-azure" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>   </form>
            </div>

        </div>
    </div>
    <!--end Editar Grupo de Riesgo-->
    <!-- modal detalles Grupo de Riesgo
               Begin-->
    <div class="modal fade" id="detallesGrupoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Grupos de Riesgo</h3>
                </div>
                <div class="modal-body padding-10">
                    <form>
                        <table id="tablaDetallesGrupoRiesgoCualitativo" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Grupo de Riesgo</th>
                                    <th>Código</th>
                                    <th>Descripción</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $grupoRiesgo = new GrupoRiesgo();
                                $gruposRiesgo = $grupoRiesgo->findAll();
                                foreach ($gruposRiesgo as $value) {
                                    ?> 
                                    <tr>

                                        <td>
                                            <?php echo $value->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->codigo; ?>                
                                        </td>

                                        <td>
                                            <?php echo $value->descripcion ?>                
                                        </td>

                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                        </table>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>    </form>
            </div>

        </div>
    </div>
    <!--end detalles Grupo de Riesgo-->
</div>

<!--MODAL DELETE GRUPO DE RIESGO -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteGrupoRiesgo" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarGrupoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=Configuracion/grupoRiesgo/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idGrupoRiesgoEliminar" name="idGrupoRiesgoEliminar"/>
                        <div class="col-sm-9">
                            <p class="text-justify ">"Desea eliminar este Grupo de Riesgo?"</p>
                        </div>
                    </div>


            </div>
            <div class="modal-footer" id="modalEliminarGrupoRiesgoBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div>
            </form>

        </div>
    </div>
</div>
<!--END-->



<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable de Empresas
        //begin
        var filterEmpresa = false;
        var paginateEmpresa = false;
        var cantidadEmpresas = <?php echo count($empresas); ?>;
        cantidadEmpresas = parseInt(cantidadEmpresas);
        if (cantidadEmpresas > 1) {
            filterEmpresa = true;
        }
        if (cantidadEmpresas > 10) {
            paginateEmpresa = true;
        }
        var tablaEmpresa = $('#tablaEmpresa').dataTable({
            "bSort": false,
            "bFilter": filterEmpresa,
            "bInfo": false,
            "bPaginate": paginateEmpresa,
            "columnDefs": [
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 3},
            ],
        });
        // eliminar Empresa
        $('#tablaEmpresa a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#idEmpresaEliminar").val(aData[3]);
        });
        //end


    });

</script>
<script type="text/javascript">
    //inicializacion editar empresa
    //begin
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaEmpresa').dataTable();
        $('#tablaEmpresa a').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');


            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreEmpresaEditar").val(aData[0]);
            $("#rucEditar").val(aData[1]);
            $("#descripcionEmpresaEditar").val(aData[2]);
            $("#idEmpresa").val(aData[3]);
        });
    });
    //end
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable de Unidad de Negocio
        //begin
        var filterUN = false;
        var paginateUN = false;
        var cantidadUN = <?php echo count($unidadesNegocio); ?>;
        cantidadUN = parseInt(cantidadUN);
        if (cantidadUN > 1) {
            filterUN = true;
        }
        if (cantidadUN > 10) {
            paginateUN = true;
        }
        var tablaUnidadNegocio = $('#tablaUnidadNegocio').dataTable({
            "bSort": false,
            "bFilter": filterUN,
            "bInfo": false,
            "bPaginate": paginateUN,
            "columnDefs": [
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 3},
                {"visible": false, "targets": 4},
            ],
        });
        // eliminar Empresa
        $('#tablaUnidadNegocio a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaUnidadNegocio.fnGetData(nRow);
            $("#idUnidadNegocioEliminar").val(aData[4]);
        });
        //end
        //end

    });

</script>
<script type="text/javascript">
    //inicializacion editar Unidad Negocio
    //begin
    $(document).ready(function() {
        var tablaUnidadNegocio = $('#tablaUnidadNegocio').dataTable();
        $('#tablaUnidadNegocio a').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');


            var aData = tablaUnidadNegocio.fnGetData(nRow);
            $("#nombreUnidadNegocioEditar").val(aData[0]);
            $("#descripcionUnidadNegocioEditar").val(aData[3]);
            $("#idEmpresaEditar option[value=" + aData[2] + "]").prop('selected', true);
            $("#idUnidadNegocio").val(aData[4]);

        });
    });
    //end
</script>

<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable Impacto Cualitativo
        //begin
        var filterIC = false;
        var paginateIC = false;
        var cantidadIC = <?php echo count($impactosCualitativos); ?>;
        cantidadIC = parseInt(cantidadIC);
        if (cantidadIC > 1) {
            filterIC = true;
        }
        if (cantidadIC > 10) {
            paginateIC = true;
        }
        var tablaImpactoCualitativo = $('#tablaImpactoCualitativo').dataTable({
            "bSort": false,
            "bFilter": filterIC,
            "bInfo": false,
            "bPaginate": paginateIC,
            "columnDefs": [
                {"visible": false, "targets": 4},
            ],
        });
        // eliminar Impacto Cualitativo
        $('#tablaImpactoCualitativo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaImpactoCualitativo.fnGetData(nRow);
            $("#idImpactoCualitativoEliminar").val(aData[4]);
        });
        //end


    });

</script>
<script type="text/javascript">
    //inicializacion editar Impacto Cualitativo
    //begin
    $(document).ready(function() {
        var tablaImpactoCualitativo = $('#tablaImpactoCualitativo').dataTable();
        $('#tablaImpactoCualitativo a').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');


            var aData = tablaImpactoCualitativo.fnGetData(nRow);
            $("#nombreImpactoCualitativoEditar").val(aData[0]);
            $("#valorImpactoCualitativoEditar").val(aData[1]);
            $("#rangoInferiorImpactoCualitativoEditar").val(aData[2]);
            $("#rangoSuperiorImpactoCualitativoEditar").val(aData[3]);

            $("#idImpactoCualitativo").val(aData[4]);

        });
    });
    //end
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable Probabilidad Cualitativa
        //begin
        var filterPC = false;
        var paginatePC = false;
        var cantidadPC = <?php echo count($probabilidadesCualitativas); ?>;
        cantidadPC = parseInt(cantidadPC);
        if (cantidadPC > 1) {
            filterPC = true;
        }
        if (cantidadPC > 10) {
            paginatePC = true;
        }
        var tablaProbabilidadCualitativa = $('#tablaProbabilidadCualitativa').dataTable({
            "bSort": false,
            "bFilter": filterPC,
            "bInfo": false,
            "bPaginate": paginatePC,
            "columnDefs": [
                {"visible": false, "targets": 4},
            ],
        });
        // eliminar Probabilidad Cualitativa
        $('#tablaProbabilidadCualitativa a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaProbabilidadCualitativa.fnGetData(nRow);
            $("#idProbabilidadCualitativaEliminar").val(aData[4]);
        });
        //end


    });

</script>
<script type="text/javascript">
    //inicializacion editar Probabilidad Cualitativa
    //begin
    $(document).ready(function() {
        var tablaProbabilidadCualitativa = $('#tablaProbabilidadCualitativa').dataTable();
        $('#tablaProbabilidadCualitativa a').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');


            var aData = tablaProbabilidadCualitativa.fnGetData(nRow);
            $("#nombreProbabilidadCualitativaEditar").val(aData[0]);
            $("#valorProbabilidadCualitativaEditar").val(aData[1]);
            $("#rangoInferiorProbabilidadCualitativaEditar").val(aData[2]);
            $("#rangoSuperiorProbabilidadCualitativaEditar").val(aData[3]);

            $("#idProbabilidadCualitativa").val(aData[4]);

        });
    });
    //end
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable Riesgo Cualitativo
        //begin
        var filterRC = false;
        var paginateRC = false;
        var cantidadRC = <?php echo count($riesgosCualitativos); ?>;
        cantidadRC = parseInt(cantidadRC);
        if (cantidadRC > 1) {
            filterRC = true;
        }
        if (cantidadRC > 10) {
            paginateRC = true;
        }
        var tablaRiesgoCualitativo = $('#tablaRiesgoCualitativo').dataTable({
            "bSort": false,
            "bFilter": filterRC,
            "bInfo": false,
            "bPaginate": paginateRC,
            "columnDefs": [
                {"visible": false, "targets": 3},
            ],
        });
        // eliminar Riesgo Cualitativo
        $('#tablaRiesgoCualitativo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaRiesgoCualitativo.fnGetData(nRow);
            $("#idRiesgoCualitativoEliminar").val(aData[3]);
        });

        //end

    });

</script>
<script type="text/javascript">
    //inicializacion editar Riesgo Cualitativo
    //begin
    $(document).ready(function() {
        var tablaRiesgoCualitativo = $('#tablaRiesgoCualitativo').dataTable();
        $('#tablaRiesgoCualitativo a').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');


            var aData = tablaRiesgoCualitativo.fnGetData(nRow);
            $("#nombreRiesgoCualitativoEditar").val(aData[0]);
            $("#rangoInferiorRiesgoCualitativoEditar").val(aData[1]);
            $("#rangoSuperiorRiesgoCualitativoEditar").val(aData[2]);

            $("#idRiesgoCualitativo").val(aData[3]);

        });
    });

    //end
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //Inicializacion del datatable Riesgo Cualitativo
        //begin
        var filterGR = false;
        var paginateGR = false;
        var cantidadGR = <?php echo count($gruposRiesgo); ?>;
        cantidadGR = parseInt(cantidadGR);
        if (cantidadGR > 1) {
            filterGR = true;
        }
        if (cantidadGR > 10) {
            paginateGR = true;
        }
        var tablaGrupoRiesgo = $('#tablaGrupoRiesgo').dataTable({
            "bSort": false,
            "bFilter": filterGR,
            "bInfo": false,
            "bPaginate": paginateGR,
            "columnDefs": [
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 3},
            ],
        });
        // eliminar Riesgo Cualitativo
        $('#tablaGrupoRiesgo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaGrupoRiesgo.fnGetData(nRow);
            $("#idGrupoRiesgoEliminar").val(aData[2]);
        });

        //end

    });

</script>
<script type="text/javascript">
    //inicializacion editar Riesgo Cualitativo
    //begin
    $(document).ready(function() {
        var tablaGrupoRiesgo = $('#tablaGrupoRiesgo').dataTable();
        $('#tablaGrupoRiesgo a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaGrupoRiesgo.fnGetData(nRow);
            $("#nombreGrupoRiesgoEditar").val(aData[0]);
            $("#codigoGrupoRiesgoEditar").val(aData[1]);
            $("#idGrupoRiesgo").val(aData[2]);
            $("#descripcionGrupoRiesgoEditar").val(aData[3]);
        });
    });
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>
<script>
    function mover(id) {
        location.href = "<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/viewCuestionario&idUN=' ?>" + id;
    }

</script>