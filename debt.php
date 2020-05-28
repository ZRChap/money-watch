<?php include dirname(__FILE__) .'/header.php';?>

<div class="row">
    <h2 class="mb-3 page-title">Debts</h2>
</div>

<div class="container">

    <div class="row">
        <div class="form-wrapper">
            
            <form action="handlers/debtHandler.php" method="POST" name="bills-form">

                <div class="row">

                    <div class="col">

                        <label for="debtSelect" class="label">New or Edit</label>
                        <select class="form-control mb-2" id="debtSelect" name="debtSelect" required>
                            <option>New Debt</option>
                            <option>Edit Debt</option>
                        </select>

                        <label for="debtName" class="label">Name</label>
                        <input type="text" class="form-control mb-2" name="debtName" required>

                        <label for="debtAmount" class="label">Amount</label>
                        <input type="text" class="form-control mb-2" name="debtAmount" required>

                    </div>

                    <div class="col">

                        <label for="monthly_payment" class="label">Monthly Payment Amount</label>
                        <input type="text" class="form-control mb-2" name="monthly_payment" required>

                        <label for="due_date" class="label">Due Date</label>
                        <input type="date" class="form-control mb-2" name="Due_date" required>

                        <label for="debtInterest" class="label">Interest</label>
                        <input type="text" class="form-control mb-2" name="debtInterest" required>

                        <!-- <label for="payoff_date" class="label">Payoff Date</label>
                        <input type="date" class="form-control mb-4" name="payoff_date" required> -->

                    </div>

                </div>

                <div>
                    <button type="submit" name="debtSubmit" class="btn btn-primary mb-4">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <div class="row spacer"></div>

    <form action="handlers/debtHandler.php" method="POST" name="bills-form">

        <?php dispTable($db, "debt", [
            'name',
            'amount',
            'interest',
            'monthly_payment',
            'due_date',
            'payoff_date',
            'total_amount'
        ]); ?>

            <div>
                <button type="submit" name="debtDelete" class="btn btn-danger mt-4 mb-4">Delete</button>
            </div>

    </form>
      

</div>




<?php include 'footer.php'; ?>