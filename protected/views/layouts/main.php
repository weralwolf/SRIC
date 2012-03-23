<?php
if (!Yii::app()->request->isAjaxRequest)
{
    $cs = Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('yii');
    $cs->registerScriptFile(XHtml::jsUrl('common.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('design.main.js'), CClientScript::POS_HEAD);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/extra.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/design.main.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="wrapper">
  <div class="header">
    <div class="conf_title">
    	<img src="images/conf_title.png" width="573" height="113" alt="Украинская конференция по космическим исследованиям" />
    </div>
    <div class="logo">
    	<a href="#">
    		<img src="images/logo.png" width="149" height="148" alt="" />
    	</a>
    </div>
    <div class="header_cont">
    <div class="title">Контактное лицо</div>
    <span class="grey">Скороход Татьяна</span><br/>
    +38 044 2008207<br/>
    +38 063 4518270<br/>
    <a href="mailto:SpaceConf2012@gmail.com">SpaceConf2012@gmail.com</a><br/>
    <a href="http://nearspace.ikd.kiev.ua">nearspace.ikd.kiev.ua</a>
    </div>
  </div>
  <div class="fixed_row">
  <div class="satelite"><img src="images/satelite.png" width="176" height="213" alt="" /></div>
  <?php 
	$items = array(
			array('label' => Yii::t("MenuLinks", "about_us"), 'url'=>array('/conferences/about')),
			array('label' => Conferences::model()->currentConference() . Yii::t("MenuLinks", "th_conference"), 'url'=>array('/conferences/current')),
			array('label' => Yii::t("MenuLinks", "archive"), 'url'=>array('/conferences/archive')),
			
		);
	$this->widget('zii.widgets.CMenu',array(
		'items' => $items,
	    'activeCssClass' => 'active',
		'htmlOptions' => array('class' => 'main_menu'),
	));
	?>
  <div class="right_block">
  <div class="search">
  	<input class="search_in" type="text" value="найти на сайте" onfocus="this.value='';" onblur="if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='найти на сайте';">
  </div>
  <div class="langs">
  <a href="#" class="ukr">ukr</a>
  <a href="#" class="rus">ru</a>
  <a href="#" class="en">en</a>
  </div>
  </div>
  <div class="top_blur"></div>
  </div>
  <div class="deadlines">
  <div class="deadlines_head"><div class="arrow"></div><div class="vert_text">дедлайны</div></div>
  </div>
<div class="content_block">
<div class="content_block_in"> <?php echo $content; ?></div>
</div>
 <div class="push"></div>
 </div> 
 
<div class="footer">
<div class="blur"><div class="blur_in"></div></div>
<div class="footer_in">
<a href="mailto:spaceConf2012@gmail.com" class="foot_mail">spaceConf2012@gmail.com</a>
<span>Copyright &copy; <?php echo date('Y'); ?> by Lab28.<br/>
		<?php echo Yii::powered(); ?></span>
<span class="foot_phone">+38(044) 200-82-14, 200-82-16, 200-82-17</span>
</div>
</div>
</body>
</html>
