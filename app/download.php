<?php
include_once '../server/database/dao/ApplicationDao.php';
include('../server/server.php');
session_start();
if(!isset($_SESSION['username'])){
    header('Location:../index.php');
}
if (isset($_SESSION['last_activity']) && 
    (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
    header('Location:../index.php');
}
$_SESSION['last_activity'] = time();

$application = getApplication($_GET['id']);
$applicationDao = new ApplicationDao();

$application = $applicationDao->getApplicationById($_GET['id']);
$fileName = $application['NAME'].'.zip';

$fileContent = $application['SOURCE'];

header("Cache-Control: no-cache private");
header("Content-Description: File Transfer");
header('Content-disposition: attachment; filename='.$fileName);
header("Content-Type: application/zip");
header("Content-Transfer-Encoding: binary");
header('Content-Length: '. strlen($fileContent));
echo $fileContent;

?>