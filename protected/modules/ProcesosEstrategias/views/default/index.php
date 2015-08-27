<?php
/* @var $this DefaultController */
Yii::import('application.modules.Configuracion.models.*');
Yii::import('application.modules.Configuracion.models.Usuario');

$this->breadcrumbs = array(
    $this->module->id,
);
?>


<div class="toolbar ">
    <div class="col-sm-6 hidden-xs">
        <div class="page-header">
            <h1>
                Procesos y Estrategias: Gestión de Parámetros <br>
                <?php
                $user = new Usuario();
                $usuario = $user->findByPk(Yii::app()->user->id);
                ?>
                <small class="hidden-sm">Bienvenido a NODE : <a><i><?php echo $usuario->nombre; ?></i></a> </small>
            </h1>
        </div>
    </div>
    <div class="col-sm-6 col-xs-12">        
        <div class="toolbar-tools pull-right">
            <!-- start: TOP NAVIGATION MENU -->
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active">Procesos y Estrategias</li>
            </ol>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
</div>

<!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{

********************************************************************************
**********************MACROPROCESO**********************************
********************************************************************************

}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->
<!--TABLA MACROPROCESO-->
<!--BEGIN-->
<div class="row padding-5" style="margin-top: 20px;">
    <div class="col-lg-6 col-md-12">         
        <div class="panel panel-green">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-cog fa-2x"></i></span><span class="text-large text-white"> MACROPROCESOS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearMacroprocesoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesMacroprocesoModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
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
                                <table id="tablaMacroproceso" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID Macroproceso</th>
                                            <th>Macroproceso</th>
                                            <th>Descripción</th>                                    
                                            <th>Acciones</th>                                    
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $microproceso = new Macroproceso();
                                        $microprocesos = $microproceso->findAll();
                                        foreach ($microprocesos as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_macroproceso; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a id="empresa<?php echo $value->id_macroproceso ?>" data-toggle="modal" data-target="#editarMacroprocesoModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <?php
                                                        $procesoElim = new Proceso();
                                                        $countProceso = $procesoElim->findAllByAttributes(array('id_macroproceso' => $value->id_macroproceso));
                                                        $countProceso = count($countProceso);
                                                        if ($countProceso == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteMacroproceso"> <i class="fa fa-times fa fa-white"></i></a>                
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>  
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>  
                                                        <a data-toggle="popover" title="Descripción del Macroproceso" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>

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


    <!--MODAL  NUEVO MACROPROCESO-->
    <!--BEGIN-->
    <div class="modal fade" id="crearMacroprocesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Macroproceso</h3>
                </div>
                <div class="modal-body padding-10">
                    <!--<form id="crearMacroproceso" action="<?php // echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/macroproceso/create'                                               ?>" method="post">-->
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Macroproceso
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreMacroproceso" name="nombreMacroproceso" title="Nombre de Macroproceso" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <table id="tablaUnidadesNegocioResponsable" class="table table-bordered table-striped">
                                    <thead class="label-grey text-white center">
                                        <tr>
                                            <!--<th style="width:1% !important;"></th>-->
                                            <th> <input type="checkbox" id="check_all" onchange="checkAll()" value="0" /></th>
                                            <th>Unidad de Negocio</th>
                                            <th>Nombre del Responsable</th>
                                            <th>Id Unidad Negocio</th>


                                        </tr>
                                    </thead>
                                    <tbody class="center">
                                        <?php
                                        $unidadesNegocioResponsable = UnidadNegocio::model()->findAll();
                                        $countUnidadesNegocioResponsable = count($unidadesNegocioResponsable);
                                        foreach ($unidadesNegocioResponsable as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <!--<input type="checkbox" class="minimal"/>-->
                                                    <input type="checkbox" class="activar-tex" value="0"/>
                                                    <!--<input type="checkbox" value="true" checked="checked"/>  checked box -->
                                                </td>
                                                <td><?php echo $value->nombre; ?></td>
                                                <td></td>
                                                <td><?php echo $value->id_unidad_negocio; ?></td>

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
                        <div class="col-sm-12">
                            <div class="form-group">                                 
                                <textarea id="descripcionMacroproceso" title="Descripcion  de Macroproceso" name="descripcionMacroproceso" class="form-control" placeholder="Observaciones..."></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-green" id="crearMacroproceso">Registrar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
                <!--</form>-->
            </div>
        </div>
    </div>
    <!--END-->


    <!--MODAL  UPDATE MACROPROCESO-->
    <!--BEGIN-->
    <div class="modal fade" id="editarMacroprocesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Macroproceso</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="editarMacroproceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/macroproceso/update' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Macroproceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <input id="nombreMacroprocesoEditar" name="nombreMacroprocesoEditar" title="Nombre de macroproceso"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-sm-6 hidden">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Macroproceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="hidden" id="idMacroprocesoEditar" name="idMacroprocesoEditar"/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <table id="tablaUnidadesNegocioResponsableEditar" class="table table-bordered table-striped">
                                        <thead class="label-grey text-white center">
                                            <tr>
                                                <!--<th style="width:1% !important;"></th>-->
                                                <th> <input type="checkbox" id="check_all" onchange="checkAll()" value="0" /></th>
                                                <th>Unidad de Negocio</th>
                                                <th>Nombre del Responsable</th>
                                                <th>Id Unidad Negocio</th>


                                            </tr>
                                        </thead>
                                        <tbody class="center">
                                            <?php
                                            $unidadesNegocioResponsableEditar = UnidadNegocio::model()->findAll();
                                            $countUnidadesNegocioResponsableEditar = count($unidadesNegocioResponsableEditar);
                                            foreach ($unidadesNegocioResponsableEditar as $value) {
                                                ?> 
                                                <tr>
                                                    <td>
                                                        <!--<input type="checkbox" class="minimal"/>-->
                                                        <input type="checkbox" class="activar-tex" value="0"/>
                                                        <!--<input type="checkbox" value="true" checked="checked"/>  checked box -->
                                                    </td>
                                                    <td><?php echo $value->nombre; ?></td>
                                                    <td></td>
                                                    <td><?php echo $value->id_unidad_negocio; ?></td>

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
                            <div class="col-sm-12">
                                <div class="form-group">                                    
                                    <textarea id="descripcionMacroprocesoEditar"  name="descripcionMacroprocesoEditar" class="form-control tooltips" data-toggle="tooltip" data-placement="top" title="Descripción  del  Macroproceso" ></textarea>
                                </div>
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
    <!--END-->
    <!--MODAL  DETAILS MACROPROCESO-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesMacroprocesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Macroprocesos</h3>
                </div>
                <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesMacroproceso" class="table table-bordered table-striped" style="width:100%;" >
                            <thead class="text-center">
                                <tr>

                                    <th>Unidad de Negocio</th>                                                                      
                                    <th>Macroproceso-Responsable</th>

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
                                            <?php echo $value->nombre ?>                
                                        </td>

                                        <td class="text-left">
                                            <?php
                                            $unidadesNegocioMacroproceso = UnidadNegocioMacroproceso::model()->findAllByAttributes(array('id_unidad_negocio' => $value->id_unidad_negocio));
                                            ?>
                                            <ul>

                                                <?php
                                                foreach ($unidadesNegocioMacroproceso as $value1) {
                                                    $macroproceso = Macroproceso::model()->findByPk($value1->id_macroproceso);
                                                    ?>  
                                                    <li><?php echo $macroproceso->nombre . ": " . $value1->nombre_responsable; ?> </li>
                                                    <?php
                                                }
                                                ?>   

                                            </ul>

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

    <!--MODAL DELETE MACROPROCESO -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteMacroproceso" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarMacroproceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/macroproceso/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idDeleteMacroproceso" name="idDeleteMacroproceso"/>
                            <div class="col-sm-9">
                                <p class="text-justify">"Desea eliminar este Macroproceso?"</p>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" id="modalEliminarMacroprocesoBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--END-->

    <!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{
    
    ********************************************************************************
    **********************DIMENSIONES**********************************
    ********************************************************************************
    
    }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->

    <!-- TABLA  DIMENSIONES-->
    <!-- BEGIN-->
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-blue">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-cubes fa-2x"></i></span><span class="text-large text-white"> DIMENSIONES ESTRATEGICAS</span>                
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearDimensionModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesDimensionesModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
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
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto">
                                <table id="tablaDimension" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID Dimension</th>
                                            <th>Dimensión</th>
                                            <th>Empresa</th>                                    
                                            <th>ID Empresa</th>                                    
                                            <th class="center">Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $dimencion = new Dimension();
                                        $dimenciones = $dimencion->findAll();

                                        foreach ($dimenciones as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_dimension; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idEmpresa->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_empresa ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarDimensionModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>  
                                                        <?php
                                                        $procesoElim = new ObjetivoEstrategico();
                                                        $countProceso = $procesoElim->findAllByAttributes(array('id_dimension' => $value->id_dimension));
                                                        $countProceso = count($countProceso);
                                                        if ($countProceso == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a> 
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>   
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
                                                                                                                                                                                                                                                                        <!--<a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>-->


                                                </td>
                                            </tr>
                                            </div> 
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
</div>
<!--END-->

<!--MODAL  NUEVO DIMENSION-->
<!--BEGIN-->
<div class="modal fade" id="crearDimensionModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Dimensión</h3>
            </div>
            <div class="modal-body" >
                <form id="crearDimension" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/dimension/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Dimensión
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreDimension" name="nombreDimension" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Empresa
                                    <span class="symbol required"></span>
                                </label>

                                <select id="idEmpresaDimension" name="idEmpresaDimension" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
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
                                </select>
                            </div>
                        </div>

                    </div>



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>
</div>
<!--END-->


<!--MODAL  UPDATE DIMENSION-->
<!--BEGIN-->
<div class="modal fade" id="editarDimensionModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content ">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Dimensión</h3>
            </div>
            <div class="modal-body">
                <form id="editarDimension" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/dimension/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Dimensión
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreDimensionEdit" name="nombreDimensionEdit" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-6 hidden"> 
                            <input type="hidden" id="idDimensionEditar" name="idDimensionEditar"/>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Empresa
                                    <span class="symbol required"></span>
                                </label>
                                <select id="idEmpresaDimensionEditar" name="idEmpresaDimensionEditar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
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

                    </div>              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue">Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>  </form>
        </div>

    </div>
</div>
<!--END-->
<!--MODAL  DETAILS DIMENSIONES-->
<!--BEGIN-->
<div class="modal fade" id="detallesDimensionesModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-blue">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Dimensiones</h3>
            </div>
            <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesDimensiones" class="table table-bordered table-striped" style="width:100%;">
                        <thead class="text-center">
                            <tr>

                                <th>Dimensión</th>
                                <th>Empresa</th>                                    


                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $dimencion = new Dimension();
                            $dimenciones = $dimencion->findAll();
                            foreach ($dimenciones as $value) {
                                ?> 
                                <tr>

                                    <td>
                                        <?php echo $value->nombre ?>                
                                    </td>
                                    <td>
                                        <?php echo $value->id_empresa ?>                
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

<!--MODAL DELETE DIMENSIONES -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteDimension" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarDimension" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/dimension/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idDeleteDimension" name="idDeleteDimension"/>
                        <div class="col-sm-9">
                            <p class="text-justify">"Desea eliminar esta Dimension?"</p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer" id="modalEliminarDimensionesBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--END-->

<!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{

********************************************************************************
**********************PROCESO**********************************
********************************************************************************

}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->


<!--TABLA PROCESO-->
<!--BEGIN-->
<div class="row padding-5" style="margin-top: 20px;">

    <div class="col-lg-6 col-md-12">
        <div class="panel panel-red">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-cogs fa-2x"></i></span><span class="text-large text-white"> PROCESOS</span>

                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearProcesoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesProcesosModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
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
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;">
                                <table id="tablaProceso" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID de Proceso</th>
                                            <th>Proceso</th>
                                            <th>Descripción</th>                                    
                                            <th>ID Macroproceso</th>                                    
                                            <th>Macroproceso</th>                                    

                                            <th class="center">Acciones</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $proceso = new Proceso();
                                        $procesos = $proceso->findAll();
                                        foreach ($procesos as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_proceso; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_macroproceso ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idMacroproceso->nombre ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarProcesoModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteProceso"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>

                                                        <a data-toggle="popover" title="Descripción del  Proceso" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>
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

    <!--MODAL  NUEVO PROCESO-->
    <!--BEGIN-->
    <div class="modal fade" id="crearProcesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Proceso</h3>
                </div>
                <div class="modal-body">
                    <!--<form id="crearProceso" action="<?php // echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/proceso/create' ?>" method="post">-->
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Proceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreProceso" name="nombreProceso" title="Nombre de Proceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Macroproceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idMacroProceso" name="idMacroProceso" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option>Seleccione</option>
                                        <?php
                                        $macroprocesoenProceso = new Macroproceso();
                                        $macroprocesoenProcesos = $macroprocesoenProceso->findAll();
                                        foreach ($macroprocesoenProcesos as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_macroproceso; ?>">
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
                                    <table id="tablaUnidadesNegocioProcesoResponsable" class="table table-bordered table-striped">
                                        <thead class="label-grey text-white center">
                                            <tr>
                                                <!--<th style="width:1% !important;"></th>-->
                                                <th> <input type="checkbox" id="check_allProceso" onchange="checkAllProceso()" value="0" /></th>
                                                <th>Unidad de Negocio</th>
                                                <th>Nombre del Responsable</th>
                                                <th>Id Unidad Negocio</th>


                                            </tr>
                                        </thead>
                                        <tbody class="center">
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">                                   
                                    <textarea id="descripcionProceso" title="Descripcion  del  Proceso" name="descripcionProceso" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button id="crearProceso" type="submit" class="btn btn-red" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>

            </div>

        </div>
    </div>
    <!--END-->

    <!--MODAL  UPDATE PROCESO-->
    <!--BEGIN-->
    <div class="modal fade" id="editarProcesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Proceso</h3>
                </div>
                <div class="modal-body">
                    <form id="modificarProceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/proceso/update' ?>" method="post">
                        <div class="form-group">                           
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Proceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreProcesoEdit" name="nombreProcesoEdit" title="Nombre de Proceso" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-4 hidden">
                                <input type="hidden" id="idProcesoEditar" name="idProcesoEditar"/>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Macroproceso
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idMacroProcesoEdit" name="idMacroProcesoEdit" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">

                                        <?php
                                        $macroprocesoenProceso = new Macroproceso();
                                        $macroprocesoenProcesos = $macroprocesoenProceso->findAll();
                                        foreach ($macroprocesoenProcesos as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_macroproceso; ?>">
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
                                    <textarea id="descripcionProcesoEdit" title="Descripción  del  Proceso" name="descripcionProcesoEdit" class="form-control" data-toggle="tooltip"></textarea>
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

    <!--MODAL  DETAILS PROCESOS-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesProcesosModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Procesos</h3>
                </div>
                <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesProcesos" class="table table-bordered table-striped" style="width:100%;" >
                            <thead class="text-center">
                                <tr>

                                    <th>Unidad de Negocio</th>                                                                      
                                    <th>Proceso-Responsable</th>

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
                                            <?php echo $value->nombre ?>                
                                        </td>

                                        <td class="text-left">
                                            <?php
                                            $unidadesNegocioProceso = UnidadNegocioProceso::model()->findAllByAttributes(array('id_unidad_negocio' => $value->id_unidad_negocio));
                                            ?>
                                            <ul>

                                                <?php
                                                foreach ($unidadesNegocioProceso as $value1) {
                                                    $proceso = Proceso::model()->findByPk($value1->id_proceso);
                                                    ?>  
                                                    <li><?php echo $proceso->nombre . ": " . $value1->nombre_responsable; ?> </li>
                                                    <?php
                                                }
                                                ?>   

                                            </ul>

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

    <!--MODAL DELETE PROCESO -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteProceso" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarProceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/proceso/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>                        
                            <input type="hidden" id="idDeleteProceso" name="idDeleteProceso"/>
                            <div class="col-sm-9">
                                <p class="text-justify">"Desea eliminar este Proceso?"</p>
                            </div>
                        </div>


                </div>
                <div class="modal-footer" id="modalEliminarObjetivosBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--END-->

    <!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{
    
    ********************************************************************************
    **********************OBJETIVO**********************************
    ********************************************************************************
    
    }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->


    <!--TABLA OBJETIVO-->
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-azure">
            <div class="panel-heading border-light">

                <span class="text-extra-small text-dark"><i class="fa fa-lightbulb-o fa-2x"></i></span><span class="text-large text-white"> OBJETIVOS ESTRATEGICOS</span>

                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearObjetivoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesObjetivoModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
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
                            <div class="panel-scroll height-180"  style="overflow-x: hidden; overflow-y: auto;">
                                <table id="tablaObjetivo" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID Objetivo</th>                                               
                                            <th>Objetivo</th>
                                            <th>Código</th>
                                            <th>Dimensión</th>
                                            <th>ID Dimension</th>

                                            <th class="center">Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $objetivoEstrategico = new ObjetivoEstrategico();
                                        $objetivosEstrategicos = $objetivoEstrategico->findAll();
                                        foreach ($objetivosEstrategicos as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_objetivo_estrategico; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->codigo ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idDimension->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_dimension ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarObjetivoModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteObjetivo"> <i class="fa fa-times fa fa-white"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--MODAL  NUEVO OBJETIVO-->
<!--BEGIN-->
<div class="modal fade" id="crearObjetivoModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-azure">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Objetivo</h3>
            </div>
            <div class="modal-body">
                <form id="crearObjetivos" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/objetivoEstrategico/create' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Objetivo
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreObjetivo" name="nombreObjetivo" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Código del Objetivo
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="codigoDimencion" name="codigoDimencion" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Dimensión
                                    <span class="symbol required"></span>
                                </label>
                                <select id="idDimensionObjetivo" name="idDimensionObjetivo" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                    <?php
                                    $dimension = new Dimension();
                                    $dimensiones = $dimension->findAll();
                                    foreach ($dimensiones as $value) {
                                        ?> 
                                        <option value="<?php echo $value->id_dimension; ?>">
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
                <button type="submit" class="btn btn-azure" >Registrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div> </form>
        </div>

    </div>
</div>
<!--END-->


<!--MODAL  UPDATE OBJETIVO-->
<!--BEGIN-->
<div class="modal fade" id="editarObjetivoModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-azure">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Objetivo</h3>
            </div>
            <div class="modal-body">
                <form id="editarObjetivo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/objetivoEstrategico/update' ?>" method="post">
                    <div class="form-group">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre del Objetivo
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="nombreObjetivoEditar" name="nombreObjetivoEditar" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Código del Objetivo
                                    <span class="symbol required"></span>
                                </label>
                                <input type="text" id="codigoObjetivoEditar" name="codigoObjetivoEditar" title="Nombre de macroproceso"  class="form-control"/>
                            </div>
                        </div>
                        <div class="col-sm-4 hidden">
                            <input type="hidden" id="idObjetivoEditar" name="idObjetivoEditar"/>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="form-field-22">
                                    Nombre de la Dimensión
                                    <span class="symbol required"></span>
                                </label>
                                <select id="idDimensionObjetivoEditar" name="idDimensionObjetivoEditar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                    <?php
                                    $dimension = new Dimension();
                                    $dimensiones = $dimension->findAll();
                                    foreach ($dimensiones as $value) {
                                        ?> 
                                        <option value="<?php echo $value->id_dimension; ?>">
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
                <button type="submit" class="btn btn-azure" >Actualizar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>  </form>
        </div>

    </div>
</div>
<!--END-->
<!--MODAL  DETAILS OBJETIVOS-->
<!--BEGIN-->
<div class="modal fade" id="detallesObjetivoModal" role="dialog">
    <!--<div class="modal-dialog" style="width: 90%">-->
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header partition-azure">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Objetivos Estrategicos</h3>
            </div>
            <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                <form >
                    <table id="tablaDetallesObjetivos" class="table table-bordered table-striped" style="width:100%;">
                        <thead class="text-center">
                            <tr>

                                <th>Objetivo</th>
                                <th>Código</th>
                                <th>Dimensión</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $objetivoEstrategico = new ObjetivoEstrategico();
                            $objetivosEstrategicos = $objetivoEstrategico->findAll();
                            foreach ($objetivosEstrategicos as $value) {
                                ?> 
                                <tr>
                                    <td>
                                        <?php echo $value->nombre ?>                
                                    </td>
                                    <td>
                                        <?php echo $value->codigo ?>                
                                    </td>
                                    <td>
                                        <?php echo $value->id_dimension ?>                
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

<!--MODAL DELETE OBJETIVO -->
<!--BEGIN-->
<div class="modal fade" id="ModalDeleteObjetivo" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content ">
            <div class="modal-header panel-myyellow">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
            </div>
            <div class="modal-body padding-10">
                <form id="FormEliminarObjetivo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/objetivoEstrategico/delete' ?>" method="post">
                    <div class="form-group">
                        <label style="width:auto;"class="col-sm-2 no-padding ">
                            <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                        </label>
                        <input type="hidden" id="idDeleteObjetivo" name="idDeleteObjetivo"/>
                        <div class="col-sm-9">
                            <p class="text-justify ">"Desea eliminar este Objetivo  Estratégico?"</p>
                        </div>
                    </div>


            </div>
            <div class="modal-footer" id="modalEliminarObjetivosBotones">
                <button type="submit" class="btn btn-yellow" >Aceptar</button>
                <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--END-->


<!--***************************
DATA TABLE 
***************************-->
<script type="text/javascript">
    //DATA TABLE MACROPROCESO
    $(document).ready(function() {
        //Inicializacion del datatable de MACROPROCESO
        //begin
        var filterMacroprocesos = false;
        var paginateMacroprocesos = false;
        var cantidadMacroprocesos = <?php echo count($microprocesos); ?>;
        cantidadMacroprocesos = parseInt(cantidadMacroprocesos);
        if (cantidadMacroprocesos > 1) {
            filterMacroprocesos = true;
        }
        if (cantidadMacroprocesos > 10) {
            paginateMacroprocesos = true;
        }
        var tablaMacroprocesos = $('#tablaMacroproceso').dataTable({"bSort": false,
            "bFilter": filterMacroprocesos,
            "bInfo": false,
            "bPaginate": paginateMacroprocesos,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": false, "targets": 2},
            ],
        });
        tablaMacroprocesos.$('a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaMacroprocesos.fnGetData(nRow);
            $("#idDeleteMacroproceso").val(aData[0]);
        }); //end
    });
    //DATA TABLE DIMENSIONES     $(document).ready(function() {
    //Inicializacion del datatable de DIMENSIONES
    //begin
    $(document).ready(function() {
        var filterDimensiones = false;
        var paginateDimensiones = false;
        var cantidadDimensiones = <?php echo count($dimenciones); ?>;
        cantidadDimensiones = parseInt(cantidadDimensiones);
        if (cantidadDimensiones > 1) {
            filterDimensiones = true;
        }
        if (cantidadDimensiones > 10) {
            paginateDimensiones = true;
        }
        var tablaDimension = $('#tablaDimension').dataTable({
            "bSort": false,
            "bFilter": filterDimensiones,
            "bInfo": false,
            "bPaginate": paginateDimensiones,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": true, "targets": 2},
                {"visible": false, "targets": 3},
            ],
        });
        //end
    });
    $(document).ready(function() {
        //Inicializacion del datatable de PROCESO
        //begin
        var filterProceso = false;
        var paginateProceso = false;
        var cantidadProceso = <?php echo count($procesos); ?>;
        cantidadProceso = parseInt(cantidadProceso);
        if (cantidadProceso > 1) {
            filterProceso = true;
        }
        if (cantidadProceso > 10) {
            paginateProceso = true;
        }
        var tablaProceso = $('#tablaProceso').dataTable({
            "bSort": false,
            "bFilter": filterProceso, "bInfo": false,
            "bPaginate": paginateProceso,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 3},
            ],
        });
        tablaProceso.$('a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaProceso.fnGetData(nRow);
            $("#idDeleteProceso").val(aData[0]);
        });
        //end
    });
    $(document).ready(function() {
        //Inicializacion del datatable de OBJETIVO
        //begin
        var filterObjetivo = false;
        var paginateObjetivo = false;
        var cantidadObjetivo = <?php echo count($objetivosEstrategicos); ?>;
        cantidadObjetivo = parseInt(cantidadObjetivo);
        if (cantidadObjetivo > 1) {
            filterObjetivo = true;
        }
        if (cantidadObjetivo > 10) {
            paginateObjetivo = true;
        }
        var tablaObjetivo = $('#tablaObjetivo').dataTable({
            "bSort": false,
            "bFilter": filterObjetivo,
            "bInfo": false, "bPaginate": paginateObjetivo,
            "columnDefs": [
                {"visible": false, "targets": 0}, {"visible": false, "targets": 4},
            ],
        });
        tablaObjetivo.$('a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaObjetivo.fnGetData(nRow);
            $("#idDeleteObjetivo").val(aData[0]);
        });
        //end
    });</script>



<!--***************************
ESTOS SON LOS EDITAR
***************************-->

<script type="text/javascript">
    //DATA TABLE MACROPROCESO EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaMacroproceso').dataTable();
        var filterUnidadesNegocioResponsableEditar = false;
        var paginateUnidadesNegocioResponsableEditar = false;
        var cantidadUnidadesNegocioResponsableEditar = <?php echo $countUnidadesNegocioResponsableEditar; ?>;
        cantidadUnidadesNegocioResponsableEditar = parseInt(cantidadUnidadesNegocioResponsableEditar);
        if (cantidadUnidadesNegocioResponsableEditar > 1) {
            filterUnidadesNegocioResponsableEditar = true;
        }
        if (cantidadUnidadesNegocioResponsableEditar > 10) {
            paginateUnidadesNegocioResponsableEditar = true;
        }

        var tablaUnidadesNegocioResponsableEditar = $('#tablaUnidadesNegocioResponsableEditar').dataTable({
            "bSort": false,
            "bFilter": filterUnidadesNegocioResponsableEditar,
            "bInfo": false,
            "bPaginate": paginateUnidadesNegocioResponsableEditar,
            "columnDefs": [
                {"visible": false, "targets": 3},
            ],
        });
        $('#tablaMacroproceso a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreMacroprocesoEditar").val(aData[1]);
            $("#idMacroprocesoEditar").val(aData[0]);
            $("#descripcionMacroprocesoEditar").val(aData[2]);
            $('input', tablaUnidadesNegocioResponsableEditar.fnGetNodes()).each(function() {
                var nRow = $(this).parents('tr');
                var check = "";
                var idUnidadNegocio = tablaUnidadesNegocioResponsableEditar.fnGetData(nRow, 3);
                alert(idUnidadNegocio);
                var idMacroproceso = $("#idMacroprocesoEditar").val();
                var $params = {'idUnidadNegocio': idUnidadNegocio, 'idMacroproceso': idMacroproceso};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/macroproceso/checkUnidadNegocio' ?>',
                    type: 'POST',
                    data: $params,
                    success: function(data) {

                        if (data != "no") {
                            $(this).prop('checked', true);
                            var columnas = $('>td', nRow);
                            alert(data);
                            //                            alert(columnas);
                            //                            columnas[1].innerHTML = '<input type="text" value="yo" class"name" style="width: 100%;">';
                            columnas[2].innerHTML = '<input type="text" value="' + data + '" class"name" style="width: 100%;">';
                        }
                    }
                });
            });
        });
    });
    //DATA TABLE DIMENSION EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaDimension').dataTable();
        $('#tablaDimension a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreDimensionEdit").val(aData[1]);
            $("#idDimensionEditar").val(aData[0]);
            $("#idEmpresaDimensionEditar").select2("val", aData[3]);
        });
    });
    //DATA TABLE OBJETIVO EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaObjetivo').dataTable();
        $('#tablaObjetivo a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreObjetivoEditar").val(aData[1]);
            $("#idObjetivoEditar").val(aData[0]);
            $("#codigoObjetivoEditar").val(aData[2]);
            $("#idDimensionObjetivoEditar").select2("val", aData[4]);
        });
    });
    //DATA TABLE PROCESO EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaProceso').dataTable();
        $('#tablaProceso a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreProcesoEdit").val(aData[1]);
            $("#idProcesoEditar").val(aData[0]);
            $("#idMacroProcesoEdit").select2("val", aData[3]);
            $("#descripcionProcesoEdit").val(aData[2]);
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });</script>


