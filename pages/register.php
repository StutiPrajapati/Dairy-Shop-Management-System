<?php
//@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
if(isset($_POST['submit'])){
   $user_type = $_POST['adminname'];
   $uname =  $_POST['username'];
   $mno =  $_POST['mobilenumber'];   
   $email =  $_POST['email'];
   $pass = $_POST['password'];
   
    $qry= " SELECT * FROM `login` WHERE username='$uname' && password='$pass' ";
   $result = mysqli_query($conn, $qry);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';
   }
   else
   {
	   $qry="INSERT INTO `login` (`adminname`, `username`, `mobilenumber`, `email`, `password`, `adminregdate`, `updationdate`) VALUES ('$user_type', '$uname', '$mno', '$email', '$pass',current_timestamp(),NULL)";
		$result=mysqli_query($conn,$qry);
		//echo "<script>windows.location.href='login.php';</script>";
		header('location:login.php');
	   
   }
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
  <link rel="stylesheet" href="../css/Style.css"> 


</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
	  <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <select name="adminname">
         <option value="User">User</option>
         <option value="Admin">Admin</option>
      </select>
      <input type="text" name="username" required placeholder="Enter your username">
	  <input type="text" name="mobilenumber" required placeholder="Enter your mobile number">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>