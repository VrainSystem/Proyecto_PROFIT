<div id="caja-login">
<div class="main">
    <?php
    /* @var $this SiteController */
    /* @var $model LoginForm */
    /* @var $form CActiveForm  */

    $this->pageTitle = Yii::app()->name . ' - Login';
    $this->breadcrumbs = array(
        'Autenticación',
    );
    ?>
    

    <h5><center><h1>Autenticación</h1></center></h5></br></br>

    
    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'type' => 'horizontal',
            'input' => 'bootstrap.widgets.input.TbInputHorizontal',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
            'htmlOptions'=>array('autocomplete'=>'off'),
        ));
        ?>   

        <?php echo $form->textFieldRow($model, 'usuario'); ?>
       
        <?php
        
        echo $form->passwordFieldRow($model, 'contraseña', array(
//        'hint'=>'Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>',
        ));
        ?>

        <?php // echo $form->checkBoxRow($model, 'rememberMe'); ?>
<center>
        <div id="login-boton">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'inverse',
                'label' => 'Entrar',
            ));
            ?>
        </div>
</center>
        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>
</div>



