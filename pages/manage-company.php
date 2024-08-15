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
	<title>Manage-Company</title>
	<link rel="stylesheet" type="text/css" href="../css/Manage.css">
</head>
<body>
	<?php
	@include_once 'header.php';
		@include_once('adminsidebar.php');
	?>
	<?php
		$qry="SELECT * FROM company";
		$data=mysqli_query($conn,$qry);
		$total=mysqli_num_rows($data);
		if($total != 0)
		{
			$sr=1;
	?>
			<center><table id="myTable" >
			<tr id="header">
				<th colspan=8><input type="text" id="myInput" placeholder="Search Company Name" onkeyup="searchFun()"></th>
			</tr>
				<tr id="header">
					<th>Company Id</th>
					<th>Company Name</th>
					<th>Posting Date</th>
					<th>Action</th>
				</tr>

	<?php
			while($result=mysqli_fetch_assoc($data))
			{
				echo "<tr>
						<td>".$sr."</td>
						<td>".$result['companyname']."</td>
						<td>".$result['postingdate']."</td>
						<td><a href='edit-company.php?cmid=$result[cmpid]'><input type='submit' value='Edit' class='update'></a>
							<a href='delete-company.php?cmid=$result[cmpid]'><input type='submit' value='Delete' class='delete' onclick='return checkdelete()'></a>
						</td>
					</tr>";
				$sr++;
			}
			
		}
		else
		{
			echo "Record not found";
		}
		#for delete data-->

		
		
	?>	
	
	
	</table>
	</center>
<script type="text/javascript">
	function checkdelete()
	{
		return confirm('Are you sure ?? Do you want to delete this Company ??');
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