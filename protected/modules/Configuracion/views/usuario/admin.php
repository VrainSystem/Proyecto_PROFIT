<?php // Yii::import('application.modules.Administracion.models.*');     ?>   

<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>

<?php

//$this->menu = array(
//    array('label' => 'List Usuario', 'url' => array('index')),
//    array('label' => 'Create Usuario', 'url' => array('create')),
//);

function imagen($imagen) {
    $imagenURL = Yii::app()->theme->baseUrl . '/img/' . $imagen;
    return $imagenURL;
}

//
//function perfil($id_usuario) {
//
//    $perfilAux = Rights::getAssignedRoles($id_usuario);
//    $perfil = "";
//    foreach ($perfilAux as $value) {
//        $perfil = $value->name;
//    }
//
//    return $perfil;
//}

$usuarios = Usuario::model()->findAll();
?>

<form>
        <div class="panel">
            <div class="panel-heading border-light  panel-blue">
                <span class="text-extra-small text-dark"><i class="fa fa-users fa-2x"></i></span><span class="text-large text-white"> ADMINISTRAR USUARIOS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" href="<?php echo Yii::app()->baseUrl; ?>/index.php?r=Configuracion/usuario/create"><i class="fa fa-plus"></i> Nuevo </a>
                   
                </div>
            </div>
            <div class="panel-body padding-20">
                   <table id="tablaUsuarios" class="table table-bordered table-striped">
                <thead class="label-grey text-white center">
                    <tr>
                        <th>Foto</th>
                        <th>Doc._Identificación</th>
                        <th>Nombre y Apellidos</th>
                        <th>Usuario</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Estado de Cuenta</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($usuarios as $value) {
                        ?> 
                        <tr>
                            <?php
                            if ($value->foto == null) {
                                ?>
                                <td style="text-align: center; width:3% "><img style="width: 40px; height: 40px;"src="<?php echo Yii::app()->theme->baseUrl . '/img/User2.png'; ?>" class="img-circle" alt="User Image" /></td>
                                <?php
                            } else {
                                ?>
                                <td style="text-align: center; width:3% "><img style="width: 40px; height: 40px;"src="<?php echo Yii::app()->theme->baseUrl . '/img/imgUser/' . $value->foto; ?>" class="img-circle" alt="User Image" /></td>
                                <?php
                            }
                            ?>

                            <td><?php echo $value->cedula; ?></td>
                            <td><?php echo $value->nombre . ' ' . $value->apellidos; ?></td>
                            <td><?php echo $value->login; ?></td>
                            <td><?php echo $value->correo_electronico; ?></td>
                            <td><?php echo $value->telefono; ?></td>
                            <td><?php
                                if ($value->estado_cuenta == 1) {
                                    echo "Activo";
                                } else {
                                    echo "Inactivo";
                                }
                                ?></td>
                            <td id="actions" >

                                <?php
//                                echo CHtml::link('', Yii::app()->createUrl('/Configuracion/usuario/update', array("id" => $value->id_usuario)), array("title" => "Actualizar datos de usuario", "data-toggle" => "tooltip", "style" => "margin-right:5px; color:#595959; ", "class" => "fa fa-edit"));
                                echo CHtml::link('', Yii::app()->createUrl('/Configuracion/usuario/update', array("id" => $value->id_usuario)), array("title" => "Actualizar datos de usuario", "data-toggle" => "tooltip", "style" => "margin-right:5px; color:#595959; ", "class" => "fa fa-edit"));
                                ?>
                               
                                <?php echo CHtml::link('', Yii::app()->createUrl('/rights/assignment/user', array("id" => $value->id_usuario)), array("title" => "Asignar permisos a un usuario", "data-toggle" => "tooltip", "style" => "margin-right:5px; color:#595959; ", "class" => "fa fa-check-square-o")); ?>

                               
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


</form>
