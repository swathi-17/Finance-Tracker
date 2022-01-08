<?php
  session_start();
  if($_SESSION['Auth']==0){
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Table</title>

	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<!--Font awesome-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js">
	 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
<style type="text/css">
th,td {
 border: 1px solid black;
 font-size: 18;
 font-weight: bold;
}
</style>
</head>
<body style="background-image: url('blueimg.jpg');">
	<a href="viewaccount.php"> <i style="font-size: 40px; color: #403B6A; width: 10px; margin-left: 50px; margin-top: 20px; border: 2px solid #403B6A;" class="fa fa-arrow-left" aria-hidden="true"></i></a>
	
	<div class="container">
		<div class="jumbotron">
				<div class="card" style="width: 1100px; margin-left: 100px;">
 					 <div class="card-header" style="background-color: #403B6A; color: white;">INSPIRANTE TECHNOLOGIES PVT LTD.</div>
  						<div class="card-body" style="background-color: #CFCAF5;">
    						<h5 class="card-title" style="text-align: center; font-size: 25px;">Transaction details</h5>
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
						
						$sql = "SELECT Date_of_Transaction, Transaction_Amount, Type, Mode_of_Transaction, Remark FROM transaction WHERE Date_of_Transaction between '".$_POST["fdate"]."' AND '".$_POST["todate"]."'";
						$query = mysqli_query($conn, $sql);
						$result = $conn->query($sql);

						/*if ($result -> num_rows > 0) {
					     output data of each row
					    while($row = $result->fetch_assoc()) {
					       echo "<tr><td>" . $row["Date_of_Transaction"] . "</td><td>" . $row["Transaction_Amount"] ."</td><td>" . $row["Type"] . "</td><td>" . $row["Mode_of_Transaction"] . "</td><td>" . $row["Remark"] . "</td></tr>";
					    }
					    echo "</table>";
						}
						else {
					    echo "0 results";
						}*/
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


					$conn->close();
					?>

				</tbody>
				</table>
  						</div>
				</div>
		</div>
	</div>
	<br><br>

	<!--<a style="margin:100px;" href="viewaccount.php">Click to Go Back</a>-->
</body>
</html>

