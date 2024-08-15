<?php
@include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
#echo $_SESSION['admin_name'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Dashboard</title>
	<!--<link rel="stylesheet" type="text/css" href="Sbar.css">-->
<style>
.main-container{
	margin-left: 250px;
	grid-area: 	main;
	overflow-y: auto;
	padding: 	20px 20px;
	color: 	rgba(255,255,255,0.95);
}
.main-cards{
	display: 	grid;
	grid-template-columns: 1fr 1fr 1fr 1fr;
	gap :20px;
	margin: 	20px 0;
}
.card{
	display: flex;
	flex-direction: column	;
	justify-content: 	space-around	;
	padding: 	20px;
	border-radius: 5px;
}
.card:first-child{
	background-color:#2962ff;
}
.card:nth-child(2){
	background-color: 	darkgreen;
}
.card:nth-child(3){
	background-color: 	darkorange;
}
.card:nth-child(4){
	background-color: 	red;
}
</style>
</head>
<body>
<?php
@include_once 'header.php';
@include 'adminsidebar.php';
?>
<div class="main-container">
<div class="main-cards">
	<div class="card">
		<div class="card-inner">
			<h3>Company</h3>
		</div>
		<?php 
		$qur="select cmpid from company";
		$sql=mysqli_query($conn,$qur);
		$result=mysqli_num_rows($sql);
		?>
		<h1><?php echo $result;?></h1>
	</div>

	<div class="card">
		<div class="card-inner">
			<h3>Category</h3>
		</div>
		<?php 
		$qur="select cid from category";
		$sql=mysqli_query($conn,$qur);
		$result=mysqli_num_rows($sql);
		?>
		<h1><?php echo $result;?></h1>
	</div>

	<div class="card">
		<div class="card-inner">
			<h3>Product</h3>
		</div>
		<?php 
		$qur="select pid from product";
		$sql=mysqli_query($conn,$qur);
		$result=mysqli_num_rows($sql);
		?>
		<h1><?php echo $result;?></h1>
	</div>

	<div class="card">
		<div class="card-inner">
			<h3>Total</h3>
		</div>
		<h1>1200</h1>
	</div>
</div>
</div>
</body>
</html>