<?php
$cantidad = $_POST['cantidad'];
$numeroPreguntas = $_POST['numeroPreguntas'];

$cantidadPreguntas = $_POST['totalPreguntasCantidad'];
$evaluacion = $_POST['totalPreguntasValor'];
$un = $_POST['un'];

echo $un;
$arregloNombres = [];
$arregloValores = [];
$todosIDPreguntas = [];
$todasRespuestasPreguntas = [];
$arregloTotalValores = [];
for ($index = 0; $index < $cantidad; $index++) {
    $arregloNombres[$index] = $_POST['ngp' . $index];
    $arregloValores[$index] = $_POST['vgp' . $index];
    $arregloTotalValores[$index] = $_POST['cTgp' . $index];
}

for ($index = 0; $index < $numeroPreguntas; $index++) {
    $todosIDPreguntas[$index] = (int) $_POST['tp' . $index];
    $todasRespuestasPreguntas[$index] = (int) $_POST['tpr' . $index];
}

for ($index1 = 0; $index1 < count($arregloNombres); $index1++) {
    if ($arregloNombres[$index1] == 'DISPOSICIONESSOBRESERVICIOSPROVISTOSPORTERCEROS') {
        $arregloNombres[$index1] = 'DISPOSICIONES SOBRE SERVICIOS PROVISTOS POR TERCEROS';
    }
    if ($arregloNombres[$index1] == 'RESPONSABILIDADESENLAADMINISTRACIÓNDELRIESGOOPERATIVO') {
        $arregloNombres[$index1] = 'RESPONSABILIDADES EN LA ADMINISTRACIÓN DEL RIESGO OPERATIVO';
    }
    if ($arregloNombres[$index1] == 'CONTINUIDADDELNEGOCIO') {
        $arregloNombres[$index1] = 'CONTINUIDAD DEL NEGOCIO';
    }
    if ($arregloNombres[$index1] == 'ADMINISTRACIÓNDELRIESGOOPERATIVO') {
        $arregloNombres[$index1] = 'ADMINISTRACIÓN DEL RIESGO OPERATIVO';
    }

    if ($arregloNombres[$index1] == 'TECNOLOGÍADEINFORMACIÓN') {
        $arregloNombres[$index1] = 'TECNOLOGÍA DE INFORMACIÓN';
    }
}
//GUARDANDO  TODOS LOS DATOS DEL  CUESTIONARIO 
$resutadoCuestionario = new ResultadoCuestionario();
$resutadoCuestionario->id_cuestionario = 2;
$resutadoCuestionario->id_unidad_negocio = (int) $un;
$resutadoCuestionario->arreglo_id_preguntas_especificas = json_encode($todosIDPreguntas);
$resutadoCuestionario->arreglo_respuestas_preguntas_especificas = json_encode($todasRespuestasPreguntas);
$resutadoCuestionario->arreglo_nombre_grupos_preguntas = json_encode($arregloNombres);
$resutadoCuestionario->arreglo_valores_posibles_preguntas = json_encode($arregloTotalValores);
$resutadoCuestionario->arreglo_valores_obtenidos = json_encode($arregloValores);
$resutadoCuestionario->save();
?>
<?php
Yii::import('application.modules.Configuracion.models.Empresa');
Yii::import('application.modules.Configuracion.models.Usuario');
Yii::import('application.modules.ProcesosEstrategias.models.Dimension');
Yii::import('application.modules.ProcesosEstrategias.models.Proceso');
Yii::import('application.modules.ProcesosEstrategias.models.ObjetivoEstrategico');
Yii::import('application.modules.ProcesosEstrategias.models.Macroproceso');
Yii::import('application.modules.Configuracion.models.UnidadNegocio');
?>
<!-- start: PAGE HEADER -->
<!-- start: TOOLBAR -->

