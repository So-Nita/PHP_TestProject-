<?php
class parentModel{
    public $name;
    public function __construct($db){
        $this->conn = $db;
    }	
    function update($data,$tabel,$id){
        foreach($data as $key=>$val) {
            $cols[] = "`$key` = '$val'";
        }
        $sql = "UPDATE `$tabel` SET " . implode(', ', $cols) . " WHERE id=$id";
        // $sql =" UPDATE `$t` SET `title`='kon mommy',`load`='12',`rep`='12',`text`='I love oml' WHERE `id`=$id";
        $qry = mysqli_query($this->conn,$sql);
        if ($qry === TRUE) {
            return true;
          } else {
            return false;
        }
    }
    function delete($table,$id){
        $sql = "DELETE FROM `$table` WHERE `id`=$id";
        $qry = mysqli_query($this->conn,$sql) ;
        if ($qry === TRUE) {
            return true;
          } else {
            return false;
        }
    }
    function insert($data,$table){
        $columns = implode("`, `",array_keys($data));
        if($data['pro_id']=="0"){
            foreach($this->readID('product') as $key){
                $k=$key['pro_id'];
                $data['pro_id']="$k";
                $val = implode("', '",array_values($data));
                $sql = "INSERT INTO `$table`(`$columns`) VALUES ('$val')";
                $qry = mysqli_query($this->conn,$sql); 
            } 
            if ($qry === TRUE) {
                return true;
              } else {
                return false;
            }
        }else{
        $val = implode("', '",array_values($data));
        $sql = "INSERT INTO `$table`(`$columns`) VALUES ('$val')";
        $qry = mysqli_query($this->conn,$sql);   
        if ($qry === TRUE) {
            return true;
          } else {
            return false;
        }
        }
    }
    function readID($tabel){
        $sql = "SELECT `pro_id` FROM ". $tabel;
        $result = mysqli_query($this->conn,$sql);
        return $result;
    }
    function read($tabel,$table_1 = null,$tabel_2 = null){
        $sql = "SELECT * FROM ". $tabel;
        if($tabel_1 != ""){
            $sql .= "JOIN ".$tabel_1." ON ".$tabel.".pro_id = ".$tabel_1.".pro_id";
        }
        if($tabel_2 != ""){
            $sql .= "JOIN ".$tabel_2." ON ".$tabel.".pro_id = ".$tabel_2.".pro_id";
        }
        // $paginate = "SELECT count(*) FROM ". self::$table;

        $per_page = 10;
        $page = isset($_GET['page']) && $_GET['page'] != "" ? $_GET['page'] : 1;

        $totalpage = ($page - 1) * $per_page;
        if (isset($_GET['id']) && $_GET['id'] != ""){
            $sql .= " WHERE `id`='{$_GET['id']}'";
        }
        if (isset($_POST['search']) && $_POST['search'] != ""){
            $sql .= " WHERE `name` like '%{$_POST['search']}%'";
        }

        $sql .= " LIMIT $totalpage, $per_page";
        $result = $this->conn->query($sql);
        return $result;
    }
}

?>