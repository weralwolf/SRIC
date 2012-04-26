<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'Conference',
        'defaultController' => 'pages',
        'language' => 'ua',

        // preloading 'log' component
        'preload'=>array('log'),

        // autoloading model and component classes
        'import'=>array(
                'application.models.*',
                'application.components.*',
                'application.controllers.*',
                'ext.components.database.*',
                'ext.widgets.portlet.XPortlet',
                'ext.helpers.XHtml',
                'ext.modules.help.models.*',
                'ext.modules.lookup.models.*',
        ),

        'modules'=>array(
                // uncomment the following to enable the Gii tool
                'lookup'=>array(
                        'class'=>'ext.modules.lookup.LookupModule',
                        'lookupLayout'=>'application.views.layouts.leftbar',
                        'lookupTable'=>'tbl_lookup',
                        'safeTypes'=>array('eyecolor'),
                        'leftPortlets'=>array(
                                'ptl.ModuleMenu'=>array()
                        )
                ),
                'help'=>array(
                        'class'=>'ext.modules.help.HelpModule',
                        'helpLayout'=>'application.views.layouts.leftbar',
                        'helpTable'=>'tbl_help',
                        'leftPortlets'=>array(
                                'ptl.ModuleMenu'=>array()
                        ),
                        'editorCSS'=>'editor.css',
                        'editorUploadRoute'=>'/request/uploadFile',
                ),
                /*
                 'gii'=>array(
                         'class'=>'system.gii.GiiModule',
                         'password'=>'Enter Your Password Here',
                         // If removed, Gii defaults to localhost only. Edit carefully to taste.
                         'ipFilters'=>array('127.0.0.1','::1'),
                 ),
*/
        ),

        // application components
        'components'=>array(
                'user'=>array(
                        // enable cookie-based authentication
                        'allowAutoLogin'=>true,
                ),
                // uncomment the following to enable URLs in path-format
                /*
'urlManager' => array(
        'urlFormat'=>'path',
        'rules' => array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        ),
),
*/
                /*
                 'db'=>array(
                         'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
                 ),
*/
                'messages' => array(
                        'class'=>'CPhpMessageSource',
                ),
                'dbMessages' => array(
                        'class' => 'CDbMessageSource',
                        'connectionID' => 'db',
                ),
                'session' => array (
                        'class' => 'system.web.CDbHttpSession',
                        'connectionID' => 'db',
                        'sessionTableName' => 'YiiSession',
                        'autoStart' => true,
                        'sessionName' => 'SRIConferenceSite'
                ),
                // uncomment the following to use a MySQL database
                'db' => require('db.conf.php'),
                        //			'enableParamLogging' => true,
//			'enableProfiling' => true,
                'httpRequest' => array(
                        'class' => 'CHttpRequest',
                ),

                'errorHandler'=>array(
                        // use 'site/error' action to display errors
                        'errorAction'=>'site/error',
                ),
                'log'=>array(
                        'class'=>'CLogRouter',
                        'routes'=>array(
                                array(
                                        'class'=>'CFileLogRoute',
                                        'levels'=>'error, warning, info',
                                ),
                                /*				array(
                                 'class'=>'CWebLogRoute',
                                        'enabled' => YII_DEBUG
                                ),
*/
                                array(
                                        'class' => 'CProfileLogRoute',
                                        'enabled' => YII_DEBUG,
                                        //'showInFireBug' => true,
                                ),
                        ),
                ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>require(dirname(__FILE__).'/params.php'),
);