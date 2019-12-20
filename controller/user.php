
<?php

    // Database Connection
    require '../include/config.php';

    // form submit btn insert details php code strat
    if(isset($_POST['addUserbtn']))
    {
        $nic =mysqli_real_escape_string($conn ,$_POST['nic']);
        $contactNo =mysqli_real_escape_string($conn ,$_POST['contactNo']);
        $username =mysqli_real_escape_string($conn ,$_POST['username']);
        $password =Md5(mysqli_real_escape_string($conn ,$_POST['password']));
        $branch =mysqli_real_escape_string($conn ,$_POST['branch']);
        $userRole =mysqli_real_escape_string($conn ,$_POST['userRole']);

        $query ="INSERT INTO  user (nic,contactNo,user_name,password,branch,userRole)  VALUES (?,?,?,?,?,?)";

        $stmt =mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
           echo "SQL Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssssss",$nic,$contactNo,$username,$password,$branch,$userRole);
            $result =  mysqli_stmt_execute($stmt);
            if($result){
                echo "Successful Insert data";
             }
        }
    }


    if(isset($_POST['removeID']))
    {
        $id =$_POST['removeID'];
        $query ="DELETE FROM  user WHERE id=?;";

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

    if(isset($_POST['updateUserbtn']))
    {

        $enic =mysqli_real_escape_string($conn ,$_POST['enic']);
        $econtactNo =mysqli_real_escape_string($conn ,$_POST['econtactNo']);
        $eusername =mysqli_real_escape_string($conn ,$_POST['eusername']);
        $ebranch =mysqli_real_escape_string($conn ,$_POST['ebranch']);
        $euserRole =mysqli_real_escape_string($conn ,$_POST['euserRole']);
        $eid =mysqli_real_escape_string($conn ,$_POST['eid']);

        $query ="UPDATE  user SET  nic=?,contactNo=?,user_name=?,branch=?,userRole=? WHERE id=?;";
        $stmt =mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
           echo "SQL Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"ssssss",$enic,$econtactNo ,$eusername ,$ebranch ,$euserRole ,$eid);
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
         $query_main = "SELECT * FROM user WHERE id='$id'";
         $result_main = mysqli_query($conn ,$query_main);
         while($row_main = mysqli_fetch_array($result_main)){
             $id =$row_main['id'];
             $nic =$row_main['nic'];
             $contactNo =$row_main['contactNo'];
             $user_name =$row_main['user_name'];
             $password =$row_main['password'];
             $branch =$row_main['branch'];
             $userRole =$row_main['userRole'];
            
         }
        ?>

            <div id="myModal_Edituser" class="modal fade" role="dialog">
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
                            <label for="username">Username</label>
                            <input type="text" class="form-control"  id="eusername" value="<?php echo $user_name; ?>"  placeholder="Enter Username">
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Branch</label>
                            <select class="form-control" id="ebranch">

                               <?php
                                   if(isset($branch))
                                        {
                                            echo "<option value='".$branch."'>".$branch."</option>";
                                        }
                                    ?>
                                    <option value="">Select</option>
                                    <?php

                                    $queryBranch = "SELECT * FROM branch";
                                    $resultBranch = mysqli_query($conn ,$queryBranch);
                                    while($rowBranch = mysqli_fetch_array($resultBranch)){

                                        if($branch!=$rowBranch['name'])
                                        {
                                            echo '<option value="'.$rowBranch['name'].'">'.$rowBranch['name'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">User Role</label>
                         
                            <select class="form-control" id="euserRole">

                                <?php
                                    if(isset($userRole))
                                        {
                                            $queryRole = "SELECT * FROM role WHERE id='$userRole'";
                                            $resultRole = mysqli_query($conn ,$queryRole);
                                            while($rowRole = mysqli_fetch_array($resultRole)){
        
                                                    $name = $rowRole['name'];
                                            }
                                            echo "<option value='".$userRole."'>".$name."</option>";
                                        }
                                    ?>
                                    <option value="">Select</option>
                                    <?php

                                        $queryRole = "SELECT * FROM role";
                                        $resultRole = mysqli_query($conn ,$queryRole);
                                        while($rowRole = mysqli_fetch_array($resultRole)){

                                            if($userRole!=$rowRole['id'])
                                            {
                                                echo '<option value="'.$rowRole['id'].'">'.$rowRole['name'].'</option>';
                                            }                                           
                                        }
                                ?>
                                </select>
                            </div>
                        <button type="button" onclick="myFormUpadte(<?php echo $id; ?>)" id="updateUserbtn" name="updateUserbtn" class="btn btn-primary btn-sm">Edit</button>
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
