<?php

// Include BASE System
require_once APP_DIR.'system/config.php';
require_once APP_DIR.'functions.php';
require_once APP_DIR.'system/model.php';
require_once APP_DIR.'system/modelmongo.php';
require_once APP_DIR.'system/view.php';
require_once APP_DIR.'system/controller.php';

function bootstrap(){
	global $config;
    
	// Cut off '/' after subdir
	$request_base = substr($config['base_url'], 0, -1);

	
	// if REQUEST_URI have subdir
	$request_uri = '';
	if( $_SERVER['REQUEST_URI'] !== '/' ){
		$request_uri = substr($_SERVER['REQUEST_URI'], 1);
	}

	// replace subdir with empty
	if( !empty($request_base) ){
		$request_uri = str_replace( $request_base.'/', '', $request_uri );
	}

	// Default class and method name
	$controller = 'mainpage';
	$method = 'base';

	if( !empty($request_uri) ){
		$controller = $request_uri;

		if( strpos($request_uri, '/') > 0 ){

            $items = explode('/', $request_uri, 3);
            $count = count($items);

            if( $count === 2 ){
                $controller = $items['0'];
                $method = $items['1'];
            }else if( $count === 3 ){
                $controller = $items['0'];
                $method = $items['1'];
                $params = $items['2'];
            }
		}
	}

	// explode params and add it into method
	if(!empty($params)){
		$params = explode('/', $params);
	}else{
		$params = array();
	}

	$path = APP_DIR.'controllers/'.$controller.'.php';

	// Check path
	if(file_exists($path) !== false){
		require_once $path;

	}else{
		require_once APP_DIR.'controllers/'.$config['error_controller'].'.php';
		$controller = 'Error';
		$method = 'base';
	}

	$controller_name = ucfirst($controller);

	if(class_exists($controller_name)){
		$obj = new $controller_name();
        if( !method_exists($obj, $method) ){
            redirect('error');
        }

		call_user_func_array(array($obj, $method), $params);
	}

}
