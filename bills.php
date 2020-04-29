<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">
   <div class="row">
      <div class="col">
         <form action="#">
            <h2 class="mb-3">Enter New Bill</h2>
            <label for="billName" class="label">Bill Name</label>
            <input type="text" class="form-control mb-2" name="billName"></input>
            <label for="billName" class="label">Bill Amount</label>
            <input type="text" class="form-control mb-2" name="billAmount"></input>
            <label for="billName" class="label">Bill Frequency</label>
            <input type="text" class="form-control mb-4" name="billFrequency"></input>
            <label for="billName" class="label">Due Date</label>
            <input type="date" class="form-control mb-4" name="dueDate"></input>
         </form>
      </div>

      <div class="col"></div>

         <div class="col">
            <form action="#">
               <h2 class="mb-3">Update Current Bill</h2>
               <label for="billName" class="label">Bill Name</label>
               <input type="text" class="form-control mb-2" name="billName"></input>
               <label for="billName" class="label">Bill Amount</label>
               <input type="text" class="form-control mb-2" name="billAmount"></input>
               <label for="billName" class="label">Bill Frequency</label>
               <input type="text" class="form-control mb-4" name="billFrequency"></input>
               <label for="billName" class="label">Due Date</label>
               <input type="date" class="form-control mb-4" name="dueDate"></input>
            </form>
         </div>
   </div>
  

   <?php displayBillsTable ($db) ?>


</div>











<?php include 'footer.php'; ?>