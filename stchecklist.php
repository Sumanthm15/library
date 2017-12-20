<!DOCTYPE html>
<html>
<head>
	<title style="font-family: Times New Roman">Online Library Management System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body{
	background-image: url("3.jpg");
	background-attachment:fixed;
	background-size: 100% 100%;	
}
</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
    <div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                       
      </button>
      <a class="navbar-brand" href="welcome.html" style="font-family: Times New Roman; color: white">Online Library</a>
      </div>  
  <div class="collapse navbar-collapse" id="myNavbar" style="text-align: center;">
<ul class="nav navbar-nav navbar-right">
  <li><a href="signup.html"><span class="glyphicon glyphicon-new-window"></span> Staff Sign up</a></li>
  <li><a href="welcome.html"><span class="glyphicon glyphicon-log-out"></span> Staff Signout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <div class="jumbotron" style="background-color: black; opacity: 0.9; margin: 150px 0px">
    <h2 style="font-family: Times New Roman; color: white; margin-right: 20px; margin-left: 20px; text-align: center;">Checklist</strong></h1>
<div class="container">  
    <table class="table">  
        <thead>  
        <tr>  
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Borrower Id</th>  
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Borrowed Date</th>  
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Return Date</th>  
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Student ID</th>  
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Book ISBN</th>
            <th style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px">Delete the request</th>  
        </tr>  
        </thead>
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
            $bid=$row[0];  
            $tdate=$row[1];  
            $rdate=$row[2];  
            $stid=$row[3];
            $bisbn=$row[4];
        ?> 
        <tr>  
 
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><?php echo $bid;  ?></td>  
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><?php echo $tdate;  ?></td>  
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><?php echo $rdate;  ?></td>  
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><?php echo $stid;  ?></td>
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><?php echo $bisbn; ?></td>  
            <td style="text-align: center; font-family: Times New Roman; color: white; font-size: 20px"><a href="delete.php?del=<?php echo $bid ?>"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button></a></td>  
        </tr>
        <?php } ?>  
  </table>
</div>
</div>
</body>
</html>