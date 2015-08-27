<?php
Yii::import('application.modules.Configuracion.models.Empresa');
Yii::import('application.modules.Configuracion.models.Usuario');
Yii::import('application.modules.ProcesosEstrategias.models.Dimension');
Yii::import('application.modules.ProcesosEstrategias.models.Proceso');
Yii::import('application.modules.ProcesosEstrategias.models.ObjetivoEstrategico');
Yii::import('application.modules.ProcesosEstrategias.models.Macroproceso');
Yii::import('application.modules.Configuracion.models.UnidadNegocio');
Yii::import('application.modules.GradoMadurez.models.ResultadoCuestionario');
?>
<!-- start: PAGE HEADER -->
<!-- start: TOOLBAR -->
<style>
    [class^="icheckbox_"], [class*="icheckbox_"]{
        float: none;
        margin: 0 0 0 5px !important;
    }
     .content-wrapper{
       min-height:1024px !important;
    }
</style>
<div class="toolbar row">
    <div class="toolbar ">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>
                    Grado  de Madurez: Revisar Cuestionario <br>
                    <?php
                    $user = new Usuario();
                    $usuario = $user->findByPk(Yii::app()->user->id);

                    $unidadNegocioEditar = new UnidadNegocio();
                    $unidadNegocioEditar = $unidadNegocioEditar->findByAttributes(array('id_unidad_negocio' => $id));

                    $respuestaCuestionario = new ResultadoCuestionario();
                    $respuestaCuestionario = $respuestaCuestionario->findByAttributes(array('id_unidad_negocio' => $id));

                    $arreglorDeRespuesta = json_decode($respuestaCuestionario->arreglo_respuestas_preguntas_especificas);


                    $grupoPreguntasAUX = new GrupoPreguntas();
                    $grupoPreguntasAUX = $grupoPreguntasAUX->findAll();
                    $listaGrupoCuentasArreglado;
                    $preguntaEspesifica = new PreguntaEspecifica();
                    $preguntasEspesificas = $preguntaEspesifica->findAll();
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
                    <li class="active">Grado de Madurez</li>
                </ol>
                <!-- end: TOP NAVIGATION MENU -->
            </div>
        </div>
    </div>
