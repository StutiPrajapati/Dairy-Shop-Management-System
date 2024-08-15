<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
			if(isset($_POST['submit']))
			{
				$cmpname= $_POST['companyname'];
				
				$qry="INSERT INTO `company` (`companyname`,`postingdate`) VALUES ('$cmpname', current_timestamp())";
				$result=mysqli_query($conn,$qry);
				if($result)
				{
					echo "<script>alert('Company Added Successfuly');</script>";
				}
				else
				{
					echo "<script>alert('Company Not Added Successfuly');</script>";
				}
			};
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Comapny</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">
  </head>
  <body>
    <?php
	@include_once 'header.php';
    @include_once('adminsidebar.php');
    ?>
    <div class="testbox">
      <form action="" method="POST">
        <h1>Add Company</h1>
       
        <h4>Company Name<span>*</span></h4>
        <input type="text" name="companyname" placeholder="Company Name" required />
        
        <div class="btn-block">
          <button type="submit"  name="submit" href="#">Add</button>
        </div>
      </form>
       
    </div>
  </body>
</html>