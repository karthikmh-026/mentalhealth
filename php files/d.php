<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit();
}

// Retrieve user details from the database based on the logged-in user's email
@include 'connect.php';

$email = $_SESSION['email'];

$sql = "SELECT firstname, email FROM signup WHERE email = ?";
$statement = $con->prepare($sql);
$statement->bind_param("s", $email);
$statement->execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();

$firstname = $row['firstname'];
$email = $row['email'];



$statement->close();
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                           
    <script src="https://kit.fontawesome.com/a6b631c640.js" crossorigin="anonymous"></script>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #ecf0f3;
}
.wrapper,
.wrapper .img-area,
.social-icons a,
.buttons button{
  background: #ecf0f3;
  box-shadow: -3px -3px 7px #ffffff,
               3px 3px 5px #ceced1;
}
.wrapper{
  position: relative;
  width: 550px;
  height:650px;
  padding: 30px;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.wrapper .icon{
  font-size: 17px;
  color: #31344b;
  position: absolute;
  cursor: pointer;
  opacity: 0.7;
  top: 15px;
  height: 35px;
  width: 35px;
  text-align: center;
  line-height: 35px;
  border-radius: 50%;
  font-size: 16px;
}
.wrapper .icon i{
  position: relative;
  z-index: 9;
}
.wrapper .icon.arrow{
  left: 15px;
}
.wrapper .icon.dots{
  right: 15px;
}
.wrapper .img-area{
  height: 150px;
  width: 150px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}
.img-area .inner-area{
  height: calc(100% - 25px);
  width: calc(100% - 25px);
  border-radius: 50%;
}
.inner-area img{
  height: 100%;
  width: 100%;
  border-radius: 50%;
  object-fit: cover;
}
.wrapper .name{
  font-size: 23px;
  font-weight: 500;
  color: #31344b;
  margin: 10px 0 5px 0;
}
.wrapper .about{
  color: #44476a;
  font-weight: 400;
  font-size: 16px;
}
.wrapper .icon:hover::before,
.buttons button:hover:before{
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  border-radius: 50%;
  background: #ecf0f3;
  box-shadow: inset -3px -3px 7px #ffffff,
              inset 3px 3px 5px #ceced1;
}
.buttons button:hover:before{
  z-index: -1;
  border-radius: 5px;
}

.wrapper .buttons{
  display: flex;
  width: 100%;
  justify-content: space-between;
}
.buttons button{
  position: relative;
  width: 100%;
  border: none;
  outline: none;
  padding: 12px 0;
  color: #31344b;
  font-size: 17px;
  font-weight: 400;
  border-radius: 5px;
  cursor: pointer;
  z-index: 4;
}
.buttons button:first-child{
  margin-right: 10px;
}
.buttons button:last-child{
  margin-left: 10px;
}
        
    </style>
</head>
<body>
<div class="wrapper">
    <div class="img-area">
      <div class="inner-area">
        <img src="log.png">
      </div>
    </div>
    <div class="icon arrow"><a href="homep.html"><i class="fas fa-arrow-left"></i></a></div>
    <div class="name"><h1><?php echo $firstname; ?></h1></div>
    <div class="about"><h2><?php echo $email; ?></h2></div><br/>
    <div class="buttons">
      <form action="display.php" method="post">
        <button type="submit" style="width:245%";>MY JOURNAL ENTRIES</button></form>
      </form>
    </div><br/><br/>
    <div class="buttons">
    <form action="habitdisplay.php" method="post">
      <button type="submit" style="width:440%";>MY HABITS</button>
    </div><br/><br/>
    <div class="buttons">
    <form action="wel.php" method="post">
      <button type="submit" style="width:450%";><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;LOGOUT</button></a></form>
    </div>
  </div>
    
</body>
</html>
