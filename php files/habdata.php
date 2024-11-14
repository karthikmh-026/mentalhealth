<?php

// Create a connection to the database

$con=mysqli_connect('localhost','root','','innervoice');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Retrieve the habit name from the form submission
$habitName = $_POST['textInput'];

// Insert the habit name into the database
$sql = "INSERT INTO habit (textInput) VALUES ('$habitName')";

if ($con->query($sql) === TRUE) {
    echo "Habit name stored successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

// Close the database connection
$con->close();
?>
