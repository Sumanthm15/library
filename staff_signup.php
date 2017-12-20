<?php  

$servername = "localhost";  
$username = "root";  
$password = "";  
$db = "online_library";  

$staff_id = $staff_name = $staff_password = $designation = "";
$iderr = $nameerr = $pwderr = $dsgnerr = "";

	$staff_id=$_POST['staff_id'];
	$staff_name=$_POST['staff_name'];
	$staff_password=$_POST['staff_password'];
	$designation=$_POST['designation'];

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO staff(staff_id, staff_name, staff_password, designation)
 VALUES ('$staff_id','$staff_name','$staff_password','$designation')"; 
  
if ($conn->query($sql) === TRUE){ 
  
       echo "<script>window.open('stchecklist.php','_self')</script>"; 
} else{ 
echo "error:" .$sql. "<br>" .$conn->error ; 
} 
   
$conn->close();  
?>  