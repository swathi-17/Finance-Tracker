<?php
  session_start();
  if($_SESSION['Auth']==0){
    header("Location: login.php");
  }
?>

<?php  
 $connect = mysqli_connect("localhost", "root", "", "finance");  
 $query = "SELECT * FROM transactions";  
 $result = mysqli_query($connect, $query);  

 $result2 = mysqli_query($connect, "SELECT SUM(Balance) AS Current_Balance FROM transactions"); 
 $row2 = mysqli_fetch_assoc($result2); 
 $sum = $row2['Current_Balance'];
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  



<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Font awesome-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style type="text/css">
th,td {
 border: 1px solid black;
 font-size: 18;
 font-weight: bold;
}
 
</style>  
      </head>  
      <body style="background-image: url('blueimg.jpg');">  
      	<a href="dashboard.php"> <i style="font-size: 40px; color: #403B6A; width: 10px; margin-left: 50px; margin-top: 20px; border: 2px solid #403B6A;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
			<br>
           <div class="container" style="width:1200px; font-size: 15px;"> 
           
            <div class="card" style="width: 1200px;">
 					<div class="card-header" style="background-color: #403B6A; color: white;">INSPIRANTE TECHNOLOGIES PVT LTD.</div>
  					<div class="card-body" style="background-color: #CFCAF5;">
    					<h5 class="card-title" style="text-align: center; font-size: 25px;">
    						<span>Transaction details</span></h5><br>
                <div class="col-md-3">  
                     <input type="text" style="font-size: 15px;" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" style="font-size: 15px;" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div> 
                <div class="col-md-3">  
                   <select style="font-size: 15px;" name="my_type" id="my_type" class="form-control">
                     <option value="">--Select--</option>
					 <option value="credit">Credit</option>
					 <option value="debit">Debit</option>  
					 </select>
                </div>  
                <div class="col-md-1">  
                     <input type="button" style="font-size: 15px; background-color: #403B6A; color: white;" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                 <div class="col-md-2">  
                 	<form action="viewaccount.php">
                     <input type="submit" style="font-size: 15px; background-color: #403B6A; color: white;" name="refresh" value="Refresh" class="btn btn-info" />
                     </form>  
                </div> 
         
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-striped table-hover table-bordered">
                     <thead style="background-color: #403B6A; color: white;">  
                          <tr>  
                               <th width="20%">Date_of_Transaction</th>  
                               <th width="20%">Transaction_Amount</th>  
                               <th width="20%">Type</th>  
                               <th width="20%">Mode_of_Transaction</th>  
                               <th width="20%">Remark</th>  
                          </tr>  
                      </thead>
					<tbody>
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["Date_of_Transaction"]; ?></td>  
                               <td><?php echo $row["Transaction_Amount"]; ?></td>  
                               <td><?php echo $row["Type"]; ?></td>  
                               <td> <?php echo $row["Mode_of_Transaction"]; ?></td>  
                               <td><?php echo $row["Remark"]; ?></td>  
                          </tr>  
                     <?php  
                     }  
                     ?> 
                     </tbody>
                     <tfoot><tr><td colspan='5'>
				<?php  echo "<h5  style='color: white; text-align: center; font-size: 22px; padding: 8px; background-color: #403B6A;'> Current Balance: ". $sum . "</h5>"; ?>
				</td></tr>
				</tfoot> 
                     </table>  
                </div>  
           </div>  
       </div></div>
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();
                var my_type = $('#my_type').val();  
                if(from_date != '' && to_date != '' && my_type != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date, my_type:my_type},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else if(from_date != '' && to_date != '' && my_type == '')
                {  
                     alert("Please Fill All Fields");  
                }
               	else
               	{
               		alert("Please Select Date");
               	}  
           });  
      });  
 </script>
















