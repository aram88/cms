<?php
/**
 * private.php
 *
 * Common parameters for the application on private -your local environment
 */
return array(
	'modules' => array(
        // This way gii will be available only in "private" environment set
        // More than that, it will generate code in whatever endpoint it is placed.
		'class'=>'system.gii.GiiModule',
			'generatorPaths' => array(
						'ext.giix-core', // giix generators
			),
	),
	'params' => array(
		'env.code' => 'private',
		
	)
);
