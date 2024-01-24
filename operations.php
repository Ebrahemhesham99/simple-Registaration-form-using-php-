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
if (isset($_GET['operation'])) {
    $operation = $_GET['operation'];
    $id = $_GET['id'];

    switch ($operation) {
        case 'view':
            $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            $employee = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Employee Information:<br>";
            echo "Username: " . $employee['username'] . "<br>";
            echo "Password: " . $employee['password'] . "<br>";
            break;
        case 'delete':
            $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);
            echo "Employee information deleted successfully!";
            header("Location: employees.php");
            break;
        case 'update':
            echo '
            <form method="post" action="operations.php">
                <!-- Form inputs -->
                <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                <!-- Add more form inputs as needed -->
                <button type="submit">Submit</button>
            </form>
            ';
 
            break;
        case 'add':
            header("Location: loginform.php");
            exit();
            break;
        default:
            echo "Invalid operation";
            break;
    }
    if (isset($_POST['submit'])){
        $newUsername = $_POST['newUsername'];
        $newPassword = $_POST['newPassword'];
        $stmt = $pdo->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        $stmt->execute([$newUsername, $newPassword, $id]);
        echo "Employee information updated successfully!";
    }
}
?>