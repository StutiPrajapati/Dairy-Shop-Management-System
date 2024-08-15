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
	<title>Manage-Category</title>
	<link rel="stylesheet" type="text/css" href="../css/Manage.css">
</head>
<body>
	<?php
		@include_once 'header.php';
		@include_once('adminsidebar.php');
	?>
	<?php
		$qry="SELECT * FROM category";
		$data=mysqli_query($conn,$qry);
		$total=mysqli_num_rows($data);
		if($total != 0)
		{	
			$sr=1;
	?>
			<center><table id="myTable" >
			<tr id="header">
				<th colspan=8><input type="text" id="myInput" placeholder="Search Category Name" onkeyup="searchFun()"></th>
			</tr>
				<tr id="header">
					<th>Category Id</th>
					<th>Category Name</th>
					<th>Category Code</th>
					<th>Posting Date</th>
					<th>Action</th>
				</tr>

	<?php
			while($result=mysqli_fetch_assoc($data))
			{
				echo "<tr>
						<td>".$sr."</td>
						<td>".$result['categoryname']."</td>
						<td>".$result['categorycode']."</td>
						<td>".$result['postingdate']."</td>
						<td><a href='edit-category.php?cid=$result[cid]'><input type='submit' value='Edit' class='update'></a>
						<a href='delete-category.php?cid=$result[cid]'><input type='submit' value='Delete' class='delete' name='delete' onclick='return checkdelete()'></a>
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
		return confirm('Are you sure ?? Do you want to delete this Category ??');
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