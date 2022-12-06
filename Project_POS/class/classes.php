<?php 
    class Items{
        private $table = "product";
        public $id;
        public $name;
        public $price;
        public $discount;
        public $tax;
        public $connect;
        public function __construct($db)
        {
            $this->connect = $db;
        } 
    
        public function read(){
            if($this->id){
                $sql = $this->connect->prepare("SELECT * from ".$this->table."WHERE id = ? ");
                $sql->bind_param("i",$this->id);
            }else{
                $sql = $this->connect->prepare("SELECT * FROM ".$this->table);
            }
            $sql->execute();
            $result = $sql->get_result();
            return $result;
        }
        public function create(){
            $smt = $this->connect->prepare("INSERT INTO `$this->table`(`name`, `price`, `discount`, `tax`) VALUES (?,?,?,?)");
            $smt->bind_param("siis",$this->name,$this->price, $this->discount, $this->tax);
            if($smt->execute()){
                return true;
            }else{
                return false;
            }
            
        }
    }  
?>