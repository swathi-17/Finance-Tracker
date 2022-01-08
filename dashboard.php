<?php 

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

  $conn->close();
  session_start();
  if($_SESSION['Auth']==0){
    header("Location:login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" type="text/css" href="newstyles.css">

<!--Modal-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--<link href="font-awesome.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
 <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
  <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">-->
 <!-- Bootstrap core CSS-->
  <!--Custom fonts for this template
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->

</head>
<body>

  <div class="grid-container">
   <div class="menu-icon">
    <i class="fas fa-bars"></i>  <!-- header__menu -->
  </div>
   
  <header class="header">
   <!-- <div class="header__search">Search...</div>-->
    <div class="header__avatar"><!--<img src="img_avatar2.png" width="30" height="30" style="border-radius: 50px;">--></div>
  </header>

  <aside class="sidenav">
    <div class="sidenav__close-icon">
     <!-- <i class="fas fa-times sidenav__brand-close"></i>--> &times;
    </div>
    <ul class="sidenav__list">
      <img src="logo.jpg" alt="logo" width="130" height="130" style="margin-left: 40px; margin-top: -20px; border: 5px solid #800000;"><br><br>
      <li class="sidenav__list-item"><a href="secondform.php">Perform Transaction</a></li>
      <li class="sidenav__list-item"><a href="viewaccount.php">View All Transactions</a></li>
      <li class="sidenav__list-item"><a href="viewbal.php">View Balance</a></li><br>
    <!--  <li class="sidenav__list-item"></li>
      <li class="sidenav__list-item"></li>-->
      <button style="background-color: #403B6A; margin-left: 35px;" type="button" class="btn btn-info btn-lg w3-hover-blue" data-toggle="modal" data-target="#myModal"> Designed By</button><br><br>
      <a href="logout.php"><button type="button" class="w3-button w3-border w3-hover-red buttons" style="background-color: #403B6A; margin-left: 60px; color:white;">LOGOUT</button></a>
    </ul>
  </aside>

  <main class="main">
    <div class="main-header">
      <div class="main-header__heading"><h1> INSPIRANTE TECHNOLOGIES PVT LTD.</h1>
        <h6>CIN: U72900KA2019PTC126003</h6><br> 
      </div>
      <!--<div class="main-header__updates">Recent Items</div>-->
    </div>
    <br>
    <div class="main" style="text-align: center; font-size: 20px; color:#403B6A;">
      DIRECTORS:
    </div>
 <!--   <div class="main-overview">
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
      <div class="overviewcard">
        <div class="overviewcard__icon">Overview</div>
        <div class="overviewcard__info">Card</div>
      </div>
    </div>-->

    <div class="main-cards">
      <div class="card-deck">
  <div class="card">
    <img src="principal.jpg" class="card-img-top" alt="principal">
    <div class="card-body">
      <h5 class="card-title"><b>Dr Niranjan N Chiplunkar</b></h5>
      <p class="card-text">CEO</p>
    <!--  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
    </div>
  </div>
  <div class="card">
    <img src="shashanksir.jpg" class="card-img-top" alt="shashank">
    <div class="card-body">
      <h5 class="card-title"><b>Mr Shashank Shetty</b></h5>
      <p class="card-text">CEO</p>
    <!--  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
    </div>
  </div>
  <div class="card">
    <img src="puneethsir.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><b>Mr Puneeth R P</b></h5>
      <p class="card-text">CFO</p>
    <!--  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
    </div>
  </div>
  <div class="card">
    <img src="krishnasir.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><b>Mr Krishna Prasad N Rao</b></h5>
      <p class="card-text">CTO</p>
    <!--  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
    </div>
  </div>
</div>
     <!-- <div class="card">Card</div>
      <div class="card">Card</div>
      <div class="card">Card</div>-->
    </div>
  </main>

  <footer class="footer">
    <div class="footer__copyright">&copy; 2021</div>
    <div class="footer__signature">Made by</div>
  </footer>
</div>

<div class="container">
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content 403B6A-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #7B9EF6">
         <!-- <button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title" style="background-color: #7B9EF6; font-family: ALGERIAN; font-weight: bold; color: white; font-size: 25px">DESIGNED BY:</h4>
        </div>
        <div class="modal-body">
      
          <div class="row" >
            <div class="card-group">
            <div class="card" style="width: 18rem;">
  <img src="swathii.jpg" class="card-img-top" alt="swathi">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;"><b>SWATHI</b></h5>
    <p class="card-text" style="text-align: center">4NM19CS201</p>
  </div>
</div>
           <!--  <img src="swathi.jpg" alt="Swathi" style="width:100%; /*border-radius: 50%;*/">
             <h3>SWATHI</h3>-->
      
          <div class="card" style="width: 18rem;">
  <img src="theja.jpg" class="card-img-top" alt="thejalakshmi">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center"><b>THEJALAKSHMI</b></h5>
    <p class="card-text" style="text-align: center">4NM19CS204</p>
  </div>
</div>
        <!--   <img src="theja.jpeg" alt="Theja" style="width:100%; /*border-radius: 50%;*/">
           <h3>THEJALAKSHMI</h3>-->
        <!--<div class="column">
           <img src="img_mountains.jpg" alt="Mountains" style="width:100%">
        </div>-->
       </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<script type="text/javascript">
  const menuIconEl = $('.menu-icon');
const sidenavEl = $('.sidenav');
const sidenavCloseEl = $('.sidenav__close-icon');

// Add and remove provided class names
function toggleClassName(el, className) {
  if (el.hasClass(className)) {
    el.removeClass(className);
  } else {
    el.addClass(className);
  }
}

// Open the side nav on click
menuIconEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});

