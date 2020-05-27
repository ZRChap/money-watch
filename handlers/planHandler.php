<?php

include '../header.php';

if(isset($_POST['planSubmit'])) {

    $weekName = "week " . $_POST['weekSelect'];
    $weekIncome = $_POST['payAmount'];

    $db->query("UPDATE plan_pay SET amount = {$weekIncome} WHERE week_name = '{$weekName}'");

    header('location: ../plan.php');

}