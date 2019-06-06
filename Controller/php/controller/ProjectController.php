<?php  
$x = "";
include '../data/NewProjectPDO.php';
if ($_POST['action'] === 'create') {

	register($_POST);
}
if ($_POST['action'] === 'select') {
	select();
}
if ($_POST['action'] === 'Remove') {
	Remove($_POST);
}
if ($_POST['action'] === 'ShowData') {
	ShowData($_POST);
}
if ($_POST['action'] === 'Edit') {
	Edit($_POST);
}

 	function register($pos){
        $ObjectProject = new Project();
        $ObjectProject->setPROJECT_NAME($pos['PROJECT_NAME']);
        $ObjectProject->setCOST($pos['COST']);
        $ObjectProject->setCREATION_DATE($pos['CREATION_DATE']);
        $ObjectProject->setEND_DATE($pos['END_DATE']);
       
        return NewProjectPDO::register($ObjectProject);
    }

    function select(){      
    	return NewProjectPDO::select();
    }
	 function Remove($pos){
	 	$ObjectProject = new Project();
	 	$ObjectProject->setID($pos['ID']);

	 	return NewProjectPDO::Remove($ObjectProject);
 	}
 	function ShowData($pos){
 		$ObjectProject = new Project();
 		$ObjectProject->setID($pos['ID']);
 		return NewProjectPDO::ShowData($ObjectProject);
 	}
 	function Edit($pos){
 		$ObjectProject = new Project();
 		$ObjectProject->setID($pos['ID']);
 		$ObjectProject->setPROJECT_NAME($pos['PROJECT_NAME']);
 		$ObjectProject->setCOST($pos['COST']);
 		$ObjectProject->setCREATION_DATE($pos['CREATION_DATE']);
        $ObjectProject->setEND_DATE($pos['END_DATE']);
        return NewProjectPDO::EditProject($ObjectProject);
 	}
 	
?>