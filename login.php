<?php

session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == 1){   /*$_SESSION['Auth'] == 1*/
  header('Location:dashboard.php');
}     
?>
<!DOCTYPE html>
<html>
<head>
    <title> Finance Tracker </title>
    <link rel="stylesheet" href="./styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <style type="text/css">
  /*   @media only screen and (max-width: 250px) {
   For mobile phones: 
  [class*="col-"] {
    width: 100%;
  }
}
*/
.text-center {
  text-align: center;
}
   </style>
</head>
<br><br>
<?php
  if(!isset($_SESSION['Auth']) || $_SESSION['Auth'] !=1){  /*$_SESSION['Auth'] != 1*/
     $_SESSION['Auth'] = 0;
  }
  else{
    $_SESSION['Auth'] = 1;
  }
?>
<body class="b1" style="background-color: black; background-image: url('gradient.png'); background-repeat: no-repeat; background-size: cover;">
    <!--<div class="text-center" style="font-size: 50px; text-align: center; font-family: times new roman; color: white; width:500px; /*margin-left: 510px;*/ box-shadow: 10px 10px grey;">
      <h1 class="text-center" style="text-align: center; margin: 0px 100px; border: 5px solid white; background-color: #403B6A; text-shadow: 5px 8px 4px #000000;">-->
      <h1 style="text-align: center; color:white; font-family: times new roman; font-size: 50px; text-decoration: underline;">FINANCE TRACKER</h1>
      
  <br>
  <h1 class="h1" style="color:white; font-size: 40px;"> ADMIN LOGIN</h1> 
 <!--<div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>-->
   <div class="container" style="background-color: #CFCAF5; width: 600px; border-radius: 30px; /*margin-left: 23px; margin-bottom: 10px;*/">
  <form action="mid.php" style="padding:20px;/*border-radius: 30px; border: 10px outset grey; background-color: #CFCAF5; width: 600px; margin-left: 360px;*/" method="post">
   
    <div class="form-group">
      <div class="col-12 col-md-12">
    <label for="email">Email id</label>
    <input type="text" style="border: 1px solid black;" placeholder="Enter email id" id="email" name="email">
    </div><br>
    <div class="col-12 col-md-12">
	  <label for = "password"> Password</label> 
    <input type="password" style="border: 1px solid black;" placeholder="Enter password "id="password" name="password"><br>
  </div>
</div>
    <input class="button" style="background-color: #403B6A" type="submit" value="Login">
          <?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<h5 style='text-align:center; color:red'><b>$error</b></h5>";
                    }
          ?>  
  </form>
 </div>
      </body>

</html>

<?php
    unset($_SESSION["error"]);
?>