<?php

class Database{
    public static $con;
    public static $db;

    public function __construct(){
      $this->user="root";$this->pass="toor";$this->host="localhost";$this->ddbb="syscob";
    }
	
    function initConexion(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		$con->query("set sql_mode=''");
		return $con;
	}

    public static function getConexion(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->initConexion();
		}
		return self::$con;
	}

    public static function closeConexion(){
		if(self::$con!=null && self::$db!=null){
			 self::$con->close();
			 self::$con=null;
			 self::$db=null;
		}
	}

	public static function getError(){
		return self::$con->error;
	}

	public static function getData($sql){
		$connection = Database::getConexion();	
		$query = $connection->query($sql);
		Database::closeConexion();
		return $query;
	}

    public static function insertData($sql){
		$connection = Database::getConexion();	
		$result = $connection->query($sql);
		
		if(!$result){
		  return array(false,Database::getError());
		}
		return array(true,"Registro Guardado");
	}

	public static function updateData($sql){
		$connection = Database::getConexion();	 
		$result = $connection->query($sql);
		
		if(!$result){
		  return array(false,Database::getError());
		}
		
		return array(true,"Registro Actualizado");
	} 

	public static function deleteData($sql){
		$connection = Database::getConexion();	
		$result = $connection->query($sql);
		
		if(!$result){
		  return array(false,Database::getError());
		}
		
		return array(true,"Registro Eliminado");
	} 

	public static function close(){
		Database::closeConexion();
		return true;
	} 


}


?>
  