</div>
<div class="row padding-5" style="margin-top: 20px;">
    <div class="col-md-12 no-padding">
        <!-- start: FORM WIZARD PANEL -->
        <div class="panel panel-white">
            <div class="panel-body">
                <form novalidate="novalidate" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/verEvaluacionCuestionario' ?>" role="form" method="post" class="smart-wizard form-horizontal" id="form">
                    <div id="wizard" class="swMain">
                        <ul class="anchor">
                            <li>
                                <a rel="1" class="selected" href="#step-1" id="1">
                                    <div class="stepNumber">
                                        1
                                    </div>
                                    <span class="stepDesc"> 1
                                        <br>
                                        <small>Datos del  Cuestionario</small> </span>
                                </a>
                            </li>
                            <li>
                                <a rel="2" class="selected" href="#step-2" id="2">
                                    <div class="stepNumber">
                                        2
                                    </div>
                                    <span class="stepDesc"> 2
                                        <br>
                                        <small>Grupo de Preguntas</small> </span>
                                </a>
                            </li>
                            <li>
                                <a rel="3" class="disabled" href="#step-3" id="3">
                                    <div class="stepNumber">
                                        3
                                    </div>
                                    <span class="stepDesc"> 3
                                        <br>
                                        <small>Evaluación</small> </span>
                                </a>
                            </li>

                        </ul>
                        <div style="height: 357px;" class="stepContainer"><div class="progress progress-xs transparent-black no-radius active ">
                                <div id="barraProgress" style="width: 66.6%;" aria-valuemax="100" aria-valuemin="0"  role="progressbar" class="progress-bar partition-green step-bar">
                                    <!--<span class="sr-only"> 0% Complete (success)</span>-->
                                </div>
                            </div>
                            <div style="display: block;" class="content" id="step-3" >
                                <h2 class="StepTitle">Cuestionario</h2>
                                <br>

                                <table id="tablaSeleccionarGrupoPreguntas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Grupo de Preguntas</th>
                                            <th>ID Pregunta Especifica</th>
                                            <th>Pregunta Madre</th>     
                                            <th>Cumplimiento</th>    
                                            <th>IDPreguntaMadre</th>
                                            <th>Pregunta</th>                                   
                                            <th>Respuestas</th>                                    

                                        </tr>
                                    </thead>

                                    <tbody class="text-center">
                                        <?php
                                        $preguntaEspesifica = new PreguntaEspecifica();
                                        $preguntasEspesificas = $preguntaEspesifica->findAll();
                                        $count = 0;

                                        foreach ($preguntasEspesificas as $value) {
                                            ?>

                                            <tr id="tr<?php echo $count; ?>">
                                                <td id="gp<?php echo $count; ?>">
                                                    <?php
                                                    $grupo = new GrupoPreguntas();
                                                    $grupos = $grupo->findByAttributes(array('id_grupo_preguntas' => $value->idPreguntaMadre->id_grupo_preguntas));
                                                    echo $grupos->nombre;
                                                    ?>      
                                                </td>

                                                <td id="pe<?php echo $count; ?>">
                                                    <?php echo $value->id_pregunta_especifica; ?>                
                                                </td>
                                                <td id="pm<?php echo $count; ?>">
                                                    <?php echo $value->idPreguntaMadre->nombre ?>  
                                                </td>

                                                <td id="c<?php echo $count; ?>">
                                                    <?php echo $value->complimiento ?>                
                                                </td>

                                                <td id="idpm<?php echo $count; ?>">
                                                    <?php echo $value->id_pregunta_madre ?>                    
                                                </td>
                                                <td id="p<?php echo $count; ?>">
                                                    <?php echo $value->pregunta ?>                
                                                </td>
                                                <td class="center">
                                                    <div class="form-group">
                                                        <table style="margin-left: 50%; font-size: 12px;">
                                                            <?php
                                                            if ($arreglorDeRespuesta[$count] == 0) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <label style="margin-left: 30px" >
                                                                            <input type="radio" id="s<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio"> Si</span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="p<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio"> Parcial </span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="n<?php echo $count; ?>"  name="radio<?php echo $count; ?>" class="minimal"  checked />
                                                                            <span id="label-radio" name="label-radio">  No </span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            <?php } else if ($arreglorDeRespuesta[$count] == 1) { ?> 
                                                                <tr>
                                                                    <td>
                                                                        <label style="margin-left: 30px" >
                                                                            <input type="radio" id="s<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio"> Si</span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="p<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" checked />
                                                                            <span id="label-radio" name="label-radio"> Parcial </span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="n<?php echo $count; ?>"  name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio">  No </span>
                                                                        </label>
                                                                    </td>
                                                                </tr> 
                                                            <?php } else { ?>
                                                                <tr>
                                                                    <td>
                                                                        <label style="margin-left: 30px" >
                                                                            <input type="radio" id="s<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" checked />
                                                                            <span id="label-radio" name="label-radio"> Si</span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="p<?php echo $count; ?>" name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio"> Parcial </span>
                                                                        </label>
                                                                    </td>
                                                                    <td>
                                                                        <label style="margin-left: 30px">
                                                                            <input type="radio" id="n<?php echo $count; ?>"  name="radio<?php echo $count; ?>" class="minimal" disabled/>
                                                                            <span id="label-radio" name="label-radio">  No </span>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        </table>
                                                    </div>
                                                </td>
                                                <?php
                                                $count = $count + 1;
                                            }
                                            ?>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Grupo de Preguntas</th>
                                            <th>ID Pregunta Especifica</th>
                                            <th>Pregunta Madre</th>
                                            <th>Cumplimiento</th>    
                                            <th>IDPreguntaMadre</th>
                                            <th>Pregunta</th>                                   
                                            <th>Respuestas</th>                                    
                                        </tr> 
                                    </tfoot>
                                </table>



                                <div style="display: none" id="enviarFormulario"></div>
                                <div class="row">
                                    <div class="pull-right padding-horizontal-15">
                                        <button type="button" id="seguir3" class="btn btn-cancel next-step btn-block" style="width: 300px" >Evaluacion <i class="fa fa-check-circle"></i></button>
                                    </div>
                                </div>

                            </div>

                            <table id="idPEspesifica" class="table table-bordered table-striped" style="visibility: hidden">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID Pregunta Especifica</th>
                                    </tr>
                                </thead>

                                <tbody class="text-center">
                                    <?php
                                    $preguntaEspesifica = new PreguntaEspecifica();
                                    $preguntasEspesificas = $preguntaEspesifica->findAll();
                                    $countador = 0;
                                    foreach ($preguntasEspesificas as $value) {
                                        ?> 
                                        <tr id="trr<?php echo $countador; ?>">
                                            <td id="pespesifica<?php echo $countador; ?>">
                                                <?php echo $value->id_pregunta_especifica; ?>                
                                            </td>
                                            <?php
                                            $countador = $countador + 1;
                                        }
                                        ?>
                                    </tr>

                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>ID Pregunta Especifica</th>

                                    </tr> 
                                </tfoot>
                            </table>

                        </div>

                    </div>
                    <!-- end: FORM WIZARD PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
        <script type="text/javascript">

            $(document).ready(function() {
                //Inicializacion del datatable de MACROPROCESO
                //begin

                var filterPE = false;
                var paginatePE = false;
                var cantidadPE = <?php echo count($grupoPreguntasAUX); ?>;
                cantidadPE = parseInt(cantidadPE);
                if (cantidadPE > 1) {
                    filterPE = true;
                }
                if (cantidadPE > 10) {
                    paginatePE = true;
                }
                var tablaSeleccionarGrupoPreguntas = $('#tablaSeleccionarGrupoPreguntas').dataTable({
                    "bFilter": true,
                    "bInfo": false,
                    "bJQueryUI": true,
                    "bPaginate": false,
                    "columnDefs": [
                        {"visible": false, "targets": 1},
                        {"visible": false, "targets": 3},
                        {"visible": false, "targets": 4},
                    ],
                }).columnFilter({
                    aoColumns: [{type: "select"},
                        null,
                        null,
                        null,
                        null,
                        null
                    ]

                });
            });
            // Sometime later - filter...

        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#seguir3").click(function() {
                    var cantidadPreguntas = <?php echo count($preguntasEspesificas); ?>;
                    var contador = 0;
                    var todosSeleccionados = true;
                    var arregloPERespuesta = new Array();//arreglo  de las respuestas
                    //Cambiar color a las celdas
