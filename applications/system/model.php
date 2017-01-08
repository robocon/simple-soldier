<?php
/**
 * 
 */
class Model	
{
	
	private $db = null;
	private static $connect = null;
	private $item = null;
	private $items = array();
	private $rows = 0;
	private $lastId = 0;
	
	function __construct($host = 'localhost', $port, $db, $user, $pass, $charset = 'UTF8'){
		try{
			$this->db = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$db, $user, $pass);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// $names = self::$set_names;
			
			// if( $_SERVER['SERVER_ADDR'] !== '192.168.1.2' ){
				$this->db->exec("SET NAMES $charset ;");
			// }
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public static function load(){
		if (self::$connect === null) {
			self::$connect = new self();
		}
		return self::$connect;
	}
	
	public function select($sql, $data = NULL){
		
		try {
			$sth = $this->prepare($sql, $data);
			$this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
			$this->rows = count($this->items);
			return true;
			
		} catch(exception $e) {
			
			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
		}
	}
	
	public function get_item(){
		if( $this->rows === 0 ){
			return false;
		}
		return $this->items['0'];
	}
	
	public function get_items(){
		return $this->items;
	}
	
	public function get_rows(){
		return $this->rows;
	}
	
	public function insert($sql, $data = NULL ){
		try {
			
			$this->prepare($sql, $data);
			$this->lastId = $this->db->lastInsertId();
			return true;
			
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}

	public function update($sql, $data = NULL ){
		try {
			
			$this->prepare($sql, $data);
			return true;
		
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}
	
	public function get_last_id(){
		return $this->lastId;
	}
	
	public function prepare($sql, $data){
		
		$sth = $this->db->prepare($sql);
			
		if( !is_null($data) ){
			foreach($data as $key => &$value){
				$sth->bindValue( $key, $value);
			}
		}
		
		$sth->execute();
		return $sth;
		
	}
	
	public function delete($sql, $data = NULL ){
		try {
			
			$this->prepare($sql, $data);
			return true;
			
		} catch(Exception  $e) {

			// Keep error into log file
			$log_id = $this->set_log($e);
			$msg = array('error' => $e->getMessage(), 'id' => $log_id);
			return $msg;
			
		}
	}
	
	public function set_log($e){
		$id = uniqid();
		$data = array(
			'id' => $id.' ',
			'date' => '['.date('Y-m-d H:i:s').'] ',
			'request' => $_SERVER['REQUEST_URI'].' - ',
			'msg' => $e->getMessage()."\n"
		);
		
		file_put_contents('logs/mysql-errors.log', $data, FILE_APPEND);
		return $id;
	}
	
}
