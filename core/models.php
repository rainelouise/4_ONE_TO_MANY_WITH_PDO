<?php  

function insertCrocheter($pdo, $username, $first_name, $last_name, 
	$date_of_birth, $phone_number, $email_address, $expertise) {

	$sql = "INSERT INTO crocheters (username, first_name, last_name, 
		date_of_birth, phone_number, email_address, expertise) VALUES(?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username, $first_name, $last_name, 
		$date_of_birth, $phone_number, $email_address, $expertise]);

	if ($executeQuery) {
		return true;
	}
}

function updateCrocheter($pdo, $first_name, $last_name, 
	$date_of_birth, $phone_number, $email_address, $expertise, $crocheter_id) {

	$sql = "UPDATE crocheters
				SET first_name = ?,
					last_name = ?,
					date_of_birth = ?, 
					phone_number = ?,
					email_address = ?,
					expertise = ?
				WHERE crocheter_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$date_of_birth, $phone_number, $email_address, $expertise, $crocheter_id]);
	
	if ($executeQuery) {
		return true;
	}
}

function deleteCrocheter($pdo, $crocheter_id) {
	$deleteCrocheterProj = "DELETE FROM projects WHERE crocheter_id = ?";
	$deleteStmt = $pdo->prepare($deleteCrocheterProj);
	$executeDeleteQuery = $deleteStmt->execute([$crocheter_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM crocheters WHERE crocheter_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$crocheter_id]);

		if ($executeQuery) {
			return true;
		}
	}
}

function getAllCrocheters($pdo) {
	$sql = "SELECT * FROM crocheters";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getCrocheterByID($pdo, $crocheter_id) {
	$sql = "SELECT * FROM crocheters WHERE crocheter_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$crocheter_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getProjectsByCrocheter($pdo, $crocheter_id) {
	
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.type_of_crochet AS type_of_crochet,
				projects.date_added AS date_added,
				CONCAT(crocheters.first_name,' ',crocheters.last_name) AS project_owner
			FROM projects
			JOIN crocheters ON projects.crocheter_id = crocheters.crocheter_id
			WHERE projects.crocheter_id = ? 
			GROUP BY projects.project_name;";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$crocheter_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function insertProject($pdo, $project_name, $type_of_crochet, $crocheter_id) {
	$sql = "INSERT INTO projects (project_name, type_of_crochet, crocheter_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $type_of_crochet, $crocheter_id]);
	if ($executeQuery) {
		return true;
	}
}

function getProjectByID($pdo, $project_id) {
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.type_of_crochet AS type_of_crochet,
				projects.date_added AS date_added,
				CONCAT(crocheters.first_name,' ',crocheters.last_name) AS project_owner
			FROM projects
			JOIN crocheters ON projects.crocheter_id = crocheters.crocheter_id
			WHERE projects.project_id = ? 
			GROUP BY projects.project_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $project_name, $type_of_crochet, $project_id) {
	$sql = "UPDATE projects
			SET project_name = ?,
				type_of_crochet = ?
			WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $type_of_crochet, $project_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $project_id) {
	$sql = "DELETE FROM projects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}

?>
