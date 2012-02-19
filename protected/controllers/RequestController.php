<?php
class RequestController extends Controller
{
	/**
	 * @return array actions
	 */
	public function actions()
	{
		return array(
			'suggestCountry'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Countries',
				'methodName'=>'suggest',
			),
			'suggestCity'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Cities',
				'methodName'=>'suggest',
			),
			'suggestOrganization'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'Organizations',
				'methodName'=>'suggest',
			),
			'fillTree'=>array(
				'class'=>'ext.actions.XFillTreeAction',
				'modelName'=>'Menu',
				'showRoot'=>false
			),
			'treePath'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'Menu',
				'attributeName'=>'pathText',
			),
			'loadContent'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'Content',
				'attributeName'=>'content',
			),
			'saveTitle'=>array(
				'class'=>'ext.actions.XEditableAction',
			),
			'saveContent'=>array(
				'class'=>'ext.actions.XEditableAction',
				'markdown'=>true,
			),
			'uploadFile'=>array(
				'class'=>'ext.actions.XHEditorUpload',
			),
			'suggestAuPlaces'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'AdminUnit',
				'methodName'=>'suggestPlaces',
				'limit'=>30
			),
			'suggestAuHierarchy'=>array(
				'class'=>'ext.actions.XSuggestAction',
				'modelName'=>'AdminUnit',
				'methodName'=>'suggestHierarchy',
				'limit'=>30
			),
			'fillAuTree'=>array(
				'class'=>'ext.actions.XFillTreeAction',
				'modelName'=>'AdminUnit',
				'showRoot'=>false,
			),
			'viewUnitPath'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'AdminUnit',
				'attributeName'=>'rootlessPath',
			),
			'viewUnitLabel'=>array(
				'class'=>'ext.actions.XAjaxEchoAction',
				'modelName'=>'AdminUnit',
				'attributeName'=>'label',
			),
		);
	}

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array(
					'suggestCountry', 'suggestCity', 'suggestOrganization','legacySuggestCountry','fillTree','treePath','loadContent',
					'suggestAuPlaces','suggestAuHierarchy','fillAuTree','viewUnitPath','viewUnitLabel'
				),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('saveTitle','saveContent','uploadFile'),
				//'ips'=>$this->ips,
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
}