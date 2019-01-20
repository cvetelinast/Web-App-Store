<?php
include_once dirname(__FILE__).'/../DatabaseConnection.php';

class ApplicationDao {

    private $connection;

    public function __construct() {
        $db = new DatabaseConnection();
        $connection = $db->getConnection(); 
        $this->connection=$connection;
    }

    public function getAllApplications(){
        $query = "select * from `APPLICATIONS`";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    public function createApplication($appName, $appDescription, $imageToUpload, $appToUpload){
        $query = "insert into `APPLICATIONS` values (?,?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $id = md5(uniqid());
        $statement->execute(array($appName, $appDescription, $imageToUpload, $appToUpload, $id));
    }

    public function getApplicationById($id){
        $query = "select * from `APPLICATIONS` where ID = ?";
        $statement = $this->connection->prepare($query);
        $statement->execute(array($id));
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>