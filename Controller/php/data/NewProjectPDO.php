<?php
include '../config/db_con.php';
include '../entities/Project.php';
class NewProjectPDO extends Connection{
    protected static $Connection;

    private static function getConnection()
    {
        self::$Connection = Connection::connect();
    }

    private static function disconnect()
    {
        self::$Connection = null;
    }   
    public static function register($ObjectProject){

       
        $query = "INSERT INTO project (PROJECT_NAME,COST,CREATION_DATE,END_DATE) VALUES (:PROJECT_NAME,:COST,:CREATION_DATE,:END_DATE)";

        self::getConnection();
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
        self::disconnect();
    }
    public static function select(){
        $query = "SELECT * FROM project";
        self::getConnection();
        $result = self::$Connection->prepare($query);
        $result->execute();
        
        if ($result->execute()) {
           while ($row = $result->fetch()) {
             $data[] = $row;
           }
           echo json_encode($data); 
        }else{
            echo json_encode("ERROR");
        }
        self::disconnect();
    }
    public static function Remove($ObjectProject){
       $query = "DELETE FROM project  WHERE ID = (:ID)";

        self::getConnection();
        $result = self::$Connection->prepare($query);

        $result->bindValue(":ID", $ObjectProject->getID());
        if ($result->execute()) {
            echo json_encode("ELIMINADO");
        }else{
        echo json_encode("ERROR");
        } 
        self::disconnect();
    }
    public static function ShowData($ObjectProject){
       $query = "SELECT * FROM project WHERE ID = (:ID)";
       self::getConnection();
       $result = self::$Connection->prepare($query);
       $result->bindValue(":ID", $ObjectProject->getID());
       if ($result->execute()) {
           while ($row = $result->fetch()) {
             $data[] = $row;
           }
           echo json_encode($data); 
        }else{
            echo json_encode("ERROR");
        }
        self::disconnect();
    }
    public static function EditProject($ObjectProject){
        $query = "UPDATE project 
        SET PROJECT_NAME = (:PROJECT_NAME),
         COST = (:COST),
         CREATION_DATE = (:CREATION_DATE),
         END_DATE = (:END_DATE) WHERE ID = (:ID)";
        self::getConnection();
        $result = self::$Connection->prepare($query);
        $result->bindValue(":ID", $ObjectProject->getID());
        $result->bindValue(":PROJECT_NAME", $ObjectProject->getPROJECT_NAME());
        $result->bindValue(":COST", $ObjectProject->getCOST());
        $result->bindValue(":CREATION_DATE", $ObjectProject->getCREATION_DATE());
        $result->bindValue(":END_DATE", $ObjectProject->getEND_DATE());
        $result->execute();
        
        if ($result->execute()) {
           echo json_encode("OK"); 
        }else{
            echo json_encode("ERROR");
        }
        self::disconnect();
    }
}
   
?>
