<?php
//include 'config.php';
$conn=mysqli_connect('localhost','root','','sunshine');
session_start();
  $proid= $_GET['proid'];
          $qry="SELECT * FROM `product` WHERE `pid`='$proid'";
          $data=mysqli_query($conn,$qry);
         $result=mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Edit Product</title>

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
	
    <div class="testbox">
      <form action="" method="POST">
        <h1>Edit Product</h1>
       
        <h4>Product Name<span>*</span></h4>
        <input type="text" value="<?php echo $result['productname']; ?>" name="productname">
    		<h4>Company Name<span>*</span></h4>
      		<select name="companyname">
            <?php
            $qry="SELECT `companyname` FROM `company`";
            $data=mysqli_query($conn,$qry);
            while($row=mysqli_fetch_array($data))
            {?>
            <option value="<?php echo $row["companyname"];?>"><?php echo $row["companyname"];?></option>
            <?php } ?>
          </select>
    		  <h4>Category Name<span>*</span></h4>
      		<select name="categoryname">
                <?php
                $qry="SELECT `categoryname` FROM `category`";
                $data=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($data))
                {?>
                <option value="<?php echo $row['categoryname'];?>"><?php echo $row['categoryname'];?></option>
                <?php } ?>
          </select>
		 <h4>Product Price<span>*</span></h4>
        <input type="text" value="<?php echo $result['productprice']; ?>" name="productprice">
		<h4>Stock<span>*</span></h4>
        <input type="text" value="<?php echo $result['stock'];?>" name="stock">
        <div class="btn-block">
          <button type="submit" name="submit" href="manage-product.php">Update</button>
        </div>
        <?php
    if(isset($_POST['submit']))
      { 
        $pname= $_POST['productname'];
        $cmpname= $_POST['companyname'];
        $catname= $_POST['categoryname'];
        $pprice= $_POST['productprice'];
        $stock= $_POST['stock'];
    
        $qry="UPDATE product SET productname='$pname',companyname='$cmpname',categoryname='$catname',productprice='$pprice',stock='$stock' WHERE pid='$proid'";
        $result=mysqli_query($conn,$qry);
        if($result)
        {
          echo "<script>alert('Product Updated Successfuly');</script>";
          ?>
              <meta http-equiv = "refresh" content = "0; url =http://localhost/sunshine/pages/manage-product.php" />
              <?php
        }
        else
        {
          echo "<script>alert('Product Not Updated Successfuly');</script>";
        }
      };
      ?>
      </form>
    </div>
  </body>
</html>