<?php
$host = 'localhost';
$dbname = 'employees';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("Connection failed: " . $err->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Employee Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h2>Employee Information</h2>
    <table class="table table-bordered">
        <tr>
                    <th>id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th colspan="4">edit</th>
        </tr>
        <?php foreach ($employees as $employee){ ?>
            <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['first_name']; ?></td>
                <td><?php echo $employee['last_name']; ?></td>
                <td><?php echo $employee['address']; ?></td>
                <td><?php echo $employee['country']; ?></td>
                <td><?php echo $employee['gender']; ?></td>
                <td><?php echo $employee['skills']; ?></td>
                <td><?php echo $employee['email']; ?></td>
                <td><?php echo $employee['username']; ?></td>
                <td><?php echo $employee['password']; ?></td>
                <td>
                    <a href="operations.php?operation=view&id=<?php echo $employee['id']; ?>"class="btn btn-info">View</a> 
                    <a href="operations.php?operation=update&id=<?php echo $employee['id']; ?>" class="btn btn-info">update</a> 
                    <a href="operations.php?operation=delete&id=<?php echo $employee['id']; ?>"method="POST" class="btn btn-danger">Delete</a> 
                    <!-- <form action="employees.php?operation=update&id=<?php //echo $employee['id']; ?>" method="POST">
                        <input type="text" name="newUsername" placeholder="New Username" required>
                        <input type="password" name="newPassword" placeholder="New Password" required>
                        <input type="submit" value="Update">
                    </form> -->
                     <a href="operations.php?operation=add" class="btn btn-info">Add Employee</a>    
                </td>
            </tr>
        <?php  }?>
    </table>
    <br>
</body>
</html>