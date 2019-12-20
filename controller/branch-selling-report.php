
<?php

// Database Connection
require '../include/config.php';

// edit start
if(isset($_POST['branchSellingbtn']))
   {
        $startDate =$_POST['startDate'];
        $endDate =$_POST['endDate'];
        // $queryView="SELECT B.name,C.name AS branchName A.payment_method AS cpayment_method , A.totalAmt AS ctotalAmt , A.id AS cid
        // FROM customer_order A 
        // INNER JOIN  customer B ON A.cus_id = B.id 
        // INNER JOIN 
        // branch C
        // ON B.branchid = C.id WHERE A.createDate BETWEEN '$startDate' AND '$endDate'";

        $queryView ="SELECT B.name AS cname ,C.name  AS branchName, A.payment_method AS cpayment_method , A.totalAmt AS ctotalAmt , A.id AS cid
        FROM
        customer_order A
               INNER JOIN
               customer B
            ON A.cus_id = B.id 
                INNER JOIN 
                branch C
            ON B.branchid = C.id  WHERE A.createDate BETWEEN '$startDate' AND '$endDate'";
        $resultView = mysqli_query($conn ,$queryView);

    ?>
     <div id="printablediv">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Oder No.</th>
                <th scope="col">Customer Order Name</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Payment Method</th>
                </tr>
            </thead>
                <tbody>

                    <?php

                            $count =mysqli_num_rows($resultView);

                            if($count>0){

                            while($rowView = mysqli_fetch_array($resultView))
                            {
                                    $cid =$rowView['cid'];
                                    $cname =$rowView['cname'];
                                    $branchName =$rowView['branchName'];
                                    $cpayment_method =$rowView['cpayment_method'];
                                    $ctotalAmt  =$rowView['ctotalAmt'];
                                    echo ' <tr>';
                                    echo '<td>'.$cid.'</td>';      
                                    echo '<td>'.$cname.'</td>';      
                                    echo '<td>'.$branchName.'</td>';   
                                    echo '<td>'.$ctotalAmt.'</td>';     
                                    echo '<td>'.$cpayment_method.'</td>';                    
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
        <br>
        <input type="button" value="Print" onclick="javascript:printDiv('printablediv');" class="btn btn-info btn-sm"/>
        <input type="button" value="Save" onclick="titelForm()" class="btn btn-secondary btn-sm"/>
    <?php
   }
   //Presenting complains  view endls php code end

   // form submit btn insert details php code strat
    if(isset($_POST['addReportTbtn']))
    {
        $startDate =mysqli_real_escape_string($conn ,$_POST['startDate']);
        $endDate =mysqli_real_escape_string($conn ,$_POST['endDate']);
        $reportTitle =mysqli_real_escape_string($conn ,$_POST['reportTitle']);
        
        $query ="INSERT INTO  branch_selling_report (startDate, endDate , reportTitle )  VALUES (?,?,?)";

        $stmt =mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
        echo "SQL Error";
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"sss",$startDate,$endDate,$reportTitle);
            $result =  mysqli_stmt_execute($stmt);
            if($result){
                echo "Successful Insert data";
            }
        }
    }



?>
