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
                    <small class="visible-lg">Bienvenido a PROFIT : <a><i><?php echo $usuario->nombre; ?></i></a> </small>
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
            <!--            <div class="panel-heading padding-vertical-20" > <h5>
                                <select id="" name="" class="js-example-basic-single col-sm-6 pull-right" tabindex="-1" aria-hidden="true" style="width:300px; height: 40px;">
                                    <option>Seleccione la Unidad de Negocio</option>
                                </select>
            
                            </h5>               
            
                        </div>-->
            <div class="panel-body">
                <form novalidate="novalidate" action="#" role="form" class="smart-wizard form-horizontal" id="form">
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
                                <div id="barraProgress" style="width: 33.3%;" aria-valuemax="100" aria-valuemin="0"  role="progressbar" class="progress-bar partition-green step-bar">
                                    <!--<span class="sr-only"> 0% Complete (success)</span>-->
                                </div>
                            </div>

                            <!-- *******************************************************
                                                        TAB 1   
                               *******************************************************-->

                            <div style="display: block;" class="content" id="step-1">
                                <h2 class="StepTitle  text-bold">Unidad de Negocio</h2> 
                                <div class="row">
                                    <h5>

                                        <select id="name" name="name" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:300px; height: 40px;">
                                            <option>Seleccione</option>
                                            <?php
                                            $un = new UnidadNegocio();
                                            $un = $un->findAll();
                                            $listaUN = [];
                                            $contador = 0;
                                            foreach ($un as $value) {
                                                if ($value->evaluacion == null) {
                                                    $listaUN[$contador] = $value;
                                                    $contador = $contador + 1;
                                                }
                                            }

                                            foreach ($listaUN as $value) {
                                                ?> 
                                                <option value="<?php echo $value->id_unidad_negocio; ?>">
                                                    <?php
                                                    echo $value->nombre;
                                                }
                                                ?> 
                                        </select>
                                    </h5>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="page-header">Datos del Cuestionario</h2>
                                        <div class="panel padding-10  panel-blue height-110 ">
                                            <i class="text-white">
                                                <?php
                                                $cuestionario = new Cuestionario();
                                                $Cuestionarios = $cuestionario->findByAttributes(array('id_cuestionario' => 2));
                                                if ($Cuestionarios != null) {
                                                    echo 'NOMBRE: ';
                                                    echo $Cuestionarios->nombre;
                                                    echo '<br>';
                                                    echo '<br>';
                                                    echo 'DESCRIPCION: ';
                                                    echo $Cuestionarios->descripcion;
                                                    echo '<br>';
                                                }
                                                ?>  
                                            </i>
                                        </div>

                                    </div>
<!--                                  
                                                <?php
                                                $cuestionario = new Cuestionario();
                                                $Cuestionarios = $cuestionario->findByAttributes(array('id_cuestionario' => 1));

                                                if ($Cuestionarios != null) {
                                                    //                                echo '';$preguntasEspesificas = $preguntaEspesifica->findAll();

                                                    $un = new UnidadNegocio();
                                                    $uns = $un->findByAttributes(array('id_empresa' => $Cuestionarios->idUnidadNegocio->id_empresa));
                                                    echo 'NOMBRE: ';
                                                    echo $uns->nombre;
                                                    echo '<br>';
                                                    echo 'DESCRIPCION: ';
                                                    echo $uns->descripcion;
                                                    ?>  
                                                    <?php
                                                }
                                                ?>  
                                            </i>
                                        </div>

                                    </div>  -->
                                </div>

                                <div class="row">
                                    <div class="pull-right padding-horizontal-15">
                                        <input type="hidden" id="unidadNegocio" value="vacio"/>
                                        <?php
                                        if (count($listaUN) == 0) {
                                            ?>
                                            <button type="button" id="seguir2" class="btn btn-cancel next-step btn-block disabled" style="width: 300px" >Seguir <i class="fa fa-arrow-right"></i></button><center><span class="text-danger"><b>No hay  unidades de negocio disponibles</b></center></span>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="button" id="seguir2" class="btn btn-cancel next-step btn-block " style="width: 300px" >Seguir <i class="fa fa-arrow-right"></i></button>
                                                <?php
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end: FORM WIZARD PANEL -->
            </div>
        </div>
        <!-- end: PAGE CONTENT-->
        <script type="text/javascript">
            //    function CambiarBotton1() {
            //        document.getElementById("step-2").style.display = "inline";
            //        document.getElementById("step-1").style.display = "none";
            //        document.getElementById("step-3").style.display = "none";
            //        document.getElementById("step-4").style.display = "none";
            //        document.getElementById("2").className = "selected";
            //        document.getElementById("barraProgress").style.width = "50%";
            //    }
            //    $(document).ready(function() {
            //        //Inicializacion del datatable de MACROPROCESO
            //        //begin
            //        var filterPE = false;
            //        var paginatePE = false;
            //        var cantidadPE = <?php // echo count($grupoPreguntasAUX);                           ?>;
            //        cantidadPE = parseInt(cantidadPE);
            //
            //        if (cantidadPE > 1) {
            //            filterPE = true;
            //        }
            //        if (cantidadPE > 10) {
            //            paginatePE = true;
            //        }
            //        var tablaSeleccionarGrupoPreguntas = $('#tablaSeleccionarGrupoPreguntas').dataTable({
            //            "bSort": false,
            //            "bFilter": filterPE,
            //            "bInfo": false,
            //            "bPaginate": paginatePE,
            //            "columnDefs": [
            //                {"visible": true, "targets": 0},
            //            ],
            //        });
            //    });
            //    $(document).ready(function() {
            //        $(".js-example-basic-single").select2();
            //    });
        </script>
        <!--<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;                           ?>/js/pages/dashboard.js" type="text/javascript"></script>    -->
        <script type="text/javascript">
            //
            //    function MostrarLista() {
            ////        var node = document.getElementById('lista').getElementsByTagName("li");
            //        var nombreGP = document.querySelectorAll('#cosa');
            //        var idGP = document.querySelectorAll('#id');
            ////        alert(idGP[0].innerHTML);
            ////        alert('Mi nombre es : ' + nombreGP[0].innerHTML + 'y  mi id es : ' + idGP[0].innerHTML);
            //        document.getElementById("step-2").style.display = "none";
            //        document.getElementById("step-1").style.display = "none";
            //        document.getElementById("step-3").style.display = "inline";
            //        document.getElementById("step-4").style.display = "none";
            //        document.getElementById("3").className = "selected";
            //        document.getElementById("barraProgress").style.width = "75%";
            //        var mostrar = new Array();
            //        for (var i = 0; i < idGP.length; i++) {
            //            mostrar[i] = idGP[i].innerHTML;
            //        }
            //    }
        </script>  
        <script type="text/javascript">
            //    $(document).ready(function() {
            //        $("#siguiente1").click(function() {
            //         alert('sasasasas');
            //        });
            //    });


        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#seguir2").click(function() {
                    var unidadN = document.getElementById('name').value;
//                    $("#unidadNegocio").val(unidadN);
                    location.href = '<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/responderCuestionario' ?>&idUN=' + unidadN;
                });
            });

        </script>
