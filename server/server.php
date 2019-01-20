<?php
include_once 'database/dao/UserDao.php';
include_once 'database/dao/ApplicationDao.php';
include_once 'database/dao/ReviewDao.php';

function redirrectIfLoggedIn(){
    if(isset($_SESSION['username'])){
		header('Location:../app/app.php');
	}
}

function login($userDao){
    $errors = array();
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
        $_SESSION['time_start_login'] = time();
		header('Location:../app/app.php');
    }

    $message = "Username/Password is wrong.";
    array_push($errors, $message);
}

function register($userDao){
    $errors = array();
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

}

function getApplication($id){
    global $applicationDao;
    $application = $applicationDao->getApplicationById($id);
    return $application;
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

?>