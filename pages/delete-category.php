<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		
#if(isset($_POST['delete']))
			#{
					$cid= $_GET['cid'];
					$qry="DELETE FROM `category` WHERE `cid` = '$cid'";
					$data=mysqli_query($conn,$qry);
					
					if($data)
					{
						 echo "<script>alert('Category Deleted Successfuly');</script>";
						 ?>
              			<meta http-equiv = "refresh" content = "0; url = http://localhost/sunshine/pages/manage-category.php" />
              <?php	  
					}
					else
					{
						 echo "<script>alert('Category Not Deleted Successfuly');</script>";
					}
			#};
?>