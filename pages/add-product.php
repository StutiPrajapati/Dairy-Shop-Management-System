<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Add Product</title>
    <link rel="stylesheet" type="text/css" href="../css/add.css">
      <style>
        .testbox {
    margin-top:1%;
      display: flex;
    margin-right:10%;
      align-items: center;
      /*height: inherit;*/
      padding: 3px;
    margin-left:30%;
      /*position:relative;*/
      }
      </style>
  </head>
  <body>
    <?php
	@include_once 'header.php';
    @include_once('adminsidebar.php');
	?>
	<?php
    if(isset($_POST['submit']))
      { 
        $pname= $_POST['productname'];
        $cmpname= $_POST['companyname'];
        $catname= $_POST['categoryname'];
        $pprice= $_POST['productprice'];
        $stock= $_POST['stock'];
		
        $qry="INSERT INTO product (`productname`,`companyname`,`categoryname`,`productprice`,`stock`) VALUES ('$pname','$cmpname','$catname','$pprice','$stock')";
        $result=mysqli_query($conn,$qry);
        if($result)
        {
          echo "<script>alert('Product Added Successfuly');</script>";
        }
        else
        {
          echo "<script>alert('Product Not Added Successfuly');</script>";
        }
      };
      ?>
    <div class="testbox">
      <form action="" method="POST">
        <h1>Add Product</h1>
       
        <h4>Product Name<span>*</span></h4>
        <input type="text" name="productname" placeholder="Product Name" required />
    		<h4>Company Name<span>*</span></h4>
      		<select name="companyname">
            <?php
            $qry="SELECT `companyname` FROM `company`";
            $result=mysqli_query($conn,$qry);
            while($row=mysqli_fetch_array($result))
            {?>
            <option value="<?php echo $row["companyname"];?>"><?php echo $row["companyname"];?></option>
            <?php } ?>
          </select>
    		  <h4>Category Name<span>*</span></h4>
      		<select name="categoryname">
                <?php
                $qry="SELECT `categoryname` FROM `category`";
                $result=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($result))
                {?>
                <option value="<?php echo $row['categoryname'];?>"><?php echo $row['categoryname'];?></option>
                <?php } ?>
          </select>
		 <h4>Product Price<span>*</span></h4>
        <input type="text" name="productprice" placeholder="Product Price" required />
		<h4>Stock<span>*</span></h4>
        <input type="text" name="stock" placeholder="Stock" required />
        <div class="btn-block">
          <button type="submit" name="submit" href="">Add</button>
        </div>
      </form>
    </div>
  </body>
</html>