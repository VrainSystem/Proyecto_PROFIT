<?php

class ImpactoCualitativoController extends Controller {

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
        $model = new ImpactoCualitativo();
        $model->nombre = $_POST['nombreImpactoCualitativo'];
        $model->valor = $_POST['valorImpactoCualitativo'];
        $model->rango_inferior = $_POST['rangoInferiorImpactoCualitativo'];
        $model->rango_superior = $_POST['rangosuperiorImpactoCualitativo'];
        $model->save();
        $this->redirect(array('default/index'));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $modelImpactoCualitativo = new ImpactoCualitativo();
        $model = $modelImpactoCualitativo->findByPk($_POST['idImpactoCualitativo']);
        $model->nombre = $_POST['nombreImpactoCualitativoEditar'];
        $model->valor = $_POST['valorImpactoCualitativoEditar'];
        $model->rango_inferior = $_POST['rangoInferiorImpactoCualitativoEditar'];
        $model->rango_superior = $_POST['rangoSuperiorImpactoCualitativoEditar'];
        $model->save();
        $this->redirect(array('default/index'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
     public function actionDelete() {
        $id = $_POST['idImpactoCualitativoEliminar'];
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        $this->redirect(array('default/index'));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ImpactoCualitativo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ImpactoCualitativo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ImpactoCualitativo']))
            $model->attributes = $_GET['ImpactoCualitativo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ImpactoCualitativo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ImpactoCualitativo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ImpactoCualitativo $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'impacto-cualitativo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
