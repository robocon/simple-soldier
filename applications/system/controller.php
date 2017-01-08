<?php

/**
 * 
 */
class Controller
{
	public $user = null;
	public $session = null;
	
	function __construct()
	{	
		// Load helper or etc
		$this->load_helper();
        $this->session = new Session_helper();
        $user_helper = new User_helper();
		$this->user = $user_helper->check_session();
	}
	
	public function load_db(){
		global $config;
		$model = new Model($config['db_host'], $config['db_port'], $config['db_name'], $config['db_username'], $config['db_password']);
		return $model;
	}
    
    public function load_mongo(){
        $mongo = ModelMongo::getMongo();
        return $mongo;
    }
	
	public function load_view($name){
		$view = new View($name);
		return $view;
	}
	
	public function load_helper(){
		$files = glob( APP_DIR . 'helpers/*.php' );
        foreach( $files as $key => $file ){
            require_once $file;
        }
	}
	
	
}
