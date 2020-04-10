<?php

function populate_table_headers($db) {
    $bills = $db->query('SELECT * FROM bills');
    $data = $bills->_result;
    foreach($data as $value) {
        $billName = $value->name;
        if($billName) {
            echo "<th scope='col'>{$billName}</th>";
        
        }
    }

}

function populate_plan_table_data_totals($db) {
    $bills = $db->query('SELECT * FROM bills');
    $data = $bills->_result;
    foreach($data as $value) {
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
    $bills = $db->query('SELECT * FROM bills');
    $data = $bills->_result;
    foreach($data as $value) {
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
    $bills = $db->query('SELECT * FROM bills');
    $data = $bills->_result;
    foreach($data as $value) {
        $billName = $value->name;
        if($billName) {
            echo "<option>{$billName}</option>";
        
        }
    }

}

function populate_curr_table_data($db) {
    
    $bills = $db->query('SELECT * FROM bills');
    
    $result = [];
    $data = $bills->_result;
    foreach($data as $value) {
        $billAmountTotal = $value->amount;
        $billFrequency = $value->frequency;
        if($value->frequency === "weekly") {
            array_push($result, $billAmountTotal);
        }
        
        elseif ($value->frequency === "monthly") {
            array_push($result, $billAmountTotal /4);
        }
    }

    $weeks = $db->query('SELECT * FROM plan_week_pay');
    $data = $weeks->_result;
    foreach ($data as $value) {
     
    }
    for($x = 0; $x < count($result); $x++) {
        $billAmount = $result[$x];
        echo '<pre>';
        echo "<td>{$billAmount}</td>";
        echo '</pre>';

    }
    pnrd($result);
    pnrd($weeks);
    
}