<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            margin-top: 1%;
        }

        .entry {
            margin-top: 8%;
            margin-bottom: 20px;
            outline: 1px solid black;
            padding: 10px;
        }

        .entry-title {
            font-size: 34px;
            font-weight: bold;
        }

        .entry-content {
            font-size:28px;
            margin-top: 10px;
            text-align: center;
            height:350px;
            font-weight: bolder;
        }

        .entry-date {
            margin-top: 10px;
            font-style: italic;
        }

        .s{
            margin-left: 25%;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>My Personal Journal Entries</h1>
    <form action="display.php" method="POST">
        <div class="s">
            <input type="text" name="searchTitle" placeholder="Enter entry title" style="height:50px; width:300px;">
            <input type="submit" value="Search" style="height:52px ; width:200px;">
        </div>
    </form>
    <?php

    // Assuming you have established a database connection
    $con = mysqli_connect('localhost', 'root', '', 'innervoice');

    if (isset($_POST['searchTitle'])) {
        $searchTitle = $_POST['searchTitle'];

        // Fetch data from the database based on the entered title
        $query = "SELECT * FROM journal WHERE entrytitle = '$searchTitle'";
        $result = mysqli_query($con, $query);

        // Loop through the data and display it in div-based entries
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='entry'>";
            echo "<div class='entry-title'>" . $row['entrytitle'] . "</div>";
            echo "<div class='entry-content'>" . $row['dailyentry'] . "</div>";
            echo "<div class='entry-date'>" . $row['entrydate'] . "</div>"; // Added to display the entry date

            echo "</div>";
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>

</div>
</body>
</html>
