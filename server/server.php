<?php

function redirrectIfLoggedIn(){
    if(isset($_SESSION['username'])){
		header('Location:../app/app.php');
	}
}

function login($conn){
    $errors = array();
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$messeg = "";

		// Echo "login clicked, username is " . $user . ", password is " . $pass;
	
		if(empty($user) || empty($pass)) {
            $messeg = "Username/Password can't be empty";
            array_push($errors, $messeg);
		} else {
			$sql = "SELECT username, password FROM users WHERE username=? AND password=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($user,$pass));
		
			if($query->rowCount() >= 1) {
                session_start();
				$_SESSION['username'] = $user;
                $_SESSION['time_start_login'] = time();
				header('Location:../app/app.php');
			} else {
                $messeg = "Username/Password is wrong";
                array_push($errors, $messeg);
			}
		//	Echo $messeg;
		}
}

function register($conn){
    $errors = array();
        if($_POST['password'] !== $_POST['repeat_password']){
            $messeg = "Password is not repeated correctly.";
            array_push($errors, $messeg);

        } else {
            $user = $_POST['username'];
            $email = $_POST['email'];
            $pass = md5($_POST['password']);
            $messeg = "";

            //	Echo "login clicked, username is " . $user . ", password is " . $pass;
        
            if(empty($user) || empty($email) || empty($pass)) {
                $messeg = "Username/Email/Password can't be empty";
                array_push($errors, $messeg);
            } else {

                // TODO: check if the user already exists; now we can add existing users also

                $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
                $query = $conn->prepare($sql);
                $query->execute(array($user,$email, $pass));
            
                // TODO: check if the request is successful and response to user somehow

               // if($query->rowCount() >= 1) {
                  //  Echo $query->rowCount() . ", " . $user . ", " . $email . ", " . "$pass";
                 //   $_SESSION['username'] = $user;
                 //   $_SESSION['time_start_login'] = time();
                    header('Location:login.php');
             //   } else {
             //       $messeg = "Username/Email/Password is wrong";
             //       array_push($errors, $messeg);
             //   }
            }
        }
		//	Echo $messeg;
}

function logout(){
  //  Echo "LOGOUT";
    session_start();
    session_destroy();
   // unset($_SESSION['username']);
   header('Location:../index.php');
}

function addApp(){
    header('Location:newApp.php');
}

    $db = "mysql:host=localhost;dbname=web-app-store";
    $username = "root";
    $password = "";
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    );

    try{
        $conn = new PDO($db,$username,$password,$options);
    } catch (PDOException $e){
        echo "Error!".$e->getMessage();
    }

    $errors = array();
    redirrectIfLoggedIn();

	if(isset($_POST['login'])){
        login($conn);
    }
    
	if(isset($_POST['register'])){
        register($conn);
    }
    
    if(isset($_POST['logout'])){
      logout();
    }

    if(isset($_POST['add_app'])){
      addApp();
    }
?>