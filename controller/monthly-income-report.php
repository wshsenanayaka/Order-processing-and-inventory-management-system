
<?php

// Database Connection
require '../include/config.php';

// edit start
if(isset($_POST['monthlyIncomeRbtn']))
   {
        $startDate =$_POST['startDate'];
        $endDate =$_POST['endDate'];
        $queryView="SELECT B.name, A.payment_method ,A.totalAmt 
        FROM customer_order A 
        INNER JOIN customer B ON A.cus_id = B.id  WHERE A.createDate BETWEEN '$startDate' AND '$endDate'";
        $resultView = mysqli_query($conn ,$queryView);

    ?>
     <div id="printablediv">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">Customer Name</th>
                <th scope="col">Payment Method</th>
                <th scope="col">Total Cost</th>
                </tr>
            </thead>
                <tbody>

                    <?php

                            $count =mysqli_num_rows($resultView);

                            if($count>0){

                            while($rowView = mysqli_fetch_array($resultView))
                            {
                                    $name =$rowView['name'];
                                    $payment_method   =$rowView['payment_method'];
                                    $totalAmt   =$rowView['totalAmt'];
                                    echo ' <tr>';
                                    echo '<td>'.$name.'</td>';      
                                    echo '<td>'.$payment_method.'</td>';    
                                    echo '<td>'.$totalAmt.'</td>';                         
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
        
        $query ="INSERT INTO  monthly_income_report (startDate, endDate , reportTitle )  VALUES (?,?,?)";

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
