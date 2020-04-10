<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">

<div class="row">
    <form action="">
        <div class="form-group pl-5">
            <label for="exampleFormControlSelect1">Pay Week #</label>
            <select class="form-control" id="exampleFormControlSelect1" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>

            <input type="text" class="form-control" id="pay_amount">
        </div>
    <button type="submit" class="btn btn-primary mb-2 ml-5">Input Pay</button>
    </form>
    <form action="">
        <div class="form-group pl-5">
            <label for="exampleFormControlSelect1">Bill</label>
            <select class="form-control" id="exampleFormControlSelect1">

            <!-- Loop thru bills table and list each one in dropdown -->
            
            <?php populate_bill_dropdown($db); ?>
            
            <option>Add New</option>

            </select>

            <input type="text" class="form-control" id="pay_amount">
        </div>
    <button type="submit" class="btn btn-primary mb-2 ml-5">Input Bill</button>
    </form>
</div>


<?php include 'plan-table.php'; ?>



<?php include 'footer.php'; ?>