<?php
define('DB_HOST', 'localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','todoapp');

class DatabaseConnection{

    public function __construct(){

     $con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        if($con->connect_error){
            die("<h1>Connection failed </h1>");
        }
        return $this->con = $con;
        }


}
?>