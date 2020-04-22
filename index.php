<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">

    <div class="row">
        <form action="indexHandler.php" method="POST" name="indexForm">
            <div class="form-group pl-5">
                <label for="exampleFormControlSelect1">Week</label>
                <select class="form-control" id="exampleFormControlSelect1" name="weekSelect" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
                <label for="pay_amount">Amount</label>
                <input type="text" class="form-control" id="pay_amount" name="payAmount">
            </div>
        <button type="submit" name="indexSubmit" class="btn btn-primary mb-2 ml-5">Submit</button>
        
        </form>

    </div>

    <?php include 'current-table.php'; ?>



</div>

<?php include 'footer.php'; ?>