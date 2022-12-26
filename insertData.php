<body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php  
include 'config.php'; 
 if(!empty($_POST)){    
       
      $getStaffID = mysqli_real_escape_string($conn, $_POST["getStaffID"]);  
      $Email= mysqli_real_escape_string($conn, $_POST["Email"]);
      $Phone = mysqli_real_escape_string($conn, $_POST["Phone"]);  
      $Role= mysqli_real_escape_string($conn, $_POST["Role"]);  
      $Department = mysqli_real_escape_string($conn, $_POST["Department"]);  
      $Salary= mysqli_real_escape_string($conn, $_POST["Salary"]);  
      $Status = mysqli_real_escape_string($conn, $_POST["Status"]); 
      
      //if get staffID, edit function
      if($_POST["getStaffID"] != ''){  
        $Boolean="0";

        //Check Duplicate data for email and phone
        $select_query = "SELECT * FROM staff  WHERE ID!='".$_POST["getStaffID"]."'";  
        $result = mysqli_query($conn, $select_query); 
          if(mysqli_query($conn, $select_query)){ 
            while ($row = $result-> fetch_assoc()) {
              if($row['Email']==$Email){
                $output="Duplicate Data Found !!! <br>Email : ".$Email;
                $Boolean="1";
              }else if($row['Phone']==$Phone){
                $output="Duplicate Data Found !!! <br>Phone : ".$Phone;
                $Boolean="1";
              }
              
              }
          }
          if($Boolean=="0"){
          //update data into database
          if(mysqli_query($conn, "UPDATE staff   
            SET Email='$Email', Phone='$Phone',Role='$Role', Department='$Department', Salary='$Salary',
            Status='$Status' WHERE ID='".$_POST["getStaffID"]."'")){?>
         

                    <script>
                    
                let timerInterval
                    Swal.fire({
                    title: 'Data Updated Succesfully!',
                    icon: 'success',
                    timer: 3000,// 1000 = 1second 
                    timerProgressBar: true,//timerProgressBar
                    confirmButtonText:'Ok',//ConfirmButton show with text 'Ok'

                    }).then((result) => {
                    //timer
                      window.location.href = "Staff.php";
                    })


                        </script>
                    <?php
           }else{
          $query="SELECT * FROM staff";
         }
        }else{
          ?>  <script>
              let timerInterval
                Swal.fire({
                title: 'Data Updated Fail!',
                icon: 'warning',
                html: <?php echo "'".$output."'"?>, //text
                timer: 3000,// 1000 = 1second 
                timerProgressBar: true,//timerProgressBar
                confirmButtonText:'Ok',//ConfirmButton show with text 'Ok'

                }).then((result) => {
                //timer
                  window.location.href = "Staff.php";
                })
              </script>
              <?php
        }  

        //Add data
      }else{
        $Boolean="0";
        $select_query = "SELECT * FROM staff";  
        $result = mysqli_query($conn, $select_query); 
        if(mysqli_query($conn, $select_query)){ 
          while ($row = $result-> fetch_assoc()) {
            if($row['Email']==$Email){
              $output="Duplicate Data Found !!! <br>Email : ".$Email;
              $Boolean="1";
            }else if($row['Phone']==$Phone){
              $output="Duplicate Data Found !!! <br>Phone : ".$Phone;
              $Boolean="1";
            }
                  
            }                  
          }

          //If no duplicate, add data
          if($Boolean=="0"){
            //insert data into database
            if(mysqli_query($conn, "INSERT INTO staff(Email, Phone, Role, Department, Salary, Status)  
                      VALUES('$Email', '$Phone', '$Role', '$Department', '$Salary', '$Status')")){

                ?>
                  
  
                <script>
                  let timerInterval
                      Swal.fire({
                      title: 'Data Inserted Succesfully!',
                      icon: 'success',
                      html: <?php echo "'".$output."'"?>, //text
                      timer: 3000,// 1000 = 1second 
                      timerProgressBar: true,//timerProgressBar
                      confirmButtonText:'Ok',//ConfirmButton show with text 'Ok'
  
                      }).then((result) => {
                      //timer
                        window.location.href = "Staff.php";
                      })
  
                </script>
                <?php
  
  
            }

          //if found duplicate
          }else{
            ?>
                <script>
                  let timerInterval
                      Swal.fire({
                      title: 'Data Insert Fail!',
                      icon: 'warning',
                      html: <?php echo "'".$output."'"?>, //text
                      timer: 3000,// 1000 = 1second 
                      timerProgressBar: true,//timerProgressBar
                      confirmButtonText:'Ok',//ConfirmButton show with text 'Ok'
  
                      }).then((result) => {
                      //timer
                        window.location.href = "Staff.php";
                      })
  
  
                </script>
  
                <?php  
          }//end found duplicate
        }//end add data
        }//end post
 ?>
</body>