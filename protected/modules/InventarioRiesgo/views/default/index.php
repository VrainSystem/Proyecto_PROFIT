<?php
/* @var $this DefaultController */
Yii::import('application.modules.Configuracion.models.Empresa');
Yii::import('application.modules.Configuracion.models.Usuario');
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="toolbar ">
    <div class="col-sm-6 hidden-xs">
        <div class="page-header">
            <h1>
                Gestión de Riesgos: Gestión de Parámetros <br>
                <?php
                $user = new Usuario();
                $usuario = $user->findByPk(Yii::app()->user->id);
                ?>
               <small class="visible-lg">Bienvenido a PROFIT : <a><i><?php echo $usuario->nombre; ?></i></a> </small>
            </h1>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">        
        <div class="toolbar-tools pull-right">
            <!-- start: TOP NAVIGATION MENU -->
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=site/index"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Inventario de Riesgos</li>
            </ol>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
</div>

<!--TABLA TIPO DE RIESGO-->
<!--BEGIN-->
<div class="row padding-5" style="margin-top: 20px;">
    <div class="col-lg-4 col-md-12">         
        <div class="panel panel-green">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-sliders fa-2x"></i></span><span class="text-large text-white"> TIPO DE RIESGO</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearTipoRiesgoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesTipoRiesgoModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaTipoRiesgo" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tipo Riesgo</th>
                                            <th>ID Tipo Riesgo</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $tipoRiesgo = new TipoRiesgo();
                                        $tiposRiesgo = $tipoRiesgo->findAll();
                                        foreach ($tiposRiesgo as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_tipo_riesgo ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="tipoRiesgo<?php echo $value->id_tipo_riesgo ?>" data-toggle="modal" data-target="#editarTipoRiesgoModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <?php
                                                        $riesgoElim = new Riesgo();
                                                        $countRiesgo = $riesgoElim->findAllByAttributes(array('id_tipo_riesgo' => $value->id_tipo_riesgo));
                                                        $countRiesgo = count($countRiesgo);
                                                        if ($countRiesgo == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteTipoRiesgo"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteTipoRiesgo"> <i class="fa fa-times fa fa-white"></i></a>    
                                                            </div>

                                                            <?php
                                                        }
                                                        ?>  



                                <!--<a data-toggle="tooltip"  title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips" href="<?php // echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoRiesgo/delete&id=' . $value->id_tipo_riesgo . ''         ?>"><i class="fa fa-times fa fa-white"></i></a>-->
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
        <!--TIPO DE PERDIDA-->
        <div class="panel panel-azure">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-thumb-tack fa-2x"></i></span><span class="text-large text-white"> TIPO DE PERDIDA</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearTipoPerdidaModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesTipoPerdidaModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaTipoPerdida" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tipo Pérdida</th>
                                            <th>ID Tipo Pérdida</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $tipoPerdida = new TipoPerdida();
                                        $tiposPerdida = $tipoPerdida->findAll();
                                        foreach ($tiposPerdida as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_tipo_perdida ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_tipo_perdida ?>" data-toggle="modal" data-target="#editarTipoPerdidaModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>  
                                                        <?php
                                                        $riesgo1Elim = new Riesgo();
                                                        $countRiesgo1 = $riesgo1Elim->findAllByAttributes(array('id_tipo_perdida' => $value->id_tipo_perdida));
                                                        $countRiesgo1 = count($countRiesgo1);
                                                        if ($countRiesgo1 == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteTipoPerdida"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteTipoPerdida"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
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

    </div>
    <!--END-->


    <!--MODAL  NUEVO TIPO DE RIESGO-->
    <!--BEGIN-->
    <div class="modal fade" id="crearTipoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Tipo de Riesgo</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="crearTipoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoRiesgo/create' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Tipo de Riesgo
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreTipoRiesgo" name="nombreTipoRiesgo" title="Nombre del Tipo de Riesgo" class="form-control" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--END-->


    <!--MODAL  UPDATE TIPO DE RIESGO-->
    <!--BEGIN-->
    <div class="modal fade" id="editarTipoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Tipo de Riesgo</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="editarTipoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoRiesgo/update' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Tipo de Riesgo
                                        <span class="symbol required"></span>
                                    </label>
                                    <input id="nombreTipoRiesgoEditar" name="nombreTipoRiesgoEditar" title="Nombre del Tipo de Riesgo"  class="form-control"/>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre de la Empresa
                                    </label>
                                    <input type="hidden" id="idTipoRiesgoEditar" name="idTipoRiesgoEditar"/>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> 
                </form>
            </div>

        </div>
    </div>
    <!--END-->
    <!--MODAL  DETAILS TIPO RIESGO-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesTipoRiesgoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Tipos de Riesgo</h3>
                </div>
                <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesTipoRiesgo" class="table table-bordered table-striped" style="width:100%;" >
                            <thead class="text-center">
                                <tr>

                                    <th>Tipo de Riesgo</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $tipoRiesgo = new TipoRiesgo();
                                $tiposRiesgo = $tipoRiesgo->findAll();
                                foreach ($tiposRiesgo as $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $value->nombre ?>                
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

    <!--MODAL DELETE Tipo de Riesgo -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteTipoRiesgo" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header  panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarTipoRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoRiesgo/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idTipoRiesgoEliminar" name="idTipoRiesgoEliminar"/>
                            <div class="col-sm-9 pull-left">
                                <p class="text-justify">"Desea eliminar este Tipo de Riesgo?"</p>
                            </div>
                        </div>                       


                </div>
                <div class="modal-footer" id="modalEliminarMacroprocesoBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div></form>
            </div>
        </div>
    </div>
    <!--END-->

    <!--MODAL  NUEVO TIPO DE PERDIDA-->
    <!--BEGIN-->
    <div class="modal fade" id="crearTipoPerdidaModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Tipo de Pérdida</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="crearTipoPerdida" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoPerdida/create' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Tipo de Pérdida
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreTipoPerdida" name="nombreTipoPerdida" title="Nombre de Tipo Perdida" class="form-control" />
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--END-->


    <!--MODAL  UPDATE TIPO DE PERDIDA-->
    <!--BEGIN-->
    <div class="modal fade" id="editarTipoPerdidaModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Tipo Pérdida</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="editarTipoPerdida" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoPerdida/update' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Tipo de Pérdida
                                        <span class="symbol required"></span>
                                    </label>
                                    <input id="nombreTipoPerdidaEditar" name="nombreTipoPerdidaEditar" title="Nombre del  Tipo de Perdida"  class="form-control"/>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-6 hidden">
                            <div class="form-group">
                                <input type="hidden" id="idTipoPerdidaEditar" name="idTipoPerdidaEditar"/>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>

        </div>

    </div>
    <!--TABLA TIPO CAUSA-->
    <!--BEGIN-->

    <div class="col-lg-4 col-md-12">         
        <div class="panel panel-red">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-sitemap fa-2x"></i></span><span class="text-large text-white"> TIPO DE CAUSA</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearTipoCausaModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesTipoCausaModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaTipoCausa" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tipo Causa</th>
                                            <th>ID Tipo Causa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $tipoCausa = new TipoCausa();
                                        $tiposCausa = $tipoCausa->findAll();
                                        foreach ($tiposCausa as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_tipo_causa ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_tipo_causa ?>" data-toggle="modal" data-target="#editarTipoCausaModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>  
                                                        <?php
                                                        $causaElim = new Causa();
                                                        $countCausa = $causaElim->findAllByAttributes(array('id_tipo_causa' => $value->id_tipo_causa));
                                                        $countCausa = count($countCausa);
                                                        if ($countCausa == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteTipoCausa"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteTipoCausa"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?>  
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
        <!--BEGIN CAUSA-->
        <div class="panel panel-red">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-share fa-2x"></i></span><span class="text-large text-white"> CAUSA</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearCausaModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesCausaModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaCausa" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Causa</th>
                                            <th>ID Tipo Causa</th>
                                            <th>Tipo Causa</th>
                                            <th>ID Tipo Causa</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $causa = new Causa();
                                        $causas = $causa->findAll();
                                        foreach ($causas as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_causa ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idTipoCausa->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_tipo_causa ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_causa ?>" data-toggle="modal" data-target="#editarCausaModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>                                                        
                                                        <!--<a data-toggle="tooltip"  title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips" href="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoCausa/delete&id=' . $value->id_tipo_causa . '' ?>"><i class="fa fa-times fa fa-white"></i></a>-->
                                                        <?php
                                                        $riesgoCausaElim = new CausaRiesgo();
                                                        $countRiesgoCausa = $riesgoCausaElim->findAllByAttributes(array('id_causa' => $value->id_causa));
                                                        $countRiesgoCausa = count($countRiesgoCausa);
                                                        if ($countRiesgoCausa == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteCausa"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteCausa"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
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
        <!--END CAUSA-->
    </div>
    <!--END-->
    <!--ACTIVIDAD DE CONTROL-->
    <div class="col-lg-4 col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-eye fa-2x"></i></span><span class="text-large text-white">ACTIVIDAD DE CONTROL</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearActividadControlModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesActividadControlModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaActividadControl" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Actividad Control</th>
                                            <th>ID Actividad Control</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $actividadControl = new ActividadControl();
                                        $actividadesControl = $actividadControl->findAll();
                                        foreach ($actividadesControl as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_actividad_control ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_actividad_control ?>" data-toggle="modal" data-target="#editarActividadControlModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <?php
                                                        $riesgo3Elim = new Riesgo();
                                                        $countRiesgo3 = $riesgo3Elim->findAllByAttributes(array('id_actividad_control' => $value->id_actividad_control));
                                                        $countRiesgo3 = count($countRiesgo3);
                                                        if ($countRiesgo3 == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteActividadControl"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteActividadControl"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
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
        <!--BEGIN TIPO DE ACCION-->
        <div class="panel panel-grey">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-flag fa-2x"></i></span><span class="text-large text-white"> TIPO DE ACCION</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearTipoAccionModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesTipoAccionModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaTipoAccion" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tipo Acción</th>
                                            <th>ID Tipo Accion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $tipoAccion = new TipoAccion();
                                        $tiposAccion = $tipoAccion->findAll();
                                        foreach ($tiposAccion as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_tipo_accion ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_tipo_accion ?>" data-toggle="modal" data-target="#editarTipoAccionModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>
                                                        <?php
                                                        $riesgo2Elim = new Riesgo();
                                                        $countRiesgo = $riesgo2Elim->findAllByAttributes(array('id_tipo_accion' => $value->id_tipo_accion));
                                                        $countRiesgo = count($countRiesgo);
                                                        if ($countRiesgo == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteTipoAccion"> <i class="fa fa-times fa fa-white"></i></a>
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteTipoAccion"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 

            <!--<a data-toggle="tooltip"  title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips" href="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoAccion/delete&id=' . $value->id_tipo_accion . '' ?>"><i class="fa fa-times fa fa-white"></i></a>-->
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
        <!--END TIPO DE ACCION-->
    </div>
    <!--END-->

</div>
<!--END-->
<!--MODAL  DETAILS TIPO PERDIDA-->
<!--BEGIN-->
<div class="modal fade" id="detallesTipoPerdidaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-green">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Tipos de Perdida</h3>
            </div>
            <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesTipoPerdida" class="table table-bordered table-striped" style="width:100%;" >
                        <thead class="text-center">
                            <tr>

                                <th>Tipo de Pérdida</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $tipoPerdida = new TipoPerdida();
                            $tiposPerdida = $tipoPerdida->findAll();
                            foreach ($tiposPerdida as $value) {
                                ?> 
                                <tr>
                                    <td>
                                        <?php echo $value->nombre ?>                
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
<!--MODAL DELETE Tipo de Causa -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteTipoPerdida" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarTipoPerdida" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoPerdida/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idTipoRiesgoEliminar" name="idTipoRiesgoEliminar"/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar este Tipo de Pérdida?"</p>
                        </div>
                    </div>



            </div>
            <div class="modal-footer" id="modalEliminarTipoPerdidaBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div> </form>

        </div>
    </div>
</div>
<!--END-->








<!--MODAL  NUEVO TIPO DE RIESGO-->
<!--BEGIN-->
<div class="modal fade" id="crearTipoCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Tipo de Causa</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="crearTipoCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoCausa/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Tipo de Causa
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreTipoCausa" name="nombreTipoCausa" title="Nombre del Tipo de Causa" class="form-control" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-red" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END-->


<!--MODAL  UPDATE TIPO DE RIESGO-->
<!--BEGIN-->
<div class="modal fade" id="editarTipoCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Tipo de Causa</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="editarTipoCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoCausa/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Tipo de Causa
                                    <span class="symbol required"></span>
                                </label>
                                <input id="nombreTipoCausaEditar" name="nombreTipoCausaEditar" title="Nombre del Tipo de Causa"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6 hidden">
                            <div class="form-group">
                                <input type="hidden" id="idTipoCausaEditar" name="idTipoCausaEditar"/>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-red" >Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>
</div>
<!--END-->
<!--MODAL  DETAILS TIPO RIESGO-->
<!--BEGIN-->
<div class="modal fade" id="detallesTipoCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Tipos de Causa</h3>
            </div>
            <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesTipoCausa" class="table table-bordered table-striped" style="width:100%;" >
                        <thead class="text-center">
                            <tr>

                                <th>Tipo de Causa</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $tipoCausa = new TipoCausa();
                            $tiposCausa = $tipoCausa->findAll();
                            foreach ($tiposCausa as $value) {
                                ?> 
                                <tr>
                                    <td>
                                        <?php echo $value->nombre ?>                
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
<!--MODAL DELETE Tipo de Causa -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteTipoCausa" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarTipoCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoCausa/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idTipoCausaEliminar" name="idTipoCausaEliminar"/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar este Tipo de Causa?"</p>
                        </div>
                    </div> 
            </div>
            <div class="modal-footer" id="modalEliminarTipoCausaBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div></form>
        </div>
    </div>
</div>
<!--END-->



<!--TABLA CAUSA-->
<!--BEGIN-->


<!--END-->


<!--TABLA CAUSA-->
<!--BEGIN-->


<!--END-->


<!--MODAL  NUEVO CAUSA-->
<!--BEGIN-->
<div class="modal fade" id="crearCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Causa</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="crearCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/causa/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Causa
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreCausa" name="nombreCausa" title="Nombre de Causa" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Tipo de Causa
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idTipoCausaCausa" class="js-example-basic-single " name="idTipoCausaCausa" title="Tipo de Causa" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <?php
                                    $tipoCausaSelect = new TipoCausa();
                                    $tiposCausaSelect = $tipoCausaSelect->findAll();
                                    foreach ($tiposCausaSelect as $value) {
                                        ?> 

                                        <option value="<?php echo $value->id_tipo_causa; ?>">
                                            <?php
                                            echo $value->nombre;
                                        }
                                        ?> 
                                    </option> 
                                </select>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-red" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END-->


<!--MODAL  UPDATE CAUSA-->
<!--BEGIN-->
<div class="modal fade" id="editarCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Causa</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="editarCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/causa/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Causa
                                    <span class="symbol required"></span>
                                </label>
                                <input id="nombreCausaEditar" name="nombreCausaEditar" title="Nombre de Causa"  class="form-control"/>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Tipo de Causa
                                    <span class="symbol required"></span>

                                </label>
                                <select  id="idTipoCausaCausaEditar" class="js-example-basic-single " name="idTipoCausaCausaEditar" title="Tipo de Causa" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <?php
                                    $tipoCausaSelect = new TipoCausa();
                                    $tiposCausaSelect = $tipoCausaSelect->findAll();
                                    foreach ($tiposCausaSelect as $value) {
                                        ?> 

                                        <option value="<?php echo $value->id_tipo_causa; ?>">
                                            <?php
                                            echo $value->nombre;
                                        }
                                        ?> 
                                    </option> 
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 hidden">
                        <div class="form-group">
                            <input type="hidden" id="idCausaEditar" name="idCausaEditar"/>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-red" >Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>

</div>

<!--END-->
<!--MODAL  DETAILS TIPO RIESGO-->
<!--BEGIN-->
<div class="modal fade" id="detallesCausaModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-red">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Causas</h3>
            </div>
            <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesCausa" class="table table-bordered table-striped" style="width:100%;" >
                        <thead class="text-center">
                            <tr>
                                <th>Tipo de Causa</th>
                                <th>Causa</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $causa = new Causa();
                            $causas = $causa->findAll();
                            foreach ($causas as $value) {
                                ?> 
                                <tr>
                                    
                                    <td>
                                        <?php echo $value->idTipoCausa->nombre ?>                 
                                    </td>
                                    <td>
                                        <?php echo $value->nombre ?>                
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
<!--MODAL DELETE Causa -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteCausa" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarCausa" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/causa/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idTipoRiesgoEliminar" name="idTipoRiesgoEliminar"/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar esta Causa?"</p>
                        </div>
                    </div> 
            </div>
            <div class="modal-footer" id="modalEliminarCausaBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div> </form>

        </div>
    </div>
</div>
<!--END-->





<!--TABLA TIPO ACCION-->
<!--BEGIN-->


<!--END-->


<!--MODAL  NUEVO CAUSA-->
<!--BEGIN-->
<div class="modal fade" id="crearTipoAccionModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Tipo de Accion</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="crearTipoAccion" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoAccion/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Tipo de Acción
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreTipoAccion" name="nombreTipoAccion" title="Nombre del Tipo deAccion" class="form-control" />
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END-->


<!--MODAL  UPDATE CAUSA-->
<!--BEGIN-->
<div class="modal fade" id="editarTipoAccionModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Tipo de Accion</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="editarTipoAccion" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoAccion/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Tipo de Acción
                                    <span class="symbol required"></span>
                                </label>
                                <input id="nombreTipoAccionEditar" name="nombreTipoAccionEditar" title="Nombre del Tipo de Accion"  class="form-control"/>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 hidden">
                        <div class="form-group">
                            <input type="hidden" id="idTipoAccionEditar" name="idTipoAccionEditar"/>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue" >Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>

</div>
<!--END-->
<!--MODAL  DETAILS TIPO RIESGO-->
<!--BEGIN-->
<div class="modal fade" id="detallesTipoAccionModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Tipos de Accion</h3>
            </div>
            <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesTipoAccion" class="table table-bordered table-striped" style="width:100%;" >
                        <thead class="text-center">
                            <tr>

                                <th>Tipo de Acción</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $tipoAccion = new TipoAccion();
                            $tiposAccion = $tipoAccion->findAll();
                            foreach ($tiposAccion as $value) {
                                ?> 
                                <tr>
                                    <td>
                                        <?php echo $value->nombre ?>                
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
<!--MODAL DELETE Causa -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteTipoAccion" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarTipoAccion" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/tipoAccion/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idTipoRiesgoEliminar" name="idTipoRiesgoEliminar"/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar este Tipo de Acción?"</p>
                        </div>
                    </div> 
            </div>
            <div class="modal-footer" id="modalEliminarTipoAccionBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div> </form>

        </div>
    </div>
</div>
<!--END-->




<!--TABLA ACTIVIDAD DE CONTROL-->
<!--BEGIN-->


<!--END-->


<!--MODAL  NUEVO ACTIVIDAD CONTROL-->
<!--BEGIN-->
<div class="modal fade" id="crearActividadControlModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Actividad de Control</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="crearActividadControl" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/actividadControl/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Actividad de Control
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreActividadCotrol" name="nombreActividadControl" title="Nombre de la Actividad de Control" class="form-control" />
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END-->


<!--MODAL  UPDATE CAUSA-->
<!--BEGIN-->
<div class="modal fade" id="editarActividadControlModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Actividad de Control</h3>
            </div>
            <div class="modal-body padding-10">
                <form id="editarActividadControl" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/actividadControl/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Actividad de Control
                                    <span class="symbol required"></span>
                                </label>
                                <input id="nombreActividadControlEditar" name="nombreActividadControlEditar" title="Nombre de la Actividad de Control"  class="form-control"/>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 hidden">
                        <div class="form-group">
                            <input type="hidden" id="idActividadControlEditar" name="idActividadControlEditar"/>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue" >Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>

</div>

<!--END-->
<!--MODAL  DETAILS detallesActividadControlModalO-->
<!--BEGIN-->
<div class="modal fade" id="detallesActividadControlModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Actividades de Control</h3>
            </div>
            <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesActividadControl" class="table table-bordered table-striped" style="width:100%;" >
                        <thead class="text-center">
                            <tr>

                                <th>Actividad de Control</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $actividadControl = new ActividadControl();
                            $actividadesControl = $actividadControl->findAll();
                            foreach ($actividadesControl as $value) {
                                ?> 
                                <tr>
                                    <td>
                                        <?php echo $value->nombre ?>                
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
<!--MODAL DELETE Causa -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteActividadControl" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarActividadControl" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/actividadControl/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idTipoRiesgoEliminar" name="idTipoRiesgoEliminar"/>
                        <div class="col-sm-9 pull-left">
                            <p class="text-justify">"Desea eliminar esta Actividad de Control?"</p>
                        </div>
                    </div>  

            </div>
            <div class="modal-footer" id="modalEliminarActividadControlBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div> </form>

        </div>
    </div>
</div>
<!--END-->


<!--***************************
DATA TABLE 
***************************-->






<script type="text/javascript">
    //DATA TABLE TIPO RIESGO
    $(document).ready(function() {
        //Inicializacion del datatable de TIPO DE RIESGO
        //begin
        var filterTipoRiesgo = false;
        var paginateTipoRiesgo = false;
        var cantidadTiposRiesgo = <?php echo count($tiposRiesgo); ?>;
        cantidadTiposRiesgo = parseInt(cantidadTiposRiesgo);

        if (cantidadTiposRiesgo > 1) {
            filterTipoRiesgo = true;
        }
        if (cantidadTiposRiesgo > 10) {
            paginateTipoRiesgo = true;
        }
        var tablaTipoRiesgo = $('#tablaTipoRiesgo').dataTable({
            "bSort": false,
            "bFilter": filterTipoRiesgo,
            "bInfo": false,
            "bPaginate": paginateTipoRiesgo,
            "columnDefs": [
                {"visible": false, "targets": 1},
            ],
        });
        // eliminar Tipo Riesgo
        $('#tablaTipoRiesgo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoRiesgo.fnGetData(nRow);
            $("#idTipoRiesgoEliminar").val(aData[1]);
        });
        //end
    });


    //DATA TABLE DIMENSIONES
    $(document).ready(function() {
        //Inicializacion del datatable de TIPO CAUSA
        //begin
        var filterTipoCausa = false;
        var paginateTipoCausa = false;
        var cantidadTiposCausa = <?php echo count($tiposCausa); ?>;
        cantidadTiposCausa = parseInt(cantidadTiposCausa);

        if (cantidadTiposCausa > 1) {
            filterTipoCausa = true;
        }
        if (cantidadTiposCausa > 10) {
            paginateTipoCausa = true;
        }
        var tablaTipoCausa = $('#tablaTipoCausa').dataTable({
            "bSort": false,
            "bFilter": filterTipoCausa,
            "bInfo": false,
            "bPaginate": paginateTipoCausa,
            "columnDefs": [
                {"visible": false, "targets": 1},
            ],
        });
        // eliminar Tipo Causa
        $('#tablaTipoCausa a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoCausa.fnGetData(nRow);
            $("#idTipoCausaEliminar").val(aData[1]);
        });

        //end
    });
    $(document).ready(function() {
        //Inicializacion del datatable de CAUSA
        //begin
        var filterCausa = false;
        var paginateCausa = false;
        var cantidadCausa = <?php echo count($causas); ?>;
        cantidadCausa = parseInt(cantidadCausa);

        if (cantidadCausa > 1) {
            filterCausa = true;
        }
        if (cantidadCausa > 10) {
            paginateCausa = true;
        }
        var tablaCausa = $('#tablaCausa').dataTable({
            "bSort": false,
            "bFilter": filterCausa,
            "bInfo": false,
            "bPaginate": paginateCausa,
            "columnDefs": [
                {"visible": false, "targets": 1},
                {"visible": false, "targets": 3},
            ],
        });
        // eliminar Tipo Perdida
        $('#tablaCausa a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaCausa.fnGetData(nRow);
            $("#idCausaEliminar").val(aData[1]);
        });

        //end
    });

    $(document).ready(function() {
        //Inicializacion del datatable de TIPO DE PERDIDA
        //begin
        var filterTipoPerdida = false;
        var paginateTipoPerdida = false;
        var cantidadTipoPerdida = <?php echo count($tiposPerdida); ?>;
        cantidadTipoPerdida = parseInt(cantidadTipoPerdida);

        if (cantidadTipoPerdida > 1) {
            filterTipoPerdida = true;
        }
        if (cantidadTipoPerdida > 10) {
            paginateTipoPerdida = true;
        }
        var tablaTipoPerdida = $('#tablaTipoPerdida').dataTable({
            "bSort": false,
            "bFilter": filterTipoPerdida,
            "bInfo": false,
            "bPaginate": paginateTipoPerdida,
            "columnDefs": [
                {"visible": false, "targets": 1},
            ],
        });
        // eliminar Tipo Perdida
        $('#tablaTipoPerdida a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoPerdida.fnGetData(nRow);
            $("#idTipoPerdidaEliminar").val(aData[1]);
        });
        //end
    });
    $(document).ready(function() {
        //Inicializacion del datatable de TIPO DE ACCION
        //begin
        var filterTipoAccion = false;
        var paginateTipoAccion = false;
        var cantidadTipoAccion = <?php echo count($tiposAccion); ?>;
        cantidadTipoAccion = parseInt(cantidadTipoAccion);

        if (cantidadTipoAccion > 1) {
            filterTipoAccion = true;
        }
        if (cantidadTipoAccion > 10) {
            paginateTipoAccion = true;
        }
        var tablaTipoAccion = $('#tablaTipoAccion').dataTable({
            "bSort": false,
            "bFilter": filterTipoAccion,
            "bInfo": false,
            "bPaginate": paginateTipoAccion,
            "columnDefs": [
                {"visible": false, "targets": 1},
            ],
        });
        // eliminar Tipo Causa
        $('#tablaTipoAccion a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoAccion.fnGetData(nRow);
            $("#idTipoAccionEliminar").val(aData[1]);
        });

        //end

    });
    $(document).ready(function() {
        //Inicializacion del datatable de Actividad de Control
        //begin
        var filterActividadControl = false;
        var paginateActividadControl = false;
        var cantidadActividadControl = <?php echo count($actividadesControl); ?>;
        cantidadActividadControl = parseInt(cantidadActividadControl);

        if (cantidadActividadControl > 1) {
            filterActividadControl = true;
        }
        if (cantidadActividadControl > 10) {
            paginateActividadControl = true;
        }
        var tablaActividadControl = $('#tablaActividadControl').dataTable({
            "bSort": false,
            "bFilter": filterActividadControl,
            "bInfo": false,
            "bPaginate": paginateActividadControl,
            "columnDefs": [
                {"visible": false, "targets": 1},
            ],
        });
        // eliminar Tipo Causa
        $('#tablaActividadControl a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaActividadControl.fnGetData(nRow);
            $("#idActividadControlEliminar").val(aData[1]);
        });


        //end
    });
</script>

<!--***************************
ESTOS SON LOS EDITAR
***************************-->

<script type="text/javascript">
    //DATA TABLE TIPO DE RIESGO EDITAR
    $(document).ready(function() {
        var tablaTipoRiesgo = $('#tablaTipoRiesgo').dataTable();
        $('#tablaTipoRiesgo a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoRiesgo.fnGetData(nRow);
            $("#nombreTipoRiesgoEditar").val(aData[0]);
            $("#idTipoRiesgoEditar").val(aData[1]);
        });

    });

    //DATA TABLE TIPO CAUSA EDITAR
    $(document).ready(function() {
        var tablaTipoCausa = $('#tablaTipoCausa').dataTable();
        $('#tablaTipoCausa a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoCausa.fnGetData(nRow);
            $("#nombreTipoCausaEditar").val(aData[0]);
            $("#idTipoCausaEditar").val(aData[1]);
        });
    });
    //DATA TABLE CAUSA EDITAR
    $(document).ready(function() {
        var tablaCausa = $('#tablaCausa').dataTable();
        $('#tablaCausa a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaCausa.fnGetData(nRow);
            $("#nombreCausaEditar").val(aData[0]);
            $("#idCausaEditar").val(aData[1]);
            $("#idTipoCausaCausaEditar").select2("val", aData[3]);

        });
    });
    //DATA TABLE TIPO PERDIDA EDITAR
    $(document).ready(function() {
        var tablaTipoPerdida = $('#tablaTipoPerdida').dataTable();
        $('#tablaTipoPerdida a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoPerdida.fnGetData(nRow);
            $("#nombreTipoPerdidaEditar").val(aData[0]);
            $("#idTipoPerdidaEditar").val(aData[1]);
        });
    });

    //DATA TABLE TIPO ACCION EDITAR
    $(document).ready(function() {
        var tablaTipoAccion = $('#tablaTipoAccion').dataTable();
        $('#tablaTipoAccion a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaTipoAccion.fnGetData(nRow);
            $("#nombreTipoAccionEditar").val(aData[0]);
            $("#idTipoAccionEditar").val(aData[1]);
        });
    });

    //DATA TABLE ACTIVIDAD DE CONTROL EDITAR
    $(document).ready(function() {
        var tablaActividadControl = $('#tablaActividadControl').dataTable();
        $('#tablaActividadControl a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaActividadControl.fnGetData(nRow);
            $("#nombreActividadControlEditar").val(aData[0]);
            $("#idActividadControlEditar").val(aData[1]);
        });
    });



</script>

<!--***************************
ELIMINAR
***************************-->

