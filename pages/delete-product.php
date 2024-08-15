<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		
#if(isset($_POST['delete']))
			#{
					$proid= $_GET['proid'];
					$qry="DELETE FROM `product` WHERE `pid` = '$proid'";
					$data=mysqli_query($conn,$qry);
					
					if($data)
					{
						 echo "<script>alert('Product Deleted Successfuly');</script>";
						 ?>
              			<meta http-equiv = "refresh" content = "0; url = http://localhost/sunshine/pages/manage-product.php" />
              <?php	  
					}
					else
					{
						 echo "<script>alert('Product Not Deleted Successfuly');</script>";
					}
			#};
?>