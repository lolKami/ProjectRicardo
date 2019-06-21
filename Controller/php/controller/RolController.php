<?php  
include '../data/NewRolePDO.php';
if ($_POST['action'] === 'createRole') {
	registerRole($_POST);
}
if ($_POST['action'] === 'selectRol') {
	selectRol($_POST);
}
if ($_POST['action'] === 'RemoveRol') {
	RemoveRol($_POST);
}
if ($_POST['action'] === 'ShowDataRol') {
	ShowDataRol($_POST);
}
if ($_POST['action'] === 'EditRol') {
	EditRol($_POST);
}


	function registerRole($pos){
		$ObjectRole = new Role();
		$ObjectRole->setDESCRIPTION($pos['DESCRIPTION']);
		return NewRolePDO::registerRole($ObjectRole);
	}

	function selectRol(){   
		return NewRolePDO::selectRol();
    }
	 function RemoveRol($pos){
	 	$ObjectRole = new Role();
	 	$ObjectRole->setID_ROLE($pos['ID_ROLE']);

	 	return NewRolePDO::RemoveRol($ObjectRole);
 	}
 	function ShowDataRol($pos){
 		$ObjectRole = new Role();
 		$ObjectRole->setID_ROLE($pos['ID_ROLE']);
 		return NewRolePDO::ShowDataRol($ObjectRole);
 	}
 	function EditRol($pos){
 		$ObjectRole = new Role();
 		$ObjectRole->setID_ROLE($pos['ID_ROLE']);
 		$ObjectRole->setDESCRIPTION($pos['DESCRIPTION']);
        return NewRolePDO::EditRol($ObjectRole);
	 }

 	
 	
?>