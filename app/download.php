<?php
include_once '../server/database/dao/ApplicationDao.php';
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