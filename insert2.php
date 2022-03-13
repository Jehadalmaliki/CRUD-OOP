<?php 
//Databse Connection file
include('dbconnection.php');

$product = new Dbconnect();
$customerObj = new Customers();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $product->insertData1($_POST);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

.form-control {
	height: 40px;
	box-shadow: none;
	
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {

	border-radius: 3px;
	margin-bottom: 15px;
	
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
			
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
		<h2>form</h2>
		
        <div class="form-group">
			
				<div class="col"><input type="text" class="form-control" name="productname" placeholder="product Name" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col"><input type="text" class="form-control" name="productprice" placeholder="product price" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col"><input type="file" class="form-control" name="productimage" placeholder="product image" required="true"></div>
			       	
        </div>
         <div class="form-group">
			
				<div class="col">
				<select name = 'category'>
                <?php 
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>

				<option value = '<?=$row['category_id']?>'><?=$row['category_name']?></option>
			<?php
 
}?>	
			</select>
                </div>
			       	
        </div>
       <div class="form-group">
            <button type="submit" class="btn  btn-block" name="submit">Submit</button>
        </div>
    </form>
	
</div>
</body>
</html>