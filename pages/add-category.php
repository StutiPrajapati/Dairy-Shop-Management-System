<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();

			
			if(isset($_POST['submit']))
			{
				$catname= $_POST['categoryname'];
				$catcode= $_POST['categorycode'];
				$qry="INSERT INTO `category` (`categoryname`, `categorycode`, `postingdate`) VALUES ('$catname', '$catcode', current_timestamp())";
				$result=mysqli_query($conn,$qry);
				if($result)
				{
					echo "<script>alert('Category Added Successfuly');</script>";
				}
				else
				{
					echo "<script>alert('Category Not Added Successfuly');</script>";
				}
			};
		
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Category</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">
   
  </head>
  <body>
    <?php
	@include_once 'header.php';
    @include_once('adminsidebar.php');
    ?>
    <div class="testbox">
      <form action="" method="POST">
        <h1>Add Category</h1>
       
        <h4>Category Name<span>*</span></h4>
        <input type="text" name="categoryname" placeholder="Category Name" required />
        <h4>Category Code<span>*</span></h4>
        <input type="text" name="categorycode" placeholder="Category Code" required />
        <div class="btn-block">
          <button type="submit"  name="submit" href="#">Add</button>
        </div>
		
      </form>
       
    </div>
  </body>
</html>