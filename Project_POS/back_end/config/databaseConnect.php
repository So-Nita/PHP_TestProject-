<?php
class Database{
	
	private $host  = 'localhost: 3307';
    private $user  = 'root';
    private $password   = "";
    private $database  = "pos"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }

}
?>