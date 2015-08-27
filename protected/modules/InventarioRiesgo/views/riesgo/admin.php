
<?php
$model = new Riesgo();
$riesgos = $model->findAll();
Yii::import('application.modules.Configuracion.models.Usuario');
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<style>
    [class^="icheckbox_"], [class*="icheckbox_"]{
        float: none;
        margin: 0 0 0 5px !important;
    }
</style>
<div class="toolbar ">
    <div class="col-sm-6 hidden-xs">
        <div class="page-header">
            <h1>
                Gestión de Riesgos <br>
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

<div class="row padding-5" style="margin-top: 20px;">
    <div class="col-lg-12 col-md-12">
        <div class="panel ">
            <div class="panel-heading border-light panel-blue">
                <span class="text-extra-small text-dark"><i class="fa fa-cogs fa-2x"></i></span><span class="text-large text-white"> GESTION DE RIESGOS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="tooltip" title="Registrar Riesgo"href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/create"><i class="fa fa-plus"></i> Nuevo </a>
                    <a id="planAccionBoton" class="btn btn-sm btn-transparent-white" data-toggle="tooltip" title="Plan de Acción"><i class="fa fa-wrench" style="font-size:18px;"></i>  </a>
                    <a id="busquedaAvanzadaBoton" class="btn btn-sm btn-transparent-white" data-toggle="tooltip" title="Búsqueda Avanzada"><i class="fa fa-filter" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body ">
                <!--Plan de Acción-->
                <div id="planAccion" class="box box-primary" style="display: none">
                    <div class="box-header">
                        <h3 class="box-title">Plan de Acción</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">

                                <div id="" class="form-group">
                                    <label class="control-label">
                                        Tipo de Acción                                 
                                        <span class="symbol required"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="idTipoAccionCheckReplicar" type="checkbox">
                                        </span>
                                        <select  id="idTipoAccionReplicar" name="idTipoAccionReplicar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 35px;">     
                                            <option value="">Seleccione</option> 
                                            <?php
                                            $tipoAccionReplicar = new TipoAccion();
                                            $tiposAccionReplicar = $tipoAccionReplicar->findAll();
                                            foreach ($tiposAccionReplicar as $value) {
                                                ?> 

                                                <option value="<?php echo $value->id_tipo_accion; ?>" title="<?php echo $value->nombre; ?>">
                                                    <?php
                                                    echo $value->nombre;
                                                }
                                                ?> 
                                            </option> 
                                        </select> 
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">

                                <div id="nombreUsuarioError" class="form-group">
                                    <label class="control-label">
                                        Acción                                 
                                        <span class="symbol required"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="accionCheckReplicar" type="checkbox">
                                        </span>
                                        <input id="accionReplicar" class="form-control"/>             
                                    </div>


                                </div>

                            </div>
                            <div class="col-md-4">

                                <div id="nombreUsuarioError" class="form-group">
                                    <label class="control-label">
                                        <abbr title="Indicador de Riesgo" data-toggle="tooltip">KRI</abbr>                                 
                                        <span class="symbol required"></span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input id="indicadorRiesgoCheckReplicar" type="checkbox">
                                        </span>
                                        <input id="indicadorRiesgoReplicar" class="form-control"/>      
                                    </div>


                                </div>

                            </div>
                            <div class="col-md-1 no-padding" style="margin-top: 23px;">
                                <div id="nombreUsuarioError" class="form-group" >                            
                                    <button  onclick="" id="replicar" class="btn btn-blue"><i class="fa fa-refresh"></i> Replicar</button>                                    
                                </div>

                            </div>
                            <div class="col-md-12 no-padding-left">
                                <div class="alert">
                                    <span class="label label-info">NOTA!</span>
                                    <span> Seleccione el campo que desea replicar en la tabla de riesgos. </span>
                                </div>
                            </div>



                        </div>
                    </div><!-- /.box-body -->
                </div>
                <!--Filtro Avanzado-->
                <div id="busquedaAvanzadaDiv" class="box box-primary" style="display: none">
                    <div class="box-header">
                        <h3 class="box-title">Búsqueda Avanzada</h3>
                    </div>
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Unidad(es) de Negocio
                                    </label>
                                    <select  id="unidadNegocioSearch" name="unidadNegocioSearch[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelUnidadNegocio = new UnidadNegocio();
                                        $unidadesNegocio = $modelUnidadNegocio->findAll();
                                        foreach ($unidadesNegocio as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_unidad_negocio; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Macroproceso(s)
                                    </label>
                                    <select  id="macroprocesoSearch" name="macroprocesoSearch[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelMacroproceso = new Macroproceso();
                                        $macroprocesos = $modelMacroproceso->findAll();
                                        foreach ($macroprocesos as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_macroproceso; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Proceso(s)
                                    </label>
                                    <select  id="procesoSearch" name="procesoSearch[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelProceso = new Proceso();
                                        $procesos = $modelProceso->findAll();
                                        foreach ($procesos as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_proceso; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                      
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Tipo de Pérdida
                                    </label>
                                    <select  id="tipoPerdidaSearch" name="tipoPerdidaSearch" class="js-example-basic-single" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelTipoPerdida = new TipoPerdida();
                                        $tiposPerdida = $modelTipoPerdida->findAll();
                                        foreach ($tiposPerdida as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_perdida; ?>" title="">
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

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Grupo de Riesgo
                                    </label>
                                    <select  id="idGrupoRiesgoSearch" name="idGrupoRiesgoSearch" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option>  
                                        <?php
                                        $modelTipoRiesgo = new TipoRiesgo();
                                        $tiposRiesgo = $modelTipoRiesgo->findAll();
                                        foreach ($tiposRiesgo as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_riesgo; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                       
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Tipo de Riesgo
                                    </label>
                                    <select  id="idTipoRiesgoSearch" name="idTipoRiesgoSearch" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">     
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelTipoRiesgo = new TipoRiesgo();
                                        $tiposRiesgo = $modelTipoRiesgo->findAll();
                                        foreach ($tiposRiesgo as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_riesgo; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                       
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Tipo(s) de Causa
                                    </label>
                                    <select  id="idTipoCausaSearch" name="idTipoCausaSearch[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelTipoCausa = new TipoCausa();
                                        $tiposCausa = $modelTipoCausa->findAll();
                                        foreach ($tiposCausa as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_tipo_causa; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                       
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">
                                        Causa(s)
                                    </label>
                                    <select  id="causaSearch" name="causaSearch[]" class="js-example-basic-multiple" multiple="multiple" tabindex="1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option value="">Seleccione</option> 
                                        <?php
                                        $modelCausa = new Causa();
                                        $causas = $modelCausa->findAll();
                                        foreach ($causas as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_causa; ?>" title="">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>                       
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-blue pull-right" type="submit" id="busquedaAvanzada"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Buscar</button>
                            </div>
                        </div>


                    </div>
                </div><!-- /.box-body -->
                <div class="col-md-12">
                    <!--<button  id="check_all" class="" type="submit"><span aria-hidden="true" class="glyphicon glyphicon-search"></span> Chequear todos</button>-->
                    <table id="tablaRiesgos" class="table table-bordered table-striped">
                        <thead class="label-grey text-white center">
                            <tr>
                                <!--<th style="width:1% !important;"></th>-->
                                <th width="5%;" > <input type="checkbox" id="check_all" onchange="checkAll()" value="0" /></th>
                                <th width="10%" >Código</th>
                                <th>Riesgo</th>
                                <th>Tipo de Acción</th>
                                <th>Acción</th>
                                <th> <abbr title="Indicador de Riesgo" data-toggle="tooltip">KRI</abbr></th>
                                <th>ID Riesgo</th>
                                <th>Estado</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody class="center">



                            <?php
                            foreach ($riesgos as $value) {
                                ?> 
                                <tr>
                                    <td width="5%;">
                                        <!--<input type="checkbox" class="minimal"/>-->
                                        <input type="checkbox" class="activar-tex"/>
                                        <!--<input type="checkbox" value="true" checked="checked"/>  checked box -->
                                    </td>
                                    <td width="10%"><?php echo $value->codigo; ?></td>
                                    <td><?php echo $value->nombre; ?></td>
                                    <td><?php
                                        if ($value->id_tipo_accion != null) {
                                            echo $value->idTipoAccion->nombre;
                                        } else {
                                            echo "";
                                        }
                                        ?></td>
                                    <td><?php echo $value->accion; ?></td>
                                    <td><?php echo $value->indicador_riesgo; ?></td>
                                    <td><?php echo $value->id_riesgo; ?></td>
                                    <td><?php
                                        if ($value->estado == 1) {
                                            echo "Activo";
                                        } else {
                                            echo "Inactivo";
                                        }
                                        ?></td>

                                    <td class="center">
                                        <div class="visible-lg hidden-sm hidden-xs">
                                            <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                <a title=""  data-placement="top" class="btn btn-xs btn-green"   href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/update&id_riesgo=<?php echo $value->id_riesgo; ?>"> <i class="fa fa-edit fa fa-white"></i></a> 
                                            </div> 

                                            <?php
                                            if ($value->estado == 1) {
                                                ?>
                                                <div id="inhabilitarRiesgo1" title="Inhabilitar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                    <a id="inhabilitarRiesgo" title=""  data-placement="top" class="btn btn-xs btn-red tooltips inhabilitar"   data-target="#"> <i class="fa fa-check-square-o"></i></a>    
                                                </div>
                                                <div id="habilitarRiesgo1" title="Habilitar" data-toggle="tooltip" class="no-padding" style="display:none;" >
                                                    <a id="habilitarRiesgo" title=""  data-placement="top" class="btn btn-xs btn-light-grey tooltips habilitar"   data-target="#"> <i class="fa fa-square-o"></i></a>    
                                                </div>

                                                <?php
                                            } else {
                                                ?>
                                                <div id="inhabilitarRiesgo1" title="Inhabilitar" data-toggle="tooltip" class="no-padding" style="display:none;" >
                                                    <a id="inhabilitarRiesgo" title=""  data-placement="top" class="btn btn-xs btn-red tooltips inhabilitar"   data-target="#"> <i class="fa fa-check-square-o"></i></a>    
                                                </div>
                                                <div id="habilitarRiesgo1" title="Habilitar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                    <a id="habilitarRiesgo" title=""  data-placement="top" class="btn btn-xs btn-light-grey tooltips habilitar"   data-target="#"> <i class="fa fa-square-o"></i></a>    
                                                </div>

                                                <?php
                                            }
                                            ?>
                                            <div title="Ver detalles" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                <a title=""  data-placement="top" class="btn btn-xs btn-info tooltips delete"  href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/view&id_riesgo=<?php echo $value->id_riesgo; ?>"> <i class="fa fa-info-circle fa fa-white"></i></a>    
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



<script type="text/javascript">
    $(document).ready(function() {     
        $("#planAccionBoton").click(function() {

            $("#indicadorRiesgoReplicar").val("");
            $("#accionReplicar").val("");
            $("#planAccion").toggle();
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#busquedaAvanzadaBoton").click(function() {

            //falta reiniciar los selectores

            $("#busquedaAvanzadaDiv").toggle();
        });
    });
</script>

<script type="text/javascript">
    function checkAll() {
        if ($("#check_all").val() == 0) {

            $('input:checkbox', $('#tablaRiesgos')).each(function() {
                $(this).prop('checked', true).val();
            });
            $("#check_all").val(1);
        }
        else {
            $('input:checkbox', $('#tablaRiesgos')).each(function() {
                $(this).prop('checked', false);
            });
            $("#check_all").checked;
            $("#check_all").val(0);
        }
    }
</script>



<script type="text/javascript">
    $(document).ready(function() {
        var tablaRiesgos = $('#tablaRiesgos').dataTable({
            "bSort": true,
            "bFilter": true,
            "bInfo": false,
            "bPaginate": false,
            "columnDefs": [
                {"visible": false, "targets": 6},
            ],
        });

        $('#replicar').click(function() {
            $('input:checked', tablaRiesgos.fnGetNodes()).each(function() {
                var rowIndex = tablaRiesgos.fnGetPosition($(this).closest('tr')[0]);
                var idRiesgo = tablaRiesgos.fnGetData(rowIndex);
                var idTipoAccion = "";
                var accion = "";
                var indicadorRiesgo = "";
                if ($("#idTipoAccionCheckReplicar").prop('checked')) {
//idTipoAccion = $("#idTipoAccionReplicar").val();
                    if ($("#idTipoAccionReplicar").val() != "") {
                        idTipoAccion = $("#idTipoAccionReplicar").val();
                    }
                    else {
                        idTipoAccion = "0";
                    }

                }
                if ($("#accionCheckReplicar").prop('checked')) {
                    if ($("#accionReplicar").val() != "") {
                        accion = $("#accionReplicar").val();
                    }
                    else {
                        accion = "0";
                    }

                }
                if ($("#indicadorRiesgoCheckReplicar").prop('checked')) {

                    if ($("#indicadorRiesgoReplicar").val() != "") {
                        indicadorRiesgo = $("#indicadorRiesgoReplicar").val();
                    }
                    else {
                        indicadorRiesgo = "0";
                    }
                }

                var $params = {'tipoAccion': idTipoAccion, 'accion': accion, 'indicadorRiesgo': indicadorRiesgo, 'idRiesgo': idRiesgo[6]};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/replicarCampos' ?>',
                    type: 'POST',
                    data: $params,
                    success: function(data) {

                        if ($("#idTipoAccionCheckReplicar").prop('checked')) {
                            tablaRiesgos.fnUpdate(data, rowIndex, 3);
                        }


                        if ($("#accionCheckReplicar").prop('checked')) {
                            if ($("#accionReplicar").val() != "") {
                                tablaRiesgos.fnUpdate($("#accionReplicar").val(), rowIndex, 4);
                            }
                            else {
                                tablaRiesgos.fnUpdate("", rowIndex, 4);
                            }
                        }
                        if ($("#indicadorRiesgoCheckReplicar").prop('checked')) {
                            if ($("#indicadorRiesgoReplicar").val() != "") {
                                tablaRiesgos.fnUpdate($("#indicadorRiesgoReplicar").val(), rowIndex, 5);
                            }
                            else {
                                tablaRiesgos.fnUpdate("", rowIndex, 5);
                            }

                        }



                    }
                });

                tablaRiesgos.fnDraw;
            });
        });
        tablaRiesgos.$('a.btn.btn-xs.btn-red.tooltips.inhabilitar').on('click', function(e) {
            e.preventDefault();
            var rowIndex = tablaRiesgos.fnGetPosition($(this).closest('tr')[0]);
            var idRiesgo = tablaRiesgos.fnGetData(rowIndex, 6);
            var $params = {'idRiesgo': idRiesgo};
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/inhabilitar' ?>',
                type: 'POST',
                data: $params,
                success: function() {
                    tablaRiesgos.fnUpdate("Inactivo", rowIndex, 7);

                }
            });
            $("#inhabilitarRiesgo1").toggle();
            $("#habilitarRiesgo1").toggle();

        });
        tablaRiesgos.$('a.btn.btn-xs.btn-light-grey.tooltips.habilitar').on('click', function(e) {
            e.preventDefault();
            var rowIndex = tablaRiesgos.fnGetPosition($(this).closest('tr')[0]);
            var idRiesgo = tablaRiesgos.fnGetData(rowIndex, 6);
            var $params = {'idRiesgo': idRiesgo};
            $.ajax({
                url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/habilitar' ?>',
                type: 'POST',
                data: $params,
                success: function() {
                    tablaRiesgos.fnUpdate("Activo", rowIndex, 7);
                }
            });
            $("#habilitarRiesgo1").toggle();
            $("#inhabilitarRiesgo1").toggle();

        });

    });


</script>

<script type="text/javascript">
    $(document).ready(function() {
        var tablaRiesgos = $('#tablaRiesgos').dataTable();
        $("#busquedaAvanzada").click(function() {

            var rows = tablaRiesgos.fnGetNodes();
            var j = 0;
            for (var i = 0; i < rows.length; i++) {

                var rowIndex = tablaRiesgos.fnGetPosition($(rows[i]).closest('tr')[0]);

                var idRiesgo = tablaRiesgos.fnGetData(rowIndex)[6];
                var $parametros = {'unidadNegocio': $("#unidadNegocioSearch").val(), 'grupoRiesgo': $("#idGrupoRiesgoSearch").val(), 'tipoRiesgo': $("#idTipoRiesgoSearch").val(), 'tipoCausa': $("#idTipoCausaSearch").val(), 'macroproceso': $("#macroprocesoSearch").val(), 'proceso': $("#procesoSearch").val(), 'tipoPerdida': $("#tipoPerdidaSearch").val(), 'causa': $("#causaSearch").val(), 'idRiesgo': idRiesgo};
                $.ajax({
                    url: '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=InventarioRiesgo/riesgo/busquedaAvanzada' ?>',
                    type: 'POST',
                    data: $parametros,
                    success: function(data) {
                        if (data === "si") {
                            $(rows[j]).hide();
                        } else {
                            $(rows[j]).show();
                        }

                        j++;
                    }
                });

            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var tablaRiesgos = $('#tablaRiesgos').dataTable();
        tablaRiesgos.on('change', 'input.activar-tex', function() {
            $("#check_all").prop('checked', false);
        });

    });
</script>
