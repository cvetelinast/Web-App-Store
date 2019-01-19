<?php
 
class DatabaseConnection {

    private $host;
    private $username;
    private $password;
    private $databaseName;

    public function __construct() {
        $dbIni = parse_ini_file(dirname(__FILE__).'/config/ini/database_config.ini');
        $this->host = $dbIni['HOST'];
        $this->databaseName = $dbIni['DATABASE_NAME'];
        $this->username = $dbIni['USERNAME'];
        $this->password = $dbIni['PASSWORD'];

    }

    public function getConnection(){
        $connection = null;
        try{
            $connection = new PDO("mysql:host=". $this->host. ";dbname=". $this->databaseName, $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }

        return $connection;
    }
}
?>