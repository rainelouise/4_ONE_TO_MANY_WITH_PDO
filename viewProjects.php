<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">Return to home</a>
    <?php 
    $getCrocheterByID = getCrocheterByID($pdo, $_GET['crocheter_id']); 
    ?>
    <h1>Username: <?php echo htmlspecialchars($getCrocheterByID['username']); ?></h1>
    <h1>Add New Project</h1>
    <form action="core/handleForms.php?crocheter_id=<?php echo $_GET['crocheter_id']; ?>" method="POST">
        <p>
            <label for="projectName">Project Name</label> 
            <input type="text" name="projectName" required>
        </p>
        <p>
            <label for="typeOfCrochet">Type of Crochet</label> 
            <input type="text" name="typeOfCrochet" required> 
            <input type="submit" name="insertNewProjectBtn" value="Add Project">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
      <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Type of Crochet</th> 
        <th>Project Owner</th>
        <th>Date Added</th>
        <th>Action</th>
      </tr>
      <?php 
      $getProjectsByCrocheter = getProjectsByCrocheter($pdo, $_GET['crocheter_id']); 
      foreach ($getProjectsByCrocheter as $row) { ?>
      <tr>
        <td><?php echo htmlspecialchars($row['project_id']); ?></td>      
        <td><?php echo htmlspecialchars($row['project_name']); ?></td>      
        <td><?php echo htmlspecialchars($row['type_of_crochet']); ?></td> 
        <td><?php echo htmlspecialchars($row['project_owner']); ?></td>      
        <td><?php echo htmlspecialchars($row['date_added']); ?></td>
        <td>
            <a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&crocheter_id=<?php echo $_GET['crocheter_id']; ?>">Edit</a>
            <a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&crocheter_id=<?php echo $_GET['crocheter_id']; ?>">Delete</a>
        </td>      
      </tr>
    <?php } ?>
    </table>

</body>
</html>