<?php

function populate_table_headers($db) {

    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');

    $data = $bills->_result;

    foreach($data as $value) {
        $billName = $value->name;
        if($billName) {
            echo "<th scope='col'>{$billName}</th>";
        
        }
    }

}

function populate_table_data_totals($db) {

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
        if($value->frequency === "weekly") {
            $billAmount = $billAmountTotal * 4;
            echo "<td>{$billAmount}</td>";
        }
        else if($value->frequency === "monthly") {
            $billAmount = $billAmountTotal ;
            echo "<td>{$billAmount}</td>";
        
        }
    }
}
 

function populate_plan_table_data($db) {

    $bills = $db->query('SELECT * FROM bills ORDER BY frequency');

    $billData = $bills->_result;

    foreach($billData as $value) {
        $billAmountTotal = $value->amount;
        if($value->frequency === "weekly") {
            $billAmount = $billAmountTotal;
            echo "<td>{$billAmount}</td>";
        }
        else if($value->frequency === "monthly") {
            $billAmount = $billAmountTotal / 4;
            echo "<td>{$billAmount}</td>";
        
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

function populate_curr_table_data($db) {
    
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
        if ($value->frequency === "monthly") {
            array_push($m_results, $billAmountTotal /4);
        }

        if ($value->frequency === "weekly") {
            array_push($w_results, $billAmountTotal);
        }
        
    }

    // Grab another DB Object for weeks
    $weeks = $db->query('SELECT * FROM week_pay');

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
            $td = $m_results[$x] * ($i + 1);
            array_push($array, $td);

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

function displayBillsTable ($db) {

    $billsObj = $db->query("SELECT * FROM bills");
 
    $billData = $billsObj->_result;
 
    foreach($billData as $bills) {
       echo 
 
       "<div class='row' id='billsTable'>
          <div class='col'>{$bills->name}</div>
          <div class='col'>{$bills->amount}</div>
          <div class='col'>{$bills->due_date}</div>
          <div class='col'>{$bills->frequency}</div>
       </div>";
    }

}
