<?php  
include '../data/NewProjectPDO.php';
if ($_POST['action'] === 'create') {

	register($_POST);
}
 function register($pos){
        $ObjectProject = new Project();
        $ObjectProject->setPROJECT_NAME($pos['PROJECT_NAME']);
        $ObjectProject->setCOST($pos['COST']);
        $ObjectProject->setCREATION_DATE($pos['CREATION_DATE']);
        $ObjectProject->setEND_DATE($pos['END_DATE']);
       
        return NewProjectPDO::register($ObjectProject);
    }
?>