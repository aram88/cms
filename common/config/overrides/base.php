<?php /** hijarian @ 27.10.13 13:10 */

return array(
    'import' => array(
        'common.components.*',
        'common.models.*',
    		'ext.giix-components.*', // giix components
    ),
    'components' => array(
        'db' => array(
            'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
            'enableParamLogging' => YII_DEBUG,
            'charset' => 'utf8'
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '/',
        ),
    	'authManager' => array(
    			'class' => 'CDbAuthManager',
    			'itemTable' => 'auth_item',
    			'itemChildTable' => 'auth_item_child',
    			'assignmentTable' => 'auth_assignment',
    	),
        'cache' => extension_loaded('apc') ?
                array(
                    'class' => 'CApcCache',
                ) :
                array(
                    'class' => 'CDbCache',
                    'connectionID' => 'db',
                    'autoCreateCacheTable' => true,
                    'cacheTableName' => 'cache',
                ),
    )
);