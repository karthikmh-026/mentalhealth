<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>habits</title>
<style>
    .habits{
        font-size: 30px;
        margin-left:30%;
        margin-right: 30%;
        margin-top:10%;
        border:1px solid black;
        border-width: 10px;
    }
</style>
</head>
<body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Create a connection to the database
$con = mysqli_connect('localhost', 'root', '', 'innervoice');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


// Retrieve the habit name from the database for the particular user
$query = "SELECT textInput FROM habit ";

$result = $con->query($query);

if ($result->num_rows > 0) {
    // Display the habit name to the user
    if ($row = $result->fetch_assoc()) {
        echo "<div class='habits'>";
        echo " DEVELOPED HABITS:<br/>" . $row['textInput'];echo "<br/>";
        echo "</div>";
    }
} else {
    echo "No habit found";
}

// Close the database connection
$con->close();
?>
