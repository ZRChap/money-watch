
<div class="table-wrap">
    <table class="table table-striped table-dark">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Income</th>

        <?php populate_table_headers($db); ?>

        <th scope="col">Week Total</th>
        <th scope="col">Spending Money</th>
        
        </tr>
    </thead>
    <tbody>
        <?php populate_curr_table_data($db); ?>

        <tr>
        
        <th scope="row">Totals</th>

        <?php populate_table_data_totals($db); ?>

        </tr>
    </tbody>
    </table>
</div>