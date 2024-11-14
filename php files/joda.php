<?php

@include 'connect.php';

if (isset($_POST['submit'])) {
    $entrydate = date("Y-m-d"); // Get today's date
    $entrytitle = $_POST['entrytitle'];
    $dailyentry = $_POST['dailyentry'];
    

    // Validate the date
    if ($entrydate === '0000-00-00') {
        $entrydate = date("Y-m-d");
    }

    $query = "INSERT INTO journal (`entrydate`,`entrytitle`, `dailyentry`) VALUES ( '$entrydate','$entrytitle', '$dailyentry') ";

    mysqli_query($con, $query);

    echo "<script>";
    echo "alert('Message Sent')";
    echo "</script>";

    header('location:jornal.php');
}

?>
