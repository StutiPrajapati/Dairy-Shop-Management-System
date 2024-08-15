<?php
//@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
 session_start();
if(isset($_POST['submit'])){
  //$user_type = $_POST['adminname'];
   $uname =  $_POST['username'];
   $mno =  $_POST['mobilenumber'];   
  // $email = mysqli_real_escape_string($conn, $_POST['email']);
   $npass = $_POST['password'];
  
 /*
    $qry= " UPDATE  login SET password='$npass' WHERE  username='$uname'  && mobilenumber='$mno'";
	$result = mysqli_query($conn, $qry);
   if(mysqli_num_rows($result > 0)){  
	   
    $row = mysqli_fetch_array($result);
	if($row)
	{
		header('location:login.php');
	}
   }
   else
   {
      $error[] = 'Incorrect Username or Password!';
   }*/
    $qry= " SELECT * FROM `login` WHERE username='$uname' && mobilenumber='$mno' ";
   $result = mysqli_query($conn, $qry);

   if(mysqli_num_rows($result) > 0){
	  $qry= " UPDATE  login SET password='$npass' WHERE  username='$uname'  && mobilenumber='$mno'";
	$result = mysqli_query($conn, $qry);
   echo "<script>alert('Password Detail Updated Successfuly');</script>";
   ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/login.php" />
   <?php
	#header('location:login.php');
   }else{
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
   <title>change password</title>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/Style.css">
</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>UPDATE NOW</h3>
	   <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="Enter your username">
	  <input type="text" name="mobilenumber" required placeholder="Enter your mobile number">
      <input type="password" name="password" required placeholder="Enter your new password">
      <input type="submit" name="submit" value="UPDATE" class="form-btn">
      
	   
   </form>

</div>
</body>
</html>