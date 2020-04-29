<?php

include '../header.php';

if(isset($_POST['billSubmit'])) {
    $name = $_POST['billName'];
    $amount = $_POST['billAmount'];
    $billSelect = $_POST['billSelect'];
    $frequency = $_POST['frequencySelect'];
    $date = $_POST['dueDate'];
    










    echo $name;
    echo '<br />';
    echo $amount;
    echo '<br />';
    echo $billSelect;
    echo '<br />';
    echo $frequency;
    echo '<br />';
    echo $date;

} else {
    exit();
}