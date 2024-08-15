<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
$pid=$_GET['pid'];	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add to cart</title>
	<link rel="stylesheet" type="text/css" href="../css/Manage.css">
	
	
</head>
<body>
	<?php
		@include_once 'userheader.php';
		@include_once('usersidebar.php');
	?>

	<?php
		$qry="SELECT * FROM product";
		$data=mysqli_query($conn,$qry);
		$total=mysqli_num_rows($data);
		
		if($total != 0)
		{
			$sr=1;
	?>		
	<form action="" method="POST">
				<center><table id="myTable">
			<tr id="header">
				<th colspan=7><input type="text" id="myInput" placeholder="Search Product Name" onkeyup="searchFun()"></th>
				<th><a href='addtocart.php?proid=$result[pid]'><input type='submit' value='View Cart'></a></th>
			</tr>
				<tr id="header">
					<th>Product Id</th>
					<th>Product Name</th>
					<th>Company Name</th>
					<th>Category Name</th>
					<th>Price</th>
					<th width="10%">Qauntity</th>
					<th>Posting Date</th>
					<th>Action</th>
				</tr>

	<?php
	
			while($result=mysqli_fetch_assoc($data))
			{
				echo "<tr>
						<td>".$sr."</td>
						<td>".$result['productname']."</td>
						<td>".$result['companyname']."</td>
						<td>".$result['categoryname']."</td>
						<td>".$result['productprice']."</td>
						<td></td>las
						<td>".$result['postingdate']."</td>
						
						</td>
					</tr>";
				$sr++;
			}
			
		}
		else
		{
			echo "Record not found";
		}
				
	?>	
	
	
	</table>
	</center>
	</form>
<script type="text/javascript">
	
	function searchFun()
	{
		let filter = document.getElementById('myInput').value.toUpperCase(); 

		let myTable = document.getElementById('myTable');

		let tr = myTable.getElementsByTagName('tr');

		for(var i=0; i<tr.length; i++)
		{
			let td = tr[i].getElementsByTagName('td')[1];
			if(td)
			{
				let textvalue = td.textContent || td.innerHTML;
				if(textvalue.toUpperCase().indexOf(filter) > -1)
				{
					tr[i].style.display = "";
				}
				else
				{
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>  
</body>
</html>
<span>
							<!--<button class='update'>-</button>
							<span>1</span>
							<button class='update'>+</button>
						</span>-->