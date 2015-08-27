<?php
/* @var $this DefaultController */

Yii::import('application.modules.Configuracion.models.*');

Yii::import('application.modules.ProcesosEstrategias.models.*');
$this->breadcrumbs = array(
 $this->module->id,
);
//$riesgo = new Riesgo();
//$riesgoTipoRiesgo = $riesgo->findAllByAttributes(array('id_tipo_riesgo' => $tipoPresupuestoId));
//$countPresupuestoAnualTipoPresupuesto = count($presupuestoAnualTipoPresupuesto);
?>

<div class="toolbar ">
 <div class="col-sm-6 hidden-xs">
  <div class="page-header">
   <h1>
    Gestión de Riesgos: Registrar Riesgo <br>
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
<form id="crearRiesgo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/create' ?>" method="post">
 <div class="row padding-5" style="margin-top: 20px;">
  <div class="col-lg-12 col-md-12">
   <div class="panel ">
    <div class="panel-heading border-light panel-blue">
     <span class="text-extra-small text-dark"><i class="fa fa-flash fa-2x"></i></span><span class="text-large text-white"> DATOS DEL RIESGO</span>

    </div>
    <div class="panel-body ">
     <div class="row">
      <div class="col-md-3">

       <div id="" class="form-group">
        <label class="control-label">
         Grupo de Riesgo         
         <span class="symbol required"></span>
        </label>
        <select id="idGrupoRiesgoCrear" name="idGrupoRiesgoCrear" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">  
         <option value="null">Seleccione</option> 
         <?php
         $grupoRiesgoCrear = new GrupoRiesgo();
         $gruposRiesgoCrear = $grupoRiesgoCrear->findAll();
         foreach ($gruposRiesgoCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_grupo_riesgo; ?>" title="<?php echo $value->codigo; ?>">
           <?php
           echo $value->nombre;
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
        <input id="codigoRiesgoCrearAux" name="codigoRiesgoCrearAux" class="form-control" disabled=""/>           
        <input id="codigoRiesgoCrear" name="codigoRiesgoCrear" class="form-control" style="display: none"/>           
       </div>

      </div>
      <div class="col-md-3">

       <div id="" class="form-group">
        <label class="control-label">
         Nombre del Riesgo         
         <span class="symbol required"></span>
        </label>
        <input id="nombreRiesgoCrear" name="nombreRiesgoCrear" class="form-control" />           
       </div>

      </div>

      <div class="col-md-3">

       <div id="" class="form-group">
        <label class="control-label">
         Tipo de Riesgo         
         <span class="symbol required"></span>
        </label>
        <select id="idTipoRiesgoCrear" name="idTipoRiesgoCrear" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px; overflow-y: auto;">  
         <option value="null">Seleccione</option> 
         <?php
         $tipoTipoRiesgoCrear = new TipoRiesgo();
         $tiposRiesgoCrear = $tipoTipoRiesgoCrear->findAll();
         foreach ($tiposRiesgoCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_tipo_riesgo; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
         Unidad(es) de Negocio         
         <span class="symbol required"></span>
        </label>
        <select id="idUnidadNegocioCrear" name="idUnidadNegocioCrear[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px;" placeholder="Seleccione">  

         <?php
         $unidadNegocioCrear = new UnidadNegocio();
         $unidadesNegocioCrear = $unidadNegocioCrear->findAll();
         foreach ($unidadesNegocioCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_unidad_negocio; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
        <select id="idProcesoCrear" name="idProcesoCrear[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px; overflow-y: auto;" placeholder="Seleccione">  
         <?php
         $procesoCrear = new Proceso();
         $procesosCrear = $procesoCrear->findAll();
         foreach ($procesosCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_proceso; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
        <select id="idCausaCrear" name="idCausaCrear[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px; overflow-y: auto;" placeholder="Seleccione">  
         <?php
         $causaCrear = new Causa();
         $causasCrear = $causaCrear->findAll();
         foreach ($causasCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_causa; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
        <textarea id="descripcionCausaCrear" name="descripcionCausaCrear" class="form-control"></textarea>           
       </div
      </div>
      <div class="col-md-6">
       <div id="" class="form-group">
        <label class="control-label">
         Tipo de Pérdida         
         <span class="symbol required"></span>
        </label>
        <select id="idTipoPerdidaCrear" name="idTipoPerdidaCrear" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">  
         <option value="null">Seleccione</option> 
         <?php
         $tipoPerdidaCrear = new TipoPerdida();
         $tiposPerdidaCrear = $tipoPerdidaCrear->findAll();
         foreach ($tiposPerdidaCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_tipo_perdida; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
          }
          ?> 
         </option> 
        </select>          
       </div>

       <div id="" class="form-group">
        <label class="control-label">
         Objetivo(s) Estratégicos         
        
        </label>
        <select id="idObjetivoEstrategicoCrear" name="idObjetivoEstrategicoCrear[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 41px; overflow-y: auto;" placeholder="Seleccione" >  
         <?php
         $ObjetivoEstrategicoCrear = new ObjetivoEstrategico();
         $ObjetivosEstrategicoCrear = $ObjetivoEstrategicoCrear->findAll();
         foreach ($ObjetivosEstrategicoCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_objetivo_estrategico; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
        <select id="idActividadControlCrear" name="idActividadControlCrear" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">  
         <option value="null">Seleccione</option> 
         <?php
         $ActividadControlCrear = new ActividadControl();
         $ActividadesControlCrear = $ActividadControlCrear->findAll();
         foreach ($ActividadesControlCrear as $value) {
          ?> 

          <option value="<?php echo $value->id_actividad_control; ?>" title="<?php echo $value->nombre; ?>">
           <?php
           echo $value->nombre;
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
        <textarea id="descripcionActividadControlCrear" name="descripcionActividadControlCrear" class="form-control"></textarea>           
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
          <input id="impactoPesimistaCrear" name="impactoPesimistaCrear" class="form-control" placeholder="000"/>           
         </span>


        </div>
        <textarea id="descripcionImpactoPesimistaCrear" name="descripcionImpactoPesimistaCrear" class="form-control" placeholder="Descripcion"></textarea>

       </div>
       <div class="col-md-4">

        <div id="" class="form-group">
         <label class="control-label">
          Escenario Probable         
          <span class="symbol required"></span>
         </label>

         <span class="input-icon input-icon-left">
          <i class="fa fa-dollar"></i>
          <input id="impactoProbableCrear" name="impactoProbableCrear" class="form-control"  placeholder="000"/>           
         </span>

        </div>
        <textarea id="descripcionImpactoProbableCrear" name="descripcionImpactoProbableCrear" class="form-control" placeholder="Descripcion"></textarea>

       </div>
       <div class="col-md-4">

        <div id="" class="form-group">
         <label class="control-label">
          Escenario Optimista         
          <span class="symbol required"></span>
         </label>

         <span class="input-icon input-icon-left">
          <i class="fa fa-dollar"></i>
          <input id="impactoOptimistaCrear" name="impactoOptimistaCrear" class="form-control"  placeholder="000"/>           
         </span>


        </div>
        <textarea id="descripcionImpactoOptimistaCrear" name="descripcionImpactoOptimistaCrear" class="form-control" placeholder="Descripcion"></textarea>
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
          <input id="probabilidadPesimistaCrear" name="probabilidadPesimistaCrear" class="form-control" placeholder="%"/> 
          <i class="fa fa-ellipsis-v"> %</i>
         </span>


        </div>
        <textarea id="descripcionProbabilidadPesimistaCrear" name="descripcionProbabilidadPesimistaCrear" class="form-control" placeholder="Descripcion"></textarea>

       </div>
       <div class="col-md-4">

        <div id="" class="form-group">
         <label class="control-label">
          Escenario Probable         
          <span class="symbol required"></span>
         </label>

         <span class="input-icon input-icon-right">
             <input id="probabilidadProbableCrear" name="probabilidadProbableCrear" class="form-control" placeholder="%"/> 
          <i class="fa fa-ellipsis-v"> %</i>
         </span>

        </div>
        <textarea id="descripcionProbabilidadProbableCrear" name="descripcionProbabilidadProbableCrear" class="form-control" placeholder="Descripcion"></textarea>

       </div>
       <div class="col-md-4">

        <div id="" class="form-group">
         <label class="control-label">
          Escenario Optimista         
          <span class="symbol required"></span>
         </label>

         <span class="input-icon input-icon-right">
          <input id="probabilidadOptimistaCrear" name="probabilidadOptimistaCrear" class="form-control" placeholder="%"/> 
          <i class="fa fa-ellipsis-v"> %</i>
         </span>



        </div>
        <textarea id="descripcionProbabilidadOptimistaCrear" name="descripcionProbabilidadOptimistaCrear" class="form-control" placeholder="Descripcion"></textarea>
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
     <button type="submit" class="btn btn-blue" onclick="enviarCausas()" >Registrar</button>
     <a type="button" class="btn btn-default" href="javascript:window.history.back();">Cancelar</a>
    </div> 
   </div>
  </div>
</form>


<script type="text/javascript">

 $(document).ready(function() {

  $("#idGrupoRiesgoCrear").on('change', function() {
   var idGR = $(this).find("option:selected").attr("value");
   var codigoGR = $(this).find("option:selected").attr("title");
   if (idGR != "null") {
    var $params = {'idGR': idGR};
    $.ajax({
     url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/contarRiesgos' ?>',
     type: 'POST',
     data: $params,
     success: function(datos) {
      $("#codigoRiesgoCrear").val(codigoGR + "_" + datos);
      $("#codigoRiesgoCrearAux").val(codigoGR + "_" + datos);
     }
    });
   }
   else {
    $("#codigoRiesgoCrear").val("");
    $("#codigoRiesgoCrearAux").val("");
   }

  });

 });
</script> 


