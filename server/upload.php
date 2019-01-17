<?php
if(isset($_POST["upload"])) {
    $target_dir = "../uploads/";

    $imageDestination = $target_dir . basename($_FILES["imageToUpload"]["name"]);
    $appDestination = $target_dir . basename($_FILES["appToUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imageDestination,PATHINFO_EXTENSION));
    $appFileType = strtolower(pathinfo($appDestination,PATHINFO_EXTENSION));

    // Check if the files are not fake

        $imageSize = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
        $appSize = filesize($_FILES["appToUpload"]["tmp_name"]);

        if($imageSize !== false && $appSize !== false) {
            echo "The first file is an image - " . $imageSize["mime"] . ".";
            echo "The second file is valid - " . $appSize["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File(s) not valid.";
            $uploadOk = 0;
        }

    // Check if file already exists
    // if (file_exists($imageDestination)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    // }
    // Check file size >500KB
    if ($_FILES["imageToUpload"]["size"] > 500000) {
        echo "Sorry, your image is too large.";
        $uploadOk = 0;
    }
    // Check file size >50MB
    if ($_FILES["appToUpload"]["size"] > 50000000) {
        echo "Sorry, your app is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // 
    if($appFileType != "rar" && $appFileType != "zip" && $appFileType != "7z"){
        echo "Sorry, only RAR, ZIP & 7Z files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $imageDestination)) {
            echo "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        if (move_uploaded_file($_FILES["appToUpload"]["tmp_name"], $appDestination)) {
            echo "The file ". basename( $_FILES["appToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>