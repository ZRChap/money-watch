<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">

    <div class="row">
        <form action="handlers/planHandler.php" method="POST" name="indexForm">
        
            <div class="form-group pl-5">

                <label for="weekSelect" class="label mt-2">Week</label>
                <select class="form-control mb-2" id="weekSelect" name="weekSelect" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>

                <label for="pay_amount" class="label">Amount</label>
                <input type="text" class="form-control" id="pay_amount" name="payAmount">

            </div>

            <button type="submit" name="planSubmit" class="btn btn-primary mb-2 ml-5">Submit</button>
        
        </form>

    </div>

    <?php include 'plan-table.php'; ?>



</div>

<?php include 'footer.php'; ?>