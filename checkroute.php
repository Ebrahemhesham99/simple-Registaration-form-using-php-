<?php
$host = 'localhost';
$dbname = 'employees';
$dbusername = 'root';
$dbpass  = '';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpass);
    $pdo->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_EXCEPTION);
}
catch(PDOException $err){
    die(" connection failed " . $err->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $expected_text = "sh68Sa";
    if($_POST['verification'] === $expected_text ){
    $skills = implode(',', $_POST['skills']);
    $Fname = $_POST['firstName'];
    $Lname =  $_POST['lastName'];
    $Address = $_POST['address'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $uname =$_POST['username']; 
    $password =$_POST['password'];
    try{
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, address ,country,gender,skills
        ,email,username,password) VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->execute([$Fname,$Lname,$Address,$country,$gender,$skills,$email,$uname,$password]);
        echo "Employee information inserted successfully!";
    }
    catch(PDOException $err){
        echo "error" . $err->getMessage();
    }
}
else {
    echo "<h4 class='text-center'>please write correct values</h4>";
}
    header("location: employees.php");
    exit();
}
else{
    echo "error";
}
?>