<?php
  session_start();
  if($_SESSION['Auth']==0){
    header("Location: login.php");
  }
?>

<html>
<head>
    <title> Finance Tracker </title>
    <!--<link rel="stylesheet" href="styles2.css">-->
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <!--<meta name="description" content="">
 <meta name="author" content="">-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <!-- Bootstrap core CSS-->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--Custom fonts for this template-->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 <!--Font awesome-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <!--Custom styles for this template-->
 <link href="css/sb-admin.css" rel="stylesheet">
 <style type="text/css">
label {
  font-weight: 700;
}
@media only screen and (min-width: 200px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
@media only screen and (max-width: 250px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
@media only screen and (min-width: 250px) {
  /* For mobile phones: */
 span {
    width: 400px;
   /* text-align: center;
    float: center;
     display: inline-block;*/
  }
}
 </style>
</head>

 

<body class="bg-dark" style="background-image: url('gradient.png'); background-size: cover; background-repeat: no-repeat;">
 <a href="dashboard.php"> <i style="font-size: 40px; color: white; width: 10px; margin-left: 100px; margin-top: 50px; border: 2px solid white;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
  
  <!--<span class="border col-12 col-s-12" style="color: white; font-family: Courier New; text-shadow: 2px 5px 4px black; font-size: 30px;/* margin-left: 595px; */padding:20px; background-color: #403B6A; border: 10px outset white; box-sizing: border-box;">FILL THE DETAILS</span>-->
  
 <div class="container" style="width: 650px;">
   <div class="abc card card-register mx-auto mt-5" style="align-items: center; background-color: #C9C3FC; "><br>
    <div class="card-header" style="color: white; font-size: 30px; background-color: #403B6A;">Fill the details</div><br>
         <div class="card-body">
       <form method="post" action="dbstore.php">
       <!--  <?php include('errors.php'); ?>-->
         <div class="form-group">
           <div class="form-row">
             <div class="col-md-6">
               <label for="date">Date</label>
               <input style="border: 1px solid black;" class="form-control" id="date" type="date" name="date" required>
             </div>
           <div class="col-md-6">
           <label for="amt">Transaction amount</label>
           <input style="border: 1px solid black;" class="form-control" id="amt" type="text" name="amount" required>
           </div>
          </div>
         </div>
         <br>
         <div class="form-group">
           <div class="form-row">
             <div class="col-md-6">
               <label for="type">Type</label>
               <select style="border: 1px solid black;" id="type" name="type">
    			<option value="credit">Credit</option>
    			<option value="debit">Debit</option>
				</select><br>
             </div>
            <div class="col-md-6">
               <label for="mode">Mode</label>
               <select style="border: 1px solid black;" id="mode" name="mode">
    			<option value="cash">Cash</option>
    			<option value="cheque">Cheque</option>
    			<option value="neft">NEFT</option>
				</select><br>
             </div>
           </div>
         </div>
         <div class="form-group">
         <label for="remark">Remark</label><br>
	<textarea style="border: 1px solid black;" id="remark" name="remark" rows="2" cols="58" required></textarea><br>	
         </div>
          <button type="submit" class="btn btn-primary btn-block" style="background-color: #403B6A; border: 1px solid white;" name="submit">Submit</button>
         
       </form>
       <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
                        <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;"><?php echo "<h5 style='text-align:center; color:green'><b>".$_SESSION['success_message']."</b></h5>"; ?></div>
                        <?php
                        unset($_SESSION['success_message']);
  }
?>
      <!--  <p id="aaa"></p>-->
      <!-- <div class="text-center">
         <a class="d-block small mt-3" href="login.php">Login Page</a>
        <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
       </div>-->
     </div>
   </div>
 </div>
 <!-- Bootstrap core JavaScript-->
 <!--<script type="text/javascript">
   $("#submitForm").click(function() {
   alert("The Form has been Submitted.");
});
 </script>-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- Core plugin JavaScript-->
 <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- <script>
 	function myfunc(){
 		document.getElementById("aaa").innerHTML="Submitted successfully";
 	}
 </script>-->
</body>
</html>







<!--
<body class="b1">
  <br><br><br>
  <p class="h1">
    LOGIN
  </p>
 <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  <form action="" class="f1" method="post">
    <div class="container">
    <label for="date">Date</label><br>
    <input type="date" id="date" name="date"><br><br>
	<label for = "amt"> Transaction amount</label> <br>
    <input type="text" placeholder="Enter amount" id="amt" name="amount"><br><br>
    <label for="type">Type</label><br>
	<select id="type" name="type">
    <option value="credit">Credit</option>
    <option value="debit">Debit</option>
	</select><br><br>
	<label for="mode">Mode</label><br>
	<select id="mode" name="mode">
    <option value="cash">Cash</option>
    <option value="cheque">Cheque</option>
    <option value="neft">NEFT</option>
	</select><br><br>
	<label for="remark">Remark</label><br>
	<textarea id="remark" name="remark" rows="2" cols="50">  </textarea><br>
    <input class="button" type="submit" value="Submit">
  </div>
  </form>
 </body>
-->

