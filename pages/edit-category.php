<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		$cid= $_GET['cid'];
          $qry="SELECT * FROM `category` WHERE `cid`='$cid'";
          $data=mysqli_query($conn,$qry);
         $result=mysqli_fetch_assoc($data);
      
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Category</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">
   
  </head>
  <body>
    <?php
	@include_once 'header.php';
    @include_once('adminsidebar.php');
    ?>
    <div class="testbox">
      <form action="" method="POST">
        <h1>Edit Category</h1>
       
        <h4>Category Name<span>*</span></h4>
        <input type="text" value="<?php echo $result['categoryname']; ?>" name="categoryname" required>
        <h4>Category Code<span>*</span></h4>
        <input type="text" value="<?php echo $result['categorycode']; ?>" name="categorycode" required>
        <div class="btn-block">
          <button type="submit" name="submit" href="manage-category.php">Update</button>
        </div>
		<?php
            if(isset($_POST['submit']))
          {
            $catname= $_POST['categoryname'];
			      $catcode= $_POST['categorycode'];
            $qry="UPDATE `category` SET `categoryname` = '$catname' , `categorycode` = '$catcode' WHERE `cid` = '$cid'";
            $data=mysqli_query($conn,$qry);

            if($data)
            {
              echo "<script>alert('Category Updated Successfuly');</script>";
              #header('location:manage-company.php');
              ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/manage-category.php" />
              <?php
            }
            else
            {
              echo "<script>alert('Category Not Updated Successfuly');</script>";
            }
          };
        ?>
      </form>
       
    </div>
  </body>
</html>
