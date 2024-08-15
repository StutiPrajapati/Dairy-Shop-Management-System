<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage-product</title>
	<link rel="stylesheet" type="text/css" href="../css/Manage.css">
	
	
</head>
<body>
	<?php
	@include_once 'header.php';
		@include_once('adminsidebar.php');
	?>

	<?php
		$qry="SELECT * FROM product";
		$data=mysqli_query($conn,$qry);
		$total=mysqli_num_rows($data);
		
		if($total != 0)
		{
			$sr=1;
	?>		
			<center><table id="myTable">
			<tr id="header">
				<th colspan=8><input type="text" id="myInput" placeholder="Search Product Name" onkeyup="searchFun()"></th>
			</tr>
				<tr id="header">
					<th width="10%">Product Id</th>
					<th width="20%">Product Name</th>
					<th width="15%">Company Name</th>
					<th width="15%">Category Name</th>
					<th width="5%">Price</th>
					<th width="5%">Stock</th>
					<th width="15%">Posting Date</th>
					<th width="15%">Action</th>
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
						<td>".$result['stock']."</td>
						<td>".$result['postingdate']."</td>
						<td><a href='edit-product.php?proid=$result[pid]'><input type='submit' value='Edit' class='update'></a>
							<a href='delete-product.php?proid=$result[pid]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
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
<script type="text/javascript">
	function checkdelete()
	{
		return confirm('Are you sure ?? Do you want to delete this Product ??');
	}
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