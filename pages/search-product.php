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
	<title>Add to cart</title>
	<link rel="stylesheet" type="text/css" href="../css/Manage.css">
	
	
</head>
<body>
	<?php
		@include_once 'userheader.php';
		@include_once('usersidebar.php');
	?>

	<?php
		/*$qry="SELECT * FROM product";
		$data=mysqli_query($conn,$qry);
		$total=mysqli_num_rows($data);
		
		if($total != 0)
		{
			$sr=1;*/
	?>		
	<form action="manage-cart.php" method="POST">
				<center><table id="myTable">
			<tr id="header">
				<th colspan=6><input type="text" id="myInput" placeholder="Search Product Name" onkeyup="searchFun()"></th>
			<th><input type='submit'  value='View Cart'></th>
			
			</tr>
				<tr id="header">
					<th>Product Id</th>
					<th>Product Name</th>
					<th>Company Name</th>
					<th>Category Name</th>
					<th>Price</th>
					<th width="10%">Qauntity</th>
					
					<th>Action</th>
				</tr>
				<tr>
					<td>1</td>
					<td>Gold 500g</td>
					<td>Amul</td>
					<td>Milk</td>
					<td>26</td>
					<td><input type="number" value="0" min="1" max="10"></td>
					<td><button type="submit" name="Item_Name" value="Gold 500" class="update">Add To Cart</button></td>
				</tr>
				<tr>
					<td>2</td>
					<td>ButterMilk350ml</td>
					<td>Dudhsagar</td>
					<td>Chass</td>
					<td>22</td>
					<td><input type="number" value="0" min="1" max="10"></td>
					<td><button type="submit" name="Item_Name" value="Gold 500" class="update">Add To Cart</button></td>
				</tr>
				<tr>
					<td>3</td>
					<td>chess 100gm</td>
					<td>Yamuna</td>
					<td>Chess</td>
					<td>250</td>
					<td><input type="number" value="0" min="1" max="10"></td>
					<td><button type="submit" name="Item_Name" value="Gold 500" class="update">Add To Cart</button></td>
				</tr>
				
	
	
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