<!--***************************
ELIMINAR
***************************-->

<script type="text/javascript">

    //DATA TABLE DIMENSIONES ELIMINAR
    $(document).ready(function() {
        var objetivoEliminar = $('#tablaDimension').dataTable();
        $('#tablaDimension a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteDimension").val(aData[0]);
        });
    });
    //DATA TABLE MACROPROCESO ELIMINAR
    $(document).ready(function() {
//        var objetivoEliminar = $('#tablaMacroproceso').dataTable();
        $('#tablaMacroproceso a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            alert("rodnier");
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteMacroproceso").val(aData[0]);
        });
    });</script>


<script type="text/javascript">
    $(document).ready(function() {

        var filterUnidadesNegocioResponsable = false;
        var paginateUnidadesNegocioResponsable = false;
        var cantidadUnidadesNegocioResponsable = <?php echo $countUnidadesNegocioResponsable; ?>;
        cantidadUnidadesNegocioResponsable = parseInt(cantidadUnidadesNegocioResponsable);
        if (cantidadUnidadesNegocioResponsable > 1) {
            filterUnidadesNegocioResponsable = true;
        }
        if (cantidadUnidadesNegocioResponsable > 10) {
            paginateUnidadesNegocioResponsable = true;
        }

        var tablaUnidadesNegocioResponsable = $('#tablaUnidadesNegocioResponsable').dataTable({
            "bSort": false,
            "bFilter": filterUnidadesNegocioResponsable,
            "bInfo": false,
            "bPaginate": paginateUnidadesNegocioResponsable,
            "columnDefs": [
                {"visible": false, "targets": 3},
            ],
        });
        $('#crearMacroproceso').click(function() {
            var idMacroproceso = "";
            var unidadesNIds = [];
            var responsables = [];
            $('input:checked', tablaUnidadesNegocioResponsable.fnGetNodes()).each(function() {
                var nRow = $(this).parents('tr');
                var jqInputs = $('input', nRow);
                var idUnidadNegocio = tablaUnidadesNegocioResponsable.fnGetData(nRow, 3);
                var nombreResponsable = jqInputs[1].value;
                unidadesNIds.push(idUnidadNegocio);
                responsables.push(nombreResponsable);
            });
            var $params = {'nombreMacroproceso': $("#nombreMacroproceso").val(), 'descripcionMacroproceso': $("#descripcionMacroproceso").val(), 'unidadesNIds': unidadesNIds, 'responsables': responsables};
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/macroproceso/create' ?>',
                type: 'POST',
                data: $params,
                success: function(data) {
                    location.href = '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/default/index' ?>';
                }
            });
        });
    });</script>

