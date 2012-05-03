<?php

class SourceMessageController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    public $adminLayoutActions = array('admin', 'update', 'create', 'view');

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    protected $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('create', 'update', 'index', 'view', 'admin', 'delete', 'fillOrgs'),
                        'users'=>array('root'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }
    
    public function actionFillOrgs() {
        SourceMessage::createMessage(
                'Space Research Center PAS',
                'Organizations_en',
                array(
                        'uk' => 'Space Research Center PAS',
                        'ru' => 'Space Research Center PAS',
                        'en' => 'Space Research Center PAS',
                ),
                1
        );
        $orgs_ru = array('ИЗМИРАН',
        'ГАИШ',
        'ОАО «Российские космические системы»',
        'Нижегородский планетарий',
        'Институт ионосферы, Казкосмос',
        'Объединенный институт проблем информатики НАНБ',
        'Институт прикладных физических проблем им. А. Н. Севченко, БГУ',
        'ЦНИИМАШ',
        'Роскосмос');
        foreach ($orgs_ru as $i => $org) {
            SourceMessage::createMessage(
                    $org,
                    'Organizations_ru',
                    array(
                            'uk' => $org,
                            'ru' => $org,
                            'en' => $org,
                    ),
                    1
            );
        }
        $orgs_uk = array('Інститут космічних досліджень НАНУ-НКАУ',
        'Державне космічне агентство України',
        'Національна академія наук України',
        'Головна астрономічна обсерваторія НАНУ',
        'Київський національний університет імені Тараса Шевченка',
        'Науковий центр аерокосмічних досліджень Землі НАНУ',
        'Міжнародний центр астрономічних та медико-екологічних досліджень НАНУ',
        'Інститут ботаніки ім. М.Г. Холодного НАНУ',
        'Інститут молекулярної біології і генетики НАНУ',
        'Національний університет біоресурсів і природокористування України',
        'Національний науково-природничий музей НАНУ',
        'Інститут зоології ім. І.І. Шмальгаузена НАНУ',
        'Інститут фізики НАНУ',
        'Інститут проблем матеріалознавства ім. І.М. Францевича НАНУ',
        'Інститут геофізики ім. С.І. Суботіна НАНУ',
        'Національний центр управління та випробування космічних засобів',
        'ДП «КБ «Південне»',
        'Інститут технічної механіки НАНУ та НКАУ',
        'Радіоастрономічний інститут НАНУ',
        'Обсерваторія «УРАН-4» РІ НАНУ',
        'Харківський центр ІКД НАНУ та НКАУ',
        'Харківський національний університет імені В.Н. Каразіна',
        'Інститут іоносфери НАНУ та МОНСУ',
        'Національний науковий центр «Інститут метрології»',
        'Харківський національний університет радіоелектроніки',
        'Фізико-технічний інститут низьких температур ім. Б.І. Вєркіна НАНУ',
        'Харківський астрономічний інститут НАНУ',
        'Львівський центр ІКД НАНУ та НКАУ',
        'Національний університет «Львівська Політехніка»',
        'Фізико-механічний інститут ім. Г.В. Карпенка НАНУ',
        'Ужгородський національний університет',
        'Астрономічна обсерваторія Одеського Національного Університету імені І. І. Мечникова',
        'Закарпатгеодезцентр ',
        'Східноукраїнський національний університет імені Володимира Даля');
        foreach ($orgs_uk as $i => $org) {
            SourceMessage::createMessage(
                    $org,
                    'Organizations_uk',
                    array(
                            'uk' => $org,
                            'ru' => $org,
                            'en' => $org,
                    ),
                    1
            );
        }
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
        $model = new SourceMessage;
        $this->_creation($model);
        $this->render('create', array(
                'model' => $model,
        ));
    }

    protected function _creation($model) {
        if (isset($_POST['SourceMessage'])) {
            $message_id = SourceMessage::saveFromPOST();
            if ($message_id) {
                $this->redirect(array('view', 'id' => $message_id));
            }
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();
        $this->_updating($model);
        $this->render('update', array(
                'model' => $model,
        ));
    }

    protected function _updating($model) {
        if (isset($_POST['SourceMessage'])) {
            $model->updateFromPost();
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
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
        $dataProvider = new CActiveDataProvider('SourceMessage');
        $this->render('index', array(
                'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new SourceMessage('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['SourceMessage']))
            $model->attributes = $_GET['SourceMessage'];

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
                $this->_model = SourceMessage::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

}
