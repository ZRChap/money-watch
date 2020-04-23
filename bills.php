<?php include dirname(__FILE__) .'/header.php';?>

<?php 

$billsObj = $db->query("SELECT * FROM bills");

$billData = $billsObj->_result;

foreach($billData as $bills) {
   echo 

   "<div class='row'>
        <div class='col'>{$bills->name}</div>
        <div class='col'>{$bills->amount}</div>
        <div class='col'>{$bills->due_date}</div>
        <div class='col'>{$bills->frequency}</div>
     </div>";
}
?>










<?php include 'footer.php'; ?>