//                    for (var i = 0; i < cantidadPreguntas; i++) {
//                        if (!$('input:radio[id=s' + i + ']:checked').val()) {
//                            if (!$('input:radio[id=n' + i + ']:checked').val()) {
//                                if (!$('input:radio[id=p' + i + ']:checked').val()) {
//                                    document.getElementById('tr' + i).style.backgroundColor = "#F7CFCF";
//                                    //                                    document.getElementById('tr' + i).style.color = "#fff";
//                                    todosSeleccionados = false;
//                                }
//                            }
//                        }
//                        if ($('input:radio[id=s' + i + ']:checked').val()) {
//                            document.getElementById('tr' + i).style.backgroundColor = "#FFFFFF";
//                        }
//                        if ($('input:radio[id=p' + i + ']:checked').val()) {
//                            document.getElementById('tr' + i).style.backgroundColor = "#FFFFFF";
//                        }
//                        if ($('input:radio[id=n' + i + ']:checked').val()) {
//                            document.getElementById('tr' + i).style.backgroundColor = "#FFFFFF";
//                        }
//                    }
                    //Calcular el  total  de los puntos
                    for (var i = 0; i < cantidadPreguntas; i++) {

                        if ($('input:radio[id=s' + i + ']:checked').val())
                        {
                            contador = contador + 2;
                            arregloPERespuesta[i] = 2;
                        } else
                        if ($('input:radio[id=p' + i + ']:checked').val())
                        {
                            contador = contador + 1;
                            arregloPERespuesta[i] = 1;
                        } else
                        if ($('input:radio[id=n' + i + ']:checked').val())
                        {
                            contador = contador + 0;
                            arregloPERespuesta[i] = 0;
                        } else {
                            arregloPERespuesta[i] = -1;
                        }
                    }
                    var evaluacionCompleta = new Array();
                    evaluacionCompleta[0] = contador;//tanto
                    evaluacionCompleta[1] = cantidadPreguntas * 2;//de tanto
                    var arregloPE = new Array();//arreglo  de preguntas espeficicas lleno  completo
                    var grupoP = new Array();
                    var cantidadGruposP = <?php echo count($grupoPreguntasAUX); ?>;
                    //arreglo  de preguntas

                    for (var i = 0; i < cantidadPreguntas; i++) {

                        var aux = document.getElementById('pespesifica' + i).innerHTML;
                        arregloPE[i] = aux.replace(/\s+/g, '');
                    }

                    //arreglo de grupo  de preguntas
                    for (var i = 0; i < cantidadPreguntas; i++) {
                        var aux = document.getElementById('gp' + i).innerHTML;
                        grupoP[i] = aux.replace(/\s+/g, '');
                    }

                    grupoP = array_unique(grupoP); //mi  arreglo  de grupos
                    var arregloCantidadPorGrupos = {}; //mi  arreglo  de cantidades
                    var arregloCantidadTotalPorGrupos = {}; //mi  arreglo  de cantidades
                    var contador = 0;
                    for (var i = 0; i < grupoP.length; i++) {
                        arregloCantidadPorGrupos[i] = dameEvaluacionParaEsteGrupo(grupoP[i]);
                        arregloCantidadTotalPorGrupos[i] = dameEvaluacionTotalParaEsteGrupo(grupoP[i]);
                    }

                    //armando mi  formulario
                    var url = '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/evaluacionCuestionario' ?>';
                    var form = '<form action="' + url + '" method="post">';
                    var input = '';
                    var todaslaspreguntas = '';
                    for (var i = 0; i < grupoP.length; i++) {
                        input = input + '<input type="text" name="ngp' + i + '" value="' + grupoP[i] + '" /><input type="text" name="vgp' + i + '" value="' + arregloCantidadPorGrupos[i] + '" /><input type="text" name="cTgp' + i + '" value="' + arregloCantidadTotalPorGrupos[i] + '" />'

                        if (i == grupoP.length - 1) {
                            for (var e = 0; e < cantidadPreguntas; e++) {
                                todaslaspreguntas = todaslaspreguntas + '<input type="text" name="tp' + e + '" value="' + arregloPE[e] + '" /><input type="text" name="tpr' + e + '" value="' + arregloPERespuesta[e] + '" />';
                            }
                        }
                    }
                    var cantidad = '<input type="text"  name="cantidad" " value="' + grupoP.length + '" />';
                    var tanto = '<input type="text" name="totalPreguntasValor" value="' + evaluacionCompleta[0] + '" />';
                    var detanto = '<input type="text" name="totalPreguntasCantidad" value="' + evaluacionCompleta[1] + '" />';
                    var numeroPreguntas = '<input type="text" name="numeroPreguntas" value="' + cantidadPreguntas + '" />';
                    var un = '<input type="text" name="un" value="' + <?php echo $_GET['idUN']; ?> + '" />';

                    var cerrarForm = '</form>';
                    var enviar = form + input + cantidad + tanto + numeroPreguntas + detanto + todaslaspreguntas + un + cerrarForm;
                    $('#enviarFormulario').html(enviar);
                    if (todosSeleccionados) {
                        document.getElementById("form").submit();
                    }
                    //evaluacion de un grupo 
                    function dameEvaluacionParaEsteGrupo(grupo) {
                        var retornar = 0;
                        for (var i = 0; i < cantidadPreguntas; i++) {
                            if ($('input:radio[id=s' + i + ']:checked').val()) {
                                var aux = document.getElementById('gp' + i).innerHTML;
                                aux = aux.replace(/\s+/g, '');
                                if (aux == grupo) {
                                    retornar = retornar + 2;
                                }
                            }
                            if ($('input:radio[id=p' + i + ']:checked').val())
                            {
                                var aux = document.getElementById('gp' + i).innerHTML;
                                aux = aux.replace(/\s+/g, '');
                                if (aux == grupo) {
                                    retornar = retornar + 1;
                                }
                            }
                        }
                        return retornar;
                    }
                    function dameEvaluacionTotalParaEsteGrupo(grupo) {
                        var retornar = 0;
                        for (var i = 0; i < cantidadPreguntas; i++) {

                            if ($('input:radio[id=s' + i + ']:checked').val()) {
                                var aux = document.getElementById('gp' + i).innerHTML;
                                aux = aux.replace(/\s+/g, '');
                                if (aux == grupo) {
                                    retornar = retornar + 1;
                                }
                            }
                            if ($('input:radio[id=p' + i + ']:checked').val())
                            {
                                var aux = document.getElementById('gp' + i).innerHTML;
                                aux = aux.replace(/\s+/g, '');
                                if (aux == grupo) {
                                    retornar = retornar + 1;
                                }
                            }
                            if ($('input:radio[id=n' + i + ']:checked').val())
                            {
                                var aux = document.getElementById('gp' + i).innerHTML;
                                aux = aux.replace(/\s+/g, '');
                                if (aux == grupo) {
                                    retornar = retornar + 1;
                                }
                            }
                        }
                        return retornar * 2;
                    }

//valores unicos en los arreglos
                    function  array_unique(ar) {
                        var sorter = {};
                        for (var i = 0, j = ar.length; i < j; i++) {
                            sorter[ar[i]] = ar[i];
                        }
                        ar = [];
                        for (var i  in  sorter) {
                            ar.push(i);
                        }
                        return  ar;
                    }
                });
            });
            $(document).ready(function() {
                $(".js-example-basic-single").select2();
            });
        </script>

