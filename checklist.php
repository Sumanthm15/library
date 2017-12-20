<?php  

$servername = "localhost";  
$username = "root";  
$password = "";  
$db = "online_library";  

$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM borrower"; 
$result=$conn->query($sql);
        while($row=mysqli_fetch_array($result))
        {  
            $user_id=$row[0];  
            $user_name=$row[1];  
            $user_email=$row[2];  
            $user_pass=$row[3];
        ?>  
  
        <tr>  
 
            <td><?php echo $user_id;  ?></td>  
            <td><?php echo $user_name;  ?></td>  
            <td><?php echo $user_email;  ?></td>  
            <td><?php echo $user_pass;  ?></td>  
            <td><a href="delete.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td>  
        </tr>
} 
?>  