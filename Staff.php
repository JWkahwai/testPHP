<?php
include "config.php";
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Batch List</title>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
    <div class="container-fluid">
        <h2>Staff List</h2>
        <div class="card shadow mb-4">
            <div class="card-body">
                <input type="button" name="BtnAddStaff" id="BtnAddStaff"  class="btn btn-info" data-toggle="modal" data-target="#design_Modal" style="float: right;" value="Add New Staff">

                <div class="table-responsive">
                <table class="responsive nowrap" style="width:100%" id="staff_table" >
                    <div>
                        <input type="text" id="S_ID"  placeholder="Search Staff ID">
                        <input type="text" id="S_Name"  placeholder="Search Name">
                    </div>
                <thead>
                    <tr>
                        <th style="text-align:center;">Staff ID</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">Email</th>
                        <th style="text-align:center;">Phone</th>
                        <th style="text-align:center;">Role(Department)</th>
                        <th style="text-align:center;">Salary</th>
                        <th style="text-align:center;">Status</th>
                        <th style="text-align:center;">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //batch left join company SQL
                    $sql = "";
                    $result = $conn -> query($sql);
                    while ($row = $result->fetch_assoc()) {
                    
                    }
                    $StaffID="1";
                    $Name="name";
                    $Email="email";
                    $Phone="ph";
                    $Role="role";
                    $Department="department";
                    $Salary="salary";
                    $Status = "status";
                    $img = "image";
                    //$img = base64_encode($row["Image"]);
                    echo "
                    <tr>
                    <td style='text-align:center;'>".$StaffID."</td>
                    <td style='text-align:center;'>".$Name."</td>
                    <td><img src='data:image; base64,".$img."' alt='No Image' style='width:100px;height:100px' data-toggle='modal' data-target='#imagemodal' id='ZoomImage'></td>
                    <td style='text-align:center;'>".$Email."</td>
                    <td style='text-align:center;'>".$Phone."</td>
                    <td style='text-align:center;'>".$Role."(".$Department.")</td>
                    <td style='text-align:center;'>".$Salary."</td>
                    <td style='text-align:center;'>".$Status."</td>
                    <td> <input type='button' name='Edit' value='Edit' id='".$StaffID."' class='btn btn-outline-dark editFunction' /></td>";
                    echo "</tr>";

                    
                    echo "</table>";
                    ?>
                </tbody>
            </div>
        </div>
    </div>
    
    <!-- Modal Image-->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><b>View Image</b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <?php echo "<a href='#'><img id='ShowImage' src='' alt='Image' style='width:450px;height:450px;'></a>"; ?>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div><!-- end modal image-->

    <!-- add staff modal -->
    <div class="modal fade" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="TitleStaff" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleColour">Add New Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <div class="modal-body">
                    <div class="form-group row">
                    <form method="POST"  id="insert_form2" action="insertData.php" enctype="multipart/form-data" >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="Name" id="Name" class="form-control"  required=""/> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" name="Email" id="Email" class="form-control"  required=""/> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <input type="text" name="Phone" id="Phone" class="form-control"  required=""/> 
                            </div>
                            <div class="form-group col-md-6">
                                <label>Role</label>
                                <input type="text" name="Role" id="Role" class="form-control"  required=""/> 
                            </div>
                            <div class="form-group col-md-4">
                                <label>Department</label>
                                <input type="text" name="Department" id="Department" class="form-control"  required=""/> 
                            </div>
                            <div class="form-group col-md-4">
                                <label>Salary</label>
                                <input type="text" name="Salary" id="Salary" class="form-control"  required=""/> 
                            </div>

                            <div class="form-group col-md-4">
                                <label>Upload Image File:</label>
                                <input name="Image" type="file" class="form-control-file"/>
                            </div>

                        <input type="hidden" name="getStaffID" id="getStaffID" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="insertStaff" id="insertStaff" value="Insert" class="btn btn-secondary" />
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- end modal -->
</body>
</html>


<script>
$(document).ready( function () {
  //Link DataTable
  var table =  $('#staff_table').DataTable({
    "showNEntries":true,
    "order":[],
    "columnDefs":[
      {
        "targets":[7],
        "orderable":false,


      },
    ],
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search records"
    }
  });

$('#S_ID').on('keyup',function(){
  table
  .column(0)
  .search(this.value)
  .draw();
})

//DataTable Search
$('#S_Name').on('keyup',function(){
  table
  .column(1)
  .search(this.value)
  .draw();
})
});

//Staff Add
$(document).ready(function(){  
      $('#BtnAddStaff').click(function(){  
           $('#TitleStaff').html("Add new staff");
           $('#insertStaff').val("Add");  
           $('#insert_form')[0].reset();
           $('#getStaffID').val(""); 
      });
      $(document).on('click', '.editFunction', function(){  
           var getStaffID = $(this).attr("ID");  
           $.ajax({  
                url:"getData.php",  
                method:"POST",  
                data:{getStaffID:getStaffID},  
                dataType:"json",  
                success:function(data){  
                    $('#Name').val(data.Name); 
                    $('#Email').val(data.Email);  
                    $('#Phone').val(data.Phone); 
                    $('#Role').val(data.Role);
                    $('#Department').val(data.Department);
                    $('#Salary').val(data.Salary);
                    $('#Status').val(data.Status);
                    //  $('#Image').val(data.Image);  
                    $('#getStaffID').val(data.StaffID);  
                    $('#TitleStaff').html("Edit staff data"); 
                    $('#insertStaff').val("Update");  
                    $('#add_data_Modal').modal('show');   
                }  
           });  
      });  
});
</script>
