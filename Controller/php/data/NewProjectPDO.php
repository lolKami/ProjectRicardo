<?php
include '../config/db_con.php';
include '../entities/Project.php';
class NewProjectPDO extends Connection{
    protected static $Connection;

    private static function getConexion()
    {
        self::$Connection = Connection::connect();
    }

    private static function desconectar()
    {
        self::$Connection = null;
    }   
    public static function register($ObjectProject){

       
        $query = "INSERT INTO project (PROJECT_NAME,COST,CREATION_DATE,END_DATE) VALUES (:PROJECT_NAME,:COST,:CREATION_DATE,:END_DATE)";

        self::getConexion();
        $result = self::$Connection->prepare($query);

        $result->bindValue(":PROJECT_NAME", $ObjectProject->getPROJECT_NAME());
        $result->bindValue(":COST", $ObjectProject->getCOST());
        $result->bindValue(":CREATION_DATE", $ObjectProject->getCREATION_DATE());
        $result->bindValue(":END_DATE", $ObjectProject->getEND_DATE());

        if ($result->execute()) {
            echo json_encode("OK");
        }else{
        echo json_encode("ERROR");
        }
    }
}
?>
