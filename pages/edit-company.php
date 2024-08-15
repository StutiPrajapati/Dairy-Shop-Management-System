<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		$cmid= $_GET['cmid'];
          $qry="SELECT * FROM `company` WHERE `cmpid`='$cmid'";
          $data=mysqli_query($conn,$qry);
         $result=mysqli_fetch_assoc($data);
      
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Comapny</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">
  </head>
  <body>
    <?php
	@include_once 'header.php';
    @include_once('adminsidebar.php');
    ?>
    <div class="testbox">
      <form action="" method="POST">
        <h1>Edit Company</h1>
       
        <h4>Company Name<span>*</span></h4>
        <input type="text" value="<?php echo $result['companyname']; ?>" name="companyname"  required>
        
        <div class="btn-block">
          <button type="submit"  name="submit" href="manage-company.php">Update</button>
        </div>
        <?php
            if(isset($_POST['submit']))
          {
            $cmpname= $_POST['companyname'];
            $qry="UPDATE `company` SET `companyname` = '$cmpname' WHERE `cmpid` = '$cmid'";
            $result=mysqli_query($conn,$qry);

            if($result)
            {
              echo "<script>alert('Company Updated Successfuly');</script>";
              #header('location:manage-company.php');
              ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/manage-company.php" />
              <?php
            }
            else
            {
              echo "<script>alert('Company Not Updated Successfuly');</script>";
            }
          };
        ?>
      </form>
       
    </div>
  </body>
</html>