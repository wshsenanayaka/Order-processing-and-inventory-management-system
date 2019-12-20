
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addSupplierbtn']))
{
    $nic =mysqli_real_escape_string($conn ,$_POST['nic']);
    $contactNo =mysqli_real_escape_string($conn ,$_POST['contactNo']);
    $name =mysqli_real_escape_string($conn ,$_POST['name']);
   
    $address=str_replace('\n','&#013',mysqli_real_escape_string($conn ,$_POST['address']));

    $createDate = date("Y-m-d");
   
    $query ="INSERT INTO  supplier (nic,name,contact_no,address,createDate)  VALUES (?,?,?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sssss",$nic,$name,$contactNo,$address,$createDate);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}


if(isset($_POST['removeID']))
{
    $id =$_POST['removeID'];
    $query ="DELETE FROM  supplier WHERE id=?;";

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

if(isset($_POST['updateSupplierbtn']))
{

    $enic =mysqli_real_escape_string($conn ,$_POST['enic']);
    $econtactNo =mysqli_real_escape_string($conn ,$_POST['econtactNo']);
    $ename =mysqli_real_escape_string($conn ,$_POST['ename']);
    $eaddress=str_replace('\n','&#013',mysqli_real_escape_string($conn ,$_POST['eaddress']));
    $eid =mysqli_real_escape_string($conn ,$_POST['eid']);

    $query ="UPDATE  supplier SET  nic=?,contact_no=?,name=?,address=? WHERE id=?;";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sssss",$enic,$econtactNo ,$ename ,$eaddress,$eid);
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
     $query_main = "SELECT * FROM supplier WHERE id='$id'";
     $result_main = mysqli_query($conn ,$query_main);
     while($row_main = mysqli_fetch_array($result_main)){
         $id =$row_main['id'];
         $nic =$row_main['nic'];
         $name  =$row_main['name'];
         $contact_no  =$row_main['contact_no'];
         $address =$row_main['address'];

     }
    ?>

    <div id="myModal_Editsupplier" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                <!-- <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <center><p><span style="font-weight: 700;color: blue;">Edit Supplier</span></p></center>
                <form>
                    <div class="form-group">
                        <label for="nic">NIC</label>
                        <input type="text" class="form-control" id="enic" value="<?php echo $nic; ?>"   placeholder="Enter NIC">
                    </div>
                    <div class="form-group">
                        <label for="contactNo">Contact No</label>
                        <input type="text" class="form-control" id="econtactNo" value="<?php echo $contact_no; ?>" placeholder="Enter Contact Number">
                    </div>
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control"  id="ename" value="<?php echo $name; ?>"  placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="username">Address</label>
                        <textarea rows="4" cols="50" id="eaddress" class="form-control"><?php echo $address; ?></textarea>
                    </div>
                    <button type="button" onclick="myFormUpadte(<?php echo $id; ?>)" id="updateSupplierbtn" name="updateSupplierbtn" class="btn btn-primary btn-sm">Edit</button>
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
