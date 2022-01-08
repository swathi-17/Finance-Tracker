<!DOCTYPE html>
<html>
<style>
body{
	background-color: hsl(232, 51%, 89%);
	font-family: 'Times New Roman';
	border: 10px outset hsl(102, 58%, 33%);;
	padding: 30px;
	color: hsl(211, 83%, 26%); // hsl(115, 83%, 37%); 
	margin: 10px 160px 20px 160px;
	text-align: center;
	font-size: 30px;
}
</style>
<?php

/*$_SESSION['status']="Active";*/
  $email = $_POST['email'];  
  $password = $_POST['password']; 
  $error = "Invalid login!";
session_start();
 if($email=='hi@yahoo.com' && $password == 'finance123'){ 
   	if($_SESSION['Auth']==0) {
   		 $_SESSION['Auth']=1;
   		 header("Location: dashboard.php"); 
 	}  
}
 else{  
  /* echo "<h1>Login successful!</h1>";*/
  //echo "<body><center> Login failed. Invalid username or password. </center></body>"; 
  //$_SESSION['error_message'] = "Invalid!";
  $_SESSION["error"] = $error;
    header("location: login.php");
     		
 }     

?>