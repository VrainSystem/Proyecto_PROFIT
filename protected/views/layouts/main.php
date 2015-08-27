<?php
/* @var $this SiteController */
Yii::import('application.modules.Configuracion.models.Usuario');
$this->pageTitle = Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl;


//$tiposP = TipoPresupuesto::model()->findAll();
?>

<html>
    <head>
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">     
        <!--        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/otherfont/myfont.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" >      
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome/css/font-awesome.min.css"> 


        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/AdminLTE.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/skins/_all-skins.min.css"> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css">   
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/profile/styles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/Node.css">

        <!--Components-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/profile/bootstrap-fileupload.min.css">  
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/timepicker/bootstrap-timepicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/select2/select2.css"> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/profile/plugins.css">
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/bootstrap-switch-master/dist/css/bootstrap3/bootstrap-switch.css">--> 
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/slimScroll/scroll-style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/iCheck/all.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/search/Search.css">



        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-PROFIT.ico" />
        <?php Yii::app()->bootstrap->register(); ?>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style type="text/css">
            #imgLOAD {
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -99px 0 0 -66px;
                z-index: 1024;
            }
        </style>
    </head>

    <body class="skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <div id="imgLOAD" style="text-align:center;">
                <h5 class="text-gray text-center">Cargando...</h5></br>
                <h1><i class="fa fa-spinner fa-2x fa-spin text-gray"></i></h1>
            </div>
            <?php
            if (Yii::app()->user->checkAccess(Rights::module()->superuserName)) {
                $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
                $nombre = $usuario->nombre . " " . $usuario->apellidos;
                ?> 
                <header class="main-header">
                    <!-- Logo -->
                    <a href="index2.html" class="logo">
                        <img class="" width="35px"src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-PROFIT-white.png"></img>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top" role="navigation">
                        <!-- Sidebar toggle button-->
                        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <span class="sr-only">Toggle navigation</span>
                        </a>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages: style can be found in dropdown.less-->
                                <!-- User Account: style can be found in dropdown.less -->
                                <li class="dropdown user user-menu">
                                    <a >
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/imgUser/<?php echo $usuario->foto ?>" class="user-image" alt="User Image" />
                                        <span class="hidden-xs"><?php echo $nombre ?></span>
                                    </a>
    <!--                                    <a data-toggle="tooltip" title="Perfil del Usuario" href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=/Configuracion/usuario/update/&id=<?php echo $usuario->id_usuario ?>" >
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/imgUser/<?php echo $usuario->foto ?>" class="user-image" alt="User Image" />
                                        <span class="hidden-xs"><?php echo $nombre ?></span>
                                    </a>-->
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=site/logout" data-toggle="tooltip" title="Salir" data-placement="bottom"><i class="fa fa-power-off " style="font-size:18px;"></i></a>
                                </li>


                            </ul>
                        </div>
                    </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <div class="user-panel">
                            <div class="">
    <!--                                <center>   
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-node-blanco.jpg" id="node-principal" />
                                </center>-->
                            </div>
                            <div class="pull-left info">

                            </div>
                        </div>
                        <!-- /.search form -->
                        <!-- sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu">
                            <li class="header">MENU</li>
                            <li class=" treeview">
                                <a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=site/index">
                                    <i class="fa fa-home"></i> <span> Dashboard</span></i>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-graduation-cap"></i> 
                                    <span> Grado de Madurez</span><i class="fa fa-angle-left pull-right"></i>                                
                                </a>
                                <ul class="treeview-menu">                                
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=GradoMadurez/cuestionario/admin"><i class="fa fa-circle-o"></i> Cuestionario</a></li>
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=GradoMadurez/default/index"><i class="fa fa-circle-o"></i> Parámetros</a></li>                                    
                                </ul>
                            </li>
                            <li class="treeview">
    <!--                                <a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=ProcesosEstrategias/default/index">
                                    <i class="fa fa-share-alt"></i> 
                                    <span> Estrategias y Procesos</span>                             
                                </a>-->
                                <a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=ProcesosEstrategias/default/index">              

                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/estrategia.png"  class="online" > <span> Estrategias y Procesos</span>               
                                </a> 
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-flash"></i> 
                                    <span> Gestión de Riesgos</span> <i class="fa fa-angle-left pull-right"></i>                               
                                </a>
                                <ul class="treeview-menu">                                

                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/riesgo/admin"><i class="fa fa-circle-o"></i> Riesgos</a></li>
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=InventarioRiesgo/default/index"><i class="fa fa-circle-o"></i> Parámetros</a></li>                                                                                         



                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-line-chart"></i> 
                                    <span> Risk Intelligence</span><i class="fa fa-angle-left pull-right"></i>                                
                                </a>
    <!--                                <a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=Administracion/usuario/index">              

                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/brain.png"  class="online" style="width:25px; margin-left: -5px;"> <span style="height:50px;"> Inteligencia de Negocio</span>               
                                </a>  -->
                            </li>
                            <li class="treeview">                            
                                <a href="" >
                                    <i class="fa fa-cog"></i> 
                                    <span> Configuración</span>  <i class="fa fa-angle-left pull-right"></i>      
                                </a>
                                <ul class="treeview-menu">                                
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=Configuracion/usuario/admin"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=Configuracion/default/index"><i class="fa fa-circle-o"></i> Parámetros</a></li>                                                                                         
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=rights"><i class="fa fa-circle-o"></i> Seguridad</a></li>
                                    <li><a href="<?php echo Yii::app()->baseUrl; ?>./index.php?r=Configuracion/default/cargarDatos"><i class="fa fa-circle-o"></i> Extracción de Datos</a></li>                                   

                                </ul>
                            </li>

                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <?php
            }
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" >
                <div id="fondo">

                    <!-- Main content -->
                    <section class="content no-padding-bottom">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="">                             
                                    <?php echo $content; ?>
                                </div>
                            </div>
                            <!-- Main row -->

                        </div><!-- /.col -->

                    </section><!-- /.content --> 
                </div>

            </div><!-- /.content-wrapper -->
            <?php
            if (Yii::app()->user->checkAccess(Rights::module()->superuserName)) {
                $usuario = Usuario::model()->findByPk(Yii::app()->user->id);
                $nombre = $usuario->nombre;
                ?> 
                <footer class="main-footer visible-lg">
                    <center>
                        <strong>Copyright &copy; 2015 <a class="text-gray" href="http://vrain.ec/">Vrain_Systems Ecuador S.A</a>.</strong> Todos los derechos reservados.
                        <b>Version 1.0</b> 
                    </center>

                </footer>


                <!-- Control Sidebar -->      

                <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
                <?php
            }
            ?>
        </div><!-- ./wrapper -->




        <?php
        $cs = Yii::app()->getClientScript();
        /* Jquery */
        $cs->registerScriptFile($baseUrl . '/plugins/jQuery/jQuery-2.1.4.min.js');
        $cs->registerScriptFile($baseUrl . '/plugins/jQueryUI/jquery-ui-1.10.3.min.js');
        /* Bootstrap */
        $cs->registerScriptFile($baseUrl . '/js/bootstrap.min.js');
        $cs->registerScriptFile($baseUrl . '/js/themes.js');
        $cs->registerScriptFile($baseUrl . '/js/pages/skin.js');
        $cs->registerScriptFile($baseUrl . '/js/app.min.js');
        $cs->registerScriptFile($baseUrl . '/js/pages/dashboard.js');
        $cs->registerScriptFile($baseUrl . '/hc/js/highcharts.js');
        $cs->registerScriptFile($baseUrl . '/hc/js/highcharts-more.js');
        /* Modules */
        $cs->registerScriptFile($baseUrl . '/js/modules/ProcesosEstrategiasValidating.js');
        $cs->registerScriptFile($baseUrl . '/js/modules/ConfiguracionValidating.js');
        $cs->registerScriptFile($baseUrl . '/js/modules/InventarioRiesgoValidating.js');
        $cs->registerScriptFile($baseUrl . '/js/modules/GradoMadurezValidating.js');
        /* Datapicker */
        $cs->registerScriptFile($baseUrl . '/plugins/timepicker/bootstrap-timepicker.min.js');
        /* DataTables */
        $cs->registerScriptFile($baseUrl . '/plugins/datatables/jquery.dataTables.js');
        $cs->registerScriptFile($baseUrl . '/plugins/datatables/dataTables.bootstrap.min.js');
        $cs->registerScriptFile($baseUrl . '/plugins/datatables/columnfilter/columnfilter.js');
