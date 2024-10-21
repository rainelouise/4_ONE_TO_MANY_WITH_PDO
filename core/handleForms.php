<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertCrocheterBtn'])) {

	$query = insertCrocheter($pdo, $_POST['username'], $_POST['firstName'], 
		$_POST['lastName'], $_POST['dateOfBirth'], $_POST['phoneNumber'], 
		$_POST['emailAddress'], $_POST['expertise']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editCrocheterBtn'])) {
	$query = updateCrocheter($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['dateOfBirth'], $_POST['phoneNumber'], $_POST['emailAddress'], 
		$_POST['expertise'], $_GET['crocheter_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Edit failed";
	}
}

if (isset($_POST['deleteCrocheterBtn'])) {
	$query = deleteCrocheter($pdo, $_GET['crocheter_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewProjectBtn'])) {
	$query = insertProject($pdo, $_POST['projectName'], $_POST['typeOfCrochet'], $_GET['crocheter_id']);

	if ($query) {
		header("Location: ../viewprojects.php?crocheter_id=" . $_GET['crocheter_id']);
	} else {
		echo "Insertion failed";
	}
}

if (isset($_POST['editProjectBtn'])) {
	$query = updateProject($pdo, $_POST['projectName'], $_POST['typeOfCrochet'], $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?crocheter_id=" . $_GET['crocheter_id']);
	} else {
		echo "Update failed";
	}
}

if (isset($_POST['deleteProjectBtn'])) {
	$query = deleteProject($pdo, $_GET['project_id']);

	if ($query) {
		header("Location: ../viewprojects.php?crocheter_id=" . $_GET['crocheter_id']);
	} else {
		echo "Deletion failed";
	}
}

?>
