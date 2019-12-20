
<?php

// Database Connection
require '../include/config.php';

// form submit btn insert details php code strat
if(isset($_POST['addRowMateralbtn']))
{
    $sname =mysqli_real_escape_string($conn ,$_POST['sname']);
    $minLevel =mysqli_real_escape_string($conn ,$_POST['minLevel']);

    $createDate = date("Y-m-d");
      
    $query ="INSERT INTO  row_material (name,minLevel,createDate)  VALUES (?,?,?)";

    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
       echo "SQL Error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sss",$sname,$minLevel,$createDate);
        $result =  mysqli_stmt_execute($stmt);
        if($result){
            echo "Successful Insert data";
         }
    }
}

?>