<div class="toolbar row">
    <div class="toolbar ">
        <div class="col-sm-6 hidden-xs">
            <div class="page-header">
                <h1>
                    Cuestionario: Grado de Madurez <br>
                    <?php
                    $user = new Usuario();
                    $usuario = $user->findByPk(Yii::app()->user->id);

                    $grupoPreguntasAUX = new GrupoPreguntas();
                    $grupoPreguntasAUX = $grupoPreguntasAUX->findAll();
                    $listaGrupoCuentasArreglado;
                    ?>
                    <small class="hidden-sm">Bienvenido a PROFIT : <a><i><?php echo $usuario->nombre; ?></i></a> </small>
                </h1>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">        
            <div class="toolbar-tools pull-right">
                <!-- start: TOP NAVIGATION MENU -->
                <ol class="breadcrumb">
                    <li><a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=site/index"><i class="fa fa-dashboard"></i> Inicio</a></li>
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
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <form novalidate="novalidate" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/evaluacionCuestionario' ?>" role="form" method="post" class="smart-wizard form-horizontal" id="form">
                    <div id="wizard" class="swMain">
                        <ul class="anchor">
                            <li>
                                <a rel="1" class="selected" href="#step-1" id="1">
                                    <div class="stepNumber">
                                        1
                                    </div>
                                    <span class="stepDesc"> 1
                                        <br>
                                        <small>Unidad de Negocio</small> </span>
                                </a>
                            </li>
                            <li>
                                <a rel="2" class="disabled" href="#step-2" id="2">
                                    <div class="stepNumber">
                                        2
                                    </div>
                                    <span class="stepDesc"> 2
                                        <br>
                                        <small>Responer Cuestionario</small> </span>
                                </a>
                            </li>
                            <li>
                                <a rel="3" class="disabled" href="#step-3" id="3">
                                    <div class="stepNumber">
                                        3
                                    </div>
                                    <span class="stepDesc"> 3
                                        <br>
                                        <small>Calificación</small> </span>
                                </a>
                            </li>
                        </ul>
                        <div style="height: 357px;" class="stepContainer"><div class="progress progress-xs transparent-black no-radius active ">
                                <div id="barraProgress" style="width: 100%;" aria-valuemax="100" aria-valuemin="0"  role="progressbar" class="progress-bar partition-green step-bar">
                                    <!--<span class="sr-only"> 0% Complete (success)</span>-->
                                </div>
                            </div>
                            <div style="display: block;" class="container" id="step-3" >
                                <h2 class="StepTitle" >Grado de Madurez</h2>

                                <div class="col-lg-12 col-md-12">
                                    <div class="row " data-toggle="modal" data-target="#leyendaModal">
                                        <div class="progress vertical">
                                            <p class="center"><i style="display: none; "  id="20" class="fa fa-arrow-circle-o-down fa-3x"></i></p>
                                            <div class="progress-bar panel-light-red" id="TH">
                                                <div class="panel-body padding-10 text-center">
                                                    <div class="space10">
                                                        <!--<h5 class="text-light semi-bold  p-b-5"><i class="fa fa-graduation-cap fa-2x"></i></h5>-->
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/evolution/w1.png" class="icon-tree"/>
                                                        <span class="text-white"><h4>Tribal Herórica</h4></span>
                                                        <div class="sparkline-5 space10">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <p class="text-justify" style="font-size: 10px;">
                                                                Ad hoc caótica; depende principalmente de actividades heróicas individuales, las capacidades y sabiduría verbal.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress vertical">
                                            <p class="center"><i style="display: none;"  id="40" class="fa fa-arrow-circle-o-down fa-3x"></i></p>
                                            <div class="progress-bar panel-red" id="E">
                                                <div class="panel-body padding-10 text-center">
                                                    <div class="space10">
                                                        <!--<h5 class="text-light semi-bold  p-b-5"><i class="fa fa-graduation-cap fa-2x"></i></h5>-->
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/evolution/w2.png" class="icon-tree"/>
                                                        <span class="text-white"><h4>Especillista Silos</h4></span>
                                                        <div class="sparkline-5 space10">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="text-justify no-padding-left" style="font-size: 10px;">
                                                                <li>
                                                                    Reacción al evento adverso por especialistas.
                                                                </li>
                                                                <li>
                                                                    Papeles discretos establecidos para pequeños conjuntos de riesgos.
                                                                </li>
                                                                <li>
                                                                    Normalmente las finanzas, los seguros, el cumplimiento.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress vertical">
                                            <p class="center"><i style="display: none"  id="60" class="fa fa-arrow-circle-o-down fa-3x"></i></p>
                                            <div class="progress-bar panel-green" id="V">
                                                <div class="panel-body padding-10 text-center" style="height:280px;">
                                                    <div class="space10">
                                                        <!--<h5 class="text-light semi-bold  p-b-5"><i class="fa fa-graduation-cap fa-2x"></i></h5>-->
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/evolution/w3.png" class="icon-tree"/>
                                                        <span class="text-white"><h4>Vertical</h4></span>
                                                        <div class="sparkline-5 space10">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="text-justify no-padding-left" style="font-size: 10px;">
                                                                <li>
                                                                    Las políticas, los procedimientos, las autoridades de riesgos definidos y comunicados.
                                                                </li>
                                                                <li>
                                                                    Función de negocio.
                                                                </li>
                                                                <li>
                                                                    Principalmente cualitativa.
                                                                </li>
                                                                <li>
                                                                    Reactivo.
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress vertical">
                                            <p class="center"><i style="display: none"  id="80" class="fa fa-arrow-circle-o-down fa-3x"></i></p>
                                            <div class="progress-bar panel-blue" id="S">
                                                <div class="panel-body padding-10 text-center" >
                                                    <div class="space10">
                                                        <!--<h5 class="text-light semi-bold  p-b-5"><i class="fa fa-graduation-cap fa-2x"></i></h5>-->
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/evolution/w4.png" class="icon-tree"/>
                                                        <span class="text-white"><h4>Sistematizado</h4></span>
                                                        <div class="sparkline-5 space10">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="text-justify no-padding-left" style="font-size: 10px;">
                                                                <li>
                                                                    Respuesta integrada a los eventos adversos.
                                                                </li>
                                                                <li>
                                                                    Métricas de rendimiento vinculadas.
                                                                </li>
                                                                <li>
                                                                    Rápida escalada.
                                                                </li>
                                                                <li>
                                                                    Transfromación cultural en curso.
                                                                </li>
                                                                <li>
                                                                    Sistema integral de control y gestión de riesgos. 
                                                                </li>
                                                                <li>Proactivo</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="progress vertical">
                                            <p class="center"><i style="display: none;"  id="100" class="fa fa-arrow-circle-o-down fa-3x"></i></p>
                                            <div class="progress-bar panel-dark-blue" id="GI" >
                                                <div class="panel-body padding-10 text-center" >
                                                    <div class="space10">
                                                        <!--<h5 class="text-light semi-bold  p-b-5"><i class="fa fa-graduation-cap fa-2x"></i></h5>-->
                                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/evolution/w5.png" class="icon-tree"/>
                                                        <span class="text-white"><h4>Gestión Inteligente</h4></span>
                                                        <div class="sparkline-5 space10">
                                                            <span></span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <ul class="text-justify no-padding-left" style="font-size: 10px;">
                                                                <li>
                                                                    Controbuye en la toma de decisiones.
                                                                </li>
                                                                <li>
                                                                    Interacciones de riesgos manejados con incentivos.
                                                                </li>
                                                                <li>
                                                                    Tema de riesgos inteligentes.
                                                                </li>
                                                                <li>
                                                                    Sostenible.
                                                                </li>
                                                                <li>
                                                                    La gestión de riesgos es de todos en el trabajo.
                                                                </li>
                                                                <li>Proactivo</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 no-padding-left">
                                            <div class="box">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Evaluación Final</h3>

                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="col-md-8" data-toggle="modal" data-target="#graficoModal" >
                                                            <div id="base_sombra"></div>
                                                            <div class="chart">
                                                                <!-- Sales Chart Canvas -->
                                                                <div id="grafica" >

                                                                </div>
                                                            </div><!-- /.chart-responsive -->
                                                        </div><!-- /.col -->
                                                        <div class="col-md-4 pull-right">
                                                            <div class="actual-date center">
                                                                <h3>
                                                                    Calificación Final:
                                                                    <br>
                                                                    <?php
                                                                    $unidad = new UnidadNegocio();
                                                                    $unidad = $unidad->findByAttributes(array('id_unidad_negocio' => $un));
                                                                    $unidad->evaluacion = (int) (($evaluacion / $cantidadPreguntas) * 100);
                                                                    $unidad->save();
                                                                    echo '<b>';
                                                                    echo $unidad->nombre;
                                                                    echo '</b>';
                                                                    ?>
                                                                </h3>
                                                                <span class="actual-day text-danger"><h1><b><?php echo $evaluacion; ?>/<?php echo $cantidadPreguntas; ?> ptos</b></h1></span><br>
                                                                <span class="actual-day text-danger"><?php echo (int) (($evaluacion / $cantidadPreguntas) * 100); ?>%</span>
                                                            </div>
                                                            <!--                                                            <h1>
                                                        </div><!-- /.col -->
                                                        </div><!-- /.row -->
                                                    </div><!-- ./box-body -->

                                                </div><!-- /.box -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div>
                                    <!--BEGIN LEYENDA-->
                                    <div class="modal fade" id="leyendaModal" role="dialog">
                                        <!--<div class="modal-dialog" style="width: 90%">-->
                                        <div class="modal-dialog  modal-lg">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header partition-green">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h3 class="no-margin"><i class="fa fa-graduation-cap"></i> Grado de Madurez</h3>
                                                </div>
                                                <div class="modal-body padding-10">
                                                    <img class="" width="100%" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/leyenda.jpg"/>
                                                </div>


                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--END-->
                                    <!--BEGIN LEYENDA-->
                                    <div class="modal fade" id="graficoModal" role="dialog">
                                        <!--<div class="modal-dialog" style="width: 90%">-->
                                        <div class="modal-dialog modal-lg" style="height:auto; ">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header partition-green">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h3 class="no-margin"><i class="fa fa-graduation-cap"></i> Gráfica por Grupo de Preguntas</h3>
                                                </div>
                                                <div class="modal-body padding-10">
                                                    <div class="chart center">
                                                        <!-- Sales Chart Canvas -->
                                                        <div id="grafica_modal" >

                                                        </div>
                                                    </div><!-- /.chart-responsive -->
                                                </div>


                                                <!--</form>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--END-->
                                </div>
                            </div>
                        </div>
                        <!-- end: FORM WIZARD PANEL -->
                    </div>
            </div>
            <!-- end: PAGE CONTENT-->

            <script type="text/javascript">
                $(function() {
                    var arregloNombres = {};
                    var cantidadNombres =<?php echo count($grupoPreguntasAUX); ?>

                    $('#grafica').highcharts({
                        chart: {
                            polar: true,
                            type: 'line'
                        },
                        title: {
                            text: '',
                            x: -80
                        },
                        pane: {
                            size: '90%'
                        },
                        xAxis: {
                            categories: (function() {
                                var data = [];
<?php
for ($i = 0; $i < count($arregloValores); $i++) {
    ?>
                                    data.push(['<?php echo $arregloNombres[$i]; ?>']);
<?php } ?>
                                return data;
                            })()
                            ,
                            tickmarkPlacement: 'on',
                            lineWidth: 0
                        },
                        yAxis: {
                            gridLineInterpolation: 'polygon',
                            lineWidth: 0,
                            min: 0
                        },
                        credits: {
                            enabled: false
                        },
                        tooltip: {
                            shared: true,
                            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                        },
                        legend: {
                            align: 'right',
                            verticalAlign: 'top',
                            y: 70,
                            layout: 'vertical'
                        },
                        series:
                                [{
                                        name: 'Obtenido',
                                        data: (function() {
                                            var data = [];
<?php
for ($i = 0; $i < count($arregloValores); $i++) {
    ?>
                                                data.push([<?php echo $arregloValores[$i]; ?>]);
<?php } ?>
                                            return data;
                                        })()
                                        ,
                                        pointPlacement: 'on'
                                    }
                                    , {
                                        name: 'Total',
                                        data: (function() {
                                            var data = [];
<?php
for ($i = 0; $i < count($arregloTotalValores); $i++) {
    ?>
                                                data.push([<?php echo $arregloTotalValores[$i]; ?>]);
<?php } ?>
                                            return data;
                                        })()
                                        ,
                                        pointPlacement: 'on'
                                    }]

                    });
                });</script>
            <script type="text/javascript">
                $(function() {
                    var arregloNombres = {};
                    var cantidadNombres =<?php echo count($grupoPreguntasAUX); ?>

                    $('#grafica_modal').highcharts({
                        chart: {
                            polar: true,
                            type: 'line'
                        },
                        title: {
                            text: '',
                            x: -80
                        },
                        pane: {
                            size: '100%'
                        },
                        xAxis: {
                            categories: (function() {
                                var data = [];
<?php
for ($i = 0; $i < count($arregloValores); $i++) {
    ?>
                                    data.push(['<?php echo $arregloNombres[$i]; ?>']);
<?php } ?>
                                return data;
                            })()
                            ,
                            tickmarkPlacement: 'on',
                            lineWidth: 0
                        },
                        yAxis: {
                            gridLineInterpolation: 'polygon',
                            lineWidth: 0,
                            min: 0
                        },
                        tooltip: {
                            shared: true,
                            pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                        },
                        credits: {
                            enabled: false
                        },
                        legend: {
                            align: 'right',
                            verticalAlign: 'top',
                            y: 70,
                            layout: 'vertical'
                        },
                        series:
                                [{
                                        name: 'Obtenido',
                                        data: (function() {
                                            var data = [];
<?php
for ($i = 0; $i < count($arregloValores); $i++) {
    ?>
                                                data.push([<?php echo $arregloValores[$i]; ?>]);
<?php } ?>
                                            return data;
                                        })()
                                        ,
                                        pointPlacement: 'on'
                                    }
                                    , {
                                        name: 'Total',
                                        data: (function() {
                                            var data = [];
<?php
for ($i = 0; $i < count($arregloTotalValores); $i++) {
    ?>
                                                data.push([<?php echo $arregloTotalValores[$i]; ?>]);
<?php } ?>
                                            return data;
                                        })()
                                        ,
                                        pointPlacement: 'on'
                                    }]

                    });
                });</script>
            <script>
                $(document).ready(function() {
                    var flecha =<?php echo ($evaluacion / $cantidadPreguntas) * 100; ?>;
                    if (flecha <= 20) {
                        document.getElementById('20').style.display = 'inline';
                       
                        $("#GI").addClass("block-inactive");
                        $("#E").addClass("block-inactive");
                        $("#V").addClass("block-inactive");
                        $("#S").addClass("block-inactive");
                    }
                    else if (flecha > 20 && flecha <= 40) {
                        document.getElementById('40').style.display = 'inline';
                        $("#TH").addClass("block-inactive");
                        $("#GI").addClass("block-inactive");
                        $("#V").addClass("block-inactive");
                        $("#S").addClass("block-inactive");
                    }
                    else if (flecha > 40 && flecha <= 60) {
                        document.getElementById('60').style.display = 'inline';
                        $("#TH").addClass("block-inactive");
                        $("#E").addClass("block-inactive");
                        $("#GI").addClass("block-inactive");
                        $("#S").addClass("block-inactive");
                    }
                    else if (flecha > 60 && flecha <= 80) {
                        document.getElementById('80').style.display = 'inline';
                        $("#TH").addClass("block-inactive");
                        $("#E").addClass("block-inactive");
                        $("#V").addClass("block-inactive");
                        $("#GI").addClass("block-inactive");
                    }
                    else {
                        document.getElementById('100').style.display = 'inline';
                        $("#TH").addClass("block-inactive");
                        $("#E").addClass("block-inactive");
                        $("#V").addClass("block-inactive");
                        $("#S").addClass("block-inactive");

                    }
                });

            </script>

