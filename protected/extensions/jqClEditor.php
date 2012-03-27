<?php

class jqClEditor extends CComponent{
/**
	 * @brief retrieve the script file name
	 */
	protected static function scriptName($css=false) {
		// the script is for the minified version by default
		// change it to suit your needs
		return $css ? 'jquery.cleditor.css' : 'jquery.cleditor.min.js';
	}
	
	/**
	 * @brief register core and clEditor js needed files
	 */
	protected static function registerScript() {
		$cs = Yii::app()->clientScript;
		
		
		$assets = Yii::getPathOfAlias('application.widgets'). DIRECTORY_SEPARATOR . 'cleditor' . DIRECTORY_SEPARATOR;
		$aUrl = Yii::app()->getAssetManager()->publish($assets);
		
		// first in - first out so we render 2 - 1 scirpts (jquery on top)
		$cs->registerScriptFile($aUrl. DIRECTORY_SEPARATOR .self::scriptName());
		
		$cs->registerCoreScript('jquery');
		
		$cs->registerCssFile($aUrl . DIRECTORY_SEPARATOR . self::scriptName(true));
	}
	
	/**
	 * @brief register the jsSelector js code needed to apply the editor
	 * @param jsSelector string the selector jquery to select html element(s) to apply tooltips
	 * @param options array) the clEditor js options
	 */
	public static function clEditor($jsSelector, $options = array()) {
		
		self::registerScript();

		Yii::app()->clientScript->registerScript(__CLASS__.$jsSelector, '
			jQuery("'.$jsSelector.'").cleditor('.CJavaScript::encode($options).');
		');
	}
	
	public $options = array(); // array general clEditor js options
	
	public function __construct($params = array()) {
		foreach ($params as $p => $val) $this->$p = $val;
	}
	
	/**
	 * @brief instance method to apply jcarousel on a widget or on any html item. can override general options.
	 * @param widgetOrSelector mixed  a widget instance or a jquery selector
	 * @param specific_opts specific options to pass to addClEditor javascript code
	 */
	public function addClEditor($widgetOrSelector, $specific_opts = array()) {
		
		$jsSelector = is_string($widgetOrSelector) ?  $widgetOrSelector : '#'.$widgetOrSelector->id;
		 
		self::clEditor($jsSelector, array_merge($this->options, $specific_opts));
	}
}