// Close the side nav on click
sidenavCloseEl.on('click', function() {
  toggleClassName(sidenavEl, 'active');
});
</script>
</body>
</html>






















<?php /*
<!doctype html>
<html lang="en">
  <head>
     <!--Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <!--Icons-->
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
 <!--   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">-->
   <link rel="stylesheet" type="text/css" href="dashbd.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <!--<link rel="stylesheet" href="./dashboard.css" >-->

   <!-- <title>Hello, world!</title>-->
 
  </head>
  <body style="background-image: url('blueimg.jpg');">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<nav class="navbar navbar-dark fixed-top bg-primary flex-md-nowrap p-0 shadow" style="background-color: #403B6A;">
<div class="col-s-6 col-6">
<!--<a class="navbar-brand col-md-3" href="dashboard.php" style="color:black; font-weight: 600; background-color: #CFCAF5; text-align: center; border-radius: 10px;"> <i class="fa fa-home"></i> HOME</a>--></div></nav>
  
<!--<input type="text" class="form-control form-control-primary w-100 search-query" placeholder="Search..." > 
  <button type="submit"><i class="fa fa-search"></i></button>
<ul class="navbar-nav px-3">
  <li class="nav-item text-nowrap">
    <a class="nav-link" style="color:white;" href="#">Logout</a>
  </li>
</ul>
-->


<div class="container-fluid">
  <div class="row">
<!--     Sidear -->
 
    <div class="col-s-4 col-3 sidebar">
      <div class="left-sidebar" style="background-color: #C9C3FC !important;">
      <img src="logo.jpg" alt="logo" width="130" height="130" style="margin-left: 60px; margin-top: 20px; border: 5px solid #800000;">
        <ul class="nav flex-column sidebar-nav">
          <br><br><br><div class="col-s-12 col-12" style="margin-top: -30px;"><span class="ex prof">COMPANY PROFILE</span></div><br>
          <li class="nav-item"><br>
            <a class="nav-link active abc" href="secondform.php">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
              Perform Transaction
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link abc" href="viewaccount.php">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
              View All Transactions
            </a>
          </li>
      <!--    <li class="nav-item">
            <a class="nav-link abc" href="view.php">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
              View Transactions By Date
            </a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link abc" href="viewbal.php">
              <svg class="bi bi-chevron-right" width="16" height="16" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.646 3.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L12.293 10 6.646 4.354a.5.5 0 010-.708z" clip-rule="evenodd"/></svg>
              View Balance
            </a>
          </li>
        </ul>
        <br>
        <button style="background-color: #403B6A;" type="button" class="btn btn-info btn-lg w3-hover-blue button2" data-toggle="modal" data-target="#myModal"> Designed By</button>
        <br>
        <br>
          <div class="nav-item">
        <!--       <button type="button" class="btn btn-primary btn-block" style="background-color: #85338A; border: 1px solid white;" name="login" onclick="myfunc()">Logout</button>-->
          <a href="logout.php"><button type="button" class="w3-button w3-border w3-hover-red buttons" style="background-color: #403B6A">LOGOUT</button></a>
          </div>

       
       <!-- <br> <br> <br> <br> <br> <br> <br>

 <figure class="author-card-shape">
 <img class="author-card-img" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams">
</figure>-->
  </div>
</div>
</div>
</div>

 <!--<div style="font-size: 40px; text-align: center; font-family: times new roman; color: white; width:500px; margin-left: 550px">
    <div style="border: 5px solid white; background-color: #85338A; box-shadow: 10px 10px black; text-shadow: 5px 8px 4px #000000;">FINANCE TRACKER</div></div>-->
 
<div class="container-sm">
<div class="card mb-3" style="margin-left: 340px;">
  <div class="card-body">
  <!--  <h5 class="card-title"> NMAM INSTITUTE OF TECHNOLOGY</h5>-->
    <p class="card-text">
      <div class="row">
        <div class="col-8 col-s-8">
      <h1 class="col-6 col-s-4" style="font-size: 35px; margin-top: -50px; text-align: center; margin-left: 300px; border: 10px double #403B6A"><!--span style="font-family: Lucida"> Name:</span>--><span style="font-family: Algerian; color: #403B6A; text-shadow: 2px 2px 2px black;"> INSPIRANTE TECHNOLOGIES PVT LTD.</span></h1><br><br>
      <h3><span style="font-family: Lucida"><b> CIN:</b></span> </h3>
      <h3><span style="font-family: Lucida"><b> Directors:</b></span></h3></p></div></div>
  
  <div class="card-group col-12 col-s-2">
  <div class="row row-cols-3 row-cols-md-2 g-4" style="display: flex;">
 <!-- <div class="col-3 col-s-2">-->
    <div class="card h-100">
      <img src="principal.jpg" class="card-img-top" alt="..." width="250" height="250">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;"><b>Dr Niranjan N Chiplunkar</b></h5>
        <p class="card-text" style="text-align: center;">1</p>
      </div>
    </div>
 <!--  </div>
  <div class="col-3 col-s-2">-->
    <div class="card h-100">
      <img src="shashanksir.jpg" class="card-img-top" alt="..." width="250" height="250">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;"><b>Mr Shashank Shetty</b></h5>
        <p class="card-text" style="text-align: center;">CEO</p>
      </div>
    </div>
 <!--  </div>
  <div class="col-3 col-s-2">-->
    <div class="card h-100">
      <img src="puneethsir.jpg" class="card-img-top" alt="..." width="250" height="250">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;"><b>Mr Puneeth R P</b></h5>
        <p class="card-text" style="text-align: center;">CFO</p>
      </div>
    </div>
<!--   </div>
  <div class="col-3 col-s-2">-->
    <div class="card h-100">
      <img src="krishnasir.jpg" class="card-img-top" alt="..." width="250" height="250">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;"><b>Mr Krishna Prasad N Rao</b></h5>
        <p class="card-text" style="text-align: center;">4</p>
      </div>
    </div>
 <!--  </div>-->

</div>
</div>

 <!--   <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
  </div>
</div>

</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="background-color: #800000; font-family: ALGERIAN; font-weight: bold; color: grey;">DESIGNED BY:</h4>
        </div>
        <div class="modal-body">
      
          <div class="row1" >
          <div class="column1">
             <img src="swathi.jpg" alt="Swathi" style="width:100%; border-radius: 50%;">
         </div>
        <div class="column1">
           <img src="theja.jpeg" alt="Theja" style="width:100%; border-radius: 50%;">
        </div>
        <!--<div class="column">
           <img src="img_mountains.jpg" alt="Mountains" style="width:100%">
        </div>-->
       </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  </body>
</html>


*/
?>





















<!--
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 50%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 20px;
  color: hsl(0, 0%, 82%); 
  display: block;
}

.sidenav a:hover {
  color: black;
  background-color: hsl(0, 0%, 88%);
}

.main {
  margin-left: 500px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="#">Perform Transaction</a><br>
  <a href="#">View Transaction</a>
</div>

<div class="main">
  <h2>Sidenav Example</h2>
  <p>This sidenav is always shown.</p>
</div>

   
</body>
</html> 
-->