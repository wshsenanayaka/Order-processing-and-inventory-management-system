
<?php

// Database Connection
require '../include/config.php';

// edit start
if(isset($_POST['item_id']))
   {
     $id =$_POST['item_id'];

    ?>
        <div class="form-group">
            <label for="exampleInputPassword1">Catalog</label>
            <select class="form-control" id="catalog" >
                    <option value="">Select</option>
                    <?php

                        $queryCatalog = "SELECT catalog FROM  design WHERE item_id='.$id.'";
                        $resultCatalog = mysqli_query($conn ,$queryCatalog);
                        while($rowCatalog = mysqli_fetch_array($resultCatalog)){

                          echo '<option value="'.$rowCatalog['catalog'].'">'.$rowCatalog['catalog'].'</option>';
                        }
                    ?>
            </select>
        </div>    
    <?php
   }
  

   

?>
