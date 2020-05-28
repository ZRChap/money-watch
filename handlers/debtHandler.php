<?php

include '../header.php';

if(isset($_POST['debtSubmit'])) {
    $debtSelect = strtolower($_POST['debtSelect']);
    $name = $_POST['debtName'];
    $amount = $_POST['debtAmount'];
    $interest = $_POST['debtInterest'];
    $date = $_POST['payoff_date'];
    $monthlyPayment = $_POST['monthly_payment'];


    $months = $amount / $monthlyPayment;

    
    if($debtSelect === 'new debt') {
        $db->insert('debt',[
            'name' => "{$name}",
            'amount' => "{$amount}",
            'payoff_date' => "{$date}",
            'interest' => "{$interest}",
            'monthly_payment' => "{$monthlyPayment}"
        ]);

        header('location: http://localhost/moneyWatch/debt.php');
    } 

    if($debtSelect === 'edit debt') {

        $data = $db->query("SELECT * FROM debt WHERE name = '$name'");
        $debt = $data->_result;

        foreach($debt as $value) {
            $id = $value->id;
        }
        
       $db->update('debt', $id, [
        'amount' => "{$amount}",
        'payoff_date' => "{$date}",
        'interest' => "{$interest}"
        ]);

        header('location: http://localhost/moneyWatch/debt.php');

       
    } 

}

if(isset($_POST['debtDelete'])) {

    $checked = $_POST['debtCheckbox'];

    for($i = 0; $i < count($checked); $i++) {
        $db->query( "DELETE FROM debt WHERE id = '$checked[$i]' ");
    }

    header('location: http://localhost/moneyWatch/debt.php');

    
};


