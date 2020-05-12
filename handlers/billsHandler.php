<?php

include '../header.php';

if(isset($_POST['billSubmit'])) {
    $name = $_POST['billName'];
    $amount = $_POST['billAmount'];
    $billSelect = strtolower($_POST['billSelect']);
    $frequency = strtolower($_POST['frequencySelect']);
    $date = $_POST['dueDate'];
    
    if($billSelect === 'new bill') {
        $db->insert('bills',[
            'name' => "{$name}",
            'amount' => "{$amount}",
            'due_date' => "{$date}",
            'frequency' => "{$frequency}"
        ]);

        header('location: http://localhost/moneyWatch/bills.php');
    } 

    if($billSelect === 'edit bill') {

        $data = $db->query("SELECT * FROM bills WHERE name = '$name'");
        $bill = $data->_result;
        
        
        // $db->insert('bills',[
        //     'name' => "{$name}",
        //     'amount' => "{$amount}",
        //     'due_date' => "{$date}",
        //     'frequency' => "{$frequency}"
        // ]);

        //header('location: http://localhost/moneyWatch/bills.php');

       
    } 


}


if(isset($_POST['deleteSubmit'])) {

    $checked = $_POST['billsCheckbox'];

    for($i=0; $i < count($checked); $i++) {
        $db->query( "DELETE FROM bills WHERE id = '$checked[$i]' ");
    }

    header('location: http://localhost/moneyWatch/bills.php');

    
};


