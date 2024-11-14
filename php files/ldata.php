<?php
session_start();
require('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$con = new mysqli("localhost", "root", "", "innervoice");
if ($con->connect_error) {
    die("Failed to connect: " . $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * FROM signup WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        
        if ($data['password'] === $password) {
            // Store the email in a session variable
            $_SESSION['email'] = $email;
            
            header("Location: homep.html");
        } else {
            echo "<h2>Invalid username or password</h2>";
        }
    }
}
?>
