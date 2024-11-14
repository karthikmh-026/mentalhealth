<?php
require ('connect.php');
if(isset($_REQUEST['email']))
{
        $firstname= stripslashes($_REQUEST['firstname']);
        $firstname= mysqli_real_escape_string($con, $firstname);
        $email= stripslashes($_REQUEST['email']);
        $email= mysqli_real_escape_string($con, $email);
        $password= stripslashes($_REQUEST['password']);
        $password= mysqli_real_escape_string($con, $password);
        $confirmpassword= stripslashes($_REQUEST['confirmpassword']);
        $confirmpassword= mysqli_real_escape_string($con, $confirmpassword);
        
          if($password == $confirmpassword)
          {
              $query1= "insert into signup (firstname,  email, password, confirmpassword) VALUES ('$firstname', '$email', '$password', '$confirmpassword')";
              $res1=mysqli_query($con,$query1);
                    if($res1 == TRUE)
                   {
                      header("Location:login.php");
                       
                   }
                   else
                   {
                       echo "failed";
                   }
          }
                 mysqli_close($con);
}
?>