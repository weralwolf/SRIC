<?php

class ParticipantsController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        /*
         return array(
                 'accessControl', // perform access control for CRUD operations
         );
        */
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
                array('allow', // allow all users to perform 'index' and 'view' actions
                        'actions' => array('index', 'view', 'create'),
                        'users' => array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update'),
                        'users' => array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('admin', 'delete'),
                        'users' => array('root'),
                ),
                array('deny', // deny all users
                        'users' => array('*'),
                ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $this->render('view', array(
                'model' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Participants;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Participants'])) {
            /**
             * @todo: move this parts into model beforeValidate function
             */
            $model->country = $_POST['countryName'];
            $model->contries_id = Countries::model()->resolveID($model->country);
            if ($model->contries_id == - 1) {
                $countrie = new Countries();
                $countrie->name = $model->country;
                if ($countrie->save()) {
                    $model->contries_id = $countrie->id;
                } else {
                    Yii::trace($countrie->getErrors());
                }
            }

            $model->city = $_POST['cityName'];
            $model->cities_id = Cities::model()->resolveID($model->city);
            if ($model->cities_id == - 1) {
                $city = new Cities();
                $city->name = $model->city;
                $city->countries_id = $model->contries_id;
                if ($city->save()) {
                    $model->cities_id = $city->id;
                } else {
                    Yii::trace($city->getErrors());
                }
            }

            $model->organization = $_POST['organizationName'];
            $model->organizations_id = Organizations::model()->resolveID($model->organization);
            if ($model->organizations_id == - 1) {
                $org = new Organizations();
                $org->title = $model->organization;
                $org->cities_id = $model->cities_id;
                if ($org->save()) {
                    $model->organizations_id = $org->id;
                } else {
                    print Yii::trace($org->getErrors());
                }
            }

            $report_0 = Reports::saveFromPOST('0');
            $report_1 = Reports::saveFromPOST('1');

            $model->report = CUploadedFile::getInstance($model, 'report');
            $model->attributes = $_POST['Participants'];
            if ($model->save()) {
                if (!is_null($report_0)) {
                    $report_0->participants_id = $model->id;
                    $report_0->save();
                }
                if (!is_null($report_1)) {
                    $report_1->participants_id = $model->id;
                    $report_1->save();
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
                'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Participants'])) {
            $model->attributes = $_POST['Participants'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
                'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Participants');
        $this->render('index', array(
                'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Participants('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Participants']))
            $model->attributes = $_GET['Participants'];

        $this->render('admin', array(
                'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Participants::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'participants-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