//        $cs->registerScriptFile($baseUrl . '/plugins/datatables/dataTables.fnReloadAjax.js');
        $cs->registerScriptFile($baseUrl . '/plugins/fastclick/fastclick.min.js');
        $cs->registerScriptFile($baseUrl . '/js/filterTable.js');

        /* Select2 */
        $cs->registerScriptFile($baseUrl . '/plugins/select2/select2.min.js');
        /* Checkbox */
        $cs->registerScriptFile($baseUrl . '/plugins/iCheck/icheck.min.js');
        /* Input mask */
        $cs->registerScriptFile($baseUrl . '/plugins/input-mask/jquery.inputmask.js');
        $cs->registerScriptFile($baseUrl . '/plugins/input-mask/jquery.inputmask.date.extensions.js');
        $cs->registerScriptFile($baseUrl . '/plugins/input-mask/jquery.inputmask.extensions.js');
        /* Exporting */
        $cs->registerScriptFile($baseUrl . '/hc/js/modules/exporting.js');
        $cs->registerScriptFile($baseUrl . '/hc/js/modules/heatmap.js');
        /* Validating */
        $cs->registerScriptFile($baseUrl . '/plugins/jqueryvalidation/dist/jquery.validate.js');
        ?>


        <!--Charge-->

        <script type='text/javascript'>
            window.onload = detectarCarga;
            function detectarCarga() {
                document.getElementById("imgLOAD").style.display = "none";
            }
        </script> 
        <!--Mask-->
        <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

            });
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });

        </script>
        <script>
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover();
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".js-example-basic-single").select2();
            });
        </script>
        <script>
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
            $(".js-example-basic-multiple").select2();
        </script>
    </body>
</html>
