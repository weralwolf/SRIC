<?php

class ParticipantsController extends Controller {

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    public $adminLayoutActions = array(
        'admin',
        'index',
        'view',
        'update',
        'programm'
    );

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
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('create', 'registrationComplited'),
                'users'   => array('*'),
            ),
            array(
                'allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'viewMe'),
                'users'   => array('@'),
            ),
            array(
                'allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('index', 'admin', 'delete', 'view', 'programm'),
                'users'   => array('root'),
            ),
            array(
                'deny', // deny all users
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
        $model->no_report = NULL;

        Yii::log("~~~~~~~~~~~~~~~~~~~~~~~" . CVarDumper::dumpAsString($_POST));
        if (isset($_POST['Participants'])) {
            Yii::log("PartController:: input data exist");
            $model->attributes = $_POST['Participants'];
            $model->alt_organization = $_POST['Participants']['alt_organization'];

            // Currently both reports are empty, but both of them should be filled by information from POST request
            $report_0 = NULL;
            $report_1 = NULL;

            // Now we will start data base transaction, cause if something will goes wrong we do not want to have
            // some trash in our data base. Transaction needs cause we have a bit seperated system of saving information
            Yii::log("PartController:: begin transaction");
            $transaction = Yii::app()->db->beginTransaction();

            // We ask for reports information only if user have been select `lecturer` type of participation, what means
            // he will give some lectures
            $could_be_saved = true;
            if ($model->participation_type == 'lecturer') {
                Yii::log("PartController:: We have an LECTURER!");
                $report_0 = Reports::saveFromPOST('0');
                $report_1 = Reports::saveFromPOST('1');

                // If person says what he want to be `lecturer` he should give at least one report information
                if (is_null($report_0)) {
                    Yii::log("PartController:: report #0 not exist");
                    // We couldn't register this person cause he have no any report
                    $could_be_saved = false;
                    $model->no_report = Yii::app()->dbMessages->translate('Errors', 'empty_report');
                } elseif (!$report_0->validate()) { // and report should be valid
                    Yii::log("PartController:: report #0 not valid");
                    $could_be_saved = false;
                }

                // And if he gives other one it also should be valid
                if (!is_null($report_1) && !$report_1->validate()) {
                    Yii::log("PartController:: report #1 exist but not valid");
                    $could_be_saved = false;
                }
            }

            if ($could_be_saved && $model->validate() && $model->save()) {
                Yii::log("PartController:: model could be saved && valid && saved");
                // Both reports are already validated, so we do not need to check it once more
                if (!is_null($report_0)) {
                    Yii::log("PartController:: saving report #0");
                    $report_0->participants_id = $model->id;
                    $report_0->save();
                    Yii::log("PartController:: !!!ATTENTION!!! saving information not verified");
                }

                if (!is_null($report_1)) {
                    Yii::log("PartController:: saving report #1");
                    $report_1->participants_id = $model->id;
                    $report_1->save();
                    Yii::log("PartController:: !!!ATTENTION!!! saving information not verified");
                }

                // @TODO: we need to check if all information was correctly saved and if not give some message

                $transaction->commit();
                Yii::log("PartController:: commit transaction");
                $this->redirect(array('/participants/registrationComplited'));
            } else {
                // We are trying to clean up all stuff which was saved after this unfair person who won't give us
                // good information
                if (!is_null($report_0)) {
                    Yii::log("PartController:: remove report #0 file");
                    $report_0->file->delete();
                }
                if (!is_null($report_1)) {
                    Yii::log("PartController:: remove report #1 file");
                    $report_1->file->delete();
                }

                // And off course, we need to roll back transaction to clean up data base requests
                $transaction->rollBack();
                Yii::log("PartController:: roll back transaction");
            }

            // Now we give all information about this reports to our model
            $model->_reports[] = $report_0;
            $model->_reports[] = $report_1;
            Yii::log('PartController:: placing reports into $model->_reports[' . count($model->_reports) . ']');
        } else {
            Yii::log("PartController:: placing default data for model");
            // But if there was no any model or data from registration form we just give some default values
            $model->participation_type = 'listner';
            $model->report_type = 'plenary';
        }

        Yii::log("PartController:: before render");
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionRegistrationComplited() {
        $this->render('registrationComplited');
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

    public function actionProgramm() {
        $models = Sections::model()->with('messages', 'reports', 'reports.participant')->findAll(array(
#            'order'     => 'id ASC',
            'condition' => 'category = \'Sections\'',
        ));
        echo $this->renderPartial('programm', array('models' => $models), true);
        die;
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
