<?php

if (!Yii::app()->request->isAjaxRequest) {
    $cs = Yii::app()->clientScript;
    $cs->registerCoreScript('jquery');
    $cs->registerCoreScript('yii');
    $cs->registerScriptFile(XHtml::jsUrl('common.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('jquery.jqtransform.js'), CClientScript::POS_HEAD);
    $cs->registerScriptFile(XHtml::jsUrl('design.main.js'), CClientScript::POS_HEAD);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/extra.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/design.main.css" />
<title><?php echo Yii::app()->dbMessages->translate("MenuLinks", "site_title") ?>
</title>
</head>

<body>
	<div class="wrapper">
		<div class="header">
			<div class="conf_title">
				<img src="images/conf_title_<?php echo Yii::app()->language?>.png"
					width="573" height="113"
					alt="<?php echo Yii::app()->dbMessages->translate("MenuLinks", "site_title")?>" />
			</div>
			<div class="logo">
				<a href="#"> <img src="images/logo.png" width="149" height="148"
					alt="" />
				</a>
			</div>
			<div class="header_cont">
				<div class="title">
					<?php echo Yii::app()->dbMessages->translate("MenuLinks", "contact_person") ?>
				</div>
				<span class="grey">
					<?php echo Yii::app()->dbMessages->translate("ContactInfo", "tanik_skhorohodik") ?>
				</span>
				<br />
				<?php echo Yii::app()->dbMessages->translate("ContactInfo", "phone_1") ?>
				<br />
				<?php echo Yii::app()->dbMessages->translate("ContactInfo", "phone_2") ?>
				<br /> <a
					href="mailto:<?php echo Yii::app()->dbMessages->translate("ContactInfo", "email") ?>">
					<?php echo Yii::app()->dbMessages->translate("ContactInfo", "email") ?>
					</a><br />
				<a href="http://nearspace.ikd.kiev.ua">nearspace.ikd.kiev.ua</a>
			</div>
		</div>
		<div class="fixed_row">
			<div class="satelite">
				<img src="images/satelite.png" width="176" height="213" alt="" />
			</div>
			<?php
			$items = array(
			        array(
			                'label' => Yii::app()->dbMessages->translate("MenuLinks", "about_us"),
			                'url' => array('pages/view', 'id' => 1),
			        ),
			        array(
			                'label' => "13" . Yii::app()->dbMessages->translate("MenuLinks", "th_conference"),
			                'url' => Pages::menuLinkURL(),
			                'active' => Pages::menuLinkActive(),
			        ),
			        array(
			                'label' => Yii::app()->dbMessages->translate("MenuLinks", "archive"),
			                'url' => array('/pages/notImplemented'),
			        ),

			);
			$this->widget('zii.widgets.CMenu', array(
			        'items' => $items,
			        'activeCssClass' => 'active',
			        'htmlOptions' => array('class' => 'main_menu'),
			));
			?>
			<div class="right_block">
				<div class="search">
					<input class="search_in" type="text"
						value="<?php echo Yii::app()->dbMessages->translate("MenuLinks", "search_query")?>"
						onfocus="this.value='';"
						onblur="if (this.value != '') {this.onfocus = function() {this.style.backgroundColor='#f3fdff';};} else this.value='<?php echo Yii::app()->dbMessages->translate("MenuLinks", "search_query")?>';" />
				</div>
				<div class="langs">
					<a href="<?php echo Yii::app()->createUrl('languages/switch', array('lang' => Yii::app()->params['languages'][0])); ?>"
						class="ukr<?php echo Yii::app()->language == 'uk' ? ' active' : ''?>">ukr</a>
					 <a	href="<?php echo Yii::app()->createUrl('languages/switch', array('lang' => Yii::app()->params['languages'][1])); ?>"
						class="rus<?php echo Yii::app()->language == 'ru' ? ' active' : ''?>">ru</a>
					<a href="<?php echo Yii::app()->createUrl('languages/switch', array('lang' => Yii::app()->params['languages'][2])); ?>"
						class="en<?php echo Yii::app()->language == 'en' ? ' active' : ''?>">en</a>
				</div>
			</div>
			<div class="top_blur"></div>
		</div>
		<div class="deadlines">
			<div class="deadlines_head">
				<div class="arrow"></div>
				<div class="vert_text">
					<?php echo Yii::app()->dbMessages->translate("MenuLinks", "deadlines") ?>
				</div>
			</div>
			<div class="deadline_text">
                <?php echo Yii::app()->dbMessages->translate("MenuLinks", "deadlines_content") ?>
            </div>
		</div>
		<div class="content_block">
			<div class="content_block_in">
				<?php echo $content; ?>
			</div>
		</div>
		<div class="push"></div>
	</div>

	<div class="footer">
		<div class="blur">
			<div class="blur_in"></div>
		</div>
		<div class="footer_in">
			<a href="mailto:spaceConf2012@gmail.com" class="foot_mail"
				style="font-weight: 100;">
				<?php echo Yii::app()->dbMessages->translate("ContactInfo", "email") ?>
				</a> <span>&copy;
				2012 Developed in <?php echo CHtml::link('Space Research Institute NASU-NSAU', array('site/admin'), 
				        array('style' => 'text-decoration: none; color: #cdcfcf; font-size: 12px; font-weight: 100;')); ?><br />
				<?php //echo Yii::powered(); ?> <!-- 				Powered by <a href="http://www.yiiframework.com/" rel="external">Yii Framework</a>  -->
			</span> <span class="foot_phone">
			<?php echo Yii::app()->dbMessages->translate("ContactInfo", "foot_phones") ?>
			</span>
		</div>
	</div>
</body>
</html>