<script type="text/javascript">
    function checkAll() {
        var count = 0;
        if ($("#check_all").val() == 0) {

            $('input:checkbox', $('#tablaUnidadesNegocioResponsable')).each(function() {
                $(this).prop('checked', true).val();
                $(this).val("1");
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                if (count != 0) {
                    columnas[2].innerHTML = '<input type="text" value="" class"name" style="width: 100%;">';
                }
                count++;
            });
            $("#check_all").val(1);
        }
        else {
            $('input:checkbox', $('#tablaUnidadesNegocioResponsable')).each(function() {
                $(this).prop('checked', false);
                $(this).val("0");
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                if (count != 0) {
                    columnas[2].innerHTML = '';
                }
                count++;
            });
            $("#check_all").checked;
            $("#check_all").val(0);
        }
    }
</script>
<script type="text/javascript">
    function check() {

    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaUnidadesNegocioResponsable').on('change', 'input.activar-tex', function() {
            $("#check_all").prop('checked', false);
            if ($(this).val() == "0") {
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                columnas[2].innerHTML = '<input type="text" value="" class"name" style="width: 100%;">';
                $(this).val("1");
            }
            else {

                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                columnas[2].innerHTML = '';
                $(this).val("0");
            }


        });
    });
</script>

<script type="text/javascript">
    // inicio crear proceso  
    $(document).ready(function() {

        var tablaUnidadesNegocioProcesoResponsable = $('#tablaUnidadesNegocioProcesoResponsable').dataTable({
            "bSort": false,
            "bFilter": true,
            "bInfo": false,
            "bPaginate": false,
            "columnDefs": [
                {"visible": false, "targets": 3},
            ],
        });

        $("#idMacroProceso").change(function() {
            $("#idMacroProceso option:selected").each(function() {
                var idMacroproceso = $(this).val();
                var $params = {'idMacroproceso': idMacroproceso};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/proceso/unidadNegocioMacroproceso' ?>',
                    type: 'POST',
                    data: $params,
                    success: function(data) {
                        tablaUnidadesNegocioProcesoResponsable.$('tr').each(function(index, value) {
                            tablaUnidadesNegocioProcesoResponsable.fnDeleteRow(value);
                        });
                        var valores = JSON.parse(data);
                        if (valores.length > 0) {
                            for (var i = 0; i < valores.length; i++) {

                               
                                tablaUnidadesNegocioProcesoResponsable.fnAddData([
                                    ' <input type="checkbox" class="activar-tex" value="0"/>',
                                    valores[i].nombre,
                                    "",
                                    valores[i].id_unidad_negocio]);
                                tablaUnidadesNegocioProcesoResponsable.fnDraw();
                            }
                        }
                        else
                            alert('No hay datos');

                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });


            });
                    $('#crearProceso').click(function() {
            var idproceso = "";
            var unidadesNIds = [];
            var responsables = [];
            $('input:checked', tablaUnidadesNegocioProcesoResponsable.fnGetNodes()).each(function() {
                var nRow = $(this).parents('tr');
                var jqInputs = $('input', nRow);
                var idUnidadNegocio = tablaUnidadesNegocioProcesoResponsable.fnGetData(nRow, 3);
                var nombreResponsable = jqInputs[1].value;
                unidadesNIds.push(idUnidadNegocio);
                responsables.push(nombreResponsable);
            });
            var $params = {'nombreProceso': $("#nombreProceso").val(),'idMacroProceso': $("#idMacroProceso").val(), 'descripcionProceso': $("#descripcionProceso").val(), 'unidadesNIds': unidadesNIds, 'responsables': responsables};
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/proceso/create'              ?>',
                type: 'POST',
                data: $params,
                success: function(data) {
                    location.href = '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=ProcesosEstrategias/default/index'              ?>';
                }
            });
        });
        })


    });</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaUnidadesNegocioProcesoResponsable').on('change', 'input.activar-tex', function() {
            $("#check_allProceso").prop('checked', false);
            if ($(this).val() == "0") {
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                columnas[2].innerHTML = '<input type="text" value="" class"name" style="width: 100%;">';
                $(this).val("1");
            }
            else {

                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                columnas[2].innerHTML = '';
                $(this).val("0");
            }


        });
    });
</script>
<script type="text/javascript">
    function checkAllProceso() {
        var count = 0;
        if ($("#check_allProceso").val() == 0) {

            $('input:checkbox', $('#tablaUnidadesNegocioProcesoResponsable')).each(function() {
                $(this).prop('checked', true).val();
                $(this).val("1");
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                if (count != 0) {
                    columnas[2].innerHTML = '<input type="text" value="" class"name" style="width: 100%;">';
                }
                count++;
            });
            $("#check_allProceso").val(1);
        }
        else {
            $('input:checkbox', $('#tablaUnidadesNegocioProcesoResponsable')).each(function() {
                $(this).prop('checked', false);
                $(this).val("0");
                var nRow = $(this).parents('tr');
                var columnas = $('>td', nRow);
                if (count != 0) {
                    columnas[2].innerHTML = '';
                }
                count++;
            });
            $("#check_allProceso").checked;
            $("#check_allProceso").val(0);
        }
    }
    // fin crear proceso
</script>