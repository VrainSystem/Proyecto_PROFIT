<?php
/* @var $this DefaultController */

Yii::import('application.modules.Configuracion.models.*');
Yii::import('application.modules.InventarioRiesgo.models.*');
Yii::import('application.modules.ProcesosEstrategias.models.*');
$this->breadcrumbs = array(
    $this->module->id,
);

$modelRiesgo = new Riesgo();
$riesgo = $modelRiesgo->findByPk($id_riesgo);
?>

<style>
    h3 {
        font-size: 20px !important;
    }
</style>
<div class="toolbar ">
    <div class="col-sm-6 hidden-xs">
        <div class="page-header">
            <h1>
                Gestión de Riesgos: Detalles del Riesgo <br>
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
                <li class="active">Gestión de Riesgos</li>
            </ol>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
</div>
<div class="row padding-15" style="margin-top: 20px;">
    <!-- start: PAGE CONTENT -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <h4 class="panel-title">Detalles de Identificación</h4>
                    <div class="panel-tools">
                        <div class="dropdown">
                            <a data-toggle="tooltip" class="btn btn-xs dropdown-toggle btn-transparent-grey" title="Editar" href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/update&id_riesgo=<?php echo $id_riesgo; ?>">
                                <i class="fa fa-edit"></i>
                            </a>                                
                        </div>                           
                    </div>
                </div>
                <div class="panel-body" >
                    <div class="invoice" id="DetallesRiesgo">
                        <div class="row invoice-logo">                            
                            <div class="col-sm-8">
                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <i class="fa fa-paste fa-3x "></i>
                                    </a>
                                    <div class="media-body">
                                        <h2 class="media-heading text-uppercase text-primary text-bold"><?php echo $riesgo->codigo ?>: <?php echo $riesgo->nombre ?></h2>
                                        <small>
                                            <?php
                                            $modelUnidadNegocio = new UnidadNegocio();
                                            $riesgoUnidadNegocio = new RiesgoUnidadNegocio();
                                            $riesgoUnidadesNegocio = $riesgoUnidadNegocio->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo));
                                            foreach ($riesgoUnidadesNegocio as $value) {
                                                $unidadNegocio = $modelUnidadNegocio->findByPk($value->id_unidad_negocio); //chequear que la empresa sea una sola para todas las unidades
                                            }

                                            $modelProceso = new Proceso();
                                            $procesoRiesgo = new ProcesoRiesgo();
                                            $procesosRiesgo = $procesoRiesgo->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo));
                                            $nombresMacroprocesos = array();
                                            ?>

                                            <strong>Empresa:</strong> <?php echo $unidadNegocio->idEmpresa->nombre; ?> <br>
                                            <strong>Tipo de Riesgo:</strong> <?php echo $riesgo->idTipoRiesgo->nombre; ?> 
                                        </small>
                                    </div>
                                </div>


                            </div>
                            <div class="col-sm-12">
