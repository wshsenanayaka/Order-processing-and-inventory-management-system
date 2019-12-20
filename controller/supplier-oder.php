
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addSupplierOderbtn']))
{
    $supplier =mysqli_real_escape_string($conn ,$_POST['supplier']);

    $order_date = date("Y-m-d");
      
    $query ="INSERT INTO  supplier_order (supplier_id,order_date)  VALUES (?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$supplier,$order_date);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}

// form submit btn insert details php code strat
if(isset($_POST['addSupplierOderMRbtn']))
{
    $supplier_order_id =mysqli_real_escape_string($conn ,$_POST['supplier_order_id']);
    $item_id =mysqli_real_escape_string($conn ,$_POST['item_id']);
    $unitPrice =mysqli_real_escape_string($conn ,$_POST['unitPrice']);
    $quantity =mysqli_real_escape_string($conn ,$_POST['quantity']);
 
    $query ="INSERT INTO  supplier_order_item (supplier_order_id,item_id,unit_prize,quantity)  VALUES (?,?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ssss",$supplier_order_id,$item_id,$unitPrice,$quantity);
        $result =  mysqli_stmt_execute($stmt);


        // $queryCheck = "SELECT stock FROM row_material WHERE id='$item_id' ";
        // $resultCheck = mysqli_query($conn ,$queryCheck);
        // while($rowCheck = mysqli_fetch_array($resultCheck)){

        //     $oldstock = $rowCheck['stock'];

        // }
        // $newstock = $oldstock+ $quantity;
        // $queryRow ="UPDATE row_material SET stock='$newstock' WHERE id='$item_id' ";
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
     $queryView = "SELECT B.name AS iteName , A.unit_prize , A.quantity ,A.status ,A.item_id
     FROM  supplier_order_item A 
     INNER JOIN  row_material B 
     ON A.item_id = B.id WHERE A.supplier_order_id ='.$id.'";
     $resultView = mysqli_query($conn ,$queryView);

    ?>

    <div id="myModal_ViewsupplierOder" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <center><p><span style="font-weight: 700;color: blue;">Supplier Oder Details</span></p></center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Item Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                             
                              $count =mysqli_num_rows($resultView);

                              if($count>0){

                                while($rowView = mysqli_fetch_array($resultView))
                                {
                                     $iteName =$rowView['iteName'];
                                     $unit_prize =$rowView['unit_prize'];
                                     $quantity  =$rowView['quantity'];
                                     $status  =$rowView['status'];
                                     echo ' <tr>';
                                     echo '<td>'.$iteName.'</td>';
                                     echo '<td>'.$unit_prize.'</td>';
                                     echo '<td>'.$quantity.'</td>'; 
                                    //  echo '<td>'.$status.'</td>';      

                                     if($status == 0)
                                     {
                                        echo '<td><button type="button" style="height: 25px; padding: initial; padding-left: 10px;padding-right: 10px; color: black;" class="btn btn-warning btn-sm"  onclick="supplierApproval('.$rowView["item_id"].','.$quantity.','.$id.','.$unit_prize.')">Approval</button></td>';      
                                     }
                                     else
                                     {
                                        echo '<td>Approved</td>';      
                                     }
                   
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



    if(isset($_POST['supplierApprovalbtn']))
    {
       
        $item_id =mysqli_real_escape_string($conn ,$_POST['item_id']);
        $quantity =mysqli_real_escape_string($conn ,$_POST['quantity']);
        $supplier_order_id =mysqli_real_escape_string($conn ,$_POST['supplier_order_id']);
        $unit_prize =mysqli_real_escape_string($conn ,$_POST['unit_prize']);

        $queryCheck = "SELECT stock FROM row_material WHERE id='$item_id' ";
        $resultCheck = mysqli_query($conn ,$queryCheck);
        while($rowCheck = mysqli_fetch_array($resultCheck)){

            $oldstock = $rowCheck['stock'];

        }

        $queryAmt = "SELECT totalAmt FROM supplier_order WHERE id='$supplier_order_id' ";
        $resultAmt = mysqli_query($conn ,$queryAmt);
        while($rowAmt = mysqli_fetch_array($resultAmt)){

            $oldtotalAmt = $rowAmt['totalAmt'];

        }
        $newAmt = $oldtotalAmt+ ($quantity*$unit_prize);

        $newstock = $oldstock+ $quantity;
        $queryRow ="UPDATE row_material SET stock='$newstock' WHERE id='$item_id' ";
        $rowRow =mysqli_query($conn,$queryRow);

        $queryApproval ="UPDATE  supplier_order_item SET status=1 WHERE item_id='$item_id' AND supplier_order_id='$supplier_order_id'";
        $rowApproval =mysqli_query($conn,$queryApproval);

        $queryAMT ="UPDATE  supplier_order SET totalAmt='$newAmt' WHERE  id='$supplier_order_id'";
        $rowAMT =mysqli_query($conn,$queryAMT);

        if($rowApproval){
            echo "Successful Approved data";
        }
    }

?>
