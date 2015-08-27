
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login/style-loguin.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/login/loguin.css">
<link rel="stylesheet" type="text/css" href="/Proyecto_PROFIT/themes/login/css/mylogin.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/otherfont/myfont.css" >
<style>
    #fondo{            
        width: 100%;
        height:100%;
        background: url(<?php echo Yii::app()->theme->baseUrl; ?>/img/login.jpg) no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;              
    }
</style>

<?php
Yii::import('application.modules.Administracion.models._base.Usuario');
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>



<div id="experience">  
    <form method="post">
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <div class="container">  
            <div id="loginbox" class="mainbox col-md-2 col-sm-6 col-md-offset-4 col-sm-4 col-sm-offset-4"> 

                <div class="row">                
                    <div class="iconmelon">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo-PROFIT.png" class="img-responsive" />                
                    </div>
        <!--            <h4><i><p class="text-center text-gray">Revenue Assurance &amp; Risk Intelligence</p></i></h4>-->
                </div>

                <div class="" >              

                    <div class="panel-body" >

                        <form name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'id' => 'user', 'placeholder' => 'Usuario')); ?>                                                 
                            </div>
                            <?php echo $form->error($model, 'username', array('size' => 30, 'maxlength' => 30, 'class' => 'text-white')); ?>         

                            <div class="input-group" style="margin-top:10px;">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <?php echo $form->passwordField($model, 'password', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'Clave')); ?>                        
                            </div>  
                            <?php echo $form->error($model, 'password', array('size' => 30, 'maxlength' => 30, 'class' => 'text-white')); ?>

                            <div class="form-group" style="margin-top:10px;">
                                <!-- Button -->
                                <div class="col-sm-12 controls no-padding">
                                    <button type="submit" href="#" class="btn btn-dark-grey btn-lg pull-right" style="width:100%;"><i class="glyphicon glyphicon-log-in"></i> Acceder</button> 

                                </div>
                            </div>

                        </form>     

                    </div>                     
                </div>  
            </div>
            <div class="col-md-1 col-sm-3" style=" margin-top: 15%; ">              
                <!--                <div id="test">    
                                    <p>​<h2 id="h2">Revenue Assurance &amp; Risk Intelligence.</h2></p>
                                </div>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​-->
               
                    <p>Revenue Assurance</p>
                <p>&amp; Risk Intelligence.
                    <span id="span">|</span></p>
              
            </div>
        </div>
        <canvas id="lines" style="width: 1920px;"></canvas>
            <?php $this->endWidget(); ?>
    </form>
</div> 



<script src="/Proyecto_NODE/themes/login/js/libs/d3.v3.min.js"></script>
<script src="/Proyecto_NODE/themes/login/js/libs/trianglify.min.js"></script>
<script src="/Proyecto_NODE/themes/login/js/functions.min.js"></script>
<script src="/Proyecto_NODE/themes/login/js/mylogin.js"></script>