<!--                                <p class="text-uppercase text-primary">
                                <?php echo $riesgo->codigo ?> <span> Riesgo: <?php echo $riesgo->nombre ?></span>
                                </p>-->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <h3>Información General:</h3>
                                <div class="well height-200">
                                    <div class="col-md-6">
                                        <strong>Unidad(es) de Negocio:</strong>
                                        <ul>
                                            <?php
                                            $unidadNegocioRiesgo = $riesgo->unidadNegocios;
                                            foreach ($unidadNegocioRiesgo as $value) {
                                                ?>

                                                <li>
                                                    <?php echo $value->nombre; ?>
                                                </li>



                                                <?php
                                            }
                                            ?>  </ul>
                                        <br>  
                                        <strong>Macroproceso(s):</strong>
                                        <ul>
                                            <?php
                                            foreach ($procesosRiesgo as $value) {
                                                echo " ";
                                                $proceso = $modelProceso->findByPk($value->id_proceso);
                                                if (!in_array($proceso->idMacroproceso->nombre, $nombresMacroprocesos)) {
                                                    array_push($nombresMacroprocesos, $proceso->idMacroproceso->nombre);
                                                    ?>

                                                    <li>
                                                        <?php echo $proceso->idMacroproceso->nombre; ?>
                                                    </li>



                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>



                                        </ul>
                                        </i>
                                    </div>
                                    <div class="col-md-6">
                                       
                                            <strong>Grupo de Riesgo:</strong> <?php echo $riesgo->idGrupoRiesgo->nombre; ?> 
                                            <br>
                                            <strong>Tipo de Pérdida:</strong> <?php echo $riesgo->idTipoPerdida->nombre; ?> 
                                            <br>
                                            <strong>Causa(s):</strong> 
                                            <ul>
                                                <?php
                                                $causaRiesgo = $riesgo->causas;
                                                foreach ($causaRiesgo as $value) {
                                                    ?>
                                                    <li>
                                                        <?php
                                                        echo $value->idTipoCausa->nombre;
                                                        echo "_";
                                                        echo $value->nombre;
                                                        ?>
                                                    </li>

                                                    <?php
                                                }
                                                ?> 
                                            </ul>

                                            <strong>Actividad de Control:</strong> <?php echo $riesgo->idActividadControl->nombre; ?>
                                        
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <h3>Descripción de la Causa:</h3>
                                <div class="well height-200">
                                    <?php echo $riesgo->descripcion_causa; ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>Descripción de la Actividad de Control:</h3>
                                <div class="well height-200">
                                    <?php echo $riesgo->descripcion_actividad_control; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">IMPACTO</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Escenario Pesimista</th>
                                                    <th> Escenario Probable</th>
                                                    <th> Escenario Optimista</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td>$ <?php echo $riesgo->impacto_pesimista; ?></td>
                                                    <td>$ <?php echo $riesgo->impacto_probable; ?> </td>
                                                    <td>$ <?php echo $riesgo->impacto_optimista; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title text-uppercase">Criterios Valores de Impacto</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Pesimista</th>
                                                    <th> Probable</th>
                                                    <th> Optimista</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->descripcion_impacto_pesimista; ?> </td>
                                                    <td> <?php echo $riesgo->descripcion_impacto_probable; ?> </td>
                                                    <td> <?php echo $riesgo->descripcion_impacto_optimista; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                                <div class="box box-danger">
                                    <div class="box-header">
                                        <h3 class="box-title text-uppercase">Valoración Cualitativa – Mapa de Riesgos</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Impacto</th>
                                                    <th> Probabilidad</th>
                                                    <th> Pérdida Esperada</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->impacto_cualitativo; ?></td>
                                                    <td> <?php echo $riesgo->probabilidad_cualitativa; ?> </td>
                                                    <td> <?php echo $riesgo->riesgo_cualitativo; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">PROBABILIDAD</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Escenario Pesimista</th>
                                                    <th> Escenario Probable</th>
                                                    <th> Escenario Optimista</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->probabilidad_pesimista; ?> %</td>
                                                    <td> <?php echo $riesgo->probabilidad_probable; ?> %</td>
                                                    <td> <?php echo $riesgo->probabilidad_optimista; ?> %</td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title text-uppercase">Criterios Valores de Probabilidad</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Pesimista</th>
                                                    <th> Probable</th>
                                                    <th> Optimista</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->descripcion_probabilidad_pesimista; ?></td>
                                                    <td> <?php echo $riesgo->descripcion_probabilidad_probable; ?> </td>
                                                    <td> <?php echo $riesgo->descripcion_probabilidad_optimista; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>
                                <div class="box box-warning">
                                    <div class="box-header">
                                        <h3 class="box-title text-uppercase">Valoración Cuantitativa – Modelo Determinístico</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Impacto</th>
                                                    <th> Probabilidad</th>
                                                    <th> Pérdida Esperada</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->impacto_deterministico; ?></td>
                                                    <td> <?php echo $riesgo->probabilidad_deterministica; ?> </td>
                                                    <td> <?php echo $riesgo->riesgo_deterministico; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-success">
                                    <div class="box-header">
                                        <h3 class="box-title text-uppercase">Valoración Cuantitativa – Modelo Estocástico</h3>
                                    </div>
                                    <div class="box-body no-padding-top">
                                        <table class="table table-striped table-hover text-center" style="font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <th> Impacto</th>
                                                    <th> Probabilidad</th>
                                                    <th> Pérdida Esperada</th>

                                                </tr>
                                            </thead>
                                            <tbody class="center">
                                                <tr>
                                                    <td> <?php echo $riesgo->impacto_estocastico; ?></td>
                                                    <td> <?php echo $riesgo->probabilidad_estocastica; ?> </td>
                                                    <td> <?php echo $riesgo->riesgo_estocastico; ?> </td>

                                                </tr>


                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->
                                </div>

                            </div>
                            <div class="col-sm-12 invoice-block">

                                <a onclick="javascript:window.print('#DetallesRiesgo');" class="btn btn-lg btn-light-blue hidden-print">
                                    Imprimir <i class="fa fa-print"></i>
                                </a>
                                <a class="btn btn-lg btn-cancel hidden-print" <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/admin">
                                        Cerrar <i class="fa fa-close"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: PAGE CONTENT-->
</div>



