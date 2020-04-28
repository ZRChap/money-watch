<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">
   <div class="row">
      <form action="#">
         <h2 class="mb-3">Enter New Bill</h2>
         <label for="billName">Bill Name</label>
         <input type="text" class="form-control mb-2" name="billName"></input>
         <label for="billName">Bill Amount</label>
         <input type="text" class="form-control mb-2" name="billAmount"></input>
         <label for="billName">Bill Frequency</label>
         <input type="text" class="form-control mb-4" name="billFrequency"></input>
      </form>
   </div>


   <?php 

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
   ?>

</div>










<?php include 'footer.php'; ?>