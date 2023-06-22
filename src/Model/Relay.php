<?php
namespace NostrDev\Model;

class Relay{
    private $conn;
    public $table = "relays";
    public $url;
    public function __construct($db)
    {   //pdo connection
        $this->conn = $db;
        
   }

    public function upload(){
        $sql = "INSERT INTO {$this->table}(relay_url) VALUES({$this->url})";
        $stmt = $this->conn->query($sql);
       	if($stmt){
		return true;
	}
	return false;
    }

    public function get(){
        $sql = "SELECT * FROM relays";
        $stmt = $this->conn->query($sql);
        return $stmt;
    }


}
