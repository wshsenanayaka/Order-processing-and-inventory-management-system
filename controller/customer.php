
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addCustomerbtn']))
{
    $nic =mysqli_real_escape_string($conn ,$_POST['nic']);
    $contactNo =mysqli_real_escape_string($conn ,$_POST['contactNo']);
    $name =mysqli_real_escape_string($conn ,$_POST['name']);
    $branch =mysqli_real_escape_string($conn ,$_POST['branch']);

    $query ="INSERT INTO  customer (nic,name,contactNo,branchid)  VALUES (?,?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ssss",$nic,$name,$contactNo,$branch);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}


if(isset($_POST['removeID']))
{
    $id =$_POST['removeID'];
    $query ="DELETE FROM  customer WHERE id=?;";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$id);
        $result =  mysqli_stmt_execute($stmt);
        if($result){

            echo "Successful Delete data";
         }

    }  
}

if(isset($_POST['updateCustomerbtn']))
{

    $enic =mysqli_real_escape_string($conn ,$_POST['enic']);
    $econtactNo =mysqli_real_escape_string($conn ,$_POST['econtactNo']);
    $ename =mysqli_real_escape_string($conn ,$_POST['ename']);
    $ebranch =mysqli_real_escape_string($conn ,$_POST['ebranch']);
    $eid =mysqli_real_escape_string($conn ,$_POST['eid']);

    $query ="UPDATE  customer SET  nic=?,contactNo=?,name=?,branchid=? WHERE id=?;";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sssss",$enic,$econtactNo ,$ename ,$ebranch ,$eid);
        $result =  mysqli_stmt_execute($stmt);
        if($result){

            echo "Successful Update data";
         }
    }

}

// edit start
if(isset($_POST['edit_id']))
   {
     $id =$_POST['edit_id'];
     $query_main = "SELECT A.id , A.nic ,A.name ,A.contactNo  ,A.branchid ,B.name AS branchName
     FROM customer A
     INNER JOIN branch B 
     ON A.branchid = B.id WHERE A.id='$id'";
     $result_main = mysqli_query($conn ,$query_main);
     while($row_main = mysqli_fetch_array($result_main)){
         $id =$row_main['id'];
         $nic =$row_main['nic'];
         $contactNo =$row_main['contactNo'];
         $name =$row_main['name'];
         $branchName =$row_main['branchName'];
         $branchid =$row_main['branchid'];

     }
    ?>

    <div id="myModal_Editcustomer" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <center><p><span style="font-weight: 700;color: blue;">Edit User</span></p></center>
                <form>
                    <div class="form-group">
                        <label for="nic">NIC</label>
                        <input type="text" class="form-control" id="enic" value="<?php echo $nic; ?>"   placeholder="Enter NIC">
                    </div>
                    <div class="form-group">
                        <label for="contactNo">Contact No</label>
                        <input type="text" class="form-control" id="econtactNo" value="<?php echo $contactNo; ?>" placeholder="Enter Contact Number">
                    </div>
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control"  id="ename" value="<?php echo $name; ?>"  placeholder="Enter Namw">
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputPassword1">Branch</label>
                        <select class="form-control" id="ebranch">

                           <?php
                               if(isset($branchid))
                                    {
                                        echo "<option value='".$branchid."'>".$branchName."</option>";
                                    }
                                ?>
                                <option value="">Select</option>
                                <?php

                                $queryBranch = "SELECT * FROM branch";
                                $resultBranch = mysqli_query($conn ,$queryBranch);
                                while($rowBranch = mysqli_fetch_array($resultBranch)){

                                    if($branchName!=$rowBranch['name'])
                                    {
                                        echo '<option value="'.$rowBranch['id'].'">'.$rowBranch['name'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                
                    <button type="button" onclick="myFormUpadte(<?php echo $id; ?>)" id="updateCustomerbtn" name="updateCustomerbtn" class="btn btn-primary btn-sm">Edit</button>
                </form>
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
