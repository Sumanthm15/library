<?php  

$servername = "localhost";  
$username = "root";  
$password = "";  
$db = "online_library";  
if(isset($_POST['login'])){
	$staff_id=$_POST['staff_id'];
	$staff_password=$_POST['staff_password'];
	
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from staff where staff_id='$staff_id' AND staff_password='$staff_password'"; 
$result=$conn->query($sql);
if($result->num_rows>0){
	echo "<script>window.open('stchecklist.php','_self')</script>";
}
else{
	echo "<script>alert('Staff Details are incorrect..!')</script>";}
}  
?>  