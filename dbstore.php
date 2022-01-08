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
/*else
	echo "Connection successful";*/
if(isset($_POST['submit']))
{
	$date= $_POST['date'];
	$amount= $_POST['amount'];
	$type= $_POST['type'];
	$mode= $_POST['mode'];
	$remark= $_POST['remark'];

	
	/*$sql2 = "SELECT * FROM transaction";
	$result = mysqli_query($conn,$sql2);
	$row = mysqli_fetch_array($result);

	if($type == 'credit'){
		$row['Balance']=$row['Balance']+$row['Transaction_Amount'];
	}
	else
	{
		$row['Balance']=$row['Balance']-$row['Transaction_Amount'];
	}*/
	$balance = 0;
	if($type== "credit"){
		$balance =$balance + $amount;
	}
	else{
		$balance =$balance - $amount;
	}
		
	$sql= "INSERT INTO transactions(Date_of_Transaction, Transaction_Amount, Type, Mode_of_Transaction, Remark, Balance) values ('$date','$amount','$type','$mode','$remark','$balance');";
	
	/*$var = "SELECT SUM(Transaction_Amount) FROM transaction WHERE Type='$type'";
	$sql= "INSERT INTO transaction(Balance) values ('$var');";*/

	if($conn->query($sql)==TRUE){
	/*	echo "<br><body style='text-align: center;'> Submitted successfully</body>";*/
	session_start();
    $_SESSION['success_message'] = "Form submitted successfully!";
    header("Location:secondform.php");
    exit();

	}
	else 
		echo "<br> <body style='text-align: center;'> Unsuccessful". $conn->error. "</body>";
}





?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<!--	<br><br>
	<a href="dashboard.php">Click to Go Back</a>-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>