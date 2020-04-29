<?php

include '../header.php';

if(isset($_POST['indexSubmit'])) {

$weekName = "week " . $_POST['weekSelect'];
$weekIncome = $_POST['payAmount'];

$db->query("UPDATE week_pay SET amount = {$weekIncome} WHERE week_name = '{$weekName}'");

header('location: ../index.php');

}





