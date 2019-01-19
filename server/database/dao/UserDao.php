<?php
include_once dirname(__FILE__).'/../DatabaseConnection.php';

class UserDao {

    private $connection;

    public function __construct() {
        $db = new DatabaseConnection();
        $connection = $db->getConnection(); 
        $this->connection=$connection;
    }

    public function addUser($userDetails){
        $query = "insert into `USERS` values (?,?)";
        $statement = $this->connection->prepare($query);
        $statement->execute($userDetails);
    }

    public function checkIfUserExists($userDetails){
        $query = "select * FROM `USERS` WHERE USERNAME=? AND PASSWORD=? ";
        $statement = $this->connection->prepare($query);
        $statement->execute($userDetails);
        if($statement->rowCount() >= 1) {
            return true;
        }

        return false;
    }

    public function checkIfUserExistsByName($userName){
        $query = "select * FROM `USERS` WHERE USERNAME=?";
        $statement = $this->connection->prepare($query);
        $statement->execute(array($userName));
        if($statement->rowCount() >= 1) {
            return true;
        }

        return false;
    }
}
?>