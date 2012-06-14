<?php

class SectionsController extends SourceMessageController {

    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('create', 'update', 'index', 'view', 'admin', 'delete'),
                'users'   => array('root'),
            ),
            array(
                'allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('programm'),
                'users'   => array('*'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $this->render('application.views.sourceMessage.view', array(
            'model' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Sections;
        $this->_creation($model);
        $this->render('application.views.sourceMessage.create', array(
            'model'    => $model,
            'category' => 'Sections',
            'textArea' => false,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {

        $model = $this->loadModel();
        $this->_updating($model);
        $this->render('application.views.sourceMessage.update', array(
            'model'    => $model,
            'category' => 'Sections',
            'textArea' => false,
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
                $this->redirect(array('application.views.sourceMessage.index', 'category' => 'Sections'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Sections', array(
            'criteria' => array(
                'condition' => 'category=' . Yii::app()->db->quoteValue("Sections")
            ),
        ));
        $this->render('application.views.sourceMessage.index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Sections('search');
        $model->unsetAttributes();
        if (isset($_GET['Sections']))
            $model->attributes = $_GET['Sections'];

        $this->render('application.views.sourceMessage.admin', array(
            'model'       => $model,
            'creationURl' => array('/sections/create'),
        ));
    }

    public function actionProgramm() {
        $models = Sections::model()->with('messages', 'reports', 'reports.participant'
        #            'reports.participant.organization.messages',
        #            'reports.participant.city.messages',
        #            'reports.participant.country.messages'
        )->findAll(array(
#            'order' => 'id ASC',
            'condition' => 'category = \'Sections\'',
        ));
#        print '<pre>';
#        foreach($models as $model) {
#            print $model->t() . "\n";
#        }
#        die;
        $this->render('programm', array(
            'models' => $models,
            'this'   => $this,
        ));
    }
}
