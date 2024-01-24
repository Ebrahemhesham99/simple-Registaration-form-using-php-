<?php
$host = 'localhost';
$dbname = 'trial';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];
    $id = $_GET['id'];

    switch ($operation) {
        case 'view':
            $stmt = $pdo->prepare("SELECT * FROM emp_info WHERE id = ?");
            $stmt->execute([$id]);
            $employee = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Employee Information:<br>";
            echo "Username: " . $employee['username'] . "<br>";
            echo "Password: " . $employee['password'] . "<br>";
            break;
        case 'delete':
            $stmt = $pdo->prepare("DELETE FROM emp_info WHERE id = ?");
            $stmt->execute([$id]);
            echo "Employee information deleted successfully!";
            break;
        case 'update':
            $newUsername = $_POST['newUsername'];
            $newPassword = $_POST['newPassword'];
            $stmt = $pdo->prepare("UPDATE emp_info SET username = ?, password = ? WHERE id = ?");
            $stmt->execute([$newUsername, $newPassword, $id]);
            echo "Employee information updated successfully!";
            break;
        case 'add':
            header("Location: employeesform.php");
            exit();
            break;
        default:
            echo "Invalid operation";
            break;
    }
}
$stmt = $pdo->prepare("SELECT * FROM emp_info");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h2>Employee Information</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>edit</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee['username']; ?></td>
                <td><?php echo $employee['password']; ?></td>
                <td>
                    <a href="info.php?operation=view&id=<?php echo $employee['id']; ?>">View</a> |
                    <a href="info.php?operation=delete&id=<?php echo $employee['id']; ?>">Delete</a> |
                    <form action="info.php?operation=update&id=<?php echo $employee['id']; ?>" method="POST" style="display: inline;">
                        <input type="text" name="newUsername" placeholder="New Username" required>
                        <input type="password" name="newPassword" placeholder="New Password" required>
                        <input type="submit" value="Update">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="info.php?operation=add">Add Employee</a>
</body>
</html>