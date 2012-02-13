<?php

/*
 * EFgMenu v1.0
 */

/**
 * Description of EFgMenu
 *
 * @author nlac
 */
Yii::import('zii.widgets.CMenu');
class EFgMenu extends CMenu {
	
	public $bDev = false;
	
	public $trigger = '';//empty->menubar, string->menu
	public $menuOptions = array();
	public $menubarOptions = array();
	public $activeCssClass = 'ui-state-active';
	

	private $isMenuBar;
	private $ulSelector = '';
/*
  protected function renderMenu($items)
  {
		if (count($items)) {
      echo CHtml::openTag('ul',$this->htmlOptions)."\n";
      $this->renderMenuRecursive($items);
      echo CHtml::closeTag('ul');
		}
  }
*/
	public function init() {
		
		if (!@$this->htmlOptions['id'])
			$this->htmlOptions['id'] = $this->getId();
		
		$this->isMenuBar = !$this->trigger;
		$this->ulSelector = is_string($this->items) ? $this->items : '#'.$this->htmlOptions['id'];

		if ($this->isMenuBar) {

			$this->menubarOptions = array_merge(array(
				'direction' => 'horizontal',
				'openOn'  => 'mouseenter',
				//'openOn'  => 'click',
				'menubarItemClass' => 'ui-widget ui-state-default ui-corner-all ui-button ui-button-text-only'
			), $this->menubarOptions);

		} else {

			$this->menuOptions = array_merge(array(

			), $this->menuOptions);
			
		}
		
		
		parent::init();


		$cs = Yii::app()->clientScript;
		$am = Yii::app()->assetManager;
		$assetsPath = $am->publish( $this->getViewPath(true) . '/../assets', false, -1, $this->bDev);

		$cs->registerCoreScript('jquery.ui');
		$cs->registerScriptFile($assetsPath . '/js/fg.menu.nlac.js');
		$cs->registerScriptFile($assetsPath . '/js/fg.menubar.nlac.js');

		$cs->registerCssFile($assetsPath . '/css/fg.menu.nlac.css');
		$cs->registerCssFile($assetsPath . '/css/fg.menubar.nlac.css');
		
		$ul = '$("' . $this->ulSelector . '")';
		$script = ';(function(){';

		if ($this->isMenuBar) {

			$script .= $ul . '.menubar(' . CJavaScript::encode($this->menubarOptions) . ',' . CJavaScript::encode($this->menuOptions) . ');';

		} else {
			
			$script .= '
var $ul=' . $ul . ',content=$.outerHTML($ul);$ul.remove();
var menuOptions =' . CJavaScript::encode($this->menuOptions) . ';
menuOptions.content = content;
$("' . $this->trigger . '").menu(menuOptions);';

		}

		$script .= '})();';
		$cs->registerScript('setupEFgMenu' . $this->getId(), $script, CClientScript::POS_END); 
	}

}
