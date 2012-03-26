<?php

class LanguagesController extends CController {
    public function actionSwitch() {
	    $langs = Yii::app()->params['languages'];
	    $lang = '';
	    if (isset($_GET['lang'])) {
	        $lang = $_GET['lang'];
	    }
	    if (!in_array($lang, $langs)) {
	        $lang = $langs[0];
	    }

	    Yii::app()->session['language'] = $lang;
	    $this->redirect(Yii::app()->httpRequest->getUrlReferrer());
	}
}