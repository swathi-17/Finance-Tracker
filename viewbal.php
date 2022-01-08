<?php 

  session_start();
  if($_SESSION['Auth']==0){
    header("Location: login.php");
  }

	$servername= "localhost";
	$username="root";
	$password="";
	$dbname="finance";

	$conn = new mysqli($servername,$username,$password,$dbname);
	if($conn-> connect_error){
		die("Connection failed:".$conn->error);
	}

	$result2 = mysqli_query($conn, "SELECT SUM(Balance) AS Current_Balance FROM transactions"); 
	$row2 = mysqli_fetch_assoc($result2); 
	$sum = $row2['Current_Balance'];
/*	$sum = "SELECT SUM(Balance) FROM transaction";*/

	$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Balance</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<!--Font awesome-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('blueimg.jpg');">
	<a href="dashboard.php"> <i style="font-size: 40px; color: #403B6A; width: 10px; margin-left: 50px; margin-top: 20px; border: 2px solid #403B6A;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
	<br><br><br>
	<div class="container">
	<div class="jumbotron">
		<div class="card">
  			<div class="card-header" style="background-color: #403B6A; color: white;">
    			INSPIRANTE TECHNOLOGIES PVT LTD.
  			</div>
  		<div class="card-body" style="background-color: #CFCAF5;">
    	<!--	<h5 class="card-title">BALANCE</h5>  -->
    		<p class="card-text"><?php  echo "<h3> Current Balance: ". $sum . "/-</h3>"; ?></p>
    		<a href="dashboard.php" style="background-color: #403B6A; border: 1px solid black;" class="btn btn-primary">Go to Home Page</a>
  		</div>
  		</div>
	 </div>
	</div>
</body>
</html>