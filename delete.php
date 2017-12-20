<?php  

$servername = "localhost";  
$username = "root";  
$password = "";  
$db = "online_library";  

$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  
    $delete_id=$_GET['del'];

    $ccopies="UPDATE book SET current_copies=current_copies+1 WHERE book_isbn IN (SELECT book_isbn FROM borrower WHERE borrower_id='$delete_id')";
    $res=$conn->query($ccopies);

    $delete_query="DELETE FROM borrower WHERE borrower_id='$delete_id'";  
    $result=$conn->query($delete_query); 

    

    if($result)  
    {   
        echo "<script>window.open('stchecklist.php?deleted = ID has been deleted','_self')</script>";  
    }
?>  