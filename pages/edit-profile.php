<?php
//@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
    
if(isset($_POST['submit'])){
   $uname =  $_POST['username'];
   $mno =  $_POST['mobilenumber'];   
   $email =  $_POST['email'];
   
   $qry="UPDATE `login` SET `username` = '$uname' , `mobilenumber` = '$mno' , `email` ='$email' WHERE `username` = '$uname'";
            $data=mysqli_query($conn,$qry);

            if($data)
            {
              echo "<script>alert('Profile Detail Updated Successfuly');</script>";
              #header('location:manage-company.php');
              ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/edit-profile.php" />
              <?php
            }
            else
            {
              echo "<script>alert('Profile Detail Not Updated Successfuly');</script>";
            }
          
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update Profile</title>
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
.form-container{
	  margin-top:0%;

	  margin-right:10%;
      
      /*height: inherit;*/
     padding: 3px;
	  margin-left:30%;
      /*position:relative;*/
	  background:#fff;
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
   <h2>Update Profile</h2>
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
	  <input type="text" name="mobilenumber" value="<?php echo  $res['mobilenumber'];?>" >
      <input type="email" name="email" value="<?php echo  $res['email'];?>">         
      <input type="submit" name="submit" value="Update now" class="form-btn">
   </form>

</div>

</body>
</html>