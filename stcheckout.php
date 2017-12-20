<?php  

$servername = "localhost";  
$username = "root";  
$password = "";  
$db = "online_library";  
if(isset($_POST['submit'])){
	$student_id=$_POST['student_id'];
	$student_name=$_POST['student_name'];
	$st_department=$_POST['department'];
	$book="";
	$csbook=$_POST['csbook'];
	$cebook=$_POST['cebook'];
	$eebook=$_POST['eebook'];
	$tcbook=$_POST['tcbook'];
	$misbook=$_POST['misbook'];
	if($csbook!="Computer Science"){
		$book=$csbook;
	}
	elseif ($cebook!="Computer Engineering") {
		$book=$cebook;
		}
	elseif ($eebook!="Electrical") {
		$book=$eebook;
		}
	elseif ($tcbook!="Telecommincations") {
		$book=$tcbook;
		}
	elseif ($misbook!="MIS") {
		$book=$misbook;
		}
	$startdate=$_POST['tdate'];
	$enddate=$_POST['edate'];	
$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$check="SELECT current_copies FROM book WHERE book_title='$book'";
$then=$conn->query($check);
$row=$then->fetch_assoc();
$id = (int) $row['current_copies'];
if($id<=0){
	echo "<script>alert('Selected book is unavailable. Please come back later.')</script>";
	echo "<script>window.open('books.html','_self')</script>";
}
else{
$sql = "INSERT INTO borrower(borrowed_from, borrowed_to, student_id, book_isbn) VALUES ('$startdate','$enddate','$student_id',(SELECT book_isbn FROM book WHERE book_title='$book'))"; 
$result=$conn->query($sql);

$sql2 = "INSERT INTO student(student_id, student_name, department_id) VALUES ('$student_id','$student_name',(SELECT department_id FROM department WHERE department_name='$st_department'))";
$res2=$conn->query($sql2);

$sql3="UPDATE book SET current_copies=current_copies-1 WHERE book_title='$book'";
$res3=$conn->query($sql3);
echo "<script>window.open('books.html','_self')</script>"; 
}
} 
?>  