<?php /*<!DOCTYPE html>
<html>
<head>
	<title>Database Table</title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Font awesome-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<style type="text/css">
th,td {
 border: 1px solid black;
 font-size: 18;
 font-weight: bold;
}
 
</style>  
</head>

<body style="background-image: url('blueimg.jpg');">
	<a href="dashboard.php"> <i style="font-size: 40px; color: #403B6A; width: 10px; margin-left: 50px; margin-top: 20px; border: 2px solid #403B6A;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
	<br>
	<div class="container">
		<div class="jumbotron">
				<div class="card" style="width: 1200px;">
 					 <div class="card-header" style="background-color: #403B6A; color: white;">INSPIRANTE TECHNOLOGIES PVT LTD.</div>
  						<div class="card-body" style="background-color: #CFCAF5;">
    						<h5 class="card-title" style="text-align: center; font-size: 25px;">
    							<span>Transaction details</span>
    					 		<h6>
    					 		<form action="dbsearch.php" method="POST">
    					 			<label for="fdate">From date</label>
    					 			<input type="date" name="fdate" id="fdate">
    					 			<label for="tdate">From date</label>
    					 			<input type="date" name="todate" id="tdate">
    					 			<input type="submit" value="Submit">
    					 		</form>
    					 		</h6>
    					 		<h6>
    					 		<form action="" method="POST" onchange="showCustomer(this.value)">
    					 			<label for="type">Type</label>
    					 			<select name="mytype" id="type">
    					 			<option value="">--Select--</option>
								    <option value="credit">Credit</option>
								    <option value="debit">Debit</option>
								  </select>
								  <input type="submit" value="Refresh">
    					 		</form>
    					 		</h6>
    					 <!--		<form action="view.php">
    					 		  <label for="filter">Filter:</label>
								  <select name="filter" id="filter">
								    <option value="bydate">By date</option>
								    <option value="bytype">By type</option>
								  </select>
								  <input type="submit" name="submit" value="Submit">
								</form>-->
							
							</h5>



							<div id="txtHint">




      						<table class="table table-striped table-hover table-bordered">
				<thead style="background-color: #403B6A; color: white;">
				<tr>
					<th>Date_of_Transaction</th>
					<th>Transaction_Amount</th>
					<th>Type</th>
					<th>Mode_of_Transaction</th>
					<th>Remark</th>
				</tr>
				</thead>
				<tbody>
					<?php 


					$servername= "localhost";
					$username="root";
					$password="";
					$dbname="finance";

					$conn = new mysqli($servername,$username,$password,$dbname);
					if($conn-> connect_error){
						die("Connection failed:".$conn->error);
					}
						
						$sql = "SELECT Date_of_Transaction, Transaction_Amount, Type, Mode_of_Transaction, Remark FROM transaction";
						$query = mysqli_query($conn, $sql);
						$result = $conn->query($sql);

						if ($result -> num_rows > 0) {
						while($row = mysqli_fetch_array($query)){
						?>

						<tr>
							<td><?php echo $row['Date_of_Transaction']; ?></td>
							<td><?php echo $row['Transaction_Amount']; ?></td>
							<td><?php echo $row['Type']; ?></td>
							<td><?php echo $row['Mode_of_Transaction']; ?></td>
							<td><?php echo $row['Remark']; ?></td>
						</tr>
					
						<?php
						}
					}
					else{
						echo "No results found!";
					}

					$result2 = mysqli_query($conn, "SELECT SUM(Balance) AS Current_Balance FROM transaction"); 
					$row2 = mysqli_fetch_assoc($result2); 
					$sum = $row2['Current_Balance'];*/

			/*		if($_POST['value'] == 'credit') { 
					    // query to get all Fitzgerald records 
					    $query = "SELECT * FROM transaction WHERE Type='credit'"; 
					} 
					else{
						$query = "SELECT * FROM transaction WHERE Type='debit'"; 
					}
					$sql= mysqli_query($conn,$query);
					while($row = mysqli_fetch_array($query)){
					?>
						<tr>
							<td><?php echo $row['Date_of_Transaction']; ?></td>
							<td><?php echo $row['Transaction_Amount']; ?></td>
							<td><?php echo $row['Type']; ?></td>
							<td><?php echo $row['Mode_of_Transaction']; ?></td>
							<td><?php echo $row['Remark']; ?></td>
						</tr>
					
					<?php
					}*/

			/*		$conn->close();
					?>

				</tbody>
				<tfoot><tr><td colspan='5'>
					<?php  echo "<h5  style='color: white; text-align: center; font-size: 22px; padding: 8px; background-color: #403B6A;'> Current Balance: ". $sum . "</h5>"; ?>
				</td></tr>
				</tfoot>
				</table>

			</div>



  						</div>
				</div>
		</div>
	</div>
	<br><br>

	<!--<a style="margin:100px;" href="dashboard.php">Click to Go Back</a>-->
	<script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "type.php?q="+str, true);			"type.php?q="+str
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.setRequestHeader("Content-length", str.length);
http.setRequestHeader("Connection", "close");
  document.write(mytype);
  xhttp.send("mytype");         JSON.stringify()
}

</script>
</body>
</html>



*/?>





