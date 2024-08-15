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
	<title></title>
	<style type="text/css">
		*{
			margin:0;
			padding: 0;
		}
		h2{
			color: #fff;
			/*margin-right: 1150px;*/
		}
		h3{
			color: #fff;
			font-size:30px;
			/*margin-right: 1150px;*/
		}
		.h{
			font-family: 'Poppins', sans-serif;
			background-color: #12192C;
			width: 100%;
			padding: 10px ;
			display: flex;
			align-items: center;
			justify-content: space-between;
			position: relative;
			border-radius:0px;
		}
		.logo{
			width: 50px;
			border-radius: 70%;
			margin-left: 20px;
		}
		.user-pic{
			width: 40px;
			border-radius: 50%;
			cursor: pointer;
			margin-right: 40px;
			background:#fff;

		}
		.sub-menu-wrap{
			position: absolute;
			top: 100%;
			right: 2%;
			width: 300px;
			max-height: 0px;
			overflow: hidden;
			transition: max-height 0.5s;
		}
		.sub-menu-wrap.open-menu{
			max-height: 400px;
			z-index:1;
			/*box-shadow: 0px 0px 10px rgba(0, 0, 0, 10);*/
		}
		.sub-menu{
			background: crimson;
			padding: 20px;
			margin: 10px;
			border-radius: 5px;
		}
		.user-info{
			display: flex;
			align-items: center;
		}
		.user-info h3{
			font-weight: 500;
		}
		.user-info img{
			width: 50px;
			border-radius: 50%;
			margin-right: 15px;
		}
		.sub-menu hr{
			border: 0;
			height: 1px;
			width: 100%;
			background: #ccc;
			margin: 15px 0 10px;
		}
		.sub-menu-link{
			display: flex;
			align-items: center;
			text-decoration: none ;
			color: #fff/*#525252*/;
			margin: 12px 0;
		}
		.sub-menu-link p{
			width: 100%;
		}
		.sub-menu-link img{
			width: 30px;
			background: #e5e5e5;
			border-radius: 50%;
			padding: 8px;
			margin-right: 15px;
		}
		.sub-menu-link span{
			font-size: 30px;/*22px;*/
		}
		.sub-menu-link:hover span{
			transform: translateX(5px);
		}
		.sub-menu-link:hover p{
			font-weight: 600;
		}
	</style>
</head>
<body>
	 <div class="hero">
	 	<nav class="h">
	 		<img src="../image/logo.jpeg" class="logo">
	 		<h2>Sunshine Dairy Shop</h2>
	 		<img src="../image/user.png" class="user-pic" onclick="toggleMenu()" >
	 		<div class="sub-menu-wrap" id="subMenu">
	 			<div class="sub-menu">
	 				<div class="user-info">
	 					<img src="../image/user.png">
	 					<h3><?php  $profile = $_SESSION['admin_name'];
						echo $profile;?></h3>
	 				</div>
	 				<hr>
	 				<a href="edit-profile.php" class="sub-menu-link">
	 					<img src="../image/profile.png">
	 					<p>Edit Profile</p>
	 					<span>&rsaquo;</span>
	 				</a>
	 				<a href="edit-password.php" class="sub-menu-link">
	 					<img src="../image/setting.png">
	 					<p>Setting & Privacy</p>
	 					<span>&rsaquo;</span>
	 				</a>
	 				<a href="logout.php" class="sub-menu-link">
	 					<img src="../image/logout.png">
	 					<p>Logout</p>
	 					<span>&rsaquo;</span>
	 				</a>
	 			</div>
	 		</div>
	 	</nav>
	 	
	 </div>
	 <script type="text/javascript">
	 	let subMenu=document.getElementById("subMenu");

	 	function toggleMenu(){
	 		subMenu.classList.toggle("open-menu");
	 	}
	 </script>
</body>
</html>