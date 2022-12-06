<?php 
    class Database{
        private $host = "localhost: 3307";
        private $server = "root";
        private $password ="";
        private $dbname = "pos";
        public $conn ;
        public function getConnect(){
            $this->conn= mysqli_connect($this->host, $this->server, $this->password, $this->dbname);
            if($this->conn->connect_error){
                echo("Cannot connect.");
            }else{
                echo("Connected.");
                return($this->conn);
            }
        } 
    }
    $n = new Database();
    $n->getConnect();
?>