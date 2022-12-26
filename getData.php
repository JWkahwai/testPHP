<?php  
include 'config.php';
 if(isset($_POST["getStaffID"]))  
 {  
      $query = "SELECT `StaffID`, `Email`, `Phone`, `Role`, `Department`, `Salary`, `Status` FROM `staff` 	WHERE StaffID = '".$_POST["getStaffID"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }
 ?>