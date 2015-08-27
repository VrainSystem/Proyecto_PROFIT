<?php

Yii::import('application.modules.Configuracion.models.*');

class MacroprocesoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'rights', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Macroproceso;
        $model->nombre = $_POST['nombreMacroproceso'];
        $model->descripcion = $_POST['descripcionMacroproceso'];
        $model->save();
        $i = 0;
        foreach ($_POST['unidadesNIds'] as $value) {
            $modelUNM = new UnidadNegocioMacroproceso();
            $modelUNM->id_macroproceso = $model->id_macroproceso;
            $modelUNM->id_unidad_negocio = (int) $value;
            $modelUNM->nombre_responsable = $_POST['responsables'][$i];
            $modelUNM->save();
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $modelMacroproceso = new Macroproceso;
        $model = $modelMacroproceso->findByPk($_POST['idMacroprocesoEditar']);
        $model->nombre = $_POST['nombreMacroprocesoEditar'];
        $model->nombre_responsable = $_POST['nombreResponsableEditar'];
        $model->descripcion = $_POST['descripcionMacroprocesoEditar'];
        $model->save();
        $this->redirect(array('default/index'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete() {
        $id = $_POST['idDeleteMacroproceso'];
        
        $modelUnidadNegMacroproceso = UnidadNegocioMacroproceso::model()->findAllByAttributes(array('id_macroproceso' => $id));
        
        if (count($modelUnidadNegMacroproceso) != 0) {
            foreach ($modelUnidadNegMacroproceso as $value) {
                $value->delete();
                echo $value->nombre_responsable;
            }
        }
        $this->loadModel($id)->delete();
        $this->redirect(array('default/index'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Macroproceso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Macroproceso('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Macroproceso']))
            $model->attributes = $_GET['Macroproceso'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Macroproceso the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Macroproceso::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Macroproceso $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'macroproceso-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
