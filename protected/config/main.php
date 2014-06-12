<?php

return array(
	'name' => Constants::APP_NAME,
	'basePath' => __DIR__ . '/..',
	'defaultController' => 'point/list',
	'language' => 'ru',
	'preload' => array('log'),
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.config.Constants'
	),
	'components' => array(
		'urlManager' => array(
			'urlFormat' => 'path',
			'showScriptName' => false,
			'rules' => array(
				'login' => 'site/login',
				'points' => 'point/list',
				'point/<id:\d+>/update' => 'point/update',
				'point/<id:\d+>/delete' => 'point/delete',
				'daily_points' => 'dailyPoint/list',
				'daily_point/<id:\d+>/update' => 'dailyPoint/update',
				'daily_point/<id:\d+>/delete' => 'dailyPoint/delete',
				'backups' => 'backup/list',
				'parameters' => 'parameters/update'
			)
		),
		'db' => array(
			'connectionString' =>
				'mysql:host='
				. Constants::DATABASE_HOST
				. ';dbname='
				. Constants::DATABASE_NAME,
			'emulatePrepare' => true,
			'username' => Constants::DATABASE_USER,
			'password' => Constants::DATABASE_PASSWORD,
			'charset' => 'utf8',
			'tablePrefix' => Constants::DATABASE_TABLE_PREFIX
		),
		'clientScript' => array(
			'packages' => array(
				'jquery' => array(
					'baseUrl' => 'http://code.jquery.com/',
					'js' => array('jquery-2.1.1.min.js')
				),
				'jquery.ui' => array(
					'baseUrl' => 'http://code.jquery.com/ui/1.10.4/',
					'js' => array('jquery-ui.min.js'),
					'css' => array('themes/start/jquery-ui.css'),
					'depends' => array('jquery')
				),
				'bootstrap' => array(
					'baseUrl' =>
						'http://netdna.bootstrapcdn.com/bootstrap/3.1.1/',
					'js' => array('js/bootstrap.min.js'),
					'css' => array('css/bootstrap.min.css'),
					'depends' => array('jquery')
				)
 			)
		),
		'widgetFactory' => array(
			'widgets' => array(
				'CJuiAutoComplete' => array(
					'scriptUrl' => 'http://code.jquery.com/ui/1.10.4',
					'themeUrl' => 'http://code.jquery.com/ui/1.10.4/themes',
					'theme' => 'start'
				)
			)
		),
		'request' => array(
			'enableCsrfValidation' => true,
			'enableCookieValidation' => true
		),
		'log' => array(
			'class'=>'CLogRouter',
			'routes' => array_merge(
				array(array(
					'class' => 'CFileLogRoute',
					'levels' => 'trace, info, warning, error'
				)),
				Constants::DEBUG
					? array(array(
						'class' => 'CWebLogRoute',
						'levels' => 'trace, info, warning, error'
					))
					: array()
			)
		),
		'errorHandler' => array('errorAction' => 'site/error')
	)
);
