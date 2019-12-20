
<?php

    // Database Connection
    require '../include/config.php';


   //Presenting complains  view endls php code end

   if(isset($_POST['catalog']))
   {
     $catalog =$_POST['catalog'];
     $sitem_id =$_POST['sitem_id'];

     $queryUnitprice= "SELECT * FROM  design WHERE item_id='$sitem_id' AND catalog='$catalog'";
     $resultUnitprice = mysqli_query($conn ,$queryUnitprice);

     $count =mysqli_num_rows($resultUnitprice);


     while($rowUnitprice= mysqli_fetch_array($resultUnitprice)){

         $unitPrice = $rowUnitprice['unit_price'];          
     }

    ?>

        <div class="form-group">
            <label for="contactNo">Unit Price</label>
            <input type="text" class="form-control" id="unitPrice" value="<?php echo $unitPrice; ?>" readonly>
        </div>

    <?php
   }



   

?>
