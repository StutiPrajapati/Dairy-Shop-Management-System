<?php
//@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
    
if(isset($_POST['submit'])){
   $uname =  $_POST['username'];
   //$mno =  $_POST['mobilenumber'];   
   //$email =  $_POST['email'];
   $pass=  $_POST['password'];
   $qry="UPDATE `login` SET `password` = '$pass' WHERE `username` = '$uname'";
            $data=mysqli_query($conn,$qry);

            if($data)
            {
              echo "<script>alert('Password Detail Updated Successfuly');</script>";
              #header('location:manage-company.php');
              ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/edit-password.php" />
              <?php
            }
            else
            {
              echo "<script>alert('Password Detail Not Updated Successfuly');</script>";
            }
          
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Password</title>
   <!-- custom css file link  -->
  <link rel="stylesheet" href="../css/Style.css"> 
  <style>
   .form-container{
   min-height: 90vh;
   display: flex;
   align-items: center;
   justify-content: center;
   padding:20px;
   padding-bottom: 60px;
   background: #eee;
}
  </style>
</head>
<body>
      <?php
   @include_once 'header.php';
    @include_once('adminsidebar.php');
   ?>
<div class="form-container">

   <form action="" method="post">
   <h2>Update Password</h2>
      <?php
	  #code for fatch data of logedin user from data base 
      $uname=$_SESSION['admin_name'];
         $qry="SELECT * FROM `login` WHERE `username`='$uname'";
          $data=mysqli_query($conn,$qry);
			$res=mysqli_fetch_assoc($data);
			//$adminmno=$_SESSION['admin_mno'];
			//$adminemail=$_SESSION['admin_email'];
      ?>
      <input type="text" name="username" value="<?php echo $res['username']; ?>">
	  <input type="password" name="password" value="<?php echo  $res['password'];?>" >
      
      
      
      <input type="submit" name="submit" value="Update now" class="form-btn">
   </form>

</div>

</body>
</html>