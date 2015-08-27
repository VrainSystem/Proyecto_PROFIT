<?php
/* @var $this DefaultController */
Yii::import('application.modules.Configuracion.models.Empresa');
Yii::import('application.modules.Configuracion.models.Usuario');
Yii::import('application.modules.ProcesosEstrategias.models.Dimension');
Yii::import('application.modules.ProcesosEstrategias.models.Proceso');
Yii::import('application.modules.ProcesosEstrategias.models.ObjetivoEstrategico');
Yii::import('application.modules.ProcesosEstrategias.models.Macroproceso');
Yii::import('application.modules.Configuracion.models.UnidadNegocio');
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<div class="toolbar ">
    <div class="col-sm-6 hidden-xs">
        <div class="page-header">
            <h1>
                Grado de Madurez: Gestión de Parámetros <br>
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
                <li class="active">Grado de Madurez</li>
            </ol>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
</div>


<div class="row padding-5" style="margin-top: 20px;">       
    <!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{
    
    ********************************************************************************
    **********************CUESTIONARIO**********************************
    ********************************************************************************
    
    }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->


    <!--TABLA CUESTIONARIO-->
    <div class="col-lg-6 col-md-12">
        <div class="panel panel-azure">
            <div class="panel-heading border-light">

                <span class="text-extra-small text-dark"><i class="fa fa-file fa-2x"></i></span><span class="text-large text-white"> CUESTIONARIO</span>

                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearCuestionarioModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesCuestionarioModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180"  style="overflow-x: hidden; overflow-y: auto;">
                                <table id="tablaObjetivo" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <!--  id_cuestionario serial NOT NULL,
                                              nombre character varying(255) NOT NULL,
                                              grado_madurez integer NOT NULL,
                                              descripcion character varying(255),
                                              id_unidad_negocio integer NOT NULL,-->
                                            <th>ID Cuestionario</th>                                               
                                            <th>Cuestionario</th>

                                            <th>Descripción</th>


                                            <th class="center">Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $cuestionario = new Cuestionario();
                                        $cuestionarios = $cuestionario->findAll();
                                        foreach ($cuestionarios as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_cuestionario; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>

                                                <td>
                                                    <?php echo $value->descripcion ?>  
                                                    <?php // echo $value->idDimension->nombre ?>                
                                                </td>


                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarCuestionarioModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <?php
                                                        $pregGP = new GrupoPreguntas();
                                                        $countGP = $pregGP->findAllByAttributes(array('id_cuestionario' => $value->id_cuestionario));
                                                        $countGP = count($countGP);
                                                        if ($countGP == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteCuestionario"> <i class="fa fa-times fa fa-white"></i></a> 
                                                            </div>  
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>    
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
                <!--<a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteObjetivo"> <i class="fa fa-times fa fa-white"></i></a>-->
                                                        <a data-toggle="popover" title="Descripción del Macroproceso" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>
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
        </div>


        <!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{
        
        ********************************************************************************
        **********************PREGUNTA MADRE**********************************
        ********************************************************************************
        
        }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->

        <!-- TABLA PREGUNTA MADRE-->
        <!-- BEGIN-->

        <div class="panel panel-blue">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-compass fa-2x"></i></span><span class="text-large text-white"> GUIAS</span>                
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearPreguntaMadreModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesPreguntaMadreModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto">
                                <table id="tablaPreguntaMadre" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <!-- id_pregunta_madre serial NOT NULL,
                                              nombre character varying(255) NOT NULL,
                                              descripcion character varying(255),
                                              id_grupo_preguntas integer NOT NULL,-->
                                            <th>ID Pregunta Madre</th>
                                            <th>Pregunta Guía</th>
                                            <th>Descripción</th>                                    
                                            <th>Grupo de Pregunta</th>                                    
                                            <th>ID Grupo de Pregunta</th>                                    
                                            <th class="center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $preguntaMadre = new PreguntaMadre();
                                        $preguntasMadress = $preguntaMadre->findAll();
                                        foreach ($preguntasMadress as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_pregunta_madre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>     
                                                    <?php // echo $value->idEmpresa->nombre; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->idGrupoPreguntas->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_grupo_preguntas ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarPreguntaMadreModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>   
                                                        <?php
                                                        $pregEspecif = new PreguntaEspecifica();
                                                        $countPreg = $pregEspecif->findAllByAttributes(array('id_pregunta_madre' => $value->id_pregunta_madre));
                                                        $countPreg = count($countPreg);
                                                        if ($countPreg == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a> 
                                                            </div>                                                             
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>   
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
                                                        <a data-toggle="popover" title="Descripción del Macroproceso" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>

                                                </td>
                                            </tr>
                                            </div> 
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
        </div>
    </div>
    <!--END-->


    <!--END-->
    <!--MODAL  NUEVO PREGUNTA MADRE-->
    <!--BEGIN-->
    <div class="modal fade" id="crearPreguntaMadreModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Pregunta Guía </h3>
                </div>
                <div class="modal-body" >
                    <form id="crearPreguntaMadre" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaMadre/create' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre de la Pregunta Guía
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombrePreguntaMadre" name="nombrePreguntaMadre" title="Nombre de Pregunta Madre"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Grupo de Pregunta
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idGrupoPreguntaPreguntaMadre" name="idGrupoPreguntaPreguntaMadre" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <?php
                                        $grupoPregunta = new GrupoPreguntas();
                                        $grupoPreguntas = $grupoPregunta->findAll();
                                        foreach ($grupoPreguntas as $value) {
                                            ?> 
                                            <option value="<?php echo $value->id_grupo_preguntas; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="despricionPreguntaMadre" title="Pregunta" name="despricionPreguntaMadre" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>

        </div>
    </div>
    <!--END-->
    <!--MODAL  UPDATE PREGUNTA MADRE-->
    <!--BEGIN-->
    <div class="modal fade" id="editarPreguntaMadreModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content ">
                <div class="modal-header partition-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Pregunta Guía</h3>
                </div>
                <div class="modal-body">
                    <form id="editarPreguntaMadre" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaMadre/update' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre de la Pregunta Madre
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="hidden" id="idPreguntaMadreEditar" name="idPreguntaMadreEditar">
                                    <input type="text" id="nombrePreguntaMadreEditar" name="nombrePreguntaMadreEditar" title="Nombre de Pregunta Madre"  class="form-control"/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Grupo de Pregunta
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idGrupoPreguntaPreguntaMadreEditar" name="idGrupoPreguntaPreguntaMadreEditar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <?php
                                        $grupoPregunta = new GrupoPreguntas();
                                        $grupoPreguntas = $grupoPregunta->findAll();
                                        foreach ($grupoPreguntas as $value) {
                                            ?> 
                                            <option value="<?php echo $value->id_grupo_preguntas; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea id="despricionPreguntaMadreEditar" title="Descripción de la Pregunta Madre" data-toggle="tooltip" name="despricionPreguntaMadreEditar" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-blue" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>
        </div>
    </div>
    <!--END-->
    <!--MODAL DETAILS PREGUNTAS MADRES-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesPreguntaMadreModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-blue">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Preguntas Guías</h3>
                </div>
                <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesDimensiones" class="table table-bordered table-striped" style="width:100%;">
                            <thead class="text-center">
                                <tr>
                                    <!-- id_pregunta_madre serial NOT NULL,
                                      nombre character varying(255) NOT NULL,
                                      descripcion character varying(255),
                                      id_grupo_preguntas integer NOT NULL,-->
                                    <th>Grupo de Pregunta</th>
                                    <th>Pregunta Guía</th>
                                    <th>Descripción</th>                                    

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $preguntaMadre = new PreguntaMadre();
                                $preguntasMadress = $preguntaMadre->findAll();
                                foreach ($preguntasMadress as $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $value->idGrupoPreguntas->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->descripcion ?>     
                                            <?php // echo $value->idEmpresa->nombre; ?>                
                                        </td>
                                        
                                    </tr>
                                    </div> 
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>                   


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> </form>
            </div>
        </div>
    </div>
    <!--END-->

    <!--MODAL DELETE PREGUNTA MADRE -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteDimension" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarDimension" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaMadre/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idPreguntaMadreEliminar" name="idPreguntaMadreEliminar"/>
                            <div class="col-sm-9 pull-left">
                                <p class="text-justify">"Desea eliminar esta Pregunta Guía?"</p>
                            </div>
                        </div>                   

                </div>            
                <div class="modal-footer" id="modalEliminarDimensionesBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>    </form>

            </div>
        </div>
    </div>
    <!--END-->

    <!--{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{{
    
    ********************************************************************************
    **********************GRUPO DE PREGUNTAS**********************************
    ********************************************************************************
    
    }}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}-->


    <!--TABLA GRUPO DE PREGUNTAS-->
    <!--BEGIN-->


    <div class="col-lg-6 col-md-12">
        <div class="panel panel-red">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-copy fa-2x"></i></span><span class="text-large text-white"> GRUPO DE PREGUNTAS</span>

                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearGrupoPreguntasoModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesGrupoPreguntasModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">

                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;">
                                <table id="tablaGrupoPreguntas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <!-- id_grupo_preguntas serial NOT NULL,
                                              nombre character varying(255) NOT NULL,
                                              descripcion character varying(255),
                                              id_cuestionario integer NOT NULL,-->
                                            <th>ID Grupo Preguntas</th>
                                            <th>Grupo de Preguntas</th>
                                            <th>Descripción</th>                                    
                                            <th>Cuestionario</th>                                    
                                            <th>ID Cuestionario</th>                                    
                                            <th class="center">Acciones</th> 
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $grupPreg = new GrupoPreguntas();
                                        $gruposPreguntas = $grupPreg->findAll();
                                        foreach ($gruposPreguntas as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_grupo_preguntas; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->descripcion ?>                
                                                </td>

                                                <td>
                                                    <?php echo $value->idCuestionario->nombre ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_cuestionario ?>                
                                                </td>

                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip"class="no-padding" style="display:inline;" >
                                                            <a data-toggle="modal" data-target="#editarProcesoModal" title="Editar "data-placement="top" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div>
                                                        <?php
                                                        $pregMadre = new PreguntaMadre();
                                                        $countMadre = $pregMadre->findAllByAttributes(array('id_grupo_preguntas' => $value->id_grupo_preguntas));
                                                        $countMadre = count($countMadre);
                                                        if ($countMadre == 0) {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title=""  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeleteGrupoPreguntas"> <i class="fa fa-times fa fa-white"></i></a> 
                                                            </div>

                                                            <?php
                                                        } else {
                                                            ?>
                                                            <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                                <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete disabled"  data-toggle="modal" data-target="#ModalDeleteDimension"> <i class="fa fa-times fa fa-white"></i></a>   
                                                            </div>

                                                            <?php
                                                        }
                                                        ?> 
                                                        <a data-toggle="popover" title="Descripción del  Proceso" data-content="<?php echo $value->descripcion ?>" data-placement="left" class="btn btn-xs btn-azure"><i class="fa fa-info-circle"></i></a>
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
        </div>
        <div class="panel panel-green">
            <div class="panel-heading border-light">
                <span class="text-extra-small text-dark"><i class="fa fa-bullseye fa-2x"></i></span><span class="text-large text-white"> PREGUNTAS ESPECIFICAS</span>
                <div class="pull-right">
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#crearPreguntaEspesificaModal"><i class="fa fa-plus"></i> Nuevo </a>
                    <a class="btn btn-sm btn-transparent-white" data-toggle="modal" data-target="#detallesMacroprocesoModal"><i class="fa fa-bars" style="font-size:18px;"></i>  </a>
                </div>
            </div>
            <div class="panel-body no-padding">
                <div class="tabbable no-margin no-padding partition-dark">
                    <ul class="nav nav-tabs" id="myTab2">
                        <li class="active">
                            <a data-toggle="tab" href="">
                                Listado
                            </a>
                        </li>                                    
                    </ul>
                    <div class="tab-content partition-white">
                        <div id="todo_tab_example1" class="tab-pane active">
                            <div class="panel-scroll height-180" style="overflow-x: hidden; overflow-y: auto;" >
                                <table id="tablaPreguntasEspesificas" class="table table-bordered table-striped" style="width:100%;">
                                    <thead class="text-center">
                                        <tr>
                                            <th>ID Pregunta Especifica</th>
                                            <th>Pregunta Especifica</th>
                                            <th>Cumplimiento</th>    
                                            <th>ID Pregunta Madre</th>
                                            <th>Pregunta Guía</th>                                    
                                            <th>Acciones</th>                                    
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        $preguntaEspesifica = new PreguntaEspecifica();
                                        $preguntasEspesificas = $preguntaEspesifica->findAll();
                                        foreach ($preguntasEspesificas as $value) {
                                            ?> 
                                            <tr>
                                                <td>
                                                    <?php echo $value->id_pregunta_especifica; ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->pregunta ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->complimiento ?>                
                                                </td>
                                                <td>
                                                    <?php echo $value->id_pregunta_madre ?>                    
                                                </td>
                                                <td>
                                                    <?php echo $value->idPreguntaMadre->nombre ?>  
                                                </td>
                                                <td class="center">
                                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                        <div title="Editar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a  data-toggle="modal" data-target="#editarPreguntaEspeficificaModal" class="btn btn-xs btn-green"><i class="fa fa-edit"></i></a>                           
                                                        </div> 
                                                        <?php
//                                                        $preguntaMadreE = new PreguntaMadre();
//                                                        $countPreguntad = $preguntaMadreE->findAllByAttributes(array('id_pregunta_especifica' => $value->id_pregunta_especifica));
//                                                        $countPreguntad = count($countPreguntad);
//                                                        if ($countPreguntad == 0) {
                                                        ?>
                                                        <div title="Eliminar" data-toggle="tooltip" class="no-padding" style="display:inline;" >
                                                            <a title="Eliminar"  data-placement="top" class="btn btn-xs btn-red tooltips delete"  data-toggle="modal" data-target="#ModalDeletePreguntaEspecifica"> <i class="fa fa-times fa fa-white"></i></a>
                                                        </div>
                                                        <?php
//                                                        } else {
                                                        ?>
                                                        <!--                                                            <?php
//                                                        }
                                                        ?>  -->
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
        </div>
    </div>
    <!--END-->

    <!--MODAL  NUEVO GRUPO  DE PREGUNTAS-->
    <!--BEGIN-->
    <div class="modal fade" id="crearGrupoPreguntasoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Grupo de Preguntas</h3>
                </div>
                <div class="modal-body">
                    <form id="crearGrupoPreguntas" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/grupoPreguntas/create' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Grupo de Pregunta
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreGrupoPreguntas" name="nombreGrupoPreguntas" title="Nombre del  Grupo de Preguntas" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Cuestionario
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idCuestionarioGrupoPreguntas" name="idCuestionarioGrupoPreguntas" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option>Seleccione</option>
                                        <?php
                                        $cuestionarioGrupoPreguntas = new Cuestionario();
                                        $cuestionariosGruposPreguntas = $cuestionarioGrupoPreguntas->findAll();
                                        foreach ($cuestionariosGruposPreguntas as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_cuestionario; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>
                                </div>
                            </div>
                            <!--descripcionProceso idCuestionarioGrupoPreguntas nombreGrupoPreguntas-->
                            <div class="col-sm-12">
                                <div class="form-group">                                   
                                    <textarea id="descripcionProceso" title="Descripcion  del  Grupo de Preguntas" name="descripcionProceso" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-red" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div></form>

            </div>

        </div>
    </div>
    <!--END-->

    <!--MODAL  UPDATE GRUPO  DE PREGUNTAS-->
    <!--BEGIN-->
    <div class="modal fade" id="editarProcesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Grupo  de Pregunta</h3>
                </div>
                <div class="modal-body">
                    <form id="editarGrupoPreguntas" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/grupoPreguntas/update' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Grupo de Pregunta
                                        <span class="symbol required"></span>
                                    </label>
                                    <input type="text" id="nombreGrupoPreguntasEditar" name="nombreGrupoPreguntasEditar" title="Nombre del  Grupo de Preguntas" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Cuestionario
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idCuestionarioGrupoPreguntasEditar" name="idCuestionarioGrupoPreguntasEditar" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option>Seleccione</option>
                                        <?php
                                        $cuestionarioGrupoPreguntas = new Cuestionario();
                                        $cuestionariosGruposPreguntas = $cuestionarioGrupoPreguntas->findAll();
                                        foreach ($cuestionariosGruposPreguntas as $value) {
                                            ?> 

                                            <option value="<?php echo $value->id_cuestionario; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                        </option> 
                                    </select>
                                </div>
                            </div>
                            <!--descripcionProceso idCuestionarioGrupoPreguntas nombreGrupoPreguntas-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" id="idGrupoPreguntasEditar" name="idGrupoPreguntasEditar" />
                                    <textarea id="descripcionProcesoEditar" title="Descripcion  del  Grupo de Preguntas" data-toggle="tooltip" name="descripcionProcesoEditar" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-red" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div></form>
            </div>

        </div>
    </div>
    <!--END-->

    <!--MODAL  DETAILS GRUPO  DE PREGUNTAS-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesGrupoPreguntasModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-red">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Grupo de Preguntas</h3>
                </div>
                <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesProcesos" class="table table-bordered table-striped" style="width:100%;">
                            <thead class="text-center">
                                <tr>

                                    <th>Grupo de Preguntas</th>                                                                     
                                    <th>Cuestionario</th> 
                                    <th>Descripción</th>   
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $grupPreg = new GrupoPreguntas();
                                $gruposPreguntas = $grupPreg->findAll();
                                foreach ($gruposPreguntas as $value) {
                                    ?> 
                                    <tr>

                                        <td>
                                            <?php echo $value->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->idCuestionario->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->descripcion ?>                
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
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> </form>
            </div>


        </div>
    </div>
    <!--END-->

    <!--MODAL DELETE GRUPO  DE PREGUNTAS -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteGrupoPreguntas" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarProceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/grupoPreguntas/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idDeleteGrupoPreguntasEliminar" name="idDeleteGrupoPreguntasEliminar"/>
                            <div class="col-sm-9">
                                <p class="text-justify">"Desea eliminar este Grupo  de Preguntas?"</p>
                            </div>
                        </div>
                </div>
                <div class="modal-footer" id="modalEliminarObjetivosBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <!--END-->

    <!--MODAL  NUEVO PREGUNTAS ESPESIFICAS-->
    <!--BEGIN-->
    <div class="modal fade" id="crearPreguntaEspesificaModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Pregunta Especifica</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="crearPreguntaEspesifica" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaEspecifica/create' ?>" method="post">
                        <div class="form-group">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Pregunta Madre
                                        <span class="symbol required"></span>
                                    </label>
                                    <select id="idPreguntaMadre" name="idPreguntaMadre" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                        <option>Seleccione</option>
                                        <?php
                                        $preguntaMadre = new PreguntaMadre();
                                        $preguntasMadres = $preguntaMadre->findAll();
                                        foreach ($preguntasMadres as $value) {
                                            ?> 
                                            <option value="<?php echo $value->id_pregunta_madre; ?>">
                                                <?php
                                                echo $value->nombre;
                                            }
                                            ?> 
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" id="cumplimiento" value="0" name="cumplimiento" title="Cumplimiento" class="form-control" />


                            <div class="col-sm-12">
                                <div class="form-group">                                 
                                    <textarea id="pregunta" title="Pregunta" name="pregunta" class="form-control" placeholder="Descripción de la Pregunta"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--END-->


    <!--MODAL EDITAR PREGUNTAS ESPESIFICAS-->
    <!--BEGIN-->
    <div class="modal fade" id="editarPreguntaEspeficificaModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i>Editar Pregunta Especifica</h3>
                </div>
                <div class="modal-body padding-10">
                    <form id="editarPreguntaEspesifica" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaEspecifica/update' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="form-field-22">
                                    Pregunta Madre
                                    <span class="symbol required"></span>
                                </label>
                                <select id="idPreguntaMadreEditarr" name="idPreguntaMadreEditarr" class="js-example-basic-single" tabindex="-1" aria-hidden="true" style="width:100%; height: 40px;">
                                    <?php
                                    $preguntaMadre = new PreguntaMadre();
                                    $preguntasMadres = $preguntaMadre->findAll();
                                    foreach ($preguntasMadres as $value) {
                                        ?> 
                                        <option value="<?php echo $value->id_pregunta_madre; ?>">
                                            <?php
                                            echo $value->nombre;
                                        }
                                        ?> 
                                </select> 
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" id="idPreguntaEspecificaEditar" name="idPreguntaEspecificaEditar">
                                    <textarea id="preguntaPreguntaEspecificaEditar"  name="preguntaPreguntaEspecificaEditar" class="form-control tooltips" data-toggle="tooltip" data-placement="top" title="Descripción  de la Pregunta" ></textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-green" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>

        </div>
    </div>
    <!--END-->


    <!--MODAL  DETAILS PREGUNTA ESPECIFICA-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesMacroprocesoModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-green">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Preguntas Específicas</h3>
                </div>
                <div class="modal-body padding-20 " style="overflow-x: hidden; overflow-y: auto">
                    <form >
                        <table id="tablaDetallesMacroproceso" class="table table-bordered table-striped" style="width:100%;" >
                            <thead class="text-center">
                                <tr>
                                    <!-- id_pregunta_especifica serial NOT NULL,
                                         pregunta character varying(255) NOT NULL,
                                         complimiento integer NOT NULL,
                                         id_pregunta_madre integer NOT NULL,
                                    -->
                                    <th>Pregunta Madre</th>          
                                    <th>Pregunta Específica</th>
                                    <th>Cumplimiento</th>                                    

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $preguntaEspesifica = new PreguntaEspecifica();
                                $preguntasEspesificas = $preguntaEspesifica->findAll();
                                foreach ($preguntasEspesificas as $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $value->idPreguntaMadre->nombre ?>               
                                        </td>
                                        <td>
                                            <?php echo $value->pregunta ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->complimiento ?>                
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> </form>
            </div>
        </div>
    </div>
    <!--END-->
    <!--MODAL DELETE PREGUNTA ESPECIFICA-->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeletePreguntaEspecifica" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarMacroproceso" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/preguntaEspecifica/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idDeletePreguntaEstrategica" name="idDeletePreguntaEstrategica"/>
                            <div class="col-sm-9">
                                <p class="text-justify">"Desea eliminar este Pregunta Específica?"</p>
                            </div>
                        </div>                        
                </div>
                <div class="modal-footer" >
                    <button type="submit" class="btn btn-yellow">Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--END-->



    <!--MODAL  NUEVO CUESTIONARIO-->
    <!--BEGIN-->
    <div class="modal fade" id="crearCuestionarioModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Registrar Cuestionario</h3>
                </div>
                <div class="modal-body">
                    <form id="crearCuestionario" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/create' ?>" method="post">
                        <div class="form-group">
                            <!--  id_cuestionario serial NOT NULL,
                                                                          nombre character varying(255) NOT NULL,
                                                                          grado_madurez integer NOT NULL,
                                                                          descripcion character varying(255),
                                                                          id_unidad_negocio integer NOT NULL,-->
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Cuestionario  
                                        <span class="symbol required"></span>
                                    </label>

                                    <input type="text" id="nombreCuestionario" name="nombreCuestionario" title="Nombre de Cuestionario"  class="form-control"/>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">                                
                                    <textarea id="descripcionCuestionario" title="Descripcion  del  Grupo de Preguntas" name="descripcionCuestionario" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-azure" >Registrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>

        </div>
    </div>
    <!--END-->



    <!--MODAL  UPDATE CUESTIONARIO-->
    <!--BEGIN-->
    <div class="modal fade" id="editarCuestionarioModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-pencil-square"></i> Editar Cuestionario</h3>
                </div>
                <div class="modal-body">
                    <form id="editarCuestionario" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/update' ?>" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="form-field-22">
                                        Nombre del Cuestionario
                                        <span class="symbol required"></span>
                                    </label>

                                    <input type="text" id="nombreCuestionarioEditar" name="nombreCuestionarioEditar" title="Nombre de Cuestionario"  class="form-control"/>
                                    <input type="hidden" id="idCuestionarioEditar" name="idCuestionarioEditar" />
                                </div>
                                <!--                            nombreCuestionarioEditar idCuestionarioEditar gradoMadurezEditar idUnidadNegocioCuestionarioEditar descripcionCuestionarioEditar-->
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">                                
                                    <textarea id="descripcionCuestionarioEditar" title="Descripción  del  Cuestionario" data-toggle="tooltip" name="descripcionCuestionarioEditar" class="form-control tooltips" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-azure" >Actualizar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div> </form>
            </div>
        </div>
    </div>
    <!--END-->

    <!--MODAL  DETAILS CUESTIONARIO-->
    <!--BEGIN-->
    <div class="modal fade" id="detallesCuestionarioModal" role="dialog">
        <!--<div class="modal-dialog" style="width: 90%">-->
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header partition-azure">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="no-margin"><i class="fa fa-list-alt"></i> Listado de Cuestionarios</h3>
                </div>
                <div class="modal-body padding-20" style="overflow-x: hidden; overflow-y: auto">
                    <form>
                        <table id="tablaDetallesObjetivos" class="table table-bordered table-striped" style="width:100%;">
                            <thead class="text-center">
                                <tr>
                                    <!--  id_cuestionario serial NOT NULL,
                                      nombre character varying(255) NOT NULL,
                                      grado_madurez integer NOT NULL,
                                      descripcion character varying(255),
                                      id_unidad_negocio integer NOT NULL,-->
                                    <th>Nombre</th>

                                    <th>Descripción</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $cuestionario = new Cuestionario();
                                $cuestionarios = $cuestionario->findAll();
                                foreach ($cuestionarios as $value) {
                                    ?> 
                                    <tr>
                                        <td>
                                            <?php echo $value->nombre ?>                
                                        </td>
                                        <td>
                                            <?php echo $value->descripcion ?>  
                                            <?php // echo $value->idDimension->nombre ?>                
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> </form>
            </div>
        </div>
    </div>
    <!--END-->

    <!--MODAL DELETE CUESTIONARIO -->
    <!--BEGIN-->
    <div class="modal fade" id="ModalDeleteCuestionario" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header panel-myyellow">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title text-white">Mensaje de Advertencia !</h4>
                </div>
                <div class="modal-body padding-10">
                    <form id="FormEliminarObjetivo" action="<?php echo Yii::app()->getBaseUrl(true) . '/index.php?r=GradoMadurez/cuestionario/delete' ?>" method="post">
                        <div class="form-group">
                            <label style="width:auto;"class="col-sm-2 no-padding ">
                                <i class="fa fa-exclamation-triangle fa-3x text-yellow"></i>
                            </label>
                            <input type="hidden" id="idDeleteCuestionarioEliminar" name="idDeleteCuestionarioEliminar"/>
                            <div class="col-sm-9">
                                <p class="text-justify ">"Desea eliminar este Cuestionario?"</p>
                            </div>
                        </div>                  

                </div>
                <div class="modal-footer" id="modalEliminarObjetivosBotones">
                    <button type="submit" class="btn btn-yellow" >Aceptar</button>
                    <button type="button" class="btn btn-cancel-warning" data-dismiss="modal">Cancelar</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!--END-->

<!--***************************
DATA TABLE 
***************************-->
<script type="text/javascript">
    //DATA TABLE MACROPROCESO
    $(document).ready(function() {
        //Inicializacion del datatable de MACROPROCESO
        //begin
        var filterPE = false;
        var paginatePE = false;
        var cantidadPE = <?php echo count($preguntasEspesificas); ?>;
        cantidadPE = parseInt(cantidadPE);

        if (cantidadPE > 1) {
            filterPE = true;
        }
        if (cantidadPE > 10) {
            paginatePE = true;
        }
        var tablaMacroprocesos = $('#tablaPreguntasEspesificas').dataTable({
            "bSort": false,
            "bFilter": filterPE,
            "bInfo": false,
            "bPaginate": paginatePE,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 3},
            ],
        });
        //editar
        $('#tablaPreguntasEspesificas a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaMacroprocesos.fnGetData(nRow);
            $("#idPreguntaEspecificaEditar").val(aData[0]);
            $("#preguntaPreguntaEspecificaEditar").val(aData[1]);
            $("#idPreguntaMadreEditarr").select2("val", aData[3]);
        });
        //eliminar
        $('#tablaPreguntasEspesificas a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaMacroprocesos.fnGetData(nRow);
            $("#idDeletePreguntaEstrategica").val(aData[0]);


        });
        //end
    });


    //DATA TABLE DIMENSIONES
    $(document).ready(function() {
        //Inicializacion del datatable de DIMENSIONES
        //begin
        var filterDimensiones = false;
        var paginateDimensiones = false;
        var cantidadDimensiones = <?php echo count($preguntasMadress); ?>;
        cantidadDimensiones = parseInt(cantidadDimensiones);

        if (cantidadDimensiones > 1) {
            filterDimensiones = true;
        }
        if (cantidadDimensiones > 10) {
            paginateDimensiones = true;
        }
        var tablaDimension = $('#tablaPreguntaMadre').dataTable({
            "bSort": false,
            "bFilter": filterDimensiones,
            "bInfo": false,
            "bPaginate": paginateDimensiones,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 4},
            ],
        });
        //editar

        $('#tablaPreguntaMadre a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaDimension.fnGetData(nRow);
            $("#idPreguntaMadreEditar").val(aData[0]);
            $("#nombrePreguntaMadreEditar").val(aData[1]);
            $("#idGrupoPreguntaPreguntaMadreEditar").select2("val", aData[4]);
            $("#despricionPreguntaMadreEditar").val(aData[2]);
        });
        //eliminar
        $('#tablaPreguntaMadre a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaDimension.fnGetData(nRow);
            $("#idPreguntaMadreEliminar").val(aData[0]);
        });
        //end
    });
    $(document).ready(function() {
        //Inicializacion del datatable de PROCESO
        //begin
        var filterProceso = false;
        var paginateProceso = false;
        var cantidadProceso = <?php echo count($gruposPreguntas); ?>;
        cantidadProceso = parseInt(cantidadProceso);

        if (cantidadProceso > 1) {
            filterProceso = true;
        }
        if (cantidadProceso > 10) {
            paginateProceso = true;
        }
        var tablaProceso = $('#tablaGrupoPreguntas').dataTable({
            "bSort": false,
            "bFilter": filterProceso,
            "bInfo": false,
            "bPaginate": paginateProceso,
            "columnDefs": [
                {"visible": false, "targets": 0},
                {"visible": false, "targets": 2},
                {"visible": false, "targets": 4},
            ],
        });
        //end
        //editar

        $('#tablaGrupoPreguntas a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaProceso.fnGetData(nRow);
            $("#nombreGrupoPreguntasEditar").val(aData[1]);
            $("#idCuestionarioGrupoPreguntasEditar").select2("val", aData[4]);
            $("#descripcionProcesoEditar").val(aData[2]);
            $("#idGrupoPreguntasEditar").val(aData[0]);
        });
        //eliminar

        $('#tablaGrupoPreguntas a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaProceso.fnGetData(nRow);
            $("#idDeleteGrupoPreguntasEliminar").val(aData[0]);
        });
    });

    $(document).ready(function() {
        //Inicializacion del datatable de OBJETIVO
        //begin
        var filterObjetivo = false;
        var paginateObjetivo = false;
        var cantidadObjetivo = <?php echo count($cuestionarios); ?>;
        cantidadObjetivo = parseInt(cantidadObjetivo);

        if (cantidadObjetivo > 1) {
            filterObjetivo = true;
        }
        if (cantidadObjetivo > 10) {
            paginateObjetivo = true;
        }
        var tablaObjetivo = $('#tablaObjetivo').dataTable({
            "bSort": false,
            "bFilter": filterObjetivo,
            "bInfo": false,
            "bPaginate": paginateObjetivo,
            "columnDefs": [
                {"visible": false, "targets": 0},
            ],
        });
        //end
        //editar
        $('#tablaObjetivo a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaObjetivo.fnGetData(nRow);
            $("#idCuestionarioEditar").val(aData[0]);
            $("#nombreCuestionarioEditar").val(aData[1]);
            $("#descripcionCuestionarioEditar").val(aData[3]);
        });
        //eliminar
        $('#tablaObjetivo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaObjetivo.fnGetData(nRow);
            $("#idDeleteCuestionarioEliminar").val(aData[0]);
        });
    });
</script>



<!--***************************
ESTOS SON LOS EDITAR
***************************-->

<script type="text/javascript">
    //DATA TABLE PREGUNTA ESPEFICICA EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaPreguntasEspesificas').dataTable();

    });

    //DATA TABLE DIMENSION EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaDimension').dataTable();
        $('#tablaDimension a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreDimensionEdit").val(aData[1]);
            $("#idDimensionEditar").val(aData[0]);
            $("#idEmpresaDimensionEditar").select2("val", aData[3]);
        });
    });
    //DATA TABLE OBJETIVO EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaObjetivo').dataTable();
        $('#tablaObjetivo a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreObjetivoEditar").val(aData[1]);
            $("#idObjetivoEditar").val(aData[0]);
            $("#codigoObjetivoEditar").val(aData[2]);
            $("#idDimensionObjetivoEditar").select2("val", aData[4]);
        });
    });
    //DATA TABLE PROCESO EDITAR
    $(document).ready(function() {
        var tablaEmpresa = $('#tablaProceso').dataTable();
        $('#tablaProceso a.btn.btn-xs.btn-green').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = tablaEmpresa.fnGetData(nRow);
            $("#nombreProcesoEdit").val(aData[1]);
            $("#idProcesoEditar").val(aData[0]);
            $("#idMacroProcesoEdit").select2("val", aData[3]);
            $("#nombreResponsableProcesoEdit").val(aData[5]);
            $("#descripcionProcesoEdit").val(aData[2]);
        });
    });
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });

