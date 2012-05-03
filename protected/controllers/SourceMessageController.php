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
        $orgs = array(
                array(
                        'Centrum Badań Kosmicznych (CBK), Warszawa, Polska',
                        'Centrum Badań Kosmicznych (CBK), Warszawa, Polska',
                        'Centrum Badań Kosmicznych (CBK), Warszawa, Polska'
                ),
                array(
                        'Институт земного магнетизма, ионосферы и распространения радиоволн им. Н.В.Пушкова РАН (ИЗМИРАН), Москва, Россия',
                        'Институт земного магнетизма, ионосферы и распространения радиоволн им. Н.В.Пушкова РАН (ИЗМИРАН), Москва, Россия',
                        'IZMIRAN'
                ),
                array(
                        'Государственный астрономический институт имени Штернберга (ГАИШ), Москва, Россия',
                        'Государственный астрономический институт имени Штернберга (ГАИШ), Москва, Россия',
                        'Sternberg Astronomical Institute Moscow University'
                ),
                array(
                        'ОАО «Российские космические системы», Москва, Россия',
                        'ОАО «Российские космические системы», Москва, Россия',
                        'ОАО «Российские космические системы», Москва, Россия'
                ),
                array(
                        'Нижегородский планетарий, Нижний Новгород, Россия',
                        'Нижегородский планетарий, Нижний Новгород, Россия',
                        'Нижегородский планетарий, Нижний Новгород, Россия'
                ),
                array(
                        'Дочернее товарищество с ограниченной ответственностью «Институт ионосферы» (ДТОО «ИИ») Акционерного общества «Национальный центр космических исследований и технологий» (АО НЦКИТ) Национальное космическое агентство Республики Казахстан (Казкосмос), г. Алма-Аты, Казахстан',
                        'Дочернее товарищество с ограниченной ответственностью «Институт ионосферы» (ДТОО «ИИ») Акционерного общества «Национальный центр космических исследований и технологий» (АО НЦКИТ) Национальное космическое агентство Республики Казахстан (Казкосмос), г. Алма-Аты, Казахстан',
                        'Дочернее товарищество с ограниченной ответственностью «Институт ионосферы» (ДТОО «ИИ») Акционерного общества «Национальный центр космических исследований и технологий» (АО НЦКИТ) Национальное космическое агентство Республики Казахстан (Казкосмос), г. Алма-Аты, Казахстан'
                ),
                array(
                        'Объединенный институт проблем информатики Национальной академии наук Беларуси (ОИПИ НАН Беларуси), Минск, Беларусь',
                        'Объединенный институт проблем информатики Национальной академии наук Беларуси (ОИПИ НАН Беларуси), Минск, Беларусь',
                        'United Institute of Informatics Problems of the National Academy of Science of Belarus (UIIP NAS Belarus)'
                ),
                array(
                        'Научно-исследовательское учреждение "Институт прикладных физических проблем им. А. Н. Севченко" Белорусского государственного университета (НИИПФП им. А.Н. Севченко БГУ), Минск, Беларусь',
                        'Научно-исследовательское учреждение "Институт прикладных физических проблем им. А. Н. Севченко" Белорусского государственного университета (НИИПФП им. А.Н. Севченко БГУ), Минск, Беларусь',
                        'Научно-исследовательское учреждение "Институт прикладных физических проблем им. А. Н. Севченко" Белорусского государственного университета (НИИПФП им. А.Н. Севченко БГУ), Минск, Беларусь'
                ),
                array(
                        'Федеральное Государственное унитарное предприятие Центральный научно-исследоательский институт машиностроения (ЦНИИМАШ), Москва, Россия',
                        'Федеральное Государственное унитарное предприятие Центральный научно-исследоательский институт машиностроения (ЦНИИМАШ), Москва, Россия',
                        'TSNIIMASH'
                ),
                array(
                        'Федеральное космическое агентство Роскосмос (РОСКОСМОС), Москва, Россия',
                        'Федеральное космическое агентство Роскосмос (РОСКОСМОС), Москва, Россия',
                        'Russian federal space agency ROSCOSMOS'
                ),
                array(
                        'Інститут космічних досліджень Національної академії наук та Національного космічного агентства України (ІКД НАНУ та НКАУ)',
                        'Институт космических исследований НАНУ и НКАУ (ИКИ НАНУ и НКАУ), Киев, Украина',
                        'Space research Institute (SRI NASU&NSAU), Kyiv, Ukraine'
                ),
                array(
                        'Державне космічне агентство України (ДКАУ)',
                        'Государственное космическое агентство Украины (ГКАУ), Киев, Украина',
                        'State Space Agency of Ukraine (SSAU), Kyiv, Ukraine'
                ),
                array(
                        'Національна академія наук України (НАНУ)',
                        'Национальная академия наук Украины (НАНУ), Киев, Украина',
                        'The National Academy of Science of Ukraine (NASU), Kyiv, Ukraine'
                ),
                array(
                        'Головна астрономічна обсерваторія Національної академії наук України (ГАО НАНУ)',
                        'Главная астрономическая обсерватория НАНУ (ГАО НАНУ), Киев, Украина',
                        'Main astronomical observatory (MAO NASU)'
                ),
                array(
                        'Київський національний університет імені Тараса Шевченка (КНУ), Київ, Україна',
                        'Киевский национальный университет им. Тараса Шевченко (КНУ), Киев, Украина',
                        'Taras Shevchenko National University of Kyiv, Kyiv, Ukraine'
                ),
                array(
                        'Державна установа «Науковий центр аерокосмічних досліджень Землі Інституту геологічних наук Національної академії наук України» (ЦАКДЗ ІГН НАНУ), Київ, Україна ',
                        'Государственное учреждение «Научный центр аэрокосмических исследовании Земли Института геологических наук НАНУ» (ЦАКИЗ ИГН НАНУ), Киев, Украина',
                        'Scientific Centre for Aerospace Research of the Earth (CASRE) of Institute of Geological Sciences NASU, Kyiv, Ukraine'
                ),
                array(
                        'Міжнародний центр астрономічних та медико-екологічних досліджень НАН України (МЦ АМЕД НАНУ), Київ, Україна',
                        'Международный центр астрономических и медико-экологических исследований НАНУ (МЦ АМЭИ НАНУ), Киев, Украина',
                        'International Center for Astronomical, Medical and Ecological Research (IC AMER NANU), Kyiv, Ukraine'
                ),
                array(
                        'Інститут ботаніки ім. М.Г. Холодного Національної академії наук України, Київ, Україна',
                        'Институт ботаники им. Н.Г. Холодного НАНУ, Киев, Украина',
                        'M.G. Kholodny Institute of Botany, Kyiv, Ukraine'
                ),
                array(
                        'Інститут молекулярної біології і генетики Національна академія наук України (ІМБГ НАНУ), Київ, Україна',
                        'Институт молекулярной биологии и генетики НАНУ (ИМБГ НАНУ), Киев, Украина',
                        'Institute of Molecular Biology and Genetics (IMBG NASU), Kyiv, Ukraine'
                ),
                array(
                        'Національний університет біоресурсів і природокористування України, Київ, Україна',
                        'Национальный университет биоресурсов и природопользования Украины, Киев, Украина',
                        'National University of Life and Environmental Science of Ukraine, Kyiv, Ukraine'
                ),
                array(
                        'Відділення морської геології та осадочного рудоутворення Національного науково-природничого музею Національної академії наук України (ВМГОР ННПМ НАНУ), Київ, Україна',
                        'Отдел морской геологии и осадочного рудообразования Национального научно-естественного музея НАНУ (ОМГОР ННЕМ НАНУ), Киев, Украина',
                        'The National Museum of Natural History NASU, Kyiv, Ukraine'
                ),
                array(
                        'Інститут зоології ім. І.І. Шмальгаузена Національної академії наук України, Київ, Україна',
                        'Институт зоологии им. И.И. Шмальгаузена НАНУ, Киев, Украина',
                        'I.I. Schmalhausen Institute of Zoology NASU, Kyiv, Ukraine'
                ),
                array(
                        'Інститут фізики Національної академії наук України, Київ, Україна',
                        'Институт физики НАНУ, Киев, Украина',
                        'Institute of Physics NASU, Kyiv, Ukraine'
                ),
                array(
                        'Інститут проблем матеріалознавства ім. І.М. Францевича Національної академії наук України (ІПМ НАНУ), Київ, Україна',
                        'Институт проблем материаловедения им. Францевича НАНУ (ИПМ НАНУ), Киев, Украина',
                        'Frantsevich Institute for Problems of Materials Science NASU (IPMS NASU), Kyiv, Ukraine'
                ),
                array(
                        'Інститут геофізики ім. С.І. Субботіна Національної академії наук України, Київ, Україна',
                        'Институт  геофизики им. С.И. Субботина НАНУ, Киев, Украина',
                        'The Institute of Geophysics NASU (IGP NASU), Kyiv, Ukraine'
                ),
                array(
                        'Національний центр управління та випробування космічних засобів Державного космічного агентства України (НЦУВКЗ ДКАУ), Євпаторія, Україна',
                        'Национальный центр управления и испытаний космических средств ГКАУ (НЦУИКС ГКАУ), Евпатория, Украина',
                        'National Center of Control and Testing of Space Facilities SSAU (NCCTSF SSAU), Evpatoria, Ukraine'
                ),
                array(
                        'Державне підприємство «Конструкторське бюро «Південне» ім. М.К. Янгеля, Дніпропетровськ, Україна',
                        'Государственное предприятие «Конструкторское бюро» Южное»» имени М.К. Янгеля, Днепропетровск, Украина',
                        'Yuzhnoye design office (Yuzhnoye SDO), Dniepropetrovsk, Ukraine'
                ),
                array(
                        'Інститут технічної механіки Національної академії наук та Національного космічного агентства України, Дніпропетровськ, Україна',
                        'Институт технической механики НАНУ и НКАУ (ИТМ НАНУ и НКАУ), Днепропетровск, Украина',
                        'Institute of Technical Mechanics NASU&NSAU, Dniepropetrovsk, Ukraine'
                ),
                array(
                        'Радіоастрономічний інститут Національної академії наук України (РІ НАНУ), Харків, Україна',
                        'Радиоастрономический институт НАНУ (РИ НАНУ), Харьков, Украина',
                        'Institute of Radioastronomy NASU, Kharkiv, Ukraine'
                ),
                array(
                        'Радіоастрономічний інститут Національної академії наук України, обсерваторія «УРАН-4», Харків, Україна',
                        'Радиоастрономический институт НАНУ, обсерватория "УРАН-4", Харьков, Украина',
                        'Institute of Radioastronomy NASU, URAN observatory, Kharkiv, Ukraine'
                ),
                array(
                        'Харківський центр Інституту космічних досліджень Національної академії наук та Національного космічного агентства України, Харків, Україна',
                        'Харьковский центр Института космических исследований Национальной академии наук и Национального космического агентства Украины, Харьков, Украина',
                        'Kharkiv center of Space research Institute NASU&NSAU, Kharkiv, Ukraine'
                ),
                array(
                        'Харківський національний університет імені В.Н. Каразіна, Харків, Україна',
                        'Харьковский национальный университет им. Каразина, Харьков, Украина',
                        'V.N. Karazin Kharkiv National University, Kharkiv, Ukraine'
                ),
                array(
                        'Інститут іоносфери Національної академії наук та Міністерства освіти і науки України (ІІ НАНУ та МОНУ), Харків, Україна',
                        'Институт ионосферы НАНУ и МОНУ (ИИ НАНУ и МОНУ), Харьков, Украина',
                        'Institute of Ionosphere NASU&MESU, Kharkiv, Ukraine'
                ),
                array(
                        'Національний Науковий Центр «Інститут метрології», Харків, Україна',
                        'Национальный научный центр «Институт метрологии», Харьков, Украина',
                        'National Scientific Centre "Institute of Metrology", Kharkiv, Ukraine'
                ),
                array(
                        'Харківський національний університет радіоелектроніки (ХНУРЕ), Харків, Україна',
                        'Харьковский национальный университет радиоэлектроники(ХНУРЭ), Харьков, Украина',
                        'Kharkiv National University of Radioelectronics (KNURE), Kharkiv, Ukraine'
                ),
                array(
                        'Фізико-технічний інститут низьких температур ім. Б.І. Вєркіна Національної академії наук України (ФТІНТ), Харків, Україна',
                        'Физико-технический институт низких температур им. Б.И. Веркина НАНУ (ФТИНТ), Харьков, Украина',
                        'B.Verkin Institute for Low Temperature Physics and Engineering NASU (ILTPE), Kharkiv, Ukraine'
                ),
                array(
                        'Харківський астрономічний інститут Національної академії наук України, Харків, Україна',
                        'Харьковский астрономический институт НАНУ, Харьков, Украина',
                        'Kharkiv Astronomical Institute NASU, Kharkiv, Ukraine'
                ),
                array(
                        'ДНДП «КОНЕКС», Львів, Україна',
                        'ГНИП «КОНЭКС», Львов, Украина',
                        '«CONECS» State Scientific Research Enterprise'
                ),
                array(
                        'Львівський центр Інституту космічних досліджень України Національної академії наук та Державного космічного агентства України (ЛЦ ІКД НАНУ та НКАУ), Львів, Україна',
                        'Львовский центр Института космических исследований НАНУ и НКАУ (ЛЦ ИКИ НАНУ и НКАУ), Львов, Украина',
                        'Lviv Ctntre of Institute for Space Research NASU&NSAU, Lviv, Ukraine'
                ),
                array(
                        'Національний університет «Львівська Політехніка», Львів, Україна',
                        'Национальный университет «Львовская политехника», Львов, Украина',
                        'Lviv Polytechnic National University, Lviv, Ukraine'
                ),
                array(
                        'Фізико-механічний інститут ім. Г.В. Карпенка Національної академії наук України (ФМІ НАНУ), Львів, Україна',
                        'Физико-механический институт им. Г.В. Карпенко НАНУ (ФМИ НАНУ), Львов, Украина',
                        'Karpenko Physico-Mechanical Institute NASU, Lviv, Ukraine'
                ),
                array(
                        'Ужгородський національний університет, Ужгород, Україна',
                        'Ужгородский национальный университет, Ужгород, Украина',
                        'Uzhhorod National University, Uzhhorod, Ukraine'
                ),
                array(
                        'Науково-дослідний інститут «Астрономічна обсерваторія» Одеського Національного Університету імені І. І. Мечникова, Одеса, Україна',
                        'Научно-исследовательский институт «Астрономическая обсерватория» Одесского Национального Университета имени И. И. Мечникова, Одесса, Украина',
                        'Astronomic observatory Odessa I.I.Mechnikov National University, Odessa, Ukraine'
                ),
                array(
                        'Державне підприємство „Закарпатгеодезцентр”, Мукачеве, Україна',
                        'Государственное предприятие , „Закарпатгеодезцентр”, Мукачево, Україна',
                        'The state organization "Zakarpatgeodezcentre"'
                ),
                array(
                        'Східноукраїнський національний університет імені Володимира Даля, Луганськ, Україна',
                        'Восточноукраинский национальный университет им. Владимира Даля, Луганск, Украина',
                        'East-Ukrainian National University named after Volodymyr Dahl, Luhansk, Ukraine'
                )
        );
        foreach ($orgs as $i => $org) {
            SourceMessage::createMessage(
                    "Organization_$i",
                    'Organizations',
                    array(
                            'uk' => $org[0],
                            'ru' => $org[1],
                            'en' => $org[2],
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
