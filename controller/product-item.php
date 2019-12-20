
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addPIbtn']))
{
    $pname =mysqli_real_escape_string($conn ,$_POST['pname']);

    $createDate = date("Y-m-d");
    
    $query ="INSERT INTO  item (name,createDate)  VALUES (?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$pname,$createDate);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}

// form submit btn insert details php code strat
if(isset($_POST['addPDbtn']))
{
    $pid =mysqli_real_escape_string($conn ,$_POST['pid']);
    $catalog =mysqli_real_escape_string($conn ,$_POST['catalog']);
    $unit_price =mysqli_real_escape_string($conn ,$_POST['unit_price']);
    $size =mysqli_real_escape_string($conn ,$_POST['size']);
    $item_stock =mysqli_real_escape_string($conn ,$_POST['item_stock']);
    $minLevel =mysqli_real_escape_string($conn ,$_POST['minLevel']);

    $query ="INSERT INTO  design (item_id,item_stock,unit_price,catalog,size,minLevel)  VALUES (?,?,?,?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ssssss",$pid,$item_stock,$unit_price,$catalog,$size,$minLevel);
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
     $queryView = "SELECT * FROM design WHERE item_id ='.$id.'";
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
                        <th scope="col">Catalog</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Size</th>
                        <th scope="col">Item Stock</th>
                        <th scope="col">Min Level</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                              $count =mysqli_num_rows($resultView);

                              if($count>0){

                                while($rowView = mysqli_fetch_array($resultView))
                                {
                                     $catalog =$rowView['catalog'];
                                     $unit_price =$rowView['unit_price'];
                                     $size   =$rowView['size'];
                                     $item_stock =$rowView['item_stock'];
                                     $minLevel   =$rowView['minLevel'];
                                     echo ' <tr>';
                                     echo '<td>'.$catalog.'</td>';
                                     echo '<td>'.$unit_price.'</td>';
                                     echo '<td>'.$size.'</td>';     
                                     echo '<td>'.$item_stock.'</td>';      
                                     echo '<td>'.$minLevel.'</td>';                     
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
