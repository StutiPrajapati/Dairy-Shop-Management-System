<?php
//@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
if(isset($_POST['submit'])){
  //user_type = $_POST['adminname'];
   $uname =  $_POST['username'];
   //$mno =  $_POST['mobilenumber'];   
 // $email = $_POST['email'];
   $pass = $_POST['password'];
  // $_SESSION['admin_mno']=$mno;
		 //$_SESSION['admin_email']=$email;
    $qry= " SELECT * FROM `login` WHERE username='$uname' && password='$pass' ";
   $result = mysqli_query($conn, $qry);

   if(mysqli_num_rows($result) > 0){
	   
    $row = mysqli_fetch_array($result);

      if($row['adminname'] == 'Admin')
	  {

         $_SESSION['admin_name'] = $uname;
		     
         header('location:admindashboard.php');
		 

      }
	  elseif($row['adminname'] == 'User')
	  {

         $_SESSION['user_name'] = $uname;
         header('location:userdashboard.php');

      }
     
   }
   else
   {
      $error[] = 'Incorrect Username or Password!';
   }

};
	   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/Style.css">
  

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
	   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Enter your username">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
	  <p><a href="fpass.php">Forgot Password?</a></p>
   </form>

</div>
</body>
</html>