<?php  
include '../data/NewProjectPDO.php';
if ($_POST['action'] === 'createProject') {
	registerProject($_POST);
}
if ($_POST['action'] === 'selectProject') {
	selectProject();
}
if ($_POST['action'] === 'RemoveProject') {
	RemoveProject($_POST);
}
if ($_POST['action'] === 'ShowDataProject') {
	ShowDataProject($_POST);
}
if ($_POST['action'] === 'EditProject') {
	EditProject($_POST);
}

 	function registerProject($pos){
        $ObjectProject = new Project();
        $ObjectProject->setPROJECT_NAME($pos['PROJECT_NAME']);
        $ObjectProject->setCOST($pos['COST']);
        $ObjectProject->setCREATION_DATE($pos['CREATION_DATE']);
        $ObjectProject->setEND_DATE($pos['END_DATE']);
       
        return NewProjectPDO::registerProject($ObjectProject);
    }

    function selectProject(){      
    	return NewProjectPDO::selectProject();
    }
	 function Remove($pos){
	 	$ObjectProject = new Project();
	 	$ObjectProject->setID($pos['ID']);

	 	return NewProjectPDO::RemoveProject($ObjectProject);
 	}
 	function ShowDataProject($pos){
 		$ObjectProject = new Project();
 		$ObjectProject->setID($pos['ID']);
 		return NewProjectPDO::ShowDataProject($ObjectProject);
 	}
 	function EditProject($pos){
 		$ObjectProject = new Project();
 		$ObjectProject->setID($pos['ID']);
 		$ObjectProject->setPROJECT_NAME($pos['PROJECT_NAME']);
 		$ObjectProject->setCOST($pos['COST']);
 		$ObjectProject->setCREATION_DATE($pos['CREATION_DATE']);
        $ObjectProject->setEND_DATE($pos['END_DATE']);
        return NewProjectPDO::EditProject($ObjectProject);
	 }

 	
?>