<?php
$config = array(
	// E.g. for subdir something like test/
	'base_url' => 'example/',
	'default_controller' => 'mainpage',
	'error_controller' => 'error',

	'db_host' => 'localhost',
	'db_port' => '3306',
	'db_username' => 'root',
	'db_password' => '',
	'db_name' => 'example',

    // 'mongo_host' => '10.0.1.4',
    'mongo_host' => '127.0.0.1',
    'mongo_port' => '27017',
    'mongo_username' => '',
    'mongo_password' => '',
    'mongo_dbname' => 'example',

	'salt' => '00000000001111111111222222222233', // Do not Change salt
	'open_register' => false
);
