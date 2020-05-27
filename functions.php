<?php

function populate_table_headers($db, $table) {

    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');

    $data = $bills->_result;

    foreach($data as $value) {

        $billName = $value->name;
        $billStatus = $value->status;

        if($table === "current" ) {

            if($billName && $billStatus === "current") {
                echo "<th scope='col'>{$billName}</th>";
            
            }

        } elseif ($table === "plan") {

            if($billName && $billStatus === "current" || $billStatus === "plan") {
                echo "<th scope='col'>{$billName}</th>";
            
            }
        }
        
    }

}

function populate_table_data_totals($db, $table) {

    $weeksObj = $db->query('SELECT * FROM week_pay');

    $weeksData = $weeksObj->_result;
    $weeksAmountArr = [];

    foreach($weeksData as $weekAmount) {
        $weekIncome = $weekAmount->amount;
        array_push($weeksAmountArr, $weekIncome);
        
        
    }
    array_unshift($weeksAmountArr, 0);
    

    $totals = [];

    for($x = 0; $x < count($weeksAmountArr) -1; $x++) {
        
        $currTotal = $weeksAmountArr[$x];
        $nextTotal = $weeksAmountArr[$x + 1];

        array_push($totals, $nextTotal - $currTotal);
        
    }

    $weekAmountTotal = array_sum($totals);
    
    echo "<td>{$weekAmountTotal}</td>";


    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');
    
    $billData = $bills->_result;

    foreach($billData as $value) {

        $billAmountTotal = $value->amount;
        $billStatus = $value->status;

        if($table === "current") {

            if($value->frequency === "weekly" && $billStatus === "current") {
                $billAmount = $billAmountTotal * 4;
                echo "<td>{$billAmount}</td>";
            }

            else if($value->frequency === "monthly" && $billStatus === "current") {
                $billAmount = $billAmountTotal;
                echo "<td>{$billAmount}</td>";
            
            }

        } elseif($table === "plan") {

            if($value->frequency === "weekly" && $billStatus === "current" || $billStatus === "plan") {
                $billAmount = $billAmountTotal ;
                echo "<td>{$billAmount}</td>";
            }

            else if($value->frequency === "monthly" && $billStatus === "current" || $billStatus === "plan") {
                $billAmount = $billAmountTotal ;
                echo "<td>{$billAmount}</td>";
            
            }
        }

        
        
    }
}

function populate_bill_dropdown($db) {
    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');
    $billData = $bills->_result;
    foreach($billData as $value) {
        $billName = $value->name;
        if($billName) {
            echo "<option>{$billName}</option>";
        }
    }
}

function populate_table_data($db, $table) {
    
    // Grab DB object
    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');
    
    // Set empty array variables
    $m_results = [];
    $w_results = [];

    // Grab _result array from DB object
    $billData = $bills->_result;

    // Loop through _result array and push monthly and weekly bills into seperate arrays
    // Monthly bills are divided by 4 weeks for weekly budgeting
    foreach($billData as $value) {

        $billAmountTotal = $value->amount;  
        $billStatus = $value->status;

        if($table === "current") {
            
            if ($value->frequency === "monthly" && $billStatus === "current") {
                array_push($m_results, $billAmountTotal /4);
            }
    
            if ($value->frequency === "weekly" && $billStatus === "current") {
                array_push($w_results, $billAmountTotal);
            }

        } elseif($table === "plan") {

            if ($value->frequency === "monthly" && ($billStatus === "current" || $billStatus === "plan")) {
                array_push($m_results, $billAmountTotal /4);
            }
    
            if ($value->frequency === "weekly" && ($billStatus === "current" || $billStatus === "plan")) {
                array_push($w_results, $billAmountTotal);
            }
        }     
    }

    // Grab another DB Object for weeks
    if($table === "current") {

        $weeks = $db->query('SELECT * FROM week_pay');

    } elseif ($table === "plan") {

        $weeks = $db->query('SELECT * FROM plan_pay');
    }

    // Grab _result array from DB object
    $weeks = $weeks->_result;

    $weekIncome = [];

    // Push weekly pay amount to array --called $weekIncome array on line 167
    foreach($weeks as $week) {
        $weekAmount = $week->amount;
        array_push($weekIncome, $weekAmount);
    }


    // Set empty array variables
    $array = [];

    // Loop through number of weeks
    // Loop through "Monthly bills" and  and push to array;
    // Loop through "weekly Bills" and push to array;
    for($i = 0; $i < count($weeks); $i++) {

        for($x = 0; $x < count($m_results); $x++) {
            if($table === "current") {

                $td = $m_results[$x] * ($i + 1);
                array_push($array, $td);

            } elseif ($table === "plan") {

                $td = $m_results[$x];
                array_push($array, $td);
            }
            

        }

        for($x = 0; $x < count($w_results); $x++) {
            $td = $w_results[$x];
            array_push($array, $td);
        }

    }

    // Split array into array chunks equal to the amount of bills  present
    $dataArray= array_chunk($array, count($m_results) + count($w_results), false);
    

    $weekTotals = [];

    // Add up bills for the week and push them to $weekTotals Array
    foreach ($dataArray as $nums) {
        $totals = array_sum($nums);
        array_push($weekTotals, $totals);
   
    }

    // Push the week totals to the end of each array in dataArray
    // Push weekly income amount to front of each array in dataArray
    for($x = 0; $x < count($dataArray); $x++) {
        array_push($dataArray[$x], $weekTotals[$x]);
        array_unshift($dataArray[$x], $weekIncome[$x]);

    }

       // Subtract week total from income
       $difference = [];

       for($x = 0; $x < count($dataArray); $x++) {
   
           array_push($difference, ($dataArray[$x][0] - end($dataArray[$x])));
       }


    // Push difference amounts into dataArray
    for($x = 0; $x < count($dataArray); $x++) {
        array_push($dataArray[$x], $difference[$x]);
        

    }

    // Loop through $dataArray
    $q = 0;
    foreach($dataArray as $values) {
        echo "<tr>";
            
            $q += 1;            
           echo "<th scope='row'>Week{$q}</th>";
            
        
        // Loop through arrays within $dataArray values and inject into table    
        foreach($values as $value) {
            echo "<td>{$value}</td>";
             
        }

        
    }   echo "</tr>";
    
}

function displayTable ($db, $table) {

    $dataObj = $db->query("SELECT * FROM {$table}");
 
    $tableData = $dataObj->_result;
 
    foreach($tableData as $data) {
       echo 
 
       "<div class='row' id={$table}" . "Table>
            <div class='checkBoxWrap'><input type='checkbox' class='largerBox' name='billsCheckbox[]' value='{$data->id}'></div>
            <div class='col'>{$data->name}</div>
            <div class='col'>{$data->amount}</div>
            <div class='col'>{$data->due_date}</div>
            <div class='col'>{$data->frequency}</div>
       </div>";
    }

}
