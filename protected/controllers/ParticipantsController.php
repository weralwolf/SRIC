<?php

class ParticipantsController extends Controller {

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    public $adminLayoutActions = array('admin', 'index', 'view');

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
                        'actions' => array('create'),
                        'users' => array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update', 'viewMe'),
                        'users' => array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('index', 'admin', 'delete', 'view'),
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

//         echo "<pre>";
//         echo CVarDumper::dump($_REQUEST);
//         die;
        
        if (isset($_POST['Participants'])) {
            /**
             * @todo: move this parts into model beforeValidate function
             */
            $model->country = $_POST['countryName'];
            $model->contries_id = Countries::model()->resolveID($model->country, 'Countries');
            if ($model->contries_id == - 1) {
                $message = strtolower(str_replace(array('-', ' '), '_', $_POST['countryName']));
                $model->contries_id = SourceMessage::createMessage($message, 'Countries',
                        array(
                                'ua' => $_POST['countryName'],
                                'ru' => $_POST['countryName'],
                                'en' => $_POST['countryName'],
                        )
                );
            }

            $model->city = $_POST['cityName'];
            $model->cities_id = Cities::model()->resolveID($model->city, 'Cities');
            if ($model->cities_id == - 1) {
                $message = strtolower(str_replace(array('-', ' '), '_', $_POST['cityName']));
                $model->cities_id = SourceMessage::createMessage($message, 'Cities',
                        array(
                                'ua' => $_POST['cityName'],
                                'ru' => $_POST['cityName'],
                                'en' => $_POST['cityName'],
                        )
                );
            }

            $report_0 = Reports::saveFromPOST('0');
            $report_1 = Reports::saveFromPOST('1');

            $model->attributes = $_POST['Participants'];
            $model->day = $_POST['Participants']['day'];
            $model->month = $_POST['Participants']['month'];
            $model->year = $_POST['Participants']['year'];
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
            } else {
                if (!is_null($report_0)) {
                    $report_0->file->delete();
                }
                if (!is_null($report_1)) {
                    $report_1->file->delete();
                }
            }
            $this->redirect(array('/pages/index'));
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
