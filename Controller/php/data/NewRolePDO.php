<?php
include '../config/db_con.php';
include '../entities/role.php';
class NewRolePDO extends Connection{
    protected static $Connection;

    private static function getConnection()
    {
        self::$Connection = Connection::connect();
    }

    private static function disconnect()
    {
        self::$Connection = null;
    }   
   
    public static function registerRole($ObjectRole){
        $query = "INSERT INTO role (DESCRIPTION) VALUES (:DESCRIPTION)";

        self::getConnection();
        $result = self::$Connection->prepare($query);

        $result->bindValue(':DESCRIPTION', $ObjectRole->getDESCRIPTION());

        if ($result->execute()) {
            echo json_encode("OK");
        }else{
        echo json_encode("ERROR");
        }
        self::disconnect();
    }


    public static function selectRol(){
        $query = "SELECT * FROM role";
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
    public static function RemoveRol($ObjectRole){
        $query = "DELETE FROM role  WHERE ID_ROLE = (:ID_ROLE)";
        self::getConnection();
        $result = self::$Connection->prepare($query);
        $result->bindValue(":ID_ROLE", $ObjectRole->getID_ROLE());
        if ($result->execute()) {
            echo json_encode("ELIMINADO");
        }else{
        echo json_encode("ERROR");
        } 
        self::disconnect();
    }
    public static function ShowDataRol($ObjectRole){
       $query = "SELECT * FROM role WHERE ID_ROLE = (:ID_ROLE)";
       self::getConnection();
       $result = self::$Connection->prepare($query);
       $result->bindValue(":ID_ROLE", $ObjectRole->getID_ROLE());
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
    public static function EditRol($ObjectRole){
        $query = "UPDATE role SET DESCRIPTION = (:DESCRIPTION)
         WHERE role.ID_ROLE = (:ID_ROLE)";
        self::getConnection();
        $result = self::$Connection->prepare($query);
        $result->bindValue(":ID_ROLE", $ObjectRole->getID_ROLE());
        $result->bindValue(":DESCRIPTION", $ObjectRole->getDESCRIPTION());       
        if ($result->execute()) {
           echo json_encode("OK"); 
        }else{
            echo json_encode("ERROR");
        }
        self::disconnect();
    }

}
   
?>
