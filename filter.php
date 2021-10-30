<?php
  session_start();
  if($_SESSION['Auth']==0){
    header("Location: login.php");
  }
?>
<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"], $_POST["my_type"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "finance");  
      $output = ''; 
      if($_POST["my_type"] == "credit"){ 
      $query = "  
           SELECT * FROM transactions  
           WHERE Date_of_Transaction BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND Type = 'credit'  
      "; 
    }
    else
    {
      $query = "  
           SELECT * FROM transactions  
           WHERE Date_of_Transaction BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' AND Type = 'debit'  
      "; 
    }
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered table-striped table-hover">  
           <thead style="background-color: #403B6A; color: white;">  
                <tr>  
                      <th width="20%">Date_of_Transaction</th>  
                      <th width="20%">Transaction_Amount</th>  
                      <th width="20%">Type</th>  
                      <th width="20%">Mode_of_Transaction</th>  
                      <th width="20%">Remark</th>  
                </tr>  
            </thead>
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["Date_of_Transaction"] .'</td>  
                          <td>'. $row["Transaction_Amount"] .'</td>  
                          <td>'. $row["Type"] .'</td>  
                          <td> '.$row["Mode_of_Transaction"] .'</td>  
                          <td>'. $row["Remark"] .'</td> 
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Records Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
