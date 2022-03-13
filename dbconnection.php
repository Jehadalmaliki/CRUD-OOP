
<?php 
   
 class Dbconnect 
 { 
  private $_localhost = 'localhost'; 
  private $_user = 'root'; 
  private $_password = ''; 
  private $_dbname = 'dashboard'; 
   
  protected $con; 
   
   public function __construct() 
   { 
   
   if(!isset($this-> $con)) 
   { 
    $this->$con = new mysqli($this->_localhost , $this->_user , $this->_password , $this->_dbname); 
   
} 

return $this->$con; 

} 

// Insert Catogry data into catogry table
public function insertData($post)
{
    $categoryname= $this->con->real_escape_string($_POST['category_name']);
   
    $query="INSERT INTO category(category_id,category_name) VALUES(null,'$categoryname')";
    $sql = $this->con->query($query);
    if ($sql==true) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        header("Location:index.php?msg1=insert");
    }else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
// Insert Product data into Product table
public function insertData1($post)
{
    $productname=$_POST['productname'];
    $productprice=$_POST['productprice'];
    if($_FILES['productimage']['name']){
     move_uploaded_file($_FILES['productimage']['tmp_name'], "image/".$_FILES['productimage']['name']);
     $img="image/".$_FILES['productimage']['name'];
     }
    
    $categoryname=$_POST['category'];
   
    $query="INSERT INTO product(product_id,product_name,product_price,product_image,category_id) VALUES(null,'$productname', '$productprice','$img','$categoryname')";
    $sql = $this->con->query($query);
    if ($sql==true) {
        echo "<script>alert('You have successfully inserted the data');</script>";
        header("Location:index.php?msg1=insert");
    }else{
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
// Fetch Catogry records for show listing
public function displayData()
{
    $query = "SELECT * FROM category";
    $result = $this->con->query($query);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
           $data[] = $row;
    }
     return $data;
    }else{
     echo "No found records";
    }
}
// Fetch single data for edit from customer table
public function displyaRecordById($id)
{
    $query = "SELECT * FROM category WHERE id = '$id'";
    $result = $this->con->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row;
    }else{
    echo "Record not found";
    }
}
// Fetch product records for show listing
public function displayData1()
{
    $query = "SELECT * FROM product";
    $result = $this->con->query($query);
if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
           $data[] = $row;
    }
     return $data;
    }else{
     echo "No found records";
    }
}

public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['category_name']);
		    
		    $id = $this->con->real_escape_string($_POST['category_id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE category SET name = '$name' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}
//Updata product 
        public function updateRecord1($postData)
		{
		    $productname=$_POST['productname'];
            $productprice=$_POST['productprice'];
            if($_FILES['productimage']['name']){
            move_uploaded_file($_FILES['productimage']['tmp_name'], "image/".$_FILES['productimage']['name']);
            $img="image/".$_FILES['productimage']['name'];
     }
        else{
        $img=$_POST['img1'];
    }
  
        $categoryname=$_POST['category'];
        $id = $this->con->real_escape_string($_POST['product_id=']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE product SET name = '$name' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
	    echo "Registration updated failed try again!";
			}
	   }
			
		}
    // Delete Catogry data from Catogry table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM category WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
        public function deleteRecord1($id)
		{
		    $query = "DELETE FROM product WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}

	}
?> 