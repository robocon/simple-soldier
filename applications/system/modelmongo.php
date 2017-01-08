<?php

class ModelMongo{
    
    public static $db = false;
    
    public static function getMongo(){
        global $config;
        
        $mongo = new MongoClient($config['mongo_host'].':'.$config['mongo_port']);
        self::$db = $mongo->$config['mongo_dbname'];
        
        return self::$db;
    }
    
}