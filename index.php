<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome to Peachy Stitches! Register to become one of our crocheters! (˶˃ ᵕ ˂˶) .ᐟ.ᐟ</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label> 
			<input type="text" name="username" required>
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" required>
		</p>
        <p>
			<label for="phoneNumber">Phone Number</label> 
			<input type="text" name="phoneNumber" required>
		</p>
        <p>
			<label for="emailAddress">Email Address</label> 
			<input type="email" name="emailAddress" required>
		</p>
		<p>
			<label for="expertise">Expertise</label> 
			<input type="text" name="expertise" required>
		</p>
        <p>
            <input type="submit" name="insertCrocheterBtn" value="Register">
		</p>
	</form>

	<?php $getAllCrocheters = getAllCrocheters($pdo); ?>
	<?php foreach ($getAllCrocheters as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 370px; margin-top: 20px;">
		<h3>Username: <?php echo $row['username']; ?></h3>
		<h3>First Name: <?php echo $row['first_name']; ?></h3>
		<h3>Last Name: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Phone Number: <?php echo $row['phone_number']; ?></h3>
		<h3>Email Address: <?php echo $row['email_address']; ?></h3>
		<h3>Expertise: <?php echo $row['expertise']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?crocheter_id=<?php echo $row['crocheter_id']; ?>">View Projects</a>
			<a href="editcrocheter.php?crocheter_id=<?php echo $row['crocheter_id']; ?>">Edit</a>
			<a href="deletecrocheter.php?crocheter_id=<?php echo $row['crocheter_id']; ?>">Delete</a>
		</div>
	</div> 
	<?php } ?>
</body>
</html>