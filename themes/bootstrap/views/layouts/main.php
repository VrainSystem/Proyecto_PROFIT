<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <meta charset="utf-8">
        <div id="wrapper">
        
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="language" content="en" />
                <title><?php echo CHtml::encode($this->pageTitle); ?></title>

                <?php Yii::app()->bootstrap->register(); ?>

                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/font-awesome.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/myStyle.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/cssbootstrap/bootstrap.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/dashboard.css" />     
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/myStyles.css" />     

                <!--favicon de la pagina-->
                <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" type="image/x-icon" />            
                <title><?php echo CHtml::encode($this->pageTitle); ?></title>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/treeColor.css" />
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/menu-minivol.css" />
                <script language="javascript" type="text/javascript" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
            </head>

            <body>
                   <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner" >
                        <div class="" > 

                            <div class="subnavbar">
                                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a href="/presupuestosv2/index.php?r=rights" class="brand"><img id="img-logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/fin.png"/><span id="logo-title"></span></a>
                                <div style="visibility: hidden">
                                    <?php
                                if (Yii::app()->user->checkAccess(Rights::module()->superuserName)) {
                                
                                 //if (Yii::app()->user->checkAccess(Rights::module()->superuserName)=="Control") {
                                    ?>
                                </div>
                                    <div class="subnavbar-inner">
                                        <div class="container">

                                            <ul class="mainnav">
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=rights"><i class="fa fa-dashboard"></i><span>Dashboard</span> </a> </li>                                  
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/usuarios/admin"><i class="fa fa-user"></i><span>Usuarios</span> </a> </li>
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/tipoCosto/admin"><i class="fa fa-money "></i><span>Tipos de Costo</span> </a> </li>
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/proyecto/admin"><i class="fa fa-bar-chart-o "></i><span>Proyectos</span> </a> </li>
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/indicadorCosto/admin"><i class="fa fa-file "></i><span>Indicador Costo</span> </a> </li>
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/costo/admin"><i class="fa fa-file "></i><span>Costo</span> </a> </li>
                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=Control/actividad/admin"><i class="fa fa-file "></i><span>Actividades</span> </a> </li>

                                                <li class="subnavbar-open-right"><a href="/presupuestosv2/index.php?r=site/logout"><i class="fa fa-power-off "></i><span>Salir</span> </a> </li>


                                            </ul>
                                        </div>
                                        <!-- /container --> 
                                    </div
                                    <?php
                                } else {
                                    ?>
                                    <div class="subnavbar-inner">
                                        <div class="container">

                                            <ul class="mainnav">
                                                <li class="subnavbar-open-right" style="visibility:visible !important;"><a href="/presupuestosv2/index.php?r=rights"><i class="fa fa-dashboard"></i><span>Dashboard</span> </a> </li>                                  
                                                <li class="subnavbar-open-right" style="visibility:visible !important;"><a href="/presupuestosv2/index.php?r=site/logout"><i class="fa fa-power-off "></i><span>Salir</span> </a> </li>


                                            </ul>
                                        </div>
                                        <!-- /container --> 
                                    </div>
    <?php
}
?>
                                <!-- /subnavbar-inner --> 
                            </div> 

                        </div>
                        <!-- /container --> 
                    </div>
                    <!-- /navbar-inner --> 
                </div>





                <div class="container-fluid" id="body">
                    <!--*************************************BORRAR LOS DOS ESPACIOS DE ABAJO********************-->
<?php if (count($this->breadcrumbs) == 0) { ?>

                    <?php } ?>
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                    <?php echo $content; ?>

                </div>
                <div id="footernew">
                    <!--<footer>-->
                    <div id="rowFooter" class="row-fluid" style="padding-top:1%;">

                        <div class="span12">
                            <center>
                                <small><p style="color: #fff">
                                        Copyright &copy; <?php echo date('Y'); ?> Sistema de Gestión de Presupuesto: MINIVOL
                                        <br>
                                            Grupo de Desarrollado | Vrain Consultores</p>
                                </small>
                            </center>
                        </div></div></div>
              
          </div>
            </body>


            </html>

