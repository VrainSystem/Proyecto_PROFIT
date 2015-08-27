<?php
/* @var $this DefaultController */

Yii::import('application.modules.Configuracion.models.*');

Yii::import('application.modules.ProcesosEstrategias.models.*');
$this->breadcrumbs = array(
    $this->module->id,
);
$riesgo = Riesgo::model()->findByPk($id_riesgo);
?>

<div class="toolbar ">
 <div class="col-sm-6 hidden-xs">
  <div class="page-header">
   <h1>
    Gestión de Riesgos: Editar Riesgo <br>
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
<form id="actualizarRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/update' ?>" method="post">
    <div class="row padding-5" style="margin-top: 20px;">
        <div class="col-lg-12 col-md-12">
            <div class="panel ">
                <div class="panel-heading border-light panel-blue">
                    <span class="text-extra-small text-dark"><i class="fa fa-warning fa-2x"></i></span><span class="text-large text-white"> DATOS DEL RIESGO</span>

                </div>
                <div class="panel-body ">
                    <div class="row">
                        <div class="col-md-3">

                            <div id="" class="form-group">
                                <label class="control-label">
                                    Grupo de Riesgo                                    
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idGrupoRiesgoActualizar" name="idGrupoRiesgoActualizar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $grupoRiesgoCrear = new GrupoRiesgo();
                                    $gruposRiesgoCrear = $grupoRiesgoCrear->findAll();
                                    foreach ($gruposRiesgoCrear as $value) {
                                        if ($value->id_grupo_riesgo != $riesgo->id_grupo_riesgo) {
                                            ?> 

                                            <option value="<?php echo $value->id_grupo_riesgo; ?>" title="<?php echo $value->codigo; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_grupo_riesgo; ?>" title="<?php echo $value->codigo; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select> 
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div id="" class="form-group">
                                <label class="control-label">
                                    Código                                    

                                </label>
                                <input id="codigoRiesgoActualizarAux" name="codigoRiesgoActualizarAux" class="form-control" value="<?php echo $riesgo->codigo; ?>" disabled=""/>                                          
                                <input id="codigoRiesgoActualizar" name="codigoRiesgoActualizar" class="form-control" value="<?php echo $riesgo->codigo; ?>" style="display: none"/>                                          
                                <input id="idRiesgoActualizar" name="idRiesgoActualizar" class="form-control" value="<?php echo $riesgo->id_riesgo; ?>" style="display: none"/>                                          
                            </div>

                        </div>
                        <div class="col-md-3">

                            <div id="" class="form-group">
                                <label class="control-label">
                                    Nombre del Riesgo                                    
                                    <span class="symbol required"></span>
                                </label>
                                <input id="nombreRiesgoActualizar" name="nombreRiesgoActualizar" class="form-control" value="<?php echo $riesgo->nombre; ?>"/>                                          
                            </div>

                        </div>

                        <div class="col-md-3">

                            <div id="" class="form-group">
                                <label class="control-label">
                                    Tipo de Riesgo                                   
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idTipoRiesgoActualizar" name="idTipoRiesgoActualizar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $tipoTipoRiesgoCrear = new TipoRiesgo();
                                    $tiposRiesgoCrear = $tipoTipoRiesgoCrear->findAll();
                                    foreach ($tiposRiesgoCrear as $value) {
                                        if ($value->id_tipo_riesgo != $riesgo->id_tipo_riesgo) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_riesgo; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_tipo_riesgo; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select>                                        
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Unidad(s) de Negocio                                    
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idUnidadNegocioActualizar" name="idUnidadNegocioActualizar[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px;overflow-y: auto;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $unidadNegocioCrear = new UnidadNegocio();
                                    $unidadesNegocioCrear = $unidadNegocioCrear->findAll();
                                    foreach ($unidadesNegocioCrear as $value) {
                                        $riesgoUnidadNegocio = RiesgoUnidadNegocio::model()->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo, 'id_unidad_negocio' => $value->id_unidad_negocio));
                                        if (count($riesgoUnidadNegocio) == 0) {
                                            ?> 

                                            <option value="<?php echo $value->id_unidad_negocio; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_unidad_negocio; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select>                              
                            </div>
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Proceso(s)                                    
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idProcesoActualizar" name="idProcesoActualizar[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px;overflow-y: auto;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $procesoCrear = new Proceso();
                                    $procesosCrear = $procesoCrear->findAll();
                                    foreach ($procesosCrear as $value) {
                                        $procesoRiesgo = ProcesoRiesgo::model()->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo, 'id_proceso' => $value->id_proceso));
                                        if (count($procesoRiesgo) == 0) {
                                            ?> 

                                            <option value="<?php echo $value->id_proceso; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_proceso; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select>                              
                            </div>
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Causa(s)                                  
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idCausaActualizar" name="idCausaActualizar[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px;overflow-y: auto;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $causaCrear = new Causa();
                                    $causasCrear = $causaCrear->findAll();
                                    foreach ($causasCrear as $value) {
                                        $causaRiesgo = CausaRiesgo::model()->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo, 'id_causa' => $value->id_causa));
                                        if (count($causaRiesgo) == 0) {
                                            ?> 

                                            <option value="<?php echo $value->id_causa; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_causa; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select>                              
                            </div
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Descripción de la Causa                                 
                                    <span class="symbol required"></span>
                                </label>
                                <textarea id="descripcionCausaActualizar" name="descripcionCausaActualizar" class="form-control" value=""><?php echo $riesgo->descripcion_causa; ?></textarea>                                          
                            </div
                        </div>
                        <div class="col-md-6">
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Tipo de Pérdida                                   
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idTipoPerdidaActualizar" name="idTipoPerdidaActualizar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $tipoPerdidaCrear = new TipoPerdida();
                                    $tiposPerdidaCrear = $tipoPerdidaCrear->findAll();
                                    foreach ($tiposPerdidaCrear as $value) {
                                        if ($value->id_tipo_perdida != $riesgo->id_tipo_perdida) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_perdida; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_tipo_perdida; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option> 
                                </select>                                        
                            </div>

                            <div id="" class="form-group">
                                <label class="control-label">
                                    Objetivo(s) Estratégicos                                    
                             
                                </label>
                                <select  id="idObjetivoEstrategicoActualizar" name="idObjetivoEstrategicoActualizar[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px;overflow-y: auto;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $ObjetivoEstrategicoCrear = new ObjetivoEstrategico();
                                    $ObjetivosEstrategicoCrear = $ObjetivoEstrategicoCrear->findAll();
                                    foreach ($ObjetivosEstrategicoCrear as $value) {
                                        $objetivoEstrategicoRiesgo = ObjetivoEstrategicoRiesgo::model()->findAllByAttributes(array('id_riesgo' => $riesgo->id_riesgo, 'id_objetivo_estrategico' => $value->id_objetivo_estrategico));
                                        if (count($objetivoEstrategicoRiesgo) == 0) {
                                            ?> 

                                            <option value="<?php echo $value->id_objetivo_estrategico; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_objetivo_estrategico; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?> 
                                    </option>
                                </select>                              
                            </div>
                            <div id="nombreUsuarioError" class="form-group">
                                <label class="control-label">
                                    Actividad de Control                                    
                                    <span class="symbol required"></span>
                                </label>
                                <select  id="idActividadControlActualizar" name="idActividadControlActualizar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                    <option value="null">Seleccione</option> 
                                    <?php
                                    $ActividadControlCrear = new ActividadControl();
                                    $ActividadesControlCrear = $ActividadControlCrear->findAll();
                                    foreach ($ActividadesControlCrear as $value) {
                                        if ($value->id_actividad_control != $riesgo->id_actividad_control) {
                                            ?> 

                                            <option value="<?php echo $value->id_actividad_control; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            } else {
                                                ?> 

                                            <option selected="selected" value="<?php echo $value->id_actividad_control; ?>" title="<?php echo $value->nombre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                        }
                                        ?>  
                                    </option> 
                                </select>                                           
                            </div
                            <div id="" class="form-group">
                                <label class="control-label">
                                    Descripción de la Actividad de Control                                  
                                    <span class="symbol required"></span>
                                </label>
                                <textarea id="descripcionActividadControlActualizar" name="descripcionActividadControlActualizar" class="form-control" value=""><?php echo $riesgo->descripcion_actividad_control; ?></textarea>                                          
                            </div>


                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel ">
                    <div class="panel-heading border-light panel-green">
                        <span class="text-extra-small text-dark"><i class="fa fa-dollar fa-2x"></i></span><span class="text-large text-white"> IMPACTO</span>

                    </div>
                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Pesimista                                    
                                        <span class="symbol required"></span>
                                    </label>
                                    <span class="input-icon input-icon-left">
                                        <i class="fa fa-dollar"></i>
                                        <input id="impactoPesimistaActualizar" name="impactoPesimistaActualizar" class="form-control" value="<?php echo $riesgo->impacto_pesimista; ?>"/>                              
                                    </span>


                                </div>
                                <textarea id="descripcionImpactoPesimistaActualizar" name="descripcionImpactoPesimistaActualizar" class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_impacto_pesimista; ?></textarea>

                            </div>
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Probable                                    
                                        <span class="symbol required"></span>
                                    </label>
                                    <span class="input-icon input-icon-left">
                                        <i class="fa fa-dollar"></i>
                                        <input id="impactoProbableActualizar" name="impactoProbableActualizar" class="form-control" value="<?php echo $riesgo->impacto_probable; ?>"/>  

                                    </span>
                                </div>
                                <textarea id="descripcionImpactoProbableActualizar" name="descripcionImpactoProbableActualizar" class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_impacto_probable; ?></textarea>

                            </div>
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Optimista                                    
                                        <span class="symbol required"></span>
                                    </label>
                                    <span class="input-icon input-icon-left">
                                        <i class="fa fa-dollar"></i>
                                        <input id="impactoOptimistaActualizar" name="impactoOptimistaActualizar" class="form-control" value="<?php echo $riesgo->impacto_optimista; ?>"/>                                             

                                    </span>

                                </div>
                                <textarea id="descripcionImpactoOptimistaActualizar" name="descripcionImpactoOptimistaActualizar" class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_impacto_optimista; ?></textarea>
                            </div>


                        </div>

                    </div>

                </div>

            </div>
            <div class="col-lg-6">
                <div class="panel ">
                    <div class="panel-heading border-light panel-red">
                        <span class="text-extra-small text-dark"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dice9.png"  class="online" /></span><span class="text-large text-white"> PROBABILIDAD</span>

                    </div>
                    <div class="panel-body ">
                        <div class="row">
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Pesimista                                    
                                        <span class="symbol required"></span>
                                    </label>

                                    <span class="input-icon input-icon-right">
                                        <input id="probabilidadPesimistaActualizar" name="probabilidadPesimistaActualizar" class="form-control" value="<?php echo $riesgo->probabilidad_pesimista; ?>"/> 
                                        <i class="fa fa-ellipsis-v"> %</i>
                                    </span>
                                </div>
                                <textarea id="descripcionProbabilidadPesimistaActualizar" name="descripcionProbabilidadPesimistaActualizar" class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_probabilidad_pesimista; ?></textarea>

                            </div>
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Probable                                    
                                        <span class="symbol required"></span>
                                    </label>
                                    <span class="input-icon input-icon-right">
                                        <input id="probabilidadProbableActualizar" name="probabilidadProbableActualizar"  class="form-control" value="<?php echo $riesgo->probabilidad_probable; ?>"/>                                             
                                        <i class="fa fa-ellipsis-v"> %</i>
                                    </span>
                                    
                                </div>
                                <textarea id="descripcionProbabilidadProbableActualizar" name="descripcionProbabilidadProbableActualizar"  class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_probabilidad_probable; ?></textarea>

                            </div>
                            <div class="col-md-4">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Escenario Optimista                                    
                                        <span class="symbol required"></span>
                                    </label>
                                    <span class="input-icon input-icon-right">
                                        <input id="probabilidadOptimistaActualizar" name="probabilidadOptimistaActualizar" class="form-control" value="<?php echo $riesgo->probabilidad_optimista; ?>"/>                                             
                                        <i class="fa fa-ellipsis-v"> %</i>
                                    </span>
                                   
                                </div>
                                <textarea id="descripcionProbabilidadOptimistaActualizar" name="descripcionProbabilidadOptimistaActualizar" class="form-control" placeholder="Descripcion" value=""><?php echo $riesgo->descripcion_probabilidad_optimista; ?></textarea>
                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div> 
        <div class="row">
            <div class="col-md-6">
                <span class="help-inline "> <i class="fa fa-info-circle text-primary fa-2x"></i> Los campos con (*) son requeridos para el registro del usuario.</span>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <button type="submit" class="btn btn-blue" onclick="" >Actualizar</button>
                    <a type="button" class="btn btn-default" href="javascript:window.history.back();">Cancelar</a>
                </div> 
            </div>
        </div>
</form>


<script type="text/javascript">

    $(document).ready(function() {

        $("#idGrupoRiesgoActualizar").on('change', function() {
            var idGR = $(this).find("option:selected").attr("value");
            var codigoGR = $(this).find("option:selected").attr("title");
            if (idGR != "null") {
                var $params = {'idGR': idGR};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/contarRiesgos' ?>',
                    type: 'POST',
                    data: $params,
                    success: function(datos) {
                        $("#codigoRiesgoActualizar").val(codigoGR + "_" + datos);
                        $("#codigoRiesgoActualizarAux").val(codigoGR + "_" + datos);
                    }
                });
            }
            else {
                $("#codigoRiesgoActualizar").val("");
                $("#codigoRiesgoActualizarAux").val("");
            }

        });

    });
</script> 


