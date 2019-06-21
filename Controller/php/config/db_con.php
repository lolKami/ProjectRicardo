<?php
class Connection{

    public static function connect(){
        try {

            $baseConnection = new PDO("mysql:host=127.0.0.1;dbname=Project", "root", "",
            	array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

            return $baseConnection;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

}
?>


