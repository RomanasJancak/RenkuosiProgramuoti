<?php
//PDO - php DAta objects
class DatabaseManager{
    //autentifikacijos kintamieji
    private $host='localhost';
    private $user='phpuser';
    private $password='123456';
    //private $database='shared_biudzetas';
    private $database='production';
    protected $conn;//connection


    public function __construct(){
        try{
        $this->conn = new PDO("mysql::host=$this->host;dbname=$this->database",$this->user,$this->password);
        }catch(PDOException $e){
            echo "Klaida : ". $e->getMessage();
        }
    
    }
    public function select(){
        
        //SELECT * FROM `vartotojai` WHERE 1
        $sql = "SELECT * FROM `vartotojai` WHERE 1";
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//kad rodytu klaidas
        //paruosti uzklausa vykdymui
        $stmt = $this->conn->prepare($sql);
        try{
        $stmt->execute();
    }catch(PDOException $e){
        echo "Klaida : ". $e->getMessage();
    }
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        var_dump($result);
    }
    public function insert(){

    }
    public function update(){

    }
    public function delete(){

    }
    public function __destruct(){
        $this->conn=null;
    }
}

$databaseManager  = new DatabaseManager();
$databaseManager->select();
?>