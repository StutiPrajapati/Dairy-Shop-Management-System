<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		
#if(isset($_POST['delete']))
			#{
					$cid= $_GET['cmid'];
					$qry="DELETE FROM `company` WHERE `cmpid` = '$cid'";
					$data=mysqli_query($conn,$qry);
					
					if($data)
					{
						 echo "<script>alert('Company Deleted Successfuly');</script>";
						 ?>
              			<meta http-equiv = "refresh" content = "0; url = http://localhost/sunshine/pages/manage-company.php" />
              <?php	  
					}
					else
					{
						 echo "<script>alert('Company Not Deleted Successfuly');</script>";
					}
			#};
?>