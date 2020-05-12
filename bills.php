<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">
   <div class="row">
      <div class="col-sm-4">
         <form action="handlers/billsHandler.php" method="POST" name="bills-form">

            <h2 class="mb-3">Bills</h2>

            <label for="billSelect" class="label">New or Edit</label>
            <select class="form-control mb-2" id="billSelect" name="billSelect" required>
               <option>New Bill</option>
               <option>Edit Bill</option>
            </select>

            <label for="billName" class="label">Name</label>
            <input type="text" class="form-control mb-2" name="billName" required>

            <label for="billName" class="label">Amount</label>
            <input type="text" class="form-control mb-2" name="billAmount" required>

            <label for="billName" class="label">Frequency</label>
            <select class="form-control mb-2" id="frequencySelect" name="frequencySelect" required>
               <option>Weekly</option>
               <option>Monthly</option>
            </select>

            <label for="billName" class="label">Due Date</label>
            <input type="date" class="form-control mb-4" name="dueDate" required>

            <button type="submit" name="billSubmit" class="btn btn-primary mb-4">Submit</button>

         </form>
      </div>

   </div>
  
   <form action="handlers/billsHandler.php" method="POST" name="bills-form">

   <?php displayBillsTable ($db) ?>

      <div>
            <button type="submit" name="deleteSubmit" class="btn btn-danger mt-4 mb-4">Delete</button>
      </div>
   </form>

</div>











<?php include 'footer.php'; ?>