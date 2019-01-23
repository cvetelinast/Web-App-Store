<?php
include_once 'database/dao/UserDao.php';
include_once 'database/dao/ApplicationDao.php';
include_once 'database/dao/ReviewDao.php';
$timeout_duration = 180;

function redirrectIfLoggedIn(){
    if(isset($_SESSION['username'])){
		header('Location:../app/applications.php');
	}
}

function login($userDao){
    global $errors;
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if(empty($username) || empty($password)) {
        $message= "Username/Password can't be empty.";
        array_push($errors, $message);
        return;
    }

    $userExists = $userDao->checkIfUserExists(array($username,$password));
    if($userExists){
        session_start();
		$_SESSION['username'] = $username;
        $_SESSION['last_activity'] = time();
		header('Location:../app/applications.php');
    }

    $message = "Username/Password is wrong.";
    array_push($errors, $message);
}

function register($userDao){
    global $errors;
    if($_POST['password'] !== $_POST['repeat_password']){
        $message = "Password is not repeated correctly.";
        array_push($errors, $message);
        return;
    }

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(empty($username) || empty($password)) {
        $message = "Username/Email/Password can't be empty.";
        array_push($errors, $message);
        return;
    }

    $userExists = $userDao->checkIfUserExistsByName($username);
    if($userExists){
        $message = "User already exists.";
        array_push($errors, $message);
        return;
    }

    $userDao->addUser(array($username, $password));
    header('Location:login.php');
}

function logout(){
    session_start();
    session_destroy();
    header('Location:../index.php');
}

function addApp(){
    header('Location:addApplication.php');
}

function getApplications(){
    global $applicationDao;
    $result = $applicationDao->getAllApplications();
    return $result;
}

function addApplication(){
    global $errors;
    global $applicationDao;
    $appName = $_POST['appName'];
    $appDescription = $_POST['appDescription'];
    $imageToUpload = file_get_contents($_FILES["imageToUpload"]["tmp_name"]);
    $appToUpload = file_get_contents($_FILES["appToUpload"]["tmp_name"]);

    if(empty($appName) || empty($appDescription) || empty($imageToUpload) || empty($appToUpload)) {
        $message= "Incorrect input data.";
        array_push($errors, $message);
        return;
    }

    $applicationDao->createApplication($appName, $appDescription, $imageToUpload, $appToUpload);
    header('Location:../app/applications.php');
}

function addReview(){
    global $errors;
    global $reviewDao;
    $score = $_POST['score'];
    $comment = $_POST['comment'];
    $applicationId = $_POST['add_review_for_application'];

    session_start();
    if(!isSet($_SESSION['username'])){
        return;
    }

    $reviewerName = $_SESSION['username'];
    if(empty($score) || empty($comment) || empty($applicationId) || empty($reviewerName)){
        $message= "Incorrect input data.";
        array_push($errors, $message);
        return;
    }

    $reviewDao->addReview($score, $comment, $reviewerName, $applicationId);
}

function getApplication($id){
    global $applicationDao;
    $application = $applicationDao->getApplicationById($id);
    return $application;
}

function getReviewsForApplication($applicationId){
    global $reviewDao;
    $reviews = $reviewDao->getReviewsForApplication($applicationId);
    return $reviews;
}

$userDao = new UserDao();
$applicationDao = new ApplicationDao();
$reviewDao = new ReviewDao();

$errors = array();
redirrectIfLoggedIn();

if(isset($_POST['login'])){
    login($userDao);
}

if(isset($_POST['register'])){
    register($userDao);
}

if(isset($_POST['logout'])){
    logout();
}

if(isset($_POST['add_app'])){
    addApp();
}

if(isset($_POST['upload'])){
    addApplication();
}

if(isset($_POST['add_review_for_application'])){
    addReview();
}

?>