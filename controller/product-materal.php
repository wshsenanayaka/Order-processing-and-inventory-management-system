
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addDPItn']))
{
    $pdid =mysqli_real_escape_string($conn ,$_POST['pdid']);
    $materal =mysqli_real_escape_string($conn ,$_POST['materal']);
    $quantity =mysqli_real_escape_string($conn ,$_POST['quantity']);
    
    $query ="INSERT INTO  row_materials_design (design_id,row_material_id,quantity)  VALUES (?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sss",$pdid,$materal,$quantity);
        $result =  mysqli_stmt_execute($stmt);

        // $queryRow ="UPDATE row_material SET stock='$quantity' WHERE id='$item_id' ";
        // $rowRow =mysqli_query($conn,$queryRow);

        if($result){
            echo "Successful Insert data";
         }
    }
}


// edit start
if(isset($_POST['View_id']))
   {
        $id =$_POST['View_id'];
        $queryView= "SELECT B.name , A.quantity FROM row_materials_design A INNER JOIN row_material B 
        ON A.row_material_id = B.id WHERE A.design_id ='$id'";
        $resultView = mysqli_query($conn ,$queryView);

    ?>

    <div id="myModal_ViewPD" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <center><p><span style="font-weight: 700;color: blue;">Product Design Details</span></p></center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Material Name</th>
                        <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                              $count =mysqli_num_rows($resultView);

                              if($count>0){

                                while($rowView = mysqli_fetch_array($resultView))
                                {
                                     $materialName =$rowView['name'];
                                     $rowQuantity   =$rowView['quantity'];
                                     echo ' <tr>';
                                     echo '<td>'.$materialName.'</td>';      
                                     echo '<td>'.$rowQuantity.'</td>';                     
                                     echo ' </tr>';
                                }
 

                              }else{
                                     $not ="No Record Found";
                                     echo ' <tr>';
                                     echo  $not;               
                                     echo ' </tr>';
                                
                              }
                          
                        ?>
                
                    </tbody>
                    </table>

            </div>
            <div class="modal-footer" style="height: 40px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>           
    <?php
   }
   //Presenting complains  view endls php code end

?>
