<?php 
include '../config/db_con.php';

mysqli_set_charset($baseConnection, 'utf8');

if ($_POST['action'] == 'create') {
	$PROJECT_NAME = filter_var($_POST['PROJECT_NAME']);
	$COST = filter_var($_POST['COST']);
	$CREATION_DATE = filter_var($_POST['CREATION_DATE']);
	$END_DATE = filter_var($_POST['END_DATE']);

	try {
		$stmt = $baseConnection->prepare("INSERT INTO project (PROJECT_NAME, COST, CREATION_DATE, END_DATE) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $PROJECT_NAME, $COST, $CREATION_DATE, $END_DATE);
		$stmt->execute();
		$answer = array(
			'answer' => 'Correct',
			'info' => $stmt);
		$stmt->close();
		$baseConnection->close();

	} catch (Exception $e) {
		$answer  = array(
			'error' => $e->getMessage()
		);
	}

	echo json_encode("CORRECT");
}else{
	echo json_encode("ERROR");
}

?>

