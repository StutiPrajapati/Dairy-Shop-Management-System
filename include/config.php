<?php
$conn=mysqli_connect('localhost','root','','sunshine');
//$error_reporting(0);
if($conn)
{
	echo "Conncted Successfuly.";
}
else
{
	echo "Connection Failed.";
}
?>