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

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">
		<div id="header">
			<div id="logo">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</div>
		</div>
		<!-- header -->

		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
			        'items'=>array(
			                array('label'=>'Admin', 'url'=>array('/site/admin')),
			                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			                array('label' => 'Participants', 'url' => array('/participants/admin')),
			                array('label' => 'Pages', 'url' => array('/pages/admin')),
			                array('label' => 'Messages', 'url' => array('/sourceMessage/admin')),
			                array('label' => 'Sections', 'url' => array('/sections/admin')),
			                array('label' => 'Countries', 'url' => array('/countries/admin')),
			                array('label' => 'Living Places', 'url' => array('/accommodationPlaces/admin')),
			                array('label' => 'Rooms', 'url' => array('/accommodationPlacesRoomsTypes/admin')),
			                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
			                array('label'=>'Site', 'url'=>array('/')),
			        ),
		)); ?>
		</div>
		<!-- mainmenu -->

		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		        'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->

		<?php echo $content; ?>

		<div id="footer">
			Copyright &copy;
			<?php echo date('Y'); ?>
			by My Company.<br /> All Rights Reserved.<br />
			<?php echo Yii::powered(); ?>
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
