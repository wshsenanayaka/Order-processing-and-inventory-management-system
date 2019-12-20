
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addCustomerOderbtn']))
{
    $customer =mysqli_real_escape_string($conn ,$_POST['customer']);
    $payment_method =mysqli_real_escape_string($conn ,$_POST['payment_method']);

    $createDate = date("Y-m-d");
  
    $query ="INSERT INTO  customer_order (cus_id,payment_method,createDate)  VALUES (?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sss",$customer,$payment_method,$createDate);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}

// form submit btn insert details php code strat
if(isset($_POST['addCustomerOderItembtn']))
{
    $customer_order_id =mysqli_real_escape_string($conn ,$_POST['customer_order_id']);
    $item_id =mysqli_real_escape_string($conn ,$_POST['item_id']);
    $catalog =mysqli_real_escape_string($conn ,$_POST['catalog']);
    $quantity =mysqli_real_escape_string($conn ,$_POST['quantity']);
    $unitPrice =mysqli_real_escape_string($conn ,$_POST['unitPrice']);
    $total =mysqli_real_escape_string($conn ,$_POST['total']);

    $queryCheck1 = "SELECT minLevel FROM design WHERE item_id='$item_id' AND catalog= '$catalog'";
    $resultCheck1 = mysqli_query($conn ,$queryCheck1);
    while($rowCheck1 = mysqli_fetch_array($resultCheck1)){

        $minLevel = $rowCheck1['minLevel'];
        $item_stock = $rowCheck1['item_stock'];
    }

    if($minLevel != $item_stock){

        $query ="INSERT INTO  customer_order_item (item_id,catalog ,customer_order_id,quantity,unit_price,total)  VALUES (?,?,?,?,?,?)";

        $stmt =mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
           echo "SQL Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssssss",$item_id,$catalog,$customer_order_id,$quantity,$unitPrice,$total);
            $result =  mysqli_stmt_execute($stmt);
    
            // $queryCheck = "SELECT totalAmt FROM customer_order WHERE id='$customer_order_id' ";
            // $resultCheck = mysqli_query($conn ,$queryCheck);
            // while($rowCheck = mysqli_fetch_array($resultCheck)){
    
            //     $oldAMT = $rowCheck['totalAmt'];
    
            // }
            // $newtotalAmt = $oldAMT+ $total;
            // $queryRow ="UPDATE customer_order SET totalAmt='$newtotalAmt' WHERE id='$customer_order_id' ";
            // $rowRow =mysqli_query($conn,$queryRow);
    
            if($result){
                echo "Successful Insert data";
             }
        }

    }else{
        echo "Can't Process the Oder Stock Min Level";
    }

}

// edit start
if(isset($_POST['View_id']))
   {
     $id =$_POST['View_id'];
     $queryView = "SELECT B.name AS iteName , A.catalog , A.quantity ,A.unit_price ,A.status ,A.item_id ,A.id AS customer_order_item_id
     FROM   customer_order_item A 
     INNER JOIN   item B 
     ON A.item_id = B.id WHERE A.customer_order_id ='$id'";
     $resultView = mysqli_query($conn ,$queryView);

    ?>

    <div id="myModal_COView" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <center><p><span style="font-weight: 700;color: blue;">Customer Oder Details</span></p></center>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Product Item</th>
                        <th scope="col">Catalog</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                              $count =mysqli_num_rows($resultView);

                              $v ="";

                              if($count>0){

                                while($rowView = mysqli_fetch_array($resultView))
                                {
                                     $iteName =$rowView['iteName'];
                                     $catalog = $rowView['catalog'];
                                     $unit_price =$rowView['unit_price'];
                                     $quantity  =$rowView['quantity'];
                                     $status  =$rowView['status'];
                                     echo ' <tr>';
                                     echo '<td>'.$iteName.'</td>';
                                     echo '<td>'.$catalog.'</td>';
                                     echo '<td>'.$unit_price.'</td>';
                                     echo '<td>'.$quantity.'</td>';  

                                     if($status == 0)
                                     {
                                        echo '<td><button type="button" style="height: 25px; padding: initial; padding-left: 10px;padding-right: 10px; color: black;" class="btn btn-warning btn-sm"  onclick="customerApproval('.$rowView["item_id"].','.$quantity.','.$id.','.$rowView["unit_price"].','.$rowView["customer_order_item_id"].')">Approval</button></td>';      
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


   if(isset($_POST['customerApprovalbtn']))
   {
      
       $item_id =mysqli_real_escape_string($conn ,$_POST['item_id']);
       $quantity =mysqli_real_escape_string($conn ,$_POST['quantity']);
       $customer_order_id =mysqli_real_escape_string($conn ,$_POST['customer_order_id']);
       $unit_prize =mysqli_real_escape_string($conn ,$_POST['unit_prize']);
    //    $catalog =mysqli_real_escape_string($conn ,$_POST['catalog']);
       $customer_order_item_id =mysqli_real_escape_string($conn ,$_POST['customer_order_item_id']);

       $queryCatalog = "SELECT catalog FROM customer_order_item WHERE id='$customer_order_item_id' ";
       $resultCatalog = mysqli_query($conn ,$queryCatalog);
       while($rowCatalog = mysqli_fetch_array($resultCatalog)){

           $catalog = $rowCatalog['catalog'];

       }

       $queryCheck = "SELECT  B.row_material_id ,B.quantity  
       FROM design A 
       INNER JOIN row_materials_design B
       ON A.id = B.design_id WHERE A.item_id ='$item_id' AND catalog ='$catalog'
        ";
       $resultCheck = mysqli_query($conn ,$queryCheck);
       while($rowCheck = mysqli_fetch_array($resultCheck)){

           $row_material_id = $rowCheck['row_material_id'];
           $row_material_quantity = $rowCheck['quantity'];

       }

       $queryRow = "SELECT stock FROM row_material WHERE id='$row_material_id' ";
       $resultRow = mysqli_query($conn ,$queryRow);
       while($rowRow = mysqli_fetch_array($resultRow)){

           $oldstock = $rowRow['stock'];

       }

       $queryAmt = "SELECT totalAmt FROM customer_order WHERE id='$customer_order_id' ";
       $resultAmt = mysqli_query($conn ,$queryAmt);
       while($rowAmt = mysqli_fetch_array($resultAmt)){

           $oldtotalAmt = $rowAmt['totalAmt'];

       }
       $newAmt = $oldtotalAmt+ ($quantity*$unit_prize);

       $newstock = $oldstock - ($row_material_quantity*$quantity);

       $queryRowM ="UPDATE row_material SET stock='$newstock' WHERE id='$row_material_id' ";
       $rowRowM =mysqli_query($conn,$queryRowM);

       $queryApproval ="UPDATE  customer_order_item SET status=1 WHERE  id='$customer_order_item_id'";
       $rowApproval =mysqli_query($conn,$queryApproval);

       $queryAMT ="UPDATE  customer_order SET totalAmt='$newAmt' WHERE  id='$customer_order_id'";
       $rowAMT =mysqli_query($conn,$queryAMT);

       if($rowApproval){
           echo "Successful Approved data";
       }
   }
?>
