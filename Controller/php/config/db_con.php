<?php
class Connection{

    public static function connect(){
        try {

            $baseConnection = new PDO("mysql:host=localhost;dbname=Project", "root", "",
            	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

            return $baseConnection;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
?>