</script>


<!--***************************
ELIMINAR
***************************-->

<script type="text/javascript">
    //DATA TABLE OBJETIVO ELIMINAR
    $(document).ready(function() {
        var objetivoEliminar = $('#tablaObjetivo').dataTable();
        $('#tablaObjetivo a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteObjetivo").val(aData[0]);
        });
    });
    //DATA TABLE PROCESO ELIMINAR
    $(document).ready(function() {
        var objetivoEliminar = $('#tablaProceso').dataTable();
        $('#tablaProceso a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteProceso").val(aData[0]);
        });
    });
    //DATA TABLE DIMENSIONES ELIMINAR
    $(document).ready(function() {
        var objetivoEliminar = $('#tablaDimension').dataTable();
        $('#tablaDimension a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteDimension").val(aData[0]);
        });
    });
    //DATA TABLE MACROPROCESO ELIMINAR
    $(document).ready(function() {
        var objetivoEliminar = $('#tablaMacroproceso').dataTable();
        $('#tablaMacroproceso a.btn.btn-xs.btn-red.tooltips.delete').on('click', function(e) {
            e.preventDefault();
            var nRow = $(this).parents('tr');
            var aData = objetivoEliminar.fnGetData(nRow);
            $("#idDeleteMacroproceso").val(aData[0]);
        });
    });
</script>