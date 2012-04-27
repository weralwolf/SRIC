<?php

class AccommodationPlacesController extends SourceMessageController {
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $this->render('application.views.sourceMessage.view',array(
                'model'=>$this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new AccommodationPlaces;
        $this->_creation($model);
        $this->render('application.views.sourceMessage.create',array(
                'model'=>$model,
                'category' => 'AccommodationPlaces',
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
        $this->render('application.views.sourceMessage.update',array(
                'model'=>$model,
                'category' => 'AccommodationPlaces',
                'textArea' => false,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(array('application.views.sourceMessage.index', 'category' => 'AccommodationPlaces'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('AccommodationPlaces', array(
                'criteria' => array(
                        'condition' => 'category=' . Yii::app()->db->quoteValue("AccommodationPlaces")
                ),
        ));
        $this->render('application.views.sourceMessage.index',array(
                'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new AccommodationPlaces('search');
        $model->unsetAttributes();
        if(isset($_GET['Sections']))
            $model->attributes=$_GET['AccommodationPlaces'];

        $this->render('application.views.sourceMessage.admin',array(
                'model'=>$model,
                'creationURl' => array('/accommodationPlaces/create'),
        ));
    }
}
