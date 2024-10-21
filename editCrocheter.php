<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Crocheter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $getCrocheterByID = getCrocheterByID($pdo, $_GET['crocheter_id']); ?>
    <h1>Edit the Crocheter!</h1>
    <form action="core/handleForms.php?crocheter_id=<?php echo $_GET['crocheter_id']; ?>" method="POST">
        <p>
            <label for="firstName">First Name</label> 
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($getCrocheterByID['first_name']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label> 
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($getCrocheterByID['last_name']); ?>" required>
        </p>
        <p>
            <label for="dateOfBirth">Date of Birth</label> 
            <input type="date" name="dateOfBirth" value="<?php echo htmlspecialchars($getCrocheterByID['date_of_birth']); ?>" required>
        </p>
        <p>
            <label for="phoneNumber">Phone Number</label> 
            <input type="text" name="phoneNumber" value="<?php echo htmlspecialchars($getCrocheterByID['phone_number']); ?>" required>
        </p>
        <p>
            <label for="emailAddress">Email Address</label> 
            <input type="email" name="emailAddress" value="<?php echo htmlspecialchars($getCrocheterByID['email_address']); ?>" required>
        </p>
        <p>
            <label for="expertise">Expertise</label> 
            <input type="text" name="expertise" value="<?php echo htmlspecialchars($getCrocheterByID['expertise']); ?>" required>
        </p>
        <p>
            <input type="submit" name="editCrocheterBtn" value="Submit">
        </p>
    </form>
</body>
</html>