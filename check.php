<?php
// login.php
// PDO Connection
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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert the employee information into the MySQL server
    try {
        $stmt = $pdo->prepare("INSERT INTO emp_info (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        echo "Employee information inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    // Redirect to info.php
    header("Location: info.php");
    exit();
}
?>