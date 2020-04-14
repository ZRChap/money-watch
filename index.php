<?php include dirname(__FILE__) .'/header.php';?>

<div class="container">

<div class="row">
    <form action="">
        <div class="form-group pl-5">
            <label for="exampleFormControlSelect1">Choose Week Number</label>
            <select class="form-control" id="exampleFormControlSelect1" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div>

        <div class="form-group pl-5">
            <label for="exampleFormControlSelect1">Select Column</label>
            <select class="form-control" id="exampleFormControlSelect1">
            
            <?php populate_bill_dropdown($db); ?>
            
            <option>Save</option>

            </select>

            <input type="text" class="form-control" id="pay_amount">
        </div>
    <button type="submit" class="btn btn-primary mb-2 ml-5">Submit</button>
    
    </form>

</div>

<?php include 'current-table.php'; ?>









</div>

<?php include 'footer.php'; ?>