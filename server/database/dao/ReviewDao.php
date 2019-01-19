<?php
include_once dirname(__FILE__).'/../DatabaseConnection.php';

class ReviewDao {

    private $connection;

    public function __construct() {
        $db = new DatabaseConnection();
        $connection = $db->getConnection(); 
        $this->connection=$connection;
    }

    public function addReview($score, $comment, $reviewerName, $applicationId){
        $query = "insert into `REVIEWS` values (?,?,?,?,?)";
        $statement = $this->connection->prepare($query);
        $id = md5(uniqid());
        $statement->execute(array($score, $comment, $reviewerName, $id, $applicationId));
    }

    public function getReviewsForApplication($applicationId){
        $query = "select SCORE, COMMENT, REVIEWER_NAME FROM `REVIEWS` WHERE APPLICATION_ID=? ";
        $statement = $this->connection->prepare($query);
        $statement->execute($applicationId);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}
?>