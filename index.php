<?php
//database conection  file
include('dbconnection.php');
$customerObj = new Customers();
$product = new Dbconnect();
  // Delete record from table
  if(isset($_GET['delid']) && !empty($_GET['delid'])) {
      $delid = $_GET['delid'];
      $customerObj->deleteRecord($delid);
  }
//Code for deletion
if(isset($_GET['delproid']) && !empty($_GET['delproid'])) {
    $delproid = $_GET['delproid'];
    $product->deleteRecord1($delproid);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
 background-color:#e8e8e8;  
}
.table-responsive {
    margin: 30px 0;
}

.table-title .show-entries {
    margin-top: 7px;
}
.search-box {
    position: relative;
    float: right;
}
.search-box .input-group {
    min-width: 200px;
    position: absolute;
    right: 0;
}

.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    font-size: 19px;
    position: relative;
    top: 8px;
}
table.table tr th, table.table tr td {
  
}
table.table th i {
  
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
   
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    padding: 0 10px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
}
.pagination li a:hover {
   
}   
.pagination li.active a {
   
}
.pagination li.active a:hover {        
   
}
.pagination li.disabled i {
   
}
.pagination li i {
   
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Catogray</a>
        <a class="nav-link" href="#">Product</a>
        
        
      </div>
    </div>
  </div>
</nav>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <p>Category</p>
                    </div>
                       <div class="col-sm-7" align="right">
                        <a href="insert.php" class="btn btn-info"><i class="material-icons">&#xE147;</i> </a>
                                        
                    </div>
                </div>
            </div>
            <table class="table  ">
                <thead>
                    <tr>
                        <th style="color:red">ID</th>
                        <th style="color:red"> Name</th>                       
                        
                       
                    </tr>
                </thead>
                <tbody>
                <?php 
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
                    
<!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php  echo $row['category_name'];?> </td>
                       <td>
  <!-- <a href="read.php?viewid=<?php echo htmlentities ($row['category_id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                            <a href="edit.php?editid=<?php echo htmlentities ($row['category_id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="index.php?delid=<?php echo ($row['category_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 

} ?>
                 
                
                </tbody>
            </table>
       
        </div>
    </div>
</div> 


<!-- product -->
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <p>Product</p>
                    </div>
                       <div class="col-sm-7" align="right">
                        <a href="insert2.php" class="btn btn-info"><i class="material-icons">&#xE147;</i></a>
                                        
                    </div>
                </div>
            </div>
            <table class="table ">
                <thead>
                    <tr>
                        <th style="color:red">ID</th>
                        <th style="color:red">  Name</th>                       
                        <th style="color:red">  Price</th>
                        <th style="color:red">  Image</th>
                        <th style="color:red"> Category</th>
                    </tr>
                </thead>
                <tbody><?php
                $customers1 = $product->displayData1(); 
          foreach ($customers1 as $customer1) {
        ?>
                    
<!--Fetch the Records -->
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php  echo $row['product_name'];?> </td>
                        <td><?php  echo $row['product_price'];?> </td>
                         <td><img src="<?php echo $row['product_image'];?>" width="100px" height="100px"></td>
                        <?php
                         $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {?>
                        <td><?php  echo $customer;?> </td>
                       <td>
  <!-- <a href="readproduct.php?viewproid=<?php echo htmlentities ($row['product_id']);?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a> -->
                            <a href="edit2.php?editproid=<?php echo htmlentities ($row['product_id']);?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="index.php?delproid=<?php echo ($row['product_id']);?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php 

} } else {?>
<tr>
    <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
</tr>
<?php } ?>                 
                
                </tbody>
            </table>
       
        </div>
    </div>
</div>     
</body>